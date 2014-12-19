<?php

require_once APPLICATION_PATH . '/models/Presence.php';

class PresenceMapper
{
    /**
     * @var Db
     */
    private $dbAdapter;
    
    public function __construct($db)
    {
        $this->dbAdapter = $db->getConnexion();
    }
    
    /**
     * @param int $id 
     * @return boolean|Presence
     */
    public function find($id)
    {
        $sql = "SELECT * FROM presences WHERE id = :id";
        $stmt = $this->dbAdapter->prepare($sql);
        $stmt->bindParam(':id', $id);
        $req = $stmt->execute();
        $row = $stmt->fetch();
        
        if (!$row) {
            return false;
        }
         
        return $this->rowToObject($row);        
    }

    /**
     * @param int $idStudent
     * @return boolean|multitype:Presence
     */    
    public function findByIdStudent($idStudent)
    {
        $sql = "SELECT * FROM presences WHERE id_student = :id_student";
        $stmt = $this->dbAdapter->prepare($sql);
        $stmt->bindParam(':id_student', $idStudent);
        $req = $stmt->execute();
        $rowSet = $stmt->fetchAll();
        
        if ($rowSet == array()) {
            return false;
        }
        
        $presences = array();
        foreach($rowSet as $row) {
            $presences[] = $this->rowToObject($row);
        }        
         
        return $presences;        
    }    
    
    /**
     * @param int $idStudent
     * @return boolean|multitype:Presence
     */    
    public function findByIdStudentAndDateTime($idStudent, $dateTime)
    {
        $sql = "SELECT * FROM presences 
            WHERE id_student = :id_student
            AND date_time = :date_time";
        $stmt = $this->dbAdapter->prepare($sql);
        $stmt->bindParam(':id_student', $idStudent);
        $stmt->bindParam(':date_time', $dateTime);
        $req = $stmt->execute();
        $rowSet = $stmt->fetchAll();
        
        if ($rowSet == array()) {
            return false;
        }
        
        $presences = array();
        foreach($rowSet as $row) {
            $presences[] = $this->rowToObject($row);
        }
         
        return $presences;        
    }    
    
    /**
     * @return boolean|multitype:Presence
     */
    public function fetchAll()
    {
        $sql = "SELECT * FROM presences WHERE 1";
        $stmt = $this->dbAdapter->query($sql);
        $rowSet = $stmt->fetchAll();
        
        if ($rowSet == array()) {
            return false;
        }
         
        $presences = array();
        foreach($rowSet as $row) {
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
        if ((int)$presence->getId() === 0) {     
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
    public function delete($id)
    {
        $presence = $this->find($id);
        $bool = false;
        if ($presence) {
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
     * @return Presence
     */
    public function rowToObject($row)
    {
        $presence = new Presence();
        
        $presence->setId($row['id'])
                ->setDateTime($row['date_time'])
                ->setState($row['state'])
                ->setIdStudent($row['id_student'])
                ->setIdTeacher($row['id_teacher']);
        
        return $presence;
    }
    
    /**
     * @param Presence $presence
     * @return array
     */
    public function objectToRow(Presence $presence)
    {
        $row = array();
        
        if ((int) $presence->getId() !== 0) {
            $row['id'] = $presence->getId();
        }
        $row['date_time'] = $presence->getDateTime();
        $row['state'] = $presence->getState();
        $row['id_student'] = $presence->getIdStudent();
        $row['id_teacher'] = $presence->getIdTeacher();
        
        return $row;
    }
}
