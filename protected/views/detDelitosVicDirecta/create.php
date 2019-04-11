<?php
/* @var $this DetDelitosVicDirectaController */
/* @var $model DetDelitosVicDirecta */

$this->breadcrumbs=array(
	'Det Delitos Vic Directas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DetDelitosVicDirecta', 'url'=>array('index')),
	array('label'=>'Manage DetDelitosVicDirecta', 'url'=>array('admin')),
);
?>

<h1>Create DetDelitosVicDirecta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>