<?php
/* @var $this CategoriaProductoController */
/* @var $model CategoriaProducto */

$this->breadcrumbs=array(
	'Categoria Productos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CategoriaProducto', 'url'=>array('index')),
	array('label'=>'Create CategoriaProducto', 'url'=>array('create')),
	array('label'=>'Update CategoriaProducto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CategoriaProducto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CategoriaProducto', 'url'=>array('admin')),
);
?>

<h1>View CategoriaProducto #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'categoria',
	),
)); ?>
