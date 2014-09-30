<?php
$this->breadcrumbs=array(
	'Recreacionnominas',
);

$this->menu=array(
	array('label'=>'Create Recreacionnomina','url'=>array('create')),
	array('label'=>'Manage Recreacionnomina','url'=>array('admin')),
);
?>

<h1>Recreacionnominas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
