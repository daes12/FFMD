<?
if(!defined('SIST_ACTIVO')){ exit(); }

/**
 *Aplicacion: FFMD: FFMD es un Framework Minimalista creado por Daes12
 *Creado: 22-Junio-2012
 *Modificacion: 22-Junio-2012
 *Autor: Daniel Echeverria (Daes12)
 *Funcion: Ejemplifica la estructura de un controlador y sus dependencias.
*/

class ejemplo extends ffmd_controlador
{
	
	public function ejemplo_c($Variables)
	{
		
		/**
		 *Nota importante:
		 *Las variables recibidas desde la URL son enviadas al controlador en forma
		 *de array; p.ej.:
		 *URL: sitio.com/imagenes/flor24/grande
		 *Controlador: imagenes
		 *Variables: flor24 y grande
		 *Variables recibidas por el controlador:
		 *$Variables(
		 *[0] => "flor24"
		 *[1] => "grande"
		 *)
		*/
		
		
		
		//Inicializo variables
		$Un_Titulo = 'P&aacute;gina de inicio';
		
		//Realizo validaciones
		
		
		
		//Cargo los modelos y sus objetos
		/*
		include('aplicacion/modelo/ejemplo.php');
		$MiModelo = new ejemplo();
		$MiModelo->metodo_ejemplo($Variables);
		*/
		
		
		//Cargo las vistas para imprimir valores
		include('aplicacion/vista/ejemplo_v.php');
		
	}
	
}
