<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Prima Semestral'=>array('admin/semestralnomina/admin'),
	'Detalles'
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('semestralnominaliquidaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
if($sw==1){
   $img = '/images/icon_download_unidades.png';
   $htmlOption = 'Descargar Archivo Plano Por Unidades';
   $url = array('admin/semestralnominaliquidaciones/planoporunidades','semestralNomina'=>$semestralNomina,);
 }elseif($sw==''){
         $img = '/images/icon_download_txt.png';
         $htmlOption = 'Descargar Archivo Plano';
         $url = array('admin/semestralnominaliquidaciones/planogeneral',
																	  'semestralNomina'=>$semestralNomina,
																	  'semestralNomina2'=>$semestralNomina2,
																	  'personaGral'=>$personaGral,
																	  'unidad'=>$unidad,
																	  'tipoEmpleo'=>$tipoEmpleo,
			         );
 }
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
             
			 <td width="60%"><strong><span><em>DETALLES DE LIQUIDACION DE PRIMA SEMESTRAL ( <?php echo $Periodo; ?> )<br><?php echo $tercero; ?></em></span></strong></td>
			 
			 <td width="10%" align="center">
			 <?php	 
			 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
			 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
			 $image = CHtml::image($imageUrl);
		     echo CHtml::link($image, Yii::app()->request->urlReferrer, $htmlOptions ); 
             ?>           
             </td>
			 
			 <td width="10%" align="center">
			 <?php	 
			 $imageUrl = Yii::app()->request->baseUrl .$img;
			 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' =>$htmlOption);
			 $image = CHtml::image($imageUrl);
		     echo CHtml::link($image, $url, $htmlOptions); 
             ?>           
             </td>
			 
			 <td width="10%" align="center">
			 <?php				 
			 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_pdf.png';
			 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Descargar Formato PDF');
			 $image = CHtml::image($imageUrl);
			 echo CHtml::link($image, array('admin/semestralnominaliquidaciones/create',),$htmlOptions ); 
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

$filas = count($Semestralnominaliquidaciones->liquidacion);
$columnas = count($Semestralnominaliquidaciones->liquidacion[$filas-1]);
$parafisales = count($Semestralnominaliquidaciones->parafiscales[0]);

$tblD = $Semestralnominaliquidaciones->descuentos;
$filasTblD = count($tblD);
$columnasTblD = count($tblD[0]);

echo "<div align='right'><strong>Registros encontrados : ".($filas-2)."<strong></div>";

for($i=1;$i<$filas-1;$i++){

 /*
 echo "N. ".$tblD[$i][0]."<br>";
 for ($c=1;$c<($columnasTblD-1);$c++){
  echo $tblD[0][$c]." ".number_format($tblD[$i][$c])."<br>";
 }
 */

$anio=substr($Semestralnominaliquidaciones->liquidacion[$i][11],0,4);    
$Parametrosglobales = new Parametrosglobales; 	 
$Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
$valorPunto = $Parametrosglobales[1][3];
$Semestralnomina = Semestralnomina::model()->findByPk($Semestralnominaliquidaciones->liquidacion[$i][11]);
$Mensualnomina = new Mensualnomina;
$Mensualnomina->cargarEmpleoPlanta($Semestralnominaliquidaciones->liquidacion[$i][12]);
?>
	<table width="100%" border="1" align="center" class="tabla2" >
        <tr>
         <th colspan="2" align="center">PRIMA SEMESTRAL DE EMPLEADOS UNIVERSIDAD DE LA GUAJIRA</th>
        </tr>
        <tr>
         <th align="center" style="border:1px solid;padding:3px 3px; border-color:#000">INFORMACION BASICA</th>
         <th align="center" style="border:1px solid;padding:3px 3px; border-color:#000">DETALLE DE LA NOMINA</th>
        </tr>
		
        <tr valign="top">
         <td width="45%">
			
			<table width="100%" border="1" class="tabla2">
              
			  <tr>
                <td width="87">Comprobante No.</td>
                <td width="181"><?php echo $Semestralnominaliquidaciones->liquidacion[$i][11]; ?> - <?php echo $Semestralnominaliquidaciones->liquidacion[$i][1]; ?></td>
              </tr>
             
			 <tr>
                <td width="87">Periodo Liquidación</td>
                <td width="181"><?php echo $Semestralnomina->SENO_PERIODO; ?></td>
              </tr>
             
			 <tr>
                <td width="87">No. Identificación</td>
                <td width="181"><?php echo number_format($Mensualnomina->Personageneral->PEGE_IDENTIFICACION); ?></td>
              </tr>
             
			 <tr>
                <td>Nombre Completo</td>
                <td><?php echo $Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO; ?> <?php echo $Mensualnomina->Personageneral->PEGE_SEGUNDOAPELLIDOS; ?> <?php echo $Mensualnomina->Personageneral->PEGE_PRIMERNOMBRE; ?> <?php echo $Mensualnomina->Personageneral->PEGE_SEGUNDONOMBRE; ?></td>
              </tr>
              
			  <tr>
                <td>Tipo Empleado</td>
                <td><?php echo $Mensualnomina->Tipocargo->TICA_NOMBRE; ?></td>
              </tr>
              
			  <tr>
                <td>Cargo</td>
                <td><?php echo $Mensualnomina->Empleoplanta->EMPL_CARGO;?></td>
              </tr>
			  <?php
              if($Mensualnomina->Tipocargo->TICA_ID==2){
			  ?>
			  <tr>
               <td>Puntos</td>
               <td><?php echo $Mensualnomina->Empleoplanta->EMPL_PUNTOS; ?></td>
      	      </tr>
		      
			  <tr>
               <td>Valor Punto</td>
               <td><?php echo $valorPunto; ?> </td>
      	      </tr>
			  <?php
              }
			  ?>
              <tr>
                <td>Unidad</td>
                <td><?php echo $Mensualnomina->Unidad->UNID_ID; ?> -> <?php echo $Mensualnomina->Unidad->UNID_NOMBRE; ?></td>
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
	           <td>SUELDO(<?php echo number_format($Mensualnomina->Empleoplanta->EMPL_SUELDO); ?>)</td>
			   <td align='center'><?php echo $Semestralnominaliquidaciones->liquidacion[$i][2]; ?></td>
			   <td align='right'><?php echo number_format($Semestralnominaliquidaciones->liquidacion[$i][4]); ?></td>
	           <td>&nbsp;</td>
	           <td>&nbsp;</td>
		      </tr>
			  <?php
			  /* antiguedad, transporte y alimentacion*/
			  for ($ln=5;$ln<11;$ln++){
			   if($Semestralnominaliquidaciones->liquidacion[$i][$ln]!=0){
			  if ($ln==5){
		  		$antig = $Mensualnomina->Personageneral->getAntiguedad($Semestralnominaliquidaciones->liquidacion[$i][11])." A";
		  		}else{
					  $antig = "&nbsp;";
			         }
			  ?>
	          <tr>
		       <td><?php echo $Semestralnominaliquidaciones->liquidacion[0][$ln];?> </td>
		       <td align='center'><?php echo $antig; ?></td>
		       <td align='right'><?php echo number_format($Semestralnominaliquidaciones->liquidacion[$i][$ln]); ?></td>
		       <td>&nbsp;</td>
		       <td>&nbsp;</td>
		      </tr>
		     <?php
               }
              }
			  ?>
			  
			  <?php
			  /*parafiscales parte 2*/
			  for ($ln=1;$ln<2;$ln++){
			   if($Semestralnominaliquidaciones->parafiscales[$i][$ln]!=0){
			  ?>
			  <tr>
		       <td><?php echo $Semestralnominaliquidaciones->parafiscales[0][$ln];?></td>
		       <td>&nbsp;</td>
		       <td>&nbsp;</td>
		       <td align='right'><?php echo number_format($Semestralnominaliquidaciones->parafiscales[$i][$ln]); ?></td>
		       <td>&nbsp;</td>
		      </tr>
			  <?php
               }
              }
			  ?>
					  
		      <?php
			  for ($c=1;$c<($columnasTblD-1);$c++){
			   if ($tblD[$i][$c]!=0){
			  ?> 
		  	  <tr>
		  	   <td $estilo><?php echo $tblD[0][$c]; ?></td>
		  	   <td>&nbsp;</td>
		  	   <td>&nbsp;</td>
			   <td align='right'><?php echo number_format($tblD[$i][$c]); ?></td>
			   <td>&nbsp;</td>
		  	  </tr>
		  	  <?php
               }
              } 
			  ?>		
	          <tr>
	           <td colspan='2' style='border-top:1px solid;padding:3px 3px;border-color:#000'>TOTALES</td>
	           <td align='right' style='border-top:1px solid;padding:3px 3px;border-color:#000'><?php echo number_format($Semestralnominaliquidaciones->liquidacion[$i][$columnas-1]); ?></td>
	           <td align='right' style='border-top:1px solid;padding:3px 3px;border-color:#000'><?php echo number_format(($Semestralnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1])); ?></td>
	           <td align='right' style='border-top:1px solid;padding:3px 3px;border-color:#000'><?php echo number_format(($Semestralnominaliquidaciones->liquidacion[$i][$columnas-1])-(($Semestralnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1]))); ?></td>
	          </tr>
			  
            </table>
			
	     </td>
      </tr>
	  
    </table>
	
  <div><hr></hr></div>
<?php 
	}

?>	
    </td>
  </tr>

</table>