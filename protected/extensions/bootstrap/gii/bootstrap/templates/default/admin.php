<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label=($this->class2name($this->modelClass));
$controlador = $this->class2id($this->modelClass);
echo "Yii::app()->homeUrl = array('/administrator/');\n";
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin/$controlador/admin'),
	'Administrar',
);\n";

?>

/*
$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>','url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
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
					 echo "<?php "; echo"			 
					 \$imageUrl = Yii::app()->request->baseUrl . '/images/user.png';
					  echo \$image = CHtml::image(\$imageUrl); 
					  ?>         
					 "; ?>              
             </td>
             <td width="64%"><strong><span><em>ADMINISTRACION DE <?php echo strtoupper($this->class2name($this->modelClass)); ?></em></span></strong></td>
			 <td width="10%" align="center">
					 <?php 
					 echo "<?php\n";
					 echo"
					 
					 \$imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 \$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 \$image = CHtml::image(\$imageUrl);
					 echo CHtml::link(\$image, array('/administrator',),\$htmlOptions ); \n?>         
					 ";
					 ?>
             </td>
             <td width="10%" align="center">
					 <?php 
					 echo "<?php\n";
					 echo"
					 
					 \$imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 \$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 \$image = CHtml::image(\$imageUrl);
					 echo CHtml::link(\$image, array('admin/$controlador/admin',),\$htmlOptions ); \n?>         
					 ";
					 ?>
             </td>

			 <td width="10%" align="center">
					 <?php 
					 echo "<?php\n";
					 echo"
					 
					 \$imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 \$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 \$image = CHtml::image(\$imageUrl);
					 echo CHtml::link(\$image, array('admin/$controlador/create',),\$htmlOptions ); \n?>         
					 ";
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
   <td colspan="2">
	 <?php echo "<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn')); ?>"; ?>
	 <div class="search-form" style="display:none" >
	 <?php echo "<?php \$this->renderPartial('_search',array(
		'model'=>\$model,
	)); ?>\n"; ?>
	</div><!-- search-form -->
   </td>
  </tr>
  <tr>
    <td>
<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
    'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		
        
        array(
              'class'=>'bootstrap.widgets.TbButtonColumn',
              'template'=>'{update}&nbsp;&nbsp;{delete}',			  
			),
	),
)); ?>

    </td>
  </tr>
</table>
