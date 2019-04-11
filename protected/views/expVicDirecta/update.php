<?php
/* @var $this ExpVicDirectaController */
/* @var $model ExpVicDirecta */

$this->breadcrumbs=array(
	'Exp Vic Directas'=>array('index'),
	$model->id_exp_vic_directa=>array('view','id'=>$model->id_exp_vic_directa),
	'Update',
);

$this->menu=array(
	array('label'=>'List ExpVicDirecta', 'url'=>array('index')),
	array('label'=>'Create ExpVicDirecta', 'url'=>array('create')),
	array('label'=>'View ExpVicDirecta', 'url'=>array('view', 'id'=>$model->id_exp_vic_directa)),
	array('label'=>'Manage ExpVicDirecta', 'url'=>array('admin')),
);
?>

<h1>Update ExpVicDirecta <?php echo $model->id_exp_vic_directa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>