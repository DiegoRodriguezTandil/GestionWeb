<?php
/* @var $this StockController */
/* @var $model Stock */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idproducto'); ?>
		<?php echo $form->textField($model,'idproducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidadMIN'); ?>
		<?php echo $form->textField($model,'cantidadMIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidadMAX'); ?>
		<?php echo $form->textField($model,'cantidadMAX'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->