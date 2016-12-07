<?php
require('fpdf.php');
include_once '../Controller/BillController.php';

class PdfGenerator extends FPDF
{
// Load data
function LoadData()
{
    $bc = new BillController();
    $data = $bc->selectBillTablePdfGenerator();
    return $data;
}

// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(40, 40, 40, 40, 40, 40, 40);
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
                        
        $this->Cell($w[0],6,$b[0],'LR',0,'R',$fill);
        $this->Cell($w[1],6,$b[1],'LR',0,'R',$fill);
        $this->Cell($w[2],6,$b[2],'LR',0,'R',$fill);
        $this->Cell($w[3],6,$b[3],'LR',0,'R',$fill);
        $this->Cell($w[4],6,$b[4],'LR',0,'R',$fill);
        $this->Cell($w[5],6,number_format($b[5]),'LR',0,'R',$fill);
        $this->Cell($w[6],6,$b[6],'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
}

    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PdfGenerator();
// Column headings
$header = array('M-Name', 'M-Vorname', 'Rechnungsdatum', 'Kostenart', 'Zahlbar bis', 'Betrag', 'Status');
// Data loading
$data = $pdf->LoadData();
$pdf->SetFont('Arial','',14);
$pdf->AddPage(["L"]);
$pdf->FancyTable($header,$data);

$pdf->Output();
?>