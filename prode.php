<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
    $characters = [
        [
            'id' => '1',
            'status' => 'live',
            'name' => 'Jon Snow'
        ],
        [
            'id' => '2',
            'status' => 'live',
            'name' => 'Daenerys Targaryen'
        ],
        [
            'id' => '3',
            'status' => 'live',
            'name' => 'Sansa Stark'
        ],
        [
            'id' => '4',
            'status' => 'live',
            'name' => 'Arya Stark'
        ],
        [
            'id' => '5',
            'status' => 'live',
            'name' => 'Bran Stark'
        ],
        [
            'id' => '6',
            'status' => 'live',
            'name' => 'Sansa Stark'
        ],
        [
            'id' => '7',
            'status' => 'live',
            'name' => 'Cersei Lannister'
        ],
        [
            'id' => '8',
            'status' => 'live',
            'name' => 'Jaime Lannister'
        ],
        [
            'id' => '9',
            'status' => 'live',
            'name' => 'Tyrion Lannister'
        ],

    ];
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
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <meta name="theme-color" content="#fafafa">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Prode GOT</h1>
                <h2>Bienvenido al mejor prode GoT!</h2>
            </div>
            <div class="col-md-4">
                <h4><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h4>
                <p>
                    <a href="reset-password.php" class="btn btn-xs btn-warning">Cambiar contrasena</a>
                    <a href="logout.php" class="btn btn-xs btn-danger">Cerrar sesion</a>
                </p>
            </div>
        </div>

        <form>
            <table class="table table-striped">
                <tr>
                    <th>Personaje</th>
                    <th>Vive</th>
                    <th>Muere</th>
                    <th>WhiteWalker</th>
                </tr>

                <?php foreach($characters as $key=>$value){ ?>
                    <tr>
                        <td><?php echo $value['name'] ; ?></td>
                        <td><input type="radio" name="<?php echo $value['id'] ; ?>" value="live" /></td>
                        <td><input type="radio" name="<?php echo $value['id'] ; ?>" value="dead" /></td>
                        <td><input type="radio" name="<?php echo $value['id'] ; ?>" value="whitewalker" /></td>
                    </tr>
                <?php } ?>
            </table>
            <table class="table table-striped">
                <tr>
                    <td>¿Daenerys esta embarazada?</td>
                    <td>
                        si <input type="radio" name="DaenerysPrecnancy" value="true" />
                        no <input type="radio" name="DaenerysPrecnancy" value="false" />
                    </td>
                </tr>
                <tr>
                    <td>Arya completa su lista?</td>
                    <td>
                        si <input type="radio" name="AryaList" value="true" />
                        no <input type="radio" name="AryaList" value="false" />
                    </td>
                </tr>
                <tr>
                    <td>¿Quien mata al Nigth King?</td>
                    <td>
                        <select name="killNigthking">
                            <option disabled selected>seleciona...</option>
                            <?php foreach($characters as $key=>$value){ ?>
                                <option value="<?php echo $value['id'] ; ?>"><?php echo $value['name'] ; ?></option>
                            <?php } ?>
                        </select>
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
    </body>
</html>

