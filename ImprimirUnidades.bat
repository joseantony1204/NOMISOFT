
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

		Echo    4    FACULTAD CIENCIAS BASICAS - DOCENTE               

		Echo    5    FACULTAD C.ECONOMICA Y ADM - DOCENTE              

		Echo    7    FACULTAD DE EDUCACION - DOCENTE                   

		Echo    9    FACULTAD DE INGENIERIA - DOCENTE                  

		Echo    13   FACULTAD C.SOCIALES HUMANAS - DOCENTE             
Echo.
Echo   1010  TODO
Echo   1020  ADMINISTRATIVOS
Echo   1030  DOCENTES
Echo. 
 set /p menup= Digite el codigo de la unidad que desea imprimir(0 para salir) : 


		if %menup%==4 print reportes\planoporunidades\4.dat

		if %menup%==5 print reportes\planoporunidades\5.dat

		if %menup%==7 print reportes\planoporunidades\7.dat

		if %menup%==9 print reportes\planoporunidades\9.dat

		if %menup%==13 print reportes\planoporunidades\13.dat

if %menup%==1010 print reportes\planoporunidades\4.dat reportes\planoporunidades\5.dat reportes\planoporunidades\7.dat reportes\planoporunidades\9.dat reportes\planoporunidades\13.dat 
if %menup%==1020 print 
if %menup%==1030 print reportes\planoporunidades\4.dat reportes\planoporunidades\5.dat reportes\planoporunidades\7.dat reportes\planoporunidades\9.dat reportes\planoporunidades\13.dat 
if %menup%==0 goto Salir

:error
 Echo Seleccione la opcion Correcta
pause>nul
goto menu
:Salir

Exit