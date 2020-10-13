<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./style/resultStyle.css">
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['attempt'])){
            echo '
            <div id = "success" class = "container">
            <h1>You got ' . $_SESSION['score'] . ' right out of '. $_SESSION['attempt'] . ' tweets</h1>
            </div>';
            session_unset();
            session_destroy();
        } else{
            echo '
            <div id = "failure" class = "container"><h1>Please play the game first!</h1>';
            echo '<p>Click <a href = "./index.php">here</a> for to play the game<p></div>';  
        }
    ?>
</body>
</html>