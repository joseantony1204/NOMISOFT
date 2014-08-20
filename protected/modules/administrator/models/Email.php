<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMEMAIL".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMEMAIL':
 * @Propiedad integer $EMAI_ID
 * @Propiedad string $EMAI_DESCRIPCION
 * @Propiedad integer $EMAI_NOMINA
 * @Propiedad string $EMAI_FECHACAMBIO
 * @Propiedad integer $EMAI_REGISTRADOPOR
 */
class Email extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Email la clase del modelo estàtico.
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
		return 'TBL_NOMEMAIL';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('EMAI_NOMINA, EMAI_DESCRIPCION, EMAI_FECHACAMBIO, EMAI_REGISTRADOPOR', 'required'),
			array('EMAI_NOMINA, EMAI_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('EMAI_DESCRIPCION', 'length', 'max'=>1000),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('EMAI_ID, EMAI_DESCRIPCION, EMAI_NOMINA, EMAI_FECHACAMBIO, EMAI_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'EMAI_ID' => 'ID',
						'EMAI_DESCRIPCION' => 'DESCRIPCION MENSAJE',
						'EMAI_NOMINA' => 'TIPO NOMINA',
						'EMAI_FECHACAMBIO' => 'EMAI FECHACAMBIO',
						'EMAI_REGISTRADOPOR' => 'EMAI REGISTRADOPOR',
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
		$criteria->order = '"EMAI_ID" ASC';

		$criteria->compare('"EMAI_ID"',$this->EMAI_ID);
		$criteria->compare('"EMAI_DESCRIPCION"',$this->EMAI_DESCRIPCION,true);
		$criteria->compare('"EMAI_NOMINA"',$this->EMAI_NOMINA);
		$criteria->compare('"EMAI_FECHACAMBIO"',$this->EMAI_FECHACAMBIO,true);
		$criteria->compare('"EMAI_REGISTRADOPOR"',$this->EMAI_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getsNotasemails($nomina)
	{
	 $connection = Yii::app()->db;	 
	 $sql=' 
	      SELECT * FROM "TBL_NOMEMAIL" WHERE "EMAI_NOMINA" = '.$nomina.'  ORDER BY "EMAI_ID" ASC
	      ';
	 $rows = $connection->createCommand($sql)->queryAll();	 
     return $rows;	 
	}
}