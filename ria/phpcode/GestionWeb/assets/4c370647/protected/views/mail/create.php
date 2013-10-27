<?php
$this->breadcrumbs=array(
	'Mails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Mail','url'=>array('index')),
	array('label'=>'Administrar Mail','url'=>array('admin')),
);
?>

<h1>Create Mail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>