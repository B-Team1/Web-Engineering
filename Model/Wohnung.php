<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Wohnung
 *
 * @author Tobias
 */
class Wohnung {
    private $area;
    private $description;
    private $floor;
    private $rent;
    private $vermieterId;
    
    public function __construct($area, $description, $floor, $rent, $vermieterId) {
        $this->area = $area;
        $this->description = $description;
        $this->floor = $floor;
        $this->rent = $rent;
        $this->vermieterId = $vermieterId;
    }

    public function getArea() {
        return $this->area;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getFloor() {
        return $this->floor;
    }

    public function getRent() {
        return $this->rent;
    }

    public function getVermieterId() {
        return $this->vermieterId;
    }

    public function setArea($area) {
        $this->area = $area;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setFloor($floor) {
        $this->floor = $floor;
    }

    public function setRent($rent) {
        $this->rent = $rent;
    }

    public function setVermieterId($vermieterId) {
        $this->vermieterId = $vermieterId;
    }
}   