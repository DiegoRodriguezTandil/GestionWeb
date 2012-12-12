<?php
/* @var $this TipocontactoController */
/* @var $model Tipocontacto */

$this->breadcrumbs=array(
	'Tipocontactos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tipocontacto', 'url'=>array('index')),
	array('label'=>'Manage Tipocontacto', 'url'=>array('admin')),
);
?>

<h1>Create Tipocontacto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>