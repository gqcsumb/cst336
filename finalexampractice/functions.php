<?php

    $realName = $_POST['realName'];
    
    $bruceWayne = 'img/superheroes/batman.png';
    $steveRogers = 'img/superheroes/captain_america.png'; 
    $bruceBanner = 'img/superheroes/hulk.png';
    $tonyStark = 'img/superheroes/iron_man.png';
    $peterParker = 'img/superheroes/spiderman.png';
    $clarkKent = 'img/superheroes/superman.png';
    $dianaPrince = 'img/superheroes/wonder_woman.png';
    

    function heroGenerator() {
        
        global $bruceWayne, $steveRogers, $bruceBanner, $tonyStark, $peterParker, $clarkKent, $dianaPrince;
        
        $hero = array($bruceWayne, $steveRogers, $bruceBanner, $tonyStark, $peterParker, $clarkKent, $dianaPrince);

        $randItem = array_rand($hero);
        echo "<img src=\"$hero[$randItem]\"/>";
        
        if ($_POST['realName'] == 'female' && $_POST['teamSize'] <= 5) {
    }
    
?>



