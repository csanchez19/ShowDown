
<link rel="stylesheet" href="<?php echo base_url(); ?>css/winners.css">

<style>
.posicio
{
    border-bottom: 2px solid black;
    background-color: rgb(206, 50, 53);
}

.nPosicio
{
    background-color: white;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    margin-top: 2rem;
    color: black;
}


.nPosicio p
{
  color: black;
}

.ziggs {
    position: absolute;
    width: 35%;
    left: 61%;
    /* top: 22px; */
    top: 90%;
}

.beforeRanking
{
  color: white;
  font-size: 1.3em;
}

.fondo-producto
{
  background-color: rgba(87, 60, 60, 0.6);
}

.fondo-producto p
{
  color: white;
}

.fondo-producto h5
{
  color: white;
}

.carrito
{
    left: 16%;
    position: absolute;
    top: 21%;
    color: black;
    font-size: 1.6em;
    outline: none !important;
}

.fondoCarrito
{
  height: 50px;
    width: 50px;
    background-color: rgb(206, 50, 53);
    border-radius: 100%;
    position: fixed;
    left: 93%;
    top: 85%;
    outline: none !important;
    
}

.modalCarrito
{
    border-radius: 0px !important;
    background: rgba(87, 60, 60); 
    border: 2px solid rgb(206, 50, 53);
    color: white;
}

.fondo-producto2
{
  background: rgba(87, 60, 60);
  border-radius: 1px solid rgba(87, 60, 60);
}
</style>

<div class="container-fluid top_div">
    <div class="row">
        <div class="text-center col-12 div_botones">
            <h1 class="text-center div_botones2">Winners League</h1>
        </div>
    </div>
</div>

<div class="container-fluid marginado">
<div class="container marginado">
    <p class="marginado beforeRanking text-center">Aquest és el Rànking de la <span>Winners League!</span></p>
</div>

<div class="container marginado">
    <div class="row justify-content-center text-center">
        <img src="<?php echo base_url();?>content/img/ziggs.png" class="ziggs" alt="">
        <?php
        $cont = 0;
        foreach($result as $row)
        {
          if($cont < 9)
          {
            $cont++;
            if($row->usuari == $username)
            {
              $pos_user = $cont;
            }
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
        else
        {
          break;
        }
      }
        
        ?>
</div>
        
<div class="row justify-content-center text-center">
        <?php
            if($this->session->userdata('username') != ''){
              
              echo '<div class="col-12">
              <p style="letter-spacing: 5px; color: rgb(206, 50, 53); font-weight: bold;" class="mt-3 mb-4 text-center">...</p>
              </div>';

            echo '<div class="col-8 posicio p-3">
            <div class="row">
                <div class="col-1 ">
                    <div class="nPosicio mt-3">
                        <p class="">'.$pos_user.'</p>
                    </div>
                </div>
                <div class="col-1">
                    <img class="fotoRanking mt-2" src="'.base_url().'content/img/mario.jpg">
                </div>
                <div class="col">
                    <p class="mt-4">'.$pick->usuari.'</p>
                </div>
                <div class="col">
                    <p class="mt-4 punts">'.$pick->punts.'</p>
                </div>
            </div>
            </div>';
          }
        ?>
</div>
    
    
    <div class="container marginado">
      <h2 class="text-center" style="color: white;">Productes de la Temporada - SUMMER EDITION</h2>
      <div class="row marginado justify-content-center">
        <?php
        foreach($product as $row)
        {
          $idProducte = $row->codiPremi;
          echo '<div class="col-lg-3 col-12 escalar mt-5">
                  <div style="height: 350px" class="card fondo-producto" style="width: 18rem;">
                    <img style="margin-left: 4rem;" class="card-img-top pt-3 w-50" src="data:'.$row->tipo.';base64,'.base64_encode($row->foto) .'"
                     alt="Card image cap">
                    <div class="card-body text-center">
                      <h5 style="border-top: 2px solid black;" class="card-title pt-3">'.$row->Nom.'</h5>
                      <p class="card-text">'.$row->valor.' punts</p>
                      <a href="'.base_url().'index.php/showdown/carrito/'.$row->codiPremi.'/" class="custom-btn btn-7 "><span>COMPRAR</span></a>
                    </div>
                  </div>
                  </div>';


        }
        

    ?>

      </div>
    </div>
        
    </div>
    </div>

</div>

<button type="button" class="fondoCarrito escalar" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-shopping-cart carrito"></i>
</button>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content modalCarrito">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carrito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php

          foreach ($this->cart->contents() as $items)
          {

            $type = $items['options']['tipus'];
            $img = base64_encode($items['options']['foto']);

            echo '<div class="col-12 mt-5">
                  <div style="border: 1px solid rgba(87, 60, 60, 0.6)" class="card fondo-producto2">
                    <img class="card-img-top pt-3 w-25 text-center" style="margin-left: 17rem;" src="data:'.$type.';base64,'.$img.'"
                     alt="Card image cap">
                    <div class="card-body text-center">
                      <h5 style="border-top: 2px solid black;" class="card-title pt-3">'.$items['name'].'</h5>
                      <p class="card-text">'.$items['price'].' punts</p>
                    </div>
                  </div>
                  </div>';

            echo $this->cart->total_items();
          }

        ?>
      </div>
      <div class="modal-footer">
        <p class="btn btn-secondary" data-dismiss="modal">Preu: <?php echo $this->cart->format_number($this->cart->total()); ?> punts</p>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>



</script>