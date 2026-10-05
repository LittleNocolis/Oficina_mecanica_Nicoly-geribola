<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Editar Cliente</title>
    </head>
    <body>
        <h1>Editar Cliente</h1>

        <form action="<?= base_url('cliente/atualizar/'.$cliente['CLI_ID']) ?>" method="POST">
            <label>Nome:</label><br>
            <input type="text" id="nome" name="nome" value="<?= $cliente['CLI_NOME'] ?>" required>
            <br><br>
            <label>Data de Nascimento:</label><br>
            <input type="date" id="data_nascimento" name="data_nascimento" value="<?= $cliente['CLI_DATA_NASCIMENTO'] ?>" required>
            <br><br>
            <label>Telefone:</label><br>
            <input type="text" id="telefone" name="telefone" value="<?= $cliente['CLI_TELEFONE'] ?>" required>
            <br><br>
            <input type="submit" id="editar_cliente" name="editar_cliente" value="Salvar Alterações">
        </form>

        <br>
        <a href="<?= base_url('cliente') ?>"><button>Voltar</button></a>
    </body>
</html>