<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

$user_id = $_SESSION["id"];

$ranking = [];

$sql = "SELECT username,score FROM users ORDER BY score DESC LIMIT 50";
$result = mysqli_query($link,$sql);
while($row=mysqli_fetch_assoc($result)) {
    array_push($ranking, $row);
}
?>
<!doctype html>
<html class="no-js" lang="es_AR">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    //<link rel="stylesheet" href="css/leaderboard.css">
    <meta name="theme-color" content="#fafafa">
</head>
<body>
<table>
  <tbody>
    <tr>
    	<th>Puesto</th>
    	<th>Usuario</th>
    	<th>Puntaje</th>
    </tr>
    <?php
    $i = 0;
    foreach($ranking as $key=>$value){ $i++ ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $value['username']; ?></td>
            <td><?php echo $value['score']; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>
</body>
</html>