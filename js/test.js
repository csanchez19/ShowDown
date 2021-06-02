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
                [, ]          // Team 1 vs Team 2
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
                [1, 2],          // Team 1 vs Team 2
                [3, 4]          // Team 3 vs Team 4
            ],
            [                  // Second (final) round in single elimination bracket
                [3, 2],          // Match for first place
                [, ]           // Match for 3rd place
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

      

      //console.log(ronda);

      var eightteams = {
        teams: [
          [(data[0] != null ? data[0].ingame : null), (data[1] != null ? data[1].ingame : null)],
          [(data[2] != null ? data[2].ingame : null), (data[3] != null ? data[3].ingame : null)],
          [(data[4] != null ? data[4].ingame : null), (data[5] != null ? data[5].ingame : null)],
          [(data[6] != null ? data[6].ingame : null), (data[7] != null ? data[7].ingame : null)]
        ],
        results: [
            [
              [[, ], [, ], [, ], [, ]], //primeres 4 rondes
              [[, ], [, ]], //semis 
              [[, ], [, ]] //final. tercer lloc
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

      var pujarPartides = eightteams.teams;

      console.log(pujarPartides);

    }
  }
}

}

  var bigData = {
    teams : [
      ["Team 1",  "Team 2" ],
      ["Team 3",  "Team 4" ],
      ["Team 5",  "Team 6" ],
      ["Team 7",  "Team 8" ],
      ["Team 9",  "Team 10"],
      ["Team 11", "Team 12"],
      ["Team 13", "Team 14"],
      ["Team 15", "Team 16"]
    ],
    results : [[ /* WINNER BRACKET */
      [[3,5], [2,4], [6,3], [2,3], [1,5], [5,3], [7,2], [1,2]],
      [[1,2], [3,4], [5,6], [7,8]],
      [[9,1], [8,2]],
      [[1,3]]
    ], [         /* LOSER BRACKET */
      [[5,1], [1,2], [3,2], [6,9]],
      [[8,2], [1,2], [6,2], [1,3]],
      [[1,2], [3,1]],
      [[3,0], [1,9]],
      [[3,2]],
      [[4,2]]
    ], [         /* FINALS */
      [[3,8], [1,2]],
      [[2,1]]
    ]]
  }

