<?php

/**
 * This is the model class for table "promo".
 *
 * The followings are the available columns in table 'promo':
 * @property integer $id
 * @property integer $nama
 * @property integer $kode
 * @property integer $type_potongan
 * @property integer $potongan
 * @property string $aktif_sampai
 * @property integer $aktif
 */
class Promo extends CActiveRecord
{
	public $jml_voucher;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Promo the static model class
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
		return 'promo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, kode, type_potongan, potongan, aktif_sampai, aktif_dari, aktif', 'required'),
			array('type_potongan, potongan, aktif, min_pembelian, reusable', 'numerical', 'integerOnly'=>true),
			
			array('jml_voucher', 'numerical', 'min'=>1, 'on'=>'insert', 'integerOnly'=>true),
			array('jml_voucher', 'numerical', 'min'=>1, 'on'=>'update', 'integerOnly'=>true),
			
			array('jml_voucher', 'required', 'on'=>'insert'),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, kode, type_potongan, potongan, aktif_sampai, aktif', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'nama' => 'Nama',
			'kode' => 'Kode',
			'type_potongan' => 'Type Potongan',
			'potongan' => 'Potongan',
			'aktif_sampai' => 'Aktif Sampai',
			'aktif' => 'Aktif',
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
		$criteria->compare('nama',$this->nama);
		$criteria->compare('kode',$this->kode);
		$criteria->compare('type_potongan',$this->type_potongan);
		$criteria->compare('potongan',$this->potongan);
		$criteria->compare('aktif_sampai',$this->aktif_sampai,true);
		$criteria->compare('aktif',$this->aktif);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}