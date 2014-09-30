<?php
class Archivo
{
	var $arc;
	public function  __construct($archivo=NULL,$modo=NULL)
	{
		$args = func_num_args();
		if ($args =1)
		    $this->arc=fopen($archivo,$modo);	
	}
	
	/*escribir*/
	public function escribir($texto)
	{
		@fputs($this->arc,$texto);
	}
    
	/*bajar*/
	public function bajar($n)
	{
		$salto = chr(13).chr(10);
		for ($i=1;$i<=$n;$i++)
		{
			@fputs($this->arc,$salto);
		}
	}
	
	/*cerrar*/
	public function cerrar()
	{
		@fclose($this->arc);
	}
	
	/*espacio*/
	public function espacio($n,$letra=NULL)
    {
		if ($letra==NULL)
		 $letra=" ";
		$st="";
		for ($i=1;$i<=$n;$i++)
		{
			$st=$st.$letra;
		}
		
		return $st;	
	}
	
	/*derecha*/
	public function derecha($texto,$tamano)
	{
	$str=($this->espacio($tamano-strlen($texto))).$texto;
	return $str;
	}
	
	/*izquierda*/
	public function izquierda($texto,$tamano,$letra=NULL)
    {
		$str=$texto.($this->espacio($tamano-strlen($texto),$letra));
		return $str;
	}
			
	/*centro*/
	public function centro($texto,$tamano)
	{
		$con=strlen($texto);
		$aj="";
		if ($con%2!=0 && $tamano%2==0)
		{
			$con++;
			$aj=" ";
		}elseif ($con%2==0 && $tamano%2!=0)
		{
			$con++;
			$aj=" ";
		}
		$tam=($tamano-$con)/2;
		$str=$this->espacio($tam).$texto.$aj.$this->espacio($tam);
		return $str;
	}
	
    /*lineaH*/
	public function lineaH($n)
	{
		$st="";
		for ($i=1;$i<=$n;$i++)
		{
			$st.="-";
		}
		
		return $st;
	}
	
	/*enter*/
    public function enter()
	{
		return chr(13).chr(10);
	}
	
	public function enterH()
	{
		$salto = chr(13).chr(10);
		@fputs($this->arc,$salto);
	}
	
	/**/
	public function escribXY($x,$y,$texto)
	{
		$this->escribir(chr(2));
		for ($i=1;$i<=$y;$i++)
		{
			$this->escribir(chr(15));
		}
		for ($i=1;$i<=$x;$i++)
		{
			$this->escribir(chr(39));
		}
		$this->escribir($texto);
	}
 	
	public function downloadFile($path,$file)
    {
     ////CREAR .BAT ///////////////////////////////////
     $modo="w";
     $files = 'ImprimirArchivo.bat';	 
	 $realPath = $path.$files;
	 
     $archivo=new Archivo($files,$modo);
     $txt="@echo off".$archivo->enter()."Title PANEL".$archivo->enter()."cls".$archivo->enter()."Menu".$archivo->enter().
     "Title PANEL".$archivo->enter()."cls".$archivo->enter()."Echo.".$archivo->enter().
     "Echo *******************BIENVENIDO*******************".$archivo->enter()."Echo.".$archivo->enter().
     "Echo 1. Imprimir Archivo".$archivo->enter().
	 "Echo 2. Salir".$archivo->enter().
	 "Echo.".$archivo->enter().
     "set /p menup= Elija una opcion : ".$archivo->enter().$archivo->enter().
     "if %menup%==1 goto printFile".$archivo->enter().
	 "if %menup%==2 goto Salir".$archivo->enter().$archivo->enter().
	 ":printFile".$archivo->enter().$archivo->enter().
	 "print ".$path.$file.".dat".$archivo->enter().$archivo->enter().
     ":Salir".$archivo->enter().$archivo->enter().
	 "Exit";
     $archivo->escribir($txt);
     $archivo->cerrar();
	 //FIN CREAR .BAT /////////////////////////////////
   
     $arch = "imprimible";
	 $zipfile= new zipfile();
	 $zipfile->add_dir($path);
     $zipfile->add_file(implode("",file($files)), $files);    
     $zipfile->add_file(implode("",file($path.$file.".dat")), $path.$file.".dat");
     header("Content-type: application/octet-stream");
     header("Content-disposition: attachment; filename=$arch.zip");
     echo $zipfile->file();	
    }
	
