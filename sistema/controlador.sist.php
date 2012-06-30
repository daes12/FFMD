<?
if(!defined('SIST_ACTIVO')){ exit(); }

/**
 *Aplicacion: FFMD: FFMD es un Framework Minimalista creado por Daes12
 *Creado: 22-Junio-2012
 *Modificacion: 30-Junio-2012
 *Autor: Daniel Echeverria (Daes12)
 *Funcion: Carga los objetos necesarios para los controladores.
*/

class ffmd_controlador
{
	
	var $no_existe;
	var $configuraciones;
	
	function ffmd_controlador()
	{
		
		//Objeto con los mensajes de error cuando no existan los controladores o el
		//sistema encuentre un error
		$this->no_existe = new no_existe_pag();
		
		
		//Configuraciones generales
		$this->configuraciones = new configuraciones();
		
		
		//Se recorren la lista de modelos que el usuario ha solicitado sean cargados
		//automaticamente, si es que los hubiere
		if(0 < count($this->configuraciones->Auto_Modelos))
		{
			
			//Modelos a cargar
			foreach($this->configuraciones->Auto_Modelos as $Clase => $Ubicacion)
			{
				
				//Se verifica la existencia del modelo a cargar
				if(file_exists('aplicacion/modelo/'.$Ubicacion.'.php'))
				{
					//Se carga el archivo y se ejecuta el modelo
					include('aplicacion/modelo/'.$Ubicacion.'.php');
					$this->Auto_Modelos[$Clase] = new $Clase();
				}
				else
				{
					//Escribir el mensaje en el log
					$this->no_existe->log('No existe el modelo:'.$Ubicacion);
				}
				
			}
			
		}
		
	}
	
}