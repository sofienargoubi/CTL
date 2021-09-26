<?php

//
// exemple de facture avec mysqli
// gere le multi-page
// Ver 1.0 THONGSOUME Jean-Paul
//


require 'fpdf/fpdf.php';


// le mettre au debut car plante si on declare $mysqli avant !
$pdf = new FPDF( 'P', 'mm', 'A4' );

// on declare $mysqli apres !
$mysqli = new mysqli('localhost', 'root', '', 'Web');
// cnx a la base
mysqli_select_db($mysqli, 'Web') or die('Erreur de connection à la BDD : ' .mysqli_connect_error());
// FORCE UTF-8
//    mysqli_query($mysqli, "SET NAMES UTF8");


$var_id_facture = $_GET['id'];

// on sup les 2 cm en bas
$pdf->SetAutoPagebreak(False);
$pdf->SetMargins(0,0,0);

// nb de page pour le multi-page : 18 lignes
$sql = 'select count(*) FROM facture where ID_Commande=' .$var_id_facture;
$result = mysqli_query($mysqli, $sql)  or die ('Erreur SQL : ' .$sql .mysqli_connect_error() );
$row_client = mysqli_fetch_row($result);
mysqli_free_result($result);
$nb_page = $row_client[0];
$sql = 'select abs(FLOOR(-' . $nb_page . '/18))';
$result = mysqli_query($mysqli, $sql)  or die ('Erreur SQL : ' .$sql .mysqli_connect_error() );
$row_client = mysqli_fetch_row($result);
mysqli_free_result($result);
$nb_page = $row_client[0];

$num_page = 1; $limit_inf = 0; $limit_sup = 18;

