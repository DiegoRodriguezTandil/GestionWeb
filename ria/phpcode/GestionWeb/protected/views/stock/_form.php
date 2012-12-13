<?php
/* @var $this StockController */
/* @var $model Stock */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Producto'); ?>
		<?php echo $form->dropDownList($model,'idproducto', CHtml::listData(Producto::model()->findAll(), 'id', 'nombre')); ?>
		<?php echo $form->error($model,'idproducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidadMIN'); ?>
		<?php echo $form->textField($model,'cantidadMIN'); ?>
		<?php echo $form->error($model,'cantidadMIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidadMAX'); ?>
		<?php echo $form->textField($model,'cantidadMAX'); ?>
		<?php echo $form->error($model,'cantidadMAX'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->