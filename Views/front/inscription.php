<?php
session_start();
include_once '../../Models/Adresse.php';
include_once '../../Models/Client.php';
include_once '../../Controllers/AdresseC.php';
include_once '../../Controllers/ClientC.php';

$clientC= new ClientController();
$adresseC = new AdresseController();
$adresses = $adresseC->afficherAdresse();
$succesInscription =false  ;
$exists=false;



if (isset($_POST['creer_compte']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['motDePasseConfirm']) && isset($_POST['motDePasse']) && isset($_POST['telephone'])&& isset($_POST['code_postal']) && isset($_POST['rue']) && isset($_POST['ville']) && (isset($_POST['pays'])||isset($_POST['pays-choice'])) ){
    
    if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['motDePasse'])  && !empty($_POST['telephone']) && !empty($_POST['code_postal']) && !empty($_POST['rue']) && !empty($_POST['ville']) && (!empty($_POST['pays']) || !empty($_POST['pays-choice']))){
        if($clientC->existEmail($_POST['email']))
        {
            $exists =true;
            
        }
        else{
            $adresse = new Adresse(intval($_POST['code_postal']),$_POST['rue'], $_POST['ville'],$_POST['pays-choice']);
            if($adresseC->recupererIdAdresse($adresse)){
            $id = get_object_vars($adresseC->recupererIdAdresse($adresse))['id'];
            }
            else{
                $adresseC->ajouterAdresse($adresse);
                $id = get_object_vars($adresseC->recupererIdAdresse($adresse))['id'];
            }
            $client = new Client($_POST['prenom'].' '.$_POST['nom'], $_POST['email'],$_POST['motDePasse'],intval($_POST['telephone']),$id);
            if ($clientC->ajouterClient($client)){
                $succesInscription= true;
            }
        }
    }
}




$message="";
$testConnexion = 0;

if (isset($_POST['email']) && isset($_POST['motDePasse']) ){
        if (!empty($_POST['email']) && !empty($_POST['motDePasse']) ){
          $client = $clientC->connexionClient($_POST['email'],$_POST['motDePasse']);
            if($client){
              
              $_SESSION['e'] = $client['nom'];
              $_SESSION['id'] = $client['id'];
                header('Location:index.php');
            }
            else{
              $testConnexion = 2;
            }
            
        
      }
      else {
        $testConnexion = 1;
      }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags must come first in the head; any other head content must come after these tags -->

    <!-- Title  -->
    <title>CoronArt | Inscription / Connexion</title>

    <!-- Favicon  -->
    <link rel="icon" href="../../public/img/core-img/favicon2.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../../public/css/core-style.css">
    <link rel="stylesheet" href="../../public/style.css">

    <!-- Responsive CSS -->
    <link href="../../public/css/responsive.css" rel="stylesheet">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>
   <?php include('includes/parametres.php');?>
   <?php include('includes/wrapperInscription.php') ;?>

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="../../public/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../../public/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../../public/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="../../public/js/plugins.js"></script>
    <!-- Active js -->
    <script src="../../public/js/active.js"></script>
    <script src="../../public/js/formulaireInscription.js"></script> 

</body>

</html>