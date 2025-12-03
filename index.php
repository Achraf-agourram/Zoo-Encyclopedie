<?php
session_start();
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = "en";
}
$currentLang = $_SESSION['lang'];
if(isset($_POST['changeLang'])){
    if($currentLang == "en"){$currentLang = "fr";}else{$currentLang = "en";}
    $_SESSION['lang'] = $currentLang;
}

$dict = [
    "fr" => ["Mon Petit Zoo", "Accès Educateurs", "Découvre les Animaux du Zoo !", "Filtrer les Animaux", "Habitat", "Tous les Habitats", "Savane", "Forêt", "Aquatique", "Régime Alimentaire", "Tous les Régimes", "Carnivore", "Herbivore", "Omnivore", "Appliquer les Filtres", "Habitat", "Régime", "Changer la langue"],
    "en" => ["My Little Zoo", "Educators Access", "Discover the Zoo Animals!", "Filter Animals", "Habitat", "All Habitats", "Savanna", "Forest", "Aquatic", "Diet", "All Diets", "Carnivore", "Herbivore", "Omnivore", "Apply Filters", "Habitat", "Diet", "Change language"]
];


?>

<DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Petit Zoo</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50">

    <header class="bg-green-600 p-4 shadow-lg">
        <div class="mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold text-white">🦁 <?= $dict[$currentLang][0]?> 🦒</h1>
            <form method="POST">
                <button class="bg-white text-green-800 px-4 py-2 rounded-full transition duration-300" type="submit" name="changeLang">🌏<?= $dict[$currentLang][17]?></button>
                <button class="bg-white text-green-800 px-4 py-2 rounded-full transition duration-300" type="submit" name="educatorAccess">👨‍🏫 <?= $dict[$currentLang][1]?></button>
            </form>
        </div>
    </header>

    <main class="mx-auto p-6" id="animaux">
        <h2 class="text-4xl font-extrabold text-gray-800 mb-8 text-center"><?= $dict[$currentLang][2]?> 🌎</h2>
        
        <div class="bg-white p-6 rounded-lg shadow-xl mb-10">
            <h3 class="text-2xl font-semibold text-green-700 mb-4">🔎 <?= $dict[$currentLang][3]?></h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="habitat-filter" class="block text-sm font-medium text-gray-700 mb-2"><?= $dict[$currentLang][4]?> :</label>
                    <select id="habitat-filter" name="habitat" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                        <option value=""><?= $dict[$currentLang][5]?></option>
                        <option value="savane"><?= $dict[$currentLang][6]?></option>
                        <option value="forêt"><?= $dict[$currentLang][7]?></option>
                        <option value="aquatique"><?= $dict[$currentLang][8]?></option>
                    </select>
                </div>
                
                <div>
                    <label for="food-filter" class="block text-sm font-medium text-gray-700 mb-2"><?= $dict[$currentLang][9]?> :</label>
                    <select id="food-filter" name="food-type" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                        <option value=""><?= $dict[$currentLang][10]?></option>
                        <option value="carnivore"><?= $dict[$currentLang][11]?></option>
                        <option value="herbivore"><?= $dict[$currentLang][12]?></option>
                        <option value="omnivore"><?= $dict[$currentLang][13]?></option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button class="w-full bg-green-500 text-white font-bold p-3 rounded-lg hover:bg-green-600 transition duration-300">
                        <?= $dict[$currentLang][14]?>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8" id="animal-grid">
            
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transform hover:scale-105 transition duration-300 cursor-pointer">
                <img src="images/lion.jpg" alt="Lion" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Lion 🦁</h4>
                    <p class="text-sm text-gray-600">
                        <span class="font-semibold text-green-600"><?= $dict[$currentLang][15]?> :</span> Savane<br>
                        <span class="font-semibold text-red-600"><?= $dict[$currentLang][16]?> :</span> Carnivore
                    </p>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transform hover:scale-105 transition duration-300 cursor-pointer">
                <img src="images/giraffe.jpg" alt="Girafe" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Girafe 🦒</h4>
                    <p class="text-sm text-gray-600">
                        <span class="font-semibold text-green-600"><?= $dict[$currentLang][15]?> :</span> Savane<br>
                        <span class="font-semibold text-red-600"><?= $dict[$currentLang][16]?> :</span> Carnivore
                    </p>
                </div>
            </div>
            
            </div>
    </main>

</body>
</html>