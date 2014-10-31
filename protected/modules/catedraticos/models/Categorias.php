<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_CATCATEGORIAS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_CATCATEGORIAS':
 * @Propiedad integer $CATE_ID
 * @Propiedad string $CATE_NOMBRE
 * @Propiedad string $CATE_VALOR
 * @Propiedad string $CATE_FECHACAMBIO
 * @Propiedad integer $CATE_REGISTRADOPOR
 */
class Categorias extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Categorias la clase del modelo estàtico.
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
		return 'TBL_CATCATEGORIAS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('CATE_NOMBRE, CATE_VALOR, CATE_FECHACAMBIO, CATE_REGISTRADOPOR', 'required'),
			array('CATE_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('CATE_NOMBRE', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('CATE_ID, CATE_NOMBRE, CATE_VALOR, CATE_FECHACAMBIO, CATE_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'CATE_ID' => 'ID',
						'CATE_NOMBRE' => 'DESCRIPCION',
						'CATE_VALOR' => 'VALOR',
						'CATE_FECHACAMBIO' => 'CATE FECHACAMBIO',
						'CATE_REGISTRADOPOR' => 'CATE REGISTRADOPOR',
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

		$criteria->compare('CATE_ID',$this->CATE_ID);
		$criteria->compare('CATE_NOMBRE',$this->CATE_NOMBRE,true);
		$criteria->compare('CATE_VALOR',$this->CATE_VALOR,true);
		$criteria->compare('CATE_FECHACAMBIO',$this->CATE_FECHACAMBIO,true);
		$criteria->compare('CATE_REGISTRADOPOR',$this->CATE_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}