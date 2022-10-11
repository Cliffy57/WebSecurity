<?

// auth.php - Authentification des admins Bases Hacking

$login = $_POST["pseudo"];
$mdp = $_POST["mdp"];

if ($login != "" && $mdp != "") {

    $servername = "localhost";
    $username = "serioushack";
    $password = "mdpmysql";
    $db = "sqlinjection";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $sql = $conn->query("SELECT * from admin WHERE pseudo='$login' AND mdp='$mdp';");
    $nb = $sql->rowCount();

    $conn = null;

    if ($nb == 1) echo "Authentification réussie, vous allez être redirigés immédiatement. <script>window.location='./admin.php'</script>";
    else header("Location: ./");
} else header("Location: ./");
