
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

    $user_id = $_SESSION["id"];

    $sql = "INSERT INTO prode (id_user, jon_snow,daenerys_targaryen,sansa_stark,arya_stark,bran_stark,cersei_lannister,jaime_lannister,tyrion_lannister,theon_greyjoy,yara_greyjoy,euron_greyjoy,samwell_tarly,gilly,night_king,jorah_mormont,melisandre,the_hound,the_mountain,lord_varys,brienne_of_tarth,podryck_payne,gendry_baratheon,gray_worm,missandey,davos_seaworth,bronn_stokeworth) VALUES ($user_id,$jon,$danaerys,$sansa,$arya,$bran,$cersei,$jaime,$tyrion,$theon,$yara,$euron,$sam,$gilly,$nightking,$jorah,$melisandre,$hound,$mountain,$varys,$brienne,$podryck,$gendry,$greyworm,$missandei,$davos,$bronn)";

$responseSuccess = [
    "status" => 200,
    "message" => "tu respuesta fue guardada"
];

if(mysqli_query($link, $sql)){
    echo "OK";
} else{
    echo"ERROR";
}
exit;
    mysqli_close($link);



    $responseError = [
        "status" => 500,
        "message" => "Ups I dit it again"
    ];

    //add condition

    header("Content-type: application/json; charset=utf-8");
    echo json_encode($responseSuccess);
