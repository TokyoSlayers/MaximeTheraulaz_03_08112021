<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Contact</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    </head>

    <body>
        <header>
            <h1 class="logo">OhMyFood</h1>
        </header>
        
        <main id="contact">
            <h2>Nous contacter</h2>

            <form class="form" action="" method="post">
                <input class="text" type="email" name="mail" placeholder="your email">
                <input class="text" type="text" name="name" placeholder="your name">
                <textarea class="textarea" name="message"></textarea>
                <input class="button" type="submit">     
            </form>

        </main>

        <footer>
            <h1 class="logo">OhMyFood</h1>
            <div class="foot">
                <a><i class="fas fa-utensils"></i> Proposer un restaurant</a>
                <a><i class="fas fa-handshake"></i> Devenir partenaire</a>
                <a>Mentions Légales</a>
                <a href="/contact.php">Contact</a>
            </div>
        </footer>
        <?php 
        $mail = $_POST["mail"];
        $name = $_POST["name"];
        $text = $_POST["message"];

        sendmail($text, "Le message vien de $name","tokyo@tokyoslayer.com",$mail);

        ?>
    </body>
</html>

<?php

if(!$_POST["ContactName"]){

	echo "<p>Merci de saisir un pseudo</p>";

    return;

}



if(strlen($_POST["ContactComment"]) == 0){

	echo "<p>Merci de saisir un message a m'envoyer</p>";

    return;

}

$name = $_POST["ContactName"];


function sendmail($text, $objet, $email,$from){

    $headers = array(

        'MIME-Version' => '1.0',

        'Content-type' => 'text/html; charset=iso-8859-1',



        'To' => $email,

        'From' => $from

        );

    $objet = $objet;

    if( mail($email, utf8_decode($objet), utf8_decode($text), $headers) ){

        echo "<p>Votre message a bien été envoyer</p>";

    }else{

        echo "<p>Votre message n'a pas pu nous parvenir </p>";

    }

}

?>