<?php

/**
 * This is the model class for table "stock".
 *
 * The followings are the available columns in table 'stock':
 * @property integer $id
 * @property integer $idproducto
 * @property integer $cantidad
 * @property integer $cantidadMIN
 * @property integer $cantidadMAX
 *
 * The followings are the available model relations:
 * @property Producto $idproducto0
 * @property Venta[] $ventas
 */
class Stock extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Stock the static model class
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
		return 'stock';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idproducto, cantidad, cantidadMIN, cantidadMAX', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, idproducto, cantidad, cantidadMIN, cantidadMAX', 'safe', 'on'=>'search'),
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
			'idproducto0' => array(self::BELONGS_TO, 'Producto', 'idproducto'),
			'ventas' => array(self::HAS_MANY, 'Venta', 'stockid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idproducto' => 'Idproducto',
			'cantidad' => 'Cantidad',
			'cantidadMIN' => 'Cantidad Min',
			'cantidadMAX' => 'Cantidad Max',
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
		$criteria->compare('idproducto',$this->idproducto);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('cantidadMIN',$this->cantidadMIN);
		$criteria->compare('cantidadMAX',$this->cantidadMAX);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}