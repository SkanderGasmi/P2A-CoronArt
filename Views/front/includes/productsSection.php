<section id = "nosProduits"class="new_arrivals_area section_padding_100_0 clearfix">
    <!-- container titre products -->
    <div class="container">                
        <div class="row">
            <div class="col-12">
                <div class="section_heading text-center">
                    <h2>Products</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">                
        <div class="row">

        <div class="col-4">
            <div class="buscar-caja">
   <input id="searchInput" type="text" name="" class="buscar-txt" placeholder="Buscar..."/>
   <a class="buscar-btn">
    <i class="fas fa-search"></i>


   </a>
  </div>
  </div>
           
            
            <div class="col-8">
                <div class="karl-projects-menu mb-100">
                    <div class="text-center portfolio-menu">
                        <button class="btn active" data-filter="*">ALL</button>
                        <button class="btn" data-filter=".women">WOMAN</button>
                        <button class="btn" data-filter=".man">MAN</button>
                        <button class="btn" data-filter=".access">ACCESSORIES</button>
                        <button class="btn" data-filter=".shoes">shoes</button>
                        <button class="btn" data-filter=".kids">KIDS</button>
                    </div>
                </div>
            </div>
           
            
        </div>
    </div>
    <!-- slecteurs cultures container -->
    

    <!-- shop container -->
    <div class="container">
        <div class="row">
            <!-- shop menu area -->
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">
                
                    <div class="widget catagory mb-50">
                        <!--  Side Nav  -->
                        <div class="nav-side-menu">
                            <div class="widget price mb-50">
                                <h6 class="widget-title mb-30">Filter by Price</h6>
                                <div class="widget-desc">
                                    <div class="slider-range" id="price_range">
                                        <div id="slider" data-min="0" data-max="3000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="1350" data-label-result="Price:">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        </div>
                                        <div class="range-price">Price: 0 - 1350</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- products view -->
            <div class="col-12 col-md-8 col-lg-9">
                <div id="productsView" class="shop_grid_product_area">
                    <div class="row">
                        <!-- Single gallery Item -->
                        <?php foreach ($listeProduits as $produit){
                            include ('modalViewProduct.php');
                            ?>
                            <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.2s">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img src="../../public/img/product-img/product-1.jpg" alt="">
                                    <div class="product-quicview">
                                        <a href="" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                    </div>
                                </div>
                                <!-- Product Description -->
                                <div class="product-description">
                                    <h4 class="product-price"><?= $produit['prix'];?></h4>
                                    <p class = "product-name"><?= $produit['nom'];?></p>
                                    <!-- Add to Cart -->
                                    <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="shop_pagination_area wow fadeInUp" data-wow-delay="1.1s">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm">
                            <li class="page-item"> <a  class="page-link" href="index.php?page=<?php if ($page == 1){
                                    echo $pages;                                                
                                }
                                else 
                                { echo $page - 1;} ?>#productsView" aria-label="Previous"> <span aria-hidden="true">&laquo;  </span> </a> </li>
                            
                        <?php
                            
                            for ($i=$page ; $i <= $pages  ; $i++){
                                                                        
                            ?>
                                
                            <li <?php if ($page == $i) { ?>class="page-item active" <?php } else { ?> class ="page-item" <?php } ?> > <a class="page-link" href="index.php?page=<?=$i?>#productsView"> <?= $i; ?> </a></li>
                        
                            <?php
                            }
                        
                            ?>
                            <li class="page-item"> <a  class="page-link" href="index.php?page=<?php if ($page == $pages){
                                    echo 1;                                                
                                }
                                else 
                                { echo $page + 1;} ?>#productsView" aria-label="Next"> <span aria-hidden="true">&raquo;  </span> </a> </li>
                            

                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
        <script>
  $(document).ready(function(){  
    var min = jQuery(".slider-range-price").data('min');
        var max = jQuery(".slider-range-price").data('max');

        var unit = jQuery(".slider-range-price").data('unit');
        var value_min = jQuery(".slider-range-price").data('value-min');
        var value_max = jQuery(".slider-range-price").data('value-max');
        var label_result = jQuery(".slider-range-price").data('label-result');
        var t = $(".slider-range-price");
        $(".slider-range-price").slider({
            range: true,
            min: min,
            max: max,
            values: [value_min, value_max],
            slide: function (event, ui) {
                var result = label_result + " " + unit + ui.values[0] + ' - ' + unit + ui.values[1];
                console.log(t);
                t.closest('.slider-range').find('.range-price').html(result);
                load_product(ui.values[0],ui.values[1]);
                
            }
        });

           // load_product(value_min,value_max);

            function load_product(min,max){
                    $.ajax({
                        url : "fetch.php",
                        method : "POST",
                        data: { min : min , max : max},
                        success : function(data , ui){
                            $("#productsView").html(data);

                        }
                    });
            }
});  
      

</script>