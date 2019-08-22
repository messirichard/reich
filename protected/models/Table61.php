<?php

/**
 * This is the model class for table "table_61".
 *
 * The followings are the available columns in table 'table_61':
 * @property integer $id
 * @property string $col_1
 * @property string $col_2
 * @property string $col_3
 * @property string $col_4
 * @property string $col_5
 * @property string $col_6
 * @property string $col_7
 */
class Table61 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'table_61';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('col_1', 'length', 'max'=>11),
			array('col_2', 'length', 'max'=>29),
			array('col_3', 'length', 'max'=>51),
			array('col_4', 'length', 'max'=>552),
			array('col_5', 'length', 'max'=>34),
			array('col_6', 'length', 'max'=>6),
			array('col_7', 'length', 'max'=>28),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, col_1, col_2, col_3, col_4, col_5, col_6, col_7', 'safe', 'on'=>'search'),
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
			'col_1' => 'Col 1',
			'col_2' => 'Col 2',
			'col_3' => 'Col 3',
			'col_4' => 'Col 4',
			'col_5' => 'Col 5',
			'col_6' => 'Col 6',
			'col_7' => 'Col 7',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('col_1',$this->col_1,true);
		$criteria->compare('col_2',$this->col_2,true);
		$criteria->compare('col_3',$this->col_3,true);
		$criteria->compare('col_4',$this->col_4,true);
		$criteria->compare('col_5',$this->col_5,true);
		$criteria->compare('col_6',$this->col_6,true);
		$criteria->compare('col_7',$this->col_7,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Table61 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
