<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMFACTORESSALARIALES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMFACTORESSALARIALES':
 * @Propiedad integer $FASA_ID
 * @Propiedad boolean $FASA_SUBTRANSPORTE
 * @Propiedad boolean $FASA_SUBALIMIENTACION
 * @Propiedad boolean $FASA_BSP
 * @Propiedad boolean $FASA_PRIMAVACACIONES
 * @Propiedad boolean $FASA_SUBSISTENCIA
 * @Propiedad boolean $FASA_ESTAMPILLA
 * @Propiedad boolean $FASA_RETEFUENTE
 * @Propiedad boolean $FASA_FSP
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $FASA_FECHACAMBIO
 * @Propiedad integer $FASA_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad EMPLEOSPLANTA $eMPL
 */
class Factoressalariales extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Factoressalariales la clase del modelo estàtico.
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
		return 'TBL_NOMFACTORESSALARIALES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('EMPL_ID, FASA_FECHACAMBIO, FASA_REGISTRADOPOR', 'required'),
			array('EMPL_ID, FASA_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('FASA_SUBTRANSPORTE, FASA_SUBALIMIENTACION, FASA_BSP, FASA_PRIMAVACACIONES, FASA_SUBSISTENCIA, FASA_ESTAMPILLA, FASA_RETEFUENTE, FASA_FSP', 'safe'),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('FASA_ID, FASA_SUBTRANSPORTE, FASA_SUBALIMIENTACION, FASA_BSP, FASA_PRIMAVACACIONES, FASA_SUBSISTENCIA, FASA_ESTAMPILLA, FASA_RETEFUENTE, FASA_FSP, EMPL_ID, FASA_FECHACAMBIO, FASA_REGISTRADOPOR,
			PEGE_ID, PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'search'),
			
			array('FASA_ID, FASA_SUBTRANSPORTE, FASA_SUBALIMIENTACION, FASA_BSP, FASA_PRIMAVACACIONES, FASA_SUBSISTENCIA, FASA_ESTAMPILLA, FASA_RETEFUENTE, FASA_FSP, EMPL_ID, FASA_FECHACAMBIO, FASA_REGISTRADOPOR,
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
						'FASA_ID' => 'ID',
						'FASA_SUBTRANSPORTE' => 'SUBSIDIO TRANSPORTE',
						'FASA_SUBALIMIENTACION' => 'SUBSIDIO ALIMIENTACION',
						'FASA_BSP' => 'BONIFICACION SERV. PRESTADOS',
						'FASA_PRIMAVACACIONES' => 'PRIMA VACACIONES',
						'FASA_SUBSISTENCIA' => 'SUBSISTENCIA',
						'FASA_ESTAMPILLA' => 'ESTAMPILLA',
						'FASA_RETEFUENTE' => 'RETEFUENTE',
						'FASA_FSP' => 'FONDO SOLIDARIDAD PENSIONAL',
						'EMPL_ID' => 'EMPLEOS PLANTA',
						'EMPL_CARGO' => 'CARGO',
						'FASA_FECHACAMBIO' => 'FASA FECHACAMBIO',
						'FASA_REGISTRADOPOR' => 'FASA REGISTRADOPOR',
						
						
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

		$criteria->compare('FASA_ID',$this->FASA_ID);
		$criteria->compare('FASA_SUBTRANSPORTE',$this->FASA_SUBTRANSPORTE);
		$criteria->compare('FASA_SUBALIMIENTACION',$this->FASA_SUBALIMIENTACION);
		$criteria->compare('FASA_BSP',$this->FASA_BSP);
		$criteria->compare('FASA_PRIMAVACACIONES',$this->FASA_PRIMAVACACIONES);
		$criteria->compare('FASA_SUBSISTENCIA',$this->FASA_SUBSISTENCIA);
		$criteria->compare('FASA_ESTAMPILLA',$this->FASA_ESTAMPILLA);
		$criteria->compare('FASA_RETEFUENTE',$this->FASA_RETEFUENTE);
		$criteria->compare('FASA_FSP',$this->FASA_FSP);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('FASA_FECHACAMBIO',$this->FASA_FECHACAMBIO,true);
		$criteria->compare('FASA_REGISTRADOPOR',$this->FASA_REGISTRADOPOR);

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
		$criteria->group = 't."FASA_ID", p."PEGE_ID", ep."EMPL_ID"';

		$criteria->compare('FASA_ID',$this->FASA_ID);
		$criteria->compare('FASA_SUBTRANSPORTE',$this->FASA_SUBTRANSPORTE);
		$criteria->compare('FASA_SUBALIMIENTACION',$this->FASA_SUBALIMIENTACION);
		$criteria->compare('FASA_BSP',$this->FASA_BSP);
		$criteria->compare('FASA_PRIMAVACACIONES',$this->FASA_PRIMAVACACIONES);
		$criteria->compare('FASA_SUBSISTENCIA',$this->FASA_SUBSISTENCIA);
		$criteria->compare('FASA_ESTAMPILLA',$this->FASA_ESTAMPILLA);
		$criteria->compare('FASA_RETEFUENTE',$this->FASA_RETEFUENTE);
		$criteria->compare('FASA_FSP',$this->FASA_FSP);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('FASA_FECHACAMBIO',$this->FASA_FECHACAMBIO,true);
		$criteria->compare('FASA_REGISTRADOPOR',$this->FASA_REGISTRADOPOR);

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