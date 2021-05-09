<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Recherche par culture</h4>
      <p class="card-description"> You can filter multiple culture choices </p>
      <form class="forms-sample" action="" method="POST" name ="form[]" enctype="multipart/form-data">
        <div class="form-group">
          <label class="sr-only" for="selectculture">Recherche par culture</label>
          <select name="culture[]" id="culture" class="js-example-basic-multiple form-control mb-2 mr-sm-2"  style="width:100%" multiple="multiple">
          <?php
          foreach ($cultures as $culture){
          ?>
            <option value="<?php echo $culture['id_culture'] ;?>"  ><?php echo $culture['nom']; ?></option>
          <?php 
          }
          ?>
          </select>
        </div>
        <input type="submit"  name="recherche" id = "recherche" value="Recherche" class="btn btn-primary mr-2">
      </form>
    </div>
  </div>
</div>
     <!--afficher produits -->
<?php 

  if (isset($_POST['culture']) && isset($_POST['recherche'])){
    
    $listeProduitsCulture = [];
    
    
   foreach ($_POST['culture'] as $id){
      $listeProduitsCulture[] =  $cultureController->afficherProduits($id);
      
    }
    foreach($listeProduitsCulture as $produitParCulture){ ?>
    
            <?php 
            foreach($produitParCulture as $produit){
              
               ?>
            <div class="col-md-6 col-xl-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <!--afficher image produit caroussel (vue de face vue de dessus ..-->
                  <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
                    <div class="item">
                      <img src="../../public/back/assets/images/produits/<?php echo $produit['image'];?>/face.jpg" alt="">
                    </div>
                    <div class="item">
                      <img src="../../public/back/assets/images/produits/<?php echo $produit['image'];?>/arriere.jpg" alt="">
                    </div>
                    <div class="item">
                      <img src="../../public/back/assets/images/produits/<?php echo $produit['image'];?>/janoubi.jpg" alt="">
                    </div>
                  </div>
                        <div class="d-flex py-4">
                          <div class="preview-list w-100">
                            <div class="preview-item p-0">
                              <div class="preview-item-content d-flex flex-grow">
                                <div class="flex-grow">
                                  <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                    <h6 class="preview-subject"><?php echo $produit['nom']; ?></h6>
                                    <p class="text-muted text-small"><?php echo $produit['prix']; ?>DT</p>
                                  </div>
                                  <p class="text-muted"><?php echo $produit['description']; ?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      
                      </div>
                    </div>
                  </div>

                  <?php
                        }
                        
                        }
                       
                        }
                        else{
                        ?>








    <?php
        foreach ($listeProduits as $produit ){
        
    ?>
    <div class="col-md-6 col-xl-4 grid-margin stretch-card">
    
    <div class="card">
      <div class="card-body">
    
     
             
         <!--afficher image produit caroussel (vue de face vue de dessus ..-->
      <div class="owl-one owl-carousel owl-theme    owl-drag">
        <?php $vues = ['imageFace',"imageBack","imageJanoubi"];
        $src = "../../public/img/product-img/".$produit['nom'];
      
           foreach ($vues as $vue) {
             $file = $src . '/' . $vue;
            if (file_exists($file) ){
              ?>

              <div class="item" >  <img src="<?=$file?>" alt=""></div>

              <?php
    

             
            }
       
    }
?>
  
</div>
        <div class="d-flex py-4">
          <div class="preview-list w-100">
            <div class="preview-item p-0">
              <div class="preview-item-content d-flex flex-grow">
                <div class="flex-grow">
                  <div class="d-flex d-md-block d-xl-flex justify-content-between">
                    <h6 class="preview-subject"><?php echo $produit['nom'];?></h6>
                    <p class="text-muted text-small"><?php echo $produit['prix'];?>DT</p>
                  </div>
                  <p class="text-muted"><?php echo $produit['description'];?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-inline">
        <form action ="supprimerProduit.php" method="POST">
          <input type=text name="idSupprimer" value="<?php echo $produit['id'] ?>" hidden/>
        <input type="submit"  name="supprimer"  id = "supprimer" value="supprimer" class="btn btn-primary mr-2">
        </form>
        <form action ="modifierProduit.php" method="GET">
        <input type=text name="idModifier" value="<?php echo $produit['id'] ?>" hidden/>
        <input type="submit"  name="modifier" id = "modifier" value="modifier" class="btn btn-primary mr-2">
        </form>
        </div>
       
      </div>
    </div>
  </div>

  <?php
        }
      }
      
   ?>


        