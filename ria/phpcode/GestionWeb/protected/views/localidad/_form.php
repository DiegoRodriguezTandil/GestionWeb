<?php
/* @var $this LocalidadController */
/* @var $model Localidad */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'localidad-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provinciaid'); ?>
		<?php //echo $form->textField($model,'provinciaid'); ?>
		<?php echo $form->dropDownList($model,'provinciaid', CHtml::listData(Provincia::model()->findAll(), 'id', 'nombre')); ?>
		<?php echo $form->error($model,'provinciaid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigotelefonico'); ?>
		<?php echo $form->textField($model,'codigotelefonico',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'codigotelefonico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigopostal'); ?>
		<?php echo $form->textField($model,'codigopostal',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'codigopostal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->