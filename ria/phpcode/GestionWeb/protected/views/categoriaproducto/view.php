<?php
/* @var $this CategoriaproductoController */
/* @var $model Categoriaproducto */

$this->breadcrumbs=array(
	'Categoriaproductos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Categoriaproducto', 'url'=>array('index')),
	array('label'=>'Create Categoriaproducto', 'url'=>array('create')),
	array('label'=>'Update Categoriaproducto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Categoriaproducto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Categoriaproducto', 'url'=>array('admin')),
);
?>

<h1>View Categoriaproducto #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'categoria',
	),
)); ?>
