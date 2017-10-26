$(document).ready(function(){


    $("#submit").click(function{


        $.post(

            'traitement.php',

            {

                firstname: $("#first_name").val(),
                lastname: $("#last_name").val(),
                codepostal: $("#cp").val(),
                town: $("#ville").val(),
                email: $("#mel").val(),
                message: $("#msgs").val()

            },


            function(data){ // Cette fonction ne fait rien encore, nous la mettrons à jour plus tard

            },


            'text' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !

         );


    });


});