<?php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cadastrar'])) {
        $nome = $_POST['nome'];
        $nota = $_POST['nota'];
        cadastrarAluno($nome, $nota);
    } elseif (isset($_POST['excluir'])) {
        excluirNotas();
    } elseif (isset($_POST['editar'])) {
        $nome = $_POST['nome'];
        $novaNota = $_POST['nova_nota'];
        editarNota($nome, $novaNota);
    }
}

$alunos = listarAlunos();
$media = calcularMedia($alunos);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<div class="container">
    

    <div class="card mb-4">
        <div class="card-body">
            <h2>Cadastrar Aluno</h2>
            <form method="post">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nota">Nota:</label>
                    <input type="number" id="nota" name="nota" class="form-control" min="0" max="10" step="0.1" required>
                </div>
                <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h2>Lista de Alunos e Notas</h2>
            <ul class="list-group">
                <?php foreach ($alunos as $aluno): ?>
                    <li class="list-group-item">
                        <span><?= $aluno['nome'] ?></span>
                        <span><?= $aluno['nota'] ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h2>Média das Notas</h2>
            <p class="lead"><?= $media ?></p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h2>Excluir Todas as Notas</h2>
            <form method="post">
                <button type="submit" name="excluir" class="btn btn-danger">Excluir Todas as Notas</button>
            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h2>Editar Nota de Aluno</h2>
            <form method="post">
                <div class="form-group">
                    <label for="nome">Nome do Aluno:</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nova_nota">Nova Nota:</label>
                    <input type="number" id="nova_nota" name="nova_nota" class="form-control" min="0" max="10" step="0.1" required>
                </div>
                <button type="submit" name="editar" class="btn btn-primary">Editar Nota</button>
            </form>
        </div>
    </div>
</div>


</body>
</html>