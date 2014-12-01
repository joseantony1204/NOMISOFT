<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Cform extends CFormModel
{
	public $AUAD_PORCENTAJE, $NOVE_TIPONOMINA, $NOVE_TIPOCARGO, $NOVE_UNIDADES, $NOVE_PASS;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('NOVE_TIPONOMINA, NOVE_TIPOCARGO, NOVE_UNIDADES, NOVE_PASS', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'AUAD_PORCENTAJE'=>'% A AUMENTAR',
			'NOVE_TIPONOMINA'=>'TIPO NOMINA',
			'NOVE_TIPOCARGO'=>'TIPO CARGO',
			'NOVE_UNIDADES'=>'UNIDADES',
			'NOVE_PASS'=>'CONTRASEÑA',
		);
	}
}
