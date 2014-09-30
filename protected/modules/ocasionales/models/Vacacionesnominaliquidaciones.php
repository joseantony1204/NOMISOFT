<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMVACACIONESNOMINALIQUIDACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMVACACIONESNOMINALIQUIDACIONES':
 * @Propiedad string $VANL_ID
 * @Propiedad integer $VANL_CODIGO
 * @Propiedad integer $VANL_DIAS
 * @Propiedad string $VANL_PUNTOS
 * @Propiedad integer $VANL_SUELDO
 * @Propiedad integer $VANL_SALARIO
 * @Propiedad integer $VANL_PRIMAANTIGUEDAD
 * @Propiedad integer $VANL_TRANSPORTE
 * @Propiedad integer $VANL_ALIMENTACION
 * @Propiedad integer $VANL_PRIMATECNICA
 * @Propiedad integer $VANL_GASTOSRP
 * @Propiedad integer $VANL_BONIFICACION
 * @Propiedad integer $VANL_SEMESTRAL
 * @Propiedad integer $VANL_RETEFUENTE
 * @Propiedad integer $VANO_ID
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $VANL_FECHACAMBIO
 * @Propiedad integer $VANL_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad EMPLEOSPLANTA $eMPL
 * @Propiedad VACACIONESNOMINA $vANO
 * @Propiedad VACACIONESNOMINADESCUENTOS[] $vACACIONESNOMINADESCUENTOSes
 */
class Vacacionesnominaliquidaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Vacacionesnominaliquidaciones la clase del modelo estàtico.
	 */
	public $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS;
    public $VANL_DEVENGADO, $VANL_DESCUENTOS, $VANL_TOTALGRAL;
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
		return 'TBL_NOMVACACIONESNOMINALIQUIDACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('VANL_CODIGO, VANL_DIAS, VANL_PUNTOS, VANL_SUELDO, VANL_SALARIO, VANL_PRIMAANTIGUEDAD, VANL_TRANSPORTE, VANL_ALIMENTACION, VANL_PRIMATECNICA, VANL_GASTOSRP, VANL_BONIFICACION, VANL_SEMESTRAL, VANL_RETEFUENTE, VANO_ID, EMPL_ID, VANL_FECHACAMBIO, VANL_REGISTRADOPOR', 'required'),
			array('VANL_CODIGO, VANL_DIAS, VANL_SUELDO, VANL_SALARIO, VANL_PRIMAANTIGUEDAD, VANL_TRANSPORTE, VANL_ALIMENTACION, VANL_PRIMATECNICA, VANL_GASTOSRP, VANL_BONIFICACION, VANL_SEMESTRAL, VANL_RETEFUENTE, VANO_ID, EMPL_ID, VANL_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('VANL_ID, VANL_CODIGO, VANL_DIAS, VANL_PUNTOS, VANL_SUELDO, VANL_SALARIO, VANL_PRIMAANTIGUEDAD, VANL_TRANSPORTE, 
			VANL_ALIMENTACION, VANL_PRIMATECNICA, VANL_GASTOSRP, VANL_BONIFICACION, VANL_SEMESTRAL, VANL_RETEFUENTE, VANO_ID, EMPL_ID, 
			VANL_FECHACAMBIO, VANL_REGISTRADOPOR,
			PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'search'),
			
			array('VANL_ID, VANL_CODIGO, VANL_DIAS, VANL_PUNTOS, VANL_SUELDO, VANL_SALARIO, VANL_PRIMAANTIGUEDAD, VANL_TRANSPORTE, 
			VANL_ALIMENTACION, VANL_PRIMATECNICA, VANL_GASTOSRP, VANL_BONIFICACION, VANL_SEMESTRAL, VANL_RETEFUENTE, VANO_ID, EMPL_ID, 
			VANL_FECHACAMBIO, VANL_REGISTRADOPOR,
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
			'eMPL' => array(self::BELONGS_TO, 'EMPLEOSPLANTA', 'EMPL_ID'),
			'vANO' => array(self::BELONGS_TO, 'VACACIONESNOMINA', 'VANO_ID'),
			'vACACIONESNOMINADESCUENTOSes' => array(self::HAS_MANY, 'VACACIONESNOMINADESCUENTOS', 'VANL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'VANL_ID' => 'ID',
						'VANL_CODIGO' => 'CODIGO',
						'VANL_DIAS' => 'DIAS',
						'VANL_PUNTOS' => 'PUNTOS',
						'VANL_SUELDO' => 'SUELDO',
						'VANL_SALARIO' => 'SALARIO',
						'VANL_PRIMAANTIGUEDAD' => 'PRIMA ANTIGUEDAD',
						'VANL_TRANSPORTE' => 'TRANSPORTE',
						'VANL_ALIMENTACION' => 'ALIMENTACION',
						'VANL_PRIMATECNICA' => 'PRIMA TECNICA',
						'VANL_GASTOSRP' => 'GASTOS REPRESENTACION',
						'VANL_BONIFICACION' => '1/12 BONIFICACION',
						'VANL_SEMESTRAL' => '1812 SEMESTRAL',
						'VANO_ID' => 'VANO',
						'EMPL_ID' => 'EMPL',
						'VANL_FECHACAMBIO' => 'VANL FECHACAMBIO',
						'VANL_REGISTRADOPOR' => 'VANL REGISTRADOPOR',
						
						'VANL_DEVENGADO' => 'DEVENG.(+)',
						'VANL_RETEFUENTE' => 'RETEFUENTE (-)',
						'VANL_DESCUENTOS' => 'DEDUCC.(-)',
						'VANL_TOTALGRAL' => 'NETO',
						
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

		$criteria->compare('VANL_ID',$this->VANL_ID,true);
		$criteria->compare('VANL_CODIGO',$this->VANL_CODIGO);
		$criteria->compare('VANL_DIAS',$this->VANL_DIAS);
		$criteria->compare('VANL_PUNTOS',$this->VANL_PUNTOS,true);
		$criteria->compare('VANL_SUELDO',$this->VANL_SUELDO);
		$criteria->compare('VANL_SALARIO',$this->VANL_SALARIO);
		$criteria->compare('VANL_PRIMAANTIGUEDAD',$this->VANL_PRIMAANTIGUEDAD);
		$criteria->compare('VANL_TRANSPORTE',$this->VANL_TRANSPORTE);
		$criteria->compare('VANL_ALIMENTACION',$this->VANL_ALIMENTACION);
		$criteria->compare('VANL_PRIMATECNICA',$this->VANL_PRIMATECNICA);
		$criteria->compare('VANL_GASTOSRP',$this->VANL_GASTOSRP);
		$criteria->compare('VANL_BONIFICACION',$this->VANL_BONIFICACION);
		$criteria->compare('VANL_SEMESTRAL',$this->VANL_SEMESTRAL);
		$criteria->compare('VANL_RETEFUENTE',$this->VANL_RETEFUENTE);
		$criteria->compare('VANO_ID',$this->VANO_ID);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('VANL_FECHACAMBIO',$this->VANL_FECHACAMBIO,true);
		$criteria->compare('VANL_REGISTRADOPOR',$this->VANL_REGISTRADOPOR);

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
			
			'VANL_DIAS'=>array(
				'asc'=>'t."VANL_DIAS"',
				'desc'=>'t."VANL_DIAS" desc',
			),
			
			'VANL_PUNTOS'=>array(
				'asc'=>'t."VANL_PUNTOS"',
				'desc'=>'t."VANL_PUNTOS" desc',
			),
			
			'VANL_SALARIO'=>array(
				'asc'=>'t."VANL_SALARIO"',
				'desc'=>'t."VANL_SALARIO" desc',
			),
			
			'VANL_DEVENGADO'=>array(
				'asc'=>'(t."VANL_SALARIO"+t."VANL_PRIMAANTIGUEDAD"+t."VANL_TRANSPORTE"+t."VANL_ALIMENTACION"+t."VANL_PRIMATECNICA"
							+t."VANL_GASTOSRP"+t."VANL_BONIFICACION"+t."VANL_SEMESTRAL")',
				'desc'=>'(t."VANL_SALARIO"+t."VANL_PRIMAANTIGUEDAD"+t."VANL_TRANSPORTE"+t."VANL_ALIMENTACION"+t."VANL_PRIMATECNICA"
							+t."VANL_GASTOSRP"+t."VANL_BONIFICACION"+t."VANL_SEMESTRAL") DESC',
			),
			
			'VANL_RETEFUENTE'=>array(
				'asc'=>'t."VANL_RETEFUENTE"',
				'desc'=>'t."VANL_RETEFUENTE" desc',
			),
			
			'VANL_DESCUENTOS'=>array(
				'asc'=>'(SELECT SUM("VAND_VALOR") 
							 FROM "TBL_NOMVACACIONESNOMINADESCUENTOS" vnd 
							 WHERE vnd."VANL_ID" = t."VANL_ID"					 
							 )',
				'desc'=>'(SELECT SUM("VAND_VALOR") 
							 FROM "TBL_NOMVACACIONESNOMINADESCUENTOS" vnd 
							 WHERE vnd."VANL_ID" = t."VANL_ID"							 
							 ) DESC',
			),
			
			'VANL_TOTALGRAL'=>array(
				'asc'=>'((t."VANL_SALARIO"+t."VANL_PRIMAANTIGUEDAD"+t."VANL_TRANSPORTE"+t."VANL_ALIMENTACION"+t."VANL_PRIMATECNICA"
							+t."VANL_GASTOSRP"+t."VANL_BONIFICACION"+t."VANL_SEMESTRAL")-((
							t."VANL_RETEFUENTE"
							 )+(SELECT SUM("VAND_VALOR") 
							 FROM "TBL_NOMVACACIONESNOMINADESCUENTOS" vnd 
							 WHERE vnd."VANL_ID" = t."VANL_ID")))',
							 
				'desc'=>'((t."VANL_SALARIO"+t."VANL_PRIMAANTIGUEDAD"+t."VANL_TRANSPORTE"+t."VANL_ALIMENTACION"+t."VANL_PRIMATECNICA"
							+t."VANL_GASTOSRP"+t."VANL_BONIFICACION"+t."VANL_SEMESTRAL")-((
							t."VANL_RETEFUENTE"
							 )+(SELECT SUM("VAND_VALOR") 
							 FROM "TBL_NOMVACACIONESNOMINADESCUENTOS" vnd 
							 WHERE vnd."VANL_ID" = t."VANL_ID"))) desc',
			),
        );

		$criteria=new CDbCriteria;
		
		$criteria->select = 'p.*, ep.*, t.*,
		                    SUM(t."VANL_SALARIO"+t."VANL_PRIMAANTIGUEDAD"+t."VANL_TRANSPORTE"+t."VANL_ALIMENTACION"+t."VANL_PRIMATECNICA"
							+t."VANL_GASTOSRP"+t."VANL_BONIFICACION"+t."VANL_SEMESTRAL") AS "VANL_DEVENGADO",
							 
							 t."VANL_RETEFUENTE",
							
							(SELECT SUM("VAND_VALOR") 
							 FROM "TBL_NOMVACACIONESNOMINADESCUENTOS" vnd 
							 WHERE vnd."VANL_ID" = t."VANL_ID"
							 ) AS "VANL_DESCUENTOS"							
							';
		$criteria->join = '
		                   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON t."EMPL_ID" = ep."EMPL_ID"
		                   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"';
        $criteria->group = 'ep."EMPL_ID", p."PEGE_ID", t."VANL_ID"';

		$criteria->compare('"VANL_ID"',$this->VANL_ID,true);
		$criteria->compare('"VANL_CODIGO"',$this->VANL_CODIGO);
		$criteria->compare('"VANL_DIAS"',$this->VANL_DIAS);
		$criteria->compare('"VANL_PUNTOS"',$this->VANL_PUNTOS,true);
		$criteria->compare('"VANL_SUELDO"',$this->VANL_SUELDO);
		$criteria->compare('"VANL_SALARIO"',$this->VANL_SALARIO);
		$criteria->compare('"VANL_PRIMAANTIGUEDAD"',$this->VANL_PRIMAANTIGUEDAD);
		$criteria->compare('"VANL_TRANSPORTE"',$this->VANL_TRANSPORTE);
		$criteria->compare('"VANL_ALIMENTACION"',$this->VANL_ALIMENTACION);
		$criteria->compare('"VANL_PRIMATECNICA"',$this->VANL_PRIMATECNICA);
		$criteria->compare('"VANL_GASTOSRP"',$this->VANL_GASTOSRP);
		$criteria->compare('"VANL_BONIFICACION"',$this->VANL_BONIFICACION);
		$criteria->compare('"VANL_SEMESTRAL"',$this->VANL_SEMESTRAL);
		$criteria->compare('"VANL_RETEFUENTE"',$this->VANL_RETEFUENTE);
		$criteria->compare('"VANO_ID"',$this->VANO_ID);
		$criteria->compare('"EMPL_ID"',$this->EMPL_ID);
		$criteria->compare('"VANL_FECHACAMBIO"',$this->VANL_FECHACAMBIO,true);
		$criteria->compare('"VANL_REGISTRADOPOR"',$this->VANL_REGISTRADOPOR);
		
	    $criteria->compare('"VANL_DEVENGADO"',$this->VANL_DEVENGADO);
		$criteria->compare('"VANL_DESCUENTOS"',$this->VANL_DESCUENTOS);
		$criteria->compare('"VANL_TOTALGRAL"',$this->VANL_TOTALGRAL);
		
		
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
	 $sql='SELECT vnl."VANL_ID", vnl."VANL_CODIGO", vnl."VANL_DIAS", vnl."VANL_PUNTOS", vnl."VANL_SUELDO", vnl."VANL_SALARIO", vnl."VANL_PRIMAANTIGUEDAD", vnl."VANL_TRANSPORTE",
	              vnl."VANL_ALIMENTACION", vnl."VANL_PRIMATECNICA", vnl."VANL_GASTOSRP", vnl."VANL_BONIFICACION", vnl."VANL_SEMESTRAL", 
				 vnl."VANO_ID", vnl."EMPL_ID",  
                  SUM(vnl."VANL_SALARIO"+vnl."VANL_PRIMAANTIGUEDAD"+vnl."VANL_TRANSPORTE"+vnl."VANL_ALIMENTACION"+vnl."VANL_PRIMATECNICA"
					  +vnl."VANL_GASTOSRP"+vnl."VANL_BONIFICACION"+vnl."VANL_SEMESTRAL"
					  ) AS "VANL_DEVENGADO"
		   FROM "TBL_NOMVACACIONESNOMINALIQUIDACIONES" "vnl"
		   INNER JOIN "TBL_NOMVACACIONESNOMINA" "vn" ON vnl."VANO_ID" = vn."VANO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON vnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY vnl."VANL_ID", p."PEGE_ID", vnl."VANO_ID"
           ORDER BY vnl."VANO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS" ASC
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll(); 
	 
	 $array = array('ID LIQUIDACION','CODIGO','MESES','PUNTOS','SUELDO','SALARIO','PRIMA ATIGUEDAD','SUBSIDIO TRANSPORTE','SUBSIDIO ALIMENTACION',
	                'PRIMA TECNICA','GASTOS REPRESENTACION','1/12 BON. DE SERVICIOS','1/12 PRIMA SEMESTRAL', 
					'ID NOMINA','ID EMPLEO','TOTAL DEVENGADO');
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
	 $string='SELECT COUNT("VANL_ID") AS "VANL_ID", COUNT("VANL_CODIGO") AS "VANL_CODIGO", SUM("VANL_DIAS") AS "VANL_DIAS", SUM("VANL_PUNTOS") AS "VANL_PUNTOS", 
	                 SUM("VANL_SUELDO") AS "VANL_SUELDO", SUM("VANL_SALARIO") AS "VANL_SALARIO", SUM("VANL_PRIMAANTIGUEDAD") AS "VANL_PRIMAANTIGUEDAD",
                     SUM("VANL_TRANSPORTE") AS "VANL_TRANSPORTE", SUM("VANL_ALIMENTACION") AS "VANL_ALIMENTACION", 
					 SUM("VANL_PRIMATECNICA") AS "VANL_PRIMATECNICA", SUM("VANL_GASTOSRP") AS "VANL_GASTOSRP", SUM("VANL_BONIFICACION") AS "VANL_BONIFICACION", 
                     SUM("VANL_SEMESTRAL") AS "VANL_SEMESTRAL", COUNT("VANO_ID") AS "VANO_ID", 
					 COUNT("EMPL_ID") AS "EMPL_ID", SUM("VANL_DEVENGADO") AS "VANL_DEVENGADO"
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
	 
	 $sql='SELECT vnl."VANL_ID", vnl."VANL_RETEFUENTE"
		   FROM "TBL_NOMVACACIONESNOMINALIQUIDACIONES" "vnl"
		   INNER JOIN "TBL_NOMVACACIONESNOMINA" "vn" ON vnl."VANO_ID" = vn."VANO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON vnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY vnl."VANL_ID", p."PEGE_ID",  vn."VANO_ID"
           ORDER BY vn."VANO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS" ASC
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
	 $string='SELECT COUNT("VANL_ID") AS "VANL_ID", SUM("VANL_RETEFUENTE") AS "VANL_RETEFUENTE"
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
	 $string1='SELECT  vnl."VANL_ID", vnd."DEPR_ID", vnd."VAND_VALOR", vn."VANO_ID"
	           FROM  "TBL_NOMVACACIONESNOMINADESCUENTOS" "vnd"
		       INNER JOIN "TBL_NOMVACACIONESNOMINALIQUIDACIONES" "vnl" ON vnl."VANL_ID" = vnd."VANL_ID"
			   INNER JOIN "TBL_NOMVACACIONESNOMINA" "vn" ON vnl."VANO_ID" = vn."VANO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON vnl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE '.$parametros.'
               GROUP BY vn."VANO_ID", vnl."VANL_ID", vnd."VAND_ID", p."PEGE_ID"
               ORDER BY vnd."DEPR_ID", vn."VANO_ID", p."PEGE_PRIMERAPELLIDO", vnl."VANL_ID" ASC';
		   
     $rows1 = $connection->createCommand($string1)->queryAll();
	 
	 $string2='SELECT  vnl."VANL_ID", vn."VANO_ID"
	           FROM  "TBL_NOMVACACIONESNOMINADESCUENTOS" "vnd"
		       INNER JOIN "TBL_NOMVACACIONESNOMINALIQUIDACIONES" "vnl" ON vnl."VANL_ID" = vnd."VANL_ID"
			   INNER JOIN "TBL_NOMVACACIONESNOMINA" "vn" ON vnl."VANO_ID" = vn."VANO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON vnl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE '.$parametros.'
			   GROUP BY vn."VANO_ID", vnl."VANL_ID", p."PEGE_ID"
               ORDER BY vn."VANO_ID", p."PEGE_PRIMERAPELLIDO", vnl."VANL_ID" ASC
               ';
		   
     $rows2 = $connection->createCommand($string2)->queryAll();
	 $cont=1;	 
	 foreach ($rows2 as $values) {	     	 
	    $this->descuentos[$cont][0] = $values["VANL_ID"];
		$filas[$cont]=$values["VANO_ID"];
        $cont++;		
     }
	 $this->descuentos[$cont][0] = "Total";
	 $string3='SELECT dp."DEPR_DESCRIPCION"
               FROM "TBL_NOMDESCUENTOSPRESTACIONES" dp
               WHERE dp."TIPR_ID" = 4 AND dp."DEPR_ID" IN
               (
               SELECT  vnd."DEPR_ID"
	           FROM  "TBL_NOMVACACIONESNOMINADESCUENTOS" "vnd"
		       INNER JOIN "TBL_NOMVACACIONESNOMINALIQUIDACIONES" "vnl" ON vnl."VANL_ID" = vnd."VANL_ID"
			   INNER JOIN "TBL_NOMVACACIONESNOMINA" "vn" ON vnl."VANO_ID" = vn."VANO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON vnl."EMPL_ID" = ep."EMPL_ID" 
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
		   FROM "TBL_NOMVACACIONESNOMINALIQUIDACIONES" "vnl"
		   INNER JOIN "TBL_NOMVACACIONESNOMINA" "vn" ON vnl."VANO_ID" = vn."VANO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON vnl."EMPL_ID" = ep."EMPL_ID"
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
	 $sql=' SELECT vnl."VANL_ID", vnl."VANL_CODIGO",  p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
			dp."DEPR_DESCRIPCION", vnd."VAND_VALOR"
			FROM "TBL_NOMVACACIONESNOMINADESCUENTOS" "vnd" 
			INNER JOIN "TBL_NOMVACACIONESNOMINALIQUIDACIONES" "vnl" ON vnl."VANL_ID" = vnd."VANL_ID"
			INNER JOIN "TBL_NOMVACACIONESNOMINA" "vn" ON vnl."VANO_ID" = vn."VANO_ID" 
			INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON vnl."EMPL_ID" = ep."EMPL_ID" 
			INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
			INNER JOIN "TBL_NOMDESCUENTOSPRESTACIONES" "dp" ON dp."DEPR_ID" = vnd."DEPR_ID"
			WHERE '.$parametros.' AND vnd."VAND_VALOR"!=0
			GROUP BY p."PEGE_ID",  vnd."VAND_ID", vnl."VANL_ID", dp."DEPR_ID"
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
             'VANL_ID', 'VANL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','DEPR_DESCRIPCION','VAND_VALOR',
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
	 $sql='SELECT vnl."VANL_ID", vnl."VANL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
     vnl."VANL_RETEFUENTE"

	 FROM "TBL_NOMVACACIONESNOMINALIQUIDACIONES" "vnl" 
	   INNER JOIN "TBL_NOMVACACIONESNOMINA" "vn" ON vnl."VANO_ID" = vn."VANO_ID" 
	   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON vnl."EMPL_ID" = ep."EMPL_ID" 
	   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
	   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
	   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	   WHERE '.$parametros.' AND vnl."VANL_RETEFUENTE"!=0
	   GROUP BY vnl."VANL_ID", p."PEGE_ID", vn."VANO_ID"
	   ORDER BY vn."VANO_ID", p."PEGE_PRIMERAPELLIDO" ASC
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
             'VANL_ID', 'VANL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','VANL_RETEFUENTE',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      )
	 );	
	}	
}