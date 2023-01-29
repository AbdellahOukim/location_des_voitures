<?php
include_once('../includes/connectDB.php') ;

  $nom = $_POST['nom'] ;
  $prenom = $_POST['prenom'] ;
  $tel = $_POST['tel'] ;
  $email = $_POST['email'] ;
  $password = $_POST['password'] ;
  $con_password = $_POST['re-password'] ;

  if (!empty($nom) && !empty($prenom) && !empty($tel) && !empty($email) && !empty($password) && !empty($con_password))
  {
    // check if the passwords matches 

    if ($password === $con_password){

        // check if exist or not
        $query_check = $conn->prepare("SELECT * FROM utilisateur WHERE email like '$email' ") ;
        $query_check->execute() ;
        $count_check = $query_check->rowCount() ;
        if ($count_check > 0) {
            print_r(json_encode(["err" => true , "content" => "Il exist un utilisateur avec ce email !" ])) ;
        }
        else {
            // insert new user
            $query_insert = $conn->prepare("INSERT INTO `utilisateur`(`ID_user` , `Nom_user`, `Prenom_user`, `tel`, `email`, `login`, `Mot_de_passe`, `Id_Type_user`) VALUES ( Null ,'$nom','$prenom','$tel','$email','$email','$password', '2') ") ;
            $query_insert->execute() ;
            $count_insert = $query_insert->rowCount() ;
            if ($count_insert > 0) {
                print_r(json_encode(["err" => false , "content" => "Success" ])) ;
            } else {
                print_r(json_encode(["err" => true , "content" => "Error !" ])) ;
            }
    }

    } else {
        print_r(json_encode(["err" => true , "content" => "incorrect mot de passe " ])) ;
    }

} else {
    print_r(json_encode(["err" => true , "content" => "required" ])) ;
}




?>