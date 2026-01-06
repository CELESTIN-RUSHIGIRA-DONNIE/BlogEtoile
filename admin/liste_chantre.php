<?php

include('conf/db.php');
require('assets/fpdf/fpdf.php');

$result = $con->query("SELECT * FROM membres WHERE status=1");
$rows = [];
while($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
$con->close();

class PDF extends FPDF
{
     var $rows; // Variable globale pour $rows
    
    function SetRows($r) { $this->rows = $r; } // Setter

    function Header()
    {
        // Image à gauche (Y=8, hauteur 30mm)
        $this->Image('assets/images/lg-et.jpg', 10, 8, 0, 30);
        // Image à droite (X=190, Y=8, hauteur 30mm)
        // $this->Image('assets/images/aumopro.jpg', 150, 8, 0, 30);

        // Zone texte centrée (début X=50, même ligne Y=8)
        $this->SetXY(15, 8);

        $this->SetFont('times', 'B', 18);
        $this->Cell(0, 8, utf8_decode('AUMONERIE PROTESTANTE DE L\'UEA'), 0, 1, 'C');

        $this->SetFont('times', 'B', 16);
        $this->Cell(0, 6, utf8_decode('Chorale Etoile de Louange'), 0, 1, 'C');

        $this->SetFont('times', 'i', 10);
        $this->Cell(0, 5, utf8_decode('etoiledelouangeuea01@gmail.com'), 0, 1, 'C');
        $this->Cell(0, 5, utf8_decode('Tél: +243 974 291 271'), 0, 1, 'C');

        $this->Ln(12); // Espace avant tableau
    }


    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Liste de chantre ' . $this->PageNo()), 0, 0, 'C');
    }

        function TableauBureau()
    {
        // En-têtes
        $this->SetFont('times','B',9); // ← 'Arial' pas 'times'
        $this->SetFillColor(200,220,255);
        $this->Cell(12,8,utf8_decode('N°'),1,0,'C',true);
        $this->Cell(45,8,utf8_decode('Nom et Prénom'),1,0,'C',true);
        $this->Cell(10,8,utf8_decode('Genre'),1,0,'C',true);
        $this->Cell(38,8,utf8_decode('Fonction'),1,0,'C',true);
        $this->Cell(23,8,utf8_decode('Téléphone'),1,0,'C',true);
        $this->Cell(60,8,utf8_decode('Email'),1,1,'C',true);

        $this->SetFont('Arial','',8); // ← Virgule supprimée !
        
        if(empty($this->rows)) {
            $this->Cell(0,10,utf8_decode('Aucun membre trouvé'),1,1,'C');
            return;
        }

        foreach($this->rows as $row) {
            static $fill = false;
            if($fill) $this->SetFillColor(245,245,255);
            else $this->SetFillColor(255,255,255);
            
            static $numero = 1;
            $this->Cell(12,6,$numero++,1,0,'C',$fill);
            $this->Cell(45,6,utf8_decode(($row['nom']??'').' '.($row['prenom']??'')),1,0,'L',$fill);
            $this->Cell(10,6,utf8_decode($row['genre']??''),1,0,'L',$fill);
            $this->Cell(38,6,utf8_decode($row['fonction']??''),1,0,'L',$fill);
            $this->Cell(23,6,utf8_decode($row['telephone']??''),1,0,'C',$fill);
            $this->Cell(60,6,utf8_decode($row['email']??''),1,1,'L',$fill);
            $fill = !$fill;
        }
    }
}

$pdf = new PDF('p','mm','A4'); // ← Paysage !
$pdf->SetRows($rows); // ← Passe les données
$pdf->AddPage();
$pdf->TableauBureau(); // ← Appelle avec données
$pdf->Output();
exit;

?>