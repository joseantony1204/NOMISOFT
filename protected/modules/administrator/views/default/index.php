<?php
$this->breadcrumbs=array(
	$this->module->id,
);

/////
function NombreMes($m)
{
 switch ($m)
 {
  case 1: return "Enero";
  case 2: return "Febrero";
  case 3: return "Marzo";
  case 4: return "Abril";
  case 5: return "Mayo";
  case 6: return "Junio";
  case 7: return "Julio";
  case 8: return "Agosto";
  case 9: return "Septiembre";
  case 10: return "Octubre";
  case 11: return "Noviembre";
  case 12: return "Diciembre";
 }
}
$dia = date("j");
$mes = NombreMes(date("m"));
$anio = date("Y");
$fecha = $dia." de ".$mes." del ".$anio;

?>
	
<table width="80%" border="0" align="center">
 <tr>   
    <td>
    <fieldset  style="border:1px groove #ccc; background:#EEEEEE;">
	
	<table width="98%" border="0" align="center">
          <tr>
            <th scope="col">
			 
			 <table width="100%" border="0" align="center">
              			  
              <tr>
              <td>
			  
				  <table width="98%"  border="0" align="center" >
                   <tr>
                     <td width="49%"> 
					
					 <table width="98%" border="0">
                       				   
					   <tr>
                        <td colspan="2"><hr /></td>
                       </tr>
					   
					   <tr>
                       
					   <td width="62" align="center" scope="col">
						<?php				 
						$imageUrl = Yii::app()->request->baseUrl . '/images/people.png';
						$htmlOptions = array('class' => 'thumbnail', 'rel' => 'tooltip','data-title' => 'Administrar Empleados');
						echo $image = CHtml::image($imageUrl);
						?>
						</td>
                        
						<td width="358" align="left" scope="col"><?php echo strtoupper(Yii::app()->user->nombres); ?></td>
                       
					   </tr>
					   
					   <tr>
                        <td colspan="2" align="center" scope="col">Sesión iniciada con el perfil de:<strong>Super Administrador</strong></td>
                       </tr>
					   
					   <tr>
                        <td colspan="2"><hr /></td>
                       </tr>
					   
					   <tr>
                        <td colspan="2" align="center">
						
						<table width="100%" border="0">
                          <tr>
                              <td width="44" align="center">
							  
							  <?php				 
							   $imageUrl = Yii::app()->request->baseUrl . '/images/fecha.png';
							   $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Administrar Empleados');
							   echo $image = CHtml::image($imageUrl);
							  ?>
							  
							  </td>
                              <td width="370" ><strong>Hoy es :</strong> <?php echo $fecha;?>
                              <?php
							  if($filas>0){
                               echo '<br />
                               Empleados que se encuentran  cumpliendo años de vida en el dia de hoy : ';							  
							   echo "<a href=\"javascript:void(0);\"  onclick=\"window.location='files/cumpleanos/cumpleanos.php'\">";
							   echo $filas; 
							   echo '</a>';
							   echo "<font color='#1C8A1F'> E-Mail Enviado. . . </font>";
							  }
							  ?>
							  </td>
                              
							  </tr>
                        </table>
						
                        </td>
                        </tr>
						
						<tr>
                         <td colspan="2" align="center"><hr /></td>
                        </tr>
						
                        <tr>
                         <td colspan="2" align="justify">Aplicación  creada para la gestión, administración y  control de nómina de empleados de la Universidad de La Guajira.</td>
                        </tr>
						
                        <tr>
                         <td height="15" colspan="2"><hr /></td>
                        </tr>
					   
					  </table>
					  
					 </td>
					 
					 <td width="2%" align="center">
					 
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/m.png';
					 $htmlOptions = array('class' => 'thumbnail', 'rel' => 'tooltip','data-title' => 'Administrar Empleados');
					 echo $image = CHtml::image($imageUrl);
					 ?>
					 
					 </td>
					 
					 <td width="49%" >
					 
					 <fieldset style="border:1px groove #ccc; background:#FFFFFF;">
                     
					 <table width="98%" border="0" align="center">
                          
						  <tr>
                            <th colspan="5" scope="col"><hr /></th>
                          </tr>
						  
						  <tr align="center" >
                            <td scope="col">
							<?php				 
							 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_aempleados.png';
							 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Administrar Empleados');
							 $image = CHtml::image($imageUrl);
							 echo CHtml::link($image, array('admin/personasgenerales/admin',),$htmlOptions ); 
							?> 
							</td>
                            <td scope="col">&nbsp;</td>
                            <td scope="col">
							<?php				 
							 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_amensual.png';
							 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Administrar Nomina Mensuales');
							 $image = CHtml::image($imageUrl);
							 echo CHtml::link($image, array('admin/mensualnomina/admin',),$htmlOptions ); 
							?>
							</td>
                            <td scope="col">&nbsp;</td>
                            <td scope="col">
							<?php				 
							 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_ausuarios.png';
							 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Administrar Usuarios');
							 $image = CHtml::image($imageUrl);
							 echo CHtml::link($image, array('admin/usuarios/admin',),$htmlOptions ); 
							?>
							</td>
                          </tr>
						  
						  <tr>
                            <td colspan="5"><hr /></td>
                          </tr>
                          
						  <tr>
                            <td align="center">
							<?php				 
							 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_acg.png';
							 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Configuraciones Generales');
							 $image = CHtml::image($imageUrl);
							 echo CHtml::link($image, array('admin/parametrosglobales/admin',),$htmlOptions ); 
							?>
							</td>
                            <td>&nbsp;</td>
                            <td align="center">
							<?php				 
							 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_acopseg.png';
							 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Copias de Seguridad');
							 $image = CHtml::image($imageUrl);
							 echo CHtml::link($image, array('/administrator',),$htmlOptions ); 
							?>
							</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">
							<?php				 
							 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_aseguridad.png';
							 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Seguridad del Sistema');
							 $image = CHtml::image($imageUrl);
							 echo CHtml::link($image, array('/administrator',),$htmlOptions ); 
							?>
							</td>
                          </tr>
                          
						  <tr>
                            <td colspan="5"><hr /></td>
                          </tr>
						  
					 </table>
					 
					 </fieldset>
					 
					 </td>
					 
                   </tr>
                  </table>
			  
			  
			  </td>
              </tr>
			  
			 </table>
			 
		    </th>
          </tr>
		  
    </table>
	
    </fieldset>
	</td>
 </tr>	  
</table>