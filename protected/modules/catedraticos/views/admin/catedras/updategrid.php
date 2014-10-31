<?php
Yii::app()->homeUrl = array('/'.$this->module->id.'/');
$this->breadcrumbs=array(
	'Buscar Facultad'=>array('admin/catedras/update'),
	'Actualizar Catedras'=>array('admin/catedras/updategrid','facultad'=>$Catedras->FACU_ID),
	'Actualizar',
);

/*
$this->menu=array(
	array('label'=>'List Catedras','url'=>array('index')),
	array('label'=>'Create Catedras','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('catedras-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$Facultades = Facultades::model()->findByPk($Catedras->FACU_ID);
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
             <td width="74%"><strong><span><em>ADMINISTRACION DE CATEDRAS ( <?php echo $Facultades->FACU_NOMBRE; ?> )</em></span></strong></td>
			 
             <td width="10%" align="center">
					 <?php
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/catedras/update',),$htmlOptions ); 
                     ?>         
		     </td>

			 <td width="10%" align="center">
					 <?php
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/catedras/updategrid','facultad'=>$Catedras->FACU_ID),$htmlOptions ); 
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
  </tr>
  <tr>
    <td>
	
 <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'tiposdocumentos-admin',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'wells'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>
	
<table border="0" width="100%">
	 <tr>	 
	 <td>
    
	 <table border="0" width="100%">
	  <tr>
	   <td width="60%" colspan="2" align="center">&nbsp;</td>
	   <td width="20%" align="center">&nbsp;</td>
	   <td width="20%" align="center">
	   
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'edit white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'ACTUALIZAR NUMERO DE HORAS POR CATEDRAS',
		)); ?>
	    
	   </td>
	  </tr>
	  </table>
	 
	 </td>	 
	 </tr>	 
	 <tr>	 
      <td>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'mensualnomina-grid',
	'dataProvider'=>$Catedras->catedrasDataProvider,
	'type'=>'striped bordered condensed',
    'filter' => null,
	'columns'=>array(
		 array(
            'header' => 'IDENTIFICACION',
            'type' => 'number',
            'name' => 'PEGE_IDENTIFICACION',
			'htmlOptions'=>array(
			                       'style'=>'text-align: right','width'=>'100',
								),   
         ),
		 
		 array(
            'header' => 'APELLIDO',
            'name' => 'PEGE_PRIMERAPELLIDO',
			'htmlOptions'=>array(
			                       'style'=>'text-align: center','width'=>'100',
								),
         ),
		 
		 array(
            'header' => 'SEG. APELLIDO',
            'name' => 'PEGE_SEGUNDOAPELLIDOS',
			'htmlOptions'=>array(
			                       'style'=>'text-align: center','width'=>'100',
								),
         ),
		 
		 array(
            'header' => 'NOMBRE',
            'name' => 'PEGE_PRIMERNOMBRE',
			'htmlOptions'=>array(
			                       'style'=>'text-align: center','width'=>'100',
								),
         ),
		 
		 array(
            'header' => 'SEG. NOMBRE',
			'filter'=>true,
            'name' => 'PEGE_SEGUNDONOMBRE',
			'htmlOptions'=>array(
			                       'style'=>'text-align: center','width'=>'100',
								),
         ),
		 
		 array(
        'name'=>'NUM. HORAS',
		'filter'=>false,
		'value'=>'CHtml::textField("numHoras[$data[CATE_ID]]",$data[CATE_NUMHORAS],array("class"=>"span1","style"=>"text-align: center",))',
        'type'=>'raw',
        'htmlOptions'=>array('style'=>'text-align: center','width'=>'150'),
        ), 
		 
	),
	
   )
  );  
?>
      </td> 
	  </tr>
	  
	  <tr>	 
	 <td>
    
	 <table border="0" width="100%">
	  <tr>
	   <td width="60%" colspan="2" align="center">&nbsp;</td>
	   <td width="20%" align="center">&nbsp;</td>
	   <td width="20%" align="center">
	   
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'edit white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'ACTUALIZAR NUMERO DE HORAS POR CATEDRAS',
		)); ?>
	    
	   </td>
	  </tr>
	  </table>
	 
	 </td>	 
	 </tr>
	  
	 </table>
     <?php $this->endWidget(); ?>
    </td>
  </tr>
</table>
