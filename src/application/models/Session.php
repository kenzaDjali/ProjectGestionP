<?php

class Session
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $slug;
    /**
     * @var string
     */
    private $start_date;
    /**
     * @var string
     */
    private $end_date;
	/**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

	/**
     * @return the $title
     */
    public function getTitle()
    {
        return $this->title;
    }

	/**
     * @return the $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

	/**
     * @return the $start_date
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

	/**
     * @return the $end_date
     */
    public function getEndDate()
    {
        return $this->end_date;
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
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;        
    }

	/**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;        
    }

	/**
     * @param string $start_date
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
        return $this;
    }

	/**
     * @param string $end_date
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
        return $this;        
    }

    
    
}
