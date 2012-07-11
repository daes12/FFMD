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
		
		include('sistema/error/404.php');
		exit();
		
	}
	
	/**
	 *Pagina alterna para mostrar mensaje de error en pagina.
	 *@param string $Error: Mensaje a guardar en el log de errores.
	*/
	function error($Error)
	{
		
		$this->log($Error);
		
		include('sistema/error/error.php');
		//Guardar en log-> 'Ocurri&oacute; un error: '.$Error;
		exit();
		
	}
	
	/**
	 *Guarda en un archivo los mensajes de error.
	 *@param string $Error: Mensaje a guardar en el log de errores.
	*/
	function log($Error)
	{
		
		//Guardar en el log
		if(!file_exists('aplicacion/bitacora/errores-'.date('Y-m-d').'.php'))
		{
			$Archivo = fopen('aplicacion/bitacora/errores-'.date('Y-m-d').'.php','a');
			fwrite($Archivo, '<? if(!defined("SIST_ACTIVO")){ exit(); } ' . PHP_EOL);
		}
		else
		{
			$Archivo = fopen('aplicacion/bitacora/errores-'.date('Y-m-d').'.php','a');
		}
		
		fwrite($Archivo, date('d-m-Y H:i:s').': '.$Error . PHP_EOL);
		fclose($Archivo);
		
	}
	
}
