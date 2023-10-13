<?php
session_start();
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
        "partenaire"=>array("nom_paretanire"=> '3FPT')
        
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
        ),
        "partenaire"=>array("nom_partenaire" =>'Banque Mondial')
    ),
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
        "partenaire"=>array("nom_partenaire" =>'WECF')
    )
    
);

// verifier si $_server utilise la methode post avec le protocole http
if($_SERVER ["REQUEST_METHOD"] =="POST"){
    //si le nom activité n'esxiste pas il ne va pas executer le script ci dessous mais il affiche juste le projet 
    
if(!empty($_POST["nom_activité"])){
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
        $_SESSION['historique_formulaire']=$projet;
    // }
// }
}
   
    }
    if(isset($_POST["detail"])){
        // aligner en verticalement
        // echo '<pre>';
        // //recuperer la v
        // print_r($projet[$_POST["projetafficher"]]);
        // echo '</pre>';
       if (isset($_POST['projetafficher']) ){
    $indice= $_POST['projetafficher'];
   //recuperer la v
    $_SESSION['historique_formulaire']= $_SESSION['historique_formulaire'][$indice];
   
    
        // ca permet de rediriger sur un autre fichier

    header("Location: projethistorique.php");
    // arreter la  lecture du script qui se trouve dans un fichier pour aller dans un autre
    exit();
   
   
  }
   
   
        

        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire_projets</title>
</head>
<body>
    <form action="" method="Post">
        <h1>formulaire_projets</h1>
        <label for="lesprojets">Les projets</label>
    <select id="projet" name="projet">
    <?php foreach ($projet as $key => $proj) : ?>
                <option value="<?= $key ?>"><?= $proj["nom_projet" ] ?></option>
                <?php endforeach; ?>
        </select><br><br>
<label for="nom_activité">Nom activité</label>
<input type="text" id="nom_activité" name="nom_activité" placeholder="ajouter l'activité" required><br><br>
<label for="description_activité">Description activité</label>
<input type="text" id="description_activité" name="description_activité" placeholder="ajouter la description de l'activité" required><br><br>
<label for="date">Date activité</label>
<input type="date" id="date" name="date_activité" placeholder="Saisir la date" required><br><br>
<input type="submit" value="Ajouter">

<!-- <option value="pardefaut" disabled selected>choisir un projet</option>
    <option value="nom_projet1">projet1:developpement web</option>
        <option value="nom_projet2">projet2:Linkedin</option>
        <option value="nom_projet3">projet3:siteweb</option> -->

</form>
<?php
foreach ($projet as $key =>$proj) {
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
   echo '<form action=" " method="POST">';
    echo '<input type="text" name="projetafficher" value="'.$key.'">';
    echo '<input type="submit" value="voir plus" name="detail">';

   echo '</form>';
    
    
    
}

?>
</body>
</html>