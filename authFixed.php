<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
   // connexion à la base de données
   $db_username = 'root';
   $db_password = '';
   $db_name     = 'sqlinjection';
   $db_host     = 'localhost';
   $db_port     = '3306';
   $db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
      or die('could not connect to database');

   // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
   // pour éliminer toute attaque de type injection SQL et XSS
   $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['username']));
   $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));

   if ($username !== "" && $password !== "") {
      $stmt = $db->prepare("SELECT count(*) FROM user WHERE username = ? and userpwd = ?");
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();
      $result = $stmt->get_result()->fetch_assoc();
      $count = $result['count(*)'];

      if ($count != 0) // nom d'utilisateur et mot de passe correctes
      {
         $_SESSION['username'] = $username;
         header('Location: adminFixed.php');
      } else {
         header('Location: sqlInjectionVulnerabilityFixed.php'); // utilisateur ou mot de passe incorrect
      }
   } else {
      header('Location:  sqlInjectionVulnerabilityFixed.php'); // utilisateur ou mot de passe vide
   }
} else {
   header('Location: sqlInjectionVulnerabilityFixed.php');
}
mysqli_close($db); // fermer la connexion
