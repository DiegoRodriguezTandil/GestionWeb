<?php
/* @var $this TelefonoController */
/* @var $data Telefono */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('localidad')); ?>:</b>
	<?php echo CHtml::encode($data->localidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoid')); ?>:</b>
	<?php echo CHtml::encode($data->tipoid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personaid')); ?>:</b>
	<?php echo CHtml::encode($data->personaid); ?>
	<br />


</div>