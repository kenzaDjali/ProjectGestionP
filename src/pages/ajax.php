<?php
   
/*
    if (($_SERVER['HTTP_X_REQUESTED_WITH']) && 
        ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
            echo "ok xhr";
        } else { 
            echo "non xhr";
        }
*/
    $action = $_GET['action'];
    $object = $_GET['object'];
    
    $object = ucfirst(strtolower($object));
    require_once (APPLICATION_PATH . '/services/' . $object .'Service.php');
    require_once (APPLICATION_PATH . '/mappers/' . $object .'Mapper.php');
    require_once (APPLICATION_PATH . '/Db.php');
    $db = new Db('mysql', 'localhost', 'project', 'project', '0000');
    $db->getConnexion();
    $mapperClass = $object . 'Mapper';
    $objectMapper = new $mapperClass($db);
    $serviceClass = $object . 'Service';
    $objectService = new $serviceClass($objectMapper);
    
    if (isset($objectService)) {
        switch ($action) {
            case 'loadSessions':
                echo $objectService->fetchAll();
                break;
            case 'delete':
                if (isset($_GET['id'])) {
                    $id = (int) $_GET['id'];
                    $object = $objectService->find($id);
                    if ($object) {
                        $result = $objectService->delete($id);
                        echo json_encode($result, JSON_UNESCAPED_UNICODE);  
                    } else {
                        $data = array(
                            "code" => 3,
                            "message" => "La session à supprimer n'a pas été trouvée."
                        );
                        echo json_encode($data, JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    $data = array(
                        "code" => 3,
                        "message" => "Aucune session à supprimer n'a été précisée."
                    );
                    echo json_encode($data, JSON_UNESCAPED_UNICODE);
                }
                
            default :
        }
    }
    //}
    
    
