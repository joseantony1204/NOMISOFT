<?php

/**
 * This is the model class for table "TBL_USUARIOS".
 *
 * The followings are the available columns in table 'TBL_USUARIOS':
 * @property integer $USUA_ID
 * @property string $USUA_USUARIO
 * @property string $USUA_CLAVE
 * @property string $USUA_SESSION
 * @property string $USUA_FECHAALTA
 * @property string $USUA_FECHABAJA
 * @property string $USUA_ULTIMOACCESO
 * @property integer $PENA_ID
 * @property integer $USPE_ID
 */
class Usuarios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public $PENA_ID, $PENA_IDENTIFICACION, $PENA_NOMBRES, $PENA_APELLIDOS;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TBL_SEGUSUARIOS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('USUA_USUARIO','unique','message' => "Este nombre de usuario ya existe."),
			array('USUA_USUARIO, USUA_CLAVE, USUA_SESSION, USUA_FECHAALTA, USUA_FECHABAJA, 
			USUA_ULTIMOACCESO, PENA_ID', 'required'),
			array('PENA_ID', 'numerical', 'integerOnly'=>true),
			array('USUA_USUARIO', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('USUA_ID, USUA_USUARIO, USUA_CLAVE, USUA_SESSION, USUA_FECHAALTA, 
			USUA_FECHABAJA, USUA_ULTIMOACCESO, PENA_ID, PENA_IDENTIFICACION, 
			PERS_EMAIL, PENA_ID, PENA_NOMBRES, PENA_APELLIDOS', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'USUA_ID' => 'ID',
			'USUA_USUARIO' => 'NOMBRE USUARIO',
			'USUA_CLAVE' => 'CLAVE',
			'USUA_SESSION' => 'SESSION',
			'USUA_FECHAALTA' => 'FECHA INGRESO',
			'USUA_FECHABAJA' => 'FECHA RETIRO',
			'USUA_ULTIMOACCESO' => 'ULTIMA VISITA',
			'PENA_ID' => 'ID PERSONA NATURAL',
			'PENA_IDENTIFICACION' => '# IDENTIFICACION',
			'PENA_NOMBRES' => 'NOMBRES',
			'PENA_APELLIDOS' => 'APELLIDOS',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;		
		$criteria->select='pn.PENA_ID, pn.PENA_IDENTIFICACION, pn.PENA_NOMBRES, pn.PENA_APELLIDOS,
		t.*';
		$criteria->join ='
		INNER JOIN TBL_PERSONASNATURALES  pn ON t.PENA_ID = pn.PENA_ID';
         
		$criteria->compare('USUA_ID',$this->USUA_ID);
		$criteria->compare('USUA_USUARIO',$this->USUA_USUARIO,true);
		$criteria->compare('USUA_CLAVE',$this->USUA_CLAVE,true);
		$criteria->compare('USUA_SESSION',$this->USUA_SESSION,true);
		$criteria->compare('USUA_FECHAALTA',$this->USUA_FECHAALTA,true);
		$criteria->compare('USUA_FECHABAJA',$this->USUA_FECHABAJA,true);
		$criteria->compare('USUA_ULTIMOACCESO',$this->USUA_ULTIMOACCESO,true);
		$criteria->compare('PENA_ID',$this->PENA_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->USUA_SESSION)===$this->USUA_CLAVE;
	}

	

	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}

	public function generateSalt()
	{
		return uniqid('',true);
	}
	
	public function getDatosUsuario($id)
	{
	 $connection = Yii::app()->db;
	 $sql = 'SELECT  pn."PENA_NOMBRES" AS NOMBRE
	 FROM "TBL_SEGPERSONASNATURALES" AS pn, "TBL_SEGUSUARIOS" AS u
	 WHERE u."PENA_ID" = pn."PENA_ID" AND u."USUA_ID" = '.$id.' LIMIT 1';
	 $data = $connection->createCommand($sql)->queryColumn(); 
	 return $data; 
	}
	
	
	public function getModulosUsuario($id)
	{
	 $connection = Yii::app()->db;
	 $sql = 'SELECT um."USMO_ID", um."USMO_NOMBRE", um."USMO_URL"
	 FROM "TBL_SEGMODULOS" AS um, "TBL_SEGROLES" AS ur, "TBL_SEGPERFILES" AS up, "TBL_SEGPERFILESUSUARIOS" AS upu, "TBL_SEGUSUARIOS" AS u
	 WHERE um."USMO_ID" = ur."USMO_ID" AND ur."USPE_ID" = up."USPE_ID" AND up."USPE_ID" = upu."USPE_ID"
     AND upu."USUA_ID" = u."USUA_ID" AND u."USUA_ID" = '.$id.' GROUP BY um."USMO_ID", um."USMO_NOMBRE", um."USMO_URL" ';
	 $data = $connection->createCommand($sql)->queryAll(); 
	 return $data; 
	}
	
	public function getViewsAccesoUsuario($id,$modulo,$submodulo,$controlador)
	{
	 $connection = Yii::app()->db;
	 $sql = 'SELECT uv."USVI_URL" FROM "TBL_SEGMODULOS" um, "TBL_SEGSUBMODULOS" usm,
	 "TBL_SEGCONTROLADORES" uc, "TBL_SEGVISTAS" uv, "TBL_SEGROLES" ur, "TBL_SEGPERFILES" up,
     "TBL_SEGPERFILESUSUARIOS" upu, "TBL_SEGUSUARIOS" u
     WHERE um."USMO_ID" = usm."USMO_ID" AND usm."USSM_ID" = uc."USSM_ID" AND uc."USCO_ID" = uv."USCO_ID"
	 AND um."USMO_ID" = ur."USMO_ID" AND usm."USSM_ID" = ur."USSM_ID" AND uc."USCO_ID" = ur."USCO_ID" AND uv."USVI_ID" = ur."USVI_ID"
	 AND ur."USPE_ID" = up."USPE_ID" AND up."USPE_ID" = upu."USPE_ID" AND upu."USUA_ID" = u."USUA_ID" AND u."USUA_ID" = '.$id.'
     AND um."USMO_URL" = '."'".$modulo."'".' AND usm."USSM_URL" = '."'".$submodulo."'".' AND uc."USCO_URL" = '."'".$controlador."'".' ';
	 $data = $connection->createCommand($sql)->queryAll(); 
	 return $data; 
	}				
}