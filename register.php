<form method="post">
        <input type="email" placeholder="email" name="email" required>
        <input type='password' name='password' placeholder='Mot de passe' required>
        <?php 
        if(isset($_REQUEST["email"])){
            $result = $db->prepare(
            "SELECT * FROM user_email WHERE email='".$_POST['email']."'",
            [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]
            ); 
            $result->execute();
            
            $row = $result->fetch(PDO::FETCH_ASSOC);
            
            if(!$row){
                //si email existe pas et que il est compatible supportée
                




                //redirection mdp d applications ou mdp -> profile
                
            } else if(){
                //si email existe pas et qu il n est pas. ce fourniseur n est pas encore supportee utilsier un email de la liste suivante
            }
            
            else{
                //redirection connection
            }
        }

        ?>
        <button type="submit">Submit</button>
    </form>



<?php

switch($steps){
    case "gmail":
        echo "La méthode gmail";
        break;

    case "outlook":
        echo "La méthode outlook";
        break;

    case "yahoo":
        echo "La méthode yahoo";
        break;

    case "icloud":
        echo "La méthode icloud";
        break;

    case "simple":
        echo "La méthode simple";
        break;
    
    default:
        echo "votre email n'est pas encore supporté essayez en un autre";
        break;

}