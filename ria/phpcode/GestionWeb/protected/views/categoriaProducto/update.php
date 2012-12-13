<?php
/* @var $this CategoriaProductoController */
/* @var $model CategoriaProducto */

$this->breadcrumbs=array(
	'Categoria Productos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CategoriaProducto', 'url'=>array('index')),
	array('label'=>'Create CategoriaProducto', 'url'=>array('create')),
	array('label'=>'View CategoriaProducto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CategoriaProducto', 'url'=>array('admin')),
);
?>

<h1>Update CategoriaProducto <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>