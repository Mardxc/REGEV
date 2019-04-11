<?php

/**
 * This is the model class for table "sol_vderechos".
 *
 * The followings are the available columns in table 'sol_vderechos':
 * @property integer $id_vderechos
 * @property string $vderechos
 *
 * The followings are the available model relations:
 * @property VicVictimaDirecta[] $vicVictimaDirectas
 * @property VicVictimaIndirecta[] $vicVictimaIndirectas
 * @property VicVictimaPotencial[] $vicVictimaPotencials
 */
class SolVderechos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sol_vderechos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vderechos', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_vderechos, vderechos', 'safe', 'on'=>'search'),
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
			'vicVictimaDirectas' => array(self::HAS_MANY, 'VicVictimaDirecta', 'id_vderechos'),
			'vicVictimaIndirectas' => array(self::HAS_MANY, 'VicVictimaIndirecta', 'id_vderechos'),
			'vicVictimaPotencials' => array(self::HAS_MANY, 'VicVictimaPotencial', 'id_vderechos'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_vderechos' => 'Id Vderechos',
			'vderechos' => 'Vderechos',
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

		$criteria->compare('id_vderechos',$this->id_vderechos);
		$criteria->compare('vderechos',$this->vderechos,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SolVderechos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
