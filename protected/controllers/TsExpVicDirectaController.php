<?php

class TsExpVicDirectaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','ListarSolAutocomplete','Selectmunicipio','ListarVicAutocomplete',
					'dataProDelitosDir'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','Selectmunicipio'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','DeleteMardxc','DeleteViolacionMardxc'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */




	public function actionCreate()
	{
	$model=new TsExpVicDirecta;
	$model_relato=new VicRelatoDirecta;
	$model_solicitante=new SolSolicitante;
	$model_victima_directa=new VicVictimaDirecta;
	$model_delito_det=DetDelitosVicDirecta::listarDelitos(0);
	$model_violacion_det=DetViolacionVicDirecta::listarViolaciones(0);


	if(isset($_POST['TsExpVicDirecta'], $_POST['VicRelatoDirecta']))
	{
		// populate input data to $model and $model_relato
		$model->attributes=$_POST['TsExpVicDirecta'];
		$model_relato->attributes=$_POST['VicRelatoDirecta'];
		
		// validate BOTH $model and $model_relato
		$valid=$model->validate();
		$valid=$model_relato->validate() && $valid;
		
		if($valid)
		{
			// use false parameter to disable validation
			$model->save();
			$model_relato->save();
		$this->redirect(array('admin'));
		}
	}

	if(Yii::app()->request->isAjaxRequest){
		$model_delito_det=null;
		$model_violacion_det=null;
			$id=$_GET['id_victima_directa'];
			$id2=$_GET['id_victima_directa'];

		$model_delito_det=DetDelitosVicDirecta::listarDelitos($id);
		$model_violacion_det=DetViolacionVicDirecta::listarViolaciones($id2);
	}
	$this->render('create', array(
		'model'=>$model,
		'model_relato'=>$model_relato,
		'model_solicitante'=>$model_solicitante,
		'model_victima_directa'=>$model_victima_directa,
		'model_delito_det'=>$model_delito_det,
		'model_violacion_det'=>$model_violacion_det,
	));

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		//$model=new TsExpVicDirecta;
		$model_relato=VicRelatoDirecta::model()->findByAttributes(array('id_victima_directa'=>$model->id_victima_directa));
		$model_solicitante=SolSolicitante::model()->findByAttributes(array('id_solicitante'=>$model->id_solicitante));
		$model_victima_directa=VicVictimaDirecta::model()->findByAttributes(array('id_victima_directa'=>$model_relato->id_victima_directa));
		$model_delito_det=DetDelitosVicDirecta::listarDelitos($model_relato->id_victima_directa);
		$model_violacion_det=DetViolacionVicDirecta::listarViolaciones($model_relato->id_victima_directa);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TsExpVicDirecta'])||isset($_POST['VicRelatoDirecta']))
		{
			$model->attributes=$_POST['TsExpVicDirecta'];
			$model_relato->attributes=$_POST['VicRelatoDirecta'];
			/*$model_solicitante->attributes=$_POST['SolSolicitante'];
			$model_victima_directa->attributes=$_POST['VicVictimaDirecta'];
			$model_delito_det->attributes=$_POST['DetDelitosVicDirecta'];
			$model_violacion_det->attributes=$_POST['DetViolacionVicDirecta'];*/
			if($model->save() && $model_relato->save())
				$this->redirect(array('admin','id'=>''));
		}
		if(Yii::app()->request->isAjaxRequest){
			$model_delito_det=null;
			$model_violacion_det=null;
				$id=$_GET['id_victima_directa'];
				$id2=$_GET['id_victima_directa'];

			$model_delito_det=DetDelitosVicDirecta::listarDelitos($id);
			$model_violacion_det=DetViolacionVicDirecta::listarViolaciones($id2);
		}

		$this->render('update', array(
			'model'=>$model,
			'model_relato'=>$model_relato,
			'model_solicitante'=>$model_solicitante,
			'model_victima_directa'=>$model_victima_directa,
			'model_delito_det'=>$model_delito_det,
			'model_violacion_det'=>$model_violacion_det,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionDeleteMardxc()
	{
		$det_delito=$_POST['id_det_delito'];
		$id_victima_directa=$_POST['id_victima_directa'];
		
		$sql="DELETE FROM det_delitos_vic_directa 
			WHERE
			    id_det_delito_directa ='";
		
		$connection=Yii::app()->db;
		foreach($det_delito as $autoId){
			$command=$connection->createCommand($sql.$autoId."';");
			$command->execute();
		}
		echo CJSON::encode(
			array(
				'id_victima_directa'=>$id_victima_directa
				)
		);
	}
	public function actionDeleteViolacionMardxc()
	{
		$id_det_violacion_directa=$_POST['id_det_violacion_directa'];
		$id_victima_directa=$_POST['id_victima_directa'];
		
		$sql="DELETE FROM det_violacion_vic_directa 
			WHERE
			    id_det_violacion_directa ='";
		
		$connection=Yii::app()->db;
		foreach($id_det_violacion_directa as $autoId){
			$command=$connection->createCommand($sql.$autoId."';");
			$command->execute();
		}
		echo CJSON::encode(
			array(
				'id_victima_directa'=>$id_victima_directa
				)
		);
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TsExpVicDirecta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new TsExpVicDirecta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TsExpVicDirecta']))
			$model->attributes=$_GET['TsExpVicDirecta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TsExpVicDirecta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TsExpVicDirecta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TsExpVicDirecta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ts-exp-vic-directa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


		public function actionListarSolAutocomplete($term)
		{
		$sql="SELECT 
			  id_solicitante, ' ', nombre, ' ', ape_pat, ' ', ape_mat 
			

		 	  FROM 
		 	  sol_solicitante 
			 
	     	  WHERE 
			  concat_ws('',nombre,' ',ape_pat,' ',ape_mat) LIKE '%".$term."%'";



		$data=Yii::app()->db->createCommand($sql)->queryAll();

		$arr=array();

		foreach ($data as $item) {

			$arr[]=array(
				'id'=>$item['id_solicitante'],
				'value'=>$item['nombre'].' '.$item['ape_pat'].' '.$item['ape_mat']
				//'label'=>$item['nombre']

			
			);
		}

		echo CJSON::encode($arr);
		}



		public function actionListarVicAutocomplete($term)
		{
		$sql="SELECT 
			  id_victima_directa, ' ', nombre, ' ', ape_pat, ' ', ape_mat 
			

		 	  FROM 
		 	  vic_victima_directa 
			 
	     	  WHERE 
			  concat_ws('',nombre,' ',ape_pat,' ',ape_mat) LIKE '%".$term."%'";



		$data=Yii::app()->db->createCommand($sql)->queryAll();

		$arr=array();

		foreach ($data as $item) {

			$arr[]=array(
				'id'=>$item['id_victima_directa'],
				'value'=>$item['nombre'].' '.$item['ape_pat'].' '.$item['ape_mat']
				//'label'=>$item['nombre']

			
			);
		}

		echo CJSON::encode($arr);
		}


		public function actionSelectmunicipio() //AÑADIR A REGLAS
        {

                $id_uno = $_POST ['VicRelatoDirecta']['id_estado'];
        //"ID UNO" ES IGUAL A LO QUE RECIBE DE VICTIMA DIRECTA EN SU CAMPO ESTADO, ES DECIR LA LISTA DESPLEGABLE

                $lista = CatMunicipios::model()->findAll('id_estado = :id_uno',array(':id_uno'=>$id_uno));
 //HACE LA CONSULTA, DESPLIEGA LOS MUNICIPIOS QUE COINCIDEN CON EL "ID ESTADO"  A "id_uno" EL CUAL RECIBE LA LISTA DE ESTADOS
  //nuestra tabla municipio tambien tiene el campo "id_estado" por ello es capaz de hacer la compartativa
                $lista = CHtml::listData($lista, 'id_municipio', 'municipio');
//list data SELECCIONA LOS PARAMTREOS $lista Y LOS CAMPOS QUE OBTENDREMOS DE LA COMPARATIVA ANTERIOR
                foreach ($lista as $valor => $municipio) {
                        echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($municipio),true);
                }


        }


}
