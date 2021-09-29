<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SportTrack | Sign In</title>
        <link  rel="stylesheet" href="./public/css/style.css">
    </head>
    <body>
        <?php include('Header.php'); ?>
        <h1><?php echo $_SESSION['message'] ?></h1>

        <?php if(isset($_SESSION['mail'])) { ?>
        <div class="informationSing">
            <h2>Your informations</h2>
            <p>First name : <? echo $_SESSION['fname']?></p>
            <p>Last name : <? echo $_SESSION['lname']?></p>
            <p>Birth date : <? echo $_SESSION['birthDate']?></p>
            <p>Gender : <? echo $_SESSION['gender'] ?></p>
            <p>Height : <? echo $_SESSION['height']?></p>
            <p>Weight : <? echo $_SESSION['weight'] ?></p>
            <p>Mail : <? echo $_SESSION['mail'] ?></p>
            <p>Password : Hum no we're not going to print your password here</p>
        </div>
        <?php } ?>
    </body>

</html>