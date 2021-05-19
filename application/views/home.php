
<style>

</style>

<div class="container-fluid top_div">
    <div class="row">
        <div class="text-center col-12 div_botones">
            <h1 class="text-center">ShowDown! <br> Competeix i Guanya!</h1>
            <div class="row mt-5">
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
    <div class="row d-block">
        <div class="col-12">
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


    <h2 class="text-center titolActius mb-5">TORNEJOS ACTIUS</h2>

    <div class="row d-block">
        <div class="col-12 mt-5 main_tournament">
            <p class="text-left">Torneig increible</p>
            <div class="row">
                <div class="col-6 text-left">
                    <p>21 places - MAIG 13, 15:00 EST</p>
                </div>
                <div class="col-6 text-right">
                    <p>Hello Kitty Online</p>
                </div>
            </div>
        </div>
    </div>



<!--Scripts nuestros-->
<script src = "<?php echo base_url(); ?>js/functions.js"></script>
