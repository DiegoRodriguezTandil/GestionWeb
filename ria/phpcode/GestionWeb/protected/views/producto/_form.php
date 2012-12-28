<?php
/* @var $this ProductoController */
/* @var $model Producto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
	$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'producto-form',
	'type'=>'horizontal','stateful'=>true, 
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos <span class="required">*</span> obligatorios.</p>
 
    <?php echo $form->errorSummary(array_merge( array($model), $photosProduct)); ?>

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
	
	    <?php echo CHtml::button('add Photos', array('name'=>'addPhotos', 'id'=>'addPhotos')); ?>
	    
    <?php foreach($photosProduct as $i => $photo): //echo($photo->url); die();
    	?>
    <div id="photo-<?php echo $i;?>">
        <div class="simple">   
            <?php echo CHtml::activeLabelEx($photo,'url'); ?>
            <?php echo CHtml::activeFileField($photo, "url[$i]", array('class'=>'span5','maxlength'=>255)); ?>
        </div>
        <br />
    </div>
    <?php endforeach; ?>
 
    <div class="row action">
        <?php //echo CHtml::submitButton($update ? 'Save' : 'Create', array('name'=>'submitDatas')); ?>
    </div>
    	<div class="row buttons">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'htmlOptions'=>array('name'=>'submitDatas'),
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

 
<script type="text/javascript">
var marker = $('input[id^="yt"]'); 
// I need to know how many photos I've already added when the validate return FALSE
var photosAdded = <?php echo $photosNumber; ?>;
//$('input[id^="yt"]').remove();

// Add the event to the period's add button
$('#addPhotos').click(function () { alert('entra');
    // I'm going to clone the first div containing the Model input couse I don't want to create a new div and add every single structure
    var divCloned = $('#photo-0').clone();      
    // I'm attaching the div to the last input created
    $('#photo-'+(photosAdded++)).after(divCloned);
    // Changin the div id
    divCloned.attr('id', 'photo-'+photosAdded);
    // Initializing the div contents
    initNewInputs(divCloned.children('.simple'), photosAdded);
});
 
function initNewInputs( divs, idNumber ) {
    // Taking the div labels and resetting them. If you send wrong information,
    // Yii will show the errors. If you than clone that div, the css will be cloned too, so we have to reset it
    var labels = divs.children('label').get();
    for ( var i in labels )
        labels[i].setAttribute('class', 'required');      
 
    // Taking all inputs and resetting them.
    // We have to set value to null, set the class attribute to null and change their id and name with the right id.
    var inputs = divs.children('input').get();      
 
    for ( var i in inputs  ) {
        inputs[i].value = "";
        inputs[i].setAttribute('class', '');
        inputs[i].id = inputs[i].id.replace(/\d+/, idNumber);
        inputs[i].name = inputs[i].name.replace(/\d+/, idNumber);
    }
}
</script>
	

	<!--div class="row buttons">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div-->

<?php $this->endWidget(); ?>

</div><!-- form -->