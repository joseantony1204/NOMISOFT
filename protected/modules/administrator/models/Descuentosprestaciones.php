<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMDESCUENTOSPRESTACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMDESCUENTOSPRESTACIONES':
 * @Propiedad integer $DEPR_ID
 * @Propiedad string $DEPR_NOMBRE
 * @Propiedad string $DEPR_DESCRIPCION
 * @Propiedad integer $TIPR_ID
 * @Propiedad string $DEPR_FECHACAMBIO
 * @Propiedad integer $DEPR_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad TIPOSPRESTACIONES $tIPR
 * @Propiedad NOVEDADESPRESTACIONES[] $nOVEDADESPRESTACIONESs
 */
class Descuentosprestaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Descuentosprestaciones la clase del modelo estàtico.
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
		return 'TBL_NOMDESCUENTOSPRESTACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('DEPR_NOMBRE, TIPR_ID, DEPR_FECHACAMBIO, DEPR_REGISTRADOPOR', 'required'),
			array('TIPR_ID, DEPR_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('DEPR_NOMBRE', 'length', 'max'=>50),
			array('DEPR_DESCRIPCION', 'length', 'max'=>30),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('DEPR_ID, DEPR_NOMBRE, DEPR_DESCRIPCION, TIPR_ID, DEPR_FECHACAMBIO, DEPR_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'tIPR' => array(self::BELONGS_TO, 'TIPOSPRESTACIONES', 'TIPR_ID'),
			'nOVEDADESPRESTACIONESs' => array(self::HAS_MANY, 'NOVEDADESPRESTACIONES', 'DEPR_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'DEPR_ID' => 'ID',
						'DEPR_NOMBRE' => 'NOMBRE',
						'DEPR_DESCRIPCION' => 'DESCRIPCION',
						'SUMATORIA' => 'VALOR TOTAL',
						'AFILIADOS' => 'EMPLEADOS',
						'TIPR_ID' => 'TIPR',
						'DEPR_FECHACAMBIO' => 'DEPR FECHACAMBIO',
						'DEPR_REGISTRADOPOR' => 'DEPR REGISTRADOPOR',
						
						'RESET' => 'REESTABLECER',
						'PASS' => 'CONTRASEÑA DE ADMINISTRADOR',
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
			'defaultOrder'=>'t."DEPR_NOMBRE" ASC',
			
			'DEPR_ID'=>array(
				'asc'=>'t."DEPR_ID"',
				'desc'=>'t."DEPR_ID" desc',
			),
			
			'DEPR_NOMBRE'=>array(
				'asc'=>'t."DEPR_NOMBRE"',
				'desc'=>'t."DEPR_NOMBRE" desc',
			),
			
			'DEPR_DESCRIPCION'=>array(
				'asc'=>'t."DEPR_DESCRIPCION"',
				'desc'=>'t."DEPR_DESCRIPCION" desc',
			),
			
			'SUMATORIA'=>array(
				'asc'=>'(SELECT SUM("NOPR_VALOR") 
								  FROM "TBL_NOMNOVEDADESPRESTACIONES" "np"
								  WHERE t."DEPR_ID" = np."DEPR_ID" AND np."NOPR_VALOR">0 GROUP BY np."DEPR_ID"
								 )',
				'desc'=>'(SELECT SUM("NOPR_VALOR") 
								  FROM "TBL_NOMNOVEDADESPRESTACIONES" "np"
								  WHERE t."DEPR_ID" = np."DEPR_ID" AND np."NOPR_VALOR">0 GROUP BY np."DEPR_ID"
								 ) desc',
			),	
			
			'AFILIADOS'=>array(
				'asc'=>'(SELECT COUNT('."'PEGE_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMNOVEDADESPRESTACIONES" np
								   WHERE t."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID" = p."PEGE_ID"
								   AND e."PEGE_ID" = p."PEGE_ID" AND np."NOPR_VALOR">0 GROUP BY np."DEPR_ID"
								  )',
				'desc'=>'(SELECT COUNT('."'PEGE_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMNOVEDADESPRESTACIONES" np
								   WHERE t."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID" = p."PEGE_ID"
								   AND e."PEGE_ID" = p."PEGE_ID" AND np."NOPR_VALOR">0 GROUP BY np."DEPR_ID"
								  ) desc',
			),
		);
		
		$criteria=new CDbCriteria;
		
		$criteria->select = 't.*, (SELECT COUNT('."'PEGE_ID'".')
                                   FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMNOVEDADESPRESTACIONES" np
								   WHERE t."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID" = p."PEGE_ID"
								   AND e."PEGE_ID" = p."PEGE_ID" AND np."NOPR_VALOR">0 GROUP BY np."DEPR_ID"
								  )  "AFILIADOS",
								  
								 (SELECT SUM("NOPR_VALOR") 
								  FROM "TBL_NOMNOVEDADESPRESTACIONES" "np"
								  WHERE t."DEPR_ID" = np."DEPR_ID" AND np."NOPR_VALOR">0 GROUP BY np."DEPR_ID"
								 ) "SUMATORIA"';

		$criteria->compare('"DEPR_ID"',$this->DEPR_ID);
		$criteria->compare('"DEPR_NOMBRE"',$this->DEPR_NOMBRE,true);
		$criteria->compare('"DEPR_DESCRIPCION"',$this->DEPR_DESCRIPCION,true);
		$criteria->compare('"TIPR_ID"',$this->TIPR_ID);
		$criteria->compare('"DEPR_FECHACAMBIO"',$this->DEPR_FECHACAMBIO,true);
		$criteria->compare('"DEPR_REGISTRADOPOR"',$this->DEPR_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 30,),
		));
	}
	
	public function defaultDescuentosPrestaciones($Descuentoprestacion)
	{
     $criteria = new CDbCriteria();
	 $criteria->select = 't."PEGE_ID"';
	 $criteria->order = 't."PEGE_ID"';
	 $criteria->group = 't."PEGE_ID"';
	 $Personasgenerales = Novedadesprestaciones::model()->findAll($criteria);	 
	 
	 foreach($Personasgenerales as  $persona){
	    $Novedadesprestaciones = new Novedadesprestaciones;
		$Novedadesprestaciones->NOPR_VALOR = 0;
		$Novedadesprestaciones->DEPR_ID = $Descuentoprestacion->DEPR_ID;
		$Novedadesprestaciones->PEGE_ID = $persona->PEGE_ID;
		$Novedadesprestaciones->NOPR_FECHACAMBIO = date('Y-m-d H:i:s');
		$Novedadesprestaciones->NOPR_REGISTRADOPOR = Yii::app()->user->id;
		$Novedadesprestaciones->save(); 
	  }
	}
	
	public function getAfiliados($descuento){
	$connection = Yii::app()->db;
    //echo '<br><br><br><br>'.
	$sql = 'SELECT p."PEGE_IDENTIFICACION", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE",  dp."DEPR_NOMBRE", np."NOPR_VALOR"			 
             FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMNOVEDADESPRESTACIONES" np, "TBL_NOMDESCUENTOSPRESTACIONES" dp
             WHERE dp."DEPR_ID" = np."DEPR_ID" AND np."PEGE_ID" = p."PEGE_ID" AND dp."DEPR_ID" = '.$descuento.' AND np."NOPR_VALOR"!=0
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
}