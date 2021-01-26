<?php

namespace Controller\News;

require_once "../../Infrastructure/Repositories/NewsRepository.php";

use Infrastructure\Repositories\NewsRepository;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        /***************************
         *   VALIDATIONS START
         */

        if (($_POST['id'] == null) || ((int) $_POST['id'] == 0)) {
            header("HTTP/1.1 200 Ok");
            echo json_encode("Informe um id corretamente!");
            exit;
        }

        /***************************
         *   VALIDATIONS END
         */

        $newsRepository = new NewsRepository();
        $newsRepository->delete((int) $_POST['id']);
        echo json_encode("Deletado com sucesso!// ");
        header("HTTP/1.1 200 Ok");
        exit;

    } catch (\Exception $e) {
        header("HTTP/1.1 500 Ok");
        echo json_encode("Houve um erro ao processar, contate o administrador!");
    }

} else {
    header("HTTP/1.1 401 Unauthorized");
    echo json_encode("Metodo nao aceito pela API!");
    exit;
}
