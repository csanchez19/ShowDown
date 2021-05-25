<link rel="stylesheet" href="<?php

use function PHPSTORM_META\type;

echo base_url(); ?>css/register.css">

<div class="container-fluid top_div">
    <div class="row">
        <div class="text-center col-12 div_botones">
            <h1 class="text-center div_botones2">Crea el teu torneig!</h1>
        </div>
    </div>
</div>

<div class="container form">
    <div class="marco offset-2 col-xl-8">

        <?php echo form_open('showdown/validation'); ?>

        <div class="pt-1  text-center divCobrament">
            <p class="dadesCobrament">Dades del torneig</p>
        </div>

        

        <?php echo form_close(); ?>
    </div>
</div>