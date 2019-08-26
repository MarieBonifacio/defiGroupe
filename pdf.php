<?php
session_start();
define('EURO',chr(128));

require('./class/category.php');
require('./class/produit.php');
require('./includes/fpdf/fpdf.php');

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 30);
$pdf->Cell(210, 10, 'Votre Commande', 0, 1, 'C');

$pdf->Cell(210, 10, '', 0, 1);

$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(110, 15, 'Produit', 1, 0,'C');
$pdf->Cell(40, 15, utf8_decode('Quantité'), 1, 0, 'C');
$pdf->Cell(40, 15, 'Prix', 1, 1, 'C');

$pdf->SetFont('Arial', '', 18);
$panierTotal = 0;
for($i=0; $i<count($_SESSION['panier']); $i++){
    $p = new Produit();
    $p->getProduitById($_SESSION['panier'][$i]['id']);

    $pdf->Cell(110, 15, $p->getNom(), 1, 0,'C');
    $pdf->Cell(40, 15, 'x'.$_SESSION['panier'][$i]['quantite'], 1, 0, 'C');
    $pdf->Cell(40, 15, $p->getPrix().EURO, 1, 1, 'C');
    $panierTotal += $_SESSION['panier'][$i]['quantite']*$p->getPrix();
}


$pdf->Cell(150, 15, 'Total', 1, 0,'C');
$pdf->Cell(40, 15, $panierTotal.EURO, 1, 1, 'C');

$pdf->Output();

?>
