<link rel="stylesheet" href="<?php echo base_url(); ?>css/register.css">

<header class="text-center">
    <h1> <?= $title ?> </h1>
</header>

<div class="container form">
        <div class="col-xl-12">
            <h3> Registre </h3>

            <?php
                echo form_open('showdown/register_user');

                    //NOM
                    echo '<div class="form-group">';
                    echo form_label('Nom', 'nom');
                    $valueNom = (!empty($nom))?$nom:'';
                    $dataNom = array(
                        'name' => 'nom',
                        'value' => $valueNom,
                        'class' => 'form-control'
                    );
                    echo form_input($dataNom);
                    echo form_error('nom'); 
                    echo '</div>';
                    
                    //COGNOMS
                    echo '<div class="form-group">';
                    echo form_label('Cognoms', 'cognoms');
                    $valueCognoms = (!empty($cognoms))?$cognoms:'';
                    $dataCognoms = array(
                        'name' => 'cognoms',
                        'value' => $valueCognoms,
                        'class' => 'form-control'
                    );
                    echo form_input($dataCognoms);
                    echo form_error('cognoms'); 
                    echo '</div>';

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

                    //DNI
                    echo '<div class="form-group">';
                    echo form_label('Dni', 'dni');
                    $valueDni = (!empty($dni))?$dni:'';
                    $dataDni = array(
                        'name' => 'dni',
                        'value' => $valueDni,
                        'class' => 'form-control'
                    );
                    echo form_input($dataDni);
                    echo form_error('dni'); 
                    echo '</div>';

                    //CORREU
                    echo '<div class="form-group">';
                    echo form_label('Correu', 'correu');
                    $valueCorreu = (!empty($correu))?$correu:'';
                    $dataCorreu = array(
                        'name' => 'correu',
                        'value' => $valueCorreu,
                        'class' => 'form-control'
                    );
                    echo form_input($dataCorreu);
                    echo form_error('correu'); 
                    echo '</div>';

                    //DATA DE NAIXEMENT
                    echo '<div class="form-group">';
                    echo form_label('Data de naixement', 'naix');
                    $valueNaix = (!empty($naix))?$naix:'';
                    $dataNaix = array(
                        'type' => 'date',
                        'name' => 'naix',
                        'value' => $valueNaix,
                        'class' => 'form-control'
                    );
                    echo form_input($dataNaix);
                    echo form_error('naix'); 
                    echo '</div>';

                    //PASSWORD
                    echo '<div class="form-group">';
                    echo form_label('Contrasenya ', 'password');
                    $valuePass=(!empty($password))?$password:'';
                    $dataPass = array(
                        'name' => 'password',
                        'type' => 'password',
                        'value' => $valuePass,
                        'class' => 'form-control'
                    );
                    echo form_input($dataPass);
                    echo form_error('password');
                    echo '</div>';

                    echo '<div class="form-group">';
                    echo form_label('Torna a introduïr la contrasenya ', 'password2');
                    $valuePass2=(!empty($password2))?$password2:'';
                    $dataPass2 = array(
                        'name' => 'password2',
                        'type' => 'password',
                        'value' => $valuePass2,
                        'class' => 'form-control'
                    );
                    echo form_input($dataPass2);
                    echo form_error('password2');
                    echo '</div>';

                    //PAYPAL
                    echo '<div class="form-group">';
                    echo form_label('Paypal', 'paypal');
                    $valuePaypal = (!empty($paypal))?$paypal:'';
                    $dataPaypal = array(
                        'name' => 'paypal',
                        'value' => $valuePaypal,
                        'class' => 'form-control'
                    );
                    echo form_input($dataPaypal);
                    echo form_error('paypal'); 
                    echo '</div>';

                    //SUBMIT
                    $dataButton = array(
                        'name' => 'register',
                        'value' => 'Registrar-se',
                        'class' => 'btn btn-primary'
                    );
                    echo '<div class="form-group text-center">';
                    echo form_submit($dataButton);
                    echo '</div>';

                echo form_close()
            ?>
        </div>
</div>
