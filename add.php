<?php
include "db_connect.php";


if (isset($_POST["task"])) {
    $task = $_POST["task"];

    $query = "INSERT INTO public.tasks(task_name, status) VALUES('$task', 'yapılmadı')"; 
    $result = pg_query($db, $query);
    if (!$result) {
        die("To-do eklenirken bir hata olustu");
    }
}
?>