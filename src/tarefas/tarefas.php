<?php require_once "./controller/tarefas_controller.php" ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScriptr Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Página inicial</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="display-3">Tarefas</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="com-md-3">
                <a href="tarefa.php" class="btn btn-success">Adicionar nova tarefa</a>
            </div>
        </div>
        <div class="row">
            <table class="table caption-top table-striped">
                <caption>Lista de Tarefas</caption>
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tarefa</th>
                        <th scope="col">Colaborador</th>
                        <th scope="col">Entrega</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <? foreach ($tarefas as $key => $tarefa) : ?>
                        <tr>
                            <th scope="row"><?= $tarefa["id_tarefa"] ?></th>
                            <td><?= $tarefa["tarefa"] ?></td>
                            <td><?= $tarefa["colaborador"] ?></td>
                            <td><?= date("d/m/Y", strtotime($tarefa["data_entrega"]))  ?></td>

                            <td>
                                <button type="button" name="editar" class="btn btn-primary" id="<?= $tarefa["id_tarefa"] ?>-tarefa-editar">Editar</button>
                                <button type="button" class="btn btn-warning">Finalizar</button>
                                <button type="button" class="btn btn-danger">Excluir</button>
                            </td>
                        </tr>
                    <? endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function direcionar(pagina) {
            window.location.href = pagina;
        }

        window.document.querySelectorAll("button[name='editar']").forEach(
            (button) => {
                button.addEventListener("click", (event) => {
                    id = event.target.id.split("-")[0];
                    direcionar("tarefa.php?id=" + id);
                })
            })
    </script>
</body>

</html>