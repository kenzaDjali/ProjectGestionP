<?php

require_once APPLICATION_PATH . '/mappers/SessionMapper.php';

class SessionService
{
    /**
     * @var SessionMapper
     */
    private $sessionMapper;
    
    public function __construct(SessionMapper $sessionMapper)
    {
        $this->sessionMapper = $sessionMapper;
    }
    
    public function find($id)
    {
        $session = $this->sessionMapper->find($id);
        return $session;          
/*        $result = array(
            'id' => $session->getId(),
            'title' => $session->getTitle(),
            'slug' => $session->getSlug(),
            'startDate' => $session->getStartDate(),
            'endDate' => $session->getEndDate(),
        );
        return json_encode($result);
*/        
    }
    
    public function fetchAll()
    {
        $sessions = $this->sessionMapper->fetchAll();
        //return $sessions;
        
        $response = array('data' => array());
        foreach($sessions as $session){
            $response['data'][] = array( 
                $line[] = $session->getId(),
                $line[] = $session->getTitle(),
                $line[] = $session->getSlug(),
                $line[] = $session->getStartDate(),
                $line[] = $session->getEndDate(),
                $line[] = '<a class="btn btn-primary" href="form_add_session?id=' . $session->getId() . '">Editer</a>'
                          . '<button class="btn btn-danger" id="' . $session->getId() . '">Supprimer</button>'                         
            );
        }
        return json_encode($response);
    }
    
    public function save($data)
    {
        $session = new Session();
        if (isset($data['id']) && !empty($data['id'])){
            $session->setId($data['id']);
        }
        $session->setTitle($data['title'])
                ->setSlug($data['slug'])
                ->setStartDate($data['startDate'])
                ->setEndDate($data['endDate']);
        
        return $this->sessionMapper->save($session);
    }
    
    public function delete($id)
    {
        $session = $this->sessionMapper->find($id);
        // si la session existe en BD
        if ($session != false) {
            $result = $this->sessionMapper->delete($id);
            if ($result) {
                $data = array(
                    "code" => 1,
                    "message" => "La session '" . $session->getTitle() . "' a été supprimée !"
                );
            } else {
                $data = array(
                    "code" => 2,
                    "message" => "La session n'a pas pu être supprimée."
                );
            }
        // si elle n'existe pas en BD
        } else {
            $data = array(
                "code" => 3,
                "message" => "La session à supprimer n'a pas été trouvée."
            );            
        }
        return $data;
    }
    
    public function clean($data)
    {
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
        
        // nettoyage des données et récupération : 
        // soit de l'erreur rencontrée, soit de la donnée nettoyée 
        if (isset($id)){	// A REVOIR : intérêt erreur pour $id, non récupérée côté html ??
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

    public function cleanId($id)	// A REVOIR : utilité ?
    {
    	/*if (strlen($id) == 0){
    		return array(false, 'L\'identifiant est vide.')
    	}*/
        if (is_numeric($id) && ((int)$id != 0)){
            return array(true, (int)$id);
        } else {
            return array(false, 'Il y a un problème avec l\'identifiant');
        }
    }
    
    
    public function cleanTitle($title)
    {
        $title = trim($title);
        if (strlen($title) == 0){
        	return array(false, 'Aucun titre n\'a pas été saisi.');
        } elseif (strlen($title) < 14){
            return array(false, 'Le titre doit comporter au moins 15 caractères.');
        }
        $pattern = '/^[0-9a-zA-Z- éèùçà]*$/';
        if (!preg_match($pattern, $title)){
            return array(false, 'Le titre ne peut comporter que des caractères '
                . 'alphanumériques, le tiret et l\'espace.');
        }
        return array(true, $title);    
    }    
    
    public function cleanSlug($slug)
    {
        $slug = trim($slug);

        if (strlen($slug) == 0){
        	return array(false, 'Aucun slug n\'a été saisi.');
        }
        
        $slug = mb_strtolower($slug, 'UTF-8');
        
        if (mb_strlen($slug, 'UTF-8') < 9){
            return array(false, 'Le slug doit comporter au moins 10 caractères.');
        }
        
        $pattern = '/^([0-9a-zéèàùç]+[-]?)+$/';
        if (!preg_match($pattern, $slug)){
            return array(false, 'Le slug ne peut comporter que des caractères '
                . 'alphanumériques et le tiret ; il ne doit comporter ni accents '
            	. 'ni espaces.');
        }
        
        return array(true, $slug);
    }
    
    public function cleanDate($day, $month, $year)
    {
    	// Les champs sont-ils vides ?
    	// On utilise le fait que, côté html, l'option '--' a la valeur '0'
    	$errors = []; 
    	if ($day == "0"){
    		$errors[] = 'Le jour n\'a pas été saisi.';
    	}
    	if ($month == "0"){
    		$errors[] = 'Le mois n\'a pas été saisi.';
    	}
    	if ($year == "0"){
    		$errors[] = 'L\'année n\'a pas été saisie.';
    	}
    	
    	if (count($errors) >= 1){
    		$error = implode('<br>', $errors);
    		return array(false, $error);
    	}
    	
    	// la date est-elle valide ?
        if (is_numeric($day) && is_numeric($month) && is_numeric($year)){
            if (checkdate($month, $day, $year)){
                $date = $year . '-' . $month . '-' . $day;
                return array(true, $date);
            } 
            return array(false, 'La date choisie n\'est pas valide.');        
        }
        return array(false, 'Le jour, le mois et l\'année doivent être des entiers.');
    }
    
    public function cleanDates($startDate, $endDate)
    {
        list($year1, $month1, $day1) = explode('-', $startDate);
        list($year2, $month2, $day2) = explode('-', $endDate);
        if (mktime(0, 0, 0, $month1, $day1, $year1) < mktime(0, 0, 0, $month2, $day2, $year2)){
            return array(true);
        } else {
            return array(false, 'La date de fin de session est antérieure à la date de début.');
        }
    }
}
