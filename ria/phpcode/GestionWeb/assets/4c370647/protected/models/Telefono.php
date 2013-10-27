<?php

/**
 * This is the model class for table "telefono".
 *
 * The followings are the available columns in table 'telefono':
 * @property integer $id
 * @property integer $localidad
 * @property integer $numero
 * @property integer $tipoid
 * @property integer $personaid
 *
 * The followings are the available model relations:
 * @property Localidad $localidad0
 * @property Persona $persona
 * @property Tipocontacto $tipo
 */
class Telefono extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Telefono the static model class
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
		return 'telefono';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('personaid', 'required'),
			array('localidad, numero, tipoid, personaid', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, localidad, numero, tipoid, personaid', 'safe', 'on'=>'search'),
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
			'localidad0' => array(self::BELONGS_TO, 'Localidad', 'localidad'),
			'persona' => array(self::BELONGS_TO, 'Persona', 'personaid'),
			'tipo' => array(self::BELONGS_TO, 'Tipocontacto', 'tipoid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'localidad' => 'Localidad',
			'numero' => 'Número',
			'tipoid' => 'Tipo',
			'personaid' => 'Personaid',
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
		$criteria->compare('localidad',$this->localidad);
		$criteria->compare('numero',$this->numero);
		$criteria->compare('tipoid',$this->tipoid);
		$criteria->compare('personaid',$this->personaid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}