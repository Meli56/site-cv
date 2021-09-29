<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportTrack | Sign in</title>
    <link  rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<h1><?php echo $_SESSION['message']; ?></h1>

<?php if (isset($_SESSION['email'])) {?>
    <h2>Vos infos :</h2>
    <p>Mail : <?php echo $_SESSION['email'] ?></p>
    <p>Nom : <?php echo $_SESSION['name'] ?></p>

<?php } else { ?>
    <a href="index.php?page=user_connect_form"><button class="cybr-btn">
            Try again<span aria-hidden>_</span>
            <span aria-hidden class="cybr-btn__glitch">Try again</span>
            <span aria-hidden class="cybr-btn__tag">R25</span>
        </button></a>

<?php } ?>
</body>
</html>