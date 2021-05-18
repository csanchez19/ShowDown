<link rel="stylesheet" href="<?php echo base_url(); ?>css/register.css">

<div class="container-fluid top_div">
    <div class="row">
        <div class="text-center col-12 div_botones">
            <h1 class="text-center">ShowDown! <br> Loguejat per seguir competint</h1>
        </div>
    </div>
</div>

<div class="container form">
        <div class="marco col-xl-12">
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

                    //SUBMIT
                    $dataButton = array(
                        'name' => 'login',
                        'value' => 'Loguejat',
                        'class' => 'btnLogin mt-4'
                    );
                    echo '<div class="form-group text-center">';
                    echo form_submit($dataButton);
                    echo '</div>';

                echo form_close()
            ?>
        </div>
</div>

<!--http://[::1]/showdown/index.php/showdown/login-->