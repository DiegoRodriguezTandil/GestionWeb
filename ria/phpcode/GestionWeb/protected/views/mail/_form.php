<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mail-form',
	'type'=>'horizontal',
	'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'tipo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'direccion',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'persona_id',array('class'=>'span5')); ?>
	
	<?php echo CHtml::button('add Photos', array('name'=>'addPhotos', 'id'=>'addPhotos')); ?>
 
    <?php foreach($photosEvent as $i => $photo): ?>
    <div id="photo-<?php echo $i ?>">
        <div class="simple">   
            <?php echo CHtml::activeLabelEx($photo,'photoUrl'); ?>
            <?php echo CHtml::activeFileField($photo, "photoUrl[$i]"); ?>
        </div>
        <br />
    </div>
    <?php endforeach; ?>
 

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
