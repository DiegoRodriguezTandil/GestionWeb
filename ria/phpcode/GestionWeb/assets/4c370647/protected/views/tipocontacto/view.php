<?php
$this->breadcrumbs=array(
	'Tipocontactos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Tipocontacto','url'=>array('index')),
	array('label'=>'Nuevo/a Tipocontacto','url'=>array('create')),
	array('label'=>'Actualizar Tipocontacto','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar Tipocontacto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Tipocontacto','url'=>array('admin')),
);
?>

<h1>View Tipocontacto #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipo',
		'descriptor',
	),
)); ?>
