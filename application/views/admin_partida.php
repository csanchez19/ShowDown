<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Scripts-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--SCRIPT JBRACKET-->
    <script src="<?php echo base_url(); ?>jquery-bracket-master/dist/jquery.bracket.min.js"></script>

    <link type="text/css" href="<?php echo base_url(); ?>jquery-bracket-master/dist/jquery.bracket.min.css" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/admin.css">
    

    <title>Showdown - Administració</title>
</head>

<style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

.zoom {
  padding: 50px;
  transition: transform .2s; /* Animation */
  width: 65%;
  height: 200px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>

<body>
<div id="wrapper">

<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <?php echo anchor('showdown/admin', 'Gestió', 'class="h1"'); ?>
        </li>
        <?php
            if($this->session->userdata('username') != '')  
            {  
                 echo '<li class="sidebar-brand"><p style="color: #999999;"><b>Benvingut, '.$this->session->userdata('username').'</b></p></li>';  
                 echo '<li><a href="'.base_url().'index.php/showdown/perfil">Tornar</a></li>';  
            }  
        ?>
    </ul>
    <div class="text-center">
        <a href="<?php echo base_url(); ?>"><img class="logo text-center" src="<?php echo base_url(); ?>content/img/logo.png" alt=""></a>
    </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
    <div class="container-fluid">
        <header class="container text-center p-2">
            <h2>Administració de resultats</h2>
        </header>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="marco">
                    <h3>Bracket</h3>
                    <div class="demo row justify-content-center">
                    
                    </div>
                    <div class="container col-6">
                    <h3 class="mt-5">Escollir guanyador</h3>
                    <?php
                        echo form_open('showdown/admin_partida/'.$result->codiTorneig);

                            //GUANYADOR
                            echo '<div class="form-group">';
                            //echo form_label('', 'guanyador');
                            $valueGuanyador = (!empty($guanyador))?$guanyador:'';
                            $dataGuanyador = array(
                                'name' => 'guanyador',
                                'value' => $valueGuanyador,
                                'class' => 'form-control',
                                'placeholder' => 'Participant'
                            );
                            echo form_input($dataGuanyador);
                            echo form_error('guanyador'); 
                            echo '</div>';

                        ?>

                        <div class="form-group text-center">
                            <label for="enviar" class="sr-only"></label>
                            <button type="submit" name="decideWin" class="btn btn-primary"><span>Guardar</span></button>
                        </div>

                    <?php        
                        echo form_close()
                    ?>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-6">
                <div class="marco">
                    <?php 
                        if($result->places == 2){
                            ?>
                            <h3>Primera ronda</h3>
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ID Torneig</th>
                                    <th scope="col">Participant</th>
                                    <th scope="col">Nom ingame</th>
                                    <th class="text-center" scope="col">Ronda 1</th>
                                    <th class="text-center" scope="col">Imatge</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($participants as $row){
                                    //echo $row->nomF.": ".$row->tipusF."<br>";
                                    echo '<tr>';
                                    echo '<td scope="row">'.$row->idTorneo.'</td>';
                                    echo '<td scope="row">'.$row->participant.'</td>';
                                    echo '<td scope="row">'.$row->ingame.'</td>';
                                    echo '<td scope="row">'.$row->ronda_1.'</td>';
                                    if($row->foto1 == null){
                                        echo '<td class="text-center" scope="row">Imatge no pujada</td>';
                                    }else{
                                        echo '<td class="text-center zoom" scope="row"><img class="w-50" src="data:'.$row->tipus1.';base64,'.base64_encode($row->foto1) .'" alt="Card image cap"></td>';
                                    }
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                                </table>
                            <?php
                        }else if($result->places == 4){
                            ?>
                                <h3>Primera ronda</h3>
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ID Torneig</th>
                                    <th scope="col">Participant</th>
                                    <th scope="col">Nom ingame</th>
                                    <th class="text-center" scope="col">Ronda 1</th>
                                    <th class="text-center" scope="col">Imatge</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($participants as $row){
                                    //echo $row->nomF.": ".$row->tipusF."<br>";
                                    echo '<tr>';
                                    echo '<td scope="row">'.$row->idTorneo.'</td>';
                                    echo '<td scope="row">'.$row->participant.'</td>';
                                    echo '<td scope="row">'.$row->ingame.'</td>';
                                    echo '<td scope="row">'.$row->ronda_1.'</td>';
                                    if($row->foto1 == null){
                                        echo '<td class="text-center zoom" scope="row">Imatge no pujada</td>';
                                    }else{
                                        echo '<td class="text-center zoom" scope="row"><img class="w-50" src="data:'.$row->tipus1.';base64,'.base64_encode($row->foto1) .'" alt="Card image cap"></td>';
                                    }
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                                </table>
                                <h3>Segona ronda</h3>

                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ID Torneig</th>
                                    <th scope="col">Participant</th>
                                    <th scope="col">Nom ingame</th>
                                    <th class="text-center" scope="col">Ronda 2</th>
                                    <th class="text-center" scope="col">Imatge</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($participants as $row){
                                    //echo $row->nomF.": ".$row->tipusF."<br>";
                                    echo '<tr>';
                                    echo '<td scope="row">'.$row->idTorneo.'</td>';
                                    echo '<td scope="row">'.$row->participant.'</td>';
                                    echo '<td scope="row">'.$row->ingame.'</td>';
                                    echo '<td scope="row">'.$row->ronda_2.'</td>';
                                    if($row->foto2 == null){
                                        echo '<td class="text-center zoom" scope="row">Imatge no pujada</td>';
                                    }else{
                                        echo '<td class="text-center zoom" scope="row"><img class="w-50" src="data:'.$row->tipus2.';base64,'.base64_encode($row->foto2) .'" alt="Card image cap"></td>';
                                    }
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                                </table>
                            <?php
                        }else if($result->places == 8){
                            ?>
                                <h3>Primera ronda</h3>
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ID Torneig</th>
                                    <th scope="col">Participant</th>
                                    <th scope="col">Nom ingame</th>
                                    <th class="text-center" scope="col">Ronda 1</th>
                                    <th class="text-center" scope="col">Imatge</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($participants as $row){
                                    //echo $row->nomF.": ".$row->tipusF."<br>";
                                    echo '<tr>';
                                    echo '<td scope="row">'.$row->idTorneo.'</td>';
                                    echo '<td scope="row">'.$row->participant.'</td>';
                                    echo '<td scope="row">'.$row->ingame.'</td>';
                                    echo '<td scope="row">'.$row->ronda_1.'</td>';
                                    if($row->foto1 == null){
                                        echo '<td class="text-center zoom" scope="row">Imatge no pujada</td>';
                                    }else{
                                        echo '<td class="text-center zoom" scope="row"><img class="w-50" src="data:'.$row->tipus1.';base64,'.base64_encode($row->foto1) .'" alt="Card image cap"></td>';
                                    }
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                                </table>
                                <h3>Segona ronda</h3>

                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ID Torneig</th>
                                    <th scope="col">Participant</th>
                                    <th scope="col">Nom ingame</th>
                                    <th class="text-center" scope="col">Ronda 2</th>
                                    <th class="text-center" scope="col">Imatge</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($participants as $row){
                                    //echo $row->nomF.": ".$row->tipusF."<br>";
                                    echo '<tr>';
                                    echo '<td scope="row">'.$row->idTorneo.'</td>';
                                    echo '<td scope="row">'.$row->participant.'</td>';
                                    echo '<td scope="row">'.$row->ingame.'</td>';
                                    echo '<td scope="row">'.$row->ronda_2.'</td>';
                                    if($row->foto2 == null){
                                        echo '<td class="text-center zoom" scope="row">Imatge no pujada</td>';
                                    }else{
                                        echo '<td class="text-center zoom" scope="row"><img class="w-50" src="data:'.$row->tipus2.';base64,'.base64_encode($row->foto2) .'" alt="Card image cap"></td>';
                                    }
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                                </table>

                                <h3>Tercera ronda</h3>

                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ID Torneig</th>
                                    <th scope="col">Participant</th>
                                    <th scope="col">Nom ingame</th>
                                    <th class="text-center" scope="col">Ronda 3</th>
                                    <th class="text-center" scope="col">Imatge</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($participants as $row){
                                    //echo $row->nomF.": ".$row->tipusF."<br>";
                                    echo '<tr>';
                                    echo '<td scope="row">'.$row->idTorneo.'</td>';
                                    echo '<td scope="row">'.$row->participant.'</td>';
                                    echo '<td scope="row">'.$row->ingame.'</td>';
                                    echo '<td scope="row">'.$row->ronda_3.'</td>';
                                    if($row->foto3 == null){
                                        echo '<td class="text-center zoom" scope="row">Imatge no pujada</td>';
                                    }else{
                                        echo '<td class="text-center zoom" scope="row"><img class="w-50" src="data:'.$row->tipus3.';base64,'.base64_encode($row->foto3) .'" alt="Card image cap"></td>';
                                    }
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                                </table>
                            <?php
                        }
                    ?>
                </div>
                
            </div>
            <div class="col-lg-6">
                <div class="marco">
                    <h3>Inserció de resultats</h3>
                        <?php
                            if($result->places == 2){
                                ?>  
                                    <h4>Primera ronda</h4>
                                    <?php echo form_open('showdown/admin_partida/'.$result->codiTorneig); ?>
                                    <div class="mt-4 col">
                                        <select class="form-control" name="participant">
                                            <option value="">Selecciona el concursant...</option>
                                            <?php 
                                            foreach($participants as $row)
                                            { 
                                                echo '<option value="'.$row->ingame.'">'.$row->ingame.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('participant'); ?>
                                    </div>
                                    <div class="mt-2 col">
                                        <label for="resultat" class="sr-only">Resultat</label>
                                        <?php 
                                        $valueRes=(!empty($res))?$res:'';
                                        $dataRes = array(
                                            'name' => 'resultat',
                                            'value' => $valueRes,
                                            'class' => 'form-control',
                                            'type' => 'number',
                                            'placeholder' => 'Resultat'
                                        );
                                        echo form_input($dataRes);
                                        echo form_error('resultat'); ?>
                                    </div>
                                    <div class="form-group pt-5 text-center">
                                        <button name="ingressar1" type="submit" class="btn btn-primary"><span>GUARDAR</span></button>
                                    </div>
                                    <?php echo form_close(); ?>
                                <?php
                            }else if($result->places == 4){
                                ?>  
                                    <h4>Primera ronda</h4>
                                    <?php echo form_open('showdown/admin_partida/'.$result->codiTorneig); ?>
                                    <div class="mt-4 col">
                                        <select class="form-control" name="participant">
                                            <option value="">Selecciona el concursant...</option>
                                            <?php 
                                            foreach($participants as $row)
                                            { 
                                                echo '<option value="'.$row->ingame.'">'.$row->ingame.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('participant'); ?>
                                    </div>
                                    <div class="mt-2 col">
                                        <label for="resultat" class="sr-only">Resultat</label>
                                        <?php 
                                        $valueRes=(!empty($res))?$res:'';
                                        $dataRes = array(
                                            'name' => 'resultat',
                                            'value' => $valueRes,
                                            'class' => 'form-control',
                                            'type' => 'number',
                                            'placeholder' => 'Resultat'
                                        );
                                        echo form_input($dataRes);
                                        echo form_error('resultat'); ?>
                                    </div>
                                    <div class="form-group pt-5 text-center">
                                        <button name="ingressar1" type="submit" class="btn btn-primary"><span>GUARDAR</span></button>
                                    </div>
                                    <?php echo form_close(); ?>

                                    <h4>Segona ronda</h4>
                                    <?php echo form_open('showdown/admin_partida/'.$result->codiTorneig); ?>
                                    <div class="mt-4 col">
                                        <select class="form-control" name="participant">
                                            <option value="">Selecciona el concursant...</option>
                                            <?php 
                                            foreach($participants as $row)
                                            { 
                                                echo '<option value="'.$row->ingame.'">'.$row->ingame.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('participant'); ?>
                                    </div>
                                    <div class="mt-2 col">
                                        <label for="resultat" class="sr-only">Resultat</label>
                                        <?php 
                                        $valueRes=(!empty($res))?$res:'';
                                        $dataRes = array(
                                            'name' => 'resultat',
                                            'value' => $valueRes,
                                            'class' => 'form-control',
                                            'type' => 'number',
                                            'placeholder' => 'Resultat'
                                        );
                                        echo form_input($dataRes);
                                        echo form_error('resultat'); ?>
                                    </div>
                                    <div class="form-group pt-5 text-center">
                                        <button name="ingressar2" type="submit" class="btn btn-primary"><span>GUARDAR</span></button>
                                    </div>
                                    <?php echo form_close(); ?>
                                <?php
                            }else if($result->places == 8){
                                ?>  
                                    <h4>Primera ronda</h4>
                                    <?php echo form_open('showdown/admin_partida/'.$result->codiTorneig); ?>
                                    <div class="mt-4 col">
                                        <select class="form-control" name="participant">
                                            <option value="">Selecciona el concursant...</option>
                                            <?php 
                                            foreach($participants as $row)
                                            { 
                                                echo '<option value="'.$row->ingame.'">'.$row->ingame.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('participant'); ?>
                                    </div>
                                    <div class="mt-2 col">
                                        <label for="resultat" class="sr-only">Resultat</label>
                                        <?php 
                                        $valueRes=(!empty($res))?$res:'';
                                        $dataRes = array(
                                            'name' => 'resultat',
                                            'value' => $valueRes,
                                            'class' => 'form-control',
                                            'type' => 'number',
                                            'placeholder' => 'Resultat'
                                        );
                                        echo form_input($dataRes);
                                        echo form_error('resultat'); ?>
                                    </div>
                                    <div class="form-group pt-5 text-center">
                                        <button name="ingressar1" type="submit" class="btn btn-primary"><span>GUARDAR</span></button>
                                    </div>
                                    <?php echo form_close(); ?>

                                    <h4>Segona ronda</h4>
                                    <?php echo form_open('showdown/admin_partida/'.$result->codiTorneig); ?>
                                    <div class="mt-4 col">
                                        <select class="form-control" name="participant">
                                            <option value="">Selecciona el concursant...</option>
                                            <?php 
                                            foreach($participants as $row)
                                            { 
                                                echo '<option value="'.$row->ingame.'">'.$row->ingame.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('participant'); ?>
                                    </div>
                                    <div class="mt-2 col">
                                        <label for="resultat" class="sr-only">Resultat</label>
                                        <?php 
                                        $valueRes=(!empty($res))?$res:'';
                                        $dataRes = array(
                                            'name' => 'resultat',
                                            'value' => $valueRes,
                                            'class' => 'form-control',
                                            'type' => 'number',
                                            'placeholder' => 'Resultat'
                                        );
                                        echo form_input($dataRes);
                                        echo form_error('resultat'); ?>
                                    </div>
                                    <div class="form-group pt-5 text-center">
                                        <button name="ingressar2" type="submit" class="btn btn-primary"><span>GUARDAR</span></button>
                                    </div>
                                    <?php echo form_close(); ?>

                                    <h4>Tercera ronda</h4>
                                    <?php echo form_open('showdown/admin_partida/'.$result->codiTorneig); ?>
                                    <div class="mt-4 col">
                                        <select class="form-control" name="participant">
                                            <option value="">Selecciona el concursant...</option>
                                            <?php 
                                            foreach($participants as $row)
                                            { 
                                                echo '<option value="'.$row->ingame.'">'.$row->ingame.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('participant'); ?>
                                    </div>
                                    <div class="mt-2 col">
                                        <label for="resultat" class="sr-only">Resultat</label>
                                        <?php 
                                        $valueRes=(!empty($res))?$res:'';
                                        $dataRes = array(
                                            'name' => 'resultat',
                                            'value' => $valueRes,
                                            'class' => 'form-control',
                                            'type' => 'number',
                                            'placeholder' => 'Resultat'
                                        );
                                        echo form_input($dataRes);
                                        echo form_error('resultat'); ?>
                                    </div>
                                    <div class="form-group pt-5 text-center">
                                        <button name="ingressar3" type="submit" class="btn btn-primary"><span>GUARDAR</span></button>
                                    </div>
                                    <?php echo form_close(); ?>
                                <?php
                            }
                        ?>


                </div>
                
            </div>
        </div>
        

    </div>
</div>


<!-- /#page-content-wrapper -->

</div>

    

    <script src = "<?php echo base_url();?>js/test.js"></script>

    <script>
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });

        var baseURL= "<?php echo base_url();?>";

        var usuari = "<?php echo $this->session->userdata('username');?>";

        var codiTorneig = "<?php echo $result->codiTorneig?>";

        var places = "<?php echo $result->places?>";
    </script>
</body>
</html>