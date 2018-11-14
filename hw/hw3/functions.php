<?php

function answers() {
    
    $score = 0;
    
    //Question 1
    if ($_POST['Q1'] == '7') {
        $score += 1;
    }
    
    //Question 2  
    if (($_POST['Q2'] == 'Argentina') || ($_POST['Q2'] == 'Costa Rica') || ($_POST['Q2'] == 'Greenland')) {
        $score += 1;
    } 
    if (($_POST['Q2'] == 'Argentina') || ($_POST['Q2'] == 'Costa Rica') || ($_POST['Q2'] == 'Greenland') || ($_POST['Q2'] == 'India')) {
        $score += 0;
    } 
    
    
    //Question 3
    if ($_POST['Q3'] == 'China') {
        $score += 1;
    }
    
    //Question 4
    if ($_POST['Q4'] == 'Brazil') {
        $score += 1;
    }
    
    //Question 5
    if ($_POST['Q4'] == 'Brazil') {
        $score += 1;
    }
    
    //Question 6
    if (strtolower($_POST['Q4']) == 'Brazil') {
        $score += 1;
    }
    
    finalscore($score);
    
}

function finalscore($score) {
    echo "Your total score is $score out of 5 Points. ";
}
    
?>

