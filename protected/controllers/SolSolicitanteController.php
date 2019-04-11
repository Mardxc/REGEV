<?php

class SolSolicitanteController extends Controller
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

			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','Selectmunicipio'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'addSolicitante'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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

	public function actionCreate()
	{
		$model=new SolSolicitante;

		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SolSolicitante']))
		{
			$model->attributes=$_POST['SolSolicitante'];
			if($model->save())
				$this->redirect(array('tsExpVicDirecta/admin'));
		}

		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SolSolicitante']))
		{
			$model->attributes=$_POST['SolSolicitante'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SolSolicitante');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SolSolicitante('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SolSolicitante']))
			$model->attributes=$_GET['SolSolicitante'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SolSolicitante the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SolSolicitante::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SolSolicitante $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sol-solicitante-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


public function actionSelectmunicipio() //AÑADIR A REGLAS
        {

                $id_uno = $_POST ['SolSolicitante']['id_estado'];
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
