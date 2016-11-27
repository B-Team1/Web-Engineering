<?php

class BillValidator {

    public function __checkBill($checkamount) {
        $amount = $checkamount;

        /*if (empty($checkinvoicedate)) {
            $invoicedateErr = "Rechnungsdatum ist erforderlich";
        } else {
            $d = DateTime::createFromFormat('d-m-Y', ($checkinvoicedate));
            if ($d && $d->format('d-m-Y') !== ($checkinvoicedate)) {
                $invoicedateErr = "Kein korrektes Datum-Format!";
            } else {
                $checkinvoicedate = test_input($checkinvoicedate);
            }
        }*/

        if (empty($amount)) {
            $amountErr = "Betrag ist erforderlich";
        } else {
            if (!is_numeric($amount)) {
                $amountErr = "Betrag muss eine Zahl sein!";
            } else {
                $amount = test_input($amount);
            }
        }

        if (empty($checkdatetopay)) {
            $datetopayErr = "Bezahlen bis ist erforderlich";
        } else {
            $d = DateTime::createFromFormat('d-m-Y', ($checkdatetopay));
            if ($d && $d->format('d-m-Y') !== ($checkdatetopay)) {
                $datetopayErr = "Kein korrektes Datum-Format!";
            } else {
                $checkdatetopay = test_input($checkdatetopay);
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    }

}

?>