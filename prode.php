
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

<html>
    <head>
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
    </body>
</html>

