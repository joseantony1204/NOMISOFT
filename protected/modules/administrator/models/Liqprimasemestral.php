<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_LIQPRIMASEMESTRAL".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_LIQPRIMASEMESTRAL':
 * @Propiedad string $PRSE_ID
 * @Propiedad integer $PRSE_MESES
 * @Propiedad string $PRSE_PUNTOS
 * @Propiedad integer $PRSE_SUELDO
 * @Propiedad integer $PRSE_SALARIO
 * @Propiedad integer $PRSE_PRIMAANTIGUEDAD
 * @Propiedad integer $PRSE_TRANSPORTE
 * @Propiedad integer $PRSE_ALIMENTACION
 * @Propiedad integer $PRSE_PRIMATECNICA
 * @Propiedad integer $PRSE_GASTOSRP
 * @Propiedad integer $PRSE_BONIFICACION
 * @Propiedad integer $LIQU_ID
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $PRSE_FECHACAMBIO
 * @Propiedad integer $PRSE_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad LIQUIDACIONES $lIQU
 */
class Liqprimasemestral extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Liqprimasemestral la clase del modelo estàtico.
	 */
	public $mesessemestral, $valorestablecidos;
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
		return 'TBL_LIQPRIMASEMESTRAL';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PRSE_MESES, PRSE_PUNTOS, PRSE_SUELDO, PRSE_SALARIO, PRSE_PRIMAANTIGUEDAD, PRSE_TRANSPORTE, PRSE_ALIMENTACION, PRSE_PRIMATECNICA, PRSE_GASTOSRP, PRSE_BONIFICACION, LIQU_ID, EMPL_ID, PRSE_FECHACAMBIO, PRSE_REGISTRADOPOR', 'required'),
			array('PRSE_MESES, PRSE_SUELDO, PRSE_SALARIO, PRSE_PRIMAANTIGUEDAD, PRSE_TRANSPORTE, PRSE_ALIMENTACION, PRSE_PRIMATECNICA, PRSE_GASTOSRP, PRSE_BONIFICACION, LIQU_ID, EMPL_ID, PRSE_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PRSE_ID, PRSE_MESES, PRSE_PUNTOS, PRSE_SUELDO, PRSE_SALARIO, PRSE_PRIMAANTIGUEDAD, PRSE_TRANSPORTE, PRSE_ALIMENTACION, PRSE_PRIMATECNICA, PRSE_GASTOSRP, PRSE_BONIFICACION, LIQU_ID, EMPL_ID, PRSE_FECHACAMBIO, PRSE_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'PRSE_ID' => 'PRSE',
						'PRSE_MESES' => 'PRSE MESES',
						'PRSE_PUNTOS' => 'PRSE PUNTOS',
						'PRSE_SUELDO' => 'PRSE SUELDO',
						'PRSE_SALARIO' => 'PRSE SALARIO',
						'PRSE_PRIMAANTIGUEDAD' => 'PRSE PRIMAANTIGUEDAD',
						'PRSE_TRANSPORTE' => 'PRSE TRANSPORTE',
						'PRSE_ALIMENTACION' => 'PRSE ALIMENTACION',
						'PRSE_PRIMATECNICA' => 'PRSE PRIMATECNICA',
						'PRSE_GASTOSRP' => 'PRSE GASTOSRP',
						'PRSE_BONIFICACION' => 'PRSE BONIFICACION',
						'LIQU_ID' => 'LIQU',
						'EMPL_ID' => 'EMPL',
						'PRSE_FECHACAMBIO' => 'PRSE FECHACAMBIO',
						'PRSE_REGISTRADOPOR' => 'PRSE REGISTRADOPOR',
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

		$criteria->compare('PRSE_ID',$this->PRSE_ID,true);
		$criteria->compare('PRSE_MESES',$this->PRSE_MESES);
		$criteria->compare('PRSE_PUNTOS',$this->PRSE_PUNTOS,true);
		$criteria->compare('PRSE_SUELDO',$this->PRSE_SUELDO);
		$criteria->compare('PRSE_SALARIO',$this->PRSE_SALARIO);
		$criteria->compare('PRSE_PRIMAANTIGUEDAD',$this->PRSE_PRIMAANTIGUEDAD);
		$criteria->compare('PRSE_TRANSPORTE',$this->PRSE_TRANSPORTE);
		$criteria->compare('PRSE_ALIMENTACION',$this->PRSE_ALIMENTACION);
		$criteria->compare('PRSE_PRIMATECNICA',$this->PRSE_PRIMATECNICA);
		$criteria->compare('PRSE_GASTOSRP',$this->PRSE_GASTOSRP);
		$criteria->compare('PRSE_BONIFICACION',$this->PRSE_BONIFICACION);
		$criteria->compare('LIQU_ID',$this->LIQU_ID);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('PRSE_FECHACAMBIO',$this->PRSE_FECHACAMBIO,true);
		$criteria->compare('PRSE_REGISTRADOPOR',$this->PRSE_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getPrimasemestral($Personasgeneral,$Liquidaciones)
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
	 $tdevengado=round($basico)+round($subTransporte)+round($subAlimentacion)+round($primatec)+round($gastosrp)+round($prantiguedad[1])+round($bonserv);
	 $devengados = array($basico,round($prantiguedad[1]),$subTransporte,$subAlimentacion,$primatec,$gastosrp,$bonserv,$tdevengado);
	 
	 /**
	 *Antes de guardar la liquidacion se hace la validacion que los meses trabajados
	 *sean mayor o igual a 6, es decir que sean validos para que la persona devengue esta prestacion
	 *Guardar la liquidacion
	 */
	
	 if($this->mesessemestral>=6){
	  $this->setLiquidacion($Personasgeneral,$Liquidaciones,$devengados);
	 }
	 
	}
		
	private function getSueldoBasico($Personasgeneral,$Liquidaciones){			
			$conversion = ((($this->mesessemestral)*22)/12);
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
					
					$conversion = ((($this->mesessemestral)*22)/12);			
					$antiguedad[0]=round(($Personasgeneral->Empleoplanta->EMPL_SUELDO/30)*((((12)*22)/12))*$factor);
					$antiguedad[1]=round(((($Personasgeneral->Empleoplanta->EMPL_SUELDO)/30)*($conversion)*$factor));
		}

	  return $antiguedad;	
	}
	
	public	function getSubTransporte($Personasgeneral,$Liquidaciones){
	 if($Personasgeneral->Factorsalarial->FASA_SUBTRANSPORTE=="t"){
	  if(($Personasgeneral->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[4][3]) && ($Personasgeneral->Tipocargo->TICA_ID==1)){
		$conversion = ((($this->mesessemestral)*22)/12);
		$valor = ($this->valorestablecidos[5][3]/30)*$conversion;
		return $valor;
	   }
	 }
	 return 0;
	}
		
	public	function getSubAlimentacion($Personasgeneral,$Liquidaciones){
	 if($Personasgeneral->Factorsalarial->FASA_SUBALIMIENTACION=="t"){
	  if(($Personasgeneral->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[2][3]) && ($Personasgeneral->Tipocargo->TICA_ID==1)){
		$conversion = ((($this->mesessemestral)*22)/12);
		$valor = ($this->valorestablecidos[3][3]/30)*$conversion;
		return $valor;
	  }
	 }
	 return 0;
	}
	
	public	function getPrimaTecnica($Personasgeneral,$Liquidaciones){
			$conversion = ((($this->mesessemestral)*22)/12);
			$sueldo = ($Personasgeneral->Empleoplanta->EMPL_SUELDO/30)*($conversion);
			$valor=($sueldo)*($Personasgeneral->Primatecnica->PRTE_PORCENTAJE/100);			
			return ($valor);
	}
		
	public	function getGastosRepresentacion($Personasgeneral,$Liquidaciones){
			$conversion = ((($this->mesessemestral)*22)/12);
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
		  if ($this->mesessemestral==0){
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
				    $conversion = ((($this->mesessemestral)*22)/12);
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
						$conversion = ((($this->mesessemestral)*22)/12);
						
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
	
	private function getNovedades($Personasgeneral,$Liquidaciones)
	{
	 $connection = Yii::app()->db;
	 $this->mesessemestral = NULL;
	 
	 /**
	 *obtenemos la fecha de la ultima liquidacion de la prima semestral de la persona
	 */
	 $sql='SELECT sn."SENO_ID", sn."SENO_PERIODO", sn."SENO_FECHAPROCESO", sn."SENO_ESTADO"
           FROM "TBL_NOMSEMESTRALNOMINA" sn, "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" snl 
           WHERE sn."SENO_ID" = snl."SENO_ID" AND sn."SENO_ANIO" = '.$Liquidaciones->LIQU_ANIO.'
           GROUP BY sn."SENO_ID"
		  ';    		  
     $rows = $connection->createCommand($sql)->queryRow();
	 $fechaultimaliquidacion = $rows['SENO_FECHAPROCESO'];	 
     
	 /**
	 *verificando que la fecha de la ultima liquidacion no sea nula
	 *separando el ultimo mes y ultimo anio de liquidacion
	 */
	 if($fechaultimaliquidacion!=''){
	  $mesultimaliquidacion = date("m", strtotime($fechaultimaliquidacion));
	  $anioultimaliquidacion = date("Y", strtotime($fechaultimaliquidacion));
	 }
     
     /**
	 *obteniendo la fecha de inicio y obteniendo el mes de inicio a partir
	 *de la ultima fecha de liquidacion
	 */	 
	 $fechainicioprima = date("Y", strtotime($fechaultimaliquidacion)).'-07-01';
	 $mesinicioprima = date("m", strtotime($fechainicioprima));
	 
	 /**
	 *separando la fecha de retiro de la persona
	 *obteniendo el ultimo dia del mes en q se retiro
	 */
	 $diaretiro = date("d", strtotime($Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO));
	 $mesretiro = date("m", strtotime($Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO));
	 $anioretiro = date("Y", strtotime($Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO));     
	 $ultimodiamesretiro = date("d",(mktime(0,0,0,$mesretiro+1,1,$anioretiro)-1));	
	 
	 /*
	 echo $mesretiro.' - '.$mesinicioprima.'<br>';
	 echo $diaretiro.' == '.$ultimodiamesretiro.'<br>';
	 echo $diaretiro.' == '.($ultimodiamesretiro-1).'<br>';
     */
	 
	 /**
	 *obteniendo los meses de liquidacion de la prima semestral
	 */
     $meses  = 0;
	 if($anioretiro>$anioultimaliquidacion){
	   $meses = 12-$mesultimaliquidacion+$mesretiro-1;
	  if(($diaretiro==$ultimodiamesretiro) or ($diaretiro==($ultimodiamesretiro-1))){
	    $this->mesessemestral = $meses+1;       	   
	  }else{
	        $this->mesessemestral = $meses;
		   }	  	
	 }else{
	       if($anioretiro==$anioultimaliquidacion){
		     if(($diaretiro==$ultimodiamesretiro) or ($diaretiro==($ultimodiamesretiro-1))){
	          $this->mesessemestral = $mesretiro-$mesinicioprima+1;	 
	         }else{
	               $this->mesessemestral = $mesretiro-$mesinicioprima;
		          }
			}
		  }
	 if($this->mesessemestral>12){$this->mesessemestral = 12; };	  
	 $this->mesessemestral;	
	}
	
	private function setLiquidacion($Personasgeneral,$Liquidaciones,$devengados){
		 $Liqprimasemestral = new Liqprimasemestral; 
		 
         $Liqprimasemestral->PRSE_MESES = $this->mesessemestral;
         $Liqprimasemestral->PRSE_PUNTOS = $Personasgeneral->Empleoplanta->EMPL_PUNTOS;
         $Liqprimasemestral->PRSE_SUELDO = $Personasgeneral->Empleoplanta->EMPL_SUELDO;
         $Liqprimasemestral->PRSE_SALARIO = $devengados[0];
         $Liqprimasemestral->PRSE_PRIMAANTIGUEDAD = $devengados[1];
         $Liqprimasemestral->PRSE_TRANSPORTE  = $devengados[2];
         $Liqprimasemestral->PRSE_ALIMENTACION = $devengados[3];
         $Liqprimasemestral->PRSE_PRIMATECNICA = $devengados[4];
         $Liqprimasemestral->PRSE_GASTOSRP = $devengados[5];
         $Liqprimasemestral->PRSE_BONIFICACION = $devengados[6];
         $Liqprimasemestral->LIQU_ID = $Liquidaciones->LIQU_ID;
         $Liqprimasemestral->EMPL_ID = $Personasgeneral->Empleoplanta->EMPL_ID;
         $Liqprimasemestral->PRSE_FECHACAMBIO = date('Y-m-d H:i:s');
         $Liqprimasemestral->PRSE_REGISTRADOPOR = Yii::app()->user->id;
         $Liqprimasemestral->save();
		 if($Liqprimasemestral->save()){
		 }else{
		       $msg = print_r($Liqprimasemestral->getErrors(),1);
               throw new CHttpException(400,'data not saving: '.$msg );
			  }
    }
	
	public function mostrarLiquidacion($parametros)
	{
	 //echo "<br><br><br>";
	 $connection = Yii::app()->db;
	 $this->liquidacion = NULL; 
	 $sql='SELECT lps."PRSE_ID", lps."PRSE_MESES", lps."PRSE_PUNTOS", lps."PRSE_SUELDO", lps."PRSE_SALARIO", lps."PRSE_PRIMAANTIGUEDAD", lps."PRSE_TRANSPORTE", 
                  lps."PRSE_ALIMENTACION", lps."PRSE_PRIMATECNICA", lps."PRSE_GASTOSRP", lps."PRSE_BONIFICACION", lps."LIQU_ID", lps."EMPL_ID",
                  SUM("PRSE_SALARIO"+"PRSE_PRIMAANTIGUEDAD"+"PRSE_TRANSPORTE"+"PRSE_ALIMENTACION"+"PRSE_PRIMATECNICA"+
                      "PRSE_GASTOSRP"+"PRSE_BONIFICACION") AS "PRSE_TOTAL"
		   FROM "TBL_LIQPRIMASEMESTRAL" lps, "TBL_LIQLIQUIDACIONES" l
		   WHERE l."LIQU_ID" = lps."LIQU_ID" AND lps."LIQU_ID" = '.$parametros.'
		   GROUP BY lps."PRSE_ID"
           ORDER BY lps."LIQU_ID" ASC
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll(); 
	 
	 $array = array('ID LIQUIDACION','MESES','PUNTOS','SUELDO','Sueldo','Prima Antigüedad','Subsidio Transporte','Subsidio Alimentacion',
	                'Prima Tecnica','Gastos Representacion','Bon. de Servicios','ID NOMINA','ID EMPLEO','TOTAL PRIMA SEMESTRAL');
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