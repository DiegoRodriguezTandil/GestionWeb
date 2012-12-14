<?php
/* @var $this ProductoController */
/* @var $data Producto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precioVentaUnitario')); ?>:</b>
	<?php echo CHtml::encode($data->precioVentaUnitario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoriaid')); ?>:</b>
	<?php echo CHtml::encode($data->categoriaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precioCostoUnitario')); ?>:</b>
	<?php echo CHtml::encode($data->precioCostoUnitario); ?>
	<br />


</div>