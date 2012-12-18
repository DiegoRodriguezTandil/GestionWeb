<?php
$this->breadcrumbs=array(
	'Direccions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Direccion','url'=>array('index')),
	array('label'=>'Nuevo/a Direccion','url'=>array('create')),
	array('label'=>'Actualizar Direccion','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar Direccion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Direccion','url'=>array('admin')),
);
?>

<h1>View Direccion #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipodireccion',
		'calle',
		'persona_id',
		'numero',
		'localidad',
	),
)); ?>
