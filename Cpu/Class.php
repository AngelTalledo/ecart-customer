<?PHP

function __autoload( $className )
{
    $className = str_replace("_",DIRECTORY_SEPARATOR,$className).".php";
	if(file_exists($className) )
		include_once($className);
	else 
		die("Clase no existe (".$className."), contactese con CPU.");
	
}
