<?php
include("global.php")
?>

<DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50">
    <?php include("header.php");?>
    
    <main class="container mx-auto p-8">
        <h2 class="text-5xl font-extrabold text-gray-800 mb-4 text-center">📈 Le Zoo en Chiffres</h2>
        <p class="text-center text-xl text-green-700 mb-12">Une vue d'ensemble des données pour apprendre et visualiser.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            
            <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-green-500 text-center">
                <p class="text-2xl font-bold text-gray-700">Total d'Animaux</p>
                <p class="text-6xl font-extrabold text-green-600 mt-2" id="kpi-total-animaux">25</p> 
                <p class="text-sm text-gray-500">Espèces enregistrées</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-yellow-500 text-center">
                <p class="text-2xl font-bold text-gray-700">Habitat Majoritaire</p>
                <p class="text-4xl font-extrabold text-yellow-600 mt-2" id="kpi-habitat-majoritaire">Savane 🦁</p>
                <p class="text-sm text-gray-500">Le plus grand groupe</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-blue-500 text-center">
                <p class="text-2xl font-bold text-gray-700">Diversité</p>
                <p class="text-6xl font-extrabold text-blue-600 mt-2" id="kpi-habitats-differents">6</p>
                <p class="text-sm text-gray-500">Habitats différents</p>
            </div>
        </div>

        <hr class="my-10 border-gray-300">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            
            <div class="bg-white p-6 rounded-xl shadow-2xl">
                <h3 class="text-3xl font-semibold text-gray-800 mb-6 border-b pb-2">🌍 Répartition par Habitat</h3>
                <p class="text-gray-600 mb-4">Voir combien d'animaux vivent dans chaque type d'environnement.</p>
                
                <div id="habitat-bars" class="space-y-4">
                    
                    <div class="flex items-center space-x-4">
                        <span class="w-24 font-bold text-gray-700 shrink-0">Savane</span>
                        <div class="flex-grow bg-gray-200 rounded-full h-8">
                            <div class="bg-yellow-500 h-8 rounded-full flex items-center justify-end pr-2 text-white font-semibold shadow-md" style="width: 50%;">

                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <span class="w-24 font-bold text-gray-700 shrink-0">Forêt</span>
                        <div class="flex-grow bg-gray-200 rounded-full h-8">
                            <div class="bg-green-600 h-8 rounded-full flex items-center justify-end pr-2 text-white font-semibold shadow-md" style="width: 30%;">

                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <span class="w-24 font-bold text-gray-700 shrink-0">Aquatique</span>
                        <div class="flex-grow bg-gray-200 rounded-full h-8">
                            <div class="bg-blue-500 h-8 rounded-full flex items-center justify-end pr-2 text-white font-semibold shadow-md" style="width: 20%;">

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-2xl">
                <h3 class="text-3xl font-semibold text-gray-800 mb-6 border-b pb-2">🍽️ Répartition Alimentaire</h3>
                 <p class="text-gray-600 mb-4">Combien d'animaux sont carnivores, herbivores, ou omnivores.</p>
                
                <div id="regime-bars" class="space-y-4">
                    
                    <div class="flex items-center space-x-4">
                        <span class="w-28 font-bold text-gray-700 shrink-0">Herbivore</span>
                        <div class="flex-grow bg-gray-200 rounded-full h-8">
                            <div class="bg-green-400 h-8 rounded-full flex items-center justify-end pr-2 text-gray-800 font-semibold shadow-md" style="width: 40%;">

                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <span class="w-28 font-bold text-gray-700 shrink-0">Carnivore</span>
                        <div class="flex-grow bg-gray-200 rounded-full h-8">
                            <div class="bg-red-500 h-8 rounded-full flex items-center justify-end pr-2 text-white font-semibold shadow-md" style="width: 35%;">

                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <span class="w-28 font-bold text-gray-700 shrink-0">Omnivore</span>
                        <div class="flex-grow bg-gray-200 rounded-full h-8">
                            <div class="bg-orange-500 h-8 rounded-full flex items-center justify-end pr-2 text-white font-semibold shadow-md" style="width: 25%;">
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
</body>
</html>