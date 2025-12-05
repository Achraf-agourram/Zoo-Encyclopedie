<?php
include("global.php");

if(isset($_POST['addAnimal'])){
    $name = $_POST['name'];
    $habitat = $_POST['habitat_id'];
    $diet = $_POST['type_alimentaire'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
    mysqli_query($database, "INSERT INTO animal (name_animal, type_alimentaire, image_animal, habitat_id) VALUES ('$name', '$diet', '$image', $habitat);");
}
if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    mysqli_query($database, "DELETE FROM Animal WHERE id = $id;");
}
if(isset($_POST['editAnimal'])){
    $id = $_POST['editAnimal'];
    $name = $_POST['name'];
    $habitat = $_POST['habitat_id'];
    $diet = $_POST['type_alimentaire'];
    $image = $_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
    mysqli_query($database, "UPDATE Animal SET name_animal = '$name', type_alimentaire = '$diet', image_animal = '$image', habitat_id = $habitat WHERE id = $id;");
}

get_animals("SELECT id, name_animal, image_animal, type_alimentaire, Habitat.name_hab FROM Animal JOIN Habitat ON Animal.habitat_id = Habitat.id_hab;");
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $dict[$currentLang][29]?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="mx-auto p-6 bg-white rounded-lg" id="gestion">
        <h2 class="text-4xl font-extrabold text-green-700 mb-10 text-center"><?= $dict[$currentLang][18]?></h2>

        <div class="flex justify-between">
            <button onclick="document.getElementById('form-ajout').classList.toggle('hidden')"
                class="bg-green-500 text-white font-bold px-6 py-3 rounded-lg hover:bg-green-600 transition duration-300 mb-6 flex items-center">
                + <?= $dict[$currentLang][19]?>
            </button>
            <form method="post"><button type="submit" name="back" class="bg-red-500 text-white font-bold px-6 py-3 rounded-lg hover:bg-red-600 transition duration-300 mb-6 flex items-center"><?= $dict[$currentLang][30]?></button></form>
        </div>
        
        <?php
            if(isset($_POST['edit'])){
                echo "
                    <div class='bg-green-50 p-6 rounded-lg shadow-inner mb-8' id='form-edit'>
                        <h3 class='text-2xl font-semibold text-green-700 mb-4'>{$dict[$currentLang][31]}</h3>
                        <form method='POST' class='grid grid-cols-1 md:grid-cols-2 gap-6' enctype='multipart/form-data'>
                            <div>
                                <label for='nom' class='block text-sm font-medium text-gray-700'>{$dict[$currentLang][21]} :</label>
                                <input type='text' name='name' required class='mt-1 w-full p-2 border border-gray-300 rounded-md'>
                            </div>

                            <div>
                                <label for='habitat' class='block text-sm font-medium text-gray-700'>Habitat :</label>
                                <select id='habitat' name='habitat_id' required class='mt-1 w-full p-2 border border-gray-300 rounded-md'>
                                    <option value='1'>Savane</option>
                                    <option value='2'>Forêt</option>
                                    <option value='3'>Aquatique</option>
                                    <option value='4'>Desert</option>
                                </select>
                            </div>

                            <div>
                                <label for='regime' class='block text-sm font-medium text-gray-700'>{$dict[$currentLang][16]} :</label>
                                <select id='regime' name='type_alimentaire' required
                                    class='mt-1 w-full p-2 border border-gray-300 rounded-md'>
                                    <option value='carnivore'>Carnivore</option>
                                    <option value='herbivore'>Herbivore</option>
                                    <option value='omnivore'>Omnivore</option>
                                </select>
                            </div>

                            <div>
                                <label for='image' class='block text-sm font-medium text-gray-700'>{$dict[$currentLang][22]} :</label>
                                <input type='file' required name='image' accept='image/*' class='mt-1 w-full p-2 border border-gray-300 rounded-md'>
                            </div>

                            <div class='md:col-span-2 flex justify-end space-x-4'>
                                <button type='submit' name='editAnimal' value='{$_POST['edit']}' class='bg-green-500 text-white font-bold px-6 py-2 rounded-lg hover:bg-green-600 transition'>{$dict[$currentLang][23]}</button>
                                <button type='button' name='cancelEdit' class='bg-gray-300 text-gray-800 font-bold px-6 py-2 rounded-lg hover:bg-gray-400 transition'>{$dict[$currentLang][24]}</button>
                            </div>
                        </form>
                    </div>
                ";
            }
        ?>

        <div id="form-ajout" class="bg-green-50 p-6 rounded-lg shadow-inner mb-8 hidden">
            <h3 class="text-2xl font-semibold text-green-700 mb-4"><?= $dict[$currentLang][20]?></h3>
            <form method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6" enctype="multipart/form-data">
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700"><?= $dict[$currentLang][21]?> :</label>
                    <input type="text" name="name" required class="mt-1 w-full p-2 border border-gray-300 rounded-md">
                </div>

                <div>
                    <label for="habitat" class="block text-sm font-medium text-gray-700">Habitat :</label>
                    <select id="habitat" name="habitat_id" required class="mt-1 w-full p-2 border border-gray-300 rounded-md">
                        <option value="1">Savane</option>
                        <option value="2">Forêt</option>
                        <option value="3">Aquatique</option>
                        <option value="4">Desert</option>
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
                    <input type="file" required name="image" accept="image/*" class="mt-1 w-full p-2 border border-gray-300 rounded-md">
                </div>

                <div class="md:col-span-2 flex justify-end space-x-4">
                    <button type="submit" name="addAnimal"
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
                    <?php
                        foreach($animalsArray as $animal){
                            echo "
                                <tr class='hover:bg-gray-50'>
                                    <td class='px-6 py-4 whitespace-nowrap'><img src='images/{$animal['image_animal']}' alt='{$animal['name_animal']}'
                                            class='h-10 w-10 rounded-full object-cover'></td>
                                    <td class='px-6 py-4 whitespace-nowrap font-medium text-gray-900'>{$animal['name_animal']}</td>
                                    <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$animal['name_hab']}</td>
                                    <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$animal['type_alimentaire']}</td>
                                    <td class='px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2'>
                                        <form method='POST'>
                                            <button type='submit' name='edit' class='text-green-600 hover:text-green-900' value='{$animal['id']}'>{$dict[$currentLang][27]}</button>
                                            <button type='submit' name='delete' class='text-red-600 hover:text-red-900' value='{$animal['id']}'>{$dict[$currentLang][28]}</button>
                                        </form>
                                    </td>
                                </tr>
                            ";
                        }
                        mysqli_close($database);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.querySelector('[name="cancelEdit"]').addEventListener("click", () => {document.getElementById('form-edit').classList.add('hidden')});
    </script>
</body>

</html>