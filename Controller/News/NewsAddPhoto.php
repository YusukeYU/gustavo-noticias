<?php

namespace Controller\News;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        /***************************
         *   HEADERS
         */
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers:, *");
        header('Access-Control-Allow-Credentials', true);
        header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE');
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        /***************************
         *   DATA
         */
        $uploaddir = '../../Views/img/news/';
        $uploadfile = $uploaddir . basename($_FILES['photo2']['name']);
        $uploaded = move_uploaded_file( $_FILES['photo2']['tmp_name'], $uploadfile);
        if(!$uploaded){
            echo json_encode("Um arquivo com este nome já existe na base de dados!");
            header("HTTP/1.1 200 Ok");
            exit;
        }
    } catch (\Exception $e) {
    }

}