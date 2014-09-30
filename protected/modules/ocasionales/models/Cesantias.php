<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMCESANTIAS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMCESANTIAS':
 * @Propiedad integer $CESA_ID
 * @Propiedad string $CESA_NOMBRE
 * @Propiedad string $CESA_FECHACAMBIO
 * @Propiedad integer $CESA_REGISTRADOPOR
 */
class Cesantias extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Cesantias la clase del modelo estàtico.
	 */
	public $AFILIADOS, $DOWNLOAD;
	
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
		return 'TBL_NOMCESANTIAS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('CESA_NOMBRE, CESA_FECHACAMBIO, CESA_REGISTRADOPOR', 'required'),
			array('CESA_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('CESA_NOMBRE', 'length', 'max'=>30),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('CESA_ID, CESA_NOMBRE, CESA_FECHACAMBIO, CESA_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'CESA_ID' => 'ID',
						'CESA_NOMBRE' => 'CESANTIA',
						'AFILIADOS' => 'EMPLEADOS',
						'CESA_FECHACAMBIO' => 'CESA FECHACAMBIO',
						'CESA_REGISTRADOPOR' => 'CESA REGISTRADOPOR',
						
						'DOWNLOAD' => '...',
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

		$sort = new CSort();
		$sort->attributes = array(
			'defaultOrder'=>'t.CESA_NOMBRE ASC',
			
			'CESA_ID'=>array(
				'asc'=>'t."CESA_ID"',
				'desc'=>'t."CESA_ID" desc',
			),
			
			'CESA_NOMBRE'=>array(
				'asc'=>'t."PENS_NOMBRE"',
				'desc'=>'t."PENS_NOMBRE" desc',
			),	
			
			'AFILIADOS'=>array(
				'asc'=>'(SELECT COUNT('."'CESA_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee
								   WHERE t."CESA_ID" = p."CESA_ID" AND p."PEGE_ID" = e."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								  )',
				'desc'=>'(SELECT COUNT('."'CESA_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee
								   WHERE t."CESA_ID" = p."CESA_ID" AND p."PEGE_ID" = e."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								  ) desc',
			),
		);

		$criteria=new CDbCriteria;
		
		$criteria->select = 't.*, (SELECT COUNT('."'CESA_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee
								   WHERE t."CESA_ID" = p."CESA_ID" AND p."PEGE_ID" = e."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								  )  "AFILIADOS"';

		$criteria->compare('"CESA_ID"',$this->CESA_ID);
		$criteria->compare('"CESA_NOMBRE"',$this->CESA_NOMBRE,true);
		$criteria->compare('"CESA_FECHACAMBIO"',$this->CESA_FECHACAMBIO,true);
		$criteria->compare('"CESA_REGISTRADOPOR"',$this->CESA_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 30,),
		));
	}
}