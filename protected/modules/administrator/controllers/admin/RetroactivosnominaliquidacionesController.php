<?php

class RetroactivosnominaliquidacionesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	 
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
	  if(!Yii::app()->user->getIsGuest())
      {
		$Usuario = Usuarios::model()->findByPk(Yii::app()->user->id);
		$curpage = Yii::app()->getController()->id;
		$controllers = explode('/',$curpage);
		
		$modulos = Yii::app()->user->modulosUsuarios;
		$views = Yii::app()->user->viewsAccesoUsuario($this->module->id,$controllers[0],$controllers[1]);
		foreach($views as $data){
		 $array[] = $data['USVI_URL'];
		}
        return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(''.$array[0].'',''.$array[1].'',''.$array[2].'',''.$array[3].'',''.$array[4].'',''.$array[5].'',
                                 ''.$array[6].'','admin','create','update','totales','detalles','pago','download','mail',
								 'planogeneral','descuento','downdescuento',  
                                 ),
				'users'=>array($Usuario->USUA_USUARIO),
			),			
			array('deny',  // deny all users
				'users'=>array('*'),
			),	
		);
	  }else{ return array( array('deny','users'=>array('*'),),);}
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Retroactivosnominaliquidaciones;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Retroactivosnominaliquidaciones']))
		{
			$model->attributes=$_POST['Retroactivosnominaliquidaciones'];
	        $model->RANL_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->RANL_REGISTRADOPOR = Yii::app()->user->id;			 
			if($model->save())
				$this->redirect(array('admin','id'=>$model->RANL_ID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Retroactivosnominaliquidaciones']))
		{
			$model->attributes=$_POST['Retroactivosnominaliquidaciones'];
			$model->RANL_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->RANL_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->RANL_ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Retroactivosnominaliquidaciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Retroactivosnominaliquidaciones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Retroactivosnominaliquidaciones']))
			$model->attributes=$_GET['Retroactivosnominaliquidaciones'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Retroactivosnominaliquidaciones::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='retroactivosnominaliquidaciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionTotales($retroactivoNomina=NULL)
	{
		$Retroactivosnominaliquidaciones = new Retroactivosnominaliquidaciones('totales');
        $Retroactivosnominaliquidaciones->unsetAttributes();  // clear any default values
		if(isset($_GET['Retroactivosnominaliquidaciones'])){
			$Retroactivosnominaliquidaciones->attributes=$_GET['Retroactivosnominaliquidaciones'];		
		}
		
		if(isset($_POST['cbounidad'])){
			$UNID_ID = $_POST['cbounidad'];
			$Retroactivosnominaliquidaciones->UNID_ID =  $UNID_ID;
        }else{
		      $UNID_ID = 1;
			  $Retroactivosnominaliquidaciones->UNID_ID = $UNID_ID;
			 }
		
		$Retroactivosnominaliquidaciones->RANO_ID = $retroactivoNomina;
		$this->render('totales',array(
			'Retroactivosnominaliquidaciones'=>$Retroactivosnominaliquidaciones,
		));
	}
	
	public function actionDetalles($retroactivoNomina=NULL,$retroactivoNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Retroactivosnominaliquidaciones = new Retroactivosnominaliquidaciones;
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($retroactivoNomina,$retroactivoNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Retroactivosnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('detalles',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Retroactivosnominaliquidaciones'=>$Retroactivosnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'retroactivoNomina'=>$retroactivoNomina,
			'retroactivoNomina2'=>$retroactivoNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanogeneral($retroactivoNomina=NULL,$retroactivoNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Retroactivosnominaliquidaciones = new Retroactivosnominaliquidaciones;
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($retroactivoNomina,$retroactivoNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Retroactivosnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planogeneral',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Retroactivosnominaliquidaciones'=>$Retroactivosnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'retroactivoNomina'=>$retroactivoNomina,
			'retroactivoNomina2'=>$retroactivoNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionMail($retroactivoNomina=NULL,$retroactivoNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Retroactivosnominaliquidaciones = new Retroactivosnominaliquidaciones;
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($retroactivoNomina,$retroactivoNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Retroactivosnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('mail',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Retroactivosnominaliquidaciones'=>$Retroactivosnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'retroactivoNomina'=>$retroactivoNomina,
			'retroactivoNomina2'=>$retroactivoNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'sw'=>$sw,
		));
	}
	
	public function actionPago($retroactivoNomina=NULL,$retroactivoNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		$Retroactivosnominaliquidaciones = new Retroactivosnominaliquidaciones;
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($retroactivoNomina,$retroactivoNomina,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Retroactivosnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('pago',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Retroactivosnominaliquidaciones'=>$Retroactivosnominaliquidaciones,
			'tercero'=>$lista['tercero'],
			'retroactivoNomina'=>$retroactivoNomina,
			'unidad'=>$unidad,
		));
	}
	
	public function actionDownload($retroactivoNomina=NULL,$retroactivoNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		$Retroactivosnominaliquidaciones = new Retroactivosnominaliquidaciones;
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($retroactivoNomina,$retroactivoNomina,$personaGral,$unidad,$tipoEmpleo);
		 		
		$this->render('planoporunidades',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Retroactivosnominaliquidaciones'=>$Retroactivosnominaliquidaciones,
			'retroactivoNomina'=>$retroactivoNomina,
		));
	}
	
	public function actionDescuento($retroactivoNomina=NULL,$retroactivoNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL, $idDescuento=NULL)
	{   
	    $Retroactivosnominaliquidaciones = new Retroactivosnominaliquidaciones;
		$lista = $this->setParametros($retroactivoNomina,$retroactivoNomina2,$personaGral,$unidad,$tipoEmpleo);
		
		if($idDescuento!=NULL){
		 if($idDescuento!='null'){
		   $lista['sql'] = ' '.$lista['sql'].' AND dp."DEPR_ID" =  '.$idDescuento; 
		   $criteria = new CDbCriteria;
		   $criteria->condition = ' "DEPR_ID" = '.$idDescuento;
		   $model = Descuentosprestaciones::model()->find($criteria);
		   $lista['tercero'] = "DESCUENTO: ".trim($model->DEPR_NOMBRE);				 
		 }
		}
		
		$Retroactivosnominaliquidaciones->getReporteDescuento($lista['sql']);
		$this->render('descuento',array(
			'Retroactivosnominaliquidaciones'=>$Retroactivosnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'retroactivoNomina'=>$retroactivoNomina,
			'retroactivoNomina2'=>$retroactivoNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'idDescuento'=>$idDescuento,
		));
		
	}
	public function actionDowndescuento($retroactivoNomina=NULL,$retroactivoNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL, $idDescuento=NULL)
	{   
	    $Retroactivosnominaliquidaciones = new Retroactivosnominaliquidaciones;
		$lista = $this->setParametros($retroactivoNomina,$retroactivoNomina2,$personaGral,$unidad,$tipoEmpleo);
		
		if($idDescuento!=NULL){
		 if($idDescuento!='null'){
		   $lista['sql'] = ' '.$lista['sql'].' AND dp."DEPR_ID" =  '.$idDescuento; 
		   $criteria = new CDbCriteria;
		   $criteria->condition = ' "DEPR_ID" = '.$idDescuento;
		   $model = Descuentosprestaciones::model()->find($criteria);
		   $lista['tercero'] = "DESCUENTO: ".trim($model->DEPR_NOMBRE);				 
		 }
		}
		
		$Retroactivosnominaliquidaciones->getReporteDescuento($lista['sql']);
		$this->render('terceros/downloaddescuento',array(
			'Retroactivosnominaliquidaciones'=>$Retroactivosnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'retroactivoNomina'=>$retroactivoNomina,
			'retroactivoNomina2'=>$retroactivoNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'idDescuento'=>$idDescuento,
		));
		
	}
	
	
	/*funcion generica que recibe parametros de controlador y devuelve un array de posiciones para reutilizacion*/
	private function setParametros($retroactivoNomina=NULL,$retroactivoNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		$Retroactivosnominaliquidaciones = new Retroactivosnominaliquidaciones;
		
		
		if($retroactivoNomina!=NULL){
		 $sql = ' rn."RANO_ID" = '.$retroactivoNomina.' ';
		 $model=Retroactivosnomina::model()->findByPk($retroactivoNomina);
		 $Periodo = trim($model->RANO_PERIODO);
		 if($retroactivoNomina2!=NULL){		  
		   if($retroactivoNomina!=$retroactivoNomina2){
		    $sql = ' rn."RANO_ID" >= '.$retroactivoNomina.' AND rn."RANO_ID" <= '.$retroactivoNomina2.' ';
		    $model=Retroactivosnomina::model()->findByPk($retroactivoNomina2);
		    $Periodo = " DE $Periodo, A ".trim($model->RANO_PERIODO);		   
		   }
		  }
		}
		if($personaGral!=NULL){		  
		  $sql = ' '.$sql.' AND p."PEGE_IDENTIFICACION" =  '."'".$personaGral."'";
		  $criteria = new CDbCriteria;
          $criteria->condition = ' "PEGE_IDENTIFICACION" = '."'".$personaGral."'";
		  $model=Personasgenerales::model()->find($criteria);
		  $tercero = "EMPLEADO : ".trim($model->PEGE_PRIMERAPELLIDO).' '.trim($model->PEGE_SEGUNDOAPELLIDOS).' '.trim($model->PEGE_PRIMERNOMBRE).'  '.trim($model->PEGE_SEGUNDONOMBRE); 
		}elseif($unidad!=NULL){
		      $sql = ' '.$sql.' AND u."UNID_ID" =  '.$unidad;
              $criteria = new CDbCriteria;
              $criteria->condition = ' "UNID_ID" = '.$unidad;
		      $model=Unidades::model()->find($criteria);
		      $tercero = "UNIDAD : ".trim($model->UNID_ID).' - '.trim($model->UNID_NOMBRE);			  
			  }elseif($tipoEmpleo!=NULL){
		             $sql = ' '.$sql.' AND tc."TICA_ID" =  '.$tipoEmpleo; 
                     $criteria = new CDbCriteria;
                     $criteria->condition = ' "TICA_ID" = '.$tipoEmpleo;
		             $model=Tiposcargos::model()->find($criteria);
		             $tercero = "TIPOS EMPLEADOS : ".trim($model->TICA_NOMBRE);					 
			        }
		 	
		return array('sql'=>$sql, 'Periodo'=>$Periodo, 'tercero'=>$tercero, );
	}
}










