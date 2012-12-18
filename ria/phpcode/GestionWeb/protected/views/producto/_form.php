<?php
/* @var $this ProductoController */
/* @var $model Producto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'producto-form',
	'type'=>'horizontal',
	'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos obligatorios <span class="required">*</span>.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precioVentaUnitario'); ?>
		<?php echo $form->textField($model,'precioVentaUnitario',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'precioVentaUnitario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'categoria_id'); ?>
		<?php echo $form->dropDownList($model,'categoria_id', CHtml::listData(Categoriaproducto::model()->findAll(), 'id', 'categoria')); ?>
		<?php echo $form->error($model,'categoria_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precioCostoUnitario'); ?>
		<?php echo $form->textField($model,'precioCostoUnitario',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'precioCostoUnitario'); ?>
	</div>

	<div class="row buttons">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->