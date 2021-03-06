<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Cesantias'=>array('admin/cesantiasnomina/admin'),
	'Detalles'
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cesantiasnominaliquidaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
if($sw==1){
   $img = '/images/icon_download_unidades.png';
   $htmlOption = 'Descargar Archivo Plano Por Unidades';
   $url = array('admin/cesantiasnominaliquidaciones/planoporunidades','cesantiasNomina'=>$cesantiasNomina,);
 }elseif($sw==''){
         $img = '/images/icon_download_txt.png';
         $htmlOption = 'Descargar Archivo Plano';
         $url = array('admin/cesantiasnominaliquidaciones/planogeneral',
																	  'cesantiasNomina'=>$cesantiasNomina,
																	  'cesantiasNomina2'=>$cesantiasNomina2,
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
             
			 <td width="60%"><strong><span><em>DETALLES DE LIQUIDACION NOMINA DE CESANTIAS ( <?php echo $Periodo; ?> )<br><?php echo $tercero; ?></em></span></strong></td>
			 
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
			 echo CHtml::link($image, array('admin/cesantiasnominaliquidaciones/create',),$htmlOptions ); 
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

$filas = count($Cesantiasnominaliquidaciones->liquidacion);
$columnas = count($Cesantiasnominaliquidaciones->liquidacion[1]);

echo "<div align='right'><strong>Registros encontrados : ".($filas-2)."<strong></div>";

for($i=1;$i<$filas-1;$i++){


$anio=substr($Cesantiasnominaliquidaciones->liquidacion[$i][16],0,4);    
$Parametrosglobales = new Parametrosglobales; 	 
$Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
$valorPunto = $Parametrosglobales[1][3];
$Cesantiasnomina = Cesantiasnomina::model()->findByPk($Cesantiasnominaliquidaciones->liquidacion[$i][16]);
$Mensualnomina = new Mensualnomina;
$Mensualnomina->cargarEmpleoPlanta($Cesantiasnominaliquidaciones->liquidacion[$i][17]);
?>
	<table width="100%" border="1" align="center" class="tabla2" >
        <tr>
         <th colspan="2" align="center">CESANTIAS DE EMPLEADOS UNIVERSIDAD DE LA GUAJIRA</th>
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
                <td width="181"><?php echo $Cesantiasnominaliquidaciones->liquidacion[$i][16]; ?> - <?php echo $Cesantiasnominaliquidaciones->liquidacion[$i][1]; ?></td>
              </tr>
             
			 <tr>
                <td width="87">Periodo Liquidación</td>
                <td width="181"><?php echo $Cesantiasnomina->CENO_PERIODO; ?></td>
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
               <th width="66" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">DIAS</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">DEVENGADOS</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">NETO</th>
              </tr>
              <tr>
	           <td>SUELDO(<?php echo number_format($Cesantiasnominaliquidaciones->liquidacion[$i][4]); ?>)</td>
			   <td align='center'><?php echo $Cesantiasnominaliquidaciones->liquidacion[$i][2]; ?></td>
			   <td align='right'><?php echo number_format($Cesantiasnominaliquidaciones->liquidacion[$i][5]); ?></td>
	           <td>&nbsp;</td>
		      </tr>
			  <?php
			  for ($ln=6;$ln<16;$ln++){
			   if($Cesantiasnominaliquidaciones->liquidacion[$i][$ln]!=0){
			  if ($ln==6){
		  		$antig = $Mensualnomina->Personageneral->getAntiguedad($Cesantiasnominaliquidaciones->liquidacion[$i][16])." A";
		  		}else{
					  $antig = "&nbsp;";
			         }
			  ?>
	          <tr>
		       <td><?php echo $Cesantiasnominaliquidaciones->liquidacion[0][$ln];?> </td>
		       <td align='center'><?php echo $antig; ?></td>
		       <td align='right'><?php echo number_format($Cesantiasnominaliquidaciones->liquidacion[$i][$ln]); ?></td>
		       <td>&nbsp;</td>
		      </tr>
		     <?php
               }
              }
			  ?>
					  		
	          <tr>
	           <td colspan='2' style='border-top:1px solid;padding:3px 3px;border-color:#000'>TOTALES</td>
	           <td align='right' style='border-top:1px solid;padding:3px 3px;border-color:#000'><?php echo number_format($Cesantiasnominaliquidaciones->liquidacion[$i][$columnas-1]); ?></td>
	           <td align='right' style='border-top:1px solid;padding:3px 3px;border-color:#000'><?php echo number_format(($Cesantiasnominaliquidaciones->liquidacion[$i][$columnas-1])); ?></td>
			  </tr>
	  
			  <tr>
	           <td colspan='3' style='border-top:1px solid;padding:3px 3px;border-color:#000'><strong>INTERESES (12%)</strong></td>
	           <td align='right' style='border-top:1px solid;padding:3px 3px;border-color:#000'><strong><?php echo number_format(($Cesantiasnominaliquidaciones->liquidacion[$i][$columnas-1])*(0.12)); ?></strong></td>
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