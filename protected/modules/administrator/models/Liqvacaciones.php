<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_LIQVACACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_LIQVACACIONES':
 * @Propiedad string $VACA_ID
 * @Propiedad integer $VACA_MESES
 * @Propiedad string $VACA_PUNTOS
 * @Propiedad integer $VACA_SUELDO
 * @Propiedad integer $VACA_SALARIO
 * @Propiedad integer $VACA_PRIMAANTIGUEDAD
 * @Propiedad integer $VACA_TRANSPORTE
 * @Propiedad integer $VACA_ALIMENTACION
 * @Propiedad integer $VACA_PRIMATECNICA
 * @Propiedad integer $VACA_GASTOSRP
 * @Propiedad integer $VACA_BONIFICACION
 * @Propiedad integer $VACA_SEMESTRAL
 * @Propiedad integer $LIQU_ID
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $VACA_FECHACAMBIO
 * @Propiedad integer $VACA_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad LIQUIDACIONES $lIQU
 */
class Liqvacaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Liqvacaciones la clase del modelo estàtico.
	 */
	public $mesesvacaciones, $valorestablecidos;
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
		return 'TBL_LIQVACACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('VACA_MESES, VACA_PUNTOS, VACA_SUELDO, VACA_SALARIO, VACA_PRIMAANTIGUEDAD, VACA_TRANSPORTE, VACA_ALIMENTACION, VACA_PRIMATECNICA, VACA_GASTOSRP, VACA_BONIFICACION, VACA_SEMESTRAL, LIQU_ID, EMPL_ID, VACA_FECHACAMBIO, VACA_REGISTRADOPOR', 'required'),
			array('VACA_MESES, VACA_SUELDO, VACA_SALARIO, VACA_PRIMAANTIGUEDAD, VACA_TRANSPORTE, VACA_ALIMENTACION, VACA_PRIMATECNICA, VACA_GASTOSRP, VACA_BONIFICACION, VACA_SEMESTRAL, LIQU_ID, EMPL_ID, VACA_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('VACA_ID, VACA_MESES, VACA_PUNTOS, VACA_SUELDO, VACA_SALARIO, VACA_PRIMAANTIGUEDAD, VACA_TRANSPORTE, VACA_ALIMENTACION, VACA_PRIMATECNICA, VACA_GASTOSRP, VACA_BONIFICACION, VACA_SEMESTRAL, LIQU_ID, EMPL_ID, VACA_FECHACAMBIO, VACA_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'VACA_ID' => 'VACA',
						'VACA_MESES' => 'VACA MESES',
						'VACA_PUNTOS' => 'VACA PUNTOS',
						'VACA_SUELDO' => 'VACA SUELDO',
						'VACA_SALARIO' => 'VACA SALARIO',
						'VACA_PRIMAANTIGUEDAD' => 'VACA PRIMAANTIGUEDAD',
						'VACA_TRANSPORTE' => 'VACA TRANSPORTE',
						'VACA_ALIMENTACION' => 'VACA ALIMENTACION',
						'VACA_PRIMATECNICA' => 'VACA PRIMATECNICA',
						'VACA_GASTOSRP' => 'VACA GASTOSRP',
						'VACA_BONIFICACION' => 'VACA BONIFICACION',
						'VACA_SEMESTRAL' => 'VACA SEMESTRAL',
						'LIQU_ID' => 'LIQU',
						'EMPL_ID' => 'EMPL',
						'VACA_FECHACAMBIO' => 'VACA FECHACAMBIO',
						'VACA_REGISTRADOPOR' => 'VACA REGISTRADOPOR',
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

		$criteria->compare('VACA_ID',$this->VACA_ID,true);
		$criteria->compare('VACA_MESES',$this->VACA_MESES);
		$criteria->compare('VACA_PUNTOS',$this->VACA_PUNTOS,true);
		$criteria->compare('VACA_SUELDO',$this->VACA_SUELDO);
		$criteria->compare('VACA_SALARIO',$this->VACA_SALARIO);
		$criteria->compare('VACA_PRIMAANTIGUEDAD',$this->VACA_PRIMAANTIGUEDAD);
		$criteria->compare('VACA_TRANSPORTE',$this->VACA_TRANSPORTE);
		$criteria->compare('VACA_ALIMENTACION',$this->VACA_ALIMENTACION);
		$criteria->compare('VACA_PRIMATECNICA',$this->VACA_PRIMATECNICA);
		$criteria->compare('VACA_GASTOSRP',$this->VACA_GASTOSRP);
		$criteria->compare('VACA_BONIFICACION',$this->VACA_BONIFICACION);
		$criteria->compare('VACA_SEMESTRAL',$this->VACA_SEMESTRAL);
		$criteria->compare('LIQU_ID',$this->LIQU_ID);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('VACA_FECHACAMBIO',$this->VACA_FECHACAMBIO,true);
		$criteria->compare('VACA_REGISTRADOPOR',$this->VACA_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getVacaciones($Personasgeneral,$Liquidaciones)
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
	 //$prantiguedad[1];
	 $subTransporte = round($this->getSubTransporte($Personasgeneral,$Liquidaciones));
	 $subAlimentacion = round($this->getSubAlimentacion($Personasgeneral,$Liquidaciones));
	 
	 $primatec = round($this->getPrimaTecnica($Personasgeneral,$Liquidaciones));
	 $gastosrp = round($this->getGastosRepresentacion($Personasgeneral,$Liquidaciones));
	 
	 $bonserv = round($this->getBonServiciosPrestados($Personasgeneral,$Liquidaciones));
	 $primasemestral = round($this->getPrimaSemestral($Personasgeneral,$Liquidaciones));	
	 $tdevengado=round($basico)+round($subTransporte)+round($subAlimentacion)+round($primatec)+round($gastosrp)+round($prantiguedad[1])+round($bonserv)+round($primasemestral);
	 $devengados = array($basico,round($prantiguedad[1]),$subTransporte,$subAlimentacion,$primatec,$gastosrp,$bonserv,$primasemestral,$tdevengado);
	 
	 /**
	 *Guardar la liquidacion
	 */
	 $this->setLiquidacion($Personasgeneral,$Liquidaciones,$devengados);
	 
	}
	
	private function getSueldoBasico($Personasgeneral,$Liquidaciones){
			$conversion = ((($this->mesesvacaciones)*22)/12);
			$sueldo = (($Personasgeneral->Empleoplanta->EMPL_SUELDO)/30)*($conversion);
			
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
					
					$conversion = ((($this->mesesvacaciones)*22)/12);			
					$antiguedad[0]=round(($Personasgeneral->Empleoplanta->EMPL_SUELDO/30)*((((12)*22)/12))*$factor);
					$antiguedad[1]=round(((($Personasgeneral->Empleoplanta->EMPL_SUELDO)/30)*($conversion)*$factor));
		}

	  return $antiguedad;	
	}
	
	public	function getSubTransporte($Personasgeneral,$Liquidaciones){
	 if($Personasgeneral->Factorsalarial->FASA_SUBTRANSPORTE=="t"){
	  if(($Personasgeneral->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[4][3]) && ($Personasgeneral->Tipocargo->TICA_ID==1)){
		$conversion = ((($this->mesesvacaciones)*22)/12);
		$valor = ($this->valorestablecidos[5][3]/30)*$conversion;
		return $valor;
	   }
	 }
	 return 0;
	}
		
	public	function getSubAlimentacion($Personasgeneral,$Liquidaciones){
	 if($Personasgeneral->Factorsalarial->FASA_SUBALIMIENTACION=="t"){
	  if(($Personasgeneral->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[2][3]) && ($Personasgeneral->Tipocargo->TICA_ID==1)){
		$conversion = ((($this->mesesvacaciones)*22)/12);
		$valor = ($this->valorestablecidos[3][3]/30)*$conversion;
		return $valor;
	  }
	 }
	 return 0;
	}
	
	public	function getPrimaTecnica($Personasgeneral,$Liquidaciones){			
			$conversion = ((($this->mesesvacaciones)*22)/12);
			$sueldo = ($Personasgeneral->Empleoplanta->EMPL_SUELDO/30)*($conversion);
			$valor=($sueldo)*($Personasgeneral->Primatecnica->PRTE_PORCENTAJE/100);			
			return ($valor);			
	}
		
	public	function getGastosRepresentacion($Personasgeneral,$Liquidaciones){
			$conversion = ((($this->mesesvacaciones)*22)/12);
			$sueldo = ($Personasgeneral->Empleoplanta->EMPL_SUELDO/30)*($conversion);
			$valor=($sueldo)*($Personasgeneral->Gastorepresentacion->GARE_PORCENTAJE/100);			
			return ($valor);
	}
	
	private	function getBonServiciosPrestados($Personasgeneral,$Liquidaciones){
	 $connection = Yii::app()->db;
	 $prantiguedad = $this->getPrimaAntiguedad($Personasgeneral,$Liquidaciones);	 
	 $fecha = $Personasgeneral->Personageneral->PEGE_FECHAINGRESO;
	 
	 /* 001. inicio verificar si el empleado no es docente ocacional */ 
	 if($Personasgeneral->Tipocargo->TICA_ID!=3){		 
	  /* 01. inicio verificar si tiene BSP*/  
	  if ($Personasgeneral->Factorsalarial->FASA_BSP==1){
		  if ($this->mesesvacaciones==0){
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
								 AND mn."MENO_ID" >= '.$Liquidaciones->LIQU_ANIO.'0101 AND mn."MENO_ID" <= '.$Liquidaciones->LIQU_ANIO.'1201
							   ) t
						  ';
				  $bonificacion = $connection->createCommand($sql)->queryScalar();
				  if($bonificacion!=0){
				    $conversion = ((($this->mesesvacaciones)*22)/12);
			        $valor = ($bonificacion/30)*($conversion);
				    return round($valor);
				  }else{	
				        /**
						 *En caso de que no halla cumplido anio de servicio aun se le calcula
				         *como el limite establecido es diferente del profesor al administrativo,
						 *Este condicional verifica quien es quien para obtener asi el limite
						 */
						if($Personasgeneral->Tipocargo->TICA_ID==1){
						 $bon=$this->valorestablecidos[6][3];
						}else{ 
						 	  $bon=$this->valorestablecidos[7][3];
						     }
							 
						if(($Personasgeneral->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica($Personasgeneral,$Liquidaciones))+($this->getGastosRepresentacion($Personasgeneral,$Liquidaciones))+$prantiguedad[0]>$bon){
						 $valor1 = ($Personasgeneral->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica($Personasgeneral,$Liquidaciones));
						 $valor2 = ($valor1+($this->getGastosRepresentacion($Personasgeneral,$Liquidaciones))+round($prantiguedad[0]))*($this->valorestablecidos[8][3]/100);
						 $valor3 = ($valor2/12);
						 $valor4 = ($valor3/30)*($conversion);
						 return $valor4;
						}else{ 
							  $valor1 = ($Personasgeneral->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica($Personasgeneral,$Liquidaciones));
						      $valor2 = ($valor1+($this->getGastosRepresentacion($Personasgeneral,$Liquidaciones))+round($prantiguedad[0]))*($this->valorestablecidos[9][3]/100);
						      $valor3 = ($valor2/12);
						      $valor4 = ($valor3/30)*($conversion);
						      return $valor4;
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
	 $connection = Yii::app()->db;
     $query = 'SELECT (snl."SENL_SALARIO"+snl."SENL_PRIMAANTIGUEDAD"+snl."SENL_TRANSPORTE"+snl."SENL_ALIMENTACION"+snl."SENL_PRIMATECNICA"+
	                   snl."SENL_GASTOSRP"+snl."SENL_BONIFICACION") AS "SENL_DEVENGADO"
			  FROM "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" snl, "TBL_NOMSEMESTRALNOMINA" sn,  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" "p"
			  WHERE sn."SENO_ID" = snl."SENO_ID" AND snl."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID" 
			  AND p."PEGE_ID" = '.$Personasgeneral->Personageneral->PEGE_ID.'
              AND sn."SENO_ANIO" = '.$Liquidaciones->LIQU_ANIO.'		  
			  ';
	 $primasemestral = $connection->createCommand($query)->queryScalar();
     $primasemestral = $primasemestral/12;
	 $conversion = ((($this->mesesvacaciones)*22)/12);
     $valor = ($primasemestral/30)*($conversion);
     return round($valor);	
    }	
	
	private function getNovedades($Personasgeneral,$Liquidaciones)
	{
	 $connection = Yii::app()->db;
	 $this->mesesvacaciones = NULL;
	 /**
	 *obtenemos la fecha de la ultima liquidacion de las vacaciones de la persona
	 */
	 $sql='SELECT vn."VANO_ID", vn."VANO_PERIODO", vn."VANO_FECHAPROCESO", vn."VANO_ESTADO"
           FROM "TBL_NOMVACACIONESNOMINA" vn, "TBL_NOMVACACIONESNOMINALIQUIDACIONES" vnl 
           WHERE vn."VANO_ID" = vnl."VANO_ID"
           GROUP BY vn."VANO_ID"
           ORDER BY vn."VANO_FECHAPROCESO" DESC
           LIMIT 1
		  ';    		  
     $rows = $connection->createCommand($sql)->queryRow();
	 $fechaultimaliquidacion = $rows['VANO_FECHAPROCESO'];
	
	/*
	 $Personasgeneral->Personageneral->PEGE_FECHAINGRESO = '2012-01-23';
	 $fechaultimaliquidacion = $rows['VANO_FECHAPROCESO'] = '2013-12-20';	 
	 $Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO = '2014-03-30';
	 */

	 /**
	 *verificando que la fecha de la ultima liquidacion no sea nula
	 *separando el ultimo mes y ultimo anio de liquidacion
	 */
	 if($fechaultimaliquidacion!=''){
	  $mesultimaliquidacion = date("m", strtotime($fechaultimaliquidacion));
	  $anioultimaliquidacion = date("Y", strtotime($fechaultimaliquidacion));
	 }
	 
	 /**
	 *separando la fecha de ingreso de la persona
	 */
	  $diaringreso = date("d", strtotime($Personasgeneral->Personageneral->PEGE_FECHAINGRESO));
	  $mesingreso = date("m", strtotime($Personasgeneral->Personageneral->PEGE_FECHAINGRESO));
	  $anioingreso = date("Y", strtotime($Personasgeneral->Personageneral->PEGE_FECHAINGRESO));	
	 
	 /**
	 *obteniendo la fecha de inicio y obteniendo el mes de inicio a partir
	 *de la ultima fecha de liquidacion
	 */
      if($anioultimaliquidacion==date('Y')){
	   $fechainiciovacaciones = $anioultimaliquidacion.'-'.$mesingreso .'-'.$diaringreso;
	   $mesiniciovacaciones = date("m", strtotime($fechainiciovacaciones));
	  }elseif($anioultimaliquidacion==(date('Y')-1)){
	    $fechainiciovacaciones = date('Y').'-'.$mesingreso .'-'.$diaringreso;
	    $mesiniciovacaciones = date("m", strtotime($fechainiciovacaciones));
	  }
	  
	  /**
	 *separando la fecha de retiro de la persona
	 *obteniendo el ultimo dia del mes en q se retiro
	 */
	 $diaretiro = date("d", strtotime($Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO));
	 $mesretiro = date("m", strtotime($Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO));
	 $anioretiro = date("Y", strtotime($Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO));     
	 $ultimodiamesretiro = date("d",(mktime(0,0,0,$mesretiro+1,1,$anioretiro)-1));
	 
	
	 //echo 'retirando el: '.$mesretiro.' - vacaciones inicial el: '.$mesiniciovacaciones.'<br>';
     
	 
	 /**
	 *calculando los meses de liquidacion de las vacaciones
	 */
	 $meses  = 0;
	 if($anioretiro>$anioultimaliquidacion){
	   $meses = $mesretiro-$mesiniciovacaciones-1;
	   //echo '<br>'.$diaretiro.' == '.$ultimodiamesretiro.' o '.$diaretiro.' == '.($ultimodiamesretiro-1).' - ciclo (1)<br>';
	  if(($diaretiro==$ultimodiamesretiro) or ($diaretiro==($ultimodiamesretiro-1))){
	    $this->mesesvacaciones = $meses+1;       	   
	  }else{
	        $this->mesesvacaciones = $meses;
		   }	  	
	 }else{
	       if($anioretiro==$anioultimaliquidacion){
		      //echo '<br>'.$diaretiro.' == '.$ultimodiamesretiro.' o '.$diaretiro.' == '.($ultimodiamesretiro-1).' - ciclo (2)<br>';
			 if(($diaretiro==$ultimodiamesretiro) or ($diaretiro==($ultimodiamesretiro-1))){
	          $this->mesesvacaciones = $mesretiro-$mesiniciovacaciones+1;	 
	         }else{
	               $this->mesesvacaciones = $mesretiro-$mesiniciovacaciones;
		          }
			 $this->mesesvacaciones = 0;	  
			}
		  }
		  
	  if($this->mesesvacaciones>12){$this->mesesvacaciones = 12; }elseif($this->mesesvacaciones<0){$this->mesesvacaciones = 0;};
	  $this->mesesvacaciones;
	}
	
	private function setLiquidacion($Personasgeneral,$Liquidaciones,$devengados){
		 $Liqvacaciones = new Liqvacaciones; 
		 
         $Liqvacaciones->VACA_MESES = $this->mesesvacaciones;
         $Liqvacaciones->VACA_PUNTOS = $Personasgeneral->Empleoplanta->EMPL_PUNTOS;
         $Liqvacaciones->VACA_SUELDO = $Personasgeneral->Empleoplanta->EMPL_SUELDO;
         $Liqvacaciones->VACA_SALARIO = $devengados[0];
         $Liqvacaciones->VACA_PRIMAANTIGUEDAD = $devengados[1];
         $Liqvacaciones->VACA_TRANSPORTE  = $devengados[2];
         $Liqvacaciones->VACA_ALIMENTACION = $devengados[3];
         $Liqvacaciones->VACA_PRIMATECNICA = $devengados[4];
         $Liqvacaciones->VACA_GASTOSRP = $devengados[5];
         $Liqvacaciones->VACA_BONIFICACION = $devengados[6];
         $Liqvacaciones->VACA_SEMESTRAL = $devengados[7];
         $Liqvacaciones->LIQU_ID = $Liquidaciones->LIQU_ID;
         $Liqvacaciones->EMPL_ID = $Personasgeneral->Empleoplanta->EMPL_ID;
         $Liqvacaciones->VACA_FECHACAMBIO = date('Y-m-d H:i:s');
         $Liqvacaciones->VACA_REGISTRADOPOR = Yii::app()->user->id;
         $Liqvacaciones->save();
		 if($Liqvacaciones->save()){
		 }else{
		       $msg = print_r($Liqvacaciones->getErrors(),1);
               throw new CHttpException(400,'data not saving: '.$msg );
			  }
    }
	
	public function mostrarLiquidacion($parametros)
	{
	 //echo "<br><br><br>";
	 $connection = Yii::app()->db;
	 $this->liquidacion = NULL; 
	 $sql='SELECT "VACA_ID", "VACA_MESES", "VACA_PUNTOS", "VACA_SUELDO", "VACA_SALARIO", "VACA_PRIMAANTIGUEDAD", "VACA_TRANSPORTE", "VACA_ALIMENTACION", 
                  "VACA_PRIMATECNICA", "VACA_GASTOSRP", "VACA_BONIFICACION", "VACA_SEMESTRAL",  lv."LIQU_ID", "EMPL_ID",
                  SUM("VACA_SALARIO"+"VACA_PRIMAANTIGUEDAD"+"VACA_TRANSPORTE"+"VACA_ALIMENTACION"+"VACA_PRIMATECNICA"+
                      "VACA_GASTOSRP"+"VACA_BONIFICACION"+"VACA_SEMESTRAL") AS "VACA_TOTALDEVENGADO"
		   FROM "TBL_LIQVACACIONES" lv, "TBL_LIQLIQUIDACIONES" l
		   WHERE l."LIQU_ID" = lv."LIQU_ID" AND lv."LIQU_ID" = '.$parametros.'
	       GROUP BY lv."VACA_ID"
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll(); 
	 
	 $array = array('ID LIQUIDACION','DIAS','PUNTOS','SUELDO','SUELDO','PRIMA ANTIGUEDAD','AUX. TRASNPORTE','AUX. ALIMENTACION',
	                'PRIMA TECNICA','GASTOS REPRESENTACION','1/12 BON. DE SERVICIOS','1/12 P. DE SERVICIOS','ID NOMINA','ID EMPLEO','TOTAL PRIMA VACACIONES');
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