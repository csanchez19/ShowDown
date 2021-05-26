
<script src="<?php echo base_url(); ?>jquery-bracket-master/dist/jquery.bracket.min.js"></script>

<link type="text/css" href="<?php echo base_url(); ?>jquery-bracket-master/dist/jquery.bracket.min.css" rel="stylesheet">

<title>Torneig</title>

<div class="container-fluid top_div">
    <div class="row">
        <div class="text-center col-12 div_botones">
            <h1 class="text-center div_botones2">Torneig</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mainTorneo">
            <div class="row">
                <div class="col-4">
                    <img id="<?php echo $result->Nom ?>" src="<?php echo base_url(); ?>content/img/fifa.png" class="w-100" alt="">
                </div>
                <div class="col-5 pt-5 text-center">
                    <p class="tournamentTitle mt-4"><?php echo $result->nom?></p>
                </div>
                <div class="col-3 pt-5 text-center">
                    <button class="custom-btn btn-7 mt-3" style="font-size: 1em !important"><span style="font-size: 1em !important">APUNTAR-SE</span></button>
                </div>
            </div>
        </div>
    </div>

    <div class="row marginado">
        <div class="col-12 cajaInfo">
            <div class="row">
                <div class="offset-1 cajaInfoTop pt-4 pb-3 col-10">
                    <h1>Detalls del Torneig</h1>
                </div>
                <div class="offset-1 text-center col-10 mt-5">
                    <div class="row">
                        <div class="col infoLeft text-left">
                            <p>Data d'Inici</p>
                            <p class="pt-4">Plataforma</p>
                            <p class="pt-4">Places</p>
                            <p class="pt-4">Premi</p>
                        </div>
                        <div class="col infoRight text-right">
                            <p><?php echo $result->data ?></p>
                            <p class="pt-4">PC</p>
                            <p class="pt-4"><?php echo $result->places ?></p>
                            <p class="pt-4">No</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>

    <h2 class="marginado text-center" style="color: white;">Recompenses Winners League</h2>

    <div class="row marginado text-center">
        <div class="col escalar">
        <p class="nCup">1st</p>
            <img src="<?php echo base_url(); ?>content/img/trophy.png" class="copaN1" alt="">
            <p style="color: white"><span>1000</span> punts</p>
        </div>
    </div>
    <div class="row">
        <div class="offset-2 col-3 text-center escalar">
            <p class="nCup">2nd</p>
            <img src="<?php echo base_url(); ?>content/img/trophy.png" class="w-50" alt="">
            <p style="color: white"><span>1000</span> punts</p>
        </div>
        <div class="col-3 offset-2 text-center escalar">
            <p class="nCup">3rd</p>
            <img src="<?php echo base_url(); ?>content/img/trophy.png" class="w-50" alt="">
            <p style="color: white"><span>1000</span> punts</p>
        </div>
    </div>


    <div class="row justify-content-center demo">
    
    </div>
</div>

<!--Scripts nuestros-->
<script src = "<?php echo base_url();?>js/test.js"></script>

