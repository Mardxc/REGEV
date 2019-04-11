<?php
/* @var $this SolSolicitanteController */
/* @var $model SolSolicitante */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 

        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
       'type'=>'horizontal',
            'htmlOptions'=>array('class'=>'well'),
	
)); ?>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Nombre Solicitante'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Apellido Paterno'); ?>
		<?php echo $form->textField($model,'ape_pat',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ape_pat'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">	
		<?php echo $form->labelEx($model,'Apellido Materno'); ?>
		<?php echo $form->textField($model,'ape_mat',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ape_mat'); ?>
	</div>
</div>
<div style="float:left;padding:10px;width:189px">
	<div class="row">
		<?php echo $form->labelEx($model,'Género'); ?>
		<?php echo $form->dropDownList($model,'id_genero',SolSolicitante::getListGenero(),
		array('style'=>'width:100%')); ?>
		<?php echo $form->error($model,'id_genero'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Fecha de Nacimiento'); ?>
			<?php
		$this->widget("zii.widgets.jui.CJuiDatePicker",array(
		"attribute"=>"fecha_nacimiento",
		"model"=>$model,
		"language"=>"es",
		"options"=>array(
			'autoSize'=>'true',
		  	'changeMonth' => 'true', 
		    'changeYear' => 'true', 
			 'dateFormat' => 'dd-mm-yy',
			'yearRange'=>'1910:2099',
			'defaultDate'=> '01-01-1910',
			 'value'=>$model->fecha_nacimiento,
				),
 			'htmlOptions'=>array('readonly' => true)
 			));?>
		<?php echo $form->error($model,'fecha_nacimiento'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Edad'); ?>
		<?php echo $form->textField($model,'edad',array('size'=>45,'maxlength'=>45,'class'=>'input-sm')); ?>
		<?php echo $form->error($model,'edad'); ?>

	</div>
</div>
<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Ocupación'); ?>
		<?php echo $form->dropDownList($model,'id_ocupacion',SolSolicitante::getListOcupaciones(),
		array('style'=>'width::100%','prompt'=>'Seleccione una Ocupación')); ?>
		<?php echo $form->error($model,'id_ocupacion'); ?>
	</div>
</div>
<div style="float:left;padding:10px;width:193px">
	<div class="row">
		<?php echo $form->labelEx($model,'Escolaridad'); ?>
		<?php echo $form->dropDownList($model,'id_escolaridad',SolSolicitante::getListEscolaridad(),
		array('style'=>'width:100%','prompt'=>'Seleccione Escolaridad')); ?>
		<?php echo $form->error($model,'id_escolaridad'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Discapacidad'); ?>
		<?php echo $form->dropDownList($model,'id_discapacidad',SolSolicitante::getListDiscapacidad(),
		array('style'=>'width::100%','prompt'=>'Seleccione una Discapacidad'));?>
		<?php echo $form->error($model,'id_discapacidad'); ?>
	</div>
</div>
<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Estado Civil'); ?>
		<?php echo $form->dropDownList($model,'id_estado_civil',SolSolicitante::getListEstadoCivil(),
		array('style'=>'width::100%','prompt'=>'Seleccione el Estado Civil'));?>
		<?php echo $form->error($model,'id_estado_civil'); ?>
	</div>
</div>
<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Nacionalidad'); ?>
		<?php echo $form->dropDownList($model,'id_nacionalidad',SolSolicitante::getListNacionalidad(),
		array('style'=>'width::100%', 'prompt'=>'Seleccione la Nacionalidad'));?>
		<?php echo $form->error($model,'id_nacionalidad'); ?>
	</div>
</div>
<div style="float:left;padding:10px;width:193px">
	<div class="row">
		<?php echo $form->labelEx($model,'País'); ?>
		<?php echo $form->dropDownList($model,'id_pais',SolSolicitante::getListPais(),
		array('style'=>'width:100%','prompt'=>'Seleccione un País'));?>
		<?php echo $form->error($model,'id_pais'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Estado'); ?>
		<?php echo $form->dropDownList($model,'id_estado',SolSolicitante::getListEstado(),
		array(
		'style'=>'width::20%',
		'prompt'=>'Seleccione un Estado',
		'ajax' => array(
        'type' => 'POST',
        //ENVIA POR POST EL "ID" DE NUESTRO ESTADO PARA PODER RECIBIRLO EN EL CONTROLADOR
        'url' => CController::createUrl('/SolSolicitante/Selectmunicipio'),
        //RECIBE EL METODO "selectMunicipio" PARA OBTENER EL "id" DE NUESTRO MUNICIPIO--->VAMOS AL CONTROLADOR
		'update' => '#'.CHtml::activeId($model,'id_municipio'),
                               
            		),
	     ));?>
	
		<?php echo $form->error($model,'id_estado'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Municipio'); ?>
		<?php echo $form->dropDownList($model,'id_municipio',SolSolicitante::getListMunicipio(),
		array(
			'style'=>'width::30%',
			'prompt'=>'Seleccione un Municipio'
			)
		);?>
		<?php echo $form->error($model,'id_municipio'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'calle'); ?>
		<?php echo $form->textField($model,'calle',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'calle'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 80px">
	<div class="row">
		<?php echo $form->labelEx($model,'N Ext'); ?>
		<?php echo $form->textField($model,'num_ext',array('size'=>45,'maxlength'=>45,'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'num_ext'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 80px">
	<div class="row">
		<?php echo $form->labelEx($model,'N Int'); ?>
		<?php echo $form->textField($model,'num_int',array('size'=>45,'maxlength'=>45,'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'num_int'); ?>		
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'colonia'); ?>
		<?php echo $form->textField($model,'colonia',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'colonia'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Código Postal'); ?>
		<?php echo $form->textField($model,'codigo_postal'); ?>
		<?php echo $form->error($model,'codigo_postal'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 430px">
	<div class="row">
		<?php echo $form->labelEx($model,'Teléfono / Celular'); ?>
		<?php echo $form->textField($model,'telefono_fijo'); ?>
		<?php echo $form->error($model,'telefono_fijo'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Calidad Migratoria'); ?>
		<?php echo $form->dropDownList($model,'id_calidad_migratoria',SolSolicitante::getListCalidad(),
		array('prompt'=>'Selecc Calidad Migratoria'));?>
		<?php echo $form->error($model,'id_calidad_migratoria'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Documentación Presentada'); ?>
		<?php echo $form->dropDownList($model,'id_documentos',SolSolicitante::getListDocumentos(),
		array('style'=>'width::100%', 'prompt'=>'Seleccione Documentos'));?>
		<?php echo $form->error($model,'id_documentos'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Identificación'); ?>
		<?php echo $form->dropDownList($model,'id_identificacion',SolSolicitante::getListIdentificacion(),
		array('style'=>'width::100%', 'prompt'=>'Seleccione Identificación'));?>
		<?php echo $form->error($model,'id_identificacion'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'folio_identificación'); ?>
		<?php echo $form->textField($model,'folio_identificacion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'folio_identificacion'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Correo Electrónico'); ?>
		<?php echo $form->textField($model,'correo_electronico',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'correo_electronico'); ?>

		<?php echo CHtml::submitButton($model->isNewRecord ? 'Añadir Solicitante' : 'Actualizar',array('class'=>'btn btn-success')); ?>
	</div>
</div>




	<div class="row buttons">
	
	
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->