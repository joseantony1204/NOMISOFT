<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMNOVEDADESRETROACTIVO".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMNOVEDADESRETROACTIVO':
 * @Propiedad integer $NORE_ID
 * @Propiedad string $NORE_FECHAINGRESO
 * @Propiedad integer $NORE_DIAS
 * @Propiedad integer $PEGE_ID
 * @Propiedad string $NORE_FECHACAMBIO
 * @Propiedad integer $NORE_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PERSONASGENERALES $pEGE
 */
class Novedadesretroactivo extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Novedadesretroactivo la clase del modelo estàtico.
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
		return 'TBL_NOMNOVEDADESRETROACTIVO';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('NORE_FECHAINGRESO, NORE_DIAS, PEGE_ID, NORE_FECHACAMBIO, NORE_REGISTRADOPOR', 'required'),
			array('NORE_DIAS, PEGE_ID, NORE_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('NORE_ID, NORE_FECHAINGRESO, NORE_DIAS, PEGE_ID, NORE_FECHACAMBIO, NORE_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'pEGE' => array(self::BELONGS_TO, 'PERSONASGENERALES', 'PEGE_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'NORE_ID' => 'NORE',
						'NORE_FECHAINGRESO' => 'NORE FECHAINGRESO',
						'NORE_DIAS' => 'NORE DIAS',
						'PEGE_ID' => 'PEGE',
						'NORE_FECHACAMBIO' => 'NORE FECHACAMBIO',
						'NORE_REGISTRADOPOR' => 'NORE REGISTRADOPOR',
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

		$criteria->compare('NORE_ID',$this->NORE_ID);
		$criteria->compare('NORE_FECHAINGRESO',$this->NORE_FECHAINGRESO,true);
		$criteria->compare('NORE_DIAS',$this->NORE_DIAS);
		$criteria->compare('PEGE_ID',$this->PEGE_ID);
		$criteria->compare('NORE_FECHACAMBIO',$this->NORE_FECHACAMBIO,true);
		$criteria->compare('NORE_REGISTRADOPOR',$this->NORE_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}