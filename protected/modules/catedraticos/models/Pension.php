<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_CATPENSION".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_CATPENSION':
 * @Propiedad integer $PENS_ID
 * @Propiedad string $PENS_NIT
 * @Propiedad string $PENS_CODIGO
 * @Propiedad string $PENS_NOMBRE
 * @Propiedad string $PENS_FECHACAMBIO
 * @Propiedad integer $PENS_REGISTRADOPOR
 */
class Pension extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Pension la clase del modelo estàtico.
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
		return 'TBL_CATPENSION';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PENS_NOMBRE, PENS_FECHACAMBIO, PENS_REGISTRADOPOR', 'required'),
			array('PENS_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('PENS_NIT, PENS_CODIGO', 'length', 'max'=>20),
			array('PENS_NOMBRE', 'length', 'max'=>100),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PENS_ID, PENS_NIT, PENS_CODIGO, PENS_NOMBRE, PENS_FECHACAMBIO, PENS_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'PENS_ID' => 'ID',
						'PENS_NIT' => 'NIT',
						'PENS_CODIGO' => 'CODIGO',
						'PENS_NOMBRE' => 'NOMBRE DE ENTIDAD',
						'PENS_FECHACAMBIO' => 'PENS FECHACAMBIO',
						'PENS_REGISTRADOPOR' => 'PENS REGISTRADOPOR',
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

		$criteria->compare('PENS_ID',$this->PENS_ID);
		$criteria->compare('PENS_NIT',$this->PENS_NIT,true);
		$criteria->compare('PENS_CODIGO',$this->PENS_CODIGO,true);
		$criteria->compare('PENS_NOMBRE',$this->PENS_NOMBRE,true);
		$criteria->compare('PENS_FECHACAMBIO',$this->PENS_FECHACAMBIO,true);
		$criteria->compare('PENS_REGISTRADOPOR',$this->PENS_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}