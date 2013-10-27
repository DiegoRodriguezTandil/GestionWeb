<?php
$this->breadcrumbs=array(
	'Mails'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Mail','url'=>array('index')),
	array('label'=>'Nuevo/a Mail','url'=>array('create')),
	array('label'=>'Ver Mail','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar Mail','url'=>array('admin')),
);
?>

<h1>Update Mail <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>