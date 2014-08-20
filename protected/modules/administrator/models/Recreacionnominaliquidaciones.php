<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMRECREACIONNOMINALIQUIDACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMRECREACIONNOMINALIQUIDACIONES':
 * @Propiedad string $RENL_ID
 * @Propiedad integer $RENL_CODIGO
 * @Propiedad integer $RENL_DIAS
 * @Propiedad string $RENL_PUNTOS
 * @Propiedad integer $RENL_SUELDO
 * @Propiedad integer $RENL_SALARIO
 * @Propiedad integer $RENL_RETEFUENTE
 * @Propiedad integer $RENO_ID
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $RENL_FECHACAMBIO
 * @Propiedad integer $RENL_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad EMPLEOSPLANTA $eMPL
 * @Propiedad RECREACIONNOMINA $rENO
 */
class Recreacionnominaliquidaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Recreacionnominaliquidacion la clase del modelo estàtico.
	 */
	public $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS;
    public $RENL_DEVENGADO, $RENL_DESCUENTOS, $RENL_TOTALGRAL;
    public $liquidacion, $parafiscales;
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
		return 'TBL_NOMRECREACIONNOMINALIQUIDACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('RENL_CODIGO, RENL_DIAS, RENL_PUNTOS, RENL_SUELDO, RENL_SALARIO, RENL_RETEFUENTE, RENO_ID, EMPL_ID, RENL_FECHACAMBIO, RENL_REGISTRADOPOR', 'required'),
			array('RENL_CODIGO, RENL_DIAS, RENL_SUELDO, RENL_SALARIO, RENL_RETEFUENTE, RENO_ID, EMPL_ID, RENL_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('RENL_ID, RENL_CODIGO, RENL_DIAS, RENL_PUNTOS, RENL_SUELDO, RENL_SALARIO, RENL_RETEFUENTE, RENO_ID, EMPL_ID, 
			RENL_FECHACAMBIO, RENL_REGISTRADOPOR,
			PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'search'),
			
			array('RENL_ID, RENL_CODIGO, RENL_DIAS, RENL_PUNTOS, RENL_SUELDO, RENL_SALARIO, RENL_RETEFUENTE, RENO_ID, EMPL_ID, 
			RENL_FECHACAMBIO, RENL_REGISTRADOPOR,
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
			'rENO' => array(self::BELONGS_TO, 'RECREACIONNOMINA', 'RENO_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'RENL_ID' => 'ID',
						'RENL_CODIGO' => 'CODIGO',
						'RENL_DIAS' => 'DIAS',
						'RENL_PUNTOS' => 'PUNTOS',
						'RENL_SUELDO' => 'SUELDO',
						'RENL_SALARIO' => 'SALARIO',
						'RENO_ID' => 'RENO',
						'EMPL_ID' => 'EMPL',
						'RENL_FECHACAMBIO' => 'RENL FECHACAMBIO',
						'RENL_REGISTRADOPOR' => 'RENL REGISTRADOPOR',
						
						'RENL_DEVENGADO' => 'DEVENG.(+)',
						'RENL_RETEFUENTE' => 'RETEFUENTE (-)',
						'RENL_TOTALGRAL' => 'NETO',
						
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

		$criteria->compare('RENL_ID',$this->RENL_ID,true);
		$criteria->compare('RENL_CODIGO',$this->RENL_CODIGO);
		$criteria->compare('RENL_DIAS',$this->RENL_DIAS);
		$criteria->compare('RENL_PUNTOS',$this->RENL_PUNTOS,true);
		$criteria->compare('RENL_SUELDO',$this->RENL_SUELDO);
		$criteria->compare('RENL_SALARIO',$this->RENL_SALARIO);
		$criteria->compare('RENL_RETEFUENTE',$this->RENL_RETEFUENTE);
		$criteria->compare('RENO_ID',$this->RENO_ID);
		$criteria->compare('EMPL_ID',$this->EMPL_ID);
		$criteria->compare('RENL_FECHACAMBIO',$this->RENL_FECHACAMBIO,true);
		$criteria->compare('RENL_REGISTRADOPOR',$this->RENL_REGISTRADOPOR);

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
			
			'RENL_DIAS'=>array(
				'asc'=>'t."RENL_DIAS"',
				'desc'=>'t."RENL_DIAS" desc',
			),
			
			'RENL_PUNTOS'=>array(
				'asc'=>'t."RENL_PUNTOS"',
				'desc'=>'t."RENL_PUNTOS" desc',
			),
			
			'RENL_SALARIO'=>array(
				'asc'=>'t."RENL_SALARIO"',
				'desc'=>'t."RENL_SALARIO" desc',
			),
			
			'RENL_DEVENGADO'=>array(
				'asc'=>'(t."RENL_SALARIO")',
				'desc'=>'(t."RENL_SALARIO") DESC',
			),
			
			'RENL_RETEFUENTE'=>array(
				'asc'=>'t."RENL_RETEFUENTE"',
				'desc'=>'t."RENL_RETEFUENTE" desc',
			),
			
			'RENL_TOTALGRAL'=>array(
				'asc'=>'((t."RENL_SALARIO")-((
							t."RENL_RETEFUENTE"
							 )))',
							 
				'desc'=>'((t."RENL_SALARIO")-((
							t."RENL_RETEFUENTE"
							 ))) desc',
			),
        );

		$criteria=new CDbCriteria;
		
		$criteria->select = 'p.*, ep.*, t.*,
		                    SUM(t."RENL_SALARIO") AS "RENL_DEVENGADO",							 
							 t."RENL_RETEFUENTE"						
							';
		$criteria->join = '
		                   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON t."EMPL_ID" = ep."EMPL_ID"
		                   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"';
        $criteria->group = 'ep."EMPL_ID", p."PEGE_ID", t."RENL_ID"';

		$criteria->compare('"RENL_ID"',$this->RENL_ID,true);
		$criteria->compare('"RENL_CODIGO"',$this->RENL_CODIGO);
		$criteria->compare('"RENL_DIAS"',$this->RENL_DIAS);
		$criteria->compare('"RENL_PUNTOS"',$this->RENL_PUNTOS,true);
		$criteria->compare('"RENL_SUELDO"',$this->RENL_SUELDO);
		$criteria->compare('"RENL_SALARIO"',$this->RENL_SALARIO);
		$criteria->compare('"RENL_RETEFUENTE"',$this->RENL_RETEFUENTE);
		$criteria->compare('"RENO_ID"',$this->RENO_ID);
		$criteria->compare('"EMPL_ID"',$this->EMPL_ID);
		$criteria->compare('"RENL_FECHACAMBIO"',$this->RENL_FECHACAMBIO,true);
		$criteria->compare('"RENL_REGISTRADOPOR"',$this->RENL_REGISTRADOPOR);

		$criteria->compare('"RENL_DEVENGADO"',$this->RENL_DEVENGADO);
		$criteria->compare('"RENL_TOTALGRAL"',$this->RENL_TOTALGRAL);
		
		
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
	 $sql='SELECT rnl."RENL_ID", rnl."RENL_CODIGO", rnl."RENL_DIAS", rnl."RENL_PUNTOS", rnl."RENL_SUELDO", rnl."RENL_SALARIO",
				 rnl."RENO_ID", rnl."EMPL_ID",  
                  SUM(rnl."RENL_SALARIO") AS "RENL_DEVENGADO"
		   FROM "TBL_NOMRECREACIONNOMINALIQUIDACIONES" "rnl"
		   INNER JOIN "TBL_NOMRECREACIONNOMINA" "rn" ON rnl."RENO_ID" = rn."RENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON rnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"   
		   WHERE '.$parametros.'
		   GROUP BY rnl."RENL_ID", p."PEGE_ID", rnl."RENO_ID"
           ORDER BY rnl."RENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS" ASC
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll(); 
	 
	 $array = array('ID LIQUIDACION','CODIGO','DIAS','PUNTOS','SUELDO','SALARIO','ID NOMINA','ID EMPLEO','TOTAL DEVENGADO');
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
	 $string='SELECT COUNT("RENL_ID") AS "RENL_ID", COUNT("RENL_CODIGO") AS "RENL_CODIGO", SUM("RENL_DIAS") AS "RENL_DIAS", SUM("RENL_PUNTOS") AS "RENL_PUNTOS", 
	                 SUM("RENL_SUELDO") AS "RENL_SUELDO", SUM("RENL_SALARIO") AS "RENL_SALARIO", COUNT("RENO_ID") AS "RENO_ID", 
					 COUNT("EMPL_ID") AS "EMPL_ID", SUM("RENL_DEVENGADO") AS "RENL_DEVENGADO"
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
	 
	 $sql='SELECT rnl."RENL_ID", rnl."RENL_RETEFUENTE"
		   FROM "TBL_NOMRECREACIONNOMINALIQUIDACIONES" "rnl"
		   INNER JOIN "TBL_NOMRECREACIONNOMINA" "rn" ON rnl."RENO_ID" = rn."RENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON rnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY rnl."RENL_ID", p."PEGE_ID",  rn."RENO_ID"
           ORDER BY rn."RENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS" ASC
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
	 $string='SELECT COUNT("RENL_ID") AS "RENL_ID", SUM("RENL_RETEFUENTE") AS "RENL_RETEFUENTE"
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
		   FROM "TBL_NOMRECREACIONNOMINALIQUIDACIONES" "rnl"
		   INNER JOIN "TBL_NOMRECREACIONNOMINA" "rn" ON rnl."RENO_ID" = rn."RENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON rnl."EMPL_ID" = ep."EMPL_ID"
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