While ($num_page <= $nb_page)
{
    $pdf->AddPage();

    // logo : 80 de largeur et 55 de hauteur
    $pdf->Image('img/logo.png', 10, 10, 80, 55);

    // n° page en haute à droite
    $pdf->SetXY( 120, 5 ); $pdf->SetFont( "Arial", "B", 12 ); $pdf->Cell( 160, 8, $num_page . '/' . $nb_page, 0, 0, 'C');

    // n° facture, date echeance et reglement et obs
    $select = 'select Date_Creation,ID_Commande FROM commande where ID_Commande=' .$var_id_facture;
    $result = mysqli_query($mysqli, $select)  or die ('Erreur SQL : ' .$select .mysqli_connect_error() );
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);

    $champ_date = date_create($row[0]); $annee = date_format($champ_date, 'Y');
    $num_fact = "FACTURE N° " . $annee .'-' . str_pad($row[1], 4, '0', STR_PAD_LEFT);
    $pdf->SetLineWidth(0.1); $pdf->SetFillColor(192); $pdf->Rect(120, 15, 85, 8, "DF");
    $pdf->SetXY( 120, 15 ); $pdf->SetFont( "Arial", "B", 12 ); $pdf->Cell( 85, 8, $num_fact, 0, 0, 'C');

    // nom du fichier final
    $nom_file = "fact_" . $annee .'-' . str_pad($row[1], 4, '0', STR_PAD_LEFT) . ".pdf";

    // date facture
    $champ_date = date_create($row[0]); $date_fact = date_format($champ_date, 'd/m/Y');
    $pdf->SetFont('Arial','',11); $pdf->SetXY( 122, 30 );
    $pdf->Cell( 60, 8, "Tunis, le " . $date_fact, 0, 0, '');

    // si derniere page alors afficher total
    if ($num_page == $nb_page)
    {
        // les totaux, on n'affiche que le HT. le cadre après les lignes, demarre a 213

        // HT, la TVA et TTC sont calculés après
        // en bas à droite

        // trait vertical cadre totaux, 8 de hauteur -> 213 + 8 = 221
        $pdf->Rect(5, 213, 200, 8, "D"); $pdf->Line(95, 213, 95, 221); $pdf->Line(158, 213, 158, 221);

        // reglement
        // echeance
        $champ_date = date_create($row[0]); $date_ech = date_format($champ_date, 'd/m/Y');
        $pdf->SetXY( 5, 230 ); $pdf->Cell( 38, 5, "Date Echeance :", 0, 0, 'R'); $pdf->Cell( 38, 5, $date_ech, 0, 0, 'L');
    }

    // observations
    $pdf->SetFont( "Arial", "BU", 10 ); $pdf->SetXY( 5, 75 ) ; $pdf->Cell($pdf->GetStringWidth("Observations"), 0, "Observations", 0, "L");


    // adr fact du client
    $select = 'select * FROM detail_commande where ID_Commande=' .$var_id_facture;;
    $result = mysqli_query($mysqli, $select)  or die ('Erreur SQL : ' .$select .mysqli_connect_error() );
    $row_client = mysqli_fetch_row($result);
    mysqli_free_result($result);
    $pdf->SetFont('Arial','B',11); $x = 110 ; $y = 50;
    $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8, $row_client[6], 0, 0, ''); $y += 4;
    if ($row_client[1]) { $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8, $row_client[1], 0, 0, ''); $y += 4;}
    if ($row_client[2]) { $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8, $row_client[2], 0, 0, ''); $y += 4;}
    if ($row_client[3]) { $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8, $row_client[3], 0, 0, ''); $y += 4;}
    if ($row_client[4] || $row_client[5]) { $pdf->SetXY( $x, $y ); $pdf->Cell( 100, 8, $row_client[4] . ' ' .$row_client[5] , 0, 0, ''); $y += 4;}


    // ***********************
    // le cadre des articles
    // ***********************
    // cadre avec 18 lignes max ! et 118 de hauteur --> 95 + 118 = 213 pour les traits verticaux
    $pdf->SetLineWidth(0.1); $pdf->Rect(5, 95, 200, 118, "D");
    // cadre titre des colonnes
    $pdf->Line(5, 105, 205, 105);
    // les traits verticaux colonnes
    $pdf->Line(145, 95, 145, 213);$pdf->Line(187, 95, 187, 213);
    // titre colonne
    $pdf->SetXY( 1, 96 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 140, 8, "Livre", 0, 0, 'C');
    $pdf->SetXY( 145, 96 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 13, 8, "Qte", 0, 0, 'C');
    $pdf->SetXY( 185, 96 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 22, 8, "SubTotal", 0, 0, 'C');

    // les articles
    $pdf->SetFont('Arial','',8);
    $y = 97;
    // 1ere page = LIMIT 0,18 ;  2eme page = LIMIT 18,36 etc...
    $sql = 'select Nom_Produit,Qty_Produit,Prix_Produit FROM facture where ID_Commande=' .$var_id_facture;
    $sql .= ' LIMIT ' . $limit_inf . ',' . $limit_sup;
    $res = mysqli_query($mysqli, $sql)  or die ('Erreur SQL : ' .$sql .mysqli_connect_error() );
    while ($data =  mysqli_fetch_assoc($res))
    {
        // libelle
        $pdf->SetXY( 7, $y+9 ); $pdf->Cell( 140, 5, $data['Nom_Produit'], 0, 0, 'L');
        // qte
        $pdf->SetXY( 145, $y+9 ); $pdf->Cell( 13, 5, strrev(wordwrap(strrev($data['Qty_Produit']), 3, ' ', true)), 0, 0, 'R');
        // total
        $nombre_format_francais = number_format($data['Prix_Produit']*$data['Qty_Produit'], 2, ',', ' ');
        $pdf->SetXY( 187, $y+9 ); $pdf->Cell( 18, 5, $nombre_format_francais, 0, 0, 'R');

        $pdf->Line(5, $y+14, 205, $y+14);

        $y += 6;
    }
    mysqli_free_result($res);

    // si derniere page alors afficher cadre des TVA
    if ($num_page == $nb_page)
    {
        // le detail des totaux, demarre a 221 après le cadre des totaux
        $pdf->SetLineWidth(0.1); $pdf->Rect(130, 221, 75, 24, "D");
        // les traits verticaux

        // les traits horizontaux pas de 6 et demarre a 221
        $pdf->Line(130, 227, 205, 227);
        // les titres
        $pdf->SetFont('Arial','B',8); $pdf->SetXY( 181, 221 ); $pdf->Cell( 24, 6, "TOTAL", 0, 0, 'C');
        $pdf->SetFont('Arial','',8);

        // les taux de tva et HT et TTC
        $col_ht = 0; $col_tva = 0; $col_ttc = 0;
        $taux = 0; $tot_tva = 0; $tot_ttc = 0;
        $x = 130;
        $sql = 'select Prix_Produit,sum( round(Prix_Produit * Qty_Produit,2) ) as tot_ht FROM facture where ID_Commande=' .$var_id_facture;
        $res = mysqli_query($mysqli, $sql)  or die ('Erreur SQL : ' .$sql .mysqli_connect_error() );
        while ($data =  mysqli_fetch_assoc($res))
        {

            $taux = $data['Prix_Produit'];




$total=$data['tot_ht'];
            $x += 17;
        }
        mysqli_free_result($res);

        // en bas à droite
        $pdf->SetFont('Arial','B',8); $pdf->SetXY( 181, 233 ); $pdf->Cell( 24, 6, number_format($total, 2, ',', ' '), 0, 0, 'R');
    }

    // **************************
    // pied de page
    // **************************
    $pdf->SetLineWidth(0.1); $pdf->Rect(5, 260, 200, 6, "D");
    $pdf->SetXY( 1, 260 ); $pdf->SetFont('Arial','',7);
    $pdf->Cell( $pdf->GetPageWidth(), 7, "Jamais Sans mon livre .", 0, 0, 'C');

    $y1 = 270;
    //Positionnement en bas et tout centrer
    $pdf->SetXY( 1, $y1 ); $pdf->SetFont('Arial','B',10);


    $pdf->SetFont('Arial','',10);

    $pdf->SetXY( 1, $y1 + 4 );
    $pdf->Cell( $pdf->GetPageWidth(), 5, "Centre Tunisien Du Livre", 0, 0, 'C');

    $pdf->SetXY( 1, $y1 + 8 );
    $pdf->Cell( $pdf->GetPageWidth(), 5, "Passage,6080,Tunis", 0, 0, 'C');

    $pdf->SetXY( 1, $y1 + 12 );
    $pdf->Cell( $pdf->GetPageWidth(), 5, "53925295,CTL@CTL.com", 0, 0, 'C');

    $pdf->SetXY( 1, $y1 + 16 );
    $pdf->Cell( $pdf->GetPageWidth(), 5, "www.CTL.com", 0, 0, 'C');

    // par page de 18 lignes
    $num_page++; $limit_inf += 18; $limit_sup += 18;
}

$pdf->Output("I", $nom_file);
?>