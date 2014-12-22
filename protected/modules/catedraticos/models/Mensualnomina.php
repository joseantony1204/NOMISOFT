<?php
set_time_limit(0);
/**
 * Esta es la clase de modelo para la tabla "TBL_NOMMENSUALNOMINA".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMMENSUALNOMINA':
 * @Propiedad string $MENO_ID
 * @Propiedad string $MENO_PERIODO
 * @Propiedad string $MENO_FECHAPROCESO
 * @Propiedad boolean $MENO_ESTADO
 * @Propiedad integer $MENO_ANIO
 * @Propiedad string $MENO_FECHACAMBIO
 * @Propiedad integer $MENO_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad MENSUALNOMINALIQUIDACIONES[] $mENSUALNOMINALIQUIDACIONESs
 */
 
class Mensualnomina extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Mensualnomina la clase del modelo estàtico.
	 */
	
	public $Personageneral, $Catedra;
	public $Sindicato, $Facultad;
	public $codigo, $error;
	public $MENO_DETALLES;
	public $success, $warning, $flag;
	public $s, $w, $f;
	public $devengados, $parafiscal;
	public $liquidacion, $parafiscales, $descuentos;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
	/**
	 * @Devuelve CDbConnection conexiòn a la base de datos.
	 */
	public static $db3; 
	public function getDbConnection()
	{ 
	 if(self::$db3 !== null){ 
	  return self::$db3; 
	 }else{ 
	       self::$db3 = Yii::app()->db3; 
	       if (self::$db3 instanceof CDbConnection)
	       { 
		    self::$db3->setActive(true); 
			return self::$db3; 
	       }else{  
		         throw new CDbException(Yii::t('yii','Active Record requires a "db3" CDbConnection application component.')); 
	            } 
	      } 
	}
	
	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_CATMENSUALNOMINA';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('MENO_ID, MENO_PERIODO, MENO_FECHAPROCESO, MENO_ESTADO, MENO_ANIO, MENO_FECHACAMBIO, MENO_REGISTRADOPOR', 'required'),
			array('MENO_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('MENO_PERIODO', 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('MENO_ID, MENO_PERIODO, MENO_FECHAPROCESO, MENO_ESTADO, MENO_ANIO, MENO_FECHACAMBIO, MENO_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'mENSUALNOMINALIQUIDACIONESs' => array(self::HAS_MANY, 'MENSUALNOMINALIQUIDACIONES', 'MENO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'MENO_ID' => 'CODIGO',
						'MENO_PERIODO' => 'PERIODO LIQUIDACION',
						'MENO_FECHAPROCESO' => 'FECHA PROCESO',
						'MENO_ESTADO' => 'ESTADO',
						'MENO_ANIO' => 'AÑO',
						'MENO_DETALLES' => 'DETALLES',
						'MENO_FECHACAMBIO' => 'MENO FECHACAMBIO',
						'MENO_REGISTRADOPOR' => 'MENO REGISTRADOPOR',
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
		$sort->defaultOrder = 't."MENO_ID" DESC';
		$sort->attributes = array(
			
			'MENO_ID'=>array(
				'asc'=>'t."MENO_ID"',
				'desc'=>'t."MENO_ID" desc',
			),
			
			'MENO_PERIODO'=>array(
				'asc'=>'t."MENO_PERIODO"',
				'desc'=>'t."MENO_PERIODO" desc',
			),
			
			'MENO_FECHAPROCESO'=>array(
				'asc'=>'t."MENO_FECHAPROCESO"',
				'desc'=>'t."MENO_FECHAPROCESO" desc',
			),
			
			'MENO_ESTADO'=>array(
				'asc'=>'t."MENO_ESTADO"',
				'desc'=>'t."MENO_ESTADO" desc',
			),
			
			'MENO_ANIO'=>array(
				'asc'=>'t."MENO_ANIO"',
				'desc'=>'t."MENO_ANIO" desc',
			),
		);

		$criteria=new CDbCriteria;
		
		$criteria->compare('"MENO_ID"',$this->MENO_ID,false);
		$criteria->compare('"MENO_PERIODOn"',$this->MENO_PERIODO,true);
		$criteria->compare('"MENO_FECHAPROCESO"',$this->MENO_FECHAPROCESO,true);
		$criteria->compare('"MENO_ESTADO"',$this->MENO_ESTADO);
		$criteria->compare('"MENO_ANIO"',$this->MENO_ANIO);
		$criteria->compare('"MENO_FECHACAMBIO"',$this->MENO_FECHACAMBIO,true);
		$criteria->compare('"MENO_REGISTRADOPOR"',$this->MENO_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 50),
		));
	}
	
	public function periodoNomina($fecha){
	
	 $periodo=substr($fecha,4,2);
	 switch ($periodo) {
     case 1:
      $mes="I";
     break;
     case 2:
	  $mes="II";
	 break;
    }
   return "Corte ".substr($fecha,6,2)." de $mes - ".substr($fecha,0,4);
  }
	
	public function getEstado()
	{
		if($this->MENO_ESTADO==0){
		 $imageUrl = 'spellcheck_error.png';
		}else{
		      $imageUrl = 'spellcheck.png';
			 }
        return Yii::app()->baseurl.'/images/nomina/'.$imageUrl;		
	}
	
	
	public function validarNomina($Mensualnomina){
	  $this->error = "";
	  $connection = Yii::app()->db3;
	  
	  $sql = 'SELECT  "MENO_ID", "MENO_ESTADO" FROM "TBL_CATMENSUALNOMINA" mn ORDER BY  "MENO_ID" DESC LIMIT 1';
	  $query = $connection->createCommand($sql)->queryRow();
      $rows = $connection->createCommand($sql)->queryAll();
	  
	  $string = 'SELECT  * FROM "TBL_CATMENSUALNOMINA" mn WHERE mn."MENO_ID" = '.$Mensualnomina->MENO_ID;
      $queryString = $connection->createCommand($string)->queryRow();	  
      if (count($rows)>0){
	   $ultimoanionomina=substr($query["MENO_ID"],0,4);
	   $ultimomesnomina=(int)(substr($query["MENO_ID"],4,2));
	   $mesactual=date("n",strtotime($Mensualnomina->MENO_FECHAPROCESO));
	   $anioactual=date("Y",strtotime($Mensualnomina->MENO_FECHAPROCESO));
	   if (($queryString["MENO_ID"]) == ($Mensualnomina->MENO_ID)){
	     $this->error="Parece que ya se ha liquidado una nomina para este periodo : ".$this->periodoNomina($Mensualnomina->MENO_ID);
	    }
      }
     return $this->error;	  
	}
	
	
	
	public function liquidarNomina($objet,$notification=NULL){
	 $connection = Yii::app()->db3; 
	 $this->success = NULL; $this->warning = NULL; $this->flag = NULL;
	 $this->s = 0; $this->w = 0; $this->f = 0;
	
	 $secuencia = 'nextval('."'".'"TBL_CATMENSUALNOMINALIQUIDACIONES_MENL_ID_seq"'."'".'::regclass)';
	 $string = 'INSERT INTO "TBL_CATMENSUALNOMINALIQUIDACIONES" ( 
	                        SELECT '.$secuencia.', 
	                              c."CATE_ID", c."CATE_NUMHORAS", "CATE_VALORHORA", 0 AS "MENL_SALUDTOTAL", 0 AS "MENL_PENSIONTOTAL", 
                                  ROUND(("SIND_PORCENTAJE"/100*("CATE_NUMHORAS"*"CATE_VALORHORA")),2) AS "MENL_SINDICATOTOTAL",
                                  (("CATE_NUMHORAS"*"CATE_VALORHORA")*0.01) AS "MENL_ESTAMPILLA", 0 AS "MENL_RETEFUENTE", 
                                  c."CATE_ID", p."SALU_ID", p."PENS_ID", p."SIND_ID",
                                  '.$objet->MENO_ID.' AS "MENO_ID", '."'".date('Y-m-d H:i:s')."'".' AS "MENL_FECHACAMBIO", 
								  '."'".Yii::app()->user->id."'".' AS "MENL_REGISTRADOPOR"
							FROM "TBL_CATPERSONASGENERALES" p, "TBL_CATSINDICATOS" s, "TBL_CATCATEDRAS" c, "TBL_CATPERIODOSACADEMICOS" pa
						    WHERE p."PEGE_ID" = c."PEGE_ID" AND p."SIND_ID" = s."SIND_ID" AND c."PEAC_ID" = pa."PEAC_ID" AND pa."PEAC_ESTADO" = 1)
				';
	 $query = $connection->createCommand($string)->execute();
	 
	 $secuencia = 'nextval('."'".'"TBL_CATMENSUALNOMINADESCUENTOS_MEND_ID_seq"'."'".'::regclass)';
	 $string = 'INSERT INTO "TBL_CATMENSUALNOMINADESCUENTOS" ( 
	                        SELECT '.$secuencia.',
                                   nm."NOME_VALOR", nm."DEME_ID", c."CATE_ID",
                                   '.$objet->MENO_ID.' AS "MENO_ID", '."'".date('Y-m-d H:i:s')."'".' AS "MEND_FECHACAMBIO", 
								   '."'".Yii::app()->user->id."'".' AS "MEND_REGISTRADOPOR"
							FROM "TBL_CATNOVEDADESMENSUALES" nm, "TBL_CATCATEDRAS" c, "TBL_CATPERIODOSACADEMICOS" pa
							WHERE nm."CATE_ID" = c."CATE_ID" AND c."PEAC_ID" = pa."PEAC_ID" AND pa."PEAC_ESTADO" = 1)
				';
	 $query = $connection->createCommand($string)->execute();
	
	}
	
	public function previewLiquidation($Mensualnomina,$id){	
	 $connection = Yii::app()->db3; 
	 $this->success = NULL; $this->warning = NULL; $this->flag = NULL;
	 $this->s = 0; $this->w = 0; $this->f = 0;
	 
	 $secuencia = 'nextval('."'".'"TBL_CATMENSUALNOMINADESCUENTOS_MEND_ID_seq"'."'".'::regclass)';
	 $sql = 'SELECT '.$secuencia.' AS "MENL_ID", 
	                   c."CATE_ID" AS "MENL_CODIGO", c."CATE_NUMHORAS", "CATE_VALORHORA", ROUND(("CATE_NUMHORAS"*"CATE_VALORHORA")) AS "MENL_DEVENGADO",
                       '.$Mensualnomina->MENO_ID.' AS "MENO_ID", c."CATE_ID",  
                       ROUND(("CATE_NUMHORAS"*"CATE_VALORHORA")) AS "TOTAL_DEVENGADO"
				FROM "TBL_CATPERSONASGENERALES" p, "TBL_CATSINDICATOS" s, "TBL_CATCATEDRAS" c, "TBL_CATPERIODOSACADEMICOS" pa
				WHERE p."PEGE_ID" = c."PEGE_ID" AND p."PEGE_ID" = '.$id.' AND p."SIND_ID" = s."SIND_ID" 
				AND c."PEAC_ID" = pa."PEAC_ID" AND pa."PEAC_ESTADO" = 1
				ORDER BY c."CATE_ID" DESC
				';
	 $query = $connection->createCommand($sql)->queryAll();
	 
	 $array = array('ID LIQUIDACION','CODIGO','T. HORAS','VLR HORA','ID NOMINA','ID CATEDRA','TOTAL DEVENGADO');
	 $j=0; $i=0;
	 foreach ($array as $values=>$value) {	
	  $this->liquidacion[$j][$i] = $value;
	  $i++;  
	 }
	 
	 $j=1;
	 foreach ($query as $values) {	
	  $i=0;
	  foreach ($values as $value) {      	 
	   $this->liquidacion[$j][$i] = $value;
	  $i++;
	  }
     $j++;	 
     }
	 
	 $string='SELECT COUNT("MENL_ID") AS "MENL_ID", COUNT("MENL_CODIGO") AS "MENL_CODIGO", SUM("CATE_NUMHORAS") AS "MENL_HORASAPAGAR", 
	                 SUM("CATE_VALORHORA") AS "MENL_VALORHORA", SUM("MENL_DEVENGADO") AS "MENL_DEVENGADO",
					 COUNT("MENO_ID") AS "MENO_ID", COUNT("CATE_ID") AS "CATE_ID", SUM("TOTAL_DEVENGADO") AS "TOTAL_DEVENGADO"
              FROM ('.$sql.') d
		     ';
	$rows = $connection->createCommand($string)->queryAll();	 
	 $j=$j;
	 foreach ($rows as $values) {	
	   $i=0;
	   foreach ($values as $value) {      	 
	    $this->liquidacion[$j][$i] = $value;
	    $i++;
	   }
       $j++;	 
     }
     
	 //echo "<br><br><br>".
	 $sql = 'SELECT '.$secuencia.' AS "MENL_ID", p."SALU_ID", 0 AS "MENL_SALUDTOTAL", p."PENS_ID", 0 AS "MENL_PENSIONTOTAL",
	                   p."SIND_ID", ROUND(("SIND_PORCENTAJE"/100*("CATE_NUMHORAS"*"CATE_VALORHORA")),2) AS "MENL_SINDICATOTOTAL",
                       (("CATE_NUMHORAS"*"CATE_VALORHORA")*0.01) AS "MENL_ESTAMPILLA", 0 AS "MENL_RETEFUENTE", 
                       '.$Mensualnomina->MENO_ID.' AS "MENO_ID", c."CATE_ID",
					   (0+0+ROUND(("SIND_PORCENTAJE"/100*("CATE_NUMHORAS"*"CATE_VALORHORA")),2)+(("CATE_NUMHORAS"*"CATE_VALORHORA")*0.01)+0) AS "MENL_PARAFISCALES"
				FROM "TBL_CATPERSONASGENERALES" p, "TBL_CATSINDICATOS" s, "TBL_CATCATEDRAS" c, "TBL_CATPERIODOSACADEMICOS" pa
				WHERE p."PEGE_ID" = c."PEGE_ID" AND p."PEGE_ID" = '.$id.' AND p."SIND_ID" = s."SIND_ID" AND c."PEAC_ID" = pa."PEAC_ID" 
				AND pa."PEAC_ESTADO" = 1 ORDER BY c."CATE_ID" DESC
				';
	 $query = $connection->createCommand($sql)->queryAll();

     $array = array('ID PARAFISCAL','IDSALUD','SALUD','IDPENSION','PENSION','IDSINDICATO','SINDICATO',
	               'ESTAMPILLA','RETEFUENTE', 'ID NOMINA','IDCATEDRA','TOTAL PARAFISCAL');
				   
	 $j=0; $i=0;
	 foreach ($array as $values=>$value) {	
	  $this->parafiscales[$j][$i] = $value;
	  $i++;  
	 }

     $j=1;
	 foreach ($query as $values) {	
	   $i=0;
	   foreach ($values as $value) {      	 
	    $this->parafiscales[$j][$i] = $value;
	    $i++;
	   }
       $j++;	 
     }

     //echo "<br><br><br>".
	 $string='SELECT COUNT("MENL_ID") AS "MENL_ID", COUNT("SALU_ID") AS "SALU_ID", SUM("MENL_SALUDTOTAL") AS "MENL_SALUDTOTAL", COUNT("PENS_ID") AS "PENS_ID", 
                     SUM("MENL_PENSIONTOTAL") AS "MENL_PENSIONTOTAL", COUNT("SIND_ID") AS "SIND_ID", 
                     SUM("MENL_SINDICATOTOTAL") AS "MENL_SINDICATOTOTAL", SUM("MENL_ESTAMPILLA") AS "MENL_ESTAMPILLA", 
                     SUM("MENL_RETEFUENTE") AS "MENL_RETEFUENTE", COUNT("MENO_ID") AS "MENO_ID",COUNT("CATE_ID") AS "CATE_ID", 
                     SUM("MENL_PARAFISCALES") AS "MENL_PARAFISCALES"
              FROM ('.$sql.') d
		      ';	 
	 $rows = $connection->createCommand($string)->queryAll();	 
	 $j=$j;
	 foreach ($rows as $values) {	
	   $i=0;
	   foreach ($values as $value) {      	 
	    $this->parafiscales[$j][$i] = $value;
	    $i++;
	   }
       $j++;	 
     }
	 
	 $this->getDescuentosPreview($Mensualnomina,$id);
	}
	
	public function getDescuentosPreview($Mensualnomina,$id)
	{
	 $connection = Yii::app()->db3;
	 
	 $this->descuentos = NULL;
	 //echo "<br><br><br>".
	 $string1 = 'SELECT c."CATE_ID" AS  "MENL_ID",  nm."DEME_ID", nm."NOME_VALOR", '.$Mensualnomina->MENO_ID.' AS "MENO_ID"
				 FROM "TBL_CATDESCUENTOSMENSUALES" dm, "TBL_CATNOVEDADESMENSUALES" nm, "TBL_CATCATEDRAS" c, "TBL_CATPERIODOSACADEMICOS" pa
				 WHERE dm."DEME_ID" = nm."DEME_ID" AND nm."CATE_ID" = c."CATE_ID" AND c."PEGE_ID" = '.$id.'
				 AND c."PEAC_ID" = pa."PEAC_ID" AND pa."PEAC_ESTADO" = 1 
				 ORDER BY dm."DEME_ID", c."CATE_ID" DESC';
		   
     $rows1 = $connection->createCommand($string1)->queryAll();
	 
	 $string2 = 'SELECT c."CATE_ID" AS  "MENL_ID", '.$Mensualnomina->MENO_ID.' AS "MENO_ID"
				  FROM "TBL_CATDESCUENTOSMENSUALES" dm, "TBL_CATNOVEDADESMENSUALES" nm, "TBL_CATCATEDRAS" c, "TBL_CATPERIODOSACADEMICOS" pa
				  WHERE dm."DEME_ID" = nm."DEME_ID" AND nm."CATE_ID" = c."CATE_ID" AND c."PEGE_ID" = '.$id.'
			      AND c."PEAC_ID" = pa."PEAC_ID" AND pa."PEAC_ESTADO" = 1 
				  GROUP BY c."CATE_ID"
			      ORDER BY c."CATE_ID" DESC';		   
		   
     $rows2 = $connection->createCommand($string2)->queryAll();
	 $cont=1;	 
	 foreach ($rows2 as $values) {	     	 
	    $this->descuentos[$cont][0] = $values["MENL_ID"];
		$filas[$cont]=$values["MENO_ID"];
        $cont++;		
     }
	 $this->descuentos[$cont][0] = "Total";
	 
	 $string3 = 'SELECT dm."DEME_DESCRIPCION" 
				 FROM "TBL_CATDESCUENTOSMENSUALES" dm, "TBL_CATNOVEDADESMENSUALES" nm, "TBL_CATCATEDRAS" c, "TBL_CATPERIODOSACADEMICOS" pa
				 WHERE dm."DEME_ID" = nm."DEME_ID" AND nm."CATE_ID" = c."CATE_ID" AND c."PEGE_ID" = '.$id.'
				 AND c."PEAC_ID" = pa."PEAC_ID" AND pa."PEAC_ESTADO" = 1 
				 GROUP BY dm."DEME_ID"
				 ORDER BY dm."DEME_ID"';
		   
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
	
	public function cargarEmpleoPlanta($catedraId){
	  $connection = Yii::app()->db3;
	  $this->Personageneral = NULL;
	  $this->Catedra = NULL;
	  $this->Sindicato = NULL;
	  $this->Facultad = NULL;
	  
	  /*creamos un registro persona-empleo-estadoempleo por cada empleo encontrado anteriormente*/
	  $string =' SELECT p."PEGE_ID", c.*, f.*
	             FROM "TBL_CATPERSONASGENERALES" "p", "TBL_CATCATEDRAS" "c", "TBL_CATFACULTADES" "f" 
			     WHERE p."PEGE_ID" = c."PEGE_ID" AND c."FACU_ID" = f."FACU_ID"
			     AND c."CATE_ID" = '.$catedraId.'
				 ORDER BY c."CATE_ID" DESC
			     LIMIT 1';	 
	  $sqlQuery = $connection->createCommand($string)->queryRow();
	  
	  /*cargamos todos los modelos disponibles para dicho cargo*/
	  $this->Personageneral = Personasgenerales::model()->findByPk($sqlQuery["PEGE_ID"]);
	  $this->Catedra = Catedras::model()->findByPk($sqlQuery["CATE_ID"]);
	  
	  $this->Facultad = Facultades::model()->findByPk($sqlQuery["FACU_ID"]);
	  $this->Sindicato = Sindicatos::model()->findByPk($sqlQuery["SIND_ID"]);	  
	}
}














