<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMNOVEDADESPRIMAVACACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMNOVEDADESPRIMAVACACIONES':
 * @Propiedad integer $NOPV_ID
 * @Propiedad string $NOPV_FECHAINGRESO
 * @Propiedad integer $NOPV_DIAS
 * @Propiedad integer $PEGE_ID
 * @Propiedad string $NOPV_FECHACAMBIO
 * @Propiedad integer $NOPV_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PERSONASGENERALES $pEGE
 */
class Novedadesprimavacaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve NovedadesPrimaVacaciones la clase del modelo estàtico.
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
		return 'TBL_NOMNOVEDADESPRIMAVACACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('NOPV_FECHAINGRESO, NOPV_DIAS, PEGE_ID, NOPV_FECHACAMBIO, NOPV_REGISTRADOPOR', 'required'),
			array('NOPV_DIAS, PEGE_ID, NOPV_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('NOPV_ID, NOPV_FECHAINGRESO, NOPV_DIAS, PEGE_ID, NOPV_FECHACAMBIO, NOPV_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'NOPV_ID' => 'NOPV',
						'NOPV_FECHAINGRESO' => 'NOPV FECHAINGRESO',
						'NOPV_DIAS' => 'NOPV DIAS',
						'PEGE_ID' => 'PEGE',
						'NOPV_FECHACAMBIO' => 'NOPV FECHACAMBIO',
						'NOPV_REGISTRADOPOR' => 'NOPV REGISTRADOPOR',
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

		$criteria->compare('NOPV_ID',$this->NOPV_ID);
		$criteria->compare('NOPV_FECHAINGRESO',$this->NOPV_FECHAINGRESO,true);
		$criteria->compare('NOPV_DIAS',$this->NOPV_DIAS);
		$criteria->compare('PEGE_ID',$this->PEGE_ID);
		$criteria->compare('NOPV_FECHACAMBIO',$this->NOPV_FECHACAMBIO,true);
		$criteria->compare('NOPV_REGISTRADOPOR',$this->NOPV_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}