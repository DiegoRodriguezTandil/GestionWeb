<?php
/* @var $this CategoriaproductoController */
/* @var $model Categoriaproducto */

$this->breadcrumbs=array(
	'Categoriaproductos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Categoriaproducto', 'url'=>array('index')),
	array('label'=>'Manage Categoriaproducto', 'url'=>array('admin')),
);
?>

<h1>Create Categoriaproducto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>