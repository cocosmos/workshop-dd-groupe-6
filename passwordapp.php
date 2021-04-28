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
            echo "La connexion a échoué. Réésayez en créant un autre mot de passe d'applications";
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
            echo "<a href='https://myaccount.google.com/u/1/apppasswords?rapt=AEjHL4MtRmEhKqJ-hP_Y-_CToXdTHfwcoZEPfe-LNpPAmnjJj25KW4hn9eB0AXVuVBr2BmaWc5W1q-WqZul4kBEKHgSrEol9vg'>Créer votre mot de passe d'application</a>";
            //echo "<img src='./media/helpsetup/gmail2.png' alt='gmailhelp'>";
            //echo "<img src='./media/helpsetup/gmail3.png' alt='gmailhelp'>";
            //echo "<img src='./media/helpsetup/gmail4.png' alt='gmailhelp'>";
        break;

        case "outlook":
            echo "<a href='https://account.live.com/proofs/AppPassword?uaid=382668c8994f4552a6cfde5041b4bf26&mpsplit=2'>Créer votre mot de passe d'application</a>";
        break;

        case "yahoo":
            echo "<a href='https://login.yahoo.com/myaccount/security/app-password/?.intl=us&src=everything&activity=uh-acctinfo&pspid=97211971&done=https%2525253A%2525252F%2525252Flogin.yahoo.com%2525252Fmyaccount%2525252Fsecurity%2525252F%2525253F.intl%2525253Dus%25252526.lang%2525253Den-US%25252526src%2525253Deverything%25252526activity%2525253Duh-acctinfo%25252526pspid%2525253D97211971%25252526.done%2525253Dhttps%2525252525253A%2525252525252F%2525252525252Fwww.yahoo.com%2525252525252Feverything%2525252525252F%25252526.scrumb%2525253DJAxjs4wJulW&scrumb=4EzY8pB7w9p'>Créer votre mot de passe d'application</a>";
        break;

        case "icloud":
            echo "<a href='#'>Créer votre mot de passe d'application</a>";
        break;
    }
}
?>
<form action="" method="post">
<input type="password" name="password" placeholder="Mot de passe d'applications" required>
<button type='submit'>Submit</button>
</form>
