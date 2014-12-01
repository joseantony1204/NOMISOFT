<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMEMPLEOSPLANTA".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMEMPLEOSPLANTA':
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $EMPL_FECHAINGRESO
 * @Propiedad string $EMPL_CARGO
 * @Propiedad string $EMPL_SUELDO
 * @Propiedad string $EMPL_PUNTOS
 * @Propiedad integer $EMPL_DIASAPAGAR
 * @Propiedad integer $PRTE_ID
 * @Propiedad integer $GARE_ID
 * @Propiedad integer $TICA_ID
 * @Propiedad integer $GRAD_ID
 * @Propiedad integer $NIVE_ID
 * @Propiedad integer $UNID_ID
 * @Propiedad integer $PEGE_ID
 * @Propiedad string $EMPL_FECHACAMBIO
 * @Propiedad integer $EMPL_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad ESTADOSEMPLEOSPLANTA[] $eSTADOSEMPLEOSPLANTAs
 * @Propiedad NOVEDADESMENSUALES[] $nOVEDADESMENSUALESs
 * @Propiedad FACTORESSALARIALES[] $fACTORESSALARIALESs
 * @Propiedad PRIMASTECNICAS $pRTE
 * @Propiedad GASTOSREPRESENTACION $gARE
 * @Propiedad TIPOSCARGOS $tICA
 * @Propiedad GRADOS $gRAD
 * @Propiedad NIVELES $nIVE
 * @Propiedad UNIDADES $uNID
 * @Propiedad PERSONASGENERALES $pEGE
 * @Propiedad HORASEXTRASYRECARGOS[] $hORASEXTRASYRECARGOSes
 */
