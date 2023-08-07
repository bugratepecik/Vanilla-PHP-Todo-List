<?php
include "db_connect.php";

if (isset($_POST["delete_task_id"])) {
    $taskId = $_POST["delete_task_id"];
    $query = "DELETE FROM tasks WHERE id = $taskId";
    $result = pg_query($db, $query);

    if (!$result) {
        die("Görev silinirken bir hata oluştu.");
    }
}
$query = "SELECT * FROM tasks";
$result = pg_query($db, $query);

if (!$result) {
    die("Görevleri alırken bir hata oluştu.");
}

?>