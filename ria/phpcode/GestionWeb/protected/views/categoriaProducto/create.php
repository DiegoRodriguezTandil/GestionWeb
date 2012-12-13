<?php
/* @var $this CategoriaProductoController */
/* @var $model CategoriaProducto */

$this->breadcrumbs=array(
	'Categoria Productos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CategoriaProducto', 'url'=>array('index')),
	array('label'=>'Manage CategoriaProducto', 'url'=>array('admin')),
);
?>

<h1>Create CategoriaProducto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>