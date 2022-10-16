<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'sqlinjection';
    $db_host     = 'localhost';
    $db_port     = '3306';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    $username = $_POST['username']; 
    $password = $_POST['password'];

        $requete = "SELECT count(*) FROM user where  username = '" . $username . "' and userpwd = '" . $password . "'";
        echo $requete;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($exec_requete!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: admin.php');
        }
        else
        {
           header('Location: sqlInjectionVulnerability.php'); // utilisateur ou mot de passe incorrect
        }
    
   
}
else
{
   header('Location: sqlInjectionVunerability.php');
}
mysqli_close($db); // fermer la connexion
?>