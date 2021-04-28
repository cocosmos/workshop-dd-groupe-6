<?php
    require "bdd.php";
    if(!isset($_REQUEST["email"])){
       echo" <form method='post'>
        <input type='text' placeholder='Prénom' name='fname' id='fname' required>
        <input type='text' placeholder='Nom' name='lname' id='lname' required>
        <input type='email' placeholder='email' name='email' required>
        
        <button type='submit'>Submit</button>
        </form>";
        }
        if(isset($_REQUEST["email"])){
            $_SESSION['email']=$_REQUEST['email']; 
            
            $result = $db->prepare(
            "SELECT * FROM user_email WHERE email='".$_POST['email']."'",
            [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]
            ); 
            $result->execute();
            
            $row = $result->fetch(PDO::FETCH_ASSOC);
            
            if(!$row){
                //si email existe pas et que il est compatible supportée
                require "emaildetector.php";
                switch($_SESSION["steps"]){
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
                        echo "La méthode simple <br><label for='password'>Mot de passe de votre email :</label><br><input type='password' name='password' placeholder='Mot de passe' required>";
                    break;
                    
                    default:
                        echo "votre email n'est pas encore supporté essayez en un autre";//si email existe pas et qu il n est pas. ce fourniseur n est pas encore supportee utilsier un email de la liste suivante
                    break;
                };

                //redirection mdp d applications ou mdp -> profile
            }
            else{
                //redirection connection
                echo "votre email existe déjà";
                echo "<a>Refaire un nouveau mdp d'application</a>";
            }
        }

        ?>
