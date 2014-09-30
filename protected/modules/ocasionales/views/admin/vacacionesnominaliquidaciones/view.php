<?php
$this->breadcrumbs=array(
	'Vacacionesnominaliquidaciones'=>array('index'),
	$model->VANL_ID,
);

?>

<table width="70%" border="1" align="left" class="" style="white-space-collapse:collapse">
  <tr>
    <td><table width="820" border="0" align="center">
      <tr>
        <td width="60" align="left"><img src="/APP_FONDO/images/user.png" alt="" /></td>
        <td width="498" align="left"><strong style="border-bottom-style:groove">VISUALIZACIÒN DE REGISTROS [ VACACIONESNOMINALIQUIDACIONES : Detalles ] </strong></td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('vacacionesnominaliquidaciones/admin',),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('vacacionesnominaliquidaciones/view','id'=>$model->VANL_ID),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/edit.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('vacacionesnominaliquidaciones/update','id'=>$model->VANL_ID),$htmlOptions ); 
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
		'VANL_ID',
		'VANL_CODIGO',
		'VANL_DIAS',
		'VANL_PUNTOS',
		'VANL_SUELDO',
		'VANL_SALARIO',
		'VANL_PRIMAANTIGUEDAD',
		'VANL_TRANSPORTE',
		'VANL_ALIMENTACION',
		'VANL_PRIMATECNICA',
		'VANL_GASTOSRP',
		'VANL_BONIFICACION',
		'VANL_SEMESTRAL',
		'VANL_RETEFUENTE',
		'VANO_ID',
		'EMPL_ID',
		'VANL_FECHACAMBIO',
		'VANL_REGISTRADOPOR',
	),
)); ?>    
    
    </td>
  </tr>
</table>
