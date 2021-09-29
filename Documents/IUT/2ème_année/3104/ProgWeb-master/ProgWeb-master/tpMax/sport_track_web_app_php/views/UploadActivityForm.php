<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>JSON</title>
</head>
<body>
   <h1>Add a JSON file : </h1>
   <form action="index.php" method="post" enctype="multipart/form-data">

   <input type="hidden" id="page" name="page" value="upload_activity"> 

      <div>
         <label for="f_file">Select a file : </label>
         <input type="file" id="f_file" name="myFile" required/><br>
         <button>Submit</button>
       </div>
   </form>
   <hr>
   <a href="index.php?page">Tableau de bord</a>
   <a href="index.php?page=list_activities">Liste des activités</a>
   <a href="index.php?page=upload_activity_form">Ajouter une activité</a>
   <a href="index.php?page=user_update_form">Modifier son profil</a>
   <a href="index.php?page=user_disconnect">Déconnexion</a>
</body>
</html>