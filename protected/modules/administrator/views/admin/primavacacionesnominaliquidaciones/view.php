<?php
$this->breadcrumbs=array(
	'Primavacacionesnominaliquidaciones'=>array('index'),
	$model->PVNL_ID,
);

?>

<table width="70%" border="1" align="left" class="" style="white-space-collapse:collapse">
  <tr>
    <td><table width="820" border="0" align="center">
      <tr>
        <td width="60" align="left"><img src="/APP_FONDO/images/user.png" alt="" /></td>
        <td width="498" align="left"><strong style="border-bottom-style:groove">VISUALIZACIÒN DE REGISTROS [ PRIMAVACACIONESNOMINALIQUIDACIONES : Detalles ] </strong></td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('primavacacionesnominaliquidaciones/admin',),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('primavacacionesnominaliquidaciones/view','id'=>$model->PVNL_ID),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/edit.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('primavacacionesnominaliquidaciones/update','id'=>$model->PVNL_ID),$htmlOptions ); 
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
		'PVNL_ID',
		'PVNL_CODIGO',
		'PVNL_DIAS',
		'PVNL_PUNTOS',
		'PVNL_SUELDO',
		'PVNL_SALARIO',
		'PVNL_PRIMAANTIGUEDAD',
		'PVNL_TRANSPORTE',
		'PVNL_ALIMENTACION',
		'PVNL_PRIMATECNICA',
		'PVNL_GASTOSRP',
		'PVNL_BONIFICACION',
		'PVNL_SEMESTRAL',
		'PVNL_RETEFUENTE',
		'PVNO_ID',
		'EMPL_ID',
		'PVNL_FECHACAMBIO',
		'PVNL_REGISTRADOPOR',
	),
)); ?>    
    
    </td>
  </tr>
</table>
