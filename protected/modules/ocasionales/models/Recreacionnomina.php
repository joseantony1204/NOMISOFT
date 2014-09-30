<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMRECREACIONNOMINA".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMRECREACIONNOMINA':
 * @Propiedad string $RENO_ID
 * @Propiedad string $RENO_PERIODO
 * @Propiedad string $RENO_FECHAPROCESO
 * @Propiedad boolean $RENO_ESTADO
 * @Propiedad integer $RENO_ANIO
 * @Propiedad string $RENO_FECHACAMBIO
 * @Propiedad integer $RENO_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad RECREACIONNOMINALIQUIDACIONES[] $rECREACIONNOMINALIQUIDACIONESs
 */
class Recreacionnomina extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Recreacionnomina la clase del modelo estàtico.
	 */
	public $codigo, $error; 
	public $RENO_DETALLES;
	public $liquidacion, $descuentos;
	public $devengados;
	public $success, $warning, $flag;
	public $s, $w, $f; 
	public $diasrecreacion, $valorestablecidos; 
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
		return 'TBL_NOMRECREACIONNOMINA';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('RENO_ID, RENO_PERIODO, RENO_FECHAPROCESO, RENO_ESTADO, RENO_ANIO, RENO_FECHACAMBIO, RENO_REGISTRADOPOR', 'required'),
			array('RENO_ANIO, RENO_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('RENO_PERIODO', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('RENO_ID, RENO_PERIODO, RENO_FECHAPROCESO, RENO_ESTADO, RENO_ANIO, RENO_FECHACAMBIO, RENO_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'rECREACIONNOMINALIQUIDACIONESs' => array(self::HAS_MANY, 'RECREACIONNOMINALIQUIDACIONES', 'RENO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'RENO_ID' => 'CODIGO',
						'RENO_PERIODO' => 'PERIODO',
						'RENO_FECHAPROCESO' => 'FECHA PROCESO',
						'RENO_ESTADO' => 'ESTADO',
						'RENO_ANIO' => 'AÑO',
						'RENO_FECHACAMBIO' => 'RENO FECHACAMBIO',
						'RENO_REGISTRADOPOR' => 'RENO REGISTRADOPOR',
						'RENO_DETALLES' => 'DETALLES',
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
		$sort->defaultOrder = 't."RENO_ID" DESC';
		$sort->attributes = array(
			
			'RENO_ID'=>array(
				'asc'=>'t."RENO_ID"',
				'desc'=>'t."RENO_ID" desc',
			),
			
			'RENO_PERIODO'=>array(
				'asc'=>'t."RENO_PERIODO"',
				'desc'=>'t."RENO_PERIODO" desc',
			),
			
			'RENO_FECHAPROCESO'=>array(
				'asc'=>'t."RENO_FECHAPROCESO"',
				'desc'=>'t."RENO_FECHAPROCESO" desc',
			),
			
			'RENO_ESTADO'=>array(
				'asc'=>'t."RENO_ESTADO"',
				'desc'=>'t."RENO_ESTADO" desc',
			),
			
			'RENO_ANIO'=>array(
				'asc'=>'t."RENO_ANIO"',
				'desc'=>'t."RENO_ANIO" desc',
			),
		);

		$criteria=new CDbCriteria;

		$criteria->compare('"RENO_ID"',$this->RENO_ID,true);
		$criteria->compare('"RENO_PERIODO"',$this->RENO_PERIODO,true);
		$criteria->compare('"RENO_FECHAPROCESO"',$this->RENO_FECHAPROCESO,true);
		$criteria->compare('"RENO_ESTADO"',$this->RENO_ESTADO);
		$criteria->compare('"RENO_ANIO"',$this->RENO_ANIO);
		$criteria->compare('"RENO_FECHACAMBIO"',$this->RENO_FECHACAMBIO,true);
		$criteria->compare('"RENO_REGISTRADOPOR"',$this->RENO_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 50)
		));
	}
	
	public function getEstado()
	{
		if($this->RENO_ESTADO==0){
		 $imageUrl = 'spellcheck_error.png';
		}else{
		      $imageUrl = 'spellcheck.png';
			 }
        return Yii::app()->baseurl.'/images/nomina/'.$imageUrl;		
	}
	
	public function validarNomina($Recreacionnomina){
	  $this->error = "";
	  $connection = Yii::app()->db2;
	  
	  $sql = 'SELECT  "RENO_ID", "RENO_ESTADO" FROM "TBL_NOMRECREACIONNOMINA" rn ORDER BY  "RENO_ID" DESC LIMIT 1';
	  $rows = $connection->createCommand($sql)->queryRow();  
	  
      if (count($rows)>0){
	   if (($rows["RENO_ID"])==($Recreacionnomina->RENO_ID)){
	     $this->error="Parece que ya se ha liquidado una nomina para este periodo : ".$Recreacionnomina->RENO_PERIODO;
	    }
      }
     return $this->error;	  
	}
	
	
	public function liquidarNomina($Recreacionnomina){
	 $connection = Yii::app()->db2; 
	 $this->success = NULL; $this->warning = NULL; $this->flag = NULL;
	 $this->s = 0; $this->w = 0; $this->f = 0;
	 $Personasgenerales = new Personasgenerales;
	 $Parametrosglobales = new Parametrosglobales; 	 
     $this->valorestablecidos = $Parametrosglobales->getParametrosglobales(date("Y", strtotime($Recreacionnomina->RENO_FECHAPROCESO)));
    
	/**
	 *consultar todos los empleados que fueron liquidados en el periodo que vienes el retroactivo
	 **/
	 $sql = 'SELECT pg."PEGE_ID" 
	         FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl
             WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" /* AND pg."PEGE_ID" = 1130*//*1420 2990 1130 1580*/
             GROUP BY pg."PEGE_ID"
             ORDER BY pg."PEGE_ID" ASC';	
	 $personas = $connection->createCommand($sql)->queryAll();	
	 /**
	 *Se empieza a recorrer el array para ir liquidando cada registro encontrado
	 **/	 
	 $iterador = 1;
	 $this->codigo = 1;
	
	 foreach($personas AS $persona){	  
	  $Personasgenerales->loadPersonageneral($persona["PEGE_ID"]);
	  $sw = 0;
	 // echo $Personasgenerales->Estadoempleoplanta->ESEP_ID.' '.$Personasgenerales->Estadoempleoplanta->ESEM_ID.' '.$Personasgenerales->Empleoplanta->EMPL_ID."<br>";
	  if($Personasgenerales->Estadoempleoplanta->ESEM_ID!=1){
	   $sw = 1;
	   if(((date("Y", strtotime($Personasgenerales->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("Y", strtotime($Recreacionnomina->RENO_FECHAPROCESO)))) &
	     ((date("m", strtotime($Personasgenerales->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("m", strtotime($Recreacionnomina->RENO_FECHAPROCESO))))){
	     $sw = 0; 			 
	   }
	  }
	  
	  /*si todo esta bn se procede a calcular la nomina para la persona*/
	  if(($sw==0) & ($Personasgenerales->Tipocargo->TICA_ID==1)){
	   $this->getnovedades($Personasgenerales); 
	   $basico = round($this->getSueldoBasico($Personasgenerales,$Recreacionnomina));	   
	   $tdevengado=round($basico)+round($subTransporte)+round($prAlimenta)+round($primatec)+round($gastosrp)+round($prantiguedad[1])+round($bonserv)+round($primasemestral);
	   $retefuente = round($this->getRetefuente($Personasgenerales,$Recreacionnomina,$tdevengado));
	   
	   $this->devengados[$iterador] = array($basico,$retefuente,$tdevengado);
	   
	   $this->setLiquidacion($Personasgenerales,$Recreacionnomina,$this->devengados[$iterador]);
       $this->codigo = $this->codigo+1;	   
       $iterador = $iterador+1;
	  }
	 }
	}
	
	private function getSueldoBasico($Personasgenerales,$Recreacionnomina){
			$sueldo = ($Personasgenerales->Empleoplanta->EMPL_SUELDO)*(($this->diasrecreacion)/30);
		return ($sueldo);
    }
	
	/**
	 *Inicio de metodos de calculo de retencion en la fuente
	*/	
	 
	private	function getRetefuente($Personasgenerales,$Recreacionnomina,$tdevengado){	
	return 0;
	}
	
	private function getnovedades($Personasgenerales){
	 $connection = Yii::app()->db2;
	 $this->diasrecreacion = NULL;	 
	 /**
	 *Consulta los meses que se le liquidaran al empleado desde la tabla  TBL_NOMNOVEDADESVACACIONES
	 **/			   
     $this->diasrecreacion = 2; 
	}
	
	private function setLiquidacion($Personasgenerales,$Recreacionnomina,$devengados){
	     $connection = Yii::app()->db2;
		 $Recreacionnominaliquidaciones = new Recreacionnominaliquidaciones;
 
		 $Recreacionnominaliquidaciones->RENL_CODIGO = $this->codigo;
		 $Recreacionnominaliquidaciones->RENL_DIAS = $this->diasrecreacion;
		 $Recreacionnominaliquidaciones->RENL_PUNTOS = $Personasgenerales->Empleoplanta->EMPL_PUNTOS;
		 $Recreacionnominaliquidaciones->RENL_SUELDO = $Personasgenerales->Empleoplanta->EMPL_SUELDO;
		 $Recreacionnominaliquidaciones->RENL_SALARIO = $devengados[0];	
		 $Recreacionnominaliquidaciones->RENL_RETEFUENTE = $devengados[1];
		 $Recreacionnominaliquidaciones->RENO_ID = $Recreacionnomina->RENO_ID; 
		 $Recreacionnominaliquidaciones->EMPL_ID = $Personasgenerales->Empleoplanta->EMPL_ID;
		 $Recreacionnominaliquidaciones->RENL_FECHACAMBIO = date('Y-m-d H:i:s');
		 $Recreacionnominaliquidaciones->RENL_REGISTRADOPOR = Yii::app()->user->id;
		 if($Recreacionnominaliquidaciones->save()){
		  
		  /**
		  *verificar que los valores de las liquidacion 
		  *de los empleados nos sean negativos o contengan algun error
		  */
		  if($devengados[2]<($devengados[1])){
		    $this->w+=1;
	  	    $this->warning[$this->w-1][0] = $Personasgenerales->Personageneral->PEGE_IDENTIFICACION;
		    $this->warning[$this->w-1][1] = $Personasgenerales->Empleoplanta->EMPL_CARGO;
		    $this->warning[$this->w-1][2] = $Personasgenerales->Personageneral->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->Personageneral->PEGE_PRIMERAPELLIDO;
		    $this->warning[$this->w-1][3] = $devengados[2];
		    $this->warning[$this->w-1][4] = ($devengados[1]);
		  }else{
		        $this->s+=1; 
				$this->success[$this->s-1][0] = $Personasgenerales->Personageneral->PEGE_IDENTIFICACION;
		        $this->success[$this->s-1][1] = $Personasgenerales->Empleoplanta->EMPL_CARGO;
		       }			   
		 }else{ 
		        $msg = print_r($Recreacionnominaliquidaciones->getErrors(),1);
                throw new CHttpException(400,'data not saving: '.$msg );
			    $this->f+=1;
	  	        $this->flag[$this->f-1][0] = $Personasgenerales->Personageneral->PEGE_IDENTIFICACION;
		        $this->flag[$this->f-1][1] = $Personasgenerales->Empleoplanta->EMPL_CARGO;
		        $this->flag[$this->f-1][2] = $Personasgenerales->Personageneral->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->Personageneral->PEGE_PRIMERAPELLIDO;
		        $this->flag[$this->f-1][3] = $Recreacionnominaliquidaciones->getErrors();
		      }	
    }
}