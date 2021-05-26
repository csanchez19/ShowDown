
<link rel="stylesheet" href="<?php echo base_url(); ?>css/winners.css">

<style>
    body
    {
        background-color: #e77304 !important;
    }
</style>

<div class="container-fluid top_divW">
    <div class="row">
        <div class="text-center col-12 div_botonesW">
            <h1 class="text-center div_botones2" style="visibility: hidden">Winners League</h1>
        </div>
    </div>
</div>

<div class="container-fluid div_orange">
<div class="container marginado top_Winners">
    <h2 class="text-center">Benvingut a la <span>Winners League!</span></h2>
    <p class="marginado">Aquest és el Rànking de la <span>Winners League!</span></p>
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
    </div>´
    </div>

    <div class="container-fluid div_premios">

    </div>
</div>