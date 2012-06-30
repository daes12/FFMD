<?
if(!defined('SIST_ACTIVO')){ exit(); }

/**
 *Aplicacion: FFMD: FFMD es un Framework Minimalista creado por Daes12
 *Creado: 22-Junio-2012
 *Modificacion: 25-Junio-2012
 *Autor: Daniel Echeverria (Daes12)
 *Funcion: Carga los objetos necesarios por los modelos.
*/

class ffmd_modelo
{
	
	var $no_existe;
	var $configuraciones;
	var $bd;
	
	function ffmd_modelo()
	{
		
		//Objeto con los mensajes de error
		$this->no_existe = new no_existe_pag();
		
		
		//Configuraciones generales
		$this->configuraciones = new configuraciones();
		
		
		//Manejo de la base de datos
		$this->bd = new mimysql();
		
	}
	
}
