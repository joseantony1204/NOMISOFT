<?php
$this->breadcrumbs=array(
	'Retroactivosnominaliquidaciones'=>array('index'),
	$model->RANL_ID,
);

?>

<table width="70%" border="1" align="left" class="" style="white-space-collapse:collapse">
  <tr>
    <td><table width="820" border="0" align="center">
      <tr>
        <td width="60" align="left"><img src="/APP_FONDO/images/user.png" alt="" /></td>
        <td width="498" align="left"><strong style="border-bottom-style:groove">VISUALIZACIÒN DE REGISTROS [ RETROACTIVOSNOMINALIQUIDACIONES : Detalles ] </strong></td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('retroactivosnominaliquidaciones/admin',),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('retroactivosnominaliquidaciones/view','id'=>$model->RANL_ID),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/edit.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('retroactivosnominaliquidaciones/update','id'=>$model->RANL_ID),$htmlOptions ); 
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
		'RANL_ID',
		'RANL_CODIGO',
		'RANL_DIAS',
		'RANL_SALARIO',
		'RANL_PRIMAANTIGUEDAD',
		'RANL_TRANSPORTE',
		'RANL_ALIMENTACION',
		'RANL_HEDTOTAL',
		'RANL_HENTOTAL',
		'RANL_HEDFTOTAL',
		'RANL_HENFTOTAL',
		'RANL_DYFTOTAL',
		'RANL_RENTOTAL',
		'RANL_RENDYFTOTAL',
		'RANL_PRIMATECNICA',
		'RANL_GASTOSRP',
		'RANL_BONIFICACION',
		'RANL_PRIMAVACACIONES',
		'RANO_ID',
		'MENL_ID',
		'RANL_FECHACAMBIO',
		'RANL_REGISTRADOPOR',
	),
)); ?>    
    
    </td>
  </tr>
</table>
