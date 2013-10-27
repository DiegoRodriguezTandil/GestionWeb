<?php
$this->breadcrumbs=array(
	'Direccions',
);

$this->menu=array(
	array('label'=>'Nuevo/a Direccion','url'=>array('create')),
	array('label'=>'Administrar Direccion','url'=>array('admin')),
);
?>

<h1>Direccions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
