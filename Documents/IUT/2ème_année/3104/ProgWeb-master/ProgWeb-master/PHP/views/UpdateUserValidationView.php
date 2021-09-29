<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportTrack | Update</title>
</head>
<body>
<h1><? echo $_SESSION['message'] ?></h1>

<div class="informationSing">
    <h2>Your informations</h2>
    <p>First name : <? echo $_SESSION['fname']?></p>
    <p>Last name : <? echo $_SESSION['lname']?></p>
    <p>Birth date : <? echo $_SESSION['birthDate']?></p>
    <p>Gender : <? echo $_SESSION['gender'] ?></p>
    <p>Height : <? echo $_SESSION['height']?></p>
    <p>Weight : <? echo $_SESSION['weight'] ?></p>
    <p>Mail : <? echo $_SESSION['mail'] ?></p>
    <p>Password : Hum no we're not going to print there your password</p>
</div>
</body>

</html>