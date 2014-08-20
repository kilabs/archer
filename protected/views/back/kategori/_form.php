<?php
/* @var $this KategoriController */
/* @var $model Kategori */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kategori-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form','enctype'=>'multipart/form-data'), 
)); ?>

	<div class="alert alert-info">
		Fields with <span class="required">*</span> are required.
		<?php echo $form->errorSummary($model); ?>
	</div>

	<div class="form-group">            
            <?php echo $form->labelEx($model,'nama',array('class'=>'col-sm-2 control-label')); ?>            
            <div class="col-sm-10">
			<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nama'); ?>
		</div>                            
	</div>

	<div class="form-group">            
            <?php echo $form->labelEx($model,'status',array('class'=>'col-sm-2 control-label')); ?>            
            <div class="col-sm-10">
		<?php echo $form->dropDownList($model,'status',Kategori::listStatus(),array('maxlength'=>200,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>                            
	</div>

	<div class="form-group">            
        <?php echo $form->labelEx($model,'urut',array('class'=>'col-sm-2 control-label')); ?>            
        <div class="col-sm-10">
			<?php echo $form->textField($model,'urut',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'urut'); ?>
		</div>
	</div>

	<div class="form-group">            
        <?php echo $form->labelEx($model,'slug',array('class'=>'col-sm-2 control-label')); ?>            
        <div class="col-sm-10">
			<?php echo $form->textField($model,'slug',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'slug'); ?>
		</div>
	</div>

	<div class="form-group">
        <?php echo $form->labelEx($model,'image',array('class'=>'col-sm-2 control-label')); ?> 
        <div class="col-sm-10">
            <div class="fileupload fileupload-new" data-provides="fileupload">
            	<?php if ($model->image): ?>
            		<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo LUpload::thumbs('Kategori',$model->image,'200x150'); ?>" alt="" /></div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            	<?php else: ?>
            		<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
            	<?php endif ?>
                <div>
                    <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><?php echo $form->fileField($model,'imageFile'); ?>  </span>
                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
        </div>
    </div>

	<div class="form-group ">            
            <div class="col-sm-10 col-sm-offset-2 "> 
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-danger')); ?>
            </div>
	</div>  

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
Yii::app()->clientScript->registerScript('slug',
        "
        $( '#Kategori_nama' ).keyup(function() {
            var Text = $(this).val();
             Text = Text.toLowerCase();
             Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
             $('#Kategori_slug').val(Text);  
        });                
        ",
        CClientScript::POS_READY);

Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/css/bootstrap-fileupload.min.css');

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/jasny/js/bootstrap-fileupload.js',  CClientScript::POS_END);
