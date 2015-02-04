<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMRETROACTIVOSPUNTOSNOMINADESCUENTOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMRETROACTIVOSPUNTOSNOMINADESCUENTOS':
 * @Propiedad string $RPND_ID
 * @Propiedad integer $RPND_VALOR
 * @Propiedad integer $DEPR_ID
 * @Propiedad integer $RPNL_ID
 * @Propiedad string $RPND_FECHACAMBIO
 * @Propiedad integer $RPND_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad DESCUENTOSPRESTACIONES $dEPR
 * @Propiedad RETROACTIVOSPUNTOSNOMINALIQUIDACIONES $rPNL
 */
class Retroactivospuntosnominadescuentos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Retroactivospuntosnominadescuentos la clase del modelo estàtico.
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
		return 'TBL_NOMRETROACTIVOSPUNTOSNOMINADESCUENTOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('RPND_VALOR, DEPR_ID, RPNL_ID, RPND_FECHACAMBIO, RPND_REGISTRADOPOR', 'required'),
			array('RPND_VALOR, DEPR_ID, RPNL_ID, RPND_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('RPND_ID, RPND_VALOR, DEPR_ID, RPNL_ID, RPND_FECHACAMBIO, RPND_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'rPNL' => array(self::BELONGS_TO, 'RETROACTIVOSPUNTOSNOMINALIQUIDACIONES', 'RPNL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'RPND_ID' => 'RPND',
						'RPND_VALOR' => 'RPND VALOR',
						'DEPR_ID' => 'DEPR',
						'RPNL_ID' => 'RPNL',
						'RPND_FECHACAMBIO' => 'RPND FECHACAMBIO',
						'RPND_REGISTRADOPOR' => 'RPND REGISTRADOPOR',
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

		$criteria->compare('RPND_ID',$this->RPND_ID,true);
		$criteria->compare('RPND_VALOR',$this->RPND_VALOR);
		$criteria->compare('DEPR_ID',$this->DEPR_ID);
		$criteria->compare('RPNL_ID',$this->RPNL_ID);
		$criteria->compare('RPND_FECHACAMBIO',$this->RPND_FECHACAMBIO,true);
		$criteria->compare('RPND_REGISTRADOPOR',$this->RPND_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}