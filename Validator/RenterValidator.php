<?php

include_once '../Model/Renter.php';

class RenterValidator {
    
    private $renter;
    private $valid = true;
    private $nameError = null;
    private $vornameError = null;
    private $phoneError = null;
    private $streetError = null;
    private $cityError = null;
    private $plzError = null;
    private $contractstartError = null;
    private $apartmentError = null;
    
    public function __construct(Renter $renter = null) {
        $this->renter = $renter;
        $this->checkRenter();
    }
    
    public function checkRenter() {
        
        if (!is_null($this->renter)) {
            if (empty($this->renter->getName())) {
                $this->nameError = 'Geben Sie einen Namen ein';
                $this->valid = false;
            }
            
            if (empty($this->renter->getFirstname())) {
                $this->vornameError = 'Geben Sie einen Vornamen ein';
                $this->valid = false;
            }
            
            if (empty($this->renter->getPhone())) {
                $this->phoneError = 'Geben Sie eine Telefonnummer ein';
                $this->valid = false;
            } else if(!preg_match("/^[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}$/", $this->renter->getPhone())) {
                $this->phoneError = 'Bitte im gewünschten Format eingeben';
                $this->valid = false;
            }
            
            if (empty($this->renter->getStreet())) {
                $this->streetError = 'Geben Sie eine Strasse ein';
                $this->valid = false;
            }
            
            if (empty($this->renter->getPlace())) {
                $this->cityError = 'Geben Sie einen Ort ein';
                $this->valid = false;
            }
            
            if (empty($this->renter->getPlz())) {
                $this->plzError = 'Geben Sie eine PLZ ein';
                $this->valid = false;
            } else if (!is_numeric($this->renter->getPlz())) {
                $this->plzError = 'Geben Sie eine Zahl ein';
                $this->valid = false;
            } else if (strlen($this->renter->getPlz()) != 4) {
                $this->plzError = 'Geben Sie eine vierstelllige Zahl ein';
                $this->valid = false;
            }
            
            if (empty($this->renter->getStartDate())) {
                $this->contractstartError = 'Wählen Sie ein Startdatum aus';
                $this->valid = false;
            } else if (!validateDate($this->renter->getStartDate(), 'Y-m-d')) {
                $this->contractstartError = 'Geben Sie ein gültiges Datum ein';
                $this->valid = false;
            }
            
            if (empty($this->renter->getRoomId())) {
                $this->apartmentError = 'Wählen Sie eine Wohnung aus';
                $this->valid = false;
            }
            
            
        } else {
            $this->valid = false;
        }
        return $this->valid;
    }
    
    function getRenter() {
        return $this->renter;
    }
    
    function isValid() {
        return $this->valid;
    }
    
    function getNameError() {
        return $this->nameError;
    }
    
    function getVornameError() {
        return $this->vornameError;
    }
    
    function getPhoneError() {
        return $this->phoneError;
    }
    
    function getStreetError() {
        return $this->streetError;
    }
    
    function getCityError() {
        return $this->cityError;
    }
    
    function getPlzError() {
        return $this->plzError;
    }
    
    function getContractstartError() {
        return $this->contractstartError;
    }
    
    function getApartmentError() {
        return $this->apartmentError;
    }
}

function validateDate($date, $format = 'Y-m-d H:i:s') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
