<?php

    defined('DS')
    || define('DS', DIRECTORY_SEPARATOR);
    defined('ROOT_PATH')	// répertoire projet (pointeuse) qui contient src et co
    || define('ROOT_PATH', dirname(dirname(__DIR__)));
    defined('SRC_PATH')
    || define('SRC_PATH', ROOT_PATH . DS . 'src');
    
    // Définition du chemin du répertoire application
    defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
    
    /*// Define application environment
    defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));*/
    
    // Tableau définissant les différents rôles utilisateurs de l'application
    $roles = array(
        '1' => 'Apprenant',
        '2' => 'Formateur',
        '3' => 'Secretaire',
        '4' => 'Administrateur'
    );

    // Tableau définissant les pages accessibles suivant les rôles
    $accesses = array(
        '1' => array(       // apprenant
            'welcome',
            'form_profil',
            'form_learner',
            'logout'
        ),
        '2' => array(       // formateur
            'welcome',        
            'teacher',
            'teacher_session',
            'logout'
        ),
        '3' => array(       // secrétaire
            'welcome',        
            'secretary',
            'logout'            
        ),
        '4' => array(       // administrateur
            'welcome',        
            'admin',
            'form_add_session',
            'list_sessions',
            'form_add_user',
            'session',
            'user',
            'ajax',            
            'logout'            
        )
    );    
    
    if (!isset($_SESSION)) {  
        session_start();
    }
    //echo "on est passé là !!";exit(0);
    // si le role de l'utilisateur n'est pas défini dans la session
    if (!isset($_SESSION['role_id']) 
        || !array_key_exists($_SESSION['role_id'], $roles)) {
            unset($_SESSION['role_id']); // unset(null) possible ?
            $pathPage = '../pages/form_login.php';
            
    // ou si l'url ne pointe sur aucune page, le rôle de l'utilisateur étant connu (et vérifié)
    } elseif (empty($_GET)) {
        header('Location: ./welcome');
        
    // ou si l'utilisateur dont le rôle est connu demande une page en particulier
    } else {
        $page = $_GET['page'];
        $role = $_SESSION['role_id'];
        $access = $accesses[$role];
        // soit il n'a pas le droit d'accéder à cette page ou la page en question n'existe pas ??!!
        if (!in_array($page, $access)) {
            header('Location: ./welcome');
        // soit il a le droit
        } else {
            $pathPage = '../pages/' . $page . '.php';
            //$title = 'Pointeuse';
            // si la page demandée n'existe pas
            if (! file_exists($pathPage)) {
                http_response_code(404); // le robot comprend qu'il y a une erreur
                $pathPage = 'error.php';
            } 
        }
    }
    
    // Par défaut, une page dispose du header et du footer
    $withHeader = true;
    $withFooter = true;    
    
    // Récupération du code php du corps de la page
    ob_start();
    require_once $pathPage;
    $buffer = ob_get_clean();
    
    // Certaines pages ne doivent pas intégrer les header et footer par défaut
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
    