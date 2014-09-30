<?php
$this->breadcrumbs=array(
	'Navidadnominas',
);

$this->menu=array(
	array('label'=>'Create Navidadnomina','url'=>array('create')),
	array('label'=>'Manage Navidadnomina','url'=>array('admin')),
);
?>

<h1>Navidadnominas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
