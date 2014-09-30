<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMVACACIONESNOMINADESCUENTOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMVACACIONESNOMINADESCUENTOS':
 * @Propiedad string $VAND_ID
 * @Propiedad integer $VAND_VALOR
 * @Propiedad integer $DEPR_ID
 * @Propiedad integer $VANL_ID
 * @Propiedad string $VAND_FECHACAMBIO
 * @Propiedad integer $VAND_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad DESCUENTOSPRESTACIONES $dEPR
 * @Propiedad VACACIONESNOMINALIQUIDACIONES $vANL
 */
class Vacacionesnominadescuentos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Vacacionesnominadescuentos la clase del modelo estàtico.
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static $db2; 
	public function getDbConnection()
	{ 
	 if(self::$db2 !== null){ 
	  return self::$db2; 
	 }else{ 
	       self::$db2 = Yii::app()->db2; 
	       if (self::$db2 instanceof CDbConnection)
	       { 
		    self::$db2->setActive(true); 
			return self::$db2; 
	       }else{  
		         throw new CDbException(Yii::t('yii','Active Record requires a "db2" CDbConnection application component.')); 
	            } 
	      } 
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMVACACIONESNOMINADESCUENTOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('VAND_VALOR, DEPR_ID, VANL_ID, VAND_FECHACAMBIO, VAND_REGISTRADOPOR', 'required'),
			array('VAND_VALOR, DEPR_ID, VANL_ID, VAND_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('VAND_ID, VAND_VALOR, DEPR_ID, VANL_ID, VAND_FECHACAMBIO, VAND_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'dEPR' => array(self::BELONGS_TO, 'DESCUENTOSPRESTACIONES', 'DEPR_ID'),
			'vANL' => array(self::BELONGS_TO, 'VACACIONESNOMINALIQUIDACIONES', 'VANL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'VAND_ID' => 'VAND',
						'VAND_VALOR' => 'VAND VALOR',
						'DEPR_ID' => 'DEPR',
						'VANL_ID' => 'VANL',
						'VAND_FECHACAMBIO' => 'VAND FECHACAMBIO',
						'VAND_REGISTRADOPOR' => 'VAND REGISTRADOPOR',
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

		$criteria->compare('VAND_ID',$this->VAND_ID,true);
		$criteria->compare('VAND_VALOR',$this->VAND_VALOR);
		$criteria->compare('DEPR_ID',$this->DEPR_ID);
		$criteria->compare('VANL_ID',$this->VANL_ID);
		$criteria->compare('VAND_FECHACAMBIO',$this->VAND_FECHACAMBIO,true);
		$criteria->compare('VAND_REGISTRADOPOR',$this->VAND_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}