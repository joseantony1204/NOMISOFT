<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMSEMESTRALNOMINALIQUIDACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMSEMESTRALNOMINALIQUIDACIONES':
 * @Propiedad string $SENL_ID
 * @Propiedad integer $SENL_CODIGO
 * @Propiedad integer $SENL_MESES
 * @Propiedad string $SENL_PUNTOS
 * @Propiedad integer $SENL_SALARIO
 * @Propiedad integer $SENL_PRIMAANTIGUEDAD
 * @Propiedad integer $SENL_TRANSPORTE
 * @Propiedad integer $SENL_ALIMENTACION
 * @Propiedad integer $SENL_PRIMATECNICA
 * @Propiedad integer $SENL_GASTOSRP
 * @Propiedad integer $SENL_BONIFICACION
 * @Propiedad integer $SENL_RETEFUENTE
 * @Propiedad integer $SENO_ID
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $SENL_FECHACAMBIO
 * @Propiedad integer $SENL_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad SEMESTRALNOMINA $sENO
 * @Propiedad SEMESTRALNOMINADESCUENTOS[] $sEMESTRALNOMINADESCUENTOSes
 */
class Semestralnominaliquidaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Semestralnominaliquidaciones la clase del modelo estàtico.
	 */
	public $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS;
    public $SENL_DEVENGADO, $SENL_DESCUENTOS, $SENL_TOTALGRAL;
    public $liquidacion, $parafiscales, $descuentos;
    public $prestaciones, $prestacionesDataProvider;
    public $DETALLES; 
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
		return 'TBL_NOMSEMESTRALNOMINALIQUIDACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('SENL_CODIGO, SENL_MESES, SENL_PUNTOS, SENL_SALARIO, SENL_PRIMAANTIGUEDAD, SENL_TRANSPORTE, SENL_ALIMENTACION, SENL_PRIMATECNICA, SENL_GASTOSRP, SENL_BONIFICACION, SENL_RETEFUENTE, SENO_ID, EMPL_ID, SENL_FECHACAMBIO, SENL_REGISTRADOPOR', 'required'),
			array('SENL_CODIGO, SENL_MESES, SENL_SALARIO, SENL_PRIMAANTIGUEDAD, SENL_TRANSPORTE, SENL_ALIMENTACION, SENL_PRIMATECNICA, SENL_GASTOSRP, SENL_BONIFICACION, SENL_RETEFUENTE, SENO_ID, EMPL_ID, SENL_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('SENL_ID, SENL_CODIGO, SENL_MESES, SENL_PUNTOS, SENL_SALARIO, SENL_PRIMAANTIGUEDAD, SENL_TRANSPORTE, 
			       SENL_ALIMENTACION, SENL_PRIMATECNICA, SENL_GASTOSRP, SENL_BONIFICACION, SENL_RETEFUENTE, SENO_ID, 
				   EMPL_ID, SENL_FECHACAMBIO, SENL_REGISTRADOPOR,
				   PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'search'),
			
			array('SENL_ID, SENL_CODIGO, SENL_MESES, SENL_PUNTOS, SENL_SALARIO, SENL_PRIMAANTIGUEDAD, SENL_TRANSPORTE, 
			       SENL_ALIMENTACION, SENL_PRIMATECNICA, SENL_GASTOSRP, SENL_BONIFICACION, SENL_RETEFUENTE, SENO_ID, 
				   EMPL_ID, SENL_FECHACAMBIO, SENL_REGISTRADOPOR,
				   PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'totales'),
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
			'sENO' => array(self::BELONGS_TO, 'SEMESTRALNOMINA', 'SENO_ID'),
			'sEMESTRALNOMINADESCUENTOSes' => array(self::HAS_MANY, 'SEMESTRALNOMINADESCUENTOS', 'SENL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'SENL_ID' => 'ID',
						'SENL_CODIGO' => 'CODIGO',
						'SENL_MESES' => 'MESES',
						'SENL_PUNTOS' => 'PUNTOS',
						'SENL_SALARIO' => 'SALARIO',
						'SENL_PRIMAANTIGUEDAD' => 'PRIMA ANTIGUEDAD',
						'SENL_TRANSPORTE' => 'TRANSPORTE',
						'SENL_ALIMENTACION' => 'ALIMENTACION',
						'SENL_PRIMATECNICA' => 'PRIMA TECNICA',
						'SENL_GASTOSRP' => 'GASTOS REPRESENTACION',
						'SENL_BONIFICACION' => 'BONIFICACION',
						
						'SENO_ID' => 'SENO',
						'EMPL_ID' => 'EMPL',
						'SENL_FECHACAMBIO' => 'SENL FECHACAMBIO',
						'SENL_REGISTRADOPOR' => 'SENL REGISTRADOPOR',
						
						'SENL_DEVENGADO' => 'DEVENG.(+)',
						'SENL_RETEFUENTE' => 'RETEFUENTE (-)',
						'SENL_DESCUENTOS' => 'DEDUCC.(-)',
						'SENL_TOTALGRAL' => 'NETO',
						
						'DETALLES' => 'VER',
						
						'PEGE_IDENTIFICACION' => 'IDENTIDAD',
						'PEGE_PRIMERNOMBRE' => 'NOMBRE',
						'PEGE_SEGUNDONOMBRE' => 'SEGUNDO NOMBRE',
						'PEGE_PRIMERAPELLIDO' => 'APELLIDO',
						'PEGE_SEGUNDOAPELLIDOS' => 'SEGUNDO APELLIDO',
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

		$criteria->compare('SENL_ID',$this->SENL_ID,true);
		$criteria->compare('SENL_CODIGO',$this->SENL_CODIGO);
		$criteria->compare('SENL_MESES',$this->SENL_MESES);
		$criteria->compare('SENL_PUNTOS',$this->SENL_PUNTOS,true);
		$criteria->compare('SENL_SALARIO',$this->SENL_SALARIO);
		$criteria->compare('SENL_PRIMAANTIGUEDAD',$this->SENL_PRIMAANTIGUEDAD);
		$criteria->compare('SENL_TRANSPORTE',$this->SENL_TRANSPORTE);
		$criteria->compare('SENL_ALIMENTACION',$this->SENL_ALIMENTACION);
		$criteria->compare('SENL_PRIMATECNICA',$this->SENL_PRIMATECNICA);
		$criteria->compare('SENL_GASTOSRP',$this->SENL_GASTOSRP);
		$criteria->compare('SENL_BONIFICACION',$this->SENL_BONIFICACION);
		$criteria->compare('SENL_RETEFUENTE',$this->SENL_RETEFUENTE);
		$criteria->compare('SENO_ID',$this->SENO_ID);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('SENL_FECHACAMBIO',$this->SENL_FECHACAMBIO,true);
		$criteria->compare('SENL_REGISTRADOPOR',$this->SENL_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	public function totales()
	{
		//Advertencia: Por favor, modifique el siguiente código para quitar atributos que
        //No debe ser buscado.
		
		$sort = new CSort();
		$sort->defaultOrder = 'p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS" ASC';
		$sort->attributes = array(			
			'PEGE_IDENTIFICACION'=>array(
				'asc'=>'p."PEGE_IDENTIFICACION"',
				'desc'=>'p."PEGE_IDENTIFICACION" desc',
			),
			
			'PEGE_PRIMERNOMBRE'=>array(
				'asc'=>'p."PEGE_PRIMERNOMBRE"',
				'desc'=>'p."PEGE_PRIMERNOMBRE" desc',
			),
			
			'PEGE_SEGUNDONOMBRE'=>array(
				'asc'=>'p."PEGE_SEGUNDONOMBRE"',
				'desc'=>'p."PEGE_SEGUNDONOMBRE" desc',
			),
			
			'PEGE_PRIMERAPELLIDO'=>array(
				'asc'=>'p."PEGE_PRIMERAPELLIDO"',
				'desc'=>'p."PEGE_PRIMERAPELLIDO" desc',
			),
			
			'PEGE_SEGUNDOAPELLIDOS'=>array(
				'asc'=>'p."PEGE_SEGUNDOAPELLIDOS"',
				'desc'=>'p."PEGE_SEGUNDOAPELLIDOS" desc',
			),
			
			'SENL_MESES'=>array(
				'asc'=>'t."SENL_MESES"',
				'desc'=>'t."SENL_MESES" desc',
			),
			
			'SENL_PUNTOS'=>array(
				'asc'=>'t."SENL_PUNTOS"',
				'desc'=>'t."SENL_PUNTOS" desc',
			),
			
			'SENL_SALARIO'=>array(
				'asc'=>'t."SENL_SALARIO"',
				'desc'=>'t."SENL_SALARIO" desc',
			),
			
			'SENL_DEVENGADO'=>array(
				'asc'=>'(t."SENL_SALARIO"+t."SENL_PRIMAANTIGUEDAD"+t."SENL_TRANSPORTE"+t."SENL_ALIMENTACION"+t."SENL_PRIMATECNICA"
							+t."SENL_GASTOSRP"+t."SENL_BONIFICACION")',
				'desc'=>'(t."SENL_SALARIO"+t."SENL_PRIMAANTIGUEDAD"+t."SENL_TRANSPORTE"+t."SENL_ALIMENTACION"+t."SENL_PRIMATECNICA"
							+t."SENL_GASTOSRP"+t."SENL_BONIFICACION") DESC',
			),
			
			'SENL_RETEFUENTE'=>array(
				'asc'=>'t."SENL_RETEFUENTE"',
				'desc'=>'t."SENL_RETEFUENTE" desc',
			),
			
			'SENL_DESCUENTOS'=>array(
				'asc'=>'(SELECT SUM("SEND_VALOR") 
							 FROM "TBL_NOMSEMESTRALNOMINADESCUENTOS" snd 
							 WHERE snd."SENL_ID" = t."SENL_ID"
							 )',
				'desc'=>'(SELECT SUM("SEND_VALOR") 
							 FROM "TBL_NOMSEMESTRALNOMINADESCUENTOS" snd 
							 WHERE snd."SENL_ID" = t."SENL_ID"
							 ) DESC',
			),
			
			'SENL_TOTALGRAL'=>array(
				'asc'=>'((t."SENL_SALARIO"+t."SENL_PRIMAANTIGUEDAD"+t."SENL_TRANSPORTE"+t."SENL_ALIMENTACION"+t."SENL_PRIMATECNICA"
							+t."SENL_GASTOSRP"+t."SENL_BONIFICACION")-((
							t."SENL_RETEFUENTE"
							 )+(SELECT SUM("SEND_VALOR") 
							 FROM "TBL_NOMSEMESTRALNOMINADESCUENTOS" snd 
							 WHERE snd."SENL_ID" = t."SENL_ID"
							 )))',
				'desc'=>'((t."SENL_SALARIO"+t."SENL_PRIMAANTIGUEDAD"+t."SENL_TRANSPORTE"+t."SENL_ALIMENTACION"+t."SENL_PRIMATECNICA"
							+t."SENL_GASTOSRP"+t."SENL_BONIFICACION")-((
							t."SENL_RETEFUENTE"
							 )+(SELECT SUM("SEND_VALOR") 
							 FROM "TBL_NOMSEMESTRALNOMINADESCUENTOS" snd 
							 WHERE snd."SENL_ID" = t."SENL_ID"
							 ))) desc',
			),
        );

		$criteria=new CDbCriteria;
		
		$criteria->select = 'p.*, ep.*, t.*,
		                    SUM(t."SENL_SALARIO"+t."SENL_PRIMAANTIGUEDAD"+t."SENL_TRANSPORTE"+t."SENL_ALIMENTACION"+t."SENL_PRIMATECNICA"
							+t."SENL_GASTOSRP"+t."SENL_BONIFICACION") AS "SENL_DEVENGADO",
							 
							 t."SENL_RETEFUENTE",
							
							(SELECT SUM("SEND_VALOR") 
							 FROM "TBL_NOMSEMESTRALNOMINADESCUENTOS" snd 
							 WHERE snd."SENL_ID" = t."SENL_ID"
							 ) AS "SENL_DESCUENTOS"							
							';
		$criteria->join = '
		                   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON t."EMPL_ID" = ep."EMPL_ID"
		                   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"';
        $criteria->group = 'ep."EMPL_ID", p."PEGE_ID", t."SENL_ID"';

		$criteria->compare('"SENL_ID"',$this->SENL_ID,true);
		$criteria->compare('"SENL_CODIGO"',$this->SENL_CODIGO);
		$criteria->compare('"SENL_MESES"',$this->SENL_MESES);
		$criteria->compare('"SENL_PUNTOS"',$this->SENL_PUNTOS,true);
		$criteria->compare('"SENL_SALARIO"',$this->SENL_SALARIO);
		$criteria->compare('"SENL_PRIMAANTIGUEDAD"',$this->SENL_PRIMAANTIGUEDAD);
		$criteria->compare('"SENL_TRANSPORTE"',$this->SENL_TRANSPORTE);
		$criteria->compare('"SENL_ALIMENTACION"',$this->SENL_ALIMENTACION);
		$criteria->compare('"SENL_PRIMATECNICA"',$this->SENL_PRIMATECNICA);
		$criteria->compare('"SENL_GASTOSRP"',$this->SENL_GASTOSRP);
		$criteria->compare('"SENL_BONIFICACION"',$this->SENL_BONIFICACION);
		$criteria->compare('"SENL_RETEFUENTE"',$this->SENL_RETEFUENTE);
		$criteria->compare('"SENO_ID"',$this->SENO_ID);
		$criteria->compare('"EMPL_ID"',$this->EMPL_ID);
		$criteria->compare('"SENL_FECHACAMBIO"',$this->SENL_FECHACAMBIO,true);
		$criteria->compare('"SENL_REGISTRADOPOR"',$this->SENL_REGISTRADOPOR);
		
		$criteria->compare('"SENL_DEVENGADO"',$this->SENL_DEVENGADO);
		$criteria->compare('"SENL_DESCUENTOS"',$this->SENL_DESCUENTOS);
		$criteria->compare('"SENL_TOTALGRAL"',$this->SENL_TOTALGRAL);
		
		
		$criteria->compare('"PEGE_IDENTIFICACION"',$this->PEGE_IDENTIFICACION,true);
		$criteria->compare('"PEGE_PRIMERNOMBRE"',$this->PEGE_PRIMERNOMBRE,true);
		$criteria->compare('"PEGE_SEGUNDONOMBRE"',$this->PEGE_SEGUNDONOMBRE,true);
		$criteria->compare('"PEGE_PRIMERAPELLIDO"',$this->PEGE_PRIMERAPELLIDO,true);
		$criteria->compare('"PEGE_SEGUNDOAPELLIDOS"',$this->PEGE_SEGUNDOAPELLIDOS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 500),
		));
	}
	
	public function mostrarLiquidacion($parametros)
	{
	 //echo "<br><br><br>";
	 $connection = Yii::app()->db2;
	 $this->liquidacion = NULL; $this->parafiscales = NULL;
	 $sql='SELECT snl."SENL_ID", snl."SENL_CODIGO", snl."SENL_MESES", snl."SENL_PUNTOS", snl."SENL_SALARIO", snl."SENL_PRIMAANTIGUEDAD", snl."SENL_TRANSPORTE",
	              snl."SENL_ALIMENTACION", snl."SENL_PRIMATECNICA", snl."SENL_GASTOSRP", snl."SENL_BONIFICACION", snl."SENO_ID", snl."EMPL_ID",  
                  SUM(snl."SENL_SALARIO"+snl."SENL_PRIMAANTIGUEDAD"+snl."SENL_TRANSPORTE"+snl."SENL_ALIMENTACION"+snl."SENL_PRIMATECNICA"
							+snl."SENL_GASTOSRP"+snl."SENL_BONIFICACION"
					  ) AS "SENL_DEVENGADO"
		   FROM "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" "snl"
		   INNER JOIN "TBL_NOMSEMESTRALNOMINA" "sn" ON snl."SENO_ID" = sn."SENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON snl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY snl."SENL_ID", p."PEGE_ID",  sn."SENO_ID"
           ORDER BY sn."SENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS" ASC
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll(); 
	 
	 $array = array('ID LIQUIDACION','CODIGO','DIAS','PUNTOS','SALARIO','PRIMA ATIGUEDAD','SUBSIDIO TRANSPORTE','SUBSIDIO ALIMENTACION',
	                'PRIMA TECNICA','GASTOS REPRESENTACION','1/12 BON. DE SERVICIOS','ID NOMINA','ID EMPLEO','TOTAL DEVENGADO');
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
	 
	 //echo "<br><br><br>".
	 $string='SELECT COUNT("SENL_ID") AS "SENL_ID", COUNT("SENL_CODIGO") AS "SENL_CODIGO", SUM("SENL_MESES") AS "SENL_MESES", SUM("SENL_PUNTOS") AS "SENL_PUNTOS", 
	                 SUM("SENL_SALARIO") AS "SENL_SALARIO", SUM("SENL_PRIMAANTIGUEDAD") AS "SENL_PRIMAANTIGUEDAD",
                     SUM("SENL_TRANSPORTE") AS "SENL_TRANSPORTE", SUM("SENL_ALIMENTACION") AS "SENL_ALIMENTACION", 
					 SUM("SENL_PRIMATECNICA") AS "SENL_PRIMATECNICA", SUM("SENL_GASTOSRP") AS "SENL_GASTOSRP", SUM("SENL_BONIFICACION") AS "SENL_BONIFICACION", 
                     COUNT("SENO_ID") AS "SENO_ID", COUNT("EMPL_ID") AS "EMPL_ID", 
					 SUM("SENL_DEVENGADO") AS "SENL_DEVENGADO"
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
	 
	 $sql='SELECT snl."SENL_ID", snl."SENL_RETEFUENTE"
		   FROM "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" "snl"
		   INNER JOIN "TBL_NOMSEMESTRALNOMINA" "sn" ON snl."SENO_ID" = sn."SENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON snl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY snl."SENL_ID", p."PEGE_ID",  sn."SENO_ID"
           ORDER BY sn."SENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS" ASC
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll(); 
	 
	 $array = array( 'ID NOMINA', 'RETEFUENTE',);
	 $j=0; $i=0;
	 foreach ($array as $values=>$value) {	
	  $this->parafiscales[$j][$i] = $value;
	  $i++;  
	 }
	
	 $j=1;
	 foreach ($rows as $values) {	
	  $i=0;
	  foreach ($values as $value) {      	 
	   $this->parafiscales[$j][$i] = $value;
	  $i++;
	  }
     $j++;	 
     }
	 
	 //echo "<br><br><br>".
	 $string='SELECT COUNT("SENL_ID") AS "SENL_ID", SUM("SENL_RETEFUENTE") AS "SENL_RETEFUENTE"
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
	 $this->getDescuentos($parametros);
	}
	
	public function getDescuentos($parametros)
	{
	 $connection = Yii::app()->db2;
	 $this->descuentos = NULL;
	 //echo "<br><br><br>";
	 $string1='SELECT  snl."SENL_ID", snd."DEPR_ID", snd."SEND_VALOR", sn."SENO_ID"
	           FROM  "TBL_NOMSEMESTRALNOMINADESCUENTOS" "snd"
		       INNER JOIN "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" "snl" ON snl."SENL_ID" = snd."SENL_ID"
			   INNER JOIN "TBL_NOMSEMESTRALNOMINA" "sn" ON snl."SENO_ID" = sn."SENO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON snl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE '.$parametros.'
               GROUP BY sn."SENO_ID", snl."SENL_ID", snd."SEND_ID", p."PEGE_ID"
               ORDER BY snd."DEPR_ID", sn."SENO_ID", p."PEGE_PRIMERAPELLIDO", snl."SENL_ID" ASC';
		   
     $rows1 = $connection->createCommand($string1)->queryAll();
	 
	 $string2='SELECT  snl."SENL_ID", sn."SENO_ID"
	           FROM  "TBL_NOMSEMESTRALNOMINADESCUENTOS" "snd"
		       INNER JOIN "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" "snl" ON snl."SENL_ID" = snd."SENL_ID"
			   INNER JOIN "TBL_NOMSEMESTRALNOMINA" "sn" ON snl."SENO_ID" = sn."SENO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON snl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE '.$parametros.'
			   GROUP BY sn."SENO_ID", snl."SENL_ID", p."PEGE_ID"
               ORDER BY sn."SENO_ID", p."PEGE_PRIMERAPELLIDO", snl."SENL_ID" ASC
               ';
		   
     $rows2 = $connection->createCommand($string2)->queryAll();
	 $cont=1;	 
	 foreach ($rows2 as $values) {	     	 
	    $this->descuentos[$cont][0] = $values["SENL_ID"];
		$filas[$cont]=$values["SENO_ID"];
        $cont++;		
     }
	 $this->descuentos[$cont][0] = "Total";
	 $string3='SELECT dp."DEPR_DESCRIPCION"
               FROM "TBL_NOMDESCUENTOSPRESTACIONES" dp
               WHERE dp."TIPR_ID" = 1 AND dp."DEPR_ID" IN
               (
               SELECT  snd."DEPR_ID"
	           FROM  "TBL_NOMSEMESTRALNOMINADESCUENTOS" "snd"
		       INNER JOIN "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" "snl" ON snl."SENL_ID" = snd."SENL_ID"
			   INNER JOIN "TBL_NOMSEMESTRALNOMINA" "sn" ON snl."SENO_ID" = sn."SENO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON snl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE '.$parametros.'
               ) ORDER BY dp."DEPR_ID" ';
		   
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
	      $this->descuentos[$i][$col] = $this->descuentos[$i][$col]+$descuentos[$x][2]+$suma;
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

	
	
	
	public function getDetalles()
	{
		$imageUrl = 'icon_search.png';
        return Yii::app()->baseurl.'/images/'.$imageUrl;		
	}
	
	public	function getCesantias($valor){
		return ($valor*0.0833);
	}

	public	function getInteresesCesantias($valor){
			return ($valor*0.01);
	}

	public	function getPrimaNavidad($valor){
			return ($valor*0.0833);
	}

	public	function getPrimaSemestral($valor){
			return ($valor*0.0833);
	}

	public	function getPrimaVacaciones($valor){
			return ($valor*0.0416);
	}

	public	function getVacaciones($valor){
			return ($valor*0.0416);
	}

	public	function getIcbf($valor){
			return ($valor*0.03);
	}

	public	function getCajaCompensacion($valor){
			return ($valor*0.04);
	}

	public	function getSaludPatronal($valor){
			$salude=4;
			$saludt=8.5;
			return ($valor*$saludt/$salude);
	}

	public	function getSaludAporteTotal($valor){
			$salude=4;
			$saludt=12.5;
			return ($valor*$saludt/$salude);
	}

	public	function getPensionPatronal($valor){
			$pensione=4;
			$pensiont=12;
			return ($valor*$pensiont/$pensione);
	}

	public	function getPensionAporteTotal($valor){
			$pensione=4;
			$pensiont=16;
			return ($valor*$pensiont/$pensione);
	}
	
	public function getUnidadesEnNomina($parametros)
	{
	 $connection = Yii::app()->db2;
	 $sql='SELECT u.*
		   FROM "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" "snl"
		   INNER JOIN "TBL_NOMSEMESTRALNOMINA" "sn" ON snl."SENO_ID" = sn."SENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON snl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY u."UNID_ID"
           ORDER BY u."UNID_ID" ASC
		  ';
		   
     $unidades = $connection->createCommand($sql)->queryAll();
	 return $unidades;
	}
	
	public function getReporteDescuento($parametros)
	{
	 $connection = Yii::app()->db2;
	 
	 //echo "<br><br><br>".
	 $sql=' SELECT snl."SENL_ID", snl."SENL_CODIGO",  p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
			dp."DEPR_DESCRIPCION", snd."SEND_VALOR"
			FROM "TBL_NOMSEMESTRALNOMINADESCUENTOS" "snd" 
			INNER JOIN "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" "snl" ON snl."SENL_ID" = snd."SENL_ID"
			INNER JOIN "TBL_NOMSEMESTRALNOMINA" "sn" ON snl."SENO_ID" = sn."SENO_ID" 
			INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON snl."EMPL_ID" = ep."EMPL_ID" 
			INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
			INNER JOIN "TBL_NOMDESCUENTOSPRESTACIONES" "dp" ON dp."DEPR_ID" = snd."DEPR_ID"
			WHERE '.$parametros.' AND snd."SEND_VALOR"!=0
			GROUP BY p."PEGE_ID",  snd."SEND_ID", snl."SENL_ID", dp."DEPR_ID"
			ORDER BY p."PEGE_PRIMERAPELLIDO" ASC';  
     
	 // armando arreglo para impresiones//
	 
     $query = $connection->createCommand($sql)->queryAll();
	 $this->prestaciones = NULL;
	 $array = array('ID LIQUIDACION','CODIGO','No CEDULA','1er APELLIDO', '2do APELLIDO', '1er NOMBRE', '2do NOMBRE','DESCUENTO','TOTAL');
	 $j=0; $i=0;
	 foreach ($array as $values=>$value) {	
	  $this->prestaciones[$j][$i] = $value;
	  $i++;  
	 }
	
	 $j=1;
	 $total1=0;
	 foreach ($query as $values) {	
	  $i=0;
	  foreach ($values as $value) {      	 
	   if($i==8){
	    $total1 = $total1+$value; 
	    $this->prestaciones[$j][8] = $value;
	   }else{	   
	         $this->prestaciones[$j][$i] = $value;
	        } 
	   $i++;
	  }
      $j++;	 
     }	
	 
	 //armando lista CSqlDataProvider//
	 $this->prestacionesDataProvider = NULL;
	 $count=Yii::app()->db2->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();
     $this->prestacionesDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'SENL_ID', 'SENL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','DEPR_DESCRIPCION','SEND_VALOR',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      )
	 );	 
	}
	
	public function getReporteRetefuente($parametros)
	{
	 $connection = Yii::app()->db2;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT snl."SENL_ID", snl."SENL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
     snl."SENL_RETEFUENTE"

	 FROM "TBL_NOMSEMESTRALNOMINALIQUIDACIONES" "snl" 
	   INNER JOIN "TBL_NOMSEMESTRALNOMINA" "sn" ON snl."SENO_ID" = sn."SENO_ID" 
	   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON snl."EMPL_ID" = ep."EMPL_ID" 
	   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
	   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
	   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	   WHERE '.$parametros.' AND snl."SENL_RETEFUENTE"!=0
	   GROUP BY snl."SENL_ID", p."PEGE_ID", sn."SENO_ID"
	   ORDER BY sn."SENO_ID", p."PEGE_PRIMERAPELLIDO" ASC
		  ';  
     
	 // armando arreglo para impresiones//
	 
     $query = $connection->createCommand($sql)->queryAll();
	 $this->prestaciones = NULL;
	 $array = array('ID LIQUIDACION','CODIGO','No CEDULA','1er APELLIDO', '2do APELLIDO', '1er NOMBRE', '2do NOMBRE','TOTAL');
	 $j=0; $i=0;
	 foreach ($array as $values=>$value) {	
	  $this->prestaciones[$j][$i] = $value;
	  $i++;  
	 }
	
	 $j=1;
	 $total1=0;
	 foreach ($query as $values) {	
	  $i=0;
	  foreach ($values as $value) {      	 
	   if($i==7){
	    $total1 = $total1+$value; 
	    $this->prestaciones[$j][7] = $value;
	   }else{	   
	         $this->prestaciones[$j][$i] = $value;
	        } 
	   $i++;
	  }
      $j++;	 
     }	
	 
	 //armando lista CSqlDataProvider//
	 $this->prestacionesDataProvider = NULL;
	 $count=Yii::app()->db2->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();
     $this->prestacionesDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'SENL_ID', 'SENL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','SENL_RETEFUENTE',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      )
	 );	
	}
}