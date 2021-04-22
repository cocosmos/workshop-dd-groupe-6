<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
    <body>
    <form action="" method="post">
            <input type="email" placeholder="email" name="email" required>
            <input type="password" name="password" placeholder="Mot de passe d'applications" required>
            <button type="submit">Submit</button>
        </form>
    
    <?php

if(isset($_REQUEST["email"])){
    /* find which domain email is*/
    $source =$_POST["email"];
    preg_match('/@([^.]+)/i', $source, $match);
    /*Select the good imap with the domain name*/
    switch($match[1]){
        case "gmail":
            $host="imap.gmail.com";
            break;
        
        case "outlook":
        case "hotmail":
        case "live":
            $host="outlook.office365.com";
            break;
        
        case "yahoo":
            $host="imap.mail.yahoo.com";
            break;
       
        case "icloud":
            $host="imap.mail.me.com";
            break;
        
        case "bluewin":
        case "bluemail":
            $host="imaps.bluewin.ch";
            break;

        case "orange":
        case "wanadoo":
            $host="imap.orange.fr";
            break;

        default:
            $host = FALSE; 
            break;
    }
    
    if($host === FALSE){
        echo("Cette adresse mail n'est pas encore supportée");
    }else{
        /*if the email is recognised the connection of the mailbox began */
        $username = $_POST["email"];
        $password = $_POST["password"];
        $hostname ='{'.$host.':993/imap/ssl}INBOX';
   
        $conn = imap_open($hostname, $username, $password, OP_READONLY);

        if (FALSE === $conn) {
            $info = FALSE;
            $err = 'La connexion a échoué. Vérifiez vos paramètres!';
        } else {
            $info = imap_check($conn);
            imap_close($conn);
        }

        if (FALSE === $info) {
            echo $err;
        } else {
            echo 'La boite aux lettres contient '.$info->Nmsgs.' message(s)';
        }
    }
}
?>
 
    </body>
</html>



