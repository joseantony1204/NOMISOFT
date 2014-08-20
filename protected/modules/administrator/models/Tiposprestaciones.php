<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMTIPOSPRESTACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMTIPOSPRESTACIONES':
 * @Propiedad integer $TIPR_ID
 * @Propiedad string $TIPR_NOMBRE
 * @Propiedad string $TIPR_FECHACAMBIO
 * @Propiedad integer $TIPR_REGISTRADOPOR
 */
class Tiposprestaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Tiposprestaciones la clase del modelo estàtico.
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
		return 'TBL_NOMTIPOSPRESTACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('TIPR_NOMBRE, TIPR_FECHACAMBIO, TIPR_REGISTRADOPOR', 'required'),
			array('TIPR_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('TIPR_NOMBRE', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('TIPR_ID, TIPR_NOMBRE, TIPR_FECHACAMBIO, TIPR_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'TIPR_ID' => 'TIPR',
						'TIPR_NOMBRE' => 'TIPR NOMBRE',
						'TIPR_FECHACAMBIO' => 'TIPR FECHACAMBIO',
						'TIPR_REGISTRADOPOR' => 'TIPR REGISTRADOPOR',
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

		$criteria->compare('TIPR_ID',$this->TIPR_ID);
		$criteria->compare('TIPR_NOMBRE',$this->TIPR_NOMBRE,true);
		$criteria->compare('TIPR_FECHACAMBIO',$this->TIPR_FECHACAMBIO,true);
		$criteria->compare('TIPR_REGISTRADOPOR',$this->TIPR_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}