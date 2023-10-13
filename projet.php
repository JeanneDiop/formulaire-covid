<?php
$projet = array(
    array(
        "nom_projet" => 'develeppement web',
        "description" => 'maitriser les differentes langages',
        "activité" => array(
           array( "nom_activité" => 'php',
            "description" => 'prise en main de PHP',
            "date" => '09/02/2023'),
            array( "nom_activité" => 'mongodb',
            "description" =>'prise en main mongodb',
            "date" => '09/07/2023'),
            array("nom_activité" => 'Mysql',
            "description" => 'prise en main Mysql',
            "date" => '03/08/2023'),
            
        ),
        
    ),
    array(
        "nom_projet" => 'Linkedin',
        "description" => 'compendre les instructions de cette application',
        "activité" => array(
            array("nom_activité" => 'conception de l_interface utilisateur',
            "description" => 'création de l\'aspect visuel',
            "date" => '09/02/2023'),
            array("nom_activité" => 'artgallery',
                "description"=>'apprendre les creations de l\'art',
                "date" => '04/08/2023'),
            array("nom_activité" =>'whatsapp',
                "description" =>'moyen de communication',
                "date" =>'04/07/2023')
        )),
    array(
        "nom_projet" => 'siteWeb',
        "description" => 'site e-commerce',
        "activité" => array(
            array("nom_activité" => 'Merise',
            "description" => 'maîtriser MCD, MPD, MLD',
            "date" => '15/04/2023'),
            array("nom_activité" => 'ULM',
            "description" =>'maitriser les bases en UML',
            "date" =>'01/05/2023')
        ),
    )
    
);
// initialise la boucle for et cree une variable $i 
//aprés il parcours le tableau jusquà ce que $i<aux elements du tableau 
// si c'est ca il incrementes


// verifier si $_server utilise la methode post avec le protocole http
if($_SERVER ["REQUEST_METHOD"] =="POST"){

    $nom_activite=$_POST["nom_activité"];
    $description_activite=$_POST["description_activité"];
    $date_activite=$_POST["date_activité"];
    $projetSelectionne = $_POST["projet"] ;
    // var_dump($nom_activite);
    // var_dump($description_activite);
    //  var_dump($date_activite);
    //  var_dump($projetSelectionne);
// Parcourir le tableau de projets pour trouver le projet sélectionné le  & permet de faire des modification en meme temps sur le projet qu'on se trouve
// foreach ($projet as &$proj) {
//     if ($proj['nom_projet'] === $projetSelectionne) {
        // Ajouter une nouvelle activité au projet sélectionné
        $nouvelleActivite = array(
            'nom_activité' => $nom_activite,
            'description' => $description_activite,
            'date' => $date_activite,
        );
        $projet[$projetSelectionne]['activité'][] = $nouvelleActivite;
    // }
// }
foreach ($projet as $proj) {
    echo "Nom du projet : " . $proj["nom_projet"] . "<br>";
    echo "Description du projet : " . $proj["description"] . "<br>";
//afficher le nbractivités qui se trouve sur chaque projet
    $nombreActivités = count($proj["activité"]);
    echo "Nombre d'activités : " . $nombreActivités . "<br>";

    echo "Activités :<br>";

    foreach ($proj["activité"] as $activite) {
        echo "Nom de l'activité : " . $activite["nom_activité"] . "<br>";
        echo "Description de l'activité : " . $activite["description"] . "<br>";
        echo "Date de l'activité : " . $activite["date"] . "<br>";
    }

    echo "<br>";
}
}

?>









