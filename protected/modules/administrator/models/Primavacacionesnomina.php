<?php
set_time_limit(0);
/**
 * Esta es la clase de modelo para la tabla "TBL_NOMPRIMAVACACIONESNOMINA".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMPRIMAVACACIONESNOMINA':
 * @Propiedad string $PVNO_ID
 * @Propiedad string $PVNO_PERIODO
 * @Propiedad string $PVNO_FECHAPROCESO
 * @Propiedad boolean $PVNO_ESTADO
 * @Propiedad integer $PVNO_ANIO
 * @Propiedad string $PVNO_FECHACAMBIO
 * @Propiedad integer $PVNO_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PRIMAVACACIONESNOMINALIQUIDACIONES[] $pRIMAVACACIONESNOMINALIQUIDACIONESs
 */
class Primavacacionesnomina extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Primavacacionesnomina la clase del modelo estàtico.
	 */
	public $codigo, $error; 
	public $PVNO_DETALLES;
	public $liquidacion, $descuentos;
	public $devengados;
	public $success, $warning, $flag;
	public $s, $w, $f; 
	public $diasvacaciones, $valorestablecidos;  
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMPRIMAVACACIONESNOMINA';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PVNO_ID, PVNO_PERIODO, PVNO_FECHAPROCESO, PVNO_ESTADO, PVNO_ANIO, PVNO_FECHACAMBIO, PVNO_REGISTRADOPOR', 'required'),
			array('PVNO_ANIO, PVNO_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('PVNO_PERIODO', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PVNO_ID, PVNO_PERIODO, PVNO_FECHAPROCESO, PVNO_ESTADO, PVNO_ANIO, PVNO_FECHACAMBIO, PVNO_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'pRIMAVACACIONESNOMINALIQUIDACIONESs' => array(self::HAS_MANY, 'PRIMAVACACIONESNOMINALIQUIDACIONES', 'PVNO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'PVNO_ID' => 'CODIGO',
						'PVNO_PERIODO' => 'PERIODO',
						'PVNO_FECHAPROCESO' => 'FECHA PROCESO',
						'PVNO_ESTADO' => 'ESTADO',
						'PVNO_ANIO' => 'AÑO',
						'PVNO_FECHACAMBIO' => 'PVNO FECHACAMBIO',
						'PVNO_REGISTRADOPOR' => 'PVNO REGISTRADOPOR',
						'PVNO_DETALLES' => 'DETALLES',
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
		$sort->defaultOrder = 't."PVNO_ID" DESC';
		$sort->attributes = array(
			
			'PVNO_ID'=>array(
				'asc'=>'t."PVNO_ID"',
				'desc'=>'t."PVNO_ID" desc',
			),
			
			'PVNO_PERIODO'=>array(
				'asc'=>'t."PVNO_PERIODO"',
				'desc'=>'t."PVNO_PERIODO" desc',
			),
			
			'PVNO_FECHAPROCESO'=>array(
				'asc'=>'t."PVNO_FECHAPROCESO"',
				'desc'=>'t."PVNO_FECHAPROCESO" desc',
			),
			
			'PVNO_ESTADO'=>array(
				'asc'=>'t."PVNO_ESTADO"',
				'desc'=>'t."PVNO_ESTADO" desc',
			),
			
			'PVNO_ANIO'=>array(
				'asc'=>'t."PVNO_ANIO"',
				'desc'=>'t."PVNO_ANIO" desc',
			),
		);

		$criteria=new CDbCriteria;

		$criteria->compare('"PVNO_ID"',$this->PVNO_ID,true);
		$criteria->compare('"PVNO_PERIODO"',$this->PVNO_PERIODO,true);
		$criteria->compare('"PVNO_FECHAPROCESO"',$this->PVNO_FECHAPROCESO,true);
		$criteria->compare('"PVNO_ESTADO"',$this->PVNO_ESTADO);
		$criteria->compare('"PVNO_ANIO"',$this->PVNO_ANIO);
		$criteria->compare('"PVNO_FECHACAMBIO"',$this->PVNO_FECHACAMBIO,true);
		$criteria->compare('"PVNO_REGISTRADOPOR"',$this->PVNO_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 50)
		));
	}
	
	public function getEstado()
	{
		if($this->PVNO_ESTADO==0){
		 $imageUrl = 'spellcheck_error.png';
		}else{
		      $imageUrl = 'spellcheck.png';
			 }
        return Yii::app()->baseurl.'/images/nomina/'.$imageUrl;		
	}
	
	public function validarNomina($Primavacacionesnomina){
	  $this->error = "";
	  $connection = Yii::app()->db;
	  
	  $sql = 'SELECT  "PVNO_ID", "PVNO_ESTADO" FROM "TBL_NOMPRIMAVACACIONESNOMINA" pvn ORDER BY  "PVNO_ID" DESC LIMIT 1';
	  $rows = $connection->createCommand($sql)->queryRow();  
	  
      if (count($rows)>0){
	   if (($rows["PVNO_ID"])==($Primavacacionesnomina->PVNO_ID)){
	     $this->error="Parece que ya se ha liquidado una nomina para este periodo : ".$Primavacacionesnomina->PVNO_PERIODO;
	    }
      }
     return $this->error;	  
	}
	
	public function liquidarNomina($Primavacacionesnomina){
	 $connection = Yii::app()->db; 
	 $this->success = NULL; $this->warning = NULL; $this->flag = NULL;
	 $this->s = 0; $this->w = 0; $this->f = 0;
	 $Personasgenerales = new Personasgenerales;
	 $Parametrosglobales = new Parametrosglobales; 	 
     $this->valorestablecidos = $Parametrosglobales->getParametrosglobales(date("Y", strtotime($Primavacacionesnomina->PVNO_FECHAPROCESO)));
    
	/**
	 *consultar todos los empleados que fueron liquidados en el periodo que vienes el retroactivo
	 **/
	 $sql = 'SELECT pg."PEGE_ID" 
	         FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl
             WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" /*AND pg."PEGE_ID" = 1130*/ /*1420 2990 1130 1580*/
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
	   if(((date("Y", strtotime($Personasgenerales->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("Y", strtotime($Primavacacionesnomina->PVNO_FECHAPROCESO)))) &
	     ((date("m", strtotime($Personasgenerales->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("m", strtotime($Primavacacionesnomina->PVNO_FECHAPROCESO))))){
	     $sw = 0; 			 
	   }
	  }
	  
	  $anioIngreso = date("Y", strtotime($Personasgenerales->Personageneral->PEGE_FECHAINGRESO));	 
	  if(($Primavacacionesnomina->PVNO_ANIO)!=($anioIngreso)){
	   $sql ='SELECT SUM("MENL_PRIMAVACACIONES") AS "PVACACIONES" 
			  FROM  "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn
			  WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" 
			  AND pg."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
			  AND mn."MENO_ID" >= '.$Primavacacionesnomina->PVNO_ANIO.'0101 AND mn."MENO_ID" <= '.$Primavacacionesnomina->PVNO_ANIO.'1201
							  
			 ';
			$pvacaciones = $connection->createCommand($sql)->queryScalar();
            if($pvacaciones>0){
			$sw = 1;
			}			
	  }
	  
	  /*si todo esta bn se procede a calcular la nomina para la persona*/
	  if(($sw==0) & ($Personasgenerales->Tipocargo->TICA_ID==2)){
	   $this->getnovedades($Personasgenerales); 
	   $basico = round($this->getSueldoBasico($Personasgenerales,$Primavacacionesnomina));
	   
	   $subTransporte = round($this->getSubTransporte($Personasgenerales,$Primavacacionesnomina));
       $prAlimenta = round($this->getSubAlimentacion($Personasgenerales,$Primavacacionesnomina));
       $prantiguedad = $this->getPrimaAntiguedad($Personasgenerales,$Primavacacionesnomina); 
       //echo $prantiguedad[1]; 
	   
	   $primatec = round($this->getPrimaTecnica($Personasgenerales,$Primavacacionesnomina));
	   $gastosrp = round($this->getGastosRepresentacion($Personasgenerales,$Primavacacionesnomina));	   
	   $bonserv = round($this->getBonServiciosPrestados($Personasgenerales,$Primavacacionesnomina));
	   $primasemestral = round($this->getPrimaSemestral($Personasgenerales,$Primavacacionesnomina));	   
	   $tdevengado=round($basico)+round($subTransporte)+round($prAlimenta)+round($primatec)+round($gastosrp)+round($prantiguedad[1])+round($bonserv)+round($primasemestral);
	   $retefuente = round($this->getRetefuente($Personasgenerales,$Primavacacionesnomina,$tdevengado));
	   
	   $this->devengados[$iterador] = array($basico,round($prantiguedad[1]),$subTransporte,$prAlimenta,$primatec,$gastosrp,$bonserv,$primasemestral,$retefuente,$tdevengado);
	   
	   $this->setLiquidacion($Personasgenerales,$Primavacacionesnomina,$this->devengados[$iterador]);
       $this->codigo = $this->codigo+1;	   
       $iterador = $iterador+1;
	  }
	 }
	}
	
	public	function getPrimaAntiguedad($Personasgenerales,$Primavacacionesnomina){
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
					$antiguedad[1]=round((($Personasgenerales->Empleoplanta->EMPL_SUELDO)*($this->diasvacaciones)*$factor/30));
		}

	  return $antiguedad;	
	}
	
	public	function getSubTransporte($Personasgenerales,$Primavacacionesnomina){
	 if($Personasgenerales->Factorsalarial->FASA_SUBTRANSPORTE==1){
	  if(($Personasgenerales->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[4][3]) && ($Personasgenerales->Tipocargo->TICA_ID==1)){
		return ($this->valorestablecidos[5][3]*($this->diasvacaciones)/15);
	   }
	 }
	 return 0;
	}
		
	public	function getSubAlimentacion($Personasgenerales,$Primavacacionesnomina){
	 if($Personasgenerales->Factorsalarial->FASA_SUBALIMIENTACION==1){
	  if(($Personasgenerales->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[2][3]) && ($Personasgenerales->Tipocargo->TICA_ID==1)){
		return ($this->valorestablecidos[3][3]*($this->diasvacaciones)/15);
	  }
	 }
	 return 0;
	}
	
	public	function getPrimaTecnica($Personasgenerales,$Primavacacionesnomina){
			$sueldo = ($Personasgenerales->Empleoplanta->EMPL_SUELDO)*(($this->diasvacaciones)/30);
			$valor=($sueldo)*($Personasgenerales->Primatecnica->PRTE_PORCENTAJE/100);			
			return ($valor);
	}
		
	public	function getGastosRepresentacion($Personasgenerales,$Primavacacionesnomina){
			$sueldo = ($Personasgenerales->Empleoplanta->EMPL_SUELDO)*(($this->diasvacaciones)/30);
			$valor=($sueldo)*($Personasgenerales->Gastorepresentacion->GARE_PORCENTAJE/100);			
			return ($valor);
	}
	
	private	function getBonServiciosPrestados($Personasgenerales,$Primavacacionesnomina){
	 $connection = Yii::app()->db;
	 $prantiguedad = $this->getPrimaAntiguedad($Personasgenerales,$Primavacacionesnomina);	 
	 $fecha = $Personasgenerales->Personageneral->PEGE_FECHAINGRESO;
	 
	 /* 001. inicio verificar si el empleado no es docente ocacional */ 
	 if($Personasgenerales->Tipocargo->TICA_ID!=3){		 
	  /* 01. inicio verificar si tiene BSP*/  
	  if ($Personasgenerales->Factorsalarial->FASA_BSP==1){
		  if ($this->diasvacaciones==0){
		   return 0;
		  }else{
				  $sql ='SELECT ROUND(SUM("BONIFICACION")/12)
						   FROM ( 
								 SELECT SUM("RANL_BONIFICACION") AS "BONIFICACION" 
								 FROM  "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMRETROACTIVOSNOMINA" rn, "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" rnl
								 WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND rn."RANO_ID" = rnl."RANO_ID" 
								 AND mnl."MENL_ID" = rnl."MENL_ID" AND pg."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
								 AND rn."RANO_ID" = '.$Primavacacionesnomina->PVNO_ANIO.'
								 UNION ALL
								 SELECT SUM("MENL_BONIFICACION") AS "BONIFICACION" 
								 FROM  "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn
								 WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" 
								 AND pg."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
								 AND mn."MENO_ID" >= '.$Primavacacionesnomina->PVNO_ANIO.'0101 AND mn."MENO_ID" <= '.$Primavacacionesnomina->PVNO_ANIO.'1201
							   ) t
						  ';
				  $bonificacion = $connection->createCommand($sql)->queryScalar();
				  if($bonificacion!=0){
				   return round($bonificacion);
				  }else{	
				        //En caso de que no halla cumplido anio de servicio aun se le calcula//
				        //como el limite establecido es diferente del profesor al administrativo,//
						//Este condicional verifica quien es quien para obtener asi el limite//
						if($Personasgenerales->Tipocargo->TICA_ID==1){
						 $bon=$this->valorestablecidos[6][3];
						}else{ 
						 	  $bon=$this->valorestablecidos[7][3];
						     }
							 
						$anioIngreso = date("Y", strtotime($Personasgenerales->Personageneral->PEGE_FECHAINGRESO));	 
					    if(($Primavacacionesnomina->PVNO_ANIO)!=($anioIngreso)){
						 if(($Personasgenerales->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica($Personasgenerales,$Primavacacionesnomina))+($this->getGastosRepresentacion($Personasgenerales,$Primavacacionesnomina))+$prantiguedad[0]>$bon){
						  return ((($Personasgenerales->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica($Personasgenerales,$Primavacacionesnomina))+($this->getGastosRepresentacion($Personasgenerales,$Primavacacionesnomina))+round($prantiguedad[0]))*($this->valorestablecidos[8][3]/100)/12)*$this->diasvacaciones/30;
						 }else{ 
							   return ((($Personasgenerales->Empleoplanta->EMPL_SUELDO)+($this->getPrimaTecnica($Personasgenerales,$Primavacacionesnomina))+($this->getGastosRepresentacion($Personasgenerales,$Primavacacionesnomina))+round($prantiguedad[0]))*($this->valorestablecidos[9][3]/100)/12)*$this->diasvacaciones/30;
					          }
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
	
	public	function getPrimaSemestral($Personasgenerales,$Primavacacionesnomina){
	 $connection = Yii::app()->db;
     $query = 'SELECT (snl."SENL_SALARIO"+snl."SENL_PRIMAANTIGUEDAD"+snl."SENL_TRANSPORTE"+snl."SENL_ALIMENTACION"+snl."SENL_PRIMATECNICA"+
	                   snl."SENL_GASTOSRP"+snl."SENL_BONIFICACION") AS "SENL_DEVENGADO"
			  FROM "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" snl, "TBL_NOMSEMESTRALNOMINA" sn,  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" "p"
			  WHERE sn."SENO_ID" = snl."SENO_ID" AND snl."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID" 
			  AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
              AND sn."SENO_ANIO" = '.$Primavacacionesnomina->PVNO_ANIO.'		  
			  ';
	 $primasemestral = $connection->createCommand($query)->queryScalar();
     $valor = $primasemestral/12;
	 return $valor;		
    }
	
	/**
	 *Inicio de metodos de calculo de retencion en la fuente
	*/	
	//private	function getRetefuente($salud,$pension,$fondosp,$tdevengado){		 
	private	function getRetefuente($Personasgenerales,$Primavacacionesnomina,$tdevengado){		 
	    /**
	     *En esta primera condicion se mira si es docente y se recalcula nuevamente el total devengado con la suma
	     *de la prima de antiguedad; sueldo por los dias trabajados. Luego se le calcula el 50% de dicha suma.
	     *Tambien se le agrega la bonificacion pero no el 50% de esta bonificacion sino completa
	    */
		/**
		 *Se verifica si es docente
		*/
		if($Personasgenerales->Tipocargo->TICA_ID==2){
		 $prantiguedad = $this->getPrimaAntiguedad($Personasgenerales,$Primavacacionesnomina);		 
		 $valor = ((($Personasgenerales->Empleoplanta->EMPL_SUELDO)*($this->diasvacaciones)/30));
		 
		 /**
		 *Se declara la variable $valor con el resultado del condicional
		 */
		 $valor = (($valor+$prantiguedad[1])/2)+$this->getBonServiciosPrestados($Personasgenerales,$Primavacacionesnomina);		
		}elseif($Personasgenerales->Tipocargo->TICA_ID==1){
		 /**
		  *Si el empleado es administrativo se toma el total devengado que viene como parametro. 
		 */
		 $valor = $tdevengado;
		 
		  /**
		   *Si el empleado es el rector (Nivel = 1; Grado = 17), se exceptua el Gasto de representacion tal y como esta en el sigte condicional
		  */   
          if(($Personasgenerales->Empleoplanta->NIVE_ID==1) && ($Personasgenerales->Empleoplanta->GRAD_ID==17)){
   	       $valor = $valor-round($this->getGastosRepresentacion($Personasgenerales,$Primavacacionesnomina));
          }
         }
		 
		 /**
		   *Recalcular  $valor teniendo en cuenta los factores de retefuente
		   *Menos: Deducciones del art. 387 del E.T.
		 */
		 $valor = $valor-($this->getFactorRetefuente($Personasgenerales,$Primavacacionesnomina,1)+$this->getFactorRetefuente($Personasgenerales,$Primavacacionesnomina,2)+$this->getFactorRetefuente($Personasgenerales,$Primavacacionesnomina,3));
		 
		 /**
		   *Recalcular  $valor teniendo en lo siguiente :
		   *Menos: Deducción por aportes a salud obligatoria
		   *-Aporte mensual promedio que hizo  durante el año gravable anterior por aportes obligatorios
		   *a salud (Ver concepto DIAN 81294 oct./09; y Dec. 2271 de junio de 2009 )
		 */
		 $valor = $valor-($this->getPagoSaludAnioAnterior($Personasgenerales,$Primavacacionesnomina));
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
		 $valor = $valor-(0+0+$this->getDescuentosMensuales($Personasgenerales,$Primavacacionesnomina,28)+0);
		 
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
	
	private	function getFactorRetefuente($Personasgenerales,$Primavacacionesnomina,$factor){
		$connection = Yii::app()->db;
		$sql = 'SELECT "DERE_VALOR" 
		        FROM "TBL_NOMDESCUENTOSRETEFUENTE" "drf" 
				WHERE "PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.' AND "FARE_ID" = '.$factor;
		$row = $connection->createCommand($sql)->queryRow();
	    $valor = $row["DERE_VALOR"];		 
		return $valor; 	
	}
	
	private	function getDescuentosMensuales($Personasgenerales,$Primavacacionesnomina,$descuento){
		$connection = Yii::app()->db;
		$sql = 'SELECT "NOME_VALOR" 
		        FROM "TBL_NOMNOVEDADESMENSUALES" "drf" 
				WHERE "EMPL_ID" = '.$Personasgenerales->Empleoplanta->EMPL_ID.' AND "DEME_ID" = '.$descuento;
		$row = $connection->createCommand($sql)->queryRow();
	    $valor = $row["NOME_VALOR"];		 
		return $valor; 	
	}
	
	private	function getPagoSaludAnioAnterior($Personasgenerales,$Primavacacionesnomina){
		$connection = Yii::app()->db;
		/**
		*se verifica la salud que pago el empleado desde enero hasta diciembre del año anteior
		*/
		$anioAnterior = (date("Y", strtotime($Primavacacionesnomina->PVNO_FECHAPROCESO))-1);
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
	
	private function getSueldoBasico($Personasgenerales,$Primavacacionesnomina){
			$sueldo = ($Personasgenerales->Empleoplanta->EMPL_SUELDO)*(($this->diasvacaciones)/30);
		return ($sueldo);
    }
	
	private function getnovedades($Personasgenerales){
	 $connection = Yii::app()->db;
	 $this->diasvacaciones = NULL;	 
	 /**
	 *Consulta los meses que se le liquidaran al empleado desde la tabla  TBL_NOMNOVEDADESPRIMAVACACIONES
	 **/
	  $sql = 'SELECT "NOPV_ID"
                       FROM "TBL_NOMNOVEDADESPRIMAVACACIONES" npv 
                       WHERE npv."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
	         ';
	  $primarykey = $connection->createCommand($sql)->queryScalar();
	  $Novedadesprimavacaciones = Novedadesprimavacaciones::model()->findByPk($primarykey);	 
	  $dias = $Novedadesprimavacaciones->NOPV_DIAS;
			   
     $this->diasvacaciones = $dias; 
	}
	
	private function setLiquidacion($Personasgenerales,$Primavacacionesnomina,$devengados){
	     $connection = Yii::app()->db;
		 $Primavacacionesnominaliquidaciones = new Primavacacionesnominaliquidaciones;
		 
		 /**
		 *consulta de los descuentos de la prima semestral de la persona
		 */
		 $sql='SELECT dp."DEPR_ID", ROUND(np."NOPR_VALOR") AS "NOPR_VALOR"
	         FROM "TBL_NOMNOVEDADESPRESTACIONES" np, "TBL_NOMDESCUENTOSPRESTACIONES" dp
		     WHERE dp."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID"  = '.$Personasgenerales->Personageneral->PEGE_ID.' AND dp."TIPR_ID" = 3
		     ORDER BY dp."DEPR_ID" ASC';
	     $descuentos = $connection->createCommand($sql)->queryAll();
			  
		 /**
		 *sumatoria de descuentos mensuales del cargo del empleado
		 */
		 $string = 'SELECT SUM("NOPR_VALOR") AS "NOPR_VALOR" FROM ('.$sql.') d';
		 $totaldescuentos = $connection->createCommand($string)->queryScalar();
		
		 $Primavacacionesnominaliquidaciones->PVNL_CODIGO = $this->codigo;
		 $Primavacacionesnominaliquidaciones->PVNL_DIAS = $this->diasvacaciones;
		 $Primavacacionesnominaliquidaciones->PVNL_PUNTOS = $Personasgenerales->Empleoplanta->EMPL_PUNTOS;
		 $Primavacacionesnominaliquidaciones->PVNL_SUELDO = $Personasgenerales->Empleoplanta->EMPL_SUELDO;
		 $Primavacacionesnominaliquidaciones->PVNL_SALARIO = $devengados[0];
		 $Primavacacionesnominaliquidaciones->PVNL_PRIMAANTIGUEDAD = $devengados[1];
		 $Primavacacionesnominaliquidaciones->PVNL_TRANSPORTE = $devengados[2];
		 $Primavacacionesnominaliquidaciones->PVNL_ALIMENTACION = $devengados[3];
		 $Primavacacionesnominaliquidaciones->PVNL_PRIMATECNICA = $devengados[4];
		 $Primavacacionesnominaliquidaciones->PVNL_GASTOSRP = $devengados[5];
		 $Primavacacionesnominaliquidaciones->PVNL_BONIFICACION = $devengados[6];
		 $Primavacacionesnominaliquidaciones->PVNL_SEMESTRAL = $devengados[7];
		 $Primavacacionesnominaliquidaciones->PVNL_RETEFUENTE = $devengados[8];
		 $Primavacacionesnominaliquidaciones->PVNO_ID = $Primavacacionesnomina->PVNO_ID; 
		 $Primavacacionesnominaliquidaciones->EMPL_ID = $Personasgenerales->Empleoplanta->EMPL_ID;
		 $Primavacacionesnominaliquidaciones->PVNL_FECHACAMBIO = date('Y-m-d H:i:s');
		 $Primavacacionesnominaliquidaciones->PVNL_REGISTRADOPOR = Yii::app()->user->id;
		 
		 if($Primavacacionesnominaliquidaciones->save()){
		  
		  /**
		  *verificar que los valores de las liquidacion 
		  *de los empleados nos sean negativos o contengan algun error
		  */
		  if($devengados[9]<($totaldescuentos)){
		    $this->w+=1;
	  	    $this->warning[$this->w-1][0] = $Personasgenerales->Personageneral->PEGE_IDENTIFICACION;
		    $this->warning[$this->w-1][1] = $Personasgenerales->Empleoplanta->EMPL_CARGO;
		    $this->warning[$this->w-1][2] = $Personasgenerales->Personageneral->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->Personageneral->PEGE_PRIMERAPELLIDO;
		    $this->warning[$this->w-1][3] = $devengados[9];
		    $this->warning[$this->w-1][4] = ($totaldescuentos);
		  }else{
		        $this->s+=1; 
				$this->success[$this->s-1][0] = $Personasgenerales->Personageneral->PEGE_IDENTIFICACION;
		        $this->success[$this->s-1][1] = $Personasgenerales->Empleoplanta->EMPL_CARGO;
		       }			   
		 }else{ 
		        $msg = print_r($Primavacacionesnominaliquidaciones->getErrors(),1);
                throw new CHttpException(400,'data not saving: '.$msg );
			    $this->f+=1;
	  	        $this->flag[$this->f-1][0] = $Personasgenerales->Personageneral->PEGE_IDENTIFICACION;
		        $this->flag[$this->f-1][1] = $Personasgenerales->Empleoplanta->EMPL_CARGO;
		        $this->flag[$this->f-1][2] = $Personasgenerales->Personageneral->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->Personageneral->PEGE_PRIMERAPELLIDO;
		        $this->flag[$this->f-1][3] = $Primavacacionesnominaliquidaciones->getErrors();
		      }
		  

		foreach($descuentos as $descuento){
		 $Primavacacionesnominadescuentos = new Primavacacionesnominadescuentos;
		 $Primavacacionesnominadescuentos->PVND_VALOR = $descuento["NOPR_VALOR"];
         $Primavacacionesnominadescuentos->DEPR_ID = $descuento["DEPR_ID"];
         $Primavacacionesnominadescuentos->PVNL_ID = $Primavacacionesnominaliquidaciones->PVNL_ID;
         $Primavacacionesnominadescuentos->PVND_FECHACAMBIO = $Primavacacionesnominaliquidaciones->PVNL_FECHACAMBIO;
         $Primavacacionesnominadescuentos->PVND_REGISTRADOPOR = $Primavacacionesnominaliquidaciones->PVNL_REGISTRADOPOR;
         $Primavacacionesnominadescuentos->save();        
		}
	
    }
}