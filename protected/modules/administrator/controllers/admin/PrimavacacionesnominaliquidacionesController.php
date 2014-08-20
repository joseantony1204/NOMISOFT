<?php

class PrimavacacionesnominaliquidacionesController extends Controller
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
                                 ''.$array[6].'','admin','create','update','totales','detalles','resumen','planopagoexcel',
								 'planoporunidades','planogeneral','planoresumen','descuento','downdescuento',
								 'retefuente','downretefuente','mail',  
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
		$model=new Primavacacionesnominaliquidaciones;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Primavacacionesnominaliquidaciones']))
		{
			$model->attributes=$_POST['Primavacacionesnominaliquidaciones'];
	        $model->PVNL_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->PVNL_REGISTRADOPOR = Yii::app()->user->id;			 
			if($model->save())
				$this->redirect(array('admin','id'=>$model->PVNL_ID));
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

		if(isset($_POST['Primavacacionesnominaliquidaciones']))
		{
			$model->attributes=$_POST['Primavacacionesnominaliquidaciones'];
			$model->PVNL_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->PVNL_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->PVNL_ID));
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
		$dataProvider=new CActiveDataProvider('Primavacacionesnominaliquidaciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Primavacacionesnominaliquidaciones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Primavacacionesnominaliquidaciones']))
			$model->attributes=$_GET['Primavacacionesnominaliquidaciones'];

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
		$model=Primavacacionesnominaliquidaciones::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='primavacacionesnominaliquidaciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionTotales($primavacacionesNomina=NULL,$primavacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		$Primavacacionesnominaliquidaciones = new Primavacacionesnominaliquidaciones('totales');
		$Primavacacionesnominaliquidaciones->unsetAttributes();  // clear any default values
		if(isset($_GET['Primavacacionesnominaliquidaciones'])){
			$Primavacacionesnominaliquidaciones->attributes=$_GET['Primavacacionesnominaliquidaciones'];
        }
		
		$Primavacacionesnominaliquidaciones->PVNO_ID = $primavacacionesNomina;
		$this->render('totales',array(
			'Primavacacionesnominaliquidaciones'=>$Primavacacionesnominaliquidaciones,
		));
	}
	
	public function actionDetalles($primavacacionesNomina=NULL,$primavacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Primavacacionesnominaliquidaciones = new Primavacacionesnominaliquidaciones;
		$lista = $this->setParametros($primavacacionesNomina,$primavacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Primavacacionesnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('detalles',array(
			'Primavacacionesnominaliquidaciones'=>$Primavacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'primavacacionesNomina'=>$primavacacionesNomina,
			'primavacacionesNomina2'=>$primavacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'sw'=>$sw,
		));
	}
	
	public function actionResumen($primavacacionesNomina=NULL,$primavacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Primavacacionesnominaliquidaciones = new Primavacacionesnominaliquidaciones;
		$lista = $this->setParametros($primavacacionesNomina,$primavacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Primavacacionesnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('resumen',array(
			'Primavacacionesnominaliquidaciones'=>$Primavacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'primavacacionesNomina'=>$primavacacionesNomina,
			'primavacacionesNomina2'=>$primavacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanopagoexcel($primavacacionesNomina=NULL,$primavacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Primavacacionesnominaliquidaciones = new Primavacacionesnominaliquidaciones;
		$lista = $this->setParametros($primavacacionesNomina,$primavacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Primavacacionesnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planopagoexcel',array(
			'Primavacacionesnominaliquidaciones'=>$Primavacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'primavacacionesNomina'=>$primavacacionesNomina,
			'primavacacionesNomina2'=>$primavacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanoporunidades($primavacacionesNomina=NULL,$primavacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Primavacacionesnominaliquidaciones = new Primavacacionesnominaliquidaciones;
		$lista = $this->setParametros($primavacacionesNomina,$primavacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Primavacacionesnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planoporunidades',array(
			'Primavacacionesnominaliquidaciones'=>$Primavacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'primavacacionesNomina'=>$primavacacionesNomina,
			'primavacacionesNomina2'=>$primavacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanogeneral($primavacacionesNomina=NULL,$primavacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Primavacacionesnominaliquidaciones = new Primavacacionesnominaliquidaciones;
		$lista = $this->setParametros($primavacacionesNomina,$primavacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Primavacacionesnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planogeneral',array(
			'Primavacacionesnominaliquidaciones'=>$Primavacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'primavacacionesNomina'=>$primavacacionesNomina,
			'primavacacionesNomina2'=>$primavacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanoresumen($primavacacionesNomina=NULL,$primavacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		$Primavacacionesnominaliquidaciones = new Primavacacionesnominaliquidaciones;
		$lista = $this->setParametros($primavacacionesNomina,$primavacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Primavacacionesnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planoresumen',array(
			'Primavacacionesnominaliquidaciones'=>$Primavacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'primavacacionesNomina'=>$primavacacionesNomina,
			'primavacacionesNomina2'=>$primavacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionDescuento($primavacacionesNomina=NULL,$primavacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL, $idDescuento=NULL)
	{   
	    $Primavacacionesnominaliquidaciones = new Primavacacionesnominaliquidaciones;
		$lista = $this->setParametros($primavacacionesNomina,$primavacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		
		if($idDescuento!=NULL){
		 if($idDescuento!='null'){
		   $lista['sql'] = ' '.$lista['sql'].' AND dp."DEPR_ID" =  '.$idDescuento; 
		   $criteria = new CDbCriteria;
		   $criteria->condition = ' "DEPR_ID" = '.$idDescuento;
		   $model = Descuentosprestaciones::model()->find($criteria);
		   $lista['tercero'] = "DESCUENTO: ".trim($model->DEPR_NOMBRE);				 
		 }
		}
		
		$Primavacacionesnominaliquidaciones->getReporteDescuento($lista['sql']);
		$this->render('descuento',array(
			'Primavacacionesnominaliquidaciones'=>$Primavacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'primavacacionesNomina'=>$primavacacionesNomina,
			'primavacacionesNomina2'=>$primavacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'idDescuento'=>$idDescuento,
		));
		
	}
	
	public function actionDowndescuento($primavacacionesNomina=NULL,$primavacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL, $idDescuento=NULL)
	{   
	    $Primavacacionesnominaliquidaciones = new Primavacacionesnominaliquidaciones;
		$lista = $this->setParametros($primavacacionesNomina,$primavacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		
		if($idDescuento!=NULL){
		 if($idDescuento!='null'){
		   $lista['sql'] = ' '.$lista['sql'].' AND dp."DEPR_ID" =  '.$idDescuento; 
		   $criteria = new CDbCriteria;
		   $criteria->condition = ' "DEPR_ID" = '.$idDescuento;
		   $model = Descuentosprestaciones::model()->find($criteria);
		   $lista['tercero'] = "DESCUENTO: ".trim($model->DEPR_NOMBRE);				 
		 }
		}
		
		$Primavacacionesnominaliquidaciones->getReporteDescuento($lista['sql']);
		$this->render('terceros/downloaddescuento',array(
			'Primavacacionesnominaliquidaciones'=>$Primavacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'primavacacionesNomina'=>$primavacacionesNomina,
			'primavacacionesNomina2'=>$primavacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'idDescuento'=>$idDescuento,
		));
		
	}
	
	public function actionRetefuente($primavacacionesNomina=NULL,$primavacacionesNomina2=NULL)
	{   
	    $Primavacacionesnominaliquidaciones = new Primavacacionesnominaliquidaciones;
		$lista = $this->setParametros($primavacacionesNomina,$primavacacionesNomina2);
		$lista['tercero'] = "RETEFUENTE";
		
		$Primavacacionesnominaliquidaciones->getReporteRetefuente($lista['sql']);
		$this->render('retefuente',array(
			'Primavacacionesnominaliquidaciones'=>$Primavacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'primavacacionesNomina'=>$primavacacionesNomina,
			'primavacacionesNomina2'=>$primavacacionesNomina2,
		));
		
	}
	
	public function actionDownretefuente($primavacacionesNomina=NULL,$primavacacionesNomina2=NULL)
	{   
	    $Primavacacionesnominaliquidaciones = new Primavacacionesnominaliquidaciones;
		$lista = $this->setParametros($primavacacionesNomina,$primavacacionesNomina2);
		$lista['tercero'] = "RETEFUENTE";
		
		$Primavacacionesnominaliquidaciones->getReporteRetefuente($lista['sql']);
		$this->render('terceros/downloadretefuente',array(
			'Primavacacionesnominaliquidaciones'=>$Primavacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'primavacacionesNomina'=>$primavacacionesNomina,
			'primavacacionesNomina2'=>$primavacacionesNomina2,
		));
		
	}
	
	public function actionMail($primavacacionesNomina=NULL,$primavacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Primavacacionesnominaliquidaciones = new Primavacacionesnominaliquidaciones;
		$lista = $this->setParametros($primavacacionesNomina,$primavacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Primavacacionesnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('mail',array(
			'Primavacacionesnominaliquidaciones'=>$Primavacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'primavacacionesNomina'=>$primavacacionesNomina,
			'primavacacionesNomina2'=>$primavacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'sw'=>$sw,
		));
	}
	
	/*funcion generica que recibe parametros de controlador y devuelve un array de posiciones para reutilizacion*/
	private function setParametros($primavacacionesNomina=NULL,$primavacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		
		if($primavacacionesNomina!=NULL){
		 $sql = ' pvn."PVNO_ID" = '.$primavacacionesNomina.' ';
		 $model=Primavacacionesnomina::model()->findByPk($primavacacionesNomina);
		 $Periodo = trim($model->PVNO_PERIODO);
		 if($primavacacionesNomina2!=NULL){		  
		   if($primavacacionesNomina!=$primavacacionesNomina2){
		    $sql = ' pvn."PVNO_ID" >= '.$primavacacionesNomina.' AND pvn."PVNO_ID" <= '.$primavacacionesNomina2.' ';
		    $model=Primavacacionesnomina::model()->findByPk($primavacacionesNomina2);
		    $Periodo = " DE $Periodo, A ".trim($model->PVNO_PERIODO);		   
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