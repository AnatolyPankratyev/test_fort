<?php


namespace app\controllers;

use app\models\Task;
use project\libs\Pagination;
use RedBeanPHP\R;

class MainController extends AppController
{
    private $desc = 'Description...';
    private $keywords = 'Keywords...';
    private $title_begin = 'FORT Test - ';

    public function indexAction()
    {
        $page_title = $this->title_begin . 'Start Page';

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 5;
        $count = R::count('tasks');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $tasks = R::getAll("SELECT tasks.* FROM tasks ORDER BY tasks.id LIMIT $start, $perpage");


        $this->set(compact('tasks', 'pagination', 'count'));

        $this->setMeta($page_title, $this->desc, $this->keywords);
    }


    public function addTaskAction()
    {
        if (!empty($_POST)) {
            $task = new Task();
            Task::saveTask($task);

            redirect();
        }
    }

    public function doneTaskAction()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $task = R::load('tasks', $id);
            if ($task->done == 0) {
                $task->done = 1;
                R::store($task);
            } else {
                $task->done = 0;
                R::store($task);
            }
            redirect();
        }
    }

    public function deleteTaskAction()
    {
        $id = $_POST['id'];
        $task = R::load('tasks', $id);
        R::trash($task);
        $_SESSION['success'] = 'Задача удалена';
        redirect();
    }

    public function searchAction()
    {
        if (!empty($_POST)) {
            $query = h(trim($_POST['query']));
            $result_name = R::findAll('tasks', "name LIKE ?", ["%$query%"]);
            $result_text = R::findAll('tasks', "text LIKE ?", ["%$query%"]);
            $result_email = R::findAll('tasks', "email LIKE ?", ["%$query%"]);
            $_SESSION['search']['name'] = $result_name;
            $_SESSION['search']['text'] = $result_text;
            $_SESSION['search']['email'] = $result_email;
            redirect();
        }
    }

    public function cleanSearchAction() {
        if (isset($_SESSION['search'])) {
            unset($_SESSION['search']);
            redirect();
        }
    }
}