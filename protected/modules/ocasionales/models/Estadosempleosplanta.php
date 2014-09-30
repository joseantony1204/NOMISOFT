<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMESTADOSEMPLEOSPLANTA".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMESTADOSEMPLEOSPLANTA':
 * @Propiedad integer $ESEP_ID
 * @Propiedad string $ESEP_FECHAREGISTRO
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $ESEP_FECHACAMBIO
 * @Propiedad integer $ESEP_REGISTRADOPOR
 * @Propiedad integer $ESEM_ID
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad EMPLEOSPLANTA $eMPL
 */
class Estadosempleosplanta extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Estadosempleosplanta la clase del modelo estàtico.
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
		return 'TBL_NOMESTADOSEMPLEOSPLANTA';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('ESEP_FECHAREGISTRO, EMPL_ID, ESEP_FECHACAMBIO, ESEP_REGISTRADOPOR, ESEM_ID', 'required'),
			array('EMPL_ID, ESEP_REGISTRADOPOR, ESEM_ID', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('ESEP_ID, ESEP_FECHAREGISTRO, EMPL_ID, ESEP_FECHACAMBIO, ESEP_REGISTRADOPOR, ESEM_ID', 'safe', 'on'=>'search'),
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
			'eMPL' => array(self::BELONGS_TO, 'EMPLEOSPLANTA', 'EMPL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'ESEP_ID' => 'ESEP',
						'ESEP_FECHAREGISTRO' => 'ESEP FECHAREGISTRO',
						'EMPL_ID' => 'EMPL',
						'ESEP_FECHACAMBIO' => 'ESEP FECHACAMBIO',
						'ESEP_REGISTRADOPOR' => 'ESEP REGISTRADOPOR',
						'ESEM_ID' => 'ESTADO CARGO',
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

		$criteria->compare('ESEP_ID',$this->ESEP_ID);
		$criteria->compare('ESEP_FECHAREGISTRO',$this->ESEP_FECHAREGISTRO,true);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('ESEP_FECHACAMBIO',$this->ESEP_FECHACAMBIO,true);
		$criteria->compare('ESEP_REGISTRADOPOR',$this->ESEP_REGISTRADOPOR);
		$criteria->compare('ESEM_ID',$this->ESEM_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}