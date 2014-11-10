<?php
$filas = count($Mensualnominaliquidaciones->liquidacion);
$columnas = count($Mensualnominaliquidaciones->liquidacion[1]);
$parafisales = count($Mensualnominaliquidaciones->parafiscales[0]);

$tblD = $Mensualnominaliquidaciones->descuentos;
$filasTblD = count($tblD);
$columnasTblD = count($tblD[0]);
 
 $path = ("reportes/planogeneral/");
 $file = ("resumen");
 $realPath = $path.$file; 
 $modo="w";
 $arc = new Archivo($realPath.".dat",$modo);
 
 $encabezado=$arc->izquierda("UNIVERSIDAD DE LA GUAJIRA",90).$arc->enter().
             $arc->izquierda("SECCION DE PERSONAL",90).$arc->izquierda("PERIODO      : $Periodo",60).$arc->enter().
	         $arc->izquierda("INFORME DE NOMINA DE CATEDRATICOS",90).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
	         $arc->izquierda($tercero,90)."PAGINA       : ";
 $pagina=1;   
 $titulo=$arc->centro("<< T O T A L E S    R E S U M E N >>",127).$arc->enter();
         $arc->escribir($encabezado.$pagina.$arc->enter());
         $arc->escribir($titulo);   
 
 //*************************INCICIA LA CAPTURA DE LA COLUMNA 1 *************************************************//
 $detalle1=NULL;
 $detalle1[0]=$arc->izquierda("TOTAL DEVENGADO:---------------->".$arc->derecha(number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][6]),16)."",80);
 $detalle1[1]=$arc->espacio(80);
 $detalle1[2]=$arc->espacio(80);
 $detalle1[3]=$arc->espacio(80);
 
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
 $detalle1[4]=$arc->izquierda($arc->espacio(33).$arc->derecha("EMPLEADO",14).$arc->derecha("EMPRESA",14).$arc->derecha("TOTAL",14),80);
 $lindet1=5;
 
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
  
  $riesgo=(($Mensualnominaliquidaciones->liquidacion[$filas-1][6])*0.00522);
  $detalle1[$lindet1]=$arc->espacio(80);$lindet1++;
  $detalle1[$lindet1]=$arc->espacio(80);$lindet1++;
  $detalle1[$lindet1]=$arc->izquierda($arc->izquierda("ARL POSITIVA------------------->",33).$arc->derecha(number_format($riesgo),14),80);
  $lindet1++;								 		
  $detalle1[$lindet1]=$arc->espacio(80);$lindet1++;
  $detalle1[$lindet1]=$arc->espacio(80);$lindet1++;
  
  
  
  
  //*************************INCICIA LA CAPTURA DE LA COLUMNA 2 *************************************************//
  $detalle2=NULL;  $suma = 0;
  $detalle2[0]=$arc->izquierda("RETENCION EN LA FUENTE--------->".$arc->derecha(number_format($Mensualnominaliquidaciones->parafiscales[$filas-1][8]),15)."",50);
  $detalle2[1]=$arc->izquierda("ESTAMPILLA--------------------->".$arc->derecha(number_format($Mensualnominaliquidaciones->parafiscales[$filas-1][7]),15)."",50);
	
  $suma += $Mensualnominaliquidaciones->parafiscales[$filas-1][8]+$Mensualnominaliquidaciones->parafiscales[$filas-1][7];
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
  
  $detalle2[$lindet2]=$arc->izquierda("TOTAL DESCUENTOS",31,"-").">".$arc->derecha(number_format($suma),15); $lindet2++;
  $detalle2[$lindet2]=$arc->espacio(46); $lindet2++;
  
  $detalle2[$lindet2]=$arc->izquierda("<<<      APROPIACIONES       >>>",31," "); $lindet2++;
  $var = $Mensualnominaliquidaciones->getCesantias($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-2]);
  $detalle2[$lindet2]=$arc->izquierda("CESANTIAS (8.33%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  
  $totalapr=round($var); $var=$Mensualnominaliquidaciones->getInteresesCesantias($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-2]);
  $detalle2[$lindet2]=$arc->izquierda("INTERESES CESANTIAS (1%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Mensualnominaliquidaciones->getPrimaNavidad($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-2]);
  $detalle2[$lindet2]=$arc->izquierda("PRIMA DE NAVIDAD (8.33%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  
  $totalapr+=round($var);
  $baseicbf=$Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-2];
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
  $arc->cerrar();
  $arc->downloadFile($path,$file);  
	
?>