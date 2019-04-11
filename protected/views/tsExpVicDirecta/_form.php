	<script type="text/javascript">
		function addCategory()
{
    <?php echo CHtml::ajax(array(
            'url'=>array('VicVictimaDirecta/createVictima'), //path to controller action we created above
            'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogCategory div.divForCategoryForm').html(data.div);
                    $('#dialogCategory div.divForCategoryForm form').submit(addCategory);
                }
                else
                {
                    $('#dialogCategory div.divForCategoryForm').html(data.flash);
                    setTimeout(\"$('#dialogCategory').dialog('close') \",1500);
                }
            } ",
    ))?>;
    return false; 
}



	</script>






	<script type="text/javascript">
	   function callModalVictima()
	   {
	   	$('#modalVictima').dialog('open');
	   }     
	</script>


	<script>
		function añadirDelito(){
					
			var guarda=$('#añadirDelito').val();
			//var id_det_delito_directa=$('#id_det_delito_directa').val();
			var id_delitos=$('#id_delito').val();
			var id_victima_directas=$('#id_victima_directa').val();	

			if (id_victima_directas=='') {
				id_victima_directas=$('#id_victima_directas').val();	
			}

			<?php echo CHtml::ajax(array(
	            'url'=>array('DetDelitosVicDirecta/Guardar'),
	            'data'=> array(
	            	'guarda'=>"js:guarda",
	            	//'id_det_delito_directa'=>'js:id_det_delito_directa',
	            	'id_delito'=>'js:id_delitos',
	            	'id_victima_directa'=>'js:id_victima_directas'

	            ),
	            'type'=>'post',
	            'dataType'=>'json',
	            'success'=>"function(data)
	            {	
					$.fn.yiiGridView.update('table_detalle_delitos_dir',{data:{'id_victima_directa':data.id_victima_directa}});
			
	            } "
	            ))
	    	?>;
				return false; 			
		};
	</script>

	<script>
		function añadirViolacion(){
					
			var guardar=$('#añadirViolacion').val();
			//var id_det_delito_directa=$('#id_det_delito_directa').val();
			var id_violaciones=$('#id_violacion').val();
			var id_victima_directas=$('#id_victima_directa').val();	

			if (id_victima_directas=='') {
				id_victima_directas=$('#id_victima_directas').val();	
			}

			<?php echo CHtml::ajax(array(
	            'url'=>array('DetViolacionVicDirecta/Guardar'),
	            'data'=> array(
	            	'guardar'=>"js:guardar",
	            	//'id_det_delito_directa'=>'js:id_det_delito_directa',
	            	'id_violacion'=>'js:id_violaciones',
	            	'id_victima_directa'=>'js:id_victima_directas'

	            ),
	            'type'=>'post',
	            'dataType'=>'json',
	            'success'=>"function(data)
	            {	
					$.fn.yiiGridView.update('table_detalle_violacion_dir',{data:{'id_victima_directa':data.id_victima_directa}});
			
	            } "
	            ))
	    	?>;
				return false; 			
		};
	</script>




	<script>
		function del_det_delito() {
		var id_det_delito=$.fn.yiiGridView.getChecked('table_detalle_delitos_dir', 'id_det_delito_directa');
		var id_victima_directas=$('#id_victima_directa').val();	

		if (id_victima_directas=='') {
			id_victima_directas=$('#id_victima_directas').val();	
		}
			<?php echo CHtml::ajax(array(
	            'url'=>array('TsExpVicDirecta/deleteMardxc'),
	            'data'=> array(
	            	'id_det_delito'=>'js:id_det_delito',
	            	'id_victima_directa'=>'js:id_victima_directas',
	            ),
	            'type'=>'post',
	            'dataType'=>'json',
	            'success'=>"function(data)
	            {	
	            	alert('Se elimino correctamente');
					$.fn.yiiGridView.update('table_detalle_delitos_dir',{data:{'id_victima_directa':data.id_victima_directa}});
	            } "
	            ))
	    	?>;		
		}
	</script>
	<script>
		function del_det_violacion() {
		var id_det_violacion_directa=$.fn.yiiGridView.getChecked('table_detalle_violacion_dir', 'id_det_violacion_directa');
		var id_victima_directas=$('#id_victima_directa').val();	

		if (id_victima_directas=='') {
			id_victima_directas=$('#id_victima_directas').val();	
		}
			<?php echo CHtml::ajax(array(
	            'url'=>array('TsExpVicDirecta/deleteViolacionMardxc'),
	            'data'=> array(
	            	'id_det_violacion_directa'=>'js:id_det_violacion_directa',
	            	'id_victima_directa'=>'js:id_victima_directas',
	            ),
	            'type'=>'post',
	            'dataType'=>'json',
	            'success'=>"function(data)
	            {	
	            	alert('Se elimino correctamente');
					$.fn.yiiGridView.update('table_detalle_violacion_dir',{data:{'id_victima_directa':data.id_victima_directa}});
	            } "
	            ))
	    	?>;		
		}
	</script>

