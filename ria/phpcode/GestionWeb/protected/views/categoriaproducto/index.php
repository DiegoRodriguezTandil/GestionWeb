<?php
/* @var $this CategoriaproductoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categoriaproductos',
);

$this->menu=array(
	array('label'=>'Create Categoriaproducto', 'url'=>array('create')),
	array('label'=>'Manage Categoriaproducto', 'url'=>array('admin')),
);
?>

<h1>Categoriaproductos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
