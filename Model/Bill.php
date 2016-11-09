<?php

class Bill {

    private $billId;
    private $amout;
    private $payableUntill;
    private $date;
    private $roomId;
    private $statusId;
    private $costTypeId;
    private $descripton;

    public function __construct($billId, $amout, $payableUntill, $date, $roomId, $statusId, $costTypeId, $descripton) {
        $this->billId = $billId;
        $this->amout = $amout;
        $this->payableUntill = $payableUntill;
        $this->date = $date;
        $this->roomId = $roomId;
        $this->statusId = $statusId;
        $this->costTypeId = $costTypeId;
        $this->descripton = $descripton;
    }

    public function getDescripton() {
        return $this->descripton;
    }

    public function setDescripton($descripton) {
        $this->descripton = $descripton;
    }

    public function getBillId() {
        return $this->billId;
    }

    public function setBillId($billId) {
        $this->billId = $billId;
    }

    public function getAmout() {
        return $this->amout;
    }

    public function getPayableUntill() {
        return $this->payableUntill;
    }

    public function getDate() {
        return $this->date;
    }

    public function getRoomId() {
        return $this->roomId;
    }

    public function setRoomId($roomId) {
        $this->roomId = $roomId;
    }

    public function getStatusId() {
        return $this->statusId;
    }

    public function getCostTypeId() {
        return $this->costTypeId;
    }

    public function setCostTypeId($typeOfCostId) {
        $this->costTypeId = $typeOfCostId;
    }

    public function setAmout($amout) {
        $this->amout = $amout;
    }

    public function setPayableUntill($payableTill) {
        $this->payableUntill = $payableTill;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setStatusId($statusId) {
        $this->statusId = $statusId;
    }

}
