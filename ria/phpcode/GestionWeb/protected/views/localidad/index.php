<?php
/* @var $this LocalidadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Localidads',
);

$this->menu=array(
	array('label'=>'Create Localidad', 'url'=>array('create')),
	array('label'=>'Manage Localidad', 'url'=>array('admin')),
);
?>

<h1>Localidads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
