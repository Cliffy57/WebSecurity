<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/sakura.css">
</head>
<body>
  <div id="main">
  <h1>Login</h1>
  <form action method="get">
    <input type="text" name="login" id="log">
    <br>
    <input type="text" name="password" id="pwd">
    <input type="submit" value="Login">
  </form>
  </div>
  <?php
  if (isset($_GET['search'])) {
    echo htmlspecialchars('Résultats pour la recherche "' . $_GET['search'] . '"', ENT_NOQUOTES, 'UTF-8');
  }
  ?>
</body>
<footer id="footer">
  <a href="nonAuthorizedIndirectAccess.php">Retour</a>
</footer>

</html>