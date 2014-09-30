<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMNOVEDADESVACACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMNOVEDADESVACACIONES':
 * @Propiedad integer $NOVA_ID
 * @Propiedad string $NOVA_FECHAINGRESO
 * @Propiedad integer $NOVA_DIAS
 * @Propiedad integer $PEGE_ID
 * @Propiedad string $NOVA_FECHACAMBIO
 * @Propiedad integer $NOVA_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PERSONASGENERALES $pEGE
 */
class Novedadesvacaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Novedadesvacaciones la clase del modelo estàtico.
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
		return 'TBL_NOMNOVEDADESVACACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('NOVA_FECHAINGRESO, NOVA_DIAS, PEGE_ID, NOVA_FECHACAMBIO, NOVA_REGISTRADOPOR', 'required'),
			array('NOVA_DIAS, PEGE_ID, NOVA_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('NOVA_ID, NOVA_FECHAINGRESO, NOVA_DIAS, PEGE_ID, NOVA_FECHACAMBIO, NOVA_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'pEGE' => array(self::BELONGS_TO, 'PERSONASGENERALES', 'PEGE_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'NOVA_ID' => 'NOVA',
						'NOVA_FECHAINGRESO' => 'NOVA FECHAINGRESO',
						'NOVA_DIAS' => 'NOVA DIAS',
						'PEGE_ID' => 'PEGE',
						'NOVA_FECHACAMBIO' => 'NOVA FECHACAMBIO',
						'NOVA_REGISTRADOPOR' => 'NOVA REGISTRADOPOR',
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

		$criteria->compare('NOVA_ID',$this->NOVA_ID);
		$criteria->compare('NOVA_FECHAINGRESO',$this->NOVA_FECHAINGRESO,true);
		$criteria->compare('NOVA_DIAS',$this->NOVA_DIAS);
		$criteria->compare('PEGE_ID',$this->PEGE_ID);
		$criteria->compare('NOVA_FECHACAMBIO',$this->NOVA_FECHACAMBIO,true);
		$criteria->compare('NOVA_REGISTRADOPOR',$this->NOVA_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}