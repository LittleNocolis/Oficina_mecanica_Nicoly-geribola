<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Lista de Clientes</title>
    </head>
    <body>
        <h1>Lista de Clientes</h1>

        <form method="POST" action="<?= base_url('cliente') ?>">
            <input type="search" id="pesquisar" name="pesquisar" placeholder="Pesquisar...">
            <input type="submit" id="botao_pesquisar" name="botao_pesquisar" value="Filtrar">
        </form>

        <br>

        <table border="1">
            <tr>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>

            <?php foreach($cliente as $cli): ?>
                <tr>
                    <td><?= $cli['CLI_NOME'] ?></td>
                    <td><?= $cli['CLI_DATA_NASCIMENTO'] ?></td>
                    <td><a href="<?= base_url('cliente/editar/'.$cli['CLI_ID']) ?>">Editar</a></td>
                    <td><a href="<?= base_url('cliente/excluir/'.$cli['CLI_ID']) ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <br>
        <a href="<?= base_url('cliente/novo') ?>"><button>Cadastrar Cliente</button></a>
        <br><br>
        <a href="<?= base_url('inicio') ?>"><button>Voltar</button></a>
    </body>
</html>