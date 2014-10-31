
	 @echo off
Title PANEL
color b 
:menu
Title PANEL
cls
Echo.
Echo *******************BIENVENIDO*******************
Echo.
Echo CODIGO  UNIDAD


Echo.

		Echo    15   OCACIONALES ECONO Y ADMISTRATIVAS                 

		Echo    16   OCACIONALES INGENIERIA                            

		Echo    17   OCACIONALES CIENCIAS DE LA EDUCACION              

		Echo    18   OCACIONALES TRABAJO SOCIAL                        

		Echo    20   OCACIONALES CIENCIAS BASICAS                      

		Echo    21   OCACIONALES VILLANUEVA                            

		Echo    22   OCASIONALES FONSECA                               

		Echo    23   OCASIONALES MAICAO                                
Echo.
Echo   1010  TODO
Echo   1020  ADMINISTRATIVOS
Echo   1030  DOCENTES
Echo. 
 set /p menup= Digite el codigo de la unidad que desea imprimir(0 para salir) : 


		if %menup%==15 print reportes\planoporunidades\15.dat

		if %menup%==16 print reportes\planoporunidades\16.dat

		if %menup%==17 print reportes\planoporunidades\17.dat

		if %menup%==18 print reportes\planoporunidades\18.dat

		if %menup%==20 print reportes\planoporunidades\20.dat

		if %menup%==21 print reportes\planoporunidades\21.dat

		if %menup%==22 print reportes\planoporunidades\22.dat

		if %menup%==23 print reportes\planoporunidades\23.dat

if %menup%==1010 print reportes\planoporunidades\15.dat reportes\planoporunidades\16.dat reportes\planoporunidades\17.dat reportes\planoporunidades\18.dat reportes\planoporunidades\20.dat reportes\planoporunidades\21.dat reportes\planoporunidades\22.dat reportes\planoporunidades\23.dat 
if %menup%==1020 print 
if %menup%==1030 print 
if %menup%==0 goto Salir

:error
 Echo Seleccione la opcion Correcta
pause>nul
goto menu
:Salir

Exit