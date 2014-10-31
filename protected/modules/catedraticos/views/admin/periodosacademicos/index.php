<?php
$this->breadcrumbs=array(
	'Periodosacademicoses',
);

$this->menu=array(
	array('label'=>'Create Periodosacademicos','url'=>array('create')),
	array('label'=>'Manage Periodosacademicos','url'=>array('admin')),
);
?>

<h1>Periodosacademicoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
