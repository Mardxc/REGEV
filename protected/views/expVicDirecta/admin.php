<h1>Expedientes Víctimas Directas</h1>


<a class="btn btn-primary" href="index.php?r=expVicDirecta/create">
				<i class="fa fa-plus"></i>&nbsp Generar Nuevo Expediente
</a>
 


 <p>

 </p>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'exp-vic-directa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_exp_vic_directa',
		'year_expediente',
		'id_exp_lugar',
		'id_det_solicitante',
		'id_solicitante',
		'id_victima_directa',
		/*
		'id_representante',
		'expediente_directa',
		'num_regev',
		'fecha_registro',
		'id_institucion_ref',
		'num_oficio',
		'id_relato',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
