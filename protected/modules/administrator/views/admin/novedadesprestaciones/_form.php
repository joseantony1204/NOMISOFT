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
	    <td width="30%" align="right" colspan="2">
		<?php if($id==1){ echo '<strong>TIENE CONTINUIDAD EL EMPLEADO?</strong>';} ?></td>	    
	    <td width="8%" align="center">
		  <?php 
		  if($id==1){ 
		   echo '<strong>MESES</strong>';
		   }elseif($id==2){ 
		   echo '<strong>MESES</strong>';
		   }elseif($id==3){ 
		   echo '<strong>DIAS</strong>';
		   }elseif($id==4){ 
		   echo '<strong>DIAS</strong>';
		   }elseif($id==5){ 
		   echo '<strong>DIAS</strong>';
		   } elseif($id==6){ 
		   echo '<strong>MESES</strong>';
		   } 
		  ?>
		</td>
	    <td width="5%" align="center" rowspan="2">&nbsp;</td>
	    <td width="20%" align="center" rowspan="2">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'edit white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'ACTUALIZAR DESCUENTOS PRESTACIONES',
		)); ?>
		</td>
	    <td width="20%" align="center" rowspan="2">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'list white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'VER LIQUIDACION PRELIMINAR DEL CARGO',
		)); ?>
		</td>
	   </tr>
	   
	   <tr>
	    <td width="30%" align="center"><strong><?php echo $Personasgenerales->PEGE_PRIMERNOMBRE." ".$Personasgenerales->PEGE_PRIMERAPELLIDO." ".$Personasgenerales->PEGE_SEGUNDOAPELLIDOS; ?></strong></td>
	    <td width="8%" align="center">
		<?php 
	    if($id==1){
        $this->widget('editable.EditableField', array(
        'type'      => 'select',
        'model'     => $arraynp['Prestacion'],
        'attribute' => $arraynp['atributo1'],
        'url'       => $this->createUrl('admin/novedadesprestaciones/'.$arraynp['url']), 
        'source'    => Editable::source(array(1 => 'SI', 0 => 'NO')),
        'placement' => 'top', 
        ));
	   }
       ?>
		</td>	    
	    <td width="5%" align="center">
		<?php
        $this->widget('editable.EditableField', array(
         'type'      => 'text',
         'model'     => $arraynp['Prestacion'],
         'attribute' => $arraynp['atributo2'],
         'url'       => $this->createUrl('admin/novedadesprestaciones/'.$arraynp['url']),  
         'placement' => 'top', 
         ));
       ?>
		
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