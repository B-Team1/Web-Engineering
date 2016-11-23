<?php

include_once "../model/Room.php";

class RoomValidator
{
    /**
     * @var Room
     */
    private $room;

    /**
     * @var bool
     */
    private $valid = true;
    private $nameErr = null;
    private $expanseErr = null;
    private $floorErr = null;
    private $rentErr = null;

    /**
     * RoomValidator constructor.
     * @param Room $room
     */
    public function __construct(Room $room = null)
    {
        $this->room = $room;
        $this->validate();
    }

    public function validate(){

        if(!is_null($this->room)) {
            if (empty($this->room->getName())) {
                $this->nameError = 'Wohnungsname ist erforderlich!';
                $this->valid = false;
            }

            if (empty($this->room->getEmail())) {
                $this->emailError = 'Please enter Email Address';
                $this->valid = false;
            } else if (!filter_var($this->room->getEmail(), FILTER_VALIDATE_EMAIL)) {
                $this->emailError = 'Please enter a valid Email Address';
                $this->valid = false;
            }

            if (empty($this->room->getMobile())) {
                $this->mobileError = 'Please enter Mobile Number';
                $this->valid = false;
            }
        }
        else {
            $this->valid = false;
        }
        return $this->valid;

    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->room;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @return String
     */
    public function getNameError()
    {
        return $this->nameError;
    }

    /**
     * @return String
     */
    public function getEmailError()
    {
        return $this->emailError;
    }

    /**
     * @return String
     */
    public function getMobileError()
    {
        return $this->mobileError;
    }
}

?>