<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>E-Cobox</title>
</head>
    <Header>
        <div class="logo">
        </div>

        <div class="menu">
            <ul>
                <li>solution</li>
                <li></li>
            </ul>
        </div>

        <div class="profile">
            <p><?php if(isset($_SESSION["name"])){
            echo($_COOKIE["name"]);}?></p>
            <a href="profile.php">voir le profil</a>
        </div>
    </Header>