<div class="form">

<?php 
       $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'horizontalForm',
        'type'=>'horizontal',
        'htmlOptions'=>array('class'=>'well'),
	
)); ?>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Año'); ?>
		<?php echo $form->dropDownList($model,'year_expediente',array('2018'=>'2018',
																	  '2017'=>'2017',
																	  '2016'=>'2016',
																	  '2015'=>'2015',
																	  '2014'=>'2014',
																	  '2013'=>'2013'),array('style'=>'width:70px')); ?>
		
		<?php echo $form->error($model,'year_expediente'); ?>

	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Distrito'); ?>
		<?php echo $form->dropDownList($model,'id_exp_lugar',TsExpVicDirecta::getListLugar(),
		array('style'=>'width::100%', 'prompt'=>'Seleccione Lugar'));?>
		<?php echo $form->error($model,'id_exp_lugar'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width:126px">
	<div class="row">
		<?php echo $form->labelEx($model,'Fecha de Registro'); ?>
			<?php
		$this->widget("zii.widgets.jui.CJuiDatePicker",array(
		"attribute"=>"fecha_registro",
		"model"=>$model,
		"language"=>"es",
		"options"=>array(
			'autoSize'=>'true',
		  	'changeMonth' => 'true', 
		    'changeYear' => 'true', 
			 'dateFormat' => 'dd-mm-yy',
			'yearRange'=>'1910:2099',
			'defaultDate'=>$model->fecha_registro,
			),
 			'htmlOptions'=>array('readonly' => true,'style'=>'width:88%')
 			));?>
		<?php echo $form->error($model,'fecha_registro'); ?>
		
	</div>
</div>

<div style="float:left;padding:10px;width: 190px">
	<div class="row">
		<?php echo $form->labelEx($model,'Institucion de Referencia'); ?>
		<?php echo $form->dropDownList($model,'id_institucion_ref',TsExpVicDirecta::getListInstRef(),
		array('style'=>'width:100%', 'prompt'=>'Seleccione Institución'));?>
		<?php echo $form->error($model,'id_institucion_ref'); ?>
	</div>
</div>

<div style="float:right;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'N° de Oficio'); ?>
		<?php echo $form->textField($model,'num_oficio',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'num_oficio'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 900px">
	<h4>DATOS DE EXPEDIENTE</h4>
</div>

<div style="float:left;padding:10px;width: 310px">
	<div class="row">
		<?php echo $form->labelEx($model,'Solicitante');?>
		<?php echo $form->textField($model,'id_solicitante',array('style'=>'display:none;')); ?>
		<?php 
	
				$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
					'name'=>'unidad',
					'model'=>$model,
					'value'=>TsExpVicDirecta::getNombreSolicitante($model->id_solicitante),
					'htmlOptions'=>array('style'=>'width:95%'),
					'sourceUrl'=>$this->createUrl('ListarSolAutocomplete'),
					'options'=>array(
						'minLength'=>'1',
						'showAmin'=>'fold',
						'select'=>'js:function(event,ui){
							$("#TsExpVicDirecta_id_solicitante").val(ui.item.id);

						}',
					),
				));
		 ?>
	</div>	
</div>


<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Parentesco con la Victima'); ?>
		<?php echo $form->dropDownList($model,'id_parentesco',TsExpVicDirecta::getListParentesco(),
		array('style'=>'width::100%', 'prompt'=>'Seleccione Parentesco')) ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 343px">
	<div class="row">
		<?php echo $form->labelEx($model,'Nombre Victima Directa'); ?>
		<?php echo $form->textField($model,'id_victima_directa',array('style'=>'display:none;'));?>
		<input type="text" id="id_victima_directas" value="<?php echo $model->id_victima_directa ?>" style="display: none;">
		<?php 
	
				$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
					'name'=>'unidad2',
					'model'=>$model,
					'value'=>TsExpVicDirecta::getNombreVictima($model->id_victima_directa),
					'htmlOptions'=>array('style'=>'width:82%'),
					'sourceUrl'=>$this->createUrl('ListarVicAutocomplete'),
					'options'=>array(
						'minLength'=>'1',
						'showAmin'=>'fold',
						'select'=>'js:function(event,ui){
							$("#TsExpVicDirecta_id_victima_directa, #VicRelatoDirecta_id_victima_directa, #id_victima_directa").val(ui.item.id);

						}',
					),
				));
		 ?>
			<a class="btn btn-primary" value="guardar "onclick="callModalVictima()">
				<i class="fa fa-plus"></i> 
			</a>
	</div>
