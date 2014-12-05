<?php

defined('DS')
|| define('DS', DIRECTORY_SEPARATOR);
defined('ROOT_PATH')
|| define('ROOT_PATH', dirname(dirname(__DIR__)));
defined('SRC_PATH')
|| define('SRC_PATH', ROOT_PATH . DS . 'src');

// Define path to application directory
defined('APPLICATION_PATH')
|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

/*// Define application environment
defined('APPLICATION_ENV')
|| define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));*/

if (! isset($_SESSION)) {
    session_start();
}
//  si get est vide et isset $_session
if (empty($_GET) || ! isset($_SESSION)) {
    $pathPage = '../pages/form_login.php';
    $title = "Login";
} else {
    $pathPage = '../pages/' . $_GET['page'] . '.php';
    $title = ucfirst($_GET['page']);
    if (! file_exists($pathPage)) {
        http_response_code(404); // le robot comprend qu'il y a une erreur
        $pathPage = 'error.php';
    }
    $active = "?page=" . $_GET['page'] . '.php';
}

ob_start();
require_once $pathPage;
$buffer = ob_get_clean();

if ($pathPage == "error.php") {
    echo $buffer;
} elseif ($pathPage == "../pages/form_login.php") {
    echo $buffer;
} elseif ($pathPage == "../pages/speed_login.php") {
    echo $buffer;
} else {
    require_once '../layout/header.php';
    require_once '../layout/nav.php';
    
    echo $buffer;
    
    require_once '../layout/footer.php';
}
?>


