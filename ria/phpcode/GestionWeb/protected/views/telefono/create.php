<?php
/* @var $this TelefonoController */
/* @var $model Telefono */

$this->breadcrumbs=array(
	'Telefonos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Telefono', 'url'=>array('index')),
	array('label'=>'Manage Telefono', 'url'=>array('admin')),
);
?>

<h1>Create Telefono</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>