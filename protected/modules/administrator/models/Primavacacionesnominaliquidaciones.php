<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMPRIMAVACACIONESNOMINALIQUIDACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMPRIMAVACACIONESNOMINALIQUIDACIONES':
 * @Propiedad string $PVNL_ID
 * @Propiedad integer $PVNL_CODIGO
 * @Propiedad integer $PVNL_DIAS
 * @Propiedad string $PVNL_PUNTOS
 * @Propiedad integer $PVNL_SUELDO
 * @Propiedad integer $PVNL_SALARIO
 * @Propiedad integer $PVNL_PRIMAANTIGUEDAD
 * @Propiedad integer $PVNL_TRANSPORTE
 * @Propiedad integer $PVNL_ALIMENTACION
 * @Propiedad integer $PVNL_PRIMATECNICA
 * @Propiedad integer $PVNL_GASTOSRP
 * @Propiedad integer $PVNL_BONIFICACION
 * @Propiedad integer $PVNL_SEMESTRAL
 * @Propiedad integer $PVNL_RETEFUENTE
 * @Propiedad integer $PVNO_ID
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $PVNL_FECHACAMBIO
 * @Propiedad integer $PVNL_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad EMPLEOSPLANTA $eMPL
 * @Propiedad PRIMAVACACIONESNOMINA $pVNO
 * @Propiedad PRIMAVACACIONESNOMINADESCUENTOS[] $pRIMAVACACIONESNOMINADESCUENTOSes
 */
class Primavacacionesnominaliquidaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Primavacacionesnominaliquidaciones la clase del modelo estàtico.
	 */
	public $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS;
    public $PVNL_DEVENGADO, $PVNL_DESCUENTOS, $PVNL_TOTALGRAL;
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
		return 'TBL_NOMPRIMAVACACIONESNOMINALIQUIDACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PVNL_CODIGO, PVNL_DIAS, PVNL_PUNTOS, PVNL_SUELDO, PVNL_SALARIO, PVNL_PRIMAANTIGUEDAD, PVNL_TRANSPORTE, PVNL_ALIMENTACION, PVNL_PRIMATECNICA, PVNL_GASTOSRP, PVNL_BONIFICACION, PVNL_SEMESTRAL, PVNL_RETEFUENTE, PVNO_ID, EMPL_ID, PVNL_FECHACAMBIO, PVNL_REGISTRADOPOR', 'required'),
			array('PVNL_CODIGO, PVNL_DIAS, PVNL_SUELDO, PVNL_SALARIO, PVNL_PRIMAANTIGUEDAD, PVNL_TRANSPORTE, PVNL_ALIMENTACION, PVNL_PRIMATECNICA, PVNL_GASTOSRP, PVNL_BONIFICACION, PVNL_SEMESTRAL, PVNL_RETEFUENTE, PVNO_ID, EMPL_ID, PVNL_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PVNL_ID, PVNL_CODIGO, PVNL_DIAS, PVNL_PUNTOS, PVNL_SUELDO, PVNL_SALARIO, PVNL_PRIMAANTIGUEDAD, PVNL_TRANSPORTE, 
			       PVNL_ALIMENTACION, PVNL_PRIMATECNICA, PVNL_GASTOSRP, PVNL_BONIFICACION, PVNL_SEMESTRAL, PVNL_RETEFUENTE, 
				   PVNO_ID, EMPL_ID, PVNL_FECHACAMBIO, PVNL_REGISTRADOPOR,
				   PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'search'),
				   
		    array('PVNL_ID, PVNL_CODIGO, PVNL_DIAS, PVNL_PUNTOS, PVNL_SUELDO, PVNL_SALARIO, PVNL_PRIMAANTIGUEDAD, PVNL_TRANSPORTE, 
			       PVNL_ALIMENTACION, PVNL_PRIMATECNICA, PVNL_GASTOSRP, PVNL_BONIFICACION, PVNL_SEMESTRAL, PVNL_RETEFUENTE, 
				   PVNO_ID, EMPL_ID, PVNL_FECHACAMBIO, PVNL_REGISTRADOPOR,
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
			'pVNO' => array(self::BELONGS_TO, 'PRIMAVACACIONESNOMINA', 'PVNO_ID'),
			'pRIMAVACACIONESNOMINADESCUENTOSes' => array(self::HAS_MANY, 'PRIMAVACACIONESNOMINADESCUENTOS', 'PVNL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'PVNL_ID' => 'ID',
						'PVNL_CODIGO' => 'CODIGO',
						'PVNL_DIAS' => 'DIAS',
						'PVNL_PUNTOS' => 'PUNTOS',
						'PVNL_SUELDO' => 'SUELDO',
						'PVNL_SALARIO' => 'SALARIO',
						'PVNL_PRIMAANTIGUEDAD' => 'PRIMA ANTIGUEDAD',
						'PVNL_TRANSPORTE' => 'TRANSPORTE',
						'PVNL_ALIMENTACION' => 'ALIMENTACION',
						'PVNL_PRIMATECNICA' => 'PRIMA TECNICA',
						'PVNL_GASTOSRP' => 'GASTOS REPRESENTACION',
						'PVNL_BONIFICACION' => '1/12 BONIFICACION',
						'PVNL_SEMESTRAL' => '1/12 PRIMA SEMESTRAL',
						'PVNO_ID' => 'PVNO',
						'EMPL_ID' => 'EMPL',
						'PVNL_FECHACAMBIO' => 'PVNL FECHACAMBIO',
						'PVNL_REGISTRADOPOR' => 'PVNL REGISTRADOPOR',
						
						'PVNL_DEVENGADO' => 'DEVENG.(+)',
						'PVNL_RETEFUENTE' => 'RETEFUENTE (-)',
						'PVNL_DESCUENTOS' => 'DEDUCC.(-)',
						'PVNL_TOTALGRAL' => 'NETO',
						
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

		$criteria->compare('PVNL_ID',$this->PVNL_ID,true);
		$criteria->compare('PVNL_CODIGO',$this->PVNL_CODIGO);
		$criteria->compare('PVNL_DIAS',$this->PVNL_DIAS);
		$criteria->compare('PVNL_PUNTOS',$this->PVNL_PUNTOS,true);
		$criteria->compare('PVNL_SUELDO',$this->PVNL_SUELDO);
		$criteria->compare('PVNL_SALARIO',$this->PVNL_SALARIO);
		$criteria->compare('PVNL_PRIMAANTIGUEDAD',$this->PVNL_PRIMAANTIGUEDAD);
		$criteria->compare('PVNL_TRANSPORTE',$this->PVNL_TRANSPORTE);
		$criteria->compare('PVNL_ALIMENTACION',$this->PVNL_ALIMENTACION);
		$criteria->compare('PVNL_PRIMATECNICA',$this->PVNL_PRIMATECNICA);
		$criteria->compare('PVNL_GASTOSRP',$this->PVNL_GASTOSRP);
		$criteria->compare('PVNL_BONIFICACION',$this->PVNL_BONIFICACION);
		$criteria->compare('PVNL_SEMESTRAL',$this->PVNL_SEMESTRAL);
		$criteria->compare('PVNL_RETEFUENTE',$this->PVNL_RETEFUENTE);
		$criteria->compare('PVNO_ID',$this->PVNO_ID);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('PVNL_FECHACAMBIO',$this->PVNL_FECHACAMBIO,true);
		$criteria->compare('PVNL_REGISTRADOPOR',$this->PVNL_REGISTRADOPOR);

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
			
			'PVNL_DIAS'=>array(
				'asc'=>'t."PVNL_DIAS"',
				'desc'=>'t."PVNL_DIAS" desc',
			),
			
			'PVNL_PUNTOS'=>array(
				'asc'=>'t."PVNL_PUNTOS"',
				'desc'=>'t."PVNL_PUNTOS" desc',
			),
			
			'PVNL_SALARIO'=>array(
				'asc'=>'t."PVNL_SALARIO"',
				'desc'=>'t."PVNL_SALARIO" desc',
			),
			
			'PVNL_DEVENGADO'=>array(
				'asc'=>'(t."PVNL_SALARIO"+t."PVNL_PRIMAANTIGUEDAD"+t."PVNL_TRANSPORTE"+t."PVNL_ALIMENTACION"+t."PVNL_PRIMATECNICA"
							+t."PVNL_GASTOSRP"+t."PVNL_BONIFICACION"+t."PVNL_SEMESTRAL")',
				'desc'=>'(t."PVNL_SALARIO"+t."PVNL_PRIMAANTIGUEDAD"+t."PVNL_TRANSPORTE"+t."PVNL_ALIMENTACION"+t."PVNL_PRIMATECNICA"
							+t."PVNL_GASTOSRP"+t."PVNL_BONIFICACION"+t."PVNL_SEMESTRAL") DESC',
			),
			
			'PVNL_RETEFUENTE'=>array(
				'asc'=>'t."PVNL_RETEFUENTE"',
				'desc'=>'t."PVNL_RETEFUENTE" desc',
			),
			
			'PVNL_DESCUENTOS'=>array(
				'asc'=>'(SELECT SUM("PVND_VALOR") 
							 FROM "TBL_NOMPRIMAVACACIONESNOMINADESCUENTOS" pvnd 
							 WHERE pvnd."PVNL_ID" = t."PVNL_ID"						 
							 )',
				'desc'=>'(SELECT SUM("PVND_VALOR") 
							 FROM "TBL_NOMPRIMAVACACIONESNOMINADESCUENTOS" pvnd 
							 WHERE pvnd."PVNL_ID" = t."PVNL_ID"							 
							 ) DESC',
			),
			
			'PVNL_TOTALGRAL'=>array(
				'asc'=>'((t."PVNL_SALARIO"+t."PVNL_PRIMAANTIGUEDAD"+t."PVNL_TRANSPORTE"+t."PVNL_ALIMENTACION"+t."PVNL_PRIMATECNICA"
							+t."PVNL_GASTOSRP"+t."PVNL_BONIFICACION"+t."PVNL_SEMESTRAL")-((
							t."PVNL_RETEFUENTE"
							 )+(SELECT SUM("PVND_VALOR") 
							 FROM "TBL_NOMPRIMAVACACIONESNOMINADESCUENTOS" pvnd 
							 WHERE pvnd."PVNL_ID" = t."PVNL_ID")))',
							 
				'desc'=>'((t."PVNL_SALARIO"+t."PVNL_PRIMAANTIGUEDAD"+t."PVNL_TRANSPORTE"+t."PVNL_ALIMENTACION"+t."PVNL_PRIMATECNICA"
							+t."PVNL_GASTOSRP"+t."PVNL_BONIFICACION"+t."PVNL_SEMESTRAL"
							)-((
							t."PVNL_RETEFUENTE"
							 )+(SELECT SUM("PVND_VALOR") 
							 FROM "TBL_NOMPRIMAVACACIONESNOMINADESCUENTOS" pvnd 
							 WHERE pvnd."PVNL_ID" = t."PVNL_ID"))) desc',
			),
        );

		$criteria=new CDbCriteria;
		
		$criteria->select = 'p.*, ep.*, t.*,
		                    SUM(t."PVNL_SALARIO"+t."PVNL_PRIMAANTIGUEDAD"+t."PVNL_TRANSPORTE"+t."PVNL_ALIMENTACION"+t."PVNL_PRIMATECNICA"
							+t."PVNL_GASTOSRP"+t."PVNL_BONIFICACION"+t."PVNL_SEMESTRAL") AS "PVNL_DEVENGADO",
							 
							 t."PVNL_RETEFUENTE",
							
							(SELECT SUM("PVND_VALOR") 
							 FROM "TBL_NOMPRIMAVACACIONESNOMINADESCUENTOS" pvnd 
							 WHERE pvnd."PVNL_ID" = t."PVNL_ID"
							 ) AS "PVNL_DESCUENTOS"							
							';
		$criteria->join = '
		                   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON t."EMPL_ID" = ep."EMPL_ID"
		                   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"';
        $criteria->group = 'ep."EMPL_ID", p."PEGE_ID", t."PVNL_ID"';

		$criteria->compare('"PVNL_ID"',$this->PVNL_ID,true);
		$criteria->compare('"PVNL_CODIGO"',$this->PVNL_CODIGO);
		$criteria->compare('"PVNL_DIAS"',$this->PVNL_DIAS);
		$criteria->compare('"PVNL_PUNTOS"',$this->PVNL_PUNTOS,true);
		$criteria->compare('"PVNL_SUELDO"',$this->PVNL_SUELDO);
		$criteria->compare('"PVNL_SALARIO"',$this->PVNL_SALARIO);
		$criteria->compare('"PVNL_PRIMAANTIGUEDAD"',$this->PVNL_PRIMAANTIGUEDAD);
		$criteria->compare('"PVNL_TRANSPORTE"',$this->PVNL_TRANSPORTE);
		$criteria->compare('"PVNL_ALIMENTACION"',$this->PVNL_ALIMENTACION);
		$criteria->compare('"PVNL_PRIMATECNICA"',$this->PVNL_PRIMATECNICA);
		$criteria->compare('"PVNL_GASTOSRP"',$this->PVNL_GASTOSRP);
		$criteria->compare('"PVNL_BONIFICACION"',$this->PVNL_BONIFICACION);
		$criteria->compare('"PVNL_SEMESTRAL"',$this->PVNL_SEMESTRAL);
		$criteria->compare('"PVNL_RETEFUENTE"',$this->PVNL_RETEFUENTE);
		$criteria->compare('"PVNO_ID"',$this->PVNO_ID);
		$criteria->compare('"EMPL_ID"',$this->EMPL_ID);
		$criteria->compare('"PVNL_FECHACAMBIO"',$this->PVNL_FECHACAMBIO,true);
		$criteria->compare('"PVNL_REGISTRADOPOR"',$this->PVNL_REGISTRADOPOR);
		
	    $criteria->compare('"PVNL_DEVENGADO"',$this->PVNL_DEVENGADO);
		$criteria->compare('"PVNL_DESCUENTOS"',$this->PVNL_DESCUENTOS);
		$criteria->compare('"PVNL_TOTALGRAL"',$this->PVNL_TOTALGRAL);
		
		
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
	 $sql='SELECT pvnl."PVNL_ID", pvnl."PVNL_CODIGO", pvnl."PVNL_DIAS", pvnl."PVNL_PUNTOS", pvnl."PVNL_SUELDO", pvnl."PVNL_SALARIO", pvnl."PVNL_PRIMAANTIGUEDAD", pvnl."PVNL_TRANSPORTE",
	              pvnl."PVNL_ALIMENTACION", pvnl."PVNL_PRIMATECNICA", pvnl."PVNL_GASTOSRP", pvnl."PVNL_BONIFICACION", pvnl."PVNL_SEMESTRAL", 
				  pvnl."PVNO_ID", pvnl."EMPL_ID",  
                  SUM(pvnl."PVNL_SALARIO"+pvnl."PVNL_PRIMAANTIGUEDAD"+pvnl."PVNL_TRANSPORTE"+pvnl."PVNL_ALIMENTACION"+pvnl."PVNL_PRIMATECNICA"
					  +pvnl."PVNL_GASTOSRP"+pvnl."PVNL_BONIFICACION"+pvnl."PVNL_SEMESTRAL"
					  ) AS "PVNL_DEVENGADO"
		   FROM "TBL_NOMPRIMAVACACIONESNOMINALIQUIDACIONES" "pvnl"
		   INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINA" "pvn" ON pvnl."PVNO_ID" = pvn."PVNO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON pvnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY pvnl."PVNL_ID", p."PEGE_ID",  pvn."PVNO_ID"
           ORDER BY pvn."PVNO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS" ASC
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
	 $string='SELECT COUNT("PVNL_ID") AS "PVNL_ID", COUNT("PVNL_CODIGO") AS "PVNL_CODIGO", SUM("PVNL_DIAS") AS "PVNL_DIAS", SUM("PVNL_PUNTOS") AS "PVNL_PUNTOS", 
	                 SUM("PVNL_SUELDO") AS "PVNL_SUELDO", SUM("PVNL_SALARIO") AS "PVNL_SALARIO", SUM("PVNL_PRIMAANTIGUEDAD") AS "PVNL_PRIMAANTIGUEDAD",
                     SUM("PVNL_TRANSPORTE") AS "PVNL_TRANSPORTE", SUM("PVNL_ALIMENTACION") AS "PVNL_ALIMENTACION", 
					 SUM("PVNL_PRIMATECNICA") AS "PVNL_PRIMATECNICA", SUM("PVNL_GASTOSRP") AS "PVNL_GASTOSRP", SUM("PVNL_BONIFICACION") AS "PVNL_BONIFICACION", 
                     SUM("PVNL_SEMESTRAL") AS "PVNL_SEMESTRAL", COUNT("PVNO_ID") AS "PVNO_ID", 
					 COUNT("EMPL_ID") AS "EMPL_ID", SUM("PVNL_DEVENGADO") AS "PVNL_DEVENGADO"
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
	 
	 $sql='SELECT pvnl."PVNL_ID", pvnl."PVNL_RETEFUENTE"
		   FROM "TBL_NOMPRIMAVACACIONESNOMINALIQUIDACIONES" "pvnl"
		   INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINA" "pvn" ON pvnl."PVNO_ID" = pvn."PVNO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON pvnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY pvnl."PVNL_ID", p."PEGE_ID",  pvn."PVNO_ID"
           ORDER BY pvn."PVNO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS" ASC
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
	 $string='SELECT COUNT("PVNL_ID") AS "PVNL_ID", SUM("PVNL_RETEFUENTE") AS "PVNL_RETEFUENTE"
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
	 $string1='SELECT  pvnl."PVNL_ID", pvnd."DEPR_ID", pvnd."PVND_VALOR", pvn."PVNO_ID"
	           FROM  "TBL_NOMPRIMAVACACIONESNOMINADESCUENTOS" "pvnd"
		       INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINALIQUIDACIONES" "pvnl" ON pvnl."PVNL_ID" = pvnd."PVNL_ID"
			   INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINA" "pvn" ON pvnl."PVNO_ID" = pvn."PVNO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON pvnl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE '.$parametros.'
               GROUP BY pvn."PVNO_ID", pvnl."PVNL_ID", pvnd."PVND_ID", p."PEGE_ID"
               ORDER BY pvnd."DEPR_ID", pvn."PVNO_ID", p."PEGE_PRIMERAPELLIDO", pvnl."PVNL_ID" ASC';
		   
     $rows1 = $connection->createCommand($string1)->queryAll();
	 
	 $string2='SELECT  pvnl."PVNL_ID", pvn."PVNO_ID"
	           FROM  "TBL_NOMPRIMAVACACIONESNOMINADESCUENTOS" "pvnd"
		       INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINALIQUIDACIONES" "pvnl" ON pvnl."PVNL_ID" = pvnd."PVNL_ID"
			   INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINA" "pvn" ON pvnl."PVNO_ID" = pvn."PVNO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON pvnl."EMPL_ID" = ep."EMPL_ID" 
			   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	           WHERE '.$parametros.'
			   GROUP BY pvn."PVNO_ID", pvnl."PVNL_ID", p."PEGE_ID"
               ORDER BY pvn."PVNO_ID", p."PEGE_PRIMERAPELLIDO", pvnl."PVNL_ID" ASC
               ';
		   
     $rows2 = $connection->createCommand($string2)->queryAll();
	 $cont=1;	 
	 foreach ($rows2 as $values) {	     	 
	    $this->descuentos[$cont][0] = $values["PVNL_ID"];
		$filas[$cont]=$values["PVNO_ID"];
        $cont++;		
     }
	 $this->descuentos[$cont][0] = "Total";
	 $string3='SELECT dp."DEPR_DESCRIPCION"
               FROM "TBL_NOMDESCUENTOSPRESTACIONES" dp
               WHERE dp."TIPR_ID" = 3 AND dp."DEPR_ID" IN
               (
               SELECT  pvnd."DEPR_ID"
	           FROM  "TBL_NOMPRIMAVACACIONESNOMINADESCUENTOS" "pvnd"
		       INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINALIQUIDACIONES" "pvnl" ON pvnl."PVNL_ID" = pvnd."PVNL_ID"
			   INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINA" "pvn" ON pvnl."PVNO_ID" = pvn."PVNO_ID"
               INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON pvnl."EMPL_ID" = ep."EMPL_ID" 
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
		   FROM "TBL_NOMPRIMAVACACIONESNOMINALIQUIDACIONES" "pvnl"
		   INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINA" "pvn" ON pvnl."PVNO_ID" = pvn."PVNO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON pvnl."EMPL_ID" = ep."EMPL_ID"
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
	 $sql=' SELECT pvnl."PVNL_ID", pvnl."PVNL_CODIGO",  p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
			dp."DEPR_DESCRIPCION", pvnd."PVND_VALOR"
			FROM "TBL_NOMPRIMAVACACIONESNOMINADESCUENTOS" "pvnd" 
			INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINALIQUIDACIONES" "pvnl" ON pvnl."PVNL_ID" = pvnd."PVNL_ID"
			INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINA" "pvn" ON pvnl."PVNO_ID" = pvn."PVNO_ID" 
			INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON pvnl."EMPL_ID" = ep."EMPL_ID" 
			INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
			INNER JOIN "TBL_NOMDESCUENTOSPRESTACIONES" "dp" ON dp."DEPR_ID" = pvnd."DEPR_ID"
			WHERE '.$parametros.' AND pvnd."PVND_VALOR"!=0
			GROUP BY p."PEGE_ID",  pvnd."PVND_ID", pvnl."PVNL_ID", dp."DEPR_ID"
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
             'PVNL_ID', 'PVNL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','DEPR_DESCRIPCION','PVND_VALOR',
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
	 $sql='SELECT pvnl."PVNL_ID", pvnl."PVNL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
     pvnl."PVNL_RETEFUENTE"

	 FROM "TBL_NOMPRIMAVACACIONESNOMINALIQUIDACIONES" "pvnl" 
	   INNER JOIN "TBL_NOMPRIMAVACACIONESNOMINA" "pvn" ON pvnl."PVNO_ID" = pvn."PVNO_ID" 
	   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON pvnl."EMPL_ID" = ep."EMPL_ID" 
	   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
	   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
	   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	   WHERE '.$parametros.' AND nnl."NANL_RETEFUENTE"!=0
	   GROUP BY pvnl."PVNL_ID", p."PEGE_ID", pvn."PVNO_ID"
	   ORDER BY pvn."PVNO_ID", p."PEGE_PRIMERAPELLIDO" ASC
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
             'PVNL_ID', 'PVNL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','PVNL_RETEFUENTE',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      )
	 );	
	}
}