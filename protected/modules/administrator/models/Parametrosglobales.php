<?php

/**
 * Esta es la clase de modelo para la tabla "TBL_NOMPARAMETROSGLOBALES".
 *
 * Las siguientes son las columnas disponibles en la tabla 'TBL_NOMPARAMETROSGLOBALES':
 * @Propiedad integer $PAGL_ID
 * @Propiedad string $PAGL_NOMBRE
 * @Propiedad string $PAGL_FECHACAMBIO
 * @Propiedad integer $PAGL_REGISTRADOPOR
 *
 * Las siguientes son las relaciones de modelo disponibles:
 * @Propiedad PARAMETROSGLOBALESVALORES[] $pARAMETROSGLOBALESVALORESs
 */
class Parametrosglobales extends CActiveRecord
{
	/**
	 * @Devuelve el modelo estático de la clase AR especificado. 
	 * @param string $ className activo nombre de la clase de registro. 
	 * @Devuelve Parametrosglobales la clase del modelo estàtico.
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @Devuelve cadena el nombre de tabla de base de datos asociado
	 */
	public function tableName()
	{
		return 'TBL_NOMPARAMETROSGLOBALES';
	}

	/**
	 * @Devuelve las reglas de validación de matriz para los atributos de modelo.
	 */
	public function rules()
	{
	  //NOTA: sólo se debe definir reglas para los atributos que
      //van a recibir las entradas de los usuarios.
		return array(
			array('PAGL_NOMBRE, PAGL_FECHACAMBIO, PAGL_REGISTRADOPOR', 'required'),
			array('PAGL_REGISTRADOPOR', 'numerical', 'integerOnly'=>true),
			array('PAGL_NOMBRE', 'length', 'max'=>200),
			//La siguiente regla es utilizada por search ().
            //Por favor, elimine los atributos que no se deben buscar.
			array('PAGL_ID, PAGL_NOMBRE, PAGL_FECHACAMBIO, PAGL_REGISTRADOPOR', 'safe', 'on'=>'search'),
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
			'pARAMETROSGLOBALESVALORESs' => array(self::HAS_MANY, 'PARAMETROSGLOBALESVALORES', 'PAGL_ID'),
		);
	}

	/**
	 * @Devuelve matriz personalizados etiquetas de atributos  (nombre => etiqueta)
	 */
	public function attributeLabels()
	{
		return array(
						'PAGL_ID' => 'PAGL',
						'PAGL_NOMBRE' => 'PAGL NOMBRE',
						'PAGL_FECHACAMBIO' => 'PAGL FECHACAMBIO',
						'PAGL_REGISTRADOPOR' => 'PAGL REGISTRADOPOR',
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

		$criteria->compare('PAGL_ID',$this->PAGL_ID);
		$criteria->compare('PAGL_NOMBRE',$this->PAGL_NOMBRE,true);
		$criteria->compare('PAGL_FECHACAMBIO',$this->PAGL_FECHACAMBIO,true);
		$criteria->compare('PAGL_REGISTRADOPOR',$this->PAGL_REGISTRADOPOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getParametrosglobales($anio){
        $connection = Yii::app()->db;
		$sql='SELECT  pgv."PAGV_ANIO", pg."PAGL_ID", pg."PAGL_NOMBRE", pgv."PAGV_VALOR" 
		      FROM "TBL_NOMPARAMETROSGLOBALES" pg, "TBL_NOMPARAMETROSGLOBALESVALORES" pgv   
	  	      WHERE pg."PAGL_ID" = pgv."PAGL_ID" AND pgv."PAGV_ANIO" = '.$anio.'';
		
        $rows = $connection->createCommand($sql)->queryAll();
        
		if(count($rows)==0){
        $sql = 'SELECT  pgv."PAGV_ANIO", pg."PAGL_ID", pg."PAGL_NOMBRE", pgv."PAGV_VALOR" 
		      FROM "TBL_NOMPARAMETROSGLOBALES" pg, "TBL_NOMPARAMETROSGLOBALESVALORES" pgv   
	  	      WHERE pg."PAGL_ID" = pgv."PAGL_ID" AND pgv."PAGV_ANIO" = (SELECT pgv."PAGV_ANIO" FROM "TBL_NOMPARAMETROSGLOBALESVALORES" pgv ORDER BY pgv."PAGV_ANIO" DESC LIMIT 1)';		 
		  
		  $rows = $connection->createCommand($sql)->queryAll();
        }
		$i = 0;        
		foreach($rows as $row){
         $parametroGlobales[$i][0] = $row["PAGV_ANIO"];
         $parametroGlobales[$i][1] = $row["PAGL_ID"];
         $parametroGlobales[$i][2] = $row["PAGL_NOMBRE"];
         $parametroGlobales[$i][3] = $row["PAGV_VALOR"];
        $i++;
		}
        return $parametroGlobales;   
    }
}