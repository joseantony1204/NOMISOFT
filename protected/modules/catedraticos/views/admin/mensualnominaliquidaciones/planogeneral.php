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
			   $arc->izquierda("INFORME DE NOMINA DE CATEDRATICOS",85).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
			   $arc->izquierda($tercero,85)."PAGINA       : ";
 ////Titulo
 $titulo = $arc->enter().
 chr(218).$arc->lineaH($c1).chr(194).$arc->lineaH($c2).chr(194).$arc->lineaH($c3).chr(194).$arc->lineaH($c4).chr(194).$arc->lineaH($c5).chr(194).$arc->lineaH($c6).chr(194).$arc->lineaH(14).chr(191).$arc->enter().
 chr(179).$arc->centro("CEDULA",$c1).chr(179).$arc->centro("NOMBRES Y CARGOS",$c2).chr(179).$arc->centro("CONCEPTOS",$c3).chr(179).$arc->centro("HORAS",$c4).chr(179).$arc->centro("DEVENGADOS",$c5).chr(179).$arc->centro("DESCUENTOS",$c6).chr(179).$arc->centro("NETO",14).chr(179).$arc->enter().
 chr(195).$arc->lineaH($c1).chr(197).$arc->lineaH($c2).chr(197).$arc->lineaH($c3).chr(197).$arc->lineaH($c4).chr(197).$arc->lineaH($c5).chr(197).$arc->lineaH($c6).chr(197).$arc->lineaH($c7).chr(180).$arc->enter();
 $pagina=1;
 $arc->escribir($encabezado.$pagina);
 $arc->escribir($titulo);
 $linpag=7;
 
 for($i=1;$i<$filas-1;$i++){ 
  $neto = ($Mensualnominaliquidaciones->liquidacion[$i][$columnas-1])-(($Mensualnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1]));
  if($neto!=0){
    $anio=substr($Mensualnominaliquidaciones->liquidacion[$i][5],0,4); 
    $Mensualnomina = Mensualnomina::model()->findByPk($Mensualnominaliquidaciones->liquidacion[$i][5]);
    $Mensualnomina->cargarEmpleoPlanta($Mensualnominaliquidaciones->liquidacion[$i][6]);

	//*************************INCICIA LA CAPTURA DE LOS DATOS BASICOS *************************************************//
	$basico=NULL;
	$basico[0]=$arc->espacio($c1).chr(179).$arc->izquierda("Comprobante No. ".$Mensualnominaliquidaciones->liquidacion[$i][5].'-'.$Mensualnominaliquidaciones->liquidacion[$i][1],$c2);
	$basico[1]=$arc->espacio($c1).chr(179).$arc->izquierda(trim($Mensualnomina->MENO_PERIODO), $c2);
	$basico[2]=$arc->centro(trim($Mensualnomina->Personageneral->PEGE_IDENTIFICACION),$c1).chr(179).$arc->izquierda(trim($Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO).$arc->espacio(1).trim($Mensualnomina->Personageneral->PEGE_SEGUNDOAPELLIDOS).$arc->espacio(1).trim($Mensualnomina->Personageneral->PEGE_PRIMERNOMBRE).$arc->espacio(1).trim($Mensualnomina->Personageneral->PEGE_SEGUNDONOMBRE),$c2);
	
	//*************************INCICIA LA CAPTURA DE LOS PAGOS ************************************************************//
	$pago=NULL;
	$pago[0]=$arc->izquierda("SUELDO (".number_format($Mensualnomina->Catedra->CATE_VALORHORA).")",$c3).chr(179).$arc->centro($Mensualnominaliquidaciones->liquidacion[$i][2],$c4).chr(179).$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$i][4]),$c5).chr(179).$arc->espacio($c6).chr(179).$arc->espacio($c7);
	$lineapago=1;
	
		
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
		for ($ln=7;$ln<9;$ln++){
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
 $arc->cerrar();
 $arc->downloadFile($path,$file); 
?>