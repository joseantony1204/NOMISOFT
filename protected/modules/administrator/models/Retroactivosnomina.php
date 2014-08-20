<?php
set_time_limit(0);
/**
 * Esta es la clase de modelo para la tabla "TBL_NOMRETROACTIVOSNOMINA".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMRETROACTIVOSNOMINA':
 * @Propiedad string $RANO_ID
 * @Propiedad string $RANO_PERIODO
 * @Propiedad string $RANO_AUMENTO
 * @Propiedad string $RANO_AUMENTOPUNTO
 * @Propiedad string $RANO_FECHAPROCESO
 * @Propiedad boolean $RANO_ESTADO
 * @Propiedad boolean $RANO_MESINICIO
 * @Propiedad boolean $RANO_MESFINAL
 * @Propiedad string $RANO_FECHACAMBIO
 * @Propiedad integer $RANO_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad RETROACTIVOSNOMINALIQUIDACIONES[] $rETROACTIVOSNOMINALIQUIDACIONESs
 */
class Retroactivosnomina extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Retroactivosnomina la clase del modelo estàtico.
	 */
	public $RANO_ANIO, $RANO_DETALLES; 
	public $log; 
	public $diasretroactivo; 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMRETROACTIVOSNOMINA';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('RANO_ID, RANO_PERIODO, RANO_AUMENTO, RANO_AUMENTOPUNTO, RANO_FECHAPROCESO, RANO_ESTADO, RANO_MESINICIO, RANO_MESFINAL, RANO_FECHACAMBIO, RANO_REGISTRADOPOR', 'required'),
			array('RANO_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('RANO_PERIODO', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('RANO_ID, RANO_PERIODO, RANO_AUMENTO, RANO_AUMENTOPUNTO, RANO_FECHAPROCESO, RANO_ESTADO, RANO_FECHACAMBIO, RANO_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'rETROACTIVOSNOMINALIQUIDACIONESs' => array(self::HAS_MANY, 'RETROACTIVOSNOMINALIQUIDACIONES', 'RANO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'RANO_ID' => 'CODIGO',
						'RANO_PERIODO' => 'PERIODO',
						'RANO_AUMENTO' => 'AUMENTO',
						'RANO_AUMENTOPUNTO' => 'AUM. PUNTO',
						'RANO_FECHAPROCESO' => 'F. PROCESO',
						'RANO_ESTADO' => 'ESTADO',
						'RANO_MESINICIO' => 'DESDE',
						'RANO_MESFINAL' => 'HASTA',
						'RANO_ANIO' => 'AÑO',
						'RANO_DETALLES' => 'DETALLES',
						'RANO_FECHACAMBIO' => 'FECHA CAMBIO',
						'RANO_REGISTRADOPOR' => 'REGISTRADO POR',
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
		
		$criteria->select = 't.*';		
		$criteria->order = 't."RANO_ID" DESC ';

		$criteria->compare('RANO_ID',$this->RANO_ID,true);
		$criteria->compare('RANO_PERIODO',$this->RANO_PERIODO,true);
		$criteria->compare('RANO_AUMENTO',$this->RANO_AUMENTO,true);
		$criteria->compare('RANO_AUMENTOPUNTO',$this->RANO_AUMENTOPUNTO,true);
		$criteria->compare('RANO_FECHAPROCESO',$this->RANO_FECHAPROCESO,true);
		$criteria->compare('RANO_ESTADO',$this->RANO_ESTADO); 
		$criteria->compare('RANO_MESINICIO',$this->RANO_MESINICIO);
		$criteria->compare('RANO_MESFINAL',$this->RANO_MESFINAL);
		$criteria->compare('RANO_FECHACAMBIO',$this->RANO_FECHACAMBIO,true);
		$criteria->compare('RANO_REGISTRADOPOR',$this->RANO_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function periodoNomina($mes){
		
	 switch ($mes) {
	    case 1:
	        $mes="ENERO";
	        break;
	    case 2:
	        $mes="FEBRERO";
	        break;
	    case 3:
	        $mes="MARZO";
	        break;
	     case 4:
	        $mes="ABRIL";
	        break;
	    case 5:
	        $mes="MAYO";
	        break;
	    case 6:
	        $mes="JUNIO";
	        break;
	    case 7:
	        $mes="JULIO";
	        break;
	    case 8:
	        $mes="AGOSTO";
	        break;
	    case 9:
	        $mes="SEPTIEMBRE";
	        break;
	    case 10:
	        $mes="OCTUBRE";
	        break;
	    case 11:
	        $mes="NOVIEMBRE";
	        break;
	    case 12:
	        $mes="DICIEMBRE";
	        break;
		}
		return $mes;
	}
	
	public function getEstado()
	{
		if($this->RANO_ESTADO==0){
		 $imageUrl = 'spellcheck_error.png';
		}else{
		      $imageUrl = 'spellcheck.png';
			 }
        return Yii::app()->baseurl.'/images/nomina/'.$imageUrl;		
	}
	
	public function liquidarRetroactivos($Retroactivosnomina){
	  $this->log = "";
	  $connection = Yii::app()->db;
	  
	  $Retroactivosnomina->RANO_ID = $Retroactivosnomina->RANO_ANIO;
	  $sql = 'SELECT  "RANO_ID", "RANO_ESTADO" FROM "TBL_NOMRETROACTIVOSNOMINA" mn  WHERE "RANO_ID" = '.$Retroactivosnomina->RANO_ID.' LIMIT 1';
	  $row = $connection->createCommand($sql)->queryRow();
	  $cont = 0;	  	  
	  if($Retroactivosnomina->RANO_MESFINAL<$Retroactivosnomina->RANO_MESINICIO){
		$this->log[$cont]=array('Fechas',"La fecha final no debe ser menor a la inicial :(",1);
	    $cont++;
	  }else{
		  if($row>0){
		   $this->log[$cont]=array($Retroactivosnomina->RANO_ID,"El retroactivo de <strong>".$Retroactivosnomina->RANO_ID."</strong> ya fue grabado",2);
		   $cont++;
		  }else{
				$Retroactivos = new Retroactivosnomina;
				if($Retroactivosnomina->RANO_MESINICIO==$Retroactivosnomina->RANO_MESFINAL){
				 $Retroactivos->RANO_PERIODO = $this->periodoNomina((int)$Retroactivosnomina->RANO_MESINICIO).' DE '.$Retroactivosnomina->RANO_ANIO;
				}else{
				      $Retroactivos->RANO_PERIODO = $this->periodoNomina((int)$Retroactivosnomina->RANO_MESINICIO).' A '.$this->periodoNomina((int)$Retroactivosnomina->RANO_MESFINAL).' DE '.$Retroactivosnomina->RANO_ANIO;
					 }
				
				$Retroactivos->RANO_ID = $Retroactivosnomina->RANO_ID;				
				$Retroactivos->RANO_AUMENTO = $Retroactivosnomina->RANO_AUMENTO;				 
				$Retroactivos->RANO_AUMENTOPUNTO = $Retroactivosnomina->RANO_AUMENTOPUNTO;	
				$Retroactivos->RANO_FECHAPROCESO = $Retroactivosnomina->RANO_FECHAPROCESO;	
				$Retroactivos->RANO_ESTADO = "FALSE";	
				$Retroactivos->RANO_FECHACAMBIO = $Retroactivosnomina->RANO_FECHACAMBIO;				 
				$Retroactivos->RANO_REGISTRADOPOR = $Retroactivosnomina->RANO_REGISTRADOPOR;
				
				$Retroactivos->RANO_MESINICIO = $Retroactivosnomina->RANO_MESINICIO;
				$Retroactivos->RANO_MESFINAL = $Retroactivosnomina->RANO_MESFINAL;
				$Retroactivos->RANO_ANIO = $Retroactivosnomina->RANO_ANIO;
				$sql = ''; $sqlaux = '';	 
				if($Retroactivos->save()){				 
				 for($i=(int)$Retroactivosnomina->RANO_MESINICIO;$i<=(int)$Retroactivosnomina->RANO_MESFINAL;$i++){
				  $mes = "0".$i."01";
				  $id = $Retroactivosnomina->RANO_ANIO.$mes;				  
				  if(($sql=='') &($i==1)){
				    $sql = 'mn."MENO_ID" = '.$id;
				  }else{
				        if($i!=1){
				         $sqlaux .= ' OR mn."MENO_ID" = '.$id;
					    }
					   }				  
				 }
                 $query = ' AND ('.$sql.$sqlaux.')';
                 $this->liquidarNomina($query, $Retroactivos);				 
				}else{
					  //echo $msg = print_r($Retroactivos->getErrors(),1);
					 }				
	      }	  
	 }
	 return $this->log;
	}
	
	private function liquidarNomina($query,$Retroactivosnomina){
	$connection = Yii::app()->db;
	$Personasgenerales = new Personasgenerales;
	/**
	*consultar todos los empleados que fueron liquidados en el periodo que vienes el retroactivo
	**/
	 $sql = 'SELECT pg."PEGE_ID" 
             FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn
             WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID"
             AND mn."MENO_ID" = mnl."MENO_ID" '.$query.' /* AND pg."PEGE_ID" = 2700*/ /*2860*/ /*1530*/
             GROUP BY pg."PEGE_ID"
             ORDER BY pg."PEGE_ID" ASC';	
	 $personas = $connection->createCommand($sql)->queryAll();	
	 /**
	 *Se empieza a recorrer el array para ir liquidando cada registro encontrado
	 **/
	 $cont = 1;
	 $periodo = $Retroactivosnomina->RANO_ANIO.$Retroactivosnomina->RANO_MESFINAL.'01';
	 foreach($personas AS $persona){	  
	  $Personasgenerales->loadPersonageneral($persona["PEGE_ID"]);
	  $this->getnovedades($Personasgenerales); 
	  
	  $devengado = $this->getdevengadoretroactivo($Personasgenerales,$Retroactivosnomina);	  	   
	  $heyprestaciones = $this->getvaloresretroactivonomina($query,$Personasgenerales,$Retroactivosnomina);
	  $lastnomina = $this->getLastnomina($query,$Personasgenerales);
	  $this->setRetroactivo($cont,$devengado,$heyprestaciones,$Retroactivosnomina,$Personasgenerales,$lastnomina);
	 
	 /*
	  for($i=0;$i<count($devengado);$i++){
	   echo $devengado[$i].'<br>';
	  }
	  
	  for($i=0;$i<count($heyprestaciones);$i++){
	   echo $heyprestaciones[$i].'<br>';
	  }*/
	  $cont++;
	 }
	}
	
	private function getnovedades($Personasgenerales){
	 $connection = Yii::app()->db;
	 $this->diasretroactivo = NULL;	 
	 /**
	 *Consulta los dias que se le liquidaran al empleado desde la tabla  TBL_NOMNOVEDADESRETROACTIVO
	 **/
	  $sql = 'SELECT "NORE_DIAS" 
                       FROM "TBL_NOMNOVEDADESRETROACTIVO" nr 
                       WHERE nr."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
	         ';
     $dias = $connection->createCommand($sql)->queryScalar();
     $this->diasretroactivo = $dias; 
	}
	
	private function getdevengadoretroactivo($Personasgeneral,$Retroactivosnomina){
	 /**
	 *Inicializamos el modelo Mensualnomina y cargamos el ultimo cargo del emleado
	 **/
	 $Mensualnomina = new Mensualnomina;
	 $Parametrosglobales = new Parametrosglobales; 	 
	 $Mensualnomina->cargarEmpleoPlanta($Personasgeneral->Empleoplanta->EMPL_ID);
	 $Mensualnomina->valorestablecidos = $Parametrosglobales->getParametrosglobales(date("Y", strtotime($Retroactivosnomina->RANO_FECHAPROCESO)));
	 $aumento = $Retroactivosnomina->RANO_AUMENTO/100;
	 
	 /**
	 *Obtenemos sueldo y calculamos el retroactivo por los dias correspondiente
	 **/
	 
	 $sueldo = ($Personasgeneral->Empleoplanta->EMPL_SUELDO)*(($this->diasretroactivo)/30);
	 $sueldo = ($sueldo*$aumento);
	 $sueldo = round($sueldo);
	 
	 /**
	 *Obtenemos la prima de antiguedad y calculamos el retroactivo por los dias correspondiente
	 **/
	 $prantiguedad = $Mensualnomina->getPrimaAntiguedad();
	 $antiguedad = ($prantiguedad[0])*(($this->diasretroactivo)/30);
	 $antiguedad = ($antiguedad*$aumento);
	 $antiguedad = round($antiguedad); 
	 
	 /**
	 *Obtenemos el subsidio de trasnporte y calculamos el retroactivo por los dias correspondiente
	 **/
	 $trasnporte = $Mensualnomina->getSubTransporte();
	 $trasnporte = ($trasnporte)*(($this->diasretroactivo)/30);
	 $trasnporte = ($trasnporte*$aumento);
	 $trasnporte = round($trasnporte);
	 
	 /**
	 *Obtenemos el subsidio de alimentacion y calculamos el retroactivo por los dias correspondiente
	 **/
	 $alimentacion = $Mensualnomina->getSubAlimentacion();
	 $alimentacion = ($alimentacion)*(($this->diasretroactivo)/30);
	 $alimentacion = ($alimentacion*$aumento);
	 $alimentacion = round($alimentacion);
	 
	 /**
	 *Obtenemos prima tecnica y calculamos el retroactivo por los dias correspondiente
	 **/
	 $primatecnica = $Mensualnomina->getPrimaTecnica();
	 $primatecnica = ($primatecnica)*(($this->diasretroactivo)/30);
	 $primatecnica = ($primatecnica*$aumento);
	 $primatecnica = round($primatecnica);
	 
	 /**
	 *Obtenemos gastos de representacion y calculamos el retroactivo por los dias correspondiente
	 **/
	 $gastosrepresentacion = $Mensualnomina->getGastosRepresentacion();
	 $gastosrepresentacion = ($gastosrepresentacion)*(($this->diasretroactivo)/30);
	 $gastosrepresentacion = ($gastosrepresentacion*$aumento);
	 $gastosrepresentacion = round($gastosrepresentacion);	 
	 
	 /**
	 *Retornando todos los valores calculados del retroactivo en un array 
	 **/
	 $devengado = array($sueldo,$antiguedad,$trasnporte,$alimentacion,$primatecnica,$gastosrepresentacion,);
	 return $devengado;
    }
	

	private function getvaloresretroactivonomina($query,$Personasgenerales,$Retroactivosnomina){
	 $connection = Yii::app()->db;
	 $aumento = $Retroactivosnomina->RANO_AUMENTO/100;
	 /**
	 *Consulta la sumatoria de las horas extras, bsp y prima vacaciones 
	 *que se hallas liquidado en el periodo de liquidacion de retroactivo
	 *del empleado 
	 **/
	 $sql = 'SELECT pg."PEGE_ID", SUM("MENL_HED") AS "MENL_HED", SUM("MENL_HEDTOTAL") AS "MENL_HEDTOTAL", SUM("MENL_HEN") AS "MENL_HEN", SUM("MENL_HENTOTAL") AS "MENL_HENTOTAL", 
                          SUM("MENL_HEDF") AS "MENL_HEDF", SUM("MENL_HEDFTOTAL") AS "MENL_HEDFTOTAL", SUM("MENL_HENF") AS "MENL_HENF", SUM("MENL_HENFTOTAL") AS "MENL_HENFTOTAL", 
                          SUM("MENL_DYF") AS "MENL_DYF", SUM("MENL_DYFTOTAL") AS "MENL_DYFTOTAL", SUM("MENL_REN") AS "MENL_REN", SUM("MENL_RENTOTAL") AS "MENL_RENTOTAL", 
                          SUM("MENL_RENDYF") AS "MENL_RENDYF", SUM("MENL_RENDYFTOTAL") AS "MENL_RENDYFTOTAL", SUM("MENL_BONIFICACION") AS "MENL_BONIFICACION", 
                          SUM("MENL_PRIMAVACACIONES") AS "MENL_PRIMAVACACIONES"
				   FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn 
                   WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" 
                   '.$query.' AND pg."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
                   GROUP BY pg."PEGE_ID" 
                   ORDER BY pg."PEGE_ID" ASC';
     $fila = $connection->createCommand($sql)->queryRow();
	 
	 $hed = round($fila["MENL_HEDTOTAL"]*$aumento);
	 $hen = round($fila["MENL_HENTOTAL"]*$aumento);
	 $hedf = round($fila["MENL_HEDFTOTAL"]*$aumento);
	 $henf = round($fila["MENL_HENFTOTAL"]*$aumento);
	 $dyf = round($fila["MENL_DYFTOTAL"]*$aumento);
	 $ren = round($fila["MENL_RENTOTAL"]*$aumento);
	 $rendyf = round($fila["MENL_RENDYFTOTAL"]*$aumento);
	 $bonificacion = round($fila["MENL_BONIFICACION"]*$aumento);
	 $primavacaciones = round($fila["MENL_PRIMAVACACIONES"]*$aumento);
	 
	 /**
	 *Retornando todos los valores obtenidos del retroactivo en un array 
	 **/
	 $heyprestaciones = array($hed,$hen,$hedf,$henf,$dyf,$ren,$rendyf,$bonificacion,$primavacaciones);
	 return $heyprestaciones;     
	}
	
	private function getLastnomina($query,$Personasgenerales){
	 $connection = Yii::app()->db;
	 $aumento = $Retroactivosnomina->RANO_AUMENTO/100;
	 /**
	 *Consulta la sumatoria de las horas extras, bsp y prima vacaciones 
	 *que se hallas liquidado en el periodo de liquidacion de retroactivo
	 *del empleado 
	 **/
	 $sql = 'SELECT mnl."MENL_ID"
				   FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn 
                   WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" 
                   '.$query.' AND pg."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.' 
                   ORDER BY mnl."MENL_ID" DESC
				   LIMIT 1';
     $liquidacion = $connection->createCommand($sql)->queryScalar();
	 /**
	 *Retornando ultima liquidacion del empleado 
	 **/
	 return $liquidacion;     
	}

	
	private function setRetroactivo($iterador,$devengado,$heyprestaciones,$Retroactivosnomina,$Personasgenerales,$lastnomina){
	$connection = Yii::app()->db;
	$Retroactivosnominaliquidaciones = new Retroactivosnominaliquidaciones;
	
	 /**
	 *consulta de los descuentos de retroactivo del empleado
	 */
	$string='SELECT dp."DEPR_ID", ROUND(np."NOPR_VALOR") AS "NOPR_VALOR"
	         FROM "TBL_NOMNOVEDADESPRESTACIONES" np, "TBL_NOMDESCUENTOSPRESTACIONES" dp
		     WHERE dp."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID"  = '.$Personasgenerales->Personageneral->PEGE_ID.' AND dp."TIPR_ID" = 5
		     ORDER BY dp."DEPR_ID" ASC';
	$descuentos = $connection->createCommand($string)->queryAll();	

	 $Retroactivosnominaliquidaciones->RANL_CODIGO = $iterador;
	 $Retroactivosnominaliquidaciones->RANL_DIAS = $this->diasretroactivo;
	 $Retroactivosnominaliquidaciones->RANL_SALARIO = $devengado[0];
	 $Retroactivosnominaliquidaciones->RANL_PRIMAANTIGUEDAD = $devengado[1];
	 $Retroactivosnominaliquidaciones->RANL_TRANSPORTE = $devengado[2];
	 $Retroactivosnominaliquidaciones->RANL_ALIMENTACION = $devengado[3];
	 $Retroactivosnominaliquidaciones->RANL_HEDTOTAL = $heyprestaciones[0];
	 $Retroactivosnominaliquidaciones->RANL_HENTOTAL = $heyprestaciones[1];
	 $Retroactivosnominaliquidaciones->RANL_HEDFTOTAL = $heyprestaciones[2];
	 $Retroactivosnominaliquidaciones->RANL_HENFTOTAL = $heyprestaciones[3];
	 $Retroactivosnominaliquidaciones->RANL_DYFTOTAL = $heyprestaciones[4];
	 $Retroactivosnominaliquidaciones->RANL_RENTOTAL = $heyprestaciones[5];
	 $Retroactivosnominaliquidaciones->RANL_RENDYFTOTAL = $heyprestaciones[6];
	 $Retroactivosnominaliquidaciones->RANL_PRIMATECNICA = $devengado[4];
	 $Retroactivosnominaliquidaciones->RANL_GASTOSRP = $devengado[5];
	 $Retroactivosnominaliquidaciones->RANL_BONIFICACION = $heyprestaciones[7];
	 $Retroactivosnominaliquidaciones->RANL_PRIMAVACACIONES = $heyprestaciones[8];
	 $Retroactivosnominaliquidaciones->RANO_ID = $Retroactivosnomina->RANO_ID;
	 $Retroactivosnominaliquidaciones->MENL_ID = $lastnomina;
	 $Retroactivosnominaliquidaciones->RANL_FECHACAMBIO = date('Y-m-d H:i:s');
	 $Retroactivosnominaliquidaciones->RANL_REGISTRADOPOR = Yii::app()->user->id;
	 
	 if($Retroactivosnominaliquidaciones->save()){	
	  foreach($descuentos as $descuento){
		 $Retroactivosnominadescuentos = new Retroactivosnominadescuentos;		 
		 $Retroactivosnominadescuentos->RAND_VALOR = $descuento["NOPR_VALOR"];
         $Retroactivosnominadescuentos->DEPR_ID = $descuento["DEPR_ID"];
         $Retroactivosnominadescuentos->RANL_ID = $Retroactivosnominaliquidaciones->RANL_ID;
         $Retroactivosnominadescuentos->RAND_FECHACAMBIO = $Retroactivosnominaliquidaciones->RANL_FECHACAMBIO;
         $Retroactivosnominadescuentos->RAND_REGISTRADOPOR = $Retroactivosnominaliquidaciones->RANL_REGISTRADOPOR;
         if($Retroactivosnominadescuentos->save()){		 
		 }else{
		      echo $msg = print_r($Retroactivosnominadescuentos->getErrors(),1);			  
			  }      
		}	 
	  }else{
		    echo $msg = print_r($Retroactivosnominaliquidaciones->getErrors(),1);
		   }	
	}
}









