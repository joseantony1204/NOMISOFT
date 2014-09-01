<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMDESCUENTOSMENSUALES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMDESCUENTOSMENSUALES':
 * @Propiedad integer $DEME_ID
 * @Propiedad string $DEME_NOMBRE
 * @Propiedad string $DEME_DESCRIPCION
 * @Propiedad string $DEME_FECHACAMBIO
 * @Propiedad integer $DEME_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad NOVEDADESMENSUALES[] $nOVEDADESMENSUALESs
 */
class Descuentosmensuales extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Descuentosmensuales la clase del modelo estàtico.
	 */
	public $SUMATORIA, $AFILIADOS, $RESET, $PASS, $DOWNLOAD;
	public $deducciones;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMDESCUENTOSMENSUALES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('DEME_NOMBRE, DEME_DESCRIPCION, DEME_FECHACAMBIO, DEME_REGISTRADOPOR', 'required'),
			array('DEME_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('DEME_NOMBRE', 'length', 'max'=>30),
			array('DEME_DESCRIPCION', 'length', 'max'=>20),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('DEME_ID, DEME_NOMBRE, DEME_DESCRIPCION, DEME_FECHACAMBIO, DEME_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'nOVEDADESMENSUALESs' => array(self::HAS_MANY, 'NOVEDADESMENSUALES', 'DEME_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'DEME_ID' => 'ID',
						'DEME_NOMBRE' => 'DESCUENTO',
						'DEME_DESCRIPCION' => 'DESCRIPCION',
						'SUMATORIA' => 'VALOR TOTAL',
						'RESET' => 'REESTABLECER',
						'PASS' => 'CONTRASEÑA DE ADMINISTRADOR',
						'AFILIADOS' => 'EMPLEADOS',
						'DEME_FECHACAMBIO' => 'DEME FECHACAMBIO',
						'DEME_REGISTRADOPOR' => 'DEME REGISTRADOPOR',
						'DOWNLOAD' => '...',
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

		$sort = new CSort();
		$sort->attributes = array(
			'defaultOrder'=>'t."DEME_NOMBRE" ASC',
			
			'DEME_ID'=>array(
				'asc'=>'t."DEME_ID"',
				'desc'=>'t."DEME_ID" desc',
			),
			
			'DEME_NOMBRE'=>array(
				'asc'=>'t."DEME_NOMBRE"',
				'desc'=>'t."DEME_NOMBRE" desc',
			),
			
			'DEME_DESCRIPCION'=>array(
				'asc'=>'t."DEME_DESCRIPCION"',
				'desc'=>'t."DEME_DESCRIPCION" desc',
			),
			
			'SUMATORIA'=>array(
				'asc'=>'(SELECT SUM("NOME_VALOR")
                         FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee, "TBL_NOMNOVEDADESMENSUALES" nm
						 WHERE t."DEME_ID" = nm."DEME_ID" AND nm."EMPL_ID" = e."EMPL_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
						 AND e."PEGE_ID" = p."PEGE_ID" AND nm."NOME_VALOR">0 GROUP BY nm."DEME_ID"
					    )',
				'desc'=>'(SELECT SUM("NOME_VALOR")
                          FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee, "TBL_NOMNOVEDADESMENSUALES" nm
						  WHERE t."DEME_ID" = nm."DEME_ID" AND nm."EMPL_ID" = e."EMPL_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
						  AND e."PEGE_ID" = p."PEGE_ID" AND nm."NOME_VALOR">0 GROUP BY nm."DEME_ID"
						  ) desc',
			),	
			
			'AFILIADOS'=>array(
				'asc'=>'(SELECT COUNT('."'PEGE_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee, "TBL_NOMNOVEDADESMENSUALES" nm
								   WHERE t."DEME_ID" = nm."DEME_ID" AND nm."EMPL_ID" = e."EMPL_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								   AND e."PEGE_ID" = p."PEGE_ID" AND nm."NOME_VALOR">0 GROUP BY p."PEGE_ID"
								  )',
				'desc'=>'(SELECT COUNT('."'PEGE_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee, "TBL_NOMNOVEDADESMENSUALES" nm
								   WHERE t."DEME_ID" = nm."DEME_ID" AND nm."EMPL_ID" = e."EMPL_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								   AND e."PEGE_ID" = p."PEGE_ID" AND nm."NOME_VALOR">0 GROUP BY p."NOME_ID"
								  ) desc',
			),
		);

		$criteria=new CDbCriteria;
		
		$criteria->select = 't.*, (SELECT COUNT('."'PEGE_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee, "TBL_NOMNOVEDADESMENSUALES" nm
								   WHERE t."DEME_ID" = nm."DEME_ID" AND nm."EMPL_ID" = e."EMPL_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								   AND e."PEGE_ID" = p."PEGE_ID" AND nm."NOME_VALOR">0 GROUP BY nm."DEME_ID"
								  )  "AFILIADOS",
								  
								  (SELECT SUM("NOME_VALOR")
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" ee, "TBL_NOMNOVEDADESMENSUALES" nm
								   WHERE t."DEME_ID" = nm."DEME_ID" AND nm."EMPL_ID" = e."EMPL_ID" AND e."EMPL_ID" = ee."EMPL_ID" AND ee."ESEM_ID" = 1
								   AND e."PEGE_ID" = p."PEGE_ID" AND nm."NOME_VALOR">0 GROUP BY nm."DEME_ID"
								  )  "SUMATORIA"';

		$criteria->compare('"DEME_ID"',$this->DEME_ID);
		$criteria->compare('"DEME_NOMBRE"',$this->DEME_NOMBRE,true);
		$criteria->compare('"DEME_DESCRIPCION"',$this->DEME_DESCRIPCION,true);
		$criteria->compare('"DEME_FECHACAMBIO"',$this->DEME_FECHACAMBIO,true);
		$criteria->compare('"DEME_REGISTRADOPOR"',$this->DEME_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 30,),
		));
	}
	
	public function getAfiliados($descuento){
	$connection = Yii::app()->db;
     $sql = 'SELECT p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",  dm."DEME_NOMBRE", nm."NOME_VALOR"			 
             FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMNOVEDADESMENSUALES" nm, "TBL_NOMDESCUENTOSMENSUALES" dm, "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
             WHERE p."PEGE_ID" = ep."PEGE_ID" AND dm."DEME_ID" = nm."DEME_ID" AND nm."EMPL_ID" = ep."EMPL_ID" AND dm."DEME_ID" = '.$descuento.' AND nm."NOME_VALOR"!=0
             AND ep."EMPL_ID" = eep."EMPL_ID" AND eep."ESEM_ID" = 1
			 ORDER BY  p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE" ASC
	        ';
		
	 $query = $connection->createCommand($sql)->queryAll();
	 $this->deducciones = NULL;
	 $array = array('IDENTIFICACION','NOMBRE','SEGUNDO NOMBRE','APELLIDO', 'SEGUNDO APELLIDO', 'DEDUCCION','TOTAL');
	 $j=0; $i=0;
	 foreach ($array as $values=>$value) {	
	  $this->deducciones[$j][$i] = $value;
	  $i++;  
	 }
	 
	 $j=1;
	 $total=0;;
	 foreach ($query as $values) {	
	  $i=0;
	  foreach ($values as $value) {      	 
	   if($i==6){
	    $total = $total+$value; 
	    $this->deducciones[$j][6] = $value;
	   }else{	   
	         $this->deducciones[$j][$i] = $value;
	        } 
	   $i++;
	  }
      $j++;	 
     }	 
    }
	
	public function resetDescuentomensual(){
	 $connection = Yii::app()->db;
	 $sql = 'UPDATE "TBL_NOMNOVEDADESMENSUALES" SET "NOME_VALOR" = 0 WHERE "DEME_ID" = '.$this->DEME_ID.' AND "NOME_VALOR" != 0;';
	 if($connection->createCommand($sql)->execute()){
	  return TRUE;
	 }else{
	       return FALSE;
		  }	
    }
}