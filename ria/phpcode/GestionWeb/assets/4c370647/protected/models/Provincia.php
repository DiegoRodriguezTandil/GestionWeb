<?php

/**
 * This is the model class for table "provincia".
 *
 * The followings are the available columns in table 'provincia':
 * @property integer $id
 * @property string $nombre
 * @property integer $pais_id
 *
 * The followings are the available model relations:
 * @property Localidad[] $localidads
 * @property Pais $pais
 */
class Provincia extends CActiveRecord
{
	public $pais_search;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Provincia the static model class
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
		return 'provincia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('pais_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pais_search, pais_id', 'safe', 'on'=>'search'),
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
			'localidads' => array(self::HAS_MANY, 'Localidad', 'provincia_id'),
			'pais' => array(self::BELONGS_TO, 'Pais', 'pais_id'),
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
			'pais_id' => 'País',
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
		$criteria->with = array( 'pais' );

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.nombre',$this->nombre,true);
        $criteria->compare('pais.nombre',$this->pais_search,true);
		

		return new CActiveDataProvider( $this, array(
	    'criteria'=>$criteria,
	    'sort'=>array(
	        'attributes'=>array(
	            'pais_search'=>array(
	                'asc'=>'pais.nombre',
	                'desc'=>'pais.nombre DESC',
	            ),
	            '*',
	        ),
	    ),
));
	}
}