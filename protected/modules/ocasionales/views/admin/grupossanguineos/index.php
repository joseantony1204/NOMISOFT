<?php
$this->breadcrumbs=array(
	'Grupossanguineoses',
);

$this->menu=array(
	array('label'=>'Create Grupossanguineos','url'=>array('create')),
	array('label'=>'Manage Grupossanguineos','url'=>array('admin')),
);
?>

<h1>Grupossanguineoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
