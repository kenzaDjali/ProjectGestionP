<?php

class Presence
{
    /**
     * @var int
     */
    private $id;
    
    /**
     * @var string
     */
    private $date_time;
    
    /**
     * @var int
     */
    private $state;
    
    /**
     * @var int
     */
    private $id_student;
    
    /**
     * @var string
     */
    private $id_teacher;
    
	/**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

	/**
     * @return the $datetime
     */
    public function getDateTime()
    {
        return $this->date_time;
    }

	/**
     * @return the $state
     */
    public function getState()
    {
        return $this->state;
    }

	/**
     * @return the $id_student
     */
    public function getIdStudent()
    {
        return $this->id_student;
    }

	/**
     * @return the $id_teacher
     */
    public function getIdTeacher()
    {
        return $this->id_teacher;
    }

	/**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

	/**
     * @param string $date_time
     */
    public function setDateTime($dateTime)
    {
        $this->date_time = $dateTime;
        return $this;        
    }

	/**
     * @param int $state
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;        
    }

	/**
     * @param int $id_student
     */
    public function setIdStudent($idStudent)
    {
        $this->id_student = $idStudent;
        return $this;
    }

	/**
     * @param int $id_teacher
     */
    public function setIdTeacher($idTeacher)
    {
        $this->id_teacher = $idTeacher;
        return $this;        
    }

    
    
}
