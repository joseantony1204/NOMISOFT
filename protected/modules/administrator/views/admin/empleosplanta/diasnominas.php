<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Actualizar unidades de nominas'=>array('admin/empleosplanta/diasnominas',),
	'Administrar',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('diasnominas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<table width="100%" border="0" align="center">
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
             <td width="74%"><strong><span><em>ACTUALIZAR UNIDADES PARA LIQUIDACION DE NOMINAS</em></span></strong></td>
			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('/administrator',),$htmlOptions ); 
?>         
					              </td>
             <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/empleosplanta/diasnominas',),$htmlOptions ); 
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
      
      <table width="100%" border="0">
       
	 
      <tr>
       <td>
       <?php $this->widget('bootstrap.widgets.TbTabs', array(
       'type'=>'tabs',
       'placement'=>'above', // 'above', 'right', 'below' or 'left'
       'tabs'=>array(
        array('label'=>'NOMINA MENSUAL', 'content'=> $this->renderPartial("_diasnominamensual",array(
		                                                                                 'Empleosplanta'=>$Empleosplanta,
								                                                         'Cform'=>$Cform,
																						),
																		   true
																		  ), 
																		  'active'=>true
			 ),
	    array('label'=>'PRIMA SEMESTRAL', 'content'=> $this->renderPartial("_diasnominasemestral",array(
		                                                                                 'Empleosplanta'=>$Empleosplanta,
								                                                         'Cform'=>$Cform,		
																						),
																		   true
																		  ), 
			 ),
		array('label'=>'PRIMA VACACIONES', 'content'=> $this->renderPartial("_diasnominapvacaciones",array(
		                                                                                 'Empleosplanta'=>$Empleosplanta,
								                                                         'Cform'=>$Cform,		
																						),
																		   true
																		  ), 
			 ),
		array('label'=>'PRIMA DE NAVIDAD', 'content'=> $this->renderPartial("_diasnominapnavidad",array(
		                                                                                 'Empleosplanta'=>$Empleosplanta,
								                                                         'Cform'=>$Cform,		
																						),
																		   true
																		  ), 
			 ),
		array('label'=>'VACACIONES', 'content'=> $this->renderPartial("_diasnominavacaciones",array(
		                                                                                 'Empleosplanta'=>$Empleosplanta,
								                                                         'Cform'=>$Cform,		
																						),
																		   true
																		  ), 
			 ),
		array('label'=>'RETROACTIVOS', 'content'=> $this->renderPartial("_diasmestroactivos",array(
		                                                                                 'Empleosplanta'=>$Empleosplanta,
								                                                         'Cform'=>$Cform,		
																						),
																		   true
																		  ), 
			 ),
        
    ),
)); ?>
<?php $this->beginWidget('bootstrap.widgets.TbModal', array(
        'id'=>'myModal',      
     )); ?>
        <div class="modal-header">
            <a class="close" data-dismiss="modal">&times;</a>
            <h4>CONTRASEÑA DE SEGURIDAD</h4>
        </div>
         
        <div class="modal-body">
          <?php
            $this->renderPartial('_pass', array('Cform'=>$Cform)); 
		  ?>
         	
        </div>
        
        <div class="modal-footer">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'Cerrar ventana',
                'url'=>'#',
                'htmlOptions'=>array('data-dismiss'=>'modal'),
            )); ?>
        </div>    
<?php $this->endWidget(); ?>
	   </td>
      </tr>
	  
	  
      </table>    

    </td>
    
  </tr>
</table>

    
