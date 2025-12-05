<?php
include("global.php");
$animalsTotal = (int)mysqli_fetch_assoc(mysqli_query($database, "SELECT COUNT(*) FROM animal;"))['COUNT(*)'];
$habitatTotal = (int)mysqli_fetch_assoc(mysqli_query($database, "SELECT COUNT(*) FROM habitat;"))['COUNT(*)'];
$mostHabitat = mysqli_fetch_assoc(mysqli_query($database, "SELECT habitat.name_hab FROM `animal` JOIN habitat ON habitat.id_hab = animal.habitat_id GROUP BY habitat_id LIMIT 1;"))["name_hab"];


?>

<DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$dict[$currentLang][32]?></title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50">
    <?php include("header.php");?>

    <main class="container mx-auto p-8">
        <h2 class="text-5xl font-extrabold text-gray-800 mb-4 text-center">📈<?=$dict[$currentLang][33]?></h2>
        <p class="text-center text-xl text-green-700 mb-12"><?=$dict[$currentLang][34]?></p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            
            <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-green-500 text-center">
                <p class="text-2xl font-bold text-gray-700"><?=$dict[$currentLang][35]?></p>
                <p class="text-6xl font-extrabold text-green-600 mt-2"><?=$animalsTotal?></p> 
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-yellow-500 text-center">
                <p class="text-2xl font-bold text-gray-700"><?=$dict[$currentLang][36]?></p>
                <p class="text-4xl font-extrabold text-yellow-600 mt-2"><?=$mostHabitat?></p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-blue-500 text-center">
                <p class="text-2xl font-bold text-gray-700"><?=$dict[$currentLang][37]?></p>
                <p class="text-6xl font-extrabold text-blue-600 mt-2"><?=$habitatTotal?></p>
            </div>
        </div>

        <hr class="my-10 border-gray-300">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            
            <div class="bg-white p-6 rounded-xl shadow-2xl">
                <h3 class="text-3xl font-semibold text-gray-800 mb-6 border-b pb-2">🌍 <?=$dict[$currentLang][38]?></h3>
                <p class="text-gray-600 mb-4"><?=$dict[$currentLang][39]?></p>
                
                <div id="habitat-bars" class="space-y-4">
                    <?php
                        $colors = ["yellow", "green", "blue", "red", "orange", "purple"];
                        get_animals("SELECT habitat.name_hab, COUNT(*) AS total FROM `animal` JOIN habitat ON habitat.id_hab = animal.habitat_id GROUP BY habitat_id;");
                        
                        for($i=0; $i<count($animalsArray); $i++){
                            $animalsArray[$i]['percent'] = round(((int)$animalsArray[$i]['total'] / $animalsTotal) * 100);
                            echo "
                                <div class='flex items-center space-x-4'>
                                    <span class='w-24 font-bold text-gray-700 shrink-0'>{$animalsArray[$i]['name_hab']}</span>
                                    <div class='flex-grow bg-gray-200 rounded-full h-8'>
                                        <div class='bg-{$colors[$i]}-500 h-8 rounded-full flex items-center justify-end pr-2 text-white font-semibold shadow-md' style='width: {$animalsArray[$i]['percent']}%;'>
                                            {$animalsArray[$i]['percent']}%
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    ?>

                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-2xl">
                <h3 class="text-3xl font-semibold text-gray-800 mb-6 border-b pb-2">🍽️ <?=$dict[$currentLang][32]?></h3>
                <p class="text-gray-600 mb-4"><?=$dict[$currentLang][40]?></p>

                <div id="regime-bars" class="space-y-4">
                    <?php
                        get_animals("SELECT type_alimentaire, COUNT(*) AS total from animal GROUP BY type_alimentaire;");

                        for($i=0; $i<count($animalsArray); $i++){
                            $animalsArray[$i]['percent'] = round(((int)$animalsArray[$i]['total'] / $animalsTotal) * 100);
                            echo "
                                <div class='flex items-center space-x-4'>
                                    <span class='w-28 font-bold text-gray-700 shrink-0'>{$animalsArray[$i]['type_alimentaire']}</span>
                                    <div class='flex-grow bg-gray-200 rounded-full h-8'>
                                        <div class='bg-{$colors[$i]}-500 h-8 rounded-full text-white flex items-center justify-end pr-2 text-gray-800 font-semibold shadow-md' style='width: {$animalsArray[$i]['percent']}%;'>
                                            {$animalsArray[$i]['percent']}%
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                        mysqli_close($database);
                    ?>

                </div>
            </div>

        </div>
    </main>
</body>
</html>