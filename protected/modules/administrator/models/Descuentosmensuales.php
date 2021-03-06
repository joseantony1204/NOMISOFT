<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMDESCUENTOSMENSUALES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMDESCUENTOSMENSUALES':
 * @Propiedad integer $DEME_ID
 * @Propiedad string $DEME_NOMBRE
 * @Propiedad string $DEME_DESCRIPCION
 * @Propiedad string $DEME_NIT
 * @Propiedad string $DEME_DIRECCION
 * @Propiedad string $DEME_TELEFONO
 * @Propiedad string $DEME_IDREPRESENTANTE
 * @Propiedad string $DEME_NOMBREREPRESENTANTE
 * @Propiedad string $DEME_IDCONTACTO
 * @Propiedad string $DEME_NOMBRECONTACTO
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
			array('DEME_NOMBRE, DEME_NIT, DEME_DIRECCION', 'length', 'max'=>30),
			array('DEME_DESCRIPCION, ' , 'length', 'max'=>20),
			array('DEME_TELEFONO, ' , 'length', 'max'=>10),
			array('DEME_IDREPRESENTANTE, DEME_IDCONTACTO ' , 'length', 'max'=>15),
			array('DEME_NOMBREREPRESENTANTE,DEME_NOMBRECONTACTO ' , 'length', 'max'=>50),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('DEME_ID, DEME_NOMBRE, DEME_DESCRIPCION, DEME_NIT, DEME_DIRECCION, DEME_TELEFONO, DEME_IDREPRESENTANTE, 
			       DEME_NOMBREREPRESENTANTE, DEME_IDCONTACTO, DEME_NOMBRECONTACTO DEME_FECHACAMBIO, DEME_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
						'DEME_NIT' => 'NIT',
						'DEME_DIRECCION' => 'DIRECCION Y CIUDAD',
						'DEME_TELEFONO' => 'TELEFONO',
						'DEME_IDREPRESENTANTE' => 'CEDULA REPRESENTANTE',
						'DEME_NOMBREREPRESENTANTE' => 'NOMBRE REPRESENTANTE',
						'DEME_IDCONTACTO' => 'CEDULA CONTACTO',
						'DEME_NOMBRECONTACTO' => 'NOMBRE CONTACTO',						
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
		$sort->defaultOrder = '"DEME_NOMBRE" ASC';
		$sort->attributes = array(
			
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
		
		$criteria->select = 't.*, (SELECT COUNT(*) FROM 
		                           (
		                            SELECT  p."PEGE_ID", ep."EMPL_ID", 								    
									(SELECT eep."ESEM_ID"
									 FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
									 WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID"
									 ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
									 LIMIT 1 
									 ) AS "ESEM_ID"
									 
									 FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMNOVEDADESMENSUALES" nm
									 WHERE t."DEME_ID" = nm."DEME_ID" AND nm."EMPL_ID" = ep."EMPL_ID" 										  
									 AND ep."PEGE_ID" = p."PEGE_ID" AND nm."NOME_VALOR">0 
									 ) g
									 
									 WHERE "ESEM_ID" = 1
								   )  "AFILIADOS",
								  
								  (SELECT SUM("NOME_VALOR") FROM 
								   (SELECT  p."PEGE_ID", ep."EMPL_ID", nm."NOME_VALOR",
								    (SELECT eep."ESEM_ID"
								     FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
								     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID"
								     ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
								     LIMIT 1 
								    ) AS "ESEM_ID"
								    FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMNOVEDADESMENSUALES" nm
								    WHERE t."DEME_ID" = nm."DEME_ID" AND nm."EMPL_ID" = ep."EMPL_ID" 									  
								    AND ep."PEGE_ID" = p."PEGE_ID" AND nm."NOME_VALOR">0 
								   ) g
								   WHERE "ESEM_ID" = 1 GROUP BY "DEME_ID"
								  ) AS "SUMATORIA"';

		$criteria->compare('"DEME_ID"',$this->DEME_ID);
		$criteria->compare('"DEME_NOMBRE"',$this->DEME_NOMBRE,true);
		$criteria->compare('"DEME_DESCRIPCION"',$this->DEME_DESCRIPCION,true);
		$criteria->compare('"DEME_NIT"',$this->DEME_NIT,true);
		$criteria->compare('"DEME_DIRECCION"',$this->DEME_DIRECCION,true);
		$criteria->compare('"DEME_TELEFONO"',$this->DEME_TELEFONO,true);
		$criteria->compare('"DEME_IDREPRESENTANTE"',$this->DEME_IDREPRESENTANTE,true);
		$criteria->compare('"DEME_NOMBREREPRESENTANTE"',$this->DEME_NOMBREREPRESENTANTE,true);
		$criteria->compare('"DEME_IDCONTACTO"',$this->DEME_IDCONTACTO,true);
		$criteria->compare('"DEME_NOMBRECONTACTO"',$this->DEME_NOMBRECONTACTO,true);
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
     $sql = 'SELECT * FROM
			(
			SELECT p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",  dm."DEME_NOMBRE", nm."NOME_VALOR",
			(SELECT eep."ESEM_ID"
			FROM "TBL_NOMESTADOSEMPLEOSPLANTA" eep
			WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = p."PEGE_ID"
			ORDER BY eep."ESEP_FECHAREGISTRO" DESC
			LIMIT 1
			) AS "ESEM_ID"
			FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMNOVEDADESMENSUALES" nm, "TBL_NOMDESCUENTOSMENSUALES" dm
			WHERE dm."DEME_ID" = nm."DEME_ID" AND nm."EMPL_ID" = ep."EMPL_ID" AND dm."DEME_ID" = '.$descuento.'
			AND ep."PEGE_ID" = p."PEGE_ID" AND nm."NOME_VALOR">0
			) g
			WHERE "ESEM_ID" = 1
			ORDER BY  "PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS", "PEGE_PRIMERNOMBRE" ASC
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
	
	public function defaultDescuentosMensuales($descuentoMensual)
	{
     $criteria = new CDbCriteria();
	 $criteria->select = 't."EMPL_ID"';
	 $criteria->order = 't."EMPL_ID"';
	 $Empleosplanta = Empleosplanta::model()->findAll($criteria);	 
	 
	 foreach($Empleosplanta as  $Empleoplanta){
	    $Novedadesmensuales = new Novedadesmensuales;
		$Novedadesmensuales->NOME_VALOR = 0;
		$Novedadesmensuales->DEME_ID = $descuentoMensual;
		$Novedadesmensuales->EMPL_ID = $Empleoplanta->EMPL_ID;
		$Novedadesmensuales->NOME_FECHACAMBIO = date('Y-m-d H:i:s');
		$Novedadesmensuales->NOME_REGISTRADOPOR = Yii::app()->user->id;
		$Novedadesmensuales->save(); 
	  }
	}
}