<?php
$title = "";
$content = "";
$tela = '<!DOCTYPE html>
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
                <div class="header-imgs">
                    <img src="img/facebook.png">
                    <img src="img/instagram.png">
                    <img src="img/whatsapp.png">
                </div>
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
            <h1 id="title">'.$title.' </h1>
            <textarea id="content"> '.$content.'</textarea>
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

</html>';

?>

