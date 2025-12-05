<?php
echo "
    <header class='bg-green-600 p-4 shadow-lg'>
        <div class='mx-auto flex justify-between items-center'>
            <h1 class='text-3xl font-bold text-white'>🦁 {$dict[$currentLang][0]} 🦒</h1>
            <form method='POST'>
                <button class='bg-white text-green-800 px-4 py-2 rounded-full transition duration-300' type='submit' name='changeLang'>🌏 {$dict[$currentLang][17]}</button>
                <button class='bg-white text-green-800 px-4 py-2 rounded-full transition duration-300' type='submit' name='stats'>📊 {$dict[$currentLang][32]}</button>
                <button class='bg-white text-green-800 px-4 py-2 rounded-full transition duration-300' type='submit' name='educatorAccess'>👨‍🏫 {$dict[$currentLang][1]}</button>
            </form>
        </div>
    </header>
"; 
?>