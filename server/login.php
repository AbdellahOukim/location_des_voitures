<?php
session_start() ;
include_once('../includes/connectDB.php') ;
$login = $_POST['email'] ;
$password = $_POST['password'] ;

if (!empty($login) && !empty($password)) {


    $query = $conn->prepare("SELECT * FROM utilisateur WHERE Mot_de_passe = '$password' AND email like '$login' ") ;
    $query->execute()  ;
    $count = $query->rowCount() ;

    if ($count > 0) {
        $result = $query->fetch() ;
        print_r(json_encode(["err" => false , "content" => "" ])) ;
        $_SESSION["id"] =  $result['ID_user'] ;
    }else {
        print_r(json_encode(["err" => true , "content" => "Email ou mot de passe incorrect !" ])) ;
    }

}


