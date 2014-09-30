<?php
$this->breadcrumbs=array(
	'Mensualnominaliquidaciones'=>array('index'),
	$model->MENL_ID,
);

?>

<table width="70%" border="1" align="left" class="" style="white-space-collapse:collapse">
  <tr>
    <td><table width="820" border="0" align="center">
      <tr>
        <td width="60" align="left"><img src="/APP_FONDO/images/user.png" alt="" /></td>
        <td width="498" align="left"><strong style="border-bottom-style:groove">VISUALIZACIÒN DE REGISTROS [ MENSUALNOMINALIQUIDACIONES : Detalles ] </strong></td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('mensualnominaliquidaciones/admin',),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('mensualnominaliquidaciones/view','id'=>$model->MENL_ID),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/edit.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('mensualnominaliquidaciones/update','id'=>$model->MENL_ID),$htmlOptions ); 
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
		'MENL_ID',
		'MENL_CODIGO',
		'MENL_DIAS',
		'MENL_PUNTOS',
		'MENL_SALARIO',
		'MENL_PRIMAANTIGUEDAD',
		'MENL_TRANSPORTE',
		'MENL_ALIMENTACION',
		'MENL_HED',
		'MENL_HEDTOTAL',
		'MENL_HEN',
		'MENL_HENTOTAL',
		'MENL_HEDF',
		'MENL_HEDFTOTAL',
		'MENL_HENF',
		'MENL_HENFTOTAL',
		'MENL_DYF',
		'MENL_DYFTOTAL',
		'MENL_REN',
		'MENL_RENTOTAL',
		'MENL_RENDYF',
		'MENL_RENDYFTOTAL',
		'MENL_PRIMATECNICA',
		'MENL_GASTOSRP',
		'MENL_BONIFICACION',
		'MENL_PRIMAVACACIONES',
		'MENO_ID',
		'EMPL_ID',
		'MENL_FECHACAMBIO',
		'MENL_REGISTRADOPOR',
	),
)); ?>    
    
    </td>
  </tr>
</table>
