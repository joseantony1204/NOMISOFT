<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMNOVEDADESPRIMASEMESTRAL".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMNOVEDADESPRIMASEMESTRAL':
 * @Propiedad integer $NOPS_ID
 * @Propiedad string $NOPS_FECHAINGRESO
 * @Propiedad integer $NOPS_MESES
 * @Propiedad integer $PEGE_ID
 * @Propiedad boolean $NOPS_CONTINUIDAD
 * @Propiedad string $NOPS_FECHACAMBIO
 * @Propiedad integer $NOPS_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PERSONASGENERALES $pEGE
 */
class Novedadesprimasemestral extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Novedadesprimasemestral la clase del modelo estàtico.
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
		return 'TBL_NOMNOVEDADESPRIMASEMESTRAL';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('NOPS_FECHAINGRESO, NOPS_MESES, PEGE_ID', 'required'),
			array('NOPS_MESES, PEGE_ID, NOPS_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('NOPS_CONTINUIDAD, NOPS_FECHACAMBIO', 'safe'),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('NOPS_ID, NOPS_FECHAINGRESO, NOPS_MESES, PEGE_ID, NOPS_CONTINUIDAD, NOPS_FECHACAMBIO, NOPS_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'NOPS_ID' => 'NOPS',
						'NOPS_FECHAINGRESO' => 'NOPS FECHAINGRESO',
						'NOPS_MESES' => 'NOPS MESES',
						'PEGE_ID' => 'PEGE',
						'NOPS_CONTINUIDAD' => 'NOPS CONTINUIDAD',
						'NOPS_FECHACAMBIO' => 'NOPS FECHACAMBIO',
						'NOPS_REGISTRADOPOR' => 'NOPS REGISTRADOPOR',
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

		$criteria->compare('NOPS_ID',$this->NOPS_ID);
		$criteria->compare('NOPS_FECHAINGRESO',$this->NOPS_FECHAINGRESO,true);
		$criteria->compare('NOPS_MESES',$this->NOPS_MESES);
		$criteria->compare('PEGE_ID',$this->PEGE_ID);
		$criteria->compare('NOPS_CONTINUIDAD',$this->NOPS_CONTINUIDAD);
		$criteria->compare('NOPS_FECHACAMBIO',$this->NOPS_FECHACAMBIO,true);
		$criteria->compare('NOPS_REGISTRADOPOR',$this->NOPS_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}