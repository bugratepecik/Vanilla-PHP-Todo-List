<?php
include "db_connect.php";



if (isset($_POST["task_id"])) {
    $taskId = $_POST["task_id"];
    $query = "UPDATE public.tasks SET status = 'yapıldı' WHERE id = $taskId  ";
    $result = pg_query($db, $query);
   ?> 
    
    <?php
    if (!$result) {
        die("Veri kaydedilirken bir hata oluştu.");
    }
}  
?>
