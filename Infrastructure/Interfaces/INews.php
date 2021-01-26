<?php

namespace Infrastructure\Interfaces;
require_once "../../Models/News.php";
use Models\News;
interface INews {

    public function create(News $news);
    public function delete($id);
    public function update(News $news);
}