<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'persona-form',
	'type'=>'horizontal',
	'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary(array_merge(array($model), $mails, $tels)); ?>
	
	<?php echo $form->textFieldRow($model,'apellido',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'empresa',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'dni',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'web',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'foto',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'intereses',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'cuit',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'fechaAlta',array('class'=>'span5')); ?>
	
	Mails<a name="addmails" id="addmails" class="icon-plus-sign" type="button" type="buttton"></a>
	
	<?php foreach($mails as $i => $mail): ?>
    <div id="mail-<?php echo $i ?>">
        <div class="simple">   
            <?php echo $form->textFieldRow($mail,"[$i]direccion",array('class'=>'span5 mailclass','prepend'=>'@')); ?>
			<?php echo $form->dropDownListRow($mail, "[$i]tipo", CHtml::listData(Tipocontacto::model()->findAll(), 'id', "tipo"), array('class'=>'span5 mailclass')); ?>           
        </div>
        <br />
    </div>
    <?php endforeach; ?>
    
        Teléfonos<a name="addtels" id="addtels" class="icon-plus-sign" type="button" type="buttton"></a>
	
	<?php foreach($tels as $i => $tel): ?>
    <div id="tel-<?php echo $i ?>" >
    		<div class="simple">
            <?php echo $form->textFieldRow($tel,"[$i]localidad",array('class'=>'span5 telclass')); ?>          
            <?php echo $form->textFieldRow($tel,"[$i]numero",array('class'=>'span5 telclass input-small')); ?>
            <?php echo $form->dropDownListRow($tel, "[$i]tipoid", CHtml::listData(Tipocontacto::model()->findAll(), 'id', "tipo"), array('class'=>'telclass')); ?> 
            <?php echo $form->dropDownListRow($tel, "[$i]localidad", CHtml::listData(Localidad::model()->findAll(), 'id', "nombre"), array('class'=>'telclass')); ?>
            </div>   
    </div>
   <?php endforeach; ?>
       
        Dirección<a name="adddirs" id="adddirs" class="icon-plus-sign" type="button" type="buttton"></a>
	
	<?php foreach($dirs as $i => $dir): ?>
    <div id="dir-<?php echo $i ?>">
    		<div class="simple">
            <?php echo $form->textFieldRow($dir,"[$i]calle",array('class'=>'span5 dirclass')); ?>          
            <?php echo $form->textFieldRow($dir,"[$i]numero",array('class'=>'span5 dirclass input-small')); ?>
            <?php echo $form->dropDownListRow($dir, "[$i]tipodireccion", CHtml::listData(Tipocontacto::model()->findAll(), 'id', "tipo"), array('class'=>'dirclass')); ?> 
            <?php echo $form->dropDownListRow($dir, "[$i]localidad", CHtml::listData(Localidad::model()->findAll(), 'id', "nombre"), array('class'=>'dirclass')); ?>
            </div>   
    </div>
    <?php endforeach; ?>
   
   
	
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
		    // Clonamos el primer elemento en un div
		    var divCloned = $('#mail-0').clone();      
		    //Agregamos el div clonado al último agregado y aumentamos los mails agregados
		    $('#mail-'+(mailsAgregados++)).after(divCloned);
		    // Cambiamos el id del div
		    divCloned.attr('id', 'mail-'+mailsAgregados);
		    //Inicializamos los divs.
		    initNewInputs(divCloned.children('.simple'), mailsAgregados, '.mailclass');
		});
		
		//Funcionalidad de teléfonos, igual a la anterior
		var telsAgregados = <?php echo $telsAgregados; ?>;
		$('#addtels').click(function () {
		    var divCloned = $('#tel-0').clone();      
		    $('#tel-'+(telsAgregados++)).after(divCloned);
		    divCloned.attr('id', 'tel-'+telsAgregados);
		    initNewInputs(divCloned.children('.simple'), telsAgregados, '.telclass');
		});
		
		//Funcionalidad de direcciones, igual a la anterior
		var dirsAgregados = <?php echo $dirsAgregados; ?>;
		$('#adddirs').click(function () {
		    var divCloned = $('#dir-0').clone();      
		    $('#dir-'+(dirsAgregados++)).after(divCloned);
		    divCloned.attr('id', 'dir-'+dirsAgregados);
		    initNewInputs(divCloned.children('.simple'), dirsAgregados, '.dirclass');
		});
		 
		function initNewInputs( divs, idNumber, classString ) {alert(idNumber);
		    // Taking the div labels and resetting them. If you send wrong information,
		    // Yii will show the errors. If you than clone that div, the css will be cloned too, so we have to reset it
		    var labels = divs.children('label').get();
		    debugger;
		    for ( var i in labels )
		        labels[i].setAttribute('class', 'required');    
		    var inputs = $(classString);		    
		    $(divs).find(classString).each(function () {    
		    	$(this).val('');
		        $(this).attr("id",$(this).attr("id").replace('0', idNumber));
		        $(this).attr("name",$(this).attr("name").replace('0', idNumber));
		      });  	
		}
		</script>

<?php $this->endWidget(); ?>
