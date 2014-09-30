<?php
$this->breadcrumbs=array(
	'Emails',
);

$this->menu=array(
	array('label'=>'Create Email','url'=>array('create')),
	array('label'=>'Manage Email','url'=>array('admin')),
);
?>

<h1>Emails</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
