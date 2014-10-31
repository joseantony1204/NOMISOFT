<?php
  $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'pt', 'Letter', true, 'UTF-8');
  ini_set("memory_limit","1024M"); 
  set_time_limit(0);
  
  $autor='ING. JOSE ANTONIO GONZALEZ LIÑAN - UNIVERSIDAD DE LA GUAJIRA';      
  $titulo = "REPORTE DE NOMINA";
  $palabrasClaves='REPORTE, NOMINA, TALENTO HUMANO';
  $Sujeto='REPORTE';
  $NombreDocumento = $titulo;
  
  // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  //$PDF_HEADER_LOGO = 'tcpdf_logoo.jpg';
  //$pdf->SetHeaderData($PDF_HEADER_LOGO, 160, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);
  
  // Información referente al PDF
  $pdf->SetCreator($autor);
  $pdf->SetAuthor($autor);
  $pdf->SetTitle($titulo);
  $pdf->SetSubject($Sujeto);
  $pdf->SetKeywords($palabrasClaves);
  
    // Fuente de la cabecera y el pie de página
  $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	
  // Márgenes
  $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
  $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
  $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  $pdf->setPrintFooter(true);
	
  // Saltos de página automáticos.
  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	
  // Establecer el ratio para las imagenes que se puedan utilizar
  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
   //***** AÑADIR PAGINA *****//

  $pdf->AddPage();
  //$pdf->SetFont('helvetica', '', 8);
  $pdf->SetFont('times', 'k', '10', true);
  $pdf->startPageGroup();
  
  /**
  *comenzamos a cargar la informacion
  *envidad desde la conlsulta
  */
  
  $filas = count($Mensualnominaliquidaciones->liquidacion);
  $columnas = count($Mensualnominaliquidaciones->liquidacion[1]);
  $parafisales = count($Mensualnominaliquidaciones->parafiscales[0]);

  $tblD = $Mensualnominaliquidaciones->descuentos;
  $filasTblD = count($tblD);
  $columnasTblD = count($tblD[0]);
  
  /**
  *empezamos a hacer el recorrido de la informacion obtenida
  */
  
  for($i=1;$i<$filas-1;$i++){
  
	$anio=substr($Mensualnominaliquidaciones->liquidacion[$i][5],0,4);  
    $Mensualnomina = Mensualnomina::model()->findByPk($Mensualnominaliquidaciones->liquidacion[$i][5]);
    $Mensualnomina->cargarEmpleoPlanta($Mensualnominaliquidaciones->liquidacion[$i][6]);
  
    $html = '
	 <table width="100%" border="1" align="center" >
        <tr>
         <th colspan="2" align="center">NOMINA DE EMPLEADOS UNIVERSIDAD DE LA GUAJIRA</th>
        </tr>
        <tr>
         <td width="45%" align="center">INFORMACION BASICA</td>
         <td width="55%" align="center">DETALLE DE LA NOMINA</td>
        </tr>
		
        <tr valign="top">
         <td>
		 
		 <table width="100%" rules="all"  border="0" style="font-size:11px">
              
			  <tr>
                <td width="40%"  align="left" >Comprobante No.:</td>
                <td width="60%" align="left" >'.$Mensualnominaliquidaciones->liquidacion[$i][5].' - '.$Mensualnominaliquidaciones->liquidacion[$i][1].'</td>
              </tr>
             
			 <tr>
                <td width="40%" align="left" >Periodo Liquidación:</td>
                <td width="60%" align="left" >'.$Mensualnomina->MENO_PERIODO.'</td>
              </tr>
             
			 <tr>
                <td width="40%" align="left" >No. Identificación:</td>
                <td width="60%" align="left" >'.number_format($Mensualnomina->Personageneral->PEGE_IDENTIFICACION).'</td>
              </tr>
             
			 <tr>
                <td width="40%" align="left" >Nombre Completo:</td>
                <td width="60%" align="left" >'.$Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO.' '.$Mensualnomina->Personageneral->PEGE_SEGUNDOAPELLIDOS.' '.$Mensualnomina->Personageneral->PEGE_PRIMERNOMBRE.' '.$Mensualnomina->Personageneral->PEGE_SEGUNDONOMBRE.'</td>
              </tr>';
			  
              $html.='
			  <tr>
                <td>Cargo</td>
                <td>'.$Mensualnomina->Catedra->CATE_CATEDRA.'</td>
              </tr>
		      
              <tr>
                <td>Facultad</td>
                <td>'.$Mensualnomina->Facultad->FACU_ID.' -> '.$Mensualnomina->Facultad->FACU_NOMBRE.'</td>
              </tr>
		
			  
            </table>
			
		 </td>
			
         <td>
			
		  <table width="100%" rules="cols" border="1" style="font-size:11px">
              
			  <tr>
               <td width="32%" align="center" >DESCRIPCION</td>
               <td width="8%" align="center" >DIAS</td>
               <td width="23%" align="center">DEVENGADOS</td>
               <td width="24%" align="center">DEDUCCIONES</td>
               <td width="13%" align="center">NETO</td>
              </tr>
              
			  <tr>
	           <td>SUELDO('.number_format($Mensualnomina->Catedra->CATE_VALORHORA).')</td>
			   <td align="center">'.$Mensualnominaliquidaciones->liquidacion[$i][2].'</td>
			   <td align="right">'.number_format($Mensualnominaliquidaciones->liquidacion[$i][4]).'</td>
	           <td>&nbsp;</td>
		       <td>&nbsp;</td>
		      </tr>';
			  
		       
			  /*parafiscales parte 1*/
			  /*salud, persion y sindicato*/
			  for ($ln=1;$ln<6;$ln=$ln+2){
			   if($Mensualnominaliquidaciones->parafiscales[$i][$ln+1]!=0){
			  $html.='
			  <tr>';
               			  
			   if($ln==1){
				$Salud = Salud::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][$ln]);
			   $html.='
			   <td>'.$Mensualnominaliquidaciones->parafiscales[0][$ln+1].' ('.$Salud->SALU_NOMBRE.')</td>';			  
			    
			    }elseif($ln==3){
				$Pension = Pension::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][$ln]);
			   $html.='
		       <td>'.$Mensualnominaliquidaciones->parafiscales[0][$ln+1].' ('.$Pension->PENS_NOMBRE.')</td>';
		        
			    }elseif($ln==5){
				$Sindicatos = Sindicatos::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][$ln]);
			   $html.='
		       <td>'.$Mensualnominaliquidaciones->parafiscales[0][$ln+1].' ('.$Sindicatos->SIND_NOMBRE.')</td>';
		        
			    }
			   $html.='			   
			   <td>&nbsp;</td>
		       <td>&nbsp;</td>
			   <td align="right">'.number_format($Mensualnominaliquidaciones->parafiscales[$i][$ln+1]).'</td>		       
		       <td>&nbsp;</td>
		      </tr>';
			  
               }
              }
			 
			  
			  
			  /*parafiscales parte 2*/
			  for ($ln=7;$ln<9;$ln++){
			   if($Mensualnominaliquidaciones->parafiscales[$i][$ln]!=0){
			  $html.='
			  <tr>
		       <td>'.$Mensualnominaliquidaciones->parafiscales[0][$ln].'</td>
		       <td>&nbsp;</td>
		       <td>&nbsp;</td>
		       <td align="right">'.number_format($Mensualnominaliquidaciones->parafiscales[$i][$ln]).'</td>
		       <td>&nbsp;</td>
		      </tr>';
			  
               }
              }
			  
		      
			  for ($c=1;$c<($columnasTblD-1);$c++){
			   if ($tblD[$i][$c]!=0){
			  $html.='
		  	  <tr>
		  	   <td $estilo>'.$tblD[0][$c].'</td>
		  	   <td>&nbsp;</td>
		  	   <td>&nbsp;</td>
			   <td align="right">'.number_format($tblD[$i][$c]).'</td>
			   <td>&nbsp;</td>
		  	  </tr>';
		  	  
               }
              } 
			  $html.='		
	          <tr>
	           <td colspan="2">TOTALES</td>
	           <td align="right">'.number_format($Mensualnominaliquidaciones->liquidacion[$i][$columnas-1]).'</td>
	           <td align="right">'.number_format(($Mensualnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1])).'</td>
	           <td align="right">'.number_format(($Mensualnominaliquidaciones->liquidacion[$i][$columnas-1])-(($Mensualnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1]))).'</td>
	          </tr>
			 
            </table>
			
	     </td>
      </tr>
	  
      </table>';
  $pdf->writeHTML($html, true, 0, true, 0);
  }  
  
  
  $pdf->Output("$NombreDocumento.pdf", 'D'); 
  Yii::app()->end();  
?>