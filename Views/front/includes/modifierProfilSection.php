<div id="wrapper">
    <div class="checkout_area section_padding_100" >
        <div class="container">
            <div class="row">
                <div class=" col-12 col-md-6"style="margin:auto;">
                    <div class="checkout_details_area mt-50 clearfix">
                        <div class="cart-page-heading">
                            <h5>Modifier mon Profil</h5>
                         
                            <form action="#" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="prenom">Prenom: </label>
                                        <input type="text" class="form-control champ" id="nv_prenom" name="nv_prenom"  placeholder="<?=$prenom?>" >
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="nom">Nom: </label>
                                        <input type="text" class="form-control champ" id="nv_nom"  name="nv_nom"  placeholder="<?=$nom?>">
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="email">Email Address:</label>
                                        <input type="email" class="form-control " id="nv_email" value="" name="nv_email" placeholder="<?=$client['email']?>">
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="motDePasse"> Nouveau Mot de passe: </label>
                                        <input type="password" class="form-control champ" id="nv_motDePasse" name="nv_motDePasse" value="">
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="motDePasseConfirm">Confirmer mot de passe: </label>
                                        <input type="password" class="form-control champ" id="nv_motDePasseConfirm" value="" name="nv_motDePasseConfirm">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="telephone">telephone N:  </label>
                                        <input type="text" class="form-control" id="telephone"  value="" name ="telephone" placeholder="<?=$client['telephone']?>">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="pays">Pays<span>*</span></label>
                                        <input type="text" class="form-control mb-3 champ" id="pays" value="" name = "pays-choice">
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
                                       
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <button type="submit" class="btn btn-primary btn-block " id="modif_profil" name="modifier_compte">Modifier</button>
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
        </div>
    </div>

  


</div>

    <!-- /.wrapper end -->
