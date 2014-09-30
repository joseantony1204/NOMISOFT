<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Vacaciones'=>array('admin/vacacionesnomina/admin'),
	'Busqueda'=>array('admin/vacacionesnomina/search'),
	'Reporte terceros (descuento)',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('vacacionesnomina-grid', {
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
             <td width="84%"><strong><span><em>ADMINISTRACION DE VACACIONES - REPORTE TERCEROS : ( <?php echo $Periodo; ?> )<br><?php echo $tercero; ?></em></span></strong></td>
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
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Reporte Liquidacion de Descuentos');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/vacacionesnominaliquidaciones/downdescuento',					                                           
																	  'vacacionesNomina'=>$vacacionesNomina,
																	  'vacacionesNomina2'=>$vacacionesNomina2,
																	  'personaGral'=>$personaGral,
																	  'unidad'=>$unidad,
																	  'tipoEmpleo'=>$tipoEmpleo,
																	  'idDescuento'=>$idDescuento,
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
	'id'=>'vacacionesnomina-grid',
	'dataProvider'=>$Vacacionesnominaliquidaciones->prestacionesDataProvider,
	'type'=>'striped bordered condensed',
    'filter' => null,
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
            'header' => 'DESCUENTO',
            'name' => 'DEPR_DESCRIPCION',
         ),
		 
		 array(
            'header' => 'TOTAL',
            'type' => 'number',
			'name' => 'VAND_VALOR',			
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
