<?php

/**
 * This is the model class for table "jur_informes".
 *
 * The followings are the available columns in table 'jur_informes':
 * @property integer $id_informe_jd
 * @property integer $id_lugar
 * @property integer $tipo_victima
 * @property integer $id_atencion
 * @property string $tipo_registro
 * @property string $fecha_informe
 * @property string $carpeta_inv
 * @property string $ceeav
 * @property integer $id_municipio
 * @property string $localidad
 * @property string $nombre
 * @property integer $id_genero
 * @property integer $edad
 * @property integer $id_estado_civil
 * @property string $adscripcion_indigena
 * @property string $migrante
 * @property integer $id_escolaridad
 * @property integer $id_situacion_economica
 * @property integer $id_delito
 * @property string $canalizacion
 * @property integer $id_asesor_juridico
 * @property string $psicologo
 * @property string $descripcion_psicologo
 */
class JurInformes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jur_informes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_lugar, id_tipo_victima, id_atencion, tipo_registro, fecha_informe, ceeav, id_municipio, id_genero, edad, id_estado_civil, id_escolaridad, id_situacion_economica, id_delito, canalizacion, id_asesor_juridico', 'required'),
			array('id_lugar, id_tipo_victima, id_atencion, id_municipio, id_genero, edad, id_estado_civil, id_escolaridad, id_situacion_economica, id_delito, id_asesor_juridico', 'numerical', 'integerOnly'=>true),
			array('tipo_registro, fecha_informe, carpeta_inv, ceeav, localidad, nombre, adscripcion_indigena, migrante, canalizacion, psicologo, descripcion_psicologo', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_informe_jd, id_lugar, id_tipo_victima, id_atencion, tipo_registro, fecha_informe, carpeta_inv, ceeav, id_municipio, localidad, nombre, id_genero, edad, id_estado_civil, adscripcion_indigena, migrante, id_escolaridad, id_situacion_economica, id_delito, canalizacion, id_asesor_juridico, psicologo, descripcion_psicologo', 'safe', 'on'=>'search'),
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
public static function getListMunicipios()
	{
		$sql="SELECT * FROM cat_municipios WHERE id_estado=24";

		//$municipio=CatMunicipios::findBySql($sql);
		return CHtml::listData(CatMunicipios::model()->findAllBySql($sql),'id_municipio','municipio');

		//return $municipio['departamento'];
	}
		
	public static function getListGenero()
	{
		return Chtml::listData(CatGenero::model()->findAll(),'id_genero','genero');
	}			
	public static function getListEstadoCivil()
	{
	return CHtml::listData(CatEstadoCivil::model()->findAll(),'id_estado_civil','estado_civil');
	}

	public static function getListEscolaridad()
	{
		return CHtml::listData(CatEscolaridad::model()->findAll(),'id_escolaridad','escolaridad');
	}	
	public static function getListSituacion()
	{
		return CHtml::listData(CatSituacionEconomica::model()->findAll(),'id_situacion_economica','situacion_economica');
	}
	public static function getListDelitos()
	{
		return CHtml::listData(CatDelitos::model()->findAll(),'id_delito','delito');
	}
	public static function getListAsesores()
	{
		return CHtml::listData(CatAsesores::model()->findAll(),'id_asesor_juridico','nombre_asesor');
	}

	public static function getNameMunicipio($id_municipio)
	{

		$municipio=CatMunicipios::model()->find('id_municipio='.$id_municipio);
		return $municipio['municipio'];
	}

	public static function getNameLugar($id_exp_lugar)
	{
		$exp_lugar=ExpLugar::model()->find('id_exp_lugar='.$id_exp_lugar);
		return $exp_lugar['exp_lugar'];
	}
	public static function getNameTipoVictima($id_tipo_victima)
	{
		$tipo_victima=CatTipoVictima::model()->find('id_tipo_victima='.$id_tipo_victima);
		return $tipo_victima['tipo_victima'];
	}
	public static function getNameTipoAtencion($id_atencion)
	{
		$atencion=CatAtencion::model()->find('id_atencion='.$id_atencion);
		return $atencion['atencion'];
	}

	public static function getListLugar()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(ExpLugar::model()->findAll(),'id_exp_lugar',
			'exp_lugar');
	}
	public static function getListAtencion()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(CatAtencion::model()->findAll(),'id_atencion',
			'atencion');
	}	
	public static function getListTipoVic()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(CatTipoVictima::model()->findAll(),'id_tipo_victima',
			'tipo_victima');
	}	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_informe_jd' => 'Id Informe Jd',
			'id_lugar' => 'Id Lugar',
			'id_tipo_victima' => 'Tipo Victima',
			'id_atencion' => 'Id Atencion',
			'tipo_registro' => 'Tipo Registro',
			'fecha_informe' => 'Fecha Informe',
			'carpeta_inv' => 'Carpeta Inv',
			'ceeav' => 'Ceeav',
			'id_municipio' => 'Id Municipio',
			'localidad' => 'Localidad',
			'nombre' => 'Nombre',
			'id_genero' => 'Id Genero',
			'edad' => 'Edad',
			'id_estado_civil' => 'Id Estado Civil',
			'adscripcion_indigena' => 'Adscripcion Indigena',
			'migrante' => 'Migrante',
			'id_escolaridad' => 'Id Escolaridad',
			'id_situacion_economica' => 'Id Situacion Economica',
			'id_delito' => 'Id Delito',
			'canalizacion' => 'Canalizacion',
			'id_asesor_juridico' => 'Id Asesor Juridico',
			'psicologo' => 'Psicologo',
			'descripcion_psicologo' => 'Descripcion Psicologo',
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

		$criteria->compare('id_informe_jd',$this->id_informe_jd);
		$criteria->compare('id_lugar',$this->id_lugar);
		$criteria->compare('id_tipo_victima',$this->id_tipo_victima);
		$criteria->compare('id_atencion',$this->id_atencion);
		$criteria->compare('tipo_registro',$this->tipo_registro,true);
		$criteria->compare('fecha_informe',$this->fecha_informe,true);
		$criteria->compare('carpeta_inv',$this->carpeta_inv,true);
		$criteria->compare('ceeav',$this->ceeav,true);
		$criteria->compare('id_municipio',$this->id_municipio);
		$criteria->compare('localidad',$this->localidad,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('id_genero',$this->id_genero);
		$criteria->compare('edad',$this->edad);
		$criteria->compare('id_estado_civil',$this->id_estado_civil);
		$criteria->compare('adscripcion_indigena',$this->adscripcion_indigena,true);
		$criteria->compare('migrante',$this->migrante,true);
		$criteria->compare('id_escolaridad',$this->id_escolaridad);
		$criteria->compare('id_situacion_economica',$this->id_situacion_economica);
		$criteria->compare('id_delito',$this->id_delito);
		$criteria->compare('canalizacion',$this->canalizacion,true);
		$criteria->compare('id_asesor_juridico',$this->id_asesor_juridico);
		$criteria->compare('psicologo',$this->psicologo,true);
		$criteria->compare('descripcion_psicologo',$this->descripcion_psicologo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return JurInformes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
