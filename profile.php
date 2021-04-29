<?php
    session_start();
    if(isset($_SESSION["email"])&&isset($_SESSION["password"])&&isset($_SESSION["name"])){
        setcookie("email", $_SESSION['email'], time() + (86400 * 100), "/"); // 86400 = 1 day
        setcookie("password", $_SESSION['password'], time() + (86400 * 100), "/"); // 86400 = 1 day
        setcookie("name", $_SESSION['name'], time() + (86400 * 100), "/"); // 86400 = 1 day
    }
    include "bdd.php";
    if(isset($_COOKIE["password"])){
        $source=$_COOKIE["email"];
        preg_match('/@([^.]+)/i', $source, $match);
        $result = $db->prepare(//Check the good imap
            "SELECT imap, type FROM email_server WHERE name='".$match[1]."'",
            [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]
        );
        
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);

        /*if the email is recognised the connection of the mailbox began */
        $username = $_COOKIE['email'];
        $password = $_COOKIE['password'];
        $hostname ='{'.$row['imap'].':993/imap/ssl}INBOX';

        $conn = imap_open($hostname, $username, $password, OP_READONLY);

        if (FALSE === $conn) {
            $info = FALSE;
            echo "La connexion a échoué. Réésayez en créant un autre mot de passe d'applications";
        } else {
            $info = imap_check($conn);
            $_SESSION['info']=$info;
            imap_close($conn);
        }
    }
    if(isset($_SESSION['info'])) {
        $mails=$_SESSION['info']->Nmsgs;
        setcookie("mails", $mails, time() + (86400 * 100), "/"); // 86400 = 1 day
        $mailsrate=$mails * 0.006;
        
        //Un mail = 0.006kg 
        //données pour un kilos
        echo '<p>Votre boite aux lettres contient '.$mails.' message(s)<br> 
        Taux de pollution actuelle en moyenne : '.$mailsrate.' kg de CO2 par an<br></p>
        <p>La consommation de '. 12*$mailsrate.' kWh d’électricité (en France)<br> 
        '. 2*$mailsrate.' jours d’éclairage avec 1 ampoule à incandescence (et '. 12*$mailsrate.' jours avec une 1 ampoule Basse Consommation)<br> 
        La fabrication de '. 100*$mailsrate.' feuilles de papier de 80g<br> 
        La fabrication de '. 1.5*$mailsrate.'kg de sucre<br> 
        '. 9*$mailsrate.' km parcourus avec une voiture essence d’étiquette B<br> 
        '. 6*$mailsrate.' km parcourus avec une voiture essence d’étiquette E</p>';
        //1 kg de co2 = 12km en avion par personne
        echo "<a href='profile.php'>Refresh</a>";
        //https://www.faguo-store.com/fr/lunivers-faguo/lunivers-faguo/mission-engagements/mesurer/1kg-equivalent-de-co2/
        echo (date('Y-m-d'));
        $data = [
            ':id' => "test1", // A FAIRE
            ':mails' => $mails,
            ':date' => date('Y-m-d H:i:s'),
        ];
        
        //Add number of mails into the the bdd
        $response = $db->prepare(
            "INSERT INTO user_data (user_id, user_data, data_date) VALUES (:id, :mails, :date)",
        
            [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]
        ); 
        $response->execute($data); 
    }
    else{
        header("Location: register.php");
    }
?>
