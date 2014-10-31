 <table width="100%" border="0" align="center" class="">
  
  <tr>
   <td> 
   <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'search-update-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well',),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
    )); 
	?>
	<div class="form-actions">
	
	<table width="100%" border="0" align="center" class="">
	 <tr>
      <td width="35%" align="center"><strong>Proceso actual</strong></td>
	  <td width="5%" align="center">&nbsp;</td>
	  <td width="60%" align="center"><strong>Descripciòn del proceso</strong> </td>
	 </tr>
	 
	 <tr>
      <td align="center">&nbsp;</td>
	  <td align="center">&nbsp;</td>
	  <td align="center">&nbsp;</td>
	 </tr>
	 
	 <tr>
      <td>
	  <table width="100%" border="0" align="left" class="">
  
	  <tr>
      <td> 
	  
		<?php 
		if($opcion==1){
		$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'VEFIFICAR DOCENTES EN LA FACULTAD Y CONTINUAR...',
			'htmlOptions'=>array(                    
			                     'name'=>'opcion1',
								),
		));
        $descripcionopcion = 'En esta etapa se vefificaràn los <strong>docentes existentes y no existentes</strong> en <strong>BASE DE DATOS</strong> y su categorizaciòn.';		
		}elseif($opcion==2){
		 $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'edit white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'AGREGAR DOCENTES A LA BASE DE DATOS Y CONTINUAR...',
			'htmlOptions'=>array(                    
			                     'name'=>'opcion2',
								),
		 ));
        $descripcionopcion = 'En esta etapa se <strong>agregaràn</strong> nuevos docentes y se <strong>actualizarà</strong> la categorizaciòn de antiguos en la <strong>BASE DE DATOS</strong>';				 
		}elseif($opcion==3){
		 $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'list white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'ACTUALIZAR CATEDRAS A DOCENTES EN LA FACULTAD Y FINALIZAR...',
			'htmlOptions'=>array(                    
			                     'name'=>'opcion3',
								),
		 ));
        $descripcionopcion = 'En esta etapa se <strong>agregaràn o actualizaràn</strong> catedras en <strong>'.$Facultades->FACU_NOMBRE.'</strong>.';		 
		}elseif($opcion==4){
		 $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'list white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'FINALIZAR PROCESO Y REGRESAR A INICIO...',
			'htmlOptions'=>array(                    
			                     'name'=>'opcion4',
								),
		 ));
		 $descripcionopcion = 'EL proceso de validaciòn y actualizaciòn ha finalizado exitosamente.';		 		 
		}
		?>
		
	  </td>
     </tr>
     </table>
	 </td>
	 <td align="center">&nbsp;</td>
	 <td><div align='justify'><?php echo $descripcionopcion; ?></div></td>
	 
    </tr>
   </table>
	 </div>
	 
	<?php $this->endWidget(); ?>
   </td>
  </tr>
  
  <tr>
   <td align="center" ><strong>Detalles del proceso...</strong></td>
  </tr>
  
  <tr>
   <td align="center">
   
   <table width="100%" border="0" align="left" class="">
	 <tr>
      <td>
	  
	  <fieldset>
	  <table width="100%" border="0" align="center" style="border-collapse:collapse;">
         <tr align="center">
          <td width="100%" colspan="2">&nbsp;</td>
         </tr>
		 
		 <?php
			 /**
			 *esta bloque es para detallar la opcion UNO ->VERIFICAR
			 */
			 if($opcion==2){  
			  if(((count($Catedras->DocNoBaseD))!=0) or ((count($Catedras->DocEnBaseD))!=0)){
			   if((count($Catedras->DocNoBaseD))!=0){
			    echo'
			     <tr align="center">
                  <td width="60%" align="left">'.$Catedras->noExiste.'</td>
			      <td width="40%" align="left">En total : '.(count($Catedras->DocNoBaseD)).'</td>
                 </tr>';
			    }
			  if((count($Catedras->DocEnBaseD))!=0){
			   echo'
			   <tr align="center">
                <td width="60%" align="left">'.$Catedras->exite.'</td>
			    <td width="40%" align="left">En total : '.(count($Catedras->DocEnBaseD)).'</td>
               </tr>';
			  }
			  if((count($Catedras->subioCategoria))!=0){
			    echo'
			     <tr align="center">
                  <td width="60%" align="left">
				  <font color="#129232">Detalles : Personas que <strong>SUBIERON DE CATEGORIA</strong></font></td>
			      <td width="40%" align="left">En total : '.(count($Catedras->subioCategoria)).'</td>
                 </tr>';
			    }
			if((count($Catedras->bajoCategoria))!=0){
			    echo'
			     <tr align="center">
                  <td width="60%" align="left">
				  <font color="#D31F05">Detalles : Personas que <strong>BAJARON DE CATEGORIA</strong></font></td>
			      <td width="40%" align="left">En total : '.(count($Catedras->bajoCategoria)).'</td>
                 </tr>';
			    }	
			 if((count($Catedras->DocNoBaseD))!=0){
			 echo'
			 <tr align="center" class="T2">
			  <td width="100%" align="center" colspan="2">Desplegando detalles encontrados en el archivo</td>
			 </tr>
			 <tr align="center">
			  <td colspan="2">
			  <table width="100%" border="1" align="center" style="border-collapse:collapse;">				 
			  <tr align="center" class="T3">
			   <td width="10%" align="center">Item</td>
			   <td width="15%" align="center">Identificacion</td>
			   <td width="35%" align="center">Nombres</td>
			   <td width="20%" align="center">En base de datos</td>
			   <td width="20%" align="center">Agregado</td>
			  </tr>';
			  for($i=0;$i<(count($Catedras->DocNoBaseD));$i++){
			   echo'			  
			    <tr align="center">
			     <td align="center">'.($i+1).'</td>
				 <td align="center">'.$Catedras->DocNoBaseD[$i][0].'</td>
			     <td align="center">'.$Catedras->DocNoBaseD[$i][1].'</td>
			     <td align="center">'.CHtml::image(Yii::app()->request->baseUrl . '/images/cross.png').'</td>
			     <td align="center">'.CHtml::image(Yii::app()->request->baseUrl . '/images/cross.png').'</td>
			    </tr>';
			  }
			   echo '</table>
			  </td>
			 </tr>';			   
			  }
			  
			 if(((count($Catedras->bajoCategoria))!=0) && ((count($Catedras->DocEnBaseD))!=0)){
			 echo'
			 <tr align="center" class="T2">
			  <td width="100%" align="center" colspan="2">Desplegando Personas que BAJARON de Categoria</td>
			 </tr>
			 <tr align="center">
			  <td colspan="2">
			  <table width="100%" border="1" align="center" style="border-collapse:collapse;">				 
			  <tr align="center" class="T3">
			   <td width="5%" align="center">Item</td>
			   <td width="12%" align="center">Identificacion</td>
			   <td width="30%" align="center">Nombres</td>
			   <td width="8%" align="center">Actual</td>
			   <td width="8%" align="center">Bajo A</td>
			   <td width="15%" align="center">En base de datos</td>
			   <td width="10%" align="center">Agregado</td>
			  </tr>';
			  for($i=0;$i<((count($Catedras->bajoCategoria)));$i++){
               echo'			  
			    <tr align="center">
			     <td align="center">'.($i+1).'</td>
				 <td align="center">'.$Catedras->bajoCategoria[$i][0].'</td>
			     <td align="center">'.$Catedras->bajoCategoria[$i][1].'</td>
				 <td align="center">'.$Catedras->bajoCategoria[$i][2].'</td>
				 <td align="center">'.$Catedras->bajoCategoria[$i][3].'</td>
			     <td align="center">'.CHtml::image(Yii::app()->request->baseUrl . '/images/tick.png').'</td>
			     <td align="center">'.CHtml::image(Yii::app()->request->baseUrl . '/images/cross.png').'</td>
			    </tr>';
			  }
			   echo '</table>
			  </td>
			 </tr>';			   
			  }
			  
			  if(((count($Catedras->subioCategoria))!=0) && ((count($Catedras->DocEnBaseD))!=0)){
			 echo'
			 <tr align="center" class="T2">
			  <td width="100%" align="center" colspan="2">Desplegando Personas que SUBIERON de Categoria</td>
			 </tr>
			 <tr align="center">
			  <td colspan="2">
			  <table width="100%" border="1" align="center" style="border-collapse:collapse;">				 
			  <tr align="center" class="T3">
			   <td width="5%" align="center">Item</td>
			   <td width="12%" align="center">Identificacion</td>
			   <td width="30%" align="center">Nombres</td>
			   <td width="8%" align="center">Actual</td>
			   <td width="8%" align="center">Subio A</td>
			   <td width="15%" align="center">En base de datos</td>
			   <td width="10%" align="center">Agregado</td>
			  </tr>';
			  for($i=0;$i<((count($Catedras->subioCategoria)));$i++){
               echo'			  
			    <tr align="center">
			     <td align="center">'.($i+1).'</td>
				 <td align="center">'.$Catedras->subioCategoria[$i][0].'</td>
			     <td align="center">'.$Catedras->subioCategoria[$i][1].'</td>
				 <td align="center">'.$Catedras->subioCategoria[$i][2].'</td>
				 <td align="center">'.$Catedras->subioCategoria[$i][3].'</td>
			     <td align="center">'.CHtml::image(Yii::app()->request->baseUrl . '/images/tick.png').'</td>
			     <td align="center">'.CHtml::image(Yii::app()->request->baseUrl . '/images/cross.png').'</td>
			    </tr>';
			  }
			   echo '</table>
			  </td>
			 </tr>';			   
			  }
			  
			 }
			}
			
			/**
			*este bloque es para detallar la opcion DOS ->INGRESAR O ACTUALIZAR
			*/
			if($opcion==3){   
             if(((count($Catedras->DocNoBaseD))!=0) or ((count($Catedras->DocEnBaseD))!=0) or ((count($Catedras->DocInsertInBaseD))!=0) ){
			   if((count($Catedras->DocNoBaseD))!=0){
			    echo'
			     <tr align="center">
                  <td width="100%" align="left">'.$Catedras->noExiste." En total : ".(count($Catedras->DocNoBaseD)).'</td>
                 </tr>';
			    }
			  if((count($Catedras->DocEnBaseD))!=0){
			   echo'
			   <tr align="center">
                <td width="100%" align="left">'.$Catedras->exite." En total : ".(count($Catedras->DocEnBaseD)).'</td>
               </tr>';
			  }
			  if((count($Catedras->DocNoBaseDInsert))!=0){
			    echo'
			     <tr align="center">
          <td width="100%" align="left">'.$Catedras->noExisteInsert." En total : ".(count($Catedras->DocNoBaseDInsert)).'</td>
                 </tr>';
			    }
			  
			 if((count($Catedras->DocNoBaseDInsert))!=0){
			 echo'
			 <tr align="center" class="T2">
			  <td width="100%" align="center" colspan="2">Desplegando detalles encontrados en el archivo </td>
			 </tr>
			 <tr align="center">
			  <td colspan="2">
			  <table width="100%" border="1" align="center" style="border-collapse:collapse;">				 
			  <tr align="center" class="T3">
			   <td width="10%" align="center">Item</td>
			   <td width="15%" align="center">Identificacion</td>
			   <td width="35%" align="center">Nombres</td>
			   <td width="20%" align="center">En base de datos</td>
			   <td width="20%" align="center">Agregado</td>
			  </tr>';
			  for($i=0;$i<(count($Catedras->DocNoBaseDInsert));$i++){
               echo'	  
			    <tr align="center">
			     <td align="center">'.($i+1).'</td>
				 <td align="center">'.$Catedras->DocNoBaseDInsert[$i][0].'</td>
			     <td align="center">'.$Catedras->DocNombreNoBaseDInsert[$i][1].'</td>
			     <td align="center">'.CHtml::image(Yii::app()->request->baseUrl . '/images/cross.png').'</td>
			     <td align="center">'.CHtml::image(Yii::app()->request->baseUrl . '/images/tick.png').'</td>
			    </tr>';
			  }
			   echo '</table>
			  </td>
			 </tr>';			   
			  }
			 }
			}
			
			/**
			*este bloque es para detallar la opcion TRES ->INGRESAR O ACTUALIZAR CATEDRAS
			*/
			 if($opcion==4){  
			 if(((count($Catedras->errorNoCatedras))!=0)  or ((count($Catedras->docSiCateInFacult))!=0)){
			 echo'
			 <tr align="center" class="T2">
              <td width="100%" align="center" colspan="2">Detalles de los valores encontrados para actualizar o agregar las catedras</td>
			 </tr>';
			 }
			 
			 if((count($Catedras->docNoCateInFacult))!=0){
			    echo'
			     <tr align="center">
        <td width="100%" align="left">'.$Catedras->errorNoCatedras." En total : ".(count($Catedras->docNoCateInFacult)).'</td>
                 </tr>';
			    }
			  if((count($Catedras->docSiCateInFacult))!=0){
			   echo'
			   <tr align="center">
        <td width="100%" align="left">'.$Catedras->SiCatedras." En total : ".(count($Catedras->docSiCateInFacult)).'</td>
               </tr>';
			  }
			  
			  if((count($Catedras->docSiCateInFacult))!=0){
			   echo'
			   <tr align="center">
        <td width="100%" align="left">Registros Agregados o Actualizados en total : '.(count($Catedras->docSiCateInFacult)+(count($Catedras->docNoCateInFacult))).'</td>
               </tr>';
			  }
			  
			  if((count($Catedras->docSiCateInFacultAgr))!=0){
			 echo'
			 <tr align="center" class="T2">
			  <td width="100%" align="center" colspan="2">Desplegando detalles encontrados en el archivo</td>
			 </tr>
			 <tr align="center">
			  <td colspan="2">
			  <table width="100%" border="1" align="center" style="border-collapse:collapse;">				 
			  <tr align="center" class="T3">
			   <td width="10%" align="center">Item</td>
			   <td width="15%" align="center">Identificacion</td>
			   <td width="35%" align="center">Nombres</td>
			   <td width="20%" align="center">Catedra en Facultad</td>
			   <td width="20%" align="center">Agregado</td>
			  </tr>';
			  for($i=0;$i<(count($Catedras->docSiCateInFacultAgr));$i++){
               echo'			  
			    <tr align="center">
			     <td align="center">'.($i+1).'</td>
				 <td align="center">'.$Catedras->docSiCateInFacultAgr[$i].'</td>
			     <td align="center">'.$Catedras->docNoCateInFacultNom[$i].'</td>
			     <td align="center">'.CHtml::image(Yii::app()->request->baseUrl . '/images/cross.png').'</td>
			     <td align="center">'.CHtml::image(Yii::app()->request->baseUrl . '/images/tick.png').'</td>
			    </tr>';
			  }
			   echo '</table>
			  </td>
			 </tr>';			   
			  }
			 
			}	
			
			?>	
			
		 
		 
	  </table>
	  </fieldset>
	  
	  </td>
     </tr>
  </table>
  
  </td>
  </tr>
  
  <tr>
  <td>&nbsp;</td>
  </tr>
  
  <tr>
  <td>&nbsp;</td>
  </tr>
  
  <tr>
  <td>&nbsp;</td>
  </tr>
	 
 </table>