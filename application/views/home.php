
<style>

.filaBotones
{
    margin-bottom: 15rem;
}

</style>

<div class="container-fluid top_div">
    <div class="row">
        <div class="text-center col-12 div_botones">
            <div class="row mt-5 filaBotones">
                <!--<div class="col-6 text-right">
                    <button onclick="goLogin()" class="btnLogin">LOGUEJAR-SE</button>
                </div>
                <div class="col-6 text-left">
                    <button onclick="goRegister()" class="btnRegister">REGISTRAR-SE</button>
                </div>-->
                <?php
                    if($this->session->userdata('username') != ''){
                        echo '<div class="col-lg-6 col-12 text-lg-right text-center mt-5 mt-lg-0">
                                <button onclick="goRegisterTourn()" class="custom-btn btn-5"><span>CREAR TORNEIG</span></button>
                            </div>
                            <div class="col-lg-6 col-12 text-lg-left text-center mt-lg-0 mt-5">
                                <button onclick="goTornejos()" class="custom-btn btn-6">BUSCAR TORNEIG</button>
                            </div>';
                    }else{
                        echo '<div class="col-lg-6 col-12 text-lg-right text-center mt-5 mt-lg-0">
                                <button onclick="goLogin()" class="custom-btn btn-5"><span>LOGUEJAR-SE</span></button>
                            </div>
                            <div class="col-lg-6 col-12 text-lg-left text-center mt-5 mt-lg-0">
                                <button onclick="goRegister()" class="custom-btn btn-6">REGISTRAR-SE</button>
                            </div>';
                    }  
                ?>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5 mt-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-12">
            <div class="row justify-content-center d-inline">
                <div class="col-12 escalar banner pb-lg-2 pb-0 mb-5 pt-lg-2 pt-0">
                    <div class="row">
                        <div class="col">
                            <p class="text escalar mt-lg-2 mt-0 ml-lg-3 ml-0">Crea o Apuntat a tornejos!</p>
                        </div>
                        <div class="col text-right">
                            <img src="<?php echo base_url(); ?>content/img/marioCopa.png" class="mr-lg-5 mr-0 escalar marioHome" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 escalar banner banner2 pb-lg-2 pb-0 pt-lg-2 pt-0">
                    <div class="row">
                        <div class="col">
                            <img src="<?php echo base_url(); ?>content/img/kunckles.png" class="mr-5 escalar knucklesHome" alt="">
                        </div>
                        <div class="col">
                            <p class="text text2 escalar mt-lg-2 mt-0 mr-lg-3 mr-0">Acumula punts a mesura que participes!</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 escalar banner banner2 pb-lg-5 pt-lg-5 pt-0 pb-0">
                <div class="row">
                        <div class="col-8">
                            <a class="escalar" href=""><p class="text text3 escalar ml-lg-5 ml-0">Intercanvia els punts a la nostra Winners League! <span class="badge bg-danger ml-3"> New </span></p></a>
                        </div>
                        <div class="col-4">
                            <img src="<?php echo base_url(); ?>content/img/kratos.png" class="mr-lg-5 mr-0 escalar dariusHome" alt="">
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

    <h2 class="text-center titolActius mb-5">VIDEOJOCS PRINCIPALS</h2>


<div class="container">
    <div class="row">
        <div class="col-lg-4 col-12 mt-5 mt-lg-0 game-card-fortnite">
            <a class="fondoFortnite fondo-game" href="">
                <div class="text-game">
                    <p>Fifa 21</p>
                    <br>
                    <span>Num torneos</span>
                </div>
                <img class="fortniteguy escalar" src="<?php echo base_url(); ?>content/img/bicho.png" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-12 mt-5 mt-lg-0 game-card-cod">
            <a class="fondoCod fondo-game" href="">
            <div class="text-game">
                    <p>Street Fighter</p>
                    <br>
                    <span>Num torneos</span>
                </div>
                <img class="codGuy escalar" src="<?php echo base_url(); ?>content/img/sfchar.png" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-12 mt-5 mt-lg-0 game-card-lol">
            <a class="fondoLol fondo-game" href="">
            <div class="text-game">
                    <p>League of Legends</p>
                    <br>
                    <span>Num torneos</span>
                </div>
                <img class="gnar escalar" src="<?php echo base_url(); ?>content/img/gnar.png" alt="">
            </a>
        </div>
    </div>
</div>


<!--Scripts nuestros-->
<script src = "<?php echo base_url(); ?>js/functions.js"></script>
