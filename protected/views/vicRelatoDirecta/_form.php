<?php
/* @var $this VicRelatoDirectaController */
/* @var $model VicRelatoDirecta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vic-relato-directa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'calle_rel'); ?>
		<?php echo $form->textField($model,'calle_rel',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'calle_rel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_int_rel'); ?>
		<?php echo $form->textField($model,'num_int_rel',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'num_int_rel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_ext_rel'); ?>
		<?php echo $form->textField($model,'num_ext_rel',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'num_ext_rel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo_postal_rel'); ?>
		<?php echo $form->textField($model,'codigo_postal_rel',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'codigo_postal_rel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'colonia_rel'); ?>
		<?php echo $form->textField($model,'colonia_rel',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'colonia_rel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'localidad_rel'); ?>
		<?php echo $form->textField($model,'localidad_rel',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'localidad_rel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_estado'); ?>
		<?php echo $form->textField($model,'id_estado'); ?>
		<?php echo $form->error($model,'id_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_municipio'); ?>
		<?php echo $form->textField($model,'id_municipio'); ?>
		<?php echo $form->error($model,'id_municipio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_rel'); ?>
		<?php echo $form->textField($model,'fecha_rel',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'fecha_rel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>5000)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_victima_directa'); ?>
		<?php echo $form->textField($model,'id_victima_directa',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'id_victima_directa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->