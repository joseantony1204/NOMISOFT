<?php
$filas = count($Mensualnominaliquidaciones->prestaciones);
$columnas = count($Mensualnominaliquidaciones->prestaciones[1]);
 
 $path = ("reportes/terceros/");
 $file = ("sindicato");
 $realPath = $path.$file; 
 $modo="w";
 $arc = new Archivo($realPath.".dat",$modo);
 
 $c1=11;$c2=44;$c3=25;$c4=6;$c5=15;$c6=13;$c7=14;
 $encabezado=$arc->izquierda("UNIVERSIDAD DE LA GUAJIRA",90).$arc->enter().
             $arc->izquierda("SECCION DE PERSONAL",90).$arc->izquierda("PERIODO      : $Periodo",60).$arc->enter().
	         $arc->izquierda("RELACION DE DESCUENTO DE SINDICATO",90).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
	         $arc->izquierda($tercero,90)."PAGINA       : ";

 ////Titulo
 $titulo = $arc->enter().$arc->enter().
           $arc->centro("CEDULA",$c1).$arc->centro("NOMBRES",$c2).$arc->centro("SINDICATO",$c3).$arc->centro("APORTE",$c4).
		   $arc->enter().$arc->enter();
 $pagina=1;
 $arc->escribir($encabezado.$pagina);
 $arc->escribir($titulo);
 $linpag=7;
 //***********************COMENZAR LA CAPTURA DE DATOS***************************************************************//
 $lista = NULL; $index=0;
 for($i=1;$i<$filas;$i++){		 
  $nombre = trim($Mensualnominaliquidaciones->prestaciones[$i][3]).$arc->espacio(1).trim($Mensualnominaliquidaciones->prestaciones[$i][4]).$arc->espacio(1).trim($Mensualnominaliquidaciones->prestaciones[$i][5]).$arc->espacio(1).trim($Mensualnominaliquidaciones->prestaciones[$i][6]);				 
  $lista[$index]=$arc->centro(number_format($Mensualnominaliquidaciones->prestaciones[$i][2]),$c1).$arc->centro($nombre,$c2).$arc->centro(trim($Mensualnominaliquidaciones->prestaciones[$i][7]),$c3).$arc->derecha(number_format($Mensualnominaliquidaciones->prestaciones[$i][8]),$c4);
  
  $total4=$total4+$Mensualnominaliquidaciones->prestaciones[$i][8]; // total
  $index++;  
 }
 $lista[$index]=$arc->enter().$arc->enter().$arc->centro('TOTALES',$c1).$arc->centro('SON '.($index).' FUNCIONARIOS',$c2).$arc->centro(' - ',$c3).$arc->derecha(number_format($total4),$c4);
 
 //**********************A PARTIR DE AQUI SE COMIENZA A IMPRIMIR LO ANTES GUARDADO************************************//
 $linearep=count($lista);		
 for($j=0;$j<$linearep;$j++){
	 if($linpag>=60){
	  $arc->bajar(66- ($linpag));//Cada pagina tiene 66 lineas
	  $pagina++;
	  $linpag=7;
	  $arc->escribir($encabezado.$pagina);
	  $arc->escribir($titulo);		
	 }else{
		  $arc->escribir($lista[$j].$arc->espacio($c1).$arc->enter());
	      $linpag++;
		  }
 }		
 $firma = $arc->enter().$arc->enter()."DIRECTOR DE TALENTO HUMANO".$arc->enter().$arc->enter()."--------------------------";
 $arc->escribir($firma);
 $arc->cerrar();
$arc->downloadFile($path,$file); 
?>