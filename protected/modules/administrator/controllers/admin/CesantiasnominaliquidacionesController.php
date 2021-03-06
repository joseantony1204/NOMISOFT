<?php

class CesantiasnominaliquidacionesController extends Controller
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
								 'planoporunidades','planogeneral','planoresumen','mail', 'planocesantias', 'planoexcelgrad','planoexcelintd', 
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
		$model=new Cesantiasnominaliquidaciones;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cesantiasnominaliquidaciones']))
		{
			$model->attributes=$_POST['Cesantiasnominaliquidaciones'];
	        $model->CENL_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->CENL_REGISTRADOPOR = Yii::app()->user->id;			 
			if($model->save())
				$this->redirect(array('admin','id'=>$model->CENL_ID));
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

		if(isset($_POST['Cesantiasnominaliquidaciones']))
		{
			$model->attributes=$_POST['Cesantiasnominaliquidaciones'];
			$model->CENL_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->CENL_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->CENL_ID));
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
		$dataProvider=new CActiveDataProvider('Cesantiasnominaliquidaciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cesantiasnominaliquidaciones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cesantiasnominaliquidaciones']))
			$model->attributes=$_GET['Cesantiasnominaliquidaciones'];

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
		$model=Cesantiasnominaliquidaciones::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='cesantiasnominaliquidaciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionTotales($cesantiasNomina=NULL,$cesantiasNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		$Cesantiasnominaliquidaciones = new Cesantiasnominaliquidaciones('totales');
		$Cesantiasnominaliquidaciones->unsetAttributes();  // clear any default values
		if(isset($_GET['Cesantiasnominaliquidaciones'])){
			$Cesantiasnominaliquidaciones->attributes=$_GET['Cesantiasnominaliquidaciones'];
        }
		
		$Cesantiasnominaliquidaciones->CENO_ID = $cesantiasNomina;
		$this->render('totales',array(
			'Cesantiasnominaliquidaciones'=>$Cesantiasnominaliquidaciones,
		));
	}
	
	public function actionDetalles($cesantiasNomina=NULL,$cesantiasNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Cesantiasnominaliquidaciones = new Cesantiasnominaliquidaciones;
		$lista = $this->setParametros($cesantiasNomina,$cesantiasNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Cesantiasnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('detalles',array(
			'Cesantiasnominaliquidaciones'=>$Cesantiasnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'cesantiasNomina'=>$cesantiasNomina,
			'cesantiasNomina2'=>$cesantiasNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'sw'=>$sw,
		));
	}
	
	public function actionResumen($cesantiasNomina=NULL,$cesantiasNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Cesantiasnominaliquidaciones = new Cesantiasnominaliquidaciones;
		$lista = $this->setParametros($cesantiasNomina,$cesantiasNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Cesantiasnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('resumen',array(
			'Cesantiasnominaliquidaciones'=>$Cesantiasnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'cesantiasNomina'=>$cesantiasNomina,
			'cesantiasNomina2'=>$cesantiasNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanoexcelintd($cesantiasNomina=NULL,$cesantiasNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		$Cesantiasnominaliquidaciones = new Cesantiasnominaliquidaciones;
		$lista = $this->setParametros($cesantiasNomina,$cesantiasNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Cesantiasnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planoexcelintd',array(
			'Cesantiasnominaliquidaciones'=>$Cesantiasnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'cesantiasNomina'=>$cesantiasNomina,
			'cesantiasNomina2'=>$cesantiasNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanoexcelgrad($cesantiasNomina=NULL,$cesantiasNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		$Cesantiasnominaliquidaciones = new Cesantiasnominaliquidaciones;
		$lista = $this->setParametros($cesantiasNomina,$cesantiasNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Cesantiasnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planoexcelgrad',array(
			'Cesantiasnominaliquidaciones'=>$Cesantiasnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'cesantiasNomina'=>$cesantiasNomina,
			'cesantiasNomina2'=>$cesantiasNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanopagoexcel($cesantiasNomina=NULL,$cesantiasNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Cesantiasnominaliquidaciones = new Cesantiasnominaliquidaciones;
		$lista = $this->setParametros($cesantiasNomina,$cesantiasNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Cesantiasnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planopagoexcel',array(
			'Cesantiasnominaliquidaciones'=>$Cesantiasnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'cesantiasNomina'=>$cesantiasNomina,
			'cesantiasNomina2'=>$cesantiasNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'sw'=>$sw,
		));
	}
	
	public function actionPlanoporunidades($cesantiasNomina=NULL,$cesantiasNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Cesantiasnominaliquidaciones = new Cesantiasnominaliquidaciones;
		$lista = $this->setParametros($cesantiasNomina,$cesantiasNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Cesantiasnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planoporunidades',array(
			'Cesantiasnominaliquidaciones'=>$Cesantiasnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'cesantiasNomina'=>$cesantiasNomina,
			'cesantiasNomina2'=>$cesantiasNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanogeneral($cesantiasNomina=NULL,$cesantiasNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Cesantiasnominaliquidaciones = new Cesantiasnominaliquidaciones;
		$lista = $this->setParametros($cesantiasNomina,$cesantiasNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Cesantiasnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planogeneral',array(
			'Cesantiasnominaliquidaciones'=>$Cesantiasnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'cesantiasNomina'=>$cesantiasNomina,
			'cesantiasNomina2'=>$cesantiasNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanoresumen($cesantiasNomina=NULL,$cesantiasNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		$Cesantiasnominaliquidaciones = new Cesantiasnominaliquidaciones;
		$lista = $this->setParametros($cesantiasNomina,$cesantiasNomina2,$personaGral,$unidad,$tipoEmpleo);
		 	
		$Cesantiasnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('planoresumen',array(
			'Cesantiasnominaliquidaciones'=>$Cesantiasnominaliquidaciones,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'cesantiasNomina'=>$cesantiasNomina,
			'cesantiasNomina2'=>$cesantiasNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
		));
	}
	
	public function actionPlanocesantias($cesantiasNomina=NULL)
	{
		$Cesantiasnominaliquidaciones = new Cesantiasnominaliquidaciones;
		if($cesantiasNomina!=NULL){
		 $sql = ' cn."CENO_ID" = '.$cesantiasNomina.' ';
		}
        $campo = ', tc.'.'"TICA_ID"';
		$Cesantiasnominaliquidaciones->mostrarLiquidacion($sql,$campo, "ASC,");
		
		$this->render('planocesantias',array(
			'Cesantiasnominaliquidaciones'=>$Cesantiasnominaliquidaciones,			
			'cesantiasNomina'=>$cesantiasNomina,			
		));
		
	}
	
	public function actionMail($cesantiasNomina=NULL,$cesantiasNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL,$sw=NULL)
	{
		$Cesantiasnominaliquidaciones = new Cesantiasnominaliquidaciones;
		$lista = $this->setParametros($cesantiasNomina,$cesantiasNomina2,$personaGral,$unidad,$tipoEmpleo);
		$Email = new Email;
		
		$Cesantiasnominaliquidaciones->mostrarLiquidacion($lista['sql']);		
		$this->render('mail',array(
			'Cesantiasnominaliquidaciones'=>$Cesantiasnominaliquidaciones,
			'Email'=>$Email,
			'Periodo'=>$lista['Periodo'],
			'tercero'=>$lista['tercero'],
			'cesantiasNomina'=>$cesantiasNomina,
			'cesantiasNomina2'=>$cesantiasNomina2,
			'personaGral'=>$personaGral,
			'unidad'=>$unidad,
			'tipoEmpleo'=>$tipoEmpleo,
			'sw'=>$sw,
		));
	}
	
	/*funcion generica que recibe parametros de controlador y devuelve un array de posiciones para reutilizacion*/
	private function setParametros($cesantiasNomina=NULL,$cesantiasNomina2=NULL,$personaGral=NULL,$unidad=NULL,$tipoEmpleo=NULL)
	{
		
		if($cesantiasNomina!=NULL){
		 $sql = ' cn."CENO_ID" = '.$cesantiasNomina.' ';
		 $model=Cesantiasnomina::model()->findByPk($cesantiasNomina);
		 $Periodo = trim($model->CENO_PERIODO);
		 if($cesantiasNomina2!=NULL){		  
		   if($cesantiasNomina!=$cesantiasNomina2){
		    $sql = ' cn."CENO_ID" >= '.$cesantiasNomina.' AND cn."CENO_ID" <= '.$cesantiasNomina2.' ';
		    $model=Cesantiasnomina::model()->findByPk($cesantiasNomina2);
		    $Periodo = " DE $Periodo, A ".trim($model->CENO_PERIODO);		   
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