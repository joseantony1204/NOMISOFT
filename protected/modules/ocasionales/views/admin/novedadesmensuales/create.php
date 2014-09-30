<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Novedades Mensuales'=>array('admin/novedadesmensuales/admin'),
	'Ingresar Novedades Mensuales',
);
?>
<table width="100%" border="0" align="left" class="">
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
             <td width="63%"><strong><span><em>ADMINISTRACION DE NOVEDADES MENSUALES  [ Ingresar Novedades Mensuales ] </em></span></strong></td>
			 <td width="13%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/novedadesmensuales/admin',),$htmlOptions ); 
?>         
					              </td>
             <td width="13%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/novedadesmensuales/create','id'=>$Personasgenerales->PEGE_ID),$htmlOptions ); 
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
    <td><p><?php echo $this->renderPartial('_novedades', array(
	                                                           'data'=>$data,
															   'Personasgenerales'=>$Personasgenerales,
															   'Empleosplanta'=>$Empleosplanta,
															   'empleoPlanta'=>$empleoPlanta,
															   )
										    ); 
		    ?>
		</p>
	</td>
  </tr>
</table>
