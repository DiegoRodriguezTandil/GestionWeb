<?php
/* @var $this TelefonoController */
/* @var $model Telefono */

$this->breadcrumbs=array(
	'Telefonos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Telefono', 'url'=>array('index')),
	array('label'=>'Create Telefono', 'url'=>array('create')),
	array('label'=>'Update Telefono', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Telefono', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Telefono', 'url'=>array('admin')),
);
?>

<h1>View Telefono #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'localidad',
		'numero',
		'tipoid',
		'personaid',
	),
)); ?>
