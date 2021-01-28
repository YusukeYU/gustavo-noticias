<?php

namespace Controller\News;

require_once "../../Models/News.php";
require_once "../../Infrastructure/Repositories/NewsRepository.php";

use Infrastructure\Repositories\NewsRepository;
use Models\News;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        /***************************
         *   HEADERS
         */
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers:, *");
        header('Access-Control-Allow-Credentials', true);
        header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE');
        /***************************
         *   DATA
         */

        $data = json_decode(file_get_contents("php://input"), false);

        /***************************
         *   VALIDATIONS START
         */
        // verifica se os campos estão sendo informados corretament
        if(!isset($data->title) || $data->title ==null ){
        header("HTTP/1.1 200 Ok");
            echo json_encode("Necessário informar o Título!");
            exit;
        }
       
        $newsRepository = new NewsRepository();
        $finded = $newsRepository->findByTitle($data->title);
        if(!isset($finded['title'])){
            header("HTTP/1.1 200 Ok");
            echo json_encode("Notícia não existente, favor verificar!.");
            exit;
        }
       
        echo json_encode($finded);
        header("HTTP/1.1 200 Ok");
        exit;

    } catch (\Exception $e) {
        header("HTTP/1.1 500 Ok");
        echo json_encode("Houve um erro ao processar, contate o administrador!");
    }

} else {
    header("HTTP/1.1 401 Unauthorized");
    echo json_encode("Método não aceito pela API!");
    exit;
}
