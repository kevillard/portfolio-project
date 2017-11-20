/*formulaire*/
$(document).ready(function () {
    $("#contactform").validate({
        rules: {
            lastname: {
                required: true,
                minlength: 3
            },
            firstname: {
                required: true,
                minlength: 3
            },
            codep: {
                required: true,
                minlength: 5,
                digits: true
            },
            town: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            message: {
                required: true,
                rangelength: [15, 1000]
            }
        },
        messages: {
            lastname: {
                required: "Le champ 'Prénom' est requis",
                minlength: "Votre prénom doit faire au moins {0} caractères"
            },
            firstname: {
                required: "Le champ 'Nom' est requis",
                minlength: "Votre nom doit faire au moins {0} caractères"
            },
            codep: {
                required: "Le code postal est requis",
                minlength: "Le code postal est composé de {0} chiffres",
                digits: "Ce n'est pas un chiffre"
            },
            town: {
                required: "Veuillez spécifier votre ville",
                minlength: "Il manque des lettres à votre ville"
            },
            email: {
                required: "Une adresse email valide est requis"
            },
            message: {
                required: "Le champ 'Message' est requis",
                rangelength: "Votre message doit faire entre {0} et {1} caractères"
            }
        }


    })
});
