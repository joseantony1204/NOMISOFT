<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_CATMENSUALNOMINALIQUIDACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_CATMENSUALNOMINALIQUIDACIONES':
 * @Propiedad string $MENL_ID
 * @Propiedad integer $MENL_CODIGO
 * @Propiedad string $MENL_HORASAPAGAR
 * @Propiedad string $MENL_VALORHORA
 * @Propiedad string $MENL_SALUDTOTAL
 * @Propiedad string $MENL_PENSIONTOTAL
 * @Propiedad string $MENL_SINDICATOTOTAL
 * @Propiedad string $MENL_ESTAMPILLA
 * @Propiedad string $MENL_RETEFUENTE
 * @Propiedad integer $CATE_ID
 * @Propiedad integer $SALU_ID
 * @Propiedad integer $PENS_ID
 * @Propiedad integer $SIND_ID
 * @Propiedad integer $MENO_ID
 * @Propiedad string $MENL_FECHACAMBIO
 * @Propiedad integer $MENL_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad CATEDRAS $cATE
 * @Propiedad MENSUALNOMINA $mENO
 * @Propiedad PENSION $pENS
 * @Propiedad SALUD $sALU
 * @Propiedad SINDICATOS $sIND
 */
class Mensualnominaliquidaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Mensualnominaliquidaciones la clase del modelo estàtico.
	 */
	public $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS;
    public $MENL_DEVENGADO, $MENL_PARAFISCALES, $MENL_DESCUENTOS, $MENL_TOTALGRAL;
    public $liquidacion, $parafiscales, $descuentos;
    public $prestaciones, $prestacionesDataProvider;	
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
		return 'TBL_CATMENSUALNOMINALIQUIDACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('MENL_CODIGO, MENL_HORASAPAGAR, MENL_VALORHORA, MENL_SALUDTOTAL, MENL_PENSIONTOTAL, MENL_SINDICATOTOTAL, MENL_ESTAMPILLA, MENL_RETEFUENTE, CATE_ID, SALU_ID, PENS_ID, SIND_ID, MENO_ID, MENL_FECHACAMBIO, MENL_REGISTRADOPOR', 'required'),
			array('MENL_CODIGO, CATE_ID, SALU_ID, PENS_ID, SIND_ID, MENO_ID, MENL_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('MENL_ID, MENL_CODIGO, MENL_HORASAPAGAR, MENL_VALORHORA, MENL_SALUDTOTAL, MENL_PENSIONTOTAL, MENL_SINDICATOTOTAL, MENL_ESTAMPILLA, MENL_RETEFUENTE, CATE_ID, SALU_ID, PENS_ID, SIND_ID, MENO_ID, MENL_FECHACAMBIO, MENL_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'cATE' => array(self::BELONGS_TO, 'CATEDRAS', 'CATE_ID'),
			'mENO' => array(self::BELONGS_TO, 'MENSUALNOMINA', 'MENO_ID'),
			'pENS' => array(self::BELONGS_TO, 'PENSION', 'PENS_ID'),
			'sALU' => array(self::BELONGS_TO, 'SALUD', 'SALU_ID'),
			'sIND' => array(self::BELONGS_TO, 'SINDICATOS', 'SIND_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'MENL_ID' => 'ID',
						'MENL_CODIGO' => 'CODIGO',
						'MENL_HORASAPAGAR' => 'HRS',
						'MENL_VALORHORA' => 'VR. HORA',
						'MENL_SALUDTOTAL' => 'T. SALUD',
						'MENL_PENSIONTOTAL' => 'T. PENSION',
						'MENL_SINDICATOTOTAL' => 'T. SINDICATO',
						'MENL_ESTAMPILLA' => 'ESTAMPILLA',
						'MENL_RETEFUENTE' => 'RETEFUENTE',
						'CATE_ID' => 'CATE',
						'SALU_ID' => 'SALU',
						'PENS_ID' => 'PENS',
						'SIND_ID' => 'SIND',
						'MENO_ID' => 'MENO',
						'MENL_FECHACAMBIO' => 'MENL FECHACAMBIO',
						'MENL_REGISTRADOPOR' => 'MENL REGISTRADOPOR',
						
						'MENL_DEVENGADO' => 'DEVENG.(+)',
						'MENL_PARAFISCALES' => 'PARAF. (-)',
						'MENL_DESCUENTOS' => 'DEDUCC.(-)',
						'MENL_TOTALGRAL' => 'NETO',
						
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

		$criteria->compare('MENL_ID',$this->MENL_ID,true);
		$criteria->compare('MENL_CODIGO',$this->MENL_CODIGO);
		$criteria->compare('MENL_HORASAPAGAR',$this->MENL_HORASAPAGAR,true);
		$criteria->compare('MENL_VALORHORA',$this->MENL_VALORHORA,true);
		$criteria->compare('MENL_SALUDTOTAL',$this->MENL_SALUDTOTAL,true);
		$criteria->compare('MENL_PENSIONTOTAL',$this->MENL_PENSIONTOTAL,true);
		$criteria->compare('MENL_SINDICATOTOTAL',$this->MENL_SINDICATOTOTAL,true);
		$criteria->compare('MENL_ESTAMPILLA',$this->MENL_ESTAMPILLA,true);
		$criteria->compare('MENL_RETEFUENTE',$this->MENL_RETEFUENTE,true);
		$criteria->compare('CATE_ID',$this->CATE_ID);
		$criteria->compare('SALU_ID',$this->SALU_ID);
		$criteria->compare('PENS_ID',$this->PENS_ID);
		$criteria->compare('SIND_ID',$this->SIND_ID);
		$criteria->compare('MENO_ID',$this->MENO_ID);
		$criteria->compare('MENL_FECHACAMBIO',$this->MENL_FECHACAMBIO,true);
		$criteria->compare('MENL_REGISTRADOPOR',$this->MENL_REGISTRADOPOR);

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
			
			'MENL_HORASAPAGAR'=>array(
				'asc'=>'t."MENL_HORASAPAGAR"',
				'desc'=>'t."MENL_HORASAPAGAR" desc',
			),
			
			'MENL_VALORHORA'=>array(
				'asc'=>'t."MENL_VALORHORA"',
				'desc'=>'t."MENL_VALORHORA" desc',
			),
			
			'MENL_DEVENGADO'=>array(
				'asc'=>'(t."MENL_HORASAPAGAR"*t."MENL_VALORHORA")',
				'desc'=>'(t."MENL_HORASAPAGAR"*t."MENL_VALORHORA") DESC',
			),
			
			'MENL_PARAFISCALES'=>array(
				'asc'=>'("MENL_SALUDTOTAL"+"MENL_PENSIONTOTAL"+"MENL_SINDICATOTOTAL"+"MENL_ESTAMPILLA"+"MENL_RETEFUENTE")',
				'desc'=>'("MENL_SALUDTOTAL"+"MENL_PENSIONTOTAL"+"MENL_SINDICATOTOTAL"+"MENL_ESTAMPILLA"+"MENL_RETEFUENTE") DESC',
			),
			
			'MENL_DESCUENTOS'=>array(
				'asc'=>'(SELECT SUM("MEND_VALOR") 
							  FROM "TBL_CATMENSUALNOMINADESCUENTOS" mnd 
							  WHERE mnd."CATE_ID" = t."CATE_ID" AND t."MENO_ID" = mnd."MENO_ID"
							 )',
				'desc'=>'(SELECT SUM("MEND_VALOR") 
							  FROM "TBL_CATMENSUALNOMINADESCUENTOS" mnd 
							  WHERE mnd."CATE_ID" = t."CATE_ID" AND t."MENO_ID" = mnd."MENO_ID"
							 ) DESC',
			),
			
			'MENL_TOTALGRAL'=>array(
				'asc'=>'((t."MENL_HORASAPAGAR"*t."MENL_VALORHORA")-(("MENL_SALUDTOTAL"+"MENL_PENSIONTOTAL"+"MENL_SINDICATOTOTAL"+"MENL_ESTAMPILLA"+"MENL_RETEFUENTE")+(SELECT SUM("MEND_VALOR") 
							  FROM "TBL_CATMENSUALNOMINADESCUENTOS" mnd 
							  WHERE mnd."CATE_ID" = t."CATE_ID" AND t."MENO_ID" = mnd."MENO_ID"
							 )))',
				'desc'=>'((t."MENL_HORASAPAGAR"*t."MENL_VALORHORA")-(("MENL_SALUDTOTAL"+"MENL_PENSIONTOTAL"+"MENL_SINDICATOTOTAL"+"MENL_ESTAMPILLA"+"MENL_RETEFUENTE")+(SELECT SUM("MEND_VALOR") 
							  FROM "TBL_CATMENSUALNOMINADESCUENTOS" mnd 
							  WHERE mnd."CATE_ID" = t."CATE_ID" AND t."MENO_ID" = mnd."MENO_ID"
							 ))) desc',
			),
        );

		$criteria=new CDbCriteria;
        
		$criteria->select = 'p.*, c.*, t.*,
		                     (t."MENL_HORASAPAGAR"*t."MENL_VALORHORA") AS "MENL_DEVENGADO",
							 ("MENL_SALUDTOTAL"+"MENL_PENSIONTOTAL"+"MENL_SINDICATOTOTAL"+"MENL_ESTAMPILLA"+"MENL_RETEFUENTE") AS "MENL_PARAFISCALES",
							 
							 (SELECT SUM("MEND_VALOR") 
							  FROM "TBL_CATMENSUALNOMINADESCUENTOS" mnd 
							  WHERE mnd."CATE_ID" = t."CATE_ID" AND t."MENO_ID" = mnd."MENO_ID"
							 ) AS "MENL_DESCUENTOS"	
		                    ';
		
		$criteria->join = '
		                   INNER JOIN "TBL_CATCATEDRAS" "c" ON t."CATE_ID" = c."CATE_ID"
		                   INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON c."PEGE_ID" = p."PEGE_ID"';
        $criteria->group = 'c."CATE_ID", p."PEGE_ID", t."MENL_ID"';
		
		$criteria->compare('"MENL_ID"',$this->MENL_ID,true);
		$criteria->compare('"MENL_CODIGO"',$this->MENL_CODIGO);
		$criteria->compare('"MENL_HORASAPAGAR"',$this->MENL_HORASAPAGAR,true);
		$criteria->compare('"MENL_VALORHORA"',$this->MENL_VALORHORA,true);
		$criteria->compare('"MENL_SALUDTOTAL"',$this->MENL_SALUDTOTAL,true);
		$criteria->compare('"MENL_PENSIONTOTAL"',$this->MENL_PENSIONTOTAL,true);
		$criteria->compare('"MENL_SINDICATOTOTAL"',$this->MENL_SINDICATOTOTAL,true);
		$criteria->compare('"MENL_ESTAMPILLA"',$this->MENL_ESTAMPILLA,true);
		$criteria->compare('"MENL_RETEFUENTE"',$this->MENL_RETEFUENTE,true);
		$criteria->compare('"CATE_ID"',$this->CATE_ID);
		$criteria->compare('"SALU_ID"',$this->SALU_ID);
		$criteria->compare('"PENS_ID"',$this->PENS_ID);
		$criteria->compare('"SIND_ID"',$this->SIND_ID);
		$criteria->compare('"MENO_ID"',$this->MENO_ID);
		$criteria->compare('"MENL_FECHACAMBIO"',$this->MENL_FECHACAMBIO,true);
		$criteria->compare('"MENL_REGISTRADOPOR"',$this->MENL_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 1000),
		));
	}
	
	public function mostrarLiquidacion($parametros)
	{
	 $connection = Yii::app()->db3;
	 $this->liquidacion = NULL; $this->parafiscales = NULL;
	 //echo "<br><br><br>".
	 $sql='SELECT mnl."MENL_ID", mnl."MENL_CODIGO", mnl."MENL_HORASAPAGAR", mnl."MENL_VALORHORA", SUM(mnl."MENL_HORASAPAGAR"*mnl."MENL_VALORHORA") AS "MENL_DEVENGADO",
                  mnl."MENO_ID", mnl."CATE_ID", 
                  (mnl."MENL_HORASAPAGAR"*mnl."MENL_VALORHORA") AS "MENL_TOTALGRAL"
		   FROM "TBL_CATMENSUALNOMINALIQUIDACIONES" "mnl"
		   INNER JOIN "TBL_CATMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID"
		   INNER JOIN "TBL_CATCATEDRAS" "c" ON mnl."CATE_ID" = c."CATE_ID"
		   INNER JOIN "TBL_CATFACULTADES" "f" ON c."FACU_ID" = f."FACU_ID"		  
		   INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON c."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY mn."MENO_ID", mnl."MENL_ID", p."PEGE_ID"
           ORDER BY mn."MENO_ID" ASC, p."PEGE_PRIMERAPELLIDO" ASC, p."PEGE_SEGUNDOAPELLIDOS" ASC, p."PEGE_PRIMERNOMBRE" ASC, mnl."MENL_ID" ASC
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll(); 
	 
	 $array = array('ID LIQUIDACION','CODIGO','T. HORAS','VLR HORA','ID NOMINA','ID CATEDRA','TOTAL DEVENGADO');
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
	 
	 $string='SELECT COUNT("MENL_ID") AS "MENL_ID", COUNT("MENL_CODIGO") AS "MENL_CODIGO", SUM("MENL_HORASAPAGAR") AS "MENL_HORASAPAGAR", 
	                 SUM("MENL_VALORHORA") AS "MENL_VALORHORA", COUNT("MENO_ID") AS "MENO_ID", COUNT("CATE_ID") AS "CATE_ID", 
					 SUM("MENL_DEVENGADO") AS "MENL_DEVENGADO"
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
	 $sql='SELECT mnl."MENL_ID", mnl."SALU_ID", mnl."MENL_SALUDTOTAL", mnl."PENS_ID", mnl."MENL_PENSIONTOTAL", mnl."SIND_ID", 
	              mnl."MENL_SINDICATOTOTAL", mnl."MENL_ESTAMPILLA", mnl."MENL_RETEFUENTE",  
                  mnl."MENO_ID", mnl."CATE_ID", 
                  (mnl."MENL_SALUDTOTAL"+mnl."MENL_PENSIONTOTAL"+mnl."MENL_SINDICATOTOTAL"+mnl."MENL_ESTAMPILLA"+mnl."MENL_RETEFUENTE") AS "MENL_PARAFISCALES"
		   FROM "TBL_CATMENSUALNOMINALIQUIDACIONES" "mnl"
		   INNER JOIN "TBL_CATMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID"
		   INNER JOIN "TBL_CATCATEDRAS" "c" ON mnl."CATE_ID" = c."CATE_ID"
		   INNER JOIN "TBL_CATFACULTADES" "f" ON c."FACU_ID" = f."FACU_ID"		  
		   INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON c."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY mn."MENO_ID", mnl."MENL_ID", p."PEGE_ID"
           ORDER BY mn."MENO_ID" ASC, p."PEGE_PRIMERAPELLIDO" ASC, p."PEGE_SEGUNDOAPELLIDOS" ASC, p."PEGE_PRIMERNOMBRE" ASC, mnl."MENL_ID" ASC
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll();
	 
     $array = array('ID PARAFISCAL','IDSALUD','SALUD','IDPENSION','PENSION','IDSINDICATO','SINDICATO',
	               'ESTAMPILLA','RETEFUENTE', 'ID NOMINA','IDCATEDRA','TOTAL PARAFISCAL');
				   
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
	 
     $this->getDescuentos($parametros);	 
    }
	
	public function getDescuentos($parametros)
	{
	 $connection = Yii::app()->db3;
	 
	 $this->descuentos = NULL;
	 //echo "<br><br><br>".
	 $string1='SELECT mnl."MENL_ID", mnd."DEME_ID", mnd."MEND_VALOR", mn."MENO_ID" 
               FROM "TBL_CATMENSUALNOMINADESCUENTOS" "mnd"  
				  INNER JOIN "TBL_CATMENSUALNOMINALIQUIDACIONES" "mnl" ON mnl."CATE_ID" = mnd."CATE_ID"
				  INNER JOIN "TBL_CATMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
				  INNER JOIN "TBL_CATCATEDRAS" "c" ON mnl."CATE_ID" = c."CATE_ID" 
				  INNER JOIN "TBL_CATFACULTADES" "f" ON c."FACU_ID" = f."FACU_ID" 
				  INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON c."PEGE_ID" = p."PEGE_ID" 
				WHERE mnl."MENO_ID" = mnd."MENO_ID" AND '.$parametros.' 
				GROUP BY mn."MENO_ID", mnl."MENL_ID", mnd."MEND_ID", p."PEGE_ID"
				ORDER BY mnd."DEME_ID" ASC, mn."MENO_ID" ASC, p."PEGE_PRIMERAPELLIDO" ASC, p."PEGE_SEGUNDOAPELLIDOS" ASC, p."PEGE_PRIMERNOMBRE" ASC, mnl."MENL_ID" ASC
			   ';
	    
     $rows1 = $connection->createCommand($string1)->queryAll();
	 //echo "<br><br><br>".
	 $string2='SELECT mnl."MENL_ID", mn."MENO_ID" 
               FROM "TBL_CATMENSUALNOMINADESCUENTOS" "mnd"  
				  INNER JOIN "TBL_CATMENSUALNOMINALIQUIDACIONES" "mnl" ON mnl."CATE_ID" = mnd."CATE_ID"
				  INNER JOIN "TBL_CATMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
				  INNER JOIN "TBL_CATCATEDRAS" "c" ON mnl."CATE_ID" = c."CATE_ID" 
				  INNER JOIN "TBL_CATFACULTADES" "f" ON c."FACU_ID" = f."FACU_ID" 
				  INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON c."PEGE_ID" = p."PEGE_ID" 
				WHERE mnl."MENO_ID" = mnd."MENO_ID" AND '.$parametros.' 
				GROUP BY mn."MENO_ID", mnl."MENL_ID", p."PEGE_ID"
				ORDER BY mn."MENO_ID" ASC, p."PEGE_PRIMERAPELLIDO" ASC, p."PEGE_SEGUNDOAPELLIDOS" ASC, p."PEGE_PRIMERNOMBRE" ASC, mnl."MENL_ID" ASC
               ';
		   
     $rows2 = $connection->createCommand($string2)->queryAll();
	 $cont=1;	 
	 foreach ($rows2 as $values) {	     	 
	    $this->descuentos[$cont][0] = $values["MENL_ID"];
		$filas[$cont]=$values["MENO_ID"];
        $cont++;		
     }
	 $this->descuentos[$cont][0] = "Total";
	 //echo "<br><br><br>".
	 $string3='SELECT d."DEME_DESCRIPCION"
               FROM "TBL_CATDESCUENTOSMENSUALES" d
               WHERE d."DEME_ID" IN
               (
               SELECT  mnd."DEME_ID"
               FROM  "TBL_CATMENSUALNOMINADESCUENTOS" "mnd"
					  INNER JOIN "TBL_CATMENSUALNOMINALIQUIDACIONES" "mnl" ON mnl."CATE_ID" = mnd."CATE_ID"
					  INNER JOIN "TBL_CATMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
					  INNER JOIN "TBL_CATCATEDRAS" "c" ON mnl."CATE_ID" = c."CATE_ID" 
					  INNER JOIN "TBL_CATFACULTADES" "f" ON c."FACU_ID" = f."FACU_ID" 
					  INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON c."PEGE_ID" = p."PEGE_ID" 
               WHERE mnl."MENO_ID" = mnd."MENO_ID" AND '.$parametros.'
               ) ORDER BY d."DEME_ID" ';
		   
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
	
	public function getUnidadesEnNomina($parametros)
	{
	 $connection = Yii::app()->db3;
	 $sql='SELECT f.*                  
		   FROM "TBL_CATMENSUALNOMINALIQUIDACIONES" "mnl"
			   INNER JOIN "TBL_CATMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID"
			   INNER JOIN "TBL_CATCATEDRAS" "c" ON mnl."CATE_ID" = c."CATE_ID"
			   INNER JOIN "TBL_CATFACULTADES" "f" ON c."FACU_ID" = f."FACU_ID"		  
			   INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON c."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY f."FACU_ID"
           ORDER BY f."FACU_ID"';
		   
     $facultades = $connection->createCommand($sql)->queryAll();
	 return $facultades;
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
	
	public function getReporteSalud($parametros)
	{
	 $connection = Yii::app()->db3;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT mnl."MENL_ID", mnl."MENL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
                  s."SALU_NOMBRE", SUM(mnl."MENL_HORASAPAGAR"*mnl."MENL_VALORHORA") AS "MENL_IBC", mnl."MENL_SALUDTOTAL"
		   FROM "TBL_CATMENSUALNOMINALIQUIDACIONES" "mnl" 
			INNER JOIN "TBL_CATMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
			INNER JOIN "TBL_CATCATEDRAS" "c" ON mnl."CATE_ID" = c."CATE_ID" 
			INNER JOIN "TBL_CATFACULTADES" "f" ON c."FACU_ID" = f."FACU_ID" 
			INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON c."PEGE_ID" = p."PEGE_ID" 	
			INNER JOIN "TBL_CATSALUD" "s" ON p."SALU_ID" = s."SALU_ID" 
	       WHERE '.$parametros.'
	       GROUP BY mn."MENO_ID", mnl."MENL_ID",  p."PEGE_ID", s."SALU_ID"
	       ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC, mnl."MENL_ID" DESC
		  ';  
     
	 // armando arreglo para impresiones//
	 
     $query = $connection->createCommand($sql)->queryAll();
	 $this->prestaciones = NULL;
	 $array = array('ID LIQUIDACION','CODIGO','No CEDULA','1er APELLIDO', '2do APELLIDO', '1er NOMBRE', '2do NOMBRE','EPS','I.B.C','TOT EMPLEADO','TOT PATRONO','TOT APORTE');
	 $j=0; $i=0;
	 foreach ($array as $values=>$value) {	
	  $this->prestaciones[$j][$i] = $value;
	  $i++;  
	 }
	
	 $j=1;
	 $total1=0;$total2=0;$total3=0;$total4;
	 foreach ($query as $values) {	
	  $i=0;
	  foreach ($values as $value) {      	 
	   if($i==8){
	    $total1 = $total1+$value; 
	    $this->prestaciones[$j][8] = $value;
	   }elseif($i==9){
	     $total2 = $total2+$value;
	     $this->prestaciones[$j][9] = $value;
		 $total3 = $total3+$this->getSaludPatronal($value);		 
		 $this->prestaciones[$j][10] = $this->getSaludPatronal($value);
	     $total4 = $total4+ $this->getSaludAporteTotal($value);
		 $this->prestaciones[$j][11] = $this->getSaludAporteTotal($value);
	   }else{	   
	         $this->prestaciones[$j][$i] = $value;
	        } 
	   $i++;
	  }
      $j++;	 
     }	
	 
	 //armando lista CSqlDataProvider//
	 $this->prestacionesDataProvider = NULL;
	 $count=Yii::app()->db3->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();
	 $this->prestacionesDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'MENL_ID', 'MENL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','SALU_NOMBRE','MENL_IBC','MENP_SALUDTOTAL',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      ),$connection
	 );	
	 
	}
	
	public function getReportePension($parametros)
	{
	 $connection = Yii::app()->db3;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT mnl."MENL_ID", mnl."MENL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
                  ps."PENS_NOMBRE", SUM(mnl."MENL_HORASAPAGAR"*mnl."MENL_VALORHORA") AS "MENL_IBC", mnl."MENL_PENSIONTOTAL"
		   FROM "TBL_CATMENSUALNOMINALIQUIDACIONES" "mnl" 
			INNER JOIN "TBL_CATMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
			INNER JOIN "TBL_CATCATEDRAS" "c" ON mnl."CATE_ID" = c."CATE_ID" 
			INNER JOIN "TBL_CATFACULTADES" "f" ON c."FACU_ID" = f."FACU_ID" 
			INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON c."PEGE_ID" = p."PEGE_ID" 	
			INNER JOIN "TBL_CATPENSION" "ps" ON p."PENS_ID" = ps."PENS_ID" 
	       WHERE '.$parametros.'
	       GROUP BY mn."MENO_ID", mnl."MENL_ID",  p."PEGE_ID", ps."PENS_ID"
	       ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC, mnl."MENL_ID" DESC
		  ';  
     
	 // armando arreglo para impresiones//
	 
     $query = $connection->createCommand($sql)->queryAll();
	 $this->prestaciones = NULL;
	 $array = array('ID LIQUIDACION','CODIGO','No CEDULA','1er APELLIDO', '2do APELLIDO', '1er NOMBRE', '2do NOMBRE','EPS','I.B.C','TOT EMPLEADO','TOT PATRONO','TOT APORTE');
	 $j=0; $i=0;
	 foreach ($array as $values=>$value) {	
	  $this->prestaciones[$j][$i] = $value;
	  $i++;  
	 }
	
	 $j=1;
	 $total1=0;$total2=0;$total3=0;$total4;
	 foreach ($query as $values) {	
	  $i=0;
	  foreach ($values as $value) {      	 
	   if($i==8){
	    $total1 = $total1+$value; 
	    $this->prestaciones[$j][8] = $value;
	   }elseif($i==9){
	     $total2 = $total2+$value;
	     $this->prestaciones[$j][9] = $value;
		 $total3 = $total3+$this->getSaludPatronal($value);		 
		 $this->prestaciones[$j][10] = $this->getSaludPatronal($value);
	     $total4 = $total4+ $this->getSaludAporteTotal($value);
		 $this->prestaciones[$j][11] = $this->getSaludAporteTotal($value);
	   }else{	   
	         $this->prestaciones[$j][$i] = $value;
	        } 
	   $i++;
	  }
      $j++;	 
     }	
	 
	 //armando lista CSqlDataProvider//
	 $this->prestacionesDataProvider = NULL;
	 $count=Yii::app()->db3->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();
	 $this->prestacionesDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'MENL_ID', 'MENL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','PENS_NOMBRE','MENL_IBC','MENL_PENSIONTOTAL',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      ),$connection
	 );	
	 
	}
	
	public function getReporteSindicato($parametros)
	{
	 $connection = Yii::app()->db3;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT mnl."MENL_ID", mnl."MENL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
                  sd."SIND_NOMBRE", mnl."MENL_SINDICATOTOTAL"
		   FROM "TBL_CATMENSUALNOMINALIQUIDACIONES" "mnl" 
			INNER JOIN "TBL_CATMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
			INNER JOIN "TBL_CATCATEDRAS" "c" ON mnl."CATE_ID" = c."CATE_ID" 
			INNER JOIN "TBL_CATFACULTADES" "f" ON c."FACU_ID" = f."FACU_ID" 
			INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON c."PEGE_ID" = p."PEGE_ID" 	
			INNER JOIN "TBL_CATSINDICATOS" "sd" ON p."SIND_ID" = sd."SIND_ID" 
	       WHERE '.$parametros.'
	       GROUP BY mn."MENO_ID", mnl."MENL_ID",  p."PEGE_ID", sd."SIND_ID"
	       ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC, mnl."MENL_ID" DESC
		  ';  
     
	 // armando arreglo para impresiones//
	 
     $query = $connection->createCommand($sql)->queryAll();
	 $this->prestaciones = NULL;
	 $array = array('ID LIQUIDACION','CODIGO','No CEDULA','1er APELLIDO', '2do APELLIDO', '1er NOMBRE', '2do NOMBRE','SINDICATO','TOT APORTE');
	 $j=0; $i=0;
	 foreach ($array as $values=>$value) {	
	  $this->prestaciones[$j][$i] = $value;
	  $i++;  
	 }
	
	 $j=1;
	 $total1=0;$total2=0;$total3=0;$total4;
	 foreach ($query as $values) {	
	  $i=0;
	  foreach ($values as $value) {      	 
	   if($i==8){
	    $total1 = $total1+$value; 
	    $this->prestaciones[$j][8] = $value;
	   }elseif($i==9){
	     $total2 = $total2+$value;
	     $this->prestaciones[$j][9] = $value;
		 $total3 = $total3+$this->getSaludPatronal($value);		 
		 $this->prestaciones[$j][10] = $this->getSaludPatronal($value);
	     $total4 = $total4+ $this->getSaludAporteTotal($value);
		 $this->prestaciones[$j][11] = $this->getSaludAporteTotal($value);
	   }else{	   
	         $this->prestaciones[$j][$i] = $value;
	        } 
	   $i++;
	  }
      $j++;	 
     }	
	 
	 //armando lista CSqlDataProvider//
	 $this->prestacionesDataProvider = NULL;
	 $count=Yii::app()->db3->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();
	 $this->prestacionesDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'MENL_ID', 'MENL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','SIND_NOMBRE','MENL_SINDICATOTOTAL',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      ),$connection
	 );	
	 
	}
	
	public function getReporteDescuento($parametros)
	{
	 $connection = Yii::app()->db3;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT mnl."MENL_ID", mnl."MENL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
                  dm."DEME_DESCRIPCION", mnd."MEND_VALOR"
	       FROM "TBL_CATMENSUALNOMINADESCUENTOS" "mnd" 
	            INNER JOIN "TBL_CATMENSUALNOMINALIQUIDACIONES" "mnl" ON mnl."CATE_ID" = mnd."CATE_ID"
		        INNER JOIN "TBL_CATMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
		        INNER JOIN "TBL_CATCATEDRAS" "c" ON mnl."CATE_ID" = c."CATE_ID" 
		        INNER JOIN "TBL_CATFACULTADES" "f" ON c."FACU_ID" = f."FACU_ID" 
		        INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON c."PEGE_ID" = p."PEGE_ID"
                INNER JOIN "TBL_CATDESCUENTOSMENSUALES" "dm" ON mnd."DEME_ID" = dm."DEME_ID" 				
	       WHERE mnl."MENO_ID" = mnd."MENO_ID" AND '.$parametros.' AND mnd."MEND_VALOR"!=0
	       GROUP BY mn."MENO_ID", mnl."MENL_ID", mnd."MEND_ID", p."PEGE_ID", dm."DEME_ID"
		   ORDER BY mnd."DEME_ID" ASC, mn."MENO_ID" ASC, p."PEGE_PRIMERAPELLIDO" ASC, p."PEGE_SEGUNDOAPELLIDOS" ASC, p."PEGE_PRIMERNOMBRE" ASC, mnl."MENL_ID" ASC
			     '; 	 
     
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
	 $count=Yii::app()->db3->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();
     $this->prestacionesDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'MENL_ID', 'MENL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','DEME_DESCRIPCION','MEND_VALOR',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      ),$connection
	 );	
	 
	}
	
	public function getReporteRetefuente($parametros)
	{
	 $connection = Yii::app()->db3;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT mnl."MENL_ID", mnl."MENL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
                  mnl."MENL_RETEFUENTE"
		   FROM "TBL_CATMENSUALNOMINALIQUIDACIONES" "mnl" 
			INNER JOIN "TBL_CATMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
			INNER JOIN "TBL_CATCATEDRAS" "c" ON mnl."CATE_ID" = c."CATE_ID" 
			INNER JOIN "TBL_CATFACULTADES" "f" ON c."FACU_ID" = f."FACU_ID" 
			INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON c."PEGE_ID" = p."PEGE_ID" 	
			INNER JOIN "TBL_CATPENSION" "ps" ON p."PENS_ID" = ps."PENS_ID" 
	       WHERE '.$parametros.' AND mnl."MENL_RETEFUENTE"!=0
	       GROUP BY mn."MENO_ID", mnl."MENL_ID",  p."PEGE_ID", ps."PENS_ID"
	       ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC, mnl."MENL_ID" DESC
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
	 $count=Yii::app()->db3->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();
	 $this->prestacionesDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'MENL_ID', 'MENL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','MENL_RETEFUENTE',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      ),$connection
	 );	
	 
	}
	
	public function getReporteEstampilla($parametros)
	{
	 $connection = Yii::app()->db3;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT mnl."MENL_ID", mnl."MENL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
                  mnl."MENL_ESTAMPILLA"
		   FROM "TBL_CATMENSUALNOMINALIQUIDACIONES" "mnl" 
			INNER JOIN "TBL_CATMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
			INNER JOIN "TBL_CATCATEDRAS" "c" ON mnl."CATE_ID" = c."CATE_ID" 
			INNER JOIN "TBL_CATFACULTADES" "f" ON c."FACU_ID" = f."FACU_ID" 
			INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON c."PEGE_ID" = p."PEGE_ID" 	
			INNER JOIN "TBL_CATPENSION" "ps" ON p."PENS_ID" = ps."PENS_ID" 
	       WHERE '.$parametros.'
	       GROUP BY mn."MENO_ID", mnl."MENL_ID",  p."PEGE_ID", ps."PENS_ID"
	       ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC, mnl."MENL_ID" DESC
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
	 $count=Yii::app()->db3->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();
	 $this->prestacionesDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'MENL_ID', 'MENL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','MENL_ESTAMPILLA',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      ),$connection
	 );	
	 
	}
	
	
}