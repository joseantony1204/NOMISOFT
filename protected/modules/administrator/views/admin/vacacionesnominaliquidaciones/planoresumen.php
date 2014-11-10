<?php
$filas = count($Vacacionesnominaliquidaciones->liquidacion);
$columnas = count($Vacacionesnominaliquidaciones->liquidacion[1]);
$parafisales = count($Vacacionesnominaliquidaciones->parafiscales[0]);

$tblD = $Vacacionesnominaliquidaciones->descuentos;
$filasTblD = count($tblD);
$columnasTblD = count($tblD[0]);
 
 $path = ("reportes/planogeneral/");
 $file = ("resumen");
 $realPath = $path.$file; 
 $modo="w";
 $arc = new Archivo($realPath.".dat",$modo);
 
 $encabezado=$arc->izquierda("UNIVERSIDAD DE LA GUAJIRA",90).$arc->enter().
             $arc->izquierda("SECCION DE PERSONAL",90).$arc->izquierda("PERIODO      : $Periodo",60).$arc->enter().
	         $arc->izquierda("INFORME DE NOMINA",90).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
	         $arc->izquierda($tercero,90)."PAGINA       : ";
 $pagina=1;   
 $titulo=$arc->centro("<< T O T A L E S    R E S U M E N >>",127).$arc->enter();
         $arc->escribir($encabezado.$pagina.$arc->enter());
         $arc->escribir($titulo);   
 
 //*************************INCICIA LA CAPTURA DE LA COLUMNA 1 *************************************************//
 $detalle1=NULL;
 $detalle1[0]=$arc->izquierda("SUELDO BASICO------------------->".$arc->derecha(number_format($Vacacionesnominaliquidaciones->liquidacion[$filas-1][5]),16)."",80);
 $detalle1[1]=$arc->izquierda("GASTOS DE REPRESENTACION-------->".$arc->derecha(number_format($Vacacionesnominaliquidaciones->liquidacion[$filas-1][10]),16)."",80);
 $detalle1[2]=$arc->izquierda("SUBSIDIO DE TRANSPORTE---------->".$arc->derecha(number_format($Vacacionesnominaliquidaciones->liquidacion[$filas-1][7]),16)."",80);
 $detalle1[3]=$arc->izquierda("PRIMA DE ANTIGUEDAD------------->".$arc->derecha(number_format($Vacacionesnominaliquidaciones->liquidacion[$filas-1][6]),16)."",80);
 $detalle1[4]=$arc->izquierda("PRIMA TECNICA------------------->".$arc->derecha(number_format($Vacacionesnominaliquidaciones->liquidacion[$filas-1][9]),16)."",80);
 $detalle1[5]=$arc->izquierda("PRIMA DE ALIMENTACION----------->".$arc->derecha(number_format($Vacacionesnominaliquidaciones->liquidacion[$filas-1][8]),16)."",80);
 $detalle1[6]=$arc->izquierda("BONIFICACION SERVIC. PRESTADOS-->".$arc->derecha(number_format($Vacacionesnominaliquidaciones->liquidacion[$filas-1][11]),16)."",80);
 $detalle1[7]=$arc->izquierda("RIMA SEMESTRAL------------------>".$arc->derecha(number_format($Vacacionesnominaliquidaciones->liquidacion[$filas-1][12]),16)."",80);
 $detalle1[8]=$arc->izquierda("TOTAL DEVENGADO:---------------->".$arc->derecha(number_format($Vacacionesnominaliquidaciones->liquidacion[$filas-1][15]),16)."",80);
 $detalle1[9]=$arc->espacio(80);
 $detalle1[10]=$arc->espacio(80);
 
 //*************************INCICIA LA CAPTURA DE LA COLUMNA 2 *************************************************
  $detalle2=NULL;  $suma = 0;
  $detalle2[0]=$arc->izquierda("RETENCION EN LA FUENTE--------->".$arc->derecha(number_format($Vacacionesnominaliquidaciones->parafiscales[$filas-1][1]),15)."",50);
  $suma += $Vacacionesnominaliquidaciones->parafiscales[$filas-1][1];
  $lindet2=1;
    
  for($i=1;$i<($columnasTblD-1);$i++){
	$suma+=$tblD[$filas-1][$i];
	$detalle2[$lindet2]=$arc->izquierda(trim($tblD[0][$i]),31,"-").">".$arc->derecha(number_format($tblD[$filas-1][$i]),15);
	$lindet2++;
   }
  
  $detalle2[$lindet2]=$arc->izquierda("TOTAL DESCUENTOS",31,"-").">".$arc->derecha(number_format($suma),15); $lindet2++;
  $detalle2[$lindet2]=$arc->espacio(46); $lindet2++;
  
  $detalle2[$lindet2]=$arc->izquierda("<<<      APROPIACIONES       >>>",31," "); $lindet2++;
  $var = $Vacacionesnominaliquidaciones->getCesantias($Vacacionesnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("CESANTIAS (8.33%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  
  $totalapr=round($var); $var=$Vacacionesnominaliquidaciones->getInteresesCesantias($Vacacionesnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("INTERESES CESANTIAS (1%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Vacacionesnominaliquidaciones->getPrimaNavidad($Vacacionesnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("PRIMA DE NAVIDAD (8.33%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Vacacionesnominaliquidaciones->getPrimaVacaciones($Vacacionesnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("PRIMA DE VACACIONES (4.17%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Vacacionesnominaliquidaciones->getVacaciones($Vacacionesnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("VACACIONES (4.17%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $varPS=$Vacacionesnominaliquidaciones->getPrimaSemestral($Vacacionesnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  $detalle2[$lindet2]=$arc->izquierda("PRIMA SEMESTRAL (8.33%)",31,"-").">".$arc->derecha(number_format($varPS),15); $lindet2++;
  $totalapr+=round($var);
  $baseicbf=$Vacacionesnominaliquidaciones->liquidacion[$filas-1][$columnas-1]-($Vacacionesnominaliquidaciones->liquidacion[$filas-1][6]);
  $var=$Vacacionesnominaliquidaciones->getIcbf($baseicbf);
  $detalle2[$lindet2]=$arc->espacio(46); $lindet2++;
  
  $detalle2[$lindet2]=$arc->izquierda("<<<      PARAFISCALES       >>>",31," "); $lindet2++;
  $detalle2[$lindet2]=$arc->izquierda("I. C. B. F. (3%)",31,"-").">".$arc->derecha(number_format($var),15); $lindet2++;
  $totalapr+=round($var);$var=$Vacacionesnominaliquidaciones->getCajaCompensacion($baseicbf);
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
  $arc->downloadFile($path,$file);  
	
?>