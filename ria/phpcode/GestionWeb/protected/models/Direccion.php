<?php

/**
 * This is the model class for table "direccion".
 *
 * The followings are the available columns in table 'direccion':
 * @property integer $id
 * @property integer $tipodireccion
 * @property string $calle
 * @property integer $persona_id
 * @property string $numero
 * @property integer $localidad
 *
 * The followings are the available model relations:
 * @property Localidad $localidad0
 * @property Persona $persona
 * @property Tipocontacto $tipodireccion0
 */
class Direccion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Direccion the static model class
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
		return 'direccion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipodireccion, calle, persona_id', 'required'),
			array('tipodireccion, persona_id, localidad', 'numerical', 'integerOnly'=>true),
			array('calle', 'length', 'max'=>100),
			array('numero', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tipodireccion, calle, persona_id, numero, localidad', 'safe', 'on'=>'search'),
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
			'persona' => array(self::BELONGS_TO, 'Persona', 'persona_id'),
			'tipodireccion0' => array(self::BELONGS_TO, 'Tipocontacto', 'tipodireccion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tipodireccion' => 'Tipodireccion',
			'calle' => 'Calle',
			'persona_id' => 'Personaid',
			'numero' => 'Numero',
			'localidad' => 'Localidad',
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
		$criteria->compare('tipodireccion',$this->tipodireccion);
		$criteria->compare('calle',$this->calle,true);
		$criteria->compare('persona_id',$this->persona_id);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('localidad',$this->localidad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}