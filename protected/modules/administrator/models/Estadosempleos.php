<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMESTADOSEMPLEOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMESTADOSEMPLEOS':
 * @Propiedad integer $ESEM_ID
 * @Propiedad string $ESEM_NOMBRE
 * @Propiedad string $ESEM_FECHACAMBIO
 * @Propiedad integer $ESEM_REGISTRADOPOR
 */
class Estadosempleos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Estadosempleos la clase del modelo estàtico.
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
		return 'TBL_NOMESTADOSEMPLEOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('ESEM_NOMBRE, ESEM_FECHACAMBIO, ESEM_REGISTRADOPOR', 'required'),
			array('ESEM_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('ESEM_NOMBRE', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('ESEM_ID, ESEM_NOMBRE, ESEM_FECHACAMBIO, ESEM_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'ESEM_ID' => 'ID',
						'ESEM_NOMBRE' => 'ESTADO DEL CARGO',
						'ESEM_FECHACAMBIO' => 'ESEM FECHACAMBIO',
						'ESEM_REGISTRADOPOR' => 'ESEM REGISTRADOPOR',
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

		$criteria->compare('ESEM_ID',$this->ESEM_ID);
		$criteria->compare('ESEM_NOMBRE',$this->ESEM_NOMBRE,true);
		$criteria->compare('ESEM_FECHACAMBIO',$this->ESEM_FECHACAMBIO,true);
		$criteria->compare('ESEM_REGISTRADOPOR',$this->ESEM_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 30,),
		));
	}
}