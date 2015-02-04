<?php

class LiquidacionesController extends Controller
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
				'actions'=>array(''.$array[0].'',''.$array[1].'',''.$array[2].'',''.$array[3].'',''.$array[4].'','planogeneral',
                                 'delete','admin','create','update','download', 'email', 'updatestate',
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
	
	public function actionUpdatestate($id)
	{
		
		$Liquidaciones = $this->loadModel($id);		
		if($Liquidaciones->LIQU_ESTADO==1){
		 
		}else{
		      $Liquidaciones->LIQU_ESTADO = 1;
			  $Liquidaciones->LIQU_FECHACAMBIO =  date('Y-m-d H:i:s');
			  $Liquidaciones->LIQU_REGISTRADOPOR = Yii::app()->user->id;
		      $Liquidaciones->save();		  
			 }
	
	}
	
	public function actionPlanoGeneral($id=NULL,$sw=NULL)
	{
		$Liqprimasemestral = new Liqprimasemestral;
		$Liqvacaciones = new Liqvacaciones;
		$Liqprimavacaciones = new Liqprimavacaciones;
		$Liqprimanavidad = new Liqprimanavidad;
		$Liqcesantias = new Liqcesantias;
		
		
		$Liquidaciones = Liquidaciones::model()->findByPk($id);		
		/**
		 *obtener las liquidaciones de cada una de las prestaciones
		 */
		$Liqprimasemestral->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		$Liqvacaciones->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		$Liqprimavacaciones->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		$Liqprimanavidad->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		$Liqcesantias->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		
		
		$this->render('planogeneral',array(
			'Liquidaciones'=>$Liquidaciones,
			'Liqprimasemestral'=>$Liqprimasemestral,
			'Liqvacaciones'=>$Liqvacaciones,
			'Liqprimavacaciones'=>$Liqprimavacaciones,
			'Liqprimanavidad'=>$Liqprimanavidad,
			'Liqcesantias'=>$Liqcesantias,
			'sw'=>$sw,
		));
	}
	
	public function actionEmail($id=NULL,$sw=NULL)
	{
		$Liqprimasemestral = new Liqprimasemestral;
		$Liqvacaciones = new Liqvacaciones;
		$Liqprimavacaciones = new Liqprimavacaciones;
		$Liqprimanavidad = new Liqprimanavidad;
		$Liqcesantias = new Liqcesantias;
		
		
		$Liquidaciones = Liquidaciones::model()->findByPk($id);		
		$Personasgeneral = Personasgenerales::model()->findByPk($Liquidaciones->PEGE_ID);		
		/**
		 *obtener las liquidaciones de cada una de las prestaciones
		 */
		$Liqprimasemestral->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		$Liqvacaciones->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		$Liqprimavacaciones->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		$Liqprimanavidad->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		$Liqcesantias->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		
		
		$this->render('email',array(
			'Liquidaciones'=>$Liquidaciones,
			'Liqprimasemestral'=>$Liqprimasemestral,
			'Liqvacaciones'=>$Liqvacaciones,
			'Liqprimavacaciones'=>$Liqprimavacaciones,
			'Liqprimanavidad'=>$Liqprimanavidad,
			'Liqcesantias'=>$Liqcesantias,
			'Personasgeneral'=>$Personasgeneral,
			'sw'=>$sw,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$Liquidaciones = new Liquidaciones;

		if(isset($_POST['Liquidaciones']))
		{
			$Liquidaciones->attributes=$_POST['Liquidaciones'];
			$Liquidaciones->LIQU_MESINICIO = $_POST['Liquidaciones']['LIQU_MESINICIO'];			
            $Liquidaciones->LIQU_MESFINAL = $_POST['Liquidaciones']['LIQU_MESFINAL'];								
            $Liquidaciones->LIQU_ANIO = $_POST['Liquidaciones']['LIQU_ANIO'];								
			$Liquidaciones->LIQU_FECHAPROCESO =  date('Y-m-d');        
			$Liquidaciones->LIQU_ESTADO = 0;			
			$Liquidaciones->LIQU_FECHACAMBIO =  date('Y-m-d H:i:s');
			$Liquidaciones->LIQU_REGISTRADOPOR = Yii::app()->user->id;

			$msj = $this->setLiquidaciones($Liquidaciones);
            if($msj!=""){			 
			 echo"
             <table border='1' align='center'  width='100%' style='border-collapse:collapse;'>
              <tr align='center'><td colspan='2'><strong>Resultados del proceso de liquidaci&oacute;n !!!</strong></td></tr>";					
			 echo "<tr><th>Notificaci&oacute;n</th><th>Detalles</th></tr>";
			 for ($i=0;$i<count($msj);$i++){
			  echo "<tr>";
			   echo "<td align='center'>".$msj[$i][0]."</td><td>".$msj[$i][1]."</td>";
			  echo "</tr>";
			 }
			 echo"
			 </table>";	 
		    }						
		}else{
		      $this->render('create',array(
			   'Liquidaciones'=>$Liquidaciones,
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

		if(isset($_POST['Liquidaciones']))
		{
			$model->attributes=$_POST['Liquidaciones'];
			$model->LIQU_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->LIQU_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->LIQU_ID));
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
		$dataProvider=new CActiveDataProvider('Liquidaciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionDownload($id)
	{
		$Liqprimasemestral = new Liqprimasemestral;
		$Liqvacaciones = new Liqvacaciones;
		$Liqprimavacaciones = new Liqprimavacaciones;
		$Liqprimanavidad = new Liqprimanavidad;
		$Liqcesantias = new Liqcesantias;
		
		
		$Liquidaciones = Liquidaciones::model()->findByPk($id);		
		/**
		 *obtener las liquidaciones de cada una de las prestaciones
		 */
		$Liqprimasemestral->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		$Liqvacaciones->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		$Liqprimavacaciones->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		$Liqprimanavidad->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		$Liqcesantias->mostrarLiquidacion($Liquidaciones->LIQU_ID);
		
		
		$this->render('download',array(
			'Liquidaciones'=>$Liquidaciones,
			'Liqprimasemestral'=>$Liqprimasemestral,
			'Liqvacaciones'=>$Liqvacaciones,
			'Liqprimavacaciones'=>$Liqprimavacaciones,
			'Liqprimanavidad'=>$Liqprimanavidad,
			'Liqcesantias'=>$Liqcesantias,
		));
	}
	
	public function actionAdmin()
	{
		$model=new Liquidaciones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Liquidaciones']))
			$model->attributes=$_GET['Liquidaciones'];

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
		$model=Liquidaciones::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='liquidaciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	protected function setLiquidaciones($objet)
	{
	 $Liquidaciones = new Liquidaciones;
	 $msj = $Liquidaciones->setLiquidaciones($objet);
	 return $msj;	
	}
}