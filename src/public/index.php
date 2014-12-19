<?php


    defined('DS')
    || define('DS', DIRECTORY_SEPARATOR);
    defined('ROOT_PATH')
    || define('ROOT_PATH', dirname(dirname(__DIR__)));
    defined('SRC_PATH')
    || define('SRC_PATH', ROOT_PATH . DS . 'src');
    
    // Définition du chemin du répertoire application
    defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
    
    /*// Define application environment
    defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));*/
    
    // Par défaut, une page dispose du header et du footer 
    $withHeader = true;
    $withFooter = true;

if (! isset($_SESSION)) {  
    session_start();
}
    //  si get est vide et isset $_session
    if (empty($_GET) || ! isset($_SESSION)) {
        if (isset($_SESSION['role_id'])) {
            header('location:/welcome');
        } else {
            $pathPage = '../pages/form_login.php';
            $title = "Login";
        }       
    } else {
        $page = $_GET['page'];
        $pathPage = '../pages/' . $page . '.php';
       $title = 'Pointeuse';
        if (! file_exists($pathPage)) {
            http_response_code(404); // le robot comprend qu'il y a une erreur
            $pathPage = 'error.php';
        } elseif ($page == 'ajax') {
            $withHeader = false;
            $withFooter = false;
        }
        $active = "?page=" . $_GET['page'] . '.php';
    }
    
    // Récupération du code php du corps de la page
    ob_start();
    require_once $pathPage;
    $buffer = ob_get_clean();
    
    if (($pathPage == "error.php") 
      OR ($pathPage == "../pages/form_login.php") 
      OR ($pathPage == "../pages/speed_login.php")
      OR ($pathPage == "../pages/ajax.php")) {
        $withHeader = false;
        $withFooter = false;
    }
     
    // Génération de la page en totalité (avec éventuellement header et footer)
    if ($withHeader) {
        require_once '../layout/header.php';
        require_once '../layout/nav.php';
    }
    
    echo $buffer;
    

    $withFooter ? require_once '../layout/footer.php' : '';
    
?>



