        <div class="card">
            <div class="card-header">
                Tarefas
            </div>

            <div class="card-body">
                <?php foreach ($lista_tarefas as $tarefa): ?>
                    <div class="bd-callout bd-callout-info">
                        <a class="badge badge-primary" href="editar.php?id=<?php echo $tarefa['id'];?>">Editar</a>
                        <a class="badge badge-warning" href="duplicar.php?id=<?php echo $tarefa['id'];?>">Duplicar</a>
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
                        <a class="badge badge-danger mt-3" href="remover.php?id=<?php echo $tarefa['id']; ?>">Deletar</a>
                    </div>
                        
                    </tr>
                <?php endforeach; ?>
            </div>
        </div>