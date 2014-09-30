<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMMENSUALNOMINAPARAFISCALES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMMENSUALNOMINAPARAFISCALES':
 * @Propiedad string $MENP_ID
 * @Propiedad integer $SALU_ID
 * @Propiedad integer $MENP_SALUDTOTAL
 * @Propiedad integer $PENS_ID
 * @Propiedad integer $MENP_PENSIONTOTAL
 * @Propiedad integer $SIND_ID
 * @Propiedad integer $MENP_SINDICATOTOTAL
 * @Propiedad integer $MENP_FONDOSP
 * @Propiedad integer $MENP_SUBSISTENCIA
 * @Propiedad integer $MENP_ESTAMPILLA
 * @Propiedad integer $MENP_RETEFUENTETOTAL
 * @Propiedad integer $MENL_ID
 * @Propiedad string $MENP_FECHACAMBIO
 * @Propiedad integer $MENP_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad MENSUALNOMINALIQUIDACIONES $mENL
 * @Propiedad SALUD $sALU
 * @Propiedad PENSION $pENS
 * @Propiedad SINDICATOS $sIND
 */
class Mensualnominaparafiscales extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Mensualnominaparafiscales la clase del modelo estàtico.
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
		return 'TBL_NOMMENSUALNOMINAPARAFISCALES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('SALU_ID, MENP_SALUDTOTAL, PENS_ID, MENP_PENSIONTOTAL, SIND_ID, MENP_SINDICATOTOTAL, MENP_FONDOSP, MENP_SUBSISTENCIA, MENP_ESTAMPILLA, MENP_RETEFUENTETOTAL, MENL_ID, MENP_FECHACAMBIO, MENP_REGISTRADOPOR', 'required'),
			array('SALU_ID, MENP_SALUDTOTAL, PENS_ID, MENP_PENSIONTOTAL, SIND_ID, MENP_SINDICATOTOTAL, MENP_FONDOSP, MENP_SUBSISTENCIA, MENP_ESTAMPILLA, MENP_RETEFUENTETOTAL, MENL_ID, MENP_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('MENP_ID, SALU_ID, MENP_SALUDTOTAL, PENS_ID, MENP_PENSIONTOTAL, SIND_ID, MENP_SINDICATOTOTAL, MENP_FONDOSP, MENP_SUBSISTENCIA, MENP_ESTAMPILLA, MENP_RETEFUENTETOTAL, MENL_ID, MENP_FECHACAMBIO, MENP_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'mENL' => array(self::BELONGS_TO, 'MENSUALNOMINALIQUIDACIONES', 'MENL_ID'),
			'sALU' => array(self::BELONGS_TO, 'SALUD', 'SALU_ID'),
			'pENS' => array(self::BELONGS_TO, 'PENSION', 'PENS_ID'),
			'sIND' => array(self::BELONGS_TO, 'SINDICATOS', 'SIND_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'MENP_ID' => 'MENP',
						'SALU_ID' => 'SALU',
						'MENP_SALUDTOTAL' => 'MENP SALUDTOTAL',
						'PENS_ID' => 'PENS',
						'MENP_PENSIONTOTAL' => 'MENP PENSIONTOTAL',
						'SIND_ID' => 'SIND',
						'MENP_SINDICATOTOTAL' => 'MENP SINDICATOTOTAL',
						'MENP_FONDOSP' => 'MENP FONDOSP',
						'MENP_SUBSISTENCIA' => 'MENP SUBSISTENCIA',
						'MENP_ESTAMPILLA' => 'MENP ESTAMPILLA',
						'MENP_RETEFUENTETOTAL' => 'MENP RETEFUENTETOTAL',
						'MENL_ID' => 'MENL',
						'MENP_FECHACAMBIO' => 'MENP FECHACAMBIO',
						'MENP_REGISTRADOPOR' => 'MENP REGISTRADOPOR',
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

		$criteria->compare('MENP_ID',$this->MENP_ID,true);
		$criteria->compare('SALU_ID',$this->SALU_ID);
		$criteria->compare('MENP_SALUDTOTAL',$this->MENP_SALUDTOTAL);
		$criteria->compare('PENS_ID',$this->PENS_ID);
		$criteria->compare('MENP_PENSIONTOTAL',$this->MENP_PENSIONTOTAL);
		$criteria->compare('SIND_ID',$this->SIND_ID);
		$criteria->compare('MENP_SINDICATOTOTAL',$this->MENP_SINDICATOTOTAL);
		$criteria->compare('MENP_FONDOSP',$this->MENP_FONDOSP);
		$criteria->compare('MENP_SUBSISTENCIA',$this->MENP_SUBSISTENCIA);
		$criteria->compare('MENP_ESTAMPILLA',$this->MENP_ESTAMPILLA);
		$criteria->compare('MENP_RETEFUENTETOTAL',$this->MENP_RETEFUENTETOTAL);
		$criteria->compare('MENL_ID',$this->MENL_ID);
		$criteria->compare('MENP_FECHACAMBIO',$this->MENP_FECHACAMBIO,true);
		$criteria->compare('MENP_REGISTRADOPOR',$this->MENP_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}