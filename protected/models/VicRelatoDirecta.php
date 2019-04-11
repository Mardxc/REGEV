<?php

/**
 * This is the model class for table "vic_relato_directa".
 *
 * The followings are the available columns in table 'vic_relato_directa':
 * @property integer $id_relato_directa
 * @property string $calle_rel
 * @property string $num_int_rel
 * @property string $num_ext_rel
 * @property string $codigo_postal_rel
 * @property string $colonia_rel
 * @property string $localidad_rel
 * @property integer $id_estado
 * @property integer $id_municipio
 * @property string $fecha_rel
 * @property string $descripcion
 * @property string $id_victima_directa
 *
 * The followings are the available model relations:
 * @property ExpVicIndirecta[] $expVicIndirectas
 * @property ExpVicPotencial[] $expVicPotencials
 * @property CatEstado $idEstado
 * @property CatMunicipios $idMunicipio
 */
class VicRelatoDirecta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vic_relato_directa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, id_victima_directa', 'required'),
			array('id_estado, id_municipio', 'numerical', 'integerOnly'=>true),
			array('calle_rel, num_int_rel, num_ext_rel, codigo_postal_rel, colonia_rel, localidad_rel, fecha_rel, id_victima_directa', 'length', 'max'=>45),
			array('descripcion', 'length', 'max'=>5000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_relato_directa, calle_rel, num_int_rel, num_ext_rel, codigo_postal_rel, colonia_rel, localidad_rel, id_estado, id_municipio, fecha_rel, descripcion, id_victima_directa', 'safe', 'on'=>'search'),
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
			'expVicIndirectas' => array(self::HAS_MANY, 'ExpVicIndirecta', 'id_relato'),
			'expVicPotencials' => array(self::HAS_MANY, 'ExpVicPotencial', 'id_relato'),
			'idEstado' => array(self::BELONGS_TO, 'CatEstado', 'id_estado'),
			'idMunicipio' => array(self::BELONGS_TO, 'CatMunicipios', 'id_municipio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_relato_directa' => 'Id Relato Directa',
			'calle_rel' => 'Calle Rel',
			'num_int_rel' => 'Num Int Rel',
			'num_ext_rel' => 'Num Ext Rel',
			'codigo_postal_rel' => 'Codigo Postal Rel',
			'colonia_rel' => 'Colonia Rel',
			'localidad_rel' => 'Localidad Rel',
			'id_estado' => 'Id Estado',
			'id_municipio' => 'Id Municipio',
			'fecha_rel' => 'Fecha Rel',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('id_relato_directa',$this->id_relato_directa);
		$criteria->compare('calle_rel',$this->calle_rel,true);
		$criteria->compare('num_int_rel',$this->num_int_rel,true);
		$criteria->compare('num_ext_rel',$this->num_ext_rel,true);
		$criteria->compare('codigo_postal_rel',$this->codigo_postal_rel,true);
		$criteria->compare('colonia_rel',$this->colonia_rel,true);
		$criteria->compare('localidad_rel',$this->localidad_rel,true);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('id_municipio',$this->id_municipio);
		$criteria->compare('fecha_rel',$this->fecha_rel,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('id_victima_directa',$this->id_victima_directa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VicRelatoDirecta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
