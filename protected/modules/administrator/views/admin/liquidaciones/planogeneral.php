<?php
 $Personasgeneral = Personasgenerales::model()->findByPk($Liquidaciones->PEGE_ID);
 $Personasgeneral->loadPersonageneral($Personasgeneral->PEGE_ID);
 $nombre = trim($Personasgeneral->Personageneral->PEGE_PRIMERNOMBRE).' '.trim($Personasgeneral->Personageneral->PEGE_PRIMERAPELLIDO);			  
 $nombrecompleto = trim($Personasgeneral->Personageneral->PEGE_PRIMERNOMBRE).' '.trim($Personasgeneral->Personageneral->PEGE_SEGUNDONOMBRE).' '.trim($Personasgeneral->Personageneral->PEGE_PRIMERAPELLIDO).' '.trim($Personasgeneral->Personageneral->PEGE_SEGUNDOAPELLIDOS);			  
 $Periodo = "FECHA INGRESO: ".$Liquidaciones->getFormatoFecha($Liquidaciones->LIQU_FECHAINGRESO).' - FECHA RETIRO: '.$Liquidaciones->getFormatoFecha($Liquidaciones->LIQU_FECHARETIRO);
 /** 
 *obtener las liquidaciones de cada una de las prestaciones
 */
 $filasprimasemestral = count($Liqprimasemestral->liquidacion);
 $columnasprimasemestral = count($Liqprimasemestral->liquidacion[1]);

 $filasvacaciones = count($Liqvacaciones->liquidacion);
 $columnasvacaciones = count($Liqvacaciones->liquidacion[1]);

 $filasprimavacaciones = count($Liqprimavacaciones->liquidacion);
 $columnasprimavacaciones = count($Liqprimavacaciones->liquidacion[1]);

 $filasprimanavidad = count($Liqprimanavidad->liquidacion);
 $columnasprimanavidad = count($Liqprimanavidad->liquidacion[1]);

 $filascesantias = count($Liqcesantias->liquidacion); 
 $columnascesantias = count($Liqcesantias->liquidacion[1]);
 
 $path = ("reportes/liquidaciones/"); 
 $file = ("comprobante");
 $realPath = $path.$file;
 $modo="w";
 $arc = new Archivo($realPath.".dat",$modo);
 
 $c1=11;$c2=44;$c3=55;$c4=40;$c5=6;$c6=13;$c7=14; 
 $c3p=25;$c4p=14;$c5p=6;$c6p=13;$c7p=14;
 //$c3=25;$c4=6;$c5=15;$c6=13;$c7=14;
 ////Encabezado
 $encabezado = $arc->izquierda("UNIVERSIDAD DE LA GUAJIRA",85).$arc->enter().
               $arc->izquierda("SECCION DE PERSONAL",85).$arc->enter().
			   $arc->izquierda("LIQUIDACION DE PRESTACIONES SOCIALES",85).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
			   $arc->izquierda("IDENTIFICACION: ".@number_format($Personasgeneral->Personageneral->PEGE_IDENTIFICACION),85).$arc->enter().
			   $arc->izquierda("EMPLEADO: ".$nombrecompleto,85).$arc->enter().
			   $arc->izquierda("CARGO: ".$Personasgeneral->Empleoplanta->EMPL_CARGO,85).$arc->enter().
			   $arc->izquierda($Periodo,85)." PAGINA       : ";
 
 
 $titulo = $arc->enter().
			   chr(218).$arc->lineaH($c3).chr(194).$arc->lineaH($c4).chr(194).$arc->lineaH($c5).chr(194).$arc->lineaH($c6).chr(194).$arc->lineaH(14).chr(191).$arc->enter().
			   chr(179).$arc->centro("DESCRIPCION",$c3).chr(179).$arc->centro("CONCEPTOS",$c4).chr(179).$arc->centro("MESES",$c5).chr(179).$arc->centro("DEVENGADOS",$c6).chr(179).$arc->centro("NETO",$c7).chr(179).$arc->enter().
			   chr(195).$arc->lineaH($c3).chr(197).$arc->lineaH($c3p).chr(194).$arc->lineaH($c4p).chr(197).$arc->lineaH($c5).chr(197).$arc->lineaH($c6).chr(197).$arc->lineaH($c7).chr(180).$arc->enter();
			   $pagina=1;
			   $arc->escribir($encabezado.$pagina);
			   $arc->escribir($titulo);
			   $linpag=7;
 $totalDevengado = 0; $totalDescuentos = 0; $totalApagar = 0; 
 if($filasprimasemestral>1){
   for($i=1;$i<$filasprimasemestral;$i++){
	
	$anio=substr($Liqprimasemestral->liquidacion[$i][12],0,4);
    $Parametrosglobales = new Parametrosglobales; 	
    $Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
	$valorPunto = $Parametrosglobales[1][3];
	
	//*************************INCICIA LA CAPTURA DE LOS DATOS BASICOS *************************************************//
	$basico=NULL;
	$basico[0]=$arc->centro(" ",$c3);
	$basico[1]=$arc->centro(" ",$c3);
	$basico[2]=$arc->centro("PRIMA DE SERVICIOS",$c3);
	
	//*************************INCICIA LA CAPTURA DE LOS PAGOS ************************************************************//
	$pago=NULL; $dias = NULL; $valor = NULL;
	$dias = (($Liqprimasemestral->liquidacion[$i][1]*22)/12);
    $valor = ((30*$Liqprimasemestral->liquidacion[$i][4])/($dias));
	$totalDevengado = $totalDevengado+$Liqprimasemestral->liquidacion[$i][13];
	$pago[0]=$arc->izquierda("SUELDO",$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->centro($Liqprimasemestral->liquidacion[$i][1],$c5p).chr(179).$arc->derecha(number_format($Liqprimasemestral->liquidacion[$i][4]),$c6p).chr(179).$arc->espacio($c7p);
	$lineapago=1;
		$dias = NULL; $valor = NULL;
		for ($ln=5;$ln<10;$ln++){
			if ($Liqprimasemestral->liquidacion[$i][$ln]!=0){
			    $dias = (($Liqprimasemestral->liquidacion[$i][1]*22)/12);
		        $valor = ((30*$Liqprimasemestral->liquidacion[$i][$ln])/($dias));
				$pago[$lineapago]=$arc->izquierda($Liqprimasemestral->liquidacion[0][$ln],$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->espacio($c5p).chr(179).$arc->derecha(number_format($Liqprimasemestral->liquidacion[$i][$ln]),$c6p).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
		$dias = NULL; $valor = NULL;
		for ($ln=10;$ln<11;$ln++){
			if ($Liqprimasemestral->liquidacion[$i][$ln]!=0){
			    $dias = (($Liqprimasemestral->liquidacion[$i][1]*22)/12);
		        $valor = ((30*$Liqprimasemestral->liquidacion[$i][$ln])/($dias));
				$pago[$lineapago]=$arc->izquierda($Liqprimasemestral->liquidacion[0][$ln],$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->espacio($c5p).chr(179).$arc->derecha(number_format($Liqprimasemestral->liquidacion[$i][$ln]),$c6p).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
	/*totales*/
		$pago[$lineapago]=$arc->centro("TOTALES",$c3p).chr(179).$arc->espacio($c4p).chr(179).$arc->espacio($c5p).chr(179);
		$pago[$lineapago].=$arc->espacio($c6p).chr(179).$arc->derecha(number_format($Liqprimasemestral->liquidacion[$i][13]),$c7);
		
	
    
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
		  $arc->bajar(66- ($linpag - $linearep-3));//Cada pagina tiene 66 lineas
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
					$arc->escribir(chr(179).$arc->espacio(($c1+$c2)).chr(179).$pago[$j].chr(179).$arc->enter());
				}else{
				      $arc->escribir(chr(179).$basico[$j].chr(179).$pago[$j].chr(179).$arc->enter());
			         }
		}
		              // chr(195).$arc->lineaH($c3).chr(197).$arc->lineaH($c3p).chr(194).$arc->lineaH($c4p).chr(197).$arc->lineaH($c5).chr(197).$arc->lineaH($c6).chr(197).$arc->lineaH($c7).chr(180).$arc->enter();
		$arc->escribir(chr(192).$arc->lineaH($c3).chr(193).$arc->lineaH($c3p).chr(193).$arc->lineaH($c4p).chr(193).$arc->lineaH($c5).chr(193).$arc->lineaH($c6).chr(193).$arc->lineaH($c7).chr(217));
		$arc->enterH();
   
   }
 } 
 
 if($filasvacaciones>1){
   for($i=1;$i<$filasvacaciones;$i++){
	
	$anio=substr($Liqvacaciones->liquidacion[$i][12],0,4);
    $Parametrosglobales = new Parametrosglobales; 	
    $Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
	$valorPunto = $Parametrosglobales[1][3];
	
	//*************************INCICIA LA CAPTURA DE LOS DATOS BASICOS *************************************************
	$basico=NULL;
	$basico[0]=$arc->centro(" ",$c3);
	$basico[1]=$arc->centro(" ",$c3);
	$basico[2]=$arc->centro("VACACIONES",$c3);
	
	//*************************INCICIA LA CAPTURA DE LOS PAGOS ************************************************************
	$pago=NULL; $dias = NULL; $valor = NULL;
	$dias = (($Liqvacaciones->liquidacion[$i][1]*22)/12);
    $valor = ((30*$Liqvacaciones->liquidacion[$i][4])/($dias));
	$totalDevengado = $totalDevengado+$Liqvacaciones->liquidacion[$i][14];
	$pago[0]=$arc->izquierda("SUELDO",$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->centro($Liqvacaciones->liquidacion[$i][1],$c5p).chr(179).$arc->derecha(number_format($Liqvacaciones->liquidacion[$i][4]),$c6p).chr(179).$arc->espacio($c7p);
	$lineapago=1;
		$dias = NULL; $valor = NULL;
		for ($ln=5;$ln<10;$ln++){
			if ($Liqvacaciones->liquidacion[$i][$ln]!=0){
			    $dias = (($Liqvacaciones->liquidacion[$i][1]*22)/12);
		        $valor = ((30*$Liqvacaciones->liquidacion[$i][$ln])/($dias));
				$pago[$lineapago]=$arc->izquierda($Liqvacaciones->liquidacion[0][$ln],$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->espacio($c5p).chr(179).$arc->derecha(number_format($Liqvacaciones->liquidacion[$i][$ln]),$c6p).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
		$dias = NULL; $valor = NULL;
		for ($ln=10;$ln<12;$ln++){
			if ($Liqvacaciones->liquidacion[$i][$ln]!=0){
			    $dias = (($Liqvacaciones->liquidacion[$i][1]*22)/12);
		        $valor = ((30*$Liqvacaciones->liquidacion[$i][$ln])/($dias));
				$pago[$lineapago]=$arc->izquierda($Liqvacaciones->liquidacion[0][$ln],$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->espacio($c5p).chr(179).$arc->derecha(number_format($Liqvacaciones->liquidacion[$i][$ln]),$c6p).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
	/*totales*/
		$pago[$lineapago]=$arc->centro("TOTALES",$c3p).chr(179).$arc->espacio($c4p).chr(179).$arc->espacio($c5p).chr(179);
		$pago[$lineapago].=$arc->espacio($c6p).chr(179).$arc->derecha(number_format($Liqvacaciones->liquidacion[$i][14]),$c7);	
	
	
    
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
		  $arc->bajar(66- ($linpag - $linearep-3));//Cada pagina tiene 66 lineas
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
					$arc->escribir(chr(179).$arc->espacio(($c1+$c2)).chr(179).$pago[$j].chr(179).$arc->enter());
				}else{
				      $arc->escribir(chr(179).$basico[$j].chr(179).$pago[$j].chr(179).$arc->enter());
			         }
		}
		              // chr(195).$arc->lineaH($c3).chr(197).$arc->lineaH($c3p).chr(194).$arc->lineaH($c4p).chr(197).$arc->lineaH($c5).chr(197).$arc->lineaH($c6).chr(197).$arc->lineaH($c7).chr(180).$arc->enter();
		$arc->escribir(chr(192).$arc->lineaH($c3).chr(193).$arc->lineaH($c3p).chr(193).$arc->lineaH($c4p).chr(193).$arc->lineaH($c5).chr(193).$arc->lineaH($c6).chr(193).$arc->lineaH($c7).chr(217));
		$arc->enterH();
   
   }
 }
 
 if($filasprimavacaciones>1){
   for($i=1;$i<$filasprimavacaciones;$i++){
	
	$anio=substr($Liqprimavacaciones->liquidacion[$i][12],0,4);
    $Parametrosglobales = new Parametrosglobales; 	
    $Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
	$valorPunto = $Parametrosglobales[1][3];
	
	//*************************INCICIA LA CAPTURA DE LOS DATOS BASICOS *************************************************
	$basico=NULL;
	$basico[0]=$arc->centro(" ",$c3);
	$basico[1]=$arc->centro(" ",$c3);
	$basico[2]=$arc->centro("PRIMA DE VACACIONES",$c3);
	
	//*************************INCICIA LA CAPTURA DE LOS PAGOS ************************************************************
	$pago=NULL; $dias = 0; $valor = 0;
	$dias = ($Liqprimavacaciones->liquidacion[$i][1]);
	$valor = (((12*$Liqprimavacaciones->liquidacion[$i][4])/($dias))*2);
	$totalDevengado = $totalDevengado+$Liqprimavacaciones->liquidacion[$i][14];
	$pago[0]=$arc->izquierda("SUELDO",$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->centro($Liqprimavacaciones->liquidacion[$i][1],$c5p).chr(179).$arc->derecha(number_format($Liqprimavacaciones->liquidacion[$i][4]),$c6p).chr(179).$arc->espacio($c7p);
	$lineapago=1;
		$dias = 0; $valor = 0;
		for ($ln=5;$ln<10;$ln++){
			if ($Liqprimavacaciones->liquidacion[$i][$ln]!=0){
			    $dias = ($Liqprimavacaciones->liquidacion[$i][1]);
	            $valor = (((12*$Liqprimavacaciones->liquidacion[$i][$ln])/($dias))*2);
				$pago[$lineapago]=$arc->izquierda($Liqprimavacaciones->liquidacion[0][$ln],$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->espacio($c5p).chr(179).$arc->derecha(number_format($Liqprimavacaciones->liquidacion[$i][$ln]),$c6p).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
		$dias = 0; $valor = 0;
		for ($ln=10;$ln<12;$ln++){
			if ($Liqprimavacaciones->liquidacion[$i][$ln]!=0){
			    $dias = ($Liqprimavacaciones->liquidacion[$i][1]);
	            $valor = (((12*$Liqprimavacaciones->liquidacion[$i][$ln])/($dias))*2);
				$pago[$lineapago]=$arc->izquierda($Liqprimavacaciones->liquidacion[0][$ln],$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->espacio($c5p).chr(179).$arc->derecha(number_format($Liqprimavacaciones->liquidacion[$i][$ln]),$c6p).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
	/*totales*/
		$pago[$lineapago]=$arc->centro("TOTALES",$c3p).chr(179).$arc->espacio($c4p).chr(179).$arc->espacio($c5p).chr(179);
		$pago[$lineapago].=$arc->espacio($c6p).chr(179).$arc->derecha(number_format($Liqprimavacaciones->liquidacion[$i][14]),$c7);
    
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
		  $arc->bajar(66- ($linpag - $linearep-3));//Cada pagina tiene 66 lineas
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
					$arc->escribir(chr(179).$arc->espacio(($c1+$c2)).chr(179).$pago[$j].chr(179).$arc->enter());
				}else{
				      $arc->escribir(chr(179).$basico[$j].chr(179).$pago[$j].chr(179).$arc->enter());
			         }
		}
		              // chr(195).$arc->lineaH($c3).chr(197).$arc->lineaH($c3p).chr(194).$arc->lineaH($c4p).chr(197).$arc->lineaH($c5).chr(197).$arc->lineaH($c6).chr(197).$arc->lineaH($c7).chr(180).$arc->enter();
		$arc->escribir(chr(192).$arc->lineaH($c3).chr(193).$arc->lineaH($c3p).chr(193).$arc->lineaH($c4p).chr(193).$arc->lineaH($c5).chr(193).$arc->lineaH($c6).chr(193).$arc->lineaH($c7).chr(217));
		$arc->enterH();
   
   }
 }
 
 if($filasprimanavidad>1){
   for($i=1;$i<$filasprimanavidad;$i++){
	
	$anio=substr($Liqprimanavidad->liquidacion[$i][12],0,4);
    $Parametrosglobales = new Parametrosglobales; 	
    $Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
	$valorPunto = $Parametrosglobales[1][3];
	
	//*************************INCICIA LA CAPTURA DE LOS DATOS BASICOS *************************************************
	$basico=NULL;
	$basico[0]=$arc->centro(" ",$c3);
	$basico[1]=$arc->centro(" ",$c3);
	$basico[2]=$arc->centro(" ",$c3);
	$basico[3]=$arc->centro("PRIMA DE NAVIDAD",$c3);
	
	//*************************INCICIA LA CAPTURA DE LOS PAGOS ************************************************************
	$pago=NULL; $dias = 0; $valor = 0;
	$dias = ($Liqprimanavidad->liquidacion[$i][1]);
	$valor = (((12*$Liqprimanavidad->liquidacion[$i][4])/($dias)));
	$totalDevengado = $totalDevengado+$Liqprimanavidad->liquidacion[$i][15];
	$pago[0]=$arc->izquierda("SUELDO",$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->centro($Liqprimanavidad->liquidacion[$i][1],$c5p).chr(179).$arc->derecha(number_format($Liqprimanavidad->liquidacion[$i][4]),$c6p).chr(179).$arc->espacio($c7p);
	$lineapago=1;
		$dias = 0; $valor = 0;
		for ($ln=5;$ln<10;$ln++){
			if ($Liqprimanavidad->liquidacion[$i][$ln]!=0){
			    $dias = ($Liqprimanavidad->liquidacion[$i][1]);
	            $valor = (((12*$Liqprimanavidad->liquidacion[$i][$ln])/($dias)));
				$pago[$lineapago]=$arc->izquierda($Liqprimanavidad->liquidacion[0][$ln],$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->espacio($c5p).chr(179).$arc->derecha(number_format($Liqprimanavidad->liquidacion[$i][$ln]),$c6p).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
		$dias = 0; $valor = 0;
		for ($ln=10;$ln<13;$ln++){
			if ($Liqprimanavidad->liquidacion[$i][$ln]!=0){
			    $dias = ($Liqprimanavidad->liquidacion[$i][1]);
	            $valor = (((12*$Liqprimanavidad->liquidacion[$i][$ln])/($dias)));
				$pago[$lineapago]=$arc->izquierda($Liqprimanavidad->liquidacion[0][$ln],$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->espacio($c5p).chr(179).$arc->derecha(number_format($Liqprimanavidad->liquidacion[$i][$ln]),$c6p).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
	/*totales*/
		$pago[$lineapago]=$arc->centro("TOTALES",$c3p).chr(179).$arc->espacio($c4p).chr(179).$arc->espacio($c5p).chr(179);
		$pago[$lineapago].=$arc->espacio($c6p).chr(179).$arc->derecha(number_format($Liqprimanavidad->liquidacion[$i][15]),$c7);
    
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
		  $arc->bajar(66- ($linpag - $linearep-3));//Cada pagina tiene 66 lineas
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
					$arc->escribir(chr(179).$arc->espacio(($c1+$c2)).chr(179).$pago[$j].chr(179).$arc->enter());
				}else{
				      $arc->escribir(chr(179).$basico[$j].chr(179).$pago[$j].chr(179).$arc->enter());
			         }
		}
		              // chr(195).$arc->lineaH($c3).chr(197).$arc->lineaH($c3p).chr(194).$arc->lineaH($c4p).chr(197).$arc->lineaH($c5).chr(197).$arc->lineaH($c6).chr(197).$arc->lineaH($c7).chr(180).$arc->enter();
		$arc->escribir(chr(192).$arc->lineaH($c3).chr(193).$arc->lineaH($c3p).chr(193).$arc->lineaH($c4p).chr(193).$arc->lineaH($c5).chr(193).$arc->lineaH($c6).chr(193).$arc->lineaH($c7).chr(217));
		$arc->enterH();
   
   }
 }
 
 if($filascesantias>1){
   for($i=1;$i<$filascesantias;$i++){
	
	$anio=substr($Liqcesantias->liquidacion[$i][12],0,4);
    $Parametrosglobales = new Parametrosglobales; 	
    $Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
	$valorPunto = $Parametrosglobales[1][3];
	
	//*************************INCICIA LA CAPTURA DE LOS DATOS BASICOS *************************************************
	$basico=NULL;
	$basico[0]=$arc->centro(" ",$c3);
	$basico[1]=$arc->centro(" ",$c3);
	$basico[2]=$arc->centro(" ",$c3);
	$basico[3]=$arc->centro(" ",$c3);
	$basico[4]=$arc->centro("CESANTIAS",$c3);
	
	//*************************INCICIA LA CAPTURA DE LOS PAGOS ************************************************************
	$pago=NULL; $dias = 0; $valor = 0;
	$dias = ($Liqcesantias->liquidacion[$i][1]);
	$valor = (((360*$Liqcesantias->liquidacion[$i][4])/($dias)));
	$totalDevengado = $totalDevengado+$Liqcesantias->liquidacion[$i][16];
	$pago[0]=$arc->izquierda("SUELDO",$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->centro($Liqcesantias->liquidacion[$i][1],$c5p).chr(179).$arc->derecha(number_format($Liqcesantias->liquidacion[$i][4]),$c6p).chr(179).$arc->espacio($c7p);
	$lineapago=1;
		$dias = 0; $valor = 0;
		for ($ln=5;$ln<10;$ln++){
			if ($Liqcesantias->liquidacion[$i][$ln]!=0){
			    $dias = ($Liqcesantias->liquidacion[$i][1]);
	            $valor = (((360*$Liqcesantias->liquidacion[$i][$ln])/($dias)));
				$pago[$lineapago]=$arc->izquierda($Liqcesantias->liquidacion[0][$ln],$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->espacio($c5p).chr(179).$arc->derecha(number_format($Liqcesantias->liquidacion[$i][$ln]),$c6p).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
		$dias = 0; $valor = 0;
		for ($ln=10;$ln<14;$ln++){
			if ($Liqcesantias->liquidacion[$i][$ln]!=0){
			    $dias = ($Liqcesantias->liquidacion[$i][1]);
	            $valor = (((360*$Liqcesantias->liquidacion[$i][$ln])/($dias)));
				$pago[$lineapago]=$arc->izquierda($Liqcesantias->liquidacion[0][$ln],$c3p).chr(179).$arc->derecha(number_format($valor),$c4p).chr(179).$arc->espacio($c5p).chr(179).$arc->derecha(number_format($Liqcesantias->liquidacion[$i][$ln]),$c6p).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
	/*totales*/
		$pago[$lineapago]=$arc->centro("TOTALES",$c3p).chr(179).$arc->espacio($c4p).chr(179).$arc->espacio($c5p).chr(179);
		$pago[$lineapago].=$arc->espacio($c6p).chr(179).$arc->derecha(number_format($Liqcesantias->liquidacion[$i][16]),$c7);
    
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
		 $arc->bajar(66- ($linpag - $linearep-3));//Cada pagina tiene 66 lineas
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
					$arc->escribir(chr(179).$arc->espacio(($c1+$c2)).chr(179).$pago[$j].chr(179).$arc->enter());
				}else{
				      $arc->escribir(chr(179).$basico[$j].chr(179).$pago[$j].chr(179).$arc->enter());
			         }
		}
		              // chr(195).$arc->lineaH($c3).chr(197).$arc->lineaH($c3p).chr(194).$arc->lineaH($c4p).chr(197).$arc->lineaH($c5).chr(197).$arc->lineaH($c6).chr(197).$arc->lineaH($c7).chr(180).$arc->enter();
		$arc->escribir(chr(192).$arc->lineaH($c3).chr(193).$arc->lineaH($c3p).chr(193).$arc->lineaH($c4p).chr(193).$arc->lineaH($c5).chr(193).$arc->lineaH($c6).chr(193).$arc->lineaH($c7).chr(217));
		$arc->enterH();
   
   }
 }


   $arc->escribir($arc->enter().$arc->enter().$arc->enter());
   $arc->escribir($arc->izquierda("",85).$arc->izquierda("TOTAL LIQUIDACION --------->".$arc->derecha(number_format($totalDevengado),15)."",50).$arc->enter().$arc->enter());
   $arc->escribir($arc->izquierda("",85).$arc->izquierda("DESCUENTOS ---------------->".$arc->derecha(number_format($totalDescuentos),15)."",50).$arc->enter().$arc->enter());
   $arc->escribir($arc->izquierda("",85).$arc->izquierda("NETO A RECIBIR ------------>".$arc->derecha(number_format($totalDevengado-$totalDescuentos),15)."",50).$arc->enter().$arc->enter());
  //if($sw==1){
  
  $linpag=67-$linpag-13;
  $arc->bajar($linpag);
  $pagina++;
  $encabezado = $arc->izquierda("UNIVERSIDAD DE LA GUAJIRA",85).$arc->enter().
               $arc->izquierda("SECCION DE PERSONAL",85).$arc->enter().
			   $arc->izquierda("LIQUIDACION DE PRESTACIONES SOCIALES",85).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
			   $arc->izquierda("IDENTIFICACION: ".@number_format($Personasgeneral->Personageneral->PEGE_IDENTIFICACION),85).$arc->enter().
			   $arc->izquierda("EMPLEADO: ".$nombrecompleto,85).$arc->enter().
			   $arc->izquierda("CARGO: ".$Personasgeneral->Empleoplanta->EMPL_CARGO,85).$arc->enter().
			   $arc->izquierda($Periodo,85)." PAGINA       : ";
	   
  $titulo=$arc->centro("<< T O T A L E S    R E S U M E N >>",127).$arc->enter();
         $arc->escribir($encabezado.$pagina.$arc->enter());
         $arc->escribir($titulo);
  
  //*************************INCICIA LA CAPTURA DE LA COLUMNA 1 *************************************************
  $detalle1=NULL;
  $detalle1[0]=$arc->espacio(80);
  $detalle1[1]=$arc->izquierda("TOTAL DEVENGADO------------------->".$arc->derecha(number_format($totalDevengado),16)."",80);
  $detalle1[2]=$arc->espacio(80);
  $detalle1[3]=$arc->espacio(80);
  $detalle1[4]=$arc->espacio(80);
  $detalle1[5]=$arc->espacio(80);
  $detalle1[6]=$arc->izquierda("TOTAL A RECIBIR------------------->".$arc->derecha(number_format($totalDevengado-$totalDescuentos),16)."",80);
   
  //*************************INCICIA LA CAPTURA DE LA COLUMNA 2 *************************************************
  $detalle2=NULL;  $suma = 0;
  $detalle1[0]=$arc->espacio(80);
  $detalle2[1]=$arc->izquierda("DESCUENTOS--------->".$arc->derecha(number_format($totalDescuentos),15)."",50);
  $detalle2[2]=$arc->espacio(46);
  
  
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
	
	$arc->escribir($arc->enter());
	for($j=0;$j<8;$j++){
	 $arc->escribir($arc->enter());
    }

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

	for($j=0;$j<15;$j++){
	 $arc->escribir($arc->enter());
    }


    $arc->escribir($arc->enter().$arc->enter().$arc->enter());
    $arc->escribir($arc->centro("__________________________           ________________________          _______________________         _______________________",127).$arc->enter());
    $arc->escribir($arc->centro("VICE-RECTOR ADMINISTRATIVO            PROFESIONAL UNIV. PPTO.              TESORERO PAGADOR              DIR. TALENTO HUMANO   ",127).$arc->enter());
 // }
 
 $arc->cerrar();
 $arc->downloadFile($path,$file); 
?>