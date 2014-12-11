<?php

class RecreacionnominaliquidacionesController extends Controller
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
								 'planoporunidades','planogeneral','planoresumen','mail','planocesantias',  
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
		$model=new Recreacionnominaliquidaciones;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Recreacionnominaliquidaciones']))
		{
			$model->attributes=$_POST['Recreacionnominaliquidaciones'];
	        $model->RENL_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->RENL_REGISTRADOPOR = Yii::app()->user->id;			 
			if($model->save())
				$this->redirect(array('admin','id'=>$model->RENL_ID));
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

		if(isset($_POST['Recreacionnominaliquidaciones']))
		{
			$model->attributes=$_POST['Recreacionnominaliquidaciones'];
			$model->RENL_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->RENL_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->RENL_ID));
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
		$dataProvider=new CActiveDataProvider('Recreacionnominaliquidaciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Recreacionnominaliquidaciones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Recreacionnominaliquidaciones']))
			$model->attributes=$_GET['Recreacionnominaliquidaciones'];

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
		$model=Recreacionnominaliquidaciones::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='Recreacionnominaliquidaciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionTotales($recreacionNomina=NULL,$recreacionNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		$Recreacionnominaliquidaciones = new Recreacionnominaliquidaciones('totales');
		$Recreacionnominaliquidaciones->unsetAttributes();  // clear any default values
		if(isset($_GET['Recreacionnominaliquidaciones'])){
			$Recreacionnominaliquidaciones->attributes=$_GET['Recreacionnominaliquidaciones'];
        }
		
		$Recreacionnominaliquidaciones->RENO_ID = $recreacionNomina;
		$this->render('totales',array(
			'Recreacionnominaliquidaciones'=>$Recreacionnominaliquidaciones,
		));
	}
	
	public function actionDetalles($recreacionNomina=NULL,$recreacionNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Recreacionnominaliquidaciones = new Recreacionnominaliquidaciones;
		$lista = $this->setParametros($recreacionNomina,$recreacionNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Recreacionnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('detalles',array(
			'Recreacionnominaliquidaciones'=>$Recreacionnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'recreacionNomina'=>$recreacionNomina,
			'recreacionNomina2'=>$recreacionNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'sw'=>$sw,
		));
	}
	
	public function actionResumen($recreacionNomina=NULL,$recreacionNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Recreacionnominaliquidaciones = new Recreacionnominaliquidaciones;
		$lista = $this->setParametros($recreacionNomina,$recreacionNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Recreacionnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('resumen',array(
			'Recreacionnominaliquidaciones'=>$Recreacionnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'recreacionNomina'=>$recreacionNomina,
			'recreacionNomina2'=>$recreacionNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanopagoexcel($recreacionNomina=NULL,$recreacionNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Recreacionnominaliquidaciones = new Recreacionnominaliquidaciones;
		$lista = $this->setParametros($recreacionNomina,$recreacionNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Recreacionnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planopagoexcel',array(
			'Recreacionnominaliquidaciones'=>$Recreacionnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'recreacionNomina'=>$recreacionNomina,
			'recreacionNomina2'=>$recreacionNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanoporunidades($recreacionNomina=NULL,$recreacionNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Recreacionnominaliquidaciones = new Recreacionnominaliquidaciones;
		$lista = $this->setParametros($recreacionNomina,$recreacionNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Recreacionnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planoporunidades',array(
			'Recreacionnominaliquidaciones'=>$Recreacionnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'recreacionNomina'=>$recreacionNomina,
			'recreacionNomina2'=>$recreacionNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanogeneral($recreacionNomina=NULL,$recreacionNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Recreacionnominaliquidaciones = new Recreacionnominaliquidaciones;
		$lista = $this->setParametros($recreacionNomina,$recreacionNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Recreacionnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planogeneral',array(
			'Recreacionnominaliquidaciones'=>$Recreacionnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'recreacionNomina'=>$recreacionNomina,
			'recreacionNomina2'=>$recreacionNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanoresumen($recreacionNomina=NULL,$recreacionNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		$Recreacionnominaliquidaciones = new Recreacionnominaliquidaciones;
		$lista = $this->setParametros($recreacionNomina,$recreacionNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Recreacionnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planoresumen',array(
			'Recreacionnominaliquidaciones'=>$Recreacionnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'recreacionNomina'=>$recreacionNomina,
			'recreacionNomina2'=>$recreacionNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionMail($recreacionNomina=NULL,$recreacionNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Recreacionnominaliquidaciones = new Recreacionnominaliquidaciones;
		$lista = $this->setParametros($recreacionNomina,$recreacionNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Recreacionnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('mail',array(
			'Recreacionnominaliquidaciones'=>$Recreacionnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'recreacionNomina'=>$recreacionNomina,
			'recreacionNomina2'=>$recreacionNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'sw'=>$sw,
		));
	}
	
	public function actionPlanocesantias($recreacionNomina=NULL)
	{
		$Recreacionnominaliquidaciones = new Recreacionnominaliquidaciones;
		if($recreacionNomina!=NULL){
		 $sql = ' rn."RENO_ID" = '.$recreacionNomina.' ';
		 $model=Recreacionnomina::model()->findByPk($recreacionNomina);
		 $Periodo = trim($model->RENO_PERIODO);
		}
		
        
		$Recreacionnominaliquidaciones->mostrarLiquidacion($sql);
		
		$this->render('planocesantias',array(
			'Recreacionnominaliquidaciones'=>$Recreacionnominaliquidaciones,			
			'recreacionNomina'=>$recreacionNomina,
            'Periodo'=>$Periodo,			
		));
		
	}
	
	/*funcion generica que recibe parametros de controlador y devuelve un array de posiciones para reutilizacion*/
	private function setParametros($recreacionNomina=NULL,$recreacionNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		
		if($recreacionNomina!=NULL){
		 $sql = ' rn."RENO_ID" = '.$recreacionNomina.' ';
		 $model=Recreacionnomina::model()->findByPk($recreacionNomina);
		 $Periodo = trim($model->RENO_PERIODO);
		 if($recreacionNomina2!=NULL){		  
		   if($recreacionNomina!=$recreacionNomina2){
		    $sql = ' rn."RENO_ID" >= '.$recreacionNomina.' AND rn."RENO_ID" <= '.$recreacionNomina2.' ';
		    $model=Recreacionnomina::model()->findByPk($recreacionNomina2);
		    $Periodo = " DE $Periodo, A ".trim($model->RENO_PERIODO);		   
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