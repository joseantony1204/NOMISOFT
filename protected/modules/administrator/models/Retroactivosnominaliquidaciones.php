<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES':
 * @Propiedad string $RANL_ID
 * @Propiedad string $RANL_CODIGO
 * @Propiedad integer $RANL_DIAS
 * @Propiedad integer $RANL_SALARIO
 * @Propiedad integer $RANL_PRIMAANTIGUEDAD
 * @Propiedad integer $RANL_TRANSPORTE
 * @Propiedad integer $RANL_ALIMENTACION
 * @Propiedad integer $RANL_HEDTOTAL
 * @Propiedad integer $RANL_HENTOTAL
 * @Propiedad integer $RANL_HEDFTOTAL
 * @Propiedad integer $RANL_HENFTOTAL
 * @Propiedad integer $RANL_DYFTOTAL
 * @Propiedad integer $RANL_RENTOTAL
 * @Propiedad integer $RANL_RENDYFTOTAL
 * @Propiedad integer $RANL_PRIMATECNICA
 * @Propiedad integer $RANL_GASTOSRP
 * @Propiedad integer $RANL_BONIFICACION
 * @Propiedad integer $RANL_PRIMAVACACIONES
 * @Propiedad integer $RANO_ID
 * @Propiedad integer $MENL_ID
 * @Propiedad string $RANL_FECHACAMBIO
 * @Propiedad integer $RANL_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad RETROACTIVOSNOMINADESCUENTOS[] $rETROACTIVOSNOMINADESCUENTOSes
 * @Propiedad MENSUALNOMINALIQUIDACIONES $mENL
 * @Propiedad RETROACTIVOSNOMINA $rANO
 */
class Retroactivosnominaliquidaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Retroactivosnominaliquidaciones la clase del modelo estàtico.
	 */
	public $PEGE_ID, $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS;
	public $EMPL_CARGO, $EMPL_SUELDO, $UNID_ID;
    public $RANL_DEVENGADO, $RANL_DESCUENTOS, $RANL_TOTALGRAL; 
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
		return 'TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('RANL_CODIGO, RANL_DIAS, RANL_SALARIO, RANL_PRIMAANTIGUEDAD, RANL_TRANSPORTE, RANL_ALIMENTACION, RANL_HEDTOTAL, RANL_HENTOTAL, RANL_HEDFTOTAL, RANL_HENFTOTAL, RANL_DYFTOTAL, RANL_RENTOTAL, RANL_RENDYFTOTAL, RANL_PRIMATECNICA, RANL_GASTOSRP, RANL_BONIFICACION, RANL_PRIMAVACACIONES, RANO_ID, MENL_ID, RANL_FECHACAMBIO, RANL_REGISTRADOPOR', 'required'),
			array('RANL_DIAS, RANL_SALARIO, RANL_PRIMAANTIGUEDAD, RANL_TRANSPORTE, RANL_ALIMENTACION, RANL_HEDTOTAL, RANL_HENTOTAL, RANL_HEDFTOTAL, RANL_HENFTOTAL, RANL_DYFTOTAL, RANL_RENTOTAL, RANL_RENDYFTOTAL, RANL_PRIMATECNICA, RANL_GASTOSRP, RANL_BONIFICACION, RANL_PRIMAVACACIONES, RANO_ID, MENL_ID, RANL_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('RANL_ID, RANL_CODIGO, RANL_DIAS, RANL_SALARIO, RANL_PRIMAANTIGUEDAD, RANL_TRANSPORTE, RANL_ALIMENTACION, RANL_HEDTOTAL, RANL_HENTOTAL, RANL_HEDFTOTAL, RANL_HENFTOTAL, RANL_DYFTOTAL, RANL_RENTOTAL, RANL_RENDYFTOTAL, RANL_PRIMATECNICA, RANL_GASTOSRP, RANL_BONIFICACION, RANL_PRIMAVACACIONES, RANO_ID, MENL_ID, RANL_FECHACAMBIO, RANL_REGISTRADOPOR', 'safe', 'on'=>'search'),
			array('RANL_ID, RANL_CODIGO, RANL_DIAS, RANL_SALARIO, RANL_PRIMAANTIGUEDAD, RANL_TRANSPORTE, RANL_ALIMENTACION, RANL_HEDTOTAL, 
			RANL_HENTOTAL, RANL_HEDFTOTAL, RANL_HENFTOTAL, RANL_DYFTOTAL, RANL_RENTOTAL, RANL_RENDYFTOTAL, RANL_PRIMATECNICA, RANL_GASTOSRP, 
			RANL_BONIFICACION, RANL_PRIMAVACACIONES, RANO_ID, MENL_ID, RANL_FECHACAMBIO, RANL_REGISTRADOPOR,
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
			'rETROACTIVOSNOMINADESCUENTOSes' => array(self::HAS_MANY, 'RETROACTIVOSNOMINADESCUENTOS', 'RANL_ID'),
			'mENL' => array(self::BELONGS_TO, 'MENSUALNOMINALIQUIDACIONES', 'MENL_ID'),
			'rANO' => array(self::BELONGS_TO, 'RETROACTIVOSNOMINA', 'RANO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'RANL_ID' => 'RANL',
						'RANL_CODIGO' => 'RANL CODIGO',
						'RANL_DIAS' => 'DIAS',
						'RANL_SALARIO' => 'RANL SALARIO',
						'RANL_PRIMAANTIGUEDAD' => 'RANL PRIMAANTIGUEDAD',
						'RANL_TRANSPORTE' => 'RANL TRANSPORTE',
						'RANL_ALIMENTACION' => 'RANL ALIMENTACION',
						'RANL_HEDTOTAL' => 'RANL HEDTOTAL',
						'RANL_HENTOTAL' => 'RANL HENTOTAL',
						'RANL_HEDFTOTAL' => 'RANL HEDFTOTAL',
						'RANL_HENFTOTAL' => 'RANL HENFTOTAL',
						'RANL_DYFTOTAL' => 'RANL DYFTOTAL',
						'RANL_RENTOTAL' => 'RANL RENTOTAL',
						'RANL_RENDYFTOTAL' => 'RANL RENDYFTOTAL',
						'RANL_PRIMATECNICA' => 'RANL PRIMATECNICA',
						'RANL_GASTOSRP' => 'RANL GASTOSRP',
						'RANL_BONIFICACION' => 'RANL BONIFICACION',
						'RANL_PRIMAVACACIONES' => 'RANL PRIMAVACACIONES',
						'RANO_ID' => 'RANO',
						'MENL_ID' => 'MENL',
						'RANL_FECHACAMBIO' => 'RANL FECHACAMBIO',
						'RANL_REGISTRADOPOR' => 'RANL REGISTRADOPOR',
						
						'RANL_DEVENGADO' => 'DEVENG.(+)',
						'RANL_DESCUENTOS' => 'DEDUCC.(-)',
						'RANL_TOTALGRAL' => 'NETO',
						
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

		$criteria->compare('RANL_ID',$this->RANL_ID,true);
		$criteria->compare('RANL_CODIGO',$this->RANL_CODIGO,true);
		$criteria->compare('RANL_DIAS',$this->RANL_DIAS);
		$criteria->compare('RANL_SALARIO',$this->RANL_SALARIO);
		$criteria->compare('RANL_PRIMAANTIGUEDAD',$this->RANL_PRIMAANTIGUEDAD);
		$criteria->compare('RANL_TRANSPORTE',$this->RANL_TRANSPORTE);
		$criteria->compare('RANL_ALIMENTACION',$this->RANL_ALIMENTACION);
		$criteria->compare('RANL_HEDTOTAL',$this->RANL_HEDTOTAL);
		$criteria->compare('RANL_HENTOTAL',$this->RANL_HENTOTAL);
		$criteria->compare('RANL_HEDFTOTAL',$this->RANL_HEDFTOTAL);
		$criteria->compare('RANL_HENFTOTAL',$this->RANL_HENFTOTAL);
		$criteria->compare('RANL_DYFTOTAL',$this->RANL_DYFTOTAL);
		$criteria->compare('RANL_RENTOTAL',$this->RANL_RENTOTAL);
		$criteria->compare('RANL_RENDYFTOTAL',$this->RANL_RENDYFTOTAL);
		$criteria->compare('RANL_PRIMATECNICA',$this->RANL_PRIMATECNICA);
		$criteria->compare('RANL_GASTOSRP',$this->RANL_GASTOSRP);
		$criteria->compare('RANL_BONIFICACION',$this->RANL_BONIFICACION);
		$criteria->compare('RANL_PRIMAVACACIONES',$this->RANL_PRIMAVACACIONES);
		$criteria->compare('RANO_ID',$this->RANO_ID);
		$criteria->compare('MENL_ID',$this->MENL_ID);
		$criteria->compare('RANL_FECHACAMBIO',$this->RANL_FECHACAMBIO,true);
		$criteria->compare('RANL_REGISTRADOPOR',$this->RANL_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
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
		$criteria->select = 't.*, p.*, ep.*, SUM("RANL_DIAS") AS "RANL_DIAS",
		                    SUM("RANL_SALARIO"+"RANL_PRIMAANTIGUEDAD"+"RANL_TRANSPORTE"+"RANL_ALIMENTACION"+"RANL_HEDTOTAL"+"RANL_HENTOTAL"+
							"RANL_HEDFTOTAL"+"RANL_HENFTOTAL"+"RANL_DYFTOTAL"+"RANL_RENTOTAL"+"RANL_RENDYFTOTAL"+"RANL_PRIMATECNICA"+
							"RANL_GASTOSRP"+"RANL_BONIFICACION"+"RANL_PRIMAVACACIONES") AS "RANL_DEVENGADO",							 
							
							(SELECT SUM("RAND_VALOR") 
							 FROM 
							 "TBL_NOMRETROACTIVOSNOMINADESCUENTOS" rnd, "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" rnl, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl,
							 "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMPERSONASGENERALES" pg
							 WHERE
							 pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mnl."MENL_ID" = rnl."MENL_ID"
							 AND rnl."RANL_ID" = rnd."RANL_ID"  AND t."RANL_ID" = rnd."RANL_ID"
							 ) AS "RANL_DESCUENTOS"							
							';							
		$criteria->join = '
		                   INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON t."MENL_ID" = mnl."MENL_ID"
		                   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON ep."EMPL_ID" = mnl."EMPL_ID"
						   INNER JOIN "TBL_NOMUNIDADES" "u" ON u."UNID_ID" = ep."UNID_ID"
		                   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"';					
        $criteria->group = 'ep."EMPL_ID", p."PEGE_ID", t."RANL_ID"';
		
		$criteria->compare('"RANL_ID"',$this->RANL_ID,true);
		$criteria->compare('"RANL_CODIGO"',$this->RANL_CODIGO,true);
		$criteria->compare('"RANL_DIAS"',$this->RANL_DIAS);
		$criteria->compare('"RANL_SALARIO"',$this->RANL_SALARIO);
		$criteria->compare('"RANL_PRIMAANTIGUEDAD"',$this->RANL_PRIMAANTIGUEDAD);
		$criteria->compare('"RANL_TRANSPORTE"',$this->RANL_TRANSPORTE);
		$criteria->compare('"RANL_ALIMENTACION"',$this->RANL_ALIMENTACION);
		$criteria->compare('"RANL_HEDTOTAL"',$this->RANL_HEDTOTAL);
		$criteria->compare('"RANL_HENTOTAL"',$this->RANL_HENTOTAL);
		$criteria->compare('"RANL_HEDFTOTAL"',$this->RANL_HEDFTOTAL);
		$criteria->compare('"RANL_HENFTOTAL"',$this->RANL_HENFTOTAL);
		$criteria->compare('"RANL_DYFTOTAL"',$this->RANL_DYFTOTAL);
		$criteria->compare('"RANL_RENTOTAL"',$this->RANL_RENTOTAL);
		$criteria->compare('"RANL_RENDYFTOTAL"',$this->RANL_RENDYFTOTAL);
		$criteria->compare('"RANL_PRIMATECNICA"',$this->RANL_PRIMATECNICA);
		$criteria->compare('"RANL_GASTOSRP"',$this->RANL_GASTOSRP);
		$criteria->compare('"RANL_BONIFICACION"',$this->RANL_BONIFICACION);
		$criteria->compare('"RANL_PRIMAVACACIONES"',$this->RANL_PRIMAVACACIONES);
		$criteria->compare('"RANO_ID"',$this->RANO_ID);
		$criteria->compare('"MENL_ID"',$this->MENL_ID);
		$criteria->compare('RANL_FECHACAMBIO',$this->RANL_FECHACAMBIO,true);
		$criteria->compare('RANL_REGISTRADOPOR',$this->RANL_REGISTRADOPOR);
		
		$criteria->compare('"RANL_DEVENGADO"',$this->RANL_DEVENGADO);
		$criteria->compare('"RANL_DESCUENTOS"',$this->RANL_DESCUENTOS);
		$criteria->compare('"RANL_TOTALGRAL"',$this->RANL_TOTALGRAL);
		
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
	 //echo "<br><br><br>";
		 
	 /**
	 *Recuperando la liquidacion del retroactivo para
	 *cada mes correspondiente
	 */
	 
	 /*
	 *Parte 1: Encabezado del arreglo
	 */
	 $this->retroactivogeneral = NULL;
	 $array = array('ID LIQUIDACION','CODIGO','DIAS','PUNTOS','SALARIO','PRIMA ATIGUEDAD','SUBSIDIO TRANSPORTE','SUBSIDIO ALIMENTACION','N.H.E.D',
	               'H.E.D','N.H.E.N','H.E.N','N.H.E.D.F','H.E.D.F','N.H.E.N.F','H.E.N.F','N. DOMINGO','DOMINGOS','N.RECARGO NOCT',
			       'RECARGO NOCT','N. REC DOMINGOS','REC DOMINGOS','PRIMA TECNICA','GASTOS REPRESENTACION','BON. DE SERVICIOS',
				   'PRIMA DE VACACIONES','ID NOMINA','ID EMPLEO','TOTAL DEVENGADO','PERSONA',
				   );
	 
	 $m=0; $n=0;
	 foreach ($array as $values=>$value) {	
	  $this->retroactivogeneral[$m][$n] = $value;
	  $n++;  
	 }
	 
	 /*
	 *Parte 2: retroactivo general
	 */
	 $retroactivo='SELECT rnl."RANL_ID", rnl."RANL_CODIGO", rnl."RANL_DIAS", rnl."RANL_DIAS" AS "N1", rnl."RANL_SALARIO", rnl."RANL_PRIMAANTIGUEDAD", rnl."RANL_TRANSPORTE",
				  rnl."RANL_ALIMENTACION", rnl."RANL_HEDTOTAL" AS "N2", rnl."RANL_HEDTOTAL", rnl."RANL_HENTOTAL" AS "N3", rnl."RANL_HENTOTAL", rnl."RANL_HEDFTOTAL" AS "N4", rnl."RANL_HEDFTOTAL", rnl."RANL_HENFTOTAL" AS "N5", rnl."RANL_HENFTOTAL",
				  rnl."RANL_DYFTOTAL" AS "N6", rnl."RANL_DYFTOTAL", rnl."RANL_RENTOTAL" AS "N7", rnl."RANL_RENTOTAL", rnl."RANL_RENDYFTOTAL" AS "N8", rnl."RANL_RENDYFTOTAL", rnl."RANL_PRIMATECNICA", rnl."RANL_GASTOSRP", 
				  rnl."RANL_BONIFICACION", rnl."RANL_PRIMAVACACIONES", rnl."RANO_ID", mnl."EMPL_ID", 				  
				  SUM(rnl."RANL_SALARIO"+rnl."RANL_PRIMAANTIGUEDAD"+rnl."RANL_TRANSPORTE"+rnl."RANL_ALIMENTACION"+rnl."RANL_HEDTOTAL"+
				      rnl."RANL_HENTOTAL"+rnl."RANL_HEDFTOTAL"+rnl."RANL_HENFTOTAL"+rnl."RANL_DYFTOTAL"+rnl."RANL_RENTOTAL"+rnl."RANL_RENDYFTOTAL"+
				      rnl."RANL_PRIMATECNICA"+rnl."RANL_GASTOSRP"+rnl."RANL_BONIFICACION"+rnl."RANL_PRIMAVACACIONES"
					 ) AS "RANL_DEVENGADO", p."PEGE_ID", p."PEGE_PRIMERAPELLIDO"       
				  
		   FROM "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" "rnl"
		   INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON mnl."MENL_ID" = rnl."MENL_ID"
		   INNER JOIN "TBL_NOMRETROACTIVOSNOMINA" "rn" ON rnl."RANO_ID" = rn."RANO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY mnl."MENL_ID", p."PEGE_ID",  rn."RANO_ID", rnl."RANL_ID"
           ORDER BY  p."PEGE_PRIMERAPELLIDO", rn."RANO_ID", mnl."MENL_ID"  ASC
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
	 $string='SELECT COUNT("RANL_ID") AS "RANL_ID", COUNT("RANL_CODIGO") AS "RANL_CODIGO", SUM("RANL_DIAS") AS "RANL_DIAS", COUNT("N1") AS "N1",
				SUM("RANL_SALARIO") AS "RANL_SALARIO", SUM("RANL_PRIMAANTIGUEDAD") AS "RANL_PRIMAANTIGUEDAD", SUM("RANL_TRANSPORTE") AS "RANL_TRANSPORTE",
				SUM("RANL_ALIMENTACION") AS "RANL_ALIMENTACION", COUNT("N2") AS "N2", SUM("RANL_HEDTOTAL") AS "RANL_HEDTOTAL", COUNT("N3") AS "N3",
				SUM("RANL_HENTOTAL") AS "RANL_HENTOTAL", COUNT("N4") AS "N4", SUM("RANL_HEDFTOTAL") AS "RANL_HEDFTOTAL", COUNT("N5") AS "N5", SUM("RANL_HENFTOTAL") AS "RANL_HENFTOTAL", 
				COUNT("N6") AS "N6", SUM("RANL_DYFTOTAL") AS "RANL_DYFTOTAL", COUNT("N7") AS "N7", SUM("RANL_RENTOTAL") AS "RANL_RENTOTAL",
				COUNT("N8") AS "N8", SUM("RANL_RENDYFTOTAL") AS "RANL_RENDYFTOTAL", SUM("RANL_PRIMATECNICA") AS "RANL_PRIMATECNICA",SUM("RANL_GASTOSRP") AS "RANL_GASTOSRP",
				SUM("RANL_BONIFICACION") AS "RANL_BONIFICACION",SUM("RANL_PRIMAVACACIONES") AS "RANL_PRIMAVACACIONES",COUNT("RANO_ID") AS "RANO_ID", COUNT("EMPL_ID") AS "EMPL_ID",
				SUM("RANL_DEVENGADO") AS "RANL_DEVENGADO", COUNT("PEGE_ID") AS "PEGE_ID", COUNT("PEGE_PRIMERAPELLIDO") AS "PEGE_PRIMERAPELLIDO"
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
	 $string1='SELECT  rnl."RANL_ID", rnd."DEPR_ID", rnd."RAND_VALOR", rn."RANO_ID"
	           FROM  "TBL_NOMRETROACTIVOSNOMINADESCUENTOS" "rnd"
		       INNER JOIN "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" "rnl" ON rnl."RANL_ID" = rnd."RANL_ID"
               INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON rnl."MENL_ID" = mnl."MENL_ID"
			   INNER JOIN "TBL_NOMRETROACTIVOSNOMINA" "rn" ON rnl."RANO_ID" = rn."RANO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE '.$parametros.'
               GROUP BY rn."RANO_ID", rnl."RANL_ID", rnd."RAND_ID", p."PEGE_ID"
               ORDER BY rnd."DEPR_ID", rn."RANO_ID", p."PEGE_PRIMERAPELLIDO", rnl."RANL_ID" ASC';
		   
     $rows1 = $connection->createCommand($string1)->queryAll();
	 
	 $string2='SELECT  rnl."RANL_ID", rn."RANO_ID"
	           FROM  "TBL_NOMRETROACTIVOSNOMINADESCUENTOS" "rnd"
		       INNER JOIN "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" "rnl" ON rnl."RANL_ID" = rnd."RANL_ID"
               INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON rnl."MENL_ID" = mnl."MENL_ID"
			   INNER JOIN "TBL_NOMRETROACTIVOSNOMINA" "rn" ON rnl."RANO_ID" = rn."RANO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE '.$parametros.'
			   GROUP BY rn."RANO_ID", rnl."RANL_ID", p."PEGE_ID"
               ORDER BY rn."RANO_ID", p."PEGE_PRIMERAPELLIDO", rnl."RANL_ID" ASC
               ';
		   
     $rows2 = $connection->createCommand($string2)->queryAll();
	 $cont=1;	 
	 foreach ($rows2 as $values) {	     	 
	    $this->descuentos[$cont][0] = $values["RANL_ID"];
		$filas[$cont]=$values["RANO_ID"];
        $cont++;		
     }
	 $this->descuentos[$cont][0] = "Total";
	 $string3='SELECT dp."DEPR_DESCRIPCION"
               FROM "TBL_NOMDESCUENTOSPRESTACIONES" dp
               WHERE dp."TIPR_ID" = 5 AND dp."DEPR_ID" IN
               (
               SELECT  rnd."DEPR_ID"
	           FROM  "TBL_NOMRETROACTIVOSNOMINADESCUENTOS" "rnd"
		       INNER JOIN "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" "rnl" ON rnl."RANL_ID" = rnd."RANL_ID"
               INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON rnl."MENL_ID" = mnl."MENL_ID"
			   INNER JOIN "TBL_NOMRETROACTIVOSNOMINA" "rn" ON rnl."RANO_ID" = rn."RANO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID" 
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
		$string = 'SELECT  SUM("RAND_VALOR") AS "RAND_VALOR"
	           FROM  "TBL_NOMRETROACTIVOSNOMINADESCUENTOS" "rnd"
		       INNER JOIN "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" "rnl" ON rnl."RANL_ID" = rnd."RANL_ID"
               INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON rnl."MENL_ID" = mnl."MENL_ID"
			   INNER JOIN "TBL_NOMRETROACTIVOSNOMINA" "rn" ON rnl."RANO_ID" = rn."RANO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE rn."RANO_ID" = '.$anio.' AND p."PEGE_IDENTIFICACION" = '."'".$personaGral."'";
        $column = $connection->createCommand($string)->queryRow();
		return $column['RAND_VALOR'];
      }
    	
	public function getUltimosueldo($Mensualnomina,$Retroactivosnomina){
     $connection = Yii::app()->db;
	 $tdevengado = 0;
	 $mesinicio = $Retroactivosnomina->RANO_ID.$Retroactivosnomina->RANO_MESINICIO.'01';
	 $mesfinal = $Retroactivosnomina->RANO_ID.$Retroactivosnomina->RANO_MESFINAL.'01';
	 
	 $query = ' AND mn."MENO_ID" >= '.$mesinicio.' AND mn."MENO_ID" <= '.$mesfinal;
	 /**
	 *Consulta la ultimos valores del sueldo, prima antiguedad, s. transporte y alimentacion 
	 **/ 

     $sueldo = ($Mensualnomina->Empleoplanta->EMPL_SUELDO);
	 $sueldo = round($sueldo);
	 $tdevengado = $tdevengado + $sueldo;
	 
	 $prantiguedad = $Mensualnomina->getPrimaAntiguedad();
	 $antiguedad = round($antiguedad); 
	 $tdevengado = $tdevengado + $antiguedad[0]; 
	 
	 $trasnporte = $Mensualnomina->getSubTransporte();
	 $trasnporte = round($trasnporte);
	 $tdevengado = $tdevengado + $trasnporte;
	 
	 $alimentacion = $Mensualnomina->getSubAlimentacion();
	 $alimentacion = round($alimentacion);
	 $tdevengado = $tdevengado + $alimentacion;

     $primatecnica = $Mensualnomina->getPrimaTecnica();
	 $primatecnica = round($primatecnica);
	 $tdevengado = $tdevengado + $primatecnica;
	 
	 $gastosrepresentacion = $Mensualnomina->getGastosRepresentacion();
	 $gastosrepresentacion = round($gastosrepresentacion);	 
	 $tdevengado = $tdevengado + $gastosrepresentacion;	 

     /**
	 *Consulta la sumatoria de las horas extras, bsp y prima vacaciones 
	 *que se hallas liquidado en el periodo de liquidacion de retroactivo
	 *del empleado 
	 **/
	 $sql = 'SELECT pg."PEGE_ID", SUM("MENL_HED") AS "MENL_HED", SUM("MENL_HEDTOTAL") AS "MENL_HEDTOTAL", SUM("MENL_HEN") AS "MENL_HEN", SUM("MENL_HENTOTAL") AS "MENL_HENTOTAL", 
                          SUM("MENL_HEDF") AS "MENL_HEDF", SUM("MENL_HEDFTOTAL") AS "MENL_HEDFTOTAL", SUM("MENL_HENF") AS "MENL_HENF", SUM("MENL_HENFTOTAL") AS "MENL_HENFTOTAL", 
                          SUM("MENL_DYF") AS "MENL_DYF", SUM("MENL_DYFTOTAL") AS "MENL_DYFTOTAL", SUM("MENL_REN") AS "MENL_REN", SUM("MENL_RENTOTAL") AS "MENL_RENTOTAL", 
                          SUM("MENL_RENDYF") AS "MENL_RENDYF", SUM("MENL_RENDYFTOTAL") AS "MENL_RENDYFTOTAL", SUM("MENL_BONIFICACION") AS "MENL_BONIFICACION", 
                          SUM("MENL_PRIMAVACACIONES") AS "MENL_PRIMAVACACIONES"
				   FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn 
                   WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" 
                   '.$query.' AND pg."PEGE_ID" = '.$Mensualnomina->Personageneral->PEGE_ID.'
                   GROUP BY pg."PEGE_ID" 
                   ORDER BY pg."PEGE_ID" ASC';
     $fila = $connection->createCommand($sql)->queryRow();
	 
	 $shed = round($fila["MENL_HED"]);
	 $hed = round($fila["MENL_HEDTOTAL"]);
	 $tdevengado = $tdevengado + $hed;
	 $shen = round($fila["MENL_HEN"]);
	 $hen = round($fila["MENL_HENTOTAL"]);
	 $tdevengado = $tdevengado + $hen;
	 $shedf = round($fila["MENL_HEDF"]);
	 $hedf = round($fila["MENL_HEDFTOTAL"]);
	 $tdevengado = $tdevengado + $hedf;
	 $shenf = round($fila["MENL_HENF"]);
	 $henf = round($fila["MENL_HENFTOTAL"]);
	 $tdevengado = $tdevengado + $henf;
	 $sdyf = round($fila["MENL_DYF"]);
	 $dyf = round($fila["MENL_DYFTOTAL"]);
	 $tdevengado = $tdevengado + $dyf;
	 $sren = round($fila["MENL_REN"]);
	 $ren = round($fila["MENL_RENTOTAL"]);
	 $tdevengado = $tdevengado + $ren;
	 $srendyf = round($fila["MENL_RENDYF"]);
	 $rendyf = round($fila["MENL_RENDYFTOTAL"]);
	 $tdevengado = $tdevengado + $rendyf;
	 $bonificacion = round($fila["MENL_BONIFICACION"]);
	 $tdevengado = $tdevengado + $bonificacion;
	 $primavacaciones = round($fila["MENL_PRIMAVACACIONES"]);	 
	 $tdevengado = $tdevengado + $primavacaciones;	 
	 
	 $devengado = array('','','','',$sueldo,$prantiguedad[0],$trasnporte,$alimentacion,
	                    $shed,$hed,$shen,$hen,$shedf,$hedf,$shenf,$henf,$sdyf,$dyf,
						$sren,$ren,$srendyf,$rendyf,$primatecnica,$gastosrepresentacion,$bonificacion,$primavacaciones,$tdevengado);
	 /**
	 *Retornando ultima valores del empleado 
	 **/
	 return $devengado;     
	}

	
	public function getUnidadesEnNomina($parametros)
	{
	 $connection = Yii::app()->db;
	 $sql='SELECT u.*			  
		   FROM "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" "rnl"
		   INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON mnl."MENL_ID" = rnl."MENL_ID"
		   INNER JOIN "TBL_NOMRETROACTIVOSNOMINA" "rn" ON rnl."RANO_ID" = rn."RANO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"
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
	 $sql=' SELECT rnl."RANL_ID", rnl."RANL_CODIGO",  p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
			dp."DEPR_DESCRIPCION", rnd."RAND_VALOR"
			FROM "TBL_NOMRETROACTIVOSNOMINADESCUENTOS" "rnd" 
			INNER JOIN "TBL_NOMRETROACTIVOSNOMINALIQUIDACIONES" "rnl" ON rnl."RANL_ID" = rnd."RANL_ID" 
			INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON mnl."MENL_ID" = rnl."MENL_ID" 
			INNER JOIN "TBL_NOMRETROACTIVOSNOMINA" "rn" ON rnl."RANO_ID" = rn."RANO_ID" 
			INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID" 
			INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
			INNER JOIN "TBL_NOMDESCUENTOSPRESTACIONES" "dp" ON dp."DEPR_ID" = rnd."DEPR_ID"
			WHERE '.$parametros.' AND rnd."RAND_VALOR"!=0
			GROUP BY p."PEGE_ID",  rnd."RAND_ID", rnl."RANL_ID", dp."DEPR_ID"
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
             'RANL_ID', 'RANL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','DEPR_DESCRIPCION','RAND_VALOR',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      )
	 );	
	 
	}
}