<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMFACTORESRETEFUENTE".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMFACTORESRETEFUENTE':
 * @Propiedad integer $FARE_ID
 * @Propiedad string $FARE_NOMBRE
 * @Propiedad string $FARE_DESCRIPCION
 * @Propiedad integer $FARE_TOPEDESCUENTO
 * @Propiedad string $FARE_FECHACAMBIO
 * @Propiedad integer $FARE_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad DESCUENTOSRETEFUENTE[] $dESCUENTOSRETEFUENTEs
 */
class Factoresretefuente extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Factoresretefuente la clase del modelo estàtico.
	 */
	public $SUMATORIA, $AFILIADOS, $RESET, $PASS, $DOWNLOAD;
	public $retefuente;
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
		return 'TBL_NOMFACTORESRETEFUENTE';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('FARE_NOMBRE, FARE_DESCRIPCION, FARE_TOPEDESCUENTO, FARE_FECHACAMBIO, FARE_REGISTRADOPOR', 'required'),
			array('FARE_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('FARE_NOMBRE', 'length', 'max'=>30),
			array('FARE_DESCRIPCION', 'length', 'max'=>1000),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('FARE_ID, FARE_NOMBRE, FARE_DESCRIPCION, FARE_TOPEDESCUENTO, FARE_FECHACAMBIO, FARE_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'dESCUENTOSRETEFUENTEs' => array(self::HAS_MANY, 'DESCUENTOSRETEFUENTE', 'FARE_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'FARE_ID' => 'ID',
						'FARE_NOMBRE' => 'FACTOR',
						'FARE_DESCRIPCION' => 'DESCRIPCION',
						'FARE_TOPEDESCUENTO' => 'TOPE DESCUENTO',
						'SUMATORIA' => 'V. TOTAL',
						'AFILIADOS' => 'EMPLEADOS',
						'FARE_FECHACAMBIO' => 'FARE FECHACAMBIO',
						'FARE_REGISTRADOPOR' => 'FARE REGISTRADOPOR',
						
						'RESET' => 'RESET',
						'PASS' => 'CONTRASEÑA DE ADMINISTRADOR',
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
		$sort->defaultOrder = 't."FARE_ID" ASC';
		$sort->attributes = array(
			
			'FARE_ID'=>array(
				'asc'=>'t."FARE_ID"',
				'desc'=>'t."FARE_ID" desc',
			),
			
			'FARE_NOMBRE'=>array(
				'asc'=>'t."FARE_NOMBRE"',
				'desc'=>'t."FARE_NOMBRE" desc',
			),
			
			'FARE_DESCRIPCION'=>array(
				'asc'=>'t."FARE_DESCRIPCION"',
				'desc'=>'t."FARE_DESCRIPCION" desc',
			),
			
			'FARE_TOPEDESCUENTO'=>array(
				'asc'=>'t."FARE_TOPEDESCUENTO"',
				'desc'=>'t."FARE_TOPEDESCUENTO" desc',
			),
			
			'SUMATORIA'=>array(
				'asc'=>'(SELECT SUM("DERE_VALOR")
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee, "TBL_NOMDESCUENTOSRETEFUENTE" dr
								   WHERE t."FARE_ID" = dr."FARE_ID" AND dr."PEGE_ID" = p."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								   AND e."PEGE_ID" = p."PEGE_ID" AND dr."DERE_VALOR">0 GROUP BY dr."FARE_ID"
								  )',
				'desc'=>'(SELECT SUM("DERE_VALOR")
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee, "TBL_NOMDESCUENTOSRETEFUENTE" dr
								   WHERE t."FARE_ID" = dr."FARE_ID" AND dr."PEGE_ID" = p."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								   AND e."PEGE_ID" = p."PEGE_ID" AND dr."DERE_VALOR">0 GROUP BY dr."FARE_ID"
								  ) desc',
			),	
			
			'AFILIADOS'=>array(
				'asc'=>'(SELECT COUNT('."'PEGE_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee, "TBL_NOMDESCUENTOSRETEFUENTE" dr
								   WHERE t."FARE_ID" = dr."FARE_ID" AND dr."PEGE_ID" = p."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								   AND e."PEGE_ID" = p."PEGE_ID" AND dr."DERE_VALOR">0 GROUP BY dr."FARE_ID"
								  )',
				'desc'=>'(SELECT COUNT('."'PEGE_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee, "TBL_NOMDESCUENTOSRETEFUENTE" dr
								   WHERE t."FARE_ID" = dr."FARE_ID" AND dr."PEGE_ID" = p."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								   AND e."PEGE_ID" = p."PEGE_ID" AND dr."DERE_VALOR">0 GROUP BY dr."FARE_ID"
								  ) desc',
			),
		);

		$criteria=new CDbCriteria;
		
		$criteria->select = 't.*, (SELECT COUNT('."'PEGE_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee, "TBL_NOMDESCUENTOSRETEFUENTE" dr
								   WHERE t."FARE_ID" = dr."FARE_ID" AND dr."PEGE_ID" = p."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								   AND e."PEGE_ID" = p."PEGE_ID" AND dr."DERE_VALOR">0 GROUP BY dr."FARE_ID"
								  )  "AFILIADOS",
								  
								  (SELECT SUM("DERE_VALOR")
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee, "TBL_NOMDESCUENTOSRETEFUENTE" dr
								   WHERE t."FARE_ID" = dr."FARE_ID" AND dr."PEGE_ID" = p."PEGE_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								   AND e."PEGE_ID" = p."PEGE_ID" AND dr."DERE_VALOR">0 GROUP BY dr."FARE_ID"
								  )  "SUMATORIA"';

		$criteria->compare('"FARE_ID"',$this->FARE_ID);
		$criteria->compare('"FARE_NOMBRE"',$this->FARE_NOMBRE,true);
		$criteria->compare('"FARE_DESCRIPCION"',$this->FARE_DESCRIPCION,true);
		$criteria->compare('"FARE_TOPEDESCUENTO"',$this->FARE_TOPEDESCUENTO,true);
		$criteria->compare('"FARE_FECHACAMBIO"',$this->FARE_FECHACAMBIO,true);
		$criteria->compare('"FARE_REGISTRADOPOR"',$this->FARE_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 30,),
		));
	}
	
	public function defaultFactoresRetefuente($Factorretefuente)
	{
     $criteria = new CDbCriteria();
	 $criteria->select = 't."PEGE_ID"';
	 $criteria->order = 't."PEGE_ID"';
	 $criteria->group = 't."PEGE_ID"';
	 $Personasgenerales = Descuentosretefuente::model()->findAll($criteria);	 
	 
	 foreach($Personasgenerales as  $persona){
	    $Descuentosretefuente = new Descuentosretefuente;
		$Descuentosretefuente->DERE_VALOR = 0;
		$Descuentosretefuente->FARE_ID = $Factorretefuente->FARE_ID;
		$Descuentosretefuente->PEGE_ID = $persona->PEGE_ID;
		$Descuentosretefuente->DERE_FECHACAMBIO = date('Y-m-d H:i:s');
		$Descuentosretefuente->DERE_REGISTRADOPOR = Yii::app()->user->id;
		$Descuentosretefuente->save(); 
	  }
	}
	
	public function getAfiliados($retefuente){
	$connection = Yii::app()->db2;
     $sql = 'SELECT p."PEGE_IDENTIFICACION", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", fr."FARE_NOMBRE", dr."DERE_VALOR"			 
			 FROM "TBL_NOMPERSONASGENERALES" p,  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMDESCUENTOSRETEFUENTE" dr, "TBL_NOMFACTORESRETEFUENTE" fr, "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
			 WHERE p."PEGE_ID" = dr."PEGE_ID" AND p."PEGE_ID" = ep."PEGE_ID" AND dr."FARE_ID" = fr."FARE_ID" AND fr."FARE_ID" = '.$retefuente.' AND dr."DERE_VALOR"!=0
			 AND ep."EMPL_ID" = eep."EMPL_ID" AND eep."ESEM_ID" = 1
			 ORDER BY p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE" ASC
	        ';
		
	 $query = $connection->createCommand($sql)->queryAll();
	 $this->retefuente = NULL;
	 $array = array('IDENTIFICACION','NOMBRE','SEGUNDO NOMBRE','APELLIDO', 'SEGUNDO APELLIDO', 'RETEFUENTE','TOTAL');
	 $j=0; $i=0;
	 foreach ($array as $values=>$value) {	
	  $this->retefuente[$j][$i] = $value;
	  $i++;  
	 }
	 
	 $j=1;
	 $total=0;;
	 foreach ($query as $values) {	
	  $i=0;
	  foreach ($values as $value) {      	 
	   if($i==6){
	    $total = $total+$value; 
	    $this->retefuente[$j][6] = $value;
	   }else{	   
	         $this->retefuente[$j][$i] = $value;
	        } 
	   $i++;
	  }
      $j++;	 
     }	 
    }
	
	public function resetFactorretefuente(){
	 $connection = Yii::app()->db2;
	 $sql = 'UPDATE "TBL_NOMDESCUENTOSRETEFUENTE" SET "DERE_VALOR" = 0 WHERE "FARE_ID" = '.$this->FARE_ID.' AND "DERE_VALOR" != 0;';
	 if($connection->createCommand($sql)->execute()){
	  return TRUE;
	 }else{
	       return FALSE;
		  }	
    }
}