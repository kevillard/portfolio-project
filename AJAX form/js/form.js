$(document).ready(function(){


    $("#submit").click(function(){
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
                

            },

            'text'

         );


    });


});