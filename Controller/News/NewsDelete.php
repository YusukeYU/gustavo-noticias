<?php

namespace Controller\News;

require_once "../../Infrastructure/Repositories/NewsRepository.php";

use Infrastructure\Repositories\NewsRepository;


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
         *   VALIDATIONS START
         */
        $data = json_decode(file_get_contents("php://input"), false);

        if (($data->id == null) || ((int) $data->id == 0)) {
            header("HTTP/1.1 200 Ok");
            echo json_encode("Informe um id corretamente!");
            exit;
        }

        /***************************
         *   VALIDATIONS END
         */

        $newsRepository = new NewsRepository();
        $news = $newsRepository->findById((int)$data->id);
        $uploaddir = '../../Views/img/news/';
        $uploadfile = $uploaddir .$news['photo'];
        unlink($uploadfile);
        $newsRepository->delete((int) $data->id);
      
        
        echo json_encode("Deletado com sucesso! ");
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
