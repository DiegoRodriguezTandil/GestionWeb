<?php
$this->breadcrumbs=array(
	'Tipocontactos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Tipocontacto','url'=>array('index')),
	array('label'=>'Nuevo/a Tipocontacto','url'=>array('create')),
	array('label'=>'Ver Tipocontacto','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar Tipocontacto','url'=>array('admin')),
);
?>

<h1>Update Tipocontacto <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>