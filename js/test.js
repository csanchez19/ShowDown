window.onload = function(){
    $('.demo').bracket({
        init: fourteams,
        //parametres
        teamWidth: 82,
        scoreWidth: 48,
        matchMargin: 41,
        roundMargin: 77
    });

    if(document.getElementById("Fifa")){
        document.getElementById("Fifa").src="http://localhost/showdown/content/img/fifa.png";
    }
    
    if(document.getElementById("Street fighter")){
        document.getElementById("Street fighter").src="http://localhost/showdown/content/img/streetf.png";
    }
    
    if(document.getElementById("League of legends")){
        document.getElementById("League of legends").src="http://localhost/showdown/content/img/lol.png";
    }
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
        ["Andres","Carles"],// First match
        ["Albert","Jesus"] // Second match
    ],
    "results": [           // List of brackets (single elimination, so only one bracket)

        [                    // List of rounds in bracket
        [                  // First round in this bracket
            [3, 0],          // Team 1 vs Team 2
            [1, 2]          // Team 3 vs Team 4
        ],
        [                  // Second (final) round in single elimination bracket
            [3, 2],          // Match for first place
            [0, 1]           // Match for 3rd place
        ]
        ]
    ]
}


var eightteams = {
    teams : [
      ["ejsu",  "albert" ],
      ["",  "" ],
      ["",  "" ],
      ["",  "" ]
    ],
    results : [[ /* WINNER BRACKET */
      [[1,2], [3,4], [5,6], [7,8]],
      [[9,1], [8,2]],
      [[1,3]]
    ], [         /* LOSER BRACKET */
      [[5,1], [1,2], [3,2], [6,9]],
      [[1,2], [3,1]],
      [[4,2]]
    ]]
  }

