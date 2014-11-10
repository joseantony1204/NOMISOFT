<?php
$filas = count($Cesantiasnominaliquidaciones->liquidacion);
$columnas = count($Cesantiasnominaliquidaciones->liquidacion[1]);


 $path = ("reportes/planogeneral/");
 $file = ("resumen");
 $realPath = $path.$file; 
 $modo="w";
 $arc = new Archivo($realPath.".dat",$modo);
 
 $encabezado=$arc->izquierda("UNIVERSIDAD DE LA GUAJIRA",90).$arc->enter().
             $arc->izquierda("SECCION DE PERSONAL",90).$arc->izquierda("PERIODO      : $Periodo",60).$arc->enter().
	         $arc->izquierda("INFORME DE LIQUIDACION DE CESANTIAS",90).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
	         $arc->izquierda($tercero,90)."PAGINA       : ";
 $pagina=1;   
 $titulo=$arc->centro("<< T O T A L E S    R E S U M E N >>",127).$arc->enter();
         $arc->escribir($encabezado.$pagina.$arc->enter());
         $arc->escribir($titulo);   
 
 //*************************INCICIA LA CAPTURA DE LA COLUMNA 1 *************************************************//
 $total = 0;
			$total = $total + 
			                $Cesantiasnominaliquidaciones->liquidacion[$filas-1][5]+
			                $Cesantiasnominaliquidaciones->liquidacion[$filas-1][10]+
			                $Cesantiasnominaliquidaciones->liquidacion[$filas-1][6]+
			                $Cesantiasnominaliquidaciones->liquidacion[$filas-1][7]+
			                $Cesantiasnominaliquidaciones->liquidacion[$filas-1][9]+
			                $Cesantiasnominaliquidaciones->liquidacion[$filas-1][8];
 $detalle1=NULL;
 $detalle1[0]=$arc->izquierda("SUELDO BASICO------------------->".$arc->derecha(number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][5]),16)."",80);
 $detalle1[1]=$arc->izquierda("GASTOS DE REPRESENTACION-------->".$arc->derecha(number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][10]),16)."",80);
 $detalle1[2]=$arc->izquierda("SUBSIDIO DE TRANSPORTE---------->".$arc->derecha(number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][7]),16)."",80);
 $detalle1[3]=$arc->izquierda("PRIMA DE ANTIGUEDAD------------->".$arc->derecha(number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][6]),16)."",80);
 $detalle1[4]=$arc->izquierda("PRIMA TECNICA------------------->".$arc->derecha(number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][9]),16)."",80);
 $detalle1[5]=$arc->izquierda("PRIMA DE ALIMENTACION----------->".$arc->derecha(number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][8]),16)."",80);
 $detalle1[6]=$arc->izquierda("TOTAL DEVENGADO:---------------->".$arc->derecha(number_format($total),16)."",80);
 $detalle1[7]=$arc->espacio(80);
 $detalle1[8]=$arc->espacio(80);
 
 //*************************INCICIA LA CAPTURA DE LA COLUMNA 2 *************************************************
  $detalle2=NULL; 
  			$sumaprestaciones = 0;
			$sumaprestaciones = $sumaprestaciones + 
			                    $Cesantiasnominaliquidaciones->liquidacion[$filas-1][12]+
			                    $Cesantiasnominaliquidaciones->liquidacion[$filas-1][11]+
			                    $Cesantiasnominaliquidaciones->liquidacion[$filas-1][13]+
			                    $Cesantiasnominaliquidaciones->liquidacion[$filas-1][14];  

  $detalle2[0]=$arc->izquierda("1/12 PRIMA SEMESTRAL------------->".$arc->derecha(number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][12]),16)."",80);
  $detalle2[1]=$arc->izquierda("1/12 PRIMA DE SERVICIOS (BSP)---->".$arc->derecha(number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][11]),16)."",80);
  $detalle2[2]=$arc->izquierda("1/12 PRIMA DE VACACIONES--------->".$arc->derecha(number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][13]),16)."",80);
  $detalle2[3]=$arc->izquierda("1/12 PRIMA DE NAVIDAD------------>".$arc->derecha(number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][14]),16)."",80);
  $detalle2[4]=$arc->izquierda("TOTAL PRESTACIONES--------------->".$arc->derecha(number_format($sumaprestaciones),16)."",80);
  $detalle2[5]=$arc->espacio(80);
  $detalle2[6]=$arc->espacio(80);
  
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