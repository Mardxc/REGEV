<h1>Crear Nuevo Expediente</h1>
<?php $this->renderPartial('_form', 
	array('model'=>$model, 
		'model_relato'=>$model_relato, 
		'model_solicitante'=>$model_solicitante,
		'model_victima_directa'=>$model_victima_directa,
		'model_delito_det'=>$model_delito_det,
		'model_violacion_det'=>$model_violacion_det,
	)); ?>

