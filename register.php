<?php
    include "header.php";
    require "bdd.php";
    ?>
    <body class="body__login">
        <div class="container login">
            <div class="login__left">
    <?php

    session_start();
    if(!isset($_REQUEST["email"])){
       echo" <h2>Connecter votre boite mail</h2>
       <form method='post'>
           <div><input type='text' placeholder='Prénom' name='fname' id='fname' required>
           <input type='text' placeholder='Nom' name='lname' id='lname' required>
           <input type='email' placeholder='Votre email' name='email' required>
           
           <button class='btn btn__small' type='submit'>Suivant</button></div>
       </form>";
    }
    else if(isset($_REQUEST["email"])){
        $_SESSION['email']=$_REQUEST['email'];
        $_SESSION['name']=$_REQUEST['fname']. ' ' .$_REQUEST['lname'];
        //si email existe pas et que il est compatible supportée
        /*Select the good imap with the domain name*/
        $source=$_SESSION['email'];
        preg_match('/@([^.]+)/i', $source, $match);
        $result = $db->prepare(//Check the good imap
            "SELECT imap, type FROM email_server WHERE name='".$match[1]."'",
            [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]
        ); 
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
    
        $_SESSION['host']=$row['imap'];
        $_SESSION['steps']=$row['type'];
        switch($_SESSION['steps']){
            case "gmail":
                echo "<h2>Activer la double authentifation sur Gmail</h2>
                <p>Pour vous connecter en toute sécurité veuillez activer la double authentification.</p>
                <button class='accordion'>Aide</button>
                <div class='answer'><a href='https://myaccount.google.com/signinoptions/two-step-verification/enroll-welcome?gar=1' target='_blank'><img src='./media/helpsetup/gmail/1.PNG' alt='gmail'></a></div>
                <div class='activate'>
                <a class='btn' href='passwordapp.php'>C'est activé !</a>
                <a class='btn' href='https://myaccount.google.com/signinoptions/two-step-verification/enroll-welcome?gar=1' target='_blank'>Ce n'est pas activé !</a></div>";
            break;
        
            case "outlook":
                echo "<h2>Activer la double authentifation sur Outlook</h2>
                <p>Pour vous connecter en toute sécurité veuillez activer la double authentification.</p>
                <button class='accordion'>Aide</button>
                <div class='answer'><a href='https://account.live.com/proofs/EnableTfa' target='_blank'><img src='./media/helpsetup/outlook/1.PNG' alt='gmail'></a></div>
                <div class='activate'>
                <a class='btn' href='passwordapp.php'>C'est activé !</a>
                <a class='btn' href='https://account.live.com/proofs/EnableTfa' target='_blank'>Ce n'est pas activé !</a></div>";
            break;
        
            case "yahoo":
                echo "<h2>Activer la double authentifation sur Yahoo</h2>
                <p>Pour vous connecter en toute sécurité veuillez activer la double authentification.</p>
                <button class='accordion'>Aide</button>
                <div class='answer'><a href='https://login.yahoo.com/myaccount/security/two-step-verification/?src=ym&activity=ybar-acctinfo&pspid=159600017&.done=https%253A%252F%252Fmail.yahoo.com%252F&.scrumb=Re61Vnttrtc' target='_blank'><img src='./media/helpsetup/yahoo/1.PNG' alt='gmail'></a></div>
                <div class='activate'>
                <a class='btn' href='passwordapp.php'>C'est activé !</a>
                <a class='btn' href='https://login.yahoo.com/myaccount/security/two-step-verification/?src=ym&activity=ybar-acctinfo&pspid=159600017&.done=https%253A%252F%252Fmail.yahoo.com%252F&.scrumb=Re61Vnttrtc' target='_blank'>Ce n'est pas activé !</a></div>";
            break;
        
            case "icloud":
                echo "<a href='#'>J'ai activé la double auth</a>
                <a href='#'>Je n'ai pas activé la double auth</a>";
            break;
            case "simple":
                echo "La méthode simple <br><form method='post'><label for='password'>Mot de passe de votre email :</label><br><input type='password' name='password' placeholder='Mot de passe' required><button class='btn btn_small' type='submit'>Submit</button></form>";
            break;
            
            default:
                echo "votre email n'est pas encore supporté essayez en un autre";//si email existe pas et qu il n est pas. ce fourniseur n est pas encore supportee utilsier un email de la liste suivante
            break;
        }
        if(isset($_REQUEST["password"])){
            $_SESSION['password']=$_REQUEST["password"];
            
            if(isset($_SESSION['email'])){
                /*if the email is recognised the connection of the mailbox began */
                $username = $_SESSION['email'];
                $password = $_SESSION['password'];
                $hostname ='{'.$_SESSION['host'].':993/imap/ssl}INBOX';
        
                $conn = imap_open($hostname, $username, $password, OP_READONLY);
        
                if (FALSE === $conn) {
                    $info = FALSE;
                    echo "<p>La connexion a échoué. Réésayez en créant un autre mot de passe d'applications</p>";
                } else {
                    $info = imap_check($conn);
                    $_SESSION['info']=$info;
                    imap_close($conn);
                    header("Location: profile.php");
                }
            }
        }
    }
    
?>
        </div>
            <div class="login__right">
                <img src="./media/logofooter/cleanfox.png" alt="monstee">
            </div>
    </div>
</body>
<?php
    require "footer.php";
    ?>