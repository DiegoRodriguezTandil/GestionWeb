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

	<?php echo $form->textFieldRow($model,'web',array('class'=>'span5','maxlength'=>45,'prepend'=>'www.')); ?>

	<?php echo $form->textFieldRow($model,'intereses',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'cuit',array('class'=>'span5','maxlength'=>15)); ?>

	<?php
		if (!$model->isNewRecord) {
			echo $form->textFieldRow($model, 'fechaAlta', array('disabled'=>true, 'class'=>'span5')); }
	 ?>
	 
	 <div id="subset">
    Teléfonos<a name="addtels" id="addtels" class="icon-plus-sign add" type="button" type="buttton" data-detail="tel"></a>	
	<?php foreach($tels as $i => $tel): ?>
    <div id="tel-<?php echo $i ?>" class="tel">
    		<div class="simple">       
    		<?php echo $form->hiddenField($tel,"[$i]id",array()); ?>         
    		<?php echo $form->textFieldRow($tel,"[$i]numero",array('class'=>'span5 telclass input-small')); ?>  
    		<?php echo $form->dropDownListRow($tel, "[$i]localidad", CHtml::listData(Localidad::model()->findAll(), 'id', "nombre"), array('class'=>'telclass')); ?>   
            <?php echo $form->dropDownListRow($tel, "[$i]tipoid", CHtml::listData(Tipocontacto::model()->findAll(), 'id', "tipo"), array('class'=>'telclass')); ?>
            <?php
			    echo CHtml::ajaxLink(
			                '',
			                array('telefono/delete'),
			                array('data'=>array('id'=>$tel->id ),  
			                 'complete' => 'js:function(){    $("#subset > #tel-'.$i.'").removeClass("loading"); 
			                 				if ('.$i.' != 0) $("#subset > #tel-'.$i.'").remove(); 
			                 				else $("#subset > #tel-'.$i.'").hide();								 
			                 				}',
			                'beforeSend' => 'js:function(){ if(confirm("Está seguro de querer eliminar el teléfono?"))
			                				{$("#subset > #tel-'.$i.'").addClass("loading"); return true;} else return false;}',
			                'success' => "js:function(html){ alert('Teléfono eliminado'); }"),
							array('id'=>'ajaxSubmitBtntel'.$i,'name'=>'ajaxSubmitBtntel'.$i, 'class'=>'icon-trash deleteMail telclass', "style"=>"float: right;margin-right: 10px; margin-top: -30px;")
							
							);    
			?>	 
            <hr />
            </div>   
    </div>
   <?php endforeach; ?>

   </div>
    <div id="subset">    
   Dirección<a name="adddirs" id="adddirs" class="add icon-plus-sign" type="button" type="buttton" data-detail="dir"></a>
	
	<?php foreach($dirs as $i => $dir): ?>
    <div id="dir-<?php echo $i ?>" class="dir">
    		<div class="simple">
    		<?php echo $form->hiddenField($dir,"[$i]id",array()); ?> 
            <?php echo $form->textFieldRow($dir,"[$i]calle",array('class'=>'span5 dirclass')); ?>          
            <?php echo $form->textFieldRow($dir,"[$i]numero",array('class'=>'span5 dirclass input-small')); ?>           
            <?php echo $form->dropDownListRow($dir, "[$i]localidad", CHtml::listData(Localidad::model()->findAll(), 'id', "nombre"), array('class'=>'dirclass')); ?>
            <?php echo $form->dropDownListRow($dir, "[$i]tipodireccion", CHtml::listData(Tipocontacto::model()->findAll(), 'id', "tipo"), array('class'=>'dirclass')); ?>
            <?php echo CHtml::ajaxLink(
			                '',
			                array('direccion/delete'),
			                array('data'=>array('id'=>$dir->id ),  
			                'complete' => 'js:function(){    $("#subset > #dir-'.$i.'").removeClass("loading"); 
			                 				if ('.$i.' != 0) $("#subset > #dir-'.$i.'").remove(); 
			                 				else $("#subset > #dir-'.$i.'").hide();								 
			                 				}',
			                'beforeSend' => 'js:function(){if(confirm("Está seguro de querer eliminar la dirección?"))
			                				{$("#subset > #dir-'.$i.'").addClass("loading"); return true;} else return false;}',
			                'success' => "js:function(html){ alert('Dirección eliminada'); }"),
							array('id'=>'ajaxSubmitBtndir'.$i,'name'=>'ajaxSubmitBtndir'.$i, 'class'=>'icon-trash deleteDetail deleteMail dirclass', "style"=>"float: right;margin-right: 10px; margin-top: -30px;")
							
							);    
			?>	 
             <hr /> 
            </div>   
    </div>
    <?php endforeach; ?>
    </div>
   
	
	<div id="subset">
	Mails<a name="addmails" id="add" class="icon-plus-sign add" type="button" type="buttton" data-detail="mail"></a>
	<?php foreach($mails as $i => $mail): ?>
    <div id="mail-<?php echo $i ?>" class="mail">
        <div class="simple">   
            <?php echo $form->textFieldRow($mail,"[$i]direccion",array('class'=>'span5 mailclass','prepend'=>'@')); ?>
            <?php echo $form->hiddenField($mail,"[$i]id",array('class'=>'span5 mailclass')); ?>            
            <?php echo $form->dropDownListRow($mail, "[$i]tipo", CHtml::listData(Tipocontacto::model()->findAll(), 'id', "tipo"), array('class'=>'span5 mailclass')); ?>
			<?php
			    echo CHtml::ajaxLink(
			                '',
			                array('mail/delete'),
			                array('data'=>array('id'=>$mail->id ),  
			                 'complete' => 'js:function(){    $("#subset > #mail-'.$i.'").removeClass("loading"); 
			                 				if ('.$i.' != 0) $("#subset > #mail-'.$i.'").remove(); 
			                 				else $("#subset > #mail-'.$i.'").hide();								 
			                 				}',
			                'beforeSend' => 'js:function(){if(confirm("Está seguro de querer eliminar el mail?"))
			                				{$("#subset > #mail-'.$i.'").addClass("loading"); return true;} else return false;}',
			                'success' => "js:function(html){ alert('Mail eliminado'); }"),
							array('id'=>'ajaxSubmitBtnmail'.$i,'name'=>'ajaxSubmitBtnmail'.$i, 'class'=>'icon-trash deleteMail mailclass', "style"=>"float: right;margin-right: 10px; margin-top: -30px;")
							
							);    
			?>	
			<hr />           
        </div>
    </div>
    <?php endforeach; ?>
    </div>
    <div>
    <?php //echo Yii::app() -> getBasePath(); die();
		$this->widget('xupload.XUpload', array(
		                    'url' =>  Yii::app()->createUrl("site/uploads"),
		                    'model' => $model,
		                    'attribute' => 'foto',
		                    'multiple' => true,
		));
	?>
    </div>
    
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Guardar',
		)); ?>
	</div>
	
	
	<script type="text/javascript">
		var marker = $('input[id^="yt"]'); 
		var mailsAgregados = $('.mail').size();
		var divClonedMail = $('#mail-0').clone();      
		var divClonedTel = $('#tel-0').clone();
		var divClonedDir = $('#dir-0').clone();     	

		
		var detailsArray = new Array('mail', 'tel', 'dir');
		detailsArray['mail'] = $('.mail').size();
		detailsArray['tel'] = $('.tel').size();
		detailsArray['dir'] = $('.dir').size();
		
		
		
			
		$('.add').click(function () { 
			//q tipo es
			var $detail = $(this).data('detail');		
			if ((detailsArray[$detail] == 0) && $('.'+$detail+':first').is(":hidden"))
				{$('.'+$detail+':first').find('.'+$detail+'class').each(function () {  
					$(this).val('');});
				$('.'+$detail+':first').show();
				detailsArray[$detail]++;		
				}
			else {		
				var divCloned = $('.'+$detail+':first').clone();
				$('.'+$detail+':last').after(divCloned); 
				detailsArray[$detail]++;
			    divCloned.attr('id', $detail+'-'+detailsArray[$detail]);
			    divCloned.show();
			    initNewInputs(divCloned.children('.simple'), detailsArray[$detail], '.'+$detail+'class'); debugger;
			    divCloned.children().find('a').click (function(){ debugger; divCloned.fadeOut().remove(); });
			  }
		});
		
		
		function initNewInputs( divs, idNumber, classString ) {
		    var labels = divs.children('label').get();
		    for ( var i in labels )
		        labels[i].setAttribute('class', 'required');    
		    var inputs = $(classString);		    
		    $(divs).find(classString).each(function () {    
		    	$(this).val('');
		        $(this).attr("value",'');
		        $(this).attr("id",$(this).attr("id").replace('0', idNumber));
		        $(this).attr("name",$(this).attr("name").replace('0', idNumber));
		      });  	
		}
		</script>

<?php $this->endWidget(); ?>
