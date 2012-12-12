<?php
/* @var $this TipocontactoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipocontactos',
);

$this->menu=array(
	array('label'=>'Create Tipocontacto', 'url'=>array('create')),
	array('label'=>'Manage Tipocontacto', 'url'=>array('admin')),
);
?>

<h1>Tipocontactos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
