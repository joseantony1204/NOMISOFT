<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Nomina Mensual'=>array('admin/mensualnomina/admin'),
	'Busqueda'=>array('admin/mensualnomina/search'),
	'Reporte terceros (salud)',
);

/*
$this->menu=array(
	array('label'=>'List Mensualnomina','url'=>array('index')),
	array('label'=>'Create Mensualnomina','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mensualnomina-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<table width="100%" border="0" align="center">
  <tr>
   <td>
	<table width="100%" border="0" align="center">
     <tr>
      <td>
       <fieldset>
        <table width="100%" border="0" align="center">
            <tr>
             <td width="6%" align="center">
					  <?php 			 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/user.png';
					  echo $image = CHtml::image($imageUrl); 
					  ?>         
					               
             </td>
             <td width="84%"><strong><span><em>ADMINISTRACION DE NOMINA MENSUAL - REPORTE TERCEROS : ( <?php echo $Periodo; ?> )<br><?php echo $tercero; ?></em></span></strong></td>
			 <td width="10%" align="center">
					 <?php
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, Yii::app()->request->urlReferrer,$htmlOptions ); 
?>         
		     </td>
             <td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_txt.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Reporte Liquidacionde Salud');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/mensualnominaliquidaciones/downsalud',
																	  'mensualNomina'=>$mensualNomina,
																	  'mensualNomina2'=>$mensualNomina2,
																	  'personaGral'=>$personaGral,
																	  'unidad'=>$unidad,
																	  'tipoEmpleo'=>$tipoEmpleo,
																	  'idSalud'=>$idSalud,
												    ),
												    $htmlOptions
									); 
?>          </td>
           </tr>
        </table>
       </fieldset>
      </td>
     </tr>
    </table></td>
  </tr>
  <tr>
    <td>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'mensualnomina-grid',
	'dataProvider'=>$Mensualnominaliquidaciones->prestacionesDataProvider,
	'type'=>'striped bordered condensed',
    'filter' => null,
	'enableSorting'=>false,
	'columns'=>array(
		 array(
            'header' => 'IDENTIFICACION',
            'type' => 'number',
            'name' => 'PEGE_IDENTIFICACION',
			'htmlOptions'=>array(
			                       'style'=>'text-align: right','width'=>'100',
								),   
         ),
		 
		 array(
            'header' => 'APELLIDO',
            'name' => 'PEGE_PRIMERAPELLIDO',
         ),
		 
		 array(
            'header' => 'SEG. APELLIDO',
            'name' => 'PEGE_SEGUNDOAPELLIDOS',
         ),
		 
		 array(
            'header' => 'NOMBRE',
            'name' => 'PEGE_PRIMERNOMBRE',
         ),
		 
		 array(
            'header' => 'SEG. NOMBRE',
            'name' => 'PEGE_SEGUNDONOMBRE',
         ),
		 
		 array(
            'header' => 'E.P.S',
            'name' => 'SALU_NOMBRE',
         ),
		 
		 array(
            'header' => 'I.B.C',
			'type' => 'number',
            'name' => 'MENL_IBC',
			'htmlOptions'=>array(
			                       'style'=>'text-align: right','width'=>'100',
								),
			),
		 
		 array(
            'header' => 'TOTAL SALUD',
            'type' => 'number',
			'name' => 'MENP_SALUDTOTAL',			
			'htmlOptions'=>array(
			                       'style'=>'text-align: right','width'=>'120',
								),
			),					
		 
		 
	),
	
   )
  );  
?>

    </td>
  </tr>
</table>
