<?
     
     //admin.php - Bases Hacking Administration Panel
  
     $headers = http_get_request_headers(); //On récupère les headers et on vérifie que l'user est passé par auth.php
  
     if (!isset($headers["Referer"]) || $headers["Referer"] != "http://".$headers["Host"]."/hacking/admin/auth.php")
         header("Location: ./");
  
 ?>
  
 <html>
  
 <head>
  
     <div align="center"><h1>Bases Hacking Administration Zone</h1></div>
     <title>Faille de type SQL Injection et Referrer Spoofing</title>
  
 </head>
  
 <body>
     <h1>Bienvenue sur la page des administrateurs</h1>
  
 </body>
 </html>
