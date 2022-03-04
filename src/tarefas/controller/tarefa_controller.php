<?php
require_once __DIR__ . "/../../db/connect_db.php";

$action = "model/insert.php";

if (!empty($_GET["id"])) {
    $id = filter_var($_GET["id"], FILTER_VALIDATE_INT);
    $sql = "SELECT * FROM tarefas WHERE id_tarefa = ?";

    if ($stmt = mysqli_prepare($connect, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result)) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $action = "model/update.php";
            } else {
                print_r("error");
            }
        }
    }

    mysqli_close($connect);
}
