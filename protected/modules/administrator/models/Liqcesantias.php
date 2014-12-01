<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_LIQCESANTIAS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_LIQCESANTIAS':
 * @Propiedad string $LICE_ID
 * @Propiedad integer $LICE_DIAS
 * @Propiedad string $LICE_PUNTOS
 * @Propiedad integer $LICE_SUELDO
 * @Propiedad integer $LICE_SALARIO
 * @Propiedad integer $LICE_PRIMAANTIGUEDAD
 * @Propiedad integer $LICE_TRANSPORTE
 * @Propiedad integer $LICE_ALIMENTACION
 * @Propiedad integer $LICE_PRIMATECNICA
 * @Propiedad integer $LICE_GASTOSRP
 * @Propiedad integer $LICE_BONIFICACION
 * @Propiedad integer $LICE_SEMESTRAL
 * @Propiedad integer $LICE_PRIMAVACACIONES
 * @Propiedad integer $LICE_PRIMANAVIDAD
 * @Propiedad integer $LIQU_ID
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $LICE_FECHACAMBIO
 * @Propiedad integer $LICE_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad LIQUIDACIONES $lIQU
 */
class Liqcesantias extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Liqcesantias la clase del modelo estàtico.
	 */
	public $diascesantias, $valorestablecidos;
	public $liquidacion;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_LIQCESANTIAS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('LICE_DIAS, LICE_PUNTOS, LICE_SUELDO, LICE_SALARIO, LICE_PRIMAANTIGUEDAD, LICE_TRANSPORTE, LICE_ALIMENTACION, LICE_PRIMATECNICA, LICE_GASTOSRP, LICE_BONIFICACION, LICE_SEMESTRAL, LICE_PRIMAVACACIONES, LICE_PRIMANAVIDAD, LIQU_ID, EMPL_ID, LICE_FECHACAMBIO, LICE_REGISTRADOPOR', 'required'),
			array('LICE_DIAS, LICE_SUELDO, LICE_SALARIO, LICE_PRIMAANTIGUEDAD, LICE_TRANSPORTE, LICE_ALIMENTACION, LICE_PRIMATECNICA, LICE_GASTOSRP, LICE_BONIFICACION, LICE_SEMESTRAL, LICE_PRIMAVACACIONES, LICE_PRIMANAVIDAD, LIQU_ID, EMPL_ID, LICE_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('LICE_ID, LICE_DIAS, LICE_PUNTOS, LICE_SUELDO, LICE_SALARIO, LICE_PRIMAANTIGUEDAD, LICE_TRANSPORTE, LICE_ALIMENTACION, LICE_PRIMATECNICA, LICE_GASTOSRP, LICE_BONIFICACION, LICE_SEMESTRAL, LICE_PRIMAVACACIONES, LICE_PRIMANAVIDAD, LIQU_ID, EMPL_ID, LICE_FECHACAMBIO, LICE_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'lIQU' => array(self::BELONGS_TO, 'LIQUIDACIONES', 'LIQU_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'LICE_ID' => 'LICE',
						'LICE_DIAS' => 'LICE DIAS',
						'LICE_PUNTOS' => 'LICE PUNTOS',
						'LICE_SUELDO' => 'LICE SUELDO',
						'LICE_SALARIO' => 'LICE SALARIO',
						'LICE_PRIMAANTIGUEDAD' => 'LICE PRIMAANTIGUEDAD',
						'LICE_TRANSPORTE' => 'LICE TRANSPORTE',
						'LICE_ALIMENTACION' => 'LICE ALIMENTACION',
						'LICE_PRIMATECNICA' => 'LICE PRIMATECNICA',
						'LICE_GASTOSRP' => 'LICE GASTOSRP',
						'LICE_BONIFICACION' => 'LICE BONIFICACION',
						'LICE_SEMESTRAL' => 'LICE SEMESTRAL',
						'LICE_PRIMAVACACIONES' => 'LICE PRIMAVACACIONES',
						'LICE_PRIMANAVIDAD' => 'LICE PRIMANAVIDAD',
						'LIQU_ID' => 'LIQU',
						'EMPL_ID' => 'EMPL',
						'LICE_FECHACAMBIO' => 'LICE FECHACAMBIO',
						'LICE_REGISTRADOPOR' => 'LICE REGISTRADOPOR',
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

		$criteria->compare('LICE_ID',$this->LICE_ID,true);
		$criteria->compare('LICE_DIAS',$this->LICE_DIAS);
		$criteria->compare('LICE_PUNTOS',$this->LICE_PUNTOS,true);
		$criteria->compare('LICE_SUELDO',$this->LICE_SUELDO);
		$criteria->compare('LICE_SALARIO',$this->LICE_SALARIO);
		$criteria->compare('LICE_PRIMAANTIGUEDAD',$this->LICE_PRIMAANTIGUEDAD);
		$criteria->compare('LICE_TRANSPORTE',$this->LICE_TRANSPORTE);
		$criteria->compare('LICE_ALIMENTACION',$this->LICE_ALIMENTACION);
		$criteria->compare('LICE_PRIMATECNICA',$this->LICE_PRIMATECNICA);
		$criteria->compare('LICE_GASTOSRP',$this->LICE_GASTOSRP);
		$criteria->compare('LICE_BONIFICACION',$this->LICE_BONIFICACION);
		$criteria->compare('LICE_SEMESTRAL',$this->LICE_SEMESTRAL);
		$criteria->compare('LICE_PRIMAVACACIONES',$this->LICE_PRIMAVACACIONES);
		$criteria->compare('LICE_PRIMANAVIDAD',$this->LICE_PRIMANAVIDAD);
		$criteria->compare('LIQU_ID',$this->LIQU_ID);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('LICE_FECHACAMBIO',$this->LICE_FECHACAMBIO,true);
		$criteria->compare('LICE_REGISTRADOPOR',$this->LICE_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getCesantias($Personasgeneral,$Liquidaciones)
	{
	 $Parametrosglobales = new Parametrosglobales; 	 
     $this->valorestablecidos = $Parametrosglobales->getParametrosglobales(date("Y", strtotime($Liquidaciones->LIQU_FECHAPROCESO)));
	
	 /**
	 *obtener los meses con los cuales se le hara la liquidacion
	 */
	 $this->getNovedades($Personasgeneral,$Liquidaciones);
	 
	 /**
	 *obtener liquidacion de factores
	 */
	 $basico = round($this->getSueldoBasico($Personasgeneral,$Liquidaciones));
	 $prantiguedad = $this->getPrimaAntiguedad($Personasgeneral,$Liquidaciones);
	 //echo $prantiguedad[1];
	 $subTransporte = round($this->getSubTransporte($Personasgeneral,$Liquidaciones));
	 $subAlimentacion = round($this->getSubAlimentacion($Personasgeneral,$Liquidaciones));
	 
	 $primatec = round($this->getPrimaTecnica($Personasgeneral,$Liquidaciones));
	 $gastosrp = round($this->getGastosRepresentacion($Personasgeneral,$Liquidaciones));	   
	 
	 $bonserv = round($this->getBonServiciosPrestados($Personasgeneral,$Liquidaciones));
	 
	 $primasemestral = round($this->getPrimaSemestral($Personasgeneral,$Liquidaciones));
     $primavacaciones = round($this->getPrimaVacaciones($Personasgeneral,$Liquidaciones));
     $primanavidad = round($this->getPrimaNavidad($Personasgeneral,$Liquidaciones));	 
	 
	 $tdevengado=round($basico)+round($subTransporte)+round($subAlimentacion)+round($primatec)+round($gastosrp)+round($prantiguedad[1])+round($bonserv)+round($primasemestral)+round($primavacaciones)+round($primanavidad);
	 $devengados = array($basico,round($prantiguedad[1]),$subTransporte,$subAlimentacion,$primatec,$gastosrp,$bonserv,$primasemestral,$primavacaciones,$primanavidad,$tdevengado);
	 /**
	 *Guardar la liquidacion
	 */
	 $this->setLiquidacion($Personasgeneral,$Liquidaciones,$devengados);
	 
	 
	}
	
	public	function getPrimaNavidad($Personasgeneral,$Liquidaciones){
	 $connection = Yii::app()->db;
     $query = 'SELECT (nnl."NANL_SALARIO"+nnl."NANL_PRIMAANTIGUEDAD"+nnl."NANL_TRANSPORTE"+nnl."NANL_ALIMENTACION"+nnl."NANL_PRIMATECNICA"+
	                   nnl."NANL_GASTOSRP"+nnl."NANL_BONIFICACION"+nnl."NANL_SEMESTRAL"+nnl."NANL_PRIMAVACACIONES") AS "NANL_DEVENGADO"
			   FROM "TBL_NOMNAVIDADNOMINALIQUIDACIONES" nnl, "TBL_NOMNAVIDADNOMINA" nn,  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" "p"
			   WHERE nn."NANO_ID" = nnl."NANO_ID" AND nnl."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID" 
			   AND p."PEGE_ID" = '.$Personasgeneral->Personageneral->PEGE_ID.'
               AND nn."NANO_ANIO" = '.$Liquidaciones->LIQU_ANIO.'
			  ';
	 $primanavidad = $connection->createCommand($query)->queryScalar();
     $valor = $primanavidad/12;
	 $valor = round($valor/360*$this->diascesantias);
	 return $valor;		
    }
	
	public	function getPrimaAntiguedad($Personasgeneral,$Liquidaciones){
	 $dia=date(j);
	 $mes=date(n);
	 $ano=date(Y);
	 $fecha = $Personasgeneral->Personageneral->PEGE_FECHAINGRESO;
	 //fecha de nacimiento
	 $dianaz=date("j", strtotime($Personasgeneral->Personageneral->PEGE_FECHAINGRESO));
	 $mesnaz=date("n", strtotime($Personasgeneral->Personageneral->PEGE_FECHAINGRESO));
	 $anonaz=date("Y", strtotime($Personasgeneral->Personageneral->PEGE_FECHAINGRESO));
	
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
					
					$antiguedad[0]=round(($Personasgeneral->Empleoplanta->EMPL_SUELDO)*$factor);
					$antiguedad[1]=round((($Personasgeneral->Empleoplanta->EMPL_SUELDO)*($this->diascesantias)*$factor/360));
		}

	  return $antiguedad;	
	}
	
	private function getSueldoBasico($Personasgeneral,$Liquidaciones){
			$sueldo = ($Personasgeneral->Empleoplanta->EMPL_SUELDO)*(($this->diascesantias)/360);
		return ($sueldo);
    }
	
	public	function getSubTransporte($Personasgeneral,$Liquidaciones){
	 if($Personasgeneral->Factorsalarial->FASA_SUBTRANSPORTE==1){
	  if(($Personasgeneral->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[4][3]) && ($Personasgeneral->Tipocargo->TICA_ID==1)){
		return ($this->valorestablecidos[5][3]*($this->diascesantias)/360);
	   }
	 }
	 return 0;
	}
		
	public	function getSubAlimentacion($Personasgeneral,$Liquidaciones){
	 if($Personasgeneral->Factorsalarial->FASA_SUBALIMIENTACION==1){
	  if(($Personasgeneral->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[2][3]) && ($Personasgeneral->Tipocargo->TICA_ID==1)){
		return ($this->valorestablecidos[3][3]*($this->diascesantias)/360);
	  }
	 }
	 return 0;
	}
	
	public	function getPrimaTecnica($Personasgeneral,$Liquidaciones){
			$sueldo = ($Personasgeneral->Empleoplanta->EMPL_SUELDO)*(($this->diascesantias)/360);
			$valor=($sueldo)*($Personasgeneral->Primatecnica->PRTE_PORCENTAJE/100);			
			return ($valor);
	}
		
	public	function getGastosRepresentacion($Personasgeneral,$Liquidaciones){
			$sueldo = ($Personasgeneral->Empleoplanta->EMPL_SUELDO)*(($this->diascesantias)/360);
			$valor=($sueldo)*($Personasgeneral->Gastorepresentacion->GARE_PORCENTAJE/100);			
			return ($valor);
	}
	
	public	function getPrimaVacaciones($Personasgeneral,$Liquidaciones){
	 $connection = Yii::app()->db;
     $query = ' SELECT SUM("PRIMAVACACIONES") AS "PRIMAVACACIONES" FROM (
	  SELECT rnl."RANL_PRIMAVACACIONES" AS "PRIMAVACACIONES"
	  FROM "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" "rnl"
	       INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON mnl."MENL_ID" = rnl."MENL_ID"
		   INNER JOIN "TBL_NOMRETROACTIVOSNOMINA" "rn" ON rnl."RANO_ID" = rn."RANO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"	  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	  WHERE rn."RANO_ID" = '.$Liquidaciones->LIQU_ANIO.' AND p."PEGE_ID" = '.$Personasgeneral->Personageneral->PEGE_ID.' 
	  
	  UNION ALL
      
	  SELECT SUM("MENL_PRIMAVACACIONES") AS "PRIMAVACACIONES"
      FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl"
		   INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE mn."MENO_ANIO" = '.$Liquidaciones->LIQU_ANIO.' AND p."PEGE_ID" = '.$Personasgeneral->Personageneral->PEGE_ID.' 
		   
	  UNION ALL
      
	  SELECT(pvnl."PVNL_SALARIO"+pvnl."PVNL_PRIMAANTIGUEDAD"+pvnl."PVNL_TRANSPORTE"+pvnl."PVNL_ALIMENTACION"+pvnl."PVNL_PRIMATECNICA"+
	         pvnl."PVNL_GASTOSRP"+pvnl."PVNL_BONIFICACION"+pvnl."PVNL_SEMESTRAL") AS "PRIMAVACACIONES"					   
      FROM "TBL_NOMPRIMAVACACIONESNOMINALIQUIDACIONES" "pvnl"
		   INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINA" "pvn" ON pvnl."PVNO_ID" = pvn."PVNO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON pvnl."EMPL_ID" = ep."EMPL_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE pvn."PVNO_ANIO" = '.$Liquidaciones->LIQU_ANIO.' AND p."PEGE_ID" = '.$Personasgeneral->Personageneral->PEGE_ID.' 	  
	  ) t
	  ';
	 $primavacaciones = $connection->createCommand($query)->queryScalar();
     $valor = $primavacaciones/12;
	 $valor = round($valor/360*$this->diascesantias);
	 return $valor;		
    }
	
	public	function getPrimaSemestral($Personasgeneral,$Liquidaciones){
	 $connection = Yii::app()->db;
     $query = 'SELECT (snl."SENL_SALARIO"+snl."SENL_PRIMAANTIGUEDAD"+snl."SENL_TRANSPORTE"+snl."SENL_ALIMENTACION"+snl."SENL_PRIMATECNICA"+
	                   snl."SENL_GASTOSRP"+snl."SENL_BONIFICACION") AS "SENL_DEVENGADO"
			  FROM "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" snl, "TBL_NOMSEMESTRALNOMINA" sn,  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" "p"
			  WHERE sn."SENO_ID" = snl."SENO_ID" AND snl."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID" 
			  AND p."PEGE_ID" = '.$Personasgeneral->Personageneral->PEGE_ID.'
              AND sn."SENO_ANIO" = '.$Liquidaciones->LIQU_ANIO.'		  
			  ';
	 $primasemestral = $connection->createCommand($query)->queryScalar();
     $valor = $primasemestral/12;
	 $valor = round($valor/360*$this->diascesantias);
	 return $valor;		
    }
	
	private	function getBonServiciosPrestados($Personasgeneral,$Liquidaciones){
	 $connection = Yii::app()->db; 
	 $fecha = $Personasgeneral->Personageneral->PEGE_FECHAINGRESO;
	 
	 /* 001. inicio verificar si el empleado no es docente ocacional */ 
	 if($Personasgeneral->Tipocargo->TICA_ID!=3){		 
	  /* 01. inicio verificar si tiene BSP*/  
	  if ($Personasgeneral->Factorsalarial->FASA_BSP==1){
		$sql ='SELECT ROUND(SUM("BONIFICACION")/12)
			   FROM ( 
				     SELECT SUM("RANL_BONIFICACION") AS "BONIFICACION" 
					 FROM  "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMRETROACTIVOSNOMINA" rn, "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" rnl
					 WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND rn."RANO_ID" = rnl."RANO_ID" 
					 AND mnl."MENL_ID" = rnl."MENL_ID" AND pg."PEGE_ID" = '.$Personasgeneral->Personageneral->PEGE_ID.'
					 AND rn."RANO_ID" = '.$Liquidaciones->LIQU_ANIO.'
					 UNION ALL
					 SELECT SUM("MENL_BONIFICACION") AS "BONIFICACION" 
					 FROM  "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn
					 WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" 
					 AND pg."PEGE_ID" = '.$Personasgeneral->Personageneral->PEGE_ID.'
					 AND mn."MENO_ID" >= '.$Liquidaciones->LIQU_ANIO.'0101 AND mn."MENO_ID" <= '.$Liquidaciones->LIQU_ANIO.'1201
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
	
	private function getNovedades($Personasgeneral,$Liquidaciones){
	 $connection = Yii::app()->db;
	 $this->diascesantias = NULL;	 
	 /**
	 *obtenemos la fecha de la ultima liquidacion de la prima de navidad de la persona
	 */
	 $sql='SELECT cn."CENO_ID", cn."CENO_PERIODO", cn."CENO_FECHAPROCESO", cn."CENO_ESTADO"
           FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMCESANTIASNOMINA" cn, "TBL_NOMCESANTIASNOMINALIQUIDACIONES" cnl 
           WHERE p."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = cnl."EMPL_ID" AND cn."CENO_ID" = cnl."CENO_ID"
           AND p."PEGE_ID" = '.$Personasgeneral->Personageneral->PEGE_ID.'
           GROUP BY cn."CENO_ID"
           ORDER BY cn."CENO_FECHAPROCESO" DESC
           LIMIT 1
		  ';    		  
     $rows = $connection->createCommand($sql)->queryRow();
	 //$fechaultimaliquidacion = $rows['CENO_FECHAPROCESO'] = '2013-12-29';
	 $fechaultimaliquidacion = $rows['CENO_FECHAPROCESO'];
	 
	 /**
	 *verificando que la fecha de la ultima liquidacion no sea nula
	 *separando el ultimo mes y ultimo anio de liquidacion
	 */
	 if($fechaultimaliquidacion!=''){
	  $diaultimaliquidacion = date("d", strtotime($fechaultimaliquidacion));
	  $mesultimaliquidacion = date("m", strtotime($fechaultimaliquidacion));
	  $anioultimaliquidacion = date("Y", strtotime($fechaultimaliquidacion));
	   
	   if($anioultimaliquidacion==date('Y')){
	    $fechainiciocesantias = $anioultimaliquidacion.'-'.$mesultimaliquidacion .'-'.$diaultimaliquidacion+1;
	   }elseif($anioultimaliquidacion==(date('Y')-1)){
	    $fechainiciocesantias = date('Y').'-01-01';
	    }	
		
	 }else{
	       $fechaultimaliquidacion = $Personasgeneral->Personageneral->PEGE_FECHAINGRESO;
		   $diaultimaliquidacion = date("d", strtotime($fechaultimaliquidacion));
		   $mesultimaliquidacion = date("m", strtotime($fechaultimaliquidacion));
	       $anioultimaliquidacion = date("Y", strtotime($fechaultimaliquidacion));
		   $fechainiciocesantias = $anioultimaliquidacion.'-'.$mesultimaliquidacion .'-'.$diaultimaliquidacion;
		  }
	  
	 $fechaingreso = $Personasgeneral->Personageneral->PEGE_FECHAINGRESO;	 
	 $fecharetiro = $Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO;	  
	  
	  if($fechaingreso>=$fechainiciocesantias){
	   $dias = (strtotime($fechaingreso)-strtotime($fecharetiro))/86400;
	   $dias = abs($dias); 
	   $dias = floor($dias);	   
	   //echo $fechaingreso.' - '.$fecharetiro.'y<br>';
	  }else{
	        $dias = (strtotime($fechainiciocesantias)-strtotime($fecharetiro))/86400;
	        $dias = abs($dias); 
	        $dias = floor($dias);
			//echo $fechainiciocesantias.' - '.$fecharetiro.'x<br>';	        
	       }
	  
	  if($dias>=360){
	   $dias = 360;
	  }	   
      $this->diascesantias = $dias; 
	}
	
	
	private function setLiquidacion($Personasgeneral,$Liquidaciones,$devengados){
		 $Liqcesantias = new Liqcesantias; 

         $Liqcesantias->LICE_DIAS = $this->diascesantias;
         $Liqcesantias->LICE_PUNTOS = $Personasgeneral->Empleoplanta->EMPL_PUNTOS;
         $Liqcesantias->LICE_SUELDO = $Personasgeneral->Empleoplanta->EMPL_SUELDO;
         $Liqcesantias->LICE_SALARIO = $devengados[0];
         $Liqcesantias->LICE_PRIMAANTIGUEDAD = $devengados[1];
         $Liqcesantias->LICE_TRANSPORTE  = $devengados[2];
         $Liqcesantias->LICE_ALIMENTACION = $devengados[3];
         $Liqcesantias->LICE_PRIMATECNICA = $devengados[4];
         $Liqcesantias->LICE_GASTOSRP = $devengados[5];
         $Liqcesantias->LICE_BONIFICACION = $devengados[6];
         $Liqcesantias->LICE_SEMESTRAL = $devengados[7];
         $Liqcesantias->LICE_PRIMAVACACIONES = $devengados[8];
         $Liqcesantias->LICE_PRIMANAVIDAD = $devengados[9];
         $Liqcesantias->LIQU_ID =  $Liquidaciones->LIQU_ID;
         $Liqcesantias->EMPL_ID = $Personasgeneral->Empleoplanta->EMPL_ID;
         $Liqcesantias->LICE_FECHACAMBIO = date('Y-m-d H:i:s');
         $Liqcesantias->LICE_REGISTRADOPOR = Yii::app()->user->id;
         $Liqcesantias->save();
		 if($Liqcesantias->save()){
		 }else{
		       $msg = print_r($Liqcesantias->getErrors(),1);
               throw new CHttpException(400,'data not saving: '.$msg );
			  }
    }
	
	public function mostrarLiquidacion($parametros)
	{
	 //echo "<br><br><br>";
	 $connection = Yii::app()->db;
	 $this->liquidacion = NULL; 
	 $sql='SELECT "LICE_ID", "LICE_DIAS", "LICE_PUNTOS", "LICE_SUELDO", "LICE_SALARIO", "LICE_PRIMAANTIGUEDAD", "LICE_TRANSPORTE", "LICE_ALIMENTACION", 
                  "LICE_PRIMATECNICA", "LICE_GASTOSRP", "LICE_BONIFICACION", "LICE_SEMESTRAL", "LICE_PRIMAVACACIONES", "LICE_PRIMANAVIDAD", lc."LIQU_ID", "EMPL_ID", 
                  SUM("LICE_SALARIO"+"LICE_PRIMAANTIGUEDAD"+"LICE_TRANSPORTE"+"LICE_ALIMENTACION"+"LICE_PRIMATECNICA"+"LICE_GASTOSRP"+
                      "LICE_BONIFICACION"+"LICE_SEMESTRAL"+"LICE_PRIMAVACACIONES"+"LICE_PRIMANAVIDAD") AS "LICE_TOTALCESANTIAS"
		   FROM "TBL_LIQCESANTIAS" lc, "TBL_LIQLIQUIDACIONES" l
		   WHERE l."LIQU_ID" = lc."LIQU_ID" AND lc."LIQU_ID" = '.$parametros.'
		   GROUP BY lc."LICE_ID"
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll(); 
	 
	 $array = array('ID LIQUIDACION','DIAS','PUNTOS','SUELDO','SUELDO','PRIMA ANTIGUEDAD','AUX. TRASNPORTE','AUX. ALIMENTACION',
	                'PRIMA TECNICA','GASTOS REPRESENTACION','1/12 BON. DE SERVICIOS','1/12 P. DE SERVICIOS','1/12 P. DE VACACIONES','1/12 P. NAVIDAD','ID NOMINA','ID EMPLEO','TOTAL PRIMA VACACIONES');
	 $j=0; $i=0;
	 foreach ($array as $values=>$value) {	
	  $this->liquidacion[$j][$i] = $value;
	  $i++;  
	 }
	
	 $j=1;
	 foreach ($rows as $values) {	
	  $i=0;
	  foreach ($values as $value) {      	 
	   $this->liquidacion[$j][$i] = $value;
	  $i++;
	  }
     $j++;	 
     }
    }
}