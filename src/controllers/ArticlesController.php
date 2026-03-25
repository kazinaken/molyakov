<?php

namespace src\controllers;
use src\services\Db;

class ArticlesController extends Controller {
    public function index() {
        $db = new Db();
        $articles = $db->query('SELECT * FROM `articles`;');

        $this->view->renderHTML('articles/index.php', ['articles' => $articles]);
    }

    public function view($id) {
        $db = new Db();
        $article = $db->query('SELECT * FROM `articles` WHERE id = :id;', [':id' => $id]);

        $this->view->renderHTML('errors/404.php', ['article' => $article[0]]);
    }
}