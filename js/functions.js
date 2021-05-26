window.onload = function(){
    $('.demo').bracket({
        init: singleElimination
        });

    alert("EL ADMIN");

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

var singleElimination = {

    "teams": [             // Matchups
        ["Team 1","Team 2"],// First match
        ["Team 3","Team 4"] // Second match
    ],
    "results": [           // List of brackets (single elimination, so only one bracket)

        [                    // List of rounds in bracket
        [                  // First round in this bracket
            [1, 2],          // Team 1 vs Team 2
            [3, 4]           // Team 3 vs Team 4
        ],
        [                  // Second (final) round in single elimination bracket
            [5, 6],          // Match for first place
            [7, 8]           // Match for 3rd place
        ]
        ]
    ]
}