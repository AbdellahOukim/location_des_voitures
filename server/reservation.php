<?php
session_start() ;
include_once('../includes/connectDB.php') ;

// user infos

$id = intval($_SESSION['id']) ;
$query = $conn->prepare("SELECT * FROM utilisateur WHERE ID_user = $id  ") ;
$query->execute() ;
$user = $query->fetch() ;

// voiture infos

$id_voiture = $_POST['id_voiture'] ;
$query_car = $conn->prepare("SELECT * FROM voiture WHERE Id_vehicule = $id_voiture ") ;
$query_car->execute() ;
$car = $query_car->fetch() ;

// client infos

$nom_client = $user['Nom_user'] ;
$prenom_client = $user['Prenom_user'] ;
$email_client = $user['email'];
$tel_client = $user['tel'];
$passport_client = $_POST['passport'] ;
$permis_client = $_POST['permis'] ;
$date_valide = $_POST['date-valide'] ;
$id_ville = intval($_POST['ville']);
$login = $user['email'];
$mot_de_passe = $user['Mot_de_passe'] ;

// reservation info 

$date_debut = $_POST['date-start'] ;
$date_fin = $_POST['date-end'] ;
$prix_jour = $car['en_promotion'] == 1 ? $car['prix_Promotion'] : $car['prix_parJour'] ;


// insert the client 

if 
(!empty($date_debut) && !empty($date_fin) && 
 !empty($id_ville) && !empty($permis_client) && $date_valide  ) {
 if (empty($passport_client)) {
    $passport_client = null ;
 }
//  insert into table client 

 $insert_client = $conn->prepare("INSERT INTO `client`(`ID_client`, `nom`, `prenom`, `email`, `tel`,`Num_Passeport`, `Num_Permi_de_conduite`, `date_validite`,
  `id_ville`, `Login`, `Mot_de_passe`) 
  VALUES (null,'$nom_client','$prenom_client','$email_client',
  '$tel_client','$passport_client','$permis_client','$date_valide',$id_ville,'$login','$mot_de_passe')") ;
 $insert_client->execute() ;
 $count = $insert_client->rowCount() ;

 if ($count > 0) {
    // insert reservation 

    $reserve_quey = $conn->prepare("INSERT INTO `reservation`(`id_reservation`, `ID_client`, `Id_vehicule`, `date_Reservation`, `DateDebutR`,
     `DateFinR`, `PrixParJour`, `remarque`, `Id_EtatRes`) 
     VALUES (null,null,$id_voiture,null,'$date_debut',
     '$date_fin','$prix_jour',null,null)") ;
    $reserve_quey->execute() ;
    $count_res = $reserve_quey->rowCount() ;

    if ($count_res > 0){
        print_r(json_encode(["err" => false , "content" => "" ])) ;
    } else {
        print_r(json_encode(["err" => true , "content" => "Merci de ressayer ! " ])) ;
    }

 } else {
    print_r(json_encode(["err" => true , "content" => "Echoue merci de ressayer  !" ])) ;
 }


} else {
    print_r(json_encode(["err" => true , "content" => " Tous le champs * est obligatoire !" ])) ;
}