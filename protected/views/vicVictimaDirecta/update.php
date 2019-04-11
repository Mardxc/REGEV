<?php
/* @var $this VicVictimaDirectaController */
/* @var $model VicVictimaDirecta */

$this->breadcrumbs=array(
	'Vic Victima Directas'=>array('index'),
	$model->id_victima_directa=>array('view','id'=>$model->id_victima_directa),
	'Update',
);

$this->menu=array(
	array('label'=>'List VicVictimaDirecta', 'url'=>array('index')),
	array('label'=>'Create VicVictimaDirecta', 'url'=>array('create')),
	array('label'=>'View VicVictimaDirecta', 'url'=>array('view', 'id'=>$model->id_victima_directa)),
	array('label'=>'Manage VicVictimaDirecta', 'url'=>array('admin')),
);
?>

<h1>Update VicVictimaDirecta <?php echo $model->id_victima_directa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>