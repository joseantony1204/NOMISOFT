<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Parametrosglobales'=>array('admin/parametrosglobales/admin'),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Parametrosglobales','url'=>array('index')),
	array('label'=>'Create Parametrosglobales','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('parametrosglobales-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
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
             <td width="74%"><strong><span><em>ADMINISTRACION DE PARAMETROS GLOBALES</em></span></strong></td>
			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('/ocasionales',),$htmlOptions ); 
?>         
					              </td>
             <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/parametrosglobales/admin',),$htmlOptions ); 
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
	
	<table width="100%" border="0" align="center">
	 <tr>
      <td width="20%" valign="top">
	  <?php $this->widget('bootstrap.widgets.TbGridView',array(
	  'id'=>'parametrosglobales-grid',
	  'dataProvider'=>$Parametrosglobalesvalores->buscar(),
	  'type'=>'striped bordered condensed',
      'filter'=>$Parametrosglobalesvalores,
      //'summaryText'=>'',
	  'columns'=>array(
	     array('name'=>'PAGV_ANIO', 'filter'=>false, 'value'=>'$data->PAGV_ANIO', 'htmlOptions'=>array('width'=>'70','style'=>'text-align: center'),),
		 
		 array( 
			  'name'=>'VINCULO',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->link),array("admin/parametrosglobales/admin",
			                                                           "anio"=>$data[PAGV_ANIO],))',
			  'htmlOptions'=>array('style'=>'text-align: center',
			                       'width'=>'2',
								   'title' => 'Cargar novedades' , 
								   'alt' => 'Cargar novedades'), 
			  ),

		 
	  ),
      )); 
	  ?>
	  </td>
	  
    
	   <td width="80%" align="center">
	   
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
<table border="0" width="100%">
	 <tr>	 
      <td width="100%" colspan="4">
	  <div class="form-actions" align="right">
	  <table border="0" width="100%">
	  <tr>
	   <td width="70%" colspan="3" align="center">VALORES GLOBALES PARA LIQUIDACION CONRRESPONDIENTE AL AÑO: <strong><?php echo $anio; ?></td>
	   <td width="30%" align="center">
	   
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'edit white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'ACTUALIZAR PARAMETROS GLOBALES',
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
               <td width="30%" bgcolor="#F5F5F5">'.$row["PAGL_NOMBRE"].'</td>
               <td width="20%">'.CHtml::textField('paramLiquid['.$row["PAGV_ID"].']',$row["PAGV_VALOR"],array("class"=>"span2","style"=>"text-align: center",)).'</td>
            ';
		 $columna = 1;
		}else{
		      echo'
               <td width="30%" bgcolor="#F5F5F5">'.$row["PAGL_NOMBRE"].'</td>
               <td width="20%">'.CHtml::textField('paramLiquid['.$row["PAGV_ID"].']',$row["PAGV_VALOR"],array("class"=>"span2","style"=>"text-align: center",)).'</td>
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
}
else{
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
<div class="form-actions">Haga click en el boton <?php echo CHtml::image(Yii::app()->baseurl.'/images/ir.png'); ?> en la columna <strong>VALORES</strong> de cada registro para cargar los parametros de liquidacion...</div>
<?php 

 $this->endWidget(); 
 } 
?>
	   </td>
       </tr>
  
    </table>

    </td>
  </tr>
</table>
