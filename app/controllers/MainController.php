<?php


namespace app\controllers;


class MainController extends AppController
{
    private $desc = 'Описание страницы';
    private $keywords = 'Без ключевиков';
    private $title_begin = 'FORT test - ';

    public function indexAction() {
        $page_title = $this->title_begin . 'Start Page';
    }
}