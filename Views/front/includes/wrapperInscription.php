<div id="wrapper">
        <!-- **** Header Area  **** -->
        <?php include('header.php') ;?>  
        <!-- **** Hero Area  **** -->
        <div class="checkout_area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class=" col-12 col-md-6">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="cart-page-heading">
                                <h5>Inscription</h5>
                                <div id ="erreur"> 
                                    <p>-La longuer de tous les champs doit depasser 5 caracteres (sauf le code postal exactement 4)  </p>
                                    <p>-l'adresse e-mail doit etre sous cette forme : prenom.nom@esprit.tn  </p>
                                    <p>-le numero doit comporter 8 chiffres exactes sinon 13 s'il commence par 00216 </p>
                                    <?php if ($exists){
                                    echo '<p> cette adresse email existe deja <a href="Connexion.php">voulez vous s\'y connecter avec?</a></p>' ;
                                    } 
                                    else{
                                        if($succesInscription == true)
                                        { 
                                            echo'<p> Votre compte a eté crée <a href="Connexion.php">voulez vous se connecter ?</a> </p>';
                                        }
                                        else {
                                            echo '<p> Votre compte n\'a pas  eté crée </p>' ;
                                            } 
                                    }
                                    ?>
                                </div>

                    <form action="#" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="prenom">Prenom:  <span>*</span></label>
                                <input type="text" class="form-control champ" id="prenom" name="prenom" required >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nom">Nom: <span>*</span></label>
                                <input type="text" class="form-control champ" id="nom"  name="nom" required >
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email">Email Address: <span>*: </span></label>
                                <input type="email" class="form-control " id="email" value="" name="email" placeholder="prenom.nom@esprit.tn">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="motDePasse">Mot de passe:  <span>*</span></label>
                                <input type="password" class="form-control champ" id="motDePasse" name="motDePasse" value="">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="motDePasseConfirm">Confirmer mot de passe:  <span>*</span></label>
                                <input type="password" class="form-control champ" id="motDePasseConfirm" value="" name="motDePasseConfirm">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="telephone">telephone N:  <span>*</span></label>
                                <input type="text" class="form-control" id="telephone"  value="" name ="telephone" placeholder ="+216">
                            </div>



                            <div class="col-12 mb-3">
                                <label for="country">Pays <span>*</span></label>
                                <input list="pays" id="ice-cream-choice" name="pays-choice" class="custom-select d-block w-100 champ" />
                                <datalist  name="pays" id="pays">
                                
                                <?php if ($adresses){
                                            foreach($adresses as $adresse){

                                            ?>
                                
                                <option value="<?= $adresse['pays'] ?> "> 

                                <?php
                            }
                        }
                            ?>
                            </datalist>

                            </div>
                            <div class="col-12 mb-3">
                                <label for="ville">Ville <span>*</span></label>
                                <input type="text" class="form-control mb-3 champ" id="ville" value="" name = "ville">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="rue">Rue <span>*</span></label>
                                <input type="text" class="form-control mb-3 champ" id="rue" value="" name="rue">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="code_postal">Code Postal <span>*</span></label>
                                <input type="text" class="form-control" id="code_postal" value="" name="code_postal">
                            </div>
                            
                            
                            

                            <div class="col-12">
                                <div class="custom-control custom-checkbox d-block mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Terms and conitions</label>
                                </div>
                                <div class="custom-control custom-checkbox d-block">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">Subscribe to our newsletter</label>
                                </div>
                            </div>
                            <div class="col-12 mb-3"><div class="custom-control custom-checkbox d-block mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" >
                                    <label hidden class="custom-control-label" for="customCheck1">Terms and conitions</label>
                                </div>
                                <div class="row">
                                <div class="col-md-6 mb-3">
                               
                            <button type="submit" class="btn btn-primary btn-block " id="envoi" name="creer_compte">S'inscrire</button>
                               
                            </div>
                            <div class="col-md-6 mb-3">
                            <button type="reset" class="btn btn-primary btn-block " id ="rafraichir"name="rafraichir">Reset</button>
                            </div>
                            </div>
                            
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>

            

        </div>
    </div>
</div>
        <!-- **** Footer Area Start **** -->
        <?php include('footer.php') ;?>
        <!-- **** Footer Area End **** -->
    </div>
    <!-- /.wrapper end -->
<div id="wrapper">