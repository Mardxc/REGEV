<?php

/**
 * This is the model class for table "vic_victima_directa".
 *
 * The followings are the available columns in table 'vic_victima_directa':
 * @property integer $id_victima_directa
 * @property string $nombre
 * @property string $ape_pat
 * @property string $ape_mat
 * @property integer $id_genero
 * @property string $curp
 * @property string $fecha_nacimiento
 * @property integer $edad
 * @property integer $id_ocupacion
 * @property integer $id_escolaridad
 * @property integer $id_discapacidad
 * @property integer $id_estado_civil
 * @property integer $num_dependientes
 * @property integer $id_nacionalidad
 * @property integer $id_pais
 * @property integer $id_estado
 * @property integer $id_municipio
 * @property string $colonia
 * @property string $localidad
 * @property string $calle
 * @property integer $num_exp
 * @property integer $num_int
 * @property integer $codigo_postal
 * @property integer $telefono_fijo
 * @property integer $id_calidad_migratoria
 * @property integer $id_documentos
 * @property integer $id_identificacion
 * @property string $folio_identificacion
 * @property integer $id_vderechos
 * @property string $folio_derechos
 *
 * The followings are the available model relations:
 * @property DetDelitosVicDirecta[] $detDelitosVicDirectas
 * @property DetViolacionVicDirecta[] $detViolacionVicDirectas
 * @property ExpVicDirecta[] $expVicDirectas
 * @property CatCalidadMigratoria $idCalidadMigratoria
 * @property CatDiscapacidad $idDiscapacidad
 * @property CatDocumentos $idDocumentos
 * @property CatEscolaridad $idEscolaridad
 * @property CatEstado $idEstado
 * @property CatEstadoCivil $idEstadoCivil
 * @property CatGenero $idGenero
 * @property CatIdentificacion $idIdentificacion
 * @property CatMunicipios $idMunicipio
 * @property CatNacionalidad $idNacionalidad
 * @property CatOcupaciones $idOcupacion
 * @property CatPais $idPais
 * @property SolVderechos $idVderechos
 */
