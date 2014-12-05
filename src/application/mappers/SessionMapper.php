<?php

require_once APPLICATION_PATH . '/models/Session.php';

class SessionMapper
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
     * @return boolean|Session
     */
    public function find($id){
        $sql = "SELECT * FROM sessions WHERE id = :id";
        $stmt = $this->dbAdapter->prepare($sql);
        $stmt->bindParam(':id', $id);
        $req = $stmt->execute();
        $row = $stmt->fetch();
        
        if (!$row)return FALSE;
         
        return $this->rowToObject($row);        
    }
    
    /**
     * @return boolean|multitype:Session
     */
    public function fetchAll(){
        $sql = "SELECT * FROM sessions WHERE 1";
        $stmt = $this->dbAdapter->query($sql);
        $rowSet = $stmt->fetchAll();
        
        if ($rowSet == array()) {
            return FALSE;
        }
         
        $sessions = array();
        foreach($rowSet as $row){
            $sessions[] = $this->rowToObject($row);
        }
        return $sessions;        
    }
    
    /**
     * @param Session $session
     * @return boolean
     */
    public function save(Session $session)
    {
        if ((int)$session->getId() === 0){     
            // insertion      
            $sql = "INSERT INTO sessions VALUES (null, :title, 
                :slug, :start_date, :end_date)";
        } else {
            // mise à jour
            $sql = "UPDATE sessions 
                SET title = :title, 
                    slug = :slug, 
                    start_date = :start_date, 
                    end_date = :end_date 
                WHERE id = :id;";            
        }
        $stmt = $this->dbAdapter->prepare($sql);
        $row = $this->objectToRow($session);
        return (bool) $stmt->execute($row);
    }
    
    /**
     * @param int $id
     * @return boolean
     */
    public function delete($id){
        $session = $this->find($id);
        $bool = FALSE;
        if ($session){
            $sql = "DELETE FROM sessions WHERE id = :id;";
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
