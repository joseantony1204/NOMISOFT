<?php

class RetroactivospuntosnominaController extends Controller
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
                                 'delete','admin','create','update',  
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
		$Retroactivospuntosnomina = new Retroactivospuntosnomina;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Retroactivospuntosnomina']))
		{
			$Retroactivospuntosnomina->attributes=$_POST['Retroactivospuntosnomina'];
            $Retroactivospuntosnomina->RPNO_MESINICIO = $_POST['Retroactivospuntosnomina']['RPNO_MESINICIO'];			
            $Retroactivospuntosnomina->RPNO_MESFINAL = $_POST['Retroactivospuntosnomina']['RPNO_MESFINAL'];								
            $Retroactivospuntosnomina->RPNO_VALORPUNTO = $_POST['VALORPUNTOACTUAL'];								
            $Retroactivospuntosnomina->RPNO_ANIO = $_POST['Retroactivospuntosnomina']['RPNO_ANIO'];								
			$Retroactivospuntosnomina->RPNO_FECHAPROCESO =  date('Y-m-d');
			$Retroactivospuntosnomina->RPNO_FECHACAMBIO =  date('Y-m-d H:i:s');
			$Retroactivospuntosnomina->RPNO_REGISTRADOPOR = Yii::app()->user->id;			 
			$msj = $this->liquidarRetroactivospuntos($Retroactivospuntosnomina);
			if($msj!=""){			 
			 echo"
             <table border='1' align='center'  width='100%' style='border-collapse:collapse;'>
              <tr align='center'><td colspan='2'><strong>Resultados de la liquidaci&oacute;n</strong></td></tr>";					
			 echo "<tr><th>Notificaci&oacute;n</th><th>Detalles</th></tr>";
			 for ($i=0;$i<count($msj);$i++){
			  echo "<tr>";
			   echo "<td>".$msj[$i][0]."</td><td>".$msj[$i][1]."</td>";
			  echo "</tr>";
			 }
			 echo"
			 </table>";	 
		    }
		}else{

		$this->render('create',array(
			'Retroactivospuntosnomina'=>$Retroactivospuntosnomina,
		));
		}
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

		if(isset($_POST['Retroactivospuntosnomina']))
		{
			$model->attributes=$_POST['Retroactivospuntosnomina'];
			$model->RPNO_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->RPNO_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->RPNO_ID));
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
		$dataProvider=new CActiveDataProvider('Retroactivospuntosnomina');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Retroactivospuntosnomina('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Retroactivospuntosnomina']))
			$model->attributes=$_GET['Retroactivospuntosnomina'];

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
		$model=Retroactivospuntosnomina::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='retroactivospuntosnomina-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	protected function liquidarRetroactivospuntos($objet)
	{
	 $Retroactivospuntosnomina = new Retroactivospuntosnomina;
	 $msj = $Retroactivospuntosnomina->liquidarRetroactivospuntos($objet);
	 return $msj;	
	}
}