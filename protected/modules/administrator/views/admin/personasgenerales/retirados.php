<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Personas Generales Retirados'=>array('admin/personasgenerales/admin'),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Personasgenerales','url'=>array('index')),
	array('label'=>'Create Personasgenerales','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('personasgenerales-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

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
             <td width="64%"><strong><span><em>ADMINISTRACION DE PERSONAS RETIRADAS</em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/personasgenerales/retirados',),$htmlOptions ); 
?>         
					              </td>

			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/personasgenerales/crearretiro',),$htmlOptions ); 
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
   <td colspan="2">
	 <?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn')); ?>	 <div class="search-form" style="display:none" >
	 <?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->
   </td>
  </tr>
  <tr>
    <td>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'personasgenerales-grid',
	'dataProvider'=>$model->retirados(),
	'type'=>'striped bordered condensed',
    'filter'=>$model,
	'columns'=>array(
		'PEGE_IDENTIFICACION',
		'PEGE_PRIMERAPELLIDO',
		'PEGE_SEGUNDOAPELLIDOS',
		'PEGE_PRIMERNOMBRE',
		'PEGE_SEGUNDONOMBRE',
		'PEGE_FECHAINGRESO',
		'ESEP_FECHAREGISTRO',
	
		
        
        array(
              'class'=>'bootstrap.widgets.TbButtonColumn',
              'template'=>'{suprimir}',
              'buttons'=>array(       
			   
			   'suprimir' => array(
				'label' => Yii::t('int', 'Elinimar este registro'),
				'url'=>'Yii::app()->controller->createUrl("admin/estadosempleosplanta/delete", array("id"=>$data[ESEP_ID],"command"=>"delete"))',
                'imageUrl'=>Yii::app()->request->baseUrl.'/images/crosse.png',			
				'click'=>"function(){
				                     var urlattr = $(this).attr('href');
									 $.fn.yiiGridView.update('personasgenerales-grid', {                                                                               										
                                        beforeSend:function(){
										 if(confirm('Esta seguro que desea eliminar el ultimo estado de esta persona? '))
										  {										  
										  $('#pass-form')[0].reset();
										  $('#Cform_NOVE_URL').val(urlattr);
										  $('#myModal').modal('show');										  		
										  }																  
									    },
										success:function(data){                                            
                                        }
                                    })
                                    return false;									 
									}",
				),
			  ),			  
			),
	),
)); ?>

    </td>
  </tr>
</table>


<?php
Yii::app()->clientScript->registerScript('delete','
var btnModal = $("#confirmarform");


var updateGridView = function(url)
{
	$.ajax({	
			url: url,
			type:"POST",			
			success:function(data){
								   $("#personasgenerales-grid").yiiGridView("update",{});
								   alert("El registro ha sido eliminado correctamente...");						
							      },	
			});
}	

// CARGAR MODAL
$("#bntdelete").on("click",function(){
		if(confirm(" Esta seguro de eliminar el elemento? "))
        {
		 $("#pass-form")[0].reset();
		 $("#myModal").modal("show");										  		
        }
});	


// ENVIAR MODAL
btnModal.on("click",function()
{
	var passModal = $("#Cform_NOVE_PASS").val();
    var urldelete = $("#Cform_NOVE_URL").val();
	var url = "'.CHtml::normalizeUrl(Yii::app()->controller->createUrl("admin/personasgenerales/checkpass")).'";
    $.ajax(
	{
		url: url,
		type:"POST",
		data: {info : passModal},		
		success:function(data)
		{
			if(data != "")
			{
				if(data != "false")
				{
					updateGridView(urldelete);
					$("#myModal").modal("hide");
				}
				else
				{
					alert("La contrasena es incorrecta");
				}																
			}
			else
			{
				alert("Hubo un error conectando al servidor");
			}
		},                                  
    });	// fin Ajax
});
');
?>
