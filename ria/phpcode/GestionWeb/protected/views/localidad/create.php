<?php
/* @var $this LocalidadController */
/* @var $model Localidad */

$this->breadcrumbs=array(
	'Localidads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Localidad', 'url'=>array('index')),
	array('label'=>'Manage Localidad', 'url'=>array('admin')),
);
?>

<h1>Create Localidad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>