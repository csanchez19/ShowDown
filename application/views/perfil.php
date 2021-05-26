<title>Perfil</title>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/register.css">

<div class="container-fluid top_div">
    <div class="row">
        <div class="text-center col-12 div_botones">
            <h1 style="" class="text-center div_botones2">El meu Perfil</h1>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-2 col-6">
                    <img class="w-100" style="border-radius: 100%" src="<?php echo base_url(); ?>content/img/mario.jpg">
                </div>
                <div class="col-12 col-lg-2 textProfile">
                    <p class="mt-5" style="font-size: 1.7em"><?php echo $result->usuari; ?></p>
                    <p class="">Membre des de <?php echo $result->dataCreat; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container marginado">
    <h1 class="title">Estadístiques Generals</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-3 col-12 mt-lg-0 mt-5 text-center cajaPerfil">
            <span class="">0</span>
            <p class="">Tornejos Creats</p>
        </div>
        <div class="col-lg-3 offset-lg-1 mt-lg-0 col-12 mt-5 text-center cajaPerfil">
            <span class="">0</span>
            <p class="">Participacions a Tornejos</p>
        </div>
        <div class="col-lg-3 offset-lg-1 mt-lg-0 mt-5 col-12 text-center cajaPerfil">
            <span class="">0</span>
            <p class="">Partides Jugades</p>
            <p style="color: rgb()"></p>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-lg-3 col-12 mt-lg-0 mt-5 text-center cajaPerfil cajaPerfil2">
            <div class="row">
                <div class="col-4 leftSquare">
                    <img src="<?php echo base_url(); ?>content/img/trophyGranate.png" class="w-100 mt-4" alt="">
                    <p class="position mt-4">1ST</p>
                </div>
                <div class="col-8">
                    <span class="">0</span>
                    <p class="mt-5">Tornejos Guanyats</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 offset-lg-1 col-12 mt-lg-0 mt-5 text-center cajaPerfil cajaPerfil2">
            <div class="row">
                <div class="col-4 leftSquare">
                    <img src="<?php echo base_url(); ?>content/img/trophyGranate.png" style="visibility:hidden;" class="w-100 mt-4" alt="">
                    <p class="position mt-4">2ND</p>
                </div>
                <div class="col-8">
                    <span class="">0</span>
                    <p class="mt-5">Segona Posició</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 offset-lg-1 col-12 mt-lg-0 mt-5 text-center cajaPerfil cajaPerfil2">
            <div class="row">
                <div class="col-4 leftSquare">
                    <img src="<?php echo base_url(); ?>content/img/trophyGranate.png" style="visibility:hidden;" class="w-100 mt-4" alt="">
                    <p class="position mt-4">TOP 10</p>
                </div>
                <div class="col-8">
                    <span class="">0</span>
                    <p class="mt-5">Entre els 10 Millors</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row marginado">
        <div class="col-12 cajaMiTourn">
            <div class="row">
                <div class="col-12 text-center miTournTop">
                    <p class="pt-3 pb-1">Els meus Tornejos</p>
                </div>
                <div class="col-12">
                    <p style="visibility:hidden;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque maiores dolor exercitationem maxime voluptatibus
                        placeat et ut eaque laudantium, esse voluptatem officia, a modi facilis enim praesentium architecto. Veniam, labore?Lorem,
                        ipsum dolor sit amet consectetur adipisicing elit. At aspernatur ipsum deserunt, delectus repellendus non? Minus quos magni 
                        sint at voluptas. Ad neque accusantium quasi sed eligendi illo quia voluptate! Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Tempora vel, aliquid eum inventore itaque eos saepe cumque et, facilis nemo dolore, modi autem tempore in fugiat. 
                        Quibusdam necessitatibus totam voluptatibus! Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Eaque quasi quo mollitia cumque, consequuntur, aperiam dolorum at quidem corporis necessitatibus inventore deserunt! 
                        Quisquam sed ab ea itaque quam commodi nam! Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Architecto magnam magni autem quasi saepe inventore id rerum quis qui consequatur. 
                        Temporibus eveniet ipsum voluptatibus, repellat similique voluptatem asperiores reiciendis nesciunt!</p>
                </div>
            </div>
        </div>
    </div>
</div>