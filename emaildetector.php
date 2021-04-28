<?php
/* find which domain email is*/
$source=$_SESSION['email'];
session_start();

preg_match('/@([^.]+)/i', $source, $match);
/*Select the good imap with the domain name*/
switch($match[1]){
    case "gmail":
        $host="imap.gmail.com";
        $steps="gmail";
    break;
    
    case "outlook":
    case "hotmail":
    case "live":
        $host="outlook.office365.com";
        $steps="outlook";
    break;
    
    case "yahoo":
        $host="imap.mail.yahoo.com";
        $steps="yahoo";
    break;
    
    case "icloud":
        $host="imap.mail.me.com";
        $steps="icloud";
    break;
    
    case "bluewin":
    case "bluemail":
        $host="imaps.bluewin.ch";
        $steps="simple";
    break;

    case "orange":
    case "wanadoo":
        $host="imap.orange.fr";
        $steps="simple";
    break;

    case "free":
        $host="imap.free.fr";
        $steps="simple";
        
    break;

    default:
        $host = FALSE;
        $steps = FALSE;
    break;
}

?>