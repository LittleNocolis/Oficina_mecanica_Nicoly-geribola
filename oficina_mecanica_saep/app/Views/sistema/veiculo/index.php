<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Lista de Veículos</title>
    </head>
    <body>
        <h1>Lista de Veículos</h1>

        <form method="POST" action="<?= base_url('veiculo') ?>">
            <input type="search" id="pesquisar" name="pesquisar" placeholder="Pesquisar...">
            <input type="submit" id="botao_pesquisar" name="botao_pesquisar" value="Filtrar">
        </form>

        <br>

        <table border="1">
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Cliente</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>

            <?php foreach($veiculo as $veic): ?>
                <tr>
                    <td><?= $veic['VEI_PLACA'] ?></td>
                    <td><?= $veic['VEI_MARCA'] ?></td>
                    <td><?= $veic['VEI_MODELO'] ?></td>
                    <td><?= $veic['VEI_ANO'] ?></td>
                    <td><?= $veic['CLI_NOME'] ?></td>
                    <td><a href="<?= base_url('veiculo/editar/'.$veic['VEI_ID']) ?>">Editar</a></td>
                    <td><a href="<?= base_url('veiculo/excluir/'.$veic['VEI_ID']) ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <br>
        <a href="<?= base_url('veiculo/novo') ?>"><button>Cadastrar Veículo</button></a>
        <br><br>
        <a href="<?= base_url('inicio') ?>"><button>Voltar</button></a>
    </body>
</html>