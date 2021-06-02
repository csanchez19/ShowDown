window.onload = function(){
  if(document.getElementById("Fifa")){
      document.getElementById("Fifa").src="http://localhost/showdown/content/img/3.png";
  }
  
  if(document.getElementById("Street fighter")){
      document.getElementById("Street fighter").src="http://localhost/showdown/content/img/2.png";
  }
  
  if(document.getElementById("League of legends")){
      document.getElementById("League of legends").src="http://localhost/showdown/content/img/1.png";
  }
  
  bracket();

  //console.log(codiTorneig);

}

function bracket(){

if(places == 2){
  var xhttp = new XMLHttpRequest();

  xhttp.open("GET", baseURL + "index.php/showdown/selPartida/" + codiTorneig, true);

  xhttp.send();

  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      console.log(xhttp.responseText);

      var data = jQuery.parseJSON(xhttp.responseText);

      var twoteams = {
        "teams": [             // Matchups
          [(data[0] != null ? data[0].ingame : ""), (data[1] != null ? data[1].ingame : "")]// First match
        ],
        "results": [           // List of brackets (single elimination, so only one bracket)
    
            [                    // List of rounds in bracket
            [                  // First round in this bracket
                [(data[0] != null ? parseInt(data[0].ronda_1) : null), (data[1] != null ? parseInt(data[1].ronda_1) : null)]          // Team 1 vs Team 2
            ]
            ]
        ]
      }

      $('.demo').bracket({
        init: twoteams,
        //skipGrandFinalComeback: true,
        //parametres
        teamWidth: 82,
        scoreWidth: 48,
        matchMargin: 41,
        roundMargin: 35
      });

      var pujarPartides = twoteams.teams;

      console.log(pujarPartides);
    }
  }

}else if(places == 4){
  var xhttp = new XMLHttpRequest();

  xhttp.open("GET", baseURL + "index.php/showdown/selPartida/" + codiTorneig, true);

  xhttp.send();

  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      console.log(xhttp.responseText);

      var data = jQuery.parseJSON(xhttp.responseText);

      var fourteams = {

        "teams": [             // Matchups
          [(data[0] != null ? data[0].ingame : ""), (data[1] != null ? data[1].ingame : "")], //First match
          [(data[2] != null ? data[2].ingame : ""), (data[3] != null ? data[3].ingame : "")]  //second match
        ],
        "results": [           // List of brackets (single elimination, so only one bracket)
    
            [                    // List of rounds in bracket
            [                  // First round in this bracket
                [(data[0] != null ? parseInt(data[0].ronda_1) : null), (data[1] != null ? parseInt(data[1].ronda_1) : null)],          // Team 1 vs Team 2
                [(data[2] != null ? parseInt(data[2].ronda_1) : null), (data[3] != null ? parseInt(data[3].ronda_1) : null)]          // Team 3 vs Team 4
            ],
            [                  // Second (final) round in single elimination bracket
                [(parseInt(data[0].ronda_1) > parseInt(data[1].ronda_1) ? parseInt(data[0].ronda_2) : parseInt(data[1].ronda_2)), (parseInt(data[2].ronda_1) > parseInt(data[3].ronda_1) ? parseInt(data[2].ronda_2) : parseInt(data[3].ronda_2))],          // Match for first place
                [(parseInt(data[0].ronda_1) < parseInt(data[1].ronda_1) ? parseInt(data[0].ronda_2) : parseInt(data[1].ronda_2)), (parseInt(data[2].ronda_1) < parseInt(data[3].ronda_1) ? parseInt(data[2].ronda_2) : parseInt(data[3].ronda_2))]           // Match for 3rd place
            ]
            ]
        ]
      }

      $('.demo').bracket({
        init: fourteams,
        //skipGrandFinalComeback: true,
        //parametres
        teamWidth: 82,
        scoreWidth: 48,
        matchMargin: 41,
        roundMargin: 77
      });
    }
  }

}else if(places == 8){
  var xhttp = new XMLHttpRequest();

  xhttp.open("GET", baseURL + "index.php/showdown/selPartida/" + codiTorneig, true);

  xhttp.send();

  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      console.log(xhttp.responseText);

      var data = jQuery.parseJSON(xhttp.responseText);

      function final1(data){

        var find = [];

        for(var i = 0; i < data.length; i++){
          if(data[i].ronda_2 != null){
            find.push(data[i]);
          }
          
        }

        //console.log(find[0].ronda_2 + find[1].ronda_2 + find[2].ronda_2 + find[3].ronda_2);

        if(parseInt(find[0].ronda_2) > parseInt(find[1].ronda_2)){
          return parseInt(find[0].ronda_3)
        }else{
          return parseInt(find[1].ronda_3)
        }

      }

      function final2(data){

        var find = [];

        for(var i = 0; i < data.length; i++){
          if(data[i].ronda_2 != null){
            find.push(data[i]);
          }
          
        }

        if(parseInt(find[2].ronda_2) > parseInt(find[3].ronda_2)){
          return parseInt(find[2].ronda_3)
        }else{
          return parseInt(find[3].ronda_3)
        }

      }

      function final3(data){
        var find = [];

        for(var i = 0; i < data.length; i++){
          if(data[i].ronda_2 != null){
            find.push(data[i]);
          }
          
        }

        //console.log(find[0].ronda_2 + find[1].ronda_2 + find[2].ronda_2 + find[3].ronda_2);

        if(parseInt(find[0].ronda_2) < parseInt(find[1].ronda_2)){
          return parseInt(find[0].ronda_3)
        }else{
          return parseInt(find[1].ronda_3)
        }
      }

      function final4(data){
        var find = [];

        for(var i = 0; i < data.length; i++){
          if(data[i].ronda_2 != null){
            find.push(data[i]);
          }
          
        }

        if(parseInt(find[2].ronda_2) < parseInt(find[3].ronda_2)){
          return parseInt(find[2].ronda_3)
        }else{
          return parseInt(find[3].ronda_3)
        }
      }

      var eightteams = {
        teams: [
          [(data[0] != null ? data[0].ingame : ""), (data[1] != null ? data[1].ingame : "")],
          [(data[2] != null ? data[2].ingame : ""), (data[3] != null ? data[3].ingame : "")],
          [(data[4] != null ? data[4].ingame : ""), (data[5] != null ? data[5].ingame : "")],
          [(data[6] != null ? data[6].ingame : ""), (data[7] != null ? data[7].ingame : "")]
        ],
        results: [
            [
              [[(data[0] != null ? parseInt(data[0].ronda_1) : null), (data[1] != null ? parseInt(data[1].ronda_1) : null)], [(data[2] != null ? parseInt(data[2].ronda_1) : null), (data[3] != null ? parseInt(data[3].ronda_1) : null)], [(data[4] != null ? parseInt(data[4].ronda_1) : null), (data[5] != null ? parseInt(data[5].ronda_1) : null)], [(data[6] != null ? parseInt(data[6].ronda_1) : null), (data[7] != null ? parseInt(data[7].ronda_1) : null)]], //primeres 4 rondes
              [[(parseInt(data[0].ronda_1) > parseInt(data[1].ronda_1) ? parseInt(data[0].ronda_2) : parseInt(data[1].ronda_2)), (parseInt(data[2].ronda_1) > parseInt(data[3].ronda_1) ? parseInt(data[2].ronda_2) : parseInt(data[3].ronda_2))], [(parseInt(data[4].ronda_1) > parseInt(data[5].ronda_1) ? parseInt(data[4].ronda_2) : parseInt(data[5].ronda_2)), (parseInt(data[6].ronda_1) > parseInt(data[7].ronda_1) ? parseInt(data[6].ronda_2) : parseInt(data[7].ronda_2))]], //semis 
              [[final1(data), final2(data)], [final3(data), final4(data)]] //final. tercer lloc
            ]
        ]
      }

      $('.demo').bracket({
        init: eightteams,
        //skipGrandFinalComeback: true,
        //parametres
        teamWidth: 82,
        scoreWidth: 48,
        matchMargin: 41,
        roundMargin: 34
      });

      //var pujarPartides = eightteams.teams;

      //console.log(pujarPartides);

    }
  }
}

}



