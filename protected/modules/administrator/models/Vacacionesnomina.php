<?php
set_time_limit(0);
/**
 * Esta es la clase de modelo para la tabla "TBL_NOMVACACIONESNOMINA".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMVACACIONESNOMINA':
 * @Propiedad string $VANO_ID
 * @Propiedad string $VANO_PERIODO
 * @Propiedad string $VANO_FECHAPROCESO
 * @Propiedad boolean $VANO_ESTADO
 * @Propiedad integer $VANO_ANIO
 * @Propiedad string $VANO_FECHACAMBIO
 * @Propiedad integer $VANO_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad VACACIONESNOMINALIQUIDACIONES[] $vACACIONESNOMINALIQUIDACIONESs
 */
class Vacacionesnomina extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Vacacionesnomina la clase del modelo estàtico.
	 */
	public $codigo, $error; 
	public $VANO_DETALLES;
	public $liquidacion, $descuentos;
	public $devengados, $parafiscales, $paraficales;
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
		return 'TBL_NOMVACACIONESNOMINA';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('VANO_ID, VANO_PERIODO, VANO_FECHAPROCESO, VANO_ESTADO, VANO_ANIO, VANO_FECHACAMBIO, VANO_REGISTRADOPOR', 'required'),
			array('VANO_ANIO, VANO_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('VANO_PERIODO', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('VANO_ID, VANO_PERIODO, VANO_FECHAPROCESO, VANO_ESTADO, VANO_ANIO, VANO_FECHACAMBIO, VANO_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'vACACIONESNOMINALIQUIDACIONESs' => array(self::HAS_MANY, 'VACACIONESNOMINALIQUIDACIONES', 'VANO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'VANO_ID' => 'CODIGO',
						'VANO_PERIODO' => 'PERIODO',
						'VANO_FECHAPROCESO' => 'FECHA PROCESO',
						'VANO_ESTADO' => 'ESTADO',
						'VANO_ANIO' => 'AÑO',
						'VANO_FECHACAMBIO' => 'FECHACAMBIO',
						'VANO_REGISTRADOPOR' => 'VANO REGISTRADOPOR',
						'VANO_DETALLES' => 'DETALLES',
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
		$sort->defaultOrder = 't."VANO_ID" DESC';
		$sort->attributes = array(
			
			'VANO_ID'=>array(
				'asc'=>'t."VANO_ID"',
				'desc'=>'t."VANO_ID" desc',
			),
			
			'VANO_PERIODO'=>array(
				'asc'=>'t."VANO_PERIODO"',
				'desc'=>'t."VANO_PERIODO" desc',
			),
			
			'VANO_FECHAPROCESO'=>array(
				'asc'=>'t."VANO_FECHAPROCESO"',
				'desc'=>'t."VANO_FECHAPROCESO" desc',
			),
			
			'VANO_ESTADO'=>array(
				'asc'=>'t."VANO_ESTADO"',
				'desc'=>'t."VANO_ESTADO" desc',
			),
			
			'VANO_ANIO'=>array(
				'asc'=>'t."VANO_ANIO"',
				'desc'=>'t."VANO_ANIO" desc',
			),
		);

		$criteria=new CDbCriteria;

		$criteria->compare('"VANO_ID"',$this->VANO_ID,true);
		$criteria->compare('"VANO_PERIODO"',$this->VANO_PERIODO,true);
		$criteria->compare('"VANO_FECHAPROCESO"',$this->VANO_FECHAPROCESO,true);
		$criteria->compare('"VANO_ESTADO"',$this->VANO_ESTADO);
		$criteria->compare('"VANO_ANIO"',$this->VANO_ANIO);
		$criteria->compare('"VANO_FECHACAMBIO"',$this->VANO_FECHACAMBIO,true);
		$criteria->compare('"VANO_REGISTRADOPOR"',$this->VANO_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 50)
		));
	}
	
	public function getEstado()
	{
		if($this->VANO_ESTADO==0){
		 $imageUrl = 'spellcheck_error.png';
		}else{
		      $imageUrl = 'spellcheck.png';
			 }
        return Yii::app()->baseurl.'/images/nomina/'.$imageUrl;		
	}
	
	public function validarNomina($Vacacionesnomina){
	  $this->error = "";
	  $connection = Yii::app()->db;
	  
	  $sql = 'SELECT  "VANO_ID", "VANO_ESTADO" FROM "TBL_NOMVACACIONESNOMINA" vn ORDER BY  "VANO_ID" DESC LIMIT 1';
	  $rows = $connection->createCommand($sql)->queryRow();  
	  
      if (count($rows)>0){
	   if (($rows["VANO_ID"])==($Vacacionesnomina->VANO_ID)){
	     $this->error="Parece que ya se ha liquidado una nomina para este periodo : ".$Vacacionesnomina->VANO_PERIODO;
	    }
      }
     return $this->error;	  
	}
	
	public function previewLiquidation($Vacacionesnomina,$personaGeneral){
     $connection = Yii::app()->db; 
	 $this->success = NULL; $this->warning = NULL; $this->flag = NULL;
	 $this->s = 0; $this->w = 0; $this->f = 0;
	 $Personasgenerales = new Personasgenerales;
	 $Parametrosglobales = new Parametrosglobales; 	 
     $this->valorestablecidos = $Parametrosglobales->getParametrosglobales(date("Y", strtotime($Vacacionesnomina->VANO_FECHAPROCESO)));
	 
	 /**
	 *consultar todos los empleados que fueron liquidados en el periodo que vienes el retroactivo
	 **/
	//echo '<br><br><br>'. 
	$sql = 'SELECT pg."PEGE_ID" 
	         FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl
             WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND pg."PEGE_ID" = '.$personaGeneral.'
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
	   if(((date("Y", strtotime($Personasgenerales->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("Y", strtotime($Vacacionesnomina->VANO_FECHAPROCESO)))) &
	     ((date("m", strtotime($Personasgenerales->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("m", strtotime($Vacacionesnomina->VANO_FECHAPROCESO))))){
	     $sw = 0; 			 
	   }
	  }
	  
	  /*si todo esta bn se procede a calcular la nomina para la persona*/
	  if(($sw==0)){
	   $this->getnovedades($Personasgenerales); 
	   $basico = round($this->getSueldoBasico($Personasgenerales,$Vacacionesnomina));
	   
	   $subTransporte = round($this->getSubTransporte($Personasgenerales,$Vacacionesnomina));
       $prAlimenta = round($this->getSubAlimentacion($Personasgenerales,$Vacacionesnomina));
       $prantiguedad = $this->getPrimaAntiguedad($Personasgenerales,$Vacacionesnomina); 
      // $prantiguedad[1]; 
	   
	   $primatec = round($this->getPrimaTecnica($Personasgenerales,$Vacacionesnomina));
	   $gastosrp = round($this->getGastosRepresentacion($Personasgenerales,$Vacacionesnomina));	   
	   $bonserv = round($this->getBonServiciosPrestados($Personasgenerales,$Vacacionesnomina));
	   $primasemestral = round($this->getPrimaSemestral($Personasgenerales,$Vacacionesnomina));	   
	   $tdevengado=round($basico)+round($subTransporte)+round($prAlimenta)+round($primatec)+round($gastosrp)+round($prantiguedad[1])+round($bonserv)+round($primasemestral);
	   $retefuente = round($this->getRetefuente($Personasgenerales,$Vacacionesnomina,$tdevengado));
	   
	   $devengados = array($basico,round($prantiguedad[1]),$subTransporte,$prAlimenta,$primatec,$gastosrp,$bonserv,$primasemestral,$retefuente,$tdevengado);
					
	   $this->devengados[$iterador] = array($iterador, $this->codigo, $this->diasvacaciones, $Personasgenerales->Empleoplanta->EMPL_PUNTOS,
	                                        $Personasgenerales->Empleoplanta->EMPL_SUELDO,$devengados[0],$devengados[1],
											$devengados[2],$devengados[3],$devengados[4],$devengados[5],$devengados[6],$devengados[7],
											$devengados[8],$Vacacionesnomina->VANO_ID,
											$Personasgenerales->Empleoplanta->EMPL_ID,$devengados[9]);
	   
	   $tparafiscales = $tparafiscales+$retefuente;
	   $paraficales = array($retefuente,$tparafiscales);		 
	   $this->paraficales[$iterador] = array($iterador,$paraficales[0]);									
       $this->codigo = $this->codigo+1;	   
       $iterador = $iterador+1;
	  }
	 }
	 
	 /**
	 *llenando los arreglos de la liquidacion previa
	 */
	 $this->liquidacion = NULL;
	   
	 $array = array('ID LIQUIDACION','CODIGO','DIAS','PUNTOS','SUELDO','SALARIO','PRIMA ATIGUEDAD','SUBSIDIO TRANSPORTE','SUBSIDIO ALIMENTACION',
	                'PRIMA TECNICA','GASTOS REPRESENTACION','1/12 BON. DE SERVICIOS','1/12 PRIMA SEMESTRAL', 
					'ID NOMINA','ID EMPLEO','TOTAL DEVENGADO');
	 $j=0; $i=0;
	 foreach ($array as $values=>$value) {	
	  $this->liquidacion[$j][$i] = $value;
	  $i++;  
	 }
	 
	 $this->parafiscales = NULL;
       $array = array('ID PARAFISCAL','RETEFUENTE');
				   
	   $j=0; $i=0;
	   foreach ($array as $values=>$value) {	
	    $this->parafiscales[$j][$i] = $value;
	    $i++;  
	   }

       for($j=1;$j<=count($this->devengados);$j++) {		 
	    for($i=0;$i<=count($this->devengados[$j]);$i++) {  
	     $this->liquidacion[$j][$i] = $this->devengados[$j][$i];
	    } 
       } 
	 
	   for($j=1;$j<=count($this->paraficales);$j++) {		 
	    for($i=0;$i<=count($this->paraficales[$j]);$i++) {  
	     $this->parafiscales[$j][$i] = $this->paraficales[$j][$i];
	    } 
       }

     $this->getDescuentosPreview($Personasgenerales->Personageneral->PEGE_ID,$Vacacionesnomina->VANO_ID);	 
	}
	
	public function getDescuentosPreview($personaGeneral,$periodo)
	{
	 $connection = Yii::app()->db;
	 $this->descuentos = NULL;
	 //echo "<br><br><br>".
	 
	 $string1 = 'SELECT pg."PEGE_ID" AS  "VANL_ID",  dp."DEPR_ID", np."NOPR_VALOR", '."'".$periodo."'".' AS "VANO_ID"
				 FROM "TBL_NOMDESCUENTOSPRESTACIONES" dp, "TBL_NOMNOVEDADESPRESTACIONES" np, "TBL_NOMPERSONASGENERALES" pg
				 WHERE dp."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID" = pg."PEGE_ID" AND pg."PEGE_ID" = '.$personaGeneral.' AND dp."TIPR_ID" = 4
				 ORDER BY dp."DEPR_ID", pg."PEGE_FECHAINGRESO" DESC';
		   
     $rows1 = $connection->createCommand($string1)->queryAll();

	 $string2 = 'SELECT pg."PEGE_ID" AS  "VANL_ID", '."'".$periodo."'".' AS "VANO_ID"
				 FROM "TBL_NOMDESCUENTOSPRESTACIONES" dp, "TBL_NOMNOVEDADESPRESTACIONES" np, "TBL_NOMPERSONASGENERALES" pg
				 WHERE dp."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID" = pg."PEGE_ID" AND pg."PEGE_ID" = '.$personaGeneral.' AND dp."TIPR_ID" = 4
				 GROUP BY pg."PEGE_ID"
				 ORDER BY pg."PEGE_FECHAINGRESO" DESC';		   
		   
     $rows2 = $connection->createCommand($string2)->queryAll();
	 $cont=1;	 
	 foreach ($rows2 as $values) {	     	 
	    $this->descuentos[$cont][0] = $values["VANL_ID"];
		$filas[$cont]=$values["VANO_ID"];
        $cont++;		
     }
	 $this->descuentos[$cont][0] = "Total";
	 
	 $string3 = 'SELECT dp."DEPR_DESCRIPCION"
				 FROM "TBL_NOMDESCUENTOSPRESTACIONES" dp, "TBL_NOMNOVEDADESPRESTACIONES" np, "TBL_NOMPERSONASGENERALES" pg
				 WHERE dp."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID" = pg."PEGE_ID" AND pg."PEGE_ID" = '.$personaGeneral.' AND dp."TIPR_ID" = 4
				 GROUP BY dp."DEPR_ID"
				 ORDER BY dp."DEPR_ID"';
		   
     $rows3 = $connection->createCommand($string3)->queryAll();
	 //Aqui se arman las columnas del arreglo deduccion con lo alias de cada deduccion.	 
	 $col = 0;
	 $this->descuentos[0][$col] = "IDENTIFICACION";
	 $col=1;	 
	 foreach ($rows3 as $values) {	
	   $j=0;
	   foreach ($values as $value) {      	 
		$this->descuentos[$j][$col] = $value;
	    $j++;
	   }
       $col++;	 
     }
	 $this->descuentos[0][$col] = "TOTAL";
	 
	 /*llenando una matriz con todos los descuentos  en $descuentos  */
	 $m=0; $descuentos = NULL; 
	 foreach ($rows1 as $values) {	
	   $n=0;
	   foreach ($values as $value) {	
        $descuentos[$m][$n]=$value;
	   // echo $descuentos[$m][$n]."<br>";
		$n++;
	   }
	   $m++;	
	 }
	 
     //echo "<br><br><br>";
     $t = count($descuentos);	  
     $i=1;$j=1;$suma=0;	 
	 for($x=0;$x<$t;$x++){
	  //echo "<br><br><br> iteracion = ".$x." cont = ".$cont." i = ".$i." j = ".$j."<br>";
	  //echo "$descuentos [".$x."]"."[0] = ".$descuentos[$x][0]."<br>";
	  if ($i>=$cont){
		  //echo "descuentos [".$i."]"."[".$j."] = ".$suma."<br>";
		  $this->descuentos[$i][$j]=$suma;
		  $suma=0;
		  $i=1;
		  $j++;
		}
		$numero = $descuentos[$x][0]; $idnomina = $descuentos[$x][3];
		//echo " fila ".$filas[$i]." nomina ".$idnomina." descuento ".$this->descuentos[$i][0]." numero ".$numero."<br>";
         
	    while(($filas[$i]!= $idnomina or $this->descuentos[$i][0]!= $numero)){
		   if ($i>=$cont){
			  $this->descuentos[$i][$j]=$suma;
			  $suma=0;
			  $i=1;
			  $j++;
			}			
			$this->descuentos[$i][$j]=0;
			$i++;
		}
		$valor = $descuentos[$x][2];
		//echo "descuentos [".$i."]"."[".$j."] = ".$valor."<br>";
		$this->descuentos[$i][$j] = $descuentos[$x][2];
		$this->descuentos[$i][$col] = $this->descuentos[$i][$col]+$descuentos[$x][2];
		$suma=$suma+$descuentos[$x][2];
		$i++;
		
	 }	
	   //Despues de salir del ciclo verifica si aun falta valores con el sgte siclo
		while(($filas[$i]!=$idnomina or $this->descuentos[$i][0]!=$numero)){
			if ($i>=$cont){
				$this->descuentos[$i][$j]=$suma;
				$suma=0;
				$j++;
				if (($j)<=($col-1))
					$i=1;
			}
			if ($j>($col-1)){$j--;break;}
			$this->descuentos[$i][$j]=0;
			$i++;
		}
	 
	}	
	/**
	*Finalizando funciones de la liquidacion previa de nomina del empleado
	*/
	
	public function liquidarNomina($Vacacionesnomina){
	 $connection = Yii::app()->db; 
	 $this->success = NULL; $this->warning = NULL; $this->flag = NULL;
	 $this->s = 0; $this->w = 0; $this->f = 0;
	 $Personasgenerales = new Personasgenerales;
	 $Parametrosglobales = new Parametrosglobales; 	 
     $this->valorestablecidos = $Parametrosglobales->getParametrosglobales(date("Y", strtotime($Vacacionesnomina->VANO_FECHAPROCESO)));
    
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
	   if(((date("Y", strtotime($Personasgenerales->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("Y", strtotime($Vacacionesnomina->VANO_FECHAPROCESO)))) &
	     ((date("m", strtotime($Personasgenerales->Estadoempleoplanta->ESEP_FECHAREGISTRO)))==(date("m", strtotime($Vacacionesnomina->VANO_FECHAPROCESO))))){
	     $sw = 0; 			 
	   }
	  }
	  
	  /*si todo esta bn se procede a calcular la nomina para la persona*/
	  if(($sw==0)){
	   $this->getnovedades($Personasgenerales); 
	   $basico = round($this->getSueldoBasico($Personasgenerales,$Vacacionesnomina));
	   
	   $subTransporte = round($this->getSubTransporte($Personasgenerales,$Vacacionesnomina));
       $prAlimenta = round($this->getSubAlimentacion($Personasgenerales,$Vacacionesnomina));
       $prantiguedad = $this->getPrimaAntiguedad($Personasgenerales,$Vacacionesnomina); 
      // $prantiguedad[1]; 
	   
	   $primatec = round($this->getPrimaTecnica($Personasgenerales,$Vacacionesnomina));
	   $gastosrp = round($this->getGastosRepresentacion($Personasgenerales,$Vacacionesnomina));	   
	   $bonserv = round($this->getBonServiciosPrestados($Personasgenerales,$Vacacionesnomina));
	   $primasemestral = round($this->getPrimaSemestral($Personasgenerales,$Vacacionesnomina));	   
	   $tdevengado=round($basico)+round($subTransporte)+round($prAlimenta)+round($primatec)+round($gastosrp)+round($prantiguedad[1])+round($bonserv)+round($primasemestral);
	   $retefuente = round($this->getRetefuente($Personasgenerales,$Vacacionesnomina,$tdevengado));
	   
	   $this->devengados[$iterador] = array($basico,round($prantiguedad[1]),$subTransporte,$prAlimenta,$primatec,$gastosrp,$bonserv,$primasemestral,$retefuente,$tdevengado);
	   
	   $this->setLiquidacion($Personasgenerales,$Vacacionesnomina,$this->devengados[$iterador]);
       $this->codigo = $this->codigo+1;	   
       $iterador = $iterador+1;
	  }
	 }
	}
	
	public	function getPrimaAntiguedad($Personasgenerales,$Vacacionesnomina){
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
	
	public	function getSubTransporte($Personasgenerales,$Vacacionesnomina){
	 if($Personasgenerales->Factorsalarial->FASA_SUBTRANSPORTE==1){
	  if(($Personasgenerales->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[4][3]) && ($Personasgenerales->Tipocargo->TICA_ID==1)){
		return ($this->valorestablecidos[5][3]*($this->diasvacaciones)/30);
	   }
	 }
	 return 0;
	}
		
	public	function getSubAlimentacion($Personasgenerales,$Vacacionesnomina){
	 if($Personasgenerales->Factorsalarial->FASA_SUBALIMIENTACION==1){
	  if(($Personasgenerales->Empleoplanta->EMPL_SUELDO)<($this->valorestablecidos[2][3]) && ($Personasgenerales->Tipocargo->TICA_ID==1)){
		return ($this->valorestablecidos[3][3]*($this->diasvacaciones)/30);
	  }
	 }
	 return 0;
	}
	
	public	function getPrimaTecnica($Personasgenerales,$Vacacionesnomina){
			$sueldo = ($Personasgenerales->Empleoplanta->EMPL_SUELDO)*(($this->diasvacaciones)/30);
			$valor=($sueldo)*($Personasgenerales->Primatecnica->PRTE_PORCENTAJE/100);			
			return ($valor);
	}
		
	public	function getGastosRepresentacion($Personasgenerales,$Vacacionesnomina){
			$sueldo = ($Personasgenerales->Empleoplanta->EMPL_SUELDO)*(($this->diasvacaciones)/30);
			$valor=($sueldo)*($Personasgenerales->Gastorepresentacion->GARE_PORCENTAJE/100);			
			return ($valor);
	}
	
	private	function getBonServiciosPrestados($Personasgenerales,$Vacacionesnomina){
	 $connection = Yii::app()->db;
	 $prantiguedad = $this->getPrimaAntiguedad($Personasgenerales,$Vacacionesnomina);	 
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
					 AND rn."RANO_ID" = '.$Vacacionesnomina->VANO_ANIO.'
					 UNION ALL
					 SELECT SUM("MENL_BONIFICACION") AS "BONIFICACION" 
					 FROM  "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn
					 WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" 
					 AND pg."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
					 AND mn."MENO_ID" >= '.$Vacacionesnomina->VANO_ANIO.'0101 AND mn."MENO_ID" <= '.$Vacacionesnomina->VANO_ANIO.'1201
					  ) t
			   ';
		$bonificacion = $connection->createCommand($sql)->queryScalar();
		return round($bonificacion);	           
	  }else{
	         return 0; 
	       }
	 }else{
	        return 0; 
	      }
	}
	
	public	function getPrimaSemestral($Personasgenerales,$Vacacionesnomina){
	 $connection = Yii::app()->db;
     $query = 'SELECT (snl."SENL_SALARIO"+snl."SENL_PRIMAANTIGUEDAD"+snl."SENL_TRANSPORTE"+snl."SENL_ALIMENTACION"+snl."SENL_PRIMATECNICA"+
	                   snl."SENL_GASTOSRP"+snl."SENL_BONIFICACION") AS "SENL_DEVENGADO"
			  FROM "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" snl, "TBL_NOMSEMESTRALNOMINA" sn,  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" "p"
			  WHERE sn."SENO_ID" = snl."SENO_ID" AND snl."EMPL_ID" = ep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID" 
			  AND p."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
              AND sn."SENO_ANIO" = '.$Vacacionesnomina->VANO_ANIO.'		  
			  ';
	 $primasemestral = $connection->createCommand($query)->queryScalar();
     $valor = $primasemestral/12;
	 return $valor;		
    }
	
	/**
	 *Inicio de metodos de calculo de retencion en la fuente
	*/	
	 
	private	function getRetefuente($Personasgenerales,$Vacacionesnomina,$tdevengado){		 
	    /**
	     *En esta primera condicion se mira si es docente y se recalcula nuevamente el total devengado con la suma
	     *de la prima de antiguedad; sueldo por los dias trabajados. Luego se le calcula el 50% de dicha suma.
	     *Tambien se le agrega la bonificacion pero no el 50% de esta bonificacion sino completa
	    */
		/**
		 *Se verifica si es docente
		*/
		if($Personasgenerales->Tipocargo->TICA_ID==2){
		 $prantiguedad = $this->getPrimaAntiguedad($Personasgenerales,$Vacacionesnomina);		 
		 $valor = ((($Personasgenerales->Empleoplanta->EMPL_SUELDO)*($this->diasvacaciones)/30));
		 
		 /**
		 *Se declara la variable $valor con el resultado del condicional
		 */
		 $valor = (($valor+$prantiguedad[1])/2)+$this->getBonServiciosPrestados($Personasgenerales,$Vacacionesnomina);		
		}elseif($Personasgenerales->Tipocargo->TICA_ID==1){
		 /**
		  *Si el empleado es administrativo se toma el total devengado que viene como parametro. 
		 */
		 $valor = $tdevengado;
		 
		  /**
		   *Si el empleado es el rector (Nivel = 1; Grado = 17), se exceptua el Gasto de representacion tal y como esta en el sigte condicional
		  */   
          if(($Personasgenerales->Empleoplanta->NIVE_ID==1) && ($Personasgenerales->Empleoplanta->GRAD_ID==17)){
   	       $valor = $valor-round($this->getGastosRepresentacion($Personasgenerales,$Vacacionesnomina));
          }
         }
		 
		 /**
		   *Recalcular  $valor teniendo en cuenta los factores de retefuente
		   *Menos: Deducciones del art. 387 del E.T.
		 */
		 $valor = $valor-($this->getFactorRetefuente($Personasgenerales,$Vacacionesnomina,1)+$this->getFactorRetefuente($Personasgenerales,$Vacacionesnomina,2)+$this->getFactorRetefuente($Personasgenerales,$Vacacionesnomina,3));
		 
		 /**
		   *Recalcular  $valor teniendo en lo siguiente :
		   *Menos: Deducción por aportes a salud obligatoria
		   *-Aporte mensual promedio que hizo  durante el año gravable anterior por aportes obligatorios
		   *a salud (Ver concepto DIAN 81294 oct./09; y Dec. 2271 de junio de 2009 )
		 */
		 $valor = $valor-($this->getPagoSaludAnioAnterior($Personasgenerales,$Vacacionesnomina));
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
		 $valor = $valor-(0+0+$this->getDescuentosMensuales($Personasgenerales,$Vacacionesnomina,28)+0);
		 
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
	
	private	function getFactorRetefuente($Personasgenerales,$Vacacionesnomina,$factor){
		$connection = Yii::app()->db;
		$sql = 'SELECT "DERE_VALOR" 
		        FROM "TBL_NOMDESCUENTOSRETEFUENTE" "drf" 
				WHERE "PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.' AND "FARE_ID" = '.$factor;
		$row = $connection->createCommand($sql)->queryRow();
	    $valor = $row["DERE_VALOR"];		 
		return $valor; 	
	}
	
	private	function getDescuentosMensuales($Personasgenerales,$Vacacionesnomina,$descuento){
		$connection = Yii::app()->db;
		$sql = 'SELECT "NOME_VALOR" 
		        FROM "TBL_NOMNOVEDADESMENSUALES" "drf" 
				WHERE "EMPL_ID" = '.$Personasgenerales->Empleoplanta->EMPL_ID.' AND "DEME_ID" = '.$descuento;
		$row = $connection->createCommand($sql)->queryRow();
	    $valor = $row["NOME_VALOR"];		 
		return $valor; 	
	}
	
	private	function getPagoSaludAnioAnterior($Personasgenerales,$Vacacionesnomina){
		$connection = Yii::app()->db;
		/**
		*se verifica la salud que pago el empleado desde enero hasta diciembre del año anteior
		*/
		$anioAnterior = (date("Y", strtotime($Vacacionesnomina->VANO_FECHAPROCESO))-1);
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
	
	private function getSueldoBasico($Personasgenerales,$Vacacionesnomina){
			$sueldo = ($Personasgenerales->Empleoplanta->EMPL_SUELDO)*(($this->diasvacaciones)/30);
		return ($sueldo);
    }
	
	private function getnovedades($Personasgenerales){
	 $connection = Yii::app()->db;
	 $this->diasvacaciones = NULL;	 
	 /**
	 *Consulta los meses que se le liquidaran al empleado desde la tabla  TBL_NOMNOVEDADESVACACIONES
	 **/
	  $sql = 'SELECT "NOVA_ID"
                       FROM "TBL_NOMNOVEDADESVACACIONES" nv 
                       WHERE nv."PEGE_ID" = '.$Personasgenerales->Personageneral->PEGE_ID.'
	         ';
	  $primarykey = $connection->createCommand($sql)->queryScalar();
	  $Novedadesvacaciones = Novedadesvacaciones::model()->findByPk($primarykey);	 
	  $dias = $Novedadesvacaciones->NOVA_DIAS;
			   
     $this->diasvacaciones = $dias; 
	}
	
	private function setLiquidacion($Personasgenerales,$Vacacionesnomina,$devengados){
	     $connection = Yii::app()->db;
		 $Vacacionesnominaliquidaciones = new Vacacionesnominaliquidaciones;
		 
		 /**
		 *consulta de los descuentos de la prima semestral de la persona
		 */
		 $sql='SELECT dp."DEPR_ID", ROUND(np."NOPR_VALOR") AS "NOPR_VALOR"
	         FROM "TBL_NOMNOVEDADESPRESTACIONES" np, "TBL_NOMDESCUENTOSPRESTACIONES" dp
		     WHERE dp."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID"  = '.$Personasgenerales->Personageneral->PEGE_ID.' AND dp."TIPR_ID" = 4
		     ORDER BY dp."DEPR_ID" ASC';
	     $descuentos = $connection->createCommand($sql)->queryAll();
			  
		 /**
		 *sumatoria de descuentos mensuales del cargo del empleado
		 */
		 $string = 'SELECT SUM("NOPR_VALOR") AS "NOPR_VALOR" FROM ('.$sql.') d';
		 $totaldescuentos = $connection->createCommand($string)->queryScalar();
		
		 $Vacacionesnominaliquidaciones->VANL_CODIGO = $this->codigo;
		 $Vacacionesnominaliquidaciones->VANL_DIAS = $this->diasvacaciones;
		 $Vacacionesnominaliquidaciones->VANL_PUNTOS = $Personasgenerales->Empleoplanta->EMPL_PUNTOS;
		 $Vacacionesnominaliquidaciones->VANL_SUELDO = $Personasgenerales->Empleoplanta->EMPL_SUELDO;
		 $Vacacionesnominaliquidaciones->VANL_SALARIO = $devengados[0];
		 $Vacacionesnominaliquidaciones->VANL_PRIMAANTIGUEDAD = $devengados[1];
		 $Vacacionesnominaliquidaciones->VANL_TRANSPORTE = $devengados[2];
		 $Vacacionesnominaliquidaciones->VANL_ALIMENTACION = $devengados[3];
		 $Vacacionesnominaliquidaciones->VANL_PRIMATECNICA = $devengados[4];
		 $Vacacionesnominaliquidaciones->VANL_GASTOSRP = $devengados[5];
		 $Vacacionesnominaliquidaciones->VANL_BONIFICACION = $devengados[6];
		 $Vacacionesnominaliquidaciones->VANL_SEMESTRAL = $devengados[7];
		 $Vacacionesnominaliquidaciones->VANL_RETEFUENTE = $devengados[8];
		 $Vacacionesnominaliquidaciones->VANO_ID = $Vacacionesnomina->VANO_ID; 
		 $Vacacionesnominaliquidaciones->EMPL_ID = $Personasgenerales->Empleoplanta->EMPL_ID;
		 $Vacacionesnominaliquidaciones->VANL_FECHACAMBIO = date('Y-m-d H:i:s');
		 $Vacacionesnominaliquidaciones->VANL_REGISTRADOPOR = Yii::app()->user->id;
		 
		 if($Vacacionesnominaliquidaciones->save()){
		  
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
		        $msg = print_r($Vacacionesnominaliquidaciones->getErrors(),1);
                throw new CHttpException(400,'data not saving: '.$msg );
			    $this->f+=1;
	  	        $this->flag[$this->f-1][0] = $Personasgenerales->Personageneral->PEGE_IDENTIFICACION;
		        $this->flag[$this->f-1][1] = $Personasgenerales->Empleoplanta->EMPL_CARGO;
		        $this->flag[$this->f-1][2] = $Personasgenerales->Personageneral->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->Personageneral->PEGE_PRIMERAPELLIDO;
		        $this->flag[$this->f-1][3] = $Vacacionesnominaliquidaciones->getErrors();
		      }
		  

		foreach($descuentos as $descuento){
		 $Vacacionesnominadescuentos = new Vacacionesnominadescuentos;
		 $Vacacionesnominadescuentos->VAND_VALOR = $descuento["NOPR_VALOR"];
         $Vacacionesnominadescuentos->DEPR_ID = $descuento["DEPR_ID"];
         $Vacacionesnominadescuentos->VANL_ID = $Vacacionesnominaliquidaciones->VANL_ID;
         $Vacacionesnominadescuentos->VAND_FECHACAMBIO = $Vacacionesnominaliquidaciones->VANL_FECHACAMBIO;
         $Vacacionesnominadescuentos->VAND_REGISTRADOPOR = $Vacacionesnominaliquidaciones->VANL_REGISTRADOPOR;
         $Vacacionesnominadescuentos->save();        
		}
	
    }
}