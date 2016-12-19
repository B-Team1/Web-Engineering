<?php

abstract class AbstractDAO
{
    /**
     *
     * @var type 
     */
    protected $link;

    /**
     * 
     * @param type $mysqliInstance
     * @throws Exception
     */
    public function __construct($mysqliInstance)
    {
        $this->link = $mysqliInstance;
        if ($this->link === null) {
            throw new Exception("No DB connection!");
        }
    }
}