<?php
    
    // On prolonge la session
    session_start();
    if(empty($_SESSION['e']))
    {
        // Si inexistante ou nulle, on redirige vers le formulaire de login
        header('Location:connexion.php');
       }
include '../../config.php';  

include '../../Controllers/ProduitC.php';
include '../../Controllers/CultureC.php';

$cultureController = new CultureController();
$cultures = $cultureController->afficherCultures();


$produitController = new ProduitController();
$listeProduits = $produitController->afficherProduitsAll();






?>










<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Corona Admin</title>


    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../public/back/assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../public/back/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">



<!-- plugins:css -->
    <link rel="stylesheet" href="../../public/back/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../public/back/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
<!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../public/back/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../public/back/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
<!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../public/back/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../public/back/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
       <?php include 'sidebar.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <?php include 'navbar.php'; ?> 
        <!-- partial -->
        <?php include 'mainPanelProduits.php';?>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
    <!-- plugins:js -->
    <script src="../../public/back/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../public/back/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../public/back/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../public/back/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../public/back/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="owlcarousel/jquery.min.js"></script>
<script src="owlcarousel/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../public/back/assets/js/off-canvas.js"></script>
    <script src="../../public/back/assets/js/hoverable-collapse.js"></script>
    <script src="../../public/back/assets/js/misc.js"></script>
    <script src="../../public/back/assets/js/settings.js"></script>
    <script src="../../public/back/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../public/back/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
     <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../public/back/assets/vendors/select2/select2.min.js"></script>
    <script src="../../public/back/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
 
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../public/back/assets/js/file-upload.js"></script>
    <script src="../../public/back/assets/js/typeahead.js"></script>
    <script src="../../public/back/assets/js/select2.js"></script>

    <script>
   $(document).ready(function(){
    $('.owl-one').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    
});
    
    
    </script>

  </body>
</html>


   











