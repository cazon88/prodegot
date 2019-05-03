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
require_once "character.php";

// TODO - Refactor.
// Obtains user score
$user_id = $_SESSION["id"];
$sql = "SELECT score FROM users WHERE id = $user_id";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($result);
$user_score = $row["score"];

// Check whether user loaded prode already
$sql = "SELECT * FROM prode WHERE id_user = $user_id";
$result = mysqli_query($link,$sql);
$rows = mysqli_num_rows($result);

$hasSelection = false;

// Show user's selected options
if ($rows > 0) {

    $hasSelection = true;

    //Obtain selection
    $userSelection = mysqli_fetch_row($result);
}

// Obtain character options
$sql = "SELECT * FROM status";
$result = mysqli_query($link,$sql);
$options = [];
while($row=mysqli_fetch_assoc($result)) {
    array_push($options, $row);
}

// Obtain character list
$sql = "SELECT * FROM characters";
$result = mysqli_query($link,$sql);
$characters = [];
while($row=mysqli_fetch_assoc($result)) {
    $character = new Character($row['id'], $row['name'],$row['short_name'],$row['id_status']);
    array_push($characters, $character);
}

$prode = new Prode($characters,$userSelection);
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
        <meta name="theme-color" content="#fafafa">
    </head>
    <body>
    <div class="header-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 logo">
                    <img class="" src="img/logo.png" class="img-responsive">
                </div>
                <div class="col-xs-6 text-right">
                    <h5><b><?php echo htmlspecialchars($_SESSION["username"]) . " ($user_score puntos)"; ?></b></h5>
                    <p>
                        <a href="reset-password.php" class="btn btn-xs btn-warning">Cambiar contrasena</a>
                        <a href="logout.php" class="btn btn-xs btn-danger">Cerrar sesion</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="header">
        <img height="auto" width="100%" src="img/header.png">
    </div>
    <div class="container prode">
        <div class="row">
            <form data-js="prode" action="response.php">

                <?php foreach($prode->characters() as $character){ ?>
                      <div class="col-md-6">
                        <table class="">
                            <tr>
                                <td class="text-center">
                                    <img class="" width="120" height="120" src="img/characters/<?php echo strtolower(str_replace("ñ", "n", str_replace(" ", "_",$character->name()))) ; ?>.jpg">
                                    <br/>
                                    <small><?php echo $character->name(); ?></small>
                                </td>
                                <?php
                                foreach ($options as $option) { ?>
                                    <td><div class="custom-container"><input class="custom" type="radio" id="<?php echo $option['id'].$character->id(); ?>" name="<?php echo $character->id(); ?>" value="<?php echo $option['id'];?>" /><label for="<?php echo $option['id'].$character->id(); ?>" class="radio-holder <?php echo $option['value']; ?>"></label></div></td>
                                <?php } ?>
                            </tr>
                        </table>
                      </div>
                <?php } ?>
                <table class="table">
                    <tr>
                        <td>¿Daenerys esta embarazada?</td>
                        <td>
                            si <input type="radio" name="DaenerysPrecnancy" value="true" />
                            no <input type="radio" name="DaenerysPrecnancy" value="false" />
                        </td>
                    </tr>
                    <tr>
                        <td>¿Arya completa su lista?</td>
                        <td>
                            si <input type="radio" name="AryaList" value="true" />
                            no <input type="radio" name="AryaList" value="false" />
                        </td>
                    </tr>
                    <tr>
                        <td>¿Quien se queda con el trono?</td>
                        <td>
                            <select name="hasTheThrone">
                                <option disabled selected>seleciona...</option>
                                <?php foreach($characters as $key=>$value){ ?>
                                    <option value="<?php echo $value['id'] ; ?>"><?php echo $value['name'] ; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script src="js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script>
        window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>

    <script>
        $(document).ready(function() {
            console.log("ready")
            $('[data-js="prode"]').submit(function(e) {

                e.preventDefault(); // avoid to execute the actual submit of the form.

                var form = $(this);
                var url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        alert(data); // show response from the php script.
                    }
                });
            });
        })
    </script>
    </body>
</html>

