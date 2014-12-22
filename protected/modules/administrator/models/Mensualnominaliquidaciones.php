<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMMENSUALNOMINALIQUIDACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMMENSUALNOMINALIQUIDACIONES':
 * @Propiedad string $MENL_ID
 * @Propiedad integer $MENL_CODIGO
 * @Propiedad integer $MENL_DIAS
 * @Propiedad string $MENL_PUNTOS
 * @Propiedad integer $MENL_SALARIO
 * @Propiedad integer $MENL_PRIMAANTIGUEDAD
 * @Propiedad integer $MENL_TRANSPORTE
 * @Propiedad integer $MENL_ALIMENTACION
 * @Propiedad integer $MENL_HED
 * @Propiedad integer $MENL_HEDTOTAL
 * @Propiedad integer $MENL_HEN
 * @Propiedad integer $MENL_HENTOTAL
 * @Propiedad integer $MENL_HEDF
 * @Propiedad integer $MENL_HEDFTOTAL
 * @Propiedad integer $MENL_HENF
 * @Propiedad integer $MENL_HENFTOTAL
 * @Propiedad integer $MENL_DYF
 * @Propiedad integer $MENL_DYFTOTAL
 * @Propiedad integer $MENL_REN
 * @Propiedad integer $MENL_RENTOTAL
 * @Propiedad integer $MENL_RENDYF
 * @Propiedad integer $MENL_RENDYFTOTAL
 * @Propiedad integer $MENL_PRIMATECNICA
 * @Propiedad integer $MENL_GASTOSRP
 * @Propiedad integer $MENL_BONIFICACION
 * @Propiedad integer $MENL_PRIMAVACACIONES
 * @Propiedad integer $MENO_ID
 * @Propiedad integer $EMPL_ID
 * @Propiedad string $MENL_FECHACAMBIO
 * @Propiedad integer $MENL_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad MENSUALNOMINA $mENO
 * @Propiedad EMPLEOSPLANTA $eMPL
 * @Propiedad MENSUALNOMINAPARAFISCALES[] $mENSUALNOMINAPARAFISCALESs
 * @Propiedad MENSUALNOMINADESCUENTOS[] $mENSUALNOMINADESCUENTOSes
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
		return 'TBL_NOMMENSUALNOMINALIQUIDACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('MENL_CODIGO, MENL_DIAS, MENL_PUNTOS, MENL_SALARIO, MENL_PRIMAANTIGUEDAD, MENL_TRANSPORTE, MENL_ALIMENTACION, MENL_HED, MENL_HEDTOTAL, MENL_HEN, MENL_HENTOTAL, MENL_HEDF, MENL_HEDFTOTAL, MENL_HENF, MENL_HENFTOTAL, MENL_DYF, MENL_DYFTOTAL, MENL_REN, MENL_RENTOTAL, MENL_RENDYF, MENL_RENDYFTOTAL, MENL_PRIMATECNICA, MENL_GASTOSRP, MENL_BONIFICACION, MENL_PRIMAVACACIONES, MENO_ID, EMPL_ID, MENL_FECHACAMBIO, MENL_REGISTRADOPOR', 'required'),
			array('MENL_CODIGO, MENL_DIAS, MENL_PRIMAANTIGUEDAD, MENL_TRANSPORTE, MENL_ALIMENTACION, MENL_HED, MENL_HEDTOTAL, MENL_HEN, MENL_HENTOTAL, MENL_HEDF, MENL_HEDFTOTAL, MENL_HENF, MENL_HENFTOTAL, MENL_DYF, MENL_DYFTOTAL, MENL_REN, MENL_RENTOTAL, MENL_RENDYF, MENL_RENDYFTOTAL, MENL_PRIMATECNICA, MENL_GASTOSRP, MENL_BONIFICACION, MENL_PRIMAVACACIONES, MENO_ID, EMPL_ID, MENL_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('MENL_ID, MENL_CODIGO, MENL_DIAS, MENL_PUNTOS, MENL_SALARIO, MENL_PRIMAANTIGUEDAD, MENL_TRANSPORTE, 
			       MENL_ALIMENTACION, MENL_HED, MENL_HEDTOTAL, MENL_HEN, MENL_HENTOTAL, MENL_HEDF, MENL_HEDFTOTAL, MENL_HENF, 
				   MENL_HENFTOTAL, MENL_DYF, MENL_DYFTOTAL, MENL_REN, MENL_RENTOTAL, MENL_RENDYF, MENL_RENDYFTOTAL, MENL_PRIMATECNICA, 
				   MENL_GASTOSRP, MENL_BONIFICACION, MENL_PRIMAVACACIONES, MENO_ID, EMPL_ID, MENL_FECHACAMBIO, MENL_REGISTRADOPOR,
				   PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'search'),
			
			array('MENL_ID, MENL_CODIGO, MENL_DIAS, MENL_PUNTOS, MENL_SALARIO, MENL_PRIMAANTIGUEDAD, MENL_TRANSPORTE, 
			       MENL_ALIMENTACION, MENL_HED, MENL_HEDTOTAL, MENL_HEN, MENL_HENTOTAL, MENL_HEDF, MENL_HEDFTOTAL, MENL_HENF, 
				   MENL_HENFTOTAL, MENL_DYF, MENL_DYFTOTAL, MENL_REN, MENL_RENTOTAL, MENL_RENDYF, MENL_RENDYFTOTAL, MENL_PRIMATECNICA, 
				   MENL_GASTOSRP, MENL_BONIFICACION, MENL_PRIMAVACACIONES, MENO_ID, EMPL_ID, MENL_FECHACAMBIO, MENL_REGISTRADOPOR,
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
			'mENO' => array(self::BELONGS_TO, 'MENSUALNOMINA', 'MENO_ID'),
			'eMPL' => array(self::BELONGS_TO, 'EMPLEOSPLANTA', 'EMPL_ID'),
			'mENSUALNOMINAPARAFISCALESs' => array(self::HAS_MANY, 'MENSUALNOMINAPARAFISCALES', 'MENL_ID'),
			'mENSUALNOMINADESCUENTOSes' => array(self::HAS_MANY, 'MENSUALNOMINADESCUENTOS', 'MENL_ID'),
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
						'MENL_DIAS' => 'DIAS',
						'MENL_PUNTOS' => 'PUNTOS',
						'MENL_SALARIO' => 'SALARIO',
						'MENL_PRIMAANTIGUEDAD' => 'ANTIG',
						'MENL_TRANSPORTE' => 'S.T',
						'MENL_ALIMENTACION' => 'S.A',
						'MENL_HED' => 'HED',
						'MENL_HEDTOTAL' => 'HEDTOTAL',
						'MENL_HEN' => 'HEN',
						'MENL_HENTOTAL' => 'HENTOTAL',
						'MENL_HEDF' => 'HEDF',
						'MENL_HEDFTOTAL' => 'HEDFTOTAL',
						'MENL_HENF' => 'HENF',
						'MENL_HENFTOTAL' => 'HENFTOTAL',
						'MENL_DYF' => 'DYF',
						'MENL_DYFTOTAL' => 'DYFTOTAL',
						'MENL_REN' => 'REN',
						'MENL_RENTOTAL' => 'RENTOTAL',
						'MENL_RENDYF' => 'RENDYF',
						'MENL_RENDYFTOTAL' => 'RENDYFTOTAL',
						'MENL_PRIMATECNICA' => 'P.T',
						'MENL_GASTOSRP' => 'GASTOS',
						'MENL_BONIFICACION' => 'B.S.P',
						'MENL_PRIMAVACACIONES' => 'P.V',
						'MENO_ID' => 'MENO',
						'EMPL_ID' => 'EMPL',
						'MENL_FECHACAMBIO' => 'MENL FECHACAMBIO',
						'MENL_REGISTRADOPOR' => 'MENL REGISTRADOPOR',
						'MENL_DEVENGADO' => 'DEVENG.(+)',
						'MENL_PARAFISCALES' => 'PARAF. (-)',
						'MENL_DESCUENTOS' => 'DEDUCC.(-)',
						'MENL_TOTALGRAL' => 'NETO',
						
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
		
		$criteria->compare('MENL_ID',$this->MENL_ID,true);
		$criteria->compare('MENL_CODIGO',$this->MENL_CODIGO);
		$criteria->compare('MENL_DIAS',$this->MENL_DIAS);
		$criteria->compare('MENL_PUNTOS',$this->MENL_PUNTOS,true);
		$criteria->compare('MENL_SALARIO',$this->MENL_SALARIO);
		$criteria->compare('MENL_PRIMAANTIGUEDAD',$this->MENL_PRIMAANTIGUEDAD);
		$criteria->compare('MENL_TRANSPORTE',$this->MENL_TRANSPORTE);
		$criteria->compare('MENL_ALIMENTACION',$this->MENL_ALIMENTACION);
		$criteria->compare('MENL_HED',$this->MENL_HED);
		$criteria->compare('MENL_HEDTOTAL',$this->MENL_HEDTOTAL);
		$criteria->compare('MENL_HEN',$this->MENL_HEN);
		$criteria->compare('MENL_HENTOTAL',$this->MENL_HENTOTAL);
		$criteria->compare('MENL_HEDF',$this->MENL_HEDF);
		$criteria->compare('MENL_HEDFTOTAL',$this->MENL_HEDFTOTAL);
		$criteria->compare('MENL_HENF',$this->MENL_HENF);
		$criteria->compare('MENL_HENFTOTAL',$this->MENL_HENFTOTAL);
		$criteria->compare('MENL_DYF',$this->MENL_DYF);
		$criteria->compare('MENL_DYFTOTAL',$this->MENL_DYFTOTAL);
		$criteria->compare('MENL_REN',$this->MENL_REN);
		$criteria->compare('MENL_RENTOTAL',$this->MENL_RENTOTAL);
		$criteria->compare('MENL_RENDYF',$this->MENL_RENDYF);
		$criteria->compare('MENL_RENDYFTOTAL',$this->MENL_RENDYFTOTAL);
		$criteria->compare('MENL_PRIMATECNICA',$this->MENL_PRIMATECNICA);
		$criteria->compare('MENL_GASTOSRP',$this->MENL_GASTOSRP);
		$criteria->compare('MENL_BONIFICACION',$this->MENL_BONIFICACION);
		$criteria->compare('MENL_PRIMAVACACIONES',$this->MENL_PRIMAVACACIONES);
		$criteria->compare('"MENO_ID"',$this->MENO_ID);
		$criteria->compare('"EMPL_ID"',$this->EMPL_ID);
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
			
			'MENL_DIAS'=>array(
				'asc'=>'t."MENL_DIAS"',
				'desc'=>'t."MENL_DIAS" desc',
			),
			
			'MENL_PUNTOS'=>array(
				'asc'=>'t."MENL_PUNTOS"',
				'desc'=>'t."MENL_PUNTOS" desc',
			),
			
			'MENL_SALARIO'=>array(
				'asc'=>'t."MENL_SALARIO"',
				'desc'=>'t."MENL_SALARIO" desc',
			),
			
			'MENL_DEVENGADO'=>array(
				'asc'=>'(t."MENL_SALARIO"+t."MENL_PRIMAANTIGUEDAD"+t."MENL_TRANSPORTE"+t."MENL_ALIMENTACION"+t."MENL_HEDTOTAL"+t."MENL_HENTOTAL"
							+t."MENL_HEDFTOTAL"+t."MENL_HENFTOTAL"+t."MENL_DYFTOTAL"+t."MENL_RENTOTAL"+t."MENL_RENDYFTOTAL"+t."MENL_PRIMATECNICA"
							+t."MENL_GASTOSRP"+t."MENL_BONIFICACION"+t."MENL_PRIMAVACACIONES")',
				'desc'=>'(t."MENL_SALARIO"+t."MENL_PRIMAANTIGUEDAD"+t."MENL_TRANSPORTE"+t."MENL_ALIMENTACION"+t."MENL_HEDTOTAL"+t."MENL_HENTOTAL"
							+t."MENL_HEDFTOTAL"+t."MENL_HENFTOTAL"+t."MENL_DYFTOTAL"+t."MENL_RENTOTAL"+t."MENL_RENDYFTOTAL"+t."MENL_PRIMATECNICA"
							+t."MENL_GASTOSRP"+t."MENL_BONIFICACION"+t."MENL_PRIMAVACACIONES") DESC',
			),
			
			'MENL_PARAFISCALES'=>array(
				'asc'=>'(SELECT SUM("MENP_SALUDTOTAL"+"MENP_PENSIONTOTAL"+"MENP_SINDICATOTOTAL"+"MENP_FONDOSP"+"MENP_SUBSISTENCIA"
							 +"MENP_ESTAMPILLA"+"MENP_RETEFUENTETOTAL") 
							 FROM "TBL_NOMMENSUALNOMINAPARAFISCALES" mnp 
							 WHERE mnp."MENL_ID" = t."MENL_ID"
							 )',
				'desc'=>'(SELECT SUM("MENP_SALUDTOTAL"+"MENP_PENSIONTOTAL"+"MENP_SINDICATOTOTAL"+"MENP_FONDOSP"+"MENP_SUBSISTENCIA"
							 +"MENP_ESTAMPILLA"+"MENP_RETEFUENTETOTAL") 
							 FROM "TBL_NOMMENSUALNOMINAPARAFISCALES" mnp 
							 WHERE mnp."MENL_ID" = t."MENL_ID"
							 ) DESC',
			),
			
			'MENL_DESCUENTOS'=>array(
				'asc'=>'(SELECT SUM("MEND_VALOR") 
							 FROM "TBL_NOMMENSUALNOMINADESCUENTOS" mnd 
							 WHERE mnd."MENL_ID" = t."MENL_ID"
							 )',
				'desc'=>'(SELECT SUM("MEND_VALOR") 
							 FROM "TBL_NOMMENSUALNOMINADESCUENTOS" mnd 
							 WHERE mnd."MENL_ID" = t."MENL_ID"
							 ) DESC',
			),
			
			'MENL_TOTALGRAL'=>array(
				'asc'=>'((t."MENL_SALARIO"+t."MENL_PRIMAANTIGUEDAD"+t."MENL_TRANSPORTE"+t."MENL_ALIMENTACION"+t."MENL_HEDTOTAL"+t."MENL_HENTOTAL"
							+t."MENL_HEDFTOTAL"+t."MENL_HENFTOTAL"+t."MENL_DYFTOTAL"+t."MENL_RENTOTAL"+t."MENL_RENDYFTOTAL"+t."MENL_PRIMATECNICA"
							+t."MENL_GASTOSRP"+t."MENL_BONIFICACION"+t."MENL_PRIMAVACACIONES")-((SELECT SUM("MENP_SALUDTOTAL"+"MENP_PENSIONTOTAL"+"MENP_SINDICATOTOTAL"+"MENP_FONDOSP"+"MENP_SUBSISTENCIA"
							 +"MENP_ESTAMPILLA"+"MENP_RETEFUENTETOTAL") 
							 FROM "TBL_NOMMENSUALNOMINAPARAFISCALES" mnp 
							 WHERE mnp."MENL_ID" = t."MENL_ID"
							 )+(SELECT SUM("MEND_VALOR") 
							 FROM "TBL_NOMMENSUALNOMINADESCUENTOS" mnd 
							 WHERE mnd."MENL_ID" = t."MENL_ID"
							 )))',
				'desc'=>'((t."MENL_SALARIO"+t."MENL_PRIMAANTIGUEDAD"+t."MENL_TRANSPORTE"+t."MENL_ALIMENTACION"+t."MENL_HEDTOTAL"+t."MENL_HENTOTAL"
							+t."MENL_HEDFTOTAL"+t."MENL_HENFTOTAL"+t."MENL_DYFTOTAL"+t."MENL_RENTOTAL"+t."MENL_RENDYFTOTAL"+t."MENL_PRIMATECNICA"
							+t."MENL_GASTOSRP"+t."MENL_BONIFICACION"+t."MENL_PRIMAVACACIONES")-((SELECT SUM("MENP_SALUDTOTAL"+"MENP_PENSIONTOTAL"+"MENP_SINDICATOTOTAL"+"MENP_FONDOSP"+"MENP_SUBSISTENCIA"
							 +"MENP_ESTAMPILLA"+"MENP_RETEFUENTETOTAL") 
							 FROM "TBL_NOMMENSUALNOMINAPARAFISCALES" mnp 
							 WHERE mnp."MENL_ID" = t."MENL_ID"
							 )+(SELECT SUM("MEND_VALOR") 
							 FROM "TBL_NOMMENSUALNOMINADESCUENTOS" mnd 
							 WHERE mnd."MENL_ID" = t."MENL_ID"
							 ))) desc',
			),
        );

		$criteria=new CDbCriteria;
		$criteria->select = 'p.*, ep.*, t.*,
		                    SUM(t."MENL_SALARIO"+t."MENL_PRIMAANTIGUEDAD"+t."MENL_TRANSPORTE"+t."MENL_ALIMENTACION"+t."MENL_HEDTOTAL"+t."MENL_HENTOTAL"
							+t."MENL_HEDFTOTAL"+t."MENL_HENFTOTAL"+t."MENL_DYFTOTAL"+t."MENL_RENTOTAL"+t."MENL_RENDYFTOTAL"+t."MENL_PRIMATECNICA"
							+t."MENL_GASTOSRP"+t."MENL_BONIFICACION"+t."MENL_PRIMAVACACIONES") AS "MENL_DEVENGADO",
							
							(SELECT SUM("MENP_SALUDTOTAL"+"MENP_PENSIONTOTAL"+"MENP_SINDICATOTOTAL"+"MENP_FONDOSP"+"MENP_SUBSISTENCIA"
							 +"MENP_ESTAMPILLA"+"MENP_RETEFUENTETOTAL") 
							 FROM "TBL_NOMMENSUALNOMINAPARAFISCALES" mnp 
							 WHERE mnp."MENL_ID" = t."MENL_ID"
							 ) AS "MENL_PARAFISCALES",
							 
							(SELECT SUM("MEND_VALOR") 
							 FROM "TBL_NOMMENSUALNOMINADESCUENTOS" mnd 
							 WHERE mnd."MENL_ID" = t."MENL_ID"
							 ) AS "MENL_DESCUENTOS"							
							';
		$criteria->join = '
		                   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON t."EMPL_ID" = ep."EMPL_ID"
		                   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"';
        $criteria->group = 'ep."EMPL_ID", p."PEGE_ID", t."MENL_ID"';

		$criteria->compare('"MENL_ID"',$this->MENL_ID,true);
		$criteria->compare('"MENL_CODIGO"',$this->MENL_CODIGO);
		$criteria->compare('"MENL_DIAS"',$this->MENL_DIAS);
		$criteria->compare('"MENL_PUNTOS"',$this->MENL_PUNTOS,true);
		$criteria->compare('"MENL_SALARIO"',$this->MENL_SALARIO);
		$criteria->compare('"MENL_PRIMAANTIGUEDAD"',$this->MENL_PRIMAANTIGUEDAD);
		$criteria->compare('"MENL_TRANSPORTE"',$this->MENL_TRANSPORTE);
		$criteria->compare('"MENL_ALIMENTACION"',$this->MENL_ALIMENTACION);
		$criteria->compare('"MENL_HED"',$this->MENL_HED);
		$criteria->compare('"MENL_HEDTOTAL"',$this->MENL_HEDTOTAL);
		$criteria->compare('"MENL_HEN"',$this->MENL_HEN);
		$criteria->compare('"MENL_HENTOTAL"',$this->MENL_HENTOTAL);
		$criteria->compare('"MENL_HEDF"',$this->MENL_HEDF);
		$criteria->compare('"MENL_HEDFTOTAL"',$this->MENL_HEDFTOTAL);
		$criteria->compare('"MENL_HENF"',$this->MENL_HENF);
		$criteria->compare('"MENL_HENFTOTAL"',$this->MENL_HENFTOTAL);
		$criteria->compare('"MENL_DYF"',$this->MENL_DYF);
		$criteria->compare('"MENL_DYFTOTAL"',$this->MENL_DYFTOTAL);
		$criteria->compare('"MENL_REN"',$this->MENL_REN);
		$criteria->compare('"MENL_RENTOTAL"',$this->MENL_RENTOTAL);
		$criteria->compare('"MENL_RENDYF"',$this->MENL_RENDYF);
		$criteria->compare('"MENL_RENDYFTOTAL"',$this->MENL_RENDYFTOTAL);
		$criteria->compare('"MENL_PRIMATECNICA"',$this->MENL_PRIMATECNICA);
		$criteria->compare('"MENL_GASTOSRP"',$this->MENL_GASTOSRP);
		$criteria->compare('"MENL_BONIFICACION"',$this->MENL_BONIFICACION);
		$criteria->compare('"MENL_PRIMAVACACIONES"',$this->MENL_PRIMAVACACIONES);
		$criteria->compare('"MENO_ID"',$this->MENO_ID);
		$criteria->compare('"EMPL_ID"',$this->EMPL_ID);
		$criteria->compare('"MENL_FECHACAMBIO"',$this->MENL_FECHACAMBIO,true);
		$criteria->compare('"MENL_REGISTRADOPOR"',$this->MENL_REGISTRADOPOR);
		
		$criteria->compare('"MENL_DEVENGADO"',$this->MENL_DEVENGADO);
		$criteria->compare('"MENL_PARAFISCALES"',$this->MENL_PARAFISCALES);
		$criteria->compare('"MENL_DESCUENTOS"',$this->MENL_DESCUENTOS);
		$criteria->compare('"MENL_TOTALGRAL"',$this->MENL_TOTALGRAL);
		
		
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
	 
	 $connection = Yii::app()->db;
	 $this->liquidacion = NULL; $this->parafiscales = NULL;
	 //echo "<br><br><br>".
	 $sql='SELECT mnl."MENL_ID", mnl."MENL_CODIGO", mnl."MENL_DIAS", mnl."MENL_PUNTOS", mnl."MENL_SALARIO", mnl."MENL_PRIMAANTIGUEDAD", mnl."MENL_TRANSPORTE",
                  mnl."MENL_ALIMENTACION", mnl."MENL_HED", mnl."MENL_HEDTOTAL", mnl."MENL_HEN", mnl."MENL_HENTOTAL", mnl."MENL_HEDF", mnl."MENL_HEDFTOTAL", 
                  mnl."MENL_HENF", mnl."MENL_HENFTOTAL", mnl."MENL_DYF", mnl."MENL_DYFTOTAL", mnl."MENL_REN", mnl."MENL_RENTOTAL", mnl."MENL_RENDYF", 
                  mnl."MENL_RENDYFTOTAL", mnl."MENL_PRIMATECNICA", mnl."MENL_GASTOSRP", mnl."MENL_BONIFICACION", mnl."MENL_PRIMAVACACIONES", 
                  mnl."MENO_ID", mnl."EMPL_ID", 
                  SUM(mnl."MENL_SALARIO"+mnl."MENL_PRIMAANTIGUEDAD"+mnl."MENL_TRANSPORTE"+mnl."MENL_ALIMENTACION"+mnl."MENL_HEDTOTAL"+mnl."MENL_HENTOTAL" +
                      mnl."MENL_HEDFTOTAL"+mnl."MENL_HENFTOTAL"+mnl."MENL_DYFTOTAL"+mnl."MENL_RENTOTAL"+mnl."MENL_RENDYFTOTAL"+mnl."MENL_PRIMATECNICA" +
                      mnl."MENL_GASTOSRP"+mnl."MENL_BONIFICACION"+mnl."MENL_PRIMAVACACIONES"
		             ) AS "MENL_DEVENGADO"
		   FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl"
		   INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		   WHERE '.$parametros.'
		   GROUP BY mnl."MENL_ID", p."PEGE_ID",  mn."MENO_ID"
           ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC, mnl."MENL_ID" DESC
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll(); 
	 
	 $array = array('ID LIQUIDACION','CODIGO','DIAS','PUNTOS','SALARIO','PRIMA ATIGUEDAD','SUBSIDIO TRANSPORTE','SUBSIDIO ALIMENTACION','N.H.E.D',
	               'H.E.D','N.H.E.N','H.E.N','N.H.E.D.F','H.E.D.F','N.H.E.N.F','H.E.N.F','N. DOMINGO','DOMINGOS','N.RECARGO NOCT',
			       'RECARGO NOCT','N. REC DOMINGOS','REC DOMINGOS','PRIMA TECNICA','GASTOS REPRESENTACION','BON. DE SERVICIOS',
				   'PRIMA DE VACACIONES','ID NOMINA','ID EMPLEO','TOTAL DEVENGADO');
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
	 
	 $string='SELECT COUNT("MENL_ID") AS "MENL_ID", COUNT("MENL_CODIGO") AS "MENL_CODIGO", SUM("MENL_DIAS") AS "MENL_DIAS", SUM("MENL_PUNTOS") AS "MENL_PUNTOS", 
	                 SUM("MENL_SALARIO") AS "MENL_SALARIO", SUM("MENL_PRIMAANTIGUEDAD") AS "MENL_PRIMAANTIGUEDAD",
                     SUM("MENL_TRANSPORTE") AS "MENL_TRANSPORTE", SUM("MENL_ALIMENTACION") AS "MENL_ALIMENTACION", SUM("MENL_HED") AS "MENL_HED", 
					 SUM("MENL_HEDTOTAL") "MENL_HEDTOTAL", SUM("MENL_HEN") AS "MENL_HEN", SUM("MENL_HENTOTAL") AS "MENL_HENTOTAL", SUM("MENL_HEDF") AS "MENL_HEDF",
                     SUM("MENL_HEDFTOTAL") AS "MENL_HEDFTOTAL", SUM("MENL_HENF") AS "MENL_HENF", SUM("MENL_HENFTOTAL") AS "MENL_HENFTOTAL", 
					 SUM("MENL_DYF") AS "MENL_DYF", SUM("MENL_DYFTOTAL") AS "MENL_DYFTOTAL", SUM("MENL_REN") AS "MENL_REN", SUM("MENL_RENTOTAL") AS "MENL_RENTOTAL",
                     SUM("MENL_RENDYF") AS "MENL_RENDYF", SUM("MENL_RENDYFTOTAL") AS "MENL_RENDYFTOTAL", SUM("MENL_PRIMATECNICA") AS "MENL_PRIMATECNICA", 
					 SUM("MENL_GASTOSRP") AS "MENL_GASTOSRP", SUM("MENL_BONIFICACION") AS "MENL_BONIFICACION", 
                     SUM("MENL_PRIMAVACACIONES") AS "MENL_PRIMAVACACIONES", COUNT("MENO_ID") AS "MENO_ID", COUNT("EMPL_ID") AS "EMPL_ID", 
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
	 $sql='SELECT mnp.*,	 
	      SUM(mnp."MENP_SALUDTOTAL"+mnp."MENP_PENSIONTOTAL"+mnp."MENP_SINDICATOTOTAL"+mnp."MENP_FONDOSP"+mnp."MENP_SUBSISTENCIA"
		      +mnp."MENP_ESTAMPILLA"+mnp."MENP_RETEFUENTETOTAL") AS "TOTAL_PARAFISCALES"
		  FROM "TBL_NOMMENSUALNOMINAPARAFISCALES" "mnp"
		  INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON mnp."MENL_ID" = mnl."MENL_ID"	
		  INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mn."MENO_ID" = mnl."MENO_ID"
		  INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"
		  INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		  INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"
		  INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
		  WHERE '.$parametros.'
		  GROUP BY mn."MENO_ID", p."PEGE_ID", mnp."MENP_ID", mnl."MENL_ID" 
          ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE"ASC, mnl."MENL_ID" DESC
		  ';    		  
     $rows = $connection->createCommand($sql)->queryAll();
	 
     $array = array('ID PARAFISCAL','IDSALUD','SALUD','IDPENSION','PENSION','IDSINDICATO','SINDICATO','FONDO SOL PENSIONAL','SUBSISTENCIA',
	               'ESTAMPILLA','RETEFUENTE', 'ID LIQUIDACION','FECHA LIQUIDADO','USUARIO','TOTAL PARAFISCAL');
				   
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
	 
	 $string='SELECT COUNT("MENP_ID") AS "MENP_ID", COUNT("SALU_ID") AS "SALU_ID", SUM("MENP_SALUDTOTAL") AS "MENP_SALUDTOTAL", COUNT("PENS_ID") AS "PENS_ID", 
                     SUM("MENP_PENSIONTOTAL") AS "MENP_PENSIONTOTAL", COUNT("SIND_ID") AS "SIND_ID", 
                     SUM("MENP_SINDICATOTOTAL") AS "MENP_SINDICATOTOTAL", SUM("MENP_FONDOSP") AS "MENP_FONDOSP", SUM("MENP_SUBSISTENCIA") AS "MENP_SUBSISTENCIA", 
                     SUM("MENP_ESTAMPILLA") AS "MENP_ESTAMPILLA", 
                     SUM("MENP_RETEFUENTETOTAL") AS "MENP_RETEFUENTETOTAL", COUNT("MENL_ID") AS "MENL_ID", COUNT("MENP_FECHACAMBIO") AS "MENP_FECHACAMBIO", 
                     COUNT("MENP_REGISTRADOPOR") AS "MENP_REGISTRADOPOR", SUM("TOTAL_PARAFISCALES") AS "TOTAL_PARAFISCALES"
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
	 //echo "<br><br><br>".
	 $string1='SELECT  mnl."MENL_ID", mnd."DEME_ID", mnd."MEND_VALOR", mn."MENO_ID"
	           FROM  "TBL_NOMMENSUALNOMINADESCUENTOS" "mnd"
		             INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON mnl."MENL_ID" = mnd."MENL_ID"
				     INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID"
                     INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID" 
				     INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
				     INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
				     INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
		       WHERE '.$parametros.'
               GROUP BY mn."MENO_ID", mnl."MENL_ID", mnd."MEND_ID", p."PEGE_ID"
               ORDER BY mnd."DEME_ID", mn."MENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC, mnl."MENL_ID" DESC';
		   
     $rows1 = $connection->createCommand($string1)->queryAll();
	 
	 $string2='SELECT  mnl."MENL_ID", mn."MENO_ID"
	           FROM  "TBL_NOMMENSUALNOMINADESCUENTOS" "mnd"
					 INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON mnl."MENL_ID" = mnd."MENL_ID"
					 INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
					 INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID" 
					 INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
					 INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
					 INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
			   WHERE '.$parametros.'
			   GROUP BY mn."MENO_ID", mnl."MENL_ID",  p."PEGE_ID"
               ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC, mnl."MENL_ID" DESC
               ';
		   
     $rows2 = $connection->createCommand($string2)->queryAll();
	 $cont=1;	 
	 foreach ($rows2 as $values) {	     	 
	    $this->descuentos[$cont][0] = $values["MENL_ID"];
		$filas[$cont]=$values["MENO_ID"];
        $cont++;		
     }
	 $this->descuentos[$cont][0] = "Total";
	 $string3='SELECT d."DEME_DESCRIPCION"
               FROM "TBL_NOMDESCUENTOSMENSUALES" d
               WHERE d."DEME_ID" IN
               (
               SELECT  mnd."DEME_ID"
               FROM  "TBL_NOMMENSUALNOMINADESCUENTOS" "mnd"
			          INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON mnl."MENL_ID" = mnd."MENL_ID"
			          INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
			          INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID" 
			          INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
			          INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
			          INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID" 
               WHERE '.$parametros.'
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
	 $sql='SELECT  u.*
	           FROM  "TBL_NOMMENSUALNOMINADESCUENTOS" "mnd"
		             INNER JOIN "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" ON mnl."MENL_ID" = mnd."MENL_ID"
				     INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID"
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
	
	public function getReporteSalud($parametros)
	{
	 $connection = Yii::app()->db;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT mnl."MENL_ID", mnl."MENL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
     s."SALU_NOMBRE", SUM(mnl."MENL_SALARIO"+mnl."MENL_PRIMAANTIGUEDAD"+mnl."MENL_HEDTOTAL"+mnl."MENL_HENTOTAL"+ 
     mnl."MENL_HEDFTOTAL"+mnl."MENL_HENFTOTAL"+mnl."MENL_DYFTOTAL"+mnl."MENL_RENTOTAL"+mnl."MENL_RENDYFTOTAL"+mnl."MENL_PRIMATECNICA" + 
     mnl."MENL_GASTOSRP") AS "MENL_IBC", mnp."MENP_SALUDTOTAL"

	 FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" 
	   INNER JOIN "TBL_NOMMENSUALNOMINAPARAFISCALES" "mnp" ON mnl."MENL_ID" = mnp."MENL_ID"
	   INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
	   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID" 
	   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
	   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
	   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	   INNER JOIN "TBL_NOMSALUD" "s" ON p."SALU_ID" = s."SALU_ID" 
	   WHERE '.$parametros.'
	   GROUP BY mnl."MENL_ID", mnp."MENP_ID", p."PEGE_ID", mn."MENO_ID", s."SALU_ID"
	   ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO" ASC
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
	 $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();
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
      )
	 );	
	 
	}
	
	public function getReportePension($parametros)
	{
	 $connection = Yii::app()->db;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT mnl."MENL_ID", mnl."MENL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
     ps."PENS_NOMBRE", SUM(mnl."MENL_SALARIO"+mnl."MENL_PRIMAANTIGUEDAD"+mnl."MENL_HEDTOTAL"+mnl."MENL_HENTOTAL"+ 
     mnl."MENL_HEDFTOTAL"+mnl."MENL_HENFTOTAL"+mnl."MENL_DYFTOTAL"+mnl."MENL_RENTOTAL"+mnl."MENL_RENDYFTOTAL"+mnl."MENL_PRIMATECNICA" + 
     mnl."MENL_GASTOSRP") AS "MENL_IBC", mnp."MENP_PENSIONTOTAL"

	 FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" 
	   INNER JOIN "TBL_NOMMENSUALNOMINAPARAFISCALES" "mnp" ON mnl."MENL_ID" = mnp."MENL_ID"
	   INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
	   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID" 
	   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
	   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
	   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	   INNER JOIN "TBL_NOMPENSION" "ps" ON p."PENS_ID" = ps."PENS_ID" 
	   WHERE '.$parametros.'
	   GROUP BY mnl."MENL_ID", mnp."MENP_ID", p."PEGE_ID", mn."MENO_ID", ps."PENS_ID"
	   ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO" ASC
		  ';  
     
	 // armando arreglo para impresiones//
	 
     $query = $connection->createCommand($sql)->queryAll();
	 $this->prestaciones = NULL;
	 $array = array('ID LIQUIDACION','CODIGO','No CEDULA','1er APELLIDO', '2do APELLIDO', '1er NOMBRE', '2do NOMBRE','AFP','I.B.C','TOT EMPLEADO','TOT PATRONO','TOT APORTE');
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
		 $total3 = $total3+$this->getPensionPatronal($value);		 
		 $this->prestaciones[$j][10] = $this->getPensionPatronal($value);
	     $total4 = $total4+ $this->getPensionAporteTotal($value);
		 $this->prestaciones[$j][11] = $this->getPensionAporteTotal($value);
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
             'MENL_ID', 'MENL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','PENS_NOMBRE','MENL_IBC','MENP_PENSIONTOTAL',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      )
	 );	
	 
	}
	
	public function getReporteSindicato($parametros)
	{
	 $connection = Yii::app()->db;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT mnl."MENL_ID", mnl."MENL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
     sd."SIND_NOMBRE", mnp."MENP_SINDICATOTOTAL"

	 FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" 
	   INNER JOIN "TBL_NOMMENSUALNOMINAPARAFISCALES" "mnp" ON mnl."MENL_ID" = mnp."MENL_ID"
	   INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
	   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID" 
	   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
	   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
	   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	   INNER JOIN "TBL_NOMSINDICATOS" "sd" ON p."SIND_ID" = sd."SIND_ID" 
	   WHERE '.$parametros.'
	   GROUP BY mnl."MENL_ID", mnp."MENP_ID", p."PEGE_ID", mn."MENO_ID", sd."SIND_ID"
	   ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO" ASC
		  ';  
     
	 // armando arreglo para impresiones//
	 
     $query = $connection->createCommand($sql)->queryAll();
	 $this->prestaciones = NULL;
	 $array = array('ID LIQUIDACION','CODIGO','No CEDULA','1er APELLIDO', '2do APELLIDO', '1er NOMBRE', '2do NOMBRE','SINDICATO','APORTE');
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
             'MENL_ID', 'MENL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','SIND_NOMBRE','MENP_SINDICATOTOTAL',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      )
	 );	
	 
	}
	
	public function getReporteDescuento($parametros)
	{
	 $connection = Yii::app()->db;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT mnl."MENL_ID", mnl."MENL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
     dm."DEME_DESCRIPCION", mnd."MEND_VALOR"

	 FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" 
	   INNER JOIN "TBL_NOMMENSUALNOMINADESCUENTOS" "mnd" ON mnl."MENL_ID" = mnd."MENL_ID"
	   INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
	   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID" 
	   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
	   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
	   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	   INNER JOIN "TBL_NOMDESCUENTOSMENSUALES" "dm" ON mnd."DEME_ID" = dm."DEME_ID" 
	   WHERE '.$parametros.' AND mnd."MEND_VALOR"!=0
	   GROUP BY mnl."MENL_ID", mnd."MEND_ID", p."PEGE_ID", mn."MENO_ID", dm."DEME_ID"
	   ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC
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
	 $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();
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
      )
	 );	
	 
	}
	
	public function getReporteRetefuente($parametros)
	{
	 $connection = Yii::app()->db;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT mnl."MENL_ID", mnl."MENL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
     mnp."MENP_RETEFUENTETOTAL"

	 FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" 
	   INNER JOIN "TBL_NOMMENSUALNOMINAPARAFISCALES" "mnp" ON mnl."MENL_ID" = mnp."MENL_ID"
	   INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
	   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID" 
	   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
	   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
	   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	   WHERE '.$parametros.' AND mnp."MENP_RETEFUENTETOTAL"!=0
	   GROUP BY mnl."MENL_ID", mnp."MENP_ID", p."PEGE_ID", mn."MENO_ID"
	   ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO" ASC
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
             'MENL_ID', 'MENL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','MENP_RETEFUENTETOTAL',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      )
	 );	
	}
	
	public function getReporteEstampilla($parametros)
	{
	 $connection = Yii::app()->db;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT mnl."MENL_ID", mnl."MENL_CODIGO", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",
     mnp."MENP_ESTAMPILLA"

	 FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl" 
	   INNER JOIN "TBL_NOMMENSUALNOMINAPARAFISCALES" "mnp" ON mnl."MENL_ID" = mnp."MENL_ID"
	   INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID" 
	   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID" 
	   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID" 
	   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID" 
	   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
	   WHERE '.$parametros.' AND mnp."MENP_ESTAMPILLA"!=0
	   GROUP BY mnl."MENL_ID", mnp."MENP_ID", p."PEGE_ID", mn."MENO_ID"
	   ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO" ASC
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
             'MENL_ID', 'MENL_CODIGO', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','MENP_ESTAMPILLA',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      )
	 );	
	}

    public function sendEmail($mensualNomina,$personaGeneral,$body){
	    		
		Yii::import('application.extensions.mail.');
		$phpExcelPath = Yii::getPathOfAlias('ext.mail');
        include($phpExcelPath . DIRECTORY_SEPARATOR . 'class.phpmailer.php');
		include($phpExcelPath . DIRECTORY_SEPARATOR . 'class.smtp.php');
		
		$Personasgenerales=Personasgenerales::model()->findByPk($personaGeneral);
		$mail = new PHPMailer();
		$mail->Host = 'localhost';
		$mail->Port = 465;
		//$mail->Host = 'ssl://smtp.gmail.com:465';
		
		$mail->Username = "th@uniguajira.edu.co";
		$mail->Password = "talento";
		$mail->SMTPAuth = true;
		$mail->From = "th@uniguajira.edu.co";
		$mail->FromName = "Universidad de la Guajira - Direccion de Talento Humano";
		$mail->Subject = "INFORME DE ESTADOS DE CUENTAS";
		$mail->Subject = "Nomina electronica Uniguajira No ".$mensualNomina.'. Empleado:'.number_format($Personasgenerales->PEGE_IDENTIFICACION);
					
		$mail->AddAddress($Personasgenerales->PEGE_EMAIL," TALENTO HUMANO ");
		$mail -> IsHTML (true);
		$mail->Timeout=10;
		$mail->Body = $body;
        $send = $mail->Send();		
		if($send){
         Yii::app()->user->setFlash('success','Notificación enviada al correo del contratante...');
		 return $send;
		}else{
			  Yii::app()->user->setFlash('error','No se ha podido enviar notificación al correo del contratante...');
			  return $send;
			 }
	}
	
	public function getReporteibc($codigo,$parametros)
	{
	 $Mensualnomina = new Mensualnomina;
	 $connection = Yii::app()->db;
	 $anionomina = substr($codigo,0,4);  $mesnomina = substr($codigo,4,-2);
     $periodo = substr($codigo,0,-2);
 
     if(($periodo == $anionomina."12") or ($periodo == $anionomina."01")){
      $string='SELECT mnl."MENL_ID", mnl."EMPL_ID", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE", 
                  SUM(round(mnl."MENL_SALARIO"/30*mnl."MENL_DIAS")+round(mnl."MENL_PRIMAANTIGUEDAD"/30*mnl."MENL_DIAS")+round(mnl."MENL_HEDTOTAL"/30*mnl."MENL_DIAS")+
                      round(mnl."MENL_HENTOTAL"/30*mnl."MENL_DIAS")+round(mnl."MENL_HEDFTOTAL"/30*mnl."MENL_DIAS")+round(mnl."MENL_HENFTOTAL"/30*mnl."MENL_DIAS")+
                      round(mnl."MENL_DYFTOTAL"/30*mnl."MENL_DIAS")+round(mnl."MENL_RENTOTAL"/30*mnl."MENL_DIAS")+round(mnl."MENL_RENDYFTOTAL"/30*mnl."MENL_DIAS")+
                      round(mnl."MENL_PRIMATECNICA"/30*mnl."MENL_DIAS")+round(mnl."MENL_GASTOSRP"/30*mnl."MENL_DIAS")
		             ) AS "MENL_IBC", s."SALU_NOMBRE", pen."PENS_NOMBRE"
		   FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl"
		   INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
		   INNER JOIN "TBL_NOMSALUD" "s" ON s."SALU_ID" = p."SALU_ID" 
		   INNER JOIN "TBL_NOMPENSION" "pen" ON pen."PENS_ID" = p."PENS_ID"  
		   WHERE '.$parametros.'
		   GROUP BY mnl."MENL_ID", p."PEGE_ID",  mn."MENO_ID", s."SALU_ID", pen."PENS_ID"
           ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC
	      ';
	  $queryS = $connection->createCommand($string)->queryAll();
      foreach ($queryS as $querySt) {	
	   $Mensualnomina->cargarEmpleoPlanta($querySt['EMPL_ID']);
	   
	   
	   $anioEntrada = (date("Y", strtotime($Mensualnomina->Empleoplanta->EMPL_FECHAINGRESO))); 
	   $mesEntrada = (date("m", strtotime($Mensualnomina->Empleoplanta->EMPL_FECHAINGRESO)));
	   $entrada =$anioEntrada.$mesEntrada; 
	   if($periodo==$entrada){
	   $sql='SELECT mnl."MENL_ID", mnl."EMPL_ID", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE", 
                  SUM(mnl."MENL_SALARIO"+mnl."MENL_PRIMAANTIGUEDAD"+mnl."MENL_HEDTOTAL"+mnl."MENL_HENTOTAL" +
                      mnl."MENL_HEDFTOTAL"+mnl."MENL_HENFTOTAL"+mnl."MENL_DYFTOTAL"+mnl."MENL_RENTOTAL"+mnl."MENL_RENDYFTOTAL"+mnl."MENL_PRIMATECNICA" +
                      mnl."MENL_GASTOSRP"
		             ) AS "MENL_IBC", s."SALU_NOMBRE", pen."PENS_NOMBRE"
		   FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl"
		   INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
		   INNER JOIN "TBL_NOMSALUD" "s" ON s."SALU_ID" = p."SALU_ID" 
		   INNER JOIN "TBL_NOMPENSION" "pen" ON pen."PENS_ID" = p."PENS_ID"  
		   WHERE '.$parametros.'
		   GROUP BY mnl."MENL_ID", p."PEGE_ID",  mn."MENO_ID", s."SALU_ID", pen."PENS_ID"
           ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC
		  '; 
	   
	  }else{
	        $sql='SELECT mnl."MENL_ID", mnl."EMPL_ID", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE", 
                  SUM(round(mnl."MENL_SALARIO"/mnl."MENL_DIAS"*30)+round(mnl."MENL_PRIMAANTIGUEDAD"/mnl."MENL_DIAS"*30)+round(mnl."MENL_HEDTOTAL"/mnl."MENL_DIAS"*30)+
                      round(mnl."MENL_HENTOTAL"/mnl."MENL_DIAS"*30)+round(mnl."MENL_HEDFTOTAL"/mnl."MENL_DIAS"*30)+round(mnl."MENL_HENFTOTAL"/mnl."MENL_DIAS"*30)+
                      round(mnl."MENL_DYFTOTAL"/mnl."MENL_DIAS"*30)+round(mnl."MENL_RENTOTAL"/mnl."MENL_DIAS"*30)+round(mnl."MENL_RENDYFTOTAL"/mnl."MENL_DIAS"*30)+
                      round(mnl."MENL_PRIMATECNICA"/mnl."MENL_DIAS"*30)+round(mnl."MENL_GASTOSRP"/mnl."MENL_DIAS"*30)
		             ) AS "MENL_IBC", s."SALU_NOMBRE", pen."PENS_NOMBRE"
		   FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl"
		   INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
		   INNER JOIN "TBL_NOMSALUD" "s" ON s."SALU_ID" = p."SALU_ID" 
		   INNER JOIN "TBL_NOMPENSION" "pen" ON pen."PENS_ID" = p."PENS_ID"  
		   WHERE '.$parametros.'
		   GROUP BY mnl."MENL_ID", p."PEGE_ID",  mn."MENO_ID", s."SALU_ID", pen."PENS_ID"
           ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC
		  ';
		   
		   }	  
	  }	  
		  
	 }else{	      
           //echo "<br><br><br>".
	       $sql='SELECT mnl."MENL_ID", mnl."EMPL_ID", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE", 
                  SUM(mnl."MENL_SALARIO"+mnl."MENL_PRIMAANTIGUEDAD"+mnl."MENL_HEDTOTAL"+mnl."MENL_HENTOTAL" +
                      mnl."MENL_HEDFTOTAL"+mnl."MENL_HENFTOTAL"+mnl."MENL_DYFTOTAL"+mnl."MENL_RENTOTAL"+mnl."MENL_RENDYFTOTAL"+mnl."MENL_PRIMATECNICA" +
                      mnl."MENL_GASTOSRP"
		             ) AS "MENL_IBC", s."SALU_NOMBRE", pen."PENS_NOMBRE"
		   FROM "TBL_NOMMENSUALNOMINALIQUIDACIONES" "mnl"
		   INNER JOIN "TBL_NOMMENSUALNOMINA" "mn" ON mnl."MENO_ID" = mn."MENO_ID"
		   INNER JOIN "TBL_NOMEMPLEOSPLANTA" "ep" ON mnl."EMPL_ID" = ep."EMPL_ID"
		   INNER JOIN "TBL_NOMUNIDADES" "u" ON ep."UNID_ID" = u."UNID_ID"
		   INNER JOIN "TBL_NOMTIPOSCARGOS" "tc" ON ep."TICA_ID" = tc."TICA_ID"		  
		   INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON ep."PEGE_ID" = p."PEGE_ID"
		   INNER JOIN "TBL_NOMSALUD" "s" ON s."SALU_ID" = p."SALU_ID" 
		   INNER JOIN "TBL_NOMPENSION" "pen" ON pen."PENS_ID" = p."PENS_ID"  
		   WHERE '.$parametros.'
		   GROUP BY mnl."MENL_ID", p."PEGE_ID",  mn."MENO_ID", s."SALU_ID", pen."PENS_ID"
           ORDER BY mn."MENO_ID", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC
		  '; 
		  
		  
		  }
	  
     
	 // armando arreglo para impresiones//
	 
     $query = $connection->createCommand($sql)->queryAll();
	 $this->prestaciones = NULL;
	 $array = array('ID LIQUIDACION','EMPLEO','No CEDULA','1er APELLIDO', '2do APELLIDO', '1er NOMBRE', '2do NOMBRE','I.B.C','SALUD','PENSION');
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
	   if($i==1){
	    $total1 = $total1+$value; 
	    $this->prestaciones[$j][1] = $value;
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
             'MENL_ID', 'EMPL_ID', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','MENL_IBC','SALU_NOMBRE','PENS_NOMBRE',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      )
	 );	
	 
	}

 	
}