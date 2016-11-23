<?php

abstract class AbstractDAO
{
    protected $link;

    public function __construct($mysqliInstance)
    {
        $this->link = $mysqliInstance;
        if ($this->link === null) {
            throw new Exception("No DB connection!");
        }
    }
}