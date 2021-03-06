<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMESTADOSCIVILES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMESTADOSCIVILES':
 * @Propiedad integer $ESCI_ID
 * @Propiedad string $ESCI_NOMBRE
 * @Propiedad string $ESCI_FECHACAMBIO
 * @Propiedad integer $ESCI_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PERSONASGENERALES[] $pERSONASGENERALESs
 */
class Estadosciviles extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Estadosciviles la clase del modelo estàtico.
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
		return 'TBL_NOMESTADOSCIVILES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('ESCI_NOMBRE, ESCI_FECHACAMBIO, ESCI_REGISTRADOPOR', 'required'),
			array('ESCI_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('ESCI_NOMBRE', 'length', 'max'=>40),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('ESCI_ID, ESCI_NOMBRE, ESCI_FECHACAMBIO, ESCI_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'pERSONASGENERALESs' => array(self::HAS_MANY, 'PERSONASGENERALES', 'ESCI_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'ESCI_ID' => 'ID',
						'ESCI_NOMBRE' => 'ESTADO CIVIL',
						'ESCI_FECHACAMBIO' => 'ESCI FECHACAMBIO',
						'ESCI_REGISTRADOPOR' => 'ESCI REGISTRADOPOR',
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

		$criteria->compare('"ESCI_ID"',$this->ESCI_ID);
		$criteria->compare('"ESCI_NOMBRE"',$this->ESCI_NOMBRE,true);
		$criteria->compare('"ESCI_FECHACAMBIO"',$this->ESCI_FECHACAMBIO,true);
		$criteria->compare('ESCI_REGISTRADOPOR',$this->ESCI_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}