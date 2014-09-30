<?php
$this->breadcrumbs=array(
	'Personasgenerales',
);

$this->menu=array(
	array('label'=>'Create Personasgenerales','url'=>array('create')),
	array('label'=>'Manage Personasgenerales','url'=>array('admin')),
);
?>

<h1>Personasgenerales</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
