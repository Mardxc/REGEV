<?php

/**
 * This is the model class for table "det_violacion_vic_potencial".
 *
 * The followings are the available columns in table 'det_violacion_vic_potencial':
 * @property integer $id_det_violacion_potencial
 * @property integer $id_violacion
 * @property integer $id_victima_potencial
 *
 * The followings are the available model relations:
 * @property VicVictimaPotencial $idVictimaPotencial
 * @property CatViolacion $idViolacion
 */
class DetViolacionVicPotencial extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'det_violacion_vic_potencial';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_violacion, id_victima_potencial', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_det_violacion_potencial, id_violacion, id_victima_potencial', 'safe', 'on'=>'search'),
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
			'idVictimaPotencial' => array(self::BELONGS_TO, 'VicVictimaPotencial', 'id_victima_potencial'),
			'idViolacion' => array(self::BELONGS_TO, 'CatViolacion', 'id_violacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_det_violacion_potencial' => 'Id Det Violacion Potencial',
			'id_violacion' => 'Id Violacion',
			'id_victima_potencial' => 'Id Victima Potencial',
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

		$criteria->compare('id_det_violacion_potencial',$this->id_det_violacion_potencial);
		$criteria->compare('id_violacion',$this->id_violacion);
		$criteria->compare('id_victima_potencial',$this->id_victima_potencial);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetViolacionVicPotencial the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
