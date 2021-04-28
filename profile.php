<?php
    session_start();
    if(isset($_SESSION['email'])){
        /* find which domain email is*/
        $source=$_SESSION['email'];
        preg_match('/@([^.]+)/i', $source, $match);
        /*Select the good imap with the domain name*/
        switch($match[1]){
            case "gmail":
                $host="imap.gmail.com";
                $steps="gmail";
                break;
            
            case "outlook":
            case "hotmail":
            case "live":
                $host="outlook.office365.com";
                $steps="outlook";
                break;
            
            case "yahoo":
                $host="imap.mail.yahoo.com";
                $steps="yahoo";
                break;
           
            case "icloud":
                $host="imap.mail.me.com";
                $steps="icloud";
                break;
            
            case "bluewin":
            case "bluemail":
                $host="imaps.bluewin.ch";
                $steps="simple";
                break;
    
            case "orange":
            case "wanadoo":
                $host="imap.orange.fr";
                $steps="simple";
                break;
    
            case "free":
                $host="imap.free.fr";
                $steps="simple";
                break;
    
            default:
                $host = FALSE;
                $steps = FALSE;
                break;
        }
    


    if($host === FALSE){
        echo("Cette adresse mail n'est pas encore supportée");
    }else{
        /*if the email is recognised the connection of the mailbox began */
        $username = $_SESSION['email'];
        $password = $_SESSION['password'];
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
            
            $mails=$info->Nmsgs;
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

            //https://www.faguo-store.com/fr/lunivers-faguo/lunivers-faguo/mission-engagements/mesurer/1kg-equivalent-de-co2/
            
           /* function calculate($mails){
                if($mails<100){
                    "Badge Ecolo";
                }else if($mails<500){
                    "Badge peut faire mieux";
                }else{
                    "Badge pollueur";
                }
            }*/
            
        }
    }

    }