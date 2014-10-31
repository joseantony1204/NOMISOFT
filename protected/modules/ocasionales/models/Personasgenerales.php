<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMPERSONASGENERALES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMPERSONASGENERALES':
 * @Propiedad integer $PEGE_ID
 * @Propiedad string $PEGE_IDENTIFICACION
 * @Propiedad string $PEGE_PRIMERNOMBRE
 * @Propiedad string $PEGE_SEGUNDONOMBRE
 * @Propiedad string $PEGE_PRIMERAPELLIDO
 * @Propiedad string $PEGE_SEGUNDOAPELLIDOS
 * @Propiedad string $PEGE_FECHAINGRESO
 * @Propiedad string $PEGE_DIRECCION
 * @Propiedad string $PEGE_TELEFONOFIJO
 * @Propiedad string $PEGE_TELEFONOMOVIL
 * @Propiedad string $PEGE_EMAIL
 * @Propiedad string $PEGE_NUMEROCUENTA
 * @Propiedad string $PEGE_FECHANACIMIENTO
 * @Propiedad string $PEGE_LUGAREXPEDIDENTIDAD
 * @Propiedad string $PEGE_FECHAEXPEDIDENTIDAD
 * @Propiedad string $PEGE_FOTO
 * @Propiedad integer $TIID_ID
 * @Propiedad integer $SALU_ID
 * @Propiedad integer $PENS_ID
 * @Propiedad integer $SIND_ID
 * @Propiedad integer $SEXO_ID
 * @Propiedad integer $PAIS_ID
 * @Propiedad integer $DEPA_ID
 * @Propiedad integer $MUNI_ID
 * @Propiedad integer $GRSA_ID
 * @Propiedad integer $ESCI_ID
 * @Propiedad integer $CESA_ID
 * @Propiedad string $PEGE_FECHACAMBIO
 * @Propiedad integer $PEGE_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad DEPARTAMENTOS $dEPA
 * @Propiedad ESTADOSCIVILES $eSCI
 * @Propiedad GRUPOSSANGUINEOS $gRSA
 * @Propiedad MUNICIPIOS $mUNI
 * @Propiedad PAISES $pAIS
 * @Propiedad PENSION $pENS
 * @Propiedad SALUD $sALU
 * @Propiedad SEXOS $sEXO
 * @Propiedad SINDICATOS $sIND
 * @Propiedad TIPOSIDENTIFICACION $tIID
 * @Propiedad CESANTIAS $cESA
 */
