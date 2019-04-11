<?php
/* @var $this ExpVicDirectaController */
/* @var $model ExpVicDirecta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'exp-vic-directa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
 	 
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Año de Expediente'); ?>
	<?php echo CHtml::dropDownList('year_expediente',$model,array('2018'=>'2018',
														      '2017'=>'2017',
															  '2016'=>'2016',
															  '2015'=>'2015',
															  '2014'=>'2014',
															  '2013'=>'2013',
															  '2012'=>'2012',
															  '2011'=>'2011',

																),
								array('style'=>'width:7%')
							 );
		?>
		
		<?php echo $form->error($model,'year_expediente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Lugar de Expedición'); ?>
		<?php echo $form->dropDownList($model,'id_exp_lugar',ExpVicDirecta::getListLugar(),
		array('style'=>'width::100%', 'prompt'=>'Seleccione Lugar'));?>
		<?php echo $form->error($model,'id_exp_lugar'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Fecha de REGEV'); ?>
			<?php
		$this->widget("zii.widgets.jui.CJuiDatePicker",array(
		"attribute"=>"fecha_regev",
		"model"=>$model,
		"language"=>"es",
		"options"=>array(
			'autoSize'=>'true',
		  	'changeMonth' => 'true', 
		    'changeYear' => 'true', 
			 'dateFormat' => 'dd-mm-yy',
			'yearRange'=>'1910:2099',
			'defaultDate'=>$model->fecha_regev,
			),
 			'htmlOptions'=>array('readonly' => true)
 			));?>
		<?php echo $form->error($model,'fecha_regev'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tipo de Solicitante'); ?>
		<?php echo $form->dropDownList($model,'id_det_solicitante',ExpVicDirecta::getListTipoSolicitante(),
		array('style'=>'width::100%', 'prompt'=>'Seleccione Tipo Solicitante'));?>
		<?php echo $form->error($model,'id_det_solicitante'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'Solicitante');?>
		<?php echo $form->textField($model,'id_solicitante',array('style'=>'display:true;')); ?>
		<?php 
	
				$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
					'name'=>'unidad',
					'model'=>$model,
					
					'htmlOptions'=>array('style'=>'width::85%'),
					'sourceUrl'=>$this->createUrl('ListarSolAutocomplete'),
					'options'=>array(
						'minLength'=>'1',
						'showAmin'=>'fold',
						'select'=>'js:function(event,ui){
							$("#ExpVicDirecta_id_solicitante").val(ui.item.id);
						}',
					),
				));
		 ?>
			<a class="btn btn-primary" onclick="callModalSolicitante(), addSolicitante()">
				<i class="fa fa-plus">
					
				</i> &nbsp Añadir Solicitante
			</a>
	</div>	
                <?php $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                                'id' => 'modalSolicitante',
                                'options' => array(
                                        'title' => 'Añadir Solicitante',
                                        'width'=>800,
                                        'height'=>500,
                                        'autoOpen'=>false,
                                        'resizable'=>false,
                                        'scrollable'=>true,
                                        'modal'=>true,
                                        'overlay'=>array(
                                                'backgroundColor'=>'#000',
                                                'opacity'=>'0.5'
                                                ),
                                        ),
                        ));?>


                <div class="divForForm"></div>

                <?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>


                <script type="text/javascript">
                // here is the magic
                function addSolicitante()
                {
                    <?php echo CHtml::ajax(array(
                            'url'=>array('/SolSolicitante/create'),
                            'data'=> "js:$(this).serialize()",
                            'type'=>'post',
                            'dataType'=>'json',
                            'success'=>"function(data)

                            {	

                                if (data.status == 'failure')
                                {
                                    $('#modalSolicitante div.divForForm').html(data.div);

                                    $('#modalSolicitante div.divForForm form').submit(addSolicitante);
                                }
                                else
                                {
                                    $('#modalSolicitante div.divForForm').html(data.div);
                                    setTimeout(\"$('#modalSolicitante').dialog('close') \",1000);

                                }
                 
                            } ",
                            	
				         

                            		//'url' => CController::createUrl('SolSolicitante/Selectmunicipio'),
									//'update' => '#'.CHtml::activeId($model,'id_solicitante'),

                            )
                    )?>;
                    return false; 
                 
                }

               function callModalSolicitante()
               {
               	$('#modalSolicitante').dialog('open');
               }
                 
                </script>                
               
               



	<div class="row">
		<?php echo $form->labelEx($model,'Nombre Victima Directa PDTE'); ?>
		<?php echo $form->textField($model,'id_victima_directa'); ?>
		<?php echo $form->error($model,'id_victima_directa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre Representante PDTE'); ?>
		<?php echo $form->textField($model,'id_representante'); ?>
		<?php echo $form->error($model,'id_representante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'N. Expediente'); ?>
		<?php echo $form->textField($model,'expediente_directa',array('size'=>45,'maxlength'=>45, 'readonly'=>true)); ?>
		<?php echo $form->error($model,'expediente_directa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REGEV'); ?>
		<?php echo $form->textField($model,'num_regev',array('size'=>45,'maxlength'=>45, 'readonly'=>true)); ?>
		<?php echo $form->error($model,'num_regev'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Generar Expediente' : 'Actualizar Expediente'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


