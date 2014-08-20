<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Nomina Mensual'=>Yii::app()->request->urlReferrer,
	'Detalles'
);

/*
$this->menu=array(
	array('label'=>'List Mensualnominaliquidaciones','url'=>array('index')),
	array('label'=>'Create Mensualnominaliquidaciones','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mensualnominaliquidaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
<style type="text/css">

.tabla2 {
font:94% Arial, Helvetica, sans-serif;
border-collapse: collapse;
border-spacing: 0;
border:1px solid;padding:3px 3px; border-color:#000;
}
.tabla2 tbody td {
 padding:5px;
 border-left: 1px solid #000;
}
.tabla2  table tr:first-child th { /* primera fila */
border-top: none;
}
.tabla2 table tr:last-child td { /* ultima fila */
border-bottom: none;
}
.tabla2 table th:first-child,
.tabla2 table td:first-child { /* primera columna */
border-left: none;
}
table th:last-child,
table td:last-child { /* ultima columna */
border-right: none;
}

</style>
<table width="90%" border="0" align="center">
  <tr>
   <td>
	<table width="100%" border="0" align="center">
     <tr>
      <td>
       <fieldset>
        <table width="100%" border="0" align="center">
            <tr>
             
			 <td width="10%" align="center">
			 <?php 			 
			 $imageUrl = Yii::app()->request->baseUrl . '/images/user.png';
			 echo $image = CHtml::image($imageUrl); 
			 ?>	               
             </td>
             
			 <td width="80%"><strong><span><em>DETALLES DE LIQUIDACION NOMINA MENSUAL ( <?php echo $Mensualnominaliquidaciones->MENO_PERIODO; ?> )<br><?php echo $tercero; ?></em></span></strong></td>
			 
			 <td width="10%" align="center">
			 <?php	 
			 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
			 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Novedades Mensuales');
			 $image = CHtml::image($imageUrl);
		     echo CHtml::link($image, Yii::app()->request->urlReferrer, $htmlOptions ); 
             ?>           
             </td>
           
		   </tr>
        </table>
       </fieldset>
      </td>
     </tr>
    </table></td>
  </tr>
  <tr>
    <td>
<?php 
$filas = count($Mensualnominaliquidaciones->liquidacion);
$columnas = count($Mensualnominaliquidaciones->liquidacion[1]);
$parafisales = count($Mensualnominaliquidaciones->parafiscales[0]);

$tblD = $Mensualnominaliquidaciones->descuentos;
$filasTblD = count($tblD);
$columnasTblD = count($tblD[0]);	
  
echo "<div align='right'><strong>Registros encontrados : ".($filas-1)."<strong></div>";

