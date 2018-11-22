<?php

    $teamSize = $_POST['teamSize'];
    $teamGender = $_POST['teamGender'];
    $alphaOrder = $_POST['alphaOrder'];
    $displayImages = $_POST['displayImages'];

    
    function teamGenerator() {
    //    global $teamSize, $teamGender, $alphaOrder, $displayImages;
        
            if ($_POST['teamGender'] == 'female' && $_POST['teamSize'] <= 5) {
                
                
                
                $femalechar = array("Rey"=>"img/rey.png", "img/gamora.png", "img/wonderwoman.png", "img/xena.png", "img/blossom.png");
                
                shuffle($femalechar);
                
               // if ($_POST['alphaOrder'] == 'az') {
                    
                    //sort($femalechar);
                    
                    
                    for ($i = 0; $i < $_POST['teamSize']; $i++)
                    echo "<img src=\"$femalechar[$i]\">";
            
                /*
                } else if ($_POST['alphaOrder'] == 'za') {
                    
                    //rsort($femalechar);
                    
                    for ($i = 0; $i < $_POST['teamSize']; $i++)
                    echo "<img src=\"$femalechar[$i]\">";
                    
                }
                */
                
        
            } else if ($_POST['teamGender'] == 'male' && $_POST['teamSize'] <= 5) {
          
                $malechar = array("img/leo.png", "img/mario.png", "img/monte.png", "img/spiderman.png", "img/goku.png");
                
                shuffle($malechar);
                
                for ($i = 0; $i < $_POST['teamSize']; $i++)
                    echo "<img src=\"$malechar[$i]\">";
            
                
            } else if ($_POST['teamGender'] == 'coed' && $_POST['teamSize'] <= 10) {
          
                $coedchar = array("img/rey.png", "img/gamora.png", "img/wonderwoman.png", "img/xena.png", "img/blossom.png", "img/leo.png", "img/mario.png", "img/monte.png", "img/spiderman.png", "img/goku.png");
                
                shuffle($coedchar);
                
                for ($i = 0; $i < $_POST['teamSize']; $i++)
                    echo "<img src=\"$coedchar[$i]\">";
                    
            } else {

                echo 'Team size must be less than 6 for not coed teams and less than 20 for coed teams';
                
            }
            
        
            
            if ($_POST['teamGender'] == '') {
                echo "ERROR:Please select a gender";
            }
    }
    
?>