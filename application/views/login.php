<link rel="stylesheet" href="<?php echo base_url(); ?>css/register.css">

<div class="container-fluid top_div">
    <div class="row">
        <div class="text-center col-12 div_botones">
            <h1 class="text-center div_botones2">Fes Log-In i comença a competir!</h1>
        </div>
    </div>
</div>

<div class="container div_login pt-5 form">
        <div class="marco2 col-xl-6 offset-xl-3">
                <?php 
                    echo '<div class="text-center">';
                    echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';
                    echo '</div>';
                ?>
            <?php
                echo form_open('showdown/validation');

                    //NOM D'USUARI
                    echo '<div class="form-group">';
                    echo form_label('Usuari', 'usuari');
                    $valueUsuari = (!empty($usuari))?$usuari:'';
                    $dataUsuari = array(
                        'name' => 'usuari',
                        'value' => $valueUsuari,
                        'class' => 'form-control'
                    );
                    echo form_input($dataUsuari);
                    echo form_error('usuari'); 
                    echo '</div>';

                    //PASSWORD
                    echo '<div class="form-group">';
                    echo form_label('Contrasenya ', 'password3');
                    $valuePass=(!empty($password))?$password:'';
                    $dataPass = array(
                        'name' => 'password3',
                        'type' => 'password',
                        'value' => $valuePass,
                        'class' => 'form-control'
                    );
                    echo form_input($dataPass);
                    echo form_error('password');
                    echo '</div>';

                    ?>

                <div class="form-group pt-5 text-center">
                    <label for="enviar" class="sr-only"></label>
                    <button type="submit" name="login" onclick class="custom-btn2 btn-7"><span>LOG-IN</span></button>
                </div>

            <?php        
                echo form_close()
            ?>
        </div>
</div>

<script>

    function login()
    {
        $.get("http://localhost/showdown/index.php/showdown/login")
    }
    
</script>

<!--http://[::1]/showdown/index.php/showdown/login-->