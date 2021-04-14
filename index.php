<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superhumans</title>

    <!-- using for 'minimal' styling -->
    <link rel="stylesheet" href="https://taniarascia.github.io/primitive/css/main.css">
</head>
<body>
    <?php
        if(!isset($_SESSION["logged_in"])){
            header("Location: login.php");
            exit();
        }

        function read_db(){
            if (file_exists("database.json")){
                $data = file_get_contents("database.json");
                $database = json_decode($data, true);
                return $database;
            } else {
                $database = array();
                return $database;
            }

        }

        $logged_in_user = $_SESSION["logged_in"];
        $database = read_db();
        
        $user = $database[$logged_in_user];

        echo('
        <div class="small-container">
            <div class="flex-row">
                <div class="flex-small center">
                    <h4>Hello superhuman, '.$user["username"].'</h4>
                    <p>Actions on your superhuman account</p>
                    <hr/>
                    <a href="logout.php" class="button">Logout</a>
                    <a href="reset.php" class="button">Reset password</a>
                </div>
            </div>
        </div>
        ');
    ?>
</body>
</html>
