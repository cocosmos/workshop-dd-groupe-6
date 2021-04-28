<?php
    session_start();
    setcookie("email", $_SESSION['email'], time() + (86400 * 100), "/"); // 86400 = 1 day
    setcookie("password", $_SESSION['password'], time() + (86400 * 100), "/"); // 86400 = 1 day
    setcookie("name", $_SESSION['name'], time() + (86400 * 100), "/"); // 86400 = 1 day

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

        //https://www.faguo-store.com/fr/lunivers-faguo/lunivers-faguo/mission-engagements/mesurer/1kg-equivalent-de-co2/
    }
?>
