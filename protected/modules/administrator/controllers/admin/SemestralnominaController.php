<?php

class SemestralnominaController extends Controller
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
				'actions'=>array(''.$array[0].'',''.$array[1].'',''.$array[2].'',''.$array[3].'',''.$array[4].'','views',
                                 'delete','admin','create','update','search','setEstado', 
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
	public function actionView()
	{
		$this->render('viewnomina',array(
		//$this->render('view',array(
			//'model'=>$this->loadModel($id),
		));
	}
	
	public function actionSearch()
	{
		$Informes = new Informes;
		$this->render('search',array(
		                             'Informes'=>$Informes,	
		                             	
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$Semestralnomina = new Semestralnomina;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Semestralnomina']))
		{
			$Semestralnomina->attributes=$_POST['Semestralnomina'];
	        $Semestralnomina->SENO_ID = date("Y", strtotime($Semestralnomina->SENO_FECHAPROCESO)).date("m", strtotime($Semestralnomina->SENO_FECHAPROCESO))."11"; 
	        $Semestralnomina->SENO_ANIO = date("Y",strtotime($Semestralnomina->SENO_FECHAPROCESO));
			$Semestralnomina->SENO_PERIODO = 'PRIMA SEMESTRAL '.$Semestralnomina->SENO_ANIO;         
			$Semestralnomina->SENO_ESTADO = 0; 			
			 			
			$Semestralnomina->SENO_FECHACAMBIO =  date('Y-m-d H:i:s');
			$Semestralnomina->SENO_REGISTRADOPOR = Yii::app()->user->id;			 
			$msj = $this->validarNomina($Semestralnomina);
			if($msj!=""){
			 echo "<table border='1' align='center'  width='100%' style='border-collapse:collapse;'>
			       <tr bgcolor='#FAA992' align='center'>
                    <td><strong>".$msj."</strong></td>
                   </tr>";      
            echo"</table>";
		    }else{ 
		          if($Semestralnomina->save()){
				    $Semestralnomina->liquidarNomina($Semestralnomina);
					
					echo"
                    <table border='1' align='center'  width='100%' style='border-collapse:collapse;'>
                    <tr align='center'><td><strong>Resultados de la liquidaci&oacute;n</strong></td></tr>";
					
					$imageUrl = Yii::app()->request->baseUrl . '/images/nomina/icon_succes.png';
					$image = CHtml::image($imageUrl);
					if($Semestralnomina->flag==''){
					 echo "<tr><td><strong>La nomina de ".$Semestralnomina->SENO_PERIODO." fue generada exitosamente...</strong>";
	                 echo "<div align='left'>";
	                 echo "<br>".$image."&nbsp;&nbsp;Registros exitosos: ".$Semestralnomina->s;
					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/nomina/icon_warning.png';
					 $image = CHtml::image($imageUrl);
					 if ($Semestralnomina->w==null){
					  $Semestralnomina->w=0;
					  echo "<br>".$image."&nbsp;&nbsp;Registros cuyo neto pagado es negativo: ".$Semestralnomina->w;
					 }else{
						   echo "<br>".$image."&nbsp;&nbsp;Registros cuyo neto pagado es negativo: ".$Semestralnomina->w;
						   echo "<br>Detalles: ";
						   echo '<table align="center"  width="100%" border="1" style="border-collapse:collapse;"><tr align"="center"><th>Cedula</th><th>Cargo</th><th>Nombre</th><th>Vr Devengado</th><th>Vr descuento</th></tr>';
						   for($i=0;$i<count($Semestralnomina->warning);$i++){
							echo '<tr align"="center">';
							echo "<td>".$Semestralnomina->warning[$i][0]."</td><td>".$Semestralnomina->warning[$i][1]."</td><td>".$Semestralnomina->warning[$i][2]."</td><td>".number_format($Semestralnomina->warning[$i][3])."</td><td>".number_format($Semestralnomina->warning[$i][4])."</td>";
							echo "</tr>";
						   }
						   echo ' <tr>
					               <td colspan="5">NOTA: se recomienda revisar los descuentos de estos empleados y volverlos a liquidar</td>
				                  </tr>
								 </table>';
					      }
					 $imageUrl = Yii::app()->request->baseUrl . '/images/nomina/icon_flag.png';
					 $image = CHtml::image($imageUrl);
                     if ($Semestralnomina->f==null){
					  $Semestralnomina->f=0;
					  echo "<br>".$image."&nbsp;&nbsp;Registros con Errores: ".$Semestralnomina->f;
					 }else{
					       echo "<br>".$image."&nbsp;&nbsp;Registros con Errores: ".$Semestralnomina->e;
						   echo "<br>Detalles: ";
						   echo '<table  align="center"  width="100%" border="1" style="border-collapse:collapse;"><tr align"="center"><th>Cedula</th><th>Cargo</th><th>Nombre</th><th>Errores</th></tr>';
						   for($i=0;$i<count($Semestralnomina->flag);$i++){
							echo '<tr align"="center">';
							echo "<td>".$Semestralnomina->flag[$i][0]."</td><td>".$Semestralnomina->flag[$i][1]."</td><td>".$Semestralnomina->flag[$i][2]."</td><td>".$Semestralnomina->flag[$i][3]."</td>";
							echo "</tr>";
						   }
						   echo ' <tr>
					               <td colspan="2">NOTA: Se revisar los errores, luego de superalos volver a liquidar toda la nomina</td>
				                  </tr>
							     </table>';
					      }					 
					 echo"</<div></td></tr>	"; 
					}else{
	                      echo"<tr bgcolor='#FAA992'>
                               <td>".$Semestralnomina->error."</td>
                               </tr>";
                         }
                     echo"</table>";
				 
				  }
				 }
		}else{
		      $this->render('create',array(
			  'Semestralnomina'=>$Semestralnomina,
		       )
			  );
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

		if(isset($_POST['Semestralnomina']))
		{
			$model->attributes=$_POST['Semestralnomina'];
			$model->SENO_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->SENO_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->SENO_ID));
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
		$dataProvider=new CActiveDataProvider('Semestralnomina');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Semestralnomina('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Semestralnomina']))
			$model->attributes=$_GET['Semestralnomina'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionSetEstado($id)
	{
		
		$Semestralnomina=$this->loadModel($id);		
		if($Semestralnomina->SENO_ESTADO==1){
		 Yii::app()->user->setFlash('warning','<strong>Oppss!. </strong> La Nomina de: <strong>'.$Semestralnomina->SENO_PERIODO.'</strong> se encuentra <strong>PAGADA</strong>, por lo tanto no se puede modificar el estado.');
		}else{
		      $Semestralnomina->SENO_ESTADO = 1;
			  $Semestralnomina->SENO_FECHACAMBIO =  date('Y-m-d H:i:s');
			  $Semestralnomina->SENO_REGISTRADOPOR = Yii::app()->user->id;
		      $Semestralnomina->save();
			  Yii::app()->user->setFlash('success',' EL estado de la nomina de: <strong>'.$Semestralnomina->SENO_PERIODO.'</strong> ha sido cambiado a <strong>PAGADA</strong> exitosamente...');
			 }
	
	    $this->redirect(array('admin'));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Semestralnomina::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='semestralnomina-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	protected function validarNomina($objet)
	{
	 $Semestralnomina = new Semestralnomina;
	 $msj = $Semestralnomina->validarNomina($objet);
	 return $msj;	
	}
}