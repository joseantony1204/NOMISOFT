<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>"form3",
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
			 <h5>REPORTES A TERCEROS</h5>
             <fieldset>
			 <table width="100%" border="0" align="center">            
		      
			  <tr>
               <td width="25%"  align="left" colspan="3"><h5>DESCUENTOS</h5></td>
			  </tr>
			  
			  <tr>
			   
			   <td width="25%" align="left" colspan="3">			   
               <?php $criteria=new CDbCriteria; $criteria->condition=' "TIPR_ID" = 2'; $criteria->order=' "DEPR_DESCRIPCION" ASC';?>
			   <?php $descuentos = CHtml::listData(Descuentosprestaciones::model()->findAll($criteria),'DEPR_ID','DEPR_DESCRIPCION') ?>
			   <?php echo $form->dropDownList($Informes, 'INFO_DESCUENTOS', $descuentos, array('multiple'=>false, 'size'=>'7'));
			   ?>			   
			   </td>
			   
			  </tr>
			  
			  <tr>
               <td width="100%" align="left" colspan="3">&nbsp;</td>
              </tr>
			  
			  <tr>
			   
			   <td width="25%" align="left" colspan="3">			   
               <?php  $this->widget('bootstrap.widgets.TbButton', array(
			    'buttonType'=>'button',
			    'type'=>'success',
			    'label'=>'CONSULTAR',
			    'icon'=>'list-alt white',
				'htmlOptions'=>array('onclick' =>'descuento(this.form)'),
		        ));  
			    ?>			   
			   </td>
			   
			  </tr>
			  
			</table>
			 
			 </fieldset>			 
			 </td>
			</tr>
			
			
		   <tr>
             <td width="20%" align="left" colspan="5">&nbsp;</td>
           </tr>
        </table>	

<?php $this->endWidget(); ?>
<div><br><br><br></div>
