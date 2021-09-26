<?php
require 'pdf.php';



$pdf = new PDF();
// Titres des colonnes
$header = array('nomMaison', 'informations', 'livres', 'mail','telephone','adresse');
// Chargement des données
$data = $pdf->LoadData('editeur.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>