<?PHP
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['usr']=null;
header("Location: index.php");
die();
?>