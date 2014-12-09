<?php
$model=Navidadnomina::model()->findByPk($navidadNomina);
$Periodo = $model->NANO_PERIODO;
$sql = ' nn."NANO_ID" = '.$model->NANO_ID;
$unidades = $Navidadnominaliquidaciones->getUnidadesEnNomina($sql);

foreach($unidades as $unidad){
 $Unidades = Unidades::model()->findByPk($unidad["UNID_ID"]);
 $query = ' '.$sql.' AND u."UNID_ID" =  '.$Unidades->UNID_ID;
 $Navidadnominaliquidaciones->mostrarLiquidacion($query);
 
 $filas = count($Navidadnominaliquidaciones->liquidacion);
 $columnas = count($Navidadnominaliquidaciones->liquidacion[1]);
 $parafisales = count($Navidadnominaliquidaciones->parafiscales[0]);

 $tblD = $Navidadnominaliquidaciones->descuentos;
 $filasTblD = count($tblD);
 $columnasTblD = count($tblD[0]);
 $path = ("reportes/planoporunidades/");
 $file = ($Unidades->UNID_ID);
 $realPath = $path.$file; 
 $modo="w";
 $arc = new Archivo($realPath.".dat",$modo);
 
 $tercero = 'UNIDAD : '.$Unidades->UNID_ID.' - '. $Unidades->UNID_NOMBRE;
 $c1=11;$c2=44;$c3=25;$c4=6;$c5=15;$c6=13;$c7=14;
 ////Encabezado
 $encabezado = $arc->izquierda("UNIVERSIDAD DE LA GUAJIRA",85).$arc->enter().
               $arc->izquierda("SECCION DE PERSONAL",85).$arc->izquierda("PERIODO      : $Periodo",60).$arc->enter().
			   $arc->izquierda("INFORME DE PRIMA DE NAVIDAD",85).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
			   $arc->izquierda($tercero,85)."PAGINA       : ";
 ////Titulo
 $titulo = $arc->enter().
  chr(218).$arc->lineaH($c1).chr(194).$arc->lineaH($c2).chr(194).$arc->lineaH($c3).chr(194).$arc->lineaH($c4).chr(194).$arc->lineaH($c5).chr(194).$arc->lineaH($c6).chr(194).$arc->lineaH(14).chr(191).$arc->enter().
  chr(179).$arc->centro("CEDULA",$c1).chr(179).$arc->centro("NOMBRES Y CARGOS",$c2).chr(179).$arc->centro("CONCEPTOS",$c3).chr(179).$arc->centro("MESES",$c4).chr(179).$arc->centro("DEVENGADOS",$c5).chr(179).$arc->centro("DESCUENTOS",$c6).chr(179).$arc->centro("NETO",14).chr(179).$arc->enter().
  chr(195).$arc->lineaH($c1).chr(197).$arc->lineaH($c2).chr(197).$arc->lineaH($c3).chr(197).$arc->lineaH($c4).chr(197).$arc->lineaH($c5).chr(197).$arc->lineaH($c6).chr(197).$arc->lineaH($c7).chr(180).$arc->enter();
 $pagina=1;
 $arc->escribir($encabezado.$pagina);
 $arc->escribir($titulo);
 $linpag=7;
 
 for($i=1;$i<$filas-1;$i++){ 
  $neto = ($Navidadnominaliquidaciones->liquidacion[$i][$columnas-1])-(($Navidadnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1]));
  if($neto!=0){
    $anio=substr($Navidadnominaliquidaciones->liquidacion[$i][14],0,4);    
	$Parametrosglobales = new Parametrosglobales; 	 
	$Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
	$valorPunto = $Parametrosglobales[1][3];
	$Navidadnomina = Navidadnomina::model()->findByPk($Navidadnominaliquidaciones->liquidacion[$i][14]);
	$Mensualnomina = new Mensualnomina;
	$Mensualnomina->cargarEmpleoPlanta($Navidadnominaliquidaciones->liquidacion[$i][15]);

	//*************************INCICIA LA CAPTURA DE LOS DATOS BASICOS *************************************************//
	$basico=NULL;
	$basico[0]=$arc->espacio($c1).chr(179).$arc->izquierda("Comprobante No. ".$Navidadnominaliquidaciones->liquidacion[$i][14].'-'.$Navidadnominaliquidaciones->liquidacion[$i][1],$c2);
	$basico[1]=$arc->espacio($c1).chr(179).$arc->izquierda(trim($Navidadnomina->NANO_PERIODO), $c2);
	$basico[2]=$arc->centro(trim($Mensualnomina->Personageneral->PEGE_IDENTIFICACION),$c1).chr(179).$arc->izquierda(trim($Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO).$arc->espacio(1).trim($Mensualnomina->Personageneral->PEGE_SEGUNDOAPELLIDOS).$arc->espacio(1).trim($Mensualnomina->Personageneral->PEGE_PRIMERNOMBRE).$arc->espacio(1).trim($Mensualnomina->Personageneral->PEGE_SEGUNDONOMBRE),$c2);
	$basico[3]=$arc->espacio($c1).chr(179).$arc->izquierda(trim($Mensualnomina->Tipocargo->TICA_NOMBRE), $c2);
	$basico[4]=$arc->espacio($c1).chr(179).$arc->izquierda(trim($Mensualnomina->Empleoplanta->EMPL_CARGO), $c2);
	if ($Mensualnomina->Tipocargo->TICA_ID==2 or $Mensualnomina->Tipocargo->TICA_ID==3){
		$basico[5]=$arc->espacio($c1).chr(179).$arc->izquierda(("PUNTOS ".trim($Mensualnomina->Empleoplanta->EMPL_PUNTOS)), $c2);
		$basico[6]=$arc->espacio($c1).chr(179).$arc->izquierda(("VR PUNTO $valorPunto"), $c2);
	}else{
		$basico[5]=$arc->espacio($c1).chr(179).$arc->espacio($c2);
		$basico[6]=$arc->espacio($c1).chr(179).$arc->espacio($c2);
		}
	$basico[7]=$arc->espacio($c1).chr(179).$arc->izquierda(trim($Mensualnomina->Unidad->UNID_ID." -> ".$Mensualnomina->Unidad->UNID_NOMBRE), $c2);
	
	//*************************INCICIA LA CAPTURA DE LOS PAGOS ************************************************************//
	$pago=NULL;
	$pago[0]=$arc->izquierda("SUELDO (".number_format($Navidadnominaliquidaciones->liquidacion[$i][4]).")",$c3).chr(179).$arc->centro($Navidadnominaliquidaciones->liquidacion[$i][2],$c4).chr(179).$arc->derecha(number_format($Navidadnominaliquidaciones->liquidacion[$i][5]),$c5).chr(179).$arc->espacio($c6).chr(179).$arc->espacio($c7);
	$lineapago=1;
	
	    /* antiguedad, transporte y alimentacion*/
		for ($ln=6;$ln<14;$ln++){
		  if ($Navidadnominaliquidaciones->liquidacion[$i][$ln]!=0){
			  if ($ln==6){
				$antig = $Mensualnomina->Personageneral->getAntiguedad($Navidadnominaliquidaciones->liquidacion[$i][14])." A";
			  }else{
				  $antig=" ";
				  }
		   $pago[$lineapago]=$arc->izquierda($Navidadnominaliquidaciones->liquidacion[0][$ln],$c3).chr(179).$arc->centro($antig,$c4).chr(179).$arc->derecha(number_format($Navidadnominaliquidaciones->liquidacion[$i][$ln]),$c5).chr(179).$arc->espacio($c6).chr(179).$arc->espacio($c7);
		   $lineapago++;
		  }
		}
		
		/*parafiscales*/
		for ($ln=1;$ln<2;$ln++){
			if ($Navidadnominaliquidaciones->parafiscales[$i][$ln]!=0){
				$pago[$lineapago]=$arc->izquierda($Navidadnominaliquidaciones->parafiscales[0][$ln],$c3).chr(179).$arc->espacio($c4).chr(179).$arc->espacio($c5).chr(179).$arc->derecha(number_format($Navidadnominaliquidaciones->parafiscales[$i][$ln]),$c6).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
		
		/*descuentos*/
		for ($c=1;$c<($columnasTblD-1);$c++){
		   if ($tblD[$i][$c]!=0){
				$pago[$lineapago]=$arc->izquierda(trim($tblD[0][$c]),$c3).chr(179).$arc->espacio($c4).chr(179).$arc->espacio($c5).chr(179);
				$pago[$lineapago].=$arc->derecha(number_format($tblD[$i][$c]),$c6).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
				
		/*totales*/
		$pago[$lineapago]=$arc->centro("TOTALES",$c3).chr(179).$arc->espacio($c4).chr(179);
		$pago[$lineapago].=$arc->derecha(number_format($Navidadnominaliquidaciones->liquidacion[$i][$columnas-1]),$c5).chr(179);
		$pago[$lineapago].=$arc->derecha(number_format(($Navidadnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1])),$c6).chr(179);
		$pago[$lineapago].=$arc->derecha(number_format(($Navidadnominaliquidaciones->liquidacion[$i][$columnas-1])-(($Navidadnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1]))),$c7);
		
        //**********************A PARTIR DE AQUI SE COMIENZA A IMPRIMIR LO ANTES GUARDADO**************************************
		if(count($basico)>count($pago)){
			$linearep=count($basico);
		}else{
			 $linearep=count($pago);
		     }
		//Determinar si pasa a la otra pagina
		$linpag=$linpag+$linearep+1;
		//Si se pasa mas de 60 lineas.
		if($linpag>=60){
		  $arc->bajar(66- ($linpag - $linearep));//Cada pagina tiene 66 lineas
		  $pagina++;
	 	  $linpag=$linearep+7;
	 	  $arc->bajar(1);//Esta instruccion baja el encabezado una linea, pero para que funcione debe estar despues la instruccion $linpag++;
		  $arc->escribir($encabezado.$pagina);
		  $arc->escribir($titulo);
		  $linpag++;//Esta instruccion es el complemento de la antes ya comentada si borra la anterior debe borrar esta		
		}
		
		for($j=0;$j<$linearep;$j++){
			if($j>(count($pago)-1)){
				$arc->escribir(chr(179).$basico[$j].chr(179).$arc->espacio($c3).chr(179).$arc->espacio($c4).chr(179).$arc->espacio($c5).chr(179).$arc->espacio($c6).chr(179).$arc->espacio($c7).chr(179).$arc->enter());
			}elseif($j>(count($basico)-1)){
					$arc->escribir(chr(179).$arc->espacio($c1).chr(179).$arc->espacio($c2).chr(179).$pago[$j].chr(179).$arc->enter());
				}else{
				      $arc->escribir(chr(179).$basico[$j].chr(179).$pago[$j].chr(179).$arc->enter());
			         }
		}
			
		$arc->escribir(chr(195).$arc->lineaH($c1).chr(197).$arc->lineaH($c2).chr(197).$arc->lineaH($c3).chr(197).$arc->lineaH($c4).chr(197).$arc->lineaH($c5).chr(197).$arc->lineaH($c6).chr(197).$arc->lineaH($c7).chr(217));
		$arc->enterH();		
  } 
 }
 $linpag=67-$linpag-1;
 $arc->bajar($linpag);
 $pagina++;
 $encabezado=$arc->izquierda("UNIVERSIDAD DE LA GUAJIRA",90).$arc->enter().
             $arc->izquierda("SECCION DE PERSONAL",90).$arc->izquierda("PERIODO      : $Periodo",60).$arc->enter().
	         $arc->izquierda("INFORME DE PRIMA DE NAVIDAD",90).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
	         $arc->izquierda($tercero,90)."PAGINA       : ";
	   
 $titulo=$arc->centro("<< T O T A L E S    R E S U M E N >>",127).$arc->enter();
         $arc->escribir($encabezado.$pagina.$arc->enter());
         $arc->escribir($titulo);   
 
 //*************************INCICIA LA CAPTURA DE LA COLUMNA 1 *************************************************
$detalle1=NULL;
 $detalle1[0]=$arc->izquierda("SUELDO BASICO------------------->".$arc->derecha(number_format($Navidadnominaliquidaciones->liquidacion[$filas-1][5]),16)."",80);
 $detalle1[1]=$arc->izquierda("GASTOS DE REPRESENTACION-------->".$arc->derecha(number_format($Navidadnominaliquidaciones->liquidacion[$filas-1][10]),16)."",80);
 $detalle1[2]=$arc->izquierda("SUBSIDIO DE TRANSPORTE---------->".$arc->derecha(number_format($Navidadnominaliquidaciones->liquidacion[$filas-1][7]),16)."",80);
 $detalle1[3]=$arc->izquierda("PRIMA DE ANTIGUEDAD------------->".$arc->derecha(number_format($Navidadnominaliquidaciones->liquidacion[$filas-1][6]),16)."",80);
 $detalle1[4]=$arc->izquierda("PRIMA TECNICA------------------->".$arc->derecha(number_format($Navidadnominaliquidaciones->liquidacion[$filas-1][9]),16)."",80);
 $detalle1[5]=$arc->izquierda("PRIMA DE ALIMENTACION----------->".$arc->derecha(number_format($Navidadnominaliquidaciones->liquidacion[$filas-1][8]),16)."",80);
 $detalle1[6]=$arc->izquierda("BONIFICACION SERVIC. PRESTADOS-->".$arc->derecha(number_format($Navidadnominaliquidaciones->liquidacion[$filas-1][11]),16)."",80);
 $detalle1[7]=$arc->izquierda("RIMA SEMESTRAL------------------>".$arc->derecha(number_format($Navidadnominaliquidaciones->liquidacion[$filas-1][12]),16)."",80);
 $detalle1[8]=$arc->izquierda("PRIMA VACACIONES---------------->".$arc->derecha(number_format($Navidadnominaliquidaciones->liquidacion[$filas-1][13]),16)."",80);
 $detalle1[9]=$arc->izquierda("TOTAL DEVENGADO:---------------->".$arc->derecha(number_format($Navidadnominaliquidaciones->liquidacion[$filas-1][16]),16)."",80);
 $detalle1[10]=$arc->espacio(80);
 $detalle1[11]=$arc->espacio(80);
 
 
  
  
  //*************************INCICIA LA CAPTURA DE LA COLUMNA 2 *************************************************
  $detalle2=NULL;  $suma = 0;
  $detalle2[0]=$arc->izquierda("RETENCION EN LA FUENTE--------->".$arc->derecha(number_format($Navidadnominaliquidaciones->parafiscales[$filas-1][1]),15)."",50);
  $suma += $Navidadnominaliquidaciones->parafiscales[$filas-1][1];
  $lindet2=1;
    
  for($i=1;$i<($columnasTblD-1);$i++){
	$suma+=$tblD[$filas-1][$i];
	$detalle2[$lindet2]=$arc->izquierda(trim($tblD[0][$i]),31,"-").">".$arc->derecha(number_format($tblD[$filas-1][$i]),15);
	$lindet2++;
   }
  
  $detalle2[$lindet2]=$arc->izquierda("TOTAL DESCUENTOS",31,"-").">".$arc->derecha(number_format($suma),15); $lindet2++;
  $detalle2[$lindet2]=$arc->espacio(46); $lindet2++;
  
  $detalle2[$lindet2]=$arc->izquierda("<<<      APROPIACIONES       >>>",31," "); $lindet2++;
  $var = $Navidadnominaliquidaciones->getCesantias($Navidadnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("CESANTIAS (8.33%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  
  $totalapr=round($var); $var=$Navidadnominaliquidaciones->getInteresesCesantias($Navidadnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("INTERESES CESANTIAS (1%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Navidadnominaliquidaciones->getPrimaNavidad($Navidadnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("PRIMA DE NAVIDAD (8.33%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Navidadnominaliquidaciones->getPrimaVacaciones($Navidadnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("PRIMA DE VACACIONES (4.17%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Navidadnominaliquidaciones->getVacaciones($Navidadnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("VACACIONES (4.17%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $varPS=$Navidadnominaliquidaciones->getPrimaSemestral($Navidadnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("PRIMA SEMESTRAL (8.33%)",31,"-").">".$arc->derecha(number_format($varPS),15); $lindet2++;
  $totalapr+=round($var);
  $baseicbf=$Navidadnominaliquidaciones->liquidacion[$filas-1][$columnas-1]-($Navidadnominaliquidaciones->liquidacion[$filas-1][6]);
  $var=$Navidadnominaliquidaciones->getIcbf($baseicbf);
  $detalle2[$lindet2]=$arc->espacio(46); $lindet2++;
  
  $detalle2[$lindet2]=$arc->izquierda("<<<      PARAFISCALES       >>>",31," "); $lindet2++;
  $detalle2[$lindet2]=$arc->izquierda("I. C. B. F. (3%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Navidadnominaliquidaciones->getCajaCompensacion($baseicbf);
  $detalle2[$lindet2]=$arc->izquierda("CAJA DE COMPENSACION (4%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  
  //************************A PARTIR DE AQUI SE COMIENZA A IMPRIMIR LO ANTES GUARDADO*************************************
	if(count($detalle1)>count($detalle2)){
		$linearep=count($detalle1);
	}else{
	     $linearep=count($detalle2);
		}
		
	for($j=0;$j<$linearep;$j++){
		if($j>(count($detalle2)-1)){
			$arc->escribir($detalle1[$j].$arc->espacio(47).$arc->enter());
		}else if($j>(count($detalle1)-1)){
			$arc->escribir($arc->espacio(80).$detalle2[$j].$arc->enter());
		}else{
		     $arc->escribir($detalle1[$j].$detalle2[$j].$arc->enter());
	        }
	}
	
  //Pagina siguiente
  for($j=0;$j<=(67-$linearep-5);$j++){
	$arc->escribir($arc->enter());
  }
 
  $pagina++;
  $arc->escribir($encabezado.$pagina.$arc->enter());
  $arc->escribir($arc->enter());
  $arc->escribir($arc->enter());
  $titulo=$arc->centro("<< R E S P A L D O   P R E S U P U E S T A L   Y   F I R M A S >>",127).$arc->enter();
  $arc->escribir($titulo);
  $arc->escribir($arc->enter());
  $arc->escribir($arc->enter());
  $arc->escribir($arc->enter());
  $arc->escribir($arc->centro("SECCION____________ ART______________  VALOR ____________________",127).$arc->enter().$arc->enter());
  $arc->escribir($arc->centro("SECCION____________ ART______________  VALOR ____________________",127).$arc->enter().$arc->enter());
  $arc->escribir($arc->centro("SECCION____________ ART______________  VALOR ____________________",127).$arc->enter().$arc->enter());
  $arc->escribir($arc->centro("SECCION____________ ART______________  VALOR ____________________",127).$arc->enter());
  
  for($j=0;$j<20;$j++){
	 $arc->escribir($arc->enter());
  }
 
  $arc->escribir($arc->centro("__________________________           ________________________          _______________________         _______________________",127).$arc->enter());
  $arc->escribir($arc->centro("VICE-RECTOR ADMINISTRATIVO            PROFESIONAL UNIV. PPTO.              TESORERO PAGADOR              DIR. TALENTO HUMANO   ",127).$arc->enter());
  $arc->cerrar();	
 
 }
$arc->downloadFileUnidad($path,$file,$unidades);
?>