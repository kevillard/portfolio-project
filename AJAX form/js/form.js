$(document).ready(function(){


    $("#submit").click(function{


        $.ajax({

                url: 'traitement.php',
                type: 'POST',
                data: ""
                
                firstname: $("#first_name").val(),
                lastname: $("#last_name").val(),
                codepostal: $("#cp").val(),
                town: $("#ville").val(),
                email: $("#mel").val(),
                message: $("#msgs").val()

            },


            function(data){

                if(data == 'msgagree'){

                     $("#resultat").html("<p>Votre message a bien été envoyé !</p>");
                }
                else{

                     $("#resultat").html("<p>Votre n'a pas pu être envoyé !</p>");
                }
        
            },


            'text'

         );


    });


});