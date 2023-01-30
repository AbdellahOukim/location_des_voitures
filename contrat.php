<?php
require_once __DIR__ . '/vendor/autoload.php';
include_once("includes/connectDB.php") ;


$id_reservation = $_GET['id'] ;

$query = $conn->prepare("SELECT con.* , cl.* , v.* , mar.*  from contrat con , client cl , voiture v , marque mar
 WHERE con.ID_client = cl.ID_client AND con.Id_vehicule = v.Id_vehicule
AND v.Id_marque = mar.Id_marque AND con.id_reservation = $id_reservation ")  ;

$query->execute() ;
$count = $query->rowCount() ;
$contrat = $query->fetch() ;

if ($count > 0) {

$mpdf = new \Mpdf\Mpdf();
$stylesheet = file_get_contents('template/css/pdf.css');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML("
<h1 class='head'>Contrat de location voiture !</h1>
<div class='row'>
    <strong>Entre : </strong><br>
    <p>la societé <strong> --- </strong> résident dans l'adresse suivant : DR alioua temsia ait melloul </p>
</div>
<div class='row'>
    <strong>Et : </strong><br>
    <p><strong> $contrat[nom] $contrat[prenom] </strong> , avec un permis : $contrat[Num_Permi_de_conduite] </p>
</div>
<h3>EN CONSIDÉRATION DE CE QUI PRÉCÈDE, LES PARTIES CONVIENNENT DE CE QUI SUIT:</h3>
<h4>1. OBJET DU CONTRAT</h4>
<p>Par le présent contrat, le locateur met à disposition du locataire un bien dont la désignation suit
    (ci-après, le 'bien loué') et à qui, il incombe la charge du rendre après s'en être servi. Le locataire
    reconnaît que le locateur ne transfère pas, par le présent contrat, son droit de propriété sur le bien loué.
    Le locataire devra rendre le bien loué dans son état d'origine, compte tenu des dégradations résultant de
    son usage normal.</p>
<h3>2. DÉSIGNATION DU BIEN LOUÉ</h3>
<p>
    Le locateur met à la disposition du locataire le bien suivant :<br>
    Marque: $contrat[Intitule_Marque] <br>
    Modèle: ----- <br>
    Numéro d'immatriculation : $contrat[Immatriculation]  <br>
    année achat: $contrat[annee_achat] <br>
    Puissance moteur: 1200 kw <br>
    Date de première mise en circulation: $contrat[annee_achat] <br>
    Kilométrage : 0 <br>
</p>

<div class='sign'>
<strong>Signature client :  </strong>
</div>

");

$mpdf->Output("contrat.pdf" , "I");

} else {
    echo "eee" ;
}