for($i=1;$i<$filas;$i++){
 /*
 echo "N. ".$tblD[$i][0]."<br>";
 for ($c=1;$c<($columnasTblD-1);$c++){
  echo $tblD[0][$c]." ".number_format($tblD[$i][$c])."<br>";
 }
 */
//echo $Mensualnominaliquidaciones->liquidacion[$i][27];
$anio=substr($Mensualnominaliquidaciones->liquidacion[$i][26],0,4);    
$Parametrosglobales = new Parametrosglobales; 	 
$Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
$valorPunto = $Parametrosglobales[1][3];
$Mensualnominaliquidaciones->liquidacion[$i][26];
$Mensualnomina = new Mensualnomina;
$Mensualnomina->MENO_PERIODO = $Mensualnominaliquidaciones->MENO_PERIODO;
$Mensualnomina->cargarEmpleoPlanta($Mensualnominaliquidaciones->liquidacion[$i][27]);
?>
	<table width="100%" border="1" align="center" class="tabla2" >
        <tr>
         <th colspan="2" align="center">NOMINA DE EMPLEADOS UNIVERSIDAD DE LA GUAJIRA</th>
        </tr>
        <tr>
         <th align="center" style="border:1px solid;padding:3px 3px; border-color:#000">INFORMACION BASICA</th>
         <th align="center" style="border:1px solid;padding:3px 3px; border-color:#000">DETALLE DE LA NOMINA</th>
        </tr>
		
        <tr valign="top">
         <td width="45%">
			
			<table width="100%" border="1" class="tabla2">
              
			  <tr>
                <td width="87">Comprobante No.</td>
                <td width="181"><?php echo $Mensualnominaliquidaciones->liquidacion[$i][26]; ?> - <?php echo $Mensualnominaliquidaciones->liquidacion[$i][1]; ?></td>
              </tr>
             
			 <tr>
                <td width="87">Periodo Liquidación</td>
                <td width="181"><?php echo $Mensualnomina->MENO_PERIODO; ?></td>
              </tr>
             
			 <tr>
                <td width="87">No. Identificación</td>
                <td width="181"><?php echo number_format($Mensualnomina->Personageneral->PEGE_IDENTIFICACION); ?></td>
              </tr>
             
			 <tr>
                <td>Nombre Completo</td>
                <td><?php echo $Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO; ?> <?php echo $Mensualnomina->Personageneral->PEGE_SEGUNDOAPELLIDOS; ?> <?php echo $Mensualnomina->Personageneral->PEGE_PRIMERNOMBRE; ?> <?php echo $Mensualnomina->Personageneral->PEGE_SEGUNDONOMBRE; ?></td>
              </tr>
              
			  <tr>
                <td>Tipo Empleado</td>
                <td><?php echo $Mensualnomina->Tipocargo->TICA_NOMBRE; ?></td>
              </tr>
              
			  <tr>
                <td>Cargo</td>
                <td><?php echo $Mensualnomina->Empleoplanta->EMPL_CARGO;?></td>
              </tr>
			  <?php
              if($Mensualnomina->Tipocargo->TICA_ID==2){
			  ?>
			  <tr>
               <td>Puntos</td>
               <td><?php echo $Mensualnomina->Empleoplanta->EMPL_PUNTOS; ?></td>
      	      </tr>
		      
			  <tr>
               <td>Valor Punto</td>
               <td><?php echo $valorPunto; ?> </td>
      	      </tr>
			  <?php
              }
			  ?>
              <tr>
                <td>Unidad</td>
                <td><?php echo $Mensualnomina->Unidad->UNID_ID; ?> -> <?php echo $Mensualnomina->Unidad->UNID_NOMBRE; ?></td>
              </tr>
			  
            </table>
			
		 </td>
			
         <td width="55%" >
			
		    <table width="100%" border="0" class="tabla2" style="border:1px solid;padding:3px 3px; border-color:#000">
              <tr border="1">
               <th width="246" align="center" style="border:1px solid;padding:3px 3px; border-color:#000">DESCRIPCION</th>
               <th width="66" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">DIAS</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">DEVENGADOS</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">DEDUCCIONES</th>
               <th width="110" align="center" style="border:1px solid;padding:3px 3px;border-color:#000">NETO</th>
              </tr>
              <tr>
	           <td>SUELDO(<?php  echo number_format($Mensualnomina->Empleoplanta->EMPL_SUELDO); ?>)</td>
			   <td align='center'><?php echo $Mensualnominaliquidaciones->liquidacion[$i][2]; ?></td>
			   <td align='right'><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$i][4]); ?></td>
	           <td>&nbsp;</td>
		       <td>&nbsp;</td>
		      </tr>
			  <?php
			  /* antiguedad, transporte y alimentacion*/
			  for ($ln=5;$ln<8;$ln++){
			   if($Mensualnominaliquidaciones->liquidacion[$i][$ln]!=0){
			  if ($ln==5){
		  		$antig = $Mensualnomina->Personageneral->getAntiguedad($Mensualnominaliquidaciones->liquidacion[$i][26])." A";
		  		}else{
					  $antig = "&nbsp;";
			         }
			  ?>
	          <tr>
		       <td><?php echo $Mensualnominaliquidaciones->liquidacion[0][$ln];?> </td>
		       <td align='center'><?php echo $antig; ?></td>
		       <td align='right'><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$i][$ln]); ?></td>
		       <td>&nbsp;</td>
		       <td>&nbsp;</td>
		      </tr>
		     <?php
               }
              }
			  ?>
			  
			  <?php
			  /* horas extras */
			  for ($ln=8;$ln<22;$ln=$ln+2){
			   if($Mensualnominaliquidaciones->liquidacion[$i][$ln]!=0){
			  ?>
			  <tr>
		       <td><?php echo $Mensualnominaliquidaciones->liquidacion[0][$ln+1];?></td>
		       <td align='center'><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$i][$ln]); ?></td>
		       <td align='right' ><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$i][$ln+1]); ?></td>
		       <td>&nbsp;</td>
		       <td>&nbsp;</td>
		      </tr>
			 <?php
               }
              }
			  ?>
			  <?php
			  /*prima tecnica, gastos, bonificacion, prima de vacaciones*/
			  for ($ln=22;$ln<26;$ln++){
			   if($Mensualnominaliquidaciones->liquidacion[$i][$ln]!=0){
			  ?>
			  <tr>
		       <td><?php echo $Mensualnominaliquidaciones->liquidacion[0][$ln];?></td>
		       <td align='center'>&nbsp;</td>
		       <td align='right'><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$i][$ln]); ?></td>
		       <td>&nbsp;</td>
		       <td>&nbsp;</td>
		      </tr>
			  <?php
               }
              }
			  ?>
			  
		      <?php  
			  /*parafiscales parte 1*/
			  /*salud, persion y sindicato*/
			  for ($ln=1;$ln<6;$ln=$ln+2){
			   if($Mensualnominaliquidaciones->parafiscales[$i][$ln+1]!=0){
			   ?>
			  <tr>
               <?php			  
			   if($ln==1){
				$Salud = Salud::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][$ln]);
				?>
			   <td><?php echo $Mensualnominaliquidaciones->parafiscales[0][$ln+1];?> (<?php echo $Salud->SALU_NOMBRE;?>)</td>			  
			    <?php
			    }elseif($ln==3){
				$Pension = Pension::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][$ln]);
			    ?>
		       <td><?php echo $Mensualnominaliquidaciones->parafiscales[0][$ln+1];?> (<?php echo $Pension->PENS_NOMBRE;?>)</td>
		        <?php
			    }elseif($ln==5){
				$Sindicatos = Sindicatos::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][$ln]);
				?>
		       <td><?php echo $Mensualnominaliquidaciones->parafiscales[0][$ln+1];?> (<?php echo $Sindicatos->SIND_NOMBRE;?>)</td>
		        <?php
			    }
				?>			   
			   <td>&nbsp;</td>
		       <td>&nbsp;</td>
			   <td align='right'><?php echo number_format($Mensualnominaliquidaciones->parafiscales[$i][$ln+1]); ?></td>		       
		       <td>&nbsp;</td>
		      </tr>
			  <?php
               }
              }
			  ?>
			  
			  <?php
			  /*parafiscales parte 2*/
			  for ($ln=7;$ln<11;$ln++){
			   if($Mensualnominaliquidaciones->parafiscales[$i][$ln]!=0){
			  ?>
			  <tr>
		       <td><?php echo $Mensualnominaliquidaciones->parafiscales[0][$ln];?></td>
		       <td>&nbsp;</td>
		       <td>&nbsp;</td>
		       <td align='right'><?php echo number_format($Mensualnominaliquidaciones->parafiscales[$i][$ln]); ?></td>
		       <td>&nbsp;</td>
		      </tr>
			  <?php
               }
              }
			  ?>
		      <?php
			  for ($c=1;$c<($columnasTblD-1);$c++){
			   if ($tblD[$i][$c]!=0){
			  ?> 
		  	  <tr>
		  	   <td $estilo><?php echo $tblD[0][$c]; ?></td>
		  	   <td>&nbsp;</td>
		  	   <td>&nbsp;</td>
			   <td align='right'><?php echo number_format($tblD[$i][$c]); ?></td>
			   <td>&nbsp;</td>
		  	  </tr>
		  	  <?php
               }
              } 
			  ?>		
	          <tr>
	           <td colspan='2' style='border-top:1px solid;padding:3px 3px;border-color:#000'>TOTALES</td>
	           <td align='right' style='border-top:1px solid;padding:3px 3px;border-color:#000'><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$i][$columnas-2]); ?></td>
	           <td align='right' style='border-top:1px solid;padding:3px 3px;border-color:#000'><?php echo number_format(($Mensualnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1])); ?></td>
	           <td align='right' style='border-top:1px solid;padding:3px 3px;border-color:#000'><?php echo number_format(($Mensualnominaliquidaciones->liquidacion[$i][$columnas-2])-(($Mensualnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1]))); ?></td>
	          </tr>
			  
            </table>
			
	     </td>
      </tr>
	  
    </table>
	
  <div><hr></hr></div>
<?php
	}	
?>	
    </td>
  </tr>

</table>
