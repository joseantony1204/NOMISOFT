<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMNOVEDADESRETROACTIVOPUNTOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMNOVEDADESRETROACTIVOPUNTOS':
 * @Propiedad integer $NORP_ID
 * @Propiedad string $NORP_FECHAINGRESO
 * @Propiedad integer $NORP_MESES
 * @Propiedad integer $PEGE_ID
 * @Propiedad string $NORP_FECHACAMBIO
 * @Propiedad integer $NORP_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PERSONASGENERALES $pEGE
 */
class Novedadesretroactivopuntos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Novedadesretroactivopuntos la clase del modelo estàtico.
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
		return 'TBL_NOMNOVEDADESRETROACTIVOPUNTOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('NORP_FECHAINGRESO, NORP_MESES, PEGE_ID, NORP_FECHACAMBIO, NORP_REGISTRADOPOR', 'required'),
			array('NORP_MESES, PEGE_ID, NORP_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('NORP_ID, NORP_FECHAINGRESO, NORP_MESES, PEGE_ID, NORP_FECHACAMBIO, NORP_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'NORP_ID' => 'NORP',
						'NORP_FECHAINGRESO' => 'NORP FECHAINGRESO',
						'NORP_MESES' => 'MESES',
						'PEGE_ID' => 'PEGE',
						'NORP_FECHACAMBIO' => 'NORP FECHACAMBIO',
						'NORP_REGISTRADOPOR' => 'NORP REGISTRADOPOR',
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

		$criteria->compare('NORP_ID',$this->NORP_ID);
		$criteria->compare('NORP_FECHAINGRESO',$this->NORP_FECHAINGRESO,true);
		$criteria->compare('NORP_MESES',$this->NORP_MESES);
		$criteria->compare('PEGE_ID',$this->PEGE_ID);
		$criteria->compare('NORP_FECHACAMBIO',$this->NORP_FECHACAMBIO,true);
		$criteria->compare('NORP_REGISTRADOPOR',$this->NORP_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}