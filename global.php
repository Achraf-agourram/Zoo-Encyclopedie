<?php
$dict = [
    "fr" => ["Mon Petit Zoo", "Accès Educateurs", "Découvre les Animaux du Zoo !", "Filtrer les Animaux", "Habitat", "Tous les Habitats", "Savane", "Forêt", "Aquatique", "Régime Alimentaire", "Tous les Régimes", "Carnivore", "Herbivore", "Omnivore", "Appliquer les Filtres", "Habitat", "Régime", "Changer la langue", "Espace de Gestion des Animaux", "Ajouter un Nouvel Animal", "Formulaire Animal", "Nom de l'animal", "Image de l'animal", "Enregistrer l'Animal", "Annuler", "Nom", "Type alimentaire", "Modifier", "Supprimer", "Espace éducateur"],
    "en" => ["My Little Zoo", "Educators Access", "Discover the Zoo Animals!", "Filter Animals", "Habitat", "All Habitats", "Savana", "Forest", "Aquatic", "Diet", "All Diets", "Carnivore", "Herbivore", "Omnivore", "Apply Filters", "Habitat", "Diet", "Change language", "Animal Management Space", "Add a New Animal", "Animal Form", "Animal Name", "Animal Image", "Save Animal", "Cancel", "Name", "Type", "Edit", "Delete", "Educator Space"]
];

$database = mysqli_connect("localhost", "root", "", "zoo_enclopedie");
$animalsArray = [];
function get_animals($command){
    global $animalsArray;
    global $database;
    $animalsTable = mysqli_query($database, $command);
    while($row = mysqli_fetch_assoc($animalsTable)){
        array_push($animalsArray, $row);
    }
    mysqli_close($database);
}
session_start();
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = "en";
}
$currentLang = $_SESSION['lang'];

?>