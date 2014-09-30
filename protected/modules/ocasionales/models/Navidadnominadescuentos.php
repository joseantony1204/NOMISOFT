<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMNAVIDADNOMINADESCUENTOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMNAVIDADNOMINADESCUENTOS':
 * @Propiedad string $NAND_ID
 * @Propiedad integer $NAND_VALOR
 * @Propiedad integer $DEPR_ID
 * @Propiedad integer $NANL_ID
 * @Propiedad string $NAND_FECHACAMBIO
 * @Propiedad integer $NAND_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad DESCUENTOSPRESTACIONES $dEPR
 * @Propiedad NAVIDADNOMINALIQUIDACIONES $nANL
 */
class Navidadnominadescuentos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Navidadnominadescuentos la clase del modelo estàtico.
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
		return 'TBL_NOMNAVIDADNOMINADESCUENTOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('NAND_VALOR, DEPR_ID, NANL_ID, NAND_FECHACAMBIO, NAND_REGISTRADOPOR', 'required'),
			array('NAND_VALOR, DEPR_ID, NANL_ID, NAND_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('NAND_ID, NAND_VALOR, DEPR_ID, NANL_ID, NAND_FECHACAMBIO, NAND_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'nANL' => array(self::BELONGS_TO, 'NAVIDADNOMINALIQUIDACIONES', 'NANL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'NAND_ID' => 'NAND',
						'NAND_VALOR' => 'NAND VALOR',
						'DEPR_ID' => 'DEPR',
						'NANL_ID' => 'NANL',
						'NAND_FECHACAMBIO' => 'NAND FECHACAMBIO',
						'NAND_REGISTRADOPOR' => 'NAND REGISTRADOPOR',
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

		$criteria->compare('NAND_ID',$this->NAND_ID,true);
		$criteria->compare('NAND_VALOR',$this->NAND_VALOR);
		$criteria->compare('DEPR_ID',$this->DEPR_ID);
		$criteria->compare('NANL_ID',$this->NANL_ID);
		$criteria->compare('NAND_FECHACAMBIO',$this->NAND_FECHACAMBIO,true);
		$criteria->compare('NAND_REGISTRADOPOR',$this->NAND_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}