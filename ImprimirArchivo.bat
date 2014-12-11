@echo off
Title PANEL
cls
Menu
Title PANEL
cls
Echo.
Echo *******************BIENVENIDO*******************
Echo.
Echo 1. Imprimir Archivo
Echo 2. Salir
Echo.
set /p menup= Elija una opcion : 

if %menup%==1 goto printFile
if %menup%==2 goto Salir

:printFile

print reportes\terceros\descuento.dat

:Salir

Exit