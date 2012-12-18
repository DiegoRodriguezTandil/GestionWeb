<?php
$this->breadcrumbs=array(
	'Tipocontactos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Tipocontacto','url'=>array('index')),
	array('label'=>'Administrar Tipocontacto','url'=>array('admin')),
);
?>

<h1>Create Tipocontacto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>