<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Nomina Retroactivos Puntos'=>array('admin/retroactivospuntosnomina/admin'),
	'Detalles'
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('retroactivospuntosnominaliquidaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
if($sw==1){
   $img = '/images/icon_download_unidades.png';
   $htmlOption = 'Descargar Archivo Plano Por Unidades';
   $url = array('admin/retroactivospuntosnominaliquidaciones/planoPorUnidades','retroactivoNomina'=>$retroactivoNomina,);
 }elseif($sw==''){
         $img = '/images/icon_download_txt.png';
         $htmlOption = 'Descargar Archivo Plano';
         $url = array('admin/retroactivospuntosnominaliquidaciones/planogeneral',
																	  'retroactivoNomina'=>$retroactivoNomina,
																	  'retroactivoNomina2'=>$retroactivoNomina2,
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
             
			 <td width="60%"><strong><span><em>DETALLES DE LIQUIDACION DE RETROACTIVOS PUNTOS( <?php echo $Periodo; ?> )<br><?php echo $tercero; ?></em></span></strong></td>
			 
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
			 echo CHtml::link($image, array('admin/retroactivospuntosnominaliquidaciones/create',),$htmlOptions ); 
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

$rowsgeneral = count($Retroactivospuntosnominaliquidaciones->retroactivogeneral);
$columnsgeneral = count($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1]);


$tblD = $Retroactivospuntosnominaliquidaciones->descuentos;
$filasTblD = count($tblD);
$columnasTblD = count($tblD[0]);

echo "<div align='right'><strong>Registros encontrados : ".($rowsgeneral-2)."<strong></div>";

for($i=1;$i<$rowsgeneral-1;$i++){

 /*
 echo "N. ".$tblD[$i][0]."<br>";
 for ($c=1;$c<($columnasTblD-1);$c++){
  echo $tblD[0][$c]." ".number_format($tblD[$i][$c])."<br>";
 }
 */
  
$anio=$Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][12];    
$Parametrosglobales = new Parametrosglobales; 	 
$Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
$valorPunto = $Parametrosglobales[1][3];
$Mensualnomina = new Mensualnomina;
$Retroactivospuntosnomina = Retroactivospuntosnomina::model()->findByPk($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][12]);
$Mensualnomina->cargarEmpleoPlanta($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][13]);
$Mensualnomina->valorestablecidos = $Parametrosglobales;
$devengado = $Retroactivospuntosnominaliquidaciones->getUltimosueldo($Mensualnomina,$Retroactivospuntosnomina);
$columnsd = count($devengado);
?>
	<table width="100%" border="1" align="center" class="tabla2" >
        <tr>
         <th colspan="2" align="center">RETROACTIVOS PUNTOS DE EMPLEADOS UNIVERSIDAD DE LA GUAJIRA</th>
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
                <td width="181"><?php echo $Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][12]; ?> - <?php echo $Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][1]; ?></td>
              </tr>
             
			 <tr>
                <td width="87">Periodo Liquidación</td>
                <td width="181"><?php echo $Retroactivospuntosnomina->RPNO_PERIODO; ?></td>
              </tr>
			  
			  <tr>
                <td width="87">Puntos liquidados</td>
                <td width="181"><?php echo $Retroactivospuntosnomina->RPNO_PUNTOS; ?></td>
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
               <td>Puntos Anteriores</td>
               <td><?php echo ($Mensualnomina->Empleoplanta->EMPL_PUNTOS-$Retroactivospuntosnomina->RPNO_PUNTOS); ?></td>
      	      </tr>
			  
			  <tr>
               <td>Puntos Actuales</td>
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
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">RETROACTIVOS</th>
              </tr>
              <tr>
	           <td>SUELDO(<?php echo number_format($Mensualnomina->Empleoplanta->EMPL_SUELDO); ?>)</td>
			   <td align='center'><?php echo $Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][2]; ?></td>
			   <td align='right'><?php echo number_format($devengado[4]); ?></td>
	           <td>&nbsp;</td>
		       <td align='right'><?php echo number_format($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][4]); ?></td>
		      </tr>
			  <?php
			  /* antiguedad, transporte y alimentacion*/
			  for ($ln=5;$ln<11;$ln++){
			   if($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][$ln]!=0){
			  if ($ln==5){
		  		$antig = $Mensualnomina->Personageneral->getAntiguedad($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][12])." A";
		  		}else{
					  $antig = "&nbsp;";
			         }
			  ?>
	          <tr>
		       <td><?php echo $Retroactivospuntosnominaliquidaciones->retroactivogeneral[0][$ln];?> </td>
		       <td align='center'><?php echo $antig; ?></td>
		       <td align='right'><?php echo number_format($devengado[$ln]); ?></td>
		       <td>&nbsp;</td>
		       <td align='right'><?php echo number_format($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][$ln]); ?></td>
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
	           <td align='right' style='border-top:1px solid;padding:3px 3px;border-color:#000'><?php echo number_format($devengado[$columnsd-1]); ?></td>
	           <td align='right' style='border-top:1px solid;padding:3px 3px;border-color:#000'><?php echo number_format(($tblD[$i][$columnasTblD-1])); ?></td>
	           <td align='right' style='border-top:1px solid;padding:3px 3px;border-color:#000'><?php echo number_format(($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][$columnsgeneral-3])-(($tblD[$i][$columnasTblD-1]))); ?></td>
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