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
    /* connect to gmail */

  //  var_dump($_POST["email"]);
    $username = $_POST["email"];
    $password = $_POST["password"];
    $hostname ='{imap.gmail.com:993/imap/ssl}INBOX';


    $conn   = imap_open($hostname, $username, $password, OP_READONLY);

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
?>
        
    </body>
</html>



