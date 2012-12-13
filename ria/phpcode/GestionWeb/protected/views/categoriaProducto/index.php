<?php
/* @var $this CategoriaProductoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categoria Productos',
);

$this->menu=array(
	array('label'=>'Create CategoriaProducto', 'url'=>array('create')),
	array('label'=>'Manage CategoriaProducto', 'url'=>array('admin')),
);
?>

<h1>Categoria Productos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
