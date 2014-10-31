<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>"form2",
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'POST',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); 

?>  
  <table width="100%" border="0" align="center">
			
			<tr>
             <td width="100%" align="left">
			 <h5>IDENTIFICACION O FACULTAD</h5>
             <fieldset>
			 <table width="100%" border="0" align="center">            
			  
			  <tr>
               <td width="30%"  align="center"><h5>IDENTIFICACION</h5></td>
               <td width="70%"  align="center"><h5>FACULTADES</h5></td>
			  </tr>
		  
			  <tr>
               <td width="30%" align="center">			   
               <?php echo $form->textField($Informes,'INFO_IDENTIFICACION',array('class'=>'span3',)); ?>
			   </td>
               <td width="70%" align="center">
               <?php $data = CHtml::listData(Facultades::model()->findAll(),'FACU_ID','FACU_NOMBRE') ?>
               <?php echo $form->dropDownList($Informes,'INFO_UNIDAD',$data, array('class'=>'span4','prompt'=>'Elige...')); ?>
               <?php echo $form->error($Informes,'INFO_UNIDAD'); ?>
			   </td>
			  </tr>
			  
			</table>
			 
			 </fieldset>			 
			 </td>
			</tr>
			
			
		   <tr>
             <td width="20%" align="left" colspan="5">&nbsp;</td>
           </tr>
		   
		   <tr>
             <td width="20%" align="left" colspan="5">&nbsp;</td>
           </tr>
		   
		   <tr>
             <td width="20%" align="lefth" colspan="5">
			 
			 <table width="100%" border="0" align="center">            
			  
			  <tr>
               <td width="25%"  align="center">
			   <?php  $this->widget('bootstrap.widgets.TbButton', array(
			    'buttonType'=>'button',
			    'type'=>'success',
			    'label'=>'VER DETALLES',
			    'icon'=>'list-alt white',
				'htmlOptions'=>array('onclick' =>'detalles(this.form)'),
		        ));  
			    ?>
			   </td>
			   <td width="25%"  align="center">
			   <?php  $this->widget('bootstrap.widgets.TbButton', array(
			    'buttonType'=>'button',
			    'type'=>'success',
			    'label'=>'VER RESUMEN',
			    'icon'=>'file white',
		        'htmlOptions'=>array('onclick' =>'resumen(this.form)'),
				));  
			    ?>
			   </td>
               <td width="25%"  align="center">&nbsp;
			   <?php  /*$this->widget('bootstrap.widgets.TbButton', array(
			    'buttonType'=>'button',
			    'type'=>'success',
			    'label'=>'ENVIAR EMAIL',
			    'icon'=>'envelope white',
				'htmlOptions'=>array('onclick' =>'email(this.form)'),
		        ));  
			    */?>
			   </td>
			   
			   <td width="25%"  align="center">&nbsp;
			   <?php /* $this->widget('bootstrap.widgets.TbButton', array(
			    'buttonType'=>'button',
			    'type'=>'success',
			    'label'=>'VER I.B.C.',
			    'icon'=>'tag white',
				'htmlOptions'=>array('onclick' =>'ibc(this.form)'),
		        ));  
			    */?>
			   </td>
			  </tr>
		 			  
			</table>
			
			 </td>
           </tr>
        </table>
<?php $this->endWidget(); ?>
<div><br><br><br></div>
