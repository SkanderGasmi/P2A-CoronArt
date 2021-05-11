<?php
session_start();
include '../../config.php';  
include '../../Controllers/ProduitC.php';
include '../../Controllers/CultureC.php';
include '../../Controllers/ClientC.php';
include '../../Models/Client.php';

$clientC = new ClientController();

include_once('cookieConnect.php');
 
 
if(isset($_GET['id']) && $_GET['id'] > 0) {
   $getid = $_GET['id'];
   $client = $clientC->recupererClient($getid);
}


//pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
//$cultureController = new CultureController();
//$cultures = $cultureController->afficherCultures();
$limit = 3 ;
$start = ($page - 1) * $limit;

$produitController = new ProduitController();
$listeProduits = $produitController->afficherProduits($start,$limit);



$produitsCount = $produitController->ProduitsCount()[0]['id'];
$pages = ceil($produitsCount / $limit);
if ($page > $pages){
   $page = 1 ;
}
else if ($page < 1 )
{
    $page = $pages;
}
 

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
    <title>CoronArt | Home</title>

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

<body><?php if(isset($_SESSION['id'])) {
  include('includes/parametres.php');}?>
   <?php include('includes/wrapper.php') ;?>
   

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

<script>
    $(document).ready(function(){
      $("#searchInput").on("keyup", function() {          
        var value = $(this).val().toLowerCase();
        $("#productsView .col-12").filter(function() {
          $(this).toggle($(this).find(".product-name").text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

</html>