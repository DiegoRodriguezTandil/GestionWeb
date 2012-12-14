<?php
/* @var $this CategoriaproductoController */
/* @var $model Categoriaproducto */

$this->breadcrumbs=array(
	'Categoriaproductos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Categoriaproducto', 'url'=>array('index')),
	array('label'=>'Create Categoriaproducto', 'url'=>array('create')),
	array('label'=>'View Categoriaproducto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Categoriaproducto', 'url'=>array('admin')),
);
?>

<h1>Update Categoriaproducto <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>