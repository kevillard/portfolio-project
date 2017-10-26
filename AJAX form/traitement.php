<?php

$to = 'kevin.v@codeur.online';

$destinataire = $_POST['email'];

$object = "portfolio message";

$firstname = $_POST['firstname'];

$lastname = $_POST['lastname'];

$codepostal = $_POST['codep'];

$town = $_POST['town'];

$headers = "Content-Type: text/html; charset=UTF-8";

$message = 'Email : '.$destinataire.'\n Nom : '.$firstname.'\n Prénom : '.$lastname.'\n Ville: '.$town.'\n Code postal: '.$codepostal.'\n  '.$_POST['message'];

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
list ($user, $dns)=explode("@", $_POST['email']);
if (isset($firstname)) {
    if(empty($firstname) || tailleVar('firstname',2,30)) {
        echo "Veuillez renseigner votre nom !";
        echo "<br>";
        header( "refresh:6; url=index.html" ); 
        return false;
    }
} 
elseif (isset($lastname)) {
    if (empty($lastname)|| tailleVar('lastname',2,30)) {
        echo "Veuillez renseigner votre prénom !";
        echo "<br>";
        header( "refresh:6; url=index.html" ); 
        return false;
    }
} 
elseif (isset($email, $dns)){
    if (empty($email) || checkdnsrr($dns)){
        echo "Veuillez renseigner un email valide !";
        echo "<br>";
        header( "refresh:6; url=index.html" ); 
        return false;
    }
}
    
elseif (isset($_POST['codep'])) {
    if (strlen($_POST['codep']) != 5 || !is_nan($_POST['codep'])) {
        echo "Votre code postal doit être composé de 5 chiffres !";
        echo "<br>";
        header( "refresh:6; url=index.html" ); 
        return false;
    }
}
elseif (isset($town)) {    
    if (empty($town)) {
        echo "Veuillez renseigner votre ville !";
        echo "<br>";
        header( "refresh:6; url=index.html" ); 
        return false;
    }
}
elseif (isset($_POST['message'])) {
    if (empty($_POST['message']) || tailleVar('message',14,1000)) {
        echo "Veuillez renseigner un message de 15 caractères minimum !";
        echo "<br>";
        header( "refresh:6; url=index.html" ); 
        return false;
    }
}
    else {
    return true;
}
}
if (Validate() == true) {

    session_start();

            $_SESSION['user'];

            echo "msgagree";  
    
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
