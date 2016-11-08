<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mieter
 *
 * @author Tobias
 */
class Mieter {

    private $name;
    private $firstname;
    private $phone;
    private $street;
    private $place;
    private $plz;
    private $startDate;
    private $roomId;

    public function __construct($name, $firstname, $phone, $street, $place, $plz, $startDate, $roomId) {
        $this->name = $name;
        $this->firstname = $firstname;
        $this->phone = $phone;
        $this->street = $street;
        $this->place = $place;
        $this->plz = $plz;
        $this->startDate = $startDate;
        $this->roomId = $roomId;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstName($firstname) {
        $this->firstname = $firstname;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getStreet() {
        return $this->street;
    }

    public function setStreet($street) {
        $this->street = $street;
    }

    public function getPlace() {
        return $this->place;
    }

    public function setPlace($place) {
        $this->place = $place;
    }

    public function getPlz() {
        return $this->plz;
    }

    public function setPlz($plz) {
        $this->plz = $plz;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function getRoomId() {
        return $this->roomId;
    }

    public function setRoomId($roomId) {
        $this->roomId = $roomId;
    }

}
