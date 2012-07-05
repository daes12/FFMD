<?
if(!defined('SIST_ACTIVO')){ exit(); }

/**
 *Aplicacion: FFMD: FFMD es un Framework Minimalista creado por Daes12
 *Creado: 22-Junio-2012
 *Modificacion: 27-Junio-2012
 *Autor: Daniel Echeverria (Daes12)
 *Funcion: Valida la informacion contenida en $_GET['variables'], carga el modelo
 *solicitado y le envia las variables que encuentre.
*/


/**Objeto con las configuraciones del sistema**/
$Configuraciones = new configuraciones();


/**Controlador**/
$Controlador = '';


/**Mensaje de error**/
$no_existe = new no_existe_pag();


/**Si se recibe informacion por la url debe ser administrada**/
if(isset($_GET['variables']))
{
	
	//Tiene caracteres raros la url?
	//Solamente se permiten letras mayusculas y minuscula, numeros y el guion bajo
	$Comparacion = str_replace('/', '', $_GET['variables']);
	$Expresion = '/[A-Za-z0-9_]/';
	
	if(
		'' != preg_replace($Expresion, '', $Comparacion)
		|| '' == $Comparacion
	)
	{
		//Si hay caracteres raros en la url se detiene la ejecucion
		$no_existe->ver_404();
	}
	else
	{
		//La informacion de ruta es valida
		
		//Division de la informacion
		$URL_Valores = explode('/', $_GET['variables']);
		$Total_Valores = count($URL_Valores);
		
		if(0 < $Total_Valores)
		{
			
			/**
			 *Debo averiguar si el controlador esta directamente en la carpeta "controlador"
			 *o esta dentro de una subcarpeta.
			 *Recorro el array "$URL_Valores" para descubrir si la posicion en turno
			 *corresponde a un controlador, de lo contrario se agrega como subcarpeta.
			 *Por lo cual, un controlador no debe llamarse igual a una carpeta que este
			 *en su mismo nivel. Se valora controlador sobre carpeta.
			*/
			
			//Direccion que lleva hasta el controlador
			$Ruta_Controlador = 'aplicacion/controlador/';
			
			//Verifica que exista el controlador solicitado en la url
			$Controlador_Encontrado = false;
			
			//Variables que se enviaran al controlador
			$Variables = array();
			
			//Se recorren las variables para averiguar si existe el controlador y cargar
			//las variables que se le enviaran
			for($i = 0; $i < $Total_Valores; $i++)
			{
				
				//Valor actual en el bucle
				$Valor = strtolower($URL_Valores[$i]);
				
				//Se busca que exista el controlador entre las variables.
				//Si aun no ha sido encontrado el controlador, se continua su busqueda
				if(!$Controlador_Encontrado)
				{
					
					//Si no hay valor en esta seccion
					if('' == $Valor)
					{
						//Se detiene su ejecucion
						$no_existe->ver_404();
					}
					
					
					//Existe el controlador solicitado?
					if(file_exists($Ruta_Controlador.$Valor.'.php'))
					{
						//Guardo el nombre del controlador
						$Controlador = $Valor;
						
						//Establesco como encontrador
						$Controlador_Encontrado = true;
						
						//A partir de aqui, si hay mas secciones en la url seran tomadas
						//como variables
					}
					else
					{
						//Si no existe el controlador, se aumenta la ruta para seguir buscando
						$Ruta_Controlador .= $Valor.'/';
					}
					
				}
				else
				{
					//Ya encontraron el controlador y ahora se toman las variables
					
					//Se almacena cada variable en un array para ser se enviado al controlador
					$Variables[] = $Valor;
					
				}
				
			}
			
			//Si al finalizar el bucle no se encontro el controlador
			if(!$Controlador_Encontrado)
			{
				//Se detiene la ejecucion
				$no_existe->ver_404();
			}
			
		}
		else
		{
			//Si no hay secciones en la url.
			//No esta de mas un poco de seguridad jejeje aunque creo que no era necesario.
			$no_existe->ver_404();
		}
		
	}
	
}


//Carga del controlador solicitado
include($Ruta_Controlador.$Controlador.'.php');

//Creacion del objeto controlador
$Clase = new $Controlador();

//Ejecucion del controlador
$Metodo = $Controlador.'_c';
$Clase->$Metodo($Variables);

