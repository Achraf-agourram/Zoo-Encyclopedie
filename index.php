<?php
$filtred = false;
$animalsArray = [];
function get_animals($command){
    global $animalsArray;
    $database = mysqli_connect("localhost", "root", "", "zoo_enclopedie");
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
if(isset($_POST['changeLang'])){
    if($currentLang == "en"){$currentLang = "fr";}else{$currentLang = "en";}
    $_SESSION['lang'] = $currentLang;
}
if(isset($_POST['filter'])){
    $filtred = true;
    $habitat =  $_POST['habitat'];
    $diet = $_POST['diet'];

    if(!$habitat && !$diet){
        get_animals("SELECT name_animal, image_animal, type_alimentaire, Habitat.name_hab FROM Animal JOIN Habitat ON Animal.habitat_id = Habitat.id_hab;");
    }elseif($habitat && !$diet){
        get_animals("SELECT name_animal, image_animal, type_alimentaire, Habitat.name_hab FROM Animal JOIN Habitat ON Animal.habitat_id = Habitat.id_hab WHERE Habitat.name_hab = '$habitat';");
    }elseif(!$habitat && $diet){
        get_animals("SELECT name_animal, image_animal, type_alimentaire, Habitat.name_hab FROM Animal JOIN Habitat ON Animal.habitat_id = Habitat.id_hab WHERE type_alimentaire= '$diet';");
    }
    else{
        get_animals("SELECT name_animal, image_animal, type_alimentaire, Habitat.name_hab FROM Animal JOIN Habitat ON Animal.habitat_id = Habitat.id_hab WHERE Habitat.name_hab = '$habitat' AND type_alimentaire= '$diet';");
    }
}

include("dictionaire.php");

if(!$filtred) get_animals("SELECT name_animal, image_animal, type_alimentaire, Habitat.name_hab FROM Animal JOIN Habitat ON Animal.habitat_id = Habitat.id_hab;");

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

    <main class="mx-auto p-6">
        <h2 class="text-4xl font-extrabold text-gray-800 mb-8 text-center"><?= $dict[$currentLang][2]?> 🌎</h2>
        
        <div class="bg-white p-6 rounded-lg shadow-xl mb-10">
            <h3 class="text-2xl font-semibold text-green-700 mb-4">🔎 <?= $dict[$currentLang][3]?></h3>
            <form class="grid grid-cols-1 md:grid-cols-3 gap-6" method="POST">
                <div>
                    <label for="habitat-filter" class="block text-sm font-medium text-gray-700 mb-2"><?= $dict[$currentLang][4]?> :</label>
                    <select name="habitat" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                        <option value=""><?= $dict[$currentLang][5]?></option>
                        <option value="Savane"><?= $dict[$currentLang][6]?></option>
                        <option value="Forest"><?= $dict[$currentLang][7]?></option>
                        <option value="Aquatique"><?= $dict[$currentLang][8]?></option>
                    </select>
                </div>
                
                <div>
                    <label for="food-filter" class="block text-sm font-medium text-gray-700 mb-2"><?= $dict[$currentLang][9]?> :</label>
                    <select name="diet" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                        <option value=""><?= $dict[$currentLang][10]?></option>
                        <option value="Carnivore"><?= $dict[$currentLang][11]?></option>
                        <option value="Herbivore"><?= $dict[$currentLang][12]?></option>
                        <option value="Omnivore"><?= $dict[$currentLang][13]?></option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button class="w-full bg-green-500 text-white font-bold p-3 rounded-lg hover:bg-green-600 transition duration-300" name="filter" type="submit">
                        <?= $dict[$currentLang][14]?>
                    </button>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
                foreach($animalsArray as $animal){
                    echo "
                    <div class='bg-white rounded-xl shadow-2xl overflow-hidden transform hover:scale-105 transition duration-300'>
                        <img src='images/{$animal['image_animal']}' alt='{$animal['name_animal']}' class='w-full h-48 object-cover'>
                        <div class='p-4'>
                            <h4 class='text-xl font-bold text-gray-800 mb-2'>{$animal['name_animal']}</h4>
                            <p class='text-sm text-gray-600'>
                                <span class='font-semibold text-green-600'>{$dict[$currentLang][15]} :</span> {$animal['name_hab']}<br>
                                <span class='font-semibold text-red-600'>{$dict[$currentLang][16]} :</span> {$animal['type_alimentaire']}
                            </p>
                        </div>
                    </div>
                    ";
                }
            ?>
            </div>
    </main>

</body>
</html>