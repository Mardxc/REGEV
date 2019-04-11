<?php

/**
 * This is the model class for table "cat_delitos".
 *
 * The followings are the available columns in table 'cat_delitos':
 * @property integer $id_delito
 * @property string $delito
 */
class CatDelitos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cat_delitos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('delito', 'required'),
			array('delito', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_delito, delito', 'safe', 'on'=>'search'),
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
			'id_delito' => 'Id Delito',
			'delito' => 'Delito',
		);
	}

		public static function getDelitos($id_delito)
	{
			$res=CatDelitos::model()->find('id_delito='.$id_delito);
			return $res['delito'];
	}

	public static function getDelito($id_delito)
	{
		$sql="SELECT 
			    delito
			FROM
			    cat_delitos
			WHERE
			    id_delito=".$id_delito;
			$motivo=CatDelitos::model()->findBySql($sql);
			return $motivo['delito'];

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

		$criteria->compare('id_delito',$this->id_delito);
		$criteria->compare('delito',$this->delito,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CatDelitos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
