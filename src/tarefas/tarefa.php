<?php require_once "controller/tarefa_controller.php" ?>
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
    <title>Tarefa</title>
</head>

<body>
    <div class="container d-flex justify-content-center mt-3">
        <div class="row" style="background-color: #FFFFE0; max-width: 45rem;">
            <div class="container d-flex justify-content-center">
                <div class="row ">
                    <h1 class="display-3">Criar Tarefa</h1>
                </div>
            </div>

            <div class="col-md-12">
                <form action="<?= $action ?>" method="post" class="" name="formularioTarefa" id="formularioTarefa">
                    <div class="mb-3 col-md-12 ">
                        <input type="hidden" readonly name="id_tarefa" value="<?= $row["id_tarefa"] ?>">
                        <label for="tarefa" class="form-label">Tarefa</label>
                        <input type="text" class="form-control riqued-field" name="tarefa" id="tarefa" maxlength="255" onblur="validation('tarefa')" value="<?= isset($row["tarefa"]) ?  $row["tarefa"] : "" ?>">
                    </div>
                    <div class="mb-3  col-md-12">
                        <label for="colaborador" class="form-label">Colaborador</label>
                        <input type="text" class="form-control riqued-field" name="colaborador" id="colaborador" maxlength="255" onblur="validation('colaborador')" value="<?= isset($row["colaborador"]) ?  $row["colaborador"] : "" ?>">
                    </div>
                    <div class="mb-3  col-md-12">
                        <label for="email" class="form-label">Email do colaborado</label>
                        <input type="email" class="form-control riqued-field" name="email" id="email" placeholder="email@teste.com" maxlength="255" onblur="validation('email')" value="<?= isset($row["email_colaborador"]) ?  $row["email_colaborador"] : "" ?>">
                    </div>
                    <div class="row ">
                        <div class="mb-3 col-md-12 d-flex justify-content-between">
                            <div class="col-md-6 ">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control riqued-field" name="telefone" id="telefone" onkeyup="maskPhone(this)" onkeypress=" return limitChar(event)" onblur="validation('phone')" placeholder="(61) 98888-8888" maxlength="15" value="<?= isset($row["telefone"]) ?  $row["telefone"] : "" ?>">
                            </div>
                            <div class="col-md-5 ">
                                <label for="data" class="form-label ">Data de entrega</label>
                                <input type="date" class="form-control riqued-field" name="data" id="data" onblur="validation('data')" maxlength="10" value="<?= isset($row["data_entrega"]) ?  $row["data_entrega"] : "" ?>">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="descricao" class="form-label">Descrição da tarefa</label>
                        <textarea class="form-control" name="descricao" id="descricao" rows="3">
                            <?= isset($row["descricao"]) ?  $row["descricao"] : "" ?>
                        </textarea>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 container d-flex justify-content-center mh-25">
                            <?php if (isset($_GET["task"]) && $_GET["task"] == "success") : ?>
                                <div class="alert alert-success " id="task-success" role="alert" style="max-height: 50px;">
                                    Tarefa Criada com sucesso
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-md-6 d-flex   justify-content-end">
                            <button type="button" class="btn d-block btn-success " onclick="formSubmit()" style="min-height: 50px;max-height: 50px;"><?= isset($_GET["id"]) ? "Atualizar tarefa" : "Criar Tarefa" ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    setTimeout(() => window.document.getElementById("task-success").classList.add("d-none"), 3000);

    function maskPhone(number) {
        let phone = window.document.getElementById("telefone");
        if (phone.value.length === 1) {
            return phone.value = "(" + phone.value
        } else if (phone.value.length === 3) {
            return phone.value = phone.value + ") "
        } else if (phone.value.length === 10) {
            return phone.value = phone.value + "-"
        }
    }

    function limitChar(event) {
        return ((event.charCode >= 48 && event.charCode <= 57));
    }

    function validation(type) {
        if (type == "email") {
            let email = window.document.getElementById("email").value;
            let pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!pattern.test(email)) {
                window.document.getElementById("email").classList.add("is-invalid")
            } else {
                window.document.getElementById("email").classList.remove("is-invalid")
            }
        } else if (type == "phone") {
            let phone = window.document.getElementById("telefone").value;
            let pattern = /^\(?[1-9]{2}\)? ?(?:[2-8]|9[1-9])[0-9]{3}\-?[0-9]{4}$/
            if (!pattern.test(phone)) {
                window.document.getElementById("telefone").classList.add("is-invalid")
            } else {
                window.document.getElementById("telefone").classList.remove("is-invalid")
            }
        } else if (type === "tarefa") {
            let task = window.document.getElementById("tarefa");
            if (task.value.length === 0) {
                task.classList.add("is-invalid");
            } else {
                task.classList.remove("is-invalid");
            }
        } else if (type === "colaborador") {
            let colaborador = window.document.getElementById("colaborador");
            if (colaborador.value.length === 0) {
                colaborador.classList.add("is-invalid");
            } else {
                colaborador.classList.remove("is-invalid");
            }
        } else if (type === "data") {
            let data = window.document.getElementById("data");
            console.log(data);
            if (data.value.length === 0) {
                data.classList.add("is-invalid");
            } else {
                data.classList.remove("is-invalid");
            }
        }
    }

    function formSubmit() {
        let form = window.document.getElementById("formularioTarefa");
        let fields = window.document.getElementsByClassName("riqued-field")

        Object.values(fields).forEach((item, index) => item.value.trim().length !== 0 ? true : item.classList.add("is-invalid"));

        for (let field in Object.values(fields)) {
            if ((Object.values(fields)[field]).classList.contains("is-invalid")) {
                alert("Preencha os campos obrigatórios");
                return false;
            }
        }
        form.submit();
    }
</script>

</html>