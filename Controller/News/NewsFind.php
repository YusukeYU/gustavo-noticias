<?php

namespace Controller\News;

require_once "../../Infrastructure/Repositories/NewsRepository.php";
require_once "../../Views/news.php";

use Infrastructure\Repositories\NewsRepository;

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        /***************************
         *   VALIDATIONS START
         */
        if (isset($_GET['id'])) {
            if (($_GET['id'] == null) || ((int) $_GET['id'] == 0)) {
                //  header("HTTP/1.1 200 Ok");
                header('Location: ' . 'http://localhost/gustavo-noticias/Views/error.html');
                echo json_encode("Informe um id corretamente!");
                exit;
            }

            /***************************
             *   VALIDATIONS END
             */

            $newsRepository = new NewsRepository();
            $news = $newsRepository->findById((int) $_GET['id']);
            if (isset($news['id']) && $news['id'] > 0) {
                echo json_encode($news);
            } else {
                echo json_encode("Nao encontrada!");
            }
            // header("HTTP/1.1 200 Ok");
            header('Location: ' . 'http://localhost/gustavo-noticias/Views/error.html');
            exit;
        } else if (isset($_GET['title'])) {
            if (($_GET['title'] == null)) {
                header('Location: ' . 'http://localhost/gustavo-noticias/Views/error.html');
                //  header("HTTP/1.1 200 Ok");
                echo json_encode("Informe nome correto!");
                exit;
            }
            $newsRepository = new NewsRepository();
            $news = $newsRepository->findByTitle((string) $_GET['title']);

            if (isset($news['id']) && $news['id'] > 0) {
                echo '<!DOCTYPE html>
                <html lang="en">
                
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Gustavo Notícias</title>
                    <link rel="stylesheet" href="../../../Views/css/main.css">
                    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;500&display=swap" rel="stylesheet">
                </head>
                
                <body>
                    <!-- first header-->
                    <div class="col-default">
                        <div class="first-header">
                            <div class="content">
                                <div class="phone-number">
                                    <p>(13) 3481-3095 / (13) 98151-7557</p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
                    <!-- nav -->
                    <div class="col-default">
                        <div class="nav-bar">
                            <ul>
                                <li>
                                    <a href="http://localhost/gustavo-noticias/Views/add-news.html">Nova</a>
                                </li>
                                <li>
                                    <a href="http://localhost/gustavo-noticias/Views/index.html">Home</a>
                                </li>
                                <li>
                                    <a href="#">Pesquisar</a>
                                </li>
                            </ul>
                
                        </div>
                    </div>
                
                
                    <div class="col-default">
                        <div class="news">
                            <h1 id="title">'.$news['title'].' </h1>
                            <p >'.$news['title'].' </p> <br>
                            <img src= "'.$news['photo'].'"> <br>
                            <p id="content"> '.$news['content'].'</p>
                           
                        </div>
                    </div>
                    <div class="col-default">
                        <div class="footer">
                            <h3>
                                Gustavo Oliveira Pontes - Copyright 2020
                            </h3>
                            <p>Sistema desenvolvido para avaliação e sem fins lucrativos.</p>
                        </div>
                    </div>
                    <script charset="UTF-8" src="js/search.js" type="text/javascript"></script>
                    </script>
                </body>
                
                </html>';;
            } else {
                // echo json_encode("Nao encontrada!");
                header('Location: ' . 'http://localhost/gustavo-noticias/Views/error.html');
            }
        } else {
            echo json_encode("Tente novamente mais tarde!");
            //  header("HTTP/1.1 200 Ok");
            header('Location: ' . 'http://localhost/gustavo-noticias/Views/error.html');
            exit;
        }

    } catch (\Exception $e) {
        header('Location: ' . 'http://localhost/gustavo-noticias/Views/error.html');
        // header("HTTP/1.1 500");
        header('Location: ' . 'http://localhost/gustavo-noticias/Views/error.html');
    }

} else {
    header('Location: ' . 'http://localhost/gustavo-noticias/Views/error.html');
    //  header("HTTP/1.1 401 Unauthorized");
    echo json_encode("Metodo nao aceito pela API!");
    exit;
}
