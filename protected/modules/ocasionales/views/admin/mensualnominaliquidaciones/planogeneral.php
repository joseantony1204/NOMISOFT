<?php
 $filas = count($Mensualnominaliquidaciones->liquidacion);
 $columnas = count($Mensualnominaliquidaciones->liquidacion[1]);
 $parafisales = count($Mensualnominaliquidaciones->parafiscales[0]);

 $tblD = $Mensualnominaliquidaciones->descuentos;
 $filasTblD = count($tblD);
 $columnasTblD = count($tblD[0]);
 
 $path = ("reportes/planogeneral/"); 
 $file = ("comprobante");
 $realPath = $path.$file;
 $modo="w";
 $arc = new Archivo($realPath.".dat",$modo);
 
 $c1=11;$c2=44;$c3=25;$c4=6;$c5=15;$c6=13;$c7=14;
 ////Encabezado
 $encabezado = $arc->izquierda("UNIVERSIDAD DE LA GUAJIRA",85).$arc->enter().
               $arc->izquierda("SECCION DE PERSONAL",85).$arc->izquierda("PERIODO      : $Periodo",60).$arc->enter().
			   $arc->izquierda("INFORME DE NOMINA",85).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
			   $arc->izquierda($tercero,85)."PAGINA       : ";
 ////Titulo
 $titulo = $arc->enter().
 chr(218).$arc->lineaH($c1).chr(194).$arc->lineaH($c2).chr(194).$arc->lineaH($c3).chr(194).$arc->lineaH($c4).chr(194).$arc->lineaH($c5).chr(194).$arc->lineaH($c6).chr(194).$arc->lineaH(14).chr(191).$arc->enter().
 chr(179).$arc->centro("CEDULA",$c1).chr(179).$arc->centro("NOMBRES Y CARGOS",$c2).chr(179).$arc->centro("CONCEPTOS",$c3).chr(179).$arc->centro("DIAS",$c4).chr(179).$arc->centro("DEVENGADOS",$c5).chr(179).$arc->centro("DESCUENTOS",$c6).chr(179).$arc->centro("NETO",14).chr(179).$arc->enter().
 chr(195).$arc->lineaH($c1).chr(197).$arc->lineaH($c2).chr(197).$arc->lineaH($c3).chr(197).$arc->lineaH($c4).chr(197).$arc->lineaH($c5).chr(197).$arc->lineaH($c6).chr(197).$arc->lineaH($c7).chr(180).$arc->enter();
 $pagina=1;
 $arc->escribir($encabezado.$pagina);
 $arc->escribir($titulo);
 $linpag=7;
 
 for($i=1;$i<$filas-1;$i++){ 
  $neto = ($Mensualnominaliquidaciones->liquidacion[$i][$columnas-1])-(($Mensualnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1]));
  if($neto!=0){
    $anio=substr($Mensualnominaliquidaciones->liquidacion[$i][26],0,4);
    $Parametrosglobales = new Parametrosglobales; 	
    $Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
    $valorPunto = $Parametrosglobales[1][3];
    $Mensualnomina = Mensualnomina::model()->findByPk($Mensualnominaliquidaciones->liquidacion[$i][26]);
    $Mensualnomina->cargarEmpleoPlanta($Mensualnominaliquidaciones->liquidacion[$i][27]);

	//*************************INCICIA LA CAPTURA DE LOS DATOS BASICOS *************************************************//
	$basico=NULL;
	$basico[0]=$arc->espacio($c1).chr(179).$arc->izquierda("Comprobante No. ".$Mensualnominaliquidaciones->liquidacion[$i][26].'-'.$Mensualnominaliquidaciones->liquidacion[$i][1],$c2);
	$basico[1]=$arc->espacio($c1).chr(179).$arc->izquierda(trim($Mensualnomina->MENO_PERIODO), $c2);
	$basico[2]=$arc->centro(trim($Mensualnomina->Personageneral->PEGE_IDENTIFICACION),$c1).chr(179).$arc->izquierda(trim($Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO).$arc->espacio(1).trim($Mensualnomina->Personageneral->PEGE_SEGUNDOAPELLIDOS).$arc->espacio(1).trim($Mensualnomina->Personageneral->PEGE_PRIMERNOMBRE).$arc->espacio(1).trim($Mensualnomina->Personageneral->PEGE_SEGUNDONOMBRE),$c2);
	$basico[3]=$arc->espacio($c1).chr(179).$arc->izquierda(trim($Mensualnomina->Tipocargo->TICA_NOMBRE), $c2);
	$basico[4]=$arc->espacio($c1).chr(179).$arc->izquierda(trim($Mensualnomina->Empleoplanta->EMPL_CARGO), $c2);
	if ($Mensualnomina->Tipocargo->TICA_ID==2 or $Mensualnomina->Tipocargo->TICA_ID==3){
		$basico[5]=$arc->espacio($c1).chr(179).$arc->izquierda(("PUNTOS ".trim($Mensualnominaliquidaciones->liquidacion[$i][3])), $c2);
		$basico[6]=$arc->espacio($c1).chr(179).$arc->izquierda(("VR PUNTO $valorPunto"), $c2);
	}else{
		$basico[5]=$arc->espacio($c1).chr(179).$arc->espacio($c2);
		$basico[6]=$arc->espacio($c1).chr(179).$arc->espacio($c2);
		}
	$basico[7]=$arc->espacio($c1).chr(179).$arc->izquierda(trim($Mensualnomina->Unidad->UNID_ID." -> ".$Mensualnomina->Unidad->UNID_NOMBRE), $c2);
	
	//*************************INCICIA LA CAPTURA DE LOS PAGOS ************************************************************//
	$pago=NULL;
	$pago[0]=$arc->izquierda("SUELDO (".number_format((($Mensualnominaliquidaciones->liquidacion[$i][4])/($Mensualnominaliquidaciones->liquidacion[$i][2]))*30).")",$c3).chr(179).$arc->centro($Mensualnominaliquidaciones->liquidacion[$i][2],$c4).chr(179).$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$i][4]),$c5).chr(179).$arc->espacio($c6).chr(179).$arc->espacio($c7);
	$lineapago=1;
	
	    /* antiguedad, transporte y alimentacion*/
		for ($ln=5;$ln<8;$ln++){
		  if ($Mensualnominaliquidaciones->liquidacion[$i][$ln]!=0){
			  if ($ln==5){
				$antig = $Mensualnomina->Personageneral->getAntiguedad($Mensualnominaliquidaciones->liquidacion[$i][26])." A";
			  }else{
				  $antig=" ";
				  }
		   $pago[$lineapago]=$arc->izquierda($Mensualnominaliquidaciones->liquidacion[0][$ln],$c3).chr(179).$arc->centro($antig,$c4).chr(179).$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$i][$ln]),$c5).chr(179).$arc->espacio($c6).chr(179).$arc->espacio($c7);
		   $lineapago++;
		  }
		}
		
		/* horas extras */
		for ($ln=8;$ln<22;$ln=$ln+2){
			if ($Mensualnominaliquidaciones->liquidacion[$i][$ln]!=0){
				$pago[$lineapago]=$arc->izquierda($Mensualnominaliquidaciones->liquidacion[0][$ln+1],$c3).chr(179).$arc->centro($Mensualnominaliquidaciones->liquidacion[$i][$ln],$c4).chr(179).$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$i][$ln+1]),$c5).chr(179).$arc->espacio($c6).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
		
		/*prima tecnica, gastos, bonificacion, prima de vacaciones*/
		for ($ln=22;$ln<26;$ln++){
			if ($Mensualnominaliquidaciones->liquidacion[$i][$ln]!=0){
				$pago[$lineapago]=$arc->izquierda($Mensualnominaliquidaciones->liquidacion[0][$ln],$c3).chr(179).$arc->espacio($c4).chr(179).$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$i][$ln]),$c5).chr(179).$arc->espacio($c6).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
		
		/*parafiscales parte 1*/
		/*salud, persion y sindicato*/
		for ($ln=1;$ln<6;$ln=$ln+2){
		   if($Mensualnominaliquidaciones->parafiscales[$i][$ln+1]!=0){
              if($ln==1){
			 	 $Salud = Salud::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][$ln]); 
				 $pago[$lineapago]=$arc->izquierda($Mensualnominaliquidaciones->parafiscales[0][$ln+1]." (".trim($Salud->SALU_NOMBRE).")",$c3).chr(179).$arc->espacio($c4).chr(179).$arc->espacio($c5).chr(179);
              }elseif($ln==3){
				 $Pension = Pension::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][$ln]);
                 $pago[$lineapago]=$arc->izquierda($Mensualnominaliquidaciones->parafiscales[0][$ln+1]." (".trim($Pension->PENS_NOMBRE).")",$c3).chr(179).$arc->espacio($c4).chr(179).$arc->espacio($c5).chr(179);
				}elseif($ln==5){
				     $Sindicatos = Sindicatos::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][$ln]);
                     $pago[$lineapago]=$arc->izquierda($Mensualnominaliquidaciones->parafiscales[0][$ln+1]." (".trim($Sindicatos->SIND_NOMBRE).")",$c3).chr(179).$arc->espacio($c4).chr(179).$arc->espacio($c5).chr(179);
					}
			$pago[$lineapago].=$arc->derecha(number_format($Mensualnominaliquidaciones->parafiscales[$i][$ln+1]),$c6).chr(179).$arc->espacio($c7);
			$lineapago++;
            }
        }
		
		/*parafiscales parte 2*/
		for ($ln=7;$ln<11;$ln++){
			if ($Mensualnominaliquidaciones->parafiscales[$i][$ln]!=0){
				$pago[$lineapago]=$arc->izquierda($Mensualnominaliquidaciones->parafiscales[0][$ln],$c3).chr(179).$arc->espacio($c4).chr(179).$arc->espacio($c5).chr(179).$arc->derecha(number_format($Mensualnominaliquidaciones->parafiscales[$i][$ln]),$c6).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
		
		/*descuentos*/
		for ($c=1;$c<($columnasTblD-1);$c++){
		   if ($tblD[$i][$c]!=0){
				$pago[$lineapago]=$arc->izquierda($tblD[0][$c],$c3).chr(179).$arc->espacio($c4).chr(179).$arc->espacio($c5).chr(179);
				$pago[$lineapago].=$arc->derecha(number_format($tblD[$i][$c]),$c6).chr(179).$arc->espacio($c7);
				$lineapago++;
			}
		}
				
		/*totales*/
		$pago[$lineapago]=$arc->centro("TOTALES",$c3).chr(179).$arc->espacio($c4).chr(179);
		$pago[$lineapago].=$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$i][$columnas-1]),$c5).chr(179);
		$pago[$lineapago].=$arc->derecha(number_format(($Mensualnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1])),$c6).chr(179);
		$pago[$lineapago].=$arc->derecha(number_format(($Mensualnominaliquidaciones->liquidacion[$i][$columnas-1])-(($Mensualnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1]))),$c7);
		
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
			
		$arc->escribir(chr(192).$arc->lineaH($c1).chr(193).$arc->lineaH($c2).chr(193).$arc->lineaH($c3).chr(193).$arc->lineaH($c4).chr(193).$arc->lineaH($c5).chr(193).$arc->lineaH($c6).chr(193).$arc->lineaH($c7).chr(217));
		$arc->enterH();	
  } 
 }
  if($sw==1){
  
  $linpag=67-$linpag-1;
  $arc->bajar($linpag);
  $pagina++;
  $encabezado=$arc->izquierda("UNIVERSIDAD DE LA GUAJIRA",90).$arc->enter().
             $arc->izquierda("SECCION DE PERSONAL",90).$arc->izquierda("PERIODO      : $Periodo",60).$arc->enter().
	         $arc->izquierda("INFORME DE NOMINA",90).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
	         $arc->izquierda($tercero,90)."PAGINA       : ";
	   
  $titulo=$arc->centro("<< T O T A L E S    R E S U M E N >>",127).$arc->enter();
         $arc->escribir($encabezado.$pagina.$arc->enter());
         $arc->escribir($titulo);
  
  //*************************INCICIA LA CAPTURA DE LA COLUMNA 1 *************************************************//
  $detalle1=NULL;
  $detalle1[0]=$arc->izquierda("SUELDO BASICO------------------->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][4]),16)."",80);
  $detalle1[1]=$arc->izquierda("GASTOS DE REPRESENTACION-------->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][23]),16)."",80);
  $detalle1[2]=$arc->izquierda("SUBSIDIO DE TRANSPORTE---------->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][6]),16)."",80);
  $detalle1[3]=$arc->izquierda("PRIMA DE ANTIGUEDAD------------->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][5]),16)."",80);
  $detalle1[4]=$arc->izquierda("HORAS EXTRAS DIURNAS------------>".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][9]),16)."",80);
  $detalle1[5]=$arc->izquierda("HORAS EXTRAS NOCTURNAS---------->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][11]),16)."",80);
  $detalle1[6]=$arc->izquierda("HORAS EXTRAS DIURNAS DOM-FEST.-->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][13]),16)."",80);
  $detalle1[7]=$arc->izquierda("HORAS EXTRAS NOCTUR. DOM-FEST.-->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][15]),16)."",80);
  $detalle1[8]=$arc->izquierda("RECARGO NOCTURNO---------------->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][19]),16)."",80);
  $detalle1[9]=$arc->izquierda("DOMINGOS Y FESTIVOS------------->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][17]),16)."",80);
  $detalle1[10]=$arc->izquierda("REC NOCT DOMINGOS Y FEST-------->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][21]),16)."",80);
  $detalle1[11]=$arc->izquierda("PRIMA TECNICA------------------->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][22]),16)."",80);
  $detalle1[12]=$arc->izquierda("PRIMA DE ALIMENTACION----------->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][7]),16)."",80);
  $detalle1[13]=$arc->izquierda("BONIFICACION SERVIC. PRESTADOS-->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][24]),16)."",80);
  $detalle1[14]=$arc->izquierda("PRIMA DE VACACIONES------------->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][25]),16)."",80);
  $detalle1[15]=$arc->izquierda("TOTAL DEVENGADO:---------------->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][28]),16)."",80);
  $detalle1[16]=$arc->espacio(80);
  $detalle1[17]=$arc->espacio(80);
  
  $filasa=0;  $filape=0;  $filasin=0;
  $salud=NULL;$pension=NULL;$sindicato=NULL;$subcuenta=NULL;$fondosp=NULL;
  for ($i=1;$i<$filas-1;$i++){
   @
	$dsalud = Salud::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][1]);
	$dpension = Pension::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][3]);
	$dsindicato= Sindicatos::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][5]);

	$salud[$dsalud->SALU_ID][0]=trim($dsalud->SALU_NOMBRE);
	$salud[$dsalud->SALU_ID][1]=$salud[$dsalud->SALU_ID][1]+$Mensualnominaliquidaciones->parafiscales[$i][2];
		
	$pension[$dpension->PENS_ID][0]=trim($dpension->PENS_NOMBRE);
	$pension[$dpension->PENS_ID][1]=$pension[$dpension->PENS_ID][1]+$Mensualnominaliquidaciones->parafiscales[$i][4];
			
	$sindicato[$dsindicato->SIND_ID][0]=trim($dsindicato->SIND_NOMBRE);
	$sindicato[$dsindicato->SIND_ID][1]=$sindicato[$dsindicato->SIND_ID][1]+$Mensualnominaliquidaciones->parafiscales[$i][6];
		
	$fondosp[$dpension->PENS_ID][1]=$fondosp[$dpension->PENS_ID][1]+$Mensualnominaliquidaciones->parafiscales[$i][7];
	$subcuenta[$dpension->PENS_ID][1]=$subcuenta[$dpension->PENS_ID][1]+$Mensualnominaliquidaciones->parafiscales[$i][8]; 
			

	if($dsalud->SALU_ID >$filasa and $dsalud->SALU_ID<999) $filasa=$dsalud->SALU_ID;
	if($dsindicato->SIND_ID >$filasin and $dsindicato->SIND_ID<999) $filasin=$dsindicato->SIND_ID;
	if($dpension->PENS_ID >$filape and $dpension->PENS_ID<999) $filape=$dpension->PENS_ID;
  } 
  $detalle1[18]=$arc->izquierda($arc->espacio(33).$arc->derecha("EMPLEADO",14).$arc->derecha("EMPRESA",14).$arc->derecha("TOTAL",14),80);
  $lindet1=19;
 
  for($i=1;$i<=$filasa;$i++) {
	  if ($salud[$i][0]){
		  $detalle1[$lindet1]=$arc->izquierda($arc->izquierda("SALUD ".$salud[$i][0],33).$arc->derecha(number_format($salud[$i][1]),14).$arc->derecha(number_format($Mensualnominaliquidaciones->getSaludPatronal($salud[$i][1])),14).$arc->derecha(number_format($Mensualnominaliquidaciones->getSaludAporteTotal($salud[$i][1])),14),80);
		  $lindet1++;
	  }
  }
  $detalle1[$lindet1]=$arc->izquierda($arc->izquierda("TOTAL SALUD ",33).$arc->derecha(number_format($Mensualnominaliquidaciones->parafiscales[$filas-1][2]),14).$arc->derecha(number_format($Mensualnominaliquidaciones->getSaludPatronal($Mensualnominaliquidaciones->parafiscales[$filas-1][2])),14).$arc->derecha(number_format($Mensualnominaliquidaciones->getSaludAporteTotal($Mensualnominaliquidaciones->parafiscales[$filas-1][2])),14),80);
  $lindet1++;
  $detalle1[$lindet1]=$arc->espacio(80);$lindet1++;
  
  $detalle1[$lindet1]=$arc->izquierda($arc->espacio(33).$arc->derecha("EMPLEADO",14).$arc->derecha("EMPRESA",14).$arc->derecha("TOTAL",14),80);
  $lindet1++;
  
  for($i=1;$i<=$filape;$i++) {
	  if ($pension[$i][0]){
		  $detalle1[$lindet1]=$arc->izquierda($arc->izquierda("PENSION ".$pension[$i][0],33).$arc->derecha(number_format($pension[$i][1]),14).$arc->derecha(number_format($Mensualnominaliquidaciones->getPensionPatronal($pension[$i][1])),14).$arc->derecha(number_format($Mensualnominaliquidaciones->getPensionAporteTotal($pension[$i][1])),14),80);
		  $lindet1++;
	  }
  }
  $detalle1[$lindet1]=$arc->izquierda($arc->izquierda("TOTAL PENSION ",33).$arc->derecha(number_format($Mensualnominaliquidaciones->parafiscales[$filas-1][4]),14).$arc->derecha(number_format($Mensualnominaliquidaciones->getPensionPatronal($Mensualnominaliquidaciones->parafiscales[$filas-1][4])),14).$arc->derecha(number_format($Mensualnominaliquidaciones->getPensionAporteTotal($Mensualnominaliquidaciones->parafiscales[$filas-1][4])),14),80);
  $lindet1++;
  $detalle1[$lindet1]=$arc->espacio(80);$lindet1++;
  
  $detalle1[$lindet1]=$arc->izquierda($arc->espacio(33).$arc->derecha("F.S.P",14).$arc->derecha("SUB CTA",14).$arc->derecha("",14),80);
  $lindet1++;
  
  for($i=1;$i<=$filape;$i++) {
	if ($pension[$i][0]){
	  $detalle1[$lindet1]=$arc->izquierda($arc->izquierda("".$pension[$i][0],33).$arc->derecha(number_format($fondosp[$i][1]),14).$arc->derecha(number_format($subcuenta[$i][1]),14),80);
	  $lindet1++;
	}
  }
  $detalle1[$lindet1]=$arc->izquierda($arc->izquierda("TOTALES CONSORCION COLOMBIA MAYOR",33).$arc->derecha(number_format($Mensualnominaliquidaciones->parafiscales[$filas-1][7]),14).$arc->derecha(number_format($Mensualnominaliquidaciones->parafiscales[$filas-1][8]),14),80);
  $lindet1++;
  
  $riesgo=(($Mensualnominaliquidaciones->liquidacion[$filas-1][28]-($Mensualnominaliquidaciones->liquidacion[$filas-1][25]+$Mensualnominaliquidaciones->liquidacion[$filas-1][24]+$Mensualnominaliquidaciones->liquidacion[$filas-1][7]+$Mensualnominaliquidaciones->liquidacion[$filas-1][6]))*0.00522);
  $detalle1[$lindet1]=$arc->espacio(80);$lindet1++;
  $detalle1[$lindet1]=$arc->espacio(80);$lindet1++;
  $detalle1[$lindet1]=$arc->izquierda($arc->izquierda("ARL POSITIVA------------------->",33).$arc->derecha(number_format($riesgo),14),80);
  $lindet1++;								 		
  $detalle1[$lindet1]=$arc->espacio(80);$lindet1++;
  $detalle1[$lindet1]=$arc->espacio(80);$lindet1++;
  
  
  
  
  //*************************INCICIA LA CAPTURA DE LA COLUMNA 2 *************************************************//
  $detalle2=NULL;  $suma = 0;
  $detalle2[0]=$arc->izquierda("RETENCION EN LA FUENTE--------->".$arc->derecha(number_format($Mensualnominaliquidaciones->parafiscales[$filas-1][10]),15)."",50);
  $detalle2[1]=$arc->izquierda("ESTAMPILLA--------------------->".$arc->derecha(number_format($Mensualnominaliquidaciones->parafiscales[$filas-1][9]),15)."",50);
	
  $suma += $Mensualnominaliquidaciones->parafiscales[$filas-1][10]+$Mensualnominaliquidaciones->parafiscales[$filas-1][9];
  $lindet2=2;
  
  for($i=1;$i<=$filasin;$i++) {
	if ($sindicato[$i][0]){
		$detalle2[$lindet2]=$arc->izquierda($sindicato[$i][0],31,"-").">".$arc->derecha(number_format($sindicato[$i][1]),15);
		$lindet2++;
		$suma=$suma+$sindicato[$i][1];
	}
  }
  
  for($i=1;$i<($columnasTblD-1);$i++){
	$suma+=$tblD[$filas-1][$i];
	$detalle2[$lindet2]=$arc->izquierda($tblD[0][$i],31,"-").">".$arc->derecha(number_format($tblD[$filas-1][$i]),15);
	$lindet2++;
   }
  
  $detalle1[$lindet1]=$arc->izquierda($arc->izquierda("TOTAL SEGURIDAD SOCIAL Y DESCUENTOS",33).$arc->derecha(number_format(($Mensualnominaliquidaciones->parafiscales[$filas-1][2])+($Mensualnominaliquidaciones->parafiscales[$filas-1][4])+$suma+(($Mensualnominaliquidaciones->parafiscales[$filas-1][7]))+($Mensualnominaliquidaciones->parafiscales[$filas-1][8])),14),80);	
  $detalle2[$lindet2]=$arc->izquierda("TOTAL DESCUENTOS",31,"-").">".$arc->derecha(number_format($suma),15); $lindet2++;
  $detalle2[$lindet2]=$arc->espacio(46); $lindet2++;
  
  $detalle2[$lindet2]=$arc->izquierda("<<<      APROPIACIONES       >>>",31," "); $lindet2++;
  $var = $Mensualnominaliquidaciones->getCesantias($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("CESANTIAS (8.33%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  
  $totalapr=round($var); $var=$Mensualnominaliquidaciones->getInteresesCesantias($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("INTERESES CESANTIAS (1%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Mensualnominaliquidaciones->getPrimaNavidad($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("PRIMA DE NAVIDAD (8.33%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Mensualnominaliquidaciones->getPrimaVacaciones($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("PRIMA DE VACACIONES (4.17%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Mensualnominaliquidaciones->getVacaciones($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("VACACIONES (4.17%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $varPS=$Mensualnominaliquidaciones->getPrimaSemestral($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("PRIMA SEMESTRAL (8.33%)",31,"-").">".$arc->derecha(number_format($varPS),15); $lindet2++;
  $totalapr+=round($var);
  $baseicbf=$Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-1]-($Mensualnominaliquidaciones->liquidacion[$filas-1][6]);
  $var=$Mensualnominaliquidaciones->getIcbf($baseicbf);
  $detalle2[$lindet2]=$arc->espacio(46); $lindet2++;
  $detalle2[$lindet2]=$arc->izquierda("<<<      PARAFISCALES       >>>",31," "); $lindet2++;
  $detalle2[$lindet2]=$arc->izquierda("I. C. B. F. (3%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Mensualnominaliquidaciones->getCajaCompensacion($baseicbf);
  $detalle2[$lindet2]=$arc->izquierda("CAJA DE COMPENSACION (4%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  
  
  //************************A PARTIR DE AQUI SE COMIENZA A IMPRIMIR LO ANTES GUARDADO*************************************//
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
  
  }
 
 $arc->cerrar();
 $arc->downloadFile($path,$file); 
?>