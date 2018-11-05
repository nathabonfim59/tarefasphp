<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5 mb-5">Gerenciador de tarefas</h1>

        <form action="" class="bg-light my-3 p-3 border">
            <input type="text" name="nome" id="" class="form-control mb-2" placeholder="Nova tarefa" required>
            <textarea name="descricao" id="" class="form-control mb-2" placeholder="Descrição"></textarea>

            <fieldset>
                Prazo (Opcional):
                <input type="text" name="prazo" id="" class="form-control">
            </fieldset>
            <fieldset class="">
                <p class="m-0 mt-2">Prioridade:</p>
                <div class="form-inline bg-white border p-2 rounded">
                    <div class="custom-control custom-radio mx-3">
                        <input type="radio" class="custom-control-input" name="prioridade" required value="baixa" id="prioridadeBaixa">
                        <label class="custom-control-label" for="prioridadeBaixa">Baixa</label>
                    </div>
                    <div class="custom-control custom-radio mx-3">
                        <input type="radio" class="custom-control-input" name="prioridade" required  value="media" id="prioridadeMedia">
                        <label class="custom-control-label" for="prioridadeMedia">Média</label>
                    </div>
                    <div class="custom-control custom-radio mx-3">
                        <input type="radio" class="custom-control-input" name="prioridade" required value="alta" id="prioridadeAlta">
                        <label class="custom-control-label" for="prioridadeAlta"> Alta</label>
                    </div>
                </div>
            </fieldset>

            <div class="custom-control custom-checkbox mt-2">
                <input type="checkbox" class="custom-control-input" name="concluida" value="sim" id="tarefaStatus">
                <label class="custom-control-label" for="tarefaStatus">Tarefa concluida</label>
            </div>

            <input type="submit" value="Cadastrar" class="btn btn-primary mt-2">
        </form>

        <div class="card">
            <div class="card-header">
                Tarefas
            </div>
            <div class="card-body">
                <?php foreach ($lista_tarefas as $tarefa): ?>
                    <div class="bd-callout bd-callout-info">
                        <h2><?php echo $tarefa['nome']; ?></h2>
                        <br>
                        <p><?php echo $tarefa['descricao']; ?></p>
                        <hr>
                        <div class="mt-3">
                            <h4>Prazo</h4>
                            <p class="py-2 pl-4 pr-4 bg-info rounded font-weight-bold text-white"><?php echo $tarefa['prazo']; ?></p>
                        </div>
                        <div class="mt-3">
                            <h4>Prioridade</h4>
                            <p class="py-2 pl-4 pr-4 bg-info rounded font-weight-bold text-white"><?php echo $tarefa['prioridade']; ?></p>
                        </div>
                        <div class="mt-3">
                            <h4>Concluída</h4>
                            <p class="py-2 pl-4 pr-4 bg-info rounded font-weight-bold text-white"><?php echo $tarefa['concluida']; ?></p>
                        </div>
                    </div>
                        
                    </tr>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>