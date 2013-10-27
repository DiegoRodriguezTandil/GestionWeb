<?php
$this->breadcrumbs=array(
	'Provincias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Provincia','url'=>array('index')),
	array('label'=>'Administrar Provincia','url'=>array('admin')),
);
?>

<h1>Create Provincia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>