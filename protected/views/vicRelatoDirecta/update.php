<?php
/* @var $this VicRelatoDirectaController */
/* @var $model VicRelatoDirecta */

$this->breadcrumbs=array(
	'Vic Relato Directas'=>array('index'),
	$model->id_relato_directa=>array('view','id'=>$model->id_relato_directa),
	'Update',
);

$this->menu=array(
	array('label'=>'List VicRelatoDirecta', 'url'=>array('index')),
	array('label'=>'Create VicRelatoDirecta', 'url'=>array('create')),
	array('label'=>'View VicRelatoDirecta', 'url'=>array('view', 'id'=>$model->id_relato_directa)),
	array('label'=>'Manage VicRelatoDirecta', 'url'=>array('admin')),
);
?>

<h1>Update VicRelatoDirecta <?php echo $model->id_relato_directa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>