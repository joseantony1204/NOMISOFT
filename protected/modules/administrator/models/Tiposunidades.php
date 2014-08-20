<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMTIPOSUNIDADES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMTIPOSUNIDADES':
 * @Propiedad integer $TIUN_ID
 * @Propiedad string $TIUN_NOMBRE
 * @Propiedad string $TIUN_FECHACAMBIO
 * @Propiedad integer $TIUN_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad UNIDADES[] $uNIDADESs
 */
class Tiposunidades extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Tiposunidades la clase del modelo estàtico.
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
		return 'TBL_NOMTIPOSUNIDADES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('TIUN_NOMBRE, TIUN_FECHACAMBIO, TIUN_REGISTRADOPOR', 'required'),
			array('TIUN_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('TIUN_NOMBRE', 'length', 'max'=>15),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('TIUN_ID, TIUN_NOMBRE, TIUN_FECHACAMBIO, TIUN_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'uNIDADESs' => array(self::HAS_MANY, 'UNIDADES', 'TIUN_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'TIUN_ID' => 'TIUN',
						'TIUN_NOMBRE' => 'TIUN NOMBRE',
						'TIUN_FECHACAMBIO' => 'TIUN FECHACAMBIO',
						'TIUN_REGISTRADOPOR' => 'TIUN REGISTRADOPOR',
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

		$criteria->compare('TIUN_ID',$this->TIUN_ID);
		$criteria->compare('TIUN_NOMBRE',$this->TIUN_NOMBRE,true);
		$criteria->compare('TIUN_FECHACAMBIO',$this->TIUN_FECHACAMBIO,true);
		$criteria->compare('TIUN_REGISTRADOPOR',$this->TIUN_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}