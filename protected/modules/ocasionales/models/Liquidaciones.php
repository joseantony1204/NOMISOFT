<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_LIQLIQUIDACIONES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_LIQLIQUIDACIONES':
 * @Propiedad string $LIQU_ID
 * @Propiedad string $LIQU_FECHAINGRESO
 * @Propiedad string $LIQU_FECHARETIRO
 * @Propiedad string $LIQU_FECHAPROCESO
 * @Propiedad boolean $LIQU_ESTADO
 * @Propiedad integer $LIQU_ANIO
 * @Propiedad integer $PEGE_ID
 * @Propiedad string $LIQU_FECHACAMBIO
 * @Propiedad integer $LIQU_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad TBLNOMPERSONASGENERALES $pEGE
 * @Propiedad PRIMAVACACIONES[] $pRIMAVACACIONESs
 * @Propiedad PRIMASEMESTRAL[] $pRIMASEMESTRALs
 * @Propiedad VACACIONES[] $vACACIONESs
 * @Propiedad PRIMANAVIDAD[] $pRIMANAVIDADs
 * @Propiedad CESANTIAS[] $cESANTIASes
 */
class Liquidaciones extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Liquidaciones la clase del modelo estàtico.
	 */
	public $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS;
	public $LIQU_MESINICIO, $LIQU_MESFINAL;
	public $log;
	public $DOWNLOAD;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static $db2; 
	public function getDbConnection()
	{ 
	 if(self::$db2 !== null){ 
	  return self::$db2; 
	 }else{ 
	       self::$db2 = Yii::app()->db2; 
	       if (self::$db2 instanceof CDbConnection)
	       { 
		    self::$db2->setActive(true); 
			return self::$db2; 
	       }else{  
		         throw new CDbException(Yii::t('yii','Active Record requires a "db2" CDbConnection application component.')); 
	            } 
	      } 
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_LIQLIQUIDACIONES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('LIQU_ID, LIQU_FECHAINGRESO, LIQU_FECHARETIRO, LIQU_FECHAPROCESO, LIQU_ESTADO, LIQU_ANIO, PEGE_ID, LIQU_FECHACAMBIO, LIQU_REGISTRADOPOR', 'required'),
			array('LIQU_ANIO, PEGE_ID, LIQU_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			
			array('LIQU_ID, LIQU_FECHAINGRESO, LIQU_FECHARETIRO, LIQU_FECHAPROCESO, LIQU_ESTADO, LIQU_ANIO, 
			       PEGE_ID, LIQU_FECHACAMBIO, LIQU_REGISTRADOPOR,
				   PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, 
	               PEGE_SEGUNDOAPELLIDOS', 'safe', 'on'=>'search'),
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
			'pEGE' => array(self::BELONGS_TO, 'TBLNOMPERSONASGENERALES', 'PEGE_ID'),
			'pRIMAVACACIONESs' => array(self::HAS_MANY, 'PRIMAVACACIONES', 'LIQU_ID'),
			'pRIMASEMESTRALs' => array(self::HAS_MANY, 'PRIMASEMESTRAL', 'LIQU_ID'),
			'vACACIONESs' => array(self::HAS_MANY, 'VACACIONES', 'LIQU_ID'),
			'pRIMANAVIDADs' => array(self::HAS_MANY, 'PRIMANAVIDAD', 'LIQU_ID'),
			'cESANTIASes' => array(self::HAS_MANY, 'CESANTIAS', 'LIQU_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'LIQU_ID' => 'CODIGO',
						'LIQU_FECHAINGRESO' => 'F. INGRESO',
						'LIQU_FECHARETIRO' => 'F. RETIRO',
						'LIQU_FECHAPROCESO' => 'F. PROCESO',
						'LIQU_ESTADO' => ' ',
						'LIQU_ANIO' => 'AÑO',
						'PEGE_ID' => 'PEGE',
						'LIQU_FECHACAMBIO' => 'LIQU FECHACAMBIO',
						'LIQU_REGISTRADOPOR' => 'LIQU REGISTRADOPOR',
						
						'PEGE_IDENTIFICACION' => 'IDENTIFICACION',
						'PEGE_PRIMERNOMBRE' => 'NOMBRE',
						'PEGE_SEGUNDONOMBRE' => 'SEGUNDO NOMBRE',
						'PEGE_PRIMERAPELLIDO' => 'APELLIDO',
						'PEGE_SEGUNDOAPELLIDOS' => 'SEGUNDO APELLIDO',
						
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

		$criteria=new CDbCriteria;
		
		$criteria->select = 't.*, p.*';

        $criteria->join = 'INNER JOIN "TBL_NOMPERSONASGENERALES" "p" ON p."PEGE_ID" = t."PEGE_ID"';		

		$criteria->compare('LIQU_ID',$this->LIQU_ID,true);
		$criteria->compare('LIQU_FECHAINGRESO',$this->LIQU_FECHAINGRESO,true);
		$criteria->compare('LIQU_FECHARETIRO',$this->LIQU_FECHARETIRO,true);
		$criteria->compare('LIQU_FECHAPROCESO',$this->LIQU_FECHAPROCESO,true);
		$criteria->compare('LIQU_ESTADO',$this->LIQU_ESTADO);
		$criteria->compare('LIQU_ANIO',$this->LIQU_ANIO);
		$criteria->compare('PEGE_ID',$this->PEGE_ID);
		$criteria->compare('LIQU_FECHACAMBIO',$this->LIQU_FECHACAMBIO,true);
		$criteria->compare('LIQU_REGISTRADOPOR',$this->LIQU_REGISTRADOPOR);
		
		$criteria->compare('"PEGE_IDENTIFICACION"',$this->PEGE_IDENTIFICACION);
		$criteria->compare('"PEGE_PRIMERNOMBRE"',$this->PEGE_PRIMERNOMBRE);
		$criteria->compare('"PEGE_SEGUNDONOMBRE"',$this->PEGE_SEGUNDONOMBRE);
		$criteria->compare('"PEGE_PRIMERAPELLIDO"',$this->PEGE_PRIMERAPELLIDO);
		$criteria->compare('"PEGE_SEGUNDOAPELLIDOS"',$this->PEGE_SEGUNDOAPELLIDOS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getDetalles(){ 	   
	   return Yii::app()->baseurl.'/images/nomina/icon_resumen.png';
	}
	
	public function getEstado()
	{
		if($this->LIQU_ESTADO==0){
		 $imageUrl = 'spellcheck_error.png';
		}else{
		      $imageUrl = 'spellcheck.png';
			 }
        return Yii::app()->baseurl.'/images/nomina/'.$imageUrl;		
	}
	
	
	public function setLiquidaciones($Liquidaciones){
     $this->log = "";
	 $connection = Yii::app()->db2;
	 $cont = 0;	  	  
	  if($Liquidaciones->LIQU_MESFINAL<$Liquidaciones->LIQU_MESINICIO){
		$this->log[$cont]=array('<strong>Fechas</strong>',"La fecha final no debe ser menor a la inicial :(",1);
	    $cont++;
	  }else{
	        /**
			*Obtener las personas retiradas en el rango de fecha enviada
			*/			
			$Personas = $this->getPersonasretiradas($Liquidaciones);
			
			/**
			*vefifica que existan personas retiradas
			*/
			if(count($Personas)>0){
			 /**
			 *Empieza ciclo que liquida y guarda registros de liquidacion
			 */
			 $iterador = $cont;
			 foreach($Personas as $Persona){
			  /**
			  *inicializamos el modelos persona y cargamos sus ultimas funciones
			  */
			  $Personasgeneral = Personasgenerales::model()->findByPk($Persona["PEGE_ID"]);
			  $Personasgeneral->loadPersonageneral($Personasgeneral->PEGE_ID);
			  
			  /**
			  *verificamos si la persona ya fue liquidada
			  *
			  if($this->verificarLiquidacion($Persona["PEGE_ID"])==false){
			   
			   /**
			   *si la persona aun no ha sido liquidada guardamos el registro liquidacion y 
			   *procedemos a calcular y liquidar las prestaciones y demas
			   *
			   $codigo = $Liquidaciones->LIQU_ANIO.$Persona["PEGE_ID"];
			   $Liquidaciones->LIQU_ID = $codigo;
			   $Liquidaciones->PEGE_ID = $Persona["PEGE_ID"];
			   $Liquidaciones->LIQU_FECHAINGRESO = $Personasgeneral->Personageneral->PEGE_FECHAINGRESO;
			   $Liquidaciones->LIQU_FECHARETIRO = $Personasgeneral->Estadoempleoplanta->ESEP_FECHAREGISTRO;
			   if($Liquidaciones->save()){*/
		        /**
			    *inicializamos los modelos de liquidacion
			    */			 
			    $Liqprimasemestral = new Liqprimasemestral;
			    $Liqvacaciones = new Liqvacaciones;
			    $Liqprimavacaciones = new Liqprimavacaciones;
			    $Liqprimanavidad = new Liqprimanavidad;
			    $Liqcesantias = new Liqcesantias; 
			  
			    /**
			    *empezamos a obtener las liquidaciones de cada modelo
			    */
			    /*$Liqprimasemestral->getPrimasemestral($Personasgeneral,$Liquidaciones);
			    */$Liqvacaciones->getVacaciones($Personasgeneral,$Liquidaciones);
			    /*$Liqprimavacaciones->getPrimavacaciones($Personasgeneral,$Liquidaciones);
			    $Liqprimanavidad->getPrimanavidad($Personasgeneral,$Liquidaciones);
			    $Liqcesantias->getCesantias($Personasgeneral,$Liquidaciones);*/
				$nombre = trim($Personasgeneral->Personageneral->PEGE_PRIMERNOMBRE).' '.trim($Personasgeneral->Personageneral->PEGE_PRIMERAPELLIDO).' '.trim($Personasgeneral->Personageneral->PEGE_SEGUNDOAPELLIDOS);
                $this->log[$iterador]=array('<strong>'.$nombre.'</strong>',"Liquidacion generada correctamente :)",1);
			   /*}else{
		             $msg = print_r($Liquidaciones->getErrors(),1);
                     throw new CHttpException(400,'data not saving: '.$msg );
			        }*
			   	 
			  }else{
			        $nombre = trim($Personasgeneral->Personageneral->PEGE_PRIMERNOMBRE).' '.trim($Personasgeneral->Personageneral->PEGE_PRIMERAPELLIDO).' '.trim($Personasgeneral->Personageneral->PEGE_SEGUNDOAPELLIDOS);
					$this->log[$iterador]=array('<strong>'.$nombre.'</strong>',"Hay personas que fueron liquidadas en el periodo seleccionado!",1); 
				   }*/
			  $iterador++;
			 }
			}else{
			      $this->log[$cont]=array('<strong>Sin registros</strong>',"No ha sido posible encontrar algun registro para liquidar!",1); 
				 }		   
		   }
	 return $this->log;
	}
	
	
	private function verificarLiquidacion($Persona){
	 $connection = Yii::app()->db2;
	 $sql = 'SELECT l."LIQU_ID"
	         FROM "TBL_LIQLIQUIDACIONES" l
			 WHERE l."PEGE_ID" = '.$Persona;
	 $row = $connection->createCommand($sql)->queryRow();
	 if(count($row['LIQU_ID'])>0){
	  return true;
	 }else{
	       return false;
		  }
	}
	
	private function getPersonasretiradas($Liquidaciones){
     $connection = Yii::app()->db2;	 
	 
	 $primerdiamesinicio = date("d",(mktime(0,0,0,$Liquidaciones->LIQU_MESINICIO,1,$Liquidaciones->LIQU_ANIO)));
	 $ultimodiamesfinal = date("d",(mktime(0,0,0,$Liquidaciones->LIQU_MESFINAL+1,1,$Liquidaciones->LIQU_ANIO)-1));
	 
	 $fechainicial = $Liquidaciones->LIQU_ANIO.'-'.$Liquidaciones->LIQU_MESINICIO.'-'.$primerdiamesinicio;
	 $fechafinal = $Liquidaciones->LIQU_ANIO.'-'.$Liquidaciones->LIQU_MESFINAL.'-'.$ultimodiamesfinal;
	 
	 $sql = 'SELECT p.*, eep.*
	         FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" e, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
			 WHERE p."PEGE_ID" = e."PEGE_ID" AND e."EMPL_ID" = eep."EMPL_ID" AND
                   eep."ESEP_FECHAREGISTRO" BETWEEN '."'".$fechainicial."'".' AND '."'".$fechafinal."'".' AND eep."ESEM_ID" = 4';
	 $rows = $connection->createCommand($sql)->queryAll();
     return $rows;	 
	}
	
	public function getFormatoFecha($fecha){
		
	 switch (date("n", strtotime($fecha))) {
	    case 1:
	        $mes="ENERO";
	        break;
	    case 2:
	        $mes="FEBRERO";
	        break;
	    case 3:
	        $mes="MARZO";
	        break;
	     case 4:
	        $mes="ABRIL";
	        break;
	    case 5:
	        $mes="MAYO";
	        break;
	    case 6:
	        $mes="JUNIO";
	        break;
	    case 7:
	        $mes="JULIO";
	        break;
	    case 8:
	        $mes="AGOSTO";
	        break;
	    case 9:
	        $mes="SEPTIEMBRE";
	        break;
	    case 10:
	        $mes="OCTUBRE";
	        break;
	    case 11:
	        $mes="NOVIEMBRE";
	        break;
	    case 12:
	        $mes="DICIEMBRE";
	        break;
		}
		return "$mes/".date("d", strtotime($fecha)).'/'.date("Y", strtotime($fecha));
	}
}





