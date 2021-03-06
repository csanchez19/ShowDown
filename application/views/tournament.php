
<script src="<?php echo base_url(); ?>jquery-bracket-master/dist/jquery.bracket.min.js"></script>

<link type="text/css" href="<?php echo base_url(); ?>jquery-bracket-master/dist/jquery.bracket.min.css" rel="stylesheet">

<title>Torneig</title>

<style>
.modalCarrito
{
    border-radius: 0px !important;
    background: black; 
    border: 2px solid rgb(206, 50, 53);
    color: white;
}
</style>

<div class="container-fluid top_div">
    <div class="row">
        <div class="text-center col-12 div_botones">
            <h1 class="text-center div_botones2"></h1>
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
                <div class="col-lg-3 col-12 pt-5 text-center">
                <?php
                    if($participants->contador == $result->places){
                        if($check->contador2 == 1){
                        ?>
                            <button class="custom-btn btn-7 mt-lg-3 mt-0"  onclick="goJugar()" style="font-size: 1em !important"><span style="font-size: 1em !important">JUGAR</span></button>
                        <?php
                        }
                        
                    }else{
                        if( $check->contador2 < 1){

                        ?>
                            <button class="custom-btn btn-7 mt-lg-3 mt-0" style="font-size: 1em !important" data-toggle="modal" data-target="#exampleModal"><span style="font-size: 1em !important">APUNTAR-SE</span></button>
                        <?php
                        }
                        
                    }
                ?>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modalCarrito">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Introdueix el teu nom d'usuari al joc per facilitar el contacte amb els contrincants.</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <?php 
            echo form_open('showdown/validation');

            //NOM D'USUARI AL JOC
            /*echo '<div class="form-group">';
            echo form_label('Nom al joc', 'ingame');
            $valueIngame = (!empty($ingame))?$ingame:'';
            $dataIngame = array(
                'name' => 'ingame',
                'value' => $valueIngame,
                'class' => 'form-control'
            );
            echo form_input($dataIngame);
            echo form_error('ingame'); 
            echo '</div>';*/
            ?>
            <div class="form-group">
                <label for="ingame">Nom al joc</label>
                <input type="text" name="ingame" value="" class="form-control" required>
                <?php echo form_error('ingame');  ?>
            </div>
            <?php

            //NOM D'USUARI
            echo '<div class="form-group">';
            $valueUsuari = (!empty($usuari))?$usuari:'';
            $dataUsuari = array(
                'name' => 'usuari',
                'value' => $this->session->userdata('username'),
                'class' => 'form-control',
                'type' => 'hidden'
            );
            echo form_input($dataUsuari);
            echo form_error('usuari'); 
            echo '</div>';

            //TORNEIG
            echo '<div class="form-group">';
            $valueTorneig = (!empty($torneig))?$torneig:'';
            $dataTorneig = array(
                'name' => 'torneig',
                'value' => $result->codiTorneig,
                'class' => 'form-control',
                'type' => 'hidden'
            );
            echo form_input($dataTorneig);
            echo '</div>';
    

        ?>
        <p class="text-danger"> <i> Si no concorda amb les imatges de comprovaci??, no es donar??n per v??lids els resultats.</i></p>

            <div class="form-group pt-5 text-center">
                <label for="enviar" class="sr-only"></label>
                <button type="submit" name="apuntarse" class="custom-btn2 btn-7"><span>APUNTAR-SE</span></button>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

    <div class="mt-4 text-center text-secondary">
        <p><i>Fins que no s'omplin totes les places, no es podr?? veure el bracket de m??s de 4 contrincants ni jugar</i></p>
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
                            <p class="pt-lg-4 pt-5">Places restants </p>
                            <p class="pt-lg-4 pt-5">Format</p>
                            <p class="pt-lg-4 pt-5">Descripci??</p>

                        </div>
                        <div class="col infoRight text-right">
                            <p><?php echo $result->data ?></p>
                            <p class="pt-4"><?php $count = $result->places - $participants->contador;  echo $count ?></p>
                            <p class="pt-4">El??liminaci?? directa</p>
                            <p class="pt-4"><?php echo $result->descripcio ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    

    <div class="mt-4 text-center text-white">
            <h2>
                <i><?php  
                    if($result->guanyador != null){

                         echo 'GUANYADOR: <span class="text-danger"> ' . $result->guanyador. '</span>';
                        
                        } 
                    
                    ?> </span>
                
                </i>
            </h2>
    </div>

    <h2 class="mt-5 text-center" style="color: white;">Bracket</h2>

    <div class="row justify-content-center demo">
    
    </div>
</div>

<!--Scripts nuestros-->
<script src = "<?php echo base_url();?>js/test.js"></script>

<script>

    function goApuntarse()
    {
        window.location.href = "/ShowDown/index.php/showdown/apuntarse/" + "<?php $result->codiTorneig?>";
    }

    function goJugar(){
        window.location.href = "/ShowDown/index.php/showdown/jugar/" + "<?php echo $result->codiTorneig?>";
    }

    var baseURL= "<?php echo base_url();?>";

    var usuari = "<?php echo $this->session->userdata('username');?>";

    var codiTorneig = "<?php echo $result->codiTorneig?>";

    var places = "<?php echo $result->places?>";

</script>

