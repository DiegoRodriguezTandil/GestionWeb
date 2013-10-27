<?php

/**
 * This is the model class for table "persona".
 *
 * The followings are the available columns in table 'persona':
 * @property integer $id
 * @property string $apellido
 * @property string $empresa
 * @property string $dni
 * @property string $web
 * @property string $foto
 * @property string $intereses
 * @property string $cuit
 *
 * The followings are the available model relations:
 * @property Cliente[] $clientes
 * @property Direccion[] $direccions
 * @property Mail[] $mails
 * @property Proveedor[] $proveedors
 * @property Telefono[] $telefonos
 * @property Usuario[] $usuarios
 */
class Persona extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Persona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'persona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('apellido, empresa, dni, web', 'length', 'max'=>45),
			array('apellido, empresa, dni, web', 'required'),
			array('foto, intereses', 'length', 'max'=>255),
			array('cuit', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, apellido, empresa, dni, web, foto, intereses, cuit', 'safe', 'on'=>'search'),
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
			'clientes' => array(self::HAS_MANY, 'Cliente', 'persona_id'),
			'direccions' => array(self::HAS_MANY, 'Direccion', 'persona_id'),
			'mails' => array(self::HAS_MANY, 'Mail', 'persona_id'),
			'mailsCount' => array(self::STAT, 'Mail', 'persona_id'),
			'proveedors' => array(self::HAS_MANY, 'Proveedor', 'personaid'),
			'telefonos' => array(self::HAS_MANY, 'Telefono', 'personaid'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'personaid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'apellido' => 'Apellido',
			'nombre' => 'Nombre',
			'empresa' => 'Empresa',
			'dni' => 'Dni',
			'web' => 'Web',
			'foto' => 'Foto',
			'intereses' => 'Intereses',
			'cuit' => 'Cuit',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('apellido',$this->apellido,true);
		//$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('empresa',$this->empresa,true);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('web',$this->web,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('intereses',$this->intereses,true);
		$criteria->compare('cuit',$this->cuit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getThumbnail(){
	         // here i return the image
		if (!empty($this->filename) && $this->filename!='')
	    	return CHtml::image($this->getURL(),$this->alt_text,array('width'=>options::model()->getOption('PhotoThumb').'px','max-height'=>options::model()->getOption('PhotoThumb').'px'
	    	));
	}
	public function getPath($all=true){
		/**if (is_null($this->_PhotoPath)) {
	                // I hold the image path and system directory separator in the config/main.php
	                 // this is because I develop on a windows server and normally deploy on Linux
	    	$this->_PhotoPath=Yii::app()->params['imagePATH'];
	        $this->_PathSep=Yii::app()->params['pathSep'];
	     }
	    $path=$this->_PhotoPath.$this->_PathSep;
	    if ($all) $path.=$this->filename;
	 	   return $path;
			 * 
			 */
	 }



}