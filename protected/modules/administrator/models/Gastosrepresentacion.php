<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMGASTOSREPRESENTACION".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMGASTOSREPRESENTACION':
 * @Propiedad integer $GARE_ID
 * @Propiedad integer $GARE_PORCENTAJE
 * @Propiedad string $GARE_FECHACAMBIO
 * @Propiedad integer $GARE_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad EMPLEOSPLANTA[] $eMPLEOSPLANTAs
 */
class Gastosrepresentacion extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Gastosrepresentacion la clase del modelo estàtico.
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
		return 'TBL_NOMGASTOSREPRESENTACION';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('GARE_PORCENTAJE, GARE_FECHACAMBIO, GARE_REGISTRADOPOR', 'required'),
			array('GARE_PORCENTAJE, GARE_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('GARE_ID, GARE_PORCENTAJE, GARE_FECHACAMBIO, GARE_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'eMPLEOSPLANTAs' => array(self::HAS_MANY, 'EMPLEOSPLANTA', 'GARE_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'GARE_ID' => 'GARE',
						'GARE_PORCENTAJE' => 'GARE PORCENTAJE',
						'GARE_FECHACAMBIO' => 'GARE FECHACAMBIO',
						'GARE_REGISTRADOPOR' => 'GARE REGISTRADOPOR',
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

		$criteria->compare('GARE_ID',$this->GARE_ID);
		$criteria->compare('GARE_PORCENTAJE',$this->GARE_PORCENTAJE);
		$criteria->compare('GARE_FECHACAMBIO',$this->GARE_FECHACAMBIO,true);
		$criteria->compare('GARE_REGISTRADOPOR',$this->GARE_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}