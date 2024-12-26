<?php
if (isset($_POST['task_ids'])) {
    $task_ids = $_POST['task_ids'];
    $tasks = json_decode(file_get_contents('../modele/tasks.json'), true);

    foreach ($tasks as $key => $task) {
        if (in_array($task['id'], $task_ids)) {
            unset($tasks[$key]);
        }
    }

    $tasks = array_values($tasks);

    file_put_contents('../modele/tasks.json', json_encode($tasks, JSON_PRETTY_PRINT));
}

header('Location: ../vue/toDoList.php');
exit();
