<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMPRIMAVACACIONESNOMINADESCUENTOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMPRIMAVACACIONESNOMINADESCUENTOS':
 * @Propiedad string $PVND_ID
 * @Propiedad integer $PVND_VALOR
 * @Propiedad integer $DEPR_ID
 * @Propiedad integer $PVNL_ID
 * @Propiedad string $PVND_FECHACAMBIO
 * @Propiedad integer $PVND_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad DESCUENTOSPRESTACIONES $dEPR
 * @Propiedad PRIMAVACACIONESNOMINALIQUIDACIONES $pVNL
 */
class Primavacacionesnominadescuentos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Primavacacionesnominadescuentos la clase del modelo estàtico.
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
		return 'TBL_NOMPRIMAVACACIONESNOMINADESCUENTOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PVND_VALOR, DEPR_ID, PVNL_ID, PVND_FECHACAMBIO, PVND_REGISTRADOPOR', 'required'),
			array('PVND_VALOR, DEPR_ID, PVNL_ID, PVND_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PVND_ID, PVND_VALOR, DEPR_ID, PVNL_ID, PVND_FECHACAMBIO, PVND_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'pVNL' => array(self::BELONGS_TO, 'PRIMAVACACIONESNOMINALIQUIDACIONES', 'PVNL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'PVND_ID' => 'PVND',
						'PVND_VALOR' => 'PVND VALOR',
						'DEPR_ID' => 'DEPR',
						'PVNL_ID' => 'PVNL',
						'PVND_FECHACAMBIO' => 'PVND FECHACAMBIO',
						'PVND_REGISTRADOPOR' => 'PVND REGISTRADOPOR',
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

		$criteria->compare('PVND_ID',$this->PVND_ID,true);
		$criteria->compare('PVND_VALOR',$this->PVND_VALOR);
		$criteria->compare('DEPR_ID',$this->DEPR_ID);
		$criteria->compare('PVNL_ID',$this->PVNL_ID);
		$criteria->compare('PVND_FECHACAMBIO',$this->PVND_FECHACAMBIO,true);
		$criteria->compare('PVND_REGISTRADOPOR',$this->PVND_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}