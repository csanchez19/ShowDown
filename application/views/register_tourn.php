<link rel="stylesheet" href="<?php

use function PHPSTORM_META\type;

echo base_url(); ?>css/register.css">

<div class="container-fluid top_div">
    <div class="row">
        <div class="text-center col-12 div_botones">
            <h1 class="text-center div_botones2">Crea el teu torneig!</h1>
        </div>
    </div>
</div>

<div class="container form">
    <div class="marco  offset-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">

        <?php echo form_open('showdown/validation'); ?>

        <div class="pt-1  text-center divCobrament">
            <p class="dadesCobrament">Dades del torneig</p>
        </div>
        <div class="form-group mt-5 pt-5">
        <p class="text-center"><i>(Tingues en compte que la data ha de ser accessible per que l'administrador pugui estar al tant)</i></p>
            <div class="row">
                <div class="col">
                    <label for="nom" class="sr-only">Nom</label>
                    <?php 
                    $valueNom=(!empty($nom))?$nom:'';
                    $dataNom = array(
                        'name' => 'nom',
                        'value' => $valueNom,
                        'class' => 'form-control',
                        'placeholder' => 'Nom*'
                    );
                    echo form_input($dataNom);
                    echo form_error('nom'); ?>
                </div>
                <div class="col">
                    <label for="data" class="sr-only">Data del torneig</label>
                    <?php 
                    $valueData=(!empty($data))?$data:'';
                    $dataData = array(
                        'name' => 'data',
                        'value' => $valueData,
                        'class' => 'form-control',
                        'type' => 'text',
                        'onfocus' => "(this.type='date')",
                        'onfocusout' => "(this.type='text')",
                        'placeholder' => 'Data del torneig*'
                    );
                    echo form_input($dataData);
                    echo form_error('data'); ?>
                </div>
                <div class="col">
                    <label for="hora" class="sr-only">Hora del torneig</label>
                    <?php 
                    $valueHora=(!empty($hora))?$hora:'';
                    $dataHora = array(
                        'name' => 'hora',
                        'value' => $valueHora,
                        'class' => 'form-control',
                        'type' => 'text',
                        'onfocus' => "(this.type='time')",
                        'onfocusout' => "(this.type='text')",
                        'placeholder' => 'Hora del torneig*'
                    );
                    echo form_input($dataHora);
                    echo form_error('hora'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                <select class="form-control" name="jocs">
                    <option value="">Selecciona el joc...*</option>
                    <?php 
                    foreach($result as $row)
                    { 
                    echo '<option value="'.$row->Id.'">'.$row->Nom.'</option>';
                    }
                    ?>
                </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                <label for="places" class="sr-only">Places</label>
                <select class="form-control" name="places" id="places">
                    <option value="">Selecciona el numero de places...*</option>
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="8">8</option>
                </select>
                <?php echo form_error('places'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="desc" class="">Descripció*</label>
                    <textarea class="form-control" name="desc" id="desc" cols="30" rows="10"></textarea>
                    <?php echo form_error('desc'); ?>
                </div>
            </div>
        </div>

        <div class="form-group pt-5 text-center">
            <label for="register_tourn" class="sr-only"></label>
            <button name="register_tourn" type="submit" class="custom-btn2 btn-7"><span>REGISTRAR</span></button>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>

<script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("data")[0].setAttribute('min', today);
</script>