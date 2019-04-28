
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
    $user_id = 2;

    $sql = "INSERT INTO prode (id_user, jon_snow,daenerys_targaryen,sansa_stark,arya_stark,bran_stark,cersei_lannister,jaime_lannister,tyrion_lannister,theon_greyjoy,yara_greyjoy,euron_greyjoy,samwell_tarly,gilly,night_king,jorah_mormont,melisandre,the_hound,the_mountain,lord_varys,brienne_of_tarth,podryck_payne,gendry_baratheon,gray_worm,missandey,davos_seaworth,bronn_stokeworth) VALUES ($user_id,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1)";

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
