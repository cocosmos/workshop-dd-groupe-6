<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/jpeg" src="media/logo/favicon.jpeg" />
    <title>E-Cobox</title>
</head>
    <Header>
        <div class="logo">
        <img src="media/logo/logo_V5-8.png">
        </div>

        <div class="menu">
            <ul>
                <li>accueil</li>
                <li>solutions</li>
            </ul>
        </div>

        <div class="profile">
            <p><?php if(isset($_SESSION["name"])){
            echo($_COOKIE["name"]);}?></p>
            <a href="profile.php">voir le profil</a>
        </div>
    </Header>