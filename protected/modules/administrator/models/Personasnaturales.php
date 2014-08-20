<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_SEGPERSONASNATURALES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_SEGPERSONASNATURALES':
 * @Propiedad integer $PENA_ID
 * @Propiedad string $PENA_IDENTIFICACION
 * @Propiedad string $PENA_NOMBRES
 * @Propiedad string $PENA_APELLIDOS
 * @Propiedad string $PENA_TELEFONO
 * @Propiedad string $PENA_DIRECCION
 * @Propiedad string $PENA_FECHANACIMIENTO
 * @Propiedad string $PENA_FECHAINGRESO
 * @Propiedad string $PENA_SEXO
 */
class Personasnaturales extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Personasnaturales la clase del modelo estàtico.
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
		return 'TBL_SEGPERSONASNATURALES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PENA_IDENTIFICACION, PENA_NOMBRES, PENA_APELLIDOS, PENA_TELEFONO, PENA_DIRECCION, PENA_FECHANACIMIENTO', 'required'),
			array('PENA_IDENTIFICACION, PENA_NOMBRES, PENA_APELLIDOS, PENA_TELEFONO, PENA_DIRECCION, PENA_SEXO', 'length', 'max'=>45),
			array('PENA_FECHAINGRESO', 'safe'),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PENA_ID, PENA_IDENTIFICACION, PENA_NOMBRES, PENA_APELLIDOS, PENA_TELEFONO, PENA_DIRECCION, PENA_FECHANACIMIENTO, PENA_FECHAINGRESO, PENA_SEXO', 'safe', 'on'=>'search'),
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
						'PENA_ID' => 'ID',
						'PENA_IDENTIFICACION' => 'IDENTIFICACION',
						'PENA_NOMBRES' => 'NOMBRES',
						'PENA_APELLIDOS' => 'APELLIDOS',
						'PENA_TELEFONO' => 'TELEFONO',
						'PENA_DIRECCION' => 'DIRECCION',
						'PENA_FECHANACIMIENTO' => 'FECHA NACIMIENTO',
						'PENA_FECHAINGRESO' => 'FECHA INGRESO',
						'PENA_SEXO' => 'SEXO',
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

		$criteria->compare('PENA_ID',$this->PENA_ID);
		$criteria->compare('PENA_IDENTIFICACION',$this->PENA_IDENTIFICACION,true);
		$criteria->compare('PENA_NOMBRES',$this->PENA_NOMBRES,true);
		$criteria->compare('PENA_APELLIDOS',$this->PENA_APELLIDOS,true);
		$criteria->compare('PENA_TELEFONO',$this->PENA_TELEFONO,true);
		$criteria->compare('PENA_DIRECCION',$this->PENA_DIRECCION,true);
		$criteria->compare('PENA_FECHANACIMIENTO',$this->PENA_FECHANACIMIENTO,true);
		$criteria->compare('PENA_FECHAINGRESO',$this->PENA_FECHAINGRESO,true);
		$criteria->compare('PENA_SEXO',$this->PENA_SEXO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}