<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_SEGUSUARIOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_SEGUSUARIOS':
 * @Propiedad integer $USUA_ID
 * @Propiedad string $USUA_USUARIO
 * @Propiedad string $USUA_CLAVE
 * @Propiedad string $USUA_SESSION
 * @Propiedad string $USUA_FECHAALTA
 * @Propiedad string $USUA_FECHABAJA
 * @Propiedad string $USUA_ULTIMOACCESO
 * @Propiedad integer $PENA_ID
 */
class Usuarios extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Usuarios la clase del modelo estàtico.
	 */
	public $PENA_IDENTIFICACION, $PENA_NOMBRES, $PENA_APELLIDOS, $USPE_NOMBRE; 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_SEGUSUARIOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('USUA_USUARIO, USUA_CLAVE, USUA_SESSION, USUA_FECHAALTA, USUA_FECHABAJA, USUA_ULTIMOACCESO, PENA_ID', 'required'),
			array('PENA_ID', 'numerical', 'integerOnly'=>true),
			array('USUA_USUARIO', 'length', 'max'=>100),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			
			array('USUA_ID, USUA_USUARIO, USUA_CLAVE, USUA_SESSION, USUA_FECHAALTA, USUA_FECHABAJA, USUA_ULTIMOACCESO, PENA_ID,
			PENA_IDENTIFICACION, PENA_NOMBRES, PENA_APELLIDOS, USPE_NOMBRE', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @Devolver reglas relacionales matriz.
	 */
	public function relations()
	{
		//Nota: es posible que necesite ajustar el nombre de la relación y la relacionada
        //Nombre de clase de las relaciones generadas automáticamente a continuación.
		return array(
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'USUA_ID' => 'ID',
						'USUA_USUARIO' => 'USUARIO',
						'USUA_CLAVE' => 'CONTRESEÑA',
						'USUA_SESSION' => 'USUA SESSION',
						'USUA_FECHAALTA' => 'FECHA ALTA',
						'USUA_FECHABAJA' => 'FECHA BAJA',
						'USUA_ULTIMOACCESO' => 'ULTIMO ACCESO',
						'PENA_ID' => 'PENA',
						
						'PENA_IDENTIFICACION' => 'IDENTIFICACION',
						'PENA_NOMBRES' => 'NOMBRES',
						'PENA_APELLIDOS' => 'APELLIDOS',
						'USPE_NOMBRE' => 'PERFIL',
		);
	}

	 /**
     *@Recupera una lista de los modelos basados ​​en las actuales condiciones de búsqueda / filtro.
     *@Return CActiveDataProvider el proveedor de datos que puede devolver los modelos basados ​​en las condiciones de búsqueda / filtro.
     */
	public function search()
	{
		//Advertencia: Por favor, modifique el siguiente código para quitar atributos que
        //No debe ser buscado.

		$criteria=new CDbCriteria;
		$criteria->select='t.*, p.*, up.*, pn.*';
		$criteria->join ='
		INNER JOIN "TBL_SEGPERSONASNATURALES"  pn ON pn."PENA_ID" = t."PENA_ID"
		INNER JOIN "TBL_SEGPERFILESUSUARIOS"  up ON up."USUA_ID" = t."USUA_ID"
		INNER JOIN "TBL_SEGPERFILES"  p ON p."USPE_ID" = up."USPE_ID"';

		$criteria->compare('"USUA_ID"',$this->USUA_ID);
		$criteria->compare('"USUA_USUARIO"',$this->USUA_USUARIO,true);
		$criteria->compare('"USUA_CLAVE"',$this->USUA_CLAVE,true);
		$criteria->compare('"USUA_SESSION"',$this->USUA_SESSION,true);
		$criteria->compare('"USUA_FECHAALTA"',$this->USUA_FECHAALTA,true);
		$criteria->compare('"USUA_FECHABAJA"',$this->USUA_FECHABAJA,true);
		$criteria->compare('"USUA_ULTIMOACCESO"',$this->USUA_ULTIMOACCESO,true);
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
}