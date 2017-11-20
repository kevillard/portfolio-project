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

$error = [];



    
if (isset($_POST['firstname'])) {
    if(empty($_POST['firstname']) || !tailleVar('firstname',2,30) || !preg_match("/^[a-zA-Z]+$/", $_POST['firstname'])) {
        $error['firstname'] = false;
    }else{
         $error['firstname'] = true;
    }
}else{
    $error['firstname'] = true; 
} 
    
    
if (isset($_POST['lastname'])) {
    if(empty($_POST['lastname']) || !tailleVar('lastname',2,30) || !preg_match("/^[a-zA-Z]+$/", $_POST['lastname'])) {
        $error['lastname'] = false;
    } else {
        $error['lastname'] = true;
    }
} else {
        $error['lastname'] = true;
} 


if (isset($_POST['email'])){
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $error['email'] = false;
    } else {
        $error['email'] = true;
    }
} else {
    $error['email'] = true;
}

    
if (isset($_POST['codep'])) {
    if (strlen($_POST['codep']) != 5 || !preg_match("/^[1-9][0-9]*$/", $_POST['codep'])) {
        $error['codep'] = false;
    } else {
        $error['codep'] = true;
    }
} else {
    $error['codep'] = true;
}

if (isset($_POST['town'])) {    
    if (empty($_POST['town']) || !preg_match("/^[a-zA-Z]+$/", $_POST['town'])) {
        $error['town'] = false;
    } else {
        $error['town'] = true;
    }
} else {
    $error['town'] = true;
}

if (isset($_POST['message'])) {
    if (empty($_POST['message']) || !tailleVar('message',14,1000)) {
        $error['message'] = false;
    } else {
        $error['message'] = true;
    }
} else{
    $error['message'] = true;
}


/*if (Validate()) {

$destinataire = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$codepostal = $_POST['codep'];
$town = $_POST['town'];

$message = '<strong>Email :</strong> '.$destinataire.'<br> <strong>Nom :</strong> '.$firstname.'<br> <strong>Prénom :</strong> '.$lastname.'<br> <strong>Ville:</strong> '.$town.'<br> <strong>Code postal:</strong> '.$codepostal.'<br>  '.$_POST['message'];
    
echo json_encode($message);
    
    
    }*/

echo json_encode($error);
?>