class VicVictimaDirecta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vic_victima_directa';
	}

	public static function getListGenero()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(CatGenero::model()->findAll(),'id_genero',
			'genero');
	}

	public static function getListOcupaciones()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(CatOcupaciones::model()->findAll(),'id_ocupacion',
			'ocupacion');
	}

	public static function getListEscolaridad()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(CatEscolaridad::model()->findAll(),'id_escolaridad',
			'escolaridad');
	}
	public static function getListDiscapacidad()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(CatDiscapacidad::model()->findAll(),'id_discapacidad',
			'discapacidad');
	}
	public static function getListEstadoCivil()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(CatEstadoCivil::model()->findAll(),'id_estado_civil',
			'estado_civil');
	}

	public static function getListNacionalidad()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(CatNacionalidad::model()->findAll(),'id_nacionalidad',
			'nacionalidad');
	}
	public static function getListPais()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(CatPais::model()->findAll(),'id_pais',
			'pais');
	}
	public static function getListEstado()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(CatEstado::model()->findAll(),'id_estado',
			'estado');
	}

	public static function getListMunicipio()
	{//regresa la lista de productos por su contenido
		//$sql="SELECT municipio FROM cat_municipios WHERE municipio='ABASOLO'";
		//return CHtml ::listData(CatMunicipios::model()->findAllBySql($sql),'id_municipio',
		//	'municipio');

		return CHtml ::listData(CatMunicipios::model()->findAll(),'id_municipio',
			'municipio');
	}

		public static function getListCalidad()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(CatCalidadMigratoria::model()->findAll(),'id_calidad_migratoria',
			'calidad_migratoria');
	}

			public static function getListDocumentos()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(CatDocumentos::model()->findAll(),'id_documentos',
			'documentos');
	}
			public static function getListIdentificacion()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(CatIdentificacion::model()->findAll(),'id_identificacion',
			'identificacion');
	}

				public static function getListVderechos()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(SolVderechos::model()->findAll(),'id_vderechos',
			'vderechos');
	}
		/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, ape_pat, ape_mat, id_genero, fecha_nacimiento, id_ocupacion, id_escolaridad, id_discapacidad, id_estado_civil, id_nacionalidad, id_pais, id_estado, id_municipio, colonia, localidad', 'required'),
			array('id_genero, edad, id_ocupacion, id_escolaridad, id_discapacidad, id_estado_civil, num_dependientes, id_nacionalidad, id_pais, id_estado, id_municipio, num_exp, num_int, codigo_postal, telefono_fijo, id_calidad_migratoria, id_documentos, id_identificacion', 'numerical', 'integerOnly'=>true),
			array('nombre, ape_pat, ape_mat, curp, fecha_nacimiento, colonia, localidad, calle, folio_identificacion', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_victima_directa, nombre, ape_pat, ape_mat, id_genero, curp, fecha_nacimiento, edad, id_ocupacion, id_escolaridad, id_discapacidad, id_estado_civil, num_dependientes, id_nacionalidad, id_pais, id_estado, id_municipio, colonia, localidad, calle, num_exp, num_int, codigo_postal, telefono_fijo, id_calidad_migratoria, id_documentos, id_identificacion, folio_identificacion', 'safe', 'on'=>'search'),
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
			'detDelitosVicDirectas' => array(self::HAS_MANY, 'DetDelitosVicDirecta', 'id_victima_directa'),
			'detViolacionVicDirectas' => array(self::HAS_MANY, 'DetViolacionVicDirecta', 'id_victima_directa'),
			'expVicDirectas' => array(self::HAS_MANY, 'ExpVicDirecta', 'id_victima_directa'),
			'idCalidadMigratoria' => array(self::BELONGS_TO, 'CatCalidadMigratoria', 'id_calidad_migratoria'),
			'idDiscapacidad' => array(self::BELONGS_TO, 'CatDiscapacidad', 'id_discapacidad'),
			'idDocumentos' => array(self::BELONGS_TO, 'CatDocumentos', 'id_documentos'),
			'idEscolaridad' => array(self::BELONGS_TO, 'CatEscolaridad', 'id_escolaridad'),
			'idEstado' => array(self::BELONGS_TO, 'CatEstado', 'id_estado'),
			'idEstadoCivil' => array(self::BELONGS_TO, 'CatEstadoCivil', 'id_estado_civil'),
			'idGenero' => array(self::BELONGS_TO, 'CatGenero', 'id_genero'),
			'idIdentificacion' => array(self::BELONGS_TO, 'CatIdentificacion', 'id_identificacion'),
			'idMunicipio' => array(self::BELONGS_TO, 'CatMunicipios', 'id_municipio'),
			'idNacionalidad' => array(self::BELONGS_TO, 'CatNacionalidad', 'id_nacionalidad'),
			'idOcupacion' => array(self::BELONGS_TO, 'CatOcupaciones', 'id_ocupacion'),
			'idPais' => array(self::BELONGS_TO, 'CatPais', 'id_pais'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_victima_directa' => 'Id Victima Directa',
			'nombre' => 'Nombre',
			'ape_pat' => 'Ape Pat',
			'ape_mat' => 'Ape Mat',
			'id_genero' => 'Id Genero',
			'curp' => 'Curp',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'edad' => 'Edad',
			'id_ocupacion' => 'Id Ocupacion',
			'id_escolaridad' => 'Id Escolaridad',
			'id_discapacidad' => 'Id Discapacidad',
			'id_estado_civil' => 'Id Estado Civil',
			'num_dependientes' => 'Num Dependientes',
			'id_nacionalidad' => 'Id Nacionalidad',
			'id_pais' => 'Id Pais',
			'id_estado' => 'Id Estado',
			'id_municipio' => 'Id Municipio',
			'colonia' => 'Colonia',
			'localidad' => 'Localidad',
			'calle' => 'Calle',
			'num_exp' => 'Num Exp',
			'num_int' => 'Num Int',
			'codigo_postal' => 'Codigo Postal',
			'telefono_fijo' => 'Telefono Fijo',
			'id_calidad_migratoria' => 'Id Calidad Migratoria',
			'id_documentos' => 'Id Documentos',
			'id_identificacion' => 'Id Identificacion',
			'folio_identificacion' => 'Folio Identificacion',

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

		$criteria->compare('id_victima_directa',$this->id_victima_directa);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('ape_pat',$this->ape_pat,true);
		$criteria->compare('ape_mat',$this->ape_mat,true);
		$criteria->compare('id_genero',$this->id_genero);
		$criteria->compare('curp',$this->curp,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('edad',$this->edad);
		$criteria->compare('id_ocupacion',$this->id_ocupacion);
		$criteria->compare('id_escolaridad',$this->id_escolaridad);
		$criteria->compare('id_discapacidad',$this->id_discapacidad);
		$criteria->compare('id_estado_civil',$this->id_estado_civil);
		$criteria->compare('num_dependientes',$this->num_dependientes);
		$criteria->compare('id_nacionalidad',$this->id_nacionalidad);
		$criteria->compare('id_pais',$this->id_pais);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('id_municipio',$this->id_municipio);
		$criteria->compare('colonia',$this->colonia,true);
		$criteria->compare('localidad',$this->localidad,true);
		$criteria->compare('calle',$this->calle,true);
		$criteria->compare('num_exp',$this->num_exp);
		$criteria->compare('num_int',$this->num_int);
		$criteria->compare('codigo_postal',$this->codigo_postal);
		$criteria->compare('telefono_fijo',$this->telefono_fijo);
		$criteria->compare('id_calidad_migratoria',$this->id_calidad_migratoria);
		$criteria->compare('id_documentos',$this->id_documentos);
		$criteria->compare('id_identificacion',$this->id_identificacion);
		$criteria->compare('folio_identificacion',$this->folio_identificacion,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VicVictimaDirecta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
