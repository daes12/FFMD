<?
if(!defined('SIST_ACTIVO')){ exit(); }

/**
 *Aplicacion: FFMD: FFMD es un Framework Minimalista creado por Daes12
 *Creado: 22-Junio-2012
 *Modificacion: 25-Junio-2012
 *Autor: Daniel Echeverria (Daes12)
 *Funcion: Mostrar paginas alternas cuando no se encuentre el controlador o el
 *sistema obtenga un error.
*/

class no_existe_pag
{
	
	
	/**
	 *Pagina alterna para mostrar mensaje de pagina no encontrada.
	*/
	function ver_404()
	{
		
		echo 'Recurso no existe';
		exit();
		
	}
	
	/**
	 *Pagina alterna para mostrar mensaje de error en pagina.
	 *@param string $Error: Mensaje a guardar en el log de errores.
	*/
	function error($Error)
	{
		
		echo 'Ocurri&oacute; un error: '.$Error;
		exit();
		
	}
	
	/**
	 *Guarda en un archivo los mensajes de error.
	 *@param string $Error: Mensaje a guardar en el log de errores.
	*/
	function log($Error)
	{
		
		//Guardar en el log
		//Falta crear la opci—n
		
	}
	
}
