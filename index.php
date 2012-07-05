<?
/**
 *Aplicacion: FFMD: FFMD es un Framework Minimalista creado por Daes12
 *Creado: 21-Junio-2012
 *Modificacion: 25-Junio-2012
 *Autor: Daniel Echeverria (Daes12)
 *Idea principal: Framework personal, que utilice la menor cantidad de memoria y
 *espacio, rapido, configurable y reutilizable.
 *Concepto: Un archivo, una clase, un metodo.
 *Version: 0.04
 *
 *Licencia: Creative Commons Attribution-ShareAlike 3.0 Unported License
*/




//Inicializacion de sesiones
session_start();

//Nivel de errores
error_reporting(E_ALL);
$mosConfig_locale_debug = 0;
$mosConfig_locale_use_gettext = 0;



/**Declaracion de constantes**/

//Constante para evitar que alguien ejecuje un script sin el controlador
define('SIST_ACTIVO', 'FFMD 0.01');

//Captura de la hora de inicio
define('TIEM_INICIO', microtime());


/**Carga de los elementos necesarios para el sistema**/

//Configuraciones del sistema
include('configuracion/configuraciones.conf.php');

//Inicializacion de los modulos necesarios
include('sistema/cargar.sist.php');



/**
 *Si utilizas este framework favor indica la procedencia y dejame un correo para
 *saber donde esta siendo utilizado.
 *daes12@gmail.com
*/
