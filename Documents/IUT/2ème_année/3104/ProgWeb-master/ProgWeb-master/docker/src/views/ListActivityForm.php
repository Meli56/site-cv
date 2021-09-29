<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des activités</title>
    </head>
    <body>
        <?php include('Header.php') ?>
        <h2>Your activities</h2>
        <?php if(empty($_SESSION['activities'])){
            echo "<p>You don't have activities</p>";
        }
        else{
            foreach ($_SESSION['activities'] as $activity){
                echo "<p class='activity'> $activity</p>";
            }
        }
        ?>
    </body>
