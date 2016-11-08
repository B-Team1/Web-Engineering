<?php

class Rechnung {

    private $amout;
    private $payableTill;
    private $date;
    private $wohnungId;
    private $statusId;
    private $kostenartId;

    public function __construct($amout, $payableTill, $date, $wohnungId, $statusId, $kostenartId) {
        $this->amout = $amout;
        $this->payableTill = $payableTill;
        $this->date = $date;
        $this->wohnungId = $wohnungId;
        $this->statusId = $statusId;
        $this->kostenartId = $kostenartId;
    }

    public function getAmout() {
        return $this->amout;
    }

    public function getPayableTill() {
        return $this->payableTill;
    }

    public function getDate() {
        return $this->date;
    }

    public function getWohnungId() {
        return $this->wohnungId;
    }

    public function getStatusId() {
        return $this->statusId;
    }

    public function getKostenartId() {
        return $this->kostenartId;
    }

    public function setAmout($amout) {
        $this->amout = $amout;
    }

    public function setPayableTill($payableTill) {
        $this->payableTill = $payableTill;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setWohnungId($wohnungId) {
        $this->wohnungId = $wohnungId;
    }

    public function setStatusId($statusId) {
        $this->statusId = $statusId;
    }

    public function setKostenartId($kostenartId) {
        $this->kostenartId = $kostenartId;
    }

}
