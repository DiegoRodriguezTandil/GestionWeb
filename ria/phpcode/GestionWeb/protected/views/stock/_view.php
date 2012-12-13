<?php
/* @var $this StockController */
/* @var $data Stock */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idproducto')); ?>:</b>
	<?php echo CHtml::encode($data->idproducto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidadMIN')); ?>:</b>
	<?php echo CHtml::encode($data->cantidadMIN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidadMAX')); ?>:</b>
	<?php echo CHtml::encode($data->cantidadMAX); ?>
	<br />


</div>