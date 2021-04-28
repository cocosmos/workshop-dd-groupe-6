
<h2>Créer votre mot de passe d'applications</h2>

<?php
include "emaildetector.php";
    echo ($steps);

    
switch($_SESSION["steps"]){
    case "gmail":
        echo "<h2>GMAIL</h2>
        <a href='#'>Créer votre mot de passe d'applications</a>";
        
        
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

}


?>