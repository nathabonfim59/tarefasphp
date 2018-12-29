<?php 
    if (parametro_requisicao('operacao')) {
        if ($_GET['operacao'] == 'editar') {
            $tarefa = buscar_tarefa(
                $conexao,
                filtrar_numeros($_GET['id'])
            );

            $exibir_tabela = false;
        }
    }
?>

<form action="/" class="bg-light my-3 p-3 border">
            <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
            <input type="hidden" name="operacao" value="<?php echo ($exibir_tabela) ? 'adicionar' : 'editar'; ?>">
            <input type="text" name="nome" id="" class="form-control mb-2" placeholder="Nova tarefa" required value="<?php echo $tarefa['nome']; ?>">
            <textarea name="descricao" id="" class="form-control mb-2" placeholder="Descrição"><?php echo $tarefa['descricao']; ?></textarea>

            <fieldset>
                Prazo (Opcional):
                <input type="text" name="prazo" id="" class="form-control" value="<?php echo traduz_data_para_exibir($tarefa['prazo']); ?>">
            </fieldset>
            <fieldset class="">
                <p class="m-0 mt-2">Prioridade:</p>
                <div class="form-inline bg-white border p-2 rounded">
                    <div class="custom-control custom-radio mx-3">
                        <input type="radio" class="custom-control-input" name="prioridade" required value="1" id="prioridadeBaixa" <?php echo ($tarefa['prioridade'] == 1) ? 'checked' : '';?>>
                        <label class="custom-control-label" for="prioridadeBaixa">Baixa</label>
                    </div>
                    <div class="custom-control custom-radio mx-3">
                        <input type="radio" class="custom-control-input" name="prioridade" required  value="2" id="prioridadeMedia"  <?php echo ($tarefa['prioridade'] == 2) ? 'checked' : '';?>>
                        <label class="custom-control-label" for="prioridadeMedia">Média</label>
                    </div>
                    <div class="custom-control custom-radio mx-3">
                        <input type="radio" class="custom-control-input" name="prioridade" required value="3" id="prioridadeAlta"  <?php echo ($tarefa['prioridade'] == 3) ? 'checked' : '';?>>
                        <label class="custom-control-label" for="prioridadeAlta">Alta</label>
                    </div>
                </div>
            </fieldset>

            <div class="custom-control custom-checkbox mt-2">
                <input type="checkbox" class="custom-control-input" name="concluida" value="1" id="tarefaStatus" <?php echo ($tarefa['concluida'] == 1) ? 'checked' : ''; ?>>
                <label class="custom-control-label" for="tarefaStatus">Tarefa concluida</label>
            </div>

            <input type="submit" value="<?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>" class="btn btn-primary mt-2">
            <?php if (!$exibir_tabela): ?>
                <a href="/" class="btn btn-danger mt-2">Cancelar</a>
            <?php endif; ?>
        </form>