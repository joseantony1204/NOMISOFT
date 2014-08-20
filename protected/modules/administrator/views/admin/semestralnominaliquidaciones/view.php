<?php
$this->breadcrumbs=array(
	'Semestralnominaliquidaciones'=>array('index'),
	$model->SENL_ID,
);

?>

<table width="70%" border="1" align="left" class="" style="white-space-collapse:collapse">
  <tr>
    <td><table width="820" border="0" align="center">
      <tr>
        <td width="60" align="left"><img src="/APP_FONDO/images/user.png" alt="" /></td>
        <td width="498" align="left"><strong style="border-bottom-style:groove">VISUALIZACIÒN DE REGISTROS [ SEMESTRALNOMINALIQUIDACIONES : Detalles ] </strong></td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('semestralnominaliquidaciones/admin',),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('semestralnominaliquidaciones/view','id'=>$model->SENL_ID),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/edit.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('semestralnominaliquidaciones/update','id'=>$model->SENL_ID),$htmlOptions ); 
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
		'SENL_ID',
		'SENL_CODIGO',
		'SENL_DIAS',
		'SENL_PUNTOS',
		'SENL_SALARIO',
		'SENL_PRIMAANTIGUEDAD',
		'SENL_TRANSPORTE',
		'SENL_ALIMENTACION',
		'SENL_PRIMATECNICA',
		'SENL_GASTOSRP',
		'SENL_BONIFICACION',
		'SENL_RETEFUENTE',
		'SENO_ID',
		'EMPL_ID',
		'SENL_FECHACAMBIO',
		'SENL_REGISTRADOPOR',
	),
)); ?>    
    
    </td>
  </tr>
</table>
