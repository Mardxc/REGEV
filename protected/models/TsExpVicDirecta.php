<?php

/**
 * This is the model class for table "ts_exp_vic_directa".
 *
 * The followings are the available columns in table 'ts_exp_vic_directa':
 * @property integer $id_ts_exp_vic_directa
 * @property integer $year_expediente
 * @property string $id_exp_lugar
 * @property string $fecha_registro
 * @property integer $id_institucion_ref
 * @property string $num_oficio
 * @property integer $id_solicitante
 * @property integer $id_victima_directa
 */
class TsExpVicDirecta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	
	public function tableName()
	{
		return 'ts_exp_vic_directa';
	}

	public static function getNombreSolicitante($id){
		if ($id=='') {
			$id=0;
		}
		$sql="SELECT 
			    CONCAT(ss.nombre,
			            ' ',
			            ss.ape_pat,
			            ' ',
			            ss.ape_mat) AS nombre
			FROM
			    ts_exp_vic_directa tevd
			        INNER JOIN
			    sol_solicitante ss ON tevd.id_solicitante = ss.id_solicitante
			WHERE tevd.id_solicitante=".$id;
		$nombre=SolSolicitante::model()->findBySql($sql);
		return $nombre['nombre'];
	}
	public static function getNombreVictima($id){
		if ($id=='') {
			$id=0;
		}
		$sql="SELECT 
			    CONCAT(ss.nombre,
			            ' ',
			            ss.ape_pat,
			            ' ',
			            ss.ape_mat) AS nombre
			FROM
			    ts_exp_vic_directa tevd
			        INNER JOIN
			    vic_victima_directa ss ON tevd.id_victima_directa = ss.id_victima_directa
			WHERE
			    tevd.id_victima_directa =".$id;
		$nombre=VicVictimaDirecta::model()->findBySql($sql);
		return $nombre['nombre'];
	}
	public static function getListLugar()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(ExpLugar::model()->findAll(),'id_exp_lugar',
			'exp_lugar');
	}

		public static function getListInstRef()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(ExpInstitucionRef::model()->findAll(),'id_institucion_ref',
			'institucion_ref');
	}	


	public static function getNameLugar($id_exp_lugar)
	{

		$exp_lugar=ExpLugar::model()->find('id_exp_lugar='.$id_exp_lugar);
		return $exp_lugar['exp_lugar'];
	}

	public static function getNameSol($id_solicitante)
	{

		$nombre=SolSolicitante::model()->find('id_solicitante='.$id_solicitante);
		return $nombre['nombre'].' '.$nombre['ape_pat'].' '.$nombre['ape_mat'];
	}

	public static function getNameVicDir($id_victima_directa)
	{
		$nombre=VicVictimaDirecta::model()->find('id_victima_directa='.$id_victima_directa);
		return $nombre['nombre'].' '.$nombre['ape_pat'].' '.$nombre['ape_mat'];
	}

	public static function getListEstado()
	{

	return CHtml ::listData(CatEstado::model()->findAll(),'id_estado','estado');
	}

	public static function getListMunicipio()
	{
		return CHtml ::listData(CatMunicipios::model()->findAll(),'id_municipio','municipio');
	}

	public static function getListDelitos()
	{
		return CHtml :: listData(CatDelitos::model()->findAll(),'id_delito','delito');
	}
	public static function getListViolaciones()
	{
		return CHtml :: listData(CatViolacion::model()->findAll(),'id_violacion','tipo_violacion');
	}


	public function listarDelitos()
	{
		
		$criteria=new CDbCriteria;
		$criteria->condition="id_victima_directa=:id";
		$criteria->params=array(':id'=>$id);
		//$criteria->limit=30;
		
		$data=DetDelitosVicDirecta::model()->findAll($criteria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			//'data'=>$data,
		));

		/*$sql="SELECT * FROM regev.ts_exp_vic_directa;";	

		 return new CSqlDataProvider($sql,
				array(
					'keyField'=>'id_victima_directa',
					'pagination'=>array('pageSize'=>10,)
				)
	   );*/

	}

			public static function getListParentesco()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(SolParentesco::model()->findAll(),'id_parentesco',
			'parentesco');
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('year_expediente, id_exp_lugar, fecha_registro, id_solicitante, id_victima_directa', 'required'),
			array('year_expediente, id_institucion_ref, id_solicitante,id_parentesco, id_victima_directa, id_vderechos', 'numerical', 'integerOnly'=>true),
			array('id_exp_lugar, fecha_registro, num_oficio, folio_derechos', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ts_exp_vic_directa, year_expediente, id_exp_lugar, fecha_registro, id_institucion_ref, num_oficio, id_solicitante,id_parentesco, id_victima_directa, id_vderechos', 'safe', 'on'=>'search'),
		);
	}

/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_ts_exp_vic_directa' => 'Id Ts Exp Vic Directa',
			'year_expediente' => 'Year Expediente',
			'id_exp_lugar' => 'Id Exp Lugar',
			'fecha_registro' => 'Fecha Registro',
			'id_institucion_ref' => 'Id Institucion Ref',
			'num_oficio' => 'Num Oficio',
			'id_solicitante' => 'Id Solicitante',
			'id_parentesco'=>'Id Parentesco',
			'id_victima_directa' => 'Id Victima Directa',
			'id_vderechos'=>'Id Vderechos',
			'folio_derechos'=>'Folio Derechos',
		);
	}
public function delitos()
{
		$sql="SELECT 
   		 id_det_delito_directa,
   		 id_delito AS DELITO,
    	vvd.nombre AS VICTIMA
			FROM
    	det_delitos_vic_directa ddv
        INNER JOIN
    	vic_victima_directa vvd 
    	ON 
    	ddv.id_victima_directa = vvd.id_victima_directa";	

		$model_delito_directa=new CSqlDataProvider($sql,
				array(
					'keyField'=>'id_det_delito_directa',
					'pagination'=>array('pageSize'=>10,)
				)
	   );

		if(Yii::app()->request->isAjaxRequest){
		$model_delito_directa=null;
		$id_det_delito_directa=$_GET['id_det_delito_directa'];
		$sql="SELECT 
   		 id_det_delito_directa,
   		 id_delito AS DELITO,
    	vvd.nombre AS VICTIMA
			FROM
    	det_delitos_vic_directa ddv
        INNER JOIN
    	vic_victima_directa vvd 
    	ON 
    	ddv.id_victima_directa = vvd.id_victima_directa
    	WHERE
		 ddv.id_det_delito_directa = $id_det_delito_directa";
			

			$model_delito_directa=new CSqlDataProvider($sql,
				array(
					'keyField'=>'id_detalles_venta',
					'pagination'=>array('pageSize'=>10,)
				)
			);
			echo CJSON::encode($model_delito_directa);

		$this->render('admin',array(
			'model_delito_directa'=>$model_delito_directa
		));
	}
}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_ts_exp_vic_directa',$this->id_ts_exp_vic_directa);
		$criteria->compare('year_expediente',$this->year_expediente);
		$criteria->compare('id_exp_lugar',$this->id_exp_lugar,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('id_institucion_ref',$this->id_institucion_ref);
		$criteria->compare('num_oficio',$this->num_oficio,true);
		$criteria->compare('id_solicitante',$this->id_solicitante);
		$criteria->compare('id_parentesco',$this->id_parentesco);
		$criteria->compare('id_victima_directa',$this->id_victima_directa);
		$criteria->compare('id_vderechos',$this->id_vderechos);
		$criteria->compare('folio_derechos',$this->folio_derechos);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TsExpVicDirecta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
