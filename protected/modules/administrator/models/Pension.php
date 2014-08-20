<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMPENSION".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMPENSION':
 * @Propiedad integer $PENS_ID
 * @Propiedad string $PENS_NIT
 * @Propiedad string $PENS_CODIGO
 * @Propiedad string $PENS_NOMBRE
 * @Propiedad string $PENS_FECHACAMBIO
 * @Propiedad integer $PENS_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PERSONASGENERALES[] $pERSONASGENERALESs
 */
class Pension extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Pension la clase del modelo estàtico.
	 */
	public $AFILIADOS, $DOWNLOAD;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMPENSION';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PENS_NOMBRE, PENS_FECHACAMBIO, PENS_REGISTRADOPOR', 'required'),
			array('PENS_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('PENS_NIT, PENS_CODIGO', 'length', 'max'=>20),
			array('PENS_NOMBRE', 'length', 'max'=>100),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PENS_ID, PENS_NIT, PENS_CODIGO, PENS_NOMBRE, PENS_FECHACAMBIO, PENS_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'pERSONASGENERALESs' => array(self::HAS_MANY, 'PERSONASGENERALES', 'PENS_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'PENS_ID' => 'ID',
						'PENS_NIT' => 'NIT',
						'PENS_CODIGO' => 'CODIGO',
						'PENS_NOMBRE' => 'NOMBRE',
						'AFILIADOS' => 'EMPLEADOS',
						'PENS_FECHACAMBIO' => 'PENS FECHACAMBIO',
						'PENS_REGISTRADOPOR' => 'PENS REGISTRADOPOR',
						
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
			'defaultOrder'=>'t.PENS_NOMBRE ASC',
			
			'PENS_ID'=>array(
				'asc'=>'t."PENS_ID"',
				'desc'=>'t."PENS_ID" desc',
			),
			
			'PENS_NIT'=>array(
				'asc'=>'t."PENS_NIT"',
				'desc'=>'t."PENS_NIT" desc',
			),
			
			'PENS_CODIGO'=>array(
				'asc'=>'t."PENS_CODIGO"',
				'desc'=>'t."PENS_CODIGO" desc',
			),
			
			'PENS_NOMBRE'=>array(
				'asc'=>'t."PENS_NOMBRE"',
				'desc'=>'t."PENS_NOMBRE" desc',
			),	
			
			'AFILIADOS'=>array(
				'asc'=>'(SELECT COUNT('."'PENS_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee
								   WHERE t."PENS_ID" = p."PENS_ID" AND p."PEGE_ID" = e."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								  )',
				'desc'=>'(SELECT COUNT('."'PENS_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee
								   WHERE t."PENS_ID" = p."PENS_ID" AND p."PEGE_ID" = e."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								  ) desc',
			),
		);

		$criteria=new CDbCriteria;
		
		$criteria->select = 't.*, (SELECT COUNT('."'PENS_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee
								   WHERE t."PENS_ID" = p."PENS_ID" AND p."PEGE_ID" = e."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								  )  "AFILIADOS"';

		$criteria->compare('"PENS_ID"',$this->PENS_ID);
		$criteria->compare('"PENS_NIT"',$this->PENS_NIT,true);
		$criteria->compare('"PENS_CODIGO"',$this->PENS_CODIGO,true);
		$criteria->compare('"PENS_NOMBRE"',$this->PENS_NOMBRE,true);
		$criteria->compare('"PENS_FECHACAMBIO"',$this->PENS_FECHACAMBIO,true);
		$criteria->compare('"PENS_REGISTRADOPOR"',$this->PENS_REGISTRADOPOR);

			return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 30,),
		));
	}
}