
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sol-solicitante-grid',
	'itemsCssClass'=>"table table-hover table-bordered",
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id_solicitante',
		'nombre',
		'ape_pat',
		'ape_mat',
		'id_genero',
		'fecha_nacimiento',
		/*
		'edad',
		'id_ocupacion',
		'id_escolaridad',
		'id_discapacidad',
		'id_estado_civil',
		'id_nacionalidad',
		'id_pais',
		'id_estado',
		'id_municipio',
		'calle',
		'num_ext',
		'num_int',
		'colonia',
		'codigo_postal',
		'telefono_fijo',
		'id_calidad_migratoria',
		'id_documentos',
		'id_identificacion',
		'folio_identificacion',
		'id_parentesco',
		'cargo',
		'dependencia',
		'id_ambito_dependencia',
		'telefono_movil',
		'correo_electronico',
		*/
		array(
			'class'=>'CButtonColumn',
			'header'=>'Acciones',
			'template'=>'{update}', //modifica mi tema y solo recibe las acciones que le indico
			'deleteConfirmation'=>('Desea Borrar El Registro?'),
			'buttons'=>array(
					'update'=>array('rel'=>'tooltip',
					'options'=>array(
					'data-toggle'=>'tooltip',
					'title'=>Yii::t('app','Actualizar')
									),
				'label'=>'<i class="fa fa-refresh fa-2x"></i>',
				'imageUrl'=>false,
				'updateButtonUrl'=>'Yii::app()->controller->createUrl("update")',
							),

					'delete'=>array(
					'options'=>array('rel'=>'tooltip',
					'data-toggle'=>'tooltip',
					'title'=>Yii::t('app','Eliminar')
					),
					'label'=>'<i class="fa fa-times fa-2x"></i>',
					'imageUrl'=>false,
					'deleteConfirmation'=>'Esta seguro que desea borrar el registro?',
					'deleteButtonUrl'=>'Yii::app()controller->createUrl("delete")',
					),
				),
			),
	),
)); ?>
