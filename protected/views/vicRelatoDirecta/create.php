<?php
/* @var $this VicRelatoDirectaController */
/* @var $model VicRelatoDirecta */

$this->breadcrumbs=array(
	'Vic Relato Directas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VicRelatoDirecta', 'url'=>array('index')),
	array('label'=>'Manage VicRelatoDirecta', 'url'=>array('admin')),
);
?>

<h1>Create VicRelatoDirecta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>