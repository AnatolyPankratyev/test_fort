<?php


namespace app\controllers\admin;


use app\models\Task;
use RedBeanPHP\R;

class TaskController extends AppController
{
    public function editAction()
    {
        if (!empty($_POST)) {
            $id = $this->getRequestID(false);
            $task = new Task();
            $data = $_POST;
            $task->load($data);
            if ($task->update('tasks', $id)) {
                $task = R::load('tasks', $id);
                R::store($task);
                $_SESSION['success'] = 'Изменения сохранены';
                redirect(ADMIN);
            }
        }

        $id = $this->getRequestID();
        $task = R::load('tasks', $id);
        $this->setMeta("Редактирование задачи id:{$task->id}");
        $this->set(compact('task'));
    }
}