<div class="catagories-side-menu">
        <!-- Close Icon -->
        <div id="sideMenuClose">
            <i class="ti-close"></i>
        </div>
        <!--  Side Nav  -->
        <div class="nav-side-menu">
            <div class="menu-list">
                <h6>Parametres</h6>
                <?php
            

$clientC = new ClientController();
   $client =$clientC->recupererClient($_SESSION['id']);
if (isset($_FILES['pdp']) && !empty($_FILES['pdp']['name'])){
  
$taille_max = 2097152;// 2Mb environ
$extensions_valides = ['jpg','jpeg','png','gif'];
if ($_FILES['pdp']['size'] < $taille_max){
$extension_upload = strtolower(substr(strrchr($_FILES['pdp']['name'],'.'),1)) ; // a voir documentation
if (in_array($extension_upload,$extensions_valides)){
$chemin_upload = '../../public/img/clients/pdp/' . $_SESSION['id'] . '.' . $extension_upload ;
$resultat_upload = move_uploaded_file($_FILES['pdp']['tmp_name'],$chemin_upload);
if($resultat_upload){
     // update client 
 $nvClient = new Client($client['nom'],$client['email'],$client['mot_de_passe'],$client['telephone'],$client['id_adresse'],$chemin_upload);
$clientC->modifierClient($nvClient,$_SESSION['id']);
//header("Refresh:0");

}
else{
 $msg = 'erreur durant l\'upload de la photo de profil';
}



}
else{
$msg = 'la photo de profil doit etre d\'extension png, jpg, jpeg ou png';

}




}
else {
$msg = 'taille max 2Mb';
}
}

                                    if(!empty($client['pdp'])){
            ?>
            <div class="product-img">
                                    
            <img src="<?php echo $client['pdp'];?>"/>
                                    <div class="product-quicview">
                                        <a  href="#" onclick="$('#pdp').trigger('click'); "><i class="ti-user"></i></a>
                                        <form action="#" method="POST" id="form" enctype="multipart/form-data">
                                        <input type="file" onchange ="$('#form').submit();" id="pdp" value="" name="pdp" style="display:none;" >
                                       
                                    </form>
                                    </div>
                                </div>
            <?php
        }
        else{
            ?>
            <div class="product-img">
                                    
            <img src="<?php echo "../../public/img/clients/pdp/noPdp.png";?>"/>
                                    <div class="product-quicview">
                                        <a  href="#" onclick="$('#pdp').trigger('click'); "><i class="ti-user"></i></a>
                                        <form action="#" method="POST" id="form" enctype="multipart/form-data">
                                        <input type="file" onchange ="$('#form').submit();" id="pdp" value="" name="pdp" style="display:none;" >
                                       
                                    </form>
                                    </div>
                                </div>
            <?php

        }
        ?>


                <ul id="menu-content" class="menu-content ">
                    
                    <!-- Single Item -->
                    <li>
                        
                        <a href="modifierProfil.php">Modifier mon compte </a>
                        <a href="mupprimerProfil.php">desactiver mon compte </a>
                        <a href="deconnexion.php">Deconnexion </a>  
                                                
                    </li>
                    
                    
                </ul>
            </div>
        </div>
    </div>