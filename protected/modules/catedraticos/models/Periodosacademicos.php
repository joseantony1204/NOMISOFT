<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_CATPERIODOSACADEMICOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_CATPERIODOSACADEMICOS':
 * @Propiedad integer $PEAC_ID
 * @Propiedad string $PEAC_NOMBRE
 * @Propiedad string $PEAC_ESTADO
 * @Propiedad string $PEAC_FECHACAMBIO
 * @Propiedad integer $PEAC_REGISTRADOPOR
 */
class Periodosacademicos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Periodosacademicos la clase del modelo estàtico.
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
		return 'TBL_CATPERIODOSACADEMICOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PEAC_NOMBRE, PEAC_ESTADO, PEAC_FECHACAMBIO, PEAC_REGISTRADOPOR', 'required'),
			array('PEAC_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('PEAC_NOMBRE', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PEAC_ID, PEAC_NOMBRE, PEAC_ESTADO, PEAC_FECHACAMBIO, PEAC_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'PEAC_ID' => 'ID',
						'PEAC_NOMBRE' => 'NOMBRE',
						'PEAC_ESTADO' => 'ESTADO',
						'PEAC_FECHACAMBIO' => 'PEAC FECHACAMBIO',
						'PEAC_REGISTRADOPOR' => 'PEAC REGISTRADOPOR',
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

		$criteria->compare('PEAC_ID',$this->PEAC_ID);
		$criteria->compare('PEAC_NOMBRE',$this->PEAC_NOMBRE,true);
		$criteria->compare('PEAC_ESTADO',$this->PEAC_ESTADO,true);
		$criteria->compare('PEAC_FECHACAMBIO',$this->PEAC_FECHACAMBIO,true);
		$criteria->compare('PEAC_REGISTRADOPOR',$this->PEAC_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}