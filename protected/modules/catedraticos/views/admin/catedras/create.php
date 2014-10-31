<?php
Yii::app()->homeUrl = array('/'.$this->module->id.'/');
$this->breadcrumbs=array(
	'Novedades Mensuales'=>array('admin/catedras/search'),
	'Catedras'=>array('admin/catedras/create','id'=>$Catedras->PEGE_ID),
	'Agregar',
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
			 ADMINISTRACION DE NOVEDADES MENSUALES  [ Agregar catedra ] <br>
			 <?php echo $Personasgenerales->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->PEGE_SEGUNDONOMBRE.' '.$Personasgenerales->PEGE_PRIMERAPELLIDO.' '.$Personasgenerales->PEGE_SEGUNDOAPELLIDOS; ?>
			 </em></span></strong></td>
			 <td width="13%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/catedras/search',),$htmlOptions ); 
                     ?> 
		     </td>
             <td width="13%" align="center">
					 <?php
		             $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/catedras/create','id'=>$Catedras->PEGE_ID),$htmlOptions ); 
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
    <td><p><?php echo $this->renderPartial('_form', array(
														  'Catedras'=>$Catedras,
														 )
										    ); 
		    ?>
		</p>
	</td>
  </tr>
</table>
