<?php
set_time_limit(0);
/**
 * Esta es la clase de modelo para la tabla "TBL_NOMMENSUALNOMINA".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMMENSUALNOMINA':
 * @Propiedad string $MENO_ID
 * @Propiedad string $MENO_PERIODO
 * @Propiedad string $MENO_FECHAPROCESO
 * @Propiedad boolean $MENO_ESTADO
 * @Propiedad integer $MENO_ANIO
 * @Propiedad string $MENO_FECHACAMBIO
 * @Propiedad integer $MENO_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad MENSUALNOMINALIQUIDACIONES[] $mENSUALNOMINALIQUIDACIONESs
 */
class Mensualnomina extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Mensualnomina la clase del modelo estàtico.
	 */
	public $codigo, $error;
	public $Personageneral, $Empleoplanta, $Estadoempleoplanta, $Factorsalarial, $Horasextrasyrecargos;
	public $Primatecnica, $Gastorepresentacion, $Tipocargo, $Sindicato, $Unidad, $Cesantias, $valorestablecidos, $devengados, $paraficales, $id_empl_pv;	
	public $MENO_DETALLES;
	public $liquidacion, $parafiscales, $descuentos;
	public $success, $warning, $flag;
	public $s, $w, $f;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMMENSUALNOMINA';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('MENO_ID, MENO_PERIODO, MENO_FECHAPROCESO, MENO_ESTADO, MENO_ANIO, MENO_FECHACAMBIO, MENO_REGISTRADOPOR', 'required'),
			array('MENO_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('MENO_PERIODO', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('MENO_ID, MENO_PERIODO, MENO_FECHAPROCESO, MENO_ESTADO, MENO_ANIO, MENO_FECHACAMBIO, MENO_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'mENSUALNOMINALIQUIDACIONESs' => array(self::HAS_MANY, 'MENSUALNOMINALIQUIDACIONES', 'MENO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'MENO_ID' => 'CODIGO',
						'MENO_PERIODO' => 'PERIODO LIQUIDACION',
						'MENO_FECHAPROCESO' => 'FECHA PROCESO',
						'MENO_ESTADO' => 'ESTADO',
						'MENO_ANIO' => 'AÑO',
						'MENO_DETALLES' => 'DETALLES',
						'MENO_FECHACAMBIO' => 'MENO FECHACAMBIO',
						'MENO_REGISTRADOPOR' => 'MENO REGISTRADOPOR',
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
		$sort->defaultOrder = 't."MENO_ID" DESC';
		$sort->attributes = array(
			
			'MENO_ID'=>array(
				'asc'=>'t."MENO_ID"',
				'desc'=>'t."MENO_ID" desc',
			),
			
			'MENO_PERIODO'=>array(
				'asc'=>'t."MENO_PERIODO"',
				'desc'=>'t."MENO_PERIODO" desc',
			),
			
			'MENO_FECHAPROCESO'=>array(
				'asc'=>'t."MENO_FECHAPROCESO"',
				'desc'=>'t."MENO_FECHAPROCESO" desc',
			),
			
			'MENO_ESTADO'=>array(
				'asc'=>'t."MENO_ESTADO"',
				'desc'=>'t."MENO_ESTADO" desc',
			),
			
			'MENO_ANIO'=>array(
				'asc'=>'t."MENO_ANIO"',
				'desc'=>'t."MENO_ANIO" desc',
			),
		);

		$criteria=new CDbCriteria;
		
		$criteria->compare('"MENO_ID"',$this->MENO_ID,false);
		$criteria->compare('"MENO_PERIODOn"',$this->MENO_PERIODO,true);
		$criteria->compare('"MENO_FECHAPROCESO"',$this->MENO_FECHAPROCESO,true);
		$criteria->compare('"MENO_ESTADO"',$this->MENO_ESTADO);
		$criteria->compare('"MENO_ANIO"',$this->MENO_ANIO);
		$criteria->compare('"MENO_FECHACAMBIO"',$this->MENO_FECHACAMBIO,true);
		$criteria->compare('"MENO_REGISTRADOPOR"',$this->MENO_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 50),
		));
	}
	
	public function periodoNomina($fecha){
		
	 switch (date("n", strtotime($fecha))) {
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
		return "$mes DE ".date("Y", strtotime($fecha));
	}
	
	public function getEstado()
	{
		if($this->MENO_ESTADO==0){
		 $imageUrl = 'spellcheck_error.png';
		}else{
		      $imageUrl = 'spellcheck.png';
			 }
        return Yii::app()->baseurl.'/images/nomina/'.$imageUrl;		
	}
	

	public function validarNomina($Mensualnomina){
	  $this->error = "";
	  $connection = Yii::app()->db;
	  
	  $sql = 'SELECT  "MENO_ID", "MENO_ESTADO" FROM "TBL_NOMMENSUALNOMINA" mn ORDER BY  "MENO_ID" DESC LIMIT 1';
	  $query = $connection->createCommand($sql)->queryRow();
      $rows = $connection->createCommand($sql)->queryAll();
	  
	  $string = 'SELECT  * FROM "TBL_NOMMENSUALNOMINA" mn WHERE mn."MENO_ID" = '.$Mensualnomina->MENO_ID;
      $queryString = $connection->createCommand($string)->queryRow();
	  
	  
      if (count($rows)>0){
	   $ultimoanionomina=substr($query["MENO_ID"],0,4);
	   $ultimomesnomina=(int)(substr($query["MENO_ID"],4,2));
	   $mesactual=date("n",strtotime($Mensualnomina->MENO_FECHAPROCESO));
	   $anioactual=date("Y",strtotime($Mensualnomina->MENO_FECHAPROCESO));
	   if (($queryString["MENO_ID"]) == ($Mensualnomina->MENO_ID)){
	     $this->error="Parece que ya se ha liquidado una nomina para este periodo : ".$this->periodoNomina(date("Y",strtotime($Mensualnomina->MENO_FECHAPROCESO)));
	    }
	   if (($mesactual - 1) > $ultimomesnomina){
	     $this->error="No se ha grabado la nomina de ".$this->periodoNomina(date("Y",strtotime($Mensualnomina->MENO_FECHAPROCESO))."-".($mesactual- 1)."-01");
	    }
	   if((date("Y",strtotime($Mensualnomina->MENO_FECHAPROCESO))-1) > $ultimoanionomina){
	     $this->error="No se han grabado las nominas del año ".(date("Y",strtotime($Mensualnomina->MENO_FECHAPROCESO))-1);
	    }
	   if(((date("n",strtotime($Mensualnomina->MENO_FECHAPROCESO))!=1) or $ultimomesnomina!=12) and ($anioactual>$ultimoanionomina)){
	     $this->error="No se ha grabado la nomina de Enero de $anioactual o de Diciembre de $ultimoanionomina";
        }
      }
     return $this->error;	  
	}
	
	public function validarNominaposterior($Mensualnomina){
	  $this->error = "";
	  $connection = Yii::app()->db;
	  
	  $sql = 'SELECT  "MENO_ID", "MENO_ESTADO", "MENO_FECHAPROCESO" FROM "TBL_NOMMENSUALNOMINA" mn WHERE "MENO_ID" = '.$Mensualnomina->MENO_ID.' ORDER BY "MENO_ID" DESC LIMIT 1';
	  $rows = $connection->createCommand($sql)->queryRow();
	 
	  if(count($rows)>0){
	    if(($rows["MENO_ESTADO"])==false){
	        $this->error="No se puede liquidar nominas posteriores al periodo de ".$this->periodoNomina($Mensualnomina->MENO_FECHAPROCESO).', puesto que esta nomina aun no se ha pagado.';
		}
	  }else{
	        $this->error="No se ha grabado la nomina de ".$this->periodoNomina($Mensualnomina->MENO_FECHAPROCESO);
		   }	  
	  return $this->error;	  
	}
	
	public function cargarEmpleoPlanta($empleoPlanta){
	  $connection = Yii::app()->db;
	  $this->Personageneral = NULL;
	  $this->Empleoplanta = NULL;
	  $this->Estadoempleoplanta = NULL;
	  $this->Factorsalarial = NULL;
	  $this->Horasextrasyrecargos = NULL;
	  $this->Primatecnica = NULL;
	  $this->Gastorepresentacion = NULL;
	  $this->Tipocargo = NULL;
	  $this->Sindicato = NULL;
	  $this->Unidad = NULL;
	  
	  /*creamos un registro persona-empleo-estadoempleo por cada empleo encontrado anteriormente*/
	  $string =' SELECT p.*, ep.*, eep.*, f.*, h.*, u.*
	             FROM "TBL_NOMPERSONASGENERALES" "p", "TBL_NOMEMPLEOSPLANTA" "ep", "TBL_NOMESTADOSEMPLEOSPLANTA" "eep", 
	             "TBL_NOMFACTORESSALARIALES" "f", "TBL_NOMHORASEXTRASYRECARGOS" "h", "TBL_NOMUNIDADES" "u"  
			     WHERE p."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = eep."EMPL_ID" AND
			     ep."EMPL_ID" = f."EMPL_ID" AND ep."EMPL_ID" = h."EMPL_ID" AND ep."UNID_ID" = u."UNID_ID"
			     AND ep."EMPL_ID" = '.$empleoPlanta.'
				 ORDER BY eep."ESEP_ID" DESC
			     LIMIT 1';	 
	  $sqlQuery = $connection->createCommand($string)->queryRow();
	  
	  /*cargamos todos los modelos disponibles para dicho cargo*/
	  $this->Personageneral = Personasgenerales::model()->findByPk($sqlQuery["PEGE_ID"]);
	  $this->Empleoplanta = Empleosplanta::model()->findByPk($sqlQuery["EMPL_ID"]);
	  $this->Estadoempleoplanta = Estadosempleosplanta::model()->findByPk($sqlQuery["ESEP_ID"]); 
	  $this->Factorsalarial = Factoressalariales::model()->findByPk($sqlQuery["FASA_ID"]);
	  $this->Horasextrasyrecargos = Horasextrasyrecargos::model()->findByPk($sqlQuery["HOER_ID"]);
	  
	  $this->Primatecnica = Primastecnicas::model()->findByPk($sqlQuery["PRTE_ID"]);
	  $this->Gastorepresentacion = Gastosrepresentacion::model()->findByPk($sqlQuery["GARE_ID"]);
	  $this->Tipocargo = Tiposcargos::model()->findByPk($sqlQuery["TICA_ID"]);
	  $this->Sindicato = Sindicatos::model()->findByPk($sqlQuery["SIND_ID"]);	
	  $this->Unidad = Unidades::model()->findByPk($sqlQuery["UNID_ID"]);
      $this->Cesantias = Cesantias::model()->findByPk($sqlQuery["CESA_ID"]);	  
	}
	
	
	public function liquidarNomina($objet,$notification=NULL,$fechaAuxiliar){
	 $connection = Yii::app()->db; 
	 $this->success = NULL; $this->warning = NULL; $this->flag = NULL;
	 $this->s = 0; $this->w = 0; $this->f = 0;
	 
	 $Parametrosglobales = new Parametrosglobales; 	 
     $this->valorestablecidos = $Parametrosglobales->getParametrosglobales(date("Y", strtotime($objet->MENO_FECHAPROCESO)));
	 
	 /**
	 *este condicional verifica si es una nomina posterior en el mismo periodo de liquidacion
	 *de serlo se arma una consulta $sql con los cargos que fueron creados posteriormente a la
	 *fecha de liquidacion de la nomina mensual del mismo periodo.
	 **/
	 if($notification==NULL){
	  $sql = 'SELECT  ep."EMPL_ID" FROM "TBL_NOMEMPLEOSPLANTA" ep  ORDER BY  ep."EMPL_FECHAINGRESO" DESC';
	 }elseif($notification==TRUE){
		    $ultimodiames = date("d",(mktime(0,0,0,(date("m", strtotime($fechaAuxiliar)))+1,1,(date("Y", strtotime($fechaAuxiliar))))-1));
		    $fechaAuxiliar;
		    $fecha = (date("Y", strtotime($fechaAuxiliar)))."-".(date("m", strtotime($fechaAuxiliar)))."-".$ultimodiames;
	        $sql = '
			         SELECT ep."EMPL_ID" FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" ep 
					 WHERE p."PEGE_ID" = ep."PEGE_ID" 
					 AND ep."EMPL_FECHAINGRESO">='."'".$fechaAuxiliar."'".' AND ep."EMPL_FECHAINGRESO"<='."'".$fecha."'".'
					 AND ep."EMPL_ID"  NOT IN 
					 ( SELECT mnl."EMPL_ID" 
					  FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn 
					  WHERE mnl."MENO_ID" = mn."MENO_ID" AND mn."MENO_ID" = '.$objet->MENO_ID.'
					 )
					 ORDER BY ep."EMPL_FECHAINGRESO" DESC
				   ';
		   }
		   
		   
	 $query = $connection->createCommand($sql)->queryAll();
	 $iterador = 1;
	 $this->codigo = 1;
	 
	 
	// echo '<br><br><br>';
	 foreach($query as $row){	   
	  $this->cargarEmpleoPlanta($row["EMPL_ID"]);	   
	  /*si el empleo no esta activo, se entra en el condicional para ver si se puede liquidar */
	  $sw = 0;	  
	  if($this->Estadoempleoplanta->ESEM_ID!=1){
	   $sw = 1;
	   if(((date("Y", strtotime($this->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("Y", strtotime($objet->MENO_FECHAPROCESO)))) &
	     ((date("m", strtotime($this->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("m", strtotime($objet->MENO_FECHAPROCESO))))){
	     $sw = 0; 			 
	   }elseif($this->Estadoempleoplanta->ESEM_ID==5){
	        $sw = 1;
			}
	  }
	 
	  /*si todo esta bn se procede a calcular la nomina para la persona*/
	  if($sw==0){
	  
	   $basico = $this->getSueldoBasico();
	   
	   $hed=round($this->getHorasExtrasDiurna());
       $shed=$shed+$hed;
       $hen=round($this->getHorasExtrasNocturna());
       $shen=$shen+$hen;
       $hedf=round($this->getHorasExtrasDiurnaFestivo());
       $shedf=$shedf+$hedf;
       $henf=round($this->getHorasExtrasNocturnaFestivo());
       $shenf=$shenf+$henf;
       $dyf=round($this->getDomingosYfestivos());
       $sdyf=$sdyf+$dyf;
       $ren=round($this->getRecargoNocturno());
       $sren=$sren+$ren;
       $rndyf=round($this->getRecargoNocturnoDyF());
       $srndyf=$srndyf+$rndyf;
	   
	   $subTransporte = round($this->getSubTransporte());
       $ssubTransporte = $ssubTransporte+$subTransporte;
       $prAlimenta = round($this->getSubAlimentacion());
       $sprAlimenta = $sprAlimenta+$prAlimenta;
       $prvacaciones = round($this->getPrimaVacaciones());
       $sprvacaciones = $sprvacaciones+$prvacaciones;
       $prantiguedad = $this->getPrimaAntiguedad();
       $sprantiguedad = $sprantiguedad+round($prantiguedad[1]);
	   
	   $primatec = round($this->getPrimaTecnica());
	   $sprimatec = $sprimatec+$primatec;
	   $gastosrp = round($this->getGastosRepresentacion());
	   $sgastosrp = $sgastosrp+$gastosrp;
	   
	   $bonserv = round($this->getBonServiciosPrestados());
	   $sbonserv=$sbonserv+$bonserv;
	   
	   $tdevengado = 0;
	   $tdevengado=$basico+$hed+$hedf+$hen+$henf+$dyf+$ren+$rndyf;
	   $tdevengado=$tdevengado+round($primatec)+round($gastosrp)+round($sobrenumera);
	   
	   //con devengado sin subsidios ni prima de antiguedad
	   $estampilla=round($this->getEstampilla($tdevengado));
	   $sestampilla=$sestampilla+$estampilla;
	   
	   $tdevengado=$tdevengado+round($prantiguedad[1]);
	   //con devengado sin subsidios 
	   $salud=round($this->getSalud($tdevengado));
	   $ssalud=$ssalud+$salud;
	   
	   $pension=round($this->getPension($tdevengado));
	   $spension=$spension+$pension;
	   
	   $subsistencia=round($this->getSubsistencia($tdevengado));
	   $ssubsistencia=$ssubsistencia+$subsistencia;
	
	   $sindicato=round($this->getSindicato());
	   $ssindicato=$ssindicato+$sindicato;
	
	   $fondosp=round($this->getFSP($tdevengado));
	   $sfondosp=$sfondosp+$fondosp;
	   
	   $tdevengado=$tdevengado+round($bonserv)+round($prvacaciones)+round($subTransporte)+round($prAlimenta);
	   $stdevengado=$stdevengado+$tdevengado;
	
	   $retefuente=round($this->getRetefuente($salud,$pension,$fondosp,$tdevengado));
	   $sretefuente=$sretefuente+$retefuente;
	
	   $tparafiscales = $estampilla+$salud+$pension+$subsistencia+$sindicato+$fondosp+$retefuente;
	   $stparafiscales = $stparafiscales+$tparafiscales;
	   
	   $this->devengados[$iterador] = array($basico,$hed,$hen,$hedf,$henf,$dyf,$ren,$rndyf,round($prantiguedad[1]),$subTransporte,$prAlimenta,$primatec,$gastosrp,$bonserv,$prvacaciones,$tdevengado);
       $this->paraficales[$iterador]=array($salud,$pension,$subsistencia,$sindicato,$fondosp,$retefuente,$estampilla,$tparafiscales);
       
	   
	   /**
	   *se validan que los dias a pagar del volante sean mayor que cero (0) antes de guardar la liquidacion.
	   **/
	   if(($this->Empleoplanta->EMPL_DIASAPAGAR)>0){
	    $this->setLiquidacion($this->devengados[$iterador],$this->paraficales[$iterador]);
        $this->codigo = $this->codigo+1;	   
        $iterador = $iterador+1;	   
	   }	 
	  }	 
	 }		
	}
	
	/**
	*Inicio de funciones para mirar la liquidacion previa de nomina del empleado
	*/
	public function previewLiquidation($objet,$id){
	 $connection = Yii::app()->db; 
	 //echo "<br><br><br><br><br>";
	 $Parametrosglobales = new Parametrosglobales; 	 
     $this->valorestablecidos = $Parametrosglobales->getParametrosglobales(date("Y", strtotime($objet->MENO_FECHAPROCESO)));
	 
	 $sql = 'SELECT  ep."EMPL_ID" FROM "TBL_NOMEMPLEOSPLANTA" ep WHERE ep."PEGE_ID" = '.$id.' ORDER BY  ep."EMPL_FECHAINGRESO" DESC';
	 $query = $connection->createCommand($sql)->queryAll();
	 $iterador = 1;
	 $this->codigo = 1;
	 foreach($query as $row){	  
	   $this->cargarEmpleoPlanta($row["EMPL_ID"]);
	 // echo $row["EMPL_ID"]." ".$this->Estadoempleoplanta->ESEP_FECHAREGISTRO." ".$this->Estadoempleoplanta->ESEM_ID."<br>";
	  /*si el empleo no esta activo, se entra en el condicional para ver si se puede liquidar */
	  $sw = 0;
	  //echo $this->Estadoempleoplanta->ESEP_ID.' '.$this->Estadoempleoplanta->ESEM_ID.' '.$this->Empleoplanta->EMPL_ID."<br>";
	  if($this->Estadoempleoplanta->ESEM_ID!=1){
	   $sw = 1;
	   if(((date("Y", strtotime($this->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("Y", strtotime($objet->MENO_FECHAPROCESO)))) &
	     ((date("m", strtotime($this->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("m", strtotime($objet->MENO_FECHAPROCESO))))){
	     $sw = 0; 			 
	   }elseif($this->Estadoempleoplanta->ESEM_ID==5){
			$sw = 1;
			}
	  }
	 
	  /*si todo esta bn se procede a calcular la nomina para la persona*/
	  if($sw==0){
	  //echo $row["EMPL_ID"]." ".$this->Estadoempleoplanta->ESEP_FECHAREGISTRO." ".$this->Estadoempleoplanta->ESEM_ID."<br>";
	   $basico = $this->getSueldoBasico();
	   
	   $hed=round($this->getHorasExtrasDiurna());
       $shed=$shed+$hed;
       $hen=round($this->getHorasExtrasNocturna());
       $shen=$shen+$hen;
       $hedf=round($this->getHorasExtrasDiurnaFestivo());
       $shedf=$shedf+$hedf;
       $henf=round($this->getHorasExtrasNocturnaFestivo());
       $shenf=$shenf+$henf;
       $dyf=round($this->getDomingosYfestivos());
       $sdyf=$sdyf+$dyf;
       $ren=round($this->getRecargoNocturno());
       $sren=$sren+$ren;
       $rndyf=round($this->getRecargoNocturnoDyF());
       $srndyf=$srndyf+$rndyf;
	   
	   $subTransporte = round($this->getSubTransporte());
       $ssubTransporte = $ssubTransporte+$subTransporte;
       $prAlimenta = round($this->getSubAlimentacion());
       $sprAlimenta = $sprAlimenta+$prAlimenta;
       $prvacaciones = round($this->getPrimaVacaciones());
       $sprvacaciones = $sprvacaciones+$prvacaciones;
       $prantiguedad = $this->getPrimaAntiguedad();
       $sprantiguedad = $sprantiguedad+round($prantiguedad[1]);
	   
	   $primatec = round($this->getPrimaTecnica());
	   $sprimatec = $sprimatec+$primatec;
	   $gastosrp = round($this->getGastosRepresentacion());
	   $sgastosrp = $sgastosrp+$gastosrp;
	   
	   $bonserv = round($this->getBonServiciosPrestados());
	   $sbonserv=$sbonserv+$bonserv;
	   
	   $tdevengado = 0;
	   $tdevengado=$basico+$hed+$hedf+$hen+$henf+$dyf+$ren+$rndyf;
	   $tdevengado=$tdevengado+round($primatec)+round($gastosrp)+round($sobrenumera);
	   
	   //con devengado sin subsidios ni prima de antiguedad
	   $estampilla=round($this->getEstampilla($tdevengado));
	   $sestampilla=$sestampilla+$estampilla;
	   
	   $tdevengado=$tdevengado+round($prantiguedad[1]);
	   //con devengado sin subsidios 
	   $salud=round($this->getSalud($tdevengado));
	   $ssalud=$ssalud+$salud;
	   
	   $pension=round($this->getPension($tdevengado));
	   $spension=$spension+$pension;
	   
	   $subsistencia=round($this->getSubsistencia($tdevengado));
	   $ssubsistencia=$ssubsistencia+$subsistencia;
	
	   $sindicato=round($this->getSindicato());
	   $ssindicato=$ssindicato+$sindicato;
	
	   $fondosp=round($this->getFSP($tdevengado));
	   $sfondosp=$sfondosp+$fondosp;
	   
	   $tdevengado=$tdevengado+round($bonserv)+round($prvacaciones)+round($subTransporte)+round($prAlimenta);
	   $stdevengado=$stdevengado+$tdevengado;
	
	   $retefuente=round($this->getRetefuente($salud,$pension,$fondosp,$tdevengado));
	   $sretefuente=$sretefuente+$retefuente;
	
	   $tparafiscales = $estampilla+$salud+$pension+$subsistencia+$sindicato+$fondosp+$retefuente;
	   $stparafiscales = $stparafiscales+$tparafiscales;
				   
	   $devengados = array($basico,$hed,$hen,$hedf,$henf,$dyf,$ren,$rndyf,round($prantiguedad[1]),$subTransporte,$prAlimenta,$primatec,$gastosrp,$bonserv,$prvacaciones,$tdevengado);
	   $this->devengados[$iterador] = array($iterador, $this->codigo,$this->Empleoplanta->EMPL_DIASAPAGAR,$this->Empleoplanta->EMPL_PUNTOS,
	                                        $devengados[0],$devengados[8],$devengados[9],$devengados[10],$this->Horasextrasyrecargos->HOER_HED,
											$devengados[1],$this->Horasextrasyrecargos->HOER_HEN,$devengados[2],$this->Horasextrasyrecargos->HOER_HEDF,
											$devengados[3],$this->Horasextrasyrecargos->HOER_HENF,$devengados[4],$this->Horasextrasyrecargos->HOER_DYF,
											$devengados[5],$this->Horasextrasyrecargos->HOER_REN,$devengados[6],$this->Horasextrasyrecargos->HOER_RENDYF,
											$devengados[7],$devengados[11],$devengados[12],$devengados[13],$devengados[14],$this->MENO_ID,
											$this->Empleoplanta->EMPL_ID,$devengados[15]);
	   
	  
	   
	   
	   $paraficales = array($salud,$pension,$subsistencia,$sindicato,$fondosp,$retefuente,$estampilla,$tparafiscales);		 
	   $this->paraficales[$iterador] = array($iterador,$this->Personageneral->SALU_ID,$paraficales[0],$this->Personageneral->PENS_ID,
	                                          $paraficales[1],$this->Personageneral->SIND_ID,$paraficales[3],$paraficales[4],$paraficales[2],
											  $paraficales[6],$paraficales[5],$iterador,$iterador,$iterador,$tparafiscales );
	   $this->codigo = $this->codigo+1;	   
       $iterador = $iterador+1;	   
	  }	 
	 }
	 
	 /**
	 *llenando los arreglos de la liquidacion previa
	 */
	   $this->liquidacion = NULL;
	   $array = array('ID LIQUIDACION','CODIGO','DIAS','PUNTOS','SALARIO','PRIMA ATIGUEDAD','SUBSIDIO TRANSPORTE','SUBSIDIO ALIMENTACION','N.H.E.D',
	               'H.E.D','N.H.E.N','H.E.N','N.H.E.D.F','H.E.D.F','N.H.E.N.F','H.E.N.F','N. DOMINGO','DOMINGOS','N.RECARGO NOCT',
			       'RECARGO NOCT','N. REC DOMINGOS','REC DOMINGOS','PRIMA TECNICA','GASTOS REPRESENTACION','BON. DE SERVICIOS',
				   'PRIMA DE VACACIONES','ID NOMINA','ID EMPLEO','TOTAL DEVENGADO');
	   $j=0; $i=0;
	   foreach ($array as $values=>$value) {	
	    $this->liquidacion[$j][$i] = $value;
	    $i++;  
	   }
	   
	    $this->parafiscales = NULL;
        $array = array('ID PARAFISCAL','IDSALUD','SALUD','IDPENSION','PENSION','IDSINDICATO','SINDICATO','FONDO SOL PPENSIONAL','SUBSISTENCIA',
	               'ESTAMPILLA','RETEFUENTE', 'ID LIQUIDACION','FECHA LIQUIDADO','USUARIO','TOTAL PARAFISCAL');
				   
	   $j=0; $i=0;
	   foreach ($array as $values=>$value) {	
	    $this->parafiscales[$j][$i] = $value;
	    $i++;  
	   }
	   
	 
	   for($j=1;$j<=count($this->devengados);$j++) {		 
	    for($i=0;$i<=count($this->devengados[$j]);$i++) {  
	     $this->liquidacion[$j][$i] = $this->devengados[$j][$i];
	    } 
       } 
	 
	   for($j=1;$j<=count($this->paraficales);$j++) {		 
	    for($i=0;$i<=count($this->paraficales[$j]);$i++) {  
	     $this->parafiscales[$j][$i] = $this->paraficales[$j][$i];
	    } 
       } 
	   
	  $this->getDescuentosPreview($this->Personageneral->PEGE_ID,$objet->MENO_ID);
	 
	}
	
	public function getDescuentosPreview($personaGeneral,$periodo)
	{
	 $connection = Yii::app()->db;
	 $this->descuentos = NULL;
	 //echo "<br><br><br>".
	 
	 $string1 = 'SELECT ep."EMPL_ID" AS  "MENL_ID",  dm."DEME_ID", nm."NOME_VALOR", '."'".$periodo."'".' AS "MENO_ID"
				FROM "TBL_NOMDESCUENTOSMENSUALES" dm, "TBL_NOMNOVEDADESMENSUALES" nm, "TBL_NOMEMPLEOSPLANTA" ep
				WHERE dm."DEME_ID" = nm."DEME_ID" AND nm."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = '.$personaGeneral.'
                ORDER BY dm."DEME_ID", ep."EMPL_FECHAINGRESO" DESC';
		   
     $rows1 = $connection->createCommand($string1)->queryAll();

	 $string2 = 'SELECT ep."EMPL_ID" AS  "MENL_ID", '."'".$periodo."'".' AS "MENO_ID"
				FROM "TBL_NOMDESCUENTOSMENSUALES" dm, "TBL_NOMNOVEDADESMENSUALES" nm, "TBL_NOMEMPLEOSPLANTA" ep
				WHERE dm."DEME_ID" = nm."DEME_ID" AND nm."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = '.$personaGeneral.'
                GROUP BY ep."EMPL_ID"
                ORDER BY ep."EMPL_FECHAINGRESO" DESC';		   
		   
     $rows2 = $connection->createCommand($string2)->queryAll();
	 $cont=1;	 
	 foreach ($rows2 as $values) {	     	 
	    $this->descuentos[$cont][0] = $values["MENL_ID"];
		$filas[$cont]=$values["MENO_ID"];
        $cont++;		
     }
	 $this->descuentos[$cont][0] = "Total";
	 
	 $string3 = 'SELECT dm."DEME_DESCRIPCION"
				FROM "TBL_NOMDESCUENTOSMENSUALES" dm, "TBL_NOMNOVEDADESMENSUALES" nm, "TBL_NOMEMPLEOSPLANTA" ep
				WHERE dm."DEME_ID" = nm."DEME_ID" AND nm."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = '.$personaGeneral.'
                GROUP BY dm."DEME_ID"
				ORDER BY dm."DEME_ID"';
		   
     $rows3 = $connection->createCommand($string3)->queryAll();
	 //Aqui se arman las columnas del arreglo deduccion con lo alias de cada deduccion.	 
	 $col = 0;
	 $this->descuentos[0][$col] = "IDENTIFICACION";
	 $col=1;	 
	 foreach ($rows3 as $values) {	
	   $j=0;
	   foreach ($values as $value) {      	 
		$this->descuentos[$j][$col] = $value;
	    $j++;
	   }
       $col++;	 
     }
	 $this->descuentos[0][$col] = "TOTAL";
	 
	 /*llenando una matriz con todos los descuentos  en $descuentos  */
	 $m=0; $descuentos = NULL; 
	 foreach ($rows1 as $values) {	
	   $n=0;
	   foreach ($values as $value) {	
        $descuentos[$m][$n]=$value;
	   // echo $descuentos[$m][$n]."<br>";
		$n++;
	   }
	   $m++;	
	 }
	 
     //echo "<br><br><br>";
     $t = count($descuentos);	  
     $i=1;$j=1;$suma=0;	 
	 for($x=0;$x<$t;$x++){
	  //echo "<br><br><br> iteracion = ".$x." cont = ".$cont." i = ".$i." j = ".$j."<br>";
	  //echo "$descuentos [".$x."]"."[0] = ".$descuentos[$x][0]."<br>";
	  if ($i>=$cont){
		  //echo "descuentos [".$i."]"."[".$j."] = ".$suma."<br>";
		  $this->descuentos[$i][$j]=$suma;
		  $suma=0;
		  $i=1;
		  $j++;
		}
		$numero = $descuentos[$x][0]; $idnomina = $descuentos[$x][3];
		//echo " fila ".$filas[$i]." nomina ".$idnomina." descuento ".$this->descuentos[$i][0]." numero ".$numero."<br>";
         
	    while(($filas[$i]!= $idnomina or $this->descuentos[$i][0]!= $numero)){
		   if ($i>=$cont){
			  $this->descuentos[$i][$j]=$suma;
			  $suma=0;
			  $i=1;
			  $j++;
			}			
			$this->descuentos[$i][$j]=0;
			$i++;
		}
		$valor = $descuentos[$x][2];
		//echo "descuentos [".$i."]"."[".$j."] = ".$valor."<br>";
		$this->descuentos[$i][$j] = $descuentos[$x][2];
		$this->descuentos[$i][$col] = $this->descuentos[$i][$col]+$descuentos[$x][2];
		$suma=$suma+$descuentos[$x][2];
		$i++;
		
	 }	
	   //Despues de salir del ciclo verifica si aun falta valores con el sgte siclo
		while(($filas[$i]!=$idnomina or $this->descuentos[$i][0]!=$numero)){
			if ($i>=$cont){
				$this->descuentos[$i][$j]=$suma;
				$suma=0;
				$j++;
				if (($j)<=($col-1))
					$i=1;
			}
			if ($j>($col-1)){$j--;break;}
			$this->descuentos[$i][$j]=0;
			$i++;
		}
	 
	}	
	/**
	*Finalizando funciones de la liquidacion previa de nomina del empleado
	*/
	
	private function getSueldoBasico(){
			$sueldo = ($this->Empleoplanta->EMPL_SUELDO)*(($this->Empleoplanta->EMPL_DIASAPAGAR)/30);
		return ($sueldo);
    }
	
	private	function getHorasExtrasDiurna(){
		$valor=($this->Empleoplanta->EMPL_SUELDO)*($this->Horasextrasyrecargos->HOER_HED)*1.25/240;
		return ($valor);
    }
	
	private	function getHorasExtrasNocturna(){
			$valor=($this->Empleoplanta->EMPL_SUELDO)*($this->Horasextrasyrecargos->HOER_HEN)*1.75/240;
			return ($valor);
	}
	
	private	function getHorasExtrasDiurnaFestivo(){
			$valor=($this->Empleoplanta->EMPL_SUELDO)*($this->Horasextrasyrecargos->HOER_HEDF)*2.00/240;
			return ($valor);
	}
	
	private	function getHorasExtrasNocturnaFestivo(){
			$valor=($this->Empleoplanta->EMPL_SUELDO)*($this->Horasextrasyrecargos->HOER_HENF)*2.50/240;
			return ($valor);
	}
		
	private	function getDomingosYfestivos(){
			$valor=($this->Empleoplanta->EMPL_SUELDO)*($this->Horasextrasyrecargos->HOER_DYF)*1.75/30;
			return ($valor);
	}
		
	private	function getRecargoNocturno(){
			$valor=($this->Empleoplanta->EMPL_SUELDO)*($this->Horasextrasyrecargos->HOER_REN)*0.35/240;
			return ($valor);
	}
		
	private	function getRecargoNocturnoDyF(){
			$valor=($this->Empleoplanta->EMPL_SUELDO)*($this->Horasextrasyrecargos->HOER_RENDYF)*2.10/240;
			return ($valor);
	}
	
	public	function getPrimaTecnica(){
			$sueldo = ($this->Empleoplanta->EMPL_SUELDO)*(($this->Empleoplanta->EMPL_DIASAPAGAR)/30);
			$valor=($sueldo)*($this->Primatecnica->PRTE_PORCENTAJE/100);			
			return ($valor);
	}
		
	public	function getGastosRepresentacion(){
			$sueldo = ($this->Empleoplanta->EMPL_SUELDO)*(($this->Empleoplanta->EMPL_DIASAPAGAR)/30);
			$valor=($sueldo)*($this->Gastorepresentacion->GARE_PORCENTAJE/100);			
			return ($valor);
	}
	
	public	function getPrimaAntiguedad(){
	 $dia=date(j);
	 $mes=date(n);
	 $ano=date(Y);
	 $fecha = $this->Personageneral->PEGE_FECHAINGRESO;
	 //fecha de nacimiento
	 $dianaz=date("j", strtotime($this->Personageneral->PEGE_FECHAINGRESO));
	 $mesnaz=date("n", strtotime($this->Personageneral->PEGE_FECHAINGRESO));
	 $anonaz=date("Y", strtotime($this->Personageneral->PEGE_FECHAINGRESO));
	
	 //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
	 if (($mesnaz == $mes) && ($dianaz > $dia)) {
	   $ano=($ano-1); 
	  }
	  //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
	  if ($mesnaz > $mes) {
		$ano=($ano-1);
	  }
		//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
		$edad=($ano-$anonaz);
		$antiguedad[0]=0;
		$antiguedad[1]=0;
		if ($fecha > date("Y/m/d",strtotime("1966/12/30")) and $fecha < date("Y/m/d",strtotime("1997/08/11"))){
		 $factor=0;
		 if($edad>=2 and $edad<4)
		  $factor=0.05;
			if($edad>=4 and $edad<6)
			 $factor=0.1;
			  if($edad>=6 and $edad<8)
				$factor=0.15;
				if($edad>=8 and $edad<10)
				 $factor=0.20;
				  if($edad>=10)
					$factor=0.25;				
					
					$antiguedad[0]=round(($this->Empleoplanta->EMPL_SUELDO)*$factor);
					$antiguedad[1]=round((($this->Empleoplanta->EMPL_SUELDO)*($this->Empleoplanta->EMPL_DIASAPAGAR)*$factor/30));
		}

	  return $antiguedad;	
	}
	
	public	function getSubTransporte(){
	 if($this->Factorsalarial->FASA_SUBTRANSPORTE=="t"){
	  if(($this->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[4][3]) && ($this->Tipocargo->TICA_ID==1)){
		return ($this->valorestablecidos[5][3]*($this->Empleoplanta->EMPL_DIASAPAGAR)/30);
	   }
	 }
	 return 0;
	}
		
	public	function getSubAlimentacion(){
	 if($this->Factorsalarial->FASA_SUBALIMIENTACION=="t"){
	  if(($this->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[2][3]) && ($this->Tipocargo->TICA_ID==1)){
		return ($this->valorestablecidos[3][3]*($this->Empleoplanta->EMPL_DIASAPAGAR)/30);
	  }
	 }
	 return 0;
	}
	
	
	private function getPrimaVacaciones(){

	 if($this->id_empl_pv==$this->Personageneral->PEGE_IDENTIFICACION){ 
	  return;
	 }else{
		   $diastemporal = $this->Empleoplanta->EMPL_DIASAPAGAR; /*Almacena los dias trabajados del empleado en una variable temporal para reversarlos*/	  
		   if($this->Tipocargo->TICA_ID==1){
			$bon=$this->valorestablecidos[6][3];
		   }else{
				 $bon=$this->valorestablecidos[7][3];
				}
		   if($this->Factorsalarial->FASA_PRIMAVACACIONES=="t" && $this->Tipocargo->TICA_ID==1){
			$this->Empleoplanta->EMPL_DIASAPAGAR = 30;//Coloca los dias trabajados a 30 para calcular correctamente la nomina mensual
			$prantiguedad = $this->getPrimaAntiguedad();
			$subTransporte = $this->getSubTransporte();
			$prAlimenta = $this->getSubAlimentacion();
			$bonserv = $this->getBonServiciosPrestados();
			$fecha = $this->Personageneral->PEGE_FECHAINGRESO;
			
			if(date("n",strtotime($fecha))==date("n",strtotime($this->MENO_FECHAPROCESO)) && date("Y", strtotime($fecha))< date("Y", strtotime($this->MENO_FECHAPROCESO))){
			 if(($this->Empleoplanta->EMPL_SUELDO)+($this->getGastosRepresentacion())>$bon){
			  $serv=(($this->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica())+($this->getGastosRepresentacion())+round($prantiguedad[0]))*($this->valorestablecidos[8][3]/100);
			 }else{
				 $serv=(($this->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica())+($this->getGastosRepresentacion())+round($prantiguedad[0]))*($this->valorestablecidos[9][3]/100);
				  }
		     $prTransitoria = ($this->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica())+($this->getGastosRepresentacion()+round($prantiguedad[0])+$subTransporte+$prAlimenta)+($serv/12);
		     $valor = ($this->Empleoplanta->EMPL_SUELDO)/2+$prantiguedad[0]/2+$prTransitoria/12+$bonserv/12+$subTransporte+$prAlimenta+($this->getGastosRepresentacion())/2+($this->getPrimaTecnica())/2;

			 //Los dias trabajados vuelve a ser como antes
			 $this->Empleoplanta->EMPL_DIASAPAGAR = $diastemporal;
			 $this->id_empl_pv = $this->Personageneral->PEGE_IDENTIFICACION;	  
			 return ($valor);	  
			}
		   }
		   //Los dias trabajados vuelve a ser como antes
		   $this->Empleoplanta->EMPL_DIASAPAGAR = $diastemporal;
		   return 0;
		  }
	}
	
	private	function getBonServiciosPrestados(){
	 $prantiguedad = $this->getPrimaAntiguedad();
	 $fecha = $this->Personageneral->PEGE_FECHAINGRESO;
	 /* 001. inicio verificar si el empleado no es docente ocacional */ 
	 if($this->Tipocargo->TICA_ID!=3){
		 
	  /* 01. inicio verificar si tiene BSP*/  
	  if ($this->Factorsalarial->FASA_BSP=="t"){
			
	   /* 02. inicio verificar si en el mes actual cumple año de servicio*/	  
	   if(date("m", strtotime($fecha))==date("m", strtotime($this->MENO_FECHAPROCESO)) && date("Y", strtotime($fecha))< date("Y", strtotime($this->MENO_FECHAPROCESO))){
		$diastemporal = $this->Empleoplanta->EMPL_DIASAPAGAR;
		$this->Empleoplanta->EMPL_DIASAPAGAR = 30;
		
	   /* como el limite establecido es diferente del profesor al administrativo, este  condicional verifica quien es quien para obtener asi el limite*/
	   if($this->Tipocargo->TICA_ID==1){
		  $bon=$this->valorestablecidos[6][3];
	   }else{ 
			$bon=$this->valorestablecidos[7][3];
			}
		   
	   /* 03. inicio calcular valor BSP devolverlo-------*/		  
	   if (($this->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica())+($this->getGastosRepresentacion())+$prantiguedad[0]>$bon){
		$bon_s_pres = (($this->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica())+($this->getGastosRepresentacion())+ round($prantiguedad[0]))*($this->valorestablecidos[8][3]/100);
		$valor = (($bon_s_pres)/30)*($this->Empleoplanta->EMPL_DIASAPAGAR);
		$this->Empleoplanta->EMPL_DIASAPAGAR = $diastemporal;
		return ($valor);
	   }else{
			 $bon_s_pres = (($this->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica())+($this->getGastosRepresentacion())+round($prantiguedad[0]))*($this->valorestablecidos[9][3]/100);	
			 $valor = (($bon_s_pres)/30)*($this->Empleoplanta->EMPL_DIASAPAGAR);
			 $this->Empleoplanta->EMPL_DIASAPAGAR = $diastemporal;
			 return ($valor);
			}
	   /* 03. fin calcular valor BSP devolverlo---------*/
	   
	   /* 02. fin verificar si en el mes actual cumple año de servicio*/		  	   
	   }else{  
			 return 0;
			}
	  /* 01. fin verificar si tiene BSP*/			
	  }else{	  
			return 0;
		   }
	  /* 001. fin verificar si el empleado no es docente ocacional */ 
	 }
	}
	
	private	function getSalud($total){
		if ($this->Personageneral->SALU_ID!=999){
			if ((date("n", strtotime($this->MENO_FECHAPROCESO))==12 or date("n", strtotime($this->MENO_FECHAPROCESO))==01) && $this->Tipocargo->TICA_ID!=3){
			 $total=$this->calcularBaseSaludPensionDiciembreEnero();
			}
			return ($total*0.04);
		}
		return 0;	
	}
	
    private	function getPension($total){
		if ($this->Personageneral->PENS_ID!=999){
			if (( date("n", strtotime($this->MENO_FECHAPROCESO))==12 or date("n", strtotime($this->MENO_FECHAPROCESO))==01) && $this->Tipocargo->TICA_ID!=3){
			$total=$this->calcularBaseSaludPensionDiciembreEnero();
			}
			return ($total*0.04);
		}

		return 0;	
	}
	
	private function calcularBaseSaludPensionDiciembreEnero() {  
	  //echo '<br><br><br>';
	  /*para empleados que cambian de cargo en los meses de diciembre y enero*/
	  if($this->verificarNuevoCargoDiciembreEnero()==1){
		/*para el cargo anterior se calcula la salud con los dias trabajados*/
		$Cargo = $this->cargoAnteriorDiciembreEnero();
		//echo $Cargo[0].'=='.$this->Empleoplanta->EMPL_FECHAINGRESO;
	   if($Cargo[0]==$this->Empleoplanta->EMPL_FECHAINGRESO){
		return($this->baseSaludPensionDiciembreEneroNuevoCargo($Cargo));
		}else{
			 /*para el cargo actual se recalculan los dias */
			 $nuevosDias = (30-$Cargo[1]);
			 $Cargo[1] = $nuevosDias;
			 return($this->baseSaludPensionDiciembreEneroNuevoCargo($Cargo));
			 }
	 }else{
	  /*para empleados nuevos en los meses de diciembre y enero o fallecidos en estos dos mese*/
	  $mesEntradaEmpleado = date("m", strtotime($this->Personageneral->PEGE_FECHAINGRESO)).date("Y", strtotime($this->Personageneral->PEGE_FECHAINGRESO)); 
	  $mesLiquidando = date("m", strtotime($this->MENO_FECHAPROCESO)).date("Y", strtotime($this->MENO_FECHAPROCESO)); 
	  if($this->Estadoempleoplanta->ESEM_ID==4 or ($mesEntradaEmpleado==$mesLiquidando)){	
		return $this->baseSaludPensionDiciembreEneroNuevosFallecidos();
	  }else{		
			$diasTemp = $this->Empleoplanta->EMPL_DIASAPAGAR;
			$this->Empleoplanta->EMPL_DIASAPAGAR = 30;
			
			$basico=$this->getSueldoBasico();
			$hed=round($this->getHorasExtrasDiurna());
			$hen=round($this->getHorasExtrasNocturna());
			$hedf=round($this->getHorasExtrasDiurnaFestivo());
			$henf=round($this->getHorasExtrasNocturnaFestivo());
			$dyf=round($this->getDomingosYfestivos());
			$ren=round($this->getRecargoNocturno());
			$rndyf=round($this->getRecargoNocturnoDyF());
			$prantiguedad=$this->getPrimaAntiguedad();
			$primatec=round($this->getPrimaTecnica());
			$gastosrp=round($this->getGastosRepresentacion());
			$bonserv=round($this->getBonServiciosPrestados());
			$tdevengado=$basico+$hed+$hedf+$hen+$henf+$dyf+$ren+$rndyf;
			$tdevengado=$tdevengado+round($primatec)+round($gastosrp)+round($sobrenumera);
			$tdevengado=$tdevengado+round($prantiguedad[1]);
			
			$this->Empleoplanta->EMPL_DIASAPAGAR = $diasTemp;
			return $tdevengado;
		}
			
	 }
	}
	
	private function verificarNuevoCargoDiciembreEnero(){ 
	  $connection = Yii::app()->db;
	  $sql='SELECT  COUNT(*) AS "TOTAL"
		      FROM "TBL_NOMEMPLEOSPLANTA" ep 
			  WHERE ep."EMPL_FECHAINGRESO" BETWEEN '."'".date("Y", strtotime($this->MENO_FECHAPROCESO)).'-'.date("m", strtotime($this->MENO_FECHAPROCESO))."-01'".' 
			  AND '."'".date("Y", strtotime($this->MENO_FECHAPROCESO)).'-'.date("m", strtotime($this->MENO_FECHAPROCESO)+1)."-31'".' AND ep."PEGE_ID"  = '.$this->Personageneral->PEGE_ID;		
      $row = $connection->createCommand($sql)->queryRow();
	  if($row['TOTAL']>0){
	   $mesEntradaEmpleado = date("m", strtotime($this->Personageneral->PEGE_FECHAINGRESO)); 
	   $mesLiquidando = date("m", strtotime($this->MENO_FECHAPROCESO)); 
	   if(($mesEntradaEmpleado==$mesLiquidando)){
		return 0;
	   }else{
			 return 1;
			}
	  }else{
		   return 0;
		   }
	}
	private function cargoAnteriorDiciembreEnero(){
	 $connection = Yii::app()->db;
	 $sql='SELECT  * 
		      FROM "TBL_NOMEMPLEOSPLANTA" ep 
			  WHERE ep."PEGE_ID"  = '.$this->Personageneral->PEGE_ID.' ORDER BY ep."EMPL_FECHAINGRESO" DESC LIMIT 1 OFFSET 1';		
      $row = $connection->createCommand($sql)->queryRow();
	  $datos[0] = $row["EMPL_FECHAINGRESO"];	
	  $datos[1] = $row["EMPL_DIASAPAGAR"];	
	  $datos[2] = $row["EMPL_ID"];	
	  return $datos;	
	}
	
	public	function getFSP($total){
		if(($this->Factorsalarial->FASA_FSP=="t") && (($total) >=(($this->valorestablecidos[12][3]))))
			return ($total*0.01);
		return 0;
	}
	
	private function baseSaludPensionDiciembreEneroNuevoCargo($dias){
 		$diasTemp = $this->Empleoplanta->EMPL_DIASAPAGAR;
		$this->Empleoplanta->EMPL_DIASAPAGAR = $dias[1];
		
		$basico=$this->getSueldoBasico();
		$hed=round($this->getHorasExtrasDiurna());
		$hen=round($this->getHorasExtrasNocturna());
		$hedf=round($this->getHorasExtrasDiurnaFestivo());
		$henf=round($this->getHorasExtrasNocturnaFestivo());
		$dyf=round($this->getDomingosYfestivos());
		$ren=round($this->getRecargoNocturno());
		$rndyf=round($this->getRecargoNocturnoDyF());
		$prantiguedad=$this->getPrimaAntiguedad();
		$primatec=round($this->getPrimaTecnica());
		$gastosrp=round($this->getGastosRepresentacion());
		$bonserv=round($this->getBonServiciosPrestados());
		$tdevengado=$basico+$hed+$hedf+$hen+$henf+$dyf+$ren+$rndyf;
		$tdevengado=$tdevengado+round($primatec)+round($gastosrp)+round($sobrenumera);
		$tdevengado=$tdevengado+round($prantiguedad[1]);
		
		$this->Empleoplanta->EMPL_DIASAPAGAR = $diasTemp;
		return $tdevengado;	
    }
	
	private function baseSaludPensionDiciembreEneroNuevosFallecidos(){
		//echo '<br><br><br>';
		$periodoSalidaEmpleado = date("m", strtotime($this->Estadoempleoplanta->ESEP_FECHAREGISTRO)).date("Y", strtotime($this->Estadoempleoplanta->ESEP_FECHAREGISTRO)); 
	    $periodoLiquidando = date("m", strtotime($this->MENO_FECHAPROCESO)).date("Y", strtotime($this->MENO_FECHAPROCESO));
		
		if($periodoSalidaEmpleado==$periodoLiquidando){
		 /**
		 *si la fecha de salida del empleado es igual al mes que se esta liquidando se hace 
		 *el calculo utilizando el dia de la fecha de retiro
		 */
		 $diasTemp = $this->Empleoplanta->EMPL_DIASAPAGAR;
		 $this->Empleoplanta->EMPL_DIASAPAGAR = date("d", strtotime($this->Estadoempleoplanta->ESEP_FECHAREGISTRO));
		 
		 $basico=$this->getSueldoBasico();
		 $hed=round($this->getHorasExtrasDiurna());
		 $hen=round($this->getHorasExtrasNocturna());
		 $hedf=round($this->getHorasExtrasDiurnaFestivo());
		 $henf=round($this->getHorasExtrasNocturnaFestivo());
		 $dyf=round($this->getDomingosYfestivos());
		 $ren=round($this->getRecargoNocturno());
		 $rndyf=round($this->getRecargoNocturnoDyF());
		 $prantiguedad=$this->getPrimaAntiguedad();
		 $primatec=round($this->getPrimaTecnica());
		 $gastosrp=round($this->getGastosRepresentacion());
		 $bonserv=round($this->getBonServiciosPrestados());
		 $tdevengado=$basico+$hed+$hedf+$hen+$henf+$dyf+$ren+$rndyf;
		 $tdevengado=$tdevengado+round($primatec)+round($gastosrp)+round($sobrenumera);
		 $tdevengado=$tdevengado+round($prantiguedad[1]);
		
		 $this->Empleoplanta->EMPL_DIASAPAGAR = $diasTemp;
		 return $tdevengado;
		
		}else{	     
			 
				$basico=$this->getSueldoBasico();
				$hed=round($this->getHorasExtrasDiurna());
				$hen=round($this->getHorasExtrasNocturna());
				$hedf=round($this->getHorasExtrasDiurnaFestivo());
				$henf=round($this->getHorasExtrasNocturnaFestivo());
				$dyf=round($this->getDomingosYfestivos());
				$ren=round($this->getRecargoNocturno());
				$rndyf=round($this->getRecargoNocturnoDyF());
				$prantiguedad=$this->getPrimaAntiguedad();
				$primatec=round($this->getPrimaTecnica());
				$gastosrp=round($this->getGastosRepresentacion());
				$bonserv=round($this->getBonServiciosPrestados());
				$tdevengado=$basico+$hed+$hedf+$hen+$henf+$dyf+$ren+$rndyf;
				$tdevengado=$tdevengado+round($primatec)+round($gastosrp)+round($sobrenumera);
				$tdevengado=$tdevengado+round($prantiguedad[1]);
				return $tdevengado;
		}
    }
	
    private	function getSubsistencia($total){

		if($this->Factorsalarial->FASA_SUBSISTENCIA=="t")
		{	
			$sub=(int)($total/$this->valorestablecidos[0][3]);
			$fator=0;
			if ($sub==16)
				$fator=0.002;
			if ($sub==17)
				$fator=0.004;
			if ($sub==18)
				$fator=0.006;
			if ($sub==19)
				$fator=0.008;
			if ($sub>=20)
				$fator=0.01;
			return ($total*$fator);						
		}	
		return 0;
	}

    private	function getEstampilla($total){
		if($this->Factorsalarial->FASA_ESTAMPILLA=="t"){
			return ($total*0.01);
		} 
		return 0;	
    }

    private	function getSindicato(){		
		if ($this->Personageneral->SIND_ID!=999){
		$valor = ((($this->Empleoplanta->EMPL_SUELDO)*($this->Empleoplanta->EMPL_DIASAPAGAR)/30)*($this->Sindicato->SIND_PORCENTAJE/100));	
		return $valor;	
		} 
		return 0;	
	}
		
	/**
	 *Inicio de metodos de calculo de retencion en la fuente
	*/	
	private	function getRetefuente($salud,$pension,$fondosp,$tdevengado){		 
	    /**
	     *En esta primera condicion se mira si es docente y se recalcula nuevamente el total devengado con la suma
	     *de la prima de antiguedad; sueldo por los dias trabajados. Luego se le calcula el 50% de dicha suma.
	     *Tambien se le agrega la bonificacion pero no el 50% de esta bonificacion sino completa
	    */
		/**
		 *Se verifica si es docente
		*/
		if($this->Tipocargo->TICA_ID==2){
		 $prantiguedad = $this->getPrimaAntiguedad();		 
		 $valor = ((($this->Empleoplanta->EMPL_SUELDO)*($this->Empleoplanta->EMPL_DIASAPAGAR)/30));
		 
		 /**
		 *Se declara la variable $valor con el resultado del condicional
		 */
		 $valor = (($valor+$prantiguedad[1])/2)+$this->getBonServiciosPrestados();		
		}elseif($this->Tipocargo->TICA_ID==1){
		 /**
		  *Si el empleado es administrativo se toma el total devengado que viene como parametro. 
		 */
		 $valor = $tdevengado;
		 
		  /**
		   *Si el empleado es el rector (Nivel = 1; Grado = 17), se exceptua el Gasto de representacion tal y como esta en el sigte condicional
		  */   
          if(($this->Empleoplanta->NIVE_ID==1) && ($this->Empleoplanta->GRAD_ID==17)){
   	       $valor = $valor-round($this->getGastosRepresentacion());
          }
         }
		 
		 /**
		   *Recalcular  $valor teniendo en cuenta los factores de retefuente
		   *Menos: Deducciones del art. 387 del E.T.
		 */
		 $valor = $valor-($this->getFactorRetefuente(1)+$this->getFactorRetefuente(2)+$this->getFactorRetefuente(3));
		 
		 /**
		   *Recalcular  $valor teniendo en lo siguiente :
		   *Menos: Deducción por aportes a salud obligatoria
		   *-Aporte mensual promedio que hizo  durante el año gravable anterior por aportes obligatorios
		   *a salud (Ver concepto DIAN 81294 oct./09; y Dec. 2271 de junio de 2009 )
		 */
		 $valor = $valor-($this->getPagoSaludAnioAnterior());
		 /**
		   *Recalcular  $valor teniendo en lo siguiente :
		   *Menos: Deducciones del art. 4 del decreto 2271 de junio de 2009
		   *-Aportes a salud del propio mes que el cobrador de servicios demuestre estar realizando
		 */
		 $valor = $valor-($salud);
		 
		 /**
		   *Recalcular  $valor teniendo en lo siguiente :
		   *Menos: Rentas exentas del art. 126-1 y 126-4 del E.T
		   *-Aportes obligatorios del propio mes a los fondos de pensiones 
		   *-Aportes voluntarios del propio mes a los fondos de pensiones voluntarias 
		   *-Aportes voluntarios del propio mes a las cuentas de ahorro AFC 
		 */
		 //echo '<br><br><br>';
		 $valor = $valor-($pension+$fondosp+$this->getDescuentosMensuales(28)+0);
		 
		 /**
		   *Recalcular  $valor teniendo en lo siguiente :
		   *Menos: El 25% del $valor, sin que mensualmente exceda de 240 UVTs (es decir, 240 x $27.485 = $6.596.000 ) 
		   *(ver numeral 10 del art. 206 del E.T. que fue modificado con el art. 6 de la Ley 1607)   
		 */		
         $valor=$valor-($valor*0.25);
		 
		 if($this->Factorsalarial->FASA_RETEFUENTE=="t"){
		  $uvt=$this->valorestablecidos[10][3];	
		  $rango=$valor/$uvt;
		  if ($rango>0 and $rango<=95){
		   $total = 0;
		  }
		  if ($rango>95 and $rango<=150){
		   $total=($rango-95)*0.19;
		  }
		  if ($rango>150 and $rango<=360){
		   $total=($rango-150)*0.28+10;
		  }
		  if ($rango>360){
		   $total=($rango-360)*0.33+69;
		  }
		 // echo '<br><br><br>'.round($total*$uvt);
		 return round($total*$uvt);		
		}
		
		return 0;	
	}
	
	private	function getFactorRetefuente($factor){
		$connection = Yii::app()->db;
		$sql = 'SELECT "DERE_VALOR" 
		        FROM "TBL_NOMDESCUENTOSRETEFUENTE" "drf" 
				WHERE "PEGE_ID" = '.$this->Personageneral->PEGE_ID.' AND "FARE_ID" = '.$factor;
		$row = $connection->createCommand($sql)->queryRow();
	    $valor = $row["DERE_VALOR"];		 
		return $valor; 	
	}
	
	private	function getDescuentosMensuales($descuento){
		$connection = Yii::app()->db;
		$sql = 'SELECT "NOME_VALOR" 
		        FROM "TBL_NOMNOVEDADESMENSUALES" "drf" 
				WHERE "EMPL_ID" = '.$this->Empleoplanta->EMPL_ID.' AND "DEME_ID" = '.$descuento;
		$row = $connection->createCommand($sql)->queryRow();
	    $valor = $row["NOME_VALOR"];		 
		return $valor; 	
	}
	
	private	function getPagoSaludAnioAnterior(){
		$connection = Yii::app()->db;
		/**
		*se verifica la salud que pago el empleado desde enero hasta diciembre del año anteior
		*/
		$anioAnterior = (date("Y", strtotime($this->MENO_FECHAPROCESO))-1);
		$valor = 0; $item = 1; $salud = 0; $cont = 0;
		//echo '<br><br><br>';
		for($i=1;$i<=12;$i++){
		if($i<10){$i = '0'.$i;}
		 $sql = 'SELECT mnl."MENO_ID", SUM("MENP_SALUDTOTAL") AS "MENP_SALUDTOTAL"
                 FROM "TBL_NOMEMPLEOSPLANTA" "ep", "TBL_NOMMENSUALNOMINA" "mn", "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl", "TBL_NOMMENSUALNOMINAPARAFISCALES" "mnp"
                 WHERE ep."EMPL_ID" = mnl."EMPL_ID" 
				 AND mn."MENO_ID" = mnl."MENO_ID" 
				 AND mnl."MENL_ID" = mnp."MENL_ID" 
				 AND ep."PEGE_ID" = '.$this->Personageneral->PEGE_ID.'
				 AND mn."MENO_ANIO" = '.$anioAnterior.' AND mn."MENO_ID" = '."'".$anioAnterior.$i."01'".'
				 GROUP BY mnl."MENL_ID"';
				 
		 $row = $connection->createCommand($sql)->queryRow();
		 if($row['MENO_ID']!=''){
		  $cont = $cont + 1;
		  $valor = $row["MENP_SALUDTOTAL"];
		  $salud = $salud + $valor;	  
		 }
		 //echo $i.' '.$item.'<br>';
		}
        
		/**
		*si tiene 12 o mas meses pagos durante el año anterior se promedia normal con 12 meses
		*de lo contrario se promedia con los meses pagados
		*/
		//echo $salud;
		
		$item = $item+$cont;
		if($item>=12){
		 $salud = round($salud/12);	
		}else{
		     $salud = round($salud/$item);
			 }		 
		//echo $salud;	 
		return $salud; 	
	}
	
	/**
	 *Fin de metodos de calculo de retencion en la fuente
	*/
	
	private function setLiquidacion($devengados,$paraficales){
	     $connection = Yii::app()->db;
		 $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
	     $Mensualnominaparafiscales = new Mensualnominaparafiscales;
		 
		 /**
		 *consulta de los descuentos mensuales del cargo del empleado
		 */
		 $sql='SELECT dm."DEME_ID", dm."DEME_DESCRIPCION", nm."NOME_VALOR"
		      FROM "TBL_NOMNOVEDADESMENSUALES" nm, "TBL_NOMDESCUENTOSMENSUALES" dm
			  WHERE dm."DEME_ID" = nm."DEME_ID" AND nm."EMPL_ID" = '.$this->Empleoplanta->EMPL_ID.'
			  ORDER BY dm."DEME_ID" ASC';
			  
		 /**
		 *sumatoria de descuentos mensuales del cargo del empleado
		 */
		 $string = 'SELECT SUM("NOME_VALOR") AS "NOME_VALOR" FROM ('.$sql.') d';
		 $query = $connection->createCommand($string)->queryRow();
		 
		 
		 $Mensualnominaliquidaciones->MENL_CODIGO = $this->codigo;
		 $Mensualnominaliquidaciones->MENL_DIAS = $this->Empleoplanta->EMPL_DIASAPAGAR;
		 $Mensualnominaliquidaciones->MENL_PUNTOS = $this->Empleoplanta->EMPL_PUNTOS;
		 $Mensualnominaliquidaciones->MENL_SALARIO = $devengados[0];
		 $Mensualnominaliquidaciones->MENL_PRIMAANTIGUEDAD = $devengados[8];
		 $Mensualnominaliquidaciones->MENL_TRANSPORTE =  $devengados[9];
		 $Mensualnominaliquidaciones->MENL_ALIMENTACION = $devengados[10];
		 $Mensualnominaliquidaciones->MENL_HED = $this->Horasextrasyrecargos->HOER_HED;
		 $Mensualnominaliquidaciones->MENL_HEDTOTAL = $devengados[1];
		 $Mensualnominaliquidaciones->MENL_HEN = $this->Horasextrasyrecargos->HOER_HEN;
		 $Mensualnominaliquidaciones->MENL_HENTOTAL = $devengados[2];
		 $Mensualnominaliquidaciones->MENL_HEDF = $this->Horasextrasyrecargos->HOER_HEDF;
		 $Mensualnominaliquidaciones->MENL_HEDFTOTAL = $devengados[3];
		 $Mensualnominaliquidaciones->MENL_HENF = $this->Horasextrasyrecargos->HOER_HENF;
		 $Mensualnominaliquidaciones->MENL_HENFTOTAL = $devengados[4];
		 $Mensualnominaliquidaciones->MENL_DYF = $this->Horasextrasyrecargos->HOER_DYF;
		 $Mensualnominaliquidaciones->MENL_DYFTOTAL = $devengados[5];
		 $Mensualnominaliquidaciones->MENL_REN = $this->Horasextrasyrecargos->HOER_REN;
		 $Mensualnominaliquidaciones->MENL_RENTOTAL = $devengados[6];
		 $Mensualnominaliquidaciones->MENL_RENDYF = $this->Horasextrasyrecargos->HOER_RENDYF;
		 $Mensualnominaliquidaciones->MENL_RENDYFTOTAL = $devengados[7];
		 $Mensualnominaliquidaciones->MENL_PRIMATECNICA = $devengados[11];
		 $Mensualnominaliquidaciones->MENL_GASTOSRP = $devengados[12];
		 $Mensualnominaliquidaciones->MENL_BONIFICACION = $devengados[13];
		 $Mensualnominaliquidaciones->MENL_PRIMAVACACIONES = $devengados[14];
		 $Mensualnominaliquidaciones->MENO_ID = $this->MENO_ID;
		 $Mensualnominaliquidaciones->EMPL_ID = $this->Empleoplanta->EMPL_ID;
		 $Mensualnominaliquidaciones->MENL_FECHACAMBIO = date('Y-m-d H:i:s');
		 $Mensualnominaliquidaciones->MENL_REGISTRADOPOR = Yii::app()->user->id;
		 if($Mensualnominaliquidaciones->save()){
		  
		  /**
		  *verificar que los valores de las liquidacion 
		  *de los empleados nos sean negativos o contengan algun error
		  */
		  if($devengados[15]<($paraficales[7]+$query["NOME_VALOR"])){
		    $this->w+=1;
	  	    $this->warning[$this->w-1][0] = $this->Personageneral->PEGE_IDENTIFICACION;
		    $this->warning[$this->w-1][1] = $this->Empleoplanta->EMPL_CARGO;
		    $this->warning[$this->w-1][2] = $this->Personageneral->PEGE_PRIMERNOMBRE.' '.$this->Personageneral->PEGE_PRIMERAPELLIDO;
		    $this->warning[$this->w-1][3] = $devengados[15];
		    $this->warning[$this->w-1][4] = ($paraficales[7]+$query["NOME_VALOR"]);
		  }else{
		        $this->s+=1; 
				$this->success[$this->s-1][0] = $this->Personageneral->PEGE_IDENTIFICACION;
		        $this->success[$this->s-1][1] = $this->Empleoplanta->EMPL_CARGO;
		       }			   
		 }else{ 
		        $msg = print_r($Mensualnominaliquidaciones->getErrors(),1);
                throw new CHttpException(400,'data not saving: '.$msg );
			    $this->f+=1;
	  	        $this->flag[$this->f-1][0] = $this->Personageneral->PEGE_IDENTIFICACION;
		        $this->flag[$this->f-1][1] = $this->Empleoplanta->EMPL_CARGO;
		        $this->flag[$this->f-1][2] = $this->Personageneral->PEGE_PRIMERNOMBRE.' '.$this->Personageneral->PEGE_PRIMERAPELLIDO;
		        $this->flag[$this->f-1][3] = $Mensualnominaliquidaciones->getErrors();
		      }
	     
		 $Pension = Pension::model()->findByPk($this->Personageneral->PENS_ID);
		 $Salud = Salud::model()->findByPk($this->Personageneral->SALU_ID);
		 $Sindicato = Sindicatos::model()->findByPk($this->Personageneral->SIND_ID);
		 
		 $Mensualnominaparafiscales->SALU_ID = $Salud->SALU_ID;
         $Mensualnominaparafiscales->MENP_SALUDTOTAL = $paraficales[0];
         $Mensualnominaparafiscales->PENS_ID = $Pension->PENS_ID;
         $Mensualnominaparafiscales->MENP_PENSIONTOTAL = $paraficales[1];
         $Mensualnominaparafiscales->SIND_ID = $Sindicato->SIND_ID;
         $Mensualnominaparafiscales->MENP_SINDICATOTOTAL = $paraficales[3];
         $Mensualnominaparafiscales->MENP_FONDOSP = $paraficales[4];
         $Mensualnominaparafiscales->MENP_SUBSISTENCIA = $paraficales[2];
         $Mensualnominaparafiscales->MENP_ESTAMPILLA = $paraficales[6];
         $Mensualnominaparafiscales->MENP_RETEFUENTETOTAL = $paraficales[5];
         $Mensualnominaparafiscales->MENL_ID = $Mensualnominaliquidaciones->MENL_ID;
         $Mensualnominaparafiscales->MENP_FECHACAMBIO = $Mensualnominaliquidaciones->MENL_FECHACAMBIO;
         $Mensualnominaparafiscales->MENP_REGISTRADOPOR = $Mensualnominaliquidaciones->MENL_REGISTRADOPOR;
         $Mensualnominaparafiscales->save();		 
		 
		
		
			  
        $rows = $connection->createCommand($sql)->queryAll();
		foreach($rows as $row){
		 $Mensualnominadescuentos = new Mensualnominadescuentos;
		 $Mensualnominadescuentos->MEND_VALOR = $row["NOME_VALOR"];
         $Mensualnominadescuentos->DEME_ID = $row["DEME_ID"];
         $Mensualnominadescuentos->MENL_ID = $Mensualnominaliquidaciones->MENL_ID;
         $Mensualnominadescuentos->MEND_FECHACAMBIO = $Mensualnominaliquidaciones->MENL_FECHACAMBIO;
         $Mensualnominadescuentos->MEND_REGISTRADOPOR = $Mensualnominaliquidaciones->MENL_REGISTRADOPOR;
         $Mensualnominadescuentos->save();
        
		}
	
    }	
}