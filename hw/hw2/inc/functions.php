<?php

    function play() {
        $user = user();
        $pc = pc();
        selection($user, $pc);
        $winner = winner($user, $pc);
    }
    
    function user() {
        $object = array("rock", "paper", "scissors");
        $image = array("rock.png", "paper.png", "scissors.png");
        
        echo "<h3 id='userSelect'>Select One</h3> <br>";
        echo '<form action="index.php" method="POST">';
        
        for ($i = 0; $i < count($object); $i++) {
            echo "<button id='userBtn$i' type='submit' name='choice' value ='$object[$i]'><img src='img/$image[$i]' ></button><br>";
        }
        
        echo '</form>';
        $user = $_POST['choice'];
        return $user;
    }
    
    function pc() {
        $pc = rand(0,2);
        
        switch($pc)
        {
            case 0:
                $pc = "rock";
                break;
            case 1:
                $pc = "paper";
                break;
            case 2:
                $pc = "scissors";
                break;
        }
        return $pc;
    }
    
    function winner($user, $pc) {
        $userWins = true;
        $pcWins = false;
        $tie = false;
    
        if($user == $pc) {
            echo "<h2 id='result'>Its a Tie!</h2>";
            $tie = true;
            return 'tie';
        } else if($user == "rock" && $pc == "scissors") {
            echo"<h2 id='result'>You Win!</h2>";
        } else if($user == "paper" && $pc == "rock") {
            echo"<h2 id='result'>You Win!</h2>";
        } else if($user == "scissors" && $pc == "paper") {
            echo"<h2 id='result'>You Win!</h2>";
        } else {
            echo"<h2 id='result'>You Lose!</h2>";
            $userWins = false;
            $pcWins = true;
        }
        
        if ($userWins && !$tie) {
            return 'userWins';
        } else if (!$tie) {
            return 'pcWins';
        }
    }

    function selection($user, $pc) {
        $imageFileAssoc = array("rock"=>"rock.png", "paper"=>"paper.png", "scissors"=>"scissors.png");
        
        echo "<h3 id='userTag'>You</h3><br> <img id='userSelection' src=img/$imageFileAssoc[$user] /><br>";
        echo "<h3 id='pcTag'>PC</h3><br><img id='pcSelection' src=img/$imageFileAssoc[$pc] /><br>";
    }
    
?>