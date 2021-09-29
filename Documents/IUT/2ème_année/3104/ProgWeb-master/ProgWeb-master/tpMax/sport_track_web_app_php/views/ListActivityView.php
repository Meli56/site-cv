<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Liste des activités</title>
</head>
<body>
   <h1>Voici la liste de vos activités</h1>
   <?php if (sizeof($_SESSION['acts']) == 0) { ?>
      <p>Vous n'avez pas encore d'activité !</p>
   <?php } else { ?>
   <ul>
      <?php foreach ($_SESSION['acts'] as $act) { ?>

         <li></li>
      <?php } ?>
   </ul>

   <?php } ?>
   <hr>
   <a href="index.php?page">Tableau de bord</a>
   <a href="index.php?page=list_activities">Liste des activités</a>
   <a href="index.php?page=upload_activity_form">Ajouter une activité</a>
   <a href="index.php?page=user_update_form">Modifier son profil</a>
   <a href="index.php?page=user_disconnect">Déconnexion</a>
</body>
</html>