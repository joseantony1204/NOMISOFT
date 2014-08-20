<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMPARAMETROSGLOBALESVALORES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMPARAMETROSGLOBALESVALORES':
 * @Propiedad integer $PAGV_ID
 * @Propiedad integer $PAGV_ANIO
 * @Propiedad integer $PAGV_VALOR
 * @Propiedad integer $PAGL_ID
 * @Propiedad string $PAGV_FECHACAMBIO
 * @Propiedad integer $PAGV_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PARAMETROSGLOBALES $pAGL
 */
class Parametrosglobalesvalores extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Parametrosglobalesvalores la clase del modelo estàtico.
	 */
	public $VINCULO; 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMPARAMETROSGLOBALESVALORES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PAGV_ANIO, PAGV_VALOR, PAGL_ID, PAGV_FECHACAMBIO, PAGV_REGISTRADOPOR', 'required'),
			array('PAGV_ANIO, PAGL_ID, PAGV_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PAGV_ID, PAGV_ANIO, PAGV_VALOR, PAGL_ID, PAGV_FECHACAMBIO, PAGV_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'pAGL' => array(self::BELONGS_TO, 'PARAMETROSGLOBALES', 'PAGL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'PAGV_ID' => 'PAGV',
						'PAGV_ANIO' => 'AÑO',
						'PAGV_VALOR' => 'PAGV VALOR',
						'PAGL_ID' => 'PAGL',
						'PAGV_FECHACAMBIO' => 'PAGV FECHACAMBIO',
						'PAGV_REGISTRADOPOR' => 'PAGV REGISTRADOPOR',
						
						'VINCULO' => 'VALORES',
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

		$criteria->compare('PAGV_ID',$this->PAGV_ID);
		$criteria->compare('PAGV_ANIO',$this->PAGV_ANIO);
		$criteria->compare('PAGV_VALOR',$this->PAGV_VALOR);
		$criteria->compare('PAGL_ID',$this->PAGL_ID);
		$criteria->compare('PAGV_FECHACAMBIO',$this->PAGV_FECHACAMBIO,true);
		$criteria->compare('PAGV_REGISTRADOPOR',$this->PAGV_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function buscar()
	{
		//Advertencia: Por favor, modifique el siguiente código para quitar atributos que
        //No debe ser buscado.
        
		$sort = new CSort();
		$sort->defaultOrder = 't."PAGV_ANIO" DESC';
		$sort->attributes = array(
			
			'PAGV_ANIO'=>array(
				'asc'=>'t."PAGV_ANIO"',
				'desc'=>'t."PAGV_ANIO" desc',
			),
		);	
		$criteria=new CDbCriteria;
		$criteria->select = '"PAGV_ANIO"';
		$criteria->group = '"PAGV_ANIO"';

		$criteria->compare('"PAGV_ID"',$this->PAGV_ID);
		$criteria->compare('"PAGV_ANIO"',$this->PAGV_ANIO);
		$criteria->compare('"PAGV_VALOR"',$this->PAGV_VALOR);
		$criteria->compare('"PAGL_ID"',$this->PAGL_ID);
		$criteria->compare('"PAGV_FECHACAMBIO"',$this->PAGV_FECHACAMBIO,true);
		$criteria->compare('"PAGV_REGISTRADOPOR"',$this->PAGV_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' =>3),
		));
	}
	
	public function getLink()
	{
		$imageUrl = 'ir.png';
        return Yii::app()->baseurl.'/images/'.$imageUrl;		
	}
	
	
	public function obtenerParametrosglobales($anio)
	 {
		$connection = Yii::app()->db;
		$sql = '
		        SELECT pgv."PAGV_ID", pg."PAGL_NOMBRE", "PAGV_VALOR", "PAGV_ANIO",  pgv."PAGL_ID"
                FROM "TBL_NOMPARAMETROSGLOBALESVALORES" pgv, "TBL_NOMPARAMETROSGLOBALES" pg
                WHERE pg."PAGL_ID" = pgv."PAGL_ID" AND "PAGV_ANIO" =  '.$anio.'
                ORDER BY  pg."PAGL_ID" ASC
			   ';
		
	    $result = $connection->createCommand($sql)->queryAll();	
		return $result;	
	 }
}