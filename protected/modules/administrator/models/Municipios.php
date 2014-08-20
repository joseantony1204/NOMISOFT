<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMMUNICIPIOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMMUNICIPIOS':
 * @Propiedad integer $MUNI_ID
 * @Propiedad string $MUNI_NOMBRE
 * @Propiedad string $MUNI_CODIGO
 * @Propiedad integer $DEPA_ID
 * @Propiedad string $MUNI_FECHACAMBIO
 * @Propiedad integer $MUNI_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad DEPARTAMENTOS $dEPA
 */
class Municipios extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Municipios la clase del modelo estàtico.
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
		return 'TBL_NOMMUNICIPIOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('DEPA_ID, MUNI_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('MUNI_NOMBRE', 'length', 'max'=>100),
			array('MUNI_CODIGO', 'length', 'max'=>20),
			array('MUNI_FECHACAMBIO', 'safe'),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('MUNI_ID, MUNI_NOMBRE, MUNI_CODIGO, DEPA_ID, MUNI_FECHACAMBIO, MUNI_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'Departamentos' => array(self::BELONGS_TO, 'Departamentos', 'DEPA_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'MUNI_ID' => 'ID',
						'MUNI_NOMBRE' => 'NOMBRE',
						'MUNI_CODIGO' => 'CODIGO',
						'DEPA_ID' => 'DEPARTAMENTO',
						'MUNI_FECHACAMBIO' => 'FECHA CAMBIO',
						'MUNI_REGISTRADOPOR' => 'REGISTRADO POR',
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

		$criteria->compare('"MUNI_ID"',$this->MUNI_ID);
		$criteria->compare('"MUNI_NOMBRE"',$this->MUNI_NOMBRE,true);
		$criteria->compare('"MUNI_CODIGO"',$this->MUNI_CODIGO,true);
		$criteria->compare('"DEPA_ID"',$this->DEPA_ID);
		$criteria->compare('"MUNI_FECHACAMBIO"',$this->MUNI_FECHACAMBIO,true);
		$criteria->compare('"MUNI_REGISTRADOPOR"',$this->MUNI_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 30,),
		));
	}
	
	public function Departamentos()
	{
	 $criteria=new CDbCriteria;
     $criteria->select='t."DEPA_ID", t."DEPA_NOMBRE"';
	 $criteria->join = 'INNER JOIN "TBL_NOMMUNICIPIOS"  m ON t."DEPA_ID" = m."DEPA_ID" ';	
	 $criteria->order = 't."DEPA_NOMBRE" ASC';
	 return  CHtml::listData(Departamentos::model()->findAll($criteria),'DEPA_ID','DEPA_NOMBRE'); 
	}
}