
<h1>Expedientes Victimas Trabajo Social</h1>

<a class="btn btn-secundary" href="index.php?r=SolSolicitante/create">
				<i class="fa fa-plus"></i>&nbsp Nuevo Solicitante
</a>

<a class="btn btn-primary" href="index.php?r=tsExpVicDirecta/create">
				<i class="fa fa-plus"></i>&nbsp Nuevo Expediente
</a>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ts-exp-vic-directa-grid',
	'itemsCssClass'=>"table table-hover table-bordered",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")), //despues de 10 elementos pagina
	'emptyText'=>'No existen resultados de esta busqueda', //cuando no existe algun registro muestra ese mensaje
	'summaryText'=>'{start}-{end} de {count} Expedientes',// muestra el numero que ti
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' =>'id_ts_exp_vic_directa',
			'header'=>'# de Expediente' ),
		array(
			'name' =>'year_expediente',
			'header'=>'Año Expediente' ),

		array(
			'name' =>'id_exp_lugar',
			'header'=>'Lugar Emisión',
			'value'=>'TsExpVicDirecta::getNameLugar($data->id_exp_lugar)'),
			
		array(
			'name' =>'fecha_registro',
			'header'=>'Fecha de Registro'),

			//'id_institucion_ref',
			//'num_oficio',

		array(
			'name' =>'id_solicitante',
			'header'=>'Solicitante',
			'value'=>'TsExpVicDirecta::getNameSol($data->id_solicitante)'),		
	
		array(
			'name' =>'id_victima_directa',
			'header'=>'Victima Directa',
			'value'=>'TsExpVicDirecta::getNameVicDir($data->id_victima_directa)'),

		array(
			'class'=>'CButtonColumn',
			'header'=>'Acciones',
			'template'=>'{update}{delete}', //modifica mi tema y solo recibe las acciones que le indico
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
