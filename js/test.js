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
        init: eightteams,
        skipGrandFinalComeback: true,
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
      ["carles",  "andres" ],
      ["xavi",  "alex" ],
      ["pablo",  null ]
    ],
    results : [[ /* WINNER BRACKET */
      [[0,3], [2,1], [1,0], [5,3]],
      [[1,2], [5,1]],
      [[2,1]]
    ], [         /* LOSER BRACKET */
      [[2,1], [0,1], [5,3], [2,3]],
      [[1,0], [2,1]],
      [[1,3]]
    ]]
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

