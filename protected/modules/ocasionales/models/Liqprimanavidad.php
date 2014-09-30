<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_LIQPRIMANAVIDAD".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_LIQPRIMANAVIDAD':
 * @Propiedad string $PRNA_ID
 * @Propiedad integer $PRNA_MESES
 * @Propiedad string $PRNA_PUNTOS
 * @Propiedad integer $PRNA_SUELDO
 * @Propiedad integer $PRNA_SALARIO
 * @Propiedad integer $PRNA_PRIMAANTIGUEDAD
 * @Propiedad integer $PRNA_TRANSPORTE
 * @Propiedad integer $PRNA_ALIMENTACION
 * @Propiedad integer $PRNA_PRIMATECNICA
 * @Propiedad integer $PRNA_GASTOSRP
 * @Propiedad integer $PRNA_BONIFICACION
 * @Propiedad integer $PRNA_SEMESTRAL
 * @Propiedad integer $PRNA_PRIMAVACACIONES
 * @Propiedad integer $LIQU_ID
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $PRNA_FECHACAMBIO
 * @Propiedad integer $PRNA_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad LIQUIDACIONES $lIQU
 */
class Liqprimanavidad extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Liqprimanavidad la clase del modelo estàtico.
	 */
	public $mesesnavidad, $valorestablecidos; 
	public $liquidacion; 
	
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
		return 'TBL_LIQPRIMANAVIDAD';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PRNA_MESES, PRNA_PUNTOS, PRNA_SUELDO, PRNA_SALARIO, PRNA_PRIMAANTIGUEDAD, PRNA_TRANSPORTE, PRNA_ALIMENTACION, PRNA_PRIMATECNICA, PRNA_GASTOSRP, PRNA_BONIFICACION, PRNA_SEMESTRAL, PRNA_PRIMAVACACIONES, LIQU_ID, EMPL_ID, PRNA_FECHACAMBIO, PRNA_REGISTRADOPOR', 'required'),
			array('PRNA_MESES, PRNA_SUELDO, PRNA_SALARIO, PRNA_PRIMAANTIGUEDAD, PRNA_TRANSPORTE, PRNA_ALIMENTACION, PRNA_PRIMATECNICA, PRNA_GASTOSRP, PRNA_BONIFICACION, PRNA_SEMESTRAL, PRNA_PRIMAVACACIONES, LIQU_ID, EMPL_ID, PRNA_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PRNA_ID, PRNA_MESES, PRNA_PUNTOS, PRNA_SUELDO, PRNA_SALARIO, PRNA_PRIMAANTIGUEDAD, PRNA_TRANSPORTE, PRNA_ALIMENTACION, PRNA_PRIMATECNICA, PRNA_GASTOSRP, PRNA_BONIFICACION, PRNA_SEMESTRAL, PRNA_PRIMAVACACIONES, LIQU_ID, EMPL_ID, PRNA_FECHACAMBIO, PRNA_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'PRNA_ID' => 'PRNA',
						'PRNA_MESES' => 'PRNA MESES',
						'PRNA_PUNTOS' => 'PRNA PUNTOS',
						'PRNA_SUELDO' => 'PRNA SUELDO',
						'PRNA_SALARIO' => 'PRNA SALARIO',
						'PRNA_PRIMAANTIGUEDAD' => 'PRNA PRIMAANTIGUEDAD',
						'PRNA_TRANSPORTE' => 'PRNA TRANSPORTE',
						'PRNA_ALIMENTACION' => 'PRNA ALIMENTACION',
						'PRNA_PRIMATECNICA' => 'PRNA PRIMATECNICA',
						'PRNA_GASTOSRP' => 'PRNA GASTOSRP',
						'PRNA_BONIFICACION' => 'PRNA BONIFICACION',
						'PRNA_SEMESTRAL' => 'PRNA SEMESTRAL',
						'PRNA_PRIMAVACACIONES' => 'PRNA PRIMAVACACIONES',
						'LIQU_ID' => 'LIQU',
						'EMPL_ID' => 'EMPL',
						'PRNA_FECHACAMBIO' => 'PRNA FECHACAMBIO',
						'PRNA_REGISTRADOPOR' => 'PRNA REGISTRADOPOR',
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

		$criteria->compare('PRNA_ID',$this->PRNA_ID,true);
		$criteria->compare('PRNA_MESES',$this->PRNA_MESES);
		$criteria->compare('PRNA_PUNTOS',$this->PRNA_PUNTOS,true);
		$criteria->compare('PRNA_SUELDO',$this->PRNA_SUELDO);
		$criteria->compare('PRNA_SALARIO',$this->PRNA_SALARIO);
		$criteria->compare('PRNA_PRIMAANTIGUEDAD',$this->PRNA_PRIMAANTIGUEDAD);
		$criteria->compare('PRNA_TRANSPORTE',$this->PRNA_TRANSPORTE);
		$criteria->compare('PRNA_ALIMENTACION',$this->PRNA_ALIMENTACION);
		$criteria->compare('PRNA_PRIMATECNICA',$this->PRNA_PRIMATECNICA);
		$criteria->compare('PRNA_GASTOSRP',$this->PRNA_GASTOSRP);
		$criteria->compare('PRNA_BONIFICACION',$this->PRNA_BONIFICACION);
		$criteria->compare('PRNA_SEMESTRAL',$this->PRNA_SEMESTRAL);
		$criteria->compare('PRNA_PRIMAVACACIONES',$this->PRNA_PRIMAVACACIONES);
		$criteria->compare('LIQU_ID',$this->LIQU_ID);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('PRNA_FECHACAMBIO',$this->PRNA_FECHACAMBIO,true);
		$criteria->compare('PRNA_REGISTRADOPOR',$this->PRNA_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getPrimanavidad($Personasgeneral,$Liquidaciones)
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
	 $prantiguedad = round($this->getPrimaAntiguedad($Personasgeneral,$Liquidaciones));
	 //$prantiguedad[1];
	 $subTransporte = round($this->getSubTransporte($Personasgeneral,$Liquidaciones));
	 $subAlimentacion = round($this->getSubAlimentacion($Personasgeneral,$Liquidaciones));
	 
	 $primatec = round($this->getPrimaTecnica($Personasgeneral,$Liquidaciones));
	 $gastosrp = round($this->getGastosRepresentacion($Personasgeneral,$Liquidaciones));	   
	 $bonserv = round($this->getBonServiciosPrestados($Personasgeneral,$Liquidaciones));
	 $primasemestral = round($this->getPrimaSemestral($Personasgeneral,$Liquidaciones));
     $primavacaciones = round($this->getPrimaVacaciones($Personasgeneral,$Liquidaciones));	 
	 $tdevengado=round($basico)+round($subTransporte)+round($subAlimentacion)+round($primatec)+round($gastosrp)+round($prantiguedad[1])+round($bonserv)+round($primasemestral)+round($primavacaciones);
	 $devengados = array($basico,round($prantiguedad[1]),$subTransporte,$subAlimentacion,$primatec,$gastosrp,$bonserv,$primasemestral,$primavacaciones,$tdevengado);
	 /**
	 *Guardar la liquidacion
	 */
	 $this->setLiquidacion($Personasgeneral,$Liquidaciones,$devengados);
	 
	 
	}
	
	private function getSueldoBasico($Personasgeneral,$Liquidaciones){
			$sueldo = ($Personasgeneral->Empleoplanta->EMPL_SUELDO)*(($this->mesesnavidad)/12);
		return ($sueldo);
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
					$antiguedad[1]=round((($Personasgeneral->Empleoplanta->EMPL_SUELDO)*($this->mesesnavidad)*$factor/12));
		}

	  return $antiguedad;	
	}
	
	public	function getSubTransporte($Personasgeneral,$Liquidaciones){
	 if($Personasgeneral->Factorsalarial->FASA_SUBTRANSPORTE=="t"){
	  if(($Personasgeneral->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[4][3]) && ($Personasgeneral->Tipocargo->TICA_ID==1)){
		return ($this->valorestablecidos[5][3]*($this->mesesnavidad)/12);
	   }
	 }
	 return 0;
	}
		
	public	function getSubAlimentacion($Personasgeneral,$Liquidaciones){
	 if($Personasgeneral->Factorsalarial->FASA_SUBALIMIENTACION=="t"){
	  if(($Personasgeneral->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[2][3]) && ($Personasgeneral->Tipocargo->TICA_ID==1)){
		return ($this->valorestablecidos[3][3]*($this->mesesnavidad)/12);
	  }
	 }
	 return 0;
	}
	
	public	function getPrimaTecnica($Personasgeneral,$Liquidaciones){
			$sueldo = ($Personasgeneral->Empleoplanta->EMPL_SUELDO)*(($this->mesesnavidad)/12);
			$valor=($sueldo)*($Personasgeneral->Primatecnica->PRTE_PORCENTAJE/100);			
			return ($valor);
	}
		
	public	function getGastosRepresentacion($Personasgeneral,$Liquidaciones){
			$sueldo = ($Personasgeneral->Empleoplanta->EMPL_SUELDO)*(($this->mesesnavidad)/12);
			$valor=($sueldo)*($Personasgeneral->Gastorepresentacion->GARE_PORCENTAJE/100);			
			return ($valor);
	}
	
	private	function getBonServiciosPrestados($Personasgeneral,$Liquidaciones){
	 $connection = Yii::app()->db2;
	 $prantiguedad = $this->getPrimaAntiguedad($Personasgeneral,$Liquidaciones);	 
	 $fecha = $Personasgeneral->Personageneral->PEGE_FECHAINGRESO;
	 
	 /* 001. inicio verificar si el empleado no es docente ocacional */ 
	 if($Personasgeneral->Tipocargo->TICA_ID!=3){		 
	  /* 01. inicio verificar si tiene BSP*/  
	  if ($Personasgeneral->Factorsalarial->FASA_BSP==1){
		  if ($this->mesesnavidad==0){
		   return 0;
		  }else{
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
								 AND mn."MENO_ID" >= '.$Liquidaciones->LIQU_ANIO.'0101 AND mn."MENO_ID" <= '.$Liquidaciones->LIQU_ANIO.'0601
							   ) t
						  ';
				  $bonificacion = $connection->createCommand($sql)->queryScalar();
				  if($bonificacion!=0){
				   return round($bonificacion/12*$this->mesesnavidad);
				  }else{	
				        //En caso de que no halla cumplido anio de servicio aun se le calcula//
				        //como el limite establecido es diferente del profesor al administrativo,//
						//Este condicional verifica quien es quien para obtener asi el limite//
						if($Personasgeneral->Tipocargo->TICA_ID==1){
						 $bon=$this->valorestablecidos[6][3];
						}else{ 
						 	  $bon=$this->valorestablecidos[7][3];
						     }
							 
						if(($Personasgeneral->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica($Personasgeneral,$Liquidaciones))+($this->getGastosRepresentacion($Personasgeneral,$Liquidaciones))+$prantiguedad[0]>$bon){
						 return ((($Personasgeneral->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica($Personasgeneral,$Liquidaciones))+($this->getGastosRepresentacion($Personasgeneral,$Liquidaciones))+round($prantiguedad[0]))*($this->valorestablecidos[8][3]/100)/12)*$this->mesesnavidad/12;
						}else{ 
							  return ((($Personasgeneral->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica($Personasgeneral,$Liquidaciones))+($this->getGastosRepresentacion($Personasgeneral,$Liquidaciones))+round($prantiguedad[0]))*($this->valorestablecidos[9][3]/100)/12)*$this->mesesnavidad/12;
					         }
					   }
	           }
	     }else{
	           return 0; 
	          }
	 }else{
	        return 0; 
	      } 
	}

    public	function getPrimaSemestral($Personasgeneral,$Liquidaciones){
	 $connection = Yii::app()->db2;
     $query = 'SELECT (snl."SENL_SALARIO"+snl."SENL_PRIMAANTIGUEDAD"+snl."SENL_TRANSPORTE"+snl."SENL_ALIMENTACION"+snl."SENL_PRIMATECNICA"+
	                   snl."SENL_GASTOSRP"+snl."SENL_BONIFICACION") AS "SENL_DEVENGADO"
			  FROM "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" snl, "TBL_NOMSEMESTRALNOMINA" sn,  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" "p"
			  WHERE sn."SENO_ID" = snl."SENO_ID" AND snl."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID" 
			  AND p."PEGE_ID" = '.$Personasgeneral->Personageneral->PEGE_ID.'
              AND sn."SENO_ANIO" = '.$Liquidaciones->LIQU_ANIO.'		  
			  ';
	 $primasemestral = $connection->createCommand($query)->queryScalar();
     $valor = $primasemestral/12;
	 return $valor;		
    }
	
	public	function getPrimaVacaciones($Personasgeneral,$Liquidaciones){
	 $connection = Yii::app()->db2;
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
	 return $valor;		
    }
	
	private function getNovedades($Personasgeneral,$Liquidaciones)
	{
	 $this->mesesnavidad = NULL;
	 /**
	 *obtenemos la fecha de la ultima liquidacion de la prima semestral de la persona
	 */
	 $fechaultimaliquidacion = '2014-07-22';
	 if($fechaultimaliquidacion!=''){
	  $mesultimaliquidacion = date("m", strtotime($fechaultimaliquidacion));
	  $anioultimaliquidacion = date("Y", strtotime($fechaultimaliquidacion));
	 }
	 
	 $fechainicioprimavacaciones = '2014-07-22';
	 $mesinicioprimavacaciones = date("m", strtotime($fechainicioprimavacaciones));
	 $anioinicioprimavacaciones = date("Y", strtotime($fechainicioprimavacaciones));
	 
	 
	 $diaretiro = date("d", strtotime($Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO));
	 $mesretiro = date("m", strtotime($Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO));
	 $anioretiro = date("Y", strtotime($Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO));
     
	 /**
	 *buscar periodos de retiro y periodo de inicio de prima de vacaciones
	 */
	 $periodoretiro = $anioretiro.$mesretiro;
	 $periodoinicioprimavacaciones = $anioinicioprimavacaciones.$mesinicioprimavacaciones;
	 $periodoultimaprimavacaciones = $anioultimaliquidacion.$mesultimaliquidacion;	 
	 $ultimodiamesretiro = date("d",(mktime(0,0,0,$mesretiro+1,1,$anioretiro)-1));
	 
	 /*
	 echo $mesretiro.' - '.$mesinicioprimavacaciones.'<br>';
	 echo $diaretiro.' == '.$ultimodiamesretiro.'<br>';
	 echo $diaretiro.' == '.($ultimodiamesretiro-1).'<br>';
	 echo $periodoretiro.' == '.$periodoinicioprimavacaciones.' - '.$periodoultimaprimavacaciones.'<br>';*/
	 
	 $meses  = 0;
	 if($anioretiro>$anioultimaliquidacion){
	  $meses = 12-$mesultimaliquidacion+$mesretiro-1;
	  if(($diaretiro==$ultimodiamesretiro) or ($diaretiro==($ultimodiamesretiro-1))){
	   $this->mesesnavidad = $meses+1;	 
	  }else{
	        $this->mesesnavidad = $meses;
		   }	  	
	 }else{
	       if($anioretiro==$anioultimaliquidacion){
		     if(($diaretiro==$ultimodiamesretiro) or ($diaretiro==($ultimodiamesretiro-1))){
	          $this->mesesnavidad = $mesretiro-$mesinicioprimavacaciones+1;	 
	         }else{
	               $this->mesesnavidad = $mesretiro-$mesinicioprimavacaciones;
		          }
			}
		  }
	 if($this->mesesnavidad>12){$this->mesesnavidad = 12; };
	 $this->mesesnavidad;
	}
	
	private function setLiquidacion($Personasgeneral,$Liquidaciones,$devengados){
		 $Liqprimanavidad = new Liqprimanavidad; 
		 
         $Liqprimanavidad->PRNA_MESES = $this->mesesnavidad;
         $Liqprimanavidad->PRNA_PUNTOS = $Personasgeneral->Empleoplanta->EMPL_PUNTOS;
         $Liqprimanavidad->PRNA_SUELDO = $Personasgeneral->Empleoplanta->EMPL_SUELDO;
         $Liqprimanavidad->PRNA_SALARIO = $devengados[0];
         $Liqprimanavidad->PRNA_PRIMAANTIGUEDAD = $devengados[1];
         $Liqprimanavidad->PRNA_TRANSPORTE  = $devengados[2];
         $Liqprimanavidad->PRNA_ALIMENTACION = $devengados[3];
         $Liqprimanavidad->PRNA_PRIMATECNICA = $devengados[4];
         $Liqprimanavidad->PRNA_GASTOSRP = $devengados[5];
         $Liqprimanavidad->PRNA_BONIFICACION = $devengados[6];
         $Liqprimanavidad->PRNA_SEMESTRAL = $devengados[7];
         $Liqprimanavidad->PRNA_PRIMAVACACIONES = $devengados[8];
         $Liqprimanavidad->LIQU_ID =  $Liquidaciones->LIQU_ID;
         $Liqprimanavidad->EMPL_ID = $Personasgeneral->Empleoplanta->EMPL_ID;
         $Liqprimanavidad->PRNA_FECHACAMBIO = date('Y-m-d H:i:s');
         $Liqprimanavidad->PRNA_REGISTRADOPOR = Yii::app()->user->id;
         $Liqprimanavidad->save();
		 if($Liqprimanavidad->save()){
		 }else{
		       $msg = print_r($Liqprimanavidad->getErrors(),1);
               throw new CHttpException(400,'data not saving: '.$msg );
			  }
    }
	
	public function mostrarLiquidacion($parametros)
	{
	 //echo "<br><br><br>";
	 $connection = Yii::app()->db2;
	 $this->liquidacion = NULL; 
	 $sql='SELECT "PRNA_ID", "PRNA_MESES", "PRNA_PUNTOS", "PRNA_SUELDO", "PRNA_SALARIO", "PRNA_PRIMAANTIGUEDAD", "PRNA_TRANSPORTE", "PRNA_ALIMENTACION", 
                  "PRNA_PRIMATECNICA", "PRNA_GASTOSRP", "PRNA_BONIFICACION", "PRNA_SEMESTRAL","PRNA_PRIMAVACACIONES", lpn."LIQU_ID", "EMPL_ID",
                  SUM("PRNA_SALARIO"+"PRNA_PRIMAANTIGUEDAD"+"PRNA_TRANSPORTE"+"PRNA_ALIMENTACION"+"PRNA_PRIMATECNICA"+
                      "PRNA_GASTOSRP"+"PRNA_BONIFICACION"+"PRNA_SEMESTRAL"+"PRNA_PRIMAVACACIONES") AS "PRNA_TOTALPRIMANAVIDAD" 
		   FROM "TBL_LIQPRIMANAVIDAD" lpn, "TBL_LIQLIQUIDACIONES" l
		   WHERE l."LIQU_ID" = lpn."LIQU_ID" AND lpn."LIQU_ID" = '.$parametros.'
		   GROUP BY lpn."PRNA_ID"
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll(); 
	 
	 $array = array('ID LIQUIDACION','MESES','PUNTOS','SUELDO','Sueldo','Prima Antigüedad','Subsidio Transporte','Subsidio Alimentacion',
	                'Prima Tecnica','Gastos Representacion','Bon. de Servicios','Prima de Servicios','Prima de Vacaciones','ID NOMINA','ID EMPLEO','TOTAL PRIMA VACACIONES');
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