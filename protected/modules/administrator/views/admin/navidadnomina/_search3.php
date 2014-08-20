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
			 <h5>OTROS DESCUENTOS</h5>
             <fieldset>
			 <table width="100%" border="0" align="center">            
		  
			  <tr>
               <td width="25%" align="center">			   
                <?php  $this->widget('bootstrap.widgets.TbButton', array(
			    'buttonType'=>'button',
			    'type'=>'success',
			    'label'=>'RETEFUENTE',
			    'icon'=>'list-alt white',
				'htmlOptions'=>array('onclick' =>'retefuente(this.form)'),
		        ));  
			    ?>
			   </td>
			   
			   <td width="75%" align="center">&nbsp;</td>
			  </tr>
			  
			</table>
			 
			 </fieldset>			 
			 </td>
			</tr>
        </table>
<?php $this->endWidget(); ?>
<div><br><br><br></div>
