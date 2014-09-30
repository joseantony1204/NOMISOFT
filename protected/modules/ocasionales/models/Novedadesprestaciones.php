<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMNOVEDADESPRESTACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMNOVEDADESPRESTACIONES':
 * @Propiedad integer $NOPR_ID
 * @Propiedad string $NOPR_VALOR
 * @Propiedad integer $DEPR_ID
 * @Propiedad integer $PEGE_ID
 * @Propiedad string $NOPR_FECHACAMBIO
 * @Propiedad integer $NOPR_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad DESCUENTOSPRESTACIONES $dEPR
 * @Propiedad PERSONASGENERALES $pEGE
 */
class Novedadesprestaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Novedadesprestaciones la clase del modelo estàtico.
	 */
	public $VINCULO, $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS;  
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
		return 'TBL_NOMNOVEDADESPRESTACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('DEPR_ID, PEGE_ID, NOPR_FECHACAMBIO, NOPR_REGISTRADOPOR', 'required'),
			array('DEPR_ID, PEGE_ID, NOPR_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('NOPR_VALOR', 'safe'),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('NOPR_ID, NOPR_VALOR, DEPR_ID, PEGE_ID, NOPR_FECHACAMBIO, NOPR_REGISTRADOPOR,
			      PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'search'),
			
			array('NOPR_ID, NOPR_VALOR, DEPR_ID, PEGE_ID, NOPR_FECHACAMBIO, NOPR_REGISTRADOPOR,
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
			'dEPR' => array(self::BELONGS_TO, 'DESCUENTOSPRESTACIONES', 'DEPR_ID'),
			'pEGE' => array(self::BELONGS_TO, 'PERSONASGENERALES', 'PEGE_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'NOPR_ID' => 'NOPR',
						'NOPR_VALOR' => 'NOPR VALOR',
						'DEPR_ID' => 'DEPR',
						'PEGE_ID' => 'PEGE',
						'NOPR_FECHACAMBIO' => 'NOPR FECHACAMBIO',
						'NOPR_REGISTRADOPOR' => 'NOPR REGISTRADOPOR',
						
						'VINCULO' => 'IR',
						'PEGE_IDENTIFICACION' => 'No. IDENTIFICACION',
						'PEGE_PRIMERNOMBRE' => 'NOMBRE',
						'PEGE_SEGUNDONOMBRE' => 'SEGUNDO NOMBRE',
						'PEGE_PRIMERAPELLIDO' => 'APELLIDO',
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

		$criteria->compare('NOPR_ID',$this->NOPR_ID);
		$criteria->compare('NOPR_VALOR',$this->NOPR_VALOR,true);
		$criteria->compare('DEPR_ID',$this->DEPR_ID);
		$criteria->compare('PEGE_ID',$this->PEGE_ID);
		$criteria->compare('NOPR_FECHACAMBIO',$this->NOPR_FECHACAMBIO,true);
		$criteria->compare('NOPR_REGISTRADOPOR',$this->NOPR_REGISTRADOPOR);

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

		$criteria->compare('"NOPR_ID"',$this->NOPR_ID);
		$criteria->compare('"NOPR_VALOR"',$this->NOPR_VALOR,true);
		$criteria->compare('"DEPR_ID"',$this->DEPR_ID);
		$criteria->compare('p."PEGE_ID"',$this->PEGE_ID);
		$criteria->compare('"NOPR_FECHACAMBIO"',$this->NOPR_FECHACAMBIO,true);
		$criteria->compare('"NOPR_REGISTRADOPOR"',$this->NOPR_REGISTRADOPOR);

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
	
	public function getNovedadesprestaciones($personaGeneral,$tipoPrestacion)
	 {
		$connection = Yii::app()->db2;
		$sql = 'SELECT np."NOPR_ID", dp."DEPR_ID", dp."DEPR_NOMBRE", np."NOPR_VALOR", dp."TIPR_ID", np."PEGE_ID"
				FROM "TBL_NOMDESCUENTOSPRESTACIONES" dp, "TBL_NOMNOVEDADESPRESTACIONES" np
				WHERE dp."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID" = '.$personaGeneral.' AND dp."TIPR_ID" = '.$tipoPrestacion.'
				ORDER BY dp."DEPR_NOMBRE" ASC
			   ';		
	    $result = $connection->createCommand($sql)->queryAll();	
		return $result;	
	 }
}