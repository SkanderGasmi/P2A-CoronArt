<?php  

$cultureController = new CultureController();
$cultures = $cultureController->afficherCultures();
if (!$cultures && isset($_POST['ajouterCulture']) && isset($_POST['culturea']) && !empty($_POST['culturea'])){
            $culture = new Culture($_POST['culturea']) ;
           $cultureController->ajouterCulture($culture);
        }
    $vues = ['imageFace',"imageBack","imageJanoubi"];

        $produitController = new ProduitController();
       $test_ajout_produit=false;

        if (isset($_POST['ajouter']) && isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['description']) && isset($_POST['culture'])){
         // if (!empty($_POST['nom']) && !empty($_POST['prix']) && !empty($_POST['description'])  && !empty($_POST['culture']) ){
            
            // if (!uploadImageProduit($vues)){
              ;
              $produit = new Produit($_POST['nom'],floatval($_POST['prix']),$_POST['description'],intval($_POST['culture'])) ;
              if ($produitController->ajouterProduit($produit)){
              $test_ajout_produit = true ;
              }
              
            //}
            $controle_saisie =true; 
          }
          else{
            $controle_saisie =false; 

          }
              

?>


<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Ajouter un produit</h4>
      <?php
            if ($test_ajout_produit){
              ?>
              <p class="card-description" style="{color:green}"> Produit ajouté avec succes</p>
              <?php
            
            }
            else {
              ?>
              <p class="card-description" style="{color:#FFFFFF;}"> Produit n'a pas ete ajouté avec succes</p>
              <?php

            }
          //}
          //else{

          //}
        
        if(!($controle_saisie)) {
          ?>
              <p class="card-description" style="{color:#FFFFFF;}">Information manquantes</p>
              <?php
          // header('Location:connexion.php');
        }
      
      //}
        //header("Refresh:0; url=page2.php");

        ?>


                    
                    <form class="forms-sample" method="POST" action="ajouterProduit.php" name="formAjouterProduit" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" placeholder="Nom Produit" name ="nom">
                      </div>
                      <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="text" class="form-control" id="prix" placeholder="DT" name ="prix">
                      </div>
                      <!-- boucle for taffichi option radio lees cultures el kol ou houa ycochi culture fehom -->
                      <div class="form-group">
                        <label for="culture">Culture</label>
                        <?php if($cultures){ 
                          ?>
                          <select class="form-control" id="culture" name ="culture">
                            <?php
                          foreach ($cultures as $culture){
                            ?>
            <option value="<?php echo $culture['id_culture']; ?>" ?> <?php echo $culture['nom']; ?></option>
          <?php 
          }
          ?>
          </select>
          <?php
          }
          else{
            ?>
            <div class="input-group col-xs-12">
                          
            <input type="text" class="form-control" id="culture" placeholder="ajouterculture" name ="culturea">
            <span class="input-group-append">
           
                            <input type=submit class="file-upload-browse btn btn-primary" value = Ajouter  name ="ajouterCulture" onClick="window.location.href=window.location.href">
                         
                          </span>
                          </div>
                      
            <?php
            //header("Refresh:3");
            
        }
          ?>
         

                        
                      </div>
                      <div class="form-group">
                        <label>Image Produit Front</label>
                        <input type="file" name="imageFace" class="file-upload-default" id="imageFace">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image produit de face">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Image Produit Back</label>
                        <input type="file" name="imageBack" class="file-upload-default" id="imageBack">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image produit de face">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Image Produit Janoubi</label>
                        <input type="file" name="imageJanoubi" class="file-upload-default" id="imageJanoubi">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image produit de face">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div> 
                     
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="4" name="description"></textarea>
                      </div>
                      <input type="submit"  name="ajouter" id = "ajouter" value="Ajouter" class="btn btn-primary mr-2">
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>

             