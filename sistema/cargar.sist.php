<?
if(!defined('SIST_ACTIVO')){ exit(); }

/**
 *Aplicacion: FFMD: FFMD es un Framework Minimalista creado por Daes12
 *Creado: 22-Junio-2012
 *Modificacion: 30-Junio-2012
 *Autor: Daniel Echeverria (Daes12)
 *Funcion: Carga las clases necesarias para el funcionamiento del sistema.
*/


//Mensaje de error
include('no_existe_pag.sist.php');


//Clase que interactua con la base de datos
include('mimysql.sist.php');


//Super clase para el trabajo con los controladores
include('controlador.sist.php');


//Super clase para el trabajo con los modelos
include('modelo.sist.php');


//Carga del controlador solicitado en la url
include('url.sist.php');

