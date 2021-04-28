<?php
include 'index.php';
session_start();
?>
<form method="post">
        <input type="email" placeholder="email" name="email" required>
        <input type='password' name='password' placeholder='Mot de passe' required>
        <button type="submit">Submit</button>
        <?php 
        if(isset($_REQUEST["email"])){
            $_SESSION['email']=$_REQUEST['email']; //cookies
            $_SESSION['password']=$_REQUEST['password'];
            
            $result = $db->prepare(
                "SELECT * FROM user_email WHERE email='".$_SESSION['email']."'",
                [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]
                ); 
            $result->execute();
            
            $row = $result->fetch(PDO::FETCH_ASSOC);
            
            if($row){
                //Vérification mdp
                $result = $db->prepare(
                    "SELECT * FROM email_password, user_email WHERE user_email.user_id=email_password.user_id AND user_email.email='".$_SESSION['email']."' AND email_password.user_password='".$_SESSION['password']."'",
                    [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]
                    ); 
                $result->execute();
                    
                $mdp = $result->fetch(PDO::FETCH_ASSOC);
                if($mdp){
                    //si mdp correct connection et redirection profile
                    header("Location: profile.php");
                    die();
                }
                else{
                    //reassayer / mdp applicaitons
                    echo("Ce n'est pas le bon mot de passe");
                }
            }
            else{
                //email faux = message d erreur + bouton d inscriptions
                echo("Votre email n'est pas enregistré veuillez vous inscrire");
            }

        }

        ?>
    </form>