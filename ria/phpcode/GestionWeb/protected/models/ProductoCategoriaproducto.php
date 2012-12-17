<?php

/**
 * This is the model class for table "producto_categoriaproducto".
 *
 * The followings are the available columns in table 'producto_categoriaproducto':
 * @property integer $producto_id
 * @property integer $categoriaProducto_id
 */
class ProductoCategoriaproducto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductoCategoriaproducto the static model class
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
		return 'producto_categoriaproducto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('producto_id, categoriaProducto_id', 'required'),
			array('producto_id, categoriaProducto_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('producto_id, categoriaProducto_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'producto_id' => 'Producto',
			'categoriaProducto_id' => 'Categoria Producto',
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

		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('categoriaProducto_id',$this->categoriaProducto_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}