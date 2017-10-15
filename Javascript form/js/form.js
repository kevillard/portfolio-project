var form = document.getElementById('contactform');

function verifFirstName(champ) {

    var tooltips1 = document.getElementById('tooltips1');
    if (champ.value.length == 0) {
        champ.style.borderColor = "";
        tooltips1.style.display = "none";
        return false;

    } else if (champ.value.length < 3) {
        champ.style.border = "1px solid red";
        tooltips1.style.display = "inline-block";
        return false;
    } else {
        champ.style.border = "1px solid green";
        tooltips1.style.display = "none";
        return true;
    }
}

function verifLastName(champ) {

    var tooltips2 = document.getElementById('tooltips2');
    if (champ.value.length == 0) {
        champ.style.borderColor = "";
        tooltips2.style.display = "none";
        return false;
    } else if (champ.value.length < 3) {
        champ.style.border = "1px solid red";
        tooltips2.style.display = "inline-block";
        return false;
    } else {
        champ.style.border = "1px solid green";
        tooltips2.style.display = "none";
        return true;
    }
}

function verifCodePostal(champ) {
    var nan = isNaN(champ.value);
    var tooltips3 = document.getElementById('tooltips3');

    if (champ.value.length == 0) {
        champ.style.borderColor = "";
        tooltips3.style.display = "none";
        return false;
    } else if (champ.value.length != 5 || nan) {
        champ.style.border = "1px solid red";
        tooltips3.style.display = "inline-block";
        return false;
    } else {
        champ.style.border = "1px solid green";
        tooltips3.style.display = "none";
        return true;
    }
}

function verifVille(champ) {

    if (champ.value.length == 0) {
        champ.style.borderColor = "";
        return false;
    } // Rajouter un else if pour le GEO API 
    else {
        champ.style.border = "1px solid green";
        return true;
    }
}

function verifEmail(champ) {
    var tooltips4 = document.getElementById('tooltips4');
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if (regex.test(champ.value)) {
        champ.style.border = "1px solid green";
        tooltips4.style.display = "none";
        return true;
    } else if (champ.value.length == 0) {
        champ.style.border = "";
        tooltips4.style.display = "none";
    } else {
        champ.style.border = "1px solid red";
        tooltips4.style.display = "inline-block";
    }
}

function verifMsg(champ) {
    var tooltips5 = document.getElementById('tooltips5');

    if (champ.value.length < 15) {
        champ.style.border = "1px solid red";
        tooltips5.style.display = "inline-block";
    } else {
        champ.style.border = "";
        tooltips5.style.display = "none";
    }
}

/*function validation() {
    if (verif == "OK") {
        alert('Votre message a été envoyé')
    } else {
        alert("Votre message n'a pas pu être envoyé")
    }
}*/
/* firstname doit avoir 3 caractères minimum
   lastname doit avoir 3 caractères minimum
   codep doit être composé de 5 numéros (pas de lettres)*/
