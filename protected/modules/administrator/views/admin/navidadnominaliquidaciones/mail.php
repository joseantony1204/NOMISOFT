<?php
Yii::import('application.extensions.mail.');
$phpExcelPath = Yii::getPathOfAlias('ext.mail');
include($phpExcelPath . DIRECTORY_SEPARATOR . 'class.phpmailer.php');
include($phpExcelPath . DIRECTORY_SEPARATOR . 'class.smtp.php');
		
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Prima Navidad'=>array('admin/navidadnomina/admin'),
	'Enviar Email'
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('navidadnominaliquidaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

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
             
			 <td width="70%"><strong><span><em>ENVIAR POR CORREO DE LIQUIDACION PRIMA DE NAVIDAD ( <?php echo $Periodo; ?> )<br><?php echo $tercero; ?></em></span></strong></td>
			 
			 <td width="10%" align="center">
			 <?php	 
			 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
			 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
			 $image = CHtml::image($imageUrl);
		     echo CHtml::link($image, array('admin/navidadnomina/search',                                                              
										   ),
							 $htmlOptions 
							);
			?>           
             </td>
			 
			 <td width="10%" align="center">
			 <?php	 
			 $imageUrl = Yii::app()->request->baseUrl . '/images/sendmail.png';
			 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Enviar correos electronicos');
			 $image = CHtml::image($imageUrl);
		     echo CHtml::link($image, array('admin/navidadnominaliquidaciones/mail',
			                                                               'navidadNomina'=>$navidadNomina,
																		   'navidadNomina2'=>$navidadNomina2,
																		   'personaGral'=>$personaGral,
																		   'unidad'=>$unidad,
																		   'tipoEmpleo'=>$tipoEmpleo,
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

$filas = count($Navidadnominaliquidaciones->liquidacion);
$columnas = count($Navidadnominaliquidaciones->liquidacion[1]);
$parafisales = count($Navidadnominaliquidaciones->parafiscales[0]);

$tblD = $Navidadnominaliquidaciones->descuentos;
$filasTblD = count($tblD);
$columnasTblD = count($tblD[0]);	
	
 
echo "<h4><font color='#009900'><div align='center'><strong>Se enviaran un total de: ".($filas-2)." correos electronicos.<strong></div></font></h4>";

	$tabla2='<table width="100%" border="1" align="center" CELLSPACING="0" >
    <tr>
     <th colspan="5">INFORME DE COMPROBANTES DE NOMINA ENVIADAS A CORREOS ELECTRONICOS</th>
    </tr>
    <tr>
     <td colspan="3"><strong>PERIODO DE PAGO:</strong>'. $Periodo.'</td>
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
	
	/**
	*obetenemos las notas de correo para esta nomina
	*/
	 $filascorreos = $Email->getsNotasemails(3);
	if(count($filascorreos)>0){
	 $tablacorreos = '<table width="100%" border="1" CELLSPACING="0" align="center" class="tabla1" >';
     for($r=0;$r<count($filascorreos);$r++){
		$tablacorreos.='<tr><td>'.$filascorreos[$r]["EMAI_DESCRIPCION"].'</td> </tr>';
	 }
  	 $tablacorreos.='</table>';
	}

for($i=1;$i<$filas-1;$i++){
  
$anio=substr($Navidadnominaliquidaciones->liquidacion[$i][14],0,4);    
$Parametrosglobales = new Parametrosglobales; 	 
$Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
$valorPunto = $Parametrosglobales[1][3];
$Navidadnomina = Navidadnomina::model()->findByPk($Navidadnominaliquidaciones->liquidacion[$i][14]);
$Mensualnomina = new Mensualnomina;
$Mensualnomina->cargarEmpleoPlanta($Navidadnominaliquidaciones->liquidacion[$i][15]);

?>
    <?php 
	if ($Mensualnomina->Personageneral->PEGE_EMAIL=='' or !$Mensualnomina->Personageneral->PEGE_EMAIL){
       $tabla2.=" 
       <td>".$Navidadnominaliquidaciones->liquidacion[$i][14]."</td>
	   <td>".$Mensualnomina->Personageneral->PEGE_IDENTIFICACION."</td>
	   <td>".$Mensualnomina->Personageneral->PEGE_EMAIL." </td>
	   <td align='center'>".CHtml::image(Yii::app()->request->baseUrl . '/images/email_error.png')."<br>No enviado</td>
	   <td>No posee correo electronico</td>"; 	
	}else{
	
	 if ($Navidadnomina->NANO_ESTADO==0)
		$estado='<strong><font color="#FF0000">Estado:&nbsp;&nbsp;&nbsp;En revisión</font></strong>';
	 elseif($Navidadnomina->NANO_ESTADO==1)
		$estado='<strong> <font color="#009900">Estado:&nbsp;&nbsp;&nbsp;Aprobado</font></strong>';
	 $tabla2.='<tr>';
	 
     $tabla1 = '
	 <table width="100%" border="1" align="center" CELLSPACING="0" class="tabla2" >
        <tr>
         <th colspan="2" align="center">PRIMA DE NAVIDAD DE EMPLEADOS UNIVERSIDAD DE LA GUAJIRA</th>
        </tr>
        <tr>
         <th align="center" style="border:1px solid;padding:3px 3px; border-color:#000">INFORMACION BASICA</th>
         <th align="center" style="border:1px solid;padding:3px 3px; border-color:#000">DETALLE DE LA NOMINA</th>
        </tr>
		
        <tr valign="top">
         <td width="45%">
			
			<table width="100%" rules="all" border="1" CELLSPACING="0" class="tabla2">
              
			  <tr>
                <td width="87">Comprobante No.</td>
                <td width="181">'.$Navidadnominaliquidaciones->liquidacion[$i][14].' - '.$Navidadnominaliquidaciones->liquidacion[$i][1].'</td>
              </tr>
             
			 <tr>
                <td width="87">Periodo Liquidación</td>
                <td width="181">'.$Navidadnomina->NANO_PERIODO.'</td>
              </tr>
             
			 <tr>
                <td width="87">No. Identificación</td>
                <td width="181">'.number_format($Mensualnomina->Personageneral->PEGE_IDENTIFICACION).'</td>
              </tr>
             
			 <tr>
                <td>Nombre Completo</td>
                <td>'.$Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO.' '.$Mensualnomina->Personageneral->PEGE_SEGUNDOAPELLIDOS.' '.$Mensualnomina->Personageneral->PEGE_PRIMERNOMBRE.' '.$Mensualnomina->Personageneral->PEGE_SEGUNDONOMBRE.'</td>
              </tr>
              
			  <tr>
                <td>Tipo Empleado</td>
                <td>'.$Mensualnomina->Tipocargo->TICA_NOMBRE.'</td>
              </tr>
              
			  <tr>
                <td>Cargo</td>
                <td>'.$Mensualnomina->Empleoplanta->EMPL_CARGO.'</td>
              </tr>';
			  
			  
              if($Mensualnomina->Tipocargo->TICA_ID==2){
			 
			  $tabla1.='
			  <tr>
               <td>Puntos</td>
               <td>'.$Mensualnomina->Empleoplanta->EMPL_PUNTOS.'</td>
      	      </tr>
		      
			  <tr>
               <td>Valor Punto</td>
               <td>'.$valorPunto.'</td>
      	      </tr>';
			  
              }
			 
              $tabla1.='
			  <tr>
                <td>Unidad</td>
                <td>'.$Mensualnomina->Unidad->UNID_ID.' -> '.$Mensualnomina->Unidad->UNID_NOMBRE.'</td>
              </tr>
			  
			  <tr>
                <td>Estado</td>
                <td>'.$estado.'</td>
              </tr>
			  
            </table>
			
		 </td>
			
         <td width="55%" >
			
		    <table width="100%" border="0" class="tabla2" style="border:1px solid;padding:3px 3px; border-color:#000">
              <tr border="1">
               <th width="246" align="center" style="border:1px solid;padding:3px 3px; border-color:#000">DESCRIPCION</th>
               <th width="66" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">MESES</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">DEVENGADOS</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">DEDUCCIONES</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">NETO</th>
              </tr>
			  
              <tr>
	           <td>SUELDO('.number_format($Navidadnominaliquidaciones->liquidacion[$i][4]).')</td>
			   <td align="center">'.$Navidadnominaliquidaciones->liquidacion[$i][2].'</td>
			   <td align="right">'.number_format($Navidadnominaliquidaciones->liquidacion[$i][5]).'</td>
	           <td>&nbsp;</td>
	           <td>&nbsp;</td>		       
		      </tr>';
			  
			 
			  
			  /* antiguedad, transporte y alimentacion*/
			  for ($ln=6;$ln<14;$ln++){
			   if($Navidadnominaliquidaciones->liquidacion[$i][$ln]!=0){
			  if ($ln==6){
		  		$antig = $Mensualnomina->Personageneral->getAntiguedad($Navidadnominaliquidaciones->liquidacion[$i][14])." A";
		  		}else{
					  $antig = "&nbsp;";
			         }
			 
			  $tabla1 .='
	          <tr>
		       <td>'.$Navidadnominaliquidaciones->liquidacion[0][$ln].'</td>
		       <td align="center">'.$antig.'</td>
		       <td align="right">'.number_format($Navidadnominaliquidaciones->liquidacion[$i][$ln]).'</td>
		       <td>&nbsp;</td>
		       <td>&nbsp;</td>		       
		      </tr>';
		    
               }
              }
			 
			  /*parafiscales*/
			  for ($ln=1;$ln<2;$ln++){
			   if($Navidadnominaliquidaciones->parafiscales[$i][$ln]!=0){
			  
			  $tabla1.='
			  <tr>
		       <td>'.$Navidadnominaliquidaciones->parafiscales[0][$ln].'</td>
		       <td align="center">&nbsp;</td>
		       <td>&nbsp;</td>
			   <td align="right">'.number_format($Navidadnominaliquidaciones->parafiscales[$i][$ln]).'</td>
		       <td>&nbsp;</td>		       
		      </tr>';
			 
               }
              } 
		      
			  for ($c=1;$c<($columnasTblD-1);$c++){
			   if ($tblD[$i][$c]!=0){
			  $tabla1.='
		  	  <tr>
		  	   <td $estilo>'.$tblD[0][$c].'</td>
		  	   <td>&nbsp;</td>
		  	   <td>&nbsp;</td>
			   <td align="right">'.number_format($tblD[$i][$c]).'</td>
			   <td>&nbsp;</td>
		  	  </tr>';
		  	  
               }
              } 
			  $tabla1.='		
	          <tr>
	           <td colspan="2"   style="border-top:1px solid;padding:3px 3px;border-color:#000">TOTALES</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">'.number_format($Navidadnominaliquidaciones->liquidacion[$i][$columnas-1]).'</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">'.number_format(($Navidadnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1])).'</td>
	           <td align="right" style="border-top:1px solid;padding:3px 3px;border-color:#000">'.number_format(($Navidadnominaliquidaciones->liquidacion[$i][$columnas-1])-(($Navidadnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1]))).'</td>
	          </tr>
			  
            </table>
			
	     </td>
      </tr>
	  
     </table>';
	 ?>
	
     <?php 
	 if($sw=='sendmail'){
	  $body = '
      <!DOCTYPE html>
      <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	 
      </head>
       <body> '. $tabla1.'<div><hr></hr></div>'.$tablacorreos.'</body>
      </html>';
   
	  $mail = new PHPMailer();
	  $mail->Host = 'localhost';
	  $mail->Port = 465;
	  //$mail->Host = 'ssl://smtp.gmail.com:465';
	  $mail->Username = "th@uniguajira.edu.co";
	  $mail->Password = "talento";
	  $mail->SMTPAuth = true;
	  $mail->From = "th@uniguajira.edu.co";
	  $mail->FromName = "Universidad de la Guajira - Direccion de Talento Humano";
	  $mail->Subject = "Nomina electronica Uniguajira No ".$Navidadnominaliquidaciones->liquidacion[$i][14].' - '.$Navidadnominaliquidaciones->liquidacion[$i][1].'. Empleado:'.number_format($Mensualnomina->Personageneral->PEGE_IDENTIFICACION);
				
	  $mail->AddAddress($Mensualnomina->Personageneral->PEGE_EMAIL,$Mensualnomina->Personageneral->PEGE_PRIMERNOMBRE.' '.$Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO);
	  $mail -> IsHTML (true);
	  $mail->Timeout=10;
	  $mail->Body = $body;
      $send = $mail->Send(); 
	  if(!$send)
	   {
	    $tabla2.=" 
	    <td>".$Navidadnominaliquidaciones->liquidacion[$i][14]." - ".$Navidadnominaliquidaciones->liquidacion[$i][1]."</td>
	    <td>".$Mensualnomina->Personageneral->PEGE_IDENTIFICACION."</td>
	    <td>".$Mensualnomina->Personageneral->PEGE_EMAIL." </td>
	    <td align='center'>".CHtml::image(Yii::app()->request->baseUrl . '/images/email_error.png')."<br>No enviado</td>
	    <td>".$mail->ErrorInfo."</td>"; 
	   }else{ 
	         $tabla2.=" 
	         <td>".$Navidadnominaliquidaciones->liquidacion[$i][14]." - ".$Navidadnominaliquidaciones->liquidacion[$i][1]."</td>
			 <td>".$Mensualnomina->Personageneral->PEGE_IDENTIFICACION."</td>
	         <td>".$Mensualnomina->Personageneral->PEGE_EMAIL." </td>
	         <td align='center'>".CHtml::image(Yii::app()->request->baseUrl . '/images/email_go.png')."</td>
	         <td align='center'>Mensaje enviado correctamente...</td>"; 
		    }
	 }
	}
    $tabla2.='</tr>';    

	//echo $tabla1.'<div><hr></hr></div>'.$tablacorreos;     
}
$tabla2.='</table>';
echo $tabla2;	
?>	
    </td>
  </tr>

</table>
