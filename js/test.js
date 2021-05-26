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
    
    $('.demo').bracket({
        init: fourteams,
        //parametres
        teamWidth: 82,
        scoreWidth: 48,
        matchMargin: 41,
        roundMargin: 77
    });

    
}

var twoteams = {
    "teams": [             // Matchups
        ["",""]// First match
    ],
    "results": [           // List of brackets (single elimination, so only one bracket)

        [                    // List of rounds in bracket
        [                  // First round in this bracket
            [, ]          // Team 1 vs Team 2
        ]
        ]
    ]
}

var fourteams = {

    "teams": [             // Matchups
        ["",""],// First match
        ["",""] // Second match
    ],
    "results": [           // List of brackets (single elimination, so only one bracket)

        [                    // List of rounds in bracket
        [                  // First round in this bracket
            [, ],          // Team 1 vs Team 2
            [, ]          // Team 3 vs Team 4
        ],
        [                  // Second (final) round in single elimination bracket
            [, ],          // Match for first place
            [, ]           // Match for 3rd place
        ]
        ]
    ]
}


var eightteams = {
    teams : [
      ["jesu",  "albert" ],
      ["",  "" ],
      ["",  "" ],
      ["",  "" ]
    ],
    results : [[ /* WINNER BRACKET */
      [[0,3], [,], [,], [,]],
      [[,], [,]],
      [[,]]
    ], [         /* LOSER BRACKET */
      [[,], [,], [,], [,]],
      [[,], [,]],
      [[,]]
    ]]
  }

