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

    public function __construct($roomId, $area, $description, $floor, $rent, $hirerId) {
        $this->roomId = $roomId;
        $this->area = $area;
        $this->description = $description;
        $this->floor = $floor;
        $this->rent = $rent;
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
