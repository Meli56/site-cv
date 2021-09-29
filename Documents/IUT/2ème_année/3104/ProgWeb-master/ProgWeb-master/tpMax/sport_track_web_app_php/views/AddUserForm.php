<?php if(isset($_SESSION['email'])) {header("Location: index.php?page");} ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Sign in</title>
  </head>
  <body>
    <form class="box" action="" method="post">

      <h1>Sign in : </h1>

      <input type="hidden" id="page" name="page" value="user_add"> 
      <input type="text" id="name" name="name" pattern="[a-zA-Z-]*" placeholder="Name" required/>
      <input type="text" id="fname" name="fname" pattern="[a-zA-Z-]*" placeholder="First Name" required/>
      <input type="date" id="birthdate" name="birthdate" value="dd/mm/yyyy" placeholder="Birth Date" required/>
      <div class="inputGroup">
        <input class="radioChecked" id="radio1" name="gender" type="radio" value="1"/>
        <label for="radio1">Male</label>
      </div>
      <div class="inputGroup">
        <input class="radioChecked" id="radio2" name="gender" type="radio" value="2"/>
        <label for="radio2">Female</label>
      </div>

      <input type="number" id="size" name="size" pattern="[0-9]{1,3}" placeholder="Size" required/>
      <input type="number" id="weight" name="weight" pattern="[0-9]{1,3}" placeholder="Weigth" required>
      <input type="email" id="email" name="email" placeholder="Email" required/>
      <input type="password" id="password" name="password" placeholder="Password" required/>

      <div>
       <button onclick="window.location.href = 'index.php?page=user_connect_form';">Login</button>
       <input type="submit" name="" value="Create">
      </div>

    </form>

  </body>
</html>
