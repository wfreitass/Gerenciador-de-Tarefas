<?php

require_once "../../db/connect_db.php";

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tarefa = filter_var($_POST['tarefa'], FILTER_SANITIZE_SPECIAL_CHARS);
        $colaborador = filter_var($_POST['colaborador'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $telefone = filter_var($_POST['telefone'], FILTER_SANITIZE_SPECIAL_CHARS);
        $data_entrega = filter_var($_POST['data'], FILTER_SANITIZE_SPECIAL_CHARS);
        $descricao = filter_var($_POST['descricao'], FILTER_SANITIZE_SPECIAL_CHARS);
        $data_criacao = date("Y/m/d");

        $sql = "INSERT INTO tarefas (tarefa,colaborador, email_colaborador, telefone,data_criacao, data_entrega,descricao) VALUES (?,?,?,?,?,?,?)";
        if ($stmt = mysqli_prepare($connect, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssssss", $tarefa, $colaborador, $email, $telefone, $data_criacao, $data_entrega, $descricao);
            if (mysqli_stmt_execute($stmt)) {
                $id = mysqli_insert_id($connect);
                mysqli_close($connect);
                header("location: ../tarefa.php?task=success&id=$id");
            }
        }
    }
} catch (Exception $e) {
    echo "Error:" . $e;
}
