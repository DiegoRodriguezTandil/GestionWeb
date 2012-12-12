<?php
/* @var $this TipocontactoController */
/* @var $model Tipocontacto */

$this->breadcrumbs=array(
	'Tipocontactos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tipocontacto', 'url'=>array('index')),
	array('label'=>'Create Tipocontacto', 'url'=>array('create')),
	array('label'=>'View Tipocontacto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tipocontacto', 'url'=>array('admin')),
);
?>

<h1>Update Tipocontacto <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>