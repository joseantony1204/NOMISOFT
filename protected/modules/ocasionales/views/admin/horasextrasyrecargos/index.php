<?php
$this->breadcrumbs=array(
	'Horasextrasyrecargoses',
);

$this->menu=array(
	array('label'=>'Create Horasextrasyrecargos','url'=>array('create')),
	array('label'=>'Manage Horasextrasyrecargos','url'=>array('admin')),
);
?>

<h1>Horasextrasyrecargoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
