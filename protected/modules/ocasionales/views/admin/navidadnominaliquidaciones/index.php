<?php
$this->breadcrumbs=array(
	'Navidadnominaliquidaciones',
);

$this->menu=array(
	array('label'=>'Create Navidadnominaliquidaciones','url'=>array('create')),
	array('label'=>'Manage Navidadnominaliquidaciones','url'=>array('admin')),
);
?>

<h1>Navidadnominaliquidaciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
