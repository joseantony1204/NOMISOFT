<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMTIPOSCARGOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMTIPOSCARGOS':
 * @Propiedad integer $TICA_ID
 * @Propiedad string $TICA_NOMBRE
 * @Propiedad string $TICA_FECHACAMBIO
 * @Propiedad integer $TICA_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad EMPLEOSPLANTA[] $eMPLEOSPLANTAs
 */
class Tiposcargos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Tiposcargos la clase del modelo estàtico.
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
		return 'TBL_NOMTIPOSCARGOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('TICA_NOMBRE, TICA_FECHACAMBIO, TICA_REGISTRADOPOR', 'required'),
			array('TICA_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('TICA_NOMBRE', 'length', 'max'=>20),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('TICA_ID, TICA_NOMBRE, TICA_FECHACAMBIO, TICA_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'eMPLEOSPLANTAs' => array(self::HAS_MANY, 'EMPLEOSPLANTA', 'TICA_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'TICA_ID' => 'TICA',
						'TICA_NOMBRE' => 'TICA NOMBRE',
						'TICA_FECHACAMBIO' => 'TICA FECHACAMBIO',
						'TICA_REGISTRADOPOR' => 'TICA REGISTRADOPOR',
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

		$criteria->compare('TICA_ID',$this->TICA_ID);
		$criteria->compare('TICA_NOMBRE',$this->TICA_NOMBRE,true);
		$criteria->compare('TICA_FECHACAMBIO',$this->TICA_FECHACAMBIO,true);
		$criteria->compare('TICA_REGISTRADOPOR',$this->TICA_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}