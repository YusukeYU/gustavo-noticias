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
        $input = $_POST['title'];
        $output = $_POST['title'];
        file_put_contents($output, file_get_contents($input));
        $data = array($_POST['title'], $_POST['slug'], $_POST['description'], $_POST['content'], $_POST['photo']);

        // verifica se os campos estão sendo informados corretament
        if (in_array(null, $data)) {
            //   header("HTTP/1.1 200 Ok");

            header('Location: ' . 'http://localhost/gustavo-noticias/Views/error.html');
            exit;
        }

        /***************************
         *   VALIDATIONS END
         */

        // instancia novo objeto model e atribui dados recebidos da requisicao;
        $news = new News();
        $news->setTitle($_POST['title']);
        $news->setSlug($_POST['slug']);
        $news->setKeyword($_POST['keyword']);
        $news->setDescription($_POST['description']);
        $news->setContent($_POST['content']);
        $news->setPhoto($_POST['photo']);
        // enviamos os dados para o repositório salvar no banco
        $newsRepository = new NewsRepository();
        $finded = $newsRepository->findByTitle($_POST['title']);
        if (is_array($finded) && $finded['title'] == $_POST['title']) {
            echo json_encode("O Titulo mencionado consta cadastrado no sistema!");
            header('Location: ' . 'http://localhost/gustavo-noticias/Views/error.html');
            exit;
        }

        $added = $newsRepository->create($news);
        echo json_encode("Cadastrado com sucesso!");
        //   header("HTTP/1.1 200 Ok");
        header('Location: ' . 'http://localhost/gustavo-noticias/Views/success.html');
        exit;

    } catch (\Exception $e) {
        //header("HTTP/1.1 500 Ok");
        header('Location: ' . 'http://localhost/gustavo-noticias/Views/error.html');
        echo json_encode("Houve um erro ao processar, contate o administrador!");
    }

} else {
    //   header("HTTP/1.1 401 Unauthorized");
    header('Location: ' . 'http://localhost/gustavo-noticias/Views/error.html');
    echo json_encode("Metodo nao aceito pela API!");
    exit;
}
