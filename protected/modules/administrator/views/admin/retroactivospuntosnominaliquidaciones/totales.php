<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Nomina Retroactivos Puntos'=>array('admin/retroactivospuntosnomina/admin'),
	'Totales',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('retroactivospuntosnomina-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$Retroactivospuntosnomina = Retroactivospuntosnomina::model()->findByPk($Retroactivospuntosnominaliquidaciones->RPNO_ID);
$Unidades = $Retroactivospuntosnominaliquidaciones->unidadesRetroactivo();
?>

<table width="100%" border="0" align="center">
  <tr>
   <td>
	<table width="100%" border="0" align="center">
     <tr>
      <td>
       <fieldset>
	    <table width="100%" border="0">
		  <tr>
			<td rowspan="2" width="6%" align="center" valign="middle">
			  <?php 			 
			  $imageUrl = Yii::app()->request->baseUrl . '/images/user.png';
			  echo $image = CHtml::image($imageUrl); 
			  ?>
			</td>
			<td width="54" valign="middle" ><br><strong><span><em>TOTALES NOMINA RETROACTIVOS PUNTOS ( <?php echo $Retroactivospuntosnomina->RPNO_PERIODO; ?> )</em></span></strong></td>
			
			<td rowspan="2" width="9%" align="center" valign="middle">
			<?php
			$imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
			$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
			$image = CHtml::image($imageUrl);
			echo CHtml::link($image, array('admin/retroactivospuntosnomina/admin',),$htmlOptions ); 
			?>         
			</td>
			
			<td rowspan="2" width="9%" align="center" valign="middle">
			<?php
			$imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
			$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
			$image = CHtml::image($imageUrl);
			echo CHtml::link($image, array('admin/retroactivospuntosnominaliquidaciones/totales','retroactivoNomina'=>$Retroactivospuntosnominaliquidaciones->RPNO_ID),$htmlOptions ); 
			?>         
			</td>
			
			<td rowspan="2" width="9%" align="center" valign="middle">
			<?php
			$imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_excel.png';
			$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Descargar Reporte de Pago De La Unidad');
			$image = CHtml::image($imageUrl);
			echo CHtml::link($image, array('admin/retroactivospuntosnominaliquidaciones/pago',
			                                                               'retroactivoNomina'=>$Retroactivospuntosnominaliquidaciones->RPNO_ID,
			                                                               'unidad'=>$Retroactivospuntosnominaliquidaciones->UNID_ID,
										  ),
							 $htmlOptions 
							);
			?>         
			</td>
			
			<td rowspan="2" width="9%" align="center" valign="middle">
			<?php
			$imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_unidades.png';
			$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Peporte De Archivo Plano Por Unidades');
			$image = CHtml::image($imageUrl);
			echo CHtml::link($image, array('admin/retroactivospuntosnominaliquidaciones/download',
			                                                               'retroactivoNomina'=>$Retroactivospuntosnominaliquidaciones->RPNO_ID,			                                                               
										  ),
							 $htmlOptions 
							);
			?>         
			</td>
			
			<td rowspan="2" width="9%" align="center" valign="middle">
			<?php
			$imageUrl = Yii::app()->request->baseUrl . '/images/icon_send_mail.png';
			$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Enviar Nomina por Correo Electronico');
			$image = CHtml::image($imageUrl);
			echo CHtml::link($image, array('admin/retroactivospuntosnominaliquidaciones/mail',
			                                                               'retroactivoNomina'=>$Retroactivospuntosnominaliquidaciones->RPNO_ID,
			                                                               'unidad'=>$Retroactivospuntosnominaliquidaciones->UNID_ID,
										  ),
							 $htmlOptions 
							);
			?>         
			</td>
		  </tr>
		  <tr>
			<td align="left" valign="middle">
			<form action="" method="POST">
			 <strong>UNIDAD: </strong>
			  <select name='cbounidad' id='cbounidad' onchange='this.form.submit();' class="span4">
	            <?php
			    foreach($Unidades as $Unidad)
	            {
		         echo "<option value='".$Unidad["UNID_ID"]."'"; 
		         if (!(strcmp($Unidad["UNID_ID"], $_POST['cbounidad']))) {echo "SELECTED";} echo">".$Unidad["UNID_NOMBRE"]."</option>";
	            }
	            ?> 
	          </select>
			</form>
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
<?php  $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'retroactivospuntosnominaliquidaciones-grid',
	'dataProvider'=>$Retroactivospuntosnominaliquidaciones->totales(),
	'type'=>'striped bordered condensed',
    'filter'=>$Retroactivospuntosnominaliquidaciones,
	'columns'=>array(
	
		array('name'=>'PEGE_IDENTIFICACION',  'value'=>'$data->PEGE_IDENTIFICACION', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'PEGE_PRIMERAPELLIDO',  'value'=>'$data->PEGE_PRIMERAPELLIDO', 'htmlOptions'=>array('width'=>'100',),),
		array('name'=>'PEGE_PRIMERNOMBRE',  'value'=>'$data->PEGE_PRIMERNOMBRE', 'htmlOptions'=>array('width'=>'100',),),
		array('name'=>'EMPL_CARGO', 'filter'=>false, 'value'=>'$data->EMPL_CARGO', 'htmlOptions'=>array('width'=>'210',),),
		array('name'=>'EMPL_SUELDO',  'filter'=>false, 'type'=>'number', 'value'=>'$data->EMPL_SUELDO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'RPNL_MESES',  'filter'=>false, 'value'=>'$data->RPNL_MESES', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: center',),),
		array('name'=>'RPNL_DEVENGADO',  'filter'=>false, 'type'=>'number', 'value'=>'$data->RPNL_DEVENGADO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'RPNL_DESCUENTOS',  'filter'=>false, 'type'=>'number', 'value'=>'$data->RPNL_DESCUENTOS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'RPNL_TOTALGRAL', 'filter'=>false, 'type'=>'number', 'value'=>'(($data->RPNL_DEVENGADO)-($data->RPNL_DESCUENTOS))', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
	    array( 
			  'name'=>'DETALLES',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->detalles),array("admin/retroactivospuntosnominaliquidaciones/detalles",
			                                                           "retroactivoNomina"=>'.$Retroactivospuntosnomina->RPNO_ID.',
			                                                           "personaGral"=>trim($data[PEGE_IDENTIFICACION]),))',
			  'htmlOptions'=>array('style'=>'text-align: center',
			                       'width'=>'5',
								   'title' => 'Detalles' , 
								   'alt' => 'Detalles'), 
			  ),
	
	),
)); ?>

    </td>
  </tr>
</table>
