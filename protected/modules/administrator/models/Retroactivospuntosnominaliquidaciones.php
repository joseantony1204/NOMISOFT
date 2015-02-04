<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMRETROACTIVOSPUNTOSNOMINALIQUIDACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMRETROACTIVOSPUNTOSNOMINALIQUIDACIONES':
 * @Propiedad string $RPNL_ID
 * @Propiedad string $RPNL_CODIGO
 * @Propiedad integer $RPNL_MESES
 * @Propiedad string $RPNL_PUNTOS
 * @Propiedad integer $RPNL_SUELDO
 * @Propiedad integer $RPNL_SALARIO
 * @Propiedad integer $RPNL_PRIMAANTIGUEDAD
 * @Propiedad integer $RPNL_BONIFICACION
 * @Propiedad integer $RPNL_PRIMASEMESTRAL
 * @Propiedad integer $RPNL_PRIMAVACACIONES
 * @Propiedad integer $RPNL_VACACIONES
 * @Propiedad integer $RPNL_PRIMANAVIDAD
 * @Propiedad integer $RPNL_CESANTIAS
 * @Propiedad integer $RPNO_ID
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $RPNL_FECHACAMBIO
 * @Propiedad integer $RPNL_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad EMPLEOSPLANTA $eMPL
 * @Propiedad RETROACTIVOSPUNTOSNOMINA $rPNO
 * @Propiedad RETROACTIVOSPUNTOSNOMINADESCUENTOS[] $rETROACTIVOSPUNTOSNOMINADESCUENTOSes
 */
class Retroactivospuntosnominaliquidaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Retroactivospuntosnominaliquidaciones la clase del modelo estàtico.
	 */
	public $PEGE_ID, $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS;
	public $EMPL_CARGO, $EMPL_SUELDO, $UNID_ID;
    public $RPNL_DEVENGADO, $RPNL_DESCUENTOS, $RPNL_TOTALGRAL; 
    public $DETALLES; 
	public $retroactivogeneral, $descuentos;
	public $prestaciones, $prestacionesDataProvider;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMRETROACTIVOSPUNTOSNOMINALIQUIDACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('RPNL_CODIGO, RPNL_MESES, RPNL_PUNTOS, RPNL_SUELDO, RPNL_SALARIO, RPNL_PRIMAANTIGUEDAD, RPNL_BONIFICACION, RPNL_PRIMASEMESTRAL, RPNL_PRIMAVACACIONES, RPNL_VACACIONES, RPNL_PRIMANAVIDAD, RPNL_CESANTIAS, RPNO_ID, EMPL_ID, RPNL_FECHACAMBIO, RPNL_REGISTRADOPOR', 'required'),
			array('RPNL_MESES, RPNL_SUELDO, RPNL_SALARIO, RPNL_PRIMAANTIGUEDAD, RPNL_BONIFICACION, RPNL_PRIMASEMESTRAL, RPNL_PRIMAVACACIONES, RPNL_VACACIONES, RPNL_PRIMANAVIDAD, RPNL_CESANTIAS, RPNO_ID, EMPL_ID, RPNL_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('RPNL_ID, RPNL_CODIGO, RPNL_MESES, RPNL_PUNTOS, RPNL_SUELDO, RPNL_SALARIO, RPNL_PRIMAANTIGUEDAD, RPNL_BONIFICACION, RPNL_PRIMASEMESTRAL, RPNL_PRIMAVACACIONES, RPNL_VACACIONES, RPNL_PRIMANAVIDAD, RPNL_CESANTIAS, RPNO_ID, EMPL_ID, RPNL_FECHACAMBIO, RPNL_REGISTRADOPOR', 'safe', 'on'=>'search'),
			
			array('RPNL_ID, RPNL_CODIGO, RPNL_MESES, RPNL_PUNTOS, RPNL_SUELDO, RPNL_SALARIO, 
			RPNL_PRIMAANTIGUEDAD, RPNL_BONIFICACION, RPNL_PRIMASEMESTRAL, RPNL_PRIMAVACACIONES, RPNL_VACACIONES, 
			RPNL_PRIMANAVIDAD, RPNL_CESANTIAS, RPNO_ID, EMPL_ID, RPNL_FECHACAMBIO, RPNL_REGISTRADOPOR
			PEGE_IDENTIFICACION, PEGE_PRIMERAPELLIDO, PEGE_PRIMERNOMBRE, PEGE_SEGUNDOAPELLIDOS, PEGE_SEGUNDONOMBRE, UNID_ID', 'safe', 'on'=>'totales'),
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
			'rPNO' => array(self::BELONGS_TO, 'RETROACTIVOSPUNTOSNOMINA', 'RPNO_ID'),
			'rETROACTIVOSPUNTOSNOMINADESCUENTOSes' => array(self::HAS_MANY, 'RETROACTIVOSPUNTOSNOMINADESCUENTOS', 'RPNL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'RPNL_ID' => 'ID',
						'RPNL_CODIGO' => 'CODIGO',
						'RPNL_MESES' => 'MESES',
						'RPNL_PUNTOS' => 'PUNTOS',
						'RPNL_SUELDO' => 'RPNL SUELDO',
						'RPNL_SALARIO' => 'SALARIO',
						'RPNL_PRIMAANTIGUEDAD' => 'P.A',
						'RPNL_BONIFICACION' => 'B.S.P',
						'RPNL_PRIMASEMESTRAL' => 'P.S',
						'RPNL_PRIMAVACACIONES' => 'P.V',
						'RPNL_VACACIONES' => 'V',
						'RPNL_PRIMANAVIDAD' => 'P.N',
						'RPNL_CESANTIAS' => 'C',
						'RPNO_ID' => 'RPNO',
						'EMPL_ID' => 'EMPL',
						'RPNL_FECHACAMBIO' => 'RPNL FECHACAMBIO',
						'RPNL_REGISTRADOPOR' => 'RPNL REGISTRADOPOR',
						
						'RPNL_DEVENGADO' => 'DEVENG.(+)',
						'RPNL_DESCUENTOS' => 'DEDUCC.(-)',
						'RPNL_TOTALGRAL' => 'NETO',
						
						'UNID_ID' => 'UNIDAD',
					
						'PEGE_IDENTIFICACION' => 'IDENTIDAD',
						'PEGE_PRIMERNOMBRE' => 'NOMBRE',
						'PEGE_SEGUNDONOMBRE' => 'SEGUNDO NOMBRE',
						'PEGE_PRIMERAPELLIDO' => 'APELLIDO',
						'PEGE_SEGUNDOAPELLIDOS' => 'SEGUNDO APELLIDO',
						
						'EMPL_CARGO' => 'CARGO',
						'EMPL_SUELDO' => 'SUELDO',
						
						'DETALLES' => 'VER',
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
				

		$criteria->compare('"RPNL_ID"',$this->RPNL_ID,true);
		$criteria->compare('"RPNL_CODIGO"',$this->RPNL_CODIGO,true);
		$criteria->compare('"RPNL_MESES"',$this->RPNL_MESES);
		$criteria->compare('"RPNL_PUNTOS"',$this->RPNL_PUNTOS,true);
		$criteria->compare('"RPNL_SUELDO"',$this->RPNL_SUELDO);
		$criteria->compare('"RPNL_SALARIO"',$this->RPNL_SALARIO);
		$criteria->compare('"RPNL_PRIMAANTIGUEDAD"',$this->RPNL_PRIMAANTIGUEDAD);
		$criteria->compare('"RPNL_BONIFICACION"',$this->RPNL_BONIFICACION);
		$criteria->compare('"RPNL_PRIMASEMESTRAL"',$this->RPNL_PRIMASEMESTRAL);
		$criteria->compare('"RPNL_PRIMAVACACIONES"',$this->RPNL_PRIMAVACACIONES);
		$criteria->compare('"RPNL_VACACIONES"',$this->RPNL_VACACIONES);
		$criteria->compare('"RPNL_PRIMANAVIDAD"',$this->RPNL_PRIMANAVIDAD);
		$criteria->compare('"RPNL_CESANTIAS"',$this->RPNL_CESANTIAS);
		$criteria->compare('"RPNO_ID"',$this->RPNO_ID);
		$criteria->compare('"EMPL_ID"',$this->EMPL_ID);
		$criteria->compare('"RPNL_FECHACAMBIO"',$this->RPNL_FECHACAMBIO,true);
		$criteria->compare('"RPNL_REGISTRADOPOR"',$this->RPNL_REGISTRADOPOR);
		
		$criteria->compare('"RPNL_DEVENGADO"',$this->RPNL_DEVENGADO);
		$criteria->compare('"RPNL_DESCUENTOS"',$this->RPNL_DESCUENTOS);
		$criteria->compare('"RPNL_TOTALGRAL"',$this->RPNL_TOTALGRAL);
		
		$criteria->compare('u."UNID_ID"',$this->UNID_ID);
		
		
		$criteria->compare('"PEGE_IDENTIFICACION"',$this->PEGE_IDENTIFICACION,true);
		$criteria->compare('"PEGE_PRIMERNOMBRE"',$this->PEGE_PRIMERNOMBRE,true);
		$criteria->compare('"PEGE_SEGUNDONOMBRE"',$this->PEGE_SEGUNDONOMBRE,true);
		$criteria->compare('"PEGE_PRIMERAPELLIDO"',$this->PEGE_PRIMERAPELLIDO,true);
		$criteria->compare('"PEGE_SEGUNDOAPELLIDOS"',$this->PEGE_SEGUNDOAPELLIDOS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
     *@Recupera una lista de los modelos basados ​​en las actuales condiciones de búsqueda / filtro.
     *@Return CActiveDataProvider el proveedor de datos que puede devolver los modelos basados ​​en las condiciones de búsqueda / filtro.
     */
	public function totales()
	{
		//Advertencia: Por favor, modifique el siguiente código para quitar atributos que
        //No debe ser buscado.

		$criteria=new CDbCriteria;
		
		$sort = new CSort();
		$sort->defaultOrder = 'p."PEGE_PRIMERAPELLIDO" ASC';
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
		);

         $criteria->select = 't.*, p.*, ep.*, SUM("RPNL_MESES") AS "RPNL_MESES",
		                    SUM("RPNL_SALARIO"+"RPNL_PRIMAANTIGUEDAD"+"RPNL_BONIFICACION"+"RPNL_PRIMASEMESTRAL"+"RPNL_PRIMAVACACIONES"+
							"RPNL_VACACIONES"+"RPNL_PRIMANAVIDAD"+"RPNL_CESANTIAS") AS "RPNL_DEVENGADO",							 
							
							(SELECT SUM("RPND_VALOR") 
							 FROM 
							 "TBL_NOMRETROACTIVOSPUNTOSNOMINADESCUENTOS" rnd, 
							 "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" pg
							 WHERE
							 pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = t."EMPL_ID" 
							 AND t."RPNL_ID" = rnd."RPNL_ID"
							 ) AS "RPNL_DESCUENTOS"							
							';							
		$criteria->join = '		      
		                   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON ep."EMPL_ID" = t."EMPL_ID"
						   INNER JOIN "TBL_NOMUNIDADES" "u" ON u."UNID_ID" = ep."UNID_ID"
		                   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"';					
        $criteria->group = 'ep."EMPL_ID", p."PEGE_ID", t."RPNL_ID"';		

		$criteria->compare('"RPNL_ID"',$this->RPNL_ID,true);
		$criteria->compare('"RPNL_CODIGO"',$this->RPNL_CODIGO,true);
		$criteria->compare('"RPNL_MESES"',$this->RPNL_MESES);
		$criteria->compare('"RPNL_PUNTOS"',$this->RPNL_PUNTOS,true);
		$criteria->compare('"RPNL_SUELDO"',$this->RPNL_SUELDO);
		$criteria->compare('"RPNL_SALARIO"',$this->RPNL_SALARIO);
		$criteria->compare('"RPNL_PRIMAANTIGUEDAD"',$this->RPNL_PRIMAANTIGUEDAD);
		$criteria->compare('"RPNL_BONIFICACION"',$this->RPNL_BONIFICACION);
		$criteria->compare('"RPNL_PRIMASEMESTRAL"',$this->RPNL_PRIMASEMESTRAL);
		$criteria->compare('"RPNL_PRIMAVACACIONES"',$this->RPNL_PRIMAVACACIONES);
		$criteria->compare('"RPNL_VACACIONES"',$this->RPNL_VACACIONES);
		$criteria->compare('"RPNL_PRIMANAVIDAD"',$this->RPNL_PRIMANAVIDAD);
		$criteria->compare('"RPNL_CESANTIAS"',$this->RPNL_CESANTIAS);
		$criteria->compare('"RPNO_ID"',$this->RPNO_ID);
		$criteria->compare('"EMPL_ID"',$this->EMPL_ID);
		$criteria->compare('"RPNL_FECHACAMBIO"',$this->RPNL_FECHACAMBIO,true);
		$criteria->compare('"RPNL_REGISTRADOPOR"',$this->RPNL_REGISTRADOPOR);
		
		$criteria->compare('"RPNL_DEVENGADO"',$this->RPNL_DEVENGADO);
		$criteria->compare('"RPNL_DESCUENTOS"',$this->RPNL_DESCUENTOS);
		$criteria->compare('"RPNL_TOTALGRAL"',$this->RPNL_TOTALGRAL);
		
		$criteria->compare('u."UNID_ID"',$this->UNID_ID);
		
		
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
	
	public function unidadesRetroactivo(){
	 $connection = Yii::app()->db;
	 $sql = 'SELECT * FROM "TBL_NOMUNIDADES" u';
     $unidades = $connection->createCommand($sql)->queryAll();
	 return $unidades;
	}
	
	public function getDetalles()
	{
		$imageUrl = 'icon_search.png';
        return Yii::app()->baseurl.'/images/'.$imageUrl;		
	}
	
	public function mostrarLiquidacion($parametros)
	{
	 $connection = Yii::app()->db;
		 
	 /**
	 *Recuperando la liquidacion del retroactivo puntos para
	 *cada mes correspondiente
	 */
	 
	 /*
	 *Parte 1: Encabezado del arreglo
	 */
	 $this->retroactivogeneral = NULL;
	 $array = array('ID LIQUIDACION','CODIGO','MESES','PUNTOS','SALARIO','PRIMA ATIGUEDAD','BON. DE SERVICIOS',
				   'PRIMA SEMESTRAL','PRIMA DE VACACIONES','VACACIONES','PRIMA NAVIDAD','CESANTIAS',
				   'ID NOMINA','ID EMPLEO','TOTAL DEVENGADO','PERSONA',
				   );
	 
	 $m=0; $n=0;
	 foreach ($array as $values=>$value) {	
	  $this->retroactivogeneral[$m][$n] = $value;
	  $n++;  
	 }
	 
	 /*
	 *Parte 2: retroactivo general
	 */
	 //echo "<br><br><br>".
	 $retroactivo='SELECT rnl."RPNL_ID", rnl."RPNL_CODIGO", rnl."RPNL_MESES", rnl."RPNL_MESES" AS "N1", rnl."RPNL_SALARIO", rnl."RPNL_PRIMAANTIGUEDAD",				  
				  rnl."RPNL_BONIFICACION", rnl."RPNL_PRIMASEMESTRAL", rnl."RPNL_PRIMAVACACIONES", rnl."RPNL_VACACIONES",
				  rnl."RPNL_PRIMANAVIDAD", rnl."RPNL_CESANTIAS", rnl."RPNO_ID", rnl."EMPL_ID", 				  
				  SUM("RPNL_SALARIO"+"RPNL_PRIMAANTIGUEDAD"+"RPNL_BONIFICACION"+"RPNL_PRIMASEMESTRAL"+"RPNL_PRIMAVACACIONES"+
					  "RPNL_VACACIONES"+"RPNL_PRIMANAVIDAD"+"RPNL_CESANTIAS") AS "RPNL_DEVENGADO", p."PEGE_ID", p."PEGE_PRIMERAPELLIDO"       
				  
		   FROM "TBL_NOMRETROACTIVOSPUNTOSNOMINALIQUIDACIONES" "rnl"
		   INNER JOIN "TBL_NOMRETROACTIVOSPUNTOSNOMINA" "rn" ON rnl."RPNO_ID" = rn."RPNO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON rnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY rnl."RPNL_ID", p."PEGE_ID",  rn."RPNO_ID", rnl."RPNL_ID"
           ORDER BY  p."PEGE_PRIMERAPELLIDO", rn."RPNO_ID", rnl."RPNL_ID"  ASC
		  ';  
	 $filas = $connection->createCommand($retroactivo)->queryAll(); 
	 	
	 $m=1;
	 foreach ($filas as $valores) {	
	  $n=0;
	  foreach($valores as $valor) {      	 
	   $this->retroactivogeneral[$m][$n] = $valor;
	   $n++;
	  }
     $m++;	 
     }
	 	 
	 /*
	 *Parte 3: Sumatoria total
	 */	
	 //echo "<br><br><br>".
	 $string='SELECT COUNT("RPNL_ID") AS "RPNL_ID", COUNT("RPNL_CODIGO") AS "RPNL_CODIGO", SUM("RPNL_MESES") AS "RPNL_MESES", COUNT("N1") AS "N1",
				SUM("RPNL_SALARIO") AS "RPNL_SALARIO", SUM("RPNL_PRIMAANTIGUEDAD") AS "RPNL_PRIMAANTIGUEDAD", 
				SUM("RPNL_BONIFICACION") AS "RPNL_BONIFICACION", SUM("RPNL_PRIMASEMESTRAL") AS "RPNL_PRIMASEMESTRAL", 
				SUM("RPNL_PRIMAVACACIONES") AS "RPNL_PRIMAVACACIONES", SUM("RPNL_VACACIONES") AS "RPNL_VACACIONES",
				SUM("RPNL_PRIMANAVIDAD") AS "RPNL_PRIMANAVIDAD", SUM("RPNL_CESANTIAS") AS "RPNL_CESANTIAS",
				COUNT("RPNO_ID") AS "RPNO_ID", COUNT("EMPL_ID") AS "EMPL_ID",
				SUM("RPNL_DEVENGADO") AS "RPNL_DEVENGADO", COUNT("PEGE_ID") AS "PEGE_ID", COUNT("PEGE_PRIMERAPELLIDO") AS "PEGE_PRIMERAPELLIDO"
              FROM ('.$retroactivo.') d
		     ';
	 $rows = $connection->createCommand($string)->queryAll(); 	 
     	 
	 $m=$m;
	 foreach ($rows as $values) {	
	   $n=0;
	   foreach ($values as $value) {      	 
	    $this->retroactivogeneral[$m][$n] = $value;
	    $n++;
	   }
       $m++;	 
     }
	 
	 /*
	 *Obtencion de los descuentos
	 */
	 $this->getDescuentos($parametros);	
	}
	
	public function getDescuentos($parametros)
	{
	 $connection = Yii::app()->db;
	 $this->descuentos = NULL;
	 //echo "<br><br><br>";
	 $string1='SELECT  rnl."RPNL_ID", rnd."DEPR_ID", rnd."RPND_VALOR", rn."RPNO_ID"
	           FROM  "TBL_NOMRETROACTIVOSPUNTOSNOMINADESCUENTOS" "rnd"
		       INNER JOIN "TBL_NOMRETROACTIVOSPUNTOSNOMINALIQUIDACIONES" "rnl" ON rnl."RPNL_ID" = rnd."RPNL_ID"
			   INNER JOIN "TBL_NOMRETROACTIVOSPUNTOSNOMINA" "rn" ON rnl."RPNO_ID" = rn."RPNO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON rnl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE '.$parametros.'
               GROUP BY rn."RPNO_ID", rnl."RPNL_ID", rnd."RPND_ID", p."PEGE_ID"
               ORDER BY rnd."DEPR_ID", rn."RPNO_ID", p."PEGE_PRIMERAPELLIDO", rnl."RPNL_ID" ASC';
		   
     $rows1 = $connection->createCommand($string1)->queryAll();
	 
	 $string2='SELECT  rnl."RPNL_ID", rn."RPNO_ID"
	           FROM  "TBL_NOMRETROACTIVOSPUNTOSNOMINADESCUENTOS" "rnd"
		       INNER JOIN "TBL_NOMRETROACTIVOSPUNTOSNOMINALIQUIDACIONES" "rnl" ON rnl."RPNL_ID" = rnd."RPNL_ID"
			   INNER JOIN "TBL_NOMRETROACTIVOSPUNTOSNOMINA" "rn" ON rnl."RPNO_ID" = rn."RPNO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON rnl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE '.$parametros.'
			   GROUP BY rn."RPNO_ID", rnl."RPNL_ID", p."PEGE_ID"
               ORDER BY rn."RPNO_ID", p."PEGE_PRIMERAPELLIDO", rnl."RPNL_ID" ASC
               ';
		   
     $rows2 = $connection->createCommand($string2)->queryAll();
	 $cont=1;	 
	 foreach ($rows2 as $values) {	     	 
	    $this->descuentos[$cont][0] = $values["RPNL_ID"];
		$filas[$cont]=$values["RPNO_ID"];
        $cont++;		
     }
	 $this->descuentos[$cont][0] = "Total";
	 $string3='SELECT dp."DEPR_DESCRIPCION"
               FROM "TBL_NOMDESCUENTOSPRESTACIONES" dp
               WHERE dp."TIPR_ID" = 6 AND dp."DEPR_ID" IN
               (
               SELECT  rnd."DEPR_ID"
	           FROM  "TBL_NOMRETROACTIVOSPUNTOSNOMINADESCUENTOS" "rnd"
		       INNER JOIN "TBL_NOMRETROACTIVOSPUNTOSNOMINALIQUIDACIONES" "rnl" ON rnl."RPNL_ID" = rnd."RPNL_ID"
			   INNER JOIN "TBL_NOMRETROACTIVOSPUNTOSNOMINA" "rn" ON rnl."RPNO_ID" = rn."RPNO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON rnl."EMPL_ID" = ep."EMPL_ID" 
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
	
	public	function getDescuentosempleado($personaGral,$anio){
		$connection = Yii::app()->db;
		$string = 'SELECT  SUM("RPND_VALOR") AS "RPND_VALOR"
	           FROM  "TBL_NOMRETROACTIVOSPUNTOSNOMINADESCUENTOS" "rnd"
		       INNER JOIN "TBL_NOMRETROACTIVOSPUNTOSNOMINALIQUIDACIONES" "rnl" ON rnl."RPNL_ID" = rnd."RPNL_ID"
			   INNER JOIN "TBL_NOMRETROACTIVOSPUNTOSNOMINA" "rn" ON rnl."RPNO_ID" = rn."RPNO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON rnl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE rn."RPNO_ID" = '.$anio.' AND p."PEGE_IDENTIFICACION" = '."'".$personaGral."'";
        $column = $connection->createCommand($string)->queryRow();
		return $column['RPND_VALOR'];
      }
	
	public function getUltimosueldo($Mensualnomina,$Retroactivosnomina){
     $connection = Yii::app()->db;
	 $tdevengado = 0;
	 $mesinicio = $Retroactivosnomina->RPNO_ID.$Retroactivosnomina->RPNO_MESINICIO.'01';
	 $mesfinal = $Retroactivosnomina->RPNO_ID.$Retroactivosnomina->RPNO_MESFINAL.'01';
	 
	 $query = ' AND mn."MENO_ID" >= '.$mesinicio.' AND mn."MENO_ID" <= '.$mesfinal;
	 /**
	 *Consulta la ultimos valores del sueldo, prima antiguedad, s. transporte y alimentacion 
	 **/ 

     $sueldo = ($Mensualnomina->Empleoplanta->EMPL_SUELDO);
	 $sueldo = round($sueldo);
	 $tdevengado = $tdevengado + $sueldo;
	 
	 $prantiguedad = $Mensualnomina->getPrimaAntiguedad();
	 $antiguedad = $prantiguedad[0]; 
	 $tdevengado = $tdevengado + $antiguedad; 
	
     /**
	 *Consulta la sumatoria de las horas extras, bsp y prima vacaciones 
	 *que se hallas liquidado en el periodo de liquidacion de retroactivo
	 *del empleado 
	 **/
	 $sql = 'SELECT pg."PEGE_ID", SUM("MENL_BONIFICACION") AS "MENL_BONIFICACION", 
                          SUM("MENL_PRIMAVACACIONES") AS "MENL_PRIMAVACACIONES"
				   FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn 
                   WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" 
                   '.$query.' AND pg."PEGE_ID" = '.$Mensualnomina->Personageneral->PEGE_ID.'
                   GROUP BY pg."PEGE_ID" 
                   ORDER BY pg."PEGE_ID" ASC';
     $fila = $connection->createCommand($sql)->queryRow();
	 
	
	 $bonificacion = round($fila["MENL_BONIFICACION"]);
	 $tdevengado = $tdevengado + $bonificacion;
	 $primavacaciones = round($fila["MENL_PRIMAVACACIONES"]);	 
	 $tdevengado = $tdevengado + $primavacaciones;	 
	 
	 $devengado = array('','','','', $sueldo, $antiguedad, $bonificacion, $primavacaciones, $tdevengado);
	 /**
	 *Retornando ultima valores del empleado 
	 **/
	 return $devengado;     
	}
	
	public function getUnidadesEnNomina($parametros)
	{
	 $connection = Yii::app()->db;
	 $sql='SELECT u.*			  
		   FROM "TBL_NOMRETROACTIVOSPUNTOSNOMINALIQUIDACIONES" "rnl"
		   INNER JOIN "TBL_NOMRETROACTIVOSPUNTOSNOMINA" "rn" ON rnl."RPNO_ID" = rn."RPNO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON rnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY u."UNID_ID"
           ORDER BY u."UNID_ID"';
		   
     $unidades = $connection->createCommand($sql)->queryAll();
	 return $unidades;
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
	
	public function getReporteDescuento($parametros)
	{
	 $connection = Yii::app()->db;
	 
	 //echo "<br><br><br>".
	 $sql=' SELECT rnl."RPNL_ID", rnl."RPNL_CODIGO",  p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
			dp."DEPR_DESCRIPCION", rnd."RPND_VALOR"
			FROM "TBL_NOMRETROACTIVOSPUNTOSNOMINADESCUENTOS" "rnd" 
			INNER JOIN "TBL_NOMRETROACTIVOSPUNTOSNOMINALIQUIDACIONES" "rnl" ON rnl."RPNL_ID" = rnd."RPNL_ID"
			INNER JOIN "TBL_NOMRETROACTIVOSPUNTOSNOMINA" "rn" ON rnl."RPNO_ID" = rn."RPNO_ID" 
			INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON rnl."EMPL_ID" = ep."EMPL_ID" 
			INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
			INNER JOIN "TBL_NOMDESCUENTOSPRESTACIONES" "dp" ON dp."DEPR_ID" = rnd."DEPR_ID"
			WHERE '.$parametros.' AND rnd."RPND_VALOR"!=0
			GROUP BY p."PEGE_ID",  rnd."RPND_ID", rnl."RPNL_ID", dp."DEPR_ID"
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
             'RPNL_ID', 'RPNL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','DEPR_DESCRIPCION','RPND_VALOR',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      )
	 );	
	 
	}
}