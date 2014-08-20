<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Informes extends CFormModel
{
	public $INFO_ANIOINICIO;
	public $INFO_ANIOFINAL;
	public $INFO_MESINICIO;
	public $INFO_MESFINAL;
	public $INFO_UNIDAD;
	public $INFO_IDENTIFICACION;
	public $INFO_CARGO;
	public $INFO_SALUD;
	public $INFO_PENSION;
	public $INFO_SINDICATOS;
	public $INFO_DESCUENTOS;
	public $INFO_CHECK;


	public function rules()
	{
		return array(
			// username and password are required
			array('INFO_ANIOINICIO, INFO_ANIOFINAL, INFO_MESINICIO,INFO_MESFINAL, ', 'required'),
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
			'pERS' => array(self::BELONGS_TO, 'Personas', 'PERS_ID'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'INFO_MESINICIO'=>'DESDE EL MES DE : ',
			'INFO_MESFINAL'=>'HASTA EL MES DE :',
			
			'INFO_ANIOINICIO'=>'DESDE EL AÑO : ',
			'INFO_ANIOFINAL'=>'HASTA EL AÑO :',
			
			'INFO_SALUD'=>'SALUD',
			'INFO_PENSION'=>'PENSION',
			'INFO_SINDICATOS'=>'SINDICATO',
			'INFO_DESCUENTOS'=>'DESCUENTOS',
			'INFO_CHECK'=>'TRUE',
		);
	}
}