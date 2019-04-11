<h1>Registro de Victimas Directas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vic-victima-directa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_victima_directa',
		'nombre',
		'ape_pat',
		'ape_mat',
		'id_genero',
		'curp',
		/*
		'fecha_nacimiento',
		'edad',
		'id_ocupacion',
		'id_escolaridad',
		'id_discapacidad',
		'id_estado_civil',
		'num_dependientes',
		'id_nacionalidad',
		'id_pais',
		'id_estado',
		'id_municipio',
		'colonia',
		'localidad',
		'calle',
		'num_exp',
		'num_int',
		'codigo_postal',
		'telefono_fijo',
		'id_calidad_migratoria',
		'id_documentos',
		'id_identificacion',
		'folio_identificacion',
		'id_vderechos',
		'folio_derechos',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
