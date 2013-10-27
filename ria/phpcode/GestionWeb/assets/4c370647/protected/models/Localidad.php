<?php

/**
 * This is the model class for table "localidad".
 *
 * The followings are the available columns in table 'localidad':
 * @property integer $id
 * @property string $nombre
 * @property integer $provinciaid
 * @property string $codigotelefonico
 * @property string $codigopostal
 *
 * The followings are the available model relations:
 * @property Direccion[] $direccions
 * @property Provincia $provincia
 * @property Telefono[] $telefonos
 */
class Localidad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Localidad the static model class
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
		return 'localidad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('provinciaid', 'numerical', 'integerOnly'=>true),
			array('nombre, codigotelefonico, codigopostal', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, provinciaid, codigotelefonico, codigopostal', 'safe', 'on'=>'search'),
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
			'direccions' => array(self::HAS_MANY, 'Direccion', 'localidad'),
			'provincia' => array(self::BELONGS_TO, 'Provincia', 'provinciaid'),
			'telefonos' => array(self::HAS_MANY, 'Telefono', 'localidad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'provinciaid' => 'Provincia',
			'codigotelefonico' => 'Código Telefónico',
			'codigopostal' => 'Código Postal',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('provinciaid',$this->provinciaid);
		$criteria->compare('codigotelefonico',$this->codigotelefonico,true);
		$criteria->compare('codigopostal',$this->codigopostal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}