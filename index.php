<?php
    session_start();
    $_SESSION['attempt'] = 0;
    $_SESSION['score'] = 0;
    $_SESSION['user1_name'] = "";
    $_SESSION['user2_name'] = "";
    $_SESSION['user1_array'] = array();
    $_SESSION['user2_array'] = array();
    if(array_key_exists('elonye-btn', $_POST)){
        header("Location: guess.php");
    }
    if(array_key_exists('random-btn', $_POST)){
        header("Location: chooseUsers.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/indexStyle.css">
    <title>Guess the Tweeter</title>
  </head>
  <body>
        <!-- This code helps user determine the option of whether they
        want to play kanye vs elon or random two-->
        <h1>Guess the Tweet</h1> 
        <div class="column">
            <form method = "post">
                <button name = "elonye-btn" id = "elonye-btn"> 
                  PLAY ELON VS YE  
                </button>
                <!-- Random two not implemented-->
                <button name = "random-btn" id = "random-btn">
                  PLAY RANDOM TWO
                </button>
            </form>                
      </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
