<?php
$filas = count($Primavacacionesnominaliquidaciones->liquidacion);
$columnas = count($Primavacacionesnominaliquidaciones->liquidacion[1]);

 $path = ("reportes/terceros/");
 $file = ("cesantias");
 $realPath = $path.$file; 
 $modo="w";
 $arc = new Archivo($realPath.".dat",$modo);

 $c1=15; $c2=40; $c3=20; $c4=20;$c5=20;
 $encabezado=$arc->izquierda("UNIVERSIDAD DE LA GUAJIRA",90).$arc->enter().
             $arc->izquierda("SECCION DE PERSONAL",90).$arc->izquierda("PERIODO      : $Periodo",60).$arc->enter().
	         $arc->izquierda("REPORTE DEL I.B.C",90).$arc->izquierda("FECHA PROCESO: ".date("d/m/Y"),60).$arc->enter().
	         $arc->izquierda($tercero,90)."PAGINA       : ";

 ////Titulo
 $titulo = $arc->enter().$arc->enter().
           $arc->centro("CEDULA",$c1).$arc->centro("NOMBRES",$c2).$arc->centro("SUELDO BASICO",$c3).$arc->centro("TOTAL DEVENGADO",$c4).$arc->centro("ADMINISTRADORA",$c5).
		   $arc->enter().$arc->enter();
 $pagina=1;
 $arc->escribir($encabezado.$pagina);
 $arc->escribir($titulo);
 $linpag=7;

//***********************COMENZAR LA CAPTURA DE DATOS***************************************************************//
 $lista = NULL; $index=0;
 for($i=1;$i<$filas-1;$i++)		 
  {
  $Mensualnomina = new Mensualnomina;
  $Mensualnomina->cargarEmpleoPlanta($Primavacacionesnominaliquidaciones->liquidacion[$i][14]);
	
  $basico=(($Primavacacionesnominaliquidaciones->liquidacion[$i][4]));
  $neto=(($Primavacacionesnominaliquidaciones->liquidacion[$i][$columnas-1]));
  
  $nombre = trim($Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO).' '.trim($Mensualnomina->Personageneral->PEGE_SEGUNDOAPELLIDOS).' '.trim($Mensualnomina->Personageneral->PEGE_PRIMERNOMBRE).' '.trim($Mensualnomina->Personageneral->PEGE_SEGUNDONOMBRE);
  $Cesantias = Cesantias::model()->findByPk($Mensualnomina->Personageneral->CESA_ID);
  $administradora = trim($Cesantias->CESA_NOMBRE);
  $lista[$index]=$arc->centro(number_format(trim($Mensualnomina->Personageneral->PEGE_IDENTIFICACION)),$c1).$arc->izquierda($nombre,$c2).$arc->derecha(number_format($basico),$c3).$arc->derecha(number_format($neto),$c4).$arc->centro(($administradora),$c5);
  
  $index++;  
 }
 //**********************A PARTIR DE AQUI SE COMIENZA A IMPRIMIR LO ANTES GUARDADO************************************//


 $linearep=count($lista);		
 for($j=0;$j<$linearep;$j++){
	 if($linpag>=60){
	  $arc->bajar(66- ($linpag));//Cada pagina tiene 66 lineas
	  $pagina++;
	  $linpag=7;
	  $arc->escribir($encabezado.$pagina);
	  $arc->escribir($titulo);
      $arc->escribir($lista[$j].$arc->espacio($c1).$arc->enter());
      $linpag++;	  
	 }else{
		  $arc->escribir($lista[$j].$arc->espacio($c1).$arc->enter());
	      $linpag++;
		  }
 }		
 $arc->cerrar();
 $arc->downloadFile($path,$file); 
?>