<?php
include '../../config.php';  
include '../../Controllers/ProduitC.php';
//include '../../Controller/CultureC.php';
$output = '';
$produitController = new ProduitController();
$listeProduitsFiltreesParPrix= $produitController->filtererProduitsPrix($_POST['min'],$_POST['max']);
if($listeProduitsFiltreesParPrix){
   $output .=' <div id="productsView" class="shop_grid_product_area">
                    <div class="row">
                        <!-- Single gallery Item -->';
foreach ($listeProduitsFiltreesParPrix as $produit){
$output .='<div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.2s">
                                        <!-- Product Image -->
                                        <div class="product-img">
                                            <img src="../../public/img/product-img/product-1.jpg" alt="">
                                            <div class="product-quicview">
                                                <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                            </div>
                                        </div>
                                        <!-- Product Description -->
                                        <div class="product-description">
                                            <h4 class="product-price">' . $produit['prix'].'</h4>
                                            <p>'.$produit['nom'].'</p>
                                            <!-- Add to Cart -->
                                            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                                        </div>
                                    </div>';
}
$output .='</div>
</div>';
echo $output; 

}
else
{
$output .= '<p> Aucun resultat trouvee </p>';
echo $output;
}




