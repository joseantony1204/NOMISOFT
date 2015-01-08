<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMCESANTIASNOMINALIQUIDACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMCESANTIASNOMINALIQUIDACIONES':
 * @Propiedad string $CENL_ID
 * @Propiedad integer $CENL_CODIGO
 * @Propiedad integer $CENL_DIAS
 * @Propiedad string $CENL_PUNTOS
 * @Propiedad integer $CENL_SUELDO
 * @Propiedad integer $CENL_SALARIO
 * @Propiedad integer $CENL_PRIMAANTIGUEDAD
 * @Propiedad integer $CENL_TRANSPORTE
 * @Propiedad integer $CENL_ALIMENTACION
 * @Propiedad integer $CENL_PRIMATECNICA
 * @Propiedad integer $CENL_GASTOSRP
 * @Propiedad integer $CENL_BONIFICACION
 * @Propiedad integer $CENL_HORASEXTRAS
 * @Propiedad integer $CENL_SEMESTRAL
 * @Propiedad integer $CENL_PRIMAVACACIONES
 * @Propiedad integer $CENL_PRIMANAVIDAD
 * @Propiedad integer $CENO_ID
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $CENL_FECHACAMBIO
 * @Propiedad integer $CENL_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad EMPLEOSPLANTA $eMPL
 * @Propiedad CESANTIASNOMINA $cENO
 */
class Cesantiasnominaliquidaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Cesantiasnominaliquidaciones la clase del modelo estàtico.
	 */
	public $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS;
    public $CENL_DEVENGADO, $CENL_TOTALGRAL;
    public $liquidacion;
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
		return 'TBL_NOMCESANTIASNOMINALIQUIDACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('CENL_CODIGO, CENL_DIAS, CENL_PUNTOS, CENL_SUELDO, CENL_SALARIO, CENL_PRIMAANTIGUEDAD, CENL_TRANSPORTE, CENL_ALIMENTACION, CENL_PRIMATECNICA, CENL_GASTOSRP, CENL_BONIFICACION, CENL_HORASEXTRAS, CENL_SEMESTRAL, CENL_PRIMAVACACIONES, CENL_PRIMANAVIDAD, CENO_ID, EMPL_ID, CENL_FECHACAMBIO, CENL_REGISTRADOPOR', 'required'),
			array('CENL_CODIGO, CENL_DIAS, CENL_SUELDO, CENL_SALARIO, CENL_PRIMAANTIGUEDAD, CENL_TRANSPORTE, CENL_ALIMENTACION, CENL_PRIMATECNICA, CENL_GASTOSRP, CENL_BONIFICACION, CENL_HORASEXTRAS, CENL_SEMESTRAL, CENL_PRIMAVACACIONES, CENL_PRIMANAVIDAD, CENO_ID, EMPL_ID, CENL_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('CENL_ID, CENL_CODIGO, CENL_DIAS, CENL_PUNTOS, CENL_SUELDO, CENL_SALARIO, CENL_PRIMAANTIGUEDAD, CENL_TRANSPORTE, 
			CENL_ALIMENTACION, CENL_PRIMATECNICA, CENL_GASTOSRP, CENL_BONIFICACION, CENL_HORASEXTRAS, CENL_SEMESTRAL, CENL_PRIMAVACACIONES, 
			CENL_PRIMANAVIDAD, CENO_ID, EMPL_ID, CENL_FECHACAMBIO, CENL_REGISTRADOPOR,
			PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'search'),
			
			array('CENL_ID, CENL_CODIGO, CENL_DIAS, CENL_PUNTOS, CENL_SUELDO, CENL_SALARIO, CENL_PRIMAANTIGUEDAD, CENL_TRANSPORTE, 
			CENL_ALIMENTACION, CENL_PRIMATECNICA, CENL_GASTOSRP, CENL_BONIFICACION, CENL_HORASEXTRAS, CENL_SEMESTRAL, CENL_PRIMAVACACIONES, 
			CENL_PRIMANAVIDAD, CENO_ID, EMPL_ID, CENL_FECHACAMBIO, CENL_REGISTRADOPOR,
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
			'cENO' => array(self::BELONGS_TO, 'CESANTIASNOMINA', 'CENO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'CENL_ID' => 'ID',
						'CENL_CODIGO' => 'CODIGO',
						'CENL_DIAS' => 'DIAS',
						'CENL_PUNTOS' => 'PUNTOS',
						'CENL_SUELDO' => 'SUELDO',
						'CENL_SALARIO' => 'SALARIO',
						'CENL_PRIMAANTIGUEDAD' => 'PRIMA ANTIGUEDAD',
						'CENL_TRANSPORTE' => 'TRANSPORTE',
						'CENL_ALIMENTACION' => 'ALIMENTACION',
						'CENL_PRIMATECNICA' => 'PRIMA TECNICA',
						'CENL_GASTOSRP' => 'GASTOS REPRESENTACION',
						'CENL_BONIFICACION' => '1/12 BONIFICACION',
						'CENL_HORASEXTRAS' => 'HRS EXTRAS',
						'CENL_SEMESTRAL' => '1/12 SEMESTRAL',
						'CENL_PRIMAVACACIONES' => '1/12 PRIMA VACACIONES',
						'CENL_PRIMANAVIDAD' => '1/12 PRIMA NAVIDAD',
						'CENO_ID' => 'CENO',
						'EMPL_ID' => 'EMPL',
						'CENL_FECHACAMBIO' => 'CENL FECHACAMBIO',
						'CENL_REGISTRADOPOR' => 'CENL REGISTRADOPOR',
						
						'CENL_DEVENGADO' => 'DEVENG.(+)',
						'CENL_TOTALGRAL' => 'NETO',
						
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

		$criteria->compare('CENL_ID',$this->CENL_ID,true);
		$criteria->compare('CENL_CODIGO',$this->CENL_CODIGO);
		$criteria->compare('CENL_DIAS',$this->CENL_DIAS);
		$criteria->compare('CENL_PUNTOS',$this->CENL_PUNTOS,true);
		$criteria->compare('CENL_SUELDO',$this->CENL_SUELDO);
		$criteria->compare('CENL_SALARIO',$this->CENL_SALARIO);
		$criteria->compare('CENL_PRIMAANTIGUEDAD',$this->CENL_PRIMAANTIGUEDAD);
		$criteria->compare('CENL_TRANSPORTE',$this->CENL_TRANSPORTE);
		$criteria->compare('CENL_ALIMENTACION',$this->CENL_ALIMENTACION);
		$criteria->compare('CENL_PRIMATECNICA',$this->CENL_PRIMATECNICA);
		$criteria->compare('CENL_GASTOSRP',$this->CENL_GASTOSRP);
		$criteria->compare('CENL_BONIFICACION',$this->CENL_BONIFICACION);
		$criteria->compare('CENL_HORASEXTRAS',$this->CENL_HORASEXTRAS);
		$criteria->compare('CENL_SEMESTRAL',$this->CENL_SEMESTRAL);
		$criteria->compare('CENL_PRIMAVACACIONES',$this->CENL_PRIMAVACACIONES);
		$criteria->compare('CENL_PRIMANAVIDAD',$this->CENL_PRIMANAVIDAD);
		$criteria->compare('CENO_ID',$this->CENO_ID);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('CENL_FECHACAMBIO',$this->CENL_FECHACAMBIO,true);
		$criteria->compare('CENL_REGISTRADOPOR',$this->CENL_REGISTRADOPOR);

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
			
			'CENL_DIAS'=>array(
				'asc'=>'t."CENL_DIAS"',
				'desc'=>'t."CENL_DIAS" desc',
			),
			
			'CENL_PUNTOS'=>array(
				'asc'=>'t."CENL_PUNTOS"',
				'desc'=>'t."CENL_PUNTOS" desc',
			),
			
			'CENL_SALARIO'=>array(
				'asc'=>'t."CENL_SALARIO"',
				'desc'=>'t."CENL_SALARIO" desc',
			),
			
			'CENL_HORASEXTRAS'=>array(
				'asc'=>'t."CENL_HORASEXTRAS"',
				'desc'=>'t."CENL_HORASEXTRAS" desc',
			),
			
			'CENL_DEVENGADO'=>array(
				'asc'=>'(t."CENL_SALARIO"+t."CENL_PRIMAANTIGUEDAD"+t."CENL_TRANSPORTE"+t."CENL_ALIMENTACION"+t."CENL_PRIMATECNICA"+t."CENL_GASTOSRP"+
							t."CENL_BONIFICACION"+t."CENL_HORASEXTRAS"+t."CENL_SEMESTRAL"+t."CENL_PRIMAVACACIONES"+t."CENL_PRIMANAVIDAD"
							)',
				'desc'=>'(t."CENL_SALARIO"+t."CENL_PRIMAANTIGUEDAD"+t."CENL_TRANSPORTE"+t."CENL_ALIMENTACION"+t."CENL_PRIMATECNICA"+t."CENL_GASTOSRP"+
							t."CENL_BONIFICACION"+t."CENL_HORASEXTRAS"+t."CENL_SEMESTRAL"+t."CENL_PRIMAVACACIONES"+t."CENL_PRIMANAVIDAD"
							) DESC',
			),
						
			'CENL_TOTALGRAL'=>array(
				'asc'=>'(t."CENL_SALARIO"+t."CENL_PRIMAANTIGUEDAD"+t."CENL_TRANSPORTE"+t."CENL_ALIMENTACION"+t."CENL_PRIMATECNICA"+t."CENL_GASTOSRP"+
							t."CENL_BONIFICACION"+t."CENL_HORASEXTRAS"+t."CENL_SEMESTRAL"+t."CENL_PRIMAVACACIONES"+t."CENL_PRIMANAVIDAD"
							)',
							 
				'desc'=>'(t."CENL_SALARIO"+t."CENL_PRIMAANTIGUEDAD"+t."CENL_TRANSPORTE"+t."CENL_ALIMENTACION"+t."CENL_PRIMATECNICA"+t."CENL_GASTOSRP"+
							t."CENL_BONIFICACION"+t."CENL_HORASEXTRAS"+t."CENL_SEMESTRAL"+t."CENL_PRIMAVACACIONES"+t."CENL_PRIMANAVIDAD"
							) DESC',
			),
        );

		$criteria=new CDbCriteria;
		
		$criteria->select = 'p.*, ep.*, t.*,
		                    SUM(t."CENL_SALARIO"+t."CENL_PRIMAANTIGUEDAD"+t."CENL_TRANSPORTE"+t."CENL_ALIMENTACION"+t."CENL_PRIMATECNICA"+t."CENL_GASTOSRP"+
							t."CENL_BONIFICACION"+t."CENL_HORASEXTRAS"+t."CENL_SEMESTRAL"+t."CENL_PRIMAVACACIONES"+t."CENL_PRIMANAVIDAD"
							) AS "CENL_DEVENGADO"						
							';
		$criteria->join = '
		                   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON t."EMPL_ID" = ep."EMPL_ID"
		                   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"';
        $criteria->group = 'ep."EMPL_ID", p."PEGE_ID", t."CENL_ID"';

		$criteria->compare('"CENL_ID"',$this->CENL_ID,true);
		$criteria->compare('"CENL_CODIGO"',$this->CENL_CODIGO);
		$criteria->compare('"CENL_DIAS"',$this->CENL_DIAS);
		$criteria->compare('"CENL_PUNTOS"',$this->CENL_PUNTOS,true);
		$criteria->compare('"CENL_SUELDO"',$this->CENL_SUELDO);
		$criteria->compare('"CENL_SALARIO"',$this->CENL_SALARIO);
		$criteria->compare('"CENL_PRIMAANTIGUEDAD"',$this->CENL_PRIMAANTIGUEDAD);
		$criteria->compare('"CENL_TRANSPORTE"',$this->CENL_TRANSPORTE);
		$criteria->compare('"CENL_ALIMENTACION"',$this->CENL_ALIMENTACION);
		$criteria->compare('"CENL_PRIMATECNICA"',$this->CENL_PRIMATECNICA);
		$criteria->compare('"CENL_GASTOSRP"',$this->CENL_GASTOSRP);
		$criteria->compare('"CENL_BONIFICACION"',$this->CENL_BONIFICACION);
		$criteria->compare('"CENL_HORASEXTRAS"',$this->CENL_HORASEXTRAS);
		$criteria->compare('"CENL_SEMESTRAL"',$this->CENL_SEMESTRAL);
		$criteria->compare('"CENL_PRIMAVACACIONES',$this->CENL_PRIMAVACACIONES);
		$criteria->compare('"CENL_PRIMANAVIDAD"',$this->CENL_PRIMANAVIDAD);
		$criteria->compare('"CENO_ID"',$this->CENO_ID);
		$criteria->compare('"EMPL_ID"',$this->EMPL_ID);
		$criteria->compare('"CENL_FECHACAMBIO"',$this->CENL_FECHACAMBIO,true);
		$criteria->compare('"CENL_REGISTRADOPOR"',$this->CENL_REGISTRADOPOR);
		
		$criteria->compare('"CENL_DEVENGADO"',$this->CENL_DEVENGADO);
		$criteria->compare('"CENL_TOTALGRAL"',$this->CENL_TOTALGRAL);
		
		
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
	
	public function mostrarLiquidacion($parametros,$campo=NULL,$orden=NULL)
	{
	 $connection = Yii::app()->db;
	 $this->liquidacion = NULL;
     if($campo==NULL){
	 $st = ',';
	 }	 
	 //echo "<br><br><br>".
	 $sql='SELECT cnl."CENL_ID", cnl."CENL_CODIGO", cnl."CENL_DIAS", cnl."CENL_PUNTOS", cnl."CENL_SUELDO", cnl."CENL_SALARIO", cnl."CENL_PRIMAANTIGUEDAD",
				  cnl."CENL_TRANSPORTE", cnl."CENL_ALIMENTACION", cnl."CENL_PRIMATECNICA", cnl."CENL_GASTOSRP", cnl."CENL_BONIFICACION", 
				  cnl."CENL_HORASEXTRAS", cnl."CENL_SEMESTRAL", cnl."CENL_PRIMAVACACIONES", cnl."CENL_PRIMANAVIDAD",
				  cnl."CENO_ID", cnl."EMPL_ID",  
                  SUM(cnl."CENL_SALARIO"+cnl."CENL_PRIMAANTIGUEDAD"+cnl."CENL_TRANSPORTE"+cnl."CENL_ALIMENTACION"+cnl."CENL_PRIMATECNICA"+
				      cnl."CENL_GASTOSRP"+cnl."CENL_BONIFICACION"+cnl."CENL_HORASEXTRAS"+cnl."CENL_SEMESTRAL"+cnl."CENL_PRIMAVACACIONES"+
					  cnl."CENL_PRIMANAVIDAD") AS "CENL_DEVENGADO"
		   FROM "TBL_NOMCESANTIASNOMINALIQUIDACIONES" "cnl"
		   INNER JOIN "TBL_NOMCESANTIASNOMINA" "cn" ON cnl."CENO_ID" = cn."CENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON cnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"   
		   WHERE '.$parametros.'
		   GROUP BY cnl."CENL_ID", p."PEGE_ID", cn."CENO_ID" '.$campo.'
		   ORDER BY cn."CENO_ID" '.$st.' '.$campo.' '.$orden.' p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC, cnl."CENL_ID" DESC
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll(); 
	 
	 $array = array('ID LIQUIDACION','CODIGO','DIAS','PUNTOS','SUELDO','SALARIO','PRIMA ANTIGUEDAD','TRANSPORTE','ALIMENTACION','PRIMA TECNICA',
	                'GASTOS REPRESENTACION','1/12 BONIFICACION','1/12 HORAS EXTRAS','1/12 PRIMA SEMESTRAL','1/12 PRIMA VACACIONES',
					'1/12 PRIMA NAVIDAD','ID NOMINA','ID EMPLEO','TOTAL DEVENGADO');
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
	 $string='SELECT COUNT("CENL_ID") AS "CENL_ID", COUNT("CENL_CODIGO") AS "CENL_CODIGO", SUM("CENL_DIAS") AS "CENL_DIAS", SUM("CENL_PUNTOS") AS "CENL_PUNTOS", 
	                 SUM("CENL_SUELDO") AS "CENL_SUELDO", SUM("CENL_SALARIO") AS "CENL_SALARIO", SUM("CENL_PRIMAANTIGUEDAD") AS "CENL_PRIMAANTIGUEDAD",
                     SUM("CENL_TRANSPORTE") AS "CENL_TRANSPORTE", SUM("CENL_ALIMENTACION") AS "CENL_ALIMENTACION", 
					 SUM("CENL_PRIMATECNICA") AS "CENL_PRIMATECNICA", SUM("CENL_GASTOSRP") AS "CENL_GASTOSRP", SUM("CENL_BONIFICACION") AS "CENL_BONIFICACION", 
                     SUM("CENL_SEMESTRAL") AS "CENL_SEMESTRAL", SUM("CENL_PRIMAVACACIONES") AS "CENL_PRIMAVACACIONES", SUM("CENL_PRIMANAVIDAD") AS "CENL_PRIMANAVIDAD",
					 COUNT("CENO_ID") AS "CENO_ID",COUNT("EMPL_ID") AS "EMPL_ID", SUM("CENL_DEVENGADO") AS "CENL_DEVENGADO"
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
	}
	
	public function getDetalles()
	{
		$imageUrl = 'icon_search.png';
        return Yii::app()->baseurl.'/images/'.$imageUrl;		
	}
	
	public function getUnidadesEnNomina($parametros)
	{
	 $connection = Yii::app()->db;
	 $sql='SELECT u.*
		   FROM "TBL_NOMCESANTIASNOMINALIQUIDACIONES" "cnl"
		   INNER JOIN "TBL_NOMCESANTIASNOMINA" "cn" ON cnl."CENO_ID" = cn."CENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON cnl."EMPL_ID" = ep."EMPL_ID"
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
}