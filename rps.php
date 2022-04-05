<?php


function generate_computer_choice()
{
    $computer = rand(0, 90);
    // $computer < 29
    if ($computer < 30) {
        $computer_choice = "rock";
        return $computer_choice;
    }    

    // $computer > 29 && $computer < 60
    elseif ($computer > 29 && $computer < 60) {
        $computer_choice = "paper";
        return $computer_choice;
    } 

    else {
        $computer_choice = "scissors";
        return $computer_choice;
    }
}

function compare_choices($player_choice, $computer_choice){
    // -1 = player wins
    //  0 = tie
    //  1 = computer wins
    if ($player_choice == $computer_choice) {
        return 0;
    } elseif ($player_choice == "rock" && $computer_choice == "scissors") {
        return -1;
    } elseif ($player_choice == "scissors" && $computer_choice == "paper") {
        return -1;
    } elseif ($player_choice == "paper" && $computer_choice == "rock") {
        return -1;
    } else {
        return 1;
    }
}

function display_results($message, $player_choice, $computer_choice){
    $file = file_get_contents("result.html");
    $file = str_replace('{MESSAGE}', $message, $file);
    
    $file = str_replace('{CHOICE1}', $player_choice, $file);
    $file = str_replace('{CHOICE2}', $computer_choice, $file);
    echo $file;
}

if(isset($_POST["choice"])){
    $player_choice = $_POST["choice"];    
    $computer_choice = generate_computer_choice();
    $message = "";
    //echo $player_choice;
    //echo $computer_choice;
   
    $result = compare_choices($player_choice, $computer_choice);
    
    if ($result == 0) {
        $message = "TIE";
    } elseif ($result == -1) {
        $message = "You won!";
    } else {
        $message = "Computer wins!";
    }
    display_results($message, $player_choice, $computer_choice);
}
else{
    echo file_get_contents("omer rps.html");
}