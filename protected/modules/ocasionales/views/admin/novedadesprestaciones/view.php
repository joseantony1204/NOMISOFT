<?php
$this->breadcrumbs=array(
	'Novedadesprestaciones'=>array('index'),
	$model->NOPR_ID,
);

?>

<table width="70%" border="1" align="left" class="" style="white-space-collapse:collapse">
  <tr>
    <td><table width="820" border="0" align="center">
      <tr>
        <td width="60" align="left"><img src="/APP_FONDO/images/user.png" alt="" /></td>
        <td width="498" align="left"><strong style="border-bottom-style:groove">VISUALIZACIÒN DE REGISTROS [ NOVEDADESPRESTACIONES : Detalles ] </strong></td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('novedadesprestaciones/admin',),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('novedadesprestaciones/view','id'=>$model->NOPR_ID),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/edit.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('novedadesprestaciones/update','id'=>$model->NOPR_ID),$htmlOptions ); 
?>         
		 </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'NOPR_ID',
		'NOPR_VALOR',
		'DEPR_ID',
		'PEGE_ID',
		'NOPR_FECHACAMBIO',
		'NOPR_REGISTRADOPOR',
	),
)); ?>    
    
    </td>
  </tr>
</table>
