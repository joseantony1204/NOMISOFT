<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Descuentos Prestaciones'=>array('admin/novedadesprestaciones/search'),
	'Ingresar Descuentos Prestaciones',
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
					  $Tiposprestaciones = Tiposprestaciones::model()->findByPk($id);
					  ?>         
					               
             </td>
             <td width="63%"><strong><span><em>DESCUENTOS DE PRESTACIONES  [ Ingresar Descuentos Prestaciones ( <?php echo $Tiposprestaciones->TIPR_NOMBRE; ?> ) ] </em></span></strong></td>
			 <td width="13%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/novedadesprestaciones/search','id'=>$id),$htmlOptions ); 
?>         
					              </td>
             <td width="13%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/novedadesprestaciones/create','personaGeneral'=>$Personasgenerales->PEGE_ID,'id'=>$id),$htmlOptions ); 
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
	                                                  'Novedadesprestaciones'=>$Novedadesprestaciones,
			                                          'data'=>$data,
			                                          'Personasgenerales'=>$Personasgenerales,
			                                          'id'=>$id,
													 )
									  ); 
		    ?>
		</p>
	</td>
  </tr>
</table>
