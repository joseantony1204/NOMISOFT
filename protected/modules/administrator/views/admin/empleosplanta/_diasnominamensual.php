<table width="100%" border="0" align="center">
     <tr>
      <td>
	  
	  <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	    'id'=>'aumentodiasm-form',
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
        
		<td width="40%" align="center">	    
	    <?php $data = array('01'=>'MENSUAL'); ?>
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
		
		<td width="25%" align="center">
		<?php 
		 $criteria = new CDbCriteria();
		 $data = CHtml::listData(Tiposcargos::model()->findAll($criteria),'TICA_ID','TICA_NOMBRE'); 
		?>
        <?php echo $form->labelEx($Cform,'NOVE_TIPOCARGO'); ?>	 
	    <select name='Cform_NOVE_TIPOCARGO' id='Cform_NOVE_TIPOCARGO' class="span4">
	            <?php
				echo "<option value=''>Elige...</option>"; 
			    foreach($data as $dat => $da)
	            {
				 echo "<option value='".$dat."'"; 
		         if (!(strcmp($dat, $_POST['Cform_NOVE_TIPOCARGO']))) {echo "SELECTED";} echo">".$da."</option>";
	            }
	            ?> 
	    </select> 
        <?php echo $form->error($Cform,'NOVE_TIPOCARGO'); ?>		
        </td>
		
		<td width="20%" align="center">
		DIAS<br>
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
					                     'id'=>'mensual',		        
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
	    'id'=>'aumentodiasm-form-grid',
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
					                     'id'=>'mensuall',		        
								        ),
                   
		)); ?>
	   </td>
	   </tr>
	   <tr>
        <td colspan="4">
		
    <?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'aumentodiasm-grid',
	'dataProvider'=>$Empleosplanta->unidadesmensualesDataProvider,
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
             'name'=>'DIAS',
		     'filter'=>false,
		     'value'=>'CHtml::textField("numDiasMensual[$data[EMPL_ID]]",$data[EMPL_DIASAPAGAR],array("class"=>"span1","style"=>"text-align: center",))',
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
Yii::app()->clientScript->registerScript('sendm','
var btnModal = $("#confirmarform");
	

var updateGridm = function()
{
	var url = "diasmensual";
	$.ajax({	
			url:url,
			type:"POST",
			data: $("#aumentodiasm-form").serialize(),
			success:function(data){
								   $("#aumentodiasm-form")[0].reset();
								   $("#aumentodiasm-grid").yiiGridView("update",{});
								   //alert("Dias en nomina mensual actualizados correctamente...");						
							      },	
			});
}	
	
// CARGAR MODAL
$("#mensual").on("click",function(){
		if(confirm(" Esta seguro de actualizar los dias en nomina mensual a todos los empleados que se deszpliegan en la lista? "))
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
				if(data != "false")
				{
					updateGridm();
					$("#myModal").modal("hide");
					//alert(data);
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