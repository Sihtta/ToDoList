<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = trim($_POST['task']);

    if (!empty($task)) {
        $tasks = json_decode(file_get_contents('../modele/tasks.json'), true);

        $tasks[] = ["id" => uniqid(), "tâche" => $task, "statut" => "incomplete"];

        file_put_contents('../modele/tasks.json', json_encode($tasks));
    }
}

header("Location: ../vue/toDoList.php");
exit();
