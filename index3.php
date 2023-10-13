<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire avec les expressions regulieres</title>
</head>
<body>
    <form method="POST">
        <h1>formulaire avec les expressions regulieres</h1>
        <label for="Email">Email</label>
        <input type="mail" name="Email" value="email" placeholder=" votre adresse-mail" required><br><br>
        <label for="N°tel">N°tel</label>
        <input type="number" name="N°tel" value="N°tel" placeholder="votre numero_tel" required><br><br>
        <input type="submit" value="envoyer">

    </form>
    <?php
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"){  
        
    $email=$_POST['Email'];
    $N°tel=$_POST['N°tel'];
    $affiche="Email:" . ($email) ."<br>".
             "N°tel:" . ($N°tel) ."<br>";
    echo"<h2>afficher le formulaire:</h2>";
    echo"<p>$affiche</p>";

    $email = "contact@exemple.com";
if (preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/igm', $email)) {
    echo "votre adresse mail correct.";
} else {
    echo "votre adresse mail est incorrect.";
}
$tel = '+221000000000';

if (preg_match('/((\+)221|0|0000)[1-9](\d{2}){4}/igm', $tel)) {
    echo "Your tel is ok.";
} else {
    echo "Wrong tel.";
}
}
    ?>
</body>
</html>