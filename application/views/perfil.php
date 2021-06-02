<title>Perfil</title>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/register.css">

<div class="container-fluid top_div">
    <div class="row">
        <div class="text-center col-12 div_botones">
            <h1 class="text-center div_botones2">El meu Perfil</h1>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-10">
            <div class="row">
                <div class="col-lg-2 col-6">
                    <img class="w-100" style="border-radius: 100%" src="<?php echo base_url(); ?>content/img/mario.jpg">
                </div>
                <div class="col-8 col-lg-2 textProfile">
                    <p class="mt-5" style="font-size: 1.7em"><?php echo $result->usuari; ?></p> 
                    <p class="">Membre des de <?php echo $result->dataCreat; ?></p>
                    
                </div>
            </div>
        </div>
        <div class="col-2 mt-5">
            <div class="row">
                <div class="col">
                    <a class="btn btn-secondary" href="<?php echo base_url().'index.php/showdown/modificarPerfil'?>">Modificar perfil</a>
                    <?php
                        if($admin->isAdmin != FALSE){
                            ?>
                                <a class="mt-2 btn btn-secondary" href="<?php echo base_url().'index.php/showdown/admin'?>">Plana administrador</a>
                            <?php
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container marginado">
    <h1 class="title">Estadístiques Generals</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-3 col-12 mt-lg-0 mt-5 text-center cajaPerfil">
            <span class=""><?php echo $tornejos->contador ?></span>
            <p class="">Tornejos Creats</p>
        </div>
        <div class="col-lg-3 offset-lg-1 mt-lg-0 col-12 mt-5 text-center cajaPerfil">
            <span class=""><?php echo $participacions->contador ?></span>
            <p class="">Participacions a Tornejos</p>
        </div>
        <div class="col-lg-3 offset-lg-1 mt-lg-0 mt-5 col-12 text-center cajaPerfil">
        <div class="row">
                <div class="col-4 leftSquare">
                    <img src="<?php echo base_url(); ?>content/img/trophyGranate.png" class="w-100 mt-4" alt="">
                    <p class="position mt-4">1ST</p>
                </div>
                <div class="col-8">
                    <span class="">0</span>
                    <p class="mt-5">Tornejos Guanyats</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row marginado">
        <div class="col-12 cajaMiTourn">
            <div class="row">
                <div class="col-12 text-center miTournTop">
                    <p class="pt-3 pb-1">Tornejos als que estic apuntat</p>
                </div>
                <div class="p-5 col-12">
                    <?php

                    foreach($joined as $row){

                        $estat;
                        if($row->activo == 0){
                            $estat = "Tancat";
                        }else{
                            $estat = "Obert";
                        }

                        echo '<div class="mb-4 bg-dark card text-center text-white">';
                        echo '<div class="card-header">';
                        echo $row->nom;
                        echo '</div>';
                        echo '<div class="card-body">';
                        echo '<p class="card-text">'.$row->descripcio.' | '.$estat.'</p>';
                        echo '<a class="btn btn-danger" href="'.base_url().'index.php/showdown/tournament/'.$row->codiTorneig.'">+info</a>';
                        echo '</div>';
                        echo '</div>';
                    }

                        

                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row marginado">
        <div class="col-12 cajaMiTourn">
            <div class="row">
                <div class="col-12 text-center miTournTop">
                    <p class="pt-3 pb-1">Tornejos creats per mi</p>
                </div>
                <div class="p-5 col-12">
                    <?php

                    foreach($tourns as $row){

                        $estat;
                        if($row->activo == 0){
                            $estat = "Tancat";
                        }else{
                            $estat = "Obert";
                        }

                        echo '<div class="mb-4 bg-dark card text-center text-white">';
                        echo '<div class="card-header">';
                        echo $row->nom;
                        echo '</div>';
                        echo '<div class="card-body">';
                        echo '<p class="card-text">'.$row->descripcio.' | '.$row->Nom.' | '.$estat.'</p>';
                        echo '<a class="btn btn-danger" href="'.base_url().'index.php/showdown/tournament/'.$row->codiTorneig.'">+info</a>';
                        echo '</div>';
                        echo '</div>';
                    }

                        

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>