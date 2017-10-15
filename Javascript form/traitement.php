<?php
$destinataire = $_POST['email'];
$expediteur = 'kevin.v@codeur.online';
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$codepostal = $_POST['codep'];
$town = $_POST['town'];
$headers  = 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n";
$headers .= 'Reply-To: '.$expediteur."\n";
$headers .= 'From: '.$firstname.$lastname.'<'.$expediteur.'>'."\n";
$headers .= 'Delivered-to: '.$destinataire."\n";    
$message = '<div style="text-align: center; font-weight: bold"> "Ville: " '.$town.' '<br>' "Code postal: " '.$codepostal.' '<br>' '.$_POST['message'].'</div>';
if (mail($destinataire, $message, $headers))
{
    echo 'Votre message a bien été envoyé ';
}
else
{
    echo "Votre message n'a pas pu être envoyé";
}
?>