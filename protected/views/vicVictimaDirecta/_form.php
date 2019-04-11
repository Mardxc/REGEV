<?php
/* @var $this VicVictimaDirectaController */
/* @var $model VicVictimaDirecta */
/* @var $form CActiveForm */
?>

<div class="form">


<?php 

        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'victima_form',
    'type'=>'horizontal',
            'htmlOptions'=>array('class'=>'well'),
	
)); ?>

<div style="float:left;padding:10px;width: 900px">
<h4>Datos de la Victima</h4>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		</a><?php echo $form->labelEx($model,'Nombre(s)'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
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

<div style="float:left;padding:10px; width: 193px">
	<div class="row">
		<?php echo $form->labelEx($model,'Genero'); ?>
		<?php echo $form->dropDownList($model,'id_genero',VicVictimaDirecta::getListGenero(),
		array('style'=>'width:100%','prompt'=>'Seleccione Genero')); ?>
		<?php echo $form->error($model,'id_genero'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'C U R P '); ?>
		<?php echo $form->textField($model,'curp',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'curp'); ?>
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

<div style="float:left;padding:10px;width:50px">
	<div class="row">
		<?php echo $form->labelEx($model,'Edad'); ?>
		<?php echo $form->textField($model,'edad',array('style'=>'width:70%')); ?>
		<?php echo $form->error($model,'edad'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 153px">
	<div class="row">
		<?php echo $form->labelEx($model,'Ocupacion'); ?>
		<?php echo $form->dropDownList($model,'id_ocupacion',VicVictimaDirecta::getListOcupaciones(),
		array('style'=>'width:100%','prompt'=>'Seleccione')); ?>
		<?php echo $form->error($model,'id_ocupacion'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 190px">
	<div class="row">
		<?php echo $form->labelEx($model,'Escolaridad'); ?>
		<?php echo $form->dropDownList($model,'id_escolaridad',VicVictimaDirecta::getListEscolaridad(),
		array('style'=>'width:100%','prompt'=>'Seleccione Escolaridad')); ?>
		<?php echo $form->error($model,'id_escolaridad'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Discapacidad'); ?>
		<?php echo $form->dropDownList($model,'id_discapacidad',VicVictimaDirecta::getListDiscapacidad(),
		array('style'=>'width::100%','prompt'=>'Seleccione una Discapacidad'));?>
		<?php echo $form->error($model,'id_discapacidad'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Estado Civil'); ?>
		<?php echo $form->dropDownList($model,'id_estado_civil',VicVictimaDirecta::getListEstadoCivil(),
		array('style'=>'width::100%','prompt'=>'Seleccione el Estado Civil'));?>
		<?php echo $form->error($model,'id_estado_civil'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width:90px">
	<div class="row">
		<?php echo $form->labelEx($model,'Dependientes'); ?>
		<?php echo $form->textField($model,'num_dependientes',array('style'=>'width:85%')); ?>
		<?php echo $form->error($model,'num_dependientes'); ?>
	</div>
</div>


<div style="float:left;padding:10px;width: 118px">
	<div class="row">
		<?php echo $form->labelEx($model,'Nacionalidad'); ?>
		<?php echo $form->dropDownList($model,'id_nacionalidad',VicVictimaDirecta::getListNacionalidad(),
		array('style'=>'width:100%', 'prompt'=>'Nacionalidad'));?>
		<?php echo $form->error($model,'id_nacionalidad'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 185px">
	<div class="row">
		<?php echo $form->labelEx($model,'País'); ?>
		<?php echo $form->dropDownList($model,'id_pais',VicVictimaDirecta::getListPais(),
		array('style'=>'width:100%','prompt'=>'Seleccione un Pais'));?>
		<?php echo $form->error($model,'id_pais'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Estado'); ?>
		<?php echo $form->dropDownList($model,'id_estado',VicVictimaDirecta::getListEstado(),
		array(
		'style'=>'width::20%',
		'prompt'=>'Seleccione un Estado',
		'ajax' => array(
        'type' => 'POST',
        //ENVIA POR POST EL "ID" DE NUESTRO ESTADO PARA PODER RECIBIRLO EN EL CONTROLADOR
        'url' => CController::createUrl('VicVictimaDirecta/Selectmunicipio'),
        //RECIBE EL METODO "selectMunicipio" PARA OBTENER EL "id" DE NUESTRO MUNICIPIO--->VAMOS AL CONTROLADOR
		'update' => '#'.CHtml::activeId($model,'id_municipio'),
                               
            		),
	     ));?>
	
		<?php echo $form->error($model,'id_estado'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 673px">
	<div class="row">
		<?php echo $form->labelEx($model,'Municipio'); ?>
		<?php echo $form->dropDownList($model,'id_municipio',VicVictimaDirecta::getListMunicipio(),
		array(
			'style'=>'width::30%',
			'prompt'=>'Seleccione un Municipio'
			)
		);?>
		<?php echo $form->error($model,'id_municipio'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 900px">
<h4>Domicilio</h4>
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
		<?php echo $form->labelEx($model,'localidad'); ?>
		<?php echo $form->textField($model,'localidad',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'localidad'); ?>
</div>	</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'calle'); ?>
		<?php echo $form->textField($model,'calle',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'calle'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 80px">
	<div class="row">
		<?php echo $form->labelEx($model,'N Exterior'); ?>
		<?php echo $form->textField($model,'num_exp',array('size'=>45,'maxlength'=>45,'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'num_exp'); ?>
	</div>
</div>


<div style="float:left;padding:10px;width: 80px">	
	<div class="row">
		<?php echo $form->labelEx($model,'N Interior'); ?>
		<?php echo $form->textField($model,'num_int',array('size'=>45,'maxlength'=>45,'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'num_int'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 80px">	
	<div class="row">
		<?php echo $form->labelEx($model,'C P'); ?>
		<?php echo $form->textField($model,'codigo_postal',array('size'=>45,'maxlength'=>45,'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'codigo_postal'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 119px">	
	<div class="row">
		<?php echo $form->labelEx($model,'Teléfono'); ?>
		<?php echo $form->textField($model,'telefono_fijo',array('size'=>45,'maxlength'=>45,'style'=>'width:88%')); ?>
		<?php echo $form->error($model,'telefono_fijo'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 900px">
<h4>Datos Migratorios</h4>
</div>

<div style="float:left;padding:10px">	
	<div class="row">
		<?php echo $form->labelEx($model,'Calidad Migratoria'); ?>
		<?php echo $form->dropDownList($model,'id_calidad_migratoria',VicVictimaDirecta::getListCalidad(),
		array('style'=>'width::100%', 'prompt'=>'Seleccione la Calidad Migratoria'));?>
		<?php echo $form->error($model,'id_calidad_migratoria'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 670px">	
	<div class="row">
		<?php echo $form->labelEx($model,'Documentacion Presentada'); ?>
		<?php echo $form->dropDownList($model,'id_documentos',VicVictimaDirecta::getListDocumentos(),
		array('style'=>'width::100%', 'prompt'=>'Seleccione Documentos'));?>
		<?php echo $form->error($model,'id_documentos'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 900px">
	<h4>Datos de Identificacion</h4>
</div>

<div style="float:left;padding:10px">	
	<div class="row">
		<?php echo $form->labelEx($model,'Identificación'); ?>
		<?php echo $form->dropDownList($model,'id_identificacion',VicVictimaDirecta::getListIdentificacion(),
		array('style'=>'width::100%', 'prompt'=>'Seleccione Identificacion'));?>
		<?php echo $form->error($model,'id_identificacion'); ?>
	</div>
</div>

<div style="float:left;padding:10px">	
	<div class="row">
		<?php echo $form->labelEx($model,'Folio Identificación'); ?>
		<?php echo $form->textField($model,'folio_identificacion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'folio_identificacion'); ?>


		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar',array('class'=>'btn btn-success')); ?>
	</div>
</div>

	<div class="row buttons">

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->