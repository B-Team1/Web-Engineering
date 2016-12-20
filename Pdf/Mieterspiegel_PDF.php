<?php
require('fpdf.php');
include_once '../Controller/RenterController.php';
include_once '../Validator/login_pruefen.inc.php';

class Mieterspiegel_PDF extends FPDF
{
    function Header()
{
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(100);
    // Title
    $this->Cell(80,10,'Mieter-Spiegel',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Load data
function LoadData()
{
    $rc = new RenterController();
    $data = $rc->selectRenterRoomTable();
    return $data;
}

// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(35,82,152);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(50, 30, 30, 45, 45, 40, 40);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    for($i=0; $i<count($data); $i++) {
                        $b = $data[$i];
        $Wohnung = utf8_decode($b[0]);
        $Name = utf8_decode($b[3]);
        $VName = utf8_decode($b[4]);
        
        $this->Cell($w[0],6,$Wohnung,'LR',0,'C',$fill);
        $this->Cell($w[1],6,number_format($b[1]),'LR',0,'R',$fill);
        $this->Cell($w[2],6,number_format($b[2]),'LR',0,'R',$fill);
        $this->Cell($w[3],6,$Name,'LR',0,'C',$fill);
        $this->Cell($w[4],6,$VName,'LR',0,'C',$fill);
        $this->Cell($w[5],6,$b[5],'LR',0,'C',$fill);
        $this->Cell($w[6],6,$b[6],'LR',0,'C',$fill);
        $this->Ln();
        $fill = !$fill;
}

    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}



$pdf = new Mieterspiegel_PDF();
// Column headings
$Fläche = utf8_decode("Fläche m2");
$header = array('Wohnung', $Fläche, 'Miete', 'Name', 'Vorname', 'Telefon', 'Vertragsstart');
// Data loading
$data = $pdf->LoadData();
$pdf->SetFont('Arial','',14);
$pdf->AddPage(["L"]);
$pdf->FancyTable($header,$data);

$pdf->Output();
?>