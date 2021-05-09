

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
                        <input type="hidden" name="size" value ="1000000">
                        <input type="file" name="imageFace" class="file-upload-default" id="imageFace">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image produit de face">
                          <span class="input-group-append">
                          <input type="button" class="file-upload-browse btn btn-primary" value="Upload" name="Upload">
                          </span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Image Produit Back</label>
                        <input type="file" name="imageBack" class="file-upload-default" id="imageBack">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image produit Back">
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

             