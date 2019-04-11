<?php
/* @var $this JurInformesController */
/* @var $model JurInformes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jur-informes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Distrito Perteneciente'); ?>
		<?php echo $form->dropDownList($model,'id_lugar',JurInformes::getListLugar()); ?>
		<?php echo $form->error($model,'id_lugar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tipo de Vicitima'); ?>
		<?php echo $form->dropDownList($model,'id_tipo_victima',JurInformes::getListTipoVic()); ?>
		<?php echo $form->error($model,'id_tipo_victima'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Atencion Recibida'); ?>
		<?php echo $form->dropDownList($model,'id_atencion',JurInformes::getListAtencion()); ?>
		<?php echo $form->error($model,'id_atencion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tipo de Registro'); ?>
		<?php echo $form->dropDownList($model,'tipo_registro',array('Primera Vez'=>'Primera Vez','Seguimiento'=>'Seguimiento')); ?>
		<?php echo $form->error($model,'tipo_registro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fecha de Captura'); ?>
			<?php
		$this->widget("zii.widgets.jui.CJuiDatePicker",array(
		"attribute"=>"fecha_informe",
		"model"=>$model,
		"language"=>"es",
		"options"=>array(
			'autoSize'=>'true',
		  	'changeMonth' => 'true', 
		    'changeYear' => 'true', 
			 'dateFormat' => 'dd-mm-yy',
			'yearRange'=>'1910:2099',
			'defaultDate'=>$model->fecha_informe,
			),
 			'htmlOptions'=>array('readonly' => true)
 			));?>
		<?php echo $form->error($model,'fecha_informe'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'¿Carpeta de Investigacion?'); ?>
		<?php echo $form->dropDownList($model,'carpeta_inv',array('Si'=>'Si',
																  'No'=>'No')); ?>
		
		<?php echo $form->error($model,'carpeta_inv'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'# C E E A V'); ?>
		<?php echo $form->textField($model,'ceeav',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ceeav'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Municipio'); ?>
		<?php echo $form->dropDownList($model,'id_municipio', JurInformes::getListMunicipios()); ?>
		<?php echo $form->error($model,'id_municipio'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'localidad'); ?>
		<?php echo $form->textField($model,'localidad',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'localidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'Genero'); ?>
		<?php echo $form->dropDownList($model,'id_genero',JurInformes::getListGenero()); ?>
		<?php echo $form->error($model,'id_genero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Edad'); ?>
		<?php echo $form->textField($model,'edad'); ?>
		<?php echo $form->error($model,'edad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Estado Civil'); ?>
		<?php echo $form->dropDownList($model,'id_estado_civil', JurInformes::getListEstadoCivil()); ?>
		<?php echo $form->error($model,'id_estado_civil'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'adscripcion_indigena'); ?>
		<?php echo $form->dropDownList($model,'adscripcion_indigena',array('Si'=>'Si',
																  'No'=>'No')); ?>
		<?php echo $form->error($model,'adscripcion_indigena'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'migrante'); ?>
		<?php echo $form->dropDownList($model,'migrante',array('Si'=>'Si',
																  'No'=>'No')); ?>
		<?php echo $form->error($model,'migrante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Escolaridad'); ?>
		<?php echo $form->dropDownList($model,'id_escolaridad',JurInformes::getListEscolaridad()); ?>
		<?php echo $form->error($model,'id_escolaridad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Situacion Economica'); ?>
		<?php echo $form->dropDownList($model,'id_situacion_economica',JurInformes::getListSituacion()); ?>
		<?php echo $form->error($model,'id_situacion_economica'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'Delito'); ?>
		<?php echo $form->dropDownList($model,'id_delito',JurInformes::getListDelitos()); ?>
		<?php echo $form->error($model,'id_delito'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'canalizacion'); ?>
		<?php echo $form->dropDownList($model,'canalizacion',array('Si'=>'Si',
																  'No'=>'No')); ?>
		<?php echo $form->error($model,'canalizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Asesor Juridico'); ?>
		<?php echo $form->dropDownList($model,'id_asesor_juridico',JurInformes::getListAsesores()); ?>
		<?php echo $form->error($model,'id_asesor_juridico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'psicologo'); ?>
		<?php echo $form->dropDownList($model,'psicologo',array('Si'=>'Si',
																  'No'=>'No')); ?>
		<?php echo $form->error($model,'psicologo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Observaciones'); ?>
		<?php echo $form->textField($model,'descripcion_psicologo',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'descripcion_psicologo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->