<?php
   header('content-type : text/html; charset=utf-8');
    $targetIP = $_GET[ 'ip' ];
    $cmd = exec( "ping $targetIP",$output,$result );
    print_r(array_map("utf8_decode",$output));
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1,charset=utf-8" />
</html>