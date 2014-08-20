<table border="0" width="100%">
     <tr>
      <td width="90%">         
<?php    
   $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'novedadesprestaciones-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
    ));	
?>
	  
<table border="0" width="100%">
	 <tr>	 
      <td width="100%" colspan="6">
	  <div class="form-actions" align="right">
	  <table border="0" width="100%">
	  <tr>
	   <td width="75%" colspan="4" align="center"><strong><?php echo $Personasgenerales->PEGE_PRIMERNOMBRE." ".$Personasgenerales->PEGE_PRIMERAPELLIDO; ?></strong></td>
	   <td width="25%" align="center">
	   
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'edit white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'ACTUALIZAR DESCUENTOS PRESTACIONES',
		)); ?>
	    
	   </td>
	  </tr>
	  </table>
	   </div>
	  </td> 
	 </tr>

<?php 
foreach($data as $row)
 {
		if ($columna==0)
		{
		 
		 echo'
              <tr align="center">
               <td width="20%" bgcolor="#D9F5FF">'.$row["DEPR_NOMBRE"].'</td>
               <td width="15%">'.CHtml::textField('descPrestaciones['.$row["NOPR_ID"].']',$row["NOPR_VALOR"],array("class"=>"span2","style"=>"text-align: center",)).'</td>
            ';
		 $columna = 1;
		}else{
		      echo'
               <td width="20%" bgcolor="#D9F5FF">'.$row["DEPR_NOMBRE"].'</td>
               <td width="15%">'.CHtml::textField('descPrestaciones['.$row["NOPR_ID"].']',$row["NOPR_VALOR"],array("class"=>"span2","style"=>"text-align: center",)).'</td>
              </tr>
				  ';
			  $columna = 0;
	         }
 }

 ?>
</table>
<div class="form-actions">
</div>
<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>




