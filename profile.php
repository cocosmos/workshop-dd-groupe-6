<?php
    session_start();
    if(isset($_SESSION["email"])&&isset($_SESSION["password"])&&isset($_SESSION["name"])){
        setcookie("email", $_SESSION['email'], time() + (86400 * 100), "/"); // 86400 = 1 day
        setcookie("password", $_SESSION['password'], time() + (86400 * 100), "/"); // 86400 = 1 day
        setcookie("name", $_SESSION['name'], time() + (86400 * 100), "/"); // 86400 = 1 day
    }
    include "header.php";
    include "bdd.php";
    ?>
    <body>
    <div class="profil">
            <div class="container ">
                <div class="row">
                    <div class="profil__left">
    <?php
    
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
        $mailsrate=$mails * 0.009;
        
        //Un mail = 0.009kg 
        //données pour un kilos
        
        echo"<h3>".$_SESSION['name']."</h3>";
        echo"
        <img src='./media/bulle.png' alt='' height='150px' width='150px'>

        <div class='profil__info'><h5>Votre boite mail contient ".$mails." messages</h5></div>
        <div class='profil__info'><h5>Votre Taux de CO2 généré annuelement: ".$mailsrate." Kg de CO2</h5></div>

        </div>"
        ?>
                    <div class="profil__right">
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container profil__down">
            <h3>Avec votre boîte mail vous avez...</h3>
            <p>utilisez <?php echo(12*$mailsrate) ?> jours d'éclairage avec une 1 ampoule Basse Consommation</p>
            <p>parcouru <?php echo(9*$mailsrate) ?> kms avec une voiture</p>
            <p>Consommer <?php echo(12*$mailsrate) ?> kWh d’électricité ce qui équivaut à ... heures de TV (nombre de kilo 100w) </p>
        </div>

        <?php
        /*echo '<p>Votre boite aux lettres contient '.$mails.' message(s)<br> 
        Taux de pollution actuelle en moyenne : '.$mailsrate.' kg de CO2 par an<br></p>
        <p>La consommation de '. 12*$mailsrate.' kWh d’électricité (en France)<br> 
        '. 2*$mailsrate.' jours d’éclairage avec 1 ampoule à incandescence (et '. 12*$mailsrate.' jours avec une 1 ampoule Basse Consommation)<br> 
        La fabrication de '. 100*$mailsrate.' feuilles de papier de 80g<br> 
        La fabrication de '. 1.5*$mailsrate.'kg de sucre<br> 
        '. 9*$mailsrate.' km parcourus avec une voiture essence d’étiquette B<br> 
        '. 6*$mailsrate.' km parcourus avec une voiture essence d’étiquette E</p>';*/
        //1 kg de co2 = 12km en avion par personne
        echo "<a class='btn' href='profile.php'>Refresh</a>";
        //https://www.faguo-store.com/fr/lunivers-faguo/lunivers-faguo/mission-engagements/mesurer/1kg-equivalent-de-co2/
        $data = [
            ':id' => "test1", // A FAIRE
            ':data' => $mailsrate,
            ':date' => date('Y-m-d'),
        ];
        
        //Add number of mails into the the bdd
        $response = $db->prepare(
            "INSERT INTO user_data (user_id, user_data, data_date) VALUES (:id, :data, :date)",
        
            [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]
        ); 
        $response->execute($data);

        //Data for the chart put into the json
        $result = $db->prepare(
            "SELECT user_data, data_date FROM user_data WHERE user_id='test1' GROUP BY data_date",
            [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]
        ); 
        $result->execute();
        
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        
        $json = json_encode($row);
        file_put_contents("./js/data.json", $json); 
    }
    else{
        header("Location: register.php");
    }
?>


</body>

<?php include "footer.php";
