<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMGRUPOSSANGUINEOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMGRUPOSSANGUINEOS':
 * @Propiedad integer $GRSA_ID
 * @Propiedad string $GRSA_NOMBRE
 * @Propiedad string $GRSA_FECHACAMBIO
 * @Propiedad integer $GRSA_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PERSONASGENERALES[] $pERSONASGENERALESs
 */
class Grupossanguineos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Grupossanguineos la clase del modelo estàtico.
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
		return 'TBL_NOMGRUPOSSANGUINEOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('GRSA_NOMBRE, GRSA_FECHACAMBIO, GRSA_REGISTRADOPOR', 'required'),
			array('GRSA_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('GRSA_NOMBRE', 'length', 'max'=>4),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('GRSA_ID, GRSA_NOMBRE, GRSA_FECHACAMBIO, GRSA_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'pERSONASGENERALESs' => array(self::HAS_MANY, 'PERSONASGENERALES', 'GRSA_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'GRSA_ID' => 'ID',
						'GRSA_NOMBRE' => 'GRUPO SANGUINEO',
						'GRSA_FECHACAMBIO' => 'GRSA FECHACAMBIO',
						'GRSA_REGISTRADOPOR' => 'GRSA REGISTRADOPOR',
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

		$criteria->compare('"GRSA_ID"',$this->GRSA_ID);
		$criteria->compare('"GRSA_NOMBRE"',$this->GRSA_NOMBRE,true);
		$criteria->compare('GRSA_FECHACAMBIO',$this->GRSA_FECHACAMBIO,true);
		$criteria->compare('GRSA_REGISTRADOPOR',$this->GRSA_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}