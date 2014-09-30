<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMPAISES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMPAISES':
 * @Propiedad integer $PAIS_ID
 * @Propiedad string $PAIS_NOMBRE
 * @Propiedad string $PAIS_DESCRIPCION
 * @Propiedad string $PAIS_INDICATIVO
 * @Propiedad string $PAIS_FECHACAMBIO
 * @Propiedad integer $PAIS_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad DEPARTAMENTOS[] $dEPARTAMENTOSes
 */
class Paises extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Paises la clase del modelo estàtico.
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
		return 'TBL_NOMPAISES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PAIS_NOMBRE', 'required'),
			array('PAIS_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('PAIS_NOMBRE', 'length', 'max'=>100),
			array('PAIS_DESCRIPCION, PAIS_INDICATIVO', 'length', 'max'=>5),
			array('PAIS_FECHACAMBIO', 'safe'),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PAIS_ID, PAIS_NOMBRE, PAIS_DESCRIPCION, PAIS_INDICATIVO, PAIS_FECHACAMBIO, PAIS_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'dEPARTAMENTOSes' => array(self::HAS_MANY, 'DEPARTAMENTOS', 'PAIS_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'PAIS_ID' => 'ID',
						'PAIS_NOMBRE' => 'NOMBRE',
						'PAIS_DESCRIPCION' => 'DESCRIPCION',
						'PAIS_INDICATIVO' => 'INDICATIVO',
						'PAIS_FECHACAMBIO' => 'FECHACAMBIO',
						'PAIS_REGISTRADOPOR' => 'REGISTRADOPOR',
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

		$criteria->compare('"PAIS_ID"',$this->PAIS_ID);
		$criteria->compare('"PAIS_NOMBRE"',$this->PAIS_NOMBRE,true);
		$criteria->compare('"PAIS_DESCRIPCION"',$this->PAIS_DESCRIPCION,true);
		$criteria->compare('"PAIS_INDICATIVO"',$this->PAIS_INDICATIVO,true);
		$criteria->compare('"PAIS_FECHACAMBIO"',$this->PAIS_FECHACAMBIO,true);
		$criteria->compare('"PAIS_REGISTRADOPOR"',$this->PAIS_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}