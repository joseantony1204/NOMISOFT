<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMSALUD".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMSALUD':
 * @Propiedad integer $SALU_ID
 * @Propiedad string $SALU_NIT
 * @Propiedad string $SALU_CODIGO
 * @Propiedad string $SALU_NOMBRE
 * @Propiedad string $SALU_FECHACAMBIO
 * @Propiedad integer $SALU_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PERSONASGENERALES[] $pERSONASGENERALESs
 */
class Salud extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Salud la clase del modelo estàtico.
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
		return 'TBL_NOMSALUD';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('SALU_NOMBRE, SALU_FECHACAMBIO, SALU_REGISTRADOPOR', 'required'),
			array('SALU_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('SALU_NIT, SALU_NOMBRE', 'length', 'max'=>30),
			array('SALU_CODIGO', 'length', 'max'=>20),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('SALU_ID, SALU_NIT, SALU_CODIGO, SALU_NOMBRE, SALU_FECHACAMBIO, SALU_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'pERSONASGENERALESs' => array(self::HAS_MANY, 'PERSONASGENERALES', 'SALU_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'SALU_ID' => 'ID',
						'SALU_NIT' => 'NIT',
						'SALU_CODIGO' => 'CODIGO',
						'SALU_NOMBRE' => 'NOMBRE',
						'AFILIADOS' => 'EMPLEADOS',
						'SALU_FECHACAMBIO' => 'SALU FECHACAMBIO',
						'SALU_REGISTRADOPOR' => 'SALU REGISTRADOPOR',
						
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
			'defaultOrder'=>'t.SALU_NOMBRE ASC',
			
			'SALU_ID'=>array(
				'asc'=>'t."SALU_ID"',
				'desc'=>'t."SALU_ID" desc',
			),
			
			'SALU_NIT'=>array(
				'asc'=>'t."SALU_NIT"',
				'desc'=>'t."SALU_NIT" desc',
			),
			
			'SALU_CODIGO'=>array(
				'asc'=>'t."SALU_CODIGO"',
				'desc'=>'t."SALU_CODIGO" desc',
			),
			
			'SALU_NOMBRE'=>array(
				'asc'=>'t."SALU_NOMBRE"',
				'desc'=>'t."SALU_NOMBRE" desc',
			),	
			
			'AFILIADOS'=>array(
				'asc'=>'(SELECT COUNT('."'SALU_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee
								   WHERE t."SALU_ID" = p."SALU_ID" AND p."PEGE_ID" = e."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								  )',
				'desc'=>'(SELECT COUNT('."'SALU_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee
								   WHERE t."SALU_ID" = p."SALU_ID" AND p."PEGE_ID" = e."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								  ) desc',
			),
		);

		$criteria=new CDbCriteria;
		
		$criteria->select = 't.*, (SELECT COUNT('."'SALU_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee
								   WHERE t."SALU_ID" = p."SALU_ID" AND p."PEGE_ID" = e."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								  )  "AFILIADOS"';

		$criteria->compare('"SALU_ID"',$this->SALU_ID);
		$criteria->compare('"SALU_NIT"',$this->SALU_NIT,true);
		$criteria->compare('"SALU_CODIGO"',$this->SALU_CODIGO,true);
		$criteria->compare('"SALU_NOMBRE"',$this->SALU_NOMBRE,true);
		$criteria->compare('"SALU_FECHACAMBIO"',$this->SALU_FECHACAMBIO,true);
		$criteria->compare('"SALU_REGISTRADOPOR"',$this->SALU_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 30,),
		));
	}
}