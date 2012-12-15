<?php

/**
 * This is the model class for table "producto".
 *
 * The followings are the available columns in table 'producto':
 * @property integer $id
 * @property string $nombre
 * @property string $precioVentaUnitario
 * @property string $descripcion
 * @property integer $categoria_id
 * @property string $precioCostoUnitario
 *
 * The followings are the available model relations:
 * @property Compra[] $compras
 * @property Detallefactura[] $detallefacturas
 * @property Categoriaproducto[] $categoriaproductos
 * @property Stock[] $stocks
 * @property Venta[] $ventas
 */
class Producto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Producto the static model class
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
		return 'producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, categoria_id', 'required'),
			array('categoria_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			array('precioVentaUnitario, precioCostoUnitario', 'length', 'max'=>10),
			array('descripcion', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, precioVentaUnitario, descripcion, categoria_id, precioCostoUnitario', 'safe', 'on'=>'search'),
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
			'compras' => array(self::HAS_MANY, 'Compra', 'producto_id'),
			'detallefacturas' => array(self::HAS_MANY, 'Detallefactura', 'producto_id'),
			'categoriaproductos' => array(self::MANY_MANY, 'Categoriaproducto', 'producto_categoriaproducto(producto_id, categoriaProducto_id)'),
			'stocks' => array(self::HAS_MANY, 'Stock', 'producto_id'),
			'ventas' => array(self::HAS_MANY, 'Venta', 'producto_id'),
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
			'precioVentaUnitario' => 'Precio Venta Unitario',
			'descripcion' => 'Descripcion',
			'categoria_id' => 'Categoria',
			'precioCostoUnitario' => 'Precio Costo Unitario',
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
		$criteria->compare('precioVentaUnitario',$this->precioVentaUnitario,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('categoria_id',$this->categoria_id);
		$criteria->compare('precioCostoUnitario',$this->precioCostoUnitario,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}