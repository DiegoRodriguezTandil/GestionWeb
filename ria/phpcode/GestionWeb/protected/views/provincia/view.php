<?php
$this->breadcrumbs=array(
	'Provincias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Provincia','url'=>array('index')),
	array('label'=>'Nuevo/a Provincia','url'=>array('create')),
	array('label'=>'Actualizar Provincia','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar Provincia','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Provincia','url'=>array('admin')),
);
?>

<h1>View Provincia #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'pais_id',
	),
)); ?>
