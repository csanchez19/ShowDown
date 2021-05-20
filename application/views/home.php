
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
                        echo '<div class="col-lg-6 col-12 text-right mt-5 mt-lg-0">
                                <button onclick="goLogin()" class="custom-btn btn-5"><span>CREAR TORNEIG</span></button>
                            </div>
                            <div class="col-lg-6 col-12 text-left mt-lg-0 mt-5">
                                <button onclick="goRegister()" class="custom-btn btn-6">BUSCAR TORNEIG</button>
                            </div>';
                    }else{
                        echo '<div class="col-lg-6 col-12 text-right mt-5 mt-lg-0">
                                <button onclick="goLogin()" class="custom-btn btn-5"><span>LOGUEJAR-SE</span></button>
                            </div>
                            <div class="col-lg-6 col-12 text-left mt-5 mt-lg-0">
                                <button onclick="goRegister()" class="custom-btn btn-6">REGISTRAR-SE</button>
                            </div>';
                    }  
                ?>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5 mt-5">
    <div class="row justify-content-center d-inline">
        <div class="offset-3 col-8 text-center">
            <table class="caja text-center">
                <tr class="fila">
                    <td><p class="text">Crea o Apuntat a tornejos!</p></td>
                </tr>
                <tr class="fila">
                    <td><p class="text">Acumula punts mentre jugues!</p></td>
                </tr>
                <tr class="fila">
                    <td><p class="text">Intercanvia els punts a la nostra Winners League! <span class="badge bg-danger"> New! </span></p></td>
                </tr>
            </table>
        </div>
    </div>
</div>

    <h2 class="text-center titolActius mb-5">VIDEOJOCS PRINCIPALS</h2>


<div class="container">
    <div class="row">
        <div class="col-4 game-card-fortnite">
            <a class="fondoFortnite fondo-game" href="">
                <div class="text-game">
                    <p>Fifa 21</p>
                    <br>
                    <span>Num torneos</span>
                </div>
                <img class="fortniteguy escalar" src="<?php echo base_url(); ?>content/img/bicho.png" alt="">
            </a>
        </div>
        <div class="col-4 game-card-cod">
            <a class="fondoCod fondo-game" href="">
            <div class="text-game">
                    <p>Street Fighter</p>
                    <br>
                    <span>Num torneos</span>
                </div>
                <img class="codGuy escalar" src="<?php echo base_url(); ?>content/img/sfchar.png" alt="">
            </a>
        </div>
        <div class="col-4 game-card-lol">
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
