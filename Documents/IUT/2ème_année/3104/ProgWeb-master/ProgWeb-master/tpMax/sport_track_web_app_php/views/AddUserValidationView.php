<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Connexion</title>
</head>
<body>

   <h1><?php echo $_SESSION['message'] ?></h1>

   <?php if (isset($_SESSION['email'])) {?>
   <h2>Vos infos :</h2>
   <ul>
      <li>Mail : <?php echo $_SESSION['email'] ?></li>
      <li>Nom : <?php echo $_SESSION['name'] ?></li>
      <li>Prénom : <?php echo $_SESSION['fname'] ?> </li>
      <li>Taille : <?php echo $_SESSION['size'] ?></li>
      <li>Poids : <?php echo $_SESSION['weight'] ?></li>
      <li>Date de naissance : <?php echo $_SESSION['birthdate'] ?></li>

   </ul>
   <hr>
   <a href="index.php?page">Tableau de bord</a>
   <a href="index.php?page=list_activities">Liste des activités</a>
   <a href="index.php?page=upload_activity_form">Ajouter une activité</a>
   <a href="index.php?page=user_update_form">Modifier son profil</a>
   <a href="index.php?page=user_disconnect">Déconnexion</a>

   <?php } else { ?>
        <a href="index.php?page=user_connect_form">Reessayer</a>
    <?php } ?>
</body>
</html>