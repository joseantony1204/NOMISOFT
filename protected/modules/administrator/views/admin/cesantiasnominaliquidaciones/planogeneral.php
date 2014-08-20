<?php
 $filas = count($Cesantiasnominaliquidaciones->liquidacion);
 $columnas = count($Cesantiasnominaliquidaciones->liquidacion[1]);
 
 $path = ("reportes\\planogeneral\\");
 $file = ("comprobante");
 $realPath = $path.$file; 
 $modo="w";
 $arc = new Archivo($realPath.".dat",$modo);
 
 $c1=11;$c2=44;$c3=25;$c4=6;$c5=15;$c6=13;$c7=14;
 ////Encabezado
 $encabezado = $arc->izquierda("UNIVERSIDAD DE LA GUAJIRA",75).$arc->enter().
               $arc->izquierda("SECCION DE PERSONAL",75).$arc->izquierda("PERIODO      : $Periodo",60).$arc->enter().
			   $arc->izquierda("INFORME DE LIQUIDACION DE CESANTIAS",75).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
			   $arc->izquierda($tercero,75)."PAGINA       : ";
 ////Titulo
 $titulo = $arc->enter()."Ú".$arc->lineaH($c1)."Â".$arc->lineaH($c2)."Â".$arc->lineaH($c3)."Â".$arc->lineaH($c4)."Â".$arc->lineaH($c5)."Â".$arc->lineaH(14)."¿".$arc->enter()."³".
           $arc->centro("CEDULA",$c1)."³".$arc->centro("NOMBRES Y CARGOS",$c2)."³".$arc->centro("CONCEPTOS",$c3)."³".$arc->centro("DIAS",$c4)."³".$arc->centro("DEVENGADOS",$c5)."³".$arc->centro("NETO",14)."³".$arc->enter()."Ã".
		   $arc->lineaH($c1)."Å".$arc->lineaH($c2)."Å".$arc->lineaH($c3)."Å".$arc->lineaH($c4)."Å".$arc->lineaH($c5)."Å".$arc->lineaH($c7)."´".$arc->enter();
 $pagina=1;
 $arc->escribir($encabezado.$pagina);
 $arc->escribir($titulo);
 $linpag=7;
 
 for($i=1;$i<$filas-1;$i++){ 
  $neto = ($Cesantiasnominaliquidaciones->liquidacion[$i][$columnas-1]);
  if($neto!=0){
    $anio=substr($Cesantiasnominaliquidaciones->liquidacion[$i][16],0,4);    
    $Parametrosglobales = new Parametrosglobales; 	 
    $Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
    $valorPunto = $Parametrosglobales[1][3];
    $Cesantiasnomina = Cesantiasnomina::model()->findByPk($Cesantiasnominaliquidaciones->liquidacion[$i][16]);
    $Mensualnomina = new Mensualnomina;
    $Mensualnomina->cargarEmpleoPlanta($Cesantiasnominaliquidaciones->liquidacion[$i][17]);

	//*************************INCICIA LA CAPTURA DE LOS DATOS BASICOS *************************************************//
	$basico=NULL;
	$basico[0]=$arc->espacio($c1)."³".$arc->izquierda("Comprobante No. ".$Cesantiasnominaliquidaciones->liquidacion[$i][16].'-'.$Cesantiasnominaliquidaciones->liquidacion[$i][1],$c2);
	$basico[1]=$arc->espacio($c1)."³".$arc->izquierda(trim($Cesantiasnomina->CENO_PERIODO), $c2);
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
	$basico[8]=$arc->espacio($c1)."³".$arc->izquierda("Administradora -> ".trim($Mensualnomina->Cesantias->CESA_NOMBRE),$c2);
	
	//*************************INCICIA LA CAPTURA DE LOS PAGOS ************************************************************//
	$pago=NULL;
	$pago[0]=$arc->izquierda("SUELDO (".number_format($Cesantiasnominaliquidaciones->liquidacion[$i][4]).")",$c3)."³".$arc->centro($Cesantiasnominaliquidaciones->liquidacion[$i][2],$c4)."³".$arc->derecha(number_format($Cesantiasnominaliquidaciones->liquidacion[$i][5]),$c5)."³".$arc->espacio($c7);
	$lineapago=1;
	
	    /* antiguedad, transporte y alimentacion*/
		for ($ln=6;$ln<16;$ln++){
		  if ($Cesantiasnominaliquidaciones->liquidacion[$i][$ln]!=0){
			  if ($ln==6){
				$antig = $Mensualnomina->Personageneral->getAntiguedad($Cesantiasnominaliquidaciones->liquidacion[$i][16])." A";
			  }else{
				  $antig=" ";
				  }
		   $pago[$lineapago]=$arc->izquierda($Cesantiasnominaliquidaciones->liquidacion[0][$ln],$c3)."³".$arc->centro($antig,$c4)."³".$arc->derecha(number_format($Cesantiasnominaliquidaciones->liquidacion[$i][$ln]),$c5)."³".$arc->espacio($c7);
		   $lineapago++;
		  }
		}
				
		/*totales*/
		$pago[$lineapago]=$arc->centro("TOTALES",$c3)."³".$arc->espacio($c4)."³";
		$pago[$lineapago].=$arc->derecha(number_format($Cesantiasnominaliquidaciones->liquidacion[$i][$columnas-1]),$c5)."³";
		$pago[$lineapago].=$arc->derecha(number_format($Cesantiasnominaliquidaciones->liquidacion[$i][$columnas-1]),$c7);
		$lineapago++;
        //intereses
	    $pago[$lineapago]=$arc->centro("INTERESES (12%) ",$c3)."³".$arc->espacio($c4)."³";
	    $pago[$lineapago].=$arc->derecha(" ",$c5)."³";
	    $pago[$lineapago].=$arc->derecha(number_format(($Cesantiasnominaliquidaciones->liquidacion[$i][$columnas-1])*(0.12)),$c7);
		
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
				$arc->escribir("³".$basico[$j]."³".$arc->espacio($c3)."³".$arc->espacio($c4)."³".$arc->espacio($c5)."³".$arc->espacio($c7)."³".$arc->enter());
			}elseif($j>(count($basico)-1)){
					$arc->escribir("³".$arc->espacio($c1)."³".$arc->espacio($c2)."³".$pago[$j]."³".$arc->enter());
				}else{
				      $arc->escribir("³".$basico[$j]."³".$pago[$j]."³".$arc->enter());
			         }
		}
			
		$arc->escribir("Ã".$arc->lineaH($c1)."Å".$arc->lineaH($c2)."Å".$arc->lineaH($c3)."Å".$arc->lineaH($c4)."Å".$arc->lineaH($c5)."Å".$arc->lineaH($c7)."Ù");
		$arc->enterH();		
  } 
 }
 $arc->cerrar();
 $arc->downloadFile($path,$file); 
?>