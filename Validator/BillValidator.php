<?php

include_once '../Model/Bill.php';

class BillValidator {

    private $bill;
    private $valid = true;
    private $amountError = null;
    private $dateError = null;
    private $payableUntilError = null;
    private $roomError = null;
    private $statusError = null;

    public function __construct(Bill $bill = null) {
        $this->bill = $bill;
        $this->checkBill();
    }

    public function checkBill() {

        if (!is_null($this->bill)) {
            if (empty($this->bill->getAmout())) {
                $this->amountError = 'Geben Sie einen Wert ein';
                $this->valid = false;
            } else if (!is_numeric($this->bill->getAmout())) {
                $this->amountError = 'Der Wert muss eine Zahl sein';
                $this->valid = false;
            }

            if (empty($this->bill->getDate())) {
                $this->dateError = 'Geben Sie ein Rechnungsdatum ein';
                $this->valid = false;
            } else if (!validateDate($this->bill->getDate(), 'Y-m-d')) {
                $this->dateError = 'Geben Sie ein gültiges Datum ein';
                $this->valid = false;
            }

            if (empty($this->bill->getPayableUntill())) {
                $this->payableUntilError = 'Geben Sie das Bezahldatum ein';
                $this->valid = false;
            } else if (!validateDate($this->bill->getPayableUntill(), 'Y-m-d')) {
                $this->payableUntilError = 'Geben Sie ein gültiges Datum ein';
                $this->valid = false;
            }

            if (empty($this->bill->getRoomId())) {
                $this->roomError = 'Wählen Sie eine Wohnung aus';
                $this->valid = false;
            }

            if (empty($this->bill->getStatusId())) {
                $this->statusError = 'Wählen Sie den aktuellen Status aus';
                $this->valid = false;
            }
        } else {
            $this->valid = false;
        }
        return $this->valid;



        /* function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
          } */
    }

    function getBill() {
        return $this->bill;
    }

    function isValid() {
        return $this->valid;
    }

    function getAmountError() {
        return $this->amountError;
    }

    function getDateError() {
        return $this->dateError;
    }

    function getPayableUntilError() {
        return $this->payableUntilError;
    }

    function getRoomError() {
        return $this->roomError;
    }

    function getStatusError() {
        return $this->statusError;
    }

}

function validateDate($date, $format = 'Y-m-d H:i:s') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

?>