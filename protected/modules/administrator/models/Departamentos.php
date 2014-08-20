<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMDEPARTAMENTOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMDEPARTAMENTOS':
 * @Propiedad integer $DEPA_ID
 * @Propiedad string $DEPA_NOMBRE
 * @Propiedad string $DEPA_INDICATIVO
 * @Propiedad integer $PAIS_ID
 * @Propiedad string $DEPA_FECHACAMBIO
 * @Propiedad integer $DEPA_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad MUNICIPIOS[] $mUNICIPIOSes
 * @Propiedad PAISES $pAIS
 */
class Departamentos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Departamentos la clase del modelo estàtico.
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
		return 'TBL_NOMDEPARTAMENTOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PAIS_ID', 'required'),
			array('PAIS_ID, DEPA_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('DEPA_NOMBRE', 'length', 'max'=>100),
			array('DEPA_INDICATIVO', 'length', 'max'=>3),
			array('DEPA_FECHACAMBIO', 'safe'),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('DEPA_ID, DEPA_NOMBRE, DEPA_INDICATIVO, PAIS_ID, DEPA_FECHACAMBIO, DEPA_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'mUNICIPIOSes' => array(self::HAS_MANY, 'MUNICIPIOS', 'DEPA_ID'),
			'Paises' => array(self::BELONGS_TO, 'Paises', 'PAIS_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'DEPA_ID' => 'ID',
						'DEPA_NOMBRE' => 'NOMBRE',
						'DEPA_INDICATIVO' => 'INDICATIVO',
						'PAIS_ID' => 'PAIS',
						'DEPA_FECHACAMBIO' => 'FECHACAMBIO',
						'DEPA_REGISTRADOPOR' => 'REGISTRADOPOR',
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

		$criteria->compare('"DEPA_ID"',$this->DEPA_ID);
		$criteria->compare('"DEPA_NOMBRE"',$this->DEPA_NOMBRE,true);
		$criteria->compare('"DEPA_INDICATIVO"',$this->DEPA_INDICATIVO,true);
		$criteria->compare('"PAIS_ID"',$this->PAIS_ID);
		$criteria->compare('"DEPA_FECHACAMBIO"',$this->DEPA_FECHACAMBIO,true);
		$criteria->compare('"DEPA_REGISTRADOPOR"',$this->DEPA_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 30,),
		));
	}
	
	public function Paises()
	{
	 $criteria=new CDbCriteria;
     $criteria->select='t."PAIS_ID", t."PAIS_NOMBRE"';
	 $criteria->join = 'INNER JOIN "TBL_NOMDEPARTAMENTOS"  m ON t."PAIS_ID" = m."PAIS_ID" ';	
	 $criteria->order = 't."PAIS_NOMBRE" ASC';
	 return  CHtml::listData(Paises::model()->findAll($criteria),'PAIS_ID','PAIS_NOMBRE'); 
	}
}