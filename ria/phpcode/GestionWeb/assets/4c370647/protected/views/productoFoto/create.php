<?php
$this->breadcrumbs=array(
	'Producto Fotos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar ProductoFoto','url'=>array('index')),
	array('label'=>'Administrar ProductoFoto','url'=>array('admin')),
);
?>

<h1>Create ProductoFoto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>