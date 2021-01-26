<?php

namespace Controller\News;

require_once "../../Models/News.php";
require_once "../../Infrastructure/Repositories/NewsRepository.php";

use Infrastructure\Repositories\NewsRepository;
use Models\News;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        /***************************
         *   VALIDATIONS START
         */

        $data = array($_POST['id'],$_POST['title'], $_POST['slug'], $_POST['description'], $_POST['content'], $_POST['photo']);

        // verifica se os campos estão sendo informados corretament
        if (in_array(null, $data)) {
            header("HTTP/1.1 200 Ok");
            echo json_encode("Preencha todos os campos!");
            exit;
        }

        /***************************
         *   VALIDATIONS END
         */

        // instancia novo objeto model e atribui dados recebidos da requisicao;
        $news = new News();
        $news->setId($_POST['id']);
        $news->setTitle($_POST['title']);
        $news->setSlug($_POST['slug']);
        $news->setDescription($_POST['description']);
        $news->setContent($_POST['content']);
        $news->setPhoto($_POST['photo']);
        $news->setKeyword($_POST['keyword']);
        // enviamos os dados para o repositório salvar no banco
        $newsRepository = new NewsRepository();
        $newsRepository->update($news);

        echo json_encode("Editado com sucesso!");
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
