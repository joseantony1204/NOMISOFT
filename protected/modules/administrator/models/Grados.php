<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMGRADOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMGRADOS':
 * @Propiedad integer $GRAD_ID
 * @Propiedad string $GRAD_NOMBRE
 * @Propiedad integer $GRAD_SUELDO
 * @Propiedad string $GRAD_FECHACAMBIO
 * @Propiedad integer $GRAD_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad EMPLEOSPLANTA[] $eMPLEOSPLANTAs
 */
class Grados extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Grados la clase del modelo estàtico.
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
		return 'TBL_NOMGRADOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('GRAD_FECHACAMBIO, GRAD_REGISTRADOPOR', 'required'),
			array('GRAD_SUELDO, GRAD_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('GRAD_NOMBRE', 'length', 'max'=>15),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('GRAD_ID, GRAD_NOMBRE, GRAD_SUELDO, GRAD_FECHACAMBIO, GRAD_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'eMPLEOSPLANTAs' => array(self::HAS_MANY, 'EMPLEOSPLANTA', 'GRAD_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'GRAD_ID' => 'ID',
						'GRAD_NOMBRE' => 'GRADO',
						'GRAD_SUELDO' => 'SUELDO',
						'GRAD_FECHACAMBIO' => 'GRAD FECHACAMBIO',
						'GRAD_REGISTRADOPOR' => 'GRAD REGISTRADOPOR',
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

		$criteria->compare('GRAD_ID',$this->GRAD_ID);
		$criteria->compare('GRAD_NOMBRE',$this->GRAD_NOMBRE,true);
		$criteria->compare('GRAD_SUELDO',$this->GRAD_SUELDO);
		$criteria->compare('GRAD_FECHACAMBIO',$this->GRAD_FECHACAMBIO,true);
		$criteria->compare('GRAD_REGISTRADOPOR',$this->GRAD_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 30,),
		));
	}
}