<?php

/**
 * This is the model class for table "address".
 *
 * The followings are the available columns in table 'address':
 * @property integer $id
 * @property string $nama
 * @property string $address_1
 * @property string $address_2
 * @property string $telp
 * @property string $fax
 * @property string $email
 */
class Address extends CActiveRecord
{
	public $latlng;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Address the static model class
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
		return 'address';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, kota, prov, lat, lng, type', 'required'),
			array('nama, kota', 'length', 'max'=>225),
			array('address_1, address_2, telp, fax, email', 'length', 'max'=>100),
			
			array('sort, link', 'safe'),

			// array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>FALSE, 'on'=>'insert', 'except'=>array('createTemp', 'copy')),
			// array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update', 'except'=>array('createTemp', 'copy')),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, address_1, address_2, telp, fax, email, link', 'safe', 'on'=>'search'),
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
			'address_1' => 'Address 1',
			'address_2' => 'Address 2',
			'telp' => 'Telp',
			'fax' => 'Fax',
			'email' => 'Email',
			'prov' => 'Provinsi',
			'lat' => 'Latitude',
			'lng' => 'Longitude',
			'link' => 'Url Dealer',
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('address_1',$this->address_1,true);
		$criteria->compare('address_2',$this->address_2,true);
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('link',$this->link,true);
		
		$criteria->order = 'sort ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}