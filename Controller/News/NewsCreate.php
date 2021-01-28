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
        $data2 = array($data->title, $data->slug, $data->description, $data->content, $data->photo, $data->keyword);
        /***************************
         *   VALIDATIONS START
         */
        // verifica se os campos estão sendo informados corretament
        if (in_array(null, $data2)) {
            echo json_encode("Necessário preencher todos os campos!");
            exit;
        }
        // instancia novo objeto model e atribui dados recebidos da requisicao;
        $news = new News();
        $news->setTitle($data->title);
        $news->setSlug($data->slug);
        $news->setKeyword($data->keyword);
        $news->setDescription($data->description);
        $news->setContent($data->content);
        $news->setPhoto($data->photo);
        // enviamos os dados para o repositório salvar no banco
        $newsRepository = new NewsRepository();
        $finded = $newsRepository->findByTitle($data->title);
        if (is_array($finded) && $finded['title'] == $data->title) {
            header("HTTP/1.1 200 Ok");
            echo json_encode("Título já cadastrado, favor escolher outro.");
            exit;
        }

        $added = $newsRepository->create($news);
        echo json_encode("Cadastrado com sucesso!");
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
