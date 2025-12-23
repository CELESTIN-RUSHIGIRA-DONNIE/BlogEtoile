<?php
require('assets/fpdf/fpdf.php');
require('conf/db.php');

// --------- CRÉATION PDF FORMAT CARTE ---------
$pdf = new FPDF('L', 'mm', array(86, 54)); // format carte type 85x54
$pdf->AddPage();
$pdf->SetMargins(0, 0, 0);
$pdf->SetAutoPageBreak(false);

// --------- FOND (COULEURS / BANDES) ---------

// Fond bleu très clair
$pdf->SetFillColor(230, 245, 255);
$pdf->Rect(0, 0, 86, 54, 'F');

// Bandeau haut bleu
$pdf->SetFillColor(130, 180, 255);
$pdf->Rect(0, 0, 86, 12, 'F');

// Bandeau bas bleu foncé
$pdf->SetFillColor(0, 120, 200);
$pdf->Rect(0, 46, 86, 8, 'F');

// --------- TEXTES FIXES (ENTÊTES) ---------

// Nom association dans le bandeau
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Times', 'B', 12);
$pdf->SetXY(2, 2);
$pdf->Cell(0, 4, utf8_decode('ÉTOILE DE LOUANGE UEA'), 0, 1, 'C');

// Pays
$pdf->SetFont('Times', 'B', 7);
$pdf->SetXY(2, 8);
$pdf->Cell(0, 3, utf8_decode("AUMONERIE PROTESTANTE DE L'UEA"), 0, 1, 'C');

// Titre "CARTE DE MEMBRE"
$pdf->SetTextColor(0, 0, 120);
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(0, 13);
$pdf->Cell(86, 5, utf8_decode('CARTE DE MEMBRE'), 0, 1, 'C');

if (isset($_GET['id'])) {
    $fiche_id = $_GET['id'];
    $query = "SELECT * FROM membres WHERE id='$fiche_id'";
$demande_run = mysqli_query($con, $query);

while($list = mysqli_fetch_assoc($demande_run)) {

    // --------- INFOS TEXTE À GAUCHE ---------
$pdf->SetTextColor(0, 0, 80);
$pdf->SetFont('Arial', 'B', 7);
$y = 20;

// Nom
$pdf->SetXY(4, $y);
$pdf->Cell(18, 4, utf8_decode('Nom :'), 0, 0, 'L');
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(40, 4, $list['nom'], 0, 1, 'L');

// Post-nom
$y += 4;
$pdf->SetFont('Arial', 'B', 7);
$pdf->SetXY(4, $y);
$pdf->Cell(18, 4, utf8_decode('Post-nom :'), 0, 0, 'L');
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(40, 4, $list['postnom'], 0, 1, 'L');

// Prénom
$y += 4;
$pdf->SetFont('Arial', 'B', 7);
$pdf->SetXY(4, $y);
$pdf->Cell(18, 4, utf8_decode('Prénom :'), 0, 0, 'L');
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(40, 4, $list['prenom'], 0, 1, 'L');

// Sexe
$y += 4;
$pdf->SetFont('Arial', 'B', 7);
$pdf->SetXY(4, $y);
$pdf->Cell(18, 4, utf8_decode('Sexe :'), 0, 0, 'L');
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(40, 4, $list['genre'], 0, 1, 'L');

// Téléphone
$y += 4;
$pdf->SetFont('Arial', 'B', 7);
$pdf->SetXY(4, $y);
$pdf->Cell(18, 4, utf8_decode('Téléphone :'), 0, 0, 'L');
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(40, 4, $list['telephone'], 0, 1, 'L');

// Fonction
$y += 4;
$pdf->SetFont('Arial', 'B', 7);
$pdf->SetXY(4, $y);
$pdf->Cell(18, 4, utf8_decode('Fonction :'), 0, 0, 'L');
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(40, 4, $list['fonction'], 0, 1, 'L');


// --------- CADRE / PHOTO À DROITE ---------


// Si tu as une photo réelle (nom de fichier stocké en BDD) :
$cheminPhoto = __DIR__.'/uploads/'.$list['profile']; // adapter le chemin selon ton arborescence
if (is_file($cheminPhoto)) {
    $pdf->Image($cheminPhoto, 60, 20, 18, 22);
}

// --------- BAS DE CARTE : NUMÉRO, DATE, SIGNATURE ---------

$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Arial', '', 7);

// Numéro de carte à gauche
$pdf->SetXY(2, 47);
$pdf->Cell(40, 4, 'N° : '.$list['id'], 0, 0, 'L');

// Date d'émission au centre
$pdf->SetXY(0, 47);
$pdf->Cell(86, 4, 'Livré le : '.date('d/m/Y'), 0, 0, 'C');

// Légende "Signature" à droite
$pdf->SetXY(50, 47);
$pdf->Cell(34, 4, utf8_decode('Signature'), 0, 0, 'R');

// --------- SORTIE PDF ---------
$nomFichier = 'carte_'.$list['nom'].'.pdf';
$pdf->Output('I', $nomFichier);
exit;

}
}

?>