class Empleosplanta extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Empleosplanta la clase del modelo estàtico.
	 */
	public $VINCULO, $CARGOS, $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS; 
	public $ESEM_NOMBRE, $ESEP_FECHAREGISTRO; 
	public $aumentoDataProvider, $nominaDataProvider;
	public $unidadespvacacionesDataProvider, $unidadesvacacionesDataProvider, $unidadespnavidadDataProvider;
	public $unidadesmensualesDataProvider, $unidadespsemestralDataProvider, $unidadesretroactivosDataProvider;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMEMPLEOSPLANTA';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('EMPL_FECHAINGRESO, EMPL_CARGO, EMPL_SUELDO, EMPL_PUNTOS, PRTE_ID, GARE_ID, TICA_ID, UNID_ID, PEGE_ID, EMPL_FECHACAMBIO, EMPL_REGISTRADOPOR', 'required'),
			array('EMPL_DIASAPAGAR, PRTE_ID, GARE_ID, TICA_ID, GRAD_ID, NIVE_ID, UNID_ID, PEGE_ID, EMPL_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('EMPL_CARGO', 'length', 'max'=>100),
			array('EMPL_DIASAPAGAR', 'safe'),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			
			array('EMPL_ID, EMPL_FECHAINGRESO, EMPL_CARGO, EMPL_SUELDO, EMPL_PUNTOS, EMPL_DIASAPAGAR, PRTE_ID, GARE_ID, TICA_ID, GRAD_ID, NIVE_ID, UNID_ID, PEGE_ID, EMPL_FECHACAMBIO, EMPL_REGISTRADOPOR,
			PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'search'),
			
			array('EMPL_ID, EMPL_FECHAINGRESO, EMPL_CARGO, EMPL_SUELDO, EMPL_PUNTOS, EMPL_DIASAPAGAR, PRTE_ID, GARE_ID, TICA_ID, GRAD_ID, NIVE_ID, UNID_ID, PEGE_ID, EMPL_FECHACAMBIO, EMPL_REGISTRADOPOR,
			PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'buscar'),
			
			array('EMPL_ID, EMPL_FECHAINGRESO, EMPL_CARGO, EMPL_SUELDO, EMPL_PUNTOS, EMPL_DIASAPAGAR, PRTE_ID, GARE_ID, TICA_ID, GRAD_ID, NIVE_ID, UNID_ID, PEGE_ID, EMPL_FECHACAMBIO, EMPL_REGISTRADOPOR,
			PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'busqueda'),
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
			'eSTADOSEMPLEOSPLANTAs' => array(self::HAS_MANY, 'ESTADOSEMPLEOSPLANTA', 'EMPL_ID'),
			'nOVEDADESMENSUALESs' => array(self::HAS_MANY, 'NOVEDADESMENSUALES', 'EMPL_ID'),
			'fACTORESSALARIALESs' => array(self::HAS_MANY, 'FACTORESSALARIALES', 'EMPL_ID'),
			'pRTE' => array(self::BELONGS_TO, 'PRIMASTECNICAS', 'PRTE_ID'),
			'gARE' => array(self::BELONGS_TO, 'GASTOSREPRESENTACION', 'GARE_ID'),
			'Tiposcargos' => array(self::BELONGS_TO, 'Tiposcargos', 'TICA_ID'),
			'gRAD' => array(self::BELONGS_TO, 'GRADOS', 'GRAD_ID'),
			'nIVE' => array(self::BELONGS_TO, 'NIVELES', 'NIVE_ID'),
			'uNID' => array(self::BELONGS_TO, 'UNIDADES', 'UNID_ID'),
			'pEGE' => array(self::BELONGS_TO, 'PERSONASGENERALES', 'PEGE_ID'),
			'hORASEXTRASYRECARGOSes' => array(self::HAS_MANY, 'HORASEXTRASYRECARGOS', 'EMPL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'EMPL_ID' => 'EMPL',
						'EMPL_FECHAINGRESO' => 'F. INGRESO',
						'EMPL_CARGO' => 'CARGO',
						'EMPL_SUELDO' => 'SUELDO',
						'EMPL_PUNTOS' => 'PUNTOS',
						'EMPL_DIASAPAGAR' => 'DIAS A PAGAR',
						'PRTE_ID' => '% PRIMA TECNICA',
						'GARE_ID' => '% GASTOS DE REPRESENTACION',
						'TICA_ID' => 'T. CARGO',
						'GRAD_ID' => 'GRADO',
						'NIVE_ID' => 'NIVEL',
						'UNID_ID' => 'UNIDAD',
						'PEGE_ID' => 'PERSONA GENERAL',
						'EMPL_FECHACAMBIO' => 'EMPL FECHACAMBIO',
						'EMPL_REGISTRADOPOR' => 'EMPL REGISTRADOPOR',
						
						'CARGOS' => 'CARGOS',
						'VINCULO' => 'IR',
						'PEGE_IDENTIFICACION' => 'No. IDENTIFICACION',
						'PEGE_PRIMERNOMBRE' => 'NOMBRE',
						'PEGE_SEGUNDONOMBRE' => 'SEGUNDO NOMBRE',
						'PEGE_PRIMERAPELLIDO' => 'APELLIDO',
						'PEGE_SEGUNDOAPELLIDOS' => 'SEGUNDO APELLIDO',
						
						'ESEM_NOMBRE' => 'ESTADO',
						'ESEP_FECHAREGISTRO' => 'MODIFICADO',
		);
	}

	 /**
     *@Recupera una lista de los modelos basados ​​en las actuales condiciones de búsqueda / filtro.
     *@Return CActiveDataProvider el proveedor de datos que puede devolver los modelos basados ​​en las condiciones de búsqueda / filtro.
     */
	public function busqueda()
	{
		//Advertencia: Por favor, modifique el siguiente código para quitar atributos que
        //No debe ser buscado.
		
		$sort = new CSort();
		$sort->defaultOrder = 't."EMPL_ID" DESC, "ESEP_FECHAREGISTRO" DESC';
		$sort->attributes = array(
			
			'EMPL_ID'=>array(
				'asc'=>'t."EMPL_ID"',
				'desc'=>'t."EMPL_ID" desc',
			),
		);	

		$criteria=new CDbCriteria;
		
		$criteria->select = 't.*, 
		
		(SELECT eep."ESEP_FECHAREGISTRO"
		 FROM "TBL_NOMESTADOSEMPLEOSPLANTA" "eep"
		 WHERE t."EMPL_ID" = eep."EMPL_ID" ORDER BY eep."ESEP_FECHAREGISTRO" DESC LIMIT 1) AS "ESEP_FECHAREGISTRO",
		
		(SELECT ee."ESEM_NOMBRE" 
		 FROM "TBL_NOMESTADOSEMPLEOSPLANTA" "eep",  "TBL_NOMESTADOSEMPLEOS" "ee"
		 WHERE t."EMPL_ID" = eep."EMPL_ID" AND eep."ESEM_ID" = ee."ESEM_ID" ORDER BY eep."ESEP_FECHAREGISTRO" DESC LIMIT 1) AS "ESEM_NOMBRE"';
		

		$criteria->compare('"EMPL_ID"',$this->EMPL_ID);
		$criteria->compare('"EMPL_FECHAINGRESO"',$this->EMPL_FECHAINGRESO,true);
		$criteria->compare('"EMPL_CARGO"',$this->EMPL_CARGO,true);
		$criteria->compare('"EMPL_SUELDO"',$this->EMPL_SUELDO,true);
		$criteria->compare('"EMPL_PUNTOS"',$this->EMPL_PUNTOS,true);
		$criteria->compare('"EMPL_DIASAPAGAR"',$this->EMPL_DIASAPAGAR);
		$criteria->compare('"PRTE_ID"',$this->PRTE_ID);
		$criteria->compare('"GARE_ID"',$this->GARE_ID);
		$criteria->compare('"TICA_ID"',$this->TICA_ID);
		$criteria->compare('"GRAD_ID"',$this->GRAD_ID);
		$criteria->compare('"NIVE_ID"',$this->NIVE_ID);
		$criteria->compare('"UNID_ID"',$this->UNID_ID);
		$criteria->compare('"PEGE_ID"',$this->PEGE_ID);
		$criteria->compare('"EMPL_FECHACAMBIO"',$this->EMPL_FECHACAMBIO,true);
		$criteria->compare('"EMPL_REGISTRADOPOR"',$this->EMPL_REGISTRADOPOR);
		
		$criteria->compare('"PEGE_IDENTIFICACION"',$this->PEGE_IDENTIFICACION);
		$criteria->compare('"PEGE_PRIMERNOMBRE"',$this->PEGE_PRIMERNOMBRE);
		$criteria->compare('"PEGE_SEGUNDONOMBRE"',$this->PEGE_SEGUNDONOMBRE);
		$criteria->compare('"PEGE_PRIMERAPELLIDO"',$this->PEGE_PRIMERAPELLIDO);
		$criteria->compare('"PEGE_SEGUNDOAPELLIDOS"',$this->PEGE_SEGUNDOAPELLIDOS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 20,),
		));
	}
	
	public function search()
	{
		//Advertencia: Por favor, modifique el siguiente código para quitar atributos que
        //No debe ser buscado.
		
		$sort = new CSort();
		$sort->defaultOrder = 't."EMPL_ID" DESC, "ESEP_FECHAREGISTRO" DESC';
		$sort->attributes = array(
			
			'PEGE_PRIMERNOMBRE'=>array(
				'asc'=>'t."PEGE_PRIMERNOMBRE"',
				'desc'=>'t."PEGE_PRIMERNOMBRE" desc',
			),
		);

		$criteria=new CDbCriteria;
		
		$criteria->select = 't.*, 
		
		(SELECT eep."ESEP_FECHAREGISTRO"
		 FROM "TBL_NOMESTADOSEMPLEOSPLANTA" "eep"
		 WHERE t."EMPL_ID" = eep."EMPL_ID" ORDER BY eep."ESEP_FECHAREGISTRO" DESC LIMIT 1) AS "ESEP_FECHAREGISTRO",
		
		(SELECT ee."ESEM_NOMBRE" 
		 FROM "TBL_NOMESTADOSEMPLEOSPLANTA" "eep",  "TBL_NOMESTADOSEMPLEOS" "ee"
		 WHERE t."EMPL_ID" = eep."EMPL_ID" AND eep."ESEM_ID" = ee."ESEM_ID" ORDER BY eep."ESEP_FECHAREGISTRO" DESC LIMIT 1) AS "ESEM_NOMBRE"';

		$criteria->compare('"EMPL_ID"',$this->EMPL_ID);
		$criteria->compare('"EMPL_FECHAINGRESO"',$this->EMPL_FECHAINGRESO,true);
		$criteria->compare('"EMPL_CARGO"',$this->EMPL_CARGO,true);
		$criteria->compare('"EMPL_SUELDO"',$this->EMPL_SUELDO,true);
		$criteria->compare('"EMPL_PUNTOS"',$this->EMPL_PUNTOS,true);
		$criteria->compare('"EMPL_DIASAPAGAR"',$this->EMPL_DIASAPAGAR);
		$criteria->compare('"PRTE_ID"',$this->PRTE_ID);
		$criteria->compare('"GARE_ID"',$this->GARE_ID);
		$criteria->compare('"TICA_ID"',$this->TICA_ID);
		$criteria->compare('"GRAD_ID"',$this->GRAD_ID);
		$criteria->compare('"NIVE_ID"',$this->NIVE_ID);
		$criteria->compare('"UNID_ID"',$this->UNID_ID);
		$criteria->compare('"PEGE_ID"',$this->PEGE_ID);
		$criteria->compare('"EMPL_FECHACAMBIO"',$this->EMPL_FECHACAMBIO,true);
		$criteria->compare('"EMPL_REGISTRADOPOR"',$this->EMPL_REGISTRADOPOR);
		
		$criteria->compare('"PEGE_IDENTIFICACION"',$this->PEGE_IDENTIFICACION);
		$criteria->compare('"PEGE_PRIMERNOMBRE"',$this->PEGE_PRIMERNOMBRE);
		$criteria->compare('"PEGE_SEGUNDONOMBRE"',$this->PEGE_SEGUNDONOMBRE);
		$criteria->compare('"PEGE_PRIMERAPELLIDO"',$this->PEGE_PRIMERAPELLIDO);
		$criteria->compare('"PEGE_SEGUNDOAPELLIDOS"',$this->PEGE_SEGUNDOAPELLIDOS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 3,),
		));
	}
	
	public function defaultDescuentosMensuales($empleoPlanta)
	{
     $criteria = new CDbCriteria();
	 $criteria->select = 't."DEME_ID"';
	 $criteria->order = 't."DEME_ID"';
	 $Descuentosmensuales = Descuentosmensuales::model()->findAll($criteria);	 
	 
	 foreach($Descuentosmensuales as  $descuentos){
	    $Novedadesmensuales = new Novedadesmensuales;
		$Novedadesmensuales->NOME_VALOR = 0;
		$Novedadesmensuales->DEME_ID = $descuentos->DEME_ID;
		$Novedadesmensuales->EMPL_ID = $empleoPlanta;
		$Novedadesmensuales->NOME_FECHACAMBIO = date('Y-m-d H:i:s');
		$Novedadesmensuales->NOME_REGISTRADOPOR = Yii::app()->user->id;
		$Novedadesmensuales->save(); 
	  }	 
	 $this->validarDescuentosMencuales($empleoPlanta);
	}
	
	public function validarDescuentosMencuales($empleoPlanta)
	{
		$Empleosplanta = Empleosplanta::model()->findByPk($empleoPlanta);
		$nuevoCargo = $Empleosplanta->EMPL_ID;
		$diasNuevoCargo = $Empleosplanta->EMPL_DIASAPAGAR;
		
		$criteria = new CDbCriteria();
	    $criteria->select = 't."EMPL_ID"';
	    $criteria->condition = 't."PEGE_ID" = '.$Empleosplanta->PEGE_ID;
	    $criteria->order = 't."EMPL_ID" DESC'; 
	    $criteria->offset = '1'; 
	    
	    $Empleosplanta = Empleosplanta::model()->find($criteria);
		$antiguoCargo = $Empleosplanta->EMPL_ID;		
		
		if(count($antiguoCargo)>0){
		
		$criteria = new CDbCriteria();
	    $criteria->select = 't.*';
		$criteria->condition = 't."EMPL_ID" = '.$antiguoCargo;
	    $criteria->order = 't."DEME_ID"';
	    $Novedadesmensual = Novedadesmensuales::model()->findAll($criteria);	 
	 
	  /**
	  *transladando los descuentos del cargo anterior al nuevo cargo
	  */
	  foreach($Novedadesmensual as  $Novedadmensual){		
		$criteria = new CDbCriteria();
	    $criteria->select = 't.*';
		$criteria->condition = 't."EMPL_ID" = '.$nuevoCargo.' AND t."DEME_ID" = '.$Novedadmensual->DEME_ID;
	    $criteria->order = 't."DEME_ID"';
	    $Novedadesmensualn = Novedadesmensuales::model()->find($criteria);		
		$Novedadesmensualnn = Novedadesmensuales::model()->findByPk($Novedadesmensualn->NOME_ID);
		
		$Novedadesmensualnn->NOME_VALOR = $Novedadmensual->NOME_VALOR;
		$Novedadesmensualnn->NOME_FECHACAMBIO = date('Y-m-d H:i:s');
		$Novedadesmensualnn->NOME_REGISTRADOPOR = Yii::app()->user->id;
		$Novedadesmensualnn->save(); 
	  }
	  
	  /**
	  *si los dias del nuevo cargo son completos, los descuentos del cargo anterior 
	  *se colocan en 0
	  */
	  if($diasNuevoCargo==30){
	    $criteria = new CDbCriteria();
	    $criteria->select = 't.*';
		$criteria->condition = 't."EMPL_ID" = '.$antiguoCargo;
	    $criteria->order = 't."DEME_ID"';
	    $Novedadesmensuala = Novedadesmensuales::model()->findAll($criteria);
		
		foreach($Novedadesmensuala as  $Novedadmensual){				
		 $Novedadesmensualesan = Novedadesmensuales::model()->findByPk($Novedadmensual->NOME_ID);		
		 $Novedadesmensualesan->NOME_VALOR = 0;
		 $Novedadesmensualesan->NOME_FECHACAMBIO = date('Y-m-d H:i:s');
		 $Novedadesmensualesan->NOME_REGISTRADOPOR = Yii::app()->user->id;
		 $Novedadesmensualesan->save(); 
	   }	  
	  }
	 }	
	}
	
	public function getLink()
	{
		$imageUrl = 'ir.png';
        return Yii::app()->baseurl.'/images/'.$imageUrl;		
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
        );			

		$criteria = new CDbCriteria;
        $criteria->select = 'p.*';
	    $criteria->join = 'INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON p."PEGE_ID" = t."PEGE_ID"';
		$criteria->group = 'p."PEGE_ID"';
		
		$criteria->compare('"EMPL_ID"',$this->EMPL_ID);
		$criteria->compare('"EMPL_FECHAINGRESO"',$this->EMPL_FECHAINGRESO,true);
		$criteria->compare('"EMPL_CARGO"',$this->EMPL_CARGO,true);
		$criteria->compare('"EMPL_SUELDO"',$this->EMPL_SUELDO,true);
		$criteria->compare('"EMPL_PUNTOS"',$this->EMPL_PUNTOS,true);
		$criteria->compare('"EMPL_DIASAPAGAR"',$this->EMPL_DIASAPAGAR);
		$criteria->compare('"PRTE_ID"',$this->PRTE_ID);
		$criteria->compare('"GARE_ID"',$this->GARE_ID);
		$criteria->compare('"TICA_ID"',$this->TICA_ID);
		$criteria->compare('"GRAD_ID"',$this->GRAD_ID);
		$criteria->compare('"NIVE_ID"',$this->NIVE_ID);
		$criteria->compare('"UNID_ID"',$this->UNID_ID);
		$criteria->compare('t."PEGE_ID"',$this->PEGE_ID);
		$criteria->compare('"EMPL_FECHACAMBIO"',$this->EMPL_FECHACAMBIO,true);
		$criteria->compare('"EMPL_REGISTRADOPOR"',$this->EMPL_REGISTRADOPOR);
		
		$criteria->compare('p."PEGE_ID"',$this->PEGE_ID);
		$criteria->compare('"PEGE_IDENTIFICACION"',$this->PEGE_IDENTIFICACION,true);
		$criteria->compare('"PEGE_PRIMERNOMBRE"',$this->PEGE_PRIMERNOMBRE,true);
		$criteria->compare('"PEGE_SEGUNDONOMBRE"',$this->PEGE_SEGUNDONOMBRE,true);
		$criteria->compare('"PEGE_PRIMERAPELLIDO"',$this->PEGE_PRIMERAPELLIDO,true);
		$criteria->compare('"PEGE_SEGUNDOAPELLIDOS"',$this->PEGE_SEGUNDOAPELLIDOS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 5,),
		));
	}
  
  public function Tiposcargos()
	{
	 $criteria=new CDbCriteria;
     $criteria->select='t."TICA_ID", t."TICA_NOMBRE"';
	 $criteria->join = 'INNER JOIN "TBL_NOMEMPLEOSPLANTA"  ep ON t."TICA_ID" = ep."TICA_ID" ';	
	 $criteria->order = 't."TICA_NOMBRE" ASC';
	 return  CHtml::listData(Tiposcargos::model()->findAll($criteria),'TICA_ID','TICA_NOMBRE'); 
	}
	
  public function setWorkDays($Empleosplanta)
	{
	 $connection = Yii::app()->db;
	 $Estadosempleosplanta = new Estadosempleosplanta;
	 
	 $sql='SELECT  *   FROM "TBL_NOMEMPLEOSPLANTA" ep   
	       WHERE ep."PEGE_ID"  = '.$Empleosplanta->PEGE_ID.' AND "EMPL_ID"!= '.$Empleosplanta->EMPL_ID.'
	       ORDER BY ep."EMPL_FECHAINGRESO" DESC LIMIT 1';		
     $row = $connection->createCommand($sql)->queryRow();
	 
	 if($row>0){
	  $model = Empleosplanta::model()->findByPk($row["EMPL_ID"]);
	  $model->EMPL_DIASAPAGAR = 30-$Empleosplanta->EMPL_DIASAPAGAR;
	  $model->save();
	 }	
	 
	 $Estadosempleosplanta->EMPL_ID = $model->EMPL_ID;
	 $Estadosempleosplanta->ESEM_ID = 3;				    
	 $Estadosempleosplanta->ESEP_FECHAREGISTRO = $Empleosplanta->EMPL_FECHAINGRESO;				    
	 $Estadosempleosplanta->ESEP_FECHACAMBIO =  date('Y-m-d H:i:s');
	 $Estadosempleosplanta->ESEP_REGISTRADOPOR = Yii::app()->user->id;
	 $Estadosempleosplanta->save();
	}
	
	public function previewAumentoAdmin($Cform)
	{
	 $connection = Yii::app()->db;
     $aumento = $Cform->AUAD_PORCENTAJE;	 
	 $sql=' SELECT t.*, round("EMPL_SUELDO"*'.$aumento.'/100) AS "AUMENTO", round("EMPL_SUELDO"+"EMPL_SUELDO"*'.$aumento.'/100) AS "NETO"
			FROM (
				  SELECT * 
				  FROM ( 
						SELECT * 
						FROM (
							  SELECT pg."PEGE_ID", ep."EMPL_ID", pg."PEGE_IDENTIFICACION", pg."PEGE_PRIMERNOMBRE", pg."PEGE_SEGUNDONOMBRE", pg."PEGE_PRIMERAPELLIDO", 
							  pg."PEGE_SEGUNDOAPELLIDOS", ep."EMPL_CARGO", ep."EMPL_SUELDO", eep."ESEM_ID"
							  FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
							  WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = eep."EMPL_ID" AND ep."TICA_ID" = 1 
							  ORDER BY ep."EMPL_FECHAINGRESO" DESC
							 ) g
						GROUP BY "PEGE_ID", "EMPL_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "EMPL_CARGO", "EMPL_SUELDO", "ESEM_ID"
					   ) e
				  WHERE "ESEM_ID" <>3
				) t
			ORDER BY  "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS"
		  ';
	 $this->aumentoDataProvider = NULL;
	 $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();	  
	 $this->aumentoDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'PEGE_ID', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','EMPL_CARGO', 'EMPL_SUELDO', 'ESEM_ID', 'AUMENTO', 'NETO',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>1000,
                         ),
      )
	 );
	}
	
	public function setAumentoAdmin($Cform)
	{
	 $connection = Yii::app()->db;
     $aumento = $Cform->AUAD_PORCENTAJE;	 
	 $sql=' UPDATE 	"TBL_NOMEMPLEOSPLANTA" "ep"
            SET "EMPL_SUELDO" = ta."NETO" 
            FROM
            (
	        SELECT t.*, round("EMPL_SUELDO"*'.$aumento.'/100) AS "AUMENTO", round("EMPL_SUELDO"+"EMPL_SUELDO"*'.$aumento.'/100) AS "NETO"
			FROM (
				  SELECT * 
				  FROM ( 
						SELECT * 
						FROM (
							  SELECT pg."PEGE_ID", ep."EMPL_ID", pg."PEGE_IDENTIFICACION", pg."PEGE_PRIMERNOMBRE", pg."PEGE_SEGUNDONOMBRE", pg."PEGE_PRIMERAPELLIDO", 
							  pg."PEGE_SEGUNDOAPELLIDOS", ep."EMPL_CARGO", ep."EMPL_SUELDO", eep."ESEM_ID"
							  FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
							  WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = eep."EMPL_ID" AND ep."TICA_ID" = 1 
							  ORDER BY ep."EMPL_FECHAINGRESO" DESC
							 ) g
						GROUP BY "PEGE_ID", "EMPL_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "EMPL_CARGO", "EMPL_SUELDO", "ESEM_ID"
					   ) e
				  WHERE "ESEM_ID" <>3
				) t
			ORDER BY  "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS"
		    ) ta
            WHERE ep."EMPL_ID" = ta."EMPL_ID"
		  ';
	 $connection->createCommand($sql)->execute();	  
	}
	
	public function previewAumentoDocen($Cform,$sw=NULL)
	{
	 $connection = Yii::app()->db;
     $aumento = $Cform->AUAD_PORCENTAJE;
     if($sw!=""){ $string = ' "EMPL_PUNTOS"*'.$aumento.'-"EMPL_SUELDO"'; }else{ $string = '("EMPL_SUELDO")-"EMPL_SUELDO"'; }
	 $sql=' 
	        SELECT t.*, "EMPL_PUNTOS", round(("EMPL_PUNTOS"*'.$aumento.')) as "NETO", round(('.$string.')) AS "AUMENTO"
			FROM (
				  SELECT * 
				  FROM ( 
						SELECT * 
						FROM (
							  SELECT pg."PEGE_ID", ep."EMPL_ID", pg."PEGE_IDENTIFICACION", pg."PEGE_PRIMERNOMBRE", pg."PEGE_SEGUNDONOMBRE", pg."PEGE_PRIMERAPELLIDO", 
							  pg."PEGE_SEGUNDOAPELLIDOS", ep."EMPL_CARGO", ep."EMPL_PUNTOS", ep."EMPL_SUELDO", eep."ESEM_ID"
							  FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
							  WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = eep."EMPL_ID" AND ep."TICA_ID" = 2 
							  ORDER BY ep."EMPL_FECHAINGRESO" DESC
							 ) g
						GROUP BY "PEGE_ID", "EMPL_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "EMPL_CARGO", "EMPL_SUELDO", "EMPL_PUNTOS", "ESEM_ID"
					   ) e
				  WHERE "ESEM_ID" <>3
				) t
			ORDER BY  "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS"
		  ';
	
	 $this->aumentoDataProvider = NULL;
	 $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();	  
	 $this->aumentoDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'PEGE_ID', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','EMPL_CARGO', 'EMPL_SUELDO', 'EMPL_PUNTOS', 'ESEM_ID', 'AUMENTO', 'NETO',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>1000,
                         ),
      )
	 );
	}
	
	public function setAumentoDocen($Cform)
	{
	 $connection = Yii::app()->db;
     $aumento = $Cform->AUAD_PORCENTAJE;	 
	 $sql=' UPDATE 	"TBL_NOMEMPLEOSPLANTA" "ep"
            SET "EMPL_SUELDO" = ta."NETO"             
			FROM
            (
	        SELECT t.*, "EMPL_PUNTOS", round(("EMPL_PUNTOS"*'.$aumento.')) as "NETO"
			FROM (
				  SELECT * 
				  FROM ( 
						SELECT * 
						FROM (
							  SELECT pg."PEGE_ID", ep."EMPL_ID", pg."PEGE_IDENTIFICACION", pg."PEGE_PRIMERNOMBRE", pg."PEGE_SEGUNDONOMBRE", pg."PEGE_PRIMERAPELLIDO", 
							  pg."PEGE_SEGUNDOAPELLIDOS", ep."EMPL_CARGO", ep."EMPL_PUNTOS", ep."EMPL_SUELDO", eep."ESEM_ID"
							  FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
							  WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = eep."EMPL_ID" AND ep."TICA_ID" = 2 
							  ORDER BY ep."EMPL_FECHAINGRESO" DESC
							 ) g
						GROUP BY "PEGE_ID", "EMPL_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "EMPL_CARGO", "EMPL_SUELDO", "EMPL_PUNTOS", "ESEM_ID"
					   ) e
				  WHERE "ESEM_ID" <>3
				) t
			ORDER BY  "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS"			
			) ta
			
            WHERE ep."EMPL_ID" = ta."EMPL_ID"
		  ';
	 $connection->createCommand($sql)->execute();	  
	}
	
	/**
	*aumentar puntos de docentes
	*/
	public function previewAumentoPuntos($Cform,$valorPunto)
	{
	 $connection = Yii::app()->db; 
     $puntos = $Cform->NOVE_UNIDADES;
     $aum =($Cform->NOVE_UNIDADES*$valorPunto);
	 $sql=' 
	        SELECT t.*
			FROM (
				  SELECT * 
				  FROM ( 
						SELECT * 
						FROM (
							  SELECT pg."PEGE_ID", ep."EMPL_ID", pg."PEGE_IDENTIFICACION", pg."PEGE_PRIMERNOMBRE", pg."PEGE_SEGUNDONOMBRE", pg."PEGE_PRIMERAPELLIDO", 
							  pg."PEGE_SEGUNDOAPELLIDOS", ep."EMPL_CARGO", round(("EMPL_PUNTOS"+('.$puntos.')),2) AS "EMPL_PUNTOS", SUM("EMPL_SUELDO"+'.$aum.') AS "EMPL_SUELDO", eep."ESEM_ID"
							  FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
							  WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = eep."EMPL_ID" AND ep."TICA_ID" = 2 
							  GROUP BY pg."PEGE_ID", ep."EMPL_ID", pg."PEGE_IDENTIFICACION", pg."PEGE_PRIMERNOMBRE", pg."PEGE_SEGUNDONOMBRE", pg."PEGE_PRIMERAPELLIDO",
                              pg."PEGE_SEGUNDOAPELLIDOS", ep."EMPL_CARGO", "EMPL_SUELDO", eep."ESEM_ID"
							  ORDER BY ep."EMPL_FECHAINGRESO" DESC
							 ) g
						GROUP BY "PEGE_ID", "EMPL_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "EMPL_CARGO", "EMPL_SUELDO", "EMPL_PUNTOS", "ESEM_ID"
					   ) e
				  WHERE "ESEM_ID" <>3
				) t
			ORDER BY  "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS"
		  ';
	
	 $this->aumentoDataProvider = NULL;
	 $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();	  
	 $this->aumentoDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'PEGE_ID', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','EMPL_CARGO', 'EMPL_SUELDO', 'EMPL_PUNTOS', 'ESEM_ID', 'AUMENTO', 'NETO',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>1000,
                         ),
      )
	 );
	}
	
	public function setAumentoPuntos($Cform,$valorPunto)
	{
	 $connection = Yii::app()->db;
     $puntos = $Cform->NOVE_UNIDADES;
     $aum =($Cform->NOVE_UNIDADES*$valorPunto);	 
	 $sql=' UPDATE 	"TBL_NOMEMPLEOSPLANTA" "ep"
            SET "EMPL_PUNTOS" = ta."EMPL_PUNTOS", "EMPL_SUELDO" = ta."EMPL_SUELDO"             
			FROM
            (
	        SELECT t.*
			FROM (
				  SELECT * 
				  FROM ( 
						SELECT * 
						FROM (
							  SELECT pg."PEGE_ID", ep."EMPL_ID", pg."PEGE_IDENTIFICACION", pg."PEGE_PRIMERNOMBRE", pg."PEGE_SEGUNDONOMBRE", pg."PEGE_PRIMERAPELLIDO", 
							  pg."PEGE_SEGUNDOAPELLIDOS", ep."EMPL_CARGO", round(("EMPL_PUNTOS"+('.$puntos.')),2) AS "EMPL_PUNTOS", SUM("EMPL_SUELDO"+'.$aum.') AS "EMPL_SUELDO", eep."ESEM_ID"
							  FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
							  WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = eep."EMPL_ID" AND ep."TICA_ID" = 2 
							  GROUP BY pg."PEGE_ID", ep."EMPL_ID", pg."PEGE_IDENTIFICACION", pg."PEGE_PRIMERNOMBRE", pg."PEGE_SEGUNDONOMBRE", pg."PEGE_PRIMERAPELLIDO",
                              pg."PEGE_SEGUNDOAPELLIDOS", ep."EMPL_CARGO", "EMPL_SUELDO", eep."ESEM_ID"
							  ORDER BY ep."EMPL_FECHAINGRESO" DESC
							 ) g
						GROUP BY "PEGE_ID", "EMPL_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "EMPL_CARGO", "EMPL_SUELDO", "EMPL_PUNTOS", "ESEM_ID"
					   ) e
				  WHERE "ESEM_ID" <>3
				) t
			ORDER BY  "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS"			
			) ta
			
            WHERE ep."EMPL_ID" = ta."EMPL_ID"
		  ';
	 $connection->createCommand($sql)->execute();	  
	}
	
	/**
	*establecer dias mensuales
	*/
	public function previewdiasmensual($Cform)
	{
	 $connection = Yii::app()->db; 
	 $sql=' 
	 SELECT "EMPL_ID", "PEGE_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "EMPL_DIASAPAGAR"
     FROM (SELECT pg.*, ep."EMPL_ID", ep."EMPL_DIASAPAGAR", (SELECT eep."ESEM_ID"
		     FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
		     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
		     ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
		     LIMIT 1 
		    ) AS "ESEM_ID", 
		    (SELECT  ep."TICA_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                    ) AS "TICA_ID", 
                    (SELECT  ep."UNID_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                     ) AS "UNID_ID" 
      FROM "TBL_NOMPERSONASGENERALES" "pg"  
      INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON pg."PEGE_ID" = ep."PEGE_ID" 						  
      GROUP BY pg."PEGE_ID", ep."EMPL_ID" ) s  
     WHERE "ESEM_ID" = 1
     ORDER BY "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE" 
		  ';
	
	 $this->unidadesmensualesDataProvider = NULL;
	 $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();	  
	 $this->unidadesmensualesDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'PEGE_ID', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','EMPL_DIASAPAGAR',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>1000,
                         ),
      )
	 );
	}
	
	/**
	*establecer unidades de prima semestral
	*/
	public function previewdiasprimasemestral($Cform)
	{
	 $connection = Yii::app()->db; 
	 $sql=' 
	 SELECT "NOPS_ID", "PEGE_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "NOPS_MESES"
     FROM (SELECT pg.*, nps."NOPS_ID", nps."NOPS_MESES", (SELECT eep."ESEM_ID"
		     FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
		     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
		     ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
		     LIMIT 1 
		    ) AS "ESEM_ID", 
		    (SELECT  ep."TICA_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                    ) AS "TICA_ID", 
                    (SELECT  ep."UNID_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                     ) AS "UNID_ID" 
      FROM "TBL_NOMPERSONASGENERALES" "pg"  
      INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON pg."PEGE_ID" = ep."PEGE_ID"
      INNER JOIN "TBL_NOMNOVEDADESPRIMASEMESTRAL" nps ON pg."PEGE_ID" = nps."PEGE_ID"  						  
      GROUP BY pg."PEGE_ID", ep."EMPL_ID", nps."NOPS_ID" ) s  
     WHERE "ESEM_ID" = 1
     ORDER BY "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE" 
		  ';
	
	 $this->unidadespsemestralDataProvider = NULL;
	 $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();	  
	 $this->unidadespsemestralDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'PEGE_ID', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','NOPS_MESES',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>1000,
                         ),
      )
	 );
	}
	
	/**
	*establecer unidades de prima de vacaciones
	*/
	public function previewdiasprimavacaciones($Cform)
	{
	 $connection = Yii::app()->db; 
	 $sql=' 
	 SELECT "NOPV_ID", "PEGE_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "NOPV_DIAS"
     FROM (SELECT pg.*, npv."NOPV_ID", npv."NOPV_DIAS", (SELECT eep."ESEM_ID"
		     FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
		     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
		     ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
		     LIMIT 1 
		    ) AS "ESEM_ID", 
		    (SELECT  ep."TICA_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                    ) AS "TICA_ID", 
                    (SELECT  ep."UNID_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                     ) AS "UNID_ID" 
      FROM "TBL_NOMPERSONASGENERALES" "pg"  
      INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON pg."PEGE_ID" = ep."PEGE_ID"
      INNER JOIN "TBL_NOMNOVEDADESPRIMAVACACIONES" npv ON pg."PEGE_ID" = npv."PEGE_ID"  						  
      GROUP BY pg."PEGE_ID", ep."EMPL_ID", npv."NOPV_ID" ) s  
     WHERE "ESEM_ID" = 1 AND "TICA_ID" = 2
     ORDER BY "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE" 
		  ';
	
	 $this->unidadespvacacionesDataProvider = NULL;
	 $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();	  
	 $this->unidadespvacacionesDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'PEGE_ID', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','NOPV_DIAS',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>1000,
                         ),
      )
	 );
	}
	
	/**
	*establecer unidades de prima de navidad
	*/
	public function previewdiasprimanavidad($Cform)
	{
	 $connection = Yii::app()->db;
	 $sql = ' ';
     if($Cform->NOVE_TIPOCARGO!=''){ $sql = ' AND "TICA_ID" = '.$Cform->NOVE_TIPOCARGO;}	 
	 $sql=' 
	 SELECT "NOPN_ID", "PEGE_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "NOPN_MESES"
     FROM (SELECT pg.*, npn."NOPN_ID", npn."NOPN_MESES", (SELECT eep."ESEM_ID"
		     FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
		     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
		     ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
		     LIMIT 1 
		    ) AS "ESEM_ID", 
		    (SELECT  ep."TICA_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                    ) AS "TICA_ID", 
                    (SELECT  ep."UNID_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                     ) AS "UNID_ID" 
      FROM "TBL_NOMPERSONASGENERALES" "pg"  
      INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON pg."PEGE_ID" = ep."PEGE_ID"
      INNER JOIN "TBL_NOMNOVEDADESPRIMANAVIDAD" npn ON pg."PEGE_ID" = npn."PEGE_ID"  						  
      GROUP BY pg."PEGE_ID", ep."EMPL_ID", npn."NOPN_ID" ) s  
     WHERE "ESEM_ID" = 1 
     ORDER BY "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE" 
		  ';
	
	 $this->unidadespnavidadDataProvider = NULL;
	 $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();	  
	 $this->unidadespnavidadDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'PEGE_ID', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','NOPN_MESES',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>1000,
                         ),
      )
	 );
	}
	
	/**
	*establecer unidades de vacaciones
	*/
	public function previewdiasvacaciones($Cform)
	{
	 $connection = Yii::app()->db; 
	 $sql=' 
	 SELECT "NOVA_ID", "PEGE_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "NOVA_DIAS"
     FROM (SELECT pg.*, nv."NOVA_ID", nv."NOVA_DIAS", (SELECT eep."ESEM_ID"
		     FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
		     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
		     ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
		     LIMIT 1 
		    ) AS "ESEM_ID", 
		    (SELECT  ep."TICA_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                    ) AS "TICA_ID", 
                    (SELECT  ep."UNID_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                     ) AS "UNID_ID" 
      FROM "TBL_NOMPERSONASGENERALES" "pg"  
      INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON pg."PEGE_ID" = ep."PEGE_ID"
      INNER JOIN "TBL_NOMNOVEDADESVACACIONES" nv ON pg."PEGE_ID" = nv."PEGE_ID"  						  
      GROUP BY pg."PEGE_ID", ep."EMPL_ID", nv."NOVA_ID" ) s  
     WHERE "ESEM_ID" = 1 
     ORDER BY "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE" 
		  ';
	
	 $this->unidadesvacacionesDataProvider = NULL;
	 $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();	  
	 $this->unidadesvacacionesDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'PEGE_ID', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','NOVA_DIAS',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>1000,
                         ),
      )
	 );
	}
	
	/**
	*establecer dias de retroacivos
	*/
	public function previewdiasretroactivos($Cform)
	{
	 $connection = Yii::app()->db; 
	 $sql=' 
	 SELECT "NORE_ID", "PEGE_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "NORE_DIAS"
     FROM (SELECT pg.*, nra."NORE_ID", nra."NORE_DIAS", (SELECT eep."ESEM_ID"
		     FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
		     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
		     ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
		     LIMIT 1 
		    ) AS "ESEM_ID", 
		    (SELECT  ep."TICA_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                    ) AS "TICA_ID", 
                    (SELECT  ep."UNID_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                     ) AS "UNID_ID" 
      FROM "TBL_NOMPERSONASGENERALES" "pg"  
      INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON pg."PEGE_ID" = ep."PEGE_ID"
      INNER JOIN "TBL_NOMNOVEDADESRETROACTIVO" nra ON pg."PEGE_ID" = nra."PEGE_ID"  						  
      GROUP BY pg."PEGE_ID", ep."EMPL_ID", nra."NORE_ID" ) s  
     WHERE "ESEM_ID" = 1
     ORDER BY "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE" 
		  ';
	
	 $this->unidadesretroactivosDataProvider = NULL;
	 $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();	  
	 $this->unidadesretroactivosDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'PEGE_ID', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','NORE_DIAS',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>1000,
                         ),
      )
	 );
	}
	
	
	/**
	*establecer dias para pago de nominas
	*/
	public function setUnidadesNomina($Cform)
	{
	 $connection = Yii::app()->db;
	 
	 /**
	 *dias para nomina mensual
	 */
	 if($Cform->NOVE_TIPONOMINA==01){
	 $str = '';
	 if($Cform->NOVE_TIPOCARGO!=''){ $str = ' AND "TICA_ID" = '.$Cform->NOVE_TIPOCARGO;}
	 $sql=' UPDATE 	"TBL_NOMEMPLEOSPLANTA" "ep"
            SET "EMPL_DIASAPAGAR" = '.$Cform->NOVE_UNIDADES.'             
			FROM
            (
	 SELECT "EMPL_ID", "PEGE_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "EMPL_DIASAPAGAR"
     FROM (SELECT pg.*, ep."EMPL_ID", ep."EMPL_DIASAPAGAR", (SELECT eep."ESEM_ID"
		     FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
		     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
		     ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
		     LIMIT 1 
		    ) AS "ESEM_ID", 
		    (SELECT  ep."TICA_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                    ) AS "TICA_ID", 
                    (SELECT  ep."UNID_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                     ) AS "UNID_ID" 
      FROM "TBL_NOMPERSONASGENERALES" "pg"  
      INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON pg."PEGE_ID" = ep."PEGE_ID" 						  
      GROUP BY pg."PEGE_ID", ep."EMPL_ID" ) s  
     WHERE "ESEM_ID" = 1 '.$str.'
     ORDER BY "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE"			
			) ta
			
            WHERE ep."EMPL_ID" = ta."EMPL_ID"
		  ';
	 }
	 
	 /**
	 *meses para prima semestral
	 */
	 if($Cform->NOVE_TIPONOMINA==02){
	 $str = '';
	 if($Cform->NOVE_TIPOCARGO!=''){ $str = ' AND "TICA_ID" = '.$Cform->NOVE_TIPOCARGO;}
	 $sql=' UPDATE 	"TBL_NOMNOVEDADESPRIMASEMESTRAL" "nps"
            SET "NOPS_MESES" = '.$Cform->NOVE_UNIDADES.'             
			FROM
            (
	 SELECT "NOPS_ID", "PEGE_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "NOPS_MESES"
     FROM (SELECT pg.*, nps."NOPS_ID", nps."NOPS_MESES", (SELECT eep."ESEM_ID"
		     FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
		     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
		     ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
		     LIMIT 1 
		    ) AS "ESEM_ID", 
		    (SELECT  ep."TICA_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                    ) AS "TICA_ID", 
                    (SELECT  ep."UNID_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                     ) AS "UNID_ID" 
      FROM "TBL_NOMPERSONASGENERALES" "pg"  
      INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON pg."PEGE_ID" = ep."PEGE_ID"
      INNER JOIN "TBL_NOMNOVEDADESPRIMASEMESTRAL" nps ON pg."PEGE_ID" = nps."PEGE_ID"  						  
      GROUP BY pg."PEGE_ID", ep."EMPL_ID", nps."NOPS_ID" ) s  
     WHERE "ESEM_ID" = 1 '.$str.'
     ORDER BY "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE"			
			) ta
			
            WHERE nps."NOPS_ID" = ta."NOPS_ID"
		  ';
	 }
	 
	 /**
	 *dias para prima de vacaciones
	 */
	 if($Cform->NOVE_TIPONOMINA==03){
	 $sql=' UPDATE 	"TBL_NOMNOVEDADESPRIMAVACACIONES" "npv"
            SET "NOPV_DIAS" = '.$Cform->NOVE_UNIDADES.'             
			FROM
            (
	 SELECT "NOPV_ID", "PEGE_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "NOPV_DIAS"
     FROM (SELECT pg.*, npv."NOPV_ID", npv."NOPV_DIAS", (SELECT eep."ESEM_ID"
		     FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
		     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
		     ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
		     LIMIT 1 
		    ) AS "ESEM_ID", 
		    (SELECT  ep."TICA_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                    ) AS "TICA_ID", 
                    (SELECT  ep."UNID_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                     ) AS "UNID_ID" 
      FROM "TBL_NOMPERSONASGENERALES" "pg"  
      INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON pg."PEGE_ID" = ep."PEGE_ID"
      INNER JOIN "TBL_NOMNOVEDADESPRIMAVACACIONES" npv ON pg."PEGE_ID" = npv."PEGE_ID"  						  
      GROUP BY pg."PEGE_ID", ep."EMPL_ID", npv."NOPV_ID" ) s  
      WHERE "ESEM_ID" = 1 AND "TICA_ID" = 2
      ORDER BY "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE"			
			) ta
			
            WHERE npv."NOPV_ID" = ta."NOPV_ID"
		  ';
	 }
	 
	 /**
	 *meses para prima de navidad
	 */
	 if($Cform->NOVE_TIPONOMINA==04){
	 $str = ' ';
     if($Cform->NOVE_TIPOCARGO!=''){ $str = ' AND "TICA_ID" = '.$Cform->NOVE_TIPOCARGO;}
	 $sql=' UPDATE 	"TBL_NOMNOVEDADESPRIMANAVIDAD" "npn"
            SET "NOPN_MESES" = '.$Cform->NOVE_UNIDADES.'             
			FROM
            (
	 SELECT "NOPN_ID", "PEGE_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "NOPN_MESES"
     FROM (SELECT pg.*, npn."NOPN_ID", npn."NOPN_MESES", (SELECT eep."ESEM_ID"
		     FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
		     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
		     ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
		     LIMIT 1 
		    ) AS "ESEM_ID", 
		    (SELECT  ep."TICA_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                    ) AS "TICA_ID", 
                    (SELECT  ep."UNID_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                     ) AS "UNID_ID" 
      FROM "TBL_NOMPERSONASGENERALES" "pg"  
      INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON pg."PEGE_ID" = ep."PEGE_ID"
      INNER JOIN "TBL_NOMNOVEDADESPRIMANAVIDAD" npn ON pg."PEGE_ID" = npn."PEGE_ID"  						  
      GROUP BY pg."PEGE_ID", ep."EMPL_ID", npn."NOPN_ID" ) s  
     WHERE "ESEM_ID" = 1 '.$str.'
     ORDER BY "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE"			
			) ta
			
            WHERE npn."NOPN_ID" = ta."NOPN_ID"
		  ';
	 }
	 
	 /**
	 *dias para prima de navidad
	 */
	 if($Cform->NOVE_TIPONOMINA==05){
	 $str = ' ';
     if($Cform->NOVE_TIPOCARGO!=''){ $str = ' AND "TICA_ID" = '.$Cform->NOVE_TIPOCARGO;}
	 $sql=' UPDATE 	"TBL_NOMNOVEDADESVACACIONES" "nv"
            SET "NOVA_DIAS" = '.$Cform->NOVE_UNIDADES.'             
			FROM
            (
	 SELECT "NOVA_ID", "PEGE_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "NOVA_DIAS"
     FROM (SELECT pg.*, nv."NOVA_ID", nv."NOVA_DIAS", (SELECT eep."ESEM_ID"
		     FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
		     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
		     ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
		     LIMIT 1 
		    ) AS "ESEM_ID", 
		    (SELECT  ep."TICA_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                    ) AS "TICA_ID", 
                    (SELECT  ep."UNID_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                     ) AS "UNID_ID" 
      FROM "TBL_NOMPERSONASGENERALES" "pg"  
      INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON pg."PEGE_ID" = ep."PEGE_ID"
      INNER JOIN "TBL_NOMNOVEDADESVACACIONES" nv ON pg."PEGE_ID" = nv."PEGE_ID"  						  
      GROUP BY pg."PEGE_ID", ep."EMPL_ID", nv."NOVA_ID" ) s  
     WHERE "ESEM_ID" = 1 '.$str.'
     ORDER BY "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE"			
			) ta
			
            WHERE nv."NOVA_ID" = ta."NOVA_ID"
		  ';
	 }
	 
	 /**
	 *dias para retroactivos
	 */
	 if($Cform->NOVE_TIPONOMINA==06){
	 $str = ' ';
     if($Cform->NOVE_TIPOCARGO!=''){ $str = ' AND "TICA_ID" = '.$Cform->NOVE_TIPOCARGO;}
	 $sql=' UPDATE 	"TBL_NOMNOVEDADESRETROACTIVO" "nra"
            SET "NORE_DIAS" = '.$Cform->NOVE_UNIDADES.'             
			FROM
            (
	 SELECT "NORE_ID", "PEGE_ID", "PEGE_IDENTIFICACION", "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE", "NORE_DIAS"
     FROM (SELECT pg.*, nra."NORE_ID", nra."NORE_DIAS", (SELECT eep."ESEM_ID"
		     FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
		     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
		     ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
		     LIMIT 1 
		    ) AS "ESEM_ID", 
		    (SELECT  ep."TICA_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                    ) AS "TICA_ID", 
                    (SELECT  ep."UNID_ID"
                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = pg."PEGE_ID"
                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                     LIMIT 1
                     ) AS "UNID_ID" 
      FROM "TBL_NOMPERSONASGENERALES" "pg"  
      INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON pg."PEGE_ID" = ep."PEGE_ID"
      INNER JOIN "TBL_NOMNOVEDADESRETROACTIVO" nra ON pg."PEGE_ID" = nra."PEGE_ID"  						  
      GROUP BY pg."PEGE_ID", ep."EMPL_ID", nra."NORE_ID" ) s  
     WHERE "ESEM_ID" = 1 '.$str.'
     ORDER BY "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE", "PEGE_SEGUNDONOMBRE" 		
			) ta
			
            WHERE nra."NORE_ID" = ta."NORE_ID"
		  ';
	 }
	 
	 
	 if($connection->createCommand($sql)->execute()){
	  return 'true';
	 }else{
	      return 'false';
		  }
	}
	
}










