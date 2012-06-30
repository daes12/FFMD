<?
if(!defined('SIST_ACTIVO')){ exit(); }

/**
 *Aplicacion: FFMD: FFMD es un Framework Minimalista creado por Daes12
 *Creado: 22-Junio-2012
 *Modificacion: 27-Junio-2012
 *Autor: Daniel Echeverria (Daes12)
 *Funcion: Almacena las configuraciones globales del sistema para que sean accedidas
 *desde los controladores y modelos.
*/

class configuraciones
{
	
	//Atributos de la clase
	var $General = array();
	var $BD = array();
	var $Auto_Modelos;
	
	
	function configuraciones()
	{
		
		/**
		 *Configuraciones Generales
		*/
		//Controlador principal. Es necesario?
		$this->General['controlador'] = 'ejemplo';
		
		
		/**
		 *Configuraciones para la Base de datos
		*/
		$this->BD['servidor'] = 'localhost';
		$this->BD['usuario'] = 'root';
		$this->BD['contrasenha'] = '';
		$this->BD['base_datos'] = '';
		
		
		/**
		 *Modelos que se cargan automaticamente segun el usuario lo solicite.
		 *array(Nombre_Clase => Ubucacion_Modelo)
		*/
		$this->Auto_Modelos = array(
			//'ejemplo' => 'carpeta/ejemplo'
		);
		
	}
	
}

