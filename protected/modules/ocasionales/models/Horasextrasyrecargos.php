<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMHORASEXTRASYRECARGOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMHORASEXTRASYRECARGOS':
 * @Propiedad integer $HOER_ID
 * @Propiedad integer $HOER_HED
 * @Propiedad integer $HOER_HEN
 * @Propiedad integer $HOER_HEDF
 * @Propiedad integer $HOER_HENF
 * @Propiedad integer $HOER_DYF
 * @Propiedad integer $HOER_REN
 * @Propiedad integer $HOER_RENDYF
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $HOER_FECHACAMBIO
 * @Propiedad integer $HOER_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad EMPLEOSPLANTA $eMPL
 */
class Horasextrasyrecargos extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Horasextrasyrecargos la clase del modelo estàtico.
	 */
	public $VINCULO, $CARGOS, $EMPL_CARGO, $PEGE_ID, $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS;
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
		return 'TBL_NOMHORASEXTRASYRECARGOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('EMPL_ID, HOER_FECHACAMBIO, HOER_REGISTRADOPOR', 'required'),
			array('HOER_HED, HOER_HEN, HOER_HEDF, HOER_HENF, HOER_DYF, HOER_REN, HOER_RENDYF, EMPL_ID, HOER_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('HOER_ID, HOER_HED, HOER_HEN, HOER_HEDF, HOER_HENF, HOER_DYF, HOER_REN, HOER_RENDYF, EMPL_ID, HOER_FECHACAMBIO, HOER_REGISTRADOPOR,
			PEGE_ID, PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'search'),
			
			array('HOER_ID, HOER_HED, HOER_HEN, HOER_HEDF, HOER_HENF, HOER_DYF, HOER_REN, HOER_RENDYF, EMPL_ID, HOER_FECHACAMBIO, HOER_REGISTRADOPOR,
			PEGE_ID, PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'buscar'),
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
			'eMPL' => array(self::BELONGS_TO, 'EMPLEOSPLANTA', 'EMPL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'HOER_ID' => 'ID',
						'HOER_HED' => 'DIURNA',
						'HOER_HEN' => 'NOCTURNA',
						'HOER_HEDF' => 'DIURNA DOMINICAL O FESTIVO',
						'HOER_HENF' => 'NOCTURNA DOMINICAL O FESTIVO',
						'HOER_DYF' => 'DOMINICAL O FESTIVO',
						'HOER_REN' => 'RECARGO NOCTURNO',
						'HOER_RENDYF' => 'RECARGO DOMINICAL O FESTIVO',
						'EMPL_ID' => 'CARGO',
						'EMPL_CARGO' => 'CARGO',
						'HOER_FECHACAMBIO' => 'HOER FECHACAMBIO',
						'HOER_REGISTRADOPOR' => 'HOER REGISTRADOPOR',
						
						'VINCULO' => 'IR',
						'PEGE_IDENTIFICACION' => 'No. IDENTIFICACION',
						'PEGE_PRIMERNOMBRE' => 'NOMBRE',
						'PEGE_SEGUNDONOMBRE' => 'SEGUNDO NOMBRE',
						'PEGE_PRIMERAPELLIDO' => 'APELLIDO',
						'PEGE_SEGUNDOAPELLIDOS' => 'SEGUNDO APELLIDO',
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

		$criteria->compare('HOER_ID',$this->HOER_ID);
		$criteria->compare('HOER_HED',$this->HOER_HED);
		$criteria->compare('HOER_HEN',$this->HOER_HEN);
		$criteria->compare('HOER_HEDF',$this->HOER_HEDF);
		$criteria->compare('HOER_HENF',$this->HOER_HENF);
		$criteria->compare('HOER_DYF',$this->HOER_DYF);
		$criteria->compare('HOER_REN',$this->HOER_REN);
		$criteria->compare('HOER_RENDYF',$this->HOER_RENDYF);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('HOER_FECHACAMBIO',$this->HOER_FECHACAMBIO,true);
		$criteria->compare('HOER_REGISTRADOPOR',$this->HOER_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function buscar()
	{
		//Advertencia: Por favor, modifique el siguiente código para quitar atributos que
        //No debe ser buscado.
		
		$sort = new CSort();
		$sort->attributes = array(
			'defaultOrder'=>'p.PEGE_PRIMERNOMBRE ASC',
			
			'PEGE_IDENTIFICACION'=>array(
				'asc'=>'p."PEGE_IDENTIFICACION"',
				'desc'=>'p."PEGE_IDENTIFICACION" desc',
			),
			
			'PEGE_PRIMERNOMBRE'=>array(
				'asc'=>'p."PEGE_PRIMERNOMBRE"',
				'desc'=>'p."PEGE_PRIMERNOMBRE" desc',
			),
			
			'PEGE_SEGUNDONOMBRE'=>array(
				'asc'=>'p."PEGE_SEGUNDONOMBRE"',
				'desc'=>'p."PEGE_SEGUNDONOMBRE" desc',
			),
			
			'PEGE_PRIMERAPELLIDO'=>array(
				'asc'=>'p."PEGE_PRIMERAPELLIDO"',
				'desc'=>'p."PEGE_PRIMERAPELLIDO" desc',
			),
			
			'PEGE_SEGUNDOAPELLIDOS'=>array(
				'asc'=>'p."PEGE_SEGUNDOAPELLIDOS"',
				'desc'=>'p."PEGE_SEGUNDOAPELLIDOS" desc',
			),
			
			'EMPL_CARGO'=>array(
				'asc'=>'ep."EMPL_CARGO"',
				'desc'=>'ep."EMPL_CARGO" desc',
			),
        );

		$criteria = new CDbCriteria;
        $criteria->select = 't.*, p.*, ep.*';
	    $criteria->join = 'INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON t."EMPL_ID" = ep."EMPL_ID"
		                   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON p."PEGE_ID" = ep."PEGE_ID"
						   INNER JOIN "TBL_NOMESTADOSEMPLEOSPLANTA" "eep" ON eep."EMPL_ID" = ep."EMPL_ID" AND eep."ESEM_ID" = 1';
		$criteria->order = 'ep."EMPL_ID" DESC';
		$criteria->group = 't."HOER_ID", p."PEGE_ID", ep."EMPL_ID"';

		$criteria->compare('HOER_ID',$this->HOER_ID);
		$criteria->compare('HOER_HED',$this->HOER_HED);
		$criteria->compare('HOER_HEN',$this->HOER_HEN);
		$criteria->compare('HOER_HEDF',$this->HOER_HEDF);
		$criteria->compare('HOER_HENF',$this->HOER_HENF);
		$criteria->compare('HOER_DYF',$this->HOER_DYF);
		$criteria->compare('HOER_REN',$this->HOER_REN);
		$criteria->compare('HOER_RENDYF',$this->HOER_RENDYF);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('HOER_FECHACAMBIO',$this->HOER_FECHACAMBIO,true);
		$criteria->compare('HOER_REGISTRADOPOR',$this->HOER_REGISTRADOPOR);

		$criteria->compare('p."PEGE_ID"',$this->PEGE_ID);
		$criteria->compare('"PEGE_IDENTIFICACION"',$this->PEGE_IDENTIFICACION,true);
		$criteria->compare('"PEGE_PRIMERNOMBRE"',$this->PEGE_PRIMERNOMBRE,true);
		$criteria->compare('"PEGE_SEGUNDONOMBRE"',$this->PEGE_SEGUNDONOMBRE,true);
		$criteria->compare('"PEGE_PRIMERAPELLIDO"',$this->PEGE_PRIMERAPELLIDO,true);
		$criteria->compare('"PEGE_SEGUNDOAPELLIDOS"',$this->PEGE_SEGUNDOAPELLIDOS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 2,),
		));
	}
	
	public function getLink()
	{
		$imageUrl = 'ir.png';
        return Yii::app()->baseurl.'/images/'.$imageUrl;		
	}
}