	public function downloadFileUnidad($path,$file,$unidades)
    {
     $modo="w";
     $files = 'ImprimirUnidades.bat';	 
	 $realPath = $path.$files;
	 
     $archivo=new Archivo($files,$modo);
     $txt="
	 @echo off".$archivo->enter().
	 "Title PANEL".$archivo->enter().
	 "color b ".$archivo->enter().
	 ":menu".$archivo->enter().
     "Title PANEL".$archivo->enter().
	 "cls".$archivo->enter().
	 "Echo.".$archivo->enter().     
	 "Echo *******************BIENVENIDO*******************".$archivo->enter().
	 "Echo.".$archivo->enter().
     "Echo CODIGO  UNIDAD".$archivo->enter()."".$archivo->enter()."".$archivo->enter().
	 "Echo.".$archivo->enter();
	 $zipfile= new zipfile();
	 
	 $opcion1010 = "if %menup%==1010 print ";
	 $opcion1020 = "if %menup%==1020 print ";
	 $opcion1030 = "if %menup%==1030 print ";
	 
	 foreach($unidades as $unidad){		
		$txt.="
		Echo ".$archivo->centro($unidad["UNID_ID"],8)."".$unidad["UNID_NOMBRE"]."".$archivo->enter();
		$opcion.="
		if %menup%==".$unidad["UNID_ID"]." print ".$path.$unidad["UNID_ID"].".dat".$archivo->enter();
		$zipfile->add_file(implode("",file($path.$unidad["UNID_ID"].".dat")),$path.$unidad["UNID_ID"].".dat");
	    
		$opcion1010.= $path.$unidad["UNID_ID"].".dat ";
		if($unidad["TIUN_ID"]==1){		 
		 $opcion1020.= $path.$unidad["UNID_ID"].".dat ";
		}		
		if($unidad["TIUN_ID"]==2){		 
		 $opcion1030.= $path.$unidad["UNID_ID"].".dat ";
		}
	 
	 }
	 
	 $txt.=
	    "Echo.".$archivo->enter().
	    "Echo ".$archivo->centro("1010",8).""."TODO"."".$archivo->enter().
		"Echo ".$archivo->centro("1020",8).""."ADMINISTRATIVOS"."".$archivo->enter().
		"Echo ".$archivo->centro("1030",8).""."DOCENTES"."".$archivo->enter();
		
		
	 $txt.="Echo. ".$archivo->enter()." set /p menup= Digite el codigo de la unidad que desea imprimir(0 para salir) : ".$archivo->enter().$archivo->enter().	 
	 $opcion.$archivo->enter().$opcion1010.$archivo->enter().$opcion1020.$archivo->enter().$opcion1030.$archivo->enter()."if %menup%==0 goto Salir".$archivo->enter().$archivo->enter().
	 ":error".$archivo->enter().
	 " Echo Seleccione la opcion Correcta".$archivo->enter().
	 "pause>nul".$archivo->enter().
	 "goto menu".$archivo->enter().
     ":Salir".$archivo->enter().$archivo->enter().
	 "Exit";
	 
     $archivo->escribir($txt);
     $archivo->cerrar();
	 //FIN CREAR .BAT /////////////////////////////////
   
     $arch = "imprimible_por_unidades";
	 $zipfile->add_dir($path);
     $zipfile->add_file(implode("",file($files)), $files);    
     header("Content-type: application/octet-stream");
     header("Content-disposition: attachment; filename=$arch.zip");
     echo $zipfile->file();	
    }
}
?>