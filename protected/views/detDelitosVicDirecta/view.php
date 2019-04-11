<?php
/* @var $this DetDelitosVicDirectaController */
/* @var $model DetDelitosVicDirecta */

$this->breadcrumbs=array(
	'Det Delitos Vic Directas'=>array('index'),
	$model->id_det_delito_directa,
);

$this->menu=array(
	array('label'=>'List DetDelitosVicDirecta', 'url'=>array('index')),
	array('label'=>'Create DetDelitosVicDirecta', 'url'=>array('create')),
	array('label'=>'Update DetDelitosVicDirecta', 'url'=>array('update', 'id'=>$model->id_det_delito_directa)),
	array('label'=>'Delete DetDelitosVicDirecta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_det_delito_directa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DetDelitosVicDirecta', 'url'=>array('admin')),
);
?>

<h1>View DetDelitosVicDirecta #<?php echo $model->id_det_delito_directa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_det_delito_directa',
		'id_delito',
		'id_victima_directa',
	),
)); ?>
