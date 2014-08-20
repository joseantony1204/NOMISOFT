<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMCESANTIASNOMINA".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMCESANTIASNOMINA':
 * @Propiedad string $CENO_ID
 * @Propiedad string $CENO_PERIODO
 * @Propiedad string $CENO_FECHAPROCESO
 * @Propiedad boolean $CENO_ESTADO
 * @Propiedad integer $CENO_ANIO
 * @Propiedad string $CENO_FECHACAMBIO
 * @Propiedad integer $CENO_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad CESANTIASNOMINALIQUIDACIONES[] $cESANTIASNOMINALIQUIDACIONESs
 */
class Cesantiasnomina extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Cesantiasnomina la clase del modelo estàtico.
	 */
	public $codigo, $error; 
	public $CENO_DETALLES;
	public $liquidacion, $descuentos;
	public $devengados;
	public $success, $warning, $flag;
	public $s, $w, $f; 
	public $diascesantias, $valorestablecidos; 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMCESANTIASNOMINA';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('CENO_ID, CENO_PERIODO, CENO_FECHAPROCESO, CENO_ESTADO, CENO_ANIO, CENO_FECHACAMBIO, CENO_REGISTRADOPOR', 'required'),
			array('CENO_ANIO, CENO_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('CENO_PERIODO', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('CENO_ID, CENO_PERIODO, CENO_FECHAPROCESO, CENO_ESTADO, CENO_ANIO, CENO_FECHACAMBIO, CENO_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'cESANTIASNOMINALIQUIDACIONESs' => array(self::HAS_MANY, 'CESANTIASNOMINALIQUIDACIONES', 'CENO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'CENO_ID' => 'CODIGO',
						'CENO_PERIODO' => 'PERIODO',
						'CENO_FECHAPROCESO' => 'FECHA PROCESO',
						'CENO_ESTADO' => 'ESTADO',
						'CENO_ANIO' => 'AÑO',
						'CENO_FECHACAMBIO' => 'CENO FECHACAMBIO',
						'CENO_REGISTRADOPOR' => 'CENO REGISTRADOPOR',
						'CENO_DETALLES' => 'DETALLES',
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
		$sort = new CSort();
		$sort->defaultOrder = 't."CENO_ID" DESC';
		$sort->attributes = array(
			
			'CENO_ID'=>array(
				'asc'=>'t."CENO_ID"',
				'desc'=>'t."CENO_ID" desc',
			),
			
			'CENO_PERIODO'=>array(
				'asc'=>'t."CENO_PERIODO"',
				'desc'=>'t."CENO_PERIODO" desc',
			),
			
			'CENO_FECHAPROCESO'=>array(
				'asc'=>'t."CENO_FECHAPROCESO"',
				'desc'=>'t."CENO_FECHAPROCESO" desc',
			),
			
			'CENO_ESTADO'=>array(
				'asc'=>'t."CENO_ESTADO"',
				'desc'=>'t."CENO_ESTADO" desc',
			),
			
			'CENO_ANIO'=>array(
				'asc'=>'t."CENO_ANIO"',
				'desc'=>'t."CENO_ANIO" desc',
			),
		);

		$criteria=new CDbCriteria;

		$criteria->compare('CENO_ID',$this->CENO_ID,true);
		$criteria->compare('CENO_PERIODO',$this->CENO_PERIODO,true);
		$criteria->compare('CENO_FECHAPROCESO',$this->CENO_FECHAPROCESO,true);
		$criteria->compare('CENO_ESTADO',$this->CENO_ESTADO);
		$criteria->compare('CENO_ANIO',$this->CENO_ANIO);
		$criteria->compare('CENO_FECHACAMBIO',$this->CENO_FECHACAMBIO,true);
		$criteria->compare('CENO_REGISTRADOPOR',$this->CENO_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 50)
		));
	}
	
	public function getEstado()
	{
		if($this->CENO_ESTADO==0){
		 $imageUrl = 'spellcheck_error.png';
		}else{
		      $imageUrl = 'spellcheck.png';
			 }
        return Yii::app()->baseurl.'/images/nomina/'.$imageUrl;		
	}
	
	public function validarNomina($Cesantiasnomina){
	  $this->error = "";
	  $connection = Yii::app()->db;
	  
	  $sql = 'SELECT  "CENO_ID", "CENO_ESTADO" FROM "TBL_NOMCESANTIASNOMINA" cn ORDER BY  "CENO_ID" DESC LIMIT 1';
	  $rows = $connection->createCommand($sql)->queryRow();  
	  
      if (count($rows)>0){
	   if (($rows["CENO_ID"])==($Cesantiasnomina->CENO_ID)){
	     $this->error="Parece que ya se ha liquidado una nomina para este periodo : ".$Cesantiasnomina->CENO_PERIODO;
	    }
      }
     return $this->error;	  
	}
	
	public function liquidarNomina($Cesantiasnomina){
	 $connection = Yii::app()->db; 
	 $this->success = NULL; $this->warning = NULL; $this->flag = NULL;
	 $this->s = 0; $this->w = 0; $this->f = 0;
	 $Personasgenerales = new Personasgenerales;
	 $Parametrosglobales = new Parametrosglobales; 	 
     $this->valorestablecidos = $Parametrosglobales->getParametrosglobales(date("Y", strtotime($Cesantiasnomina->CENO_FECHAPROCESO)));
    
	/**
	 *consultar todos los empleados que fueron liquidados en el periodo que vienes el retroactivo
	 **/
	 $sql = 'SELECT pg."PEGE_ID" 
	         FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl
             WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID"  /*AND pg."PEGE_ID" = 1640*/ /*1420 2990 1130 1580*/
             GROUP BY pg."PEGE_ID"
             ORDER BY pg."PEGE_ID" ASC';	
	 $personas = $connection->createCommand($sql)->queryAll();	
	 /**
	 *Se empieza a recorrer el array para ir liquidando cada registro encontrado
	 **/	 
	 $iterador = 1;
	 $this->codigo = 1;
	 
	 foreach($personas AS $persona){	  
	  $Personasgenerales->loadPersonageneral($persona["PEGE_ID"]);
	  $sw = 0;
	 // echo $Personasgenerales->Estadoempleoplanta->ESEP_ID.' '.$Personasgenerales->Estadoempleoplanta->ESEM_ID.' '.$Personasgenerales->Empleoplanta->EMPL_ID."<br>";
	  if($Personasgenerales->Estadoempleoplanta->ESEM_ID!=1){
	   $sw = 1;
	   if(((date("Y", strtotime($Personasgenerales->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("Y", strtotime($Cesantiasnomina->CENO_FECHAPROCESO)))) &
	     ((date("m", strtotime($Personasgenerales->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("m", strtotime($Cesantiasnomina->CENO_FECHAPROCESO))))){
	     $sw = 0; 			 
	   }
	  }
	  
	   /*si todo esta bn se procede a calcular la nomina para la persona*/
	  if(($sw==0) & ($Personasgenerales->Tipocargo->TICA_ID!=3) & ($Personasgenerales->Personageneral->CESA_ID!=1) & ($Personasgenerales->Personageneral->CESA_ID!=999)){
	   $this->getnovedades($Personasgenerales); 
	   $basico = round($this->getSueldoBasico($Personasgenerales,$Cesantiasnomina));
	   
	   $prantiguedad = $this->getPrimaAntiguedad($Personasgenerales,$Cesantiasnomina);
	   $prantiguedad[1];
       $subTransporte = round($this->getSubTransporte($Personasgenerales,$Cesantiasnomina));
       $prAlimenta = round($this->getSubAlimentacion($Personasgenerales,$Cesantiasnomina));        
	   
	   $primatec = round($this->getPrimaTecnica($Personasgenerales,$Cesantiasnomina));
	   $gastosrp = round($this->getGastosRepresentacion($Personasgenerales,$Cesantiasnomina));
	   
	   $bonserv = round($this->getBonServiciosPrestados($Personasgenerales,$Cesantiasnomina));
	   $horasextras = round($this->getHorasExtras($Personasgenerales,$Cesantiasnomina));
	   $primasemestral = round($this->getPrimaSemestral($Personasgenerales,$Cesantiasnomina));
	   $primavacaciones = round($this->getPrimaVacaciones($Personasgenerales,$Cesantiasnomina));
	   $primanavidad = round($this->getPrimaNavidad($Personasgenerales,$Cesantiasnomina));
	   
	   
	   $tdevengado=round($basico)+round($subTransporte)+round($prAlimenta)+round($primatec)+round($gastosrp)+round($prantiguedad[1])+round($bonserv)+round($primasemestral)+round($primavacaciones)+round($primanavidad)+round($horasextras);
	   $this->devengados[$iterador] = array($basico,round($prantiguedad[1]),$subTransporte,$prAlimenta,$primatec,$gastosrp,$bonserv,$horasextras,$primasemestral,$primavacaciones,$primanavidad,$tdevengado);
	   
	   
	   $this->setLiquidacion($Personasgenerales,$Cesantiasnomina,$this->devengados[$iterador]);
       $this->codigo = $this->codigo+1;	   
       $iterador = $iterador+1;
	  }
	 }	 
	}
	
	public	function getPrimaNavidad($Personasgenerales,$Cesantiasnomina){
	 $connection = Yii::app()->db;
     $query = 'SELECT (nnl."NANL_SALARIO"+nnl."NANL_PRIMAANTIGUEDAD"+nnl."NANL_TRANSPORTE"+nnl."NANL_ALIMENTACION"+nnl."NANL_PRIMATECNICA"+
	                   nnl."NANL_GASTOSRP"+nnl."NANL_BONIFICACION"+nnl."NANL_SEMESTRAL"+nnl."NANL_PRIMAVACACIONES") AS "NANL_DEVENGADO"
			   FROM "TBL_NOMNAVIDADNOMINALIQUIDACIONES" nnl, "TBL_NOMNAVIDADNOMINA" nn,  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" "p"
			   WHERE nn."NANO_ID" = nnl."NANO_ID" AND nnl."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID" 
			   AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
               AND nn."NANO_ANIO" = '.$Cesantiasnomina->CENO_ANIO.'
			  ';
	 $primanavidad = $connection->createCommand($query)->queryScalar();
     $valor = $primanavidad/12;
	 $valor = round($valor/360*$this->diascesantias);
	 return $valor;		
    }
	
	public	function getHorasExtras($Personasgenerales,$Cesantiasnomina){
	 $connection = Yii::app()->db;
     $query = 'SELECT SUM(mnl."MENL_HEDTOTAL"+mnl."MENL_HENTOTAL"+mnl."MENL_HEDFTOTAL"+mnl."MENL_HENFTOTAL"+mnl."MENL_DYFTOTAL"+
	                      mnl."MENL_RENTOTAL"+mnl."MENL_RENDYFTOTAL") AS "HORASEXTRAS"
               FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl"
		        INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID"
		        INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"		  
		        INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		      WHERE mn."MENO_ANIO" = '.$Cesantiasnomina->CENO_ANIO.' AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'		  
			  ';
	 $horasesxtras = $connection->createCommand($query)->queryScalar();
     $valor = $horasesxtras/12;
	 $valor = round($valor/360*$this->diascesantias);
	 return $valor;		
    }
	
	public	function getPrimaSemestral($Personasgenerales,$Cesantiasnomina){
	 $connection = Yii::app()->db;
     $query = 'SELECT (snl."SENL_SALARIO"+snl."SENL_PRIMAANTIGUEDAD"+snl."SENL_TRANSPORTE"+snl."SENL_ALIMENTACION"+snl."SENL_PRIMATECNICA"+
	                   snl."SENL_GASTOSRP"+snl."SENL_BONIFICACION") AS "SENL_DEVENGADO"
			  FROM "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" snl, "TBL_NOMSEMESTRALNOMINA" sn,  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" "p"
			  WHERE sn."SENO_ID" = snl."SENO_ID" AND snl."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID" 
			  AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
              AND sn."SENO_ANIO" = '.$Cesantiasnomina->CENO_ANIO.'		  
			  ';
	 $primasemestral = $connection->createCommand($query)->queryScalar();
     $valor = $primasemestral/12;
	 $valor = round($valor/360*$this->diascesantias);
	 return $valor;		
    }
	
	public	function getPrimaVacaciones($Personasgenerales,$Cesantiasnomina){
	 $connection = Yii::app()->db;
     $query = ' SELECT SUM("PRIMAVACACIONES") AS "PRIMAVACACIONES" FROM (
	  SELECT rnl."RANL_PRIMAVACACIONES" AS "PRIMAVACACIONES"
	  FROM "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" "rnl"
	       INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON mnl."MENL_ID" = rnl."MENL_ID"
		   INNER JOIN "TBL_NOMRETROACTIVOSNOMINA" "rn" ON rnl."RANO_ID" = rn."RANO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"	  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	  WHERE rn."RANO_ID" = '.$Cesantiasnomina->CENO_ANIO.' AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.' 
	  
	  UNION ALL
      
	  SELECT SUM("MENL_PRIMAVACACIONES") AS "PRIMAVACACIONES"
      FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl"
		   INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE mn."MENO_ANIO" = '.$Cesantiasnomina->CENO_ANIO.' AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.' 
		   
	  UNION ALL
      
	  SELECT(pvnl."PVNL_SALARIO"+pvnl."PVNL_PRIMAANTIGUEDAD"+pvnl."PVNL_TRANSPORTE"+pvnl."PVNL_ALIMENTACION"+pvnl."PVNL_PRIMATECNICA"+
	         pvnl."PVNL_GASTOSRP"+pvnl."PVNL_BONIFICACION"+pvnl."PVNL_SEMESTRAL") AS "PRIMAVACACIONES"					   
      FROM "TBL_NOMPRIMAVACACIONESNOMINALIQUIDACIONES" "pvnl"
		   INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINA" "pvn" ON pvnl."PVNO_ID" = pvn."PVNO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON pvnl."EMPL_ID" = ep."EMPL_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE pvn."PVNO_ANIO" = '.$Cesantiasnomina->CENO_ANIO.' AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.' 	  
	  ) t
	  ';
	 $primavacaciones = $connection->createCommand($query)->queryScalar();
     $valor = $primavacaciones/12;
	 $valor = round($valor/360*$this->diascesantias);
	 return $valor;		
    }
	
	private	function getBonServiciosPrestados($Personasgenerales,$Cesantiasnomina){
	 $connection = Yii::app()->db; 
	 $fecha = $Personasgenerales->Personageneral->PEGE_FECHAINGRESO;
	 
	 /* 001. inicio verificar si el empleado no es docente ocacional */ 
	 if($Personasgenerales->Tipocargo->TICA_ID!=3){		 
	  /* 01. inicio verificar si tiene BSP*/  
	  if ($Personasgenerales->Factorsalarial->FASA_BSP==1){
		$sql ='SELECT ROUND(SUM("BONIFICACION")/12)
			   FROM ( 
				     SELECT SUM("RANL_BONIFICACION") AS "BONIFICACION" 
					 FROM  "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMRETROACTIVOSNOMINA" rn, "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" rnl
					 WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND rn."RANO_ID" = rnl."RANO_ID" 
					 AND mnl."MENL_ID" = rnl."MENL_ID" AND pg."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
					 AND rn."RANO_ID" = '.$Cesantiasnomina->CENO_ANIO.'
					 UNION ALL
					 SELECT SUM("MENL_BONIFICACION") AS "BONIFICACION" 
					 FROM  "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn
					 WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" 
					 AND pg."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
					 AND mn."MENO_ID" >= '.$Cesantiasnomina->CENO_ANIO.'0101 AND mn."MENO_ID" <= '.$Cesantiasnomina->CENO_ANIO.'1201
					  ) t
			   ';
		$bonificacion = $connection->createCommand($sql)->queryScalar();
		return round($bonificacion/360*$this->diascesantias);	           
	  }else{
	         return 0; 
	       }
	 }else{
	        return 0; 
	      }
	}
	
	public	function getPrimaAntiguedad($Personasgenerales,$Cesantiasnomina){
	 $dia=date(j);
	 $mes=date(n);
	 $ano=date(Y);
	 $fecha = $Personasgenerales->Personageneral->PEGE_FECHAINGRESO;
	 //fecha de nacimiento
	 $dianaz=date("j", strtotime($Personasgenerales->Personageneral->PEGE_FECHAINGRESO));
	 $mesnaz=date("n", strtotime($Personasgenerales->Personageneral->PEGE_FECHAINGRESO));
	 $anonaz=date("Y", strtotime($Personasgenerales->Personageneral->PEGE_FECHAINGRESO));
	
	 //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
	 if (($mesnaz == $mes) && ($dianaz > $dia)) {
	   $ano=($ano-1); 
	  }
	  //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
	  if ($mesnaz > $mes) {
		$ano=($ano-1);
	  }
		//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
		$edad=($ano-$anonaz);
		$antiguedad[0]=0;
		$antiguedad[1]=0;
		if ($fecha > date("Y/m/d",strtotime("1966/12/30")) and $fecha < date("Y/m/d",strtotime("1997/08/11"))){
		 $factor=0;
		 if($edad>=2 and $edad<4)
		  $factor=0.05;
			if($edad>=4 and $edad<6)
			 $factor=0.1;
			  if($edad>=6 and $edad<8)
				$factor=0.15;
				if($edad>=8 and $edad<10)
				 $factor=0.20;
				  if($edad>=10)
					$factor=0.25;				
					
					$antiguedad[0]=round(($Personasgenerales->Empleoplanta->EMPL_SUELDO)*$factor);
					$antiguedad[1]=round((($Personasgenerales->Empleoplanta->EMPL_SUELDO)*($this->diascesantias)*$factor/360));
		}

	  return $antiguedad;	
	}
	
	public	function getPrimaTecnica($Personasgenerales,$Cesantiasnomina){
			$sueldo = ($Personasgenerales->Empleoplanta->EMPL_SUELDO)*(($this->diascesantias)/360);
			$valor=($sueldo)*($Personasgenerales->Primatecnica->PRTE_PORCENTAJE/100);			
			return ($valor);
	}
		
	public	function getGastosRepresentacion($Personasgenerales,$Cesantiasnomina){
			$sueldo = ($Personasgenerales->Empleoplanta->EMPL_SUELDO)*(($this->diascesantias)/360);
			$valor=($sueldo)*($Personasgenerales->Gastorepresentacion->GARE_PORCENTAJE/100);			
			return ($valor);
	}
	
	public	function getSubTransporte($Personasgenerales,$Cesantiasnomina){
	 if($Personasgenerales->Factorsalarial->FASA_SUBTRANSPORTE==1){
	  if(($Personasgenerales->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[4][3]) && ($Personasgenerales->Tipocargo->TICA_ID==1)){
		return ($this->valorestablecidos[5][3]*($this->diascesantias)/360);
	   }
	 }
	 return 0;
	}
		
	public	function getSubAlimentacion($Personasgenerales,$Cesantiasnomina){
	 if($Personasgenerales->Factorsalarial->FASA_SUBALIMIENTACION==1){
	  if(($Personasgenerales->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[2][3]) && ($Personasgenerales->Tipocargo->TICA_ID==1)){
		return ($this->valorestablecidos[3][3]*($this->diascesantias)/360);
	  }
	 }
	 return 0;
	}
	
	private function getSueldoBasico($Personasgenerales,$Cesantiasnomina){
			$sueldo = ($Personasgenerales->Empleoplanta->EMPL_SUELDO)*(($this->diascesantias)/360);
		return ($sueldo);
    }
	
	private function getnovedades($Personasgenerales){
	 $connection = Yii::app()->db;
	 $this->diascesantias = NULL;	 
	 /**
	 *Consulta los meses que se le liquidaran al empleado desde la tabla  TBL_NOMNOVEDADESCESANTIAS
	 **/
	  $sql = 'SELECT "NOCE_ID"
                       FROM "TBL_NOMNOVEDADESCESANTIAS" nc 
                       WHERE nc."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
	         ';
	  $primarykey = $connection->createCommand($sql)->queryScalar();
	  $Novedadescesantias = Novedadescesantias::model()->findByPk($primarykey);	 
	  
	  if($Novedadescesantias->NOCE_DIAS>=360){
	   $dias = 360;
	  }else{
	        $dias = $Novedadescesantias->NOCE_DIAS;
		   }	   
     $this->diascesantias = $dias; 
	}
	
	private function setLiquidacion($Personasgenerales,$Cesantiasnomina,$devengados){
	     $connection = Yii::app()->db;
		 $Cesantiasnominaliquidaciones = new Cesantiasnominaliquidaciones;
$this->devengados[$iterador] = array($basico,round($prantiguedad[1]),$subTransporte,$prAlimenta,$primatec,$gastosrp,$bonserv,$horasextras,$primasemestral,$primavacaciones,$primanavidad,$tdevengado);
	   		 
		 $Cesantiasnominaliquidaciones->CENL_CODIGO = $this->codigo;
         $Cesantiasnominaliquidaciones->CENL_DIAS = $this->diascesantias;
         $Cesantiasnominaliquidaciones->CENL_PUNTOS = $Personasgenerales->Empleoplanta->EMPL_PUNTOS;
         $Cesantiasnominaliquidaciones->CENL_SUELDO = $Personasgenerales->Empleoplanta->EMPL_SUELDO;
         $Cesantiasnominaliquidaciones->CENL_SALARIO = $devengados[0];
         $Cesantiasnominaliquidaciones->CENL_PRIMAANTIGUEDAD = $devengados[1];
         $Cesantiasnominaliquidaciones->CENL_TRANSPORTE = $devengados[2];
         $Cesantiasnominaliquidaciones->CENL_ALIMENTACION = $devengados[3];
         $Cesantiasnominaliquidaciones->CENL_PRIMATECNICA = $devengados[4];
         $Cesantiasnominaliquidaciones->CENL_GASTOSRP = $devengados[5];
         $Cesantiasnominaliquidaciones->CENL_BONIFICACION = $devengados[6];
         $Cesantiasnominaliquidaciones->CENL_HORASEXTRAS = $devengados[7];
         $Cesantiasnominaliquidaciones->CENL_SEMESTRAL = $devengados[8];
         $Cesantiasnominaliquidaciones->CENL_PRIMAVACACIONES = $devengados[9];
         $Cesantiasnominaliquidaciones->CENL_PRIMANAVIDAD = $devengados[10];
         $Cesantiasnominaliquidaciones->CENO_ID = $Cesantiasnomina->CENO_ID; 
         $Cesantiasnominaliquidaciones->EMPL_ID = $Personasgenerales->Empleoplanta->EMPL_ID;
         $Cesantiasnominaliquidaciones->CENL_FECHACAMBIO = date('Y-m-d H:i:s');
         $Cesantiasnominaliquidaciones->CENL_REGISTRADOPOR = Yii::app()->user->id;
 
		 if($Cesantiasnominaliquidaciones->save()){
		  
		  /**
		  *verificar que los valores de las liquidacion 
		  *de los empleados nos sean negativos o contengan algun error
		  */
		  if($devengados[11]<(0)){
		    $this->w+=1;
	  	    $this->warning[$this->w-1][0] = $Personasgenerales->Personageneral->PEGE_IDENTIFICACION;
		    $this->warning[$this->w-1][1] = $Personasgenerales->Empleoplanta->EMPL_CARGO;
		    $this->warning[$this->w-1][2] = $Personasgenerales->Personageneral->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->Personageneral->PEGE_PRIMERAPELLIDO;
		    $this->warning[$this->w-1][3] = $devengados[11];
		    $this->warning[$this->w-1][4] = (0);
		  }else{
		        $this->s+=1; 
				$this->success[$this->s-1][0] = $Personasgenerales->Personageneral->PEGE_IDENTIFICACION;
		        $this->success[$this->s-1][1] = $Personasgenerales->Empleoplanta->EMPL_CARGO;
		       }			   
		 }else{ 
		        $msg = print_r($Cesantiasnominaliquidaciones->getErrors(),1);
                throw new CHttpException(400,'data not saving: '.$msg );
			    $this->f+=1;
	  	        $this->flag[$this->f-1][0] = $Personasgenerales->Personageneral->PEGE_IDENTIFICACION;
		        $this->flag[$this->f-1][1] = $Personasgenerales->Empleoplanta->EMPL_CARGO;
		        $this->flag[$this->f-1][2] = $Personasgenerales->Personageneral->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->Personageneral->PEGE_PRIMERAPELLIDO;
		        $this->flag[$this->f-1][3] = $Cesantiasnominaliquidaciones->getErrors();
		      }	
    }
}