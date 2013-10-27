<?php
$this->breadcrumbs=array(
	'Producto Fotos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar ProductoFoto','url'=>array('index')),
	array('label'=>'Nuevo/a ProductoFoto','url'=>array('create')),
	array('label'=>'Actualizar ProductoFoto','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar ProductoFoto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar ProductoFoto','url'=>array('admin')),
);
?>

<h1>View ProductoFoto #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'producto_id',
		'url',
	),
)); ?>
