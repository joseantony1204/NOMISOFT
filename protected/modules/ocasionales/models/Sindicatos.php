<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMSINDICATOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMSINDICATOS':
 * @Propiedad integer $SIND_ID
 * @Propiedad string $SIND_NOMBRE
 * @Propiedad string $SIND_PORCENTAJE
 * @Propiedad string $SIND_FECHACAMBIO
 * @Propiedad integer $SIND_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PERSONASGENERALES[] $pERSONASGENERALESs
 */
class Sindicatos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Sindicatos la clase del modelo estàtico.
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
		return 'TBL_NOMSINDICATOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('SIND_NOMBRE, SIND_PORCENTAJE, SIND_FECHACAMBIO, SIND_REGISTRADOPOR', 'required'),
			array('SIND_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('SIND_NOMBRE', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('SIND_ID, SIND_NOMBRE, SIND_PORCENTAJE, SIND_FECHACAMBIO, SIND_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'pERSONASGENERALESs' => array(self::HAS_MANY, 'PERSONASGENERALES', 'SIND_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'SIND_ID' => 'ID',
						'SIND_NOMBRE' => 'NOMBRE',
						'SIND_PORCENTAJE' => 'PORCENTAJE',
						'AFILIADOS' => 'EMPLEADOS',
						'SIND_FECHACAMBIO' => 'SIND FECHACAMBIO',
						'SIND_REGISTRADOPOR' => 'SIND REGISTRADOPOR',
						
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
			'defaultOrder'=>'t.SIND_NOMBRE ASC',
			
			'SIND_ID'=>array(
				'asc'=>'t."SIND_ID"',
				'desc'=>'t."SIND_ID" desc',
			),
			
			'SIND_NOMBRE'=>array(
				'asc'=>'t."SIND_NOMBRE"',
				'desc'=>'t."SIND_NOMBRE" desc',
			),
			
			'SIND_PORCENTAJE'=>array(
				'asc'=>'t."SIND_PORCENTAJE"',
				'desc'=>'t."SIND_PORCENTAJE" desc',
			),	
			
			'AFILIADOS'=>array(
				'asc'=>'(SELECT COUNT('."'SIND_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee
								   WHERE t."SIND_ID" = p."SIND_ID" AND p."PEGE_ID" = e."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								  )',
				'desc'=>'(SELECT COUNT('."'PENS_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee
								   WHERE t."SIND_ID" = p."SIND_ID" AND p."PEGE_ID" = e."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								  ) desc',
			),
		);

		$criteria=new CDbCriteria;
		
		$criteria->select = 't.*, (SELECT COUNT('."'SIND_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee
								   WHERE t."SIND_ID" = p."SIND_ID" AND p."PEGE_ID" = e."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								  )  "AFILIADOS"';

		$criteria->compare('"SIND_ID"',$this->SIND_ID);
		$criteria->compare('"SIND_NOMBRE"',$this->SIND_NOMBRE,true);
		$criteria->compare('"SIND_PORCENTAJE"',$this->SIND_PORCENTAJE,true);
		$criteria->compare('"SIND_FECHACAMBIO"',$this->SIND_FECHACAMBIO,true);
		$criteria->compare('"SIND_REGISTRADOPOR"',$this->SIND_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 30,),
		));
	}
}