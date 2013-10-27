<?php
$this->breadcrumbs=array(
	'Provincias',
);

$this->menu=array(
	array('label'=>'Nuevo/a Provincia','url'=>array('create')),
	array('label'=>'Administrar Provincia','url'=>array('admin')),
);
?>

<h1>Provincias</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
