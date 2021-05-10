<?php
session_start();
include_once '../../Models/Adresse.php';
include_once '../../Models/Client.php';
include_once '../../Controllers/AdresseC.php';
include_once '../../Controllers/ClientC.php';

$clientC= new ClientController();
$adresseC = new AdresseController();
$adresses = $adresseC->afficherAdresse();

//include_once('cookieConnect.php');
if (isset($_SESSION['id']))
{
   $client =$clientC->recupererClient($_SESSION['id']);
   $explode = explode(" ",$client['nom']);
   $prenom=$explode[0];
   $nom = $explode[1];
// nv nom
   if (isset($_POST['nv_prenom'] ) && isset($_POST['nv_nom'] ) && !empty($_POST['nv_prenom']) && !empty($_POST['nv_nom']) && $_POST['nv_prenom'] .' ' . $_POST['nv_nom'] != $client['nom']){
    $nvClient = new Client($_POST['nv_prenom'].' ' . $_POST['nv_nom'],$client['email'],$client['mot_de_passe'],$client['telephone'],$client['id_adresse']);
    $clientC->modifierClient($nvClient,$_SESSION['id']);
    echo"1";
    header('Location:index.php?id='.$_SESSION['id']);
   }
   /*
// nv email
   if (isset($_POST['nv_prenom'] ) && isset($_POST['nv_nom'] ) && !empty($_POST['nv_prenom']) && !empty($_POST['nv_nom']) && $_POST['nv_prenom'] .' ' . $_POST['nv_nom'] != $client['nom']){
    $nvClient = new Client($_POST['nv_prenom'].' ' . $_POST['nv_nom'],$client['email'],$client['mot_de_passe'],$client['telephone'],$client['id_adresse']);
    $clientC->modifierClient($nvClient,$_SESSION['id']);
    header('Location:index.php?id=1');
   }
// nv mdp
   if (isset($_POST['nv_prenom'] ) && isset($_POST['nv_nom'] ) && !empty($_POST['nv_prenom']) && !empty($_POST['nv_nom']) && $_POST['nv_prenom'] .' ' . $_POST['nv_nom'] != $client['nom']){
    $nvClient = new Client($_POST['nv_prenom'].' ' . $_POST['nv_nom'],$client['email'],$client['mot_de_passe'],$client['telephone'],$client['id_adresse']);
    $clientC->modifierClient($nvClient,$_SESSION['id']);
    header('Location:index.php?id=1');
   }
   // nv telephone

   if (isset($_POST['nv_prenom'] ) && isset($_POST['nv_nom'] ) && !empty($_POST['nv_prenom']) && !empty($_POST['nv_nom']) && $_POST['nv_prenom'] .' ' . $_POST['nv_nom'] != $client['nom']){
    $nvClient = new Client($_POST['nv_prenom'].' ' . $_POST['nv_nom'],$client['email'],$client['mot_de_passe'],$client['telephone'],$client['id_adresse']);
    $clientC->modifierClient($nvClient,$_SESSION['id']);
    header('Location:index.php?id=1');
   } 

   // nv adresse 
   if (isset($_POST['nv_prenom'] ) && isset($_POST['nv_nom'] ) && !empty($_POST['nv_prenom']) && !empty($_POST['nv_nom']) && $_POST['nv_prenom'] .' ' . $_POST['nv_nom'] != $client['nom']){
    $nvClient = new Client($_POST['nv_prenom'].' ' . $_POST['nv_nom'],$client['email'],$client['mot_de_passe'],$client['telephone'],$client['id_adresse']);
    $clientC->modifierClient($nvClient,$_SESSION['id']);
    header('Location:index.php?id=1');
   }*/


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>CoronArt | Modification Profil</title>

    <!-- Favicon  -->
    <link rel="icon" href="../../public/img/core-img/favicon2.ico">

    

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../../public/css/core-style.css">
    
    <link rel="stylesheet" href="../../public/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css
" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="button.css">

    <!-- Responsive CSS -->
    <link href="../../public/css/responsive.css" rel="stylesheet">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body><?php if(isset($_GET['id'])) {
  include('includes/parametres.php');}?>
   <?php include('includes/wrapperModifierProfil.php') ;?>
   

    <script src="../../public/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../../public/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../../public/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="../../public/js/plugins.js"></script>
    <!-- Active js -->
    <script src="../../public/js/active.js"></script>


     <!-- jQuery (Necessary for All JavaScript Plugins) -->
    

</body>


</html>
<?php
}
else{
header('Location:inscription.php');
}

?>