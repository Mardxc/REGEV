<?php

/**
 * This is the model class for table "exp_lugar".
 *
 * The followings are the available columns in table 'exp_lugar':
 * @property integer $id_exp_lugar
 * @property string $exp_lugar
 *
 * The followings are the available model relations:
 * @property ExpVicDirecta[] $expVicDirectas
 * @property ExpVicIndirecta[] $expVicIndirectas
 * @property ExpVicPotencial[] $expVicPotencials
 */
class ExpLugar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'exp_lugar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('exp_lugar', 'required'),
			array('exp_lugar', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_exp_lugar, exp_lugar', 'safe', 'on'=>'search'),
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
			'expVicDirectas' => array(self::HAS_MANY, 'ExpVicDirecta', 'id_exp_lugar'),
			'expVicIndirectas' => array(self::HAS_MANY, 'ExpVicIndirecta', 'id_exp_lugar'),
			'expVicPotencials' => array(self::HAS_MANY, 'ExpVicPotencial', 'id_exp_lugar'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_exp_lugar' => 'Id Exp Lugar',
			'exp_lugar' => 'Exp Lugar',
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

		$criteria->compare('id_exp_lugar',$this->id_exp_lugar);
		$criteria->compare('exp_lugar',$this->exp_lugar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ExpLugar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
