<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	
	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user=Usuarios::model()->findByAttributes(array('USUA_USUARIO'=>$this->username));
		
		if($user==NULL){
		$this->errorCode=self::ERROR_USERNAME_INVALID;		
		}else{
		      if(!$user->validatePassword($this->password)){
			   $this->errorCode=self::ERROR_PASSWORD_INVALID;	
		      }else{
			        $this->_id=$user->USUA_ID;
			        $this->username=$user->USUA_USUARIO;
			        $this->errorCode=self::ERROR_NONE;
		           }
		      }
		return !$this->errorCode;
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}