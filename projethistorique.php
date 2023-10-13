<?php
session_start();


// l'espression terner ca permet de voir si les données existes
if (isset( $_SESSION['historique_formulaire'])) {
    $projethistorique=$_SESSION['historique_formulaire'];
}else {
    $projethistorique=null;
}
//$projethistorique=isset( $_SESSION['historique_formulaire']) ?  $_SESSION['historique_formulaire'] : null;
if(!$projethistorique){
    echo"aucun projet n'a été affiché ";
    //arreter la lecture du script
    die();
}

    echo "Nom du projet : " .  $projethistorique["nom_projet"] . "<br>";
    echo "Description du projet : " .  $projethistorique["description"] . "<br>";
//afficher le nbractivités qui se trouve sur chaque projet
    $nombreActivités = count( $projethistorique["activité"]);
    echo "Nombre d'activités : " . $nombreActivités . "<br>";

    echo "Activités :<br>";

    foreach ( $projethistorique["activité"] as $activite) {
        echo "Nom de l'activité : " . $activite["nom_activité"] . "<br>";
        echo "Description de l'activité : " . $activite["description"] . "<br>";
        echo "Date de l'activité : " . $activite["date"] . "<br>";
    }
     
    foreach ( $projethistorique["partenaire"] as $partenaire) {
        echo "Nom du partenaire : " . $partenaire . "<br>";
       
    }
?>