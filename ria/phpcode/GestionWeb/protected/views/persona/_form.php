<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'persona-form',
	'type'=>'horizontal',
	'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary(array_merge(array($model), $mails)); ?>
	
	<?php echo $form->textFieldRow($model,'apellido',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'empresa',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'dni',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'web',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'foto',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'intereses',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'cuit',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'fechaAlta',array('class'=>'span5')); ?>
	
	Mails
	
	<?php foreach($mails as $i => $mail): ?>
    <div id="mail-<?php echo $i ?>">
        <div class="simple">   
            <?php echo $form->textFieldRow($mail,"[$i]direccion",array('class'=>'span5 mailclass','prepend'=>'@')); ?>
            <?php echo $form->textFieldRow($mail,"[$i]tipo",array('class'=>'span5 mailclass')); ?>
        </div>
        <br />
    </div>
    <?php endforeach; ?>
    <?php echo CHtml::button('Agregar e-mail', array('name'=>'addmails', 'id'=>'addmails')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Guardar',
		)); ?>
	</div>
	
	<script type="text/javascript">
		var marker = $('input[id^="yt"]'); 
		// I need to know how many photos I've already added when the validate return FALSE
		var mailsAgregados = <?php echo $mailsAgregados; ?>;
		//$('input[id^="yt"]').remove();
		
		// Add the event to the period's add button
		$('#addmails').click(function () { 
		    // I'm going to clone the first div containing the Model input couse I don't want to create a new div and add every single structure
		    var divCloned = $('#mail-0').clone();      
		    // I'm attaching the div to the last input created
		    $('#mail-'+(mailsAgregados++)).after(divCloned);
		    // Changin the div id
		    divCloned.attr('id', 'mail-'+mailsAgregados);
		    // Initializing the div contents
		    initNewInputs(divCloned.children('.simple'), mailsAgregados);
		});
		 
		function initNewInputs( divs, idNumber ) {//alert(idNumber);
		    // Taking the div labels and resetting them. If you send wrong information,
		    // Yii will show the errors. If you than clone that div, the css will be cloned too, so we have to reset it
		    var labels = divs.children('label').get();
		    for ( var i in labels )
		        labels[i].setAttribute('class', 'required');      
		 
		    // Taking all inputs and resetting them.
		    // We have to set value to null, set the class attribute to null and change their id and name with the right id.
		    var inputs = $('.mailclass');//divs.children('input .mailclass').get();  
		    
		    		 	debugger;
		    $(divs).find('.mailclass').each(function () {    
		    	$(this).val('');alert($(this).attr("name"));
		    	//$(this).setAttribute('class', '');
		        $(this).attr("id",$(this).attr("id").replace('0', idNumber));
		        $(this).attr("name",$(this).attr("name").replace('0', idNumber););
		      });
		        




		    for ( var i in inputs  ) {alert('entra en for');
		        inputs[i].value = "";
		        inputs[i].setAttribute('class', '');
		        inputs[i].id = inputs[i].id.replace(/\d+/, idNumber);
		        inputs[i].name = inputs[i].name.replace(/\d+/, idNumber);
		        alert( inputs[i].name);
		    }
		}
		</script>

<?php $this->endWidget(); ?>
