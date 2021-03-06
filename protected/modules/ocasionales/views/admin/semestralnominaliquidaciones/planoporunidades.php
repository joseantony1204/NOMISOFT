<?php
$model=Semestralnomina::model()->findByPk($semestralNomina);
$Periodo = $model->SENO_PERIODO;
$sql = ' sn."SENO_ID" = '.$model->SENO_ID;
$unidades = $Semestralnominaliquidaciones->getUnidadesEnNomina($sql);

foreach($unidades as $unidad){
 $Unidades = Unidades::model()->findByPk($unidad["UNID_ID"]);
 $query = ' '.$sql.' AND u."UNID_ID" =  '.$Unidades->UNID_ID;
 $Semestralnominaliquidaciones->mostrarLiquidacion($query);
 
 $filas = count($Semestralnominaliquidaciones->liquidacion);
 $columnas = count($Semestralnominaliquidaciones->liquidacion[1]);
 $parafisales = count($Semestralnominaliquidaciones->parafiscales[0]);

 $tblD = $Semestralnominaliquidaciones->descuentos;
 $filasTblD = count($tblD);
 $columnasTblD = count($tblD[0]);
 $path = ("reportes\\planoporunidades\\");
 $file = ($Unidades->UNID_ID);
 $realPath = $path.$file; 
 $modo="w";
 $arc = new Archivo($realPath.".dat",$modo);
 
 $tercero = 'UNIDAD : '.$Unidades->UNID_ID.' - '. $Unidades->UNID_NOMBRE;
 $c1=11;$c2=44;$c3=25;$c4=6;$c5=15;$c6=13;$c7=14;
 ////Encabezado
 $encabezado = $arc->izquierda("UNIVERSIDAD DE LA GUAJIRA",85).$arc->enter().
               $arc->izquierda("SECCION DE PERSONAL",85).$arc->izquierda("PERIODO      : $Periodo",60).$arc->enter().
			   $arc->izquierda("INFORME DE PRIMA SEMESTRAL",85).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
			   $arc->izquierda($tercero,85)."PAGINA       : ";
 ////Titulo
 $titulo = $arc->enter()."Ú".$arc->lineaH($c1)."Â".$arc->lineaH($c2)."Â".$arc->lineaH($c3)."Â".$arc->lineaH($c4)."Â".$arc->lineaH($c5)."Â".$arc->lineaH($c6)."Â".$arc->lineaH(14)."¿".$arc->enter()."³".
           $arc->centro("CEDULA",$c1)."³".$arc->centro("NOMBRES Y CARGOS",$c2)."³".$arc->centro("CONCEPTOS",$c3)."³".$arc->centro("DIAS",$c4)."³".$arc->centro("DEVENGADOS",$c5)."³".$arc->centro("DESCUENTOS",$c6)."³".$arc->centro("NETO",14)."³".$arc->enter()."Ã".
		   $arc->lineaH($c1)."Å".$arc->lineaH($c2)."Å".$arc->lineaH($c3)."Å".$arc->lineaH($c4)."Å".$arc->lineaH($c5)."Å".$arc->lineaH($c6)."Å".$arc->lineaH($c7)."´".$arc->enter();
 $pagina=1;
 $arc->escribir($encabezado.$pagina);
 $arc->escribir($titulo);
 $linpag=7;
 
 for($i=1;$i<$filas-1;$i++){ 
  $neto = ($Semestralnominaliquidaciones->liquidacion[$i][$columnas-1])-(($Semestralnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1]));
  if($neto!=0){
    $anio=substr($Semestralnominaliquidaciones->liquidacion[$i][11],0,4);    
	$Parametrosglobales = new Parametrosglobales; 	 
	$Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
	$valorPunto = $Parametrosglobales[1][3];
	$Semestralnomina = Semestralnomina::model()->findByPk($Semestralnominaliquidaciones->liquidacion[$i][11]);
	$Mensualnomina = new Mensualnomina;
	$Mensualnomina->cargarEmpleoPlanta($Semestralnominaliquidaciones->liquidacion[$i][12]);

	//*************************INCICIA LA CAPTURA DE LOS DATOS BASICOS *************************************************//
	$basico=NULL;
	$basico[0]=$arc->espacio($c1)."³".$arc->izquierda("Comprobante No. ".$Semestralnominaliquidaciones->liquidacion[$i][11].'-'.$Semestralnominaliquidaciones->liquidacion[$i][1],$c2);
	$basico[1]=$arc->espacio($c1)."³".$arc->izquierda(trim($Semestralnomina->SENO_PERIODO), $c2);
	$basico[2]=$arc->centro(trim($Mensualnomina->Personageneral->PEGE_IDENTIFICACION),$c1)."³".$arc->izquierda(trim($Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO).$arc->espacio(1).trim($Mensualnomina->Personageneral->PEGE_SEGUNDOAPELLIDOS).$arc->espacio(1).trim($Mensualnomina->Personageneral->PEGE_PRIMERNOMBRE).$arc->espacio(1).trim($Mensualnomina->Personageneral->PEGE_SEGUNDONOMBRE),$c2);
	$basico[3]=$arc->espacio($c1)."³".$arc->izquierda(trim($Mensualnomina->Tipocargo->TICA_NOMBRE), $c2);
	$basico[4]=$arc->espacio($c1)."³".$arc->izquierda(trim($Mensualnomina->Empleoplanta->EMPL_CARGO), $c2);
	if ($Mensualnomina->Tipocargo->TICA_ID==2 or $Mensualnomina->Tipocargo->TICA_ID==3){
		$basico[5]=$arc->espacio($c1)."³".$arc->izquierda(("PUNTOS ".trim($Mensualnomina->Empleoplanta->EMPL_PUNTOS)), $c2);
		$basico[6]=$arc->espacio($c1)."³".$arc->izquierda(("VR PUNTO $valorPunto"), $c2);
	}else{
		$basico[5]=$arc->espacio($c1)."³".$arc->espacio($c2);
		$basico[6]=$arc->espacio($c1)."³".$arc->espacio($c2);
		}
	$basico[7]=$arc->espacio($c1)."³".$arc->izquierda(trim($Mensualnomina->Unidad->UNID_ID." -> ".$Mensualnomina->Unidad->UNID_NOMBRE), $c2);
	
	//*************************INCICIA LA CAPTURA DE LOS PAGOS ************************************************************//
	$pago=NULL;
	$pago[0]=$arc->izquierda("SUELDO (".number_format($Mensualnomina->Empleoplanta->EMPL_SUELDO).")",$c3)."³".$arc->centro($Semestralnominaliquidaciones->liquidacion[$i][2],$c4)."³".$arc->derecha(number_format($Semestralnominaliquidaciones->liquidacion[$i][4]),$c5)."³".$arc->espacio($c6)."³".$arc->espacio($c7);
	$lineapago=1;
	
	    /* antiguedad, transporte y alimentacion*/
		for ($ln=5;$ln<11;$ln++){
		  if ($Semestralnominaliquidaciones->liquidacion[$i][$ln]!=0){
			  if ($ln==5){
				$antig = $Mensualnomina->Personageneral->getAntiguedad($Semestralnominaliquidaciones->liquidacion[$i][11])." A";
			  }else{
				  $antig=" ";
				  }
		   $pago[$lineapago]=$arc->izquierda($Semestralnominaliquidaciones->liquidacion[0][$ln],$c3)."³".$arc->centro($antig,$c4)."³".$arc->derecha(number_format($Semestralnominaliquidaciones->liquidacion[$i][$ln]),$c5)."³".$arc->espacio($c6)."³".$arc->espacio($c7);
		   $lineapago++;
		  }
		}
		
		/*parafiscales*/
		for ($ln=1;$ln<2;$ln++){
			if ($Semestralnominaliquidaciones->parafiscales[$i][$ln]!=0){
				$pago[$lineapago]=$arc->izquierda($Semestralnominaliquidaciones->parafiscales[0][$ln],$c3)."³".$arc->espacio($c4)."³".$arc->espacio($c5)."³".$arc->derecha(number_format($Semestralnominaliquidaciones->parafiscales[$i][$ln]),$c6)."³".$arc->espacio($c7);
				$lineapago++;
			}
		}
		
		/*descuentos*/
		for ($c=1;$c<($columnasTblD-1);$c++){
		   if ($tblD[$i][$c]!=0){
				$pago[$lineapago]=$arc->izquierda($tblD[0][$c],$c3)."³".$arc->espacio($c4)."³".$arc->espacio($c5)."³";
				$pago[$lineapago].=$arc->derecha(number_format($tblD[$i][$c]),$c6)."³".$arc->espacio($c7);
				$lineapago++;
			}
		}
				
		/*totales*/
		$pago[$lineapago]=$arc->centro("TOTALES",$c3)."³".$arc->espacio($c4)."³";
		$pago[$lineapago].=$arc->derecha(number_format($Semestralnominaliquidaciones->liquidacion[$i][$columnas-1]),$c5)."³";
		$pago[$lineapago].=$arc->derecha(number_format(($Semestralnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1])),$c6)."³";
		$pago[$lineapago].=$arc->derecha(number_format(($Semestralnominaliquidaciones->liquidacion[$i][$columnas-1])-(($Semestralnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1]))),$c7);
		
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
				$arc->escribir("³".$basico[$j]."³".$arc->espacio($c3)."³".$arc->espacio($c4)."³".$arc->espacio($c5)."³".$arc->espacio($c6)."³".$arc->espacio($c7)."³".$arc->enter());
			}elseif($j>(count($basico)-1)){
					$arc->escribir("³".$arc->espacio($c1)."³".$arc->espacio($c2)."³".$pago[$j]."³".$arc->enter());
				}else{
				      $arc->escribir("³".$basico[$j]."³".$pago[$j]."³".$arc->enter());
			         }
		}
			
		$arc->escribir("Ã".$arc->lineaH($c1)."Å".$arc->lineaH($c2)."Å".$arc->lineaH($c3)."Å".$arc->lineaH($c4)."Å".$arc->lineaH($c5)."Å".$arc->lineaH($c6)."Å".$arc->lineaH($c7)."Ù");
		$arc->enterH();		
  } 
 }
 $linpag=67-$linpag-1;
 $arc->bajar($linpag);
 $pagina++;
 $encabezado=$arc->izquierda("UNIVERSIDAD DE LA GUAJIRA",90).$arc->enter().
             $arc->izquierda("SECCION DE PERSONAL",90).$arc->izquierda("PERIODO      : $Periodo",60).$arc->enter().
	         $arc->izquierda("INFORME DE PRIMA SEMESTRAL",90).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
	         $arc->izquierda($tercero,90)."PAGINA       : ";
	   
 $titulo=$arc->centro("<< T O T A L E S    R E S U M E N >>",127).$arc->enter();
         $arc->escribir($encabezado.$pagina.$arc->enter());
         $arc->escribir($titulo);   
 
 //*************************INCICIA LA CAPTURA DE LA COLUMNA 1 *************************************************
 $detalle1=NULL;
 $detalle1[0]=$arc->izquierda("SUELDO BASICO------------------->".$arc->derecha(number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][4]),16)."",80);
 $detalle1[1]=$arc->izquierda("GASTOS DE REPRESENTACION-------->".$arc->derecha(number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][9]),16)."",80);
 $detalle1[2]=$arc->izquierda("SUBSIDIO DE TRANSPORTE---------->".$arc->derecha(number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][6]),16)."",80);
 $detalle1[3]=$arc->izquierda("PRIMA DE ANTIGUEDAD------------->".$arc->derecha(number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][5]),16)."",80);
 $detalle1[4]=$arc->izquierda("PRIMA TECNICA------------------->".$arc->derecha(number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][8]),16)."",80);
 $detalle1[5]=$arc->izquierda("PRIMA DE ALIMENTACION----------->".$arc->derecha(number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][7]),16)."",80);
 $detalle1[6]=$arc->izquierda("BONIFICACION SERVIC. PRESTADOS-->".$arc->derecha(number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][10]),16)."",80);
 $detalle1[7]=$arc->izquierda("TOTAL DEVENGADO:---------------->".$arc->derecha(number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][13]),16)."",80);
 $detalle1[8]=$arc->espacio(80);
 $detalle1[9]=$arc->espacio(80);
 
  
  
  //*************************INCICIA LA CAPTURA DE LA COLUMNA 2 *************************************************
  $detalle2=NULL;  $suma = 0;
  $detalle2[0]=$arc->izquierda("RETENCION EN LA FUENTE--------->".$arc->derecha(number_format($Semestralnominaliquidaciones->parafiscales[$filas-1][1]),15)."",50);
  $suma += $Semestralnominaliquidaciones->parafiscales[$filas-1][1];
  $lindet2=1;
    
  for($i=1;$i<($columnasTblD-1);$i++){
	$suma+=$tblD[$filas-1][$i];
	$detalle2[$lindet2]=$arc->izquierda(trim($tblD[0][$i]),31,"-").">".$arc->derecha(number_format($tblD[$filas-1][$i]),15);
	$lindet2++;
   }
  
  $detalle2[$lindet2]=$arc->izquierda("TOTAL DESCUENTOS",31,"-").">".$arc->derecha(number_format($suma),15); $lindet2++;
  $detalle2[$lindet2]=$arc->espacio(46); $lindet2++;
  
  $detalle2[$lindet2]=$arc->izquierda("<<<      APROPIACIONES       >>>",31," "); $lindet2++;
  $var = $Semestralnominaliquidaciones->getCesantias($Semestralnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("CESANTIAS (8.33%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  
  $totalapr=round($var); $var=$Semestralnominaliquidaciones->getInteresesCesantias($Semestralnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("INTERESES CESANTIAS (1%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Semestralnominaliquidaciones->getPrimaNavidad($Semestralnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("PRIMA DE NAVIDAD (8.33%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Semestralnominaliquidaciones->getPrimaVacaciones($Semestralnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("PRIMA DE VACACIONES (4.17%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Semestralnominaliquidaciones->getVacaciones($Semestralnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("VACACIONES (4.17%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $varPS=$Semestralnominaliquidaciones->getPrimaSemestral($Semestralnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("PRIMA SEMESTRAL (8.33%)",31,"-").">".$arc->derecha(number_format($varPS),15); $lindet2++;
  $totalapr+=round($var);
  $baseicbf=$Semestralnominaliquidaciones->liquidacion[$filas-1][$columnas-1]-($Semestralnominaliquidaciones->liquidacion[$filas-1][6]);
  $var=$Semestralnominaliquidaciones->getIcbf($baseicbf);
  $detalle2[$lindet2]=$arc->espacio(46); $lindet2++;
  
  $detalle2[$lindet2]=$arc->izquierda("<<<      PARAFISCALES       >>>",31," "); $lindet2++;
  $detalle2[$lindet2]=$arc->izquierda("I. C. B. F. (3%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Semestralnominaliquidaciones->getCajaCompensacion($baseicbf);
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