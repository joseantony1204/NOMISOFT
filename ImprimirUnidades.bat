
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

		Echo    1    ACADEMICA                                         

		Echo    2    ADMINISTRATIVA                                    

		Echo    3    DIRECCION                                         

		Echo    4    FACULTAD CIENCIAS BASICAS - DOCENTE               

		Echo    5    FACULTAD C.ECONOMICA Y ADM - DOCENTE              

		Echo    6    C.ECONOMICA Y ADM  - ADMINISTRATIVO               

		Echo    7    FACULTAD DE EDUCACION - DOCENTE                   

		Echo    8    EDUCACION - ADMINISTRATIVO                        

		Echo    9    FACULTAD DE INGENIERIA - DOCENTE                  

		Echo    10   INGENIERIA - ADMINISTRATIVO                       

		Echo    11   SERVICIOS GENERALES                               

		Echo    12   C.SOCIALES Y HUMANAS - ADMINISTRATIVO             

		Echo    13   FACULTAD C.SOCIALES Y HUMANAS - DOCENTE           

		Echo    14   CIENCIAS BASICAS  - ADMINISTRATIVO                
Echo.
Echo   1010  TODO
Echo   1020  ADMINISTRATIVOS
Echo   1030  DOCENTES
Echo. 
 set /p menup= Digite el codigo de la unidad que desea imprimir(0 para salir) : 


		if %menup%==1 print reportes\planoporunidades\1.dat

		if %menup%==2 print reportes\planoporunidades\2.dat

		if %menup%==3 print reportes\planoporunidades\3.dat

		if %menup%==4 print reportes\planoporunidades\4.dat

		if %menup%==5 print reportes\planoporunidades\5.dat

		if %menup%==6 print reportes\planoporunidades\6.dat

		if %menup%==7 print reportes\planoporunidades\7.dat

		if %menup%==8 print reportes\planoporunidades\8.dat

		if %menup%==9 print reportes\planoporunidades\9.dat

		if %menup%==10 print reportes\planoporunidades\10.dat

		if %menup%==11 print reportes\planoporunidades\11.dat

		if %menup%==12 print reportes\planoporunidades\12.dat

		if %menup%==13 print reportes\planoporunidades\13.dat

		if %menup%==14 print reportes\planoporunidades\14.dat

if %menup%==1010 print reportes\planoporunidades\1.dat reportes\planoporunidades\2.dat reportes\planoporunidades\3.dat reportes\planoporunidades\4.dat reportes\planoporunidades\5.dat reportes\planoporunidades\6.dat reportes\planoporunidades\7.dat reportes\planoporunidades\8.dat reportes\planoporunidades\9.dat reportes\planoporunidades\10.dat reportes\planoporunidades\11.dat reportes\planoporunidades\12.dat reportes\planoporunidades\13.dat reportes\planoporunidades\14.dat 
if %menup%==1020 print reportes\planoporunidades\1.dat reportes\planoporunidades\2.dat reportes\planoporunidades\3.dat reportes\planoporunidades\6.dat reportes\planoporunidades\8.dat reportes\planoporunidades\10.dat reportes\planoporunidades\11.dat reportes\planoporunidades\12.dat reportes\planoporunidades\14.dat 
if %menup%==1030 print reportes\planoporunidades\4.dat reportes\planoporunidades\5.dat reportes\planoporunidades\7.dat reportes\planoporunidades\9.dat reportes\planoporunidades\13.dat 
if %menup%==0 goto Salir

:error
 Echo Seleccione la opcion Correcta
pause>nul
goto menu
:Salir

Exit