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
class Room {

    private $roomId;
    private $area;
    private $description;
    private $floor;
    private $rent;
    private $hirerId;

    public function __construct($roomId=null, $area=null, $description=null, $floor=null, $rent=null, $hirerId=null) {
        if (isset($roomId))
            $this->roomId = $roomId;
        if (isset($area))
            $this->area = $area;
        if (isset($description))
            $this->description = $description;
        if (isset($floor))
            $this->floor = $floor;
        if (isset($rent))
            $this->rent = $rent;
        if (isset($hirerId))
            $this->hirerId = $hirerId;
    }

    public function getRoomId() {
        return $this->roomId;
    }

    public function setRoomId($roomId) {
        $this->roomId = $roomId;
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

    public function getHirerId() {
        return $this->hirerId;
    }

    public function setHirerId($hirerId) {
        $this->hirerId = $hirerId;
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

}
