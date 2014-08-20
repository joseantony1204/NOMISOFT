<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMNIVELES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMNIVELES':
 * @Propiedad integer $NIVE_ID
 * @Propiedad string $NIVE_NOMBRE
 * @Propiedad string $NIVE_FECHACAMBIO
 * @Propiedad integer $NIVE_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad EMPLEOSPLANTA[] $eMPLEOSPLANTAs
 */
class Niveles extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Niveles la clase del modelo estàtico.
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
		return 'TBL_NOMNIVELES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('NIVE_NOMBRE, NIVE_FECHACAMBIO, NIVE_REGISTRADOPOR', 'required'),
			array('NIVE_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('NIVE_NOMBRE', 'length', 'max'=>20),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('NIVE_ID, NIVE_NOMBRE, NIVE_FECHACAMBIO, NIVE_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'eMPLEOSPLANTAs' => array(self::HAS_MANY, 'EMPLEOSPLANTA', 'NIVE_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'NIVE_ID' => 'ID',
						'NIVE_NOMBRE' => 'NIVEL',
						'NIVE_FECHACAMBIO' => 'NIVE FECHACAMBIO',
						'NIVE_REGISTRADOPOR' => 'NIVE REGISTRADOPOR',
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

		$criteria->compare('NIVE_ID',$this->NIVE_ID);
		$criteria->compare('NIVE_NOMBRE',$this->NIVE_NOMBRE,true);
		$criteria->compare('NIVE_FECHACAMBIO',$this->NIVE_FECHACAMBIO,true);
		$criteria->compare('NIVE_REGISTRADOPOR',$this->NIVE_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 30,),
		));
	}
}