</div>


<?php echo CHtml::link('Add a Category', "",
     array(
         'onclick'=>"{
            addCategory();
            $('#dialogCategory').dialog('open');
         }"
     ));
?>

<div style="float:left;padding:10px;width: 900px">
	<h4>DELITOS HACIA LA VICTIMIA</h4>
</div>


<div style="float:left;padding:10px">
	<div class="row">

			<?php 
				echo CHtml::dropDownList(
					'id_delito',
					'', 
	              	TsExpVicDirecta::getListDelitos(),
	              	array('empty' => 'Selecciona una Opcion')
	             );
			?>

	<a id="añadirDelito" class="btn btn-primary" onclick="añadirDelito()">
			<i class="fa fa-plus"></i>
	</a>		

	<input type="number" id="id_victima_directa" style="display: none;">

	<a id="añadirDelito" class="btn btn-danger" onclick="del_det_delito()">
			<i class="fa fa-trash-o"></i>
	</a>	

	</div>
</div>	

	
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'table_detalle_delitos_dir',
	'itemsCssClass'=>"table table-condensed table-responsive table-hover table-bordered",
	'dataProvider'=>$model_delito_det,
	//'filter'=>$model,
	'columns'=>array(
		array(
			'id'=>'id_det_delito_directa',
			'class'=>'CCheckBoxColumn',
			'selectableRows'=>'2',
			//'header'=>'<i class="fa fa-times fa-2x"></i>',
		),
		//'id_det_delito_directa',
		//'id_victima_directa',
				array(
			'name'=>'delito',
			'header'=>'Delito',
			
		),
	),
)); 
	?>


<div style="float:left;padding:10px;width: 900px">
	<h4>VIOLACION HACIA DERECHOS HUMANOS</h4>
</div>


<div style="float:left;padding:10px">
	<div class="row">

			<?php 
				echo CHtml::dropDownList(
					'id_violacion',
					'', 
	              	TsExpVicDirecta::getListViolaciones(),
	              	array('empty' => 'Selecciona una Opcion')
	             );
			?>

	<a id="añadirViolacion" class="btn btn-primary" onclick="añadirViolacion()">
			<i class="fa fa-plus"></i>
	</a>
	<a id="del_det_violacion" class="btn btn-primary" onclick="del_det_violacion()">
			<i class="fa fa-times"></i>
	</a>		

	<input type="number" id="id_victima_directa" style="display: none;">

	</div>
</div>	


	<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'table_detalle_violacion_dir',
	'itemsCssClass'=>"table table-condensed table-responsive table-hover table-bordered",
	'dataProvider'=>$model_violacion_det,
	//'filter'=>$model,
	'columns'=>array(
		array(
			'id'=>'id_det_violacion_directa',
			'class'=>'CCheckBoxColumn',
			'selectableRows'=>'1',
			'header'=>'<i class="fa fa-times fa-2x"></i>',
		),
		//'id_det_delito_directa',
		//'id_victima_directa',
				array(
			'name'=>'tipo_violacion',
			'header'=>'Violacion a DH',
			
		),
	),
)); 
	?>


<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model,'Violación a Derechos'); ?>
		<?php echo $form->dropDownList($model,'id_vderechos',VicVictimaDirecta::getListVderechos(),
		array('style'=>'width::100%', 'prompt'=>'Seleccione Tipo'));?>
		<?php echo $form->error($model,'id_vderechos'); ?>
	</div>
</div>

<div style="float:left;padding:10px">	
	<div class="row">
		<?php echo $form->labelEx($model,'Folio Derechos'); ?>
		<?php echo $form->textField($model,'folio_derechos',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'folio_derechos'); ?>
	</div>
</div>	


<div style="float:left;padding:10px;width: 900px">
	<h4>DATOS DEL HECHO VICTIMIZANTE</h4>
</div>

<div style="float:left;padding:10px">
		<div class="row">
		<?php echo $form->labelEx($model_relato,'Calle '); ?>
		<?php echo $form->textField($model_relato,'calle_rel',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model_relato,'calle_rel'); ?>
		</div>
</div>

