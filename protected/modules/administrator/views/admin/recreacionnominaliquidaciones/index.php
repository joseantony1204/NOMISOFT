<?php
$this->breadcrumbs=array(
	'Recreacionnominaliquidacions',
);

$this->menu=array(
	array('label'=>'Create Recreacionnominaliquidacion','url'=>array('create')),
	array('label'=>'Manage Recreacionnominaliquidacion','url'=>array('admin')),
);
?>

<h1>Recreacionnominaliquidacions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
