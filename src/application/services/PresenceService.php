<?php

require_once APPLICATION_PATH . '/mappers/PresenceMapper.php';

class PresenceService
{
    /**
     * @var PresenceMapper
     */
    private $presenceMapper;
    
    public function __construct(PresenceMapper $presenceMapper)
    {
        $this->presenceMapper = $presenceMapper;
    }
    
    public function find($id)
    {
        $presence = $this->presenceMapper->find($id);
        return $presence;
/*        
        $result = array(
            'id' => $presence->getId(),
            'date_time' => $presence->getDateTime(),
            'state' => $presence->getState(),
            'id_student' => $presence->getIdStudent(),
            'id_teacher' => $presence->getIdTeacher(),
        );
        return json_encode($result);
*/        
    }
    
    public function findByIdStudent($idStudent)
    {
        $presences = $this->presenceMapper->findByIdStudent($idStudent);
        return $presences;
    }
    
    public function findByIdStudentAndDateTime($idStudent, $dateTime)
    {
        $presences = $this->presenceMapper->findByIdStudentAndDateTime($idStudent, $dateTime);
        return $presences;
    }
    
    
    public function fetchAll(){
        $presences = $this->presenceMapper->fetchAll();
        return $presences;
/*        
        $presence = array('data' => array());
        foreach($presences as $presence){
            $response['data'][] = array( 
                $line[] = $presence->getId(),
                $line[] = $presence->getDateTime(),
                $line[] = $presence->getState(),
                $line[] = $presence->getIdStudent(),
                $line[] = $presence->getIdTeacher(),
                $line[] = '<a class="btn btn-primary" href="form_add_?id=' . $presence->getId() . '">Editer</a>'
                          . '<button class="btn btn-danger" id="' . $presence->getId() . '">Supprimer</button>'                         
            );
        }
        return json_encode($response);
*/        
    }
    
    public function save($data){
        $presence = new Presence();
        if (isset($data['id']) && !empty($data['id'])){
            $presence->setId($data['id']);
        }
        $presence->setDateTime($data['title'])
                ->setState($data['state'])
                ->setIdStudent($data['id_student'])
                ->setIdTeacher($data['id_teacher']);
        
        return $this->presenceMapper->save($presence);
    }
    
    public function delete($id){ // à adapter au fur et à mesure !!
        $presence = $this->presenceMapper->find($id);
        // si l'état (présence / absence / retard) existe en BD
        if ($presence != false) {
            $result = $this->presenceMapper->delete($id);
            if ($result) {
                $data = array(
                    "code" => 1,
                    "message" => "La présence/absence/retard de '" . $presence->getIdStudent() . "' a été supprimé !"
                );
            } else {
                $data = array(
                    "code" => 2,
                    "message" => "L'état de " . $presence->getIdStudent() . " n'a pas pu être supprimé."
                );
            }
        // si cet enregistrement n'existe pas en BD
        } else {
            $data = array(
                "code" => 3,
                "message" => "L'état de " . $presence->getIdStudent() . " à supprimer n'a pas été trouvé."
            );            
        }
        return $data;
    }
/*    
    public function clean($data){
        $cleanData = array();
        $errors = array();
        
        // récupération des données
        if (isset($data['id']) && !empty($data['id'])){
            $id = $data['id'];
        }
        $title = $data['title'];
        $slug = $data['slug'];
        $startDay = $data['startDay'];
        $startMonth = $data['startMonth'];
        $startYear = $data['startYear'];
        $endDay = $data['endDay'];
        $endMonth = $data['endMonth'];
        $endYear = $data['endYear'];
        
        // nettoyage des données 
        // et récupération soit de l'erreur rencontrée
        // soit de la donnée nettoyée 
        if (isset($id)){
            $result = $this->cleanId($id);
            if ($result[0] == false){
                $errors['id'] = $result[1];
            } else {
                $cleanData['id'] = $result[1];
            }
        }  
        
        $result = $this->cleanTitle($title);
        if ($result[0] == false){
            $errors['title'] = $result[1];
        } else {
            $cleanData['title'] = $result[1];
        }   
        
        $result = $this->cleanSlug($slug);
        if ($result[0] == false){
            $errors['slug'] = $result[1];
        } else {
            $cleanData['slug'] = $result[1];
        }   
                
        $result = $this->cleanDate($startDay, $startMonth, $startYear);
        if ($result[0] == false){
            $errors['startDate'] = $result[1];
        } else {
            $cleanData['startDate'] = $result[1];
        }   
        
        $result = $this->cleanDate($endDay, $endMonth, $endYear);
        if ($result[0] == false){
            $errors['endDate'] = $result[1];
        } else {
            $cleanData['endDate'] = $result[1];
        }   
        
        if (!isset($errors['startDate']) && !isset($errors['endDate'])){
            $result = $this->cleanDates($cleanData['startDate'], $cleanData['endDate']);
            if ($result[0] == false){
                $errors['endDate'] = $result[1];
            }
        }
        
        
        // renvoi des erreurs s'il y en a
        if (!empty($errors)){
            return array(false, $errors, $cleanData);
        } else {
        // ou des données nettoyées            
            return array(true, $cleanData);            
        }
    }

    public function cleanId($id){
        if (is_numeric($id) && ((int)$id != 0)){
            return array(true, (int)$id);
        } else {
            return array(false, 'Il y a un problème avec l\'identifiant');
        }
    }
    
    
    public function cleanTitle($title){
        $title = trim($title);
        
        if (strlen($title) < 14){
            return array(false, 'Le titre doit comporter au moins 15 caractères.');
        }
        $pattern = '/^[0-9a-zA-Z- éèùçà]*$/';
        if (!preg_match($pattern, $title)){
            return array(false, 'Le titre ne peut comporter que des caractères '
                . 'alphanumériques, le tiret et l\'espace.');
        }
        return array(true, $title);    
    }    
    
    public function cleanSlug($slug){
        $slug = trim($slug);
        
        $slug = mb_strtolower($slug, 'UTF-8');
        
        if (mb_strlen($slug, 'UTF-8') < 9){
            return array(false, 'Le slug doit comporter au moins 10 caractères.');
        }
        
        $pattern = '/^([0-9a-zéèàùç]+[-]?)+$/';
        if (!preg_match($pattern, $slug)){
            return array(false, 'Le slug ne peut comporter que des caractères '
                . 'alphanumériques et le tiret ; il ne doit pas comporter d\'espace.');
        }
        
        return array(true, $slug);
    }
    
    public function cleanDate($day, $month, $year){
        if (is_numeric($day) && is_numeric($month) && is_numeric($year)){
            if (checkdate($month, $day, $year)){
                $date = $year . '-' . $month . '-' . $day;
                return array(true, $date);
            } 
            return array(false, 'La date choisie n\'est pas valide.');        
        }
        return array(false, 'Le jour, le mois et l\'année doivent être des entiers.');
    }
    
    public function cleanDates($startDate, $endDate){
        list($year1, $month1, $day1) = explode('-', $startDate);
        list($year2, $month2, $day2) = explode('-', $endDate);
        if (mktime(0, 0, 0, $month1, $day1, $year1) < mktime(0, 0, 0, $month2, $day2, $year2)){
            return array(true);
        } else {
            return array(false, 'La date de fin de session est antérieure à la date de début.');
        }
    }    
*/    
}
