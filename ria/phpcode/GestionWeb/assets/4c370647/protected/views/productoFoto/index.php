<?php
$this->breadcrumbs=array(
	'Producto Fotos',
);

$this->menu=array(
	array('label'=>'Nuevo/a ProductoFoto','url'=>array('create')),
	array('label'=>'Administrar ProductoFoto','url'=>array('admin')),
);
?>

<h1>Producto Fotos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
