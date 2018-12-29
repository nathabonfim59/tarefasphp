        <div class="card">
            <div class="card-header w-100">
                Tarefas
                <a class="float-right badge badge-success" href="?operacao=remover_concluidas">Remover concluídas</a>
            </div>

            <div class="card-body">
                <?php foreach ($lista_tarefas as $tarefa): ?>
                    <div class="bd-callout bd-callout-info">
                        <a class="badge badge-primary" href="?operacao=editar_form&id=<?php echo $tarefa['id'];?>">Editar</a>
                        <a class="badge badge-warning" href="?operacao=duplicar&id=<?php echo $tarefa['id'];?>">Duplicar</a>
                        <h2><?php echo $tarefa['nome']; ?></h2>
                        <br>
                        <p><?php echo $tarefa['descricao']; ?></p>
                        <hr>
                        <div class="mt-3">
                            <h4>Prazo</h4>
                            <p class="py-2 pl-4 pr-4 bg-info rounded font-weight-bold text-white"><?php echo traduz_data_para_exibir($tarefa['prazo']) ?></p>
                        </div>
                        <div class="mt-3">
                            <h4>Prioridade</h4>
                            <p class="py-2 pl-4 pr-4 bg-info rounded font-weight-bold text-white"><?php echo traduz_prioridade($tarefa['prioridade']) ?></p>
                        </div>
                        <div class="mt-3">
                            <h4>Concluída</h4>
                            <p class="py-2 pl-4 pr-4 bg-info rounded font-weight-bold text-white"><?php echo traduiz_concluida($tarefa['concluida']); ?></p>
                        </div>
                        <a class="badge badge-danger mt-3" href="?operacao=remover&id=<?php echo $tarefa['id']; ?>">Deletar</a>
                    </div>
                        
                    </tr>
                <?php endforeach; ?>
            </div>
        </div>