<?php
$dict = [
    "fr" => ["Mon Petit Zoo", "Accès Educateurs", "Découvre les Animaux du Zoo !", "Filtrer les Animaux", "Habitat", "Tous les Habitats", "Savane", "Forêt", "Aquatique", "Régime Alimentaire", "Tous les Régimes", "Carnivore", "Herbivore", "Omnivore", "Appliquer les Filtres", "Habitat", "Régime", "Changer la langue", "Espace de Gestion des Animaux", "Ajouter un Nouvel Animal", "Formulaire Animal", "Nom de l'animal", "Image de l'animal", "Enregistrer l'Animal", "Annuler", "Nom", "Type alimentaire", "Modifier", "Supprimer", "Espace éducateur", "Retour", "Modifier les informations d'animal", "Statistiques", "Le Zoo en Chiffres", "Une vue d'ensemble des données pour apprendre et visualiser", "Total d'Animaux", "Habitat Majoritaire", "Diversité", "Répartition par Habitat", "Voir combien d'animaux vivent dans chaque type d'environnement", "Répartition Alimentaire", "Combien d'animaux sont carnivores, herbivores, ou omnivores"],
    "en" => ["My Little Zoo", "Educators Access", "Discover the Zoo Animals!", "Filter Animals", "Habitat", "All Habitats", "Savana", "Forest", "Aquatic", "Diet", "All Diets", "Carnivore", "Herbivore", "Omnivore", "Apply Filters", "Habitat", "Diet", "Change language", "Animal Management Space", "Add a New Animal", "Animal Form", "Animal Name", "Animal Image", "Save Animal", "Cancel", "Name", "Type", "Edit", "Delete", "Educator Space", "Back", "Edit the animal informations", "Statistics", "The Zoo in Numbers", "An overview of data to learn and visualize", "Total Animals", "Main Habitat", "Diversity", "Habitat Distribution", "See how many animals live in each type of environment", "Diet Distribution", "How many animals are carnivores, herbivores, or omnivores"]
];

$database = mysqli_connect("localhost", "root", "", "zoo_enclopedie");
$animalsArray = [];
function get_animals($command){
    global $animalsArray;
    global $database;
    $animalsArray = [];
    $animalsTable = mysqli_query($database, $command);
    while($row = mysqli_fetch_assoc($animalsTable)){
        array_push($animalsArray, $row);
    }
}
session_start();
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = "en";
}
$currentLang = $_SESSION['lang'];

if(isset($_POST['changeLang'])){
    if($currentLang == "en"){$currentLang = "fr";}else{$currentLang = "en";}
    $_SESSION['lang'] = $currentLang;
}

if(isset($_POST['educatorAccess'])){
    header("Location: educator.php");
    exit();
}elseif(isset($_POST['stats'])){
    header("Location: statistiques.php");
    exit();
}elseif(isset($_POST['back'])){
    header("Location: index.php");
    exit();
}

?>