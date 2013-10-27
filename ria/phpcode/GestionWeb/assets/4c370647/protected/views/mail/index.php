<?php
$this->breadcrumbs=array(
	'Mails',
);

$this->menu=array(
	array('label'=>'Nuevo/a Mail','url'=>array('create')),
	array('label'=>'Administrar Mail','url'=>array('admin')),
);
?>

<h1>Mails</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
