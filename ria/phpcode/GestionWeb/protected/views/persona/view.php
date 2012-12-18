<?php
$this->breadcrumbs=array(
	'Personas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Persona','url'=>array('index')),
	array('label'=>'Nuevo/a Persona','url'=>array('create')),
	array('label'=>'Actualizar Persona','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar Persona','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Persona','url'=>array('admin')),
);
?>

<h1>View Persona #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'razon social',
		'empresa',
		'dni',
		'web',
		'foto',
		'intereses',
		'cuit',
		'fechaAlta',
	),
)); ?>
