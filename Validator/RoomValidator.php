<?php

include_once '../Model/Room.php';

class RoomValidator {

    private $room;
    private $valid = true;
    private $descriptionError = null;
    private $areaError = null;
    private $floorError = null;
    private $rentError = null;

    public function __construct(Room $room = null) {
        $this->room = $room;
        $this->checkRoom();
    }

    public function checkRoom() {

        if (!is_null($this->room)) {
            if (empty($this->room->getDescription())) {
                $this->descriptionError = 'Geben Sie den Wohnungsnamen ein';
                $this->valid = false;
            }

            if (empty($this->room->getArea())) {
                $this->areaError = 'Geben Sie die Wohnungsfläche ein';
                $this->valid = false;
            } else if (!is_numeric($this->room->getArea())) {
                $this->areaError = 'Geben Sie die Fläche als Zahl ein';
                $this->valid = false;
            }

            if (empty($this->room->getFloor())) {
                $this->floorError = 'Geben Sie das Stockwerk ein';
                $this->valid = false;
            } else if (!is_numeric($this->room->getFloor())) {
                $this->floorError = 'Geben Sie das Stockwerk als ganze Zahl ein';
                $this->valid = false;
            }

            if (empty($this->room->getRent())) {
                $this->rentError = 'Geben Sie den Mietzins ein';
                $this->valid = false;
            } else if (!is_numeric($this->room->getRent())) {
                $this->floorError = 'Geben Sie den Mietzins als Zahl ein';
                $this->valid = false;
            }
        } else {
            $this->valid = false;
        }
        return $this->valid;
    }

    function clear($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function getRoom() {
        return $this->room;
    }

    function isValid() {
        return $this->valid;
    }

    function getDescriptionError() {
        return $this->descriptionError;
    }

    function getAreaError() {
        return $this->areaError;
    }

    function getFloorError() {
        return $this->floorError;
    }

    function getRentError() {
        return $this->rentError;
    }

}

?>