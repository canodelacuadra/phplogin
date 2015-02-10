<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Login
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * la función "__construct()" inicia automáticamente cada vez que se crea un objeto de esta clase,
     * Ya sabes, cuando lo hagas "$login = new Login();"
     */
    public function __construct()
    {
        // crear/leer período de sesiones, absolutamente necesario crear/leer
        session_start();

        // Compruebe las acciones posibles de inicio de sesión:
        // Si el usuario trató de cerrar la sesión (ocurre cuando el usuario hace clic en logout)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // ingresar a través de datos post (si el usuario acaba de presentar un formulario de inicio de sesión)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /**
     * iniciar sesión con datos post
     */
    private function dologinWithPostData()
    {
        // check login form contents
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Nombre de usuario campo estaba vacía.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Campo de contraseña estaba vacío.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // cambiar conjunto de caracteres utf8 y lo comprueba
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // Si no hay errores de conexión (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                $sql = "SELECT user_name, user_email, user_password_hash
                        FROM users
                        WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_name . "';";
                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
                    if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {

                        // write user data into PHP SESSION (a file on your server)
                        $_SESSION['user_name'] = $result_row->user_name;
                        $_SESSION['user_email'] = $result_row->user_email;
                        $_SESSION['user_login_status'] = 1;

                    } else {
                        $this->errors[] = "Contraseña incorrecta. Vuelve a intentarlo.";
                    }
                } else {
                    $this->errors[] = "Este usuario no existe.";
                }
            } else {
                $this->errors[] = "Problemas de conexión de base de datos.";
            }
        }
    }

    /**
     * realizar el cierre de sesión
     */
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "Ha cerrado sesión.";

    }

    /**
     * simplemente devuelva el estado actual de login del usuario
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}
