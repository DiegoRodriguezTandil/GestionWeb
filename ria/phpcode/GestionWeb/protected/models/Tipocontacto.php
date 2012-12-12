<?php

/**
 * This is the model class for table "tipocontacto".
 *
 * The followings are the available columns in table 'tipocontacto':
 * @property integer $id
 * @property string $tipo
 * @property string $descriptor
 *
 * The followings are the available model relations:
 * @property Direccion[] $direccions
 * @property Mail[] $mails
 * @property Telefono[] $telefonos
 */
class Tipocontacto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tipocontacto the static model class
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
		return 'tipocontacto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo', 'required'),
			array('tipo', 'length', 'max'=>45),
			array('descriptor', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tipo, descriptor', 'safe', 'on'=>'search'),
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
			'direccions' => array(self::HAS_MANY, 'Direccion', 'tipodireccion'),
			'mails' => array(self::HAS_MANY, 'Mail', 'tipo'),
			'telefonos' => array(self::HAS_MANY, 'Telefono', 'tipoid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tipo' => 'Tipo',
			'descriptor' => 'Descriptor',
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
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('descriptor',$this->descriptor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}