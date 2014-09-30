<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMUNIDADES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMUNIDADES':
 * @Propiedad integer $UNID_ID
 * @Propiedad string $UNID_NOMBRE
 * @Propiedad integer $TIUN_ID
 * @Propiedad string $UNID_FECHACAMBIO
 * @Propiedad integer $UNID_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad TIPOSUNIDADES $tIUN
 * @Propiedad EMPLEOSPLANTA[] $eMPLEOSPLANTAs
 */
class Unidades extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Unidades la clase del modelo estàtico.
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
		return 'TBL_NOMUNIDADES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('UNID_NOMBRE, TIUN_ID, UNID_FECHACAMBIO, UNID_REGISTRADOPOR', 'required'),
			array('TIUN_ID, UNID_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('UNID_NOMBRE', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('UNID_ID, UNID_NOMBRE, TIUN_ID, UNID_FECHACAMBIO, UNID_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'Tiposunidades' => array(self::BELONGS_TO, 'Tiposunidades', 'TIUN_ID'),
			'eMPLEOSPLANTAs' => array(self::HAS_MANY, 'EMPLEOSPLANTA', 'UNID_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'UNID_ID' => 'ID',
						'UNID_NOMBRE' => 'UNIDAD',
						'TIUN_ID' => 'TIPO UNIDAD',
						'UNID_FECHACAMBIO' => 'UNID FECHACAMBIO',
						'UNID_REGISTRADOPOR' => 'UNID REGISTRADOPOR',
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

		$criteria->compare('"UNID_ID"',$this->UNID_ID);
		$criteria->compare('"UNID_NOMBRE"',$this->UNID_NOMBRE,true);
		$criteria->compare('"TIUN_ID"',$this->TIUN_ID);
		$criteria->compare('UNID_FECHACAMBIO',$this->UNID_FECHACAMBIO,true);
		$criteria->compare('UNID_REGISTRADOPOR',$this->UNID_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 30,),
		));
	}
	
	public function Tiposunidades()
	{
	 $criteria=new CDbCriteria;
     $criteria->select='t."TIUN_ID", t."TIUN_NOMBRE"';
	 $criteria->join = 'INNER JOIN "TBL_NOMUNIDADES"  u ON t."TIUN_ID" = u."TIUN_ID" ';	
	 $criteria->order = 't."TIUN_NOMBRE" ASC';
	 return  CHtml::listData(Tiposunidades::model()->findAll($criteria),'TIUN_ID','TIUN_NOMBRE'); 
	}
}