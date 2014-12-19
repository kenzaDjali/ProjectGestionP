<?php

require_once APPLICATION_PATH . '/models/Presence.php';

class PresenceMapper
{

    /**
     * @var Db
     */
    private $dbAdapter;
    
    public function __construct($db){
        $this->dbAdapter = $db->getConnexion();
    }
    
    /**
     * @param int $id 
     * @return boolean|Presence
     */
    public function find($id){
        $sql = "SELECT * FROM presences WHERE id = :id";
        $stmt = $this->dbAdapter->prepare($sql);
        $stmt->bindParam(':id', $id);
        $req = $stmt->execute();
        $row = $stmt->fetch();
        
        if (!$row)return FALSE;
         
        return $this->rowToObject($row);        
    }
    
    /**
     * @return boolean|multitype:Presence
     */
    public function fetchAll(){
        $sql = "SELECT * FROM presences WHERE 1";
        $stmt = $this->dbAdapter->query($sql);
        $rowSet = $stmt->fetchAll();
        
        if ($rowSet == array()) {
            return FALSE;
        }
         
        $presences = array();
        foreach($rowSet as $row){
            $presences[] = $this->rowToObject($row);
        }
        return $presences;        
    }
    
    /**
     * @param Presence $presence
     * @return boolean
     */
    public function save(Presence $presence)
    {
        if ((int)$presence->getId() === 0){     
            // insertion      
            $sql = "INSERT INTO presences VALUES (null, :date_time, 
                :state, :id_student, :id_teacher)";
        } else {
            // mise à jour
            $sql = "UPDATE presences 
                SET date_time = :date_time, 
                    state = :state, 
                    id_student = :id_student, 
                    id_teacher = :id_teacher 
                WHERE id = :id;";            
        }
        $stmt = $this->dbAdapter->prepare($sql);
        $row = $this->objectToRow($presence);
        
        return (bool) $stmt->execute($row);
    }
    
    /**
     * @param int $id
     * @return boolean
     */
    public function delete($id){
        $presence = $this->find($id);
        $bool = FALSE;
        if ($presence){
            $sql = "DELETE FROM presences WHERE id = :id;";
            $stmt = $this->dbAdapter->prepare($sql);
            $stmt->bindParam(':id', $id);
            $bool = $stmt->execute();
        }
        return $bool;
    }
    
    /**
     * 
     * @param array $row
     * @return Session
     */
    public function rowToObject($row){
        $session = new Session();
        
        $session->setId($row['id'])
                ->setTitle($row['title'])
                ->setSlug($row['slug'])
                ->setStartDate($row['start_date'])
                ->setEndDate($row['end_date']);
        
        return $session;
    }
    
    /**
     * @param Session $session
     * @return array
     */
    public function objectToRow(Session $session){
        $row = array();
        
        if ((int) $session->getId() !== 0){
            $row['id'] = $session->getId();
        }
        $row['title'] = $session->getTitle();
        $row['slug'] = $session->getSlug();
        $row['start_date'] = $session->getStartDate();
        $row['end_date'] = $session->getEndDate();
        
        return $row;
    }
    
}
