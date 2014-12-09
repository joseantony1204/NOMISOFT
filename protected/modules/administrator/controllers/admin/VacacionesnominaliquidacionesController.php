<?php

class VacacionesnominaliquidacionesController extends Controller
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
				'actions'=>array(''.$array[0].'',''.$array[1].'',''.$array[2].'',''.$array[3].'',''.$array[4].'','preview',
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
		$model=new Vacacionesnominaliquidaciones;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vacacionesnominaliquidaciones']))
		{
			$model->attributes=$_POST['Vacacionesnominaliquidaciones'];
	        $model->VANL_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->VANL_REGISTRADOPOR = Yii::app()->user->id;			 
			if($model->save())
				$this->redirect(array('admin','id'=>$model->VANL_ID));
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

		if(isset($_POST['Vacacionesnominaliquidaciones']))
		{
			$model->attributes=$_POST['Vacacionesnominaliquidaciones'];
			$model->VANL_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->VANL_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->VANL_ID));
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
		$dataProvider=new CActiveDataProvider('Vacacionesnominaliquidaciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Vacacionesnominaliquidaciones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vacacionesnominaliquidaciones']))
			$model->attributes=$_GET['Vacacionesnominaliquidaciones'];

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
		$model=Vacacionesnominaliquidaciones::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='vacacionesnominaliquidaciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionPreview($personaGeneral,$id)
	{
		$Vacacionesnominaliquidaciones = new Vacacionesnomina;
		$Vacacionesnominaliquidaciones->VANO_FECHAPROCESO = date("Y-m-d");
		$Vacacionesnominaliquidaciones->VANO_ID = date("Y", strtotime($Vacacionesnominaliquidaciones->VANO_FECHAPROCESO)).date("m", strtotime($Vacacionesnominaliquidaciones->VANO_FECHAPROCESO))."41";          
		$Vacacionesnominaliquidaciones->VANO_ESTADO = "f"; 			
		$Vacacionesnominaliquidaciones->VANO_ANIO = date("Y",strtotime($Vacacionesnominaliquidaciones->VANO_FECHAPROCESO)); 			
		$Vacacionesnominaliquidaciones->VANO_PERIODO = 'VACACIONES '.$Vacacionesnominaliquidaciones->VANO_ANIO;
		$Vacacionesnominaliquidaciones->VANO_FECHACAMBIO =  date('Y-m-d H:i:s');
		$Vacacionesnominaliquidaciones->VANO_REGISTRADOPOR = Yii::app()->user->id;
		$Vacacionesnominaliquidaciones->previewLiquidation($Vacacionesnominaliquidaciones,$personaGeneral);

		$this->render('preview',array(
			'Vacacionesnominaliquidaciones'=>$Vacacionesnominaliquidaciones,			
			'personaGeneral'=>$personaGeneral,
			'id'=>$id,
		));
	}
	
	public function actionTotales($vacacionesNomina=NULL,$vacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		$Vacacionesnominaliquidaciones = new Vacacionesnominaliquidaciones('totales');
		$Vacacionesnominaliquidaciones->unsetAttributes();  // clear any default values
		if(isset($_GET['Vacacionesnominaliquidaciones'])){
			$Vacacionesnominaliquidaciones->attributes=$_GET['Vacacionesnominaliquidaciones'];
        }
		
		$Vacacionesnominaliquidaciones->VANO_ID = $vacacionesNomina;
		$this->render('totales',array(
			'Vacacionesnominaliquidaciones'=>$Vacacionesnominaliquidaciones,
		));
	}
	
	public function actionDetalles($vacacionesNomina=NULL,$vacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Vacacionesnominaliquidaciones = new Vacacionesnominaliquidaciones;
		$lista = $this->setParametros($vacacionesNomina,$vacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Vacacionesnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('detalles',array(
			'Vacacionesnominaliquidaciones'=>$Vacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'vacacionesNomina'=>$vacacionesNomina,
			'vacacionesNomina2'=>$vacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'sw'=>$sw,
		));
	}
	
	public function actionResumen($vacacionesNomina=NULL,$vacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Vacacionesnominaliquidaciones = new Vacacionesnominaliquidaciones;
		$lista = $this->setParametros($vacacionesNomina,$vacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Vacacionesnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('resumen',array(
			'Vacacionesnominaliquidaciones'=>$Vacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'vacacionesNomina'=>$vacacionesNomina,
			'vacacionesNomina2'=>$vacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanopagoexcel($vacacionesNomina=NULL,$vacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Vacacionesnominaliquidaciones = new Vacacionesnominaliquidaciones;
		$lista = $this->setParametros($vacacionesNomina,$vacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Vacacionesnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planopagoexcel',array(
			'Vacacionesnominaliquidaciones'=>$Vacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'vacacionesNomina'=>$vacacionesNomina,
			'vacacionesNomina2'=>$vacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanoporunidades($vacacionesNomina=NULL,$vacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Vacacionesnominaliquidaciones = new Vacacionesnominaliquidaciones;
		$lista = $this->setParametros($vacacionesNomina,$vacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Vacacionesnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planoporunidades',array(
			'Vacacionesnominaliquidaciones'=>$Vacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'vacacionesNomina'=>$vacacionesNomina,
			'vacacionesNomina2'=>$vacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanogeneral($vacacionesNomina=NULL,$vacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Vacacionesnominaliquidaciones = new Vacacionesnominaliquidaciones;
		$lista = $this->setParametros($vacacionesNomina,$vacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Vacacionesnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planogeneral',array(
			'Vacacionesnominaliquidaciones'=>$Vacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'vacacionesNomina'=>$vacacionesNomina,
			'vacacionesNomina2'=>$vacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanoresumen($vacacionesNomina=NULL,$vacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		$Vacacionesnominaliquidaciones = new Vacacionesnominaliquidaciones;
		$lista = $this->setParametros($vacacionesNomina,$vacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Vacacionesnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planoresumen',array(
			'Vacacionesnominaliquidaciones'=>$Vacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'vacacionesNomina'=>$vacacionesNomina,
			'vacacionesNomina2'=>$vacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionDescuento($vacacionesNomina=NULL,$vacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL, $idDescuento=NULL)
	{   
	    $Vacacionesnominaliquidaciones = new Vacacionesnominaliquidaciones;
		$lista = $this->setParametros($vacacionesNomina,$vacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		
		if($idDescuento!=NULL){
		 if($idDescuento!='null'){
		   $lista['sql'] = ' '.$lista['sql'].' AND dp."DEPR_ID" =  '.$idDescuento; 
		   $criteria = new CDbCriteria;
		   $criteria->condition = ' "DEPR_ID" = '.$idDescuento;
		   $model = Descuentosprestaciones::model()->find($criteria);
		   $lista['tercero'] = "DESCUENTO: ".trim($model->DEPR_NOMBRE);				 
		 }
		}
		
		$Vacacionesnominaliquidaciones->getReporteDescuento($lista['sql']);
		$this->render('descuento',array(
			'Vacacionesnominaliquidaciones'=>$Vacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'vacacionesNomina'=>$vacacionesNomina,
			'vacacionesNomina2'=>$vacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'idDescuento'=>$idDescuento,
		));
		
	}
	
	public function actionDowndescuento($vacacionesNomina=NULL,$vacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL, $idDescuento=NULL)
	{   
	    $Vacacionesnominaliquidaciones = new Vacacionesnominaliquidaciones;
		$lista = $this->setParametros($vacacionesNomina,$vacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		
		if($idDescuento!=NULL){
		 if($idDescuento!='null'){
		   $lista['sql'] = ' '.$lista['sql'].' AND dp."DEPR_ID" =  '.$idDescuento; 
		   $criteria = new CDbCriteria;
		   $criteria->condition = ' "DEPR_ID" = '.$idDescuento;
		   $model = Descuentosprestaciones::model()->find($criteria);
		   $lista['tercero'] = "DESCUENTO: ".trim($model->DEPR_NOMBRE);				 
		 }
		}
		
		$Vacacionesnominaliquidaciones->getReporteDescuento($lista['sql']);
		$this->render('terceros/downloaddescuento',array(
			'Vacacionesnominaliquidaciones'=>$Vacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'vacacionesNomina'=>$vacacionesNomina,
			'vacacionesNomina2'=>$vacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'idDescuento'=>$idDescuento,
		));
		
	}
	
	public function actionRetefuente($vacacionesNomina=NULL,$vacacionesNomina2=NULL)
	{   
	    $Vacacionesnominaliquidaciones = new Vacacionesnominaliquidaciones;
		$lista = $this->setParametros($vacacionesNomina,$vacacionesNomina2);
		$lista['tercero'] = "RETEFUENTE";
		
		$Vacacionesnominaliquidaciones->getReporteRetefuente($lista['sql']);
		$this->render('retefuente',array(
			'Vacacionesnominaliquidaciones'=>$Vacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'vacacionesNomina'=>$vacacionesNomina,
			'vacacionesNomina2'=>$vacacionesNomina2,
		));
		
	}
	
	public function actionDownretefuente($vacacionesNomina=NULL,$vacacionesNomina2=NULL)
	{   
	    $Vacacionesnominaliquidaciones = new Vacacionesnominaliquidaciones;
		$lista = $this->setParametros($vacacionesNomina,$vacacionesNomina2);
		$lista['tercero'] = "RETEFUENTE";
		
		$Vacacionesnominaliquidaciones->getReporteRetefuente($lista['sql']);
		$this->render('terceros/downloadretefuente',array(
			'Vacacionesnominaliquidaciones'=>$Vacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'vacacionesNomina'=>$vacacionesNomina,
			'vacacionesNomina2'=>$vacacionesNomina2,
		));
		
	}
	
	public function actionMail($vacacionesNomina=NULL,$vacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Vacacionesnominaliquidaciones = new Vacacionesnominaliquidaciones;
		$lista = $this->setParametros($vacacionesNomina,$vacacionesNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Vacacionesnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('mail',array(
			'Vacacionesnominaliquidaciones'=>$Vacacionesnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'vacacionesNomina'=>$vacacionesNomina,
			'vacacionesNomina2'=>$vacacionesNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'sw'=>$sw,
		));
	}
	
	/*funcion generica que recibe parametros de controlador y devuelve un array de posiciones para reutilizacion*/
	private function setParametros($vacacionesNomina=NULL,$vacacionesNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		
		if($vacacionesNomina!=NULL){
		 $sql = ' vn."VANO_ID" = '.$vacacionesNomina.' ';
		 $model=Vacacionesnomina::model()->findByPk($vacacionesNomina);
		 $Periodo = trim($model->VANO_PERIODO);
		 if($vacacionesNomina2!=NULL){		  
		   if($vacacionesNomina!=$vacacionesNomina2){
		    $sql = ' vn."VANO_ID" >= '.$vacacionesNomina.' AND vn."VANO_ID" <= '.$vacacionesNomina2.' ';
		    $model=Vacacionesnomina::model()->findByPk($vacacionesNomina2);
		    $Periodo = " DE $Periodo, A ".trim($model->VANO_PERIODO);		   
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