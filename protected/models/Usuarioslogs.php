<?php

/**
 * This is the model class for table "TBL_USUARIOSLOG".
 *
 * The followings are the available columns in table 'TBL_USUARIOSLOG':
 * @property integer $USLO_ID
 * @property string $USLO_FECHAINGRESO
 * @property integer $USUA_ID
 * @property integer $USRO_ID
 */
class Usuarioslogs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuarioslogs the static model class
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
		return 'TBL_USUARIOSLOG';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('USLO_FECHAINGRESO, USUA_ID, USRO_ID', 'required'),
			array('USUA_ID, USRO_ID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('USLO_ID, USLO_FECHAINGRESO, USUA_ID, USRO_ID', 'safe', 'on'=>'search'),
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
			'USLO_ID' => 'Uslo',
			'USLO_FECHAINGRESO' => 'Uslo Fechaingreso',
			'USUA_ID' => 'Usua',
			'USRO_ID' => 'Usro',
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

		$criteria->compare('USLO_ID',$this->USLO_ID);
		$criteria->compare('USLO_FECHAINGRESO',$this->USLO_FECHAINGRESO,true);
		$criteria->compare('USUA_ID',$this->USUA_ID);
		$criteria->compare('USRO_ID',$this->USRO_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}