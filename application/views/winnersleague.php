
<link rel="stylesheet" href="<?php echo base_url(); ?>css/winners.css">

<style>

</style>

<div class="container-fluid top_div">
    <div class="row">
        <div class="text-center col-12 div_botones">
            <h1 class="text-center marginado div_botones2">Winners League</h1>
        </div>
    </div>
</div>

<div class="container-fluid marginado">
<div class="container marginado">
    <p style="display:none;" class="marginado">Aquest és el Rànking de la <span>Winners League!</span></p>
</div>

<div class="container marginado">
    <div class="row justify-content-center text-center">
        <img src="<?php echo base_url();?>content/img/ziggs.png" class="ziggs" alt="">
        <?php
        $cont = 0;
        foreach($result as $row)
        {
            $cont++;
            echo '<div class="col-8 posicio p-3">
                    <div class="row">
                        <div class="col-1 ">
                            <div class="nPosicio mt-3">
                                <p class="">'.$cont.'</p>
                            </div>
                        </div>
                        <div class="col-1">
                            <img class="fotoRanking mt-2" src="'.base_url().'content/img/mario.jpg">
                        </div>
                        <div class="col">
                            <p class="mt-4">'.$row->usuari.'</p>
                        </div>
                        <div class="col">
                            <p class="mt-4 punts">'.$row->punts.'</p>
                        </div>
                    </div>
                </div>';
                
        }
        
        ?>
    </div>
    
    <!--<div class="div_productos">
        
        <div class="row">
            <div class="col-4">
                <div class="image">
                    <img src="https://fadzrinmadu.github.io/hosted-assets/creative-product-card-ui-design-using-html-css-and-javascript/t-shirt.png" alt="">
                </div>
              <div class="card-content">
                <div class="wrapper">
                  <div class="title">
                    Adidas Originals
                  </div>
                  <p>
                    Men's running tshirt
                  </p>
                  <span class="price">$29.99</span>
                  <div class="content size">
                    <div class="name size-name">
                      Size
                    </div>
                    <div class="size-value">
                      <span class="color">XS</span>
                      <span class="color">S</span>
                      <span class="active">M</span>
                      <span class="color">L</span>
                      <span class="color">XL</span>
                    </div>
                  </div>
                  <div class="content colour">
                    <div class="name colour-name">
                      Colour
                    </div>
                    <div class="colour-value">
                      <span class="white" data-color="lightgrey" data-img="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large2.png"></span>
                      <span class="blue active" data-color="#456ABD" data-img="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large.png"></span>
                      <span class="yellow" data-color="#EAA523" data-img="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large3.png"></span>
                    </div>
                  </div>
                  <div class="btns">
                    <button>Buy now</button>
                    <button>Add to cart</button>
                  </div>
                </div>
              </div>
                </div>
            </div>-->
        
    </div>
    </div>

</div>


<script>

    $(".colour-value span").click(function(){
  $(".colour-value span").removeClass("active");
  $(this).addClass("active");
  $("body").css("background", $(this).attr("data-color"));
  $(".wrapper .price").css("color", $(this).attr("data-color"));
  $(".size-value span.color").css("color", $(this).attr("data-color"));
  $(".size-value span.active").css("background", $(this).attr("data-color"));
  $(".image img").attr("src", $(this).attr("data-img"));
  $(".btns button").css({
    "background": $(this).attr("data-color"),
    "border-color": $(this).attr("data-color")
  });
});
    
</script>