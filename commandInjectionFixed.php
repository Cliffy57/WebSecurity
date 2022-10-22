<?php
$targetIP = $_GET['ip'];
if ($targetIP = filter_input(INPUT_GET, 'ip', FILTER_VALIDATE_IP)) {
  $cmd = exec("ping $targetIP",$output,$result);
} else {
  die("Veuillez spécifier une adresse IP valide.");
}
print_r(array_map("utf8_decode", $output));
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1,charset=utf-8" />

</html>