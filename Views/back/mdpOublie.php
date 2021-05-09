<?php
session_start();
include_once '../../Config.php';
include_once '../../Models/Client.php';
include_once '../../Controllers/ClientC.php';
$message="";
$clientC = new ClientController();
if ( isset($_GET['section']))  {
    $section = htmlspecialchars($_GET['section']);
}
else
{
    $section = "" ;
}

if(isset($_POST['recup_submit'],$_POST['recup_mail'])) {
    if (!empty($_POST['recup_mail']) ){
        $recup_mail = htmlspecialchars($_POST['recup_mail']);
                        // validation email forme correcte

          $admin = $clientC->recupereAdminParEmail($_POST['recup_mail']);
          if ($admin){
            $pseudo = $admin['nom'];
            $_SESSION['recup_mail'] = $recup_mail;
            //code de recuperation
            $recup_code = "";
            for($i=0; $i < 8; $i++) { 
               $recup_code .= mt_rand(0,9);
            }
            if (!$clientC->mail_recup_exist($recup_mail)){
                $clientC->recup__code_insert($recup_mail,$recup_code);
            }
            else {
                $clientC->recup__code_update($recup_mail,$recup_code);
            }
            $header="MIME-Version: 1.0\r\n";
            $header.='From:"Coronart.support"<support@coronart.com>'."\n";
            $header.='Content-Type:text/html; charset="utf-8"'."\n";
            $header.='Content-Transfer-Encoding: 8bit';
            $message = '
            <html>
            <head>
              <title>Récupération de mot de passe - Votresite</title>
              <meta charset="utf-8" />
            </head>
            <body>
              <font color="#303030";>
                <div align="center">
                  <table width="600px">
                    <tr>
                      <td>
                        
                        <div align="center">Bonjour <b>'.$pseudo.'</b>,</div>
                        Voici votre code de récupération: <b>'.$recup_code.'</b>
                        
                      </td>
                    </tr>
                    <tr>
                      <td align="center">
                        <font size="2">
                          Ceci est un email automatique, merci de ne pas y répondre
                        </font>
                      </td>
                    </tr>
                  </table>
                </div>
              </font>
            </body>
            </html>
            ';
            mail($recup_mail, "Récupération de mot de passe - CoronArt", $message, $header);
            header("Location:mdpOublie.php?section=code");
            $message = ' <p class="sign-up" style ="color:green;">Verifier votre mail</p><hr /> ' ;
        }
        else{
            $message = 'Cet adresse Email n\est pas enregistré!';
        }
    }
    else{
        $message = 'Missing information!';
    }
}

if(isset($_POST['code_submit'],$_POST['code_verif'])) {
    if (!empty($_POST['code_verif']) ){
        $verif_code = htmlspecialchars($_POST['code_verif']);
        $verif = $clientC->recup_code_read($_SESSION['recup_mail'],$verif_code);
        if($verif['code'] ==$verif_code) {
            header('Location:mdpOublie.php?section=changemdp');
        }
        else {
            $message = "Code invalide";
        }
    }
    else{
        $message = 'Veulliez entrer votre code de verification!';
    }
}

if(isset($_POST['change_submit'])) {
    if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {
        if(!empty($_POST['change_mdp'])&&!empty($_POST['change_mdpc'])) {
            $mdp = htmlspecialchars($_POST['change_mdp']);
            $mdpc = htmlspecialchars($_POST['change_mdpc']);
            if(!empty($mdp) && !empty($mdpc)) {
                if($mdp == $mdpc) {
                    $clientC->changer_mdp($_SESSION['recup_mail'],$mdp);
                    $clientC->supprimer_code($_SESSION['recup_mail']);
                    session_destroy();
                    header('Location:connexion.php');
                }
                else {
                    
                    $message = "Vos mots de passes ne correspondent pas";
                }
            }
        }
        else {
            $message = "Veuillez remplir tous les champs";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CoronArt Admin | Mot de Passe Oublié</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../public/back/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../public/back/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../public/back/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../public/img/core-img/favicon2.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Mot de Passe Oublié?</h3>
                
                <?php if ($section == 'code') { ?>
                    <form method="POST" action="">
                
                <div class="form-group">
                    <label>Code de verification envoye a <?= $_SESSION['recup_mail']?>*</label><br /> <br />
                    <input type="text" class="form-control p_input"  name="code_verif" id ="code">
                  </div>
                  <p class="sign-up" style ="color:red;"><?php if($message!="") { echo $message; } ?></p><hr /> 
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn col-6" name="code_submit">Récupérer</button>
                  </div>
                 
                </form>
                <?php }  elseif ($section == "changemdp") { ?>


                    <form method="POST" action="">
                
                <div class="form-group">
                    <label>Nouveau mot de passe pour <?= $_SESSION['recup_mail'] ?></label>
                    <input type="password" class="form-control p_input"   placeholder="Nouveau mot de passe" name="change_mdp" >
                  </div>
                  <div class="form-group">
                    <label>Confirmer</label>
                    <input type="password" class="form-control p_input" placeholder="Confirmation du mot de passe" name="change_mdpc">
                  </div>
                  <p class="sign-up" style ="color:red;"><?php if($message!="") { echo $message; } ?></p><hr /> 
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn col-6" name="change_submit">Changer mot de passe</button>
                  </div>
                 
                </form>
<?php }
else {

                 
                    ?>
                   
                        
                <form method="POST" action="">
                
                <div class="form-group">
                    <label>Email *</label>
                    <input type="mail" class="form-control p_input"  name="recup_mail" >
                  </div>
                  <p class="sign-up" style ="color:red;"><?php if($message!="") { echo $message; } ?></p><hr /> 
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn col-6" name="recup_submit">Récupérer</button>
                  </div>
                 
                </form>
               <?php }?>
              
                        
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../public/back/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../public/back/assets/js/off-canvas.js"></script>
    <script src="../../public/back/assets/js/hoverable-collapse.js"></script>
    <script src="../../public/back/assets/js/misc.js"></script>
    <script src="../../public/back/assets/js/settings.js"></script>
    <script src="../../public/back/assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>


