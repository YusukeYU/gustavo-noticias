<?php

namespace Infrastructure\Repositories;

require_once "../../Models/News.php";
require_once "../../Infrastructure/Repositories/Connection.php";
require_once "../../Infrastructure/Interfaces/INews.php";
use PDO;

use Infrastructure\Repositories\Connection;
use Models\News;
use Infrastructure\Interfaces\INews;

class NewsRepository implements INews
{
    public static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new NewsRepository();
        }

        return self::$instance;
    }

    public function create(News $news) {
        try {
            $sql = "INSERT INTO news (
                title,
                slug,
                description,
                content,
                photo,
                keyword)
                VALUES (
                :title,
                :slug,
                :description,
                :content,
                :photo,
                :keyword)";

            $p_sql = Connection::getInstance()->prepare($sql);

            $p_sql->bindValue(":title", $news->getTitle());
            $p_sql->bindValue(":slug", $news->getSlug());
            $p_sql->bindValue(":description", $news->getDescription());
            $p_sql->bindValue(":content", $news->getContent());
            $p_sql->bindValue(":keyword", $news->getKeyword());
            $p_sql->bindValue(":photo", $news->getContent());
 

            return $p_sql->execute();
        } catch (\Exception $e) {
        }
    }
    public function delete($id) {
        try {
            $sql = "DELETE FROM `news`
            WHERE id = :id";
            $p_sql = Connection::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (\Exception $e) {
        }
    }
    public function update(News $news) { 
        try {
            $sql = "UPDATE  news set
		        title = :title,
                slug = :slug,
                description = :description,
                content = :content,
                photo = :photo,
                keyword = :keyword
                WHERE id = :id";

            $p_sql = Connection::getInstance()->prepare($sql);

            $p_sql->bindValue(":id", $news->getId());
            $p_sql->bindValue(":title", $news->getTitle());
            $p_sql->bindValue(":slug", $news->getSlug());
            $p_sql->bindValue(":description", $news->getDescription());
            $p_sql->bindValue(":keyword", $news->getKeyword());
            $p_sql->bindValue(":content", $news->getContent());
            $p_sql->bindValue(":photo", $news->getPhoto());
            return $p_sql->execute();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function findById($id){
        try{
           $sql = "SELECT * FROM news WHERE id = :id";
           $p_sql = Connection::getInstance()->prepare($sql);
           $p_sql->bindValue(":id", $id);
           $p_sql->execute();
           return $p_sql->fetch(PDO::FETCH_ASSOC);
        }catch(\Exception $e){

        }
    }
    public function findByTitle($name){
        try{
           $sql = "SELECT * FROM news WHERE title = :name";
           $p_sql = Connection::getInstance()->prepare($sql);
           $p_sql->bindValue(":name", $name);
           $p_sql->execute();
           return $p_sql->fetch(PDO::FETCH_ASSOC);
        }catch(\Exception $e){

        }
    }
}
