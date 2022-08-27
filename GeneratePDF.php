<?php
require('fpdf184\fpdf.php');

class PDF extends FPDF
{

// En-tête
function Header()
{
    // Logo 1
    $this->Image('logo1.png',10,4,40);
    // Logo 2
    $this->Image('logo2.png',165,12,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(60);
    // Titre
    $this->Cell(70,20,'Feuilles emargement 2022/2023',0,0,'C');
    // Saut de ligne
    $this->Ln(20);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

// Chargement des données
function LoadData()
{
    $id_doc = $_GET['document'];
    $link = mysqli_connect("localhost","root","","web p2") or die("Erreur");
	$db = new mysqli("localhost","root","","web p2") or die("Erreur");
	$sql="SELECT *
	FROM utilisateur,signature
	WHERE utilisateur.ID_UTILISATEUR = signature.ID_UTILISATEUR
	AND utilisateur.ID_ROLE = 1
	AND signature.ID_DOCUMENT = $id_doc";
	$result= mysqli_query($db,$sql)or die('Erreur: '.mysqli_error());

    $data = array();
    while ($row=mysqli_fetch_assoc($result))
        {
        	$data[] = array($row['NOM'],$row['PRENOM'],$row['VALID']);
        }
    return $data;
}

// Tableau coloré
function FancyTable($header, $data)
{
    // Couleurs, épaisseur du trait et police grasse
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // En-tête
    $w = array(65, 65, 55);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauration des couleurs et de la police
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Données
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2],0,',',' '),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Trait de terminaison
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
$pdf->SetTitle("Feuilles emargement");
$pdf->AliasNbPages();
// Titres des colonnes
$header = array('Nom', 'Prenom','Signature');
// Chargement des données
$data = $pdf->LoadData();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output('','Feuilles emargement.pdf');

?>