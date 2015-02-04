<?php
Yii::app()->homeUrl = array('/'.$this->module->id.'/');
$this->breadcrumbs=array(
	'Novedades Retroactivo Puntos'=>array('admin/novedadesretroactivopuntos/admin'),
	'Actualizar Meses',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('novedadesretroactivopuntos-grid', {
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
             <td width="64%"><strong><span><em>ADMINISTRACION DE NOVEDADES RETROACTIVO PUNTOS</em></span></strong></td>
			 <td width="10%" align="center">
					 <?php
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('/'.$this->module->id,),$htmlOptions ); 
                     ?>         
			</td>
             <td width="10%" align="center">
					 <?php
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/novedadesretroactivopuntos/admin',),$htmlOptions ); 
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
	  
	  <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	    'id'=>'aumentodiasrp-form',
	    'enableAjaxValidation'=>false,
	    'type'=>'vertical',
	    'htmlOptions'=>array('class'=>'well'),
	    'enableClientValidation'=>true,
	    'clientOptions'=>array(
		'validateOnSubmit'=>true,),
        )); 
		?>
		
		<table width="100%" border="0" align="center">		  
		<tr>
        <td width="25%" align="center">		
        <?php echo $form->hiddenField($Cform,'NOVE_TIPOCARGO',array('class'=>'span1','value'=>2)); ?> 		
        </td>
		
		<td width="40%" align="center">	    
	    <?php $data = array('07'=>'RETROACTIVO DE PUNTOS'); ?>
        <?php echo $form->labelEx($Cform,'NOVE_TIPONOMINA'); ?>	 
	    <select name='Cform_NOVE_TIPONOMINA' id='Cform_NOVE_TIPONOMINA' onchange='this.form.submit();' class="span4">
	            <?php
				foreach($data as $dat => $da)
	            {
				  
				 echo "<option value='".$dat."'"; 
		         if (!(strcmp($dat, $_POST['Cform_NOVE_TIPONOMINA']))) {echo "SELECTED";} echo">".$da."</option>";
	            }
	            ?> 
	    </select>
        <?php echo $form->error($Cform,'NOVE_TIPONOMINA'); ?>		
        </td>
		
		
		
		<td width="20%" align="center">
		MESES<br>
		<?php echo $form->textField($Cform,'NOVE_UNIDADES',array('class'=>'span1')); ?> 
        <?php echo $form->error($Cform,'NOVE_UNIDADES'); ?>      
        </td>
    
        
        <td width="15%" align="center">
        <div class="form-actionsv">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'GUARDAR',
			'htmlOptions'=>array(
					                     'id'=>'retroactivosrp',		        
								        ),
                   
		)); ?>
	    </div>
        </td>
		
       </tr>
       <?php $this->endWidget(); ?>
	   </table>
	   </td>
	   </tr>
	   
	   <tr>
	   <td>
	   <?php $form2=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	    'id'=>'aumentodiasr-form-grid',
	    'enableAjaxValidation'=>false,
	    'type'=>'vertical',
	    'htmlOptions'=>array('class'=>'well'),
	    'enableClientValidation'=>true,
	    'clientOptions'=>array(
		'validateOnSubmit'=>true,),
        )); 
		?>
	   <table width="100%" border="0" align="center">	
	   <tr>
        <td colspan="4" align="right">
	   <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'GUARDAR',
			'htmlOptions'=>array(
					                     'id'=>'retroactivosrp',		        
								        ),
                   
		)); ?>
	   </td>
	   </tr>
	   <tr>
        <td colspan="4">
		
    <?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'aumentodiasrp-grid',
	'dataProvider'=>$Novedadesretroactivopuntos->unidadesretroactivospuntosDataProvider,
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
         ),
		 
		 array(
            'header' => 'SEG. APELLIDO',
            'name' => 'PEGE_SEGUNDOAPELLIDOS',
         ),
		 
		 array(
            'header' => 'NOMBRE',
            'name' => 'PEGE_PRIMERNOMBRE',
         ),
		 
		 array(
            'header' => 'SEG. NOMBRE',
            'name' => 'PEGE_SEGUNDONOMBRE',
         ),
		 		 
		 array(
             'name'=>'MESES',
		     'filter'=>false,
		     'value'=>'CHtml::textField("numMesesRetroactivos[$data[NORP_ID]]",$data[NORP_MESES],array("class"=>"span1","style"=>"text-align: center",))',
             'type'=>'raw',
             'htmlOptions'=>array('style'=>'text-align: center','width'=>'200'),
         ),	 
		),	
	   )
	  );  
	?>
		</td>
       </tr>
		  
        </table>
		
		 <?php $this->endWidget(); ?>
	  
      </td>
     </tr>
</table>

<?php
Yii::app()->clientScript->registerScript('sendrp','
var btnModal = $("#confirmarform");
	

var updateGridr = function()
{
	var url = "mesesretroactivospuntos";
	$.ajax({	
			url:url,
			type:"POST",
			data: $("#aumentodiasrp-form").serialize(),
			success:function(data){
								   $("#aumentodiasrp-form")[0].reset();
								   $("#aumentodiasrp-grid").yiiGridView("update",{});
								  // alert("Meses en retroactivo de puntos actualizados correctamente...");						
							      },	
			});
}	
	
// CARGAR MODAL
$("#retroactivosrp").on("click",function(){
		if(confirm(" Esta seguro de actualizar los meses de retroactivo de puntos a todos los empleados que se deszpliegan en la lista? "))
        {
		 $("#pass-form")[0].reset();
		 $("#myModal").modal("show");										  		
        }
});	

// ENVIAR MODAL
btnModal.on("click",function()
{
	var passModal = $("#Cform_NOVE_PASS").val();
    var url = "checkpass";
    $.ajax(
	{
		url: url,
		type:"POST",
		data: {info : passModal},
		beforeSend:function()
		{
																	  
		},						
		
		success:function(data)
		{
			if(data != "")
			{
				if(data != "nook")
				{
					updateGridr();
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