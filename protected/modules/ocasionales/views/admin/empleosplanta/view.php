<?php
$this->breadcrumbs=array(
	'Empleosplanta'=>array('index'),
	$model->EMPL_ID,
);

?>

<table width="70%" border="1" align="left" class="" style="white-space-collapse:collapse">
  <tr>
    <td><table width="820" border="0" align="center">
      <tr>
        <td width="60" align="left"><img src="/APP_FONDO/images/user.png" alt="" /></td>
        <td width="498" align="left"><strong style="border-bottom-style:groove">VISUALIZACIÒN DE REGISTROS [ EMPLEOSPLANTA : Detalles ] </strong></td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('empleosplanta/admin',),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('empleosplanta/view','id'=>$model->EMPL_ID),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/edit.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('empleosplanta/update','id'=>$model->EMPL_ID),$htmlOptions ); 
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
		'EMPL_ID',
		'EMPL_FECHAINGRESO',
		'EMPL_CARGO',
		'EMPL_SUELDO',
		'EMPL_PUNTOS',
		'EMPL_DIASAPAGAR',
		'PRTE_ID',
		'GARE_ID',
		'TICA_ID',
		'GRAD_ID',
		'NIVE_ID',
		'UNID_ID',
		'PEGE_ID',
		'EMPL_FECHACAMBIO',
		'EMPL_REGISTRADOPOR',
	),
)); ?>    
    
    </td>
  </tr>
</table>
