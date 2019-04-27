
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


    $responseSuccess = [
        "status" => 200,
        "message" => "tu respuesta fue guardada"
    ];

    $responseError = [
        "status" => 500,
        "message" => "Ups I dit it again"
    ];

    //add condition

    header("Content-type: application/json; charset=utf-8");
    echo json_encode($responseSuccess);
