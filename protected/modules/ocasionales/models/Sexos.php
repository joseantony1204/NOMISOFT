<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMSEXOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMSEXOS':
 * @Propiedad integer $SEXO_ID
 * @Propiedad string $SEXO_NOMBRE
 * @Propiedad string $SEXO_DESCRIPCION
 * @Propiedad string $SEXO_FECHACAMBIO
 * @Propiedad integer $SEXO_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PERSONASGENERALES[] $pERSONASGENERALESs
 */
class Sexos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Sexos la clase del modelo estàtico.
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
		return 'TBL_NOMSEXOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('SEXO_FECHACAMBIO, SEXO_REGISTRADOPOR', 'required'),
			array('SEXO_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('SEXO_NOMBRE', 'length', 'max'=>15),
			array('SEXO_DESCRIPCION', 'length', 'max'=>1),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('SEXO_ID, SEXO_NOMBRE, SEXO_DESCRIPCION, SEXO_FECHACAMBIO, SEXO_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'pERSONASGENERALESs' => array(self::HAS_MANY, 'PERSONASGENERALES', 'SEXO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'SEXO_ID' => 'ID',
						'SEXO_NOMBRE' => 'SEXO',
						'SEXO_DESCRIPCION' => 'DESCRIPCION',
						'SEXO_FECHACAMBIO' => 'SEXO FECHACAMBIO',
						'SEXO_REGISTRADOPOR' => 'SEXO REGISTRADOPOR',
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

		$criteria->compare('"SEXO_ID"',$this->SEXO_ID);
		$criteria->compare('"SEXO_NOMBRE"',$this->SEXO_NOMBRE,true);
		$criteria->compare('"SEXO_DESCRIPCION"',$this->SEXO_DESCRIPCION,true);
		$criteria->compare('SEXO_FECHACAMBIO',$this->SEXO_FECHACAMBIO,true);
		$criteria->compare('SEXO_REGISTRADOPOR',$this->SEXO_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}