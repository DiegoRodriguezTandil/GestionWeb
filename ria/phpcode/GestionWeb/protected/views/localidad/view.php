<?php
$this->breadcrumbs=array(
	'Localidads'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Localidad','url'=>array('index')),
	array('label'=>'Nuevo/a Localidad','url'=>array('create')),
	array('label'=>'Actualizar Localidad','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar Localidad','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Localidad','url'=>array('admin')),
);
?>

<h1>View Localidad #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'provincia_id',
		'codigotelefonico',
		'codigopostal',
	),
)); ?>
