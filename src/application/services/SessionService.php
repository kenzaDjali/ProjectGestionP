<?php

require_once APPLICATION_PATH . '/mappers/SessionMapper.php';

class SessionService
{
    /**
     * @var SessionMapper
     */
    private $sessionMapper;
    
    public function __construct(SessionMapper $sessionMapper){
        $this->sessionMapper = $sessionMapper;
    }
    
    public function find($id){
        $session = $this->sessionMapper->find($id);
/*        
        $result = array(
            'id' => $session->getId(),
            'title' => $session->getTitle(),
            'slug' => $session->getSlug(),
            'startDate' => $session->getStartDate(),
            'endDate' => $session->getEndDate(),
        );
        return json_encode($result);
*/        
    }
    
    public function fetchAll(){
        $sessions = $this->sessionMapper->fetchAll();
/*        
        $response = array('data' => array());
        foreach($sessions as $session){
            $response['data'][] = array( 
                $line[] = $session->getId(),
                $line[] = $session->getTitle(),
                $line[] = $session->getSlug(),
                $line[] = $session->getStartDate(),
                $line[] = $session->getEndDate(),
                $line[] = '<a href="#" data-id="' . $session->getId() 
                         . '" data-action="edit"><i class="glyphicon glyphicon-pencil"></i></a>'
                         . '<a href="#" data-id="' . $session->getId(). '" data-action="delete">'
                         . '<i class="glyphicon glyphicon-remove-circle"></i></a>'
            );
        }
        return json_encode($response);
*/        
    }
    
    public function save($title, $slug, $startDate, $endDate, $id = 0){
        $session = new Session();
        if ((int) $id !== 0){
            $session->setId($id);
        }
        $session->setTitle($title)
                ->setSlug($slug)
                ->setStartDate($startDate)
                ->setEndDate($endDate);
        return $this->sessionMapper->save($session);
    }
    
    public function delete($id){
        return $this->sessionMapper->delete($id);
    }
    
    public function clean($data){
        $cleanData = array();
        
        $title = $data['title'];
        $slug = $data['slug'];
        $startDay = $data['startDay'];
        $startMonth = $data['startMonth'];
        $startYear = $data['startYear'];
        $endDay = $data['endDay'];
        $endMonth = $data['endMonth'];
        $endYear = $data['endYear'];
        
        $cleanData['title'] = $title;
        $cleanData['slug'] = $slug;
        $cleanData['startDate'] = $startYear . '-' . $startMonth . '-' . $startDay;
        $cleanData['endDate'] = $endYear . '-' . $endMonth . '-' . $endDay;
        
        return $cleanData;
    }
}