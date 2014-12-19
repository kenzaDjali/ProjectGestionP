<?php


class User 
{   
    /**
     * 
     * @var int
     */
    private $id;
    /**
     *
     * @var string
     */
    private $last_name;
    /**
     *
     * @var string
     */
    private $first_name;
    /**
     *
     * @var string
     */
    private $email;
    /**
     *
     * @var string
     */
    private $password;
    /**
     *
     * @var int
     */
    private $role;
    /**
     *
     * @var int
     */
    private $cell_phone_number;
    /**
     *
     * @var int
     */
    private $phone_number;  
    /**
     *
     * @var int
     */
    private $code;
	/**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

	/**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

	/**
     * @return the $last_name
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

	/**
     * @param string $last_name
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }

	/**
     * @return the $first_name
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

	/**
     * @param string $first_name
     */
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }

	/**
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }

	/**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

	/**
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }

	/**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

	/**
     * @return the $role
     */
    public function getRole()
    {
        return $this->role;
    }

	/**
     * @param number $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

	/**
     * @return the $cell_phone_number
     */
    public function getCell_phone_number()
    {
        return $this->cell_phone_number;
    }

	/**
     * @param number $cell_phone_number
     */
    public function setCell_phone_number($cell_phone_number)
    {
        $this->cell_phone_number = $cell_phone_number;
    }

	/**
     * @return the $phone_number
     */
    public function getPhone_number()
    {
        return $this->phone_number;
    }

	/**
     * @param number $phone_number
     */
    public function setPhone_number($phone_number)
    {
        $this->phone_number = $phone_number;
    }

	/**
     * @return the $code
     */
    public function getCode()
    {
        return $this->code;
    }

	/**
     * @param number $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    

    
    
    
}