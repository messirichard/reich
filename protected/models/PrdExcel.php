<?php

/**
 * This is the model class for table "prd_excel".
 *
 * The followings are the available columns in table 'prd_excel':
 * @property string $id
 * @property string $nama_produk
 * @property string $kategori
 * @property string $file_gambar
 * @property string $harga
 * @property string $label_warna
 * @property string $label_kemasan
 * @property string $deskripsi
 * @property integer $status
 * @property integer $onsale
 * @property integer $trending
 */
class PrdExcel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PrdExcel the static model class
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
		return 'prd_excel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('harga, label_warna, label_kemasan, deskripsi, status, onsale, trending', 'required'),
			array('status, onsale, trending', 'numerical', 'integerOnly'=>true),
			array('nama_produk, kategori, file_gambar, harga, label_warna, label_kemasan', 'length', 'max'=>225),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama_produk, kategori, file_gambar, harga, label_warna, label_kemasan, deskripsi, status, onsale, trending', 'safe', 'on'=>'search'),
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
			'nama_produk' => 'Nama Produk',
			'kategori' => 'Kategori',
			'file_gambar' => 'File Gambar',
			'harga' => 'Harga',
			'label_warna' => 'Label Warna',
			'label_kemasan' => 'Label Kemasan',
			'deskripsi' => 'Deskripsi',
			'status' => 'Status',
			'onsale' => 'Onsale',
			'trending' => 'Trending',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nama_produk',$this->nama_produk,true);
		$criteria->compare('kategori',$this->kategori,true);
		$criteria->compare('file_gambar',$this->file_gambar,true);
		$criteria->compare('harga',$this->harga,true);
		$criteria->compare('label_warna',$this->label_warna,true);
		$criteria->compare('label_kemasan',$this->label_kemasan,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('onsale',$this->onsale);
		$criteria->compare('trending',$this->trending);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}