class Personasgenerales extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Personasgenerales la clase del modelo estàtico.
	 */
	public $Personageneral, $Empleoplanta, $Estadoempleoplanta, $Factorsalarial, $Horasextrasyrecargos;
	public $Primatecnica, $Gastorepresentacion, $Tipocargo, $Sindicato, $Unidad, $Cesantias;	
	public $ESEP_FECHAREGISTRO;	
	public $PEG_ID, $PEG_IDENTIFICACION, $PEG_PRIMERNOMBRE, $PEG_SEGUNDONOMBRE, $PEG_PRIMERAPELLIDO, $PEG_SEGUNDOAPELLIDOS, $EMPL_CARGO, $EMPL_ID;	
	
	public $TICA_ID;	
	 
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
		return 'TBL_NOMPERSONASGENERALES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_PRIMERAPELLIDO, TIID_ID, SALU_ID, PENS_ID, SIND_ID, SEXO_ID, CESA_ID, PEGE_FECHACAMBIO, PEGE_REGISTRADOPOR', 'required'),
			array('TIID_ID, SALU_ID, PENS_ID, SIND_ID, SEXO_ID, PAIS_ID, DEPA_ID, MUNI_ID, GRSA_ID, ESCI_ID, CESA_ID, PEGE_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS, PEGE_TELEFONOFIJO, PEGE_TELEFONOMOVIL, PEGE_LUGAREXPEDIDENTIDAD', 'length', 'max'=>20),
			array('PEGE_DIRECCION', 'length', 'max'=>500),
			array('PEGE_IDENTIFICACION','unique'),
			array('PEGE_EMAIL', 'length', 'max'=>100),
			array('PEGE_EMAIL', 'email',),
			array('PEGE_FOTO', 'file','types'=>'jpg, png', 'allowEmpty'=>true, 'on'=>'update'),
			array('PEGE_NUMEROCUENTA', 'length', 'max'=>25),
			array('PEGE_FECHAINGRESO, PEGE_FECHANACIMIENTO, PEGE_FECHAEXPEDIDENTIDAD, PEGE_FOTO', 'safe'),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PEGE_ID, PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, 
				   PEGE_SEGUNDOAPELLIDOS, PEGE_FECHAINGRESO, PEGE_DIRECCION, PEGE_TELEFONOFIJO, PEGE_TELEFONOMOVIL, 
				   PEGE_EMAIL, PEGE_NUMEROCUENTA, PEGE_FECHANACIMIENTO, PEGE_LUGAREXPEDIDENTIDAD, 
				   PEGE_FECHAEXPEDIDENTIDAD, PEGE_FOTO, TIID_ID, SALU_ID, PENS_ID, SIND_ID, SEXO_ID, PAIS_ID, 
				   DEPA_ID, MUNI_ID, GRSA_ID, ESCI_ID, CESA_ID, PEGE_FECHACAMBIO, PEGE_REGISTRADOPOR, 
				   ESEP_FECHAREGISTRO, TICA_ID', 'safe', 'on'=>'search'),
			
			array('PEGE_ID, PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS, PEGE_FECHAINGRESO, PEGE_DIRECCION, PEGE_TELEFONOFIJO, PEGE_TELEFONOMOVIL, PEGE_EMAIL, PEGE_NUMEROCUENTA, PEGE_FECHANACIMIENTO, PEGE_LUGAREXPEDIDENTIDAD, PEGE_FECHAEXPEDIDENTIDAD, PEGE_FOTO, TIID_ID, SALU_ID, PENS_ID, SIND_ID, SEXO_ID, PAIS_ID, DEPA_ID, MUNI_ID, GRSA_ID, ESCI_ID, CESA_ID, PEGE_FECHACAMBIO, PEGE_REGISTRADOPOR, ESEP_FECHAREGISTRO', 'safe', 'on'=>'retirados'),
			
			array('PEG_ID, PEG_IDENTIFICACION, PEG_PRIMERNOMBRE, PEG_SEGUNDONOMBRE, PEG_PRIMERAPELLIDO, PEG_SEGUNDOAPELLIDOS', 'safe', 'on'=>'buscar'),
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
			'dEPA' => array(self::BELONGS_TO, 'DEPARTAMENTOS', 'DEPA_ID'),
			'eSCI' => array(self::BELONGS_TO, 'ESTADOSCIVILES', 'ESCI_ID'),
			'gRSA' => array(self::BELONGS_TO, 'GRUPOSSANGUINEOS', 'GRSA_ID'),
			'mUNI' => array(self::BELONGS_TO, 'MUNICIPIOS', 'MUNI_ID'),
			'pAIS' => array(self::BELONGS_TO, 'PAISES', 'PAIS_ID'),
			'pENS' => array(self::BELONGS_TO, 'PENSION', 'PENS_ID'),
			'sALU' => array(self::BELONGS_TO, 'SALUD', 'SALU_ID'),
			'sEXO' => array(self::BELONGS_TO, 'SEXOS', 'SEXO_ID'),
			'sIND' => array(self::BELONGS_TO, 'SINDICATOS', 'SIND_ID'),
			'tIID' => array(self::BELONGS_TO, 'TIPOSIDENTIFICACION', 'TIID_ID'),
			'cESA' => array(self::BELONGS_TO, 'Cesantias', 'CESA_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'PEGE_ID' => 'ID',
						'PEGE_IDENTIFICACION' => 'No. IDENTIFICACION',
						'PEGE_PRIMERNOMBRE' => 'NOMBRE',
						'PEGE_SEGUNDONOMBRE' => 'SEGUNDO NOMBRE',
						'PEGE_PRIMERAPELLIDO' => 'APELLIDO',
						'PEGE_SEGUNDOAPELLIDOS' => 'SEGUNDO APELLIDO',
						'PEGE_FECHAINGRESO' => 'F. INGRESO',
						'PEGE_DIRECCION' => 'DIRECCION',
						'PEGE_TELEFONOFIJO' => 'TELEFONO FIJO',
						'PEGE_TELEFONOMOVIL' => 'TELEFONO MOVIL',
						'PEGE_EMAIL' => 'CORREO ELECTRONICO',
						'PEGE_NUMEROCUENTA' => 'N. CUENTA',
						'PEGE_FECHANACIMIENTO' => 'F. NACIMIENTO',
						'PEGE_FECHANACIMIENTO' => 'F. NACIMIENTO',
						'PEGE_FECHANACIMIENTO' => 'F. NACIMIENTO',
						'PEGE_LUGAREXPEDIDENTIDAD' => 'LUGAR EXPEDICION IDENTIDAD',
						'PEGE_FECHAEXPEDIDENTIDAD' => 'FECHA EXPEDICION IDENTIDAD',
						'PEGE_FOTO' => 'FOTO',
						'TIID_ID' => 'TIPO IDENTIFICACION',
						'SALU_ID' => 'SALUD',
						'PENS_ID' => 'PENSION',
						'SIND_ID' => 'SINDICATO',
						'SEXO_ID' => 'SEXO',
						'PAIS_ID' => 'PAIS',
						'DEPA_ID' => 'DEPARTAMENTO',
						'MUNI_ID' => 'MUNICIPIO',
						'GRSA_ID' => 'GRUPO SANGUINEO',
						'ESCI_ID' => 'ESTADO CIVIL',
						'CESA_ID' => 'CESANTIAS',
						'PEGE_FECHACAMBIO' => 'FECHA CAMBIO',
						'PEGE_REGISTRADOPOR' => 'REGISTRADO POR',
						
						'ESEP_FECHAREGISTRO' => 'F. RETIRO',
						
						'PEG_ID' => 'ID',
						'PEG_IDENTIFICACION' => 'No. IDENTIFICACION',
						'PEG_PRIMERNOMBRE' => 'NOMBRE',
						'PEG_SEGUNDONOMBRE' => 'SEGUNDO NOMBRE',
						'PEG_PRIMERAPELLIDO' => 'APELLIDO',
						'PEG_SEGUNDOAPELLIDOS' => 'SEGUNDO APELLIDO',
						'EMPL_CARGO' => 'CARGO',
						
						'TICA_ID' => 'TIPO DE CARGO',
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
		$sort->defaultOrder = '"PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS" ASC';
		$sort->attributes = array(			
			'PEGE_IDENTIFICACION'=>array(
				'asc'=>'"PEGE_IDENTIFICACION"',
				'desc'=>'"PEGE_IDENTIFICACION" desc',
			),
			
			'PEGE_PRIMERNOMBRE'=>array(
				'asc'=>'"PEGE_PRIMERNOMBRE"',
				'desc'=>'"PEGE_PRIMERNOMBRE" desc',
			),
			
			'PEGE_SEGUNDONOMBRE'=>array(
				'asc'=>'"PEGE_SEGUNDONOMBRE"',
				'desc'=>'"PEGE_SEGUNDONOMBRE" desc',
			),
			
			'PEGE_PRIMERAPELLIDO'=>array(
				'asc'=>'"PEGE_PRIMERAPELLIDO"',
				'desc'=>'"PEGE_PRIMERAPELLIDO" desc',
			),
			
			'PEGE_SEGUNDOAPELLIDOS'=>array(
				'asc'=>'"PEGE_SEGUNDOAPELLIDOS"',
				'desc'=>'"PEGE_SEGUNDOAPELLIDOS" desc',
			),
			
			'PEGE_FECHAINGRESO'=>array(
				'asc'=>'"PEGE_FECHAINGRESO"',
				'desc'=>'"PEGE_FECHAINGRESO" desc',
			),
			
			'PEGE_NUMEROCUENTA'=>array(
				'asc'=>'"PEGE_NUMEROCUENTA"',
				'desc'=>'"PEGE_NUMEROCUENTA" desc',
			),
			
		);

		$criteria=new CDbCriteria;
        
		$criteria->select = '* FROM (SELECT t.* , (SELECT eep."ESEM_ID"
									 FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
									 WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = t."PEGE_ID"
									 ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
									 LIMIT 1 
									) AS "ESEM_ID", (SELECT  ep."TICA_ID"
                                     FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep
                                     WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = t."PEGE_ID"
                                     ORDER BY eep."ESEP_FECHAREGISTRO" DESC
                                     LIMIT 1
                                    ) AS "TICA_ID"';
		$criteria->join = ' 
		                   INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON t."PEGE_ID" = ep."PEGE_ID"  						  
						  '; 
		$criteria->group = 't."PEGE_ID") s WHERE "ESEM_ID" = 1';
		
		$criteria->compare('"PEGE_ID"',$this->PEGE_ID);
		$criteria->compare('"PEGE_IDENTIFICACION"',$this->PEGE_IDENTIFICACION,true);
		$criteria->compare('"PEGE_PRIMERNOMBRE"',$this->PEGE_PRIMERNOMBRE,true);
		$criteria->compare('"PEGE_SEGUNDONOMBRE"',$this->PEGE_SEGUNDONOMBRE,true);
		$criteria->compare('"PEGE_PRIMERAPELLIDO"',$this->PEGE_PRIMERAPELLIDO,true);
		$criteria->compare('"PEGE_SEGUNDOAPELLIDOS"',$this->PEGE_SEGUNDOAPELLIDOS,true);
		$criteria->compare('"PEGE_FECHAINGRESO"',$this->PEGE_FECHAINGRESO,true);
		$criteria->compare('"PEGE_DIRECCION"',$this->PEGE_DIRECCION,true);
		$criteria->compare('"PEGE_TELEFONOFIJO"',$this->PEGE_TELEFONOFIJO,true);
		$criteria->compare('"PEGE_TELEFONOMOVIL"',$this->PEGE_TELEFONOMOVIL,true);
		$criteria->compare('"PEGE_EMAIL"',$this->PEGE_EMAIL,true);
		$criteria->compare('"PEGE_NUMEROCUENTA"',$this->PEGE_NUMEROCUENTA,true);
		$criteria->compare('"PEGE_FECHANACIMIENTO"',$this->PEGE_FECHANACIMIENTO,true);
		$criteria->compare('"PEGE_LUGAREXPEDIDENTIDAD"',$this->PEGE_LUGAREXPEDIDENTIDAD,true);
		$criteria->compare('"PEGE_FECHAEXPEDIDENTIDAD"',$this->PEGE_FECHAEXPEDIDENTIDAD,true);
		$criteria->compare('"PEGE_FOTO"',$this->PEGE_FOTO,true);
		$criteria->compare('"TIID_ID"',$this->TIID_ID);
		$criteria->compare('"SALU_ID"',$this->SALU_ID);
		$criteria->compare('"PENS_ID"',$this->PENS_ID);
		$criteria->compare('"SIND_ID"',$this->SIND_ID);
		$criteria->compare('"SEXO_ID"',$this->SEXO_ID);
		$criteria->compare('"PAIS_ID"',$this->PAIS_ID);
		$criteria->compare('"DEPA_ID"',$this->DEPA_ID);
		$criteria->compare('"MUNI_ID"',$this->MUNI_ID);
		$criteria->compare('"GRSA_ID"',$this->GRSA_ID);
		$criteria->compare('"ESCI_ID"',$this->ESCI_ID);
		$criteria->compare('"CESA_ID"',$this->CESA_ID);
		$criteria->compare('"PEGE_FECHACAMBIO"',$this->PEGE_FECHACAMBIO,true);
		$criteria->compare('"PEGE_REGISTRADOPOR"',$this->PEGE_REGISTRADOPOR);
		$criteria->compare('"TICA_ID"',$this->TICA_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>$sort,
			'pagination' => array('pageSize' => 50),
			
		));
	}
	
	public function retirados()
	{
		//Advertencia: Por favor, modifique el siguiente código para quitar atributos que
        //No debe ser buscado.
		
		$sort = new CSort();
		$sort->defaultOrder = '"PEGE_PRIMERAPELLIDO", "PEGE_SEGUNDOAPELLIDOS" ASC';
		$sort->attributes = array(			
			'PEGE_IDENTIFICACION'=>array(
				'asc'=>'"PEGE_IDENTIFICACION"',
				'desc'=>'"PEGE_IDENTIFICACION" desc',
			),
			
			'PEGE_PRIMERNOMBRE'=>array(
				'asc'=>'"PEGE_PRIMERNOMBRE"',
				'desc'=>'"PEGE_PRIMERNOMBRE" desc',
			),
			
			'PEGE_SEGUNDONOMBRE'=>array(
				'asc'=>'"PEGE_SEGUNDONOMBRE"',
				'desc'=>'"PEGE_SEGUNDONOMBRE" desc',
			),
			
			'PEGE_PRIMERAPELLIDO'=>array(
				'asc'=>'"PEGE_PRIMERAPELLIDO"',
				'desc'=>'"PEGE_PRIMERAPELLIDO" desc',
			),
			
			'PEGE_SEGUNDOAPELLIDOS'=>array(
				'asc'=>'"PEGE_SEGUNDOAPELLIDOS"',
				'desc'=>'"PEGE_SEGUNDOAPELLIDOS" desc',
			),
			
			'PEGE_FECHAINGRESO'=>array(
				'asc'=>'"PEGE_FECHAINGRESO"',
				'desc'=>'"PEGE_FECHAINGRESO" desc',
			),
			
			'PEGE_NUMEROCUENTA'=>array(
				'asc'=>'"PEGE_NUMEROCUENTA"',
				'desc'=>'"PEGE_NUMEROCUENTA" desc',
			),
			
		);

		$criteria=new CDbCriteria;
        
		$criteria->select = '* FROM (SELECT t.* , (SELECT eep."ESEM_ID"
									 FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
									 WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = t."PEGE_ID"
									 ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
									 LIMIT 1 
									) AS "ESEM_ID",
									
									(SELECT eep."ESEP_FECHAREGISTRO"
									 FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
									 WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = t."PEGE_ID"
									 ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
									 LIMIT 1 
									) AS "ESEP_FECHAREGISTRO"';
		$criteria->join = ' 
		                   INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON t."PEGE_ID" = ep."PEGE_ID"  						  
						  '; 
		$criteria->group = 't."PEGE_ID" ) s WHERE "ESEM_ID" !=1';
		
		$criteria->compare('"PEGE_ID"',$this->PEGE_ID);
		$criteria->compare('"PEGE_IDENTIFICACION"',$this->PEGE_IDENTIFICACION,true);
		$criteria->compare('"PEGE_PRIMERNOMBRE"',$this->PEGE_PRIMERNOMBRE,true);
		$criteria->compare('"PEGE_SEGUNDONOMBRE"',$this->PEGE_SEGUNDONOMBRE,true);
		$criteria->compare('"PEGE_PRIMERAPELLIDO"',$this->PEGE_PRIMERAPELLIDO,true);
		$criteria->compare('"PEGE_SEGUNDOAPELLIDOS"',$this->PEGE_SEGUNDOAPELLIDOS,true);
		$criteria->compare('"PEGE_FECHAINGRESO"',$this->PEGE_FECHAINGRESO,true);
		$criteria->compare('"PEGE_DIRECCION"',$this->PEGE_DIRECCION,true);
		$criteria->compare('"PEGE_TELEFONOFIJO"',$this->PEGE_TELEFONOFIJO,true);
		$criteria->compare('"PEGE_TELEFONOMOVIL"',$this->PEGE_TELEFONOMOVIL,true);
		$criteria->compare('"PEGE_EMAIL"',$this->PEGE_EMAIL,true);
		$criteria->compare('"PEGE_NUMEROCUENTA"',$this->PEGE_NUMEROCUENTA,true);
		$criteria->compare('"PEGE_FECHANACIMIENTO"',$this->PEGE_FECHANACIMIENTO,true);
		$criteria->compare('"PEGE_LUGAREXPEDIDENTIDAD"',$this->PEGE_LUGAREXPEDIDENTIDAD,true);
		$criteria->compare('"PEGE_FECHAEXPEDIDENTIDAD"',$this->PEGE_FECHAEXPEDIDENTIDAD,true);
		$criteria->compare('"PEGE_FOTO"',$this->PEGE_FOTO,true);
		$criteria->compare('"TIID_ID"',$this->TIID_ID);
		$criteria->compare('"SALU_ID"',$this->SALU_ID);
		$criteria->compare('"PENS_ID"',$this->PENS_ID);
		$criteria->compare('"SIND_ID"',$this->SIND_ID);
		$criteria->compare('"SEXO_ID"',$this->SEXO_ID);
		$criteria->compare('"PAIS_ID"',$this->PAIS_ID);
		$criteria->compare('"DEPA_ID"',$this->DEPA_ID);
		$criteria->compare('"MUNI_ID"',$this->MUNI_ID);
		$criteria->compare('"GRSA_ID"',$this->GRSA_ID);
		$criteria->compare('"ESCI_ID"',$this->ESCI_ID);
		$criteria->compare('"CESA_ID"',$this->CESA_ID);
		$criteria->compare('"PEGE_FECHACAMBIO"',$this->PEGE_FECHACAMBIO,true);
		$criteria->compare('"PEGE_REGISTRADOPOR"',$this->PEGE_REGISTRADOPOR);
		
		$criteria->compare('"ESEP_FECHAREGISTRO"',$this->ESEP_FECHAREGISTRO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>$sort,
			'pagination' => array('pageSize' => 50),
			
		));
	}
	
	public function buscar()
	{
		//Advertencia: Por favor, modifique el siguiente código para quitar atributos que
        //No debe ser buscado.
		$sort = new CSort();
		$sort->attributes = array(
			'defaultOrder'=>'t.PEG_PRIMERNOMBRE ASC',
			
			'PEG_IDENTIFICACION'=>array(
				'asc'=>'t."PEG_IDENTIFICACION"',
				'desc'=>'t."PEG_IDENTIFICACION" desc',
			),
			
			'PEG_PRIMERNOMBRE'=>array(
				'asc'=>'t."PEG_PRIMERNOMBRE"',
				'desc'=>'t."PEG_PRIMERNOMBRE" desc',
			),
			
			'PEG_SEGUNDONOMBRE'=>array(
				'asc'=>'t."PEG_SEGUNDONOMBRE"',
				'desc'=>'t."PEG_SEGUNDONOMBRE" desc',
			),
			
			'PEG_PRIMERAPELLIDO'=>array(
				'asc'=>'t."PEG_PRIMERAPELLIDO"',
				'desc'=>'t."PEG_PRIMERAPELLIDO" desc',
			),
			
			'PEG_SEGUNDOAPELLIDOS'=>array(
				'asc'=>'t."PEG_SEGUNDOAPELLIDOS"',
				'desc'=>'t."PEG_SEGUNDOAPELLIDOS" desc',
			),
			
			'EMPL_CARGO'=>array(
				'asc'=>'ep."EMPL_CARGO"',
				'desc'=>'ep."EMPL_CARGO" desc',
			),
        );
		
		$criteria=new CDbCriteria;
        
		$criteria->select = '* FROM (SELECT t."PEGE_ID" AS "PEG_ID", t."PEGE_IDENTIFICACION" AS "PEG_IDENTIFICACION", 
		                             t."PEGE_PRIMERNOMBRE" AS "PEG_PRIMERNOMBRE", t."PEGE_SEGUNDONOMBRE" AS "PEG_SEGUNDONOMBRE",
									 t."PEGE_PRIMERAPELLIDO" AS "PEG_PRIMERAPELLIDO", t."PEGE_SEGUNDOAPELLIDOS" AS "PEG_SEGUNDOAPELLIDOS",
									 (SELECT eep."ESEM_ID"
									 FROM "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMESTADOSEMPLEOSPLANTA" eep 
									 WHERE ep."EMPL_ID" = eep."EMPL_ID" AND ep."PEGE_ID" = t."PEGE_ID"
									 ORDER BY eep."ESEP_FECHAREGISTRO" DESC 
									 LIMIT 1 
									 ) AS "ESEM_ID", ep."EMPL_ID", ep."EMPL_CARGO"';
		$criteria->join = ' 
		                   INNER JOIN "TBL_NOMEMPLEOSPLANTA" ep ON t."PEGE_ID" = ep."PEGE_ID"  						  
						  '; 
		$criteria->group = 't."PEGE_ID", ep."EMPL_ID" ) s WHERE "ESEM_ID" = 1';


		$criteria->compare('t."PEGE_ID"',$this->PEG_ID);
		$criteria->compare('"PEGE_IDENTIFICACION"',$this->PEG_IDENTIFICACION,true);
		$criteria->compare('"PEGE_PRIMERNOMBRE"',$this->PEG_PRIMERNOMBRE,true);
		$criteria->compare('"PEGE_SEGUNDONOMBRE"',$this->PEG_SEGUNDONOMBRE,true);
		$criteria->compare('"PEGE_PRIMERAPELLIDO"',$this->PEG_PRIMERAPELLIDO,true);
		$criteria->compare('"PEGE_SEGUNDOAPELLIDOS"',$this->PEG_SEGUNDOAPELLIDOS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 5,),
		));
	}
	
	public function getLink()
	{
		$imageUrl = 'ir.png';
        return Yii::app()->baseurl.'/images/'.$imageUrl;		
	}
	
	public function defaultFactoresRetefuente($personaGeneral)
	{
     $criteria = new CDbCriteria();
	 $criteria->select = 't."FARE_ID"';
	 $criteria->order = 't."FARE_ID"';
	 $Factoresretefuente = Factoresretefuente::model()->findAll($criteria);	 
	 
	 foreach($Factoresretefuente as  $factor){
	    $Descuentosretefuente = new Descuentosretefuente;
		$Descuentosretefuente->DERE_VALOR = 0;
		$Descuentosretefuente->FARE_ID = $factor->FARE_ID;
		$Descuentosretefuente->PEGE_ID = $personaGeneral;
		$Descuentosretefuente->DERE_FECHACAMBIO = date('Y-m-d H:i:s');
		$Descuentosretefuente->DERE_REGISTRADOPOR = Yii::app()->user->id;
		$Descuentosretefuente->save(); 
	  }
	}
	
	public function defaultDescuentosPrestaciones($personaGeneral)
	{
     $criteria = new CDbCriteria();
	 $criteria->select = 't."DEPR_ID"';
	 $criteria->order = 't."DEPR_ID"';
	 $Descuentosprestaciones = Descuentosprestaciones::model()->findAll($criteria);	 
	 
	 foreach($Descuentosprestaciones as  $elemento){
	    $Novedadesprestaciones = new Novedadesprestaciones;
		$Novedadesprestaciones->NOPR_VALOR = 0;
		$Novedadesprestaciones->DEPR_ID = $elemento->DEPR_ID;
		$Novedadesprestaciones->PEGE_ID = $personaGeneral;
		$Novedadesprestaciones->NOPR_FECHACAMBIO = date('Y-m-d H:i:s');
		$Novedadesprestaciones->NOPR_REGISTRADOPOR = Yii::app()->user->id;
		$Novedadesprestaciones->save(); 
	  }
	}
	
	public function defaultNovedadesPrimaSemestral($Personasgenerales)
	{
	 $Novedadesprimasemestral = new Novedadesprimasemestral;	 
	 $fechaCorte = date("Y")."-06-30";
	 $Novedadesprimasemestral->PEGE_ID = $Personasgenerales->PEGE_ID;
	 $Novedadesprimasemestral->NOPS_CONTINUIDAD = 1;
	 $Novedadesprimasemestral->NOPS_FECHAINGRESO = $Personasgenerales->PEGE_FECHAINGRESO;
	 $Novedadesprimasemestral->NOPS_MESES = $this->mesesPrimas($Personasgenerales->PEGE_FECHAINGRESO,$fechaCorte);

	 $Novedadesprimasemestral->NOPS_FECHACAMBIO = date('Y-m-d H:i:s');
	 $Novedadesprimasemestral->NOPS_REGISTRADOPOR = Yii::app()->user->id;
	 $Novedadesprimasemestral->save(); 

	}
	
	public function defaultNovedadesPrimaNavidad($Personasgenerales)
	{
	 $Novedadesprimanavidad = new Novedadesprimanavidad;	 
	 $fechaCorte = date("Y")."-12-30";
	 $Novedadesprimanavidad->PEGE_ID = $Personasgenerales->PEGE_ID;
	 $Novedadesprimanavidad->NOPN_FECHAINGRESO = $Personasgenerales->PEGE_FECHAINGRESO;
	 $Novedadesprimanavidad->NOPN_MESES = $this->mesesPrimas($Personasgenerales->PEGE_FECHAINGRESO,$fechaCorte);

	 $Novedadesprimanavidad->NOPN_FECHACAMBIO = date('Y-m-d H:i:s');
	 $Novedadesprimanavidad->NOPN_REGISTRADOPOR = Yii::app()->user->id;
	 $Novedadesprimanavidad->save(); 

	}
	
	public function defaultNovedadesPrimaVacaciones($Personasgenerales)
	{
	 $Novedadesprimavacaciones = new Novedadesprimavacaciones;	 
	 $fechaCorte = date("Y")."-12-30";
	 $Novedadesprimavacaciones->PEGE_ID = $Personasgenerales->PEGE_ID;
	 $Novedadesprimavacaciones->NOPV_FECHAINGRESO = $Personasgenerales->PEGE_FECHAINGRESO;
	 /*$Novedadesprimavacaciones->NOPV_DIAS = $this->mesesPrimas($Empleosplanta->EMPL_FECHAINGRESO,$fechaCorte);*/
	 $Novedadesprimavacaciones->NOPV_DIAS = 20;

	 $Novedadesprimavacaciones->NOPV_FECHACAMBIO = date('Y-m-d H:i:s');
	 $Novedadesprimavacaciones->NOPV_REGISTRADOPOR = Yii::app()->user->id;
	 $Novedadesprimavacaciones->save(); 

	}
	
	public function defaultNovedadesVacaciones($Personasgenerales)
	{
	 $Novedadesvacaciones = new Novedadesvacaciones;	 
	 $fechaCorte = date("Y")."-12-30";
	 $Novedadesvacaciones->PEGE_ID = $Personasgenerales->PEGE_ID;
	 $Novedadesvacaciones->NOVA_FECHAINGRESO = $Personasgenerales->PEGE_FECHAINGRESO;
	 /*$Novedadesvacaciones->NOVA_DIAS = $this->mesesPrimas($Empleosplanta->EMPL_FECHAINGRESO,$fechaCorte);*/
	 $Novedadesvacaciones->NOVA_DIAS = 23;

	 $Novedadesvacaciones->NOVA_FECHACAMBIO = date('Y-m-d H:i:s');
	 $Novedadesvacaciones->NOVA_REGISTRADOPOR = Yii::app()->user->id;
	 $Novedadesvacaciones->save(); 

	}
	
	public function defaultNovedadesCesantias($Personasgenerales)
	{
	 $NovedadesCesantias = new Novedadescesantias;	 
	 $fechaCorte = date("Y")."-12-30";
	 $NovedadesCesantias->PEGE_ID = $Personasgenerales->PEGE_ID;
	 $NovedadesCesantias->NOCE_FECHAINGRESO = $Personasgenerales->PEGE_FECHAINGRESO;
	 $NovedadesCesantias->NOCE_DIAS = $this->diasPrimas($Personasgenerales->PEGE_FECHAINGRESO,$fechaCorte);

	 $NovedadesCesantias->NOCE_FECHACAMBIO = date('Y-m-d H:i:s');
	 $NovedadesCesantias->NOCE_REGISTRADOPOR = Yii::app()->user->id;
	 $NovedadesCesantias->save(); 
	}
	
	public function defaultNovedadesRetroactivo($Personasgenerales)
	{
	 $Novedadesretroactivo = new Novedadesretroactivo;	 
	 $Novedadesretroactivo->PEGE_ID = $Personasgenerales->PEGE_ID;
	 $Novedadesretroactivo->NORE_FECHAINGRESO = $Personasgenerales->PEGE_FECHAINGRESO;
	 $Novedadesretroactivo->NORE_DIAS = 30;

	 $Novedadesretroactivo->NORE_FECHACAMBIO = date('Y-m-d H:i:s');
	 $Novedadesretroactivo->NORE_REGISTRADOPOR = Yii::app()->user->id;
	 $Novedadesretroactivo->save(); 
	}
		
	public function mesesPrimas($fechaInicio,$fechaCorte)
	{
	 $fechaI = explode ( "-", $fechaInicio); 
     $fechaF = explode ( "-", $fechaCorte);
     $anos = (int)($fechaF[0] - $fechaI[0]); // calculamos años 
     $meses = (int)($fechaF[1] - $fechaI[1])+($anos*12)+1; // calculamos meses 
     if ($meses>12){
	    return  12;
      }elseif($meses<0){
	        $meses=(12+$meses);
	        if($meses<0){
		      return 0;
            }else{
		          return $meses;
	            }
	    }else{ 
		      return $meses;
		    }
    }
	
	public function diasPrimas($fechaInicio,$fechaCorte)
	{
	 $fechaI = explode ( "-", $fechaInicio); 
     $fechaF = explode ( "-", $fechaCorte);
     $anos = (int)($fechaF[0] - $fechaI[0]); /* calculamos años */ 
     $meses = (int)($fechaF[1] - $fechaI[1])+($anos*12); /* calculamos meses */
     $dias = (int)($fechaF[2] - $fechaI[2])+($meses*30)+1; /* calculamos dias */
	
		if ($dias>360){
		 return 360;
		}elseif($dias<0){
		 $dias=(360+$dias);
		if($dias<0){
			return 0;
		 }else{
			   return $dias;
			  }
		 }else{ 
			   return $dias; 
			  }
    }

    public function getAntiguedad($fecha=NULL){
		if ($fecha==NULL){
			$dia=date("j");
			$mes=date("n");
			$ano=date("Y");
		}else{
			$dia="30";
			$mes=substr($fecha,4,2);
			$ano=substr($fecha,0,4);
		}
		$fecha=$this->PEGE_FECHAINGRESO;
		
 		$dianaz=date("j", strtotime($this->PEGE_FECHAINGRESO));
		$mesnaz=date("n", strtotime($this->PEGE_FECHAINGRESO));
		$anonaz=date("Y", strtotime($this->PEGE_FECHAINGRESO));
 		//si el mes es el mismo pero el dÃ­a inferior aun no ha cumplido aÃ±os, le quitaremos un aÃ±o al actual
 		if (($mesnaz == $mes) && ($dianaz > $dia)) {
			$ano=($ano-1); }
 		//si el mes es superior al actual tampoco habrÃ¡ cumplido aÃ±os, por eso le quitamos un aÃ±o al actual
 		if ($mesnaz > $mes) {
			$ano=($ano-1);}
 		//ya no habrÃ­a mas condiciones, ahora simplemente restamos los aÃ±os y mostramos el resultado como su edad
 		$edad=($ano-$anonaz);
 		return $edad;
	}

    public function loadPersonageneral($Personageneral){
	  $connection = Yii::app()->db;
	  $this->Personageneral = NULL;
	  $this->Empleoplanta = NULL;
	  $this->Estadoempleoplanta = NULL;
	  $this->Factorsalarial = NULL;
	  $this->Horasextrasyrecargos = NULL;
	  $this->Primatecnica = NULL;
	  $this->Gastorepresentacion = NULL;
	  $this->Tipocargo = NULL;
	  $this->Sindicato = NULL;
	  $this->Unidad = NULL;
	  
	  /*creamos un registro persona-empleo-estadoempleo por cada empleo encontrado anteriormente*/
	 $string =' SELECT p.*, ep.*, eep.*, f.*, h.*, u.*
	             FROM "TBL_NOMPERSONASGENERALES" "p", "TBL_NOMEMPLEOSPLANTA" "ep", "TBL_NOMESTADOSEMPLEOSPLANTA" "eep", 
	             "TBL_NOMFACTORESSALARIALES" "f", "TBL_NOMHORASEXTRASYRECARGOS" "h", "TBL_NOMUNIDADES" "u"  
			     WHERE p."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = eep."EMPL_ID" AND
			     ep."EMPL_ID" = f."EMPL_ID" AND ep."EMPL_ID" = h."EMPL_ID" AND ep."UNID_ID" = u."UNID_ID"
			     AND p."PEGE_ID" = '.$Personageneral.'
				 ORDER BY eep."ESEP_FECHAREGISTRO" DESC
			     LIMIT 1';	 
	  $sqlQuery = $connection->createCommand($string)->queryRow();
	  
	  /*cargamos todos los modelos disponibles para dicho cargo*/
	  $this->Personageneral = Personasgenerales::model()->findByPk($sqlQuery["PEGE_ID"]);
	  $this->Empleoplanta = Empleosplanta::model()->findByPk($sqlQuery["EMPL_ID"]);
	  $this->Estadoempleoplanta = Estadosempleosplanta::model()->findByPk($sqlQuery["ESEP_ID"]); 
	  $this->Factorsalarial = Factoressalariales::model()->findByPk($sqlQuery["FASA_ID"]);
	  $this->Horasextrasyrecargos = Horasextrasyrecargos::model()->findByPk($sqlQuery["HOER_ID"]);
	  
	  $this->Primatecnica = Primastecnicas::model()->findByPk($sqlQuery["PRTE_ID"]);
	  $this->Gastorepresentacion = Gastosrepresentacion::model()->findByPk($sqlQuery["GARE_ID"]);
	  $this->Tipocargo = Tiposcargos::model()->findByPk($sqlQuery["TICA_ID"]);
	  $this->Sindicato = Sindicatos::model()->findByPk($sqlQuery["SIND_ID"]);	
	  $this->Unidad = Unidades::model()->findByPk($sqlQuery["UNID_ID"]);	
	  $this->Cesantias = Cesantias::model()->findByPk($sqlQuery["CESA_ID"]);	
	}	
}