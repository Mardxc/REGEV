<?php

/**
 * This is the model class for table "det_delitos_vic_directa".
 *
 * The followings are the available columns in table 'det_delitos_vic_directa':
 * @property integer $id_det_delito_directa
 * @property integer $id_delito
 * @property integer $id_victima_directa
 *
 * The followings are the available model relations:
 * @property CatDelitos $idDelito
 * @property VicVictimaDirecta $idVictimaDirecta
 */
class DetDelitosVicDirecta extends CActiveRecord
{	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'det_delitos_vic_directa';
	}

public static function deleteDelito($id)
{	
	$sql="DELETE FROM det_delitos_vic_directa 
			WHERE
			    id_det_delito_directa = 41";
}
	public static function listarDelitos($id)
	{
			$sql="
				SELECT 
				    ddvc.id_victima_directa, cd.delito, ddvc.id_det_delito_directa
				FROM
				    det_delitos_vic_directa ddvc
				        INNER JOIN
				    cat_delitos cd ON ddvc.id_delito = cd.id_delito
				WHERE
				    id_victima_directa=".$id;	
		    $sql1="
		    	SELECT 
		    	    COUNT(*)
		    	FROM
		    	    det_delitos_vic_directa ddvc
		    	        INNER JOIN
		    	    cat_delitos cd ON ddvc.id_delito = cd.id_delito
		    	WHERE
		    	    id_victima_directa=".$id;
			$count=Yii::app()->db->createCommand($sql1)->queryScalar();

			 return new CSqlDataProvider($sql,
					array(
						'totalItemCount'=>$count,
						'sort'=>array(
						       'attributes'=>array(
						            'id_det_delito_directa', 'id_victima_directa', 'delito',
						       ),
						   ),
						'keyField'=>'id_det_delito_directa',
						'pagination'=>array('pageSize'=>10,)
					)
		   );
	}


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_delito, id_victima_directa', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_det_delito_directa, id_delito, id_victima_directa', 'safe', 'on'=>'search'),
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
			'idVictimaDirecta' => array(self::BELONGS_TO, 'VicVictimaDirecta', 'id_victima_directa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_det_delito_directa' => 'Id Det Delito Directa',
			'id_delito' => 'Id Delito',
			'id_victima_directa' => 'Id Victima Directa',
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

		$criteria->compare('id_det_delito_directa',$this->id_det_delito_directa);
		$criteria->compare('id_delito',$this->id_delito);
		$criteria->compare('id_victima_directa',$this->id_victima_directa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetDelitosVicDirecta the static model class
	 */

}


