<?php
$this->breadcrumbs=array(
	'Provincias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Provincia','url'=>array('index')),
	array('label'=>'Nuevo/a Provincia','url'=>array('create')),
	array('label'=>'Ver Provincia','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar Provincia','url'=>array('admin')),
);
?>

<h1>Update Provincia <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>