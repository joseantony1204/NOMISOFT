<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Nomina Retroactivos'=>array('admin/retroactivosnomina/admin'),
	'Totales',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mensualnominaliquidaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$Retroactivosnomina = Retroactivosnomina::model()->findByPk($Retroactivosnominaliquidaciones->RANO_ID);
$Unidades = $Retroactivosnominaliquidaciones->unidadesRetroactivo();
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
			<td width="54" valign="middle" ><br><strong><span><em>TOTALES DE LIQUIDACION NOMINA RETROACTIVOS ( <?php echo $Retroactivosnomina->RANO_PERIODO; ?> )</em></span></strong></td>
			
			<td rowspan="2" width="9%" align="center" valign="middle">
			<?php
			$imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
			$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
			$image = CHtml::image($imageUrl);
			echo CHtml::link($image, array('admin/retroactivosnomina/admin',),$htmlOptions ); 
			?>         
			</td>
			
			<td rowspan="2" width="9%" align="center" valign="middle">
			<?php
			$imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
			$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
			$image = CHtml::image($imageUrl);
			echo CHtml::link($image, array('admin/retroactivosnominaliquidaciones/totales','retroactivoNomina'=>$Retroactivosnominaliquidaciones->RANO_ID),$htmlOptions ); 
			?>         
			</td>
			
			<td rowspan="2" width="9%" align="center" valign="middle">
			<?php
			$imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_excel.png';
			$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Descargar Reporte de Pago De La Unidad');
			$image = CHtml::image($imageUrl);
			echo CHtml::link($image, array('admin/retroactivosnominaliquidaciones/pago',
			                                                               'retroactivoNomina'=>$Retroactivosnominaliquidaciones->RANO_ID,
			                                                               'unidad'=>$Retroactivosnominaliquidaciones->UNID_ID,
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
			echo CHtml::link($image, array('admin/retroactivosnominaliquidaciones/download',
			                                                               'retroactivoNomina'=>$Retroactivosnominaliquidaciones->RANO_ID,			                                                               
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
			echo CHtml::link($image, array('admin/retroactivosnominaliquidaciones/mail',
			                                                               'retroactivoNomina'=>$Retroactivosnominaliquidaciones->RANO_ID,
			                                                               'unidad'=>$Retroactivosnominaliquidaciones->UNID_ID,
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
	'id'=>'retroactivosnominaliquidaciones-grid',
	'dataProvider'=>$Retroactivosnominaliquidaciones->totales(),
	'type'=>'striped bordered condensed',
    'filter'=>$Retroactivosnominaliquidaciones,
	'columns'=>array(
	
		array('name'=>'PEGE_IDENTIFICACION',  'value'=>'$data->PEGE_IDENTIFICACION', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'PEGE_PRIMERAPELLIDO',  'value'=>'$data->PEGE_PRIMERAPELLIDO', 'htmlOptions'=>array('width'=>'100',),),
		array('name'=>'PEGE_PRIMERNOMBRE',  'value'=>'$data->PEGE_PRIMERNOMBRE', 'htmlOptions'=>array('width'=>'100',),),
		array('name'=>'EMPL_CARGO', 'filter'=>false, 'value'=>'$data->EMPL_CARGO', 'htmlOptions'=>array('width'=>'210',),),
		array('name'=>'EMPL_SUELDO',  'filter'=>false, 'type'=>'number', 'value'=>'$data->EMPL_SUELDO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'RANL_DIAS',  'filter'=>false, 'value'=>'$data->RANL_DIAS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: center',),),
		array('name'=>'RANL_DEVENGADO',  'filter'=>false, 'type'=>'number', 'value'=>'$data->RANL_DEVENGADO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'RANL_DESCUENTOS',  'filter'=>false, 'type'=>'number', 'value'=>'$data->RANL_DESCUENTOS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'RANL_TOTALGRAL', 'filter'=>false, 'type'=>'number', 'value'=>'($data->RANL_DEVENGADO -($data->RANL_DESCUENTOS))', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
	    array( 
			  'name'=>'DETALLES',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->detalles),array("admin/retroactivosnominaliquidaciones/detalles",
			                                                           "retroactivoNomina"=>'.$Retroactivosnomina->RANO_ID.',
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
