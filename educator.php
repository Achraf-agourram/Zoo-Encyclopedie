<?php
include("global.php");
session_start();
$currentLang = $_SESSION['lang'];
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $dict[$currentLang][29]?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container mx-auto p-6 bg-white rounded-lg my-10" id="gestion">
        <h2 class="text-4xl font-extrabold text-green-700 mb-10 text-center"><?= $dict[$currentLang][18]?></h2>

        <button onclick="document.getElementById('form-ajout').classList.toggle('hidden')"
            class="bg-green-500 text-white font-bold px-6 py-3 rounded-lg hover:bg-green-600 transition duration-300 mb-6 flex items-center">
            + <?= $dict[$currentLang][19]?>
        </button>

        <div id="form-ajout" class="bg-green-50 p-6 rounded-lg shadow-inner mb-8 hidden">
            <h3 class="text-2xl font-semibold text-green-700 mb-4"><?= $dict[$currentLang][20]?></h3>
            <form action="traitement_animal.php" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <input type="hidden" name="animal_id" value="">
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700"><?= $dict[$currentLang][21]?> :</label>
                    <input type="text" id="nom" name="nom" required
                        class="mt-1 w-full p-2 border border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="habitat" class="block text-sm font-medium text-gray-700">Habitat :</label>
                    <select id="habitat" name="habitat_id" required
                        class="mt-1 w-full p-2 border border-gray-300 rounded-md">
                        <option value="1">Savane</option>
                        <option value="2">Forêt</option>
                        <option value="3">Aquatique</option>
                    </select>
                </div>

                <div>
                    <label for="regime" class="block text-sm font-medium text-gray-700"><?= $dict[$currentLang][16]?> :</label>
                    <select id="regime" name="type_alimentaire" required
                        class="mt-1 w-full p-2 border border-gray-300 rounded-md">
                        <option value="carnivore">Carnivore</option>
                        <option value="herbivore">Herbivore</option>
                        <option value="omnivore">Omnivore</option>
                    </select>
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700"><?= $dict[$currentLang][22]?> :</label>
                    <input type="file" id="image" name="image" accept="image/*"
                        class="mt-1 w-full p-2 border border-gray-300 rounded-md">
                </div>

                <div class="md:col-span-2 flex justify-end space-x-4">
                    <button type="submit"
                        class="bg-green-500 text-white font-bold px-6 py-2 rounded-lg hover:bg-green-600 transition"><?= $dict[$currentLang][23]?></button>
                    <button type="button" onclick="document.getElementById('form-ajout').classList.add('hidden')"
                        class="bg-gray-300 text-gray-800 font-bold px-6 py-2 rounded-lg hover:bg-gray-400 transition"><?= $dict[$currentLang][24]?></button>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow-xl">
            <table class="min-w-full divide-y">
                <thead class="bg-green-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"><?= $dict[$currentLang][25]?>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Habitat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                         <?= $dict[$currentLang][26]?></th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap"><img src="images/lion.jpg" alt="Lion"
                                class="h-10 w-10 rounded-full object-cover"></td>
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">Lion</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Savane</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Carnivore</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                            <button class="text-green-600 hover:text-green-900"><?= $dict[$currentLang][27]?></button>
                            <button class="text-red-600 hover:text-red-900"><?= $dict[$currentLang][28]?></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>