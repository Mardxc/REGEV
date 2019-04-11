<?php
/* @var $this ExpVicDirectaController */
/* @var $model ExpVicDirecta */

$this->breadcrumbs=array(
	'Exp Vic Directas'=>array('index'),
	$model->id_exp_vic_directa,
);

$this->menu=array(
	array('label'=>'List ExpVicDirecta', 'url'=>array('index')),
	array('label'=>'Create ExpVicDirecta', 'url'=>array('create')),
	array('label'=>'Update ExpVicDirecta', 'url'=>array('update', 'id'=>$model->id_exp_vic_directa)),
	array('label'=>'Delete ExpVicDirecta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_exp_vic_directa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExpVicDirecta', 'url'=>array('admin')),
);
?>

<h1>View ExpVicDirecta #<?php echo $model->id_exp_vic_directa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_exp_vic_directa',
		'año_expediente',
		'id_exp_lugar',
		'id_det_solicitante',
		'id_solicitante',
		'id_victima_directa',
		'id_representante',
		'expediente_directa',
		'num_regev',
		'fecha_registro',
		'id_institucion_ref',
		'num_oficio',
		'id_relato',
	),
)); ?>
