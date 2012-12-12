<?php
/* @var $this LocalidadController */
/* @var $data Localidad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provinciaid')); ?>:</b>
	<?php echo CHtml::encode($data->provinciaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigotelefonico')); ?>:</b>
	<?php echo CHtml::encode($data->codigotelefonico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigopostal')); ?>:</b>
	<?php echo CHtml::encode($data->codigopostal); ?>
	<br />


</div>