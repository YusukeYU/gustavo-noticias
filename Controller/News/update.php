<?php
require_once "../../Infrastructure/Repositories/NewsRepository.php";
require_once "../../Models/News.php";

use Infrastructure\Repositories\NewsRepository;
use Models\News;
$_GET['id'];

$newsRepository = new NewsRepository();
$finded = $newsRepository->findById((int)$_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gustavo Notícias</title>
    <link rel="stylesheet" href="css/main.css">
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
                    <a href="http://localhost/gustavo-noticias/Views/search.html">Pesquisar</a>
                </li>
            </ul>

        </div>
    </div>

    <div style="border-top: solid 1px;" class="col-default">
        <div class="new-form">
            <h1> Atualizar Notícia</h1>
            <div class="col-default">
                <div id="msg-success" class="msg-success">
                    <h3>Notícia atualizada com sucesso!</h3>
                </div>
            </div>
            <form id="main-form" action="#" method="POST">
                <label>Título</label> <br>
                <input id="id"   type="hidden" value="<?php echo $finded['id'] ?>"> <br>
                <input id="title" maxlength="45" name="title" placeholder="Título" type="text" value="<?php echo $finded['title'] ?>"> <br>
                <label>Slug</label> <br>
                <input id="slug" maxlength="45" name="slug" placeholder="Slug" type="text" value="<?php echo $finded['slug'] ?>"><br>
                <label>Descrição</label> <br>
                <input id="description" maxlength="60" name="description" placeholder="Descrição" type="text" value="<?php echo $finded['description'] ?>"><br>
                <label>Palavra Chave</label> <br>
                <input id="keyword" maxlength="45" name="keyword" placeholder="Palavra Chave" type="text" value="<?php echo $finded['keyword'] ?>"><br>
                <label>Conteúdo</label> <br>
                <textarea id="content" maxlength="244" rows="4" name="content"> <?php echo $finded['content'] ?></textarea> <br>
                <button type="button" onClick="create()"> Salvar</button>
            </form>
        </div>
    </div>
    <!-- footer-->
    <div class="col-default">
        <div class="footer">
            <h3>
                Gustavo Oliveira Pontes - Copyright 2020
            </h3>
            <p>Sistema desenvolvido para avaliação e sem fins lucrativos.</p>
        </div>
    </div>

    <script charset="UTF-8" src="js/update.js" type="text/javascript">
    </script>
</body>

</html>