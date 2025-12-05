<?php
echo "
    <header class='bg-green-600 p-4 shadow-lg'>
        <div class='mx-auto flex justify-between items-center'>
            <h1 class='text-3xl font-bold text-white'>🦁 {$dict[$currentLang][0]} 🦒</h1>
            <form method='POST'>
                <button class='bg-white text-green-800 px-4 py-2 rounded-full transition duration-300' type='submit' name='changeLang'>🌏 {$dict[$currentLang][17]}</button>
                <a href='statistiques.php' class='bg-white text-green-800 px-4 py-2 rounded-full transition duration-300'>📊 {$dict[$currentLang][32]}</a>
                <a href='educator.php' class='bg-white text-green-800 px-4 py-2 rounded-full transition duration-300'>👨‍🏫 {$dict[$currentLang][1]}</a>
            </form>
        </div>
    </header>
"; 
?>