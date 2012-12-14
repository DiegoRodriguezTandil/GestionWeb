<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'persona-form',
	'type'=>'horizontal',
	'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'apellido',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'empresa',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'dni',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'web',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'foto',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'intereses',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'cuit',array('class'=>'span5','maxlength'=>15)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
