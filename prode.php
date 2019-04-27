
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
            'id' => '1',
            'status' => 'live',
            'name' => 'Sansa Stark'
        ],
        [
            'id' => '1',
            'status' => 'live',
            'name' => 'Arya Stark'
        ],
        [
            'id' => '2',
            'status' => 'live',
            'name' => 'Bran Stark'
        ],
        [
            'id' => '1',
            'status' => 'live',
            'name' => 'Sansa Stark'
        ],
        [
            'id' => '1',
            'status' => 'live',
            'name' => 'Cersei Lannister'
        ],
        [
            'id' => '1',
            'status' => 'live',
            'name' => 'Jaime Lannister'
        ],
        [
            'id' => '1',
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

        <meta name="theme-color" content="#fafafa">
    </head>
    <body>
    <form>
        <table>
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
        <table>
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
                <td> Usiario </td>
                <td> <input type="text"> </td>
                <td> <input type="submit"> </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <button type="submit">Enviar</button>
                </td>
            </tr>
        </table>
    </form>
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

