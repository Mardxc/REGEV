<?php
/* @var $this DetDelitosVicDirectaController */
/* @var $model DetDelitosVicDirecta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'det-delitos-vic-directa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_delito'); ?>
		<?php echo $form->textField($model,'id_delito'); ?>
		<?php echo $form->error($model,'id_delito'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_victima_directa'); ?>
		<?php echo $form->textField($model,'id_victima_directa'); ?>
		<?php echo $form->error($model,'id_victima_directa'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->