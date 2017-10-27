<?php

function tailleVar($variable, $taille_min, $taille_max) {
    global $_POST;
    if (!isset($_POST[$variable])){
        return false;
    } elseif (strlen($_POST[$variable]) < $taille_min) {
        return false;
    } elseif (strlen($_POST[$variable]) > $taille_max) {
        return false;
    } else {
        return true;
    }
}
function Validate() {
if (isset($_POST['firstname'])) {
    if(empty($_POST['firstname']) || !tailleVar('firstname',2,30) || !preg_match("/^[a-zA-Z]+$/", $_POST['firstname'])) {
        echo "Veuillez renseigner votre nom !";
        echo "<br>";
        header( "refresh:5; url=index.html" ); 
        return false;
    }
} 
if (isset($_POST['lastname'])) {
    if(empty($_POST['lastname']) || !tailleVar('lastname',2,30) || !preg_match("/^[a-zA-Z]+$/", $_POST['lastname'])) {
        echo "Veuillez renseigner votre prénom !";
        echo "<br>";
        header( "refresh:5; url=index.html" ); 
        return false;
    }
} 
if (isset($_POST['email'])){
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        echo "Veuillez renseigner un email valide !";
        echo "<br>";
        header( "refresh:5; url=index.html" ); 
        return false;
    }
}
    
if (isset($_POST['codep'])) {
    if (strlen($_POST['codep']) != 5 || !preg_match("/^[1-9][0-9]*$/", $_POST['codep'])) {
        echo "Votre code postal doit être composé de 5 chiffres !";
        echo "<br>";
        header( "refresh:5; url=index.html" ); 
        return false;
    }
}
if (isset($_POST['town'])) {    
    if (empty($_POST['town']) || !preg_match("/^[a-zA-Z]+$/", $_POST['town'])) {
        echo "Veuillez renseigner votre ville !";
        echo "<br>";
        header( "refresh:5; url=index.html" ); 
        return false;
    }
}
if (isset($_POST['message'])) {
    if (empty($_POST['message']) || !tailleVar('message',14,1000)) {
        echo "Veuillez renseigner un message de 15 caractères minimum !";
        echo "<br>";
        header( "refresh:5; url=index.html" ); 
        return false;
    }
}
return true;
}

if (Validate()) {
$to = 'kevin.v@codeur.online';

$destinataire = $_POST['email'];

$object = "portfolio message";

$firstname = $_POST['firstname'];

$lastname = $_POST['lastname'];

$codepostal = $_POST['codep'];

$town = $_POST['town'];

$headers = "Content-Type: text/html; charset=UTF-8";

$message = '<strong>Email :</strong> '.$destinataire.'<br> <strong>Nom :</strong> '.$firstname.'<br> <strong>Prénom :</strong> '.$lastname.'<br> <strong>Ville:</strong> '.$town.'<br> <strong>Code postal:</strong> '.$codepostal.'<br>  '.$_POST['message'];
    if(mail($to, $object, $message, $headers))
    {
        echo "L'email a bien été envoyé.";
    }
    else
    {
        echo "Une erreur s'est produite lors de l'envoi de l'email.";
    }
    header( "refresh:3; url=index.html" ); 
    }
?>
