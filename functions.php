<?php
function cadastrarAluno($nome, $nota) {
    if ($nota < 0 || $nota > 10) {
        echo "Nota inválida! A nota deve estar entre 0 e 10.";
        return;
    }

    $arquivo = fopen("notas.txt", "a");
    fwrite($arquivo, "$nome:$nota\n");
    fclose($arquivo);
}

function listarAlunos() {
    $alunos = [];
    if (file_exists("notas.txt")) {
        $linhas = file("notas.txt");
        foreach ($linhas as $linha) {
            list($nome, $nota) = explode(":", trim($linha));
            $alunos[] = ['nome' => $nome, 'nota' => $nota];
        }
    }
    return $alunos;
}

function calcularMedia($alunos) {
    if (empty($alunos)) {
        return 0;
    }

    $soma = 0;
    foreach ($alunos as $aluno) {
        $soma += $aluno['nota'];
    }

    return $soma / count($alunos);
}

function excluirNotas() {
    if (file_exists("notas.txt")) {
        unlink("notas.txt");
    }
}

function editarNota($nome, $novaNota) {
    if ($novaNota < 0 || $novaNota > 10) {
        echo "Nota inválida! A nota deve estar entre 0 e 10.";
        return;
    }

    $alunos = listarAlunos();
    $arquivo = fopen("notas.txt", "w");
    foreach ($alunos as $aluno) {
        if ($aluno['nome'] == $nome) {
            fwrite($arquivo, "$nome:$novaNota\n");
        } else {
            fwrite($arquivo, "{$aluno['nome']}:{$aluno['nota']}\n");
        }
    }
    fclose($arquivo);
}
?>