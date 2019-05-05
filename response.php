
<?php
    session_start();
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        echo json_encode("error");
        exit;
    }

    if ( isset( $_POST['submit'] ) ) {
        echo $_REQUEST;
    }

    // Include config file
    require_once "config.php";

    $user_id = $_SESSION["id"];

    // TODO - Refactor
    $jon = $_POST["jon"];
    $danaerys = $_POST["danaerys"];
    $sansa = $_POST["sansa"];
    $arya = $_POST["arya"];
    $bran = $_POST["bran"];
    $cersei = $_POST["cersei"];
    $jaime = $_POST["jaime"];
    $tyrion = $_POST["tyrion"];
    $theon = $_POST["theon"];
    $yara = $_POST["yara"];
    $euron = $_POST["euron"];
    $sam = $_POST["samwell"];
    $gilly = $_POST["gilly"];
    $nightking = $_POST["night_king"];
    $jorah = $_POST["jorah"];
    $melisandre = $_POST["melisandre"];
    $hound = $_POST["hound"];
    $mountain = $_POST["mountain"];
    $varys = $_POST["varys"];
    $brienne = $_POST["brienne"];
    $podryck = $_POST["podryck"];
    $gendry = $_POST["gendry"];
    $greyworm = $_POST["grey_worm"];
    $missandei = $_POST["missandei"];
    $davos = $_POST["davos"];
    $bronn = $_POST["bronn"];
    $beric = $_POST["beric"];
    $tormund = $_POST["tormund"];
    // Especiales
    $pregnancy = $_POST["pregnancy"];
    $aryalist = $_POST["aryalist"];
    $throne = $_POST["throne"];

    $sql = "INSERT INTO prode (id_user, jon,daenerys,sansa,arya,bran,cersei,jaime,tyrion,theon,yara,euron,samwell,gilly,night_king,jorah,melisandre,hound,mountain,varys,brienne,podryck,gendry,grey_worm,missandei,davos,bronn,beric,tormund,pregnancy,aryalist,throne) VALUES ($user_id, $jon,$danaerys,$sansa,$arya,$bran,$cersei,$jaime,$tyrion,$theon,$yara,$euron,$sam,$gilly,$nightking,$jorah,$melisandre,$hound,$mountain,$varys,$brienne,$podryck,$gendry,$greyworm,$missandei,$davos,$bronn,$beric,$tormund,$pregnancy,$aryalist,$throne)";

    if(mysqli_query($link, $sql)){
        echo "Todo OK! Buena suerte!";
    } else{
        echo"No puedes volver a elegir tu jugada!";
    }

    mysqli_close($link);

    exit;

    $responseSuccess = [
        "status" => 200,
        "message" => "Tu respuesta fue guardada"
    ];

    $responseError = [
        "status" => 500,
        "message" => "Ups I dit it again"
    ];

    header("Content-type: application/json; charset=utf-8");
    echo json_encode($responseSuccess);
