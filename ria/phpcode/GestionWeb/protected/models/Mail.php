<?php

/**
 * This is the model class for table "mail".
 *
 * The followings are the available columns in table 'mail':
 * @property integer $id
 * @property integer $tipo
 * @property string $direccion
 * @property integer $persona_id
 *
 * The followings are the available model relations:
 * @property Tipocontacto $tipo0
 * @property Persona $persona
 */
class Mail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Mail the static model class
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
		return 'mail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo, direccion, persona_id', 'required'),
			array('tipo, persona_id', 'numerical', 'integerOnly'=>true),
			array('direccion', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tipo, direccion, persona_id', 'safe', 'on'=>'search'),
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
			'tipo0' => array(self::BELONGS_TO, 'Tipocontacto', 'tipo'),
			'persona' => array(self::BELONGS_TO, 'Persona', 'persona_id'),
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
			'direccion' => 'E-mail',
			'persona_id' => 'Persona',
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
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('persona_id',$this->persona_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}