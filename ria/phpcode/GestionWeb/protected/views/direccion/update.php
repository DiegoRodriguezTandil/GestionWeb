<?php
$this->breadcrumbs=array(
	'Direccions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Direccion','url'=>array('index')),
	array('label'=>'Nuevo/a Direccion','url'=>array('create')),
	array('label'=>'Ver Direccion','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar Direccion','url'=>array('admin')),
);
?>

<h1>Update Direccion <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>