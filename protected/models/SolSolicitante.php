<?php

/**
 * This is the model class for table "sol_solicitante".
 *
 * The followings are the available columns in table 'sol_solicitante':
 * @property integer $id_solicitante
 * @property string $nombre
 * @property string $ape_pat
 * @property string $ape_mat
 * @property integer $id_genero
 * @property string $fecha_nacimiento
 * @property integer $edad
 * @property integer $id_ocupacion
 * @property integer $id_escolaridad
 * @property integer $id_discapacidad
 * @property integer $id_estado_civil
 * @property integer $id_nacionalidad
 * @property integer $id_pais
 * @property integer $id_estado
 * @property integer $id_municipio
 * @property string $calle
 * @property string $num_ext
 * @property string $num_int
 * @property string $colonia
 * @property integer $codigo_postal
 * @property integer $telefono_fijo
 * @property integer $id_calidad_migratoria
 * @property integer $id_documentos
 * @property integer $id_identificacion
 * @property string $folio_identificacion
 * @property integer $id_parentesco
 * @property string $cargo
 * @property string $dependencia
 * @property integer $id_ambito_dependencia
 * @property integer $telefono_movil
 * @property string $correo_electronico
 *
 * The followings are the available model relations:
 * @property ExpVicDirecta[] $expVicDirectas
 * @property ExpVicIndirecta[] $expVicIndirectas
 * @property ExpVicPotencial[] $expVicPotencials
 * @property SolAmbitoDependencia $idAmbitoDependencia
 * @property CatDiscapacidad $idDiscapacidad
 * @property CatDocumentos $idDocumentos
 * @property CatEscolaridad $idEscolaridad
 * @property CatEstado $idEstado
 * @property CatEstadoCivil $idEstadoCivil
 * @property CatGenero $idGenero
 * @property CatIdentificacion $idIdentificacion
 * @property CatCalidadMigratoria $idCalidadMigratoria
 * @property CatMunicipios $idMunicipio
 * @property CatNacionalidad $idNacionalidad
 * @property CatOcupaciones $idOcupacion
 * @property CatPais $idPais
 * @property SolParentesco $idParentesco
 */
