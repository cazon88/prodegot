<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "character.php";
$showUserInfo = true;
$user = new User($_SESSION["id"],$_SESSION["username"]);
$prode = new Prode($user); // TODO - Refactor
?>
<!doctype html>
<html class="no-js" lang="es_AR">
    <?php include 'partials/head.php'; ?>
    <body>
        <?php include 'partials/header.php'; ?>
        <div class="container prode">
            <div class="row tabs-container">
                <ul data-js="tabs" class="nav nav-tabs">
                    <li role="presentation" class="active"><a data-js="leaderboard" href="#">Leaderboard</a></li>
                    <li role="presentation"><a data-js="prode" href="#">Prode</a></li>
                </ul>
            </div>
            <div data-tab="leaderboard" class="row ">
                <div class="col-md-12">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>Puesto</th>
                            <th>Usuario</th>
                            <th>Puntaje</th>
                        </tr>
                        <?php
                        $i = 0; // TODO - Refactor $i
                        foreach($prode->ranking() as $key=>$value){ $i++ ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['username']; ?></td>
                                <td><?php echo $value['score']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div  data-tab="prode" class="hide">
                <form data-js="prode" action="response.php">
                    <div class="row">
                        <div class="col-sm-4 col-sm-push-4 text-center">
                            <table>
                                <tr>
                                    <td width="100"><img width="40" src="img/icons/alive.svg"</td>
                                    <td width="100"><img width="40" src="img/icons/dead.svg"</td>
                                    <td width="100"><img width="40" src="img/icons/whitewalker.svg"</td>
                                </tr>
                                <tr>
                                    <td><small>Vive</small></td>
                                    <td><small>Muere</small></td>
                                    <td><small>Whitewalker</small></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($prode->characters() as $character){ ?>
                              <div class="col-md-6">
                                <table class="">
                                    <tr>
                                        <td class="text-center">
                                            <div class="images">
                                                <img class="<?php
                                                foreach ($prode->characterStatusOptions() as $option) {
                                                    echo $prode->shouldCharacterBeChecked($character,$option['id']) ? $option['value'] : "";
                                                }
                                                ?>"  id="photo<?php echo $character->shortName() ?>" width="120" height="120" src="img/characters/<?php echo $character->shortName(); ?>.jpg">
                                            </div>
                                            <small><?php echo $character->name(); ?></small>
                                        </td>
                                        <?php
                                        if ($character->locked()) { ?>
                                            <td>
                                                <div class="custom-container" style="display: none">
                                                    <input class="custom <?php echo "4"; ?>" type="radio" id="<?php echo "4".$character->id(); ?>" name="<?php echo $character->shortName(); ?>" value="4" <?php echo "checked"; ?>/>
                                                    <label for="<?php echo "4".$character->id(); ?>" class="radio-holder <?php echo "4"; ?>"></label>
                                                </div>
                                            </td>
                                        <?php } else {

                                        foreach ($prode->characterStatusOptions() as $option) { ?>
                                            <td>
                                                <div class="custom-container">
                                                    <input class="custom <?php echo $option['value']; ?>" type="radio" id="<?php echo $option['id'].$character->id(); ?>" name="<?php echo $character->shortName(); ?>" value="<?php echo $option['id'];?>" <?php echo $prode->shouldCharacterBeChecked($character,$option['id']) ? "checked" : ""; ?>/>
                                                    <label for="<?php echo $option['id'].$character->id(); ?>" class="radio-holder <?php echo $option['value']; ?>"></label>
                                                </div>
                                            </td>
                                        <?php }} ?>
                                    </tr>
                                </table>
                              </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-push-3">
                            <table class="table">
                                <tr>
                                    <td>¿Daenerys esta embarazada?</td>
                                    <td>
                                        SI <input type="radio" name="pregnancy" value="true" />
                                        NO <input type="radio" name="pregnancy" value="false" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>¿Arya completa su lista?</td>
                                    <td>
                                        SI <input type="radio" name="aryalist" value="true" />
                                        NO <input type="radio" name="aryalist" value="false" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>¿Quien se queda con el trono?</td>
                                    <td>
                                        <select name="throne">
                                            <option disabled selected>Seleccione ...</option>
                                            <?php foreach($prode->characters() as $character){ // TODO - si $character->isDead() excluir? ?>
                                                <option value="<?php echo $character->id() ; ?>"><?php echo $character->name() ; ?></option>
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
                        </div>
                    </div>
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
                $('input[type=radio]').click(function (ev) {
                    var photoid = $('#photo'+($(ev.currentTarget).attr('name')));
                    photoid.toggleClass('dead', $(ev.currentTarget).hasClass('dead'))
                    photoid.toggleClass('alive', $(ev.currentTarget).hasClass('alive'))
                    photoid.toggleClass('white-walker', $(ev.currentTarget).hasClass('white-walker'))
                                //$('input[type=radio].dead:checked').each(function (i, input) {
                    //    input.
                    //});
                });

                $('[data-js="prode"]').submit(function(e) {

                    e.preventDefault(); // avoid to execute the actual submit of the form.

                    var form = $(this);
                    var url = form.attr('action');
                    var empty = [];
                    
                    $('input[type=radio]').each(function (i, input) {
                        var name = $(input).attr('name')
                            if (empty.indexOf(name) == -1) { 
                                empty.push(name);
                            }
                        }
                    );

                    $('input[type=radio]:checked').each(function (i, input) {
                            var name = $(input).attr('name')
                            if (empty.indexOf(name) !== -1) { 
                                empty.splice(empty.indexOf(name), 1)
                            }
                        }
                    );

                    if (empty.length !== 0) {
                        alert('Recorda llenar todos los campos! :)');   
                    }
                    else {
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: form.serialize(), // serializes the form's elements.
                            success: function(data)
                            {
                                alert(data); // show response from the php script.
                            }
                        });
                    }      
             
                });
                const tabButtons =  $('[data-js="tabs"] a');
                const tabs = $('[data-tab]');
                tabButtons.click(function (e) {
                    var selected = $(e.currentTarget);
                    tabButtons.parent().removeClass('active');
                    selected.parent().addClass('active');
                    tabs.addClass('hide');
                    var id = '[data-tab="'+ selected.data('js') +'"]';
                    tabs.filter(id).removeClass('hide')

                });
            })
        </script>
    </body>
</html>