<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_var($_GET["id"], FILTER_VALIDATE_INT);
    $tarefa = filter_var($_POST['tarefa'], FILTER_SANITIZE_SPECIAL_CHARS);
    $colaborador = filter_var($_POST['colaborador'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $telefone = filter_var($_POST['telefone'], FILTER_SANITIZE_SPECIAL_CHARS);
    $data_entrega = filter_var($_POST['data'], FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao = filter_var($_POST['descricao'], FILTER_SANITIZE_SPECIAL_CHARS);
}
