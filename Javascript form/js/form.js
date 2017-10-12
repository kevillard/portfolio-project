var form = document.getElementById('contactform');

function remplissage(champ, erreur) {
    if (erreur) {
        champ.style.backgroundColor = "#fba";
    } else {
        champ.style.backgroundColor = "";
    }
}
form.addEventListener('submit', function (e) {
            alert('Votre message a été envoyé !');
            e.preventDefault();
        });
form.addEventListener('reset', function (e) {
});