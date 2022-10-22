<?php
// Initialisation de la session
session_start();
$_SESSION['isLoggedIn'] = false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Site explicatif des différentes failles de sécurité" />
  <meta charset="utf-8">
  <title>TP noté Di Paolo Hugo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="DI PAOLO" content="">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/sakura.css">
  <script>
    location.href = "http://localhost/admin/nonAuthorizedIndirectAccess.php?id=<?php echo $id; ?>";
  </script>
</head>

<body>
  <div id="wrapper">
    <header>
      <h1>Accès indirect non autorisé</h1>
    </header>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="xss.php">XSS</a></li>
        <li><a href="sqlInjection.html">SQL Injection</a></li>
        <li><a href="crsf.html">CRSF</a></li>
        <li><a href="sessionFixation.html">Fixation de session</a></li>
        <li><a href="insecureDeserialization.html">Désérialisation non sécurisée</a></li>
        <li><a href="wellKnownSecurityBreach.html">Utilisation de composants avec des failles de sécurité connues</a>
        </li>
      </ul>
    </nav>
    <div id="main">
      <h2>description vulgarisé de la faille</h2>
      <p>La navigation forcée est une attaque dont le but est d'énumérer et d'accéder à des ressources qui ne sont pas
        référencées par l'application, mais qui sont toujours accessibles.
        <br>
        Un attaquant peut utiliser les techniques Brute Force pour rechercher des contenus non liés dans le répertoire
        du domaine, tels que des répertoires et des fichiers temporaires, et d'anciens fichiers de sauvegarde et de
        configuration. Ces ressources peuvent stocker des informations sensibles sur des applications Web et des
        systèmes opérationnels, tels que le code source, les informations d'identification, l'adressage réseau interne,
        etc., ce qui les considère comme une ressource précieuse pour les intrus.
        <br>
        Cette attaque est effectuée manuellement lorsque les répertoires et les pages d'index d'application sont basés
        sur la génération de numéros ou des valeurs prévisibles, ou à l'aide d'outils automatisés pour les fichiers et
        les noms de répertoires communs.
        <br>
        Cette attaque est également connue sous le nom d'emplacement de ressource prévisible, d'énumération de fichiers,
        d'énumération de répertoires et d'énumération de ressources.
      </p>
      <h2>explication de comment reproduire la faille</h2>
      <p>


        Cet exemple présente une attaque de répertoire statique et d'énumération de fichiers, on peut envisager de l'effectuer à l'aide d'un outil
        automatisé.
        <br>
        Un outil de numérisation, comme <a href="https://cirt.net/Nikto2">Nikto</a>, qui permet de rechercher des fichiers et des répertoires existants à partir
        d'une base de données de ressources connues, telles que :
        <br>
        /system/ /password/ /logs/ /admin/ /test/
        <br>
        Lorsque l'outil reçoit un message HTTP 200 cela signifie que cette ressource a été trouvée et devrait être
        inspectée manuellement à la recherche d'informations précieuses.

      </p>
      <h2>explication de comment corriger la faille</h2>
      <p>
        Une page de connexion est une URL dans une application Web que les demandes doivent passer pour accéder aux URL
        authentifiées. Utilisez les pages de connexion, par exemple, pour empêcher la navigation forcée de parties
        restreintes de l'application Web, en définissant des autorisations d'accès pour les utilisateurs. Les pages de
        connexion permettent également le suivi des sessions utilisateur.
        <br>
        Les URL authentifiées sont des URL qui ne deviennent accessibles aux utilisateurs qu'après leur connexion à
        l'URL de connexion. Une URL de déconnexion est une URL qui, en cas d'accès, force les utilisateurs à revenir à
        l'URL de connexion avant de réaccéder aux URL authentifiées. Les administrateurs système utilisent ces URL
        spéciales pour empêcher la navigation forcée en forçant les utilisateurs à passer par l'URL de connexion avant
        d'afficher les URL authentifiées restreintes.
      </p>
      <h2><a href="admin/nonAuthorizedIndirectAccessVulnerability.html">page avec la faille</a></h2>
      <h2><a href="admin/nonAuthorizedIndirectAccessVulnerabilityFixed.php">page avec la faille corrigé</a></h2>
    </div>
    <footer>
      <p>TP noté - Hugo Di Paolo</p>
    </footer>
</body>

</html>