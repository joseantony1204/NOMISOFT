<?php
set_time_limit(0);
/**
 * Esta es la clase de modelo para la tabla "TBL_NOMSEMESTRALNOMINA".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMSEMESTRALNOMINA':
 * @Propiedad string $SENO_ID
 * @Propiedad string $SENO_PERIODO
 * @Propiedad string $SENO_FECHAPROCESO
 * @Propiedad boolean $SENO_ESTADO
 * @Propiedad integer $SENO_ANIO
 * @Propiedad string $SENO_FECHACAMBIO
 * @Propiedad integer $SENO_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad SEMESTRALNOMINALIQUIDACIONES[] $sEMESTRALNOMINALIQUIDACIONESs
 */
class Semestralnomina extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Semestralnomina la clase del modelo estàtico.
	 */
	public $codigo, $error; 
	public $SENO_DETALLES;
	public $liquidacion, $descuentos;
	public $devengados;
	public $success, $warning, $flag;
	public $s, $w, $f; 
	public $mesessemestral, $valorestablecidos; 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMSEMESTRALNOMINA';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('SENO_ID, SENO_PERIODO, SENO_FECHAPROCESO, SENO_ESTADO, SENO_ANIO, SENO_FECHACAMBIO, SENO_REGISTRADOPOR', 'required'),
			array('SENO_ANIO, SENO_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('SENO_PERIODO', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('SENO_ID, SENO_PERIODO, SENO_FECHAPROCESO, SENO_ESTADO, SENO_ANIO, SENO_FECHACAMBIO, SENO_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'sEMESTRALNOMINALIQUIDACIONESs' => array(self::HAS_MANY, 'SEMESTRALNOMINALIQUIDACIONES', 'SENO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'SENO_ID' => 'CODIGO',
						'SENO_PERIODO' => 'PERIODO',
						'SENO_FECHAPROCESO' => 'FECHA PROCESO',
						'SENO_ESTADO' => 'ESTADO',
						'SENO_ANIO' => 'AÑO',
						'SENO_FECHACAMBIO' => 'SENO FECHACAMBIO',
						'SENO_REGISTRADOPOR' => 'SENO REGISTRADOPOR',
						'SENO_DETALLES' => 'DETALLES',
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
		$sort->defaultOrder = 't."SENO_ID" DESC';
		$sort->attributes = array(
			
			'SENO_ID'=>array(
				'asc'=>'t."SENO_ID"',
				'desc'=>'t."SENO_ID" desc',
			),
			
			'SENO_PERIODO'=>array(
				'asc'=>'t."SENO_PERIODO"',
				'desc'=>'t."SENO_PERIODO" desc',
			),
			
			'SENO_FECHAPROCESO'=>array(
				'asc'=>'t."SENO_FECHAPROCESO"',
				'desc'=>'t."SENO_FECHAPROCESO" desc',
			),
			
			'SENO_ESTADO'=>array(
				'asc'=>'t."SENO_ESTADO"',
				'desc'=>'t."SENO_ESTADO" desc',
			),
			
			'SENO_ANIO'=>array(
				'asc'=>'t."SENO_ANIO"',
				'desc'=>'t."SENO_ANIO" desc',
			),
		);

		$criteria=new CDbCriteria;

		$criteria->compare('SENO_ID',$this->SENO_ID,true);
		$criteria->compare('SENO_PERIODO',$this->SENO_PERIODO,true);
		$criteria->compare('SENO_FECHAPROCESO',$this->SENO_FECHAPROCESO,true);
		$criteria->compare('SENO_ESTADO',$this->SENO_ESTADO);
		$criteria->compare('SENO_ANIO',$this->SENO_ANIO);
		$criteria->compare('SENO_FECHACAMBIO',$this->SENO_FECHACAMBIO,true);
		$criteria->compare('SENO_REGISTRADOPOR',$this->SENO_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 50),
		));
	}
	
	public function getEstado()
	{
		if($this->SENO_ESTADO==0){
		 $imageUrl = 'spellcheck_error.png';
		}else{
		      $imageUrl = 'spellcheck.png';
			 }
        return Yii::app()->baseurl.'/images/nomina/'.$imageUrl;		
	}
	
	public function validarNomina($Semestralnomina){
	  $this->error = "";
	  $connection = Yii::app()->db;
	  
	  $sql = 'SELECT  "SENO_ID", "SENO_ESTADO" FROM "TBL_NOMSEMESTRALNOMINA" sn ORDER BY  "SENO_ID" DESC LIMIT 1';
	  $rows = $connection->createCommand($sql)->queryRow();  
	  
      if (count($rows)>0){
	   if (($rows["SENO_ID"])==($Semestralnomina->SENO_ID)){
	     $this->error="Parece que ya se ha liquidado una nomina para este periodo : ".$Semestralnomina->SENO_PERIODO;
	    }
      }
     return $this->error;	  
	}
	
	public function liquidarNomina($Semestralnomina){
	 $connection = Yii::app()->db; 
	 $this->success = NULL; $this->warning = NULL; $this->flag = NULL;
	 $this->s = 0; $this->w = 0; $this->f = 0;
	 $Personasgenerales = new Personasgenerales;
	 $Parametrosglobales = new Parametrosglobales; 	 
     $this->valorestablecidos = $Parametrosglobales->getParametrosglobales(date("Y", strtotime($Semestralnomina->SENO_FECHAPROCESO)));
	 
	
	 /**
	 *consultar todos los empleados que fueron liquidados en el periodo que vienes el retroactivo
	 **/
	 $sql = 'SELECT pg."PEGE_ID" 
	         FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl
             WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" /*AND pg."PEGE_ID" = 2990*/ /*1130 1580*/
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
	   if(((date("Y", strtotime($Personasgenerales->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("Y", strtotime($Semestralnomina->SENO_FECHAPROCESO)))) &
	     ((date("m", strtotime($Personasgenerales->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("m", strtotime($Semestralnomina->SENO_FECHAPROCESO))))){
	     $sw = 0; 			 
	   }
	  }
	 
	  /*si todo esta bn se procede a calcular la nomina para la persona*/
	  if(($sw==0) & ($Personasgenerales->Tipocargo->TICA_ID!=3)){
	   $this->getnovedades($Personasgenerales); 
	   
	   $basico = round($this->getSueldoBasico($Personasgenerales,$Semestralnomina));
	   
	   $subTransporte = round($this->getSubTransporte($Personasgenerales,$Semestralnomina));
       $prAlimenta = round($this->getSubAlimentacion($Personasgenerales,$Semestralnomina));
       $prantiguedad = $this->getPrimaAntiguedad($Personasgenerales,$Semestralnomina); 
       $prantiguedad[1];
       
	   $primatec = round($this->getPrimaTecnica($Personasgenerales,$Semestralnomina));
	   $gastosrp = round($this->getGastosRepresentacion($Personasgenerales,$Semestralnomina));	   
	   $bonserv = round($this->getBonServiciosPrestados($Personasgenerales,$Semestralnomina));
	   $tdevengado=round($basico)+round($subTransporte)+round($prAlimenta)+round($primatec)+round($gastosrp)+round($prantiguedad[1],$bonserv);
	   $retefuente = round($this->getRetefuente($Personasgenerales,$Semestralnomina,$tdevengado));
	   
	   $this->devengados[$iterador] = array($basico,round($prantiguedad[1]),$subTransporte,$prAlimenta,$primatec,$gastosrp,$bonserv,$retefuente,$tdevengado);
         
	  $criteria = new CDbCriteria();
	  $criteria->select = 't."NOPS_ID"';
	  $criteria->condition = 't."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID;
	  $criteria->order = 't."NOPS_ID"';	  
	  $Novedadprimasemestral = Novedadesprimasemestral::model()->find($criteria);	  
	  $Novedadesprimasemestral = Novedadesprimasemestral::model()->findByPk($Novedadprimasemestral->NOPS_ID);	 
	  
	  if($Novedadesprimasemestral->NOPS_MESES>=12){
	   $this->setLiquidacion($Personasgenerales,$Semestralnomina,$this->devengados[$iterador]);
       $this->codigo = $this->codigo+1;	   
       $iterador = $iterador+1;
	  }elseif($Novedadesprimasemestral->NOPS_MESES>=6){
	        $this->setLiquidacion($Personasgenerales,$Semestralnomina,$this->devengados[$iterador]);
		    $this->codigo = $this->codigo+1;	   
		    $iterador = $iterador+1;
	  }elseif($Novedadesprimasemestral->NOPS_MESES<6){
	        if($Novedadesprimasemestral->NOPS_CONTINUIDAD==1){
			 $this->setLiquidacion($Personasgenerales,$Semestralnomina,$this->devengados[$iterador]);
             $this->codigo = $this->codigo+1;	   
             $iterador = $iterador+1;
			}
	   }		   
	  }	
	 }	
    }
	
	private function getSueldoBasico($Personasgenerales,$Semestralnomina){
			$sueldo = ($Personasgenerales->Empleoplanta->EMPL_SUELDO)*(($this->mesessemestral)/12);
		return ($sueldo);
    }
	
	public	function getPrimaAntiguedad($Personasgenerales,$Semestralnomina){
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
					$antiguedad[1]=round((($Personasgenerales->Empleoplanta->EMPL_SUELDO)*($this->mesessemestral)*$factor/12));
		}

	  return $antiguedad;	
	}
	
	public	function getSubTransporte($Personasgenerales,$Semestralnomina){
	 if($Personasgenerales->Factorsalarial->FASA_SUBTRANSPORTE==1){
	  if(($Personasgenerales->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[4][3]) && ($Personasgenerales->Tipocargo->TICA_ID==1)){
		return ($this->valorestablecidos[5][3]*($this->mesessemestral)/12);
	   }
	 }
	 return 0;
	}
		
	public	function getSubAlimentacion($Personasgenerales,$Semestralnomina){
	 if($Personasgenerales->Factorsalarial->FASA_SUBALIMIENTACION==1){
	  if(($Personasgenerales->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[2][3]) && ($Personasgenerales->Tipocargo->TICA_ID==1)){
		return ($this->valorestablecidos[3][3]*($this->mesessemestral)/12);
	  }
	 }
	 return 0;
	}
	
	public	function getPrimaTecnica($Personasgenerales,$Semestralnomina){
			$sueldo = ($Personasgenerales->Empleoplanta->EMPL_SUELDO)*(($this->mesessemestral)/12);
			$valor=($sueldo)*($Personasgenerales->Primatecnica->PRTE_PORCENTAJE/100);			
			return ($valor);
	}
		
	public	function getGastosRepresentacion($Personasgenerales,$Semestralnomina){
			$sueldo = ($Personasgenerales->Empleoplanta->EMPL_SUELDO)*(($this->mesessemestral)/12);
			$valor=($sueldo)*($Personasgenerales->Gastorepresentacion->GARE_PORCENTAJE/100);			
			return ($valor);
	}
	
	private	function getBonServiciosPrestados($Personasgenerales,$Semestralnomina){
	 $connection = Yii::app()->db;
	 $prantiguedad = $this->getPrimaAntiguedad($Personasgenerales,$Semestralnomina);	 
	 $fecha = $Personasgenerales->Personageneral->PEGE_FECHAINGRESO;
	 
	 /* 001. inicio verificar si el empleado no es docente ocacional */ 
	 if($Personasgenerales->Tipocargo->TICA_ID!=3){		 
	  /* 01. inicio verificar si tiene BSP*/  
	  if ($Personasgenerales->Factorsalarial->FASA_BSP==1){
		  if ($this->mesessemestral<12){
		   return 0;
		  }else{
				  $sql ='SELECT ROUND(SUM("BONIFICACION")/12)
						   FROM ( 
								 SELECT SUM("RANL_BONIFICACION") AS "BONIFICACION" 
								 FROM  "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMRETROACTIVOSNOMINA" rn, "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" rnl
								 WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND rn."RANO_ID" = rnl."RANO_ID" 
								 AND mnl."MENL_ID" = rnl."MENL_ID" AND pg."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
								 AND rn."RANO_ID" = '.$Semestralnomina->SENO_ANIO.'
								 UNION ALL
								 SELECT SUM("MENL_BONIFICACION") AS "BONIFICACION" 
								 FROM  "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn
								 WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" 
								 AND pg."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
								 AND mn."MENO_ID" >= '.$Semestralnomina->SENO_ANIO.'0101 AND mn."MENO_ID" <= '.$Semestralnomina->SENO_ANIO.'0601
							   ) t
						  ';
				  $bonificacion = $connection->createCommand($sql)->queryScalar();
				  if($bonificacion!=0){
				   return round($bonificacion/12*$this->mesessemestral);
				  }else{	
				        //En caso de que no halla cumplido anio de servicio aun se le calcula//
				        //como el limite establecido es diferente del profesor al administrativo,//
						//Este condicional verifica quien es quien para obtener asi el limite//
						if($Personasgenerales->Tipocargo->TICA_ID==1){
						 $bon=$this->valorestablecidos[6][3];
						}else{ 
						 	  $bon=$this->valorestablecidos[7][3];
						     }
							 
						if(($Personasgenerales->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica($Personasgenerales,$Semestralnomina))+($this->getGastosRepresentacion($Personasgenerales,$Semestralnomina))+$prantiguedad[0]>$bon){
						 return ((($Personasgenerales->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica($Personasgenerales,$Semestralnomina))+($this->getGastosRepresentacion($Personasgenerales,$Semestralnomina))+round($prantiguedad[0]))*($this->valorestablecidos[8][3]/100)/12)*$this->mesessemestral/12;
						}else{ 
							  return ((($Personasgenerales->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica($Personasgenerales,$Semestralnomina))+($this->getGastosRepresentacion($Personasgenerales,$Semestralnomina))+round($prantiguedad[0]))*($this->valorestablecidos[9][3]/100)/12)*$this->mesessemestral/12;
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
	
	/**
	 *Inicio de metodos de calculo de retencion en la fuente
	*/	
	//private	function getRetefuente($salud,$pension,$fondosp,$tdevengado){		 
	private	function getRetefuente($Personasgenerales,$Semestralnomina,$tdevengado){		 
	    /**
	     *En esta primera condicion se mira si es docente y se recalcula nuevamente el total devengado con la suma
	     *de la prima de antiguedad; sueldo por los dias trabajados. Luego se le calcula el 50% de dicha suma.
	     *Tambien se le agrega la bonificacion pero no el 50% de esta bonificacion sino completa
	    */
		/**
		 *Se verifica si es docente
		*/
		if($Personasgenerales->Tipocargo->TICA_ID==2){
		 $prantiguedad = $this->getPrimaAntiguedad($Personasgenerales,$Semestralnomina);		 
		 $valor = ((($Personasgenerales->Empleoplanta->EMPL_SUELDO)*($this->mesessemestral)/12));
		 
		 /**
		 *Se declara la variable $valor con el resultado del condicional
		 */
		 $valor = (($valor+$prantiguedad[1])/2)+$this->getBonServiciosPrestados($Personasgenerales,$Semestralnomina);		
		}elseif($Personasgenerales->Tipocargo->TICA_ID==1){
		 /**
		  *Si el empleado es administrativo se toma el total devengado que viene como parametro. 
		 */
		 $valor = $tdevengado;
		 
		  /**
		   *Si el empleado es el rector (Nivel = 1; Grado = 17), se exceptua el Gasto de representacion tal y como esta en el sigte condicional
		  */   
          if(($Personasgenerales->Empleoplanta->NIVE_ID==1) && ($Personasgenerales->Empleoplanta->GRAD_ID==17)){
   	       $valor = $valor-round($this->getGastosRepresentacion($Personasgenerales,$Semestralnomina));
          }
         }
		 
		 /**
		   *Recalcular  $valor teniendo en cuenta los factores de retefuente
		   *Menos: Deducciones del art. 387 del E.T.
		 */
		 $valor = $valor-($this->getFactorRetefuente($Personasgenerales,$Semestralnomina,1)+$this->getFactorRetefuente($Personasgenerales,$Semestralnomina,2)+$this->getFactorRetefuente($Personasgenerales,$Semestralnomina,3));
		 
		 /**
		   *Recalcular  $valor teniendo en lo siguiente :
		   *Menos: Deducción por aportes a salud obligatoria
		   *-Aporte mensual promedio que hizo  durante el año gravable anterior por aportes obligatorios
		   *a salud (Ver concepto DIAN 81294 oct./09; y Dec. 2271 de junio de 2009 )
		 */
		 $valor = $valor-($this->getPagoSaludAnioAnterior($Personasgenerales,$Semestralnomina));
		 /**
		   *Recalcular  $valor teniendo en lo siguiente :
		   *Menos: Deducciones del art. 4 del decreto 2271 de junio de 2009
		   *-Aportes a salud del propio mes que el cobrador de servicios demuestre estar realizando
		 */
		 //$valor = $valor-($salud);
		 $valor = $valor-(0);
		 
		 /**
		   *Recalcular  $valor teniendo en lo siguiente :
		   *Menos: Rentas exentas del art. 126-1 y 126-4 del E.T
		   *-Aportes obligatorios del propio mes a los fondos de pensiones 
		   *-Aportes voluntarios del propio mes a los fondos de pensiones voluntarias 
		   *-Aportes voluntarios del propio mes a las cuentas de ahorro AFC 
		 */
		 //echo '<br><br><br>';
		 //$valor = $valor-($pension+$fondosp+$this->getDescuentosMensuales(28)+0);
		 $valor = $valor-(0+0+$this->getDescuentosMensuales($Personasgenerales,$Semestralnomina,28)+0);
		 
		 /**
		   *Recalcular  $valor teniendo en lo siguiente :
		   *Menos: El 25% del $valor, sin que mensualmente exceda de 240 UVTs (es decir, 240 x $27.485 = $6.596.000 ) 
		   *(ver numeral 10 del art. 206 del E.T. que fue modificado con el art. 6 de la Ley 1607)   
		 */		
         $valor=$valor-($valor*0.25);
		 
		 if($Personasgenerales->Factorsalarial->FASA_RETEFUENTE==1){
		  $uvt=$this->valorestablecidos[10][3];	
		  $rango=$valor/$uvt;
		  if ($rango>0 and $rango<=95){
		   $total = 0;
		  }
		  if ($rango>95 and $rango<=150){
		   $total=($rango-95)*0.19;
		  }
		  if ($rango>150 and $rango<=360){
		   $total=($rango-150)*0.28+10;
		  }
		  if ($rango>360){
		   $total=($rango-360)*0.33+69;
		  }
		 // echo '<br><br><br>'.round($total*$uvt);
		 return round($total*$uvt);		
		}
		
		return 0;	
	}
	
	private	function getFactorRetefuente($Personasgenerales,$Semestralnomina,$factor){
		$connection = Yii::app()->db;
		$sql = 'SELECT "DERE_VALOR" 
		        FROM "TBL_NOMDESCUENTOSRETEFUENTE" "drf" 
				WHERE "PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.' AND "FARE_ID" = '.$factor;
		$row = $connection->createCommand($sql)->queryRow();
	    $valor = $row["DERE_VALOR"];		 
		return $valor; 	
	}
	
	private	function getDescuentosMensuales($Personasgenerales,$Semestralnomina,$descuento){
		$connection = Yii::app()->db;
		$sql = 'SELECT "NOME_VALOR" 
		        FROM "TBL_NOMNOVEDADESMENSUALES" "drf" 
				WHERE "EMPL_ID" = '.$Personasgenerales->Empleoplanta->EMPL_ID.' AND "DEME_ID" = '.$descuento;
		$row = $connection->createCommand($sql)->queryRow();
	    $valor = $row["NOME_VALOR"];		 
		return $valor; 	
	}
	
	private	function getPagoSaludAnioAnterior($Personasgenerales,$Semestralnomina){
		$connection = Yii::app()->db;
		/**
		*se verifica la salud que pago el empleado desde enero hasta diciembre del año anteior
		*/
		$anioAnterior = (date("Y", strtotime($Semestralnomina->SENO_FECHAPROCESO))-1);
		$valor = 0; $item = 0; $salud = 0;
		//echo '<br><br><br>';
		for($i=1;$i<=12;$i++){
		if($i<10){$i = '0'.$i;}
		 $sql = 'SELECT mnl."MENO_ID", SUM("MENP_SALUDTOTAL") AS "MENP_SALUDTOTAL"
                 FROM "TBL_NOMEMPLEOSPLANTA" "ep", "TBL_NOMMENSUALNOMINA" "mn", "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl", "TBL_NOMMENSUALNOMINAPARAFISCALES" "mnp"
                 WHERE ep."EMPL_ID" = mnl."EMPL_ID" 
				 AND mn."MENO_ID" = mnl."MENO_ID" 
				 AND mnl."MENL_ID" = mnp."MENL_ID" 
				 AND ep."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
				 AND mn."MENO_ANIO" = '.$anioAnterior.' AND mn."MENO_ID" = '."'".$anioAnterior.$i."01'".'
				 GROUP BY mnl."MENL_ID"';
				 
		 $row = $connection->createCommand($sql)->queryRow();
		 if($row['MENO_ID']!=''){
		  $item = $item + 1;
		  $valor = $row["MENP_SALUDTOTAL"];
		  $salud = $salud + $valor;	  
		 }
		 //echo $i.' '.$item.'<br>';
		}
        
		/**
		*si tiene 12 o mas meses pagos durante el año anterior se promedia normal con 12 meses
		*de lo contrario se promedia con los meses pagados
		*/
		//echo $salud;
		if($item>=12){
		 $salud = round($salud/12);	
		}else{
		      if($item>0){
			   $salud = round($salud/$item);
			  }		 
			 }		 
		//echo $salud;	 
		return $salud; 	
	}
	
	/**
	 *Fin de metodos de calculo de retencion en la fuente
	*/
	
	private function getnovedades($Personasgenerales){
	 $connection = Yii::app()->db;
	 $this->mesessemestral = NULL;	 
	 /**
	 *Consulta los meses que se le liquidaran al empleado desde la tabla  TBL_NOMNOVEDADESPRIMASEMESTRAL
	 **/
	  $sql = 'SELECT "NOPS_ID"
                       FROM "TBL_NOMNOVEDADESPRIMASEMESTRAL" nps 
                       WHERE nps."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
	         ';
	  $primarykey = $connection->createCommand($sql)->queryScalar();
	  $Novedadesprimasemestral = Novedadesprimasemestral::model()->findByPk($primarykey);	 
	  
	  if($Novedadesprimasemestral->NOPS_MESES>=12){
	   $meses = 12;
	  }elseif($Novedadesprimasemestral->NOPS_MESES>=6){
	        $meses = $Novedadesprimasemestral->NOPS_MESES;
	  }elseif($Novedadesprimasemestral->NOPS_MESES<6){
	        if($Novedadesprimasemestral->NOPS_CONTINUIDAD==1){
			 $meses = $Novedadesprimasemestral->NOPS_MESES;
			}else{
			      $meses = 0;
				 }
	  }		   
     $this->mesessemestral = $meses; 
	}
	
	private function setLiquidacion($Personasgenerales,$Semestralnomina,$devengados){
	     $connection = Yii::app()->db;
		 $Semestralnominaliquidaciones = new Semestralnominaliquidaciones;
		 
		 /**
		 *consulta de los descuentos de la prima semestral de la persona
		 */
		 $sql='SELECT dp."DEPR_ID", ROUND(np."NOPR_VALOR") AS "NOPR_VALOR"
	         FROM "TBL_NOMNOVEDADESPRESTACIONES" np, "TBL_NOMDESCUENTOSPRESTACIONES" dp
		     WHERE dp."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID"  = '.$Personasgenerales->Personageneral->PEGE_ID.' AND dp."TIPR_ID" = 1
		     ORDER BY dp."DEPR_ID" ASC';
	     $descuentos = $connection->createCommand($sql)->queryAll();
			  
		 /**
		 *sumatoria de descuentos mensuales del cargo del empleado
		 */
		 $string = 'SELECT SUM("NOPR_VALOR") AS "NOPR_VALOR" FROM ('.$sql.') d';
		 $totaldescuentos = $connection->createCommand($string)->queryScalar();
		 
		 $Semestralnominaliquidaciones->SENL_CODIGO = $this->codigo;
		 $Semestralnominaliquidaciones->SENL_MESES = $this->mesessemestral;
		 $Semestralnominaliquidaciones->SENL_PUNTOS = $Personasgenerales->Empleoplanta->EMPL_PUNTOS;
		 $Semestralnominaliquidaciones->SENL_SALARIO = $devengados[0];
		 $Semestralnominaliquidaciones->SENL_PRIMAANTIGUEDAD = $devengados[1];
		 $Semestralnominaliquidaciones->SENL_TRANSPORTE = $devengados[2];
		 $Semestralnominaliquidaciones->SENL_ALIMENTACION = $devengados[3];
		 $Semestralnominaliquidaciones->SENL_PRIMATECNICA = $devengados[4];
		 $Semestralnominaliquidaciones->SENL_GASTOSRP = $devengados[5];
		 $Semestralnominaliquidaciones->SENL_BONIFICACION = $devengados[6];
		 $Semestralnominaliquidaciones->SENL_RETEFUENTE = $devengados[7];
		 $Semestralnominaliquidaciones->SENO_ID = $Semestralnomina->SENO_ID;
		 $Semestralnominaliquidaciones->EMPL_ID = $Personasgenerales->Empleoplanta->EMPL_ID;
		 $Semestralnominaliquidaciones->SENL_FECHACAMBIO = date('Y-m-d H:i:s');
		 $Semestralnominaliquidaciones->SENL_REGISTRADOPOR = Yii::app()->user->id;
		 if($Semestralnominaliquidaciones->save()){
		  
		  /**
		  *verificar que los valores de las liquidacion 
		  *de los empleados nos sean negativos o contengan algun error
		  */
		  if($devengados[8]<($totaldescuentos)){
		    $this->w+=1;
	  	    $this->warning[$this->w-1][0] = $Personasgenerales->Personageneral->PEGE_IDENTIFICACION;
		    $this->warning[$this->w-1][1] = $Personasgenerales->Empleoplanta->EMPL_CARGO;
		    $this->warning[$this->w-1][2] = $Personasgenerales->Personageneral->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->Personageneral->PEGE_PRIMERAPELLIDO;
		    $this->warning[$this->w-1][3] = $devengados[8];
		    $this->warning[$this->w-1][4] = ($totaldescuentos);
		  }else{
		        $this->s+=1; 
				$this->success[$this->s-1][0] = $Personasgenerales->Personageneral->PEGE_IDENTIFICACION;
		        $this->success[$this->s-1][1] = $Personasgenerales->Empleoplanta->EMPL_CARGO;
		       }			   
		 }else{ 
		        $msg = print_r($Semestralnominaliquidaciones->getErrors(),1);
                throw new CHttpException(400,'data not saving: '.$msg );
			    $this->f+=1;
	  	        $this->flag[$this->f-1][0] = $Personasgenerales->Personageneral->PEGE_IDENTIFICACION;
		        $this->flag[$this->f-1][1] = $Personasgenerales->Empleoplanta->EMPL_CARGO;
		        $this->flag[$this->f-1][2] = $Personasgenerales->Personageneral->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->Personageneral->PEGE_PRIMERAPELLIDO;
		        $this->flag[$this->f-1][3] = $Semestralnominaliquidaciones->getErrors();
		      }
		  

		foreach($descuentos as $descuento){
		 $Semestralnominadescuentos = new Semestralnominadescuentos;
		 $Semestralnominadescuentos->SEND_VALOR = $descuento["NOPR_VALOR"];
         $Semestralnominadescuentos->DEPR_ID = $descuento["DEPR_ID"];
         $Semestralnominadescuentos->SENL_ID = $Semestralnominaliquidaciones->SENL_ID;
         $Semestralnominadescuentos->SEND_FECHACAMBIO = $Semestralnominaliquidaciones->SENL_FECHACAMBIO;
         $Semestralnominadescuentos->SEND_REGISTRADOPOR = $Semestralnominaliquidaciones->SENL_REGISTRADOPOR;
         $Semestralnominadescuentos->save();        
		}
	
    }
	
}