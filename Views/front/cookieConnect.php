<?php

if (!isset($_SESSION['id']) && isset($_COOKIE['email'],$_COOKIE['mdp']) && !empty($_COOKIE['email']) && !empty ($_COOKIE['mdp'])){
     
$client = $clientC->connexionClient($_COOKIE['email'],$_COOKIE['mdp']);
if($client){
    $_SESSION['e'] = $client['nom'];
    $_SESSION['id'] = $client['id'];
    $_SESSION['mdp'] = $client['mot_de_passe'];
      header('Location:index.php');

}
}


?>
