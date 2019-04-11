
<h1>Registro Datos Juridico</h1>
<a class="btn btn-primary" href="index.php?r=jurInformes/create">
				<i class="fa fa-plus"></i>&nbsp Ingresar Datos
</a>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jur-informes-grid',
	'itemsCssClass'=>"table table-hover table-bordered",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")), //despues de 10 elementos pagina
	'emptyText'=>'No existen resultados de esta busqueda', //cuando no existe algun registro muestra ese mensaje
	'summaryText'=>'{start}-{end} de {count} Expedientes',// muestra el numero que ti	
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' =>'id_informe_jd',
			'header'=>'# de Informe' ),
		array(
			'name' =>'id_lugar',
			'header'=>'Distrito',
			'value'=>'JurInformes::getNameLugar($data->id_lugar)' ),
		array(
			'name' =>'id_tipo_victima',
			'header'=>'Tipo de Victima',
			'value'=>'JurInformes::getNameTipoVictima($data->id_tipo_victima)' ),
		array(
			'name' =>'id_atencion',
			'header'=>'Tipo de Atencion',
			'value'=>'JurInformes::getNameTipoAtencion($data->id_atencion)' ),
		array(
			'name' =>'tipo_registro',
			'header'=>'Tipo de Registro' ),


	
	//	'fecha_informe',
		/*
		'carpeta_inv',
		'ceeav',
		'id_municipio',
		'localidad',
		'nombre',
		'id_genero',
		'edad',
		'id_estado_civil',
		'adscripcion_indigena',
		'migrante',
		'id_escolaridad',
		'id_situacion_economica',
		'id_delito',
		'canalizacion',
		'id_asesor_juridico',
		'psicologo',
		'descripcion_psicologo',
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
