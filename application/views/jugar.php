<script src="<?php echo base_url(); ?>jquery-bracket-master/dist/jquery.bracket.min.js"></script>

<link type="text/css" href="<?php echo base_url(); ?>jquery-bracket-master/dist/jquery.bracket.min.css" rel="stylesheet">

<title>Torneig</title>

<style>
    .marginado{
        margin-top: 0rem;
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
            </div>
        </div>
    </div>

    <div class="mt-3 text-center text-white">
        <p><i>Introdueix una captura de la partida que acabes de jugar per poder validar els resultats.</i></p>
    </div>
    
    <div class="row m-1 marginado text-center">
        <?php
            if($result->places == 2){
                ?>
                    <div class="col-12 cajaInfo">
                        <div class="row">
                            <div class="offset-1 cajaInfoTop mt-4 pb-3 col-10">
                                <h1>Imatge del resultat de la Ronda 1</h1>
                            </div>
                            <div class="col-12 mt-5 p-3">

                                <?php echo form_open_multipart('showdown/jugar/'.$result->codiTorneig);?>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="ronda1" size="20" />
                                    </div>
                                    <div class="form-group">
                                        <button class="custom-btn btn-7" type="submit" name="pujar"> PUJAR </button>
                                    </div>
                                    <div style="color:red">
                                        <?php echo validation_errors(); ?>
                                        <?php if(isset($error)){print $error;}?>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div> 
                <?php
            }else if($result->places == 4){
                ?>
                    <div class="col-6 cajaInfo">
                        <div class="row">
                            <div class="offset-1 cajaInfoTop pt-4 pb-3 col-10">
                                <h1>Imatge del resultat de la Ronda 1</h1>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                    <div class="col-6 cajaInfo">
                        <div class="row">
                            <div class="offset-1 cajaInfoTop pt-4 pb-3 col-10">
                                <h1>Imatge del resultat de la Ronda 2</h1>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>  
                <?php
            }else if($result->places == 8){
                ?>
                    <div class="col-6 cajaInfo">
                        <div class="row">
                            <div class="offset-1 cajaInfoTop pt-4 pb-3 col-10">
                                <h1>Imatge del resultat de la Ronda 1</h1>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                    <div class="col-6 cajaInfo">
                        <div class="row">
                            <div class="offset-1 cajaInfoTop pt-4 pb-3 col-10">
                                <h1>Imatge del resultat de la Ronda 2</h1>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div> 
                    <div class="col-12 mt-5 cajaInfo">
                        <div class="row">
                            <div class="offset-1 cajaInfoTop pt-4 pb-3 col-10">
                                <h1>Imatge del resultat de la Ronda 3</h1>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>

    <h2 class="mt-5 text-center" style="color: white;">Bracket</h2>

    <div class="row justify-content-center demo">

    </div>

    

</div>



<script src = "<?php echo base_url();?>js/test.js"></script>

<script>

    var baseURL= "<?php echo base_url();?>";

    var usuari = "<?php echo $this->session->userdata('username');?>";

    var codiTorneig = "<?php echo $result->codiTorneig?>";

    var places = "<?php echo $result->places?>";

</script>