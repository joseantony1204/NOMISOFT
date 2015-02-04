<?php
set_time_limit(0);
/**
 * Esta es la clase de modelo para la tabla "TBL_NOMRETROACTIVOSPUNTOSNOMINA".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMRETROACTIVOSPUNTOSNOMINA':
 * @Propiedad string $RPNO_ID
 * @Propiedad string $RPNO_PERIODO
 * @Propiedad string $RPNO_PUNTOS
 * @Propiedad string $RPNO_VALORPUNTO
 * @Propiedad string $RPNO_FECHAPROCESO
 * @Propiedad boolean $RPNO_ESTADO
 * @Propiedad string $RPNO_MESINICIO
 * @Propiedad string $RPNO_MESFINAL
 * @Propiedad string $RPNO_FECHACAMBIO
 * @Propiedad integer $RPNO_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad RETROACTIVOSPUNTOSNOMINALIQUIDACIONES[] $rETROACTIVOSPUNTOSNOMINALIQUIDACIONESs
 */
class Retroactivospuntosnomina extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Retroactivospuntosnomina la clase del modelo estàtico.
	 */
	
    public $RPNO_ANIO, $RPNO_DETALLES;
    public $log; 
	public $mesesretroactivopuntos;	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMRETROACTIVOSPUNTOSNOMINA';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('RPNO_ID, RPNO_PERIODO, RPNO_PUNTOS, RPNO_VALORPUNTO, RPNO_FECHAPROCESO, RPNO_ESTADO, RPNO_MESINICIO, RPNO_MESFINAL, RPNO_FECHACAMBIO, RPNO_REGISTRADOPOR', 'required'),
			array('RPNO_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('RPNO_PERIODO', 'length', 'max'=>50),
			array('RPNO_MESINICIO, RPNO_MESFINAL', 'length', 'max'=>2),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('RPNO_ID, RPNO_PERIODO, RPNO_PUNTOS, RPNO_VALORPUNTO, RPNO_FECHAPROCESO, RPNO_ESTADO, RPNO_MESINICIO, RPNO_MESFINAL, RPNO_FECHACAMBIO, RPNO_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'rETROACTIVOSPUNTOSNOMINALIQUIDACIONESs' => array(self::HAS_MANY, 'RETROACTIVOSPUNTOSNOMINALIQUIDACIONES', 'RPNO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'RPNO_ID' => 'CODIGO',
						'RPNO_PERIODO' => 'PERIODO',
						'RPNO_PUNTOS' => 'PUNTOS',
						'RPNO_VALORPUNTO' => 'VALOR PUNTO',
						'RPNO_FECHAPROCESO' => 'F. PROCESO',
						'RPNO_ESTADO' => 'ESTADO',
						'RPNO_MESINICIO' => 'MES INICIO',
						'RPNO_MESFINAL' => 'MES FINAL',
						'RPNO_FECHACAMBIO' => 'RPNO FECHACAMBIO',
						'RPNO_REGISTRADOPOR' => 'RPNO REGISTRADOPOR',
						
						'RPNO_DETALLES' => 'DETALLES',
						'RPNO_ANIO' => 'AÑO',
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

		$criteria->compare('"RPNO_ID"',$this->RPNO_ID,true);
		$criteria->compare('"RPNO_PERIODO"',$this->RPNO_PERIODO,true);
		$criteria->compare('"RPNO_PUNTOS"',$this->RPNO_PUNTOS,true);
		$criteria->compare('"RPNO_VALORPUNTO"',$this->RPNO_VALORPUNTO,true);
		$criteria->compare('"RPNO_FECHAPROCESO"',$this->RPNO_FECHAPROCESO,true);
		$criteria->compare('"RPNO_ESTADO"',$this->RPNO_ESTADO);
		$criteria->compare('"RPNO_MESINICIO"',$this->RPNO_MESINICIO,true);
		$criteria->compare('"RPNO_MESFINAL"',$this->RPNO_MESFINAL,true);
		$criteria->compare('"RPNO_FECHACAMBIO"',$this->RPNO_FECHACAMBIO,true);
		$criteria->compare('"RPNO_REGISTRADOPOR"',$this->RPNO_REGISTRADOPOR);

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
		if($this->RPNO_ESTADO==0){
		 $imageUrl = 'spellcheck_error.png';
		}else{
		      $imageUrl = 'spellcheck.png';
			 }
        return Yii::app()->baseurl.'/images/nomina/'.$imageUrl;		
	}
	
	public function liquidarRetroactivospuntos($Retroactivospuntosnomina){
	  $this->log = "";
	  $connection = Yii::app()->db;
	  
	  $Retroactivospuntosnomina->RPNO_ID = $Retroactivospuntosnomina->RPNO_ANIO;
	  $sql = 'SELECT  "RPNO_ID", "RPNO_ESTADO" FROM "TBL_NOMRETROACTIVOSPUNTOSNOMINA" mn  WHERE "RPNO_ID" = '.$Retroactivospuntosnomina->RPNO_ID.' LIMIT 1';
	  $row = $connection->createCommand($sql)->queryRow();
	  $cont = 0;	  	  
	  if($Retroactivospuntosnomina->RPNO_MESFINAL<$Retroactivospuntosnomina->RPNO_MESINICIO){
		$this->log[$cont]=array('Fechas',"La fecha final no debe ser menor a la inicial :(",1);
	    $cont++;
	  }else{
		  if($row>0){
		   $this->log[$cont]=array($Retroactivospuntosnomina->RPNO_ID,"El retroactivo de puntos de <strong>".$Retroactivospuntosnomina->RPNO_ID."</strong> ya fue grabado",2);
		   $cont++;
		  }else{
				$Retroactivos = new Retroactivospuntosnomina;
				if($Retroactivospuntosnomina->RPNO_MESINICIO==$Retroactivospuntosnomina->RPNO_MESFINAL){
				 $Retroactivos->RPNO_PERIODO = $this->periodoNomina((int)$Retroactivospuntosnomina->RPNO_MESINICIO).' DE '.$Retroactivospuntosnomina->RPNO_ANIO;
				}else{
				      $Retroactivos->RPNO_PERIODO = $this->periodoNomina((int)$Retroactivospuntosnomina->RPNO_MESINICIO).' A '.$this->periodoNomina((int)$Retroactivospuntosnomina->RPNO_MESFINAL).' DE '.$Retroactivospuntosnomina->RPNO_ANIO;
					 }
				
				$Retroactivos->RPNO_ID = $Retroactivospuntosnomina->RPNO_ID;				
				$Retroactivos->RPNO_PUNTOS = $Retroactivospuntosnomina->RPNO_PUNTOS;				 
				$Retroactivos->RPNO_VALORPUNTO = $Retroactivospuntosnomina->RPNO_VALORPUNTO;	
				$Retroactivos->RPNO_FECHAPROCESO = $Retroactivospuntosnomina->RPNO_FECHAPROCESO;	
				$Retroactivos->RPNO_ESTADO = 0;	
				$Retroactivos->RPNO_FECHACAMBIO = $Retroactivospuntosnomina->RPNO_FECHACAMBIO;				 
				$Retroactivos->RPNO_REGISTRADOPOR = $Retroactivospuntosnomina->RPNO_REGISTRADOPOR;
				
				$Retroactivos->RPNO_MESINICIO = $Retroactivospuntosnomina->RPNO_MESINICIO;
				$Retroactivos->RPNO_MESFINAL = $Retroactivospuntosnomina->RPNO_MESFINAL;
				$Retroactivos->RPNO_ANIO = $Retroactivospuntosnomina->RPNO_ANIO;
				$sql = ''; $sqlaux = '';	 
				if($Retroactivos->save()){				 
				 for($i=(int)$Retroactivospuntosnomina->RPNO_MESINICIO;$i<=(int)$Retroactivospuntosnomina->RPNO_MESFINAL;$i++){
				  $mes = "0".$i."01";
				  $id = $Retroactivospuntosnomina->RPNO_ANIO.$mes;				  
				  if(($sql=='') &($i==1)){
				    $sql = ' mn."MENO_ID" = '.$id;
				  }else{
				        if($i!=1){
				         $sqlaux .= ' OR mn."MENO_ID" = '.$id;
					    }
					   }				  
				 }
                 $query = ' AND ('.$sql.$sqlaux.')';
                 $this->liquidarNomina($query, $Retroactivos);				 
				}else{
					  echo $msg = print_r($Retroactivos->getErrors(),1);
					 }		
	      }	  
	 }
	 return $this->log;
	}
	
	private function liquidarNomina($query,$Retroactivospuntosnomina){
	$connection = Yii::app()->db;
	$Personasgenerales = new Personasgenerales;
	
	/**
	*consultar todos los empleados que fueron liquidados en el periodo que vienes el retroactivo
	**/
	$sql = 'SELECT pg."PEGE_ID" 
             FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn
             WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID"
             AND mn."MENO_ID" = mnl."MENO_ID" '.$query.'  /*AND pg."PEGE_ID" = 1260*/ /*2860*/ /*1530*/
             AND ep."TICA_ID" = 2
			 GROUP BY pg."PEGE_ID"
             ORDER BY pg."PEGE_ID" ASC';	
	 $personas = $connection->createCommand($sql)->queryAll();	
	 /**
	 *Se empieza a recorrer el array para ir liquidando cada registro encontrado
	 **/
	 $cont = 1;
	 $periodo = $Retroactivospuntosnomina->RPNO_ANIO.$Retroactivospuntosnomina->RPNO_MESFINAL.'01';
	 
	 foreach($personas AS $persona){	  
	  $Personasgenerales->loadPersonageneral($persona["PEGE_ID"]);
	  $this->getnovedades($Personasgenerales); 
	  
	  $devengado = $this->getdevengadoretroactivopuntos($Personasgenerales,$Retroactivospuntosnomina);	  	   
	  $prestaciones = $this->getvaloresretroactivopuntosnomina($query,$Personasgenerales,$Retroactivospuntosnomina);
	  $this->setRetroactivopuntos($cont,$devengado,$prestaciones,$Retroactivospuntosnomina,$Personasgenerales);
	 
	  /*
	  for($i=0;$i<count($devengado);$i++){
	   echo $devengado[$i].'<br>';
	  }
	  */
	  /*
	  for($i=0;$i<count($prestaciones);$i++){
	   echo $prestaciones[$i].'<br>';
	  }
	  $cont++;*/
	 }
	}
	
	private function getdevengadoretroactivopuntos($Personasgeneral,$Retroactivospuntosnomina){
	 /**
	 *Inicializamos el modelo Mensualnomina y cargamos el ultimo cargo del emleado
	 **/
	 $Mensualnomina = new Mensualnomina;
	 $Parametrosglobales = new Parametrosglobales; 	 
	 $Mensualnomina->cargarEmpleoPlanta($Personasgeneral->Empleoplanta->EMPL_ID);
	 $Mensualnomina->valorestablecidos = $Parametrosglobales->getParametrosglobales(date("Y", strtotime($Retroactivospuntosnomina->RPNO_FECHAPROCESO)));
	 
	 /**
	 *Obtenemos sueldo y calculamos el retroactivo puntos por los dias correspondiente
	 **/
	 
	 $sueldo = ($Retroactivospuntosnomina->RPNO_PUNTOS)*($Retroactivospuntosnomina->RPNO_VALORPUNTO);
	 $sueldo = ($sueldo)*($this->mesesretroactivopuntos);
	 $sueldo = round($sueldo);
	 
	 /**
	 *Obtenemos la prima de antiguedad y calculamos el retroactivo puntos por los dias correspondiente
	 **/
	 $prantiguedad = $Mensualnomina->getPrimaAntiguedad();
	 $antiguedad = ($prantiguedad[0])*(0.25);
	 if($antiguedad!=0){
	  $antiguedad = ($sueldo)*(0.25);	 
	 }	 
	 $antiguedad = round($antiguedad);  
	 
	 /**
	 *Retornando todos los valores calculados del retroactivo puntos en un array 
	 **/
	 $devengado = array($sueldo,$antiguedad,);
	 return $devengado;
    }
	
	private function getvaloresretroactivopuntosnomina($query,$Personasgenerales,$Retroactivospuntosnomina){
	 $connection = Yii::app()->db;
	 
	 /**
	 *Consulta bsp
	 *que se hallas liquidado en el periodo de liquidacion de retroactivo puntos
	 *del empleado 
	 **/
	 $sqlbsp = 'SELECT pg."PEGE_ID", SUM("MENL_BONIFICACION") AS "MENL_BONIFICACION"
				   FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn 
                   WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" 
                   '.$query.' AND pg."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
                   GROUP BY pg."PEGE_ID" 
                   ORDER BY pg."PEGE_ID" ASC';
     $fila = $connection->createCommand($sqlbsp)->queryRow();
	 
	 $actbonificacion = round($fila["MENL_BONIFICACION"]);
	 /**
	 *Obtenemos bonificacion actual y calculamos el retroactivo puntos por los meses correspondiente
	 **/
	 
	 $proypuntos = $Personasgenerales->Empleoplanta->EMPL_PUNTOS+$Retroactivospuntosnomina->RPNO_PUNTOS;
	 $proybonificacion = ($actbonificacion)*($proypuntos)/($Personasgenerales->Empleoplanta->EMPL_PUNTOS);
	 $bonificacion = ($proybonificacion)-($actbonificacion);
	 $bonificacion = round($bonificacion);
	 
	 /**
	 *Obtenemos prima semestral actual y calculamos el retroactivo puntos por los meses correspondiente
	 **/
	 
	 $sqlps = 'SELECT (snl."SENL_SALARIO"+snl."SENL_PRIMAANTIGUEDAD"+snl."SENL_TRANSPORTE"+snl."SENL_ALIMENTACION"+snl."SENL_PRIMATECNICA"+
	                   snl."SENL_GASTOSRP"+snl."SENL_BONIFICACION") AS "SENL_DEVENGADO"
			  FROM "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" snl, "TBL_NOMSEMESTRALNOMINA" sn,  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" "p"
			  WHERE sn."SENO_ID" = snl."SENO_ID" AND snl."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID" 
			  AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
              AND sn."SENO_ANIO" = '.$Retroactivospuntosnomina->RPNO_ANIO.'		  
			  ';
	 $actprimasemestral = $connection->createCommand($sqlps)->queryScalar();
     
	 $proypuntos = $Personasgenerales->Empleoplanta->EMPL_PUNTOS+$Retroactivospuntosnomina->RPNO_PUNTOS;
	 $proyprimasemestral = ($actprimasemestral)*($proypuntos)/($Personasgenerales->Empleoplanta->EMPL_PUNTOS);
	 $primasemestral = ($proyprimasemestral)-($actprimasemestral);
	 $primasemestral = round($primasemestral);
	 
	 /**
	 *Obtenemos prima vacaciones actual y calculamos el retroactivo puntos por los meses correspondiente
	 **/
	 
	 $sqlpv = ' SELECT SUM("PRIMAVACACIONES") AS "PRIMAVACACIONES" FROM (
	  SELECT rnl."RANL_PRIMAVACACIONES" AS "PRIMAVACACIONES"
	  FROM "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" "rnl"
	       INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON mnl."MENL_ID" = rnl."MENL_ID"
		   INNER JOIN "TBL_NOMRETROACTIVOSNOMINA" "rn" ON rnl."RANO_ID" = rn."RANO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"	  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	  WHERE rn."RANO_ID" = '.$Retroactivospuntosnomina->RPNO_ANIO.' AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.' 
	  
	  UNION ALL
      
	  SELECT SUM("MENL_PRIMAVACACIONES") AS "PRIMAVACACIONES"
      FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl"
		   INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE mn."MENO_ANIO" = '.$Retroactivospuntosnomina->RPNO_ANIO.' AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.' 
		   
	  UNION ALL
      
	  SELECT(pvnl."PVNL_SALARIO"+pvnl."PVNL_PRIMAANTIGUEDAD"+pvnl."PVNL_TRANSPORTE"+pvnl."PVNL_ALIMENTACION"+pvnl."PVNL_PRIMATECNICA"+
	         pvnl."PVNL_GASTOSRP"+pvnl."PVNL_BONIFICACION"+pvnl."PVNL_SEMESTRAL") AS "PRIMAVACACIONES"					   
      FROM "TBL_NOMPRIMAVACACIONESNOMINALIQUIDACIONES" "pvnl"
		   INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINA" "pvn" ON pvnl."PVNO_ID" = pvn."PVNO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON pvnl."EMPL_ID" = ep."EMPL_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE pvn."PVNO_ANIO" = '.$Retroactivospuntosnomina->RPNO_ANIO.' AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.' 	  
	  ) t
	  ';
	  
	 $actprimavacaciones = $connection->createCommand($sqlpv)->queryScalar();
     
	 $proypuntos = $Personasgenerales->Empleoplanta->EMPL_PUNTOS+$Retroactivospuntosnomina->RPNO_PUNTOS;
	 $proyprimavacaciones = ($actprimavacaciones)*($proypuntos)/($Personasgenerales->Empleoplanta->EMPL_PUNTOS);
	 $primavacaciones = ($proyprimavacaciones)-($actprimavacaciones);
	 $primavacaciones = round($primavacaciones);
	 
	 /**
	 *Obtenemos vacaciones actual y calculamos el retroactivo puntos por los meses correspondiente
	 **/
	 $sqlv = 'SELECT (vnl."VANL_SALARIO"+vnl."VANL_PRIMAANTIGUEDAD"+vnl."VANL_TRANSPORTE"+vnl."VANL_ALIMENTACION"+vnl."VANL_PRIMATECNICA"
					  +vnl."VANL_GASTOSRP"+vnl."VANL_BONIFICACION"+vnl."VANL_SEMESTRAL"
					  ) AS "VANL_DEVENGADO"
               FROM "TBL_NOMVACACIONESNOMINALIQUIDACIONES" vnl, "TBL_NOMVACACIONESNOMINA" vn,  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" "p"
			   WHERE vn."VANO_ID" = vnl."VANO_ID" AND vnl."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID" 
			   AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
               AND vn."VANO_ANIO" = '.$Retroactivospuntosnomina->RPNO_ANIO.'
			  ';
	 $actvacaciones = $connection->createCommand($sqlv)->queryScalar();
	 
	 $proypuntos = $Personasgenerales->Empleoplanta->EMPL_PUNTOS+$Retroactivospuntosnomina->RPNO_PUNTOS;
	 $proyvacaciones = ($actvacaciones)*($proypuntos)/($Personasgenerales->Empleoplanta->EMPL_PUNTOS);
	 $vacaciones = ($proyvacaciones)-($actvacaciones);
	 $vacaciones = round($vacaciones); 
	 
	 /**
	 *Obtenemos prima navidad actual y calculamos el retroactivo puntos por los meses correspondiente
	 **/
	 $sqlpn = 'SELECT (nnl."NANL_SALARIO"+nnl."NANL_PRIMAANTIGUEDAD"+nnl."NANL_TRANSPORTE"+nnl."NANL_ALIMENTACION"+nnl."NANL_PRIMATECNICA"+
	                   nnl."NANL_GASTOSRP"+nnl."NANL_BONIFICACION"+nnl."NANL_SEMESTRAL"+nnl."NANL_PRIMAVACACIONES") AS "NANL_DEVENGADO"
			   FROM "TBL_NOMNAVIDADNOMINALIQUIDACIONES" nnl, "TBL_NOMNAVIDADNOMINA" nn,  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" "p"
			   WHERE nn."NANO_ID" = nnl."NANO_ID" AND nnl."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID" 
			   AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
               AND nn."NANO_ANIO" = '.$Retroactivospuntosnomina->RPNO_ANIO.'
			  ';
	 $actprimanavidad = $connection->createCommand($sqlpn)->queryScalar();
	 
	 $proypuntos = $Personasgenerales->Empleoplanta->EMPL_PUNTOS+$Retroactivospuntosnomina->RPNO_PUNTOS;
	 $proyprimanavidad = ($actprimanavidad)*($proypuntos)/($Personasgenerales->Empleoplanta->EMPL_PUNTOS);
	 $primanavidad = ($proyprimanavidad)-($actprimanavidad);
	 $primanavidad = round($primanavidad);
	 
	 /**
	 *Obtenemos cesantias actual y calculamos el retroactivo puntos por los meses correspondiente
	 **/
	 $sqlpn = 'SELECT (cnl."CENL_SALARIO"+cnl."CENL_PRIMAANTIGUEDAD"+cnl."CENL_TRANSPORTE"+cnl."CENL_ALIMENTACION"+cnl."CENL_PRIMATECNICA"+
				      cnl."CENL_GASTOSRP"+cnl."CENL_BONIFICACION"+cnl."CENL_HORASEXTRAS"+cnl."CENL_SEMESTRAL"+cnl."CENL_PRIMAVACACIONES"+
					  cnl."CENL_PRIMANAVIDAD") AS "CENL_DEVENGADO"
			   FROM "TBL_NOMCESANTIASNOMINALIQUIDACIONES" cnl, "TBL_NOMCESANTIASNOMINA" cn,  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" "p"
			   WHERE cn."CENO_ID" = cnl."CENO_ID" AND cnl."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID" 
			   AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
               AND cn."CENO_ANIO" = '.$Retroactivospuntosnomina->RPNO_ANIO.'
			  ';
	 $actcesantias = $connection->createCommand($sqlpn)->queryScalar();
	 
	 $proypuntos = $Personasgenerales->Empleoplanta->EMPL_PUNTOS+$Retroactivospuntosnomina->RPNO_PUNTOS;
	 $proycesantias = ($actcesantias)*($proypuntos)/($Personasgenerales->Empleoplanta->EMPL_PUNTOS);
	 $cesantias = ($proycesantias)-($actcesantias);
	 $cesantias = round($cesantias);
	 
	 /**
	 *Retornando todos los valores obtenidos del retroactivo en un array 
	 **/
	 $prestaciones = array($bonificacion,$primasemestral,$primavacaciones,$vacaciones,$primanavidad,$cesantias,);
	 return $prestaciones;     
	}
	
	private function getnovedades($Personasgenerales){
	 $connection = Yii::app()->db;
	 $this->mesesretroactivopuntos = NULL;	 
	 /**
	 *Consulta los meses que se le liquidaran al empleado desde la tabla  TBL_NOMNOVEDADESRETROACTIVOPUNTOS
	 **/
	  $sql = 'SELECT "NORP_MESES" 
                       FROM "TBL_NOMNOVEDADESRETROACTIVOPUNTOS" nrp 
                       WHERE nrp."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
	         ';
     $meses = $connection->createCommand($sql)->queryScalar();
     $this->mesesretroactivopuntos = $meses; 
	}
	
	private function setRetroactivopuntos($iterador,$devengado,$prestaciones,$Retroactivospuntosnomina,$Personasgenerales){
	 $connection = Yii::app()->db;
	 $Retroactivospuntosnominaliquidaciones = new Retroactivospuntosnominaliquidaciones;
	
	 /**
	 *consulta de los descuentos de retroactivo puntos del empleado
	 */
	 $string='SELECT dp."DEPR_ID", ROUND(np."NOPR_VALOR") AS "NOPR_VALOR"
	         FROM "TBL_NOMNOVEDADESPRESTACIONES" np, "TBL_NOMDESCUENTOSPRESTACIONES" dp
		     WHERE dp."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID"  = '.$Personasgenerales->Personageneral->PEGE_ID.' AND dp."TIPR_ID" = 6
		     ORDER BY dp."DEPR_ID" ASC';
	 $descuentos = $connection->createCommand($string)->queryAll();	
	 
	 $Retroactivospuntosnominaliquidaciones->RPNL_CODIGO = $iterador;
	 $Retroactivospuntosnominaliquidaciones->RPNL_MESES = $this->mesesretroactivopuntos;
	 $Retroactivospuntosnominaliquidaciones->RPNL_PUNTOS = $Retroactivospuntosnomina->RPNO_PUNTOS;
	 $Retroactivospuntosnominaliquidaciones->RPNL_SUELDO = $Personasgenerales->Empleoplanta->EMPL_SUELDO;
	 $Retroactivospuntosnominaliquidaciones->RPNL_SALARIO = $devengado[0];
	 $Retroactivospuntosnominaliquidaciones->RPNL_PRIMAANTIGUEDAD = $devengado[1];
	 $Retroactivospuntosnominaliquidaciones->RPNL_BONIFICACION = $prestaciones[0];
	 $Retroactivospuntosnominaliquidaciones->RPNL_PRIMASEMESTRAL = $prestaciones[1];
	 $Retroactivospuntosnominaliquidaciones->RPNL_PRIMAVACACIONES = $prestaciones[2];
	 $Retroactivospuntosnominaliquidaciones->RPNL_VACACIONES = $prestaciones[3];
	 $Retroactivospuntosnominaliquidaciones->RPNL_PRIMANAVIDAD = $prestaciones[4];
	 $Retroactivospuntosnominaliquidaciones->RPNL_CESANTIAS = $prestaciones[5];
	 $Retroactivospuntosnominaliquidaciones->RPNO_ID = $Retroactivospuntosnomina->RPNO_ID;
	 $Retroactivospuntosnominaliquidaciones->EMPL_ID = $Personasgenerales->Empleoplanta->EMPL_ID;
	 $Retroactivospuntosnominaliquidaciones->RPNL_FECHACAMBIO = date('Y-m-d H:i:s');
	 $Retroactivospuntosnominaliquidaciones->RPNL_REGISTRADOPOR = Yii::app()->user->id;
	 
	 if($Retroactivospuntosnominaliquidaciones->save()){	
	  foreach($descuentos as $descuento){
		 $Retroactivospuntosnominadescuentos = new Retroactivospuntosnominadescuentos;		 
		 $Retroactivospuntosnominadescuentos->RPND_VALOR = $descuento["NOPR_VALOR"];
         $Retroactivospuntosnominadescuentos->DEPR_ID = $descuento["DEPR_ID"];
         $Retroactivospuntosnominadescuentos->RPNL_ID = $Retroactivospuntosnominaliquidaciones->RPNL_ID;
         $Retroactivospuntosnominadescuentos->RPND_FECHACAMBIO = $Retroactivospuntosnominaliquidaciones->RPNL_FECHACAMBIO;
         $Retroactivospuntosnominadescuentos->RPND_REGISTRADOPOR = $Retroactivospuntosnominaliquidaciones->RPNL_REGISTRADOPOR;
         if($Retroactivospuntosnominadescuentos->save()){		 
		 }else{
		      echo $msg = print_r($Retroactivospuntosnominadescuentos->getErrors(),1);			  
			  }      
		}	 
	  }else{
		    echo $msg = print_r($Retroactivospuntosnominaliquidaciones->getErrors(),1);
		   }
	}
}