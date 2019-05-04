
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

    $jon = $_POST["1"];
    $danaerys = $_POST["2"];
    $sansa = $_POST["3"];
    $arya = $_POST["4"];
    $bran = $_POST["5"];
    $cersei = $_POST["6"];
    $jaime = $_POST["7"];
    $tyrion = $_POST["8"];
    $theon = $_POST["9"];
    $yara = $_POST["10"];
    $euron = $_POST["11"];
    $sam = $_POST["12"];
    $gilly = $_POST["13"];
    $nightking = $_POST["14"];
    $jorah = $_POST["15"];
    $melisandre = $_POST["16"];
    $hound = $_POST["17"];
    $mountain = $_POST["18"];
    $varys = $_POST["19"];
    $brienne = $_POST["20"];
    $podryck = $_POST["21"];
    $gendry = $_POST["22"];
    $greyworm = $_POST["23"];
    $missandei = $_POST["24"];
    $davos = $_POST["25"];
    $bronn = $_POST["26"];
    $beric = $_POST["27"];
    $tormund = $_POST["28"];

    $sql = "INSERT INTO prode (id_user, jon,daenerys,sansa,arya,bran,cersei,jaime,tyrion,theon,yara,euron,samwell,gilly,night_king,jorah,melisandre,hound,mountain,varys,brienne,podryck,gendry,grey_worm,missandei,davos,bronn,beric,tormund) VALUES ($user_id,$jon,$danaerys,$sansa,$arya,$bran,$cersei,$jaime,$tyrion,$theon,$yara,$euron,$sam,$gilly,$nightking,$jorah,$melisandre,$hound,$mountain,$varys,$brienne,$podryck,$gendry,$greyworm,$missandei,$davos,$bronn,$beric,$tormund)";

    if(mysqli_query($link, $sql)){
        echo "Todo OK! Buena suerte!";
    } else{
        echo"No puedes volver a elegir tu jugada!";
    }
    exit;

    mysqli_close($link);
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
