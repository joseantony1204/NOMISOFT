<?php
$this->breadcrumbs=array(
	'Personasgenerales'=>array('index'),
	$model->PEGE_ID,
);

?>

<table width="70%" border="1" align="left" class="" style="white-space-collapse:collapse">
  <tr>
    <td><table width="820" border="0" align="center">
      <tr>
        <td width="60" align="left"><img src="/APP_FONDO/images/user.png" alt="" /></td>
        <td width="498" align="left"><strong style="border-bottom-style:groove">VISUALIZACIÒN DE REGISTROS [ PERSONASGENERALES : Detalles ] </strong></td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('personasgenerales/admin',),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('personasgenerales/view','id'=>$model->PEGE_ID),$htmlOptions ); 
?>         
		 </td>
        <td width="80" align="center"><?php

         
		 $imageUrl = Yii::app()->request->baseUrl . '/images/edit.png';
         $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         $image = CHtml::image($imageUrl);
         echo CHtml::link($image, array('personasgenerales/update','id'=>$model->PEGE_ID),$htmlOptions ); 
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
		'PEGE_ID',
		'PEGE_IDENTIFICACION',
		'PEGE_PRIMERNOMBRE',
		'PEGE_SEGUNDONOMBRE',
		'PEGE_PRIMERAPELLIDO',
		'PEGE_SEGUNDOAPELLIDOS',
		'PEGE_FECHAINGRESO',
		'PEGE_DIRECCION',
		'PEGE_TELEFONOFIJO',
		'PEGE_TELEFONOMOVIL',
		'PEGE_EMAIL',
		'PEGE_NUMEROCUENTA',
		'PEGE_FECHANACIMIENTO',
		'PEGE_LUGAREXPEDIDENTIDAD',
		'PEGE_FECHAEXPEDIDENTIDAD',
		'PEGE_FOTO',
		'SALU_ID',
		'PENS_ID',
		'SIND_ID',
		'SEXO_ID',
		'CATE_ID',
		'PEGE_FECHACAMBIO',
		'PEGE_REGISTRADOPOR',
	),
)); ?>    
    
    </td>
  </tr>
</table>
