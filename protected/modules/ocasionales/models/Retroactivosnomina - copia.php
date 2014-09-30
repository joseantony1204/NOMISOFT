<?php
set_time_limit(0);
/**
 * Esta es la clase de modelo para la tabla "TBL_NOMRETROACTIVOSNOMINA".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMRETROACTIVOSNOMINA':
 * @Propiedad string $RANO_ID
 * @Propiedad string $RANO_PERIODO
 * @Propiedad string $RANO_AUMENTO
 * @Propiedad string $RANO_AUMENTOPUNTO
 * @Propiedad string $RANO_FECHAPROCESO
 * @Propiedad boolean $RANO_ESTADO
 * @Propiedad string $RANO_FECHACAMBIO
 * @Propiedad integer $RANO_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad RETROACTIVOSNOMINALIQUIDACIONES[] $rETROACTIVOSNOMINALIQUIDACIONESs
 */
class Retroactivosnomina extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Retroactivosnomina la clase del modelo estàtico.
	 */
	public $RANO_MESINICIO, $RANO_MESFINAL, $RANO_ANIO, $RANO_DETALLES; 
	public $log; 
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
		return 'TBL_NOMRETROACTIVOSNOMINA';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('RANO_ID, RANO_PERIODO, RANO_AUMENTO, RANO_AUMENTOPUNTO, RANO_FECHAPROCESO, RANO_ESTADO, RANO_FECHACAMBIO, RANO_REGISTRADOPOR', 'required'),
			array('RANO_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('RANO_PERIODO', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('RANO_ID, RANO_PERIODO, RANO_AUMENTO, RANO_AUMENTOPUNTO, RANO_FECHAPROCESO, RANO_ESTADO, RANO_FECHACAMBIO, RANO_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'rETROACTIVOSNOMINALIQUIDACIONESs' => array(self::HAS_MANY, 'RETROACTIVOSNOMINALIQUIDACIONES', 'RANO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'RANO_ID' => 'CODIGO',
						'RANO_PERIODO' => 'PERIODO',
						'RANO_AUMENTO' => 'AUMENTO',
						'RANO_AUMENTOPUNTO' => 'AUM. PUNTO',
						'RANO_FECHAPROCESO' => 'F. PROCESO',
						'RANO_ESTADO' => 'ESTADO',
						'RANO_ANIO' => 'AÑO',
						'RANO_DETALLES' => 'DETALLES',
						'RANO_FECHACAMBIO' => 'FECHA CAMBIO',
						'RANO_REGISTRADOPOR' => 'REGISTRADO POR',
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
		
		$criteria->select = 't.*';		
		$criteria->order = 't."RANO_ID" DESC ';

		$criteria->compare('RANO_ID',$this->RANO_ID,true);
		$criteria->compare('RANO_PERIODO',$this->RANO_PERIODO,true);
		$criteria->compare('RANO_AUMENTO',$this->RANO_AUMENTO,true);
		$criteria->compare('RANO_AUMENTOPUNTO',$this->RANO_AUMENTOPUNTO,true);
		$criteria->compare('RANO_FECHAPROCESO',$this->RANO_FECHAPROCESO,true);
		$criteria->compare('RANO_ESTADO',$this->RANO_ESTADO);
		$criteria->compare('RANO_FECHACAMBIO',$this->RANO_FECHACAMBIO,true);
		$criteria->compare('RANO_REGISTRADOPOR',$this->RANO_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function periodoNomina($mes){
		
	 switch ($mes) {
	    case 1:
	        $mes="ENERO";
	        break;
	    case 2:
	        $mes="FEBRERO";
	        break;
	    case 3:
	        $mes="MARZO";
	        break;
	     case 4:
	        $mes="ABRIL";
	        break;
	    case 5:
	        $mes="MAYO";
	        break;
	    case 6:
	        $mes="JUNIO";
	        break;
	    case 7:
	        $mes="JULIO";
	        break;
	    case 8:
	        $mes="AGOSTO";
	        break;
	    case 9:
	        $mes="SEPTIEMBRE";
	        break;
	    case 10:
	        $mes="OCTUBRE";
	        break;
	    case 11:
	        $mes="NOVIEMBRE";
	        break;
	    case 12:
	        $mes="DICIEMBRE";
	        break;
		}
		return $mes;
	}
	
	public function getEstado()
	{
		if($this->RANO_ESTADO==0){
		 $imageUrl = 'spellcheck_error.png';
		}else{
		      $imageUrl = 'spellcheck.png';
			 }
        return Yii::app()->baseurl.'/images/nomina/'.$imageUrl;		
	}
	
	public function liquidarRetroactivos($Retroactivosnomina){
	  $this->log = "";
	  $connection = Yii::app()->db;
	  
	  $Retroactivosnomina->RANO_ID = $Retroactivosnomina->RANO_ANIO;
	  $sql = 'SELECT  "RANO_ID", "RANO_ESTADO" FROM "TBL_NOMRETROACTIVOSNOMINA" mn  WHERE "RANO_ID" = '.$Retroactivosnomina->RANO_ID.' LIMIT 1';
	  $row = $connection->createCommand($sql)->queryRow();
	  $cont = 0;	  	  
	  if($Retroactivosnomina->RANO_MESFINAL<$Retroactivosnomina->RANO_MESINICIO){
		$this->log[$cont]=array('Fechas',"La fecha final no debe ser menor a la inicial :(",1);
	    $cont++;
	  }else{
		  if($row>0){
		   $this->log[$cont]=array($Retroactivosnomina->RANO_ID,"El retroactivo de <strong>".$Retroactivosnomina->RANO_ID."</strong> ya fue grabado",2);
		   $cont++;
		  }else{
				$Retroactivos = new Retroactivosnomina;
				$Retroactivos->RANO_ID = $Retroactivosnomina->RANO_ID;
				$Retroactivos->RANO_PERIODO = $this->periodoNomina((int)$Retroactivosnomina->RANO_MESINICIO).' A '. $this->periodoNomina((int)$Retroactivosnomina->RANO_MESFINAL).' DE '.$Retroactivosnomina->RANO_ANIO;
				$Retroactivos->RANO_AUMENTO = $Retroactivosnomina->RANO_AUMENTO;				 
				$Retroactivos->RANO_AUMENTOPUNTO = $Retroactivosnomina->RANO_AUMENTOPUNTO;	
				$Retroactivos->RANO_FECHAPROCESO = $Retroactivosnomina->RANO_FECHAPROCESO;	
				$Retroactivos->RANO_ESTADO = "0";	
				$Retroactivos->RANO_FECHACAMBIO = $Retroactivosnomina->RANO_FECHACAMBIO;				 
				$Retroactivos->RANO_REGISTRADOPOR = $Retroactivosnomina->RANO_REGISTRADOPOR;
				
				$Retroactivos->RANO_MESINICIO = $Retroactivosnomina->RANO_MESINICIO;
				$Retroactivos->RANO_MESFINAL = $Retroactivosnomina->RANO_MESFINAL;
				$sql = ''; $sqlaux = '';	 
				if($Retroactivos->save()){				 
				 for($i=(int)$Retroactivosnomina->RANO_MESINICIO;$i<=(int)$Retroactivosnomina->RANO_MESFINAL;$i++){
				  $mes = "0".$i."01";
				  $id = $Retroactivosnomina->RANO_ANIO.$mes;				  
				  if(($sql=='') &($i==1)){
				    $sql = 'mn."MENO_ID" = '.$id;
				  }else{
				        if($i!=1){
				         $sqlaux .= ' OR mn."MENO_ID" = '.$id;
					    }
					   }				  
				 }
                 $query = ' AND ('.$sql.$sqlaux.')';
                 $this->liquidarNomina($query, $Retroactivos);				 
				}else{
					  //echo $msg = print_r($Retroactivos->getErrors(),1);
					 }				
	      }	  
	 }
	 return $this->log;
	}
	
	private function liquidarNomina($query,$Retroactivosnomina){
	$connection = Yii::app()->db;
	/**
	*consultar todos los empleados que fueron liquidados en ese mes
	**/
	 $sql = 'SELECT pg."PEGE_ID" 
             FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn
             WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID"
             AND mn."MENO_ID" = mnl."MENO_ID" '.$query.'
             GROUP BY pg."PEGE_ID"
             ORDER BY pg."PEGE_ID" ASC';	
	 $rows = $connection->createCommand($sql)->queryAll();	
	 /**
	 *Recorrido que hace la consulta de cada empleado para su liquidacion
	 **/
	 $cont = 1;
	 foreach($rows AS $row){
	 /**
	 *Si los dias sumados son menor que 30, se entra a verificar el porque
	 **/
	 if($row["DIAS"]<30){
	  $fecha_entrada =  $row["PEGE_FECHAINGRESO"];
	  $mes_entrada = date("m",strtotime($fecha_entrada));
	  $anio_entrada = date("Y",strtotime($fecha_entrada));
	  $fechaentrada = $anio_entrada."-".$mes_entrada;
	  $anio = substr($nomina,0,4);
	  $mes =  substr($nomina,-4,2);
	  $mesliquidando = $anio."-".$mes;
	  //echo  $row["PEGE_ID"]."--".$fechaentrada." --- ".$mesliquidando."_-_".$cont."<br>";
	  if($mesliquidando==$fechaentrada){
	  /*calcular retroactivos con los dias trabajados xq es empleado nuevo*/	
	   $this->setRetroactivonormal($nomina,$Retroactivosnomina, $row["PEGE_ID"],$row["MENL_ID"]);
	  }else{
	       $ingresocargo ='SELECT ep."EMPL_FECHAINGRESO", ee."ESEM_ID"
		                   FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep, "TBL_NOMESTADOSEMPLEOS" ee
                           WHERE ep."EMPL_ID" = eep."EMPL_ID" AND eep."ESEM_ID" = ee."ESEM_ID" AND ep."PEGE_ID" = '.$row["PEGE_ID"].'
                           ORDER BY ep."EMPL_FECHAINGRESO" DESC LIMIT 1';
		   $ingreso = $connection->createCommand($ingresocargo)->queryRow();
		
		   /*comprabar si ese empleado se retiro en el mes q se esta calculando el retroactivo*/
		   $fechaultimocargo =  $ingreso["EMPL_FECHAINGRESO"];
		   $anioultimocargo = date("Y",strtotime($fechaultimocargo)); $mesultimocargo = date("m",strtotime($fechaultimocargo));   $diaultimocargo = date("d",strtotime($fechaultimocargo));
		   $fechaultimocargo = $anioultimocargo."-".$mesultimocargo;
		   if(($fechaultimocargo==$mesliquidando)&($ingreso["ESEM_ID"]!=1)){
			$filasliquidada ='SELECT * 
							   FROM  "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl
							   WHERE mnl."MENL_ID" = '.$row["MENL_ID"].' AND mnl."MENL_DIAS"!=0';
		    $filasliquicion = $connection->createCommand($filasliquidada)->queryRow();

			$filas ='SELECT COUNT(*) AS "TOTAL" 
							FROM  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn
							WHERE ep."EMPL_ID" = mnl."EMPL_ID"
							AND mn."MENO_ID" = mnl."MENO_ID" AND mn."MENO_ID" = '.$nomina.' AND ep."PEGE_ID" = '.$row["PEGE_ID"].'
					        AND mnl."MENL_DIAS"!=0
					';
		    $totalfilas = $connection->createCommand($filas)->queryRow();
			if (count($totalfilas)==2){
			   $dias = $filasliquicion["MENL_DIAS"];
               if(($dias)<=15){
                $dias = $filasliquicion["MENL_DIAS"];
				/*registro actuales*/
                if($dias!='' & $dias!=0){				
			     $salario = round((($filasliquicion["MENL_SALARIO"])*30/$dias)/$totalfilas); $transp = round((($filasliquicion["MENL_TRANSPORTE"])*30/$dias)/$totalfilas); 
				 $aliment = round((($filasliquicion["MENL_ALIMENTACION"])*30/$dias)/$totalfilas); $prAntiguedad = round((($filasliquicion["MENL_PRIMAANTIGUEDAD"])*30/$dias)/$totalfilas); 
				 $prtecnica = round((($filasliquicion["MENL_PRIMATECNICA"])*30/$dias)/$totalfilas); $gastosrp = round((($filasliquicion["MENL_GASTOSRP"])*30/$dias)/$totalfilas);
                 $dias = 15;
				 $devengado = array($dias,$salario,$transp,$aliment,$prAntiguedad,$prtecnica,$gastosrp);
				}	
			   }	
			}else{
				  $dias = $diaultimocargo;
				  if($dias!='' & $dias!=0){
				   $salario = round((($filasliquicion["MENL_SALARIO"])*30/$dias)); $transp = round((($filasliquicion["MENL_TRANSPORTE"])*30/$dias)); 
			 	   $aliment = round((($filasliquicion["MENL_ALIMENTACION"])*30/$dias)); $prAntiguedad = round((($filasliquicion["MENL_PRIMAANTIGUEDAD"])*30/$dias)); 
				   $prtecnica = round((($filasliquicion["MENL_PRIMATECNICA"])*30/$dias)); $gastosrp = round((($filasliquicion["MENL_GASTOSRP"])*30/$dias));
				   $devengado = array($dias,$salario,$transp,$aliment,$prAntiguedad,$prtecnica,$gastosrp);
				  }
				 }
		    $this->setRetroactivovariado($nomina,$Retroactivosnomina, $row["PEGE_ID"],$row["MENL_ID"],$devengado);			
		   }else{
		        $filasliquidada ='SELECT * 
							       FROM  "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl
							       WHERE mnl."MENL_ID" = '.$row["MENL_ID"].' AND mnl."MENL_DIAS"!=0';
		         $filasliquicion = $connection->createCommand($filasliquidada)->queryRow();

			     $filas ='SELECT COUNT(*) AS "TOTAL" 
						  FROM  "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn
						  WHERE ep."EMPL_ID" = mnl."EMPL_ID"
						  AND mn."MENO_ID" = mnl."MENO_ID" AND mn."MENO_ID" = '.$nomina.' AND ep."PEGE_ID" = '.$row["PEGE_ID"].'
					      AND mnl."MENL_DIAS"!=0';
		         $totalfilas = $connection->createCommand($filas)->queryRow();
			     if (count($totalfilas)==2){
			       $dias = $filasliquicion["MENL_DIAS"];
                   if(($dias)<=15){
                     $dias = $filasliquicion["MENL_DIAS"];
				     /*registro actuales*/             			  
			         if($dias!='' & $dias!=0){
					  $salario = round((($filasliquicion["MENL_SALARIO"])*30/$dias)/$totalfilas); $transp = round((($filasliquicion["MENL_TRANSPORTE"])*30/$dias)/$totalfilas); 
				      $aliment = round((($filasliquicion["MENL_ALIMENTACION"])*30/$dias)/$totalfilas); $prAntiguedad = round((($filasliquicion["MENL_PRIMAANTIGUEDAD"])*30/$dias)/$totalfilas); 
				      $prtecnica = round((($filasliquicion["MENL_PRIMATECNICA"])*30/$dias)/$totalfilas); $gastosrp = round((($filasliquicion["MENL_GASTOSRP"])*30/$dias)/$totalfilas);
                      $dias = 15;
				      $devengado = array($dias,$salario,$transp,$aliment,$prAntiguedad,$prtecnica,$gastosrp);
				     }	
				   }	
			     }else{
				        $dias = $filasliquicion["MENL_DIAS"];
					    if($dias!='' & $dias!=0){
						 $salario = round((($filasliquicion["MENL_SALARIO"])*30/$dias)); $transp = round((($filasliquicion["MENL_TRANSPORTE"])*30/$dias)); 
			 	         $aliment = round((($filasliquicion["MENL_ALIMENTACION"])*30/$dias)); $prAntiguedad = round((($filasliquicion["MENL_PRIMAANTIGUEDAD"])*30/$dias)); 
				         $prtecnica = round((($filasliquicion["MENL_PRIMATECNICA"])*30/$dias)); $gastosrp = round((($filasliquicion["MENL_GASTOSRP"])*30/$dias));
					     $devengado = array($dias,$salario,$transp,$aliment,$prAntiguedad,$prtecnica,$gastosrp);
                         $dias = 30;					   
					    }
					   }
				  $this->setRetroactivovariado($nomina,$Retroactivosnomina, $row["PEGE_ID"],$row["MENL_ID"],$devengado);
				}		  
		  }	 
	 }else{
	       /**
	       *calcula el retroactivo normalmente con los dias trabajados (30)
	       **/		   
		   if($row["DIAS"]==30){		   
			$this->setRetroactivonormal($nomina,$Retroactivosnomina, $row["PEGE_ID"],$row["MENL_ID"]);
		   }
	      } 
	 $cont++;
	 }
	}
	
	private function setRetroactivonormal($nomina,$Retroactivosnomina,$persona,$liquidacion){
	$connection = Yii::app()->db;
	$Retroactivosnominaliquidaciones = new Retroactivosnominaliquidaciones;
	
	$aumento = $Retroactivosnomina->RANO_AUMENTO/100;
	$aumentopunto = $Retroactivosnomina->RANO_AUMENTOPUNTO/100;
	$mesinicio = $Retroactivosnomina->RANO_ID.$Retroactivosnomina->RANO_MESINICIO;
	$mesfinal = $Retroactivosnomina->RANO_ID.$Retroactivosnomina->RANO_MESFINAL;
	
	/**
	 *consulta de las liquidaciones que a tenido el empleado entre los meses que se esta liquidando el retroactivo
	 */
	 $liquidaciones = '
	 SELECT COUNT(*) AS "TOTAL"
	 FROM
	 "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINA" mn, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl 
	 WHERE 
	 pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" AND pg."PEGE_ID" = '.$persona.'
	 AND mnl."MENO_ID" >= '.$mesinicio.'01 AND mnl."MENO_ID" <='.$mesfinal.'01	
	 ';
     $total = $connection->createCommand($liquidaciones)->queryRow();
	
	 /**
	 *consulta de los descuentos mensuales del cargo del empleado
	 */
	$string='SELECT dp."DEPR_ID", ROUND(np."NOPR_VALOR"/'.$total["TOTAL"].') AS "NOPR_VALOR"
	         FROM "TBL_NOMNOVEDADESPRESTACIONES" np, "TBL_NOMDESCUENTOSPRESTACIONES" dp
		     WHERE dp."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID"  = '.$persona.' AND dp."TIPR_ID" = 5
		     ORDER BY dp."DEPR_ID" ASC';
	$descuentos = $connection->createCommand($string)->queryAll();
	
	/**
	*se arma la consulta con los parametros de aumento, del empleado y tiempo de liquidacion
	*/
	$sql = '
	SELECT "MENL_ID", "MENL_CODIGO", "MENL_DIAS",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_SALARIO"*('.$aumento.') ELSE "MENL_SALARIO"*('.$aumentopunto.') END) AS "MENL_SALARIO",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_PRIMAANTIGUEDAD"*('.$aumento.') ELSE "MENL_PRIMAANTIGUEDAD"*('.$aumentopunto.') END) AS "MENL_PRIMAANTIGUEDAD",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_TRANSPORTE"*('.$aumento.') ELSE "MENL_TRANSPORTE"*('.$aumentopunto.') END) AS "MENL_TRANSPORTE",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_ALIMENTACION"*('.$aumento.') ELSE "MENL_ALIMENTACION"*('.$aumentopunto.') END) AS "MENL_ALIMENTACION",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_HEDTOTAL"*('.$aumento.') ELSE "MENL_HEDTOTAL"*('.$aumentopunto.') END) AS "MENL_HEDTOTAL",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_HENTOTAL"*('.$aumento.') ELSE "MENL_HENTOTAL"*('.$aumentopunto.') END) AS "MENL_HENTOTAL",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_HEDFTOTAL"*('.$aumento.') ELSE "MENL_HEDFTOTAL"*('.$aumentopunto.') END) AS "MENL_HEDFTOTAL",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_HENFTOTAL"*('.$aumento.') ELSE "MENL_HENFTOTAL"*('.$aumentopunto.') END) AS "MENL_HENFTOTAL",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_DYFTOTAL"*('.$aumento.') ELSE "MENL_DYFTOTAL"*('.$aumentopunto.') END) AS "MENL_DYFTOTAL",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_RENTOTAL"*('.$aumento.') ELSE "MENL_RENTOTAL"*('.$aumentopunto.') END) AS "MENL_RENTOTAL",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_RENDYFTOTAL"*('.$aumento.') ELSE "MENL_RENDYFTOTAL"*('.$aumentopunto.') END) AS "MENL_RENDYFTOTAL",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_PRIMATECNICA"*('.$aumento.') ELSE "MENL_PRIMATECNICA"*('.$aumentopunto.') END) AS "MENL_PRIMATECNICA",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_GASTOSRP"*('.$aumento.') ELSE "MENL_GASTOSRP"*('.$aumentopunto.') END) AS "MENL_GASTOSRP",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_BONIFICACION"*('.$aumento.') ELSE "MENL_BONIFICACION"*('.$aumentopunto.') END) AS "MENL_BONIFICACION",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_PRIMAVACACIONES"*('.$aumento.') ELSE "MENL_PRIMAVACACIONES"*('.$aumentopunto.') END) AS "MENL_PRIMAVACACIONES"
	FROM
	"TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINA" mn, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl 
	WHERE 
	pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" AND pg."PEGE_ID" = '.$persona.'
	AND mnl."MENL_ID" = '.$liquidacion;
	$row = $connection->createCommand($sql)->queryRow();	

	 $Retroactivosnominaliquidaciones->RANL_CODIGO = $row["MENL_CODIGO"];
	 $Retroactivosnominaliquidaciones->RANL_DIAS = $row["MENL_DIAS"];
	 $Retroactivosnominaliquidaciones->RANL_SALARIO = $row["MENL_SALARIO"];
	 $Retroactivosnominaliquidaciones->RANL_PRIMAANTIGUEDAD = $row["MENL_PRIMAANTIGUEDAD"];
	 $Retroactivosnominaliquidaciones->RANL_TRANSPORTE = $row["MENL_TRANSPORTE"];
	 $Retroactivosnominaliquidaciones->RANL_ALIMENTACION = $row["MENL_ALIMENTACION"];
	 $Retroactivosnominaliquidaciones->RANL_HEDTOTAL = $row["MENL_HEDTOTAL"];
	 $Retroactivosnominaliquidaciones->RANL_HENTOTAL = $row["MENL_HENTOTAL"];
	 $Retroactivosnominaliquidaciones->RANL_HEDFTOTAL = $row["MENL_HEDFTOTAL"];
	 $Retroactivosnominaliquidaciones->RANL_HENFTOTAL = $row["MENL_HENFTOTAL"];
	 $Retroactivosnominaliquidaciones->RANL_DYFTOTAL = $row["MENL_DYFTOTAL"];
	 $Retroactivosnominaliquidaciones->RANL_RENTOTAL = $row["MENL_RENTOTAL"];
	 $Retroactivosnominaliquidaciones->RANL_RENDYFTOTAL = $row["MENL_RENDYFTOTAL"];
	 $Retroactivosnominaliquidaciones->RANL_PRIMATECNICA = $row["MENL_PRIMATECNICA"];
	 $Retroactivosnominaliquidaciones->RANL_GASTOSRP = $row["MENL_GASTOSRP"];
	 $Retroactivosnominaliquidaciones->RANL_BONIFICACION = $row["MENL_BONIFICACION"];
	 $Retroactivosnominaliquidaciones->RANL_PRIMAVACACIONES = $row["MENL_PRIMAVACACIONES"];
	 $Retroactivosnominaliquidaciones->RANO_ID = $Retroactivosnomina->RANO_ID;
	 $Retroactivosnominaliquidaciones->MENL_ID = $liquidacion;
	 $Retroactivosnominaliquidaciones->RANL_FECHACAMBIO = date('Y-m-d H:i:s');
	 $Retroactivosnominaliquidaciones->RANL_REGISTRADOPOR = Yii::app()->user->id;
	 
	 if($Retroactivosnominaliquidaciones->save()){	
	  foreach($descuentos as $descuento){
		 $Retroactivosnominadescuentos = new Retroactivosnominadescuentos;		 
		 $Retroactivosnominadescuentos->RAND_VALOR = $descuento["NOPR_VALOR"];
         $Retroactivosnominadescuentos->DEPR_ID = $descuento["DEPR_ID"];
         $Retroactivosnominadescuentos->RANL_ID = $Retroactivosnominaliquidaciones->RANL_ID;
         $Retroactivosnominadescuentos->RAND_FECHACAMBIO = $Retroactivosnominaliquidaciones->RANL_FECHACAMBIO;
         $Retroactivosnominadescuentos->RAND_REGISTRADOPOR = $Retroactivosnominaliquidaciones->RANL_REGISTRADOPOR;
         if($Retroactivosnominadescuentos->save()){		 
		 }else{
		      echo $msg = print_r($Retroactivosnominadescuentos->getErrors(),1);			  
			  }      
		}	 
	  }else{
		    echo $msg = print_r($Retroactivosnominaliquidaciones->getErrors(),1);
		   }	
	}
	
	private function setRetroactivovariado($nomina,$Retroactivosnomina,$persona,$liquidacion,$devengado){
	$connection = Yii::app()->db;
	$Retroactivosnominaliquidaciones = new Retroactivosnominaliquidaciones;
	
	$aumento = $Retroactivosnomina->RANO_AUMENTO/100;
	$aumentopunto = $Retroactivosnomina->RANO_AUMENTOPUNTO/100;
	$mesinicio = $Retroactivosnomina->RANO_ID.$Retroactivosnomina->RANO_MESINICIO;
	$mesfinal = $Retroactivosnomina->RANO_ID.$Retroactivosnomina->RANO_MESFINAL;
	
	/**
	 *consulta de las liquidaciones que a tenido el empleado entre los meses que se esta liquidando el retroactivo
	 */
	 $liquidaciones = '
	 SELECT COUNT(*) AS "TOTAL"
	 FROM
	 "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINA" mn, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl 
	 WHERE 
	 pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" AND pg."PEGE_ID" = '.$persona.'
	 AND mnl."MENO_ID" >= '.$mesinicio.'01 AND mnl."MENO_ID" <='.$mesfinal.'01	
	 ';
     $total = $connection->createCommand($liquidaciones)->queryRow();
	
	 /**
	 *consulta de los descuentos mensuales del cargo del empleado
	 */
	 $string='SELECT dp."DEPR_ID", ROUND(np."NOPR_VALOR"/'.$total["TOTAL"].') AS "NOPR_VALOR"
	         FROM "TBL_NOMNOVEDADESPRESTACIONES" np, "TBL_NOMDESCUENTOSPRESTACIONES" dp
		     WHERE dp."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID"  = '.$persona.' AND dp."TIPR_ID" = 5
		     ORDER BY dp."DEPR_ID" ASC';
	 $descuentos = $connection->createCommand($string)->queryAll();
	
	/**
	*se arma la consulta con los parametros de aumento, del empleado y tiempo de liquidacion
	*/
	$sql = '
	SELECT "MENL_ID", "MENL_CODIGO", '.$devengado[0].' AS "MENL_DIAS",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN '.$devengado[1].'*('.$aumento.') ELSE '.$devengado[1].'*('.$aumentopunto.') END) AS "MENL_SALARIO",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN '.$devengado[4].'*('.$aumento.') ELSE '.$devengado[2].'*('.$aumentopunto.') END) AS "MENL_PRIMAANTIGUEDAD",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN '.$devengado[2].'*('.$aumento.') ELSE '.$devengado[3].'*('.$aumentopunto.') END) AS "MENL_TRANSPORTE",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN '.$devengado[3].'*('.$aumento.') ELSE '.$devengado[4].'*('.$aumentopunto.') END) AS "MENL_ALIMENTACION",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_HEDTOTAL"*('.$aumento.') ELSE "MENL_HEDTOTAL"*('.$aumentopunto.') END) AS "MENL_HEDTOTAL",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_HENTOTAL"*('.$aumento.') ELSE "MENL_HENTOTAL"*('.$aumentopunto.') END) AS "MENL_HENTOTAL",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_HEDFTOTAL"*('.$aumento.') ELSE "MENL_HEDFTOTAL"*('.$aumentopunto.') END) AS "MENL_HEDFTOTAL",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_HENFTOTAL"*('.$aumento.') ELSE "MENL_HENFTOTAL"*('.$aumentopunto.') END) AS "MENL_HENFTOTAL",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_DYFTOTAL"*('.$aumento.') ELSE "MENL_DYFTOTAL"*('.$aumentopunto.') END) AS "MENL_DYFTOTAL",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_RENTOTAL"*('.$aumento.') ELSE "MENL_RENTOTAL"*('.$aumentopunto.') END) AS "MENL_RENTOTAL",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_RENDYFTOTAL"*('.$aumento.') ELSE "MENL_RENDYFTOTAL"*('.$aumentopunto.') END) AS "MENL_RENDYFTOTAL",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN '.$devengado[5].'*('.$aumento.') ELSE '.$devengado[5].'*('.$aumentopunto.') END) AS "MENL_PRIMATECNICA",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN '.$devengado[6].'*('.$aumento.') ELSE '.$devengado[6].'*('.$aumentopunto.') END) AS "MENL_GASTOSRP",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_BONIFICACION"*('.$aumento.') ELSE "MENL_BONIFICACION"*('.$aumentopunto.') END) AS "MENL_BONIFICACION",
	ROUND(CASE WHEN ("MENL_PUNTOS"=0) THEN "MENL_PRIMAVACACIONES"*('.$aumento.') ELSE "MENL_PRIMAVACACIONES"*('.$aumentopunto.') END) AS "MENL_PRIMAVACACIONES"
	FROM
	"TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINA" mn, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl 
	WHERE 
	pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" AND pg."PEGE_ID" = '.$persona.'
	AND mnl."MENL_ID" = '.$liquidacion;
	$row = $connection->createCommand($sql)->queryRow();	

	 $Retroactivosnominaliquidaciones->RANL_CODIGO = $row["MENL_CODIGO"];
	 $Retroactivosnominaliquidaciones->RANL_DIAS = $row["MENL_DIAS"];
	 $Retroactivosnominaliquidaciones->RANL_SALARIO = $row["MENL_SALARIO"];
	 $Retroactivosnominaliquidaciones->RANL_PRIMAANTIGUEDAD = $row["MENL_PRIMAANTIGUEDAD"];
	 $Retroactivosnominaliquidaciones->RANL_TRANSPORTE = $row["MENL_TRANSPORTE"];
	 $Retroactivosnominaliquidaciones->RANL_ALIMENTACION = $row["MENL_ALIMENTACION"];
	 $Retroactivosnominaliquidaciones->RANL_HEDTOTAL = $row["MENL_HEDTOTAL"];
	 $Retroactivosnominaliquidaciones->RANL_HENTOTAL = $row["MENL_HENTOTAL"];
	 $Retroactivosnominaliquidaciones->RANL_HEDFTOTAL = $row["MENL_HEDFTOTAL"];
	 $Retroactivosnominaliquidaciones->RANL_HENFTOTAL = $row["MENL_HENFTOTAL"];
	 $Retroactivosnominaliquidaciones->RANL_DYFTOTAL = $row["MENL_DYFTOTAL"];
	 $Retroactivosnominaliquidaciones->RANL_RENTOTAL = $row["MENL_RENTOTAL"];
	 $Retroactivosnominaliquidaciones->RANL_RENDYFTOTAL = $row["MENL_RENDYFTOTAL"];
	 $Retroactivosnominaliquidaciones->RANL_PRIMATECNICA = $row["MENL_PRIMATECNICA"];
	 $Retroactivosnominaliquidaciones->RANL_GASTOSRP = $row["MENL_GASTOSRP"];
	 $Retroactivosnominaliquidaciones->RANL_BONIFICACION = $row["MENL_BONIFICACION"];
	 $Retroactivosnominaliquidaciones->RANL_PRIMAVACACIONES = $row["MENL_PRIMAVACACIONES"];
	 $Retroactivosnominaliquidaciones->RANO_ID = $Retroactivosnomina->RANO_ID;
	 $Retroactivosnominaliquidaciones->MENL_ID = $liquidacion;
	 $Retroactivosnominaliquidaciones->RANL_FECHACAMBIO = date('Y-m-d H:i:s');
	 $Retroactivosnominaliquidaciones->RANL_REGISTRADOPOR = Yii::app()->user->id;
	 
	 if($Retroactivosnominaliquidaciones->save()){	
	  foreach($descuentos as $descuento){
		 $Retroactivosnominadescuentos = new Retroactivosnominadescuentos;		 
		 $Retroactivosnominadescuentos->RAND_VALOR = $descuento["NOPR_VALOR"];
         $Retroactivosnominadescuentos->DEPR_ID = $descuento["DEPR_ID"];
         $Retroactivosnominadescuentos->RANL_ID = $Retroactivosnominaliquidaciones->RANL_ID;
         $Retroactivosnominadescuentos->RAND_FECHACAMBIO = $Retroactivosnominaliquidaciones->RANL_FECHACAMBIO;
         $Retroactivosnominadescuentos->RAND_REGISTRADOPOR = $Retroactivosnominaliquidaciones->RANL_REGISTRADOPOR;
         if($Retroactivosnominadescuentos->save()){		 
		 }else{
		      echo $msg = print_r($Retroactivosnominadescuentos->getErrors(),1);			  
			  }      
		}	 
	  }else{
		    echo $msg = print_r($Retroactivosnominaliquidaciones->getErrors(),1);
		   }	
	}
}









