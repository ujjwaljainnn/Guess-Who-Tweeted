<?php  

    /**
     * The following if loop checks if the user is in
     * a session which start by visiting our index.php page, 
     * if yes, it continues to play the game
     * if not, it redirects the user to the main page first
     */
    session_start();
    if(!isset($_SESSION['attempt'])){
        header("Location: index.php");
    }
    function newTweet(){
        /**
         * Shuffling the array that contain only tweet-texts of 
         * the tweets that fulfill our requirements 
         * Then storing the first elements of the shuffled arrays into another
         * array
         */
        
        shuffle($_SESSION['user1_array']);
        shuffle($_SESSION['user2_array']);
        $responses = array(
            $_SESSION['user1_array'][0],
            $_SESSION['user2_array'][0]
        );
        /**
         * Shuffling the array with the first elements and that contain one tweet from 
         * user 1 and another from user 2
         */
        shuffle($responses);
        
        /**
         * The next set of code selects the first element of the shuffled tweets and
         * then return an array with the tweet as the first element and the owner
         * of that tweet as the second element.
         */
        if(in_array($responses[0], $_SESSION['user1_array'])){
            return array(
                $responses[0],
                "user1"
            );
        } else {
            return array(
                $responses[0],
                "user2"
            );
        }
        
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
    <link rel="stylesheet" href="./style/guessStyle.css">

    <title>Guess the Tweeter</title>
    </head>
    <body>
    <div class="container">
        <h1>Guess the tweet given in the blue box</h1>
    </div>
    <div class = "container" id = "tweet">
        <?php
            /**
             * the following three lines fetch the returned array from newTweet()
             * and then store the tweet text and tweet owner in variables
             */
            $tweetInfo = newTweet();
            $tweet = $tweetInfo[0];
            $tweetOwner = $tweetInfo[1];
        ?>
        <p id = "tweet-text"><?php echo $tweet; ?></p>
    </div>
    <div class="container" id = "options">
            <h1 id = "result"></h1>
            <?php
                echo '<form method = "post">
                    <button name = "user1-btn" class="option">
                        '. $_SESSION['user1_name'] .'
                    </button>  
                    <button name = "user2-btn" class="option">
                        '. $_SESSION['user2_name'] .'
                    </button>
                </form>';    
            ?>    
    </div>
    <?php
        $message = "";

        /**
         * This block of if code below is to handle all the 
         * post requests that can be made through the page
         * It includes post requests through 'elon musk' button,
         * 'kanye west' button and 'show results' button
         */
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            /**
             * This if checks if and else-if the button pressed was 'x' and the tweet
             * owner is 'x' or not and depending on that, it displays the result
             * and increases(or not) the session variable of score.
             */
            if(isset($_POST['user1-btn'])){
                if($tweetOwner == "user1"){
                    $message = "Spot on! Now try this one";
                    $_SESSION['score']++;
                } else {
                    $message = "Sorry! That's not the right answer. :( Try this one";
                }
                $_SESSION['attempt']++;
            } else if(isset($_POST['user2-btn'])){
                if($tweetOwner == "user2"){
                    $message = "Spot on! Now try this one";
                    $_SESSION['score']++;
                } else {
                    $message = "Sorry! That's not the right answer. :( Try this one";
                }
                $_SESSION['attempt']++;
            } else if(isset($_POST['result-btn'])){
                header("Location: ./result.php");
                exit();
            }
            echo "<h1 id = 'result-status'></h1>";
            echo '<script>
                document.getElementById("result-status").innerHTML = "' . $message . '";
            </script>';
            
        }
    ?>
    <?php
        echo '<form method = "post">
            <button name = "result-btn" id = "result-btn">
                Show Results
            </button>  
        </form>';
    ?>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>

