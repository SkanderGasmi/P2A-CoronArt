<?php

if (!isset($_SESSION['id']) && isset(cookie['email'],cookie['mdp'] && !empty(cookie['email']) && !empty (cookie['mdp'])){
     
$client = $clientC->connexionClient(cookie['email'],cookie['mdp']);
if($client){
    $_SESSION['e'] = $client['nom'];
    $_SESSION['id'] = $client['id'];
    $_SESSION['mdp'] = $client['mot_de_passe'];
      header('Location:index.php');

}

?>
