<?php

class MensualnominaliquidacionesController extends Controller
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
				'actions'=>array(''.$array[0].'',''.$array[1].'',''.$array[2].'',''.$array[3].'',''.$array[4].'','index',
                                 'view','admin','create','update','totales','detalles','resumen','planoPorfacultades',
								 'planoGeneral','planoPagoExcel','downresumen','planogeneralpdf','salud','downsalud','pension','downpension',
								 'sindicato','downsindicato','descuento','downdescuento','retefuente','downretefuente',
                                 'estampilla','downestampilla','email','preview','planocesantias','ibc','downibc',								 
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
		$this->render('detalles',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Mensualnominaliquidaciones;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Mensualnominaliquidaciones']))
		{
			$model->attributes=$_POST['Mensualnominaliquidaciones'];
	        $model->MENL_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->MENL_REGISTRADOPOR = Yii::app()->user->id;			 
			if($model->save())
				$this->redirect(array('admin','id'=>$model->MENL_ID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionPreview($id,$empleoPlanta)
	{
		$Mensualnominaliquidaciones = new Mensualnomina;
		$Mensualnominaliquidaciones->MENO_FECHAPROCESO = date("Y-m-d");
		$Mensualnominaliquidaciones->MENO_ID = date("Y", strtotime($Mensualnominaliquidaciones->MENO_FECHAPROCESO)).date("m", strtotime($Mensualnominaliquidaciones->MENO_FECHAPROCESO))."01"; 
	    $Mensualnominaliquidaciones->MENO_PERIODO = $Mensualnominaliquidaciones->periodoNomina($Mensualnominaliquidaciones->MENO_FECHAPROCESO);         
		$Mensualnominaliquidaciones->MENO_ESTADO = "f"; 			
		$Mensualnominaliquidaciones->MENO_ANIO = date("Y",strtotime($Mensualnominaliquidaciones->MENO_FECHAPROCESO)); 			
		$Mensualnominaliquidaciones->MENO_FECHACAMBIO =  date('Y-m-d H:i:s');
		$Mensualnominaliquidaciones->MENO_REGISTRADOPOR = Yii::app()->user->id;
		$Mensualnominaliquidaciones->previewLiquidation($Mensualnominaliquidaciones,$id);

		$this->render('preview',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'id'=>$id,
			'empleoPlanta'=>$empleoPlanta,
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

		if(isset($_POST['Mensualnominaliquidaciones']))
		{
			$model->attributes=$_POST['Mensualnominaliquidaciones'];
			$model->MENL_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->MENL_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->MENL_ID));
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
		$dataProvider=new CActiveDataProvider('Mensualnominaliquidaciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Mensualnominaliquidaciones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Mensualnominaliquidaciones']))
			$model->attributes=$_GET['Mensualnominaliquidaciones'];

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
		$model=Mensualnominaliquidaciones::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='mensualnominaliquidaciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionTotales($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL)
	{
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones('totales');
		$Mensualnominaliquidaciones->unsetAttributes();  // clear any default values
		if(isset($_GET['Mensualnominaliquidaciones'])){
			$Mensualnominaliquidaciones->attributes=$_GET['Mensualnominaliquidaciones'];
        }
		
		$Mensualnominaliquidaciones->MENO_ID = $mensualNomina;
		$this->render('totales',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
		));
	}
	
	public function actionDetalles($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL,$sw=NULL)
	{
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		 	
		$Mensualnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('detalles',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Semestralnominaliquidaciones'=>$Semestralnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],			
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
			'personaGral'=>$personaGral,
			'facultad'=>$facultad,
			'sw'=>$sw,
		));
	}
	
	public function actionEmail($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL,$sw=NULL)
	{
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$Email = new Email;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		 	
		$Mensualnominaliquidaciones->mostrarLiquidacion($lista['sql']);		 		
		$this->render('email',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Email'=>$Email,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
			'personaGral'=>$personaGral,
			'facultad'=>$facultad,
			'sw'=>$sw,
		));
	}
	
	public function actionIbc($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL)
	{
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;		
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		 	
		$Mensualnominaliquidaciones->getReporteibc($mensualNomina,$lista['sql']);			
		$this->render('ibc',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
			'personaGral'=>$personaGral,
			'facultad'=>$facultad,
		));
	}
	
	public function actionDownibc($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL)
	{
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;		
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		 	
		$Mensualnominaliquidaciones->getReporteibc($mensualNomina,$lista['sql']);			
		$this->render('terceros/downloadibc',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
			'personaGral'=>$personaGral,
			'facultad'=>$facultad,
		));
	}
	
	public function actionResumen($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL)
	{
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		 	
		$Mensualnominaliquidaciones->mostrarLiquidacion($lista['sql']);			
		$this->render('resumen',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
			'personaGral'=>$personaGral,
			'facultad'=>$facultad,
		));
	}
	
	public function actionPlanoPorfacultades($mensualNomina=NULL)
	{
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;		 				
		$this->render('planoporfacultades',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,			
			'mensualNomina'=>$mensualNomina,
		));
		
	}
	
	public function actionPlanoPagoExcel($mensualNomina=NULL)
	{
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		if($mensualNomina!=NULL){
		 $sql = ' mn."MENO_ID" = '.$mensualNomina.' ';
		}
        
		$Mensualnominaliquidaciones->mostrarLiquidacion($sql);
		
		$this->render('planopagoexcel',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,			
			'mensualNomina'=>$mensualNomina,			
		));
		
	}
	
	public function actionPlanocesantias($mensualNomina=NULL)
	{
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		if($mensualNomina!=NULL){
		 $sql = ' mn."MENO_ID" = '.$mensualNomina.' ';
		}
        
		$Mensualnominaliquidaciones->mostrarLiquidacion($sql);
		
		$this->render('planocesantias',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,			
			'mensualNomina'=>$mensualNomina,			
		));
		
	}
	
	public function actionDownresumen($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL)
	{
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;		
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		 	
		$Mensualnominaliquidaciones->mostrarLiquidacion($lista['sql']);			
		$this->render('downloadresumen',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
			'personaGral'=>$personaGral,
			'facultad'=>$facultad,
		));
	}
	
	public function actionPlanoGeneral($id=NULL,$mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL)
	{
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		 	
		$Mensualnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planogeneral',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
		));
	}
	
	public function actionPlanogeneralpdf($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL)
	{
		$Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		 	
		$Mensualnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planogeneralpdf',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
		));
	}

	
	public function actionSalud($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL, $idSalud=NULL)
	{   
	    $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		
		if($idSalud!=NULL){
		 if($idSalud!='null'){
		   $lista['sql'] = ' '.$lista['sql'].' AND s."SALU_ID" =  '.$idSalud; 
		   $criteria = new CDbCriteria;
		   $criteria->condition = ' "SALU_ID" = '.$idSalud;
		   $model = Salud::model()->find($criteria);
		   $lista['tercero'] = "SALUD: ".trim($model->SALU_NOMBRE);					 
		 }
		}
		
		$Mensualnominaliquidaciones->getReporteSalud($lista['sql']);
		$this->render('salud',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
			'personaGral'=>$personaGral,
			'facultad'=>$facultad,
			'idSalud'=>$idSalud,
		));
		
	}
	
	public function actionPension($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL, $idPension=NULL)
	{   
	    $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		
		if($idPension!=NULL){
		 if($idPension!='null'){
		   $lista['sql'] = ' '.$lista['sql'].' AND ps."PENS_ID" =  '.$idPension; 
		   $criteria = new CDbCriteria;
		   $criteria->condition = ' "PENS_ID" = '.$idPension;
		   $model = Pension::model()->find($criteria);
		   $lista['tercero'] = "PENSION: ".trim($model->PENS_NOMBRE);					 
		 }
		}
		
		$Mensualnominaliquidaciones->getReportePension($lista['sql']);
		$this->render('pension',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
			'personaGral'=>$personaGral,
			'facultad'=>$facultad,
			'idPension'=>$idPension,
		));
		
	}
	
	public function actionSindicato($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL, $idSindicato=NULL)
	{   
	    $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		
		if($idSindicato!=NULL){
		 if($idSindicato!='null'){
		   $lista['sql'] = ' '.$lista['sql'].' AND sd."SIND_ID" =  '.$idSindicato; 
		   $criteria = new CDbCriteria;
		   $criteria->condition = ' "SIND_ID" = '.$idSindicato;
		   $model = Sindicatos::model()->find($criteria);
		   $lista['tercero'] = "SINDICATO: ".trim($model->SIND_NOMBRE);					 
		 }
		}
		
		$Mensualnominaliquidaciones->getReporteSindicato($lista['sql']);
		$this->render('sindicato',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
			'personaGral'=>$personaGral,
			'facultad'=>$facultad,
			'idSindicato'=>$idSindicato,
		));
		
	}
	
	public function actionDescuento($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL, $idDescuento=NULL)
	{   
	    $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		
		if($idDescuento!=NULL){
		 if($idDescuento!='null'){
		   $lista['sql'] = ' '.$lista['sql'].' AND dm."DEME_ID" =  '.$idDescuento; 
		   $criteria = new CDbCriteria;
		   $criteria->condition = ' "DEME_ID" = '.$idDescuento;
		   $model = Descuentosmensuales::model()->find($criteria);
		   $lista['tercero'] = "DESCUENTO: ".trim($model->DEME_NOMBRE);					 
		 }
		}
		
		$Mensualnominaliquidaciones->getReporteDescuento($lista['sql']);
		$this->render('descuento',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
			'personaGral'=>$personaGral,
			'facultad'=>$facultad,
			'idDescuento'=>$idDescuento,
		));
		
	}
	
	public function actionRetefuente($mensualNomina=NULL,$mensualNomina2=NULL)
	{   
	    $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2);
		$lista['tercero'] = "RETEFUENTE";
		
		$Mensualnominaliquidaciones->getReporteRetefuente($lista['sql']);
		$this->render('retefuente',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
		));
		
	}
	
	public function actionEstampilla($mensualNomina=NULL,$mensualNomina2=NULL)
	{   
	    $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2);
		$lista['tercero'] = "ESTAMPILLA";
		
		$Mensualnominaliquidaciones->getReporteEstampilla($lista['sql']);
		$this->render('estampilla',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
		));
		
	}
	
	public function actionDownsalud($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL, $idSalud=NULL)
	{   
	    $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		
		if($idSalud!=NULL){
		 if($idSalud!='null'){
		   $lista['sql'] = ' '.$lista['sql'].' AND s."SALU_ID" =  '.$idSalud; 
		   $criteria = new CDbCriteria;
		   $criteria->condition = ' "SALU_ID" = '.$idSalud;
		   $model = Salud::model()->find($criteria);
		   $lista['tercero'] = "SALUD: ".trim($model->SALU_NOMBRE);					 
		 }
		}
		
		$Mensualnominaliquidaciones->getReporteSalud($lista['sql']);
		$this->render('terceros/downloadsalud',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
			'personaGral'=>$personaGral,
			'facultad'=>$facultad,
			'idSalud'=>$idSalud,
		));
		
	}
	
	public function actionDownpension($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL, $idPension=NULL)
	{   
	    $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		
		if($idPension!=NULL){
		 if($idPension!='null'){
		   $lista['sql'] = ' '.$lista['sql'].' AND ps."PENS_ID" =  '.$idPension; 
		   $criteria = new CDbCriteria;
		   $criteria->condition = ' "PENS_ID" = '.$idPension;
		   $model = Pension::model()->find($criteria);
		   $lista['tercero'] = "PENSION: ".trim($model->PENS_NOMBRE);					 
		 }
		}
		
		$Mensualnominaliquidaciones->getReportePension($lista['sql']);
		$this->render('terceros/downloadpension',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
			'personaGral'=>$personaGral,
			'facultad'=>$facultad,
			'idPension'=>$idPension,
		));
		
	}
	
	public function actionDownsindicato($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL, $idSindicato=NULL)
	{   
	    $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		
		if($idSindicato!=NULL){
		 if($idSindicato!='null'){
		   $lista['sql'] = ' '.$lista['sql'].' AND sd."SIND_ID" =  '.$idSindicato; 
		   $criteria = new CDbCriteria;
		   $criteria->condition = ' "SIND_ID" = '.$idSindicato;
		   $model = Sindicatos::model()->find($criteria);
		   $lista['tercero'] = "SINDICATO: ".trim($model->SIND_NOMBRE);					 
		 }
		}
		
		$Mensualnominaliquidaciones->getReporteSindicato($lista['sql']);
		$this->render('terceros/downloadsindicato',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
			'personaGral'=>$personaGral,
			'facultad'=>$facultad,
			'idSindicato'=>$idSindicato,
		));
		
	}
	
	public function actionDowndescuento($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL,$idDescuento=NULL)
	{   
	    $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2,$personaGral,$facultad);
		
		if($idDescuento!=NULL){
		 if($idDescuento!='null'){
		   $lista['sql'] = ' '.$lista['sql'].' AND dm."DEME_ID" =  '.$idDescuento; 
		   $criteria = new CDbCriteria;
		   $criteria->condition = ' "DEME_ID" = '.$idDescuento;
		   $model = Descuentosmensuales::model()->find($criteria);
		   $lista['tercero'] = "DESCUENTO: ".trim($model->DEME_NOMBRE);					 
		 }
		}
		
		$Mensualnominaliquidaciones->getReporteDescuento($lista['sql']);
		$this->render('terceros/downloaddescuento',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
			'personaGral'=>$personaGral,
			'facultad'=>$facultad,
			'idDescuento'=>$idDescuento,
		));
		
	}
	
	public function actionDownretefuente($mensualNomina=NULL,$mensualNomina2=NULL)
	{   
	    $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2);
		$lista['tercero'] = "RETEFUENTE";
		
		$Mensualnominaliquidaciones->getReporteRetefuente($lista['sql']);
		$this->render('terceros/downloadretefuente',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
		));
		
	}
	
	public function actionDownestampilla($mensualNomina=NULL,$mensualNomina2=NULL)
	{   
	    $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
		$lista = $this->setParametros($mensualNomina,$mensualNomina2);
		$lista['tercero'] = "ESTAMPILLA";
		
		$Mensualnominaliquidaciones->getReporteEstampilla($lista['sql']);
		$this->render('terceros/downloadestampilla',array(
			'Mensualnominaliquidaciones'=>$Mensualnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'mensualNomina'=>$mensualNomina,
			'mensualNomina2'=>$mensualNomina2,
		));
		
	}
	
	/*funcion generica que recibe parametros de controlador y devuelve un array de posiciones para reutilizacion*/
	private function setParametros($mensualNomina=NULL,$mensualNomina2=NULL,$personaGral=NULL,$facultad=NULL)
	{
			
		if($mensualNomina!=NULL){
		 $sql = ' mn."MENO_ID" = '.$mensualNomina.' ';
		 $model=Mensualnomina::model()->findByPk($mensualNomina);
		 $Periodo = trim($model->MENO_PERIODO);
		 if($mensualNomina2!=NULL){		  
		   if($mensualNomina!=$mensualNomina2){
		    $sql = ' mn."MENO_ID" >= '.$mensualNomina.' AND mn."MENO_ID" <= '.$mensualNomina2.' ';
		    $model=Mensualnomina::model()->findByPk($mensualNomina2);
		    $Periodo = " DE $Periodo, A ".trim($model->MENO_PERIODO);		   
		   }
		  }
		}
		if($personaGral!=NULL){		  
		  $sql = ' '.$sql.' AND p."PEGE_IDENTIFICACION" =  '."'".$personaGral."'";
		  $criteria = new CDbCriteria;
          $criteria->condition = ' "PEGE_IDENTIFICACION" = '."'".$personaGral."'";
		  $model=Personasgenerales::model()->find($criteria);
		  $tercero = "EMPLEADO : ".trim($model->PEGE_PRIMERAPELLIDO).' '.trim($model->PEGE_SEGUNDOAPELLIDOS).' '.trim($model->PEGE_PRIMERNOMBRE).'  '.trim($model->PEGE_SEGUNDONOMBRE); 
		}elseif($facultad!=NULL){
		      $sql = ' '.$sql.' AND f."FACU_ID" =  '.$facultad;
              $criteria = new CDbCriteria;
              $criteria->condition = ' "FACU_ID" = '.$facultad;
		      $model=Facultades::model()->find($criteria);
		      $tercero = "FACULTAD : ".trim($model->FACU_ID).' - '.trim($model->FACU_NOMBRE);			  
			  }
		 	
		return array('sql'=>$sql, 'Periodo'=>$Periodo, 'tercero'=>$tercero, );
	}
}