<?php
/* @var $this VicVictimaDirectaController */
/* @var $model VicVictimaDirecta */

$this->breadcrumbs=array(
	'Vic Victima Directas'=>array('index'),
	$model->id_victima_directa,
);

$this->menu=array(
	array('label'=>'List VicVictimaDirecta', 'url'=>array('index')),
	array('label'=>'Create VicVictimaDirecta', 'url'=>array('create')),
	array('label'=>'Update VicVictimaDirecta', 'url'=>array('update', 'id'=>$model->id_victima_directa)),
	array('label'=>'Delete VicVictimaDirecta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_victima_directa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VicVictimaDirecta', 'url'=>array('admin')),
);
?>

<h1>View VicVictimaDirecta #<?php echo $model->id_victima_directa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_victima_directa',
		'nombre',
		'ape_pat',
		'ape_mat',
		'id_genero',
		'curp',
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
	),
)); ?>
