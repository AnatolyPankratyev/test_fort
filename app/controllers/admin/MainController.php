<?php


namespace app\controllers\admin;


use project\libs\Pagination;
use RedBeanPHP\R;

class MainController extends AppController
{
    public function indexAction() {

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 3;
        $count = R::count('tasks');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $tasks= R::getAll("SELECT tasks.* FROM tasks ORDER BY tasks.id LIMIT $start, $perpage");


        $this->set(compact('tasks', 'pagination', 'count'));
        $this->setMeta('Панель управления');
    }
}