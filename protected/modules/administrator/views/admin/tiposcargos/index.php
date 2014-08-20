<?php
$this->breadcrumbs=array(
	'Tiposcargoses',
);

$this->menu=array(
	array('label'=>'Create Tiposcargos','url'=>array('create')),
	array('label'=>'Manage Tiposcargos','url'=>array('admin')),
);
?>

<h1>Tiposcargoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
