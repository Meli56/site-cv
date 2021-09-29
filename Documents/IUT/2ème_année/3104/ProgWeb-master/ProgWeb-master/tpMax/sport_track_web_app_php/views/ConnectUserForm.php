<?php if(isset($_SESSION['email'])) {header("Location: index.php?page");} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/css/style.css">
    <title>Connexion</title>
</head>
<body>

  <form class="box" action="" method="post">
      <h1>Login :</h1>

      <input type="hidden" id="page" name="page" value="user_connect"> 

      <input type="email" id="email" name="email" placeholder="Email" required/> 
      <input type="password" id="password" name="password" placeholder="Password" required/>

      <div>
        <input type="submit" name="" value="Login">
        <button onclick="window.location.href = 'index.php?page=user_add_form';">Sign In</button>
      </div>

  </form>

</body>
</html>