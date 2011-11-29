<?
	include_once("../../../config.php");
	include_once('../../../ldapConnect.php');
/**
 * Clase encargada de inicializar el Login.
 *
 */
class Session{

	/**
	 * Constructor de la clase.
	 *
	 * Comprueba y valida el nombre de usuario y la contraseña, inicializa el Login y la sesión.
	 * Una vez logueado, redirige a la página 'home' de la aplicación.
	 *
	 * @param array $opt Array indexado por nombre. Debe contener 'user' y 'pass'.
	 */

	//Mensaje de error
	var $jsonRes = array();

	public function __construct($opt){
            try{
                    $Validar = new Validate();
                    if($opt['user'] && $opt['pass'] && $Validar->cadena($opt['user']) && $Validar->cadena($opt['pass'])){

                        $Login = new Login($opt['user'], $opt['pass']);

                        //Si el logueo no lanza una exceptión todo ha ido bien
                        session_name(SESSION_NAME);
                        session_start();

                        $_SESSION['login'] = serialize($Login);

                        $usuario = $Login->get_Usuario();
                        $_SESSION['Usuario'] = $usuario;
                        $_SESSION['id_usuario'] = $usuario->get_Id();

                        $this->jsonRes['ok'] = 1;

                        /*if(isset($_SESSION['peticion_url']))
                                @header("Location: http://".$_SESSION['peticion_url']);
                        else
                                header("Location: http://".SERVER_NAME.APP_DIR."/html/zonas/home/index.php");
                        exit();*/
                    }else if($opt['user'] || $opt['pass']){
                        $this->jsonRes['error'] = "Los datos introducidos no son correctos.";
                    }
            }catch(Exception $e){
                $this->jsonRes['error'] = $e->getMessage();
            }
	}
}
?>