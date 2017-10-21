<?php
$destinataire = $_POST['email'];
$to = 'kevin.v@codeur.online';
$object = "portfolio message";
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$codepostal = $_POST['codep'];
$town = $_POST['town'];
$headers  = 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n";
$headers .= 'From: '.$firstname.$lastname.;
$headers .= 'Delivered-to: '.$destinataire."\n";    
$message = '<div style="text-align: center; font-weight: bold"> Ville: '.$town.'Code postal: '.$codepostal. .$_POST['message'].'</div>';

mail($to, $object, $message, $headers);
?>
