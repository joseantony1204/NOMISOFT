<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMMENSUALNOMINADESCUENTOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMMENSUALNOMINADESCUENTOS':
 * @Propiedad string $MEND_ID
 * @Propiedad integer $MEND_VALOR
 * @Propiedad integer $DEME_ID
 * @Propiedad integer $MENL_ID
 * @Propiedad string $MEND_FECHACAMBIO
 * @Propiedad integer $MEND_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad MENSUALNOMINALIQUIDACIONES $mENL
 * @Propiedad DESCUENTOSMENSUALES $dEME
 */
class Mensualnominadescuentos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Mensualnominadescuentos la clase del modelo estàtico.
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMMENSUALNOMINADESCUENTOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('MEND_VALOR, DEME_ID, MENL_ID, MEND_FECHACAMBIO, MEND_REGISTRADOPOR', 'required'),
			array('MEND_VALOR, DEME_ID, MENL_ID, MEND_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('MEND_ID, MEND_VALOR, DEME_ID, MENL_ID, MEND_FECHACAMBIO, MEND_REGISTRADOPOR', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @Devolver reglas relacionales matriz.
	 */
	public function relations()
	{
		//Nota: es posible que necesite ajustar el nombre de la relación y la relacionada
        //Nombre de clase de las relaciones generadas automáticamente a continuación.
		return array(
			'mENL' => array(self::BELONGS_TO, 'MENSUALNOMINALIQUIDACIONES', 'MENL_ID'),
			'dEME' => array(self::BELONGS_TO, 'DESCUENTOSMENSUALES', 'DEME_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'MEND_ID' => 'MEND',
						'MEND_VALOR' => 'MEND VALOR',
						'DEME_ID' => 'DEME',
						'MENL_ID' => 'MENL',
						'MEND_FECHACAMBIO' => 'MEND FECHACAMBIO',
						'MEND_REGISTRADOPOR' => 'MEND REGISTRADOPOR',
		);
	}

	 /**
     *@Recupera una lista de los modelos basados ​​en las actuales condiciones de búsqueda / filtro.
     *@Return CActiveDataProvider el proveedor de datos que puede devolver los modelos basados ​​en las condiciones de búsqueda / filtro.
     */
	public function search()
	{
		//Advertencia: Por favor, modifique el siguiente código para quitar atributos que
        //No debe ser buscado.

		$criteria=new CDbCriteria;

		$criteria->compare('MEND_ID',$this->MEND_ID,true);
		$criteria->compare('MEND_VALOR',$this->MEND_VALOR);
		$criteria->compare('DEME_ID',$this->DEME_ID);
		$criteria->compare('MENL_ID',$this->MENL_ID);
		$criteria->compare('MEND_FECHACAMBIO',$this->MEND_FECHACAMBIO,true);
		$criteria->compare('MEND_REGISTRADOPOR',$this->MEND_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}