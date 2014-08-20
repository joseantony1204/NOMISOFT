<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMDESCUENTOSRETEFUENTE".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMDESCUENTOSRETEFUENTE':
 * @Propiedad integer $DERE_ID
 * @Propiedad string $DERE_VALOR
 * @Propiedad integer $FARE_ID
 * @Propiedad integer $PEGE_ID
 * @Propiedad string $DERE_FECHACAMBIO
 * @Propiedad integer $DERE_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad FACTORESRETEFUENTE $fARE
 * @Propiedad PERSONASGENERALES $pEGE
 */
class Descuentosretefuente extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Descuentosretefuente la clase del modelo estàtico.
	 */
	public $VINCULO, $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS; 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMDESCUENTOSRETEFUENTE';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('DERE_VALOR, FARE_ID, PEGE_ID, DERE_FECHACAMBIO, DERE_REGISTRADOPOR', 'required'),
			array('FARE_ID, PEGE_ID, DERE_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('DERE_ID, DERE_VALOR, FARE_ID, PEGE_ID, DERE_FECHACAMBIO, DERE_REGISTRADOPOR,
			PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'search'),
			
			array('DERE_ID, DERE_VALOR, FARE_ID, PEGE_ID, DERE_FECHACAMBIO, DERE_REGISTRADOPOR,
			PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'buscar'),
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
			'fARE' => array(self::BELONGS_TO, 'FACTORESRETEFUENTE', 'FARE_ID'),
			'pEGE' => array(self::BELONGS_TO, 'PERSONASGENERALES', 'PEGE_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'DERE_ID' => 'ID',
						'DERE_VALOR' => 'VALOR',
						'FARE_ID' => 'FACTOR RETEFUENTE',
						'PEGE_ID' => 'PEGE',
						'DERE_FECHACAMBIO' => 'DERE FECHACAMBIO',
						'DERE_REGISTRADOPOR' => 'DERE REGISTRADOPOR',
						
						'VINCULO' => 'IR',
						'PEGE_IDENTIFICACION' => 'No. IDENTIFICACION',
						'PEGE_PRIMERNOMBRE' => 'PRIMER NOMBRE',
						'PEGE_SEGUNDONOMBRE' => 'SEGUNDO NOMBRE',
						'PEGE_PRIMERAPELLIDO' => 'PRIMER APELLIDO',
						'PEGE_SEGUNDOAPELLIDOS' => 'SEGUNDO APELLIDO',
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

		$criteria->compare('"DERE_ID"',$this->DERE_ID);
		$criteria->compare('"DERE_VALOR"',$this->DERE_VALOR,true);
		$criteria->compare('"FARE_ID"',$this->FARE_ID);
		$criteria->compare('"PEGE_ID"',$this->PEGE_ID);
		$criteria->compare('"DERE_FECHACAMBIO"',$this->DERE_FECHACAMBIO,true);
		$criteria->compare('"DERE_REGISTRADOPOR"',$this->DERE_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function buscar()
	{
		//Advertencia: Por favor, modifique el siguiente código para quitar atributos que
        //No debe ser buscado.
		
		$sort = new CSort();
		$sort->attributes = array(
			'defaultOrder'=>'p.PEGE_PRIMERNOMBRE ASC',
			
			'PEGE_IDENTIFICACION'=>array(
				'asc'=>'p."PEGE_IDENTIFICACION"',
				'desc'=>'p."PEGE_IDENTIFICACION" desc',
			),
			
			'PEGE_PRIMERNOMBRE'=>array(
				'asc'=>'p."PEGE_PRIMERNOMBRE"',
				'desc'=>'p."PEGE_PRIMERNOMBRE" desc',
			),
			
			'PEGE_SEGUNDONOMBRE'=>array(
				'asc'=>'p."PEGE_SEGUNDONOMBRE"',
				'desc'=>'p."PEGE_SEGUNDONOMBRE" desc',
			),
			
			'PEGE_PRIMERAPELLIDO'=>array(
				'asc'=>'p."PEGE_PRIMERAPELLIDO"',
				'desc'=>'p."PEGE_PRIMERAPELLIDO" desc',
			),
			
			'PEGE_SEGUNDOAPELLIDOS'=>array(
				'asc'=>'p."PEGE_SEGUNDOAPELLIDOS"',
				'desc'=>'p."PEGE_SEGUNDOAPELLIDOS" desc',
			),
        );

		$criteria = new CDbCriteria;
        $criteria->select = 'p.*';
	    $criteria->join = 'INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON p."PEGE_ID" = t."PEGE_ID"
		                   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON ep."PEGE_ID" = p."PEGE_ID"
						   INNER JOIN "TBL_NOMESTADOSEMPLEOSPLANTA" "eep" ON eep."EMPL_ID" = ep."EMPL_ID" AND eep."ESEM_ID" = 1';
		$criteria->group = 'p."PEGE_ID"';

		$criteria->compare('"DERE_ID"',$this->DERE_ID);
		$criteria->compare('"DERE_VALOR"',$this->DERE_VALOR,true);
		$criteria->compare('"FARE_ID"',$this->FARE_ID);
		$criteria->compare('P."PEGE_ID"',$this->PEGE_ID);
		$criteria->compare('"DERE_FECHACAMBIO"',$this->DERE_FECHACAMBIO,true);
		$criteria->compare('"DERE_REGISTRADOPOR"',$this->DERE_REGISTRADOPOR);
		
		$criteria->compare('"PEGE_IDENTIFICACION"',$this->PEGE_IDENTIFICACION,true);
		$criteria->compare('"PEGE_PRIMERNOMBRE"',$this->PEGE_PRIMERNOMBRE,true);
		$criteria->compare('"PEGE_SEGUNDONOMBRE"',$this->PEGE_SEGUNDONOMBRE,true);
		$criteria->compare('"PEGE_PRIMERAPELLIDO"',$this->PEGE_PRIMERAPELLIDO,true);
		$criteria->compare('"PEGE_SEGUNDOAPELLIDOS"',$this->PEGE_SEGUNDOAPELLIDOS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 2,),
		));
	}
	
	public function getLink()
	{
		$imageUrl = 'ir.png';
        return Yii::app()->baseurl.'/images/'.$imageUrl;		
	}
	
	public function obtenerDescuentosRetefuente($personaGeneral)
	 {
		$connection = Yii::app()->db;
		$sql = '
		        SELECT dr."DERE_ID", f."FARE_ID", f."FARE_NOMBRE", f."FARE_TOPEDESCUENTO", dr."DERE_VALOR", dr."PEGE_ID"
				FROM "TBL_NOMDESCUENTOSRETEFUENTE" dr, "TBL_NOMFACTORESRETEFUENTE" f
				WHERE f."FARE_ID" = dr."FARE_ID" AND dr."PEGE_ID" = '.$personaGeneral.' ORDER BY f."FARE_NOMBRE" ASC';
		
	    $result = $connection->createCommand($sql)->queryAll();	
		return $result;	
	 }
}