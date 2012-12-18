<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'razon social',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'empresa',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'dni',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'web',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'foto',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'intereses',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'cuit',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'fechaAlta',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
