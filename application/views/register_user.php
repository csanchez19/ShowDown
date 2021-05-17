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

                echo form_close()
            ?>
        </div>
</div>

