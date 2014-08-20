<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMSEMESTRALNOMINADESCUENTOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMSEMESTRALNOMINADESCUENTOS':
 * @Propiedad string $SEND_ID
 * @Propiedad integer $SEND_VALOR
 * @Propiedad integer $DEPR_ID
 * @Propiedad integer $SENL_ID
 * @Propiedad string $SEND_FECHACAMBIO
 * @Propiedad integer $SEND_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad DESCUENTOSPRESTACIONES $dEPR
 * @Propiedad SEMESTRALNOMINALIQUIDACIONES $sENL
 */
class Semestralnominadescuentos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Semestralnominadescuentos la clase del modelo estàtico.
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
		return 'TBL_NOMSEMESTRALNOMINADESCUENTOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('SEND_VALOR, DEPR_ID, SENL_ID, SEND_FECHACAMBIO, SEND_REGISTRADOPOR', 'required'),
			array('SEND_VALOR, DEPR_ID, SENL_ID, SEND_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('SEND_ID, SEND_VALOR, DEPR_ID, SENL_ID, SEND_FECHACAMBIO, SEND_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'dEPR' => array(self::BELONGS_TO, 'DESCUENTOSPRESTACIONES', 'DEPR_ID'),
			'sENL' => array(self::BELONGS_TO, 'SEMESTRALNOMINALIQUIDACIONES', 'SENL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'SEND_ID' => 'SEND',
						'SEND_VALOR' => 'SEND VALOR',
						'DEPR_ID' => 'DEPR',
						'SENL_ID' => 'SENL',
						'SEND_FECHACAMBIO' => 'SEND FECHACAMBIO',
						'SEND_REGISTRADOPOR' => 'SEND REGISTRADOPOR',
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

		$criteria->compare('SEND_ID',$this->SEND_ID,true);
		$criteria->compare('SEND_VALOR',$this->SEND_VALOR);
		$criteria->compare('DEPR_ID',$this->DEPR_ID);
		$criteria->compare('SENL_ID',$this->SENL_ID);
		$criteria->compare('SEND_FECHACAMBIO',$this->SEND_FECHACAMBIO,true);
		$criteria->compare('SEND_REGISTRADOPOR',$this->SEND_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}