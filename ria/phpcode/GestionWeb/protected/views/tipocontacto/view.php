<?php
/* @var $this TipocontactoController */
/* @var $model Tipocontacto */

$this->breadcrumbs=array(
	'Tipocontactos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tipocontacto', 'url'=>array('index')),
	array('label'=>'Create Tipocontacto', 'url'=>array('create')),
	array('label'=>'Update Tipocontacto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tipocontacto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tipocontacto', 'url'=>array('admin')),
);
?>

<h1>View Tipocontacto #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipo',
		'descriptor',
	),
)); ?>
