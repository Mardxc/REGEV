<?php
/* @var $this DetDelitosVicDirectaController */
/* @var $model DetDelitosVicDirecta */

$this->breadcrumbs=array(
	'Det Delitos Vic Directas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DetDelitosVicDirecta', 'url'=>array('index')),
	array('label'=>'Create DetDelitosVicDirecta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#det-delitos-vic-directa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Det Delitos Vic Directas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'det-delitos-vic-directa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_det_delito_directa',
		'id_delito',
		'id_victima_directa',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
