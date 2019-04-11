<?php

/**
 * This is the model class for table "vic_relacion".
 *
 * The followings are the available columns in table 'vic_relacion':
 * @property integer $id_vic_relacion
 * @property integer $id_victima_indirecta
 * @property integer $id_exp_victima_directa
 * @property integer $id_parentesco
 *
 * The followings are the available model relations:
 * @property SolParentesco $idParentesco
 * @property ExpVicDirecta $idExpVictimaDirecta
 * @property VicVictimaIndirecta $idVictimaIndirecta
 */
class VicRelacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vic_relacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_victima_indirecta, id_exp_victima_directa, id_parentesco', 'required'),
			array('id_victima_indirecta, id_exp_victima_directa, id_parentesco', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_vic_relacion, id_victima_indirecta, id_exp_victima_directa, id_parentesco', 'safe', 'on'=>'search'),
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
			'idParentesco' => array(self::BELONGS_TO, 'SolParentesco', 'id_parentesco'),
			'idExpVictimaDirecta' => array(self::BELONGS_TO, 'ExpVicDirecta', 'id_exp_victima_directa'),
			'idVictimaIndirecta' => array(self::BELONGS_TO, 'VicVictimaIndirecta', 'id_victima_indirecta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_vic_relacion' => 'Id Vic Relacion',
			'id_victima_indirecta' => 'Id Victima Indirecta',
			'id_exp_victima_directa' => 'Id Exp Victima Directa',
			'id_parentesco' => 'Id Parentesco',
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

		$criteria->compare('id_vic_relacion',$this->id_vic_relacion);
		$criteria->compare('id_victima_indirecta',$this->id_victima_indirecta);
		$criteria->compare('id_exp_victima_directa',$this->id_exp_victima_directa);
		$criteria->compare('id_parentesco',$this->id_parentesco);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VicRelacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
