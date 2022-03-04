<?php

require_once "./../db/connect_db.php";

$sql = "SELECT * FROM tarefas";

if ($stmt = mysqli_prepare($connect, $sql)) {
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result)) {
            $tarefas = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }
}

mysqli_close($connect);
