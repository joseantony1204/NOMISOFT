<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Personas Generales'=>array('admin/personasgenerales/admin'),
	'Nuevo',
);
?>
<table width="70%" border="0" align="left" class="">
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
             <td width="63%"><strong><span><em>ADMINISTRACION DE PERSONAS GENERALES  [ Nuevo  ] </em></span></strong></td>
			 <td width="13%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/personasgenerales/admin',),$htmlOptions ); 
?>         
					              </td>
             <td width="13%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/personasgenerales/create',),$htmlOptions ); 
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
    <td>
	<p><?php echo $this->renderPartial('_form', array(
															'Personasgenerales'=>$Personasgenerales,
															'Empleosplanta'=>$Empleosplanta,
															'Estadosempleosplanta'=>$Estadosempleosplanta,
															'Factoressalariales'=>$Factoressalariales,
			                                                'Horasextrasyrecargos'=>$Horasextrasyrecargos,
														)
										); 
		?>
	</p>
	</td>
  </tr>
</table>