class SolSolicitante extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sol_solicitante';
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

			public static function getListAmbito()
	{//regresa la lista de productos por su contenido
		return CHtml ::listData(SolAmbitoDependencia::model()->findAll(),'id_ambito_dependencia',
			'ambito_dependencia');
	}

	public static function getNameSolicitante($id_solicitante)
	{
		$nombre=SolSolicitante::model()->find('id_solicitante='.$id_solicitante);
		return $nombre['nombre'];
	}



	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, id_genero, fecha_nacimiento, edad, id_ocupacion, id_escolaridad, id_discapacidad, id_estado_civil, id_nacionalidad, id_pais, id_estado, id_municipio, id_calidad_migratoria, id_documentos, id_identificacion', 'required'),
			array('id_genero, edad, id_ocupacion, id_escolaridad, id_discapacidad, id_estado_civil, id_nacionalidad, id_pais, id_estado, id_municipio, codigo_postal, telefono_fijo, id_calidad_migratoria, id_documentos, id_identificacion ', 'numerical', 'integerOnly'=>true),
			array('nombre, ape_pat, ape_mat, fecha_nacimiento, calle, num_ext, num_int, colonia, folio_identificacion, correo_electronico', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_solicitante, nombre, ape_pat, ape_mat, id_genero, fecha_nacimiento, edad, id_ocupacion, id_escolaridad, id_discapacidad, id_estado_civil, id_nacionalidad, id_pais, id_estado, id_municipio, calle, num_ext, num_int, colonia, codigo_postal, telefono_fijo, id_calidad_migratoria, id_documentos, id_identificacion, folio_identificacion,  correo_electronico', 'safe', 'on'=>'search'),
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
			'expVicDirectas' => array(self::HAS_MANY, 'ExpVicDirecta', 'id_solicitante'),
			'expVicIndirectas' => array(self::HAS_MANY, 'ExpVicIndirecta', 'id_solicitante'),
			'expVicPotencials' => array(self::HAS_MANY, 'ExpVicPotencial', 'id_solicitante'),
			'idDiscapacidad' => array(self::BELONGS_TO, 'CatDiscapacidad', 'id_discapacidad'),
			'idDocumentos' => array(self::BELONGS_TO, 'CatDocumentos', 'id_documentos'),
			'idEscolaridad' => array(self::BELONGS_TO, 'CatEscolaridad', 'id_escolaridad'),
			'idEstado' => array(self::BELONGS_TO, 'CatEstado', 'id_estado'),
			'idEstadoCivil' => array(self::BELONGS_TO, 'CatEstadoCivil', 'id_estado_civil'),
			'idGenero' => array(self::BELONGS_TO, 'CatGenero', 'id_genero'),
			'idIdentificacion' => array(self::BELONGS_TO, 'CatIdentificacion', 'id_identificacion'),
			'idCalidadMigratoria' => array(self::BELONGS_TO, 'CatCalidadMigratoria', 'id_calidad_migratoria'),
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
			'id_solicitante' => 'Id Solicitante',
			'nombre' => 'Nombre',
			'ape_pat' => 'Ape Pat',
			'ape_mat' => 'Ape Mat',
			'id_genero' => 'Id Genero',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'edad' => 'Edad',
			'id_ocupacion' => 'Id Ocupacion',
			'id_escolaridad' => 'Id Escolaridad',
			'id_discapacidad' => 'Id Discapacidad',
			'id_estado_civil' => 'Id Estado Civil',
			'id_nacionalidad' => 'Id Nacionalidad',
			'id_pais' => 'Id Pais',
			'id_estado' => 'Id Estado',
			'id_municipio' => 'Id Municipio',
			'calle' => 'Calle',
			'num_ext' => 'Num Ext',
			'num_int' => 'Num Int',
			'colonia' => 'Colonia',
			'codigo_postal' => 'Codigo Postal',
			'telefono_fijo' => 'Telefono Fijo',
			'id_calidad_migratoria' => 'Id Calidad Migratoria',
			'id_documentos' => 'Id Documentos',
			'id_identificacion' => 'Id Identificacion',
			'folio_identificacion' => 'Folio Identificacion',
			'correo_electronico' => 'Correo Electronico',
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

		$criteria->compare('id_solicitante',$this->id_solicitante);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('ape_pat',$this->ape_pat,true);
		$criteria->compare('ape_mat',$this->ape_mat,true);
		$criteria->compare('id_genero',$this->id_genero);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('edad',$this->edad);
		$criteria->compare('id_ocupacion',$this->id_ocupacion);
		$criteria->compare('id_escolaridad',$this->id_escolaridad);
		$criteria->compare('id_discapacidad',$this->id_discapacidad);
		$criteria->compare('id_estado_civil',$this->id_estado_civil);
		$criteria->compare('id_nacionalidad',$this->id_nacionalidad);
		$criteria->compare('id_pais',$this->id_pais);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('id_municipio',$this->id_municipio);
		$criteria->compare('calle',$this->calle,true);
		$criteria->compare('num_ext',$this->num_ext,true);
		$criteria->compare('num_int',$this->num_int,true);
		$criteria->compare('colonia',$this->colonia,true);
		$criteria->compare('codigo_postal',$this->codigo_postal);
		$criteria->compare('telefono_fijo',$this->telefono_fijo);
		$criteria->compare('id_calidad_migratoria',$this->id_calidad_migratoria);
		$criteria->compare('id_documentos',$this->id_documentos);
		$criteria->compare('id_identificacion',$this->id_identificacion);
		$criteria->compare('folio_identificacion',$this->folio_identificacion,true);

		
		$criteria->compare('correo_electronico',$this->correo_electronico,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SolSolicitante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
