<?php
Yii::app()->homeUrl = array('/'.$this->module->id.'/');
$this->breadcrumbs=array(
	'Novedades Mensuales'=>array('admin/catedras/search'),
	'Catedras'=>array('admin/catedras/create','id'=>$Catedras->PEGE_ID),
	'Procesar Archivo Excel',
);
?>
<table width="80%" border="0" align="left" class="">
  <tr>
   <td>
	<table width="100%" border="0" align="center">
     <tr>
      <td>
       <fieldset>
        <table width="100%" border="0" align="center">
            <tr>
             <td width="6%" align="center">
					  <?php 			 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/user.png';
					  echo $image = CHtml::image($imageUrl); 
					  ?>         
					               
             </td>
             <td width="63%">
			 <strong><span><em>
			 ADMINISTRACION DE CATEDRAS  [ verificación, inserción y actualización ] <br>
			 <?php echo $Facultades->FACU_ID.' - '.$Facultades->FACU_NOMBRE; ?>
			 </em></span></strong></td>
			 <td width="13%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/catedras/import',),$htmlOptions ); 
                     ?> 
		     </td>
           </tr>
        </table>
       </fieldset>
      </td>
     </tr>
    </table></td>
  </tr>
  
  <tr>
    <td><p><?php echo $this->renderPartial('_importgrid', array(
														  'Catedras'=>$Catedras,
														  'Facultades'=>$Facultades,
														  'opcion'=>$opcion,
														 )
										    ); 
		    ?>
		</p>
	</td>
  </tr>
</table>
