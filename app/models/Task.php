<?php


namespace app\models;


class Task extends AppModel
{
    public $attributes = [
        'name' => '',
        'email' => '',
        'text' => '',
        'done' => 0,
    ];

    public static function saveTask($task)
    {
        $data = $_POST;
        $task->load($data);
        $task->attributes['name'] = htmlspecialchars($task->attributes['name'], ENT_QUOTES);
        $task->attributes['email'] = htmlspecialchars($task->attributes['email'], ENT_QUOTES);
        $task->attributes['text'] = htmlspecialchars($task->attributes['text'], ENT_QUOTES);
        if ($task->save('tasks')) {
            $_SESSION['success'] = 'Задача добавлена';
        } else {
            $_SESSION['error'] = 'Ошибка!';
        }
    }

}