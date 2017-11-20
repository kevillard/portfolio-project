$(document).ready(function(){


    $("#contactform").submit(function(e){
            e.preventDefault();
        var formulaire = {
                       
                firstname: $("#first_name").val(),
                lastname: $("#last_name").val(),
                codepostal: $("#cp").val(),
                town: $("#ville").val(),
                email: $("#mel").val(),
                message: $("#msgs").val()

}

        $.ajax({

                url: '../traitement.php',
                type: 'POST',
                data: formulaire,
                success: function(result) {
                    
                    if(result.firstname == false){
                        $('#first_name').css('border', '1px solid red');
                    } else if (result.lastname == false){
                        $('#last_name').css('border', '1px solid red');
                    } else if (result.codep == false){
                        $('#cp').css('border', '1px solid red');
                    } else if (result.email == false){
                        $('#mel').css('border', '1px solid red');
                    } else if (result.town == false) {
                        $('#ville').css('border', '1px solid red');
                    } else if (result.message == false) {
                        $('#msgs').css('border', '1px solid red');
                    } else {
                        $("#result").append("<p>"+formulaire+"</p>");
                        $("#result").css('color', 'green');
                        $("#result").addClass('text-center');
                    }
                },
                error: function(result) {
            $("#result").append("<p>Des erreurs ont été trouvées dans votre formulaire !</p>");
        }

            },

            'json'

         );


    });


});