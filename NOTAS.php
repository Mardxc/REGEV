	<?php 
		$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
			'id' =>'modal',
			'options'=>array(
				'title' =>'Añadir Solicitante',
			 	'width'=>600,
			 	'height'=>900,
			 	'autoOpen'=>false,
			 	'resizable'=>false,
			 	'modal'=>true,
			 		'overlay'=>array(
			 			'backgroundColor' =>'#000',
			 		 	'opacity'=>'0.5' 
			 	),
			 ),
		 ));

	echo $this->renderPartial('//solSolicitante/_form', array
	('model' =>$model_solicitante));

	$this->endWidget('zii.widgets.jui.CJuiDialog');

	?>


CREATE SOL SOLIICITANTE RESPALDO

<?php 

	public function actionCreate()
	{
		$model=new SolSolicitante;

		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SolSolicitante']))
		{
			$model->attributes=$_POST['SolSolicitante'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_solicitante));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
 ?>


	                <?php $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                                'id' => 'modalSolicitante',
                                'options' => array(
                                        'title' => 'Añadir Solicitante',
                                        'width'=>800,
                                        'height'=>500,
                                        'autoOpen'=>false,
                                        'resizable'=>false,
                                        'scrollable'=>true,
                                        'modal'=>'model_solicitante',
                                        'overlay'=>array(
                                                'backgroundColor'=>'#000',
                                                'opacity'=>'0.5'
                                                ),
                                        ),
                        ));?>


                <div class="divForForm"></div>

                <?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>


                <script type="text/javascript">
               
                function addSolicitante()
                {
                    <?php echo CHtml::ajax(array(
                            'url'=>Yii::app()->createUrl('SolSolicitante/create'),
                            'data'=> "js:$(this).serialize()",
                            'type'=>'post',
                            'dataType'=>'json',
                            'success'=>"function(data)

                            {	

                                if (data.status == 'failure')
                                {
                                    $('#modalSolicitante div.divForForm').html(data.div);

                                    $('#modalSolicitante div.divForForm form').submit(addSolicitante);
                                }
                                else
                                {
                                    $('#modalSolicitante div.divForForm').html(data.div);
                                    setTimeout(\"$('#modalSolicitante').dialog('close') \",1000);

                                }
                 
                            } ",
                            	
                            )
                    )?>;
                    return false; 
                 
                }

               function callModalSolicitante()
               {
               	$('#modalSolicitante').dialog('open');
               }
                 
                </script>    







                

    $sql="SELECT 
    id_det_delito_directa,
    id_delito AS DELITO,
    vvd.nombre AS VICTIMA
            FROM
    det_delitos_vic_directa ddv
        INNER JOIN
    vic_victima_directa vvd ON ddv.id_victima_directa = vvd.id_victima_directa;"        


    $dataProviderPro=new CSqlDataProvider($sql,
                array(
                    'keyField'=>'id_det_delitos_vic_directa',
                    'pagination'=>array('pageSize'=>10,)
                )
       );





<p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model,'Dia'); ?>
        <?php echo $form->dropDownList($model,'dia_informe',array(

                                                                      '01'=>'01',
                                                                      '02'=>'02',
                                                                      '03'=>'03',
                                                                      '04'=>'04',
                                                                      '05'=>'05',
                                                                      '06'=>'06',
                                                                      '07'=>'07',
                                                                      '08'=>'08',
                                                                      '09'=>'09',
                                                                      '10'=>'10',
                                                                      '11'=>'11',
                                                                      '12'=>'12',
                                                                      '13'=>'13',
                                                                      '14'=>'14',
                                                                      '15'=>'15',
                                                                      '16'=>'16',
                                                                      '17'=>'17',
                                                                      '18'=>'18',
                                                                      '19'=>'19',
                                                                      '20'=>'20',
                                                                      '21'=>'21',
                                                                      '22'=>'22',
                                                                      '23'=>'23',
                                                                      '24'=>'24',
                                                                      '25'=>'25',
                                                                      '26'=>'26',
                                                                      '27'=>'27',
                                                                      '28'=>'28',
                                                                      '29'=>'29',
                                                                      '30'=>'30',
                                                                      '31'=>'31',
                                                                    ),
        array('style'=>'width:7%')); ?>
        
        <?php echo $form->error($model,'dia_informe'); ?>



