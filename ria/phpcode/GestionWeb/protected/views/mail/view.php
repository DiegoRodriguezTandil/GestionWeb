<?php
$this->breadcrumbs=array(
	'Mails'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Mail','url'=>array('index')),
	array('label'=>'Nuevo/a Mail','url'=>array('create')),
	array('label'=>'Actualizar Mail','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar Mail','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Mail','url'=>array('admin')),
);
?>

<h1>View Mail #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipo',
		'direccion',
		'persona_id',
	),
)); ?>
