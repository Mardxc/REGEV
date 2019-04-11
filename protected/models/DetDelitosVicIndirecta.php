<?php

/**
 * This is the model class for table "det_delitos_vic_indirecta".
 *
 * The followings are the available columns in table 'det_delitos_vic_indirecta':
 * @property integer $id_det_delito_indirecta
 * @property integer $id_delito
 * @property integer $id_victima_indirecta
 *
 * The followings are the available model relations:
 * @property CatDelitos $idDelito
 * @property VicVictimaIndirecta $idVictimaIndirecta
 */
class DetDelitosVicIndirecta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'det_delitos_vic_indirecta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_delito, id_victima_indirecta', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_det_delito_indirecta, id_delito, id_victima_indirecta', 'safe', 'on'=>'search'),
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
			'idDelito' => array(self::BELONGS_TO, 'CatDelitos', 'id_delito'),
			'idVictimaIndirecta' => array(self::BELONGS_TO, 'VicVictimaIndirecta', 'id_victima_indirecta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_det_delito_indirecta' => 'Id Det Delito Indirecta',
			'id_delito' => 'Id Delito',
			'id_victima_indirecta' => 'Id Victima Indirecta',
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

		$criteria->compare('id_det_delito_indirecta',$this->id_det_delito_indirecta);
		$criteria->compare('id_delito',$this->id_delito);
		$criteria->compare('id_victima_indirecta',$this->id_victima_indirecta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetDelitosVicIndirecta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
