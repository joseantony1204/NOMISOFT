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
               <td width="25%"  align="center"><h5>SALUD</h5></td>
               <td width="25%"  align="center"><h5>PENSION</h5></td>
               <td width="25%"  align="center"><h5>SINDICATOS</h5></td>
               <td width="25%"  align="center"><h5>DESCUENTOS</h5></td>
			  </tr>
			  
			  <tr>
               
			   <td width="25%" align="center">			   
               <?php $criteria=new CDbCriteria; $criteria->order=' "SALU_ID" ASC';?>
			   <?php $salud = CHtml::listData(Salud::model()->findAll($criteria),'SALU_ID','SALU_NOMBRE') ?>
			   <?php echo $form->dropDownList($Informes, 'INFO_SALUD', $salud, array('multiple'=>false, 'size'=>'7')); ?>			   
			   </td>
			   
			   <td width="25%" align="center">			   
               <?php $criteria=new CDbCriteria; $criteria->order=' "PENS_ID" ASC';?>
			   <?php $pension = CHtml::listData(Pension::model()->findAll($criteria),'PENS_ID','PENS_NOMBRE') ?>
			   <?php echo $form->dropDownList($Informes, 'INFO_PENSION', $pension, array('multiple'=>false, 'size'=>'7')); ?>			   
			   </td>
			   
			   <td width="25%" align="center">			   
               <?php $criteria=new CDbCriteria; $criteria->order=' "SIND_ID" ASC';?>
			   <?php $sindicatos = CHtml::listData(Sindicatos::model()->findAll($criteria),'SIND_ID','SIND_NOMBRE') ?>
			   <?php echo $form->dropDownList($Informes, 'INFO_SINDICATOS', $sindicatos, array('multiple'=>false, 'size'=>'7')); ?>			   
			   </td>
			   
			   <td width="25%" align="center">			   
               <?php $criteria=new CDbCriteria; $criteria->order=' "DEME_DESCRIPCION" ASC';?>
			   <?php $descuentos = CHtml::listData(Descuentosmensuales::model()->findAll($criteria),'DEME_ID','DEME_DESCRIPCION') ?>
			   <?php echo $form->dropDownList($Informes, 'INFO_DESCUENTOS', $descuentos, array('multiple'=>false, 'size'=>'7'));
			   ?>			   
			   </td>
			   
			  </tr>
			  
			  <tr>
               <td width="100%" align="left" colspan="4">&nbsp;</td>
              </tr>
			  
			  <tr>
               
			   <td width="25%" align="center">			   
                <?php  $this->widget('bootstrap.widgets.TbButton', array(
			    'buttonType'=>'button',
			    'type'=>'success',
			    'label'=>'CONSULTAR',
			    'icon'=>'list-alt white',
				'htmlOptions'=>array('onclick' =>'salud(this.form)'),
		        ));  
			    ?>			   
			   </td>
			   
			   <td width="25%" align="center">			   
               <?php  $this->widget('bootstrap.widgets.TbButton', array(
			    'buttonType'=>'button',
			    'type'=>'success',
			    'label'=>'CONSULTAR',
			    'icon'=>'list-alt white',
		        'htmlOptions'=>array('onclick' =>'pension(this.form)'),
				));  
			    ?>			   
			   </td>
			   
			   <td width="25%" align="center">			   
               <?php  $this->widget('bootstrap.widgets.TbButton', array(
			    'buttonType'=>'button',
			    'type'=>'success',
			    'label'=>'CONSULTAR',
			    'icon'=>'list-alt white',
				'htmlOptions'=>array('onclick' =>'sindicato(this.form)'),
		        ));  
			    ?>			   
			   </td>
			   
			   <td width="25%" align="center">			   
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
