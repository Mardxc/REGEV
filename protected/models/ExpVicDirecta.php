<?php

/**
 * This is the model class for table "exp_vic_directa".
 *
 * The followings are the available columns in table 'exp_vic_directa':
 * @property integer $id_exp_vic_directa
 * @property integer $year_expediente
 * @property integer $id_exp_lugar
 * @property integer $id_det_solicitante
 * @property integer $id_solicitante
 * @property integer $id_victima_directa
 * @property integer $id_representante
 * @property string $expediente_directa
 * @property string $num_regev
 * @property string $fecha_registro
 * @property integer $id_institucion_ref
 * @property string $num_oficio
 * @property integer $id_relato
 *
 * The followings are the available model relations:
 * @property ExpDetSolicitante $idDetSolicitante
 * @property ExpLugar $idExpLugar
 * @property ExpInstitucionRef $idInstitucionRef
 * @property ExpRelato $idRelato
 * @property RepRepresentante $idRepresentante
 * @property SolSolicitante $idSolicitante
 * @property VicVictimaDirecta $idVictimaDirecta
 * @property VicRelacion[] $vicRelacions
 */
class ExpVicDirecta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'exp_vic_directa';
	}

	public static function getListLugar()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(ExpLugar::model()->findAll(),'id_exp_lugar',
			'exp_lugar');
	}
		public static function getListTipoSolicitante()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(ExpDetSolicitante::model()->findAll(),'id_det_solicitante',
			'tipo_solicitante');
	}
		public static function getListInstRef()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(ExpInstitucionRef::model()->findAll(),'id_institucion_ref',
			'institucion_ref');
	}

	public static function getNameSolicitante($id_solicitante)
	{
		//$sql="SELECT nombre, ape_pat, ape_mat FROM sol_solicitante WHERE id_solicitante=$id_solicitante";
		//$solicitante=SolSolicitante::findBySql($sql);

		//return $solicitante['nombre'];
	}


				/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('year_expediente, id_exp_lugar,fecha_regev, id_det_solicitante, id_victima_directa, expediente_directa', 'required'),
			array('year_expediente, id_exp_lugar, id_det_solicitante,fecha_regev, id_solicitante, id_victima_directa', 'numerical', 'integerOnly'=>true),
			array('expediente_directa, num_regev, fecha_registro,fecha_regev, num_oficio', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_exp_vic_directa, year_expediente, id_exp_lugar,fecha_regev, id_det_solicitante, id_solicitante, id_victima_directa, id_representante, expediente_directa, num_regev', 'safe', 'on'=>'search'),
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
			'idDetSolicitante' => array(self::BELONGS_TO, 'ExpDetSolicitante', 'id_det_solicitante'),
			'idExpLugar' => array(self::BELONGS_TO, 'ExpLugar', 'id_exp_lugar'),
			'idInstitucionRef' => array(self::BELONGS_TO, 'ExpInstitucionRef', 'id_institucion_ref'),
	
			'idRepresentante' => array(self::BELONGS_TO, 'RepRepresentante', 'id_representante'),
			'idSolicitante' => array(self::BELONGS_TO, 'SolSolicitante', 'id_solicitante'),
			'idVictimaDirecta' => array(self::BELONGS_TO, 'VicVictimaDirecta', 'id_victima_directa'),
			'vicRelacions' => array(self::HAS_MANY, 'VicRelacion', 'id_exp_victima_directa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_exp_vic_directa' => 'Id Exp Vic Directa',
			'year_expediente' => 'Año Expediente',
			'id_exp_lugar' => 'Id Exp Lugar',
			'fecha_regev' => 'Fecha Regev',
			'id_det_solicitante' => 'Id Det Solicitante',
			'id_solicitante' => 'Id Solicitante',
			'id_victima_directa' => 'Id Victima Directa',
			'id_representante' => 'Id Representante',
			'expediente_directa' => 'Expediente Directa',
			'num_regev' => 'Num Regev',
		
		);
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

		$criteria->compare('id_exp_vic_directa',$this->id_exp_vic_directa);
		$criteria->compare('year_expediente',$this->year_expediente);
		$criteria->compare('id_exp_lugar',$this->id_exp_lugar);
		$criteria->compare('fecha_regev',$this->fecha_regev,true);
		$criteria->compare('id_det_solicitante',$this->id_det_solicitante);
		$criteria->compare('id_solicitante',$this->id_solicitante);
		$criteria->compare('id_victima_directa',$this->id_victima_directa);
		$criteria->compare('id_representante',$this->id_representante);
		$criteria->compare('expediente_directa',$this->expediente_directa,true);
		$criteria->compare('num_regev',$this->num_regev,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ExpVicDirecta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
