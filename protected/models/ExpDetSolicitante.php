<?php

/**
 * This is the model class for table "exp_det_solicitante".
 *
 * The followings are the available columns in table 'exp_det_solicitante':
 * @property integer $id_det_solicitante
 * @property string $tipo_solicitante
 *
 * The followings are the available model relations:
 * @property ExpVicDirecta[] $expVicDirectas
 * @property ExpVicIndirecta[] $expVicIndirectas
 * @property ExpVicPotencial[] $expVicPotencials
 */
class ExpDetSolicitante extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'exp_det_solicitante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_det_solicitante, tipo_solicitante', 'required'),
			array('id_det_solicitante', 'numerical', 'integerOnly'=>true),
			array('tipo_solicitante', 'length', 'max'=>75),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_det_solicitante, tipo_solicitante', 'safe', 'on'=>'search'),
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
			'expVicDirectas' => array(self::HAS_MANY, 'ExpVicDirecta', 'id_det_solicitante'),
			'expVicIndirectas' => array(self::HAS_MANY, 'ExpVicIndirecta', 'id_det_solicitante'),
			'expVicPotencials' => array(self::HAS_MANY, 'ExpVicPotencial', 'id_det_solicitante'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_det_solicitante' => 'Id Det Solicitante',
			'tipo_solicitante' => 'Tipo Solicitante',
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

		$criteria->compare('id_det_solicitante',$this->id_det_solicitante);
		$criteria->compare('tipo_solicitante',$this->tipo_solicitante,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ExpDetSolicitante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
