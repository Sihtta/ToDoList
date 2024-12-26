<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $tasks = json_decode(file_get_contents('../modele/tasks.json'), true);

    $tasks = array_filter($tasks, function ($task) use ($id) {
        return $task['id'] !== $id;
    });

    file_put_contents('../modele/tasks.json', json_encode(array_values($tasks)));
}

header("Location: ../vue/toDoList.php");
exit();
