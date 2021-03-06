<?php

class MensualnominaController extends Controller
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
				'actions'=>array(''.$array[0].'',''.$array[1].'',''.$array[2].'',''.$array[3].'',''.$array[4].'','search',
                                 'delete','admin','create','update', 'setEstado', 'postcreate',  
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
		$Mensualnomina = new Mensualnomina;
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($Mensualnomina);

		if(isset($_POST['Mensualnomina']))
		{
			$Mensualnomina->attributes=$_POST['Mensualnomina'];
	        $Mensualnomina->MENO_ID = date("Y", strtotime($Mensualnomina->MENO_FECHAPROCESO)).date("m", strtotime($Mensualnomina->MENO_FECHAPROCESO))."01"; 
	        $Mensualnomina->MENO_PERIODO = $Mensualnomina->periodoNomina($Mensualnomina->MENO_FECHAPROCESO);         
			$Mensualnomina->MENO_ESTADO = "0"; 			
			$Mensualnomina->MENO_ANIO = date("Y",strtotime($Mensualnomina->MENO_FECHAPROCESO)); 			
			$Mensualnomina->MENO_FECHACAMBIO =  date('Y-m-d H:i:s');
			$Mensualnomina->MENO_REGISTRADOPOR = Yii::app()->user->id;			 
			$msj = $this->validarNomina($Mensualnomina);
			if($msj!=""){
			 echo "<table border='1' align='center'  width='100%' style='border-collapse:collapse;'>
			       <tr bgcolor='#FAA992' align='center'>
                    <td><strong>".$msj."</strong></td>
                   </tr>";      
            echo"</table>";
		    }else{ 
		          if($Mensualnomina->save()){
				    $Mensualnomina->liquidarNomina($Mensualnomina);
					
					echo"
                    <table border='1' align='center'  width='100%' style='border-collapse:collapse;'>
                    <tr align='center'><td><strong>Resultados de la liquidaci&oacute;n</strong></td></tr>";
					
					$imageUrl = Yii::app()->request->baseUrl . '/images/nomina/icon_succes.png';
					$image = CHtml::image($imageUrl);
					if($Mensualnomina->flag==''){
					 echo "<tr><td><strong>La nomina de ".$Mensualnomina->MENO_PERIODO." fue generada exitosamente...</strong>";
	                 echo "<div align='left'>";
	                 echo "<br>".$image."&nbsp;&nbsp;Registros exitosos: ".$Mensualnomina->s;
					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/nomina/icon_warning.png';
					 $image = CHtml::image($imageUrl);
					 if ($Mensualnomina->w==null){
					  $Mensualnomina->w=0;
					  echo "<br>".$image."&nbsp;&nbsp;Registros cuyo neto pagado es negativo: ".$Mensualnomina->w;
					 }else{
						   echo "<br>".$image."&nbsp;&nbsp;Registros cuyo neto pagado es negativo: ".$Mensualnomina->w;
						   echo "<br>Detalles: ";
						   echo '<table align="center"  width="100%" border="1" style="border-collapse:collapse;"><tr align"="center"><th>Cedula</th><th>Cargo</th><th>Nombre</th><th>Vr Devengado</th><th>Vr descuento</th></tr>';
						   for($i=0;$i<count($Mensualnomina->warning);$i++){
							echo '<tr align"="center">';
							echo "<td>".$Mensualnomina->warning[$i][0]."</td><td>".$Mensualnomina->warning[$i][1]."</td><td>".$Mensualnomina->warning[$i][2]."</td><td>".number_format($Mensualnomina->warning[$i][3])."</td><td>".number_format($Mensualnomina->warning[$i][4])."</td>";
							echo "</tr>";
						   }
						   echo ' <tr>
					               <td colspan="5">NOTA: se recomienda revisar los descuentos de estos empleados y volverlos a liquidar</td>
				                  </tr>
								 </table>';
					      }
					 $imageUrl = Yii::app()->request->baseUrl . '/images/nomina/icon_flag.png';
					 $image = CHtml::image($imageUrl);
                     if ($Mensualnomina->f==null){
					  $Mensualnomina->f=0;
					  echo "<br>".$image."&nbsp;&nbsp;Registros con Errores: ".$Mensualnomina->f;
					 }else{
					       echo "<br>".$image."&nbsp;&nbsp;Registros con Errores: ".$Mensualnomina->e;
						   echo "<br>Detalles: ";
						   echo '<table  align="center"  width="100%" border="1" style="border-collapse:collapse;"><tr align"="center"><th>Cedula</th><th>Cargo</th><th>Nombre</th><th>Errores</th></tr>';
						   for($i=0;$i<count($Mensualnomina->flag);$i++){
							echo '<tr align"="center">';
							echo "<td>".$Mensualnomina->flag[$i][0]."</td><td>".$Mensualnomina->flag[$i][1]."</td><td>".$Mensualnomina->flag[$i][2]."</td><td>".$Mensualnomina->flag[$i][3]."</td>";
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
                               <td>".$Mensualnomina->error."</td>
                               </tr>";
                         }
                     echo"</table>";
		          }
				 }
		}else{

		$this->render('create',array(
			'Mensualnomina'=>$Mensualnomina,
		));
		}
	}
	
	public function actionPostcreate()
	{
		$Mensualnomina = new Mensualnomina;
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($Mensualnomina);

		if(isset($_POST['Mensualnomina']))
		{
			$Mensualnomina->attributes=$_POST['Mensualnomina'];
	        $Mensualnomina->MENO_ID = date("Y", strtotime($Mensualnomina->MENO_FECHAPROCESO)).date("m", strtotime($Mensualnomina->MENO_FECHAPROCESO))."01"; 
	        $Mensualnomina->MENO_PERIODO = $Mensualnomina->periodoNomina($Mensualnomina->MENO_FECHAPROCESO);         
			$Mensualnomina->MENO_ESTADO = 0; 			
			$Mensualnomina->MENO_ANIO = date("Y",strtotime($Mensualnomina->MENO_FECHAPROCESO)); 			
			$Mensualnomina->MENO_FECHACAMBIO =  date('Y-m-d H:i:s');
			$Mensualnomina->MENO_REGISTRADOPOR = Yii::app()->user->id;			 
			$msj = $this->validarNominapost($Mensualnomina);
			if($msj!=""){
			 echo "<table border='1' align='center'  width='100%' style='border-collapse:collapse;'>
			       <tr bgcolor='#FAA992' align='center'>
                    <td><strong>".$msj."</strong></td>
                   </tr>";      
            echo"</table>";
		    }else{ 
		         $Mensualnomina = $this->loadModel($Mensualnomina->MENO_ID);
				 if($Mensualnomina){
				   $Mensualnomina->liquidarNomina($Mensualnomina,TRUE);
					
					echo"
                    <table border='1' align='center'  width='100%' style='border-collapse:collapse;'>
                    <tr align='center'><td><strong>Resultados de la liquidaci&oacute;n</strong></td></tr>";
					
					$imageUrl = Yii::app()->request->baseUrl . '/images/nomina/icon_succes.png';
					$image = CHtml::image($imageUrl);
					if($Mensualnomina->flag==''){
					 echo "<tr><td><strong>La nomina de ".$Mensualnomina->MENO_PERIODO." fue generada exitosamente...</strong>";
	                 echo "<div align='left'>";
	                 echo "<br>".$image."&nbsp;&nbsp;Registros exitosos: ".$Mensualnomina->s;
					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/nomina/icon_warning.png';
					 $image = CHtml::image($imageUrl);
					 if ($Mensualnomina->w==null){
					  $Mensualnomina->w=0;
					  echo "<br>".$image."&nbsp;&nbsp;Registros cuyo neto pagado es negativo: ".$Mensualnomina->w;
					 }else{
						   echo "<br>".$image."&nbsp;&nbsp;Registros cuyo neto pagado es negativo: ".$Mensualnomina->w;
						   echo "<br>Detalles: ";
						   echo '<table align="center"  width="100%" border="1" style="border-collapse:collapse;"><tr align"="center"><th>Cedula</th><th>Cargo</th><th>Nombre</th><th>Vr Devengado</th><th>Vr descuento</th></tr>';
						   for($i=0;$i<count($Mensualnomina->warning);$i++){
							echo '<tr align"="center">';
							echo "<td>".$Mensualnomina->warning[$i][0]."</td><td>".$Mensualnomina->warning[$i][1]."</td><td>".$Mensualnomina->warning[$i][2]."</td><td>".number_format($Mensualnomina->warning[$i][3])."</td><td>".number_format($Mensualnomina->warning[$i][4])."</td>";
							echo "</tr>";
						   }
						   echo ' <tr>
					               <td colspan="5">NOTA: se recomienda revisar los descuentos de estos empleados y volverlos a liquidar</td>
				                  </tr>
								 </table>';
					      }
					 $imageUrl = Yii::app()->request->baseUrl . '/images/nomina/icon_flag.png';
					 $image = CHtml::image($imageUrl);
                     if ($Mensualnomina->f==null){
					  $Mensualnomina->f=0;
					  echo "<br>".$image."&nbsp;&nbsp;Registros con Errores: ".$Mensualnomina->f;
					 }else{
					       echo "<br>".$image."&nbsp;&nbsp;Registros con Errores: ".$Mensualnomina->e;
						   echo "<br>Detalles: ";
						   echo '<table  align="center"  width="100%" border="1" style="border-collapse:collapse;"><tr align"="center"><th>Cedula</th><th>Cargo</th><th>Nombre</th><th>Errores</th></tr>';
						   for($i=0;$i<count($Mensualnomina->flag);$i++){
							echo '<tr align"="center">';
							echo "<td>".$Mensualnomina->flag[$i][0]."</td><td>".$Mensualnomina->flag[$i][1]."</td><td>".$Mensualnomina->flag[$i][2]."</td><td>".$Mensualnomina->flag[$i][3]."</td>";
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
                               <td>".$Mensualnomina->error."</td>
                               </tr>";
                         }
                     echo"</table>";
		          }
				 }
		}else{

		$this->render('postcreate',array(
			'Mensualnomina'=>$Mensualnomina,
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

		if(isset($_POST['Mensualnomina']))
		{
			$model->attributes=$_POST['Mensualnomina'];
			$model->MENO_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->MENO_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->MENO_ID));
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
		$dataProvider=new CActiveDataProvider('Mensualnomina');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Mensualnomina('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Mensualnomina']))
			$model->attributes=$_GET['Mensualnomina'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionSetEstado($id)
	{
		
		$Mensualnomina=$this->loadModel($id);		
		if($Mensualnomina->MENO_ESTADO==1){
		 Yii::app()->user->setFlash('warning','<strong>Oppss!. </strong> La Nomina de: <strong>'.$Mensualnomina->MENO_PERIODO.'</strong> se encuentra <strong>PAGADA</strong>, por lo tanto no se puede modificar el estado.');
		}else{
		      $Mensualnomina->MENO_ESTADO = 1;
		      $Mensualnomina->save();
			  Yii::app()->user->setFlash('success',' EL estado de la nomina de: <strong>'.$Mensualnomina->MENO_PERIODO.'</strong> ha sido cambiado a <strong>PAGADA</strong> exitosamente...');
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
		$model=Mensualnomina::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='mensualnomina-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	protected function validarNomina($objet)
	{
	 $Mensualnomina = new Mensualnomina;
	 $msj = $Mensualnomina->validarNomina($objet);
	 return $msj;	
	}
	
	protected function validarNominapost($objet)
	{
	 $Mensualnomina = new Mensualnomina;
	 $msj = $Mensualnomina->validarNominaposterior($objet);
	 return $msj;	
	}
}






