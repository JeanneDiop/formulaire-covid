<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire COVID</title>
</head>
<body>
    <form method="post">
        <h1>FORMULAIRE COVID</h1>
        <label for="Nom">Nom</label>
        <input type="text" id="Nom" name="Nom" required><br><br>
        <label for="Prenom">Prénom</label>
        <input type="text" id="Prenom" name="Prenom" required><br><br>
        <label for="Poids">Poids</label>
        <input type="number" id="Poids" name="Poids" required><br><br>
        <label for="temperature">T°C</label>
        <input type="number" id="temperature" name="Temperature" required><br><br>
        <label for="age">Âge</label>
        <span>0-15</span>
        <input type="radio" id="age_0_15" name="Age" value="0-16" required>
        <span>16-35</span>
        <input type="radio" id="age_16_35" name="Age" value="16-35" required>
        <span>36-45</span>
        <input type="radio" id="age_36_45" name="Age" value="36-45" required>
        <span>46-100</span>
        <input type="radio" id="age_46_100" name="Age" value="46-100" required><br><br>
        <label for="maux_de_tete">Maux de tête</label>
        <span>Oui</span>
        <input type="radio" id="maux_de_tete_oui" name="mauxdetete" value="Oui"  required>
        <span>Non</span>
        <input type="radio" id="maux_de_tete_non" name="mauxdetete" value="Non" required><br><br>
        <label for="Diarrhée">Diarrhée</label>
        <span>Oui</span>
        <input type="radio" id="Diarrhée_oui" name="Diarrhée" value="Oui"  required>
        <span>Non</span>
        <input type="radio" id="Diarrhée_non" name="Diarrhée"   value="Non" required><br><br>
        <label for="Toux">Toux</label>
        <span>Oui</span>
        <input type="radio" id="Toux_oui" name="Toux"  value="Oui" required>
        <span>Non</span>
        <input type="radio" id="Toux_non" name="Toux"   value="Non" required><br><br>
        <label for="perte_d_odorat">Perte d'odorat</label>
        <span>Oui</span>
        <input type="radio" id="perte_d_odorat_oui" name="PerteDOdorat" value="Oui" required>
        <span>Non</span>
        <input type="radio" id="perte_d_odorat_non" name="PerteDOdorat" value="Non"s required><br><br>

        <input type="submit" value="Soumettre">
    </form>

    <?php
  session_start();
  $erreur=""; //Initialisation de la variable d'erreur
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {  
            if($_POST["Temperature"]>=36 && ["Temperature"]<=40){
                        // Vérification des champs du formulaire
                   
                        
                    // Récupère les données soumises par l'utilisateur à partir de $_POST
                    $nom = $_POST["Nom"];
                    $prenom = $_POST["Prenom"];
                    $poids =$_POST["Poids"]; 
                    $temperature = $_POST["Temperature"];
                    $age = $_POST["Age"];
                    $Maux_tete = $_POST["mauxdetete"];
                    $toux = $_POST["Toux"];
                    $diarrhee = $_POST["Diarrhée"];
                    $perte_d_odorat = $_POST["PerteDOdorat"];
                    
                
                    // Concatène toutes les données dans une seule chaîne
                    $resultats = "Nom : " . htmlspecialchars($nom) . "<br>" .
                                "Prénom : " . htmlspecialchars($prenom) . "<br>" .
                                "Poids:" . htmlspecialchars($poids) . "<br>" .
                                "T°C : " . htmlspecialchars($temperature) . "<br>" .
                                "Âge : " . htmlspecialchars($age) . "<br>" .
                                "Maux de tête : " . htmlspecialchars($Maux_tete) . "<br>" .
                                "Toux : " . htmlspecialchars($toux) . "<br>" .
                                "Diarrhée : " . htmlspecialchars($diarrhee) . "<br>" .
                                "Perte d'odorat : " . htmlspecialchars($perte_d_odorat);
                
                    // Affiche les données soumises dans un seul paragraphe
                    echo "<h2>Résultats du formulaire :</h2>";
                    echo "<p>$resultats</p>";
                    
                
                    // Initialisez la variable $score
                    $score = 0;
                
                    // Calculer le score en fonction des critères
                    if ($temperature >= 15 && $temperature <= 35) {
                        $score += 10; // Ajoutez 10% au score
                    } elseif ($temperature > 35) {
                        $score += 15; // Ajoutez 15% au score
                    }
                
                    if ($toux == "Oui") {
                        $score += 10; // Ajoutez 10% au score
                    }
                
                    if ($diarrhee == "Oui") {
                        $score += 5; // Ajoutez 5% au score
                    }
                
                    if ($age == "16-35") {
                        $score += 5; // Ajoutez 5% au score
                    } elseif ($age == "36-45") {
                        $score += 10; // Ajoutez 10% au score
                    } elseif ($age == "46-100") {
                        $score += 15; // Ajoutez 15% au score
                    }
                
                    // Stockez le score dans la session
                    $_SESSION['score'] = $score;
                
                    // Affichez le résultat en fonction du score
                    if ($score >= 0 && $score < 30) {
                        echo "Vous n'êtes pas susceptible. Votre score est de $score%";
                    } elseif ($score >= 30 && $score < 80) {
                        echo "Vous êtes susceptible. Votre score est de $score%";
                    } elseif ($score >= 80 && $score <= 100) {
                        echo "Vous êtes très susceptible. Votre score est de $score%";
                    } else {
                        echo "Erreur dans le calcul du score.";
                    }
                    if (!isset($_SESSION['historique'])) {
                        $_SESSION['historique'] = array();
                    }
                    
                    // Vérifier si le formulaire a été soumis
                   
                        // Récupérer les données du formulaires
                        $nom = $_POST["Nom"];
                        $prenom = $_POST["Prenom"];
                        $poids =$_POST ["Poids"];
                        $temperature = $_POST["Temperature"];
                        $age = $_POST["Age"];
                        $Maux_tete = $_POST["mauxdetete"];
                        $toux = $_POST["Toux"];
                        $diarrhee = $_POST["Diarrhée"];
                        $perte_d_odorat = $_POST["PerteDOdorat"];
                        $result=$score;
                    
                        // Créer un tableau associatif avec les données du formulaire
                        $nouvelleSoumission = array(
                            'Nom' => $nom,
                            'Prénom' => $prenom,
                            'Poids' => $poids,
                            'Temperature' => $temperature,
                            'Age' => $age,
                            'Maux de tête' => $Maux_tete,
                            'Toux' => $toux,
                            'Diarrhée' => $diarrhee,
                            'Perte_d_odorat' => $perte_d_odorat,
                            'Score' => $score
                        );
                        // Vérifier si le tableau de session pour l'historique existe
  
  
      // Ajouter la soumission à l'historique
      $_SESSION['historique'][] = $nouvelleSoumission;
  
  
      // Afficher l'historique sous forme de tableau
      echo "<h2>Historique des soumissions :</h2>";
      echo "<table border='1'>";
      echo "<tr><th>Nom</th><th>Prénom</th><th>Poids</th><th>Temperature</th><th>Age</th><th>Maux de tête</th><th>Toux</th><th>Diarrhée</th><th>Perte d'odorat</th><th>Score</th></tr>";
      
      foreach ($_SESSION['historique'] as $soumission) {
          echo "<tr>";
          echo "<td>" . ($soumission['Nom']) . "</td>";
          echo "<td>" . ($soumission['Prénom']) . "</td>";
          echo "<td>" . ($soumission['Poids']) . "</td>";
          echo "<td>" . ($soumission['Temperature']) . "</td>";
          echo "<td>" . ($soumission['Age']) . "</td>";
          echo "<td>" . ($soumission['Maux de tête']) . "</td>";
          echo "<td>" . ($soumission['Toux']) . "</td>";
          echo "<td>" . ($soumission['Diarrhée']) . "</td>";
          echo "<td>" . ($soumission['Perte_d_odorat']) . "</td>";
          echo "<td>" .($soumission['Score']) . "</td>";
          echo "</tr>";
      
      
      echo "</table>";
      
            }
    }else{
    echo "temperature doit prendre les valeurs comprisent entre 36 & 40";
  }
  
  
}  
  
    ?>
</body>
</html>
