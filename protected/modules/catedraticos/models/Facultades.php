<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_CATFACULTADES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_CATFACULTADES':
 * @Propiedad integer $FACU_ID
 * @Propiedad string $FACU_NOMBRE
 * @Propiedad string $FACU_FECHACAMBIO
 * @Propiedad integer $FACU_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad CATEDRAS[] $cATEDRASes
 */
class Facultades extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Facultades la clase del modelo estàtico.
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve CDbConnection conexiòn a la base de datos.
	 */
	public function getDbConnection()
	{
		return Yii::app()->db3;
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_CATFACULTADES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('FACU_NOMBRE, FACU_FECHACAMBIO, FACU_REGISTRADOPOR', 'required'),
			array('FACU_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('FACU_NOMBRE', 'length', 'max'=>100),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('FACU_ID, FACU_NOMBRE, FACU_FECHACAMBIO, FACU_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'cATEDRASes' => array(self::HAS_MANY, 'CATEDRAS', 'FACU_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'FACU_ID' => 'ID',
						'FACU_NOMBRE' => 'NOMBRE FACULTAD',
						'FACU_FECHACAMBIO' => 'FACU FECHACAMBIO',
						'FACU_REGISTRADOPOR' => 'FACU REGISTRADOPOR',
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

		$criteria->compare('FACU_ID',$this->FACU_ID);
		$criteria->compare('FACU_NOMBRE',$this->FACU_NOMBRE,true);
		$criteria->compare('FACU_FECHACAMBIO',$this->FACU_FECHACAMBIO,true);
		$criteria->compare('FACU_REGISTRADOPOR',$this->FACU_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}