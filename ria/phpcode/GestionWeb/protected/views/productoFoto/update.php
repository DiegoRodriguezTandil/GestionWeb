<?php
$this->breadcrumbs=array(
	'Producto Fotos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar ProductoFoto','url'=>array('index')),
	array('label'=>'Nuevo/a ProductoFoto','url'=>array('create')),
	array('label'=>'Ver ProductoFoto','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar ProductoFoto','url'=>array('admin')),
);
?>

<h1>Update ProductoFoto <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>