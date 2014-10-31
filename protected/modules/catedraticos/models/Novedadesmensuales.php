<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMNOVEDADESMENSUALES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMNOVEDADESMENSUALES':
 * @Propiedad integer $NOME_ID
 * @Propiedad string $NOME_VALOR
 * @Propiedad integer $DEME_ID
 * @Propiedad integer $CATE_ID
 * @Propiedad string $NOME_FECHACAMBIO
 * @Propiedad integer $NOME_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad DESCUENTOSMENSUALES $dEME
 * @Propiedad EMPLEOSPLANTA $eMPL
 */
class Novedadesmensuales extends CActiveRecord 
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Novedadesmensuales la clase del modelo estàtico.
	 */
	public $VINCULO, $PEGE_ID, $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @Devuelve CDbConnection conexiòn a la base de datos.
	 */
	public static $db3; 
	public function getDbConnection()
	{ 
	 if(self::$db3 !== null){ 
	  return self::$db3; 
	 }else{ 
	       self::$db3 = Yii::app()->db3; 
	       if (self::$db3 instanceof CDbConnection)
	       { 
		    self::$db3->setActive(true); 
			return self::$db3; 
	       }else{  
		         throw new CDbException(Yii::t('yii','Active Record requires a "db3" CDbConnection application component.')); 
	            } 
	      } 
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_CATNOVEDADESMENSUALES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('NOME_VALOR, DEME_ID, CATE_ID, NOME_FECHACAMBIO, NOME_REGISTRADOPOR', 'required'),
			array('DEME_ID, CATE_ID, NOME_VALOR, NOME_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('NOME_ID, NOME_VALOR, DEME_ID, CATE_ID, NOME_FECHACAMBIO, NOME_REGISTRADOPOR,
			      PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'search'),
			
			array('NOME_ID, NOME_VALOR, DEME_ID, CATE_ID, NOME_FECHACAMBIO, NOME_REGISTRADOPOR,
			      PEGE_ID, PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'buscar'),
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
			'dEME' => array(self::BELONGS_TO, 'DESCUENTOSMENSUALES', 'DEME_ID'),
			'cATE' => array(self::BELONGS_TO, 'CATEGORIAS', 'CATE_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'NOME_ID' => 'ID',
						'NOME_VALOR' => 'VALOR',
						'DEME_ID' => 'DESCUENTO',
						'CATE_ID' => 'CATEDRA',
						'NOME_FECHACAMBIO' => 'NOME FECHACAMBIO',
						'NOME_REGISTRADOPOR' => 'NOME REGISTRADOPOR',
						
						'VINCULO' => '...',
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
        
		$criteria->select = 't.*, p.*';
	    $criteria->join = 'INNER JOIN "TBL_CATCATEGORIAS" "c" ON c."CATE_ID" = t."CATE_ID"
		                   INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON p."PEGE_ID" = c."PEGE_ID"';
	 
	    //$criteria->group = 'p."PEGE_ID"';
		$criteria->compare('"NOME_ID"',$this->NOME_ID);
		$criteria->compare('"NOME_VALOR"',$this->NOME_VALOR,true);
		$criteria->compare('"DEME_ID"',$this->DEME_ID);
		$criteria->compare('"CATE_ID"',$this->CATE_ID);
		$criteria->compare('"NOME_FECHACAMBIO"',$this->NOME_FECHACAMBIO,true);
		$criteria->compare('"NOME_REGISTRADOPOR"',$this->NOME_REGISTRADOPOR);
		
		$criteria->compare('"PEGE_IDENTIFICACION"',$this->PEGE_IDENTIFICACION);
		$criteria->compare('"PEGE_PRIMERNOMBRE"',$this->PEGE_PRIMERNOMBRE);
		$criteria->compare('"PEGE_SEGUNDONOMBRE"',$this->PEGE_SEGUNDONOMBRE);
		$criteria->compare('"PEGE_PRIMERAPELLIDO"',$this->PEGE_PRIMERAPELLIDO);
		$criteria->compare('"PEGE_SEGUNDOAPELLIDOS"',$this->PEGE_SEGUNDOAPELLIDOS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 30,),
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
        $criteria->select = '* FROM (SELECT p.*, pa.*';
		 
	    $criteria->join = 'INNER JOIN "TBL_CATCATEDRAS" "c" ON c."CATE_ID" = t."CATE_ID"
		                   INNER JOIN "TBL_CATPERIODOSACADEMICOS" "pa" ON pa."PEAC_ID" = c."PEAC_ID"
		                   INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON p."PEGE_ID" = c."PEGE_ID"
						   ';
		$criteria->group = 'p."PEGE_ID", pa."PEAC_ID" ) s WHERE "PEAC_ESTADO" = 1';
		
		
		
		
		$criteria->compare('"NOME_ID"',$this->NOME_ID);
		$criteria->compare('"NOME_VALOR"',$this->NOME_VALOR,true);
		$criteria->compare('"DEME_ID"',$this->DEME_ID);
		$criteria->compare('"CATE_ID"',$this->CATE_ID);
		$criteria->compare('"NOME_FECHACAMBIO"',$this->NOME_FECHACAMBIO,true);
		
		$criteria->compare('p."PEGE_ID"',$this->PEGE_ID);
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
	 
	 public function obtenerNovedadesMensuales($catedraId)
	 {
		$connection = Yii::app()->db3;
		//echo "<br><br><br>";
	    $sql = '
		        SELECT dm."NOME_ID", d."DEME_ID", d."DEME_NOMBRE", dm."NOME_VALOR", dm."CATE_ID"
				FROM "TBL_CATNOVEDADESMENSUALES" dm, "TBL_CATDESCUENTOSMENSUALES" d
				WHERE d."DEME_ID" = dm."DEME_ID" AND dm."CATE_ID" = '.$catedraId.' ORDER BY d."DEME_NOMBRE" ASC';
		
	    $result = $connection->createCommand($sql)->queryAll();	
		return $result;	
	 }
	   
}