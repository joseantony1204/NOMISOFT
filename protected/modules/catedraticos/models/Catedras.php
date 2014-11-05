<?php
set_time_limit(0);
/**
 * Esta es la clase de modelo para la tabla "TBL_CATCATEDRAS".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_CATCATEDRAS':
 * @Propiedad integer $CATE_ID
 * @Propiedad string $CATE_CATEDRA
 * @Propiedad integer $CATE_NUMHORAS
 * @Propiedad string $CATE_VALORHORA
 * @Propiedad integer $PEGE_ID
 * @Propiedad integer $FACU_ID
 * @Propiedad integer $PEAC_ID
 * @Propiedad string $CATE_FECHACAMBIO
 * @Propiedad integer $CATE_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad FACULTADES $fACU
 * @Propiedad PERIODOSACADEMICOS $pEAC
 * @Propiedad PERSONASGENERALES $pEGE
 * @Propiedad NOVEDADESMENSUALES[] $nOVEDADESMENSUALESs
 */
class Catedras extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Catedras la clase del modelo estàtico.
	 */
	public $PEGE_IDENTIFICACION, $PEGE_PRIMERNOMBRE, $PEGE_SEGUNDONOMBRE, $PEGE_PRIMERAPELLIDO, $PEGE_SEGUNDOAPELLIDOS;
    public $VINCULO, $CATE_RUTA, $CATE_ARCHIVO;
	public $catedras, $catedrasDataProvider;
	
	public $importDataProvider;
	public $error;
	
	/**
	*variables para la verificacion
	*/
	public $DocNoBaseD, $noExiste, $exite, $DocEnBaseD, $bajoCategoria, $subioCategoria, $DocNombreNoBaseD;
	public $DocInsertInBaseD, $noExisteInsert, $DocNombreInBaseD, $DocNoBaseDInsert, $DocNombreNoBaseDInsert;
	public $docNoCateInFacult, $docSiCateInFacultAgr, $docNoCateInFacultNom, $errorNoCatedras, $SiCatedras, $docSiCateInFacult, $docSiCateInFacultAct, $datosErrores;
	
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve CDbConnection conexiòn a la base de datos.
	 */
	public function getDbConnection()
	{
		return Yii::app()->db3;
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_CATCATEDRAS';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('CATE_FECHACAMBIO, PEGE_ID, CATE_REGISTRADOPOR, FACU_ID, CATE_ARCHIVO', 'required'),
			array('CATE_NUMHORAS, PEGE_ID, FACU_ID, PEAC_ID, CATE_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('CATE_CATEDRA', 'length', 'max'=>200),
			array('CATE_VALORHORA', 'safe'),
			array('CATE_ARCHIVO', 'file', 'types'=>'xls, xlsx', 'allowEmpty'=>true, 'message'=>'Solo se admiten archivos de texto con extensión XLSX o XLS '),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('CATE_ID, CATE_CATEDRA, CATE_NUMHORAS, CATE_VALORHORA, PEGE_ID, FACU_ID, PEAC_ID, CATE_FECHACAMBIO, CATE_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'fACU' => array(self::BELONGS_TO, 'FACULTADES', 'FACU_ID'),
			'pEAC' => array(self::BELONGS_TO, 'PERIODOSACADEMICOS', 'PEAC_ID'),
			'pEGE' => array(self::BELONGS_TO, 'PERSONASGENERALES', 'PEGE_ID'),
			'nOVEDADESMENSUALESs' => array(self::HAS_MANY, 'NOVEDADESMENSUALES', 'CATE_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'CATE_ID' => 'ID',
						'CATE_CATEDRA' => 'CATEDRA EN',
						'CATE_NUMHORAS' => 'NUMERO HORAS',
						'CATE_VALORHORA' => 'VALOR HORA',
						'PEGE_ID' => 'PEGE',
						'FACU_ID' => 'FACULTAD',
						'PEAC_ID' => 'AÑO ACADEMICO',
						'CATE_FECHACAMBIO' => 'CATE FECHACAMBIO',
						'CATE_REGISTRADOPOR' => 'CATE REGISTRADOPOR',
						
						'PEGE_IDENTIFICACION' => 'No. IDENTIFICACION',
						'PEGE_PRIMERNOMBRE' => 'NOMBRE',
						'PEGE_SEGUNDONOMBRE' => 'SEGUNDO NOMBRE',
						'PEGE_PRIMERAPELLIDO' => 'APELLIDO',
						'PEGE_SEGUNDOAPELLIDOS' => 'SEGUNDO APELLIDO',
						
						'VINCULO' => '...',
						'CATE_ARCHIVO' => 'ARCHIVO A SUBIR',
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

		$criteria->compare('CATE_ID',$this->CATE_ID);
		$criteria->compare('CATE_CATEDRA',$this->CATE_CATEDRA,true);
		$criteria->compare('CATE_NUMHORAS',$this->CATE_NUMHORAS);
		$criteria->compare('CATE_VALORHORA',$this->CATE_VALORHORA,true);
		$criteria->compare('PEGE_ID',$this->PEGE_ID);
		$criteria->compare('FACU_ID',$this->FACU_ID);
		$criteria->compare('PEAC_ID',$this->PEAC_ID);
		$criteria->compare('CATE_FECHACAMBIO',$this->CATE_FECHACAMBIO,true);
		$criteria->compare('CATE_REGISTRADOPOR',$this->CATE_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getLink()
	{
		$imageUrl = 'ir.png';
        return Yii::app()->baseurl.'/images/'.$imageUrl;		
	}
	
	 public function getCatedras($facultadId)
	{
		$connection = Yii::app()->db3;
		//echo "<br><br><br>".
	    $sql = '
		        SELECT c."CATE_ID",  c."CATE_NUMHORAS",  p."PEGE_IDENTIFICACION", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE", 
                p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS" 
                FROM "TBL_CATCATEDRAS" c, "TBL_CATPERSONASGENERALES" p, "TBL_CATPERIODOSACADEMICOS" pa
                WHERE c."PEGE_ID" = p."PEGE_ID" AND c."PEAC_ID" = pa."PEAC_ID" AND pa."PEAC_ESTADO" = 1 AND c."FACU_ID" = '.$facultadId.' 
				ORDER BY p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE", p."PEGE_PRIMERAPELLIDO"';  
		
	    $result = $connection->createCommand($sql)->queryAll();	
		return $result;	
	}
	
	public function defaultDescuentosMensuales($catedraId)
	{
     $criteria = new CDbCriteria();
	 $criteria->select = 't."DEME_ID"';
	 $criteria->order = 't."DEME_ID"';
	 $Descuentosmensuales = Descuentosmensuales::model()->findAll($criteria);	 
	 
	 foreach($Descuentosmensuales as  $descuentos){
	    $Novedadesmensuales = new Novedadesmensuales;
		$Novedadesmensuales->NOME_VALOR = 0;
		$Novedadesmensuales->DEME_ID = $descuentos->DEME_ID;
		$Novedadesmensuales->CATE_ID = $catedraId;
		$Novedadesmensuales->NOME_FECHACAMBIO = date('Y-m-d H:i:s');
		$Novedadesmensuales->NOME_REGISTRADOPOR = Yii::app()->user->id;
		$Novedadesmensuales->save(); 
	  }
	}
	
	public function loadCatedras($facultadId)
	{
	 $connection = Yii::app()->db3;
	 
	 //echo "<br><br><br>".
	 $sql='SELECT c."CATE_ID",  c."CATE_NUMHORAS",  p."PEGE_IDENTIFICACION", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE", 
                  p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS" 
           FROM "TBL_CATCATEDRAS" c, "TBL_CATPERSONASGENERALES" p, "TBL_CATPERIODOSACADEMICOS" pa
           WHERE c."PEGE_ID" = p."PEGE_ID" AND c."PEAC_ID" = pa."PEAC_ID" AND pa."PEAC_ESTADO" = 1 AND c."FACU_ID" = '.$facultadId.' 
		   ORDER BY p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDONOMBRE", p."PEGE_PRIMERNOMBRE" 
		  ';  
     
	 // armando arreglo para impresiones//
	 
     $query = $connection->createCommand($sql)->queryAll();
	 $this->catedras = NULL;
	 $array = array('ID','No CEDULA','APELLIDO', '2do APELLIDO', 'NOMBRE', '2do NOMBRE','TOTAL HORAS');
	 $j=0; $i=0;
	 foreach ($array as $values=>$value) {	
	  $this->catedras[$j][$i] = $value;
	  $i++;  
	 }
	
	$j=1;
	 $total1=0;
	 foreach ($query as $values) {	
	  $i=0;
	  foreach ($values as $value) {      		   
	   $this->catedras[$j][$i] = $value;
	   $i++;
	  }
      $j++;	 
     }
	 
	 //armando lista CSqlDataProvider//
	 $this->catedrasDataProvider = NULL;
	 $count=Yii::app()->db3->createCommand('SELECT COUNT(*) FROM ('.$sql.') AS q')->queryScalar();
	 $this->catedrasDataProvider = $dataProvider=new CSqlDataProvider($sql, array(
      'totalItemCount'=>$count,
      'sort'=>array(
        'attributes'=>array(
             'CATE_ID', 'PEGE_IDENTIFICACION', 'PEGE_PRIMERAPELLIDO','PEGE_SEGUNDOAPELLIDOS','PEGE_PRIMERNOMBRE','PEGE_SEGUNDONOMBRE','CATE_NUMHORAS',
        ),
      ),
      'pagination'=>array(
                          'pageSize'=>100,
                         ),
      ),$connection
	 );	
	 
	}
	
  public function verificarDocenteEnDB($Catedras){
   $phpExcelPath = Yii::getPathOfAlias('ext.vendors.phpexcel');
   $connection = Yii::app()->db3;
   spl_autoload_unregister(array('YiiBase','autoload'));
   include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
   
   $this->importDataProvider = NULL;
   $ruta = $Catedras->CATE_RUTA.'/'.$Catedras->CATE_ARCHIVO;
   
   /**
   *obteniendo extension del archivo para evitar errores de carga
   *se elige la version adecuada del excel dependiendo la extension del archivo
   */
   $extension = pathinfo($ruta, PATHINFO_EXTENSION);
   if($extension=='xls') {
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
   }else{
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        } 
   $objReader->setReadDataOnly(true);
   
   /**
	*comprobacion si el archivo realmente fue subido al servidor
	*/
    if(file_exists($ruta)){  
      $objPHPExcel = $objReader->load('temp/'.$Catedras->CATE_ARCHIVO);
      $objWorksheet = $objPHPExcel->getActiveSheet(); 
	  $j=0; 
	  foreach ($objWorksheet->getRowIterator() as $row) {
	   $cellIterator = $row->getCellIterator();
	   $cellIterator->setIterateOnlyExistingCells(false); 
	   $i=0;
	   foreach ($cellIterator as $cell) {
	    $this->importDataProvider[$j][$i] = $cell->getValue();
	    $i++;
	    }
	   $j++;
	  }

   $this->error="";  
   $cont = 0; $cont2 = 0; $cont3 = 0; $cont4 = 0;
   $arrayCategorias = array('1'  =>'C1', '2'  =>'C2', '3'  =>'C3', '4' =>'C4', '5' =>'C4+', '6' =>'C4++');
   
   for ($i = 0; $i <count($this->importDataProvider); $i++){
    $idemp = $this->importDataProvider[$i][0];
    $nombre = $this->importDataProvider[$i][1].' '.$nombre = $this->importDataProvider[$i][2];
    $categoria = $this->importDataProvider[$i][3];       
    $matrizPesonal[$i][0] = $idemp; $matrizPesonal[$i][1] = $nombre; $matrizPesonal[$i][2] = $categoria; 
   }
   
   
   for ($j=0;$j<(count($matrizPesonal));$j++){
     $sql='SELECT  p."PEGE_ID", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", 
                  cg."CATE_ID", cg."CATE_NOMBRE"
		   FROM "TBL_CATCATEGORIAS" cg, "TBL_CATPERSONASGENERALES" p
           WHERE cg."CATE_ID" = p."CATE_ID" AND p."PEGE_IDENTIFICACION" = '."'".trim($matrizPesonal[$j][0])."'".' 
		   ORDER BY p."PEGE_ID" 
		  ';	  
     $query = $connection->createCommand($sql)->queryRow();
	 
	 if(count($query['PEGE_IDENTIFICACION'])==0) {
	     $this->DocNoBaseD[$cont][0] = $matrizPesonal[$j][0]; $this->DocNoBaseD[$cont][1] = $matrizPesonal[$j][1];
		 $this->noExiste = "<font color='#D31F05'>Detalles : Registros que <strong>NO ESTAN</strong> 
		 almacenados en la BASE DE DATOS</font>";
		 $cont = $cont + 1;
	 }else{
	         $this->exite = "<font color='#129232'>Detalles : Registros que <strong>SI ESTAN</strong>
		     almacenados en la BASE DE DATOS</font>";
			 $Personasgenerales = Personasgenerales::model()->findByPk($query['PEGE_ID']);
			 $Categorias = Categorias::model()->findByPk($Personasgenerales->CATE_ID);
			 $this->DocEnBaseD[$cont2][0] = $Personasgenerales->PEGE_IDENTIFICACION;  
			 $this->DocEnBaseD[$cont2][1] = $Personasgenerales->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->PEGE_SEGUNDONOMBRE.' '.$Personasgenerales->PEGE_PRIMERAPELLIDO.' '.$Personasgenerales->PEGE_SEGUNDOAPELLIDOS;
			 $this->DocEnBaseD[$cont2][2] = $Categorias->CATE_NOMBRE;
             
			 if(trim($Categorias->CATE_NOMBRE)!=$matrizPesonal[$j][2]){ 			
				$idImportado = array_search($matrizPesonal[$j][2], $arrayCategorias);			 
		        
				if(trim($Categorias->CATE_ID)>$idImportado){
				 $this->bajoCategoria[$cont3][0] = $Personasgenerales->PEGE_IDENTIFICACION; 
				 $this->bajoCategoria[$cont3][1] = $Personasgenerales->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->PEGE_SEGUNDONOMBRE.' '.$Personasgenerales->PEGE_PRIMERAPELLIDO.' '.$Personasgenerales->PEGE_SEGUNDOAPELLIDOS; 
				 $this->bajoCategoria[$cont3][2] = $Categorias->CATE_NOMBRE; 
				 $this->bajoCategoria[$cont3][3] = $matrizPesonal[$j][2];
				 $cont3 = $cont3 + 1;
				}else{
					   $this->subioCategoria[$cont4][0] = $Personasgenerales->PEGE_IDENTIFICACION; 
					   $this->subioCategoria[$cont4][1] = $Personasgenerales->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->PEGE_SEGUNDONOMBRE.' '.$Personasgenerales->PEGE_PRIMERAPELLIDO.' '.$Personasgenerales->PEGE_SEGUNDOAPELLIDOS;  
				       $this->subioCategoria[$cont4][2] = $Categorias->CATE_NOMBRE; 
					   $this->subioCategoria[$cont4][3] = $matrizPesonal[$j][2];
				       $cont4 = $cont4 + 1;
					 }
			 }
			 $cont2 = $cont2 + 1;
		  }
       }   
    }  
  }
  
  public function verificarInsertDocenteEnDB($Catedras){
   $phpExcelPath = Yii::getPathOfAlias('ext.vendors.phpexcel');
   $connection = Yii::app()->db3;   
   spl_autoload_unregister(array('YiiBase','autoload'));
   include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
   
   $this->importDataProvider = NULL;
   $ruta = $Catedras->CATE_RUTA.'/'.$Catedras->CATE_ARCHIVO;
   
   /**
   *obteniendo extension del archivo para evitar errores de carga
   *se elige la version adecuada del excel dependiendo la extension del archivo
   */
   $extension = pathinfo($ruta, PATHINFO_EXTENSION);
   if($extension=='xls') {
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
   }else{
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        } 
   $objReader->setReadDataOnly(true);
   
   /**
	*comprobacion si el archivo realmente fue subido al servidor
	*/
    if(file_exists($ruta)){  
      $objPHPExcel = $objReader->load('temp/'.$Catedras->CATE_ARCHIVO);
      $objWorksheet = $objPHPExcel->getActiveSheet(); 
	  $j=0; 
	  foreach ($objWorksheet->getRowIterator() as $row) {
	   $cellIterator = $row->getCellIterator();
	   $cellIterator->setIterateOnlyExistingCells(false); 
	   $i=0;
	   foreach ($cellIterator as $cell) {
	    $this->importDataProvider[$j][$i] = $cell->getValue();
	    $i++;
	    }
	   $j++;
	  }
	 

   $this->error="";  
   $cont = 0; $cont2 = 0; $cont3 = 0; $cont4 = 0;
   $arrayCategorias = array('1'  =>'C1', '2'  =>'C2', '3'  =>'C3', '4' =>'C4', '5' =>'C4+', '6' =>'C4++');
   
   for ($i = 0; $i <count($this->importDataProvider); $i++){
    $idemp = $this->importDataProvider[$i][0];
    $nombre = $this->importDataProvider[$i][1].' '.$this->importDataProvider[$i][2];
    $categoria = $this->importDataProvider[$i][3];       
    $matrizPesonal[$i][0] = $idemp; $matrizPesonal[$i][1] = $nombre; $matrizPesonal[$i][2] = $categoria;
    $matrizPesonal[$i][3] = $this->importDataProvider[$i][2]; $matrizPesonal[$i][4] = $this->importDataProvider[$i][1];	
   }
   
   for ($j=0;$j<(count($matrizPesonal));$j++){
     $idemp = $matrizPesonal[$j][0];
     $nombre = $matrizPesonal[$j][1];
     $categoria = trim($matrizPesonal[$j][2]);
	 
	 if(($categoria)=="C1"){
	  $idCategoria = 1;
	 }elseif(($categoria)=="C2"){
	   $idCategoria = 2;
	 }elseif(($categoria)=="C3"){
	   $idCategoria = 3;
	 }elseif(($categoria)=="C4"){
	   $idCategoria = 4;
	 }elseif(($categoria)=="C4+"){
	   $idCategoria = 5;
	 }elseif(($categoria)=="C4++"){
	   $idCategoria = 6;
	 }
	
	 $sql='SELECT  p."PEGE_ID", p."PEGE_IDENTIFICACION"
		   FROM "TBL_CATPERSONASGENERALES" p
           WHERE p."PEGE_IDENTIFICACION" = '."'".trim($matrizPesonal[$j][0])."'".' 
		   ORDER BY p."PEGE_ID" 
		  ';	  
     $query = $connection->createCommand($sql)->queryRow();
	 
	 if(count($query['PEGE_IDENTIFICACION'])==0) {
	   $this->DocNoBaseD[]=$idemp;
	   $this->DocNombreNoBaseD[] = $nombre;
	   $this->noExiste = "<font color='#D31F05'>Detalles : Registros que <strong>NO ESTAN</strong> 
	   almacenados en la <strong>BASE DE DATOS</strong></font>";
	   
	   $listnombre = explode(' ', $matrizPesonal[$j][3]);
	   $listapellido = explode(' ', $matrizPesonal[$j][4]);
	   
	   $Personasgenerales = new Personasgenerales;
	   $Personasgenerales->PEGE_IDENTIFICACION = $idemp;
	   $Personasgenerales->PEGE_PRIMERNOMBRE = $listnombre[0];
	   $Personasgenerales->PEGE_SEGUNDONOMBRE = $listnombre[1].' '.$listnombre[2];
	   $Personasgenerales->PEGE_PRIMERAPELLIDO = $listapellido[0];
	   $Personasgenerales->PEGE_SEGUNDOAPELLIDOS  = $listapellido[1].' '.$listapellido[2];   
	   $Personasgenerales->PEGE_FECHAINGRESO  =  date('Y-m-d');
	   $Personasgenerales->PEGE_FECHANACIMIENTO  =  '1900-01-01';
       $Personasgenerales->PEGE_FECHAEXPEDIDENTIDAD = '1900-01-01';	   
	   $Personasgenerales->CATE_ID = $idCategoria;
	   
	   $Personasgenerales->TIID_ID =  1;
	   $Personasgenerales->SALU_ID =  999;
       $Personasgenerales->PENS_ID =  999;
       $Personasgenerales->SIND_ID =  999;
	   $Personasgenerales->SEXO_ID =  1;
	   $Personasgenerales->PEGE_FECHACAMBIO =  date('Y-m-d');
       $Personasgenerales->PEGE_REGISTRADOPOR = Yii::app()->user->id;
	   
	   if($Personasgenerales->save()){
		  $this->DocNoBaseDInsert[$cont2][0] = $idemp;
		  $this->DocNombreNoBaseDInsert[$cont2][1] = $nombre;
		  $this->noExisteInsert = "<font color='#B05800'>Detalles : Registros que <strong>NO ESTABAN</strong> 
	         almacenados en la <strong>BASE DE DATOS</strong> Y Fueron <strong>AGREGADOS</strong></font>";
		}else{
		      $msg = print_r($Personasgenerales->getErrors(),1);
              throw new CHttpException(400,'data not saving: '.$msg );
		      $this->error = $msg;
			}
	  $cont2++;   
     }else{   
           $this->exite = "<font color='#129232'>Detalles : Registros que <strong>SI ESTAN</strong> 
		   almacenados en la <strong>BASE DE DATOS</strong></font>";
		   $this->DocEnBaseD[]=$idemp;
		   $Personasgenerales = Personasgenerales::model()->findByPk($query['PEGE_ID']);
		   $this->DocNombreInBaseD[] = $Personasgenerales->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->PEGE_SEGUNDONOMBRE.' '.$Personasgenerales->PEGE_PRIMERAPELLIDO.' '.$Personasgenerales->PEGE_SEGUNDOAPELLIDOS;
		   $Personasgenerales->CATE_ID = $idCategoria;
		   $Personasgenerales->PEGE_FECHACAMBIO =  date('Y-m-d');
           $Personasgenerales->PEGE_REGISTRADOPOR = Yii::app()->user->id;
		   $Personasgenerales->save();
		  }   
    $cont++;
    
   }   
  }
 }
 
 
 public function insertUpdateCatedras($Catedras){
   $connection = Yii::app()->db3;
   $this->verificarInsertDocenteEnDB($Catedras);   
   $this->importDataProvider = NULL;
   $ruta = $Catedras->CATE_RUTA.'/'.$Catedras->CATE_ARCHIVO;
   
   /**
   *obteniendo extension del archivo para evitar errores de carga
   *se elige la version adecuada del excel dependiendo la extension del archivo
   */
   $extension = pathinfo($ruta, PATHINFO_EXTENSION);
   if($extension=='xls') {
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
   }else{
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        } 
   $objReader->setReadDataOnly(true);
   
   /**
	*comprobacion si el archivo realmente fue subido al servidor
	*/
    if(file_exists($ruta)){  
      $objPHPExcel = $objReader->load('temp/'.$Catedras->CATE_ARCHIVO);
      $objWorksheet = $objPHPExcel->getActiveSheet(); 
	  $j=0; 
	  foreach ($objWorksheet->getRowIterator() as $row) {
	   $cellIterator = $row->getCellIterator();
	   $cellIterator->setIterateOnlyExistingCells(false); 
	   $i=0;
	   foreach ($cellIterator as $cell) {
	    $this->importDataProvider[$j][$i] = $cell->getValue();
	    $i++;
	    }
	   $j++;
	  }
	 

   $this->error="";  
   $cont = 0; $cont2 = 0; $cont3 = 0; $cont4 = 0;
   $arrayCategorias = array('1'  =>'C1', '2'  =>'C2', '3'  =>'C3', '4' =>'C4', '5' =>'C4+', '6' =>'C4++');
   
   for ($i = 0; $i <count($this->importDataProvider); $i++){
    $idemp = $this->importDataProvider[$i][0];
    $nombre = $this->importDataProvider[$i][1].' '.$this->importDataProvider[$i][2];
    $listnombres = $this->importDataProvider[$i][1];
    $listapellidos = $this->importDataProvider[$i][2];
    $categoria = $this->importDataProvider[$i][3];
    $horas = $this->importDataProvider[$i][4];
    $periodo = $this->importDataProvider[$i][5];
	
    $matrizPesonal[$i][0] = $idemp; $matrizPesonal[$i][1] = $nombre; $matrizPesonal[$i][2] = $categoria; 
    $matrizPesonal[$i][3] = $horas;	$matrizPesonal[$i][4] = $periodo;
   }
   
   for ($j=0;$j<(count($matrizPesonal));$j++){
     $idemp = $matrizPesonal[$j][0];
     $nombre = $matrizPesonal[$j][1];
	 $categoria = trim($matrizPesonal[$j][2]);
	 $horas = $matrizPesonal[$j][3];
	 $periodo = $matrizPesonal[$j][4];
	 
	 $sql='SELECT  p."PEGE_ID", p."PEGE_IDENTIFICACION", p."PEGE_PRIMERNOMBRE", p."PEGE_SEGUNDONOMBRE", p."PEGE_PRIMERAPELLIDO", p."PEGE_SEGUNDOAPELLIDOS", 
                  c.*
		   FROM "TBL_CATCATEDRAS" c, "TBL_CATPERSONASGENERALES" p
           WHERE c."PEGE_ID" = p."PEGE_ID" AND p."PEGE_IDENTIFICACION" = '."'".trim($matrizPesonal[$j][0])."'".' 
                 AND c."FACU_ID" = '.$Catedras->FACU_ID.' AND c."PEAC_ID" = '.$periodo.'		   
		   ORDER BY p."PEGE_ID" 
		  ';	  
     $query = $connection->createCommand($sql)->queryRow();
	 $Personasgenerales = Personasgenerales::model()->findByPk($query['PEGE_ID']);
	 $Facultades = Facultades::model()->findByPk($Catedras->FACU_ID);
	 $Categorias = Categorias::model()->findByPk($Personasgenerales->CATE_ID);
	 
	 if(count($query['PEGE_IDENTIFICACION'])==0) {
	  $this->errorNoCatedras = "<font color='#D31F05'>Detalles : Registros que <strong>NO TIENEN CATEDRAS</strong> 
	  en la Facultad <strong>".$Facultades->FACU_NOMBRE."</strong> en el periodo actual</font>";	
	  $this->docNoCateInFacult[]=$idemp;
	  
	  $string='SELECT  p."PEGE_ID", p."PEGE_IDENTIFICACION", p."CATE_ID"
		   FROM "TBL_CATPERSONASGENERALES" p
           WHERE p."PEGE_IDENTIFICACION" = '."'".trim($matrizPesonal[$j][0])."'".' 
		   ORDER BY p."PEGE_ID" 
		  ';	  
      $querystring = $connection->createCommand($string)->queryRow();
	  $Categorias = Categorias::model()->findByPk($querystring['CATE_ID']);
	  
	  $Catedra = new Catedras;
	  $Catedra->PEGE_ID = $querystring['PEGE_ID'];
	  $Catedra->CATE_CATEDRA = 'CATEDRA EN: '.$Facultades->FACU_NOMBRE;
	  $Catedra->CATE_NUMHORAS = $horas;
	  $Catedra->CATE_VALORHORA = $Categorias->CATE_VALOR;
	  $Catedra->FACU_ID = $Catedras->FACU_ID;
	  $Catedra->PEAC_ID = $periodo; 
	  $Catedra->CATE_ARCHIVO = 0; 
	  $Catedra->CATE_FECHACAMBIO = date('Y-m-d');
	  $Catedra->CATE_REGISTRADOPOR = Yii::app()->user->id;
	  if($Catedra->save()){
		   $Catedra->defaultDescuentosMensuales($Catedra->CATE_ID);
		   $this->docSiCateInFacultAgr[]=$idemp;
	       $this->docNoCateInFacultNom[]=$nombre;
		  }else{
		        $msg = print_r($Catedra->getErrors(),1);
                throw new CHttpException(400,'data not saving: '.$msg );
		        $this->error = $msg;
		        $this->datosErrores[]=$idemp;
			   }
	  
     }else{
          $this->SiCatedras ="<font color='#129232'>Detalles : Registros que <strong>SI TIENEN CATEDRAS</strong> 
		  en la Facultad <strong>".$Facultades->FACU_NOMBRE."</strong> en el periodo actual</font>";
		  $this->docSiCateInFacult[]=$idemp;
		  $Catedra = Catedras::model()->findByPk($query['CATE_ID']);
		  $Catedra->CATE_NUMHORAS = $horas;
		  $Catedra->CATE_VALORHORA = $Categorias->CATE_VALOR;
		  $Catedra->CATE_ARCHIVO = 0;
		  $Catedra->CATE_FECHACAMBIO = date('Y-m-d');
	      $Catedra->CATE_REGISTRADOPOR = Yii::app()->user->id;
	      if($Catedra->save()){
		   $Catedra->defaultDescuentosMensuales($Catedra->CATE_ID);
		   $this->docSiCateInFacultAct[]=$idemp;
		  }else{
		        $msg = print_r($Catedra->getErrors(),1);
                throw new CHttpException(400,'data not saving: '.$msg );
		        $this->error = $msg;
		        $this->datosErrores[]=$idemp;
			   }
		  }
    }
   }
  }
 
}