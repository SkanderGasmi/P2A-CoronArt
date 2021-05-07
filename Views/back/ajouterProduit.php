<?php

// On prolonge la session
    session_start();
    include '../../Controllers/ProduitC.php';
 
include '../../Controllers/CultureC.php';
include '../../config.php';  
include '../../Models/Produit.php';
include '../../Models/Culture.php';

    if(empty($_SESSION['e']))
    {
        // Si inexistante ou nulle, on redirige vers le formulaire de login
        header('Location:connexion.php');
       }




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
    <link rel="stylesheet" href="../../public/back/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../public/back/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
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
        <?php include 'mainPanelajouterProduits.php';?>
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
    <script src="../../public/back/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
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

  </body>
</html>


   



<?php
 function uploadImageProduit($vues){  
  foreach($vues as $vue){
    $currentDirectory = getcwd();
    $uploadDirectory = "/../../public/back/assets/images/produits/p" . $_POST['nom'] ;
    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed 
    $fileName = $_FILES[$vue]['name'];
    $fileSize = $_FILES[''.$vue.'']['size'];
    $fileTmpName  = $_FILES[''.$vue.'']['tmp_name'];
    $fileType = $_FILES[''.$vue.'']['type'];

    $fileExtension = strtolower(end(explode('.',$fileName)));
    $uploadPath = $currentDirectory . $uploadDirectory  . "/" . $vue . "." . $fileExtension; 
    
    if (isset($_POST['ajouter'])) {
      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
      }
      if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
      }
      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        if (!$didUpload) {
          return false;
          
        } else {
          return false;
        }
      } else {
        return $errors ;
      }
    }
   
  }
  return $uploadDirectory;


  }  
  ?>







