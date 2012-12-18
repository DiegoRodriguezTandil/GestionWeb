<?php
$this->breadcrumbs=array(
	'Tipocontactos',
);

$this->menu=array(
	array('label'=>'Nuevo/a Tipocontacto','url'=>array('create')),
	array('label'=>'Administrar Tipocontacto','url'=>array('admin')),
);
?>

<h1>Tipocontactos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
