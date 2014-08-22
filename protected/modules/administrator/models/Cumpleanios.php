<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMCUMPLEANIOS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMCUMPLEANIOS':
 * @Propiedad integer $CUMP_ID
 * @Propiedad string $CUMP_FECHANOTIFIACION
 * @Propiedad integer $PEGE_ID
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PERSONASGENERALES $pEGE
 */
class Cumpleanios extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Cumpleanios la clase del modelo estàtico.
	 */
	public $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS, $PEGE_FECHANACIMIENTO;  
	public $personas, $estado;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMCUMPLEANIOS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PEGE_ID', 'required'),
			array('PEGE_ID', 'numerical', 'integerOnly'=>true),
			array('CUMP_FECHANOTIFIACION', 'safe'),
			
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('CUMP_ID, CUMP_FECHANOTIFIACION, PEGE_ID, PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE,
			      PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS, PEGE_FECHANACIMIENTO', 'safe', 'on'=>'search'),
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
			'pEGE' => array(self::BELONGS_TO, 'PERSONASGENERALES', 'PEGE_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'CUMP_ID' => 'CUMP',
						'CUMP_FECHANOTIFIACION' => 'F. ENVIO NOTIFIACION',
						'PEGE_ID' => 'PEGE',
						
						'PEGE_IDENTIFICACION' => 'No. IDENTIFICACION',
						'PEGE_PRIMERNOMBRE' => 'NOMBRE',
						'PEGE_SEGUNDONOMBRE' => 'SEGUNDO NOMBRE',
						'PEGE_PRIMERAPELLIDO' => 'APELLIDO',
						'PEGE_SEGUNDOAPELLIDOS' => 'SEGUNDO APELLIDO',
						'PEGE_FECHANACIMIENTO' => 'F. NACIMIENTO',
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
		$sort->defaultOrder = 'p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE", p."PEGE_PRIMERAPELLIDO" ASC';
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
			
			'CUMP_FECHANOTIFIACION'=>array(
				'asc'=>'"CUMP_FECHANOTIFIACION"',
				'desc'=>'"CUMP_FECHANOTIFIACION" desc',
			),
        );	

		$criteria=new CDbCriteria;
        
		$criteria->select = 't.*, p.*';
		$criteria->join = 'INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON p."PEGE_ID" = t."PEGE_ID"';
		
		$criteria->compare('"CUMP_ID"',$this->CUMP_ID);
		$criteria->compare('"CUMP_FECHANOTIFIACION"',$this->CUMP_FECHANOTIFIACION);
		$criteria->compare('"PEGE_ID"',$this->PEGE_ID);
		$criteria->compare('"PEGE_IDENTIFICACION"',$this->PEGE_IDENTIFICACION,true);
		$criteria->compare('"PEGE_PRIMERNOMBRE"',$this->PEGE_PRIMERNOMBRE,true);
		$criteria->compare('"PEGE_SEGUNDONOMBRE"',$this->PEGE_SEGUNDONOMBRE,true);
		$criteria->compare('"PEGE_PRIMERAPELLIDO"',$this->PEGE_PRIMERAPELLIDO,true);
		$criteria->compare('"PEGE_SEGUNDOAPELLIDOS"',$this->PEGE_SEGUNDOAPELLIDOS,true);
		$criteria->compare('"PEGE_FECHANACIMIENTO"',$this->PEGE_FECHANACIMIENTO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}
	
	public function getCumpleaniostoday(){
     $connection = Yii::app()->db;
     $mesActual = date("m");
     $diaActual = date("d");
  
     $string = 'SELECT * FROM (
                SELECT t.*, p.*, EXTRACT(YEAR FROM "PEGE_FECHANACIMIENTO") AS "ANIO", EXTRACT(MONTH FROM "PEGE_FECHANACIMIENTO") AS "MES", EXTRACT(DAY FROM "PEGE_FECHANACIMIENTO") AS "DIA"
                FROM "TBL_NOMCUMPLEANIOS" "t" INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON p."PEGE_ID" = t."PEGE_ID" 
                ) t WHERE "MES" = '.$mesActual.' AND "DIA" = '.$diaActual.'';
     $rows = $connection->createCommand($string)->queryAll();
     
	 $j=0;
	 foreach ($rows as $values) {	
	  $i=0;
	  foreach ($values as $value) {      	 
	   $this->personas[$j][$i] = $value;
	  $i++;
	  }
     $j++;	 
     }
    }
	
  public function updateSendmail($id,$fecha){  
   $Cumpleanios = Cumpleanios::model()->findByPk($id);   
   if($Cumpleanios->CUMP_FECHANOTIFIACION!=$fecha){    
    $Cumpleanios->CUMP_FECHANOTIFIACION = $fecha;
    $Cumpleanios->save();
    $this->estado = 0;	
   }else{
	    $this->estado = 1;
	   } 
  }
 
}