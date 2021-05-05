<?php
    include "header.php";
    require "bdd.php";
    error_reporting(0);
    ?>
    <body class="body__login">
        <div class="container login">
            <div class="login__left">
            <h2>Créer votre mot de passe d'applications</h2>
<?php
session_start();

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
            echo "<h6>La connexion a échoué. Réésayez en créant un autre mot de passe d'applications.</h6>";
            
        } else {
            $info = imap_check($conn);
            $_SESSION['info']=$info;
            imap_close($conn);
            header("Location: profile.php");
        }
    }
}
if(isset($_SESSION["steps"])){
    switch($_SESSION['steps']){
        case "gmail":
            echo "<div class='step__left'>
            <p><b>Etape 1 :</b> Se connecter à votre compte Gmail en cliquant sur le bouton ci-dessous:</p>
            <a class='btn' href='https://myaccount.google.com/u/1/apppasswords?rapt=AEjHL4MtRmEhKqJ-hP_Y-_CToXdTHfwcoZEPfe-LNpPAmnjJj25KW4hn9eB0AXVuVBr2BmaWc5W1q-WqZul4kBEKHgSrEol9vg' target='_blank'>Connexion à Gmail</a>
        </div>
        
        <div class='step__left'>
            <p><b>Etape 2 :</b> Cliquez sur 'Sélectionnez une Application', puis sur 'Autre'. </p>
            <button class='accordion'>Aide</button>
            <div class='answer'><img src='./media/helpsetup/gmail/2.png' alt=''></div>

        </div>
        
        <div class='step__left'>
            <p><b>Etape 3 :</b> Écrivez 'E-cobox' puis cliquez sur 'Générer'.</p>
            <button class='accordion'>Aide</button>
            <div class='answer'><img src='./media/helpsetup/gmail/3.png' alt=''></div>
        </div>

        <div class='step__left'>
            <p><b>Etape 4 :</b> Copiez le code de 16 caractères qui s'affiche sur fond jaune.</p>
            <button class='accordion'>Aide</button>
            <div class='answer'><img src='./media/helpsetup/gmail/4.png' alt=''></div>
        </div>";
        break;

        case "outlook":
            echo "<div class='step__left'>
            <p><b>Etape 1 :</b> Se connecter à votre compte Outlook en cliquant sur le bouton ci-dessous:</p>
            <a class='btn' href='https://account.live.com/proofs/AppPassword?uaid=382668c8994f4552a6cfde5041b4bf26&mpsplit=2' target='_blank'>Connexion à Outlook</a>
        </div>
        
        <div class='step__left'>
            <p><b>Etape 2 :</b> Copiez le code de 16 caractères</p>
            <button class='accordion'>Aide</button>
            <div class='answer'><img src='./media/helpsetup/outlook/2.PNG' alt=''></div>
        </div>";
        break;

        case "yahoo":
            echo "<div class='step__left'>
            <p><b>Etape 1 :</b> Se connecter à votre compte Yahoo en cliquant sur le bouton ci-dessous:</p>
            <a class='btn' href='https://login.yahoo.com/myaccount/security/app-password/?.intl=us&src=everything&activity=uh-acctinfo&pspid=97211971&done=https%2525253A%2525252F%2525252Flogin.yahoo.com%2525252Fmyaccount%2525252Fsecurity%2525252F%2525253F.intl%2525253Dus%25252526.lang%2525253Den-US%25252526src%2525253Deverything%25252526activity%2525253Duh-acctinfo%25252526pspid%2525253D97211971%25252526.done%2525253Dhttps%2525252525253A%2525252525252F%2525252525252Fwww.yahoo.com%2525252525252Feverything%2525252525252F%25252526.scrumb%2525253DJAxjs4wJulW&scrumb=4EzY8pB7w9p' target='_blank'>Connexion à Yahoo</a>
        </div>
        
        <div class='step__left'>
            <p><b>Etape 2 :</b> Écrivez 'E-cobox' puis cliquez sur 'Générer'.</p>
            <button class='accordion'>Aide</button>
            <div class='answer'><img src='./media/helpsetup/yahoo/2.png' alt=''></div>
        </div>

        <div class='step__left'>
            <p><b>Etape 3 :</b> Copiez le code de 16 caractères qui s'affiche.</p>
            <button class='accordion'>Aide</button>
            <div class='answer'><img src='./media/helpsetup/yahoo/3.png' alt=''></div>
        </div>";
        break;

        case "icloud":
            echo "<a href='#'>Créer votre mot de passe d'application</a>";
        break;
    }
}
?>

<form action="" method="post">
    <p><b>Dernière étape :</b> Collez le code ici : </p>
    <input type="password" name="password" placeholder="Mot de passe d'applications" required>
    <button class="btn btn__small" type='submit'>Suivant</button>
</form>
        </div>
            <div class="login__right">
                
                <img src="" alt="">
                
            </div>
        


    </div>
</body>
<?php require "footer.php";