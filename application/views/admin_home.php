<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/admin.css">
    <!--SCRIPT JBRACKET-->
    <script src="<?php echo base_url(); ?>jquery-bracket-master/dist/jquery.bracket.min.js"></script>

    <link type="text/css" href="<?php echo base_url(); ?>jquery-bracket-master/dist/jquery.bracket.min.css" rel="stylesheet">

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
            <div class="col-lg-12">
                <div class=" marco">
                    <h3>Llista de tornejos per validar</h3>

                    <!--<?php echo form_open_multipart('Controlador_Final/Gestio');?>
                        <div class="form-group">
                            <input type="file" class="form-control" name="userfile" size="20" />
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Pujar" name="pujar" />
                        </div>
                        <div style="color:red">
                            <?php echo validation_errors(); ?>
                            <?php if(isset($error)){print $error;}?>
                        </div>
                    </form>-->
                </div>
                
            </div>
        </div>
        

    </div>
</div>


<!-- /#page-content-wrapper -->

</div>

    <!--Scripts-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
</html>