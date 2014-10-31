<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_CATPERSONASGENERALES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_CATPERSONASGENERALES':
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
 * @Propiedad integer $TIID_ID
 * @Propiedad integer $SALU_ID
 * @Propiedad integer $PENS_ID
 * @Propiedad integer $SIND_ID
 * @Propiedad integer $SEXO_ID
 * @Propiedad integer $CATE_ID
 * @Propiedad string $PEGE_FECHACAMBIO
 * @Propiedad integer $PEGE_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad CATEGORIAS $cATE
 * @Propiedad PENSION $pENS
 * @Propiedad SALUD $sALU
 * @Propiedad SEXOS $sEXO
 * @Propiedad SINDICATOS $sIND
 */
class Personasgenerales extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Personasgenerales la clase del modelo estàtico.
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve CDbConnection conexiòn a la base de datos.
	 */
	public static $db3; 
	public function getDbConnection()
	{ 
	 if(self::$db3 !== null){ 
	  return self::$db3; 
	 }else{ 
	       self::$db3 = Yii::app()->db3; 
	       if (self::$db3 instanceof CDbConnection)
	       { 
		    self::$db3->setActive(true); 
			return self::$db3; 
	       }else{  
		         throw new CDbException(Yii::t('yii','Active Record requires a "db3" CDbConnection application component.')); 
	            } 
	      } 
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_CATPERSONASGENERALES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('SALU_ID, PENS_ID, SIND_ID, SEXO_ID, PEGE_FECHACAMBIO, PEGE_REGISTRADOPOR', 'required'),
			array('TIID_ID, SALU_ID, PENS_ID, SIND_ID, SEXO_ID, CATE_ID, PEGE_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS, PEGE_TELEFONOFIJO, PEGE_TELEFONOMOVIL, PEGE_LUGAREXPEDIDENTIDAD', 'length', 'max'=>20),
			array('PEGE_DIRECCION', 'length', 'max'=>500),
			array('PEGE_EMAIL,', 'length', 'max'=>100),
			array('PEGE_NUMEROCUENTA', 'length', 'max'=>25),
			array('PEGE_FECHAINGRESO, PEGE_FECHANACIMIENTO, PEGE_FECHAEXPEDIDENTIDAD', 'safe'),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PEGE_ID, PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS, 
			PEGE_FECHAINGRESO, PEGE_DIRECCION, PEGE_TELEFONOFIJO, PEGE_TELEFONOMOVIL, PEGE_EMAIL, PEGE_NUMEROCUENTA, 
			PEGE_FECHANACIMIENTO, PEGE_LUGAREXPEDIDENTIDAD, PEGE_FECHAEXPEDIDENTIDAD, TIID_ID, SALU_ID, PENS_ID, 
			SIND_ID, SEXO_ID, CATE_ID, PEGE_FECHACAMBIO, PEGE_REGISTRADOPOR', 'safe', 'on'=>'search'),
			
			array('PEGE_ID, PEGE_IDENTIFICACION, PEGE_PRIMERNOMBRE, PEGE_SEGUNDONOMBRE, PEGE_PRIMERAPELLIDO, PEGE_SEGUNDOAPELLIDOS, 
			PEGE_FECHAINGRESO, PEGE_DIRECCION, PEGE_TELEFONOFIJO, PEGE_TELEFONOMOVIL, PEGE_EMAIL, PEGE_NUMEROCUENTA, 
			PEGE_FECHANACIMIENTO, PEGE_LUGAREXPEDIDENTIDAD, PEGE_FECHAEXPEDIDENTIDAD, TIID_ID, SALU_ID, PENS_ID, 
			SIND_ID, SEXO_ID, CATE_ID, PEGE_FECHACAMBIO, PEGE_REGISTRADOPOR', 'safe', 'on'=>'buscar'),
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
			'cATE' => array(self::BELONGS_TO, 'CATEGORIAS', 'CATE_ID'),
			'pENS' => array(self::BELONGS_TO, 'PENSION', 'PENS_ID'),
			'sALU' => array(self::BELONGS_TO, 'SALUD', 'SALU_ID'),
			'sEXO' => array(self::BELONGS_TO, 'SEXOS', 'SEXO_ID'),
			'sIND' => array(self::BELONGS_TO, 'SINDICATOS', 'SIND_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'PEGE_ID' => 'PEGE',
						'PEGE_IDENTIFICACION' => 'No. IDENTIFICACION',
						'PEGE_PRIMERNOMBRE' => 'NOMBRE',
						'PEGE_SEGUNDONOMBRE' => 'SEGUNDO NOMBRE',
						'PEGE_PRIMERAPELLIDO' => 'APELLIDO',
						'PEGE_SEGUNDOAPELLIDOS' => 'SEGUNDO APELLIDO',
						'PEGE_FECHAINGRESO' => 'F. INGRESO',
						'PEGE_DIRECCION' => 'DIRECCION',
						'PEGE_TELEFONOFIJO' => 'TELEFONO FIJO',
						'PEGE_TELEFONOMOVIL' => 'TELEFONO MOVIL',
						'PEGE_EMAIL' => 'EMAIL',
						'PEGE_NUMEROCUENTA' => 'N. CUENTA',
						'PEGE_FECHANACIMIENTO' => 'F. NACIMIENTO',
						'PEGE_LUGAREXPEDIDENTIDAD' => 'LUGAR EXPEDICION IDENTIDAD',
						'PEGE_FECHAEXPEDIDENTIDAD' => 'FECHA EXPEDICION IDENTIDAD',
						'TIID_ID' => 'TIPO IDENTIFICACION',
						'SALU_ID' => 'SALUD',
						'PENS_ID' => 'PENSION',
						'SIND_ID' => 'SINDICATO',
						'SEXO_ID' => 'SEXO',
						'CATE_ID' => 'CATEGORIA',
						'PEGE_FECHACAMBIO' => 'PEGE FECHACAMBIO',
						'PEGE_REGISTRADOPOR' => 'PEGE REGISTRADOPOR',
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
		$criteria->compare('"TIID_ID"',$this->TIID_ID);
		$criteria->compare('"SALU_ID"',$this->SALU_ID);
		$criteria->compare('"PENS_ID"',$this->PENS_ID);
		$criteria->compare('"SIND_ID"',$this->SIND_ID);
		$criteria->compare('"SEXO_ID"',$this->SEXO_ID);
		$criteria->compare('"CATE_ID"',$this->CATE_ID);
		$criteria->compare('"PEGE_FECHACAMBIO"',$this->PEGE_FECHACAMBIO,true);
		$criteria->compare('"PEGE_REGISTRADOPOR"',$this->PEGE_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function buscar()
	{
		//Advertencia: Por favor, modifique el siguiente código para quitar atributos que
        //No debe ser buscado.

		$criteria=new CDbCriteria;
		$criteria->select = 't.*b';

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
		$criteria->compare('"TIID_ID"',$this->TIID_ID);
		$criteria->compare('"SALU_ID"',$this->SALU_ID);
		$criteria->compare('"PENS_ID"',$this->PENS_ID);
		$criteria->compare('"SIND_ID"',$this->SIND_ID);
		$criteria->compare('"SEXO_ID"',$this->SEXO_ID);
		$criteria->compare('"CATE_ID"',$this->CATE_ID);
		$criteria->compare('"PEGE_FECHACAMBIO"',$this->PEGE_FECHACAMBIO,true);
		$criteria->compare('"PEGE_REGISTRADOPOR"',$this->PEGE_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getLink()
	{
		$imageUrl = 'ir.png';
        return Yii::app()->baseurl.'/images/'.$imageUrl;		
	}
}