<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modification</title>
  </head>
  <body>
      <h1>Modification des données : </h1>
    <form action="" method="post">
    <input type="hidden" id="page" name="page" value="user_update"> 
      <div>
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" pattern="[a-zA-Z-]*" value="<?php echo $_SESSION['name']; ?>"/>
      </div>
      <div>
        <label for="fname">Prenom :</label>
        <input type="text" id="fname" name="fname" pattern="[a-zA-Z-]*" value="<?php echo $_SESSION['fname']; ?>"/>
      </div>
      <div>
        <label for="birthdate">Date de naissance :</label>
        <input type="date" id="birthdate" name="birthdate" value="dd/mm/yyyy" value="<?php echo $_SESSION['birthdate']; ?>"/>
      </div>
      <div>
        <label for="gender" required>Genre :</label> 
        <input type="radio" name="gender" value="1" />Homme</label><br>
        <input type="radio" name="gender" value="2" />Femme</label><br>
        <input type="radio" name="gender" value="0" checked />Autre</label><br>
      </div>
      <div>
        <label for="size">Taille :</label>
        <input type="mail" id="size" name="size" pattern="[0-9]{1,3}" value="<?php echo $_SESSION['size']; ?>"/>
      </div>
      <div>
        <label for="weight">Poids :</label>
        <input type="text" id="weight" name="weight" pattern="[0-9]{1,3}" value="<?php echo $_SESSION['weight']; ?>">
      </div>
      <div>
        <label for="email">Adresse mail :</label>
        <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>"/>
      </div>
      <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" />
      </div>

      <button>Valider les modifications</button>
    </form>
    <hr>
   <a href="index.php?page">Tableau de bord</a>
   <a href="index.php?page=list_activities">Liste des activités</a>
   <a href="index.php?page=upload_activity_form">Ajouter une activité</a>
   <a href="index.php?page=user_update_form">Modifier son profil</a>
   <a href="index.php?page=user_disconnect">Déconnexion</a>
  </body>
</html>
