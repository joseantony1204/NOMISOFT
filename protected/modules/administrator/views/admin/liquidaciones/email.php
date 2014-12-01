<?php
set_time_limit(0);
Yii::import('application.extensions.mail.');
$phpExcelPath = Yii::getPathOfAlias('ext.mail');
include($phpExcelPath . DIRECTORY_SEPARATOR . 'class.phpmailer.php');
include($phpExcelPath . DIRECTORY_SEPARATOR . 'class.smtp.php');
		
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Liquidacion de prestaciones'=>array('admin/liquidaciones/admin'),
	'Enviar Email'
);

$Personasgeneral = Personasgenerales::model()->findByPk($Liquidaciones->PEGE_ID);
$Personasgeneral->loadPersonageneral($Personasgeneral->PEGE_ID);
$nombre = trim($Personasgeneral->Personageneral->PEGE_PRIMERNOMBRE).' '.trim($Personasgeneral->Personageneral->PEGE_PRIMERAPELLIDO);			  
$nombrecompleto = trim($Personasgeneral->Personageneral->PEGE_PRIMERNOMBRE).' '.trim($Personasgeneral->Personageneral->PEGE_SEGUNDONOMBRE).' '.trim($Personasgeneral->Personageneral->PEGE_PRIMERAPELLIDO).' '.trim($Personasgeneral->Personageneral->PEGE_SEGUNDOAPELLIDOS);			  
$tercero = "EMPLEADO(A): ".trim($Personasgeneral->Personageneral->PEGE_PRIMERNOMBRE).' '.trim($Personasgeneral->Personageneral->PEGE_SEGUNDONOMBRE).' '.trim($Personasgeneral->Personageneral->PEGE_PRIMERAPELLIDO).' '.trim($Personasgeneral->Personageneral->PEGE_SEGUNDOAPELLIDOS);			  
$Periodo = "FECHA INGRESO: ".$Liquidaciones->getFormatoFecha($Liquidaciones->LIQU_FECHAINGRESO).' - FECHA RETIRO: '.$Liquidaciones->getFormatoFecha($Liquidaciones->LIQU_FECHARETIRO);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('liquidaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");


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
?>
<style type="text/css">

.tabla2 {
font:94% Arial, Helvetica, sans-serif;
border-collapse: collapse;
border-spacing: 0;
border:1px solid;padding:3px 3px; border-color:#000;
}
.tabla2 tbody td {
 padding:5px;
 border-left: 1px solid #000;
}
.tabla2  table tr:first-child th { /* primera fila */
border-top: none;
}
.tabla2 table tr:last-child td { /* ultima fila */
border-bottom: none;
}
.tabla2 table th:first-child,
.tabla2 table td:first-child { /* primera columna */
border-left: none;
}
table th:last-child,
table td:last-child { /* ultima columna */
border-right: none;
}

.tabla3 { color: #000; 	/*font-family: Courier;*/ font-family: helvetica;
		font-size: 10pt; }
	td{border-bottom: none; }

</style>
<table width="90%" border="0" align="center">
  <tr>
   <td>
	<table width="100%" border="0" align="center">
     <tr>
      <td>
       <fieldset>
        <table width="100%" border="0" align="center">
            <tr>
             
			 <td width="10%" align="center">
			 <?php 			 
			 $imageUrl = Yii::app()->request->baseUrl . '/images/user.png';
			 echo $image = CHtml::image($imageUrl); 
			 ?>	               
             </td>
             
			 <td width="70%"><strong><span><em>ENVIAR POR CORREO DE LIQUIDACION DE PRETSACIONES ( <?php echo $Periodo; ?> )<br><?php echo $tercero; ?></em></span></strong></td>
			 
			 <td width="10%" align="center">
			 <?php	 
			 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
			 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
			 $image = CHtml::image($imageUrl);
		     echo CHtml::link($image, array('admin/liquidaciones/admin',), $htmlOptions ); 
             ?>           
             </td>
			 
			 <td width="10%" align="center">
			 <?php	 
			 $imageUrl = Yii::app()->request->baseUrl . '/images/sendmail.png';
			 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Enviar correos electronicos');
			 $image = CHtml::image($imageUrl);
		     echo CHtml::link($image, array('admin/liquidaciones/email',
			                                                               'id'=>$Liquidaciones->LIQU_ID,
			                                                               'sw'=>'sendmail',
										  ),
							 $htmlOptions 
							);
			?>          
             </td>
           
		   </tr>
        </table>
       </fieldset>
      </td>
     </tr>
    </table></td>
  </tr>
  <tr>
    <td>
<?php
 $email = 0;
 if($filasprimasemestral>1){
 $email = 1;
 }elseif($filasvacaciones>1){
  $email = 1;
 }elseif($filasprimavacaciones>1){
  $email = 1;
 }elseif($filasprimanavidad>1){
  $email = 1;
 }elseif($filascesantias>1){
  $email = 1;
 } 
 
echo "<h4><font color='#009900'><div align='center'><strong>Se enviaran un total de: ".($email)." correos electronicos.<strong></div></font></h4>";	
  

	$tabla2='<table width="100%" border="1" align="center" CELLSPACING="0" >
    <tr>
     <th colspan="5">INFORME DE COMPROBANTES DE LIQUIDACIONES ENVIADAS A CORREOS ELECTRONICOS</th>
    </tr>
    <tr>
     <td colspan="3"><strong>PERIODO: </strong></br>'. $Periodo.'</td>
     <td colspan="2"><strong>FECHA PROCESO: </strong>'.date("d-m-Y").'</td>
    </tr>
    <tr>
     <td colspan="3">'.$tercero.'</td>
     <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
     <th width="14%">COMPROBANTE</th>
     <th width="15%">IDENTIFICACION</th>
     <th width="24%">CORREO </th>
     <th width="10%">ESTADO</th>
     <th width="37%">OBSERVACIONES</th>
    </tr>
	<tr>';


if($email==1){

	if ($Personasgeneral->PEGE_EMAIL=='' or !$Personasgeneral->PEGE_EMAIL){
       $tabla2.=" 
       <td>".$Liquidaciones->LIQU_ID."</td>
	   <td>".$Personasgeneral->PEGE_IDENTIFICACION."</td>
	   <td>".$Personasgeneral->PEGE_EMAIL." </td>
	   <td align='center'>".CHtml::image(Yii::app()->request->baseUrl . '/images/email_error.png')."<br>No enviado</td>
	   <td>No posee correo electronico</td>"; 	
	}else{
	
	 if ($Liquidaciones->LIQU_ESTADO==0)
		$estado='<strong><font color="#FF0000">Estado:&nbsp;&nbsp;&nbsp;En revisión</font></strong>';
	 elseif($Liquidaciones->LIQU_ESTADO==1)
		$estado='<strong> <font color="#009900">Estado:&nbsp;&nbsp;&nbsp;Aprobado</font></strong>';
	 $tabla2.='<tr>';
	 
    
	 $tabla1 = '
	 <table width="100%" border="1" align="center" CELLSPACING="0" class="tabla2" >
        <tr>
         <th colspan="2" align="center">LIQUIDACION DE EMPLEADOS UNIVERSIDAD DE LA GUAJIRA</th>
        </tr> 
		
		<tr>
         <th colspan="2" align="left">'.$tercero.'</th>
        </tr>
		
		<tr>
         <th colspan="2" align="left">'.$Periodo.'</th>
        </tr>
		
		<tr>
         <th colspan="2" align="left">CARGO: '.$Personasgeneral->Empleoplanta->EMPL_CARGO.'</th>
        </tr>
		
        <tr>
         <th align="center" style="border:1px solid;padding:3px 3px; border-color:#000">INFORMACION BASICA</th>
         <th align="center" style="border:1px solid;padding:3px 3px; border-color:#000">DETALLE DE LA LIQUIDACION</th>
        </tr>';
		
		if($filasprimasemestral>1){
		 for($i=1;$i<$filasprimasemestral;$i++){
        $tabla1.=' <tr valign="top">
         <td width="45%">
			
			<table width="100%" rules="all"  border="0" class="tabla2">
              
			  <tr>
                <td width="87">&nbsp;</td>
              </tr>
			  
			  <tr>
                <td width="87">PRESTACION SOCIAL</td>
                <td width="181">PRIMA DE SERVICIOS</td>
              </tr>';
			 
              $tabla1.='			  
			  <tr>
                <td>Estado</td>
                <td>'.$estado.'</td>
              </tr>
			  
            </table>
			
		 </td>
			
         <td width="55%" >
			
		    <table width="100%" rules="cols" border="1" class="tabla2">
              <thead>
			  <tr>
               <th width="346" colspan="2" align="center" style="border:1px solid;padding:3px 3px; border-color:#000">DESCRIPCION</th>
               <th width="66" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">MESES</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">DEVENGADOS</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">NETO</th>
              </tr>';
              
			  $dias = @(($Liqprimasemestral->liquidacion[$i][1]*22)/12);
              $valor = @((30*$Liqprimasemestral->liquidacion[$i][4])/($dias));
	          $totalDevengado = $totalDevengado+$Liqprimasemestral->liquidacion[$i][13];
			 
			   $tabla1.='<tr>
	           <td width="346">SUELDO</td>
			   <td width="110" align="right">'.number_format($valor).'</td>
			   <td width="66"  align="right">'.number_format($Liqprimasemestral->liquidacion[$i][1]).'</td>
			   <td width="110" align="right">'.number_format($Liqprimasemestral->liquidacion[$i][4]).'</td>
	           <td width="110" >&nbsp;</td>
		      </tr>';
			
			 
			  for ($ln=5;$ln<10;$ln++){
			   if($Liqprimasemestral->liquidacion[$i][$ln]!=0){
			    $dias = @(($Liqprimasemestral->liquidacion[$i][1]*22)/12);
                $valor = @((30*$Liqprimasemestral->liquidacion[$i][$ln])/($dias));
			  $tabla1.='
			  <tr>
		       <td>'.$Liqprimasemestral->liquidacion[0][$ln].'</td>
		       <td align="right">'.number_format($valor).'</td>
		       <td align="right">&nbsp;</td>
		       <td align="right">'.number_format($Liqprimasemestral->liquidacion[$i][$ln]).'</td>
		       <td>&nbsp;</td>
		      </tr>';
			  
               }
              }
			  
			  for ($ln=10;$ln<11;$ln++){
			   if($Liqprimasemestral->liquidacion[$i][$ln]!=0){
			    $dias = @(($Liqprimasemestral->liquidacion[$i][1]*22)/12);
                $valor = @((30*$Liqprimasemestral->liquidacion[$i][$ln])/($dias));
			  $tabla1.='
			  <tr>
		       <td>'.$Liqprimasemestral->liquidacion[0][$ln].'</td>
		       <td align="right">'.number_format($valor).'</td>
		       <td align="right">&nbsp;</td>
		       <td align="right">'.number_format($Liqprimasemestral->liquidacion[$i][$ln]).'</td>
		       <td>&nbsp;</td>
		      </tr>';
			  
               }
              }
			  
			  $tabla1.='		
	          <tr>
	           <td colspan="2"   style="border-top:1px solid;padding:3px 3px;border-color:#000">TOTALES</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">&nbsp;</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">&nbsp;</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">'.number_format($Liqprimasemestral->liquidacion[$i][13]).'</td>
	          </tr>
			 </thead>
            </table>
			
	     </td>
      </tr>';
	   }
	  }
	  
	  if($filasvacaciones>1){
		 for($i=1;$i<$filasvacaciones;$i++){
        $tabla1.=' <tr valign="top">
         <td width="45%">
			
			<table width="100%" rules="all"  border="0" class="tabla2">
              
			  <tr>
                <td width="87">&nbsp;</td>
              </tr>
			  
			  <tr>
                <td width="87">PRESTACION SOCIAL</td>
                <td width="181">VACACIONES</td>
              </tr>';
			 
              $tabla1.='			  
			  <tr>
                <td>Estado</td>
                <td>'.$estado.'</td>
              </tr>
			  
            </table>
			
		 </td>
			
         <td width="55%" >
			
		    <table width="100%" rules="cols" border="1" class="tabla2">
              <thead>
			  <tr>
               <th width="346" colspan="2" align="center" style="border:1px solid;padding:3px 3px; border-color:#000">DESCRIPCION</th>
               <th width="66" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">MESES</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">DEVENGADOS</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">NETO</th>
              </tr>';
              
			  $dias = @(($Liqvacaciones->liquidacion[$i][1]*22)/12);
              $valor = @((30*$Liqvacaciones->liquidacion[$i][4])/($dias));
	          $totalDevengado = $totalDevengado+$Liqvacaciones->liquidacion[$i][14];
			 
			   $tabla1.='<tr>
	           <td width="346">SUELDO</td>
			   <td width="110" align="right">'.number_format($valor).'</td>
			   <td width="66"  align="right">'.number_format($Liqvacaciones->liquidacion[$i][1]).'</td>
			   <td width="110" align="right">'.number_format($Liqvacaciones->liquidacion[$i][4]).'</td>
	           <td width="110" >&nbsp;</td>
		      </tr>';
			
			 
			  for ($ln=5;$ln<10;$ln++){
			   if($Liqvacaciones->liquidacion[$i][$ln]!=0){
			    $dias = @(($Liqvacaciones->liquidacion[$i][1]*22)/12);
                $valor = @((30*$Liqvacaciones->liquidacion[$i][$ln])/($dias));
			  $tabla1.='
			  <tr>
		       <td>'.$Liqvacaciones->liquidacion[0][$ln].'</td>
		       <td align="right">'.number_format($valor).'</td>
		       <td align="right">&nbsp;</td>
		       <td align="right">'.number_format($Liqvacaciones->liquidacion[$i][$ln]).'</td>
		       <td>&nbsp;</td>
		      </tr>';
			  
               }
              }
			  
			  for ($ln=10;$ln<12;$ln++){
			   if($Liqvacaciones->liquidacion[$i][$ln]!=0){
			    $dias = @(($Liqvacaciones->liquidacion[$i][1]*22)/12);
                $valor = @((30*$Liqvacaciones->liquidacion[$i][$ln])/($dias));
			  $tabla1.='
			  <tr>
		       <td>'.$Liqvacaciones->liquidacion[0][$ln].'</td>
		       <td align="right">'.number_format($valor).'</td>
		       <td align="right">&nbsp;</td>
		       <td align="right">'.number_format($Liqvacaciones->liquidacion[$i][$ln]).'</td>
		       <td>&nbsp;</td>
		      </tr>';
			  
               }
              }
			  
			  $tabla1.='		
	          <tr>
	           <td colspan="2"   style="border-top:1px solid;padding:3px 3px;border-color:#000">TOTALES</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">&nbsp;</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">&nbsp;</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">'.number_format($Liqvacaciones->liquidacion[$i][14]).'</td>
	          </tr>
			 </thead>
            </table>
			
	     </td>
      </tr>';
	   }
	  }
	  
	  if($filasprimavacaciones>1){
		 for($i=1;$i<$filasprimavacaciones;$i++){
        $tabla1.=' <tr valign="top">
         <td width="45%">
			
			<table width="100%" rules="all"  border="0" class="tabla2">
              
			  <tr>
                <td width="87">&nbsp;</td>
              </tr>
			  
			  <tr>
                <td width="87">PRESTACION SOCIAL</td>
                <td width="181">PRIMA DE VACACIONES</td>
              </tr>';
			 
              $tabla1.='			  
			  <tr>
                <td>Estado</td>
                <td>'.$estado.'</td>
              </tr>
			  
            </table>
			
		 </td>
			
         <td width="55%" >
			
		    <table width="100%" rules="cols" border="1" class="tabla2">
              <thead>
			  <tr>
               <th width="346" colspan="2" align="center" style="border:1px solid;padding:3px 3px; border-color:#000">DESCRIPCION</th>
               <th width="66" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">MESES</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">DEVENGADOS</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">NETO</th>
              </tr>';
              
			  $dias = @($Liqprimavacaciones->liquidacion[$i][1]);
		      $valor = @(((12*$Liqprimavacaciones->liquidacion[$i][4])/($dias))*2);
	          $totalDevengado = $totalDevengado+$Liqprimavacaciones->liquidacion[$i][14];
			 
			   $tabla1.='<tr>
	           <td width="346">SUELDO</td>
			   <td width="110" align="right">'.number_format($valor).'</td>
			   <td width="66"  align="right">'.number_format($Liqprimavacaciones->liquidacion[$i][1]).'</td>
			   <td width="110" align="right">'.number_format($Liqprimavacaciones->liquidacion[$i][4]).'</td>
	           <td width="110" >&nbsp;</td>
		      </tr>';
			
			 
			  for ($ln=5;$ln<10;$ln++){
			   if($Liqprimavacaciones->liquidacion[$i][$ln]!=0){
			    $dias = @($Liqprimavacaciones->liquidacion[$i][1]);
		        $valor = @(((12*$Liqprimavacaciones->liquidacion[$i][$ln])/($dias))*2);
			  $tabla1.='
			  <tr>
		       <td>'.$Liqprimavacaciones->liquidacion[0][$ln].'</td>
		       <td align="right">'.number_format($valor).'</td>
		       <td align="right">&nbsp;</td>
		       <td align="right">'.number_format($Liqprimavacaciones->liquidacion[$i][$ln]).'</td>
		       <td>&nbsp;</td>
		      </tr>';
			  
               }
              }
			  
			  for ($ln=10;$ln<12;$ln++){
			   if($Liqprimavacaciones->liquidacion[$i][$ln]!=0){
			    $dias = @($Liqprimavacaciones->liquidacion[$i][1]);
		        $valor = @(((12*$Liqprimavacaciones->liquidacion[$i][$ln])/($dias))*2);
			  $tabla1.='
			  <tr>
		       <td>'.$Liqprimavacaciones->liquidacion[0][$ln].'</td>
		       <td align="right">'.number_format($valor).'</td>
		       <td align="right">&nbsp;</td>
		       <td align="right">'.number_format($Liqprimavacaciones->liquidacion[$i][$ln]).'</td>
		       <td>&nbsp;</td>
		      </tr>';
			  
               }
              }
			  
			  $tabla1.='		
	          <tr>
	           <td colspan="2"   style="border-top:1px solid;padding:3px 3px;border-color:#000">TOTALES</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">&nbsp;</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">&nbsp;</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">'.number_format($Liqprimavacaciones->liquidacion[$i][14]).'</td>
	          </tr>
			 </thead>
            </table>
			
	     </td>
      </tr>';
	   }
	  }
	  
	  if($filasprimanavidad>1){
		 for($i=1;$i<$filasprimanavidad;$i++){
        $tabla1.=' <tr valign="top">
         <td width="45%">
			
			<table width="100%" rules="all"  border="0" class="tabla2">
              
			  <tr>
                <td width="87">&nbsp;</td>
              </tr>
			  
			  <tr>
                <td width="87">PRESTACION SOCIAL</td>
                <td width="181">PRIMA DE NAVIDAD</td>
              </tr>';
			 
              $tabla1.='			  
			  <tr>
                <td>Estado</td>
                <td>'.$estado.'</td>
              </tr>
			  
            </table>
			
		 </td>
			
         <td width="55%" >
			
		    <table width="100%" rules="cols" border="1" class="tabla2">
              <thead>
			  <tr>
               <th width="346" colspan="2" align="center" style="border:1px solid;padding:3px 3px; border-color:#000">DESCRIPCION</th>
               <th width="66" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">MESES</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">DEVENGADOS</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">NETO</th>
              </tr>';
              
			  $dias = @($Liqprimanavidad->liquidacion[$i][1]);
		      $valor = @(((12*$Liqprimanavidad->liquidacion[$i][4])/($dias)));
	          $totalDevengado = $totalDevengado+$Liqprimanavidad->liquidacion[$i][15];
			 
			   $tabla1.='<tr>
	           <td width="346">SUELDO</td>
			   <td width="110" align="right">'.number_format($valor).'</td>
			   <td width="66"  align="right">'.number_format($Liqprimanavidad->liquidacion[$i][1]).'</td>
			   <td width="110" align="right">'.number_format($Liqprimanavidad->liquidacion[$i][4]).'</td>
	           <td width="110" >&nbsp;</td>
		      </tr>';
			
			 
			  for ($ln=5;$ln<10;$ln++){
			   if($Liqprimanavidad->liquidacion[$i][$ln]!=0){
			    $dias = @($Liqprimanavidad->liquidacion[$i][1]);
		        $valor = @(((12*$Liqprimanavidad->liquidacion[$i][$ln])/($dias)));
			  $tabla1.='
			  <tr>
		       <td>'.$Liqprimanavidad->liquidacion[0][$ln].'</td>
		       <td align="right">'.number_format($valor).'</td>
		       <td align="right">&nbsp;</td>
		       <td align="right">'.number_format($Liqprimanavidad->liquidacion[$i][$ln]).'</td>
		       <td>&nbsp;</td>
		      </tr>';
			  
               }
              }
			  
			  for ($ln=10;$ln<13;$ln++){
			   if($Liqprimanavidad->liquidacion[$i][$ln]!=0){
			    $dias = @($Liqprimanavidad->liquidacion[$i][1]);
		        $valor = @(((12*$Liqprimanavidad->liquidacion[$i][$ln])/($dias)));
			  $tabla1.='
			  <tr>
		       <td>'.$Liqprimanavidad->liquidacion[0][$ln].'</td>
		       <td align="right">'.number_format($valor).'</td>
		       <td align="right">&nbsp;</td>
		       <td align="right">'.number_format($Liqprimanavidad->liquidacion[$i][$ln]).'</td>
		       <td>&nbsp;</td>
		      </tr>';
			  
               }
              }
			  
			  $tabla1.='		
	          <tr>
	           <td colspan="2"   style="border-top:1px solid;padding:3px 3px;border-color:#000">TOTALES</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">&nbsp;</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">&nbsp;</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">'.number_format($Liqprimanavidad->liquidacion[$i][15]).'</td>
	          </tr>
			 </thead>
            </table>
			
	     </td>
      </tr>';
	   }
	  }
	  
	  if($filascesantias>1){
		 for($i=1;$i<$filascesantias;$i++){
        $tabla1.=' <tr valign="top">
         <td width="45%">
			
			<table width="100%" rules="all"  border="0" class="tabla2">
              
			  <tr>
                <td width="87">&nbsp;</td>
              </tr>
			  
			  <tr>
                <td width="87">PRESTACION SOCIAL</td>
                <td width="181">PRIMA DE NAVIDAD</td>
              </tr>';
			 
              $tabla1.='			  
			  <tr>
                <td>Estado</td>
                <td>'.$estado.'</td>
              </tr>
			  
            </table>
			
		 </td>
			
         <td width="55%" >
			
		    <table width="100%" rules="cols" border="1" class="tabla2">
              <thead>
			  <tr>
               <th width="346" colspan="2" align="center" style="border:1px solid;padding:3px 3px; border-color:#000">DESCRIPCION</th>
               <th width="66" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">MESES</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">DEVENGADOS</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">NETO</th>
              </tr>';
              
			  $dias = @($Liqcesantias->liquidacion[$i][1]);
		      $valor = @(((360*$Liqcesantias->liquidacion[$i][4])/($dias)));
	          $totalDevengado = $totalDevengado+$Liqcesantias->liquidacion[$i][16];
			 
			   $tabla1.='<tr>
	           <td width="346">SUELDO</td>
			   <td width="110" align="right">'.number_format($valor).'</td>
			   <td width="66"  align="right">'.number_format($Liqcesantias->liquidacion[$i][1]).'</td>
			   <td width="110" align="right">'.number_format($Liqcesantias->liquidacion[$i][4]).'</td>
	           <td width="110" >&nbsp;</td>
		      </tr>';
			
			 
			  for ($ln=5;$ln<10;$ln++){
			   if($Liqcesantias->liquidacion[$i][$ln]!=0){
			    $dias = @($Liqcesantias->liquidacion[$i][1]);
		        $valor = @(((360*$Liqcesantias->liquidacion[$i][$ln])/($dias)));
			  $tabla1.='
			  <tr>
		       <td>'.$Liqcesantias->liquidacion[0][$ln].'</td>
		       <td align="right">'.number_format($valor).'</td>
		       <td align="right">&nbsp;</td>
		       <td align="right">'.number_format($Liqcesantias->liquidacion[$i][$ln]).'</td>
		       <td>&nbsp;</td>
		      </tr>';
			  
               }
              }
			  
			  for ($ln=10;$ln<14;$ln++){
			   if($Liqcesantias->liquidacion[$i][$ln]!=0){
			    $dias = @($Liqcesantias->liquidacion[$i][1]);
		        $valor = @(((360*$Liqcesantias->liquidacion[$i][$ln])/($dias)));
			  $tabla1.='
			  <tr>
		       <td>'.$Liqcesantias->liquidacion[0][$ln].'</td>
		       <td align="right">'.number_format($valor).'</td>
		       <td align="right">&nbsp;</td>
		       <td align="right">'.number_format($Liqcesantias->liquidacion[$i][$ln]).'</td>
		       <td>&nbsp;</td>
		      </tr>';
			  
               }
              }
			  
			  $tabla1.='		
	          <tr>
	           <td colspan="2"   style="border-top:1px solid;padding:3px 3px;border-color:#000">TOTALES</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">&nbsp;</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">&nbsp;</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">'.number_format($Liqcesantias->liquidacion[$i][16]).'</td>
	          </tr>
			 </thead>
            </table>
			
	     </td>
      </tr>
      <tr>
	   <td colspan="2">
	     <table width="100%" rules="all"  border="0" class="tabla2">
		  
		  <tr>
		   <td align="center">TOTAL LIQUIDACION </td>
		   <td align="right">'.number_format($totalDevengado).'</td>
		  </tr>
		  
		  <tr>
		   <td align="center">DESCUENTOS</td>
		   <td align="right">'.number_format(0).'</td>
		  </tr>
		  
		  <tr>
		   <td align="center">NETO A RECIBIR </td>
		   <td align="right">'.number_format($totalDevengado).'</td>
		  </tr>
		  
		 </table>
		</td>
	  </tr>';
	   }
	  }
	  
     $tabla1.='</table>';
	 ?>	 
     <?php
	 if($sw=='sendmail'){
	 $body = '
     <!DOCTYPE html>
     <html xmlns="http://www.w3.org/1999/xhtml">
     <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	  
     </head>
      <body> '. $tabla1.'<div><hr></hr></div></body>
     </html>';
   
	 $mail = new PHPMailer();
	 //$mail->Host = 'localhost';
	 $mail->Port = 465;
	 $mail->Host = 'ssl://smtp.gmail.com:465';
	 $mail->Username = "th@uniguajira.edu.co";
	 $mail->Password = "talento";
	 $mail->SMTPAuth = true;
	 $mail->From = "th@uniguajira.edu.co";
	 $mail->FromName = "Universidad de la Guajira - Direccion de Talento Humano";
	 $mail->Subject = "Liquidacion electronica Uniguajira No ".$Liquidaciones->LIQU_ID.' - Empleado:'.number_format($Personasgeneral->PEGE_IDENTIFICACION);
				
	 $mail->AddAddress($Personasgeneral->PEGE_EMAIL,$Personasgeneral->PEGE_PRIMERNOMBRE.' '.$Personasgeneral->PEGE_PRIMERAPELLIDO);
	 $mail -> IsHTML (true);
	 $mail->Timeout=10;
	 $mail->Body = $body;
     $send = $mail->Send(); 
	 $intentos=1; 
	 
	 while ((!$send) && ($intentos < 2)) 
	 {
	  sleep(2);
	  $send = $mail->Send();
	  $intentos=$intentos+1;
	 }
 
	 if(!$send)
	  {
	   $tabla2.=" 
	   <td>".$Liquidaciones->LIQU_ID."</td>
	   <td>".$Personasgeneral->PEGE_IDENTIFICACION."</td>
	   <td>".$Personasgeneral->PEGE_EMAIL." </td>
	   <td align='center'>".CHtml::image(Yii::app()->request->baseUrl . '/images/email_error.png')."<br>No enviado</td>
	   <td>".$mail->ErrorInfo."</td>"; 
	  }else{ 
	        $tabla2.=" 
	        <td>".$Liquidaciones->LIQU_ID."</td>
			<td>".$Personasgeneral->PEGE_IDENTIFICACION."</td>
	        <td>".$Personasgeneral->PEGE_EMAIL." </td>
	        <td align='center'>".CHtml::image(Yii::app()->request->baseUrl . '/images/email_go.png')."</td>
	        <td align='center'>Mensaje enviado correctamente...</td>"; 
		   }
	
	 }
	}
    $tabla2.='</tr>';    

	echo $tabla1.'<div><hr></hr></div>';     
}
$tabla2.='</table>';
echo $tabla2;	
?>	
    </td>
  </tr>

</table>
