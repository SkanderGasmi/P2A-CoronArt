<header class="header_area">
            <!-- Top Header Area Start -->
            <div class="top_header_area">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-end">

                    <div class="col-12 d-md-flex justify-content-between">
                            <!-- Logo Area -->
                            <div class="top_logo">
                                    <a href="#"><img src="../../public/img/core-img/logo2.png" alt=""></a>
                                </div>
                            <!-- Menu Area -->
                            <div class="main-menu-area">
                                <nav class="navbar navbar-expand-lg align-items-start">

                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

                                    <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                        <ul class="navbar-nav animated" id="nav">
                                            <li class="nav-item active" ><a class="nav-link" href="index.php?id=<?php if (isset($_SESSION['id'])) echo $_SESSION['id']?>">Acceuil</a></li>
                                          
                                            <li class="nav-item"><a class="nav-link" href="index.php?id=<?php if (isset($_SESSION['id'])) echo $_SESSION['id']?>#nosProduits">Nos produits</a></li>
                                            <?php 

    if (!(isset($_SESSION['id']) && $client['id'] == $_SESSION['id'])){
 
    ?>
                                            <li class="nav-item"><a class="nav-link" href="inscription.php?id=<?php if (isset($_SESSION['id'])) echo $_SESSION['id']?>">Inscription / Connexion</a></li>
                                           
                                        <?php } else {?>    
                                            <li class="nav-item"><a class="nav-link" href="inscription.php?id=<?php if (isset($_SESSION['id'])) echo $_SESSION['id']?>">Changer de Compte</a></li>
                                       <?php } ?>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
<?php 

    if(isset($_SESSION['id']) && $client['id'] == $_SESSION['id']){
 
    ?>
                            <div class="top_single_area d-flex align-items-center">
                                <!-- Cart & Menu Area -->
                                <div class="header-cart-menu d-flex align-items-center ml-auto">
                                    <!-- Cart Area -->
                                    <div class="cart">
                                        <a href="#" id="header-cart-btn" target="_blank"><span class="cart_quantity">2</span> <i class="ti-bag"></i><?=$client['nom']?></a>
                                        <!-- Cart List Area Start -->
                                        <ul class="cart-list">
                                            <li>
                                                <a href="#" class="image"><img src="../../public/img/product-img/product-10.jpg" class="cart-thumb" alt=""></a>
                                                <div class="cart-item-desc">
                                                    <h6><a href="#">Women's Fashion</a></h6>
                                                    <p>1x - <span class="price">$10</span></p>
                                                </div>
                                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                            </li>
                                            <li>
                                                <a href="#" class="image"><img src="../../public/img/product-img/product-11.jpg" class="cart-thumb" alt=""></a>
                                                <div class="cart-item-desc">
                                                    <h6><a href="#">Women's Fashion</a></h6>
                                                    <p>1x - <span class="price">$10</span></p>
                                                </div>
                                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                            </li>
                                            <li class="total">
                                                <span class="pull-right">Total: $20.00</span>
                                                <a href="cart.html" class="btn btn-sm btn-cart">Cart</a>
                                                <a href="checkout-1.html" class="btn btn-sm btn-checkout">Checkout</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="header-right-side-menu ml-15">
                                        <a href="#" id="sideMenuBtn"><i class="ti-menu" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>

                            <?php
}
?>

                            
                        </div>

                    </div>
                </div>
            </div>

            <!-- Top Header Area End -->
            
        </header>