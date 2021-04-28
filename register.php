<?php
    require "bdd.php";
    session_start();
    if(!isset($_SESSION["email"])||!isset($_SESSION["password"])){
       echo" <form method='post'>
        <input type='text' placeholder='Prénom' name='fname' id='fname' required>
        <input type='text' placeholder='Nom' name='lname' id='lname' required>
        <input type='email' placeholder='email' name='email' required>
        
        <button type='submit'>Submit</button>
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
        print_r($_SESSION);
        switch($_SESSION['steps']){
            case "gmail":
                echo "<h2>Activer la double authentifation sur Gmail pour que celà fonctionne</h2>";
                
                echo "<a href='passwordapp.php'>J'ai activé la double auth</a>
                <a href='#'>Je n'ai pas activé la double auth</a>";
            break;
        
            case "outlook":
                echo "<a href='#'>J'ai activé la double auth</a>
                <a href='#'>Je n'ai pas activé la double auth</a>";
            break;
        
            case "yahoo":
                echo "<a href='#'>J'ai activé la double auth</a>
                <a href='#'>Je n'ai pas activé la double auth</a>";
            break;
        
            case "icloud":
                echo "<a href='#'>J'ai activé la double auth</a>
                <a href='#'>Je n'ai pas activé la double auth</a>";
            break;
            case "simple":
                echo "La méthode simple <br><form method='post'><label for='password'>Mot de passe de votre email :</label><br><input type='password' name='password' placeholder='Mot de passe' required><button type='submit'>Submit</button></form>";
                
            break;
            
            default:
                echo "votre email n'est pas encore supporté essayez en un autre";//si email existe pas et qu il n est pas. ce fourniseur n est pas encore supportee utilsier un email de la liste suivante
            break;
        }
    }
    else if(isset($_REQUEST["password"])){
        $_SESSION['password']=$_REQUEST["password"];
        
        if(isset($_SESSION['email'])){
            /*if the email is recognised the connection of the mailbox began */
            $username = $_SESSION['email'];
            $password = $_SESSION['password'];
            $hostname ='{'.$_SESSION['host'].':993/imap/ssl}INBOX';
    
            $conn = imap_open($hostname, $username, $password, OP_READONLY);
    
            if (FALSE === $conn) {
                $info = FALSE;
                echo "La connexion a échoué. Réésayez en créant un autre mot de passe d'applications";
            } else {
                $info = imap_check($conn);
                $_SESSION['info']=$info;
                imap_close($conn);
                header("Location: profile.php");
            }
        }
    }
?>
