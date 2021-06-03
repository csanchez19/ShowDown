<title>Modificar Perfil</title>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/register.css">

<div class="container-fluid top_div">
    <div class="row">
        <div class="text-center col-12 div_botones">
            <h1 class="text-center div_botones2">Aquí podras modificar totes les dades que vulguis</h1>
        </div>
    </div>
</div>

<div class="container form">
        <div class="marco offset-2 col-xl-8">
                <div class="pt-1 mb-5 text-center divCobrament">
                    <p class="dadesCobrament">Imatge de<br> perfil</p>
                </div>

                <?php echo form_open_multipart('showdown/validation');?>
                    <div class="form-group">
                        <input type="file" class="form-control" name="imatge" size="20" />
                    </div>
                    <div class="form-group text-center">
                        <button name="imgPerfil" type="submit" class="custom-btn2 btn-7"><span>MODIFICAR</span></button>
                    </div>
                    <div style="color:red">
                        <?php echo validation_errors(); ?>
                        <?php if(isset($error)){print $error;}?>
                    </div>
                </form>

            <?php echo form_open_multipart('showdown/validation'); ?>

                <div class="pt-1  text-center divCobrament">
                    <p class="dadesCobrament">Dades Personals</p>
                </div>
                <div class="form-group mt-5 pt-5">
                    <div class="row">
                        <div class="col">
                            <label for="nom" class="sr-only">Nom</label>
                            <?php 
                            $valueNom=(!empty($nom))?$nom:'';
                            $dataNom = array(
                                'name' => 'nom',
                                'value' => $result->nom,
                                'class' => 'form-control',
                                'placeholder' => 'Nom'
                            );
                            echo form_input($dataNom);
                            echo form_error('nom'); ?>
                        </div>
                        <div class="col">
                            <label for="cognoms" class="sr-only">Cognom</label>
                            <?php 
                            $valueCognoms=(!empty($cognoms))?$cognoms:$result->cognoms;
                            $dataCognoms = array(
                                'name' => 'cognoms',
                                'value' => $valueCognoms,
                                'class' => 'form-control',
                                'placeholder' => 'Cognoms'
                            );
                            echo form_input($dataCognoms);
                            echo form_error('cognoms'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="naix" class="sr-only">Data de Naixement</label>
                            <?php 
                            $valueNaix=(!empty($naix))?$naix:$result->data;
                            $dataNaix = array(
                                'name' => 'naix',
                                'id' => 'datefield',
                                'value' => $valueNaix,
                                'class' => 'form-control',
                                'type' => 'text',
                                'onfocus' => "(this.type='date')",
                                'onfocusout' => "(this.type='text')",
                                'placeholder' => 'Data de naixement'
                            );
                            echo form_input($dataNaix);
                            echo form_error('naix'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="correu" class="sr-only">E-mail</label>
                            <?php 
                            $valueCorreu=(!empty($correu))?$correu:$result->correu;
                            $dataCorreu = array(
                                'name' => 'correu',
                                'value' => $valueCorreu,
                                'class' => 'form-control',
                                'placeholder' => 'E-mail',
                                'type' => 'email'
                            );
                            echo form_input($dataCorreu);
                            echo form_error('correu'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="password" class="sr-only">Contrasenya</label>
                            <?php 
                            $valuePass=(!empty($password))?$password:$result->contrasenya;
                            $dataPass = array(
                                'name' => 'password',
                                'value' => $valuePass,
                                'class' => 'form-control',
                                'placeholder' => 'Contrasenya',
                                'type' => 'password'
                            );
                            echo form_input($dataPass);
                            echo form_error('password'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="password2" class="sr-only">Contrasenya2</label>
                            <?php 
                            $valuePass2=(!empty($password2))?$password2:$result->contrasenya;
                            $dataPass2 = array(
                                'name' => 'password2',
                                'value' => $valuePass2,
                                'class' => 'form-control',
                                'type' => 'password',
                                'placeholder' => 'Torna a introduïr la Contrasenya'
                            );
                            echo form_input($dataPass2);
                            echo form_error('password2'); ?>
                        </div>
                    </div>
                </div>
                <div class="pt-3 text-center divCobrament">
                    <p class="dadesCobrament">Dades de <br> Cobrament</p>
                </div>
                <div class="form-group mt-5 pt-5">
                    <label for="paypal" class="sr-only">PayPal</label>
                    <?php 
                    $valuePaypal=(!empty($paypal))?$paypal:$result->paypal;
                    $dataPaypal = array(
                        'name' => 'paypal',
                        'value' => $valuePaypal,
                        'class' => 'form-control',
                        'type' => 'email',
                        'placeholder' => 'Compte de Paypal'
                    );
                    echo form_input($dataPaypal);
                    echo form_error('paypal'); ?>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="provincia" class="sr-only">Provincia</label>
                            <?php 
                            $valueProvincia=(!empty($provincia))?$provincia:$result->provincia;
                            $dataProvincia = array(
                                'name' => 'provincia',
                                'value' => $valueProvincia,
                                'class' => 'form-control',
                                'placeholder' => 'Provincia'
                            );
                            echo form_input($dataProvincia);
                            echo form_error('provincia'); ?>
                        </div>
                        <div class="col">
                            <label for="poblacio" class="sr-only">Poblacio</label>
                            <?php 
                            $valuePoblacio=(!empty($poblacio))?$poblacio:$result->poblacio;
                            $dataPoblacio = array(
                                'name' => 'poblacio',
                                'value' => $valuePoblacio,
                                'class' => 'form-control',
                                'placeholder' => 'Poblacio'
                            );
                            echo form_input($dataPoblacio);
                            echo form_error('poblacio'); ?>
                        </div>
                        <div class="col">
                            <label for="codipostal" class="sr-only">CodiPostal</label>
                            <?php 
                            $valueCP=(!empty($codipostal))?$codipostal:$result->codiPostal;
                            $dataCP = array(
                                'name' => 'codipostal',
                                'value' => $valueCP,
                                'class' => 'form-control',
                                'placeholder' => 'Codi Postal',
                                'type' => 'number'
                            );
                            echo form_input($dataCP);
                            echo form_error('codipostal'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="carrer" class="sr-only">Direccio</label>
                    <?php 
                    $valueCarrer=(!empty($carrer))?$carrer:$result->direccio;
                    $dataCarrer = array(
                        'name' => 'carrer',
                        'value' => $valueCarrer,
                        'class' => 'form-control',
                        'placeholder' => 'Carrer / Avinguda'
                    );
                    echo form_input($dataCarrer);
                    echo form_error('carrer'); ?>
                </div>
                <div class="form-group pt-5 text-center">
                    <label for="enviar" class="sr-only"></label>
                    <button name="modifyP" type="submit" class="custom-btn2 btn-7"><span>MODIFICAR</span></button>
                </div>

            <?php echo form_close(); ?>

        </div>
</div>

<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("datefield").setAttribute("max", today);
</script>