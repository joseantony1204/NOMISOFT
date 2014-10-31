<table border="0" width="100%">	 
	 <tr>
      <td width="100%"> 
	  
	  <?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'novedadesmensuales-grid',
		'dataProvider'=>$Catedras,
		'type'=>'striped bordered condensed',
		'filter'=>$Catedras,

		'columns'=>array(
			 array('name'=>'PEGE_PRIMERNOMBRE', 'filter'=>false, 'value'=>'$data->PEGE_PRIMERNOMBRE', 'htmlOptions'=>array('width'=>'80', 'style'=>'text-align: center',),),
			 array('name'=>'PEGE_PRIMERAPELLIDO', 'filter'=>false, 'value'=>'$data->PEGE_PRIMERAPELLIDO', 'htmlOptions'=>array('width'=>'80', 'style'=>'text-align: center',),),
			 array('name'=>'CATE_CATEDRA', 'filter'=>false, 'value'=>'$data->CATE_CATEDRA', 'htmlOptions'=>array('width'=>'200', 'style'=>'text-align: center',),),
			 array('name'=>'CATE_NUMHORAS', 'filter'=>false, 'value'=>'$data->CATE_NUMHORAS', 'htmlOptions'=>array('width'=>'40', 'style'=>'text-align: center',),),
			 array('name'=>'CATE_VALORHORA', 'filter'=>false, 'value'=>'$data->CATE_VALORHORA', 'htmlOptions'=>array('width'=>'40',),),
			 
			  
			 array( 
			  'name'=>'VINCULO',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->link),array("admin/novedadesmensuales/create",
			                                                           "id"=>$data[PEGE_ID],"catedraId"=>$data[CATE_ID],))',
			  'htmlOptions'=>array('style'=>'text-align: center',
			                       'width'=>'2',
								   'title' => 'Cargar novedades' , 
								   'alt' => 'Cargar novedades'), 
			  ),
			  
				),
			)); 
	    ?>
	  
	  </td>
	 </tr>
	 
	 <tr>
      <td width="90%">         


<?php 
 if($data!=NULL){
 
   $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'novedadesmensuales-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
    )); 
?>
<?php
$Cargo = Catedras::model()->findByPk($catedraId);
?>
<table border="0" width="100%">
	 <tr>	 
      <td width="100%" colspan="4">
	  <div class="form-actions" align="right">
	  <table border="0" width="100%">
	  <tr>
	   <td width="50%" colspan="2" align="center">CARGO: <strong><?php echo $Cargo->CATE_CATEDRA; ?></strong></td>
	   <td width="25%" align="center">
	 
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'edit white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'ACTUALIZAR DESCUENTOS MENSUALES',
		)); ?>
	  
	   <td width="25%" align="center">
	   
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'list white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'VER LIQUIDACION PRELIMINAR DEL CARGO',
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
               <td width="30%" bgcolor="#F5F5F5">'.$row["DEME_NOMBRE"].'</td>
               <td width="20%">'.CHtml::textField('descMensual['.$row["NOME_ID"].']',$row["NOME_VALOR"],array("class"=>"span1","style"=>"text-align: center",)).'</td>
            ';
		 $columna = 1;
		}else{
		      echo'
               <td width="30%" bgcolor="#F5F5F5">'.$row["DEME_NOMBRE"].'</td>
               <td width="20%">'.CHtml::textField('descMensual['.$row["NOME_ID"].']',$row["NOME_VALOR"],array("class"=>"span1","style"=>"text-align: center",)).'</td>
              </tr>
				  ';
			  $columna = 0;
	         }
 }

 ?>
</table>
<div class="form-actions">
</div>
<?php $this->endWidget(); 
}else{
    $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'novedadesmensuales-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
    )); 

 ?>
<div class="form-actions">Haga click en el boton <?php echo CHtml::image(Yii::app()->baseurl.'/images/ir.png'); ?> en la columna <strong>VINCULO</strong> de cada registro para cargar los deducciones relacionadas...</div>
<?php 

 $this->endWidget(); 
 } 
?>

</td>
      
     </tr>
    </table>




