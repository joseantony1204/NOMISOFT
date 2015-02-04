<?php
$this->breadcrumbs=array(
	'Retroactivospuntosnominaliquidaciones'=>array('index'),
	$model->RPNL_ID,
);

?>

<table width="70%" border="1" align="left" class="" style="white-space-collapse:collapse">
  <tr>
    <td><table width="820" border="0" align="center">
      <tr>
        <td width="60" align="left"><img src="/APP_FONDO/images/user.png" alt="" /></td>
        <td width="498" align="left"><strong style="border-bottom-style:groove">VISUALIZACIÒN DE REGISTROS [ RETROACTIVOSPUNTOSNOMINALIQUIDACIONES : Detalles ] </strong></td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('retroactivospuntosnominaliquidaciones/admin',),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('retroactivospuntosnominaliquidaciones/view','id'=>$model->RPNL_ID),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/edit.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('retroactivospuntosnominaliquidaciones/update','id'=>$model->RPNL_ID),$htmlOptions ); 
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
		'RPNL_ID',
		'RPNL_CODIGO',
		'RPNL_MESES',
		'RPNL_PUNTOS',
		'RPNL_SUELDO',
		'RPNL_SALARIO',
		'RPNL_PRIMAANTIGUEDAD',
		'RPNL_BONIFICACION',
		'RPNL_PRIMASEMESTRAL',
		'RPNL_PRIMAVACACIONES',
		'RPNL_VACACIONES',
		'RPNL_PRIMANAVIDAD',
		'RPNL_CESANTIAS',
		'RPNO_ID',
		'EMPL_ID',
		'RPNL_FECHACAMBIO',
		'RPNL_REGISTRADOPOR',
	),
)); ?>    
    
    </td>
  </tr>
</table>
