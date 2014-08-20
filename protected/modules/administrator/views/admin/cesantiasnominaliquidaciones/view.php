<?php
$this->breadcrumbs=array(
	'Cesantiasnominaliquidaciones'=>array('index'),
	$model->CENL_ID,
);

?>

<table width="70%" border="1" align="left" class="" style="white-space-collapse:collapse">
  <tr>
    <td><table width="820" border="0" align="center">
      <tr>
        <td width="60" align="left"><img src="/APP_FONDO/images/user.png" alt="" /></td>
        <td width="498" align="left"><strong style="border-bottom-style:groove">VISUALIZACIÒN DE REGISTROS [ CESANTIASNOMINALIQUIDACIONES : Detalles ] </strong></td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('cesantiasnominaliquidaciones/admin',),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('cesantiasnominaliquidaciones/view','id'=>$model->CENL_ID),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/edit.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('cesantiasnominaliquidaciones/update','id'=>$model->CENL_ID),$htmlOptions ); 
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
		'CENL_ID',
		'CENL_CODIGO',
		'CENL_DIAS',
		'CENL_PUNTOS',
		'CENL_SUELDO',
		'CENL_SALARIO',
		'CENL_PRIMAANTIGUEDAD',
		'CENL_TRANSPORTE',
		'CENL_ALIMENTACION',
		'CENL_PRIMATECNICA',
		'CENL_GASTOSRP',
		'CENL_BONIFICACION',
		'CENL_HORASEXTRAS',
		'CENL_SEMESTRAL',
		'CENL_PRIMAVACACIONES',
		'CENL_PRIMANAVIDAD',
		'CENO_ID',
		'EMPL_ID',
		'CENL_FECHACAMBIO',
		'CENL_REGISTRADOPOR',
	),
)); ?>    
    
    </td>
  </tr>
</table>
