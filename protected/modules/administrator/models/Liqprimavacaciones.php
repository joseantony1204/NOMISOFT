<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_LIQPRIMAVACACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_LIQPRIMAVACACIONES':
 * @Propiedad string $PRVA_ID
 * @Propiedad integer $PRVA_MESES
 * @Propiedad string $PRVA_PUNTOS
 * @Propiedad integer $PRVA_SUELDO
 * @Propiedad integer $PRVA_SALARIO
 * @Propiedad integer $PRVA_PRIMAANTIGUEDAD
 * @Propiedad integer $PRVA_TRANSPORTE
 * @Propiedad integer $PRVA_ALIMENTACION
 * @Propiedad integer $PRVA_PRIMATECNICA
 * @Propiedad integer $PRVA_GASTOSRP
 * @Propiedad integer $PRVA_BONIFICACION
 * @Propiedad integer $PRVA_SEMESTRAL
 * @Propiedad integer $LIQU_ID
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $PRVA_FECHACAMBIO
 * @Propiedad integer $PRVA_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad LIQUIDACIONES $lIQU
 */
class Liqprimavacaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Liqprimavacaciones la clase del modelo estàtico.
	 */
	public $mesesprimavacaciones, $valorestablecidos;
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
		return 'TBL_LIQPRIMAVACACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PRVA_MESES, PRVA_PUNTOS, PRVA_SUELDO, PRVA_SALARIO, PRVA_PRIMAANTIGUEDAD, PRVA_TRANSPORTE, PRVA_ALIMENTACION, PRVA_PRIMATECNICA, PRVA_GASTOSRP, PRVA_BONIFICACION, PRVA_SEMESTRAL, LIQU_ID, EMPL_ID, PRVA_FECHACAMBIO, PRVA_REGISTRADOPOR', 'required'),
			array('PRVA_MESES, PRVA_SUELDO, PRVA_SALARIO, PRVA_PRIMAANTIGUEDAD, PRVA_TRANSPORTE, PRVA_ALIMENTACION, PRVA_PRIMATECNICA, PRVA_GASTOSRP, PRVA_BONIFICACION, PRVA_SEMESTRAL, LIQU_ID, EMPL_ID, PRVA_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PRVA_ID, PRVA_MESES, PRVA_PUNTOS, PRVA_SUELDO, PRVA_SALARIO, PRVA_PRIMAANTIGUEDAD, PRVA_TRANSPORTE, PRVA_ALIMENTACION, PRVA_PRIMATECNICA, PRVA_GASTOSRP, PRVA_BONIFICACION, PRVA_SEMESTRAL, LIQU_ID, EMPL_ID, PRVA_FECHACAMBIO, PRVA_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'PRVA_ID' => 'PRVA',
						'PRVA_MESES' => 'PRVA MESES',
						'PRVA_PUNTOS' => 'PRVA PUNTOS',
						'PRVA_SUELDO' => 'PRVA SUELDO',
						'PRVA_SALARIO' => 'PRVA SALARIO',
						'PRVA_PRIMAANTIGUEDAD' => 'PRVA PRIMAANTIGUEDAD',
						'PRVA_TRANSPORTE' => 'PRVA TRANSPORTE',
						'PRVA_ALIMENTACION' => 'PRVA ALIMENTACION',
						'PRVA_PRIMATECNICA' => 'PRVA PRIMATECNICA',
						'PRVA_GASTOSRP' => 'PRVA GASTOSRP',
						'PRVA_BONIFICACION' => 'PRVA BONIFICACION',
						'PRVA_SEMESTRAL' => 'PRVA SEMESTRAL',
						'LIQU_ID' => 'LIQU',
						'EMPL_ID' => 'EMPL',
						'PRVA_FECHACAMBIO' => 'PRVA FECHACAMBIO',
						'PRVA_REGISTRADOPOR' => 'PRVA REGISTRADOPOR',
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

		$criteria->compare('PRVA_ID',$this->PRVA_ID,true);
		$criteria->compare('PRVA_MESES',$this->PRVA_MESES);
		$criteria->compare('PRVA_PUNTOS',$this->PRVA_PUNTOS,true);
		$criteria->compare('PRVA_SUELDO',$this->PRVA_SUELDO);
		$criteria->compare('PRVA_SALARIO',$this->PRVA_SALARIO);
		$criteria->compare('PRVA_PRIMAANTIGUEDAD',$this->PRVA_PRIMAANTIGUEDAD);
		$criteria->compare('PRVA_TRANSPORTE',$this->PRVA_TRANSPORTE);
		$criteria->compare('PRVA_ALIMENTACION',$this->PRVA_ALIMENTACION);
		$criteria->compare('PRVA_PRIMATECNICA',$this->PRVA_PRIMATECNICA);
		$criteria->compare('PRVA_GASTOSRP',$this->PRVA_GASTOSRP);
		$criteria->compare('PRVA_BONIFICACION',$this->PRVA_BONIFICACION);
		$criteria->compare('PRVA_SEMESTRAL',$this->PRVA_SEMESTRAL);
		$criteria->compare('LIQU_ID',$this->LIQU_ID);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('PRVA_FECHACAMBIO',$this->PRVA_FECHACAMBIO,true);
		$criteria->compare('PRVA_REGISTRADOPOR',$this->PRVA_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getPrimavacaciones($Personasgeneral,$Liquidaciones)
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
	 
	 $tdevengado=round($basico)+round($subTransporte)+round($subAlimentacion)+round($primatec)+round($gastosrp)+round($prantiguedad[1])+round($bonserv)+round($primasemestral);
	 $devengados = array($basico,round($prantiguedad[1]),$subTransporte,$subAlimentacion,$primatec,$gastosrp,$bonserv,$primasemestral,$tdevengado);
	 
	 /**
	 *Guardar la liquidacion
	 */
	 $this->setLiquidacion($Personasgeneral,$Liquidaciones,$devengados);
	 
	 
	}
	
	private function getSueldoBasico($Personasgeneral,$Liquidaciones){
			$sueldo = ((($Personasgeneral->Empleoplanta->EMPL_SUELDO)/2)/12)*($this->mesesprimavacaciones);
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
					
					$antiguedad[0]=round((((($Personasgeneral->Empleoplanta->EMPL_SUELDO)/2)/12)*(12))*$factor);
					$antiguedad[1]=round((((($Personasgeneral->Empleoplanta->EMPL_SUELDO)/2)/12)*($this->mesesprimavacaciones))*$factor);
		}

	  return $antiguedad;	
	}
	
	public	function getSubTransporte($Personasgeneral,$Liquidaciones){
	 if($Personasgeneral->Factorsalarial->FASA_SUBTRANSPORTE=="t"){
	  if(($Personasgeneral->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[4][3]) && ($Personasgeneral->Tipocargo->TICA_ID==1)){
		$valor = ((($this->valorestablecidos[5][3])/2)/12)*($this->mesesprimavacaciones);
		return $valor;
	   }
	 }
	 return 0;
	}
		
	public	function getSubAlimentacion($Personasgeneral,$Liquidaciones){
	 if($Personasgeneral->Factorsalarial->FASA_SUBALIMIENTACION=="t"){
	  if(($Personasgeneral->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[2][3]) && ($Personasgeneral->Tipocargo->TICA_ID==1)){
		$valor = ((($this->valorestablecidos[3][3])/2)/12)*($this->mesesprimavacaciones);
		return $valor;
	  }
	 }
	 return 0;
	}
	
	public	function getPrimaTecnica($Personasgeneral,$Liquidaciones){
			$sueldo = ((($Personasgeneral->Empleoplanta->EMPL_SUELDO)/2)/12)*($this->mesesprimavacaciones);
			$valor=($sueldo)*($Personasgeneral->Primatecnica->PRTE_PORCENTAJE/100);			
			return ($valor);
	}
		
	public	function getGastosRepresentacion($Personasgeneral,$Liquidaciones){
			$sueldo = ((($Personasgeneral->Empleoplanta->EMPL_SUELDO)/2)/12)*($this->mesesprimavacaciones);
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
		  if ($this->mesesprimavacaciones==0){
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
			        $valor = ((($bonificacion)/2)/12)*($this->mesesprimavacaciones);			        
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
						 $valor3 = ((($valor2)/2)/12);
						 $valor4 = ($valor3)*($this->mesesprimavacaciones);
						 return $valor4;
						}else{ 
							  $valor1 = ($Personasgeneral->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica($Personasgeneral,$Liquidaciones));
						      $valor2 = ($valor1+($this->getGastosRepresentacion($Personasgeneral,$Liquidaciones))+round($prantiguedad[0]))*($this->valorestablecidos[9][3]/100);
						      $valor3 = ((($valor2)/2)/12);
						      $valor4 = ($valor3)*($this->mesesprimavacaciones);
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
	                   snl."SENL_GASTOSRP"+snl."SENL_BONIFICACION")/12 AS "SENL_DEVENGADO"
			  FROM "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" snl, "TBL_NOMSEMESTRALNOMINA" sn,  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" "p"
			  WHERE sn."SENO_ID" = snl."SENO_ID" AND snl."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID" 
			  AND p."PEGE_ID" = '.$Personasgeneral->Personageneral->PEGE_ID.'
              AND sn."SENO_ANIO" = '.$Liquidaciones->LIQU_ANIO.'		  
			  ';
	 $primasemestral = $connection->createCommand($query)->queryScalar();
	 $valor1 = ((($primasemestral)/2)/12);
	 $valor2 = ($valor1)*($this->mesesprimavacaciones);
	 return $valor2;		
    }
	
	private function getNovedades($Personasgeneral,$Liquidaciones)
	{
	 $connection = Yii::app()->db;
	 $this->mesesprimavacaciones = NULL;
	 /**
	 *obtenemos la fecha de la ultima liquidacion de las vacaciones de la persona
	 */
	 $sql='SELECT mn."MENO_ID", mn."MENO_PERIODO", mn."MENO_FECHAPROCESO", mn."MENO_ESTADO", mnl."MENL_PRIMAVACACIONES"
           FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINA" mn, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl 
           WHERE p."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID"
           AND p."PEGE_ID" = '.$Personasgeneral->Personageneral->PEGE_ID.' AND mnl."MENL_PRIMAVACACIONES">0
           GROUP BY mn."MENO_ID", mnl."MENL_ID"
           ORDER BY mn."MENO_FECHAPROCESO" DESC
           LIMIT 1
		  ';    		  
     $rows = $connection->createCommand($sql)->queryRow();
	 $fechaultimaliquidacion = $rows['MENO_FECHAPROCESO'];
	 
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
	   $fechainicioprimavacaciones = $anioultimaliquidacion.'-'.$mesingreso .'-'.$diaringreso;
	   $mesinicioprimavacaciones = date("m", strtotime($fechainicioprimavacaciones));
	  }elseif($anioultimaliquidacion==(date('Y')-1)){
	    $fechainicioprimavacaciones = date('Y').'-'.$mesingreso .'-'.$diaringreso;
	    $mesinicioprimavacaciones = date("m", strtotime($fechainicioprimavacaciones));
	  }
	  
	 /**
	 *separando la fecha de retiro de la persona
	 *obteniendo el ultimo dia del mes en q se retiro
	 */
	 $diaretiro = date("d", strtotime($Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO));
	 $mesretiro = date("m", strtotime($Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO));
	 $anioretiro = date("Y", strtotime($Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO));     
	 $ultimodiamesretiro = date("d",(mktime(0,0,0,$mesretiro+1,1,$anioretiro)-1));
	 
	
	 //echo 'retirando el: '.$mesretiro.' - vacaciones inicial el: '.$mesinicioprimavacaciones.'<br>';
     
	 /**
	 *calculando los meses de liquidacion de las vacaciones
	 */
	 $meses  = 0;
	 // echo '<br>'.$anioretiro.' > '.$anioultimaliquidacion.' - ciclo (1.0)<br>';
	 if($anioretiro>$anioultimaliquidacion){
	   $meses = $mesretiro-$mesinicioprimavacaciones-1;
	   //echo '<br>'.$diaretiro.' == '.$ultimodiamesretiro.' o '.$diaretiro.' == '.($ultimodiamesretiro-1).' - ciclo (1.1)<br>';
	  if(($diaretiro==$ultimodiamesretiro) or ($diaretiro==($ultimodiamesretiro-1))){
	    $this->mesesprimavacaciones = $meses+1;       	   
	  }else{
	        $this->mesesprimavacaciones = $meses;
		   }	  	
	 }else{
	      // echo '<br>'.$anioretiro.' == '.$anioultimaliquidacion.' - ciclo (2.0)<br>';
	       if($anioretiro==$anioultimaliquidacion){
		      $meses = $mesretiro-$mesinicioprimavacaciones-1;
			  //echo '<br>'.$diaretiro.' == '.$ultimodiamesretiro.' o '.$diaretiro.' == '.($ultimodiamesretiro-1).' - ciclo (2.1)<br>';
			 if(($diaretiro==$ultimodiamesretiro) or ($diaretiro==($ultimodiamesretiro-1))){
	           $this->mesesprimavacaciones = $mesretiro-$mesinicioprimavacaciones+1;	 
	         }else{
	               $this->mesesprimavacaciones = $meses;
		          }  
			}
		  }
		  
	 if($this->mesesprimavacaciones>12){$this->mesesprimavacaciones = 12; }elseif($this->mesesprimavacaciones<0){$this->mesesprimavacaciones = 0;};
	 $this->mesesprimavacaciones;
	}
	
	private function setLiquidacion($Personasgeneral,$Liquidaciones,$devengados){
		 $Liqprimavacaciones = new Liqprimavacaciones; 
		 
         $Liqprimavacaciones->PRVA_MESES = $this->mesesprimavacaciones;
         $Liqprimavacaciones->PRVA_PUNTOS = $Personasgeneral->Empleoplanta->EMPL_PUNTOS;
         $Liqprimavacaciones->PRVA_SUELDO = $Personasgeneral->Empleoplanta->EMPL_SUELDO;
         $Liqprimavacaciones->PRVA_SALARIO = $devengados[0];
         $Liqprimavacaciones->PRVA_PRIMAANTIGUEDAD = $devengados[1];
         $Liqprimavacaciones->PRVA_TRANSPORTE  = $devengados[2];
         $Liqprimavacaciones->PRVA_ALIMENTACION = $devengados[3];
         $Liqprimavacaciones->PRVA_PRIMATECNICA = $devengados[4];
         $Liqprimavacaciones->PRVA_GASTOSRP = $devengados[5];
         $Liqprimavacaciones->PRVA_BONIFICACION = $devengados[6];
         $Liqprimavacaciones->PRVA_SEMESTRAL = $devengados[7];
         $Liqprimavacaciones->LIQU_ID =  $Liquidaciones->LIQU_ID;
         $Liqprimavacaciones->EMPL_ID = $Personasgeneral->Empleoplanta->EMPL_ID;
         $Liqprimavacaciones->PRVA_FECHACAMBIO = date('Y-m-d H:i:s');
         $Liqprimavacaciones->PRVA_REGISTRADOPOR = Yii::app()->user->id;
         $Liqprimavacaciones->save();
		 if($Liqprimavacaciones->save()){
		 }else{
		       $msg = print_r($Liqprimavacaciones->getErrors(),1);
               throw new CHttpException(400,'data not saving: '.$msg );
			  }
    }
	
	public function mostrarLiquidacion($parametros)
	{
	 //echo "<br><br><br>";
	 $connection = Yii::app()->db;
	 $this->liquidacion = NULL; 
	 $sql='SELECT "PRVA_ID", "PRVA_MESES", "PRVA_PUNTOS", "PRVA_SUELDO", "PRVA_SALARIO", "PRVA_PRIMAANTIGUEDAD", "PRVA_TRANSPORTE", "PRVA_ALIMENTACION", 
                  "PRVA_PRIMATECNICA", "PRVA_GASTOSRP", "PRVA_BONIFICACION", "PRVA_SEMESTRAL", lpv."LIQU_ID", "EMPL_ID", 
                  SUM("PRVA_SALARIO"+"PRVA_PRIMAANTIGUEDAD"+"PRVA_TRANSPORTE"+"PRVA_ALIMENTACION"+"PRVA_PRIMATECNICA"+"PRVA_GASTOSRP"+
                      "PRVA_BONIFICACION"+"PRVA_SEMESTRAL") AS "PRVA_TOTALPRIMAVACACIONES"
		  FROM "TBL_LIQPRIMAVACACIONES" lpv, "TBL_LIQLIQUIDACIONES" l
		  WHERE l."LIQU_ID" = lpv."LIQU_ID" AND lpv."LIQU_ID" = '.$parametros.'
		  GROUP BY lpv."PRVA_ID"
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll(); 
	 
	 $array = array('ID LIQUIDACION','MESES','PUNTOS','SUELDO','Sueldo','Prima Antigüedad','Subsidio Transporte','Subsidio Alimentacion',
	                'Prima Tecnica','Gastos Representacion','Bon. de Servicios','Prima de Servicios','ID NOMINA','ID EMPLEO','TOTAL PRIMA VACACIONES');
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