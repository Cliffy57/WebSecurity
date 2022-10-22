# ReadMe
****
## TP Noté - Hugo DI PAOLO
****Ce projet fait usage des technologies suivantes :****

- [xammp](https://www.apachefriends.org/fr/index.html) :
- - Apache :
```
Apache/2.4.48 (Win64) OpenSSL/1.1.1l PHP/8.0.10
Version du client de base de données : libmysql - mysqlnd 8.0.10
Extension PHP : mysqli Documentation curl 
Documentation mbstring Documentation
Version de PHP : 8.0.10
```
- - MariaDB :
```
Serveur : 127.0.0.1 via TCP/IP
Type de serveur : MariaDB
Connexion au serveur : SSL n'est pas utilisé 
Documentation
Version du serveur : 10.4.21-MariaDB - mariadb.org binary distribution
Version du protocole : 10
Utilisateur : root@localhost
Jeu de caractères du serveur : UTF-8 Unicode (utf8mb4)
```
- - PHP :
```
PHP 8.0.10 (cli) (built: Aug 25 2021 08:46:03) (ZTS Visual C++ 2019 x64)
Copyright (c) The PHP Group
Zend Engine v4.0.10, Copyright (c) Zend Technologies
```
- - phpMyAdmin :
```
Version : 5.1.1
```
****
### Utilisation
1. Créer une base de données nommée sqlinjection (xaamp,waamp......)
2. Importer le script sqlinjection.sql dans cette nouvelle base
3. Host le serveur web pour hébergés nos pages (Extension PHP Server VS CODE) ou ([aide](https://www.php.net/manual/en/features.commandline.webserver.php))
4. Se rendre sur la page index.php (menu principal)
****
### Explication
Vous trouverez un site web, qui répertorie différentes failles.
Plusieurs pages sont dédiées pour chaque faille, voici un exemple générique afin d’éclaircir la situation :
- crsf -> Page d’explication de la faille qui redirige vers :
- - crsfVulnerability -> Page avec la faille exploitable
- - crsfVulnerabilityFixed -> Page avec la faille corrigée

**Il est important de noter que le correctif est axé essentiellement sur la faille en question**
****
### Remarque
Les informations de la bdd peuvent etre differentes de mon installation, je vous invite a regarder en priorité les fichiers auth.php/authFixed.php qui font tous les deux appel a la bdd:
```php
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'sqlinjection';
    $db_host     = 'localhost';
    $db_port     = '3306';
```
