<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_CATSALUD".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_CATSALUD':
 * @Propiedad integer $SALU_ID
 * @Propiedad string $SALU_NIT
 * @Propiedad string $SALU_CODIGO
 * @Propiedad string $SALU_NOMBRE
 * @Propiedad string $SALU_FECHACAMBIO
 * @Propiedad integer $SALU_REGISTRADOPOR
 */
class Salud extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Salud la clase del modelo estàtico.
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
		return 'TBL_CATSALUD';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('SALU_NOMBRE, SALU_FECHACAMBIO, SALU_REGISTRADOPOR', 'required'),
			array('SALU_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('SALU_NIT, SALU_NOMBRE', 'length', 'max'=>30),
			array('SALU_CODIGO', 'length', 'max'=>20),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('SALU_ID, SALU_NIT, SALU_CODIGO, SALU_NOMBRE, SALU_FECHACAMBIO, SALU_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'SALU_ID' => 'ID',
						'SALU_NIT' => 'NIT',
						'SALU_CODIGO' => 'CODIGO',
						'SALU_NOMBRE' => 'NOMBRE DE ENTIDAD',
						'SALU_FECHACAMBIO' => 'SALU FECHACAMBIO',
						'SALU_REGISTRADOPOR' => 'SALU REGISTRADOPOR',
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

		$criteria->compare('SALU_ID',$this->SALU_ID);
		$criteria->compare('SALU_NIT',$this->SALU_NIT,true);
		$criteria->compare('SALU_CODIGO',$this->SALU_CODIGO,true);
		$criteria->compare('SALU_NOMBRE',$this->SALU_NOMBRE,true);
		$criteria->compare('SALU_FECHACAMBIO',$this->SALU_FECHACAMBIO,true);
		$criteria->compare('SALU_REGISTRADOPOR',$this->SALU_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}