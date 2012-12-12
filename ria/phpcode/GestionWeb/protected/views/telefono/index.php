<?php
/* @var $this TelefonoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Telefonos',
);

$this->menu=array(
	array('label'=>'Create Telefono', 'url'=>array('create')),
	array('label'=>'Manage Telefono', 'url'=>array('admin')),
);
?>

<h1>Telefonos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
