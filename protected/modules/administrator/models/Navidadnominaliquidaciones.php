<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMNAVIDADNOMINALIQUIDACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMNAVIDADNOMINALIQUIDACIONES':
 * @Propiedad string $NANL_ID
 * @Propiedad integer $NANL_CODIGO
 * @Propiedad integer $NANL_MESES
 * @Propiedad string $NANL_PUNTOS
 * @Propiedad integer $NANL_SUELDO
 * @Propiedad integer $NANL_SALARIO
 * @Propiedad integer $NANL_PRIMAANTIGUEDAD
 * @Propiedad integer $NANL_TRANSPORTE
 * @Propiedad integer $NANL_ALIMENTACION
 * @Propiedad integer $NANL_PRIMATECNICA
 * @Propiedad integer $NANL_GASTOSRP
 * @Propiedad integer $NANL_BONIFICACION
 * @Propiedad integer $NANL_SEMESTRAL
 * @Propiedad integer $NANL_PRIMAVACACIONES
 * @Propiedad integer $NANL_RETEFUENTE
 * @Propiedad integer $NANO_ID
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $NANL_FECHACAMBIO
 * @Propiedad integer $NANL_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad NAVIDADNOMINADESCUENTOS[] $nAVIDADNOMINADESCUENTOSes
 * @Propiedad EMPLEOSPLANTA $eMPL
 * @Propiedad NAVIDADNOMINA $nANO
 */
class Navidadnominaliquidaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Navidadnominaliquidaciones la clase del modelo estàtico.
	 */
	public $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS;
    public $NANL_DEVENGADO, $NANL_DESCUENTOS, $NANL_TOTALGRAL;
    public $liquidacion, $parafiscales, $descuentos;
    public $prestaciones, $prestacionesDataProvider;
    public $DETALLES;  
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMNAVIDADNOMINALIQUIDACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('NANL_CODIGO, NANL_MESES, NANL_PUNTOS, NANL_SUELDO, NANL_SALARIO, NANL_PRIMAANTIGUEDAD, NANL_TRANSPORTE, NANL_ALIMENTACION, NANL_PRIMATECNICA, NANL_GASTOSRP, NANL_BONIFICACION, NANL_SEMESTRAL, NANL_PRIMAVACACIONES, NANL_RETEFUENTE, NANO_ID, EMPL_ID, NANL_FECHACAMBIO, NANL_REGISTRADOPOR', 'required'),
			array('NANL_CODIGO, NANL_MESES, NANL_SUELDO, NANL_SALARIO, NANL_PRIMAANTIGUEDAD, NANL_TRANSPORTE, NANL_ALIMENTACION, NANL_PRIMATECNICA, NANL_GASTOSRP, NANL_BONIFICACION, NANL_SEMESTRAL, NANL_PRIMAVACACIONES, NANL_RETEFUENTE, NANO_ID, EMPL_ID, NANL_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('NANL_ID, NANL_CODIGO, NANL_MESES, NANL_PUNTOS, NANL_SUELDO, NANL_SALARIO, NANL_PRIMAANTIGUEDAD, NANL_TRANSPORTE, 
			       NANL_ALIMENTACION, NANL_PRIMATECNICA, NANL_GASTOSRP, NANL_BONIFICACION, NANL_SEMESTRAL, NANL_PRIMAVACACIONES, 
				   NANL_RETEFUENTE, NANO_ID, EMPL_ID, NANL_FECHACAMBIO, NANL_REGISTRADOPOR,
				   PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'search'),
			
			array('NANL_ID, NANL_CODIGO, NANL_MESES, NANL_PUNTOS, NANL_SUELDO, NANL_SALARIO, NANL_PRIMAANTIGUEDAD, NANL_TRANSPORTE, 
			       NANL_ALIMENTACION, NANL_PRIMATECNICA, NANL_GASTOSRP, NANL_BONIFICACION, NANL_SEMESTRAL, NANL_PRIMAVACACIONES, 
				   NANL_RETEFUENTE, NANO_ID, EMPL_ID, NANL_FECHACAMBIO, NANL_REGISTRADOPOR,
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
			'nAVIDADNOMINADESCUENTOSes' => array(self::HAS_MANY, 'NAVIDADNOMINADESCUENTOS', 'NANL_ID'),
			'eMPL' => array(self::BELONGS_TO, 'EMPLEOSPLANTA', 'EMPL_ID'),
			'nANO' => array(self::BELONGS_TO, 'NAVIDADNOMINA', 'NANO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'NANL_ID' => 'ID',
						'NANL_CODIGO' => 'CODIGO',
						'NANL_MESES' => 'MESES',
						'NANL_PUNTOS' => 'PUNTOS',
						'NANL_SUELDO' => 'SUELDO',
						'NANL_SALARIO' => 'SALARIO',
						'NANL_PRIMAANTIGUEDAD' => 'PRIMA ANTIGUEDAD',
						'NANL_TRANSPORTE' => 'TRANSPORTE',
						'NANL_ALIMENTACION' => 'ALIMENTACION',
						'NANL_PRIMATECNICA' => 'PRIMA TECNICA',
						'NANL_GASTOSRP' => 'GASTOS REPRESENTACION',
						'NANL_BONIFICACION' => '1/12 BONIFICACION',
						'NANL_SEMESTRAL' => '1/12 PRIMA SEMESTRAL',
						'NANL_PRIMAVACACIONES' => '1/12 PRIMA VACACIONES',
						'NANO_ID' => 'NANO',
						'EMPL_ID' => 'EMPL',
						'NANL_FECHACAMBIO' => 'NANL FECHACAMBIO',
						'NANL_REGISTRADOPOR' => 'NANL REGISTRADOPOR',
						
						'NANL_DEVENGADO' => 'DEVENG.(+)',
						'NANL_RETEFUENTE' => 'RETEFUENTE (-)',
						'NANL_DESCUENTOS' => 'DEDUCC.(-)',
						'NANL_TOTALGRAL' => 'NETO',
						
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

		$criteria->compare('NANL_ID',$this->NANL_ID,true);
		$criteria->compare('NANL_CODIGO',$this->NANL_CODIGO);
		$criteria->compare('NANL_MESES',$this->NANL_MESES);
		$criteria->compare('NANL_PUNTOS',$this->NANL_PUNTOS,true);
		$criteria->compare('NANL_SUELDO',$this->NANL_SUELDO);
		$criteria->compare('NANL_SALARIO',$this->NANL_SALARIO);
		$criteria->compare('NANL_PRIMAANTIGUEDAD',$this->NANL_PRIMAANTIGUEDAD);
		$criteria->compare('NANL_TRANSPORTE',$this->NANL_TRANSPORTE);
		$criteria->compare('NANL_ALIMENTACION',$this->NANL_ALIMENTACION);
		$criteria->compare('NANL_PRIMATECNICA',$this->NANL_PRIMATECNICA);
		$criteria->compare('NANL_GASTOSRP',$this->NANL_GASTOSRP);
		$criteria->compare('NANL_BONIFICACION',$this->NANL_BONIFICACION);
		$criteria->compare('NANL_SEMESTRAL',$this->NANL_SEMESTRAL);
		$criteria->compare('NANL_PRIMAVACACIONES',$this->NANL_PRIMAVACACIONES);
		$criteria->compare('NANL_RETEFUENTE',$this->NANL_RETEFUENTE);
		$criteria->compare('NANO_ID',$this->NANO_ID);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('NANL_FECHACAMBIO',$this->NANL_FECHACAMBIO,true);
		$criteria->compare('NANL_REGISTRADOPOR',$this->NANL_REGISTRADOPOR);

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
			
			'NANL_MESES'=>array(
				'asc'=>'t."NANL_MESES"',
				'desc'=>'t."NANL_MESES" desc',
			),
			
			'NANL_PUNTOS'=>array(
				'asc'=>'t."NANL_PUNTOS"',
				'desc'=>'t."NANL_PUNTOS" desc',
			),
			
			'NANL_SALARIO'=>array(
				'asc'=>'t."NANL_SALARIO"',
				'desc'=>'t."NANL_SALARIO" desc',
			),
			
			'NANL_DEVENGADO'=>array(
				'asc'=>'(t."NANL_SALARIO"+t."NANL_PRIMAANTIGUEDAD"+t."NANL_TRANSPORTE"+t."NANL_ALIMENTACION"+t."NANL_PRIMATECNICA"
							+t."NANL_GASTOSRP"+t."NANL_BONIFICACION"+t."NANL_SEMESTRAL"+t."NANL_PRIMAVACACIONES")',
				'desc'=>'(t."NANL_SALARIO"+t."NANL_PRIMAANTIGUEDAD"+t."NANL_TRANSPORTE"+t."NANL_ALIMENTACION"+t."NANL_PRIMATECNICA"
							+t."NANL_GASTOSRP"+t."NANL_BONIFICACION"+t."NANL_SEMESTRAL"+t."NANL_PRIMAVACACIONES") DESC',
			),
			
			'NANL_RETEFUENTE'=>array(
				'asc'=>'t."NANL_RETEFUENTE"',
				'desc'=>'t."NANL_RETEFUENTE" desc',
			),
			
			'NANL_DESCUENTOS'=>array(
				'asc'=>'(SELECT SUM("NAND_VALOR") 
							 FROM "TBL_NOMNAVIDADNOMINADESCUENTOS" nnd 
							 WHERE nnd."NANL_ID" = t."NANL_ID"							 
							 )',
				'desc'=>'(SELECT SUM("NAND_VALOR") 
							 FROM "TBL_NOMNAVIDADNOMINADESCUENTOS" nnd 
							 WHERE nnd."NANL_ID" = t."NANL_ID"							 
							 ) DESC',
			),
			
			'NANL_TOTALGRAL'=>array(
				'asc'=>'((t."NANL_SALARIO"+t."NANL_PRIMAANTIGUEDAD"+t."NANL_TRANSPORTE"+t."NANL_ALIMENTACION"+t."NANL_PRIMATECNICA"
							+t."NANL_GASTOSRP"+t."NANL_BONIFICACION"+t."NANL_SEMESTRAL"+t."NANL_PRIMAVACACIONES")-((
							t."NANL_RETEFUENTE"
							 )+(SELECT SUM("NAND_VALOR") 
							 FROM "TBL_NOMNAVIDADNOMINADESCUENTOS" nnd 
							 WHERE nnd."NANL_ID" = t."NANL_ID"							 
							 )))',
				'desc'=>'((t."NANL_SALARIO"+t."NANL_PRIMAANTIGUEDAD"+t."NANL_TRANSPORTE"+t."NANL_ALIMENTACION"+t."NANL_PRIMATECNICA"
							+t."NANL_GASTOSRP"+t."NANL_BONIFICACION"+t."NANL_SEMESTRAL"+t."NANL_PRIMAVACACIONES")-((
							t."NANL_RETEFUENTE"
							 )+(SELECT SUM("NAND_VALOR") 
							 FROM "TBL_NOMNAVIDADNOMINADESCUENTOS" nnd 
							 WHERE nnd."NANL_ID" = t."NANL_ID"
							 ))) desc',
			),
        );

		$criteria=new CDbCriteria;
		
		$criteria->select = 'p.*, ep.*, t.*,
		                    SUM(t."NANL_SALARIO"+t."NANL_PRIMAANTIGUEDAD"+t."NANL_TRANSPORTE"+t."NANL_ALIMENTACION"+t."NANL_PRIMATECNICA"
							+t."NANL_GASTOSRP"+t."NANL_BONIFICACION"+t."NANL_SEMESTRAL"+t."NANL_PRIMAVACACIONES") AS "NANL_DEVENGADO",
							 
							 t."NANL_RETEFUENTE",
							
							(SELECT SUM("NAND_VALOR") 
							 FROM "TBL_NOMNAVIDADNOMINADESCUENTOS" nnd 
							 WHERE nnd."NANL_ID" = t."NANL_ID"
							 ) AS "NANL_DESCUENTOS"							
							';
		$criteria->join = '
		                   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON t."EMPL_ID" = ep."EMPL_ID"
		                   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"';
        $criteria->group = 'ep."EMPL_ID", p."PEGE_ID", t."NANL_ID"';

		$criteria->compare('"NANL_ID"',$this->NANL_ID,true);
		$criteria->compare('"NANL_CODIGO"',$this->NANL_CODIGO);
		$criteria->compare('"NANL_MESES"',$this->NANL_MESES);
		$criteria->compare('"NANL_PUNTOS"',$this->NANL_PUNTOS,true);
		$criteria->compare('"NANL_SUELDO"',$this->NANL_SUELDO);
		$criteria->compare('"NANL_SALARIO"',$this->NANL_SALARIO);
		$criteria->compare('"NANL_PRIMAANTIGUEDAD"',$this->NANL_PRIMAANTIGUEDAD);
		$criteria->compare('"NANL_TRANSPORTE"',$this->NANL_TRANSPORTE);
		$criteria->compare('"NANL_ALIMENTACION"',$this->NANL_ALIMENTACION);
		$criteria->compare('"NANL_PRIMATECNICA"',$this->NANL_PRIMATECNICA);
		$criteria->compare('"NANL_GASTOSRP"',$this->NANL_GASTOSRP);
		$criteria->compare('"NANL_BONIFICACION"',$this->NANL_BONIFICACION);
		$criteria->compare('"NANL_SEMESTRAL"',$this->NANL_SEMESTRAL);
		$criteria->compare('"NANL_PRIMAVACACIONES"',$this->NANL_PRIMAVACACIONES);
		$criteria->compare('"NANL_RETEFUENTE"',$this->NANL_RETEFUENTE);
		$criteria->compare('"NANO_ID"',$this->NANO_ID);
		$criteria->compare('"EMPL_ID"',$this->EMPL_ID);
		$criteria->compare('"NANL_FECHACAMBIO"',$this->NANL_FECHACAMBIO,true);
		$criteria->compare('"NANL_REGISTRADOPOR"',$this->NANL_REGISTRADOPOR);
		
		$criteria->compare('"NANL_DEVENGADO"',$this->NANL_DEVENGADO);
		$criteria->compare('"NANL_DESCUENTOS"',$this->NANL_DESCUENTOS);
		$criteria->compare('"NANL_TOTALGRAL"',$this->NANL_TOTALGRAL);
		
		
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
	 $connection = Yii::app()->db;
	 $this->liquidacion = NULL; $this->parafiscales = NULL;
	 $sql='SELECT nnl."NANL_ID", nnl."NANL_CODIGO", nnl."NANL_MESES", nnl."NANL_PUNTOS", nnl."NANL_SUELDO", nnl."NANL_SALARIO", nnl."NANL_PRIMAANTIGUEDAD", nnl."NANL_TRANSPORTE",
	              nnl."NANL_ALIMENTACION", nnl."NANL_PRIMATECNICA", nnl."NANL_GASTOSRP", nnl."NANL_BONIFICACION", nnl."NANL_SEMESTRAL", 
				  nnl."NANL_PRIMAVACACIONES", nnl."NANO_ID", nnl."EMPL_ID",  
                  SUM(nnl."NANL_SALARIO"+nnl."NANL_PRIMAANTIGUEDAD"+nnl."NANL_TRANSPORTE"+nnl."NANL_ALIMENTACION"+nnl."NANL_PRIMATECNICA"
							+nnl."NANL_GASTOSRP"+nnl."NANL_BONIFICACION"+nnl."NANL_SEMESTRAL"+nnl."NANL_PRIMAVACACIONES"
					  ) AS "NANL_DEVENGADO"
		   FROM "TBL_NOMNAVIDADNOMINALIQUIDACIONES" "nnl"
		   INNER JOIN "TBL_NOMNAVIDADNOMINA" "nn" ON nnl."NANO_ID" = nn."NANO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON nnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY nnl."NANL_ID", p."PEGE_ID",  nn."NANO_ID"
           ORDER BY nn."NANO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC, nnl."NANL_ID" DESC
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll(); 
	 
	 $array = array('ID LIQUIDACION','CODIGO','MESES','PUNTOS','SUELDO','SALARIO','PRIMA ATIGUEDAD','SUBSIDIO TRANSPORTE','SUBSIDIO ALIMENTACION',
	                'PRIMA TECNICA','GASTOS REPRESENTACION','1/12 BON. DE SERVICIOS','1/12 PRIMA SEMESTRAL', '1/12 PRIMA VACACIONES', 
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
	 $string='SELECT COUNT("NANL_ID") AS "NANL_ID", COUNT("NANL_CODIGO") AS "NANL_CODIGO", SUM("NANL_MESES") AS "NANL_MESES", SUM("NANL_PUNTOS") AS "NANL_PUNTOS", 
	                 SUM("NANL_SUELDO") AS "NANL_SUELDO", SUM("NANL_SALARIO") AS "NANL_SALARIO", SUM("NANL_PRIMAANTIGUEDAD") AS "NANL_PRIMAANTIGUEDAD",
                     SUM("NANL_TRANSPORTE") AS "NANL_TRANSPORTE", SUM("NANL_ALIMENTACION") AS "NANL_ALIMENTACION", 
					 SUM("NANL_PRIMATECNICA") AS "NANL_PRIMATECNICA", SUM("NANL_GASTOSRP") AS "NANL_GASTOSRP", SUM("NANL_BONIFICACION") AS "NANL_BONIFICACION", 
                     SUM("NANL_SEMESTRAL") AS "NANL_SEMESTRAL", SUM("NANL_PRIMAVACACIONES") AS "NANL_PRIMAVACACIONES", COUNT("NANO_ID") AS "NANO_ID", 
					 COUNT("EMPL_ID") AS "EMPL_ID", SUM("NANL_DEVENGADO") AS "NANL_DEVENGADO"
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
	 
	 $sql='SELECT nnl."NANL_ID", nnl."NANL_RETEFUENTE"
		   FROM "TBL_NOMNAVIDADNOMINALIQUIDACIONES" "nnl"
		   INNER JOIN "TBL_NOMNAVIDADNOMINA" "nn" ON nnl."NANO_ID" = nn."NANO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON nnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY nnl."NANL_ID", p."PEGE_ID",  nn."NANO_ID"
		   ORDER BY nn."NANO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC, nnl."NANL_ID" DESC
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
	 $string='SELECT COUNT("NANL_ID") AS "NANL_ID", SUM("NANL_RETEFUENTE") AS "NANL_RETEFUENTE"
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
	 $connection = Yii::app()->db;
	 $this->descuentos = NULL;
	 //echo "<br><br><br>";
	 $string1='SELECT  nnl."NANL_ID", nnd."DEPR_ID", nnd."NAND_VALOR", nn."NANO_ID"
	           FROM  "TBL_NOMNAVIDADNOMINADESCUENTOS" "nnd"
		       INNER JOIN "TBL_NOMNAVIDADNOMINALIQUIDACIONES" "nnl" ON nnl."NANL_ID" = nnd."NANL_ID"
			   INNER JOIN "TBL_NOMNAVIDADNOMINA" "nn" ON nnl."NANO_ID" = nn."NANO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON nnl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE '.$parametros.'
               GROUP BY nn."NANO_ID", nnl."NANL_ID", nnd."NAND_ID", p."PEGE_ID"
               ORDER BY nnd."DEPR_ID", nn."NANO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC, nnl."NANL_ID" DESC';
		   
     $rows1 = $connection->createCommand($string1)->queryAll();
	 
	 $string2='SELECT  nnl."NANL_ID", nn."NANO_ID"
	           FROM  "TBL_NOMNAVIDADNOMINADESCUENTOS" "nnd"
		       INNER JOIN "TBL_NOMNAVIDADNOMINALIQUIDACIONES" "nnl" ON nnl."NANL_ID" = nnd."NANL_ID"
			   INNER JOIN "TBL_NOMNAVIDADNOMINA" "nn" ON nnl."NANO_ID" = nn."NANO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON nnl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE '.$parametros.'
			   GROUP BY nn."NANO_ID", nnl."NANL_ID", p."PEGE_ID"
               ORDER BY nn."NANO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC, nnl."NANL_ID" DESC
               ';
		   
     $rows2 = $connection->createCommand($string2)->queryAll();
	 $cont=1;	 
	 foreach ($rows2 as $values) {	     	 
	    $this->descuentos[$cont][0] = $values["NANL_ID"];
		$filas[$cont]=$values["NANO_ID"];
        $cont++;		
     }
	 $this->descuentos[$cont][0] = "Total";
	 $string3='SELECT dp."DEPR_DESCRIPCION"
               FROM "TBL_NOMDESCUENTOSPRESTACIONES" dp
               WHERE dp."TIPR_ID" = 2 AND dp."DEPR_ID" IN
               (
               SELECT  nnd."DEPR_ID"
	           FROM  "TBL_NOMNAVIDADNOMINADESCUENTOS" "nnd"
		       INNER JOIN "TBL_NOMNAVIDADNOMINALIQUIDACIONES" "nnl" ON nnl."NANL_ID" = nnd."NANL_ID"
			   INNER JOIN "TBL_NOMNAVIDADNOMINA" "nn" ON nnl."NANO_ID" = nn."NANO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON nnl."EMPL_ID" = ep."EMPL_ID" 
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
	 $connection = Yii::app()->db;
	 $sql='SELECT u.*
		   FROM "TBL_NOMNAVIDADNOMINALIQUIDACIONES" "nnl"
		   INNER JOIN "TBL_NOMNAVIDADNOMINA" "nn" ON nnl."NANO_ID" = nn."NANO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON nnl."EMPL_ID" = ep."EMPL_ID"
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
	 $connection = Yii::app()->db;
	 
	 //echo "<br><br><br>".
	 $sql=' SELECT nnl."NANL_ID", nnl."NANL_CODIGO",  p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
			dp."DEPR_DESCRIPCION", nnd."NAND_VALOR"
			FROM "TBL_NOMNAVIDADNOMINADESCUENTOS" "nnd" 
			INNER JOIN "TBL_NOMNAVIDADNOMINALIQUIDACIONES" "nnl" ON nnl."NANL_ID" = nnd."NANL_ID"
			INNER JOIN "TBL_NOMNAVIDADNOMINA" "nn" ON nnl."NANO_ID" = nn."NANO_ID" 
			INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON nnl."EMPL_ID" = ep."EMPL_ID" 
			INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
			INNER JOIN "TBL_NOMDESCUENTOSPRESTACIONES" "dp" ON dp."DEPR_ID" = nnd."DEPR_ID"
			WHERE '.$parametros.' AND nnd."NAND_VALOR"!=0
			GROUP BY p."PEGE_ID",  nnd."NAND_ID", nnl."NANL_ID", dp."DEPR_ID"
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
	 $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();
     $this->prestacionesDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'NANL_ID', 'NANL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','DEPR_DESCRIPCION','NAND_VALOR',
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
	 $connection = Yii::app()->db;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT nnl."NANL_ID", nnl."NANL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
     nnl."NANL_RETEFUENTE"

	 FROM "TBL_NOMNAVIDADNOMINALIQUIDACIONES" "nnl" 
	   INNER JOIN "TBL_NOMNAVIDADNOMINA" "nn" ON nnl."NANO_ID" = nn."NANO_ID" 
	   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON nnl."EMPL_ID" = ep."EMPL_ID" 
	   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
	   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
	   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	   WHERE '.$parametros.' AND nnl."NANL_RETEFUENTE"!=0
	   GROUP BY nnl."NANL_ID", p."PEGE_ID", nn."NANO_ID"
	   ORDER BY nn."NANO_ID", p."PEGE_PRIMERAPELLIDO" ASC
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
	 $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();
     $this->prestacionesDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'NANL_ID', 'NANL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','NANL_RETEFUENTE',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      )
	 );	
	}
}