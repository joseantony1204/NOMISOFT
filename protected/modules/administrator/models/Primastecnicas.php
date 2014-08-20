<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMPRIMASTECNICAS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMPRIMASTECNICAS':
 * @Propiedad integer $PRTE_ID
 * @Propiedad integer $PRTE_PORCENTAJE
 * @Propiedad string $PRTE_FECHACAMBIO
 * @Propiedad integer $PRTE_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad EMPLEOSPLANTA[] $eMPLEOSPLANTAs
 */
class Primastecnicas extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Primastecnicas la clase del modelo estàtico.
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
		return 'TBL_NOMPRIMASTECNICAS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PRTE_PORCENTAJE, PRTE_FECHACAMBIO, PRTE_REGISTRADOPOR', 'required'),
			array('PRTE_PORCENTAJE, PRTE_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PRTE_ID, PRTE_PORCENTAJE, PRTE_FECHACAMBIO, PRTE_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'eMPLEOSPLANTAs' => array(self::HAS_MANY, 'EMPLEOSPLANTA', 'PRTE_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'PRTE_ID' => 'PRTE',
						'PRTE_PORCENTAJE' => 'PRTE PORCENTAJE',
						'PRTE_FECHACAMBIO' => 'PRTE FECHACAMBIO',
						'PRTE_REGISTRADOPOR' => 'PRTE REGISTRADOPOR',
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

		$criteria->compare('PRTE_ID',$this->PRTE_ID);
		$criteria->compare('PRTE_PORCENTAJE',$this->PRTE_PORCENTAJE);
		$criteria->compare('PRTE_FECHACAMBIO',$this->PRTE_FECHACAMBIO,true);
		$criteria->compare('PRTE_REGISTRADOPOR',$this->PRTE_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}