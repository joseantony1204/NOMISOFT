<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMNOVEDADESCESANTIAS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMNOVEDADESCESANTIAS':
 * @Propiedad integer $NOCE_ID
 * @Propiedad string $NOCE_FECHAINGRESO
 * @Propiedad integer $NOCE_DIAS
 * @Propiedad integer $PEGE_ID
 * @Propiedad string $NOCE_FECHACAMBIO
 * @Propiedad integer $NOCE_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PERSONASGENERALES $pEGE
 */
class Novedadescesantias extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Novedadescesantias la clase del modelo estàtico.
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
		return 'TBL_NOMNOVEDADESCESANTIAS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('NOCE_FECHAINGRESO, NOCE_DIAS, PEGE_ID, NOCE_FECHACAMBIO, NOCE_REGISTRADOPOR', 'required'),
			array('NOCE_DIAS, PEGE_ID, NOCE_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('NOCE_ID, NOCE_FECHAINGRESO, NOCE_DIAS, PEGE_ID, NOCE_FECHACAMBIO, NOCE_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'NOCE_ID' => 'NOCE',
						'NOCE_FECHAINGRESO' => 'NOCE FECHAINGRESO',
						'NOCE_DIAS' => 'NOCE DIAS',
						'PEGE_ID' => 'PEGE',
						'NOCE_FECHACAMBIO' => 'NOCE FECHACAMBIO',
						'NOCE_REGISTRADOPOR' => 'NOCE REGISTRADOPOR',
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

		$criteria->compare('NOCE_ID',$this->NOCE_ID);
		$criteria->compare('NOCE_FECHAINGRESO',$this->NOCE_FECHAINGRESO,true);
		$criteria->compare('NOCE_DIAS',$this->NOCE_DIAS);
		$criteria->compare('PEGE_ID',$this->PEGE_ID);
		$criteria->compare('NOCE_FECHACAMBIO',$this->NOCE_FECHACAMBIO,true);
		$criteria->compare('NOCE_REGISTRADOPOR',$this->NOCE_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}