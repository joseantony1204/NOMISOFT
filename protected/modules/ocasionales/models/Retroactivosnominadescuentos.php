<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMRETROACTIVOSNOMINADESCUENTOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMRETROACTIVOSNOMINADESCUENTOS':
 * @Propiedad string $RAND_ID
 * @Propiedad integer $RAND_VALOR
 * @Propiedad integer $DEPR_ID
 * @Propiedad integer $RANL_ID
 * @Propiedad string $RAND_FECHACAMBIO
 * @Propiedad integer $RAND_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad DESCUENTOSPRESTACIONES $dEPR
 * @Propiedad RETROACTIVOSNOMINALIQUIDACIONES $rANL
 */
class Retroactivosnominadescuentos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Retroactivosnominadescuentos la clase del modelo estàtico.
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
		return 'TBL_NOMRETROACTIVOSNOMINADESCUENTOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('RAND_VALOR, DEPR_ID, RANL_ID, RAND_FECHACAMBIO, RAND_REGISTRADOPOR', 'required'),
			array('RAND_VALOR, DEPR_ID, RANL_ID, RAND_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('RAND_ID, RAND_VALOR, DEPR_ID, RANL_ID, RAND_FECHACAMBIO, RAND_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'rANL' => array(self::BELONGS_TO, 'RETROACTIVOSNOMINALIQUIDACIONES', 'RANL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'RAND_ID' => 'RAND',
						'RAND_VALOR' => 'RAND VALOR',
						'DEPR_ID' => 'DEPR',
						'RANL_ID' => 'RANL',
						'RAND_FECHACAMBIO' => 'RAND FECHACAMBIO',
						'RAND_REGISTRADOPOR' => 'RAND REGISTRADOPOR',
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

		$criteria->compare('RAND_ID',$this->RAND_ID,true);
		$criteria->compare('RAND_VALOR',$this->RAND_VALOR);
		$criteria->compare('DEPR_ID',$this->DEPR_ID);
		$criteria->compare('RANL_ID',$this->RANL_ID);
		$criteria->compare('RAND_FECHACAMBIO',$this->RAND_FECHACAMBIO,true);
		$criteria->compare('RAND_REGISTRADOPOR',$this->RAND_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}