<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="https://cdn.tutorialjinni.com/jquery-bracket/0.11.1/jquery.bracket.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b2f7b5e2e7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/home.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/medias.css">
    <link rel="shortcut icon" href="<?php echo base_url() ;?> favicon.png">
    <!--<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/custom.css">-->
    <script src="<?php echo base_url(); ?>hamburger/script.js"></script>

    <!--SCRIPTS-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!--SCRIPT BRACKET-->    
    <script src="https://cdn.tutorialjinni.com/jquery-bracket/0.11.1/jquery.bracket.min.js"></script>
	<!--SCRIPTS GENERALES-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!--SWEET ALERT-->
	<script src="sweetalert2.all.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="sweetalert2.min.js"></script>
    <!--Scripts nuestros-->
    <script src = "<?php echo base_url(); ?>js/functions.js"></script>

    <title><?= $title ?></title>
</head>
<body>

<style>
 
</style>

<div class="row">
    <div class="col-12 text-center">
        <a href="<?php echo base_url(); ?>"><img class="logo text-center" src="<?php echo base_url(); ?>content/img/logo.png" alt=""></a>
    </div>
	<?php
		if($this->session->userdata('username') != '')  
		{  
			echo '<div class="user">';
			echo '<p>Benvingut, <b>'.$this->session->userdata('username').'</b> <img class="fotoPerfil" src="'.base_url().'content/img/mario.jpg"></p>'; 
			echo '<a class="btn btn-dark" href="'.base_url().'index.php/showdown/logout">Logout</a>'; 
			echo '</div>';
		}  
	?>
</div>


<div  class="open">
	<span class="cls"></span>
	<span>
		<ul class="sub-menu ">
			<li>
      <?php echo '<a href="'.base_url().'index.php/showdown/perfil">Perfil</a>' ?>
			</li>
			<li>
				<a href="#winners" title="Winners League">Winners League</a>
			</li>
			<li>
				<?php echo '<a href="'.base_url().'index.php/showdown/termes">Termes i Condicions</a>' ?>
			</li>
		</ul>
	</span>
	<span class="cls"></span>
</div>

    <?= $contents ?>


    <!-- Footer -->
<footer style="margin-top: 7rem" class="text-center text-white">
  <!-- Grid container -->
  <div class="container-fluid p-4">
    <section class="mb-4">
      <p>
        A ShowDown volem crear un entorn que faciliti la creació i gestió de tornejos online d'una manera intuïtiva i casual.

      </p>
    </section>

    <!-- Section: Links -->
    <section class="">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-12  mb-4 mb-md-0">
          <h5 class="text-uppercase">Navega</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Perfil</a>
            </li>
            <li>
              <a href="#!" class="text-white">Winners League</a>
            </li>
            <li>
              <a href="#!" class="text-white">Termes i condicions</a>
            </li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-4 col-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">Xarxes Socials</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Facebook</a>
            </li>
            <li>
              <a href="#!" class="text-white">Twitter</a>
            </li>
            <li>
              <a href="#!" class="text-white">Instagram</a>
            </li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-4 col-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">Contacte</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <p>Tel: 661643232</p>
            </li>
            <li>
              <p>Email 1: anlon636@gmail.com</p>
            </li>
            <li>
              <p>Email 2: csanchezf197@gmail.com</p>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>

  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright: ShowDown!
  </div>
</footer>

    <script>
     $(document).ready(function() {
        $(document).delegate('.open', 'click', function(event){
            $(this).addClass('oppenned');
            event.stopPropagation();
        })
        $(document).delegate('body', 'click', function(event) {
            $('.open').removeClass('oppenned');
        })
        $(document).delegate('.cls', 'click', function(event){
            $('.open').removeClass('oppenned');
            event.stopPropagation();
        });
    });

    function goRegister()
    {
        window.location.href = "/ShowDown/index.php/showdown/register_user";
    }

    function goLogin()
    {
        window.location.href = "/ShowDown/index.php/showdown/login";
    }
    </script>
    

</body>
</html>