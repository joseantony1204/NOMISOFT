<?php
$this->breadcrumbs=array(
	'Navidadnominaliquidaciones'=>array('index'),
	$model->NANL_ID,
);

?>

<table width="70%" border="1" align="left" class="" style="white-space-collapse:collapse">
  <tr>
    <td><table width="820" border="0" align="center">
      <tr>
        <td width="60" align="left"><img src="/APP_FONDO/images/user.png" alt="" /></td>
        <td width="498" align="left"><strong style="border-bottom-style:groove">VISUALIZACIÒN DE REGISTROS [ NAVIDADNOMINALIQUIDACIONES : Detalles ] </strong></td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('navidadnominaliquidaciones/admin',),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('navidadnominaliquidaciones/view','id'=>$model->NANL_ID),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/edit.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('navidadnominaliquidaciones/update','id'=>$model->NANL_ID),$htmlOptions ); 
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
		'NANL_ID',
		'NANL_CODIGO',
		'NANL_DIAS',
		'NANL_PUNTOS',
		'NANL_SALARIO',
		'NANL_PRIMAANTIGUEDAD',
		'NANL_TRANSPORTE',
		'NANL_ALIMENTACION',
		'NANL_PRIMATECNICA',
		'NANL_GASTOSRP',
		'NANL_BONIFICACION',
		'NANL_SEMESTRAL',
		'NANL_VACACIONES',
		'NANL_RETEFUENTE',
		'NANO_ID',
		'EMPL_ID',
		'NANL_FECHACAMBIO',
		'NANL_REGISTRADOPOR',
	),
)); ?>    
    
    </td>
  </tr>
</table>
