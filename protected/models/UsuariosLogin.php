<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class UsuariosLogin extends CFormModel
{
	public $usuario;
	public $clave;
	public $recordarme;
	public $estado; 

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('usuario, clave', 'required'),
			// rememberMe needs to be a boolean
			array('recordarme', 'boolean'),
			// password needs to be authenticated
			array('clave', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'recordarme'=>"No cerrar mi sesión",
			'usuario'=>"NOMBRE USUARIO",
			'clave'=>"CLAVE",
			'estado'=>"ESTADO",
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())  // we only want to authenticate when no input errors
		{
			$identity=new UserIdentity($this->usuario,$this->clave);
			$identity->authenticate();
			switch($identity->errorCode)
			{
				case UserIdentity::ERROR_NONE:
					$duration= $this->recordarme ? 3600*24*1 : 0; //  30 days
					Yii::app()->user->login($identity,$duration);
					break;
				case UserIdentity::ERROR_USERNAME_INVALID:
					$this->addError("usuario","El usuario es incorrecto.");
					$this->addError("clave","La clave que ha ingressdo es incorrecta.");
					break;
				case UserIdentity::ERROR_PASSWORD_INVALID:
					$this->addError("clave","Clave Incorrecta.");
					break;	
				case UserIdentity::ERROR_STATUS_SUSPENDIDO:
					$this->addError("usuario","El usuario  ha sido suspendido.");
					$this->addError("clave","El usuario  ha sido suspendido.");
					break;
				case UserIdentity::ERROR_STATUS_RETIRADO:
					$this->addError("estado","El usuario se encuentra retirado.");
					break;
			}
		}
	}
}