<div style="float:left;padding:10px;width:80px">
	<div class="row">
		<?php echo $form->labelEx($model_relato,'N Exterior'); ?>
		<?php echo $form->textField($model_relato,'num_ext_rel',array('size'=>45,'maxlength'=>45,'style'=>'width:100%')); ?>
		<?php echo $form->error($model_relato,'num_ext_rel'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width:80px">
	<div class="row">
		<?php echo $form->labelEx($model_relato,'N Interior'); ?>
		<?php echo $form->textField($model_relato,'num_int_rel',array('size'=>45,'maxlength'=>45,'style'=>'width:100%')); ?>
		<?php echo $form->error($model_relato,'num_int_rel'); ?>
	</div>
</div>


<div style="float:left;padding:10px;width: 80px">
	<div class="row">
		<?php echo $form->labelEx($model_relato,'C P'); ?>
		<?php echo $form->textField($model_relato,'codigo_postal_rel',array('size'=>45,'maxlength'=>45,'style'=>'width:100%')); ?>
		<?php echo $form->error($model_relato,'codigo_postal_rel'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 160px">
	<div class="row">
		<?php echo $form->labelEx($model_relato,'Colonia'); ?>
		<?php echo $form->textField($model_relato,'colonia_rel',array('size'=>45,'maxlength'=>45,'style'=>'width:100%')); ?>
		<?php echo $form->error($model_relato,'colonia_rel'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 190px">
	<div class="row">
		<?php echo $form->labelEx($model_relato,'Localidad'); ?>
		<?php echo $form->textField($model_relato,'localidad_rel',array('size'=>45,'maxlength'=>45,'style'=>'width:100%')); ?>
		<?php echo $form->error($model_relato,'localidad_rel'); ?>
	</div>
</div>

<div style="float:left;padding:10px">	
	<div class="row">
		<?php echo $form->labelEx($model_relato,'Estado'); ?>
		<?php echo $form->dropDownList($model_relato,'id_estado',TsExpVicDirecta::getListEstado(),
		array(
		'style'=>'width::20%',
		'prompt'=>'Seleccione un Estado',
		'ajax' => array(
        'type' => 'POST',
        //ENVIA POR POST EL "ID" DE NUESTRO ESTADO PARA PODER RECIBIRLO EN EL CONTROLADOR
        'url' => CController::createUrl('/TsExpVicDirecta/Selectmunicipio'),
        //RECIBE EL METODO "selectMunicipio" PARA OBTENER EL "id" DE NUESTRO MUNICIPIO--->VAMOS AL CONTROLADOR
		'update' => '#'.CHtml::activeId($model_relato,'id_municipio'),
                               
            		),
	     ));?>
	
		<?php echo $form->error($model_relato,'id_estado'); ?>
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model_relato,'Municipio'); ?>
		<?php echo $form->dropDownList($model_relato,'id_municipio',TsExpVicDirecta::getListMunicipio(),
			array(
			'style'=>'width::30%',
			'prompt'=>'Seleccione un Municipio'
			)
		);?>
		<?php echo $form->error($model_relato,'id_municipio'); ?>
	</div>
</div>

<div style="float:left;padding:10px;width: 433px">
	<div class="row">
		<?php echo $form->labelEx($model_relato,'Fecha del Relato'); ?>
			<?php
		$this->widget("zii.widgets.jui.CJuiDatePicker",array(
		"attribute"=>"fecha_rel",
		"model"=>$model_relato,
		"language"=>"es",
		"options"=>array(
			'autoSize'=>'true',
		  	'changeMonth' => 'true', 
		    'changeYear' => 'true', 
			 'dateFormat' => 'dd-mm-yy',
			'yearRange'=>'1910:2099',
			),
 			'htmlOptions'=>array('readonly' => true,'style'=>'width:30%')
 			));?>
		<?php echo $form->error($model_relato,'fecha_rel'); ?>
		
	</div>
</div>

<div style="float:left;padding:10px">
	<div class="row">
		<?php echo $form->labelEx($model_relato,'Descripcion de los Hechos'); ?>
		<?php echo $form->textField($model_relato,'descripcion',array('style'=>'width:100%;height:100%','maxlength'=>5000)); ?>
		<?php echo $form->error($model_relato,'descripcion'); ?>
	</div>
</div>

	<div class="row">
		<?php echo $form->labelEx($model_relato,'id_victima_directa',array('style'=>'display:none')); ?>
		<?php echo $form->textField($model_relato,'id_victima_directa',array('style'=>'display:none')); ?>
		<?php echo $form->error($model_relato,'id_victima_directa'); ?>
	</div>

	<div class="row buttons" style="margin-left: 10px">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Generar Expediente' : 'Actualizar Expediente',array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

				 <?php $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                                'id' => 'dialogCategory',
                                'options' => array(
                                        'title' => 'Añadir Victima Directa',
                                        'width'=>1030,
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



    					<div class="divForCategoryForm"></div>

                <?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>


				 <?php $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                                'id' => 'modalVictima',
                                'options' => array(
                                        'title' => 'Añadir Victima Directa',
                                        'width'=>1030,
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



<?php echo $this->renderPartial('//vicVictimaDirecta/_form', array('model' =>$model_victima_directa)); ?>


                <?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>
