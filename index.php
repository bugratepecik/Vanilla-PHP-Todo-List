<?php
require "db_connect.php";
require "delete.php";
require "check.php";
require "add.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <link rel="stylesheet" href="styles.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body class="text-center">
    <h1>To-Do List</h1>
    <form method="POST" action="index.php">
        <input type="text" name="task" placeholder="yeni yapilacak gir" required>
        <button type="submit" class="btn btn-success">Ekle</button>
    </form>

    <h2>Yapilacaklar</h2>
    <ul  style="list-style: none;">
        <?php
        $qquery = "SELECT * FROM tasks";
        $rs = pg_query($db, $qquery);
        $count_row = pg_num_rows($rs);
        

        while ($row = pg_fetch_assoc($rs)) {
            $taskId = $row["id"];
        ?> <li> 
        <form method="POST" action="index.php" style="display: inline;">
            <span><?= $row["task_name"]; ?></del><span>
        </form>
      <form method="POST" action="index.php" style="display: inline;">
              
                <button type="submit" name="delete_task_id" value="<?php echo $row["id"];?> "class="btn btn-danger">Sil</button>
                    <?php if($row['status'] == 'yapıldı'): ?>
                         <button type="checkbox" name="task_id" id="stat" onclick="myFunction()" class=" btn btn-success checkbox "value="<?php echo $row["id"]; ?>" > tamamlandı</button>
                    <?php else: ?>
                            <button type="checkbox" name="task_id" id="stat" onclick="myFunction()" class=" btn btn-warning checkbox "value="<?php echo $row["id"]; ?>" > tamamlanmadı</button>
                    <?php endif; ?>
                <p id="demo"  value="<?php echo $row["id"]; ?>"></p> 
                
                </form> 
           
            </li>       
           
            
            <?php
                } ?>
                </script>  <script>
                document.addEventListener("DOMContentLoaded", function() {
             const myButton = document.getElementById("stat");

             myButton.addEventListener("click", function() {
             myButton.classList.remove("btn-warning")
             myButton.classList.add("btn-success");
});
});             </script> 
    </ul>
                    <del class="yazi">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>