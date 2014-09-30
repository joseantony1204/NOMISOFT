<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMNOVEDADESPRIMANAVIDAD".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMNOVEDADESPRIMANAVIDAD':
 * @Propiedad integer $NOPN_ID
 * @Propiedad string $NOPN_FECHAINGRESO
 * @Propiedad integer $NOPN_MESES
 * @Propiedad integer $PEGE_ID
 * @Propiedad string $NOPN_FECHACAMBIO
 * @Propiedad integer $NOPN_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PERSONASGENERALES $pEGE
 */
class Novedadesprimanavidad extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Novedadesprimanavidad la clase del modelo estàtico.
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
		return 'TBL_NOMNOVEDADESPRIMANAVIDAD';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('NOPN_FECHAINGRESO, NOPN_MESES, PEGE_ID, NOPN_FECHACAMBIO, NOPN_REGISTRADOPOR', 'required'),
			array('NOPN_MESES, PEGE_ID, NOPN_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('NOPN_ID, NOPN_FECHAINGRESO, NOPN_MESES, PEGE_ID, NOPN_FECHACAMBIO, NOPN_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'NOPN_ID' => 'NOPN',
						'NOPN_FECHAINGRESO' => 'NOPN FECHAINGRESO',
						'NOPN_MESES' => 'NOPN MESES',
						'PEGE_ID' => 'PEGE',
						'NOPN_FECHACAMBIO' => 'NOPN FECHACAMBIO',
						'NOPN_REGISTRADOPOR' => 'NOPN REGISTRADOPOR',
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

		$criteria->compare('NOPN_ID',$this->NOPN_ID);
		$criteria->compare('NOPN_FECHAINGRESO',$this->NOPN_FECHAINGRESO,true);
		$criteria->compare('NOPN_MESES',$this->NOPN_MESES);
		$criteria->compare('PEGE_ID',$this->PEGE_ID);
		$criteria->compare('NOPN_FECHACAMBIO',$this->NOPN_FECHACAMBIO,true);
		$criteria->compare('NOPN_REGISTRADOPOR',$this->NOPN_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}