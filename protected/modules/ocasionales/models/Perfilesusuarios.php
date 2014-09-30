<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_SEGPERFILESUSUARIOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_SEGPERFILESUSUARIOS':
 * @Propiedad integer $USPU_ID
 * @Propiedad integer $USUA_ID
 * @Propiedad integer $USPE_ID
 * @Propiedad string $USPU_FECHAINGRESO
 */
class Perfilesusuarios extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Perfilesusuarios la clase del modelo estàtico.
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static $db2; 
	public function getDbConnection()
	{ 
	 if(self::$db2 !== null){ 
	  return self::$db2; 
	 }else{ 
	       self::$db2 = Yii::app()->db2; 
	       if (self::$db2 instanceof CDbConnection)
	       { 
		    self::$db2->setActive(true); 
			return self::$db2; 
	       }else{  
		         throw new CDbException(Yii::t('yii','Active Record requires a "db2" CDbConnection application component.')); 
	            } 
	      } 
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_SEGPERFILESUSUARIOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('USUA_ID, USPE_ID, USPU_FECHAINGRESO', 'required'),
			array('USUA_ID, USPE_ID', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('USPU_ID, USUA_ID, USPE_ID, USPU_FECHAINGRESO', 'safe', 'on'=>'search'),
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
						'USPU_ID' => 'ID PERFIL USUARIO',
						'USUA_ID' => 'USUARIO',
						'USPE_ID' => 'PERFIL',
						'USPU_FECHAINGRESO' => 'FECHA INGRESO',
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

		$criteria->compare('USPU_ID',$this->USPU_ID);
		$criteria->compare('USUA_ID',$this->USUA_ID);
		$criteria->compare('USPE_ID',$this->USPE_ID);
		$criteria->compare('USPU_FECHAINGRESO',$this->USPU_FECHAINGRESO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}