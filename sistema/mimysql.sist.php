<?
if(!defined('SIST_ACTIVO')){ exit(); }

/**
 *Aplicacion: FFMD: FFMD es un Framework Minimalista creado por Daes12
 *Creado: 22-Junio-2012
 *Modificacion: 25-Junio-2012
 *Autor: Daniel Echeverria (Daes12)
 *Funcion: Interaccion con la base de datos.
 *Nota: Se llama "mimysql" para evitar choques con alguna clase que se llame
 *"mysql" en el sistema
*/

class mimysql
{
	
	var $no_existe;
	var $mysql_configuraciones;
	var $mysql_conexion;
	var $base_datos;
	
	
	function mimysql()
	{
		
		//Objeto con los mensajes a utilizar cuando el sistema encuentre un error
		$this->no_existe = new no_existe_pag();
		
		
		//Configuraciones generales, entre las cuales estan las relacionadas con la base de datos
		$this->mysql_configuraciones = new configuraciones();
		
		
		//Creacion de la conexion con mysql
		$this->mysql_conexion = mysql_connect(
			$this->mysql_configuraciones->BD['servidor'],
			$this->mysql_configuraciones->BD['usuario'],
			$this->mysql_configuraciones->BD['contrasenha']
		)
		or//Si ocurre error, se guarda un log y se notifica al usuario
		$this->no_existe->error('No conexion: '.mysql_error());
		
		
		//Seleccion de la base de datos
		$this->base_datos = mysql_select_db(
			$this->mysql_configuraciones->BD['base_datos'],
			$this->mysql_conexion
		)
		or//Si ocurre error, se guarda un log y se notifica al usuario
		$this->no_existe->error('error seleccionar bd: '.mysql_error());
		
	}
	
	
	/**
	 *Ejecucion de la consulta.
	 *@param string $Consulta: Consulta a ejecutar.
	 *@return array $Valores_Consulta: Las filas resultantes de la consulta.
	*/
	function consulta($Consulta)
	{
		
		//Array que almacenara las filas.
		$Valores_Consulta = array();
		
		//Ejecucion de la consulta
		$Resultado = mysql_query(
			$Consulta,
			$this->mysql_conexion
		)
		or//Si ocurre error, se guarda un log y se notifica al usuario
		$this->no_existe->error(
			'Error en la consulta: '.$Consulta.'. '.mysql_error()
		);
		
		
		
		//Era un select?
		if('select' == strtolower(substr(trim($Consulta), 0, 6)))
		{
			
			//Obtuvo resultados la consulta?
			if(0 < mysql_num_rows($Resultado))
			{
				
				//Se recorre el resultado y se guarda en el array
				while($Fila = mysql_fetch_assoc($Resultado))
				{
					$Valores_Consulta[] = $Fila;
				}
				
			}
			
		}
		
		//Se regresa el array con los elementos encontrados, si hubiere.
		return $Valores_Consulta;
		
	}
	
	
	/**
	 *Limpieza de variables para evitar ataques en mysql y luego en html:
	 *Elimina "\", ademas convierte todo a html.
	 *@param string $Variable: Variable a limpiar.
	 *@return array $Variable: Variable limpia.
	*/
	function limpieza_variable($Variable)
	{
		
		//Elimina los "\" (backlashes o como se llamen) que pueda contener la variable
		$Variable = stripslashes($Variable);
		
		//Se convierten todos los caracteres a su equivalente en html
		$Variable = htmlentities($Variable, ENT_QUOTES, 'UTF-8');
		
		//La variable limpia se devuelve
		return $Variable;
		
	}
	
}
