<?php

/**
 * This is the model class for table "TBL_USUARIOSPERFILESUSUARIOS".
 *
 * The followings are the available columns in table 'TBL_USUARIOSPERFILESUSUARIOS':
 * @property integer $USPU_ID
 * @property integer $USUA_ID
 * @property integer $USPE_ID
 * @property string $USPU_FECHAINGRESO
 *
 * The followings are the available model relations:
 * @property TblUsuarios $uSUA
 * @property TblUsuariosperfiles $uSPE
 */
class Usuarioperfilusuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuarioperfilusuario the static model class
	 */
	public $USUA_USUARIO, $PENA_ID, $USES_ID, $USUA_FECHAALTA, $USUA_FECHABAJA, $USUA_ULTIMOACCESO; 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TBL_SEGPERFILESUSUARIOS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('USUA_ID, USPE_ID, USPU_FECHAINGRESO', 'required'),
			array('USUA_ID, USPE_ID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('USPU_ID, USUA_ID, USPE_ID, USPU_FECHAINGRESO', 'safe', 'on'=>'search'),
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
			'rel_usuario_perfil' => array(self::BELONGS_TO, 'Usuarioperfil', 'USPE_ID'),
			'rel_usuario' => array(self::BELONGS_TO, 'Usuario', 'USUA_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'USPU_ID' => 'ID',
			'USUA_ID' => 'USUARIO',
			'USPE_ID' => 'PERFIL',
			'USPU_FECHAINGRESO' => 'FECHA CREADO',
			
			'USUA_USUARIO' => 'USUARIO',
			'PENA_ID' => 'PERSONA',
			'USES_ID' => 'ESTADO',
			'USUA_FECHAALTA' => 'FECHA CREACION',
			'USUA_FECHABAJA' => 'FECHA SUSPENSION',
			'USUA_ULTIMOACCESO' => 'ULTIMA VISITA',
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
		$criteria->select='t.*, u.*';
		$criteria->join ='
		INNER JOIN "TBL_SEGUSUARIOS"  "u" ON u."USUA_ID" = t."USUA_ID" AND u."USUA_ID" = '.Yii::app()->user->id;

		$criteria->compare('USPU_ID',$this->USPU_ID);
		$criteria->compare('USUA_ID',$this->USUA_ID);
		$criteria->compare('USPE_ID',$this->USPE_ID);
		$criteria->compare('USPU_FECHAINGRESO',$this->USPU_FECHAINGRESO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getImagenVer(){
	   $imageUrl = 'ver.png';
	   return Yii::app()->baseurl.'/images/'.$imageUrl;
	  }	
	  
	public function getUsuariosPerfiles()
	{
	 $criteria=new CDbCriteria;
     $criteria->select='t."USPE_ID", t."USPE_NOMBRE"';
	 $criteria->join = '
	 INNER JOIN "TBL_SEGPERFILESUSUARIOS" "upu" ON upu."USPE_ID" = t."USPE_ID" AND upu."USUA_ID" = '.Yii::app()->user->id;	
	 $criteria->order = 't."USPE_NOMBRE" ASC';
	 return  CHtml::listData(Usuarioperfil::model()->findAll($criteria),'USPE_ID','USPE_NOMBRE'); 
	}
}