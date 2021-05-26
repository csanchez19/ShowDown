
<div class="container-fluid top_div">
    <div class="row">
        <div class="text-center col-12 div_botones">
            <h1 class="text-center div_botones2">Tornejos</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="main_tournament">
        <div class="row d-block">
            <div class="col-12 first_half"></div>
        </div>
        <div class="row">
            <div class="col-12 main_tournament_text">
                <p class="text-left">Torneig increible</p>
                <div class="row">
                    <div class="col-6 text-left">
                        <p>21 places - MAIG 13, 15:00 EST</p>
                    </div>
                    <div class="col-6 text-right">
                        <p>Hello Kitty Online</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form method="post">
    <div class="container text-center marginado">
        <div class="row justify-content-center">
            <div class="col-5">
                <select class="form-control w-50" name="jocs" id="jocs">
                    <option value="">Selecciona el joc...</option>
                        <?php 
                            foreach($resultJocs as $row)
                            { 
                                echo '<option value="'.$row->Id.'">'.$row->Nom.'</option>';
                            }
                        ?>
                </select>
            </div>
            <div class="col-2">
                <button name="filterBtn" type="submit" class="custom-btn btn-7"><span>Filtrar</span></button>
            </div>
        </div>
    </div>  
</form>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="row justify-content-center">
            <?php
            $cont = 0;
            
            if(isset($_POST["filterBtn"]))
            {
                $joc = $_POST["jocs"];

                /*$query = 'SELECT * FROM torneig WHERE codiJoc = "'.$joc'"';

                $res = mysqli_query($query); */ 

                    foreach($result as $row){
                        echo '<style>
    
                        .fondoTorneo'.$cont.'
                        {
                            background: url('.base_url().'content/img/'.$row->Id.'.png);
                            background-size: cover;   
                            background-position: center;
                        }
                        
                        </style>';
                        echo '<div id="'.$row->Nom.'" class="col-lg-3 col-12 mt-lg-0 mt-5 m-lg-5 m-0 torneo1 fondoTorneo'.$cont.' torneo escalar">';
                        echo '<div class="row">';
                        echo '<div class="col-12 first_half"></div>';
                        echo '</div>';
                        echo '<div class="row">';
                        echo '<div class="col-12 tournament-text">';
                        echo '<p class="text-left">'.$row->nom.'</p>';
                        echo '<div class="row">';
                        echo '<div class="col-6">';
                        echo '<p class="text-left">Places: '.$row->places.', 18:00 EST</p>';
                        echo '</div>';
                        echo '<div class="col-6">';
                        echo '<p class="text-right">'.$row->Nom.'</p>';
                        echo '</div>';
                        echo '<div class="col">';
                        echo '<a class="btn btn-dark" href="'.base_url().'index.php/showdown/tournament/'.$row->codiTorneig.'">+info</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $cont++;
                    }
                
            }
            else
            {
                foreach($result as $row)
                {
                    echo '<style>

                    .fondoTorneo'.$cont.'
                    {
                        background: url('.base_url().'content/img/'.$row->Id.'.png);
                        background-size: cover;   
                        background-position: center;
                    }
                    
                    </style>';
                    echo '<div id="'.$row->Nom.'" class="col-lg-3 col-12 mt-lg-0 mt-5 m-lg-5 m-0 torneo1 fondoTorneo'.$cont.' torneo escalar">';
                    echo '<div class="row">';
                    echo '<div class="col-12 first_half"></div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<div class="col-12 tournament-text">';
                    echo '<p class="text-left">'.$row->nom.'</p>';
                    echo '<div class="row">';
                    echo '<div class="col-6">';
                    echo '<p class="text-left">Places: '.$row->places.', 18:00 EST</p>';
                    echo '</div>';
                    echo '<div class="col-6">';
                    echo '<p class="text-right">'.$row->Nom.'</p>';
                    echo '</div>';
                    echo '<div class="col">';
                    echo '<a class="btn btn-dark" href="'.base_url().'index.php/showdown/tournament/'.$row->codiTorneig.'">+info</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    $cont++;
                }
            }
            ?>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function(){


        /*
        // Find all images inside "image" id
        $("#image").find("img").each(function(){
            var $this = $(this),
                getClass = $this.attr('class'), // get class of this image
            splitClass = getClass.split("-"); // split the class by "-"

            if(splitClass[1] <= 20) {
            // If image class has number equal or below 20 (eg. img-1, img-2....)

                // Update the image source accordingly
                $this.attr("src", "plant.jpg");

            } else if (splitClass[1] <= 40) {
            // If image class has number equal or below 40
                $this.attr("src", "animal.jpg");


            } else {
                // Else condition - Rest of the image

                $this.attr("src", "default.jpg");
            }      

        });

        if(document.getElementById("Street fighter")){
            document.getElementById("Street fighter").style.background = "url('http://localhost/showdown/content/img/streetf.png')";
            document.getElementById("Street fighter").style.backgroundSize = "cover";
            document.getElementById("Street fighter").style.backgroundPosition = "center";
        }

        if(document.getElementById("Fifa")){
            document.getElementById("Fifa").style.background = "url('http://localhost/showdown/content/img/fifa.png')";
            document.getElementById("Fifa").style.backgroundSize = "cover";
            document.getElementById("Fifa").style.backgroundPosition = "center";
        }
        
        if(document.getElementById("League of legends")){
            document.getElementById("League of legends").style.background = "url('http://localhost/showdown/content/img/lol.png')";
            document.getElementById("League of legends").style.backgroundSize = "cover";
            document.getElementById("League of legends").style.backgroundPosition = "center";
        }*/

    }
</script>

<!--<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="row justify-content-center">
                <div class="col-3 torneo1 torneo escalar">
                    <div class="row">
                        <div class="col-12 first_half"></div>
                    </div>
                    <div class="row">
                        <div class="col-12 tournament-text">
                            <p class="text-left">Copa Demacia 5vs5</p>
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-left">8 Places MAIG 14, 18:00 EST</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-right">League Of Legends</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 offset-1 torneo1 torneo escalar">
                    <div class="row">
                            <div class="col-12 first_half"></div>
                        </div>
                        <div class="row">
                            <div class="col-12 tournament-text">
                            <p class="text-left">Street Fighter 1vs1</p>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="text-left">8 Places MAIG 14, 18:00 EST</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-right">Street Fighter</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-3 offset-1 torneo1 torneo escalar">
                    <div class="row">
                            <div class="col-12 first_half"></div>
                        </div>
                        <div class="row">
                            <div class="col-12 tournament-text">
                            <p class="text-left">Furbo 2vs2</p>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="text-left">8 Places MAIG 14, 18:00 EST</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-right">FIFA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>
</div>-->