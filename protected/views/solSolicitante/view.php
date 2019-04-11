<?php
/* @var $this SolSolicitanteController */
/* @var $model SolSolicitante */

$this->breadcrumbs=array(
	'Sol Solicitantes'=>array('index'),
	$model->id_solicitante,
);

$this->menu=array(
	array('label'=>'List SolSolicitante', 'url'=>array('index')),
	array('label'=>'Create SolSolicitante', 'url'=>array('create')),
	array('label'=>'Update SolSolicitante', 'url'=>array('update', 'id'=>$model->id_solicitante)),
	array('label'=>'Delete SolSolicitante', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_solicitante),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SolSolicitante', 'url'=>array('admin')),
);
?>

<h1>View SolSolicitante #<?php echo $model->id_solicitante; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_solicitante',
		'nombre',
		'ape_pat',
		'ape_mat',
		'id_genero',
		'fecha_nacimiento',
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
	),
)); ?>
