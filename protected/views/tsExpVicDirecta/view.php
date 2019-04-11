<?php
/* @var $this TsExpVicDirectaController */
/* @var $model TsExpVicDirecta */

$this->breadcrumbs=array(
	'Ts Exp Vic Directas'=>array('index'),
	$model->id_ts_exp_vic_directa,
);

$this->menu=array(
	array('label'=>'List TsExpVicDirecta', 'url'=>array('index')),
	array('label'=>'Create TsExpVicDirecta', 'url'=>array('create')),
	array('label'=>'Update TsExpVicDirecta', 'url'=>array('update', 'id'=>$model->id_ts_exp_vic_directa)),
	array('label'=>'Delete TsExpVicDirecta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ts_exp_vic_directa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TsExpVicDirecta', 'url'=>array('admin')),
);
?>

<h1>View TsExpVicDirecta #<?php echo $model->id_ts_exp_vic_directa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_ts_exp_vic_directa',
		'year_expediente',
		'id_exp_lugar',
		'fecha_registro',
		'id_institucion_ref',
		'num_oficio',
		'id_solicitante',
		'id_victima_directa',
	),
)); ?>
