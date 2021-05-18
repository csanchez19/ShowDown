<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="https://cdn.tutorialjinni.com/jquery-bracket/0.11.1/jquery.bracket.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/home.css">
    <link rel="shortcut icon" href="<?php echo base_url() ;?> favicon.png">
    <!--<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/custom.css">-->
    <script src="<?php echo base_url(); ?>hamburger/script.js"></script>
    <!--SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!--SCRIPT BRACKET-->    
    <script src="https://cdn.tutorialjinni.com/jquery-bracket/0.11.1/jquery.bracket.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title><?= $title ?></title>
</head>
<body>

<div class="row">
    <div class="col-12 text-center">
        <img class="logo text-center" src="<?php echo base_url(); ?>content/img/logo.png" alt="">
    </div>
</div>


<div  class="open">
	<span class="cls"></span>
	<span>
		<ul class="sub-menu ">
			<li>
				<a href="#perfil" title="perfil">Perfil</a>
			</li>
			<li>
				<a href="#winners" title="Winners League">Winners League</a>
			</li>
			<li>
				<a href="#termes" title="Termes i condicions">Termes i condicions</a>
			</li>
		</ul>
	</span>
	<span class="cls"></span>
</div>

    <?= $contents ?>


    <footer>Tu copyright</footer>

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
        $.get("showdown/register_user");
    }

    function goLogin()
    {
        $.get("showdown/login");
    }
    </script>
    

</body>
</html>