<!doctype html>
<html lang="fr">
      <head>
      <meta charset="utf-8">
      </head>
      <body>
<h1><?php echo $_SESSION['message']; ?></h1>
<hr>
   <a href="index.php?page">Tableau de bord</a>
   <a href="index.php?page=list_activities">Liste des activités</a>
   <a href="index.php?page=upload_activity_form">Ajouter une activité</a>
   <a href="index.php?page=user_update_form">Modifier son profil</a>
   <a href="index.php?page=user_disconnect">Déconnexion</a>
      </body>
      </html>
