<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Novo Cliente</title>
    </head>
    <body>
        <h1>Novo Cliente</h1>
        <form action="<?= base_url('cliente/inserir') ?>" method="POST">
            <label>Nome:</label><br>
            <input type="text" id="nome" name="nome" placeholder="Nome..." required>

            <br><br>
           
            <label>Data de Nascimento:</label><br>
            <input type="date" id="data_nascimento" name="data_nascimento"  required>

            <br><br>
            
            <label>Telefone: </label><br>
            <input type="text" id="telefone" name="telefone" placeholder="Telefone..." required>

            <br><br>

            <input type="submit" id="cadastrar_cliente" name="cadastrar_cliente" value="Cadastrar">
        </form>
        <br>
        <a href="<?= base_url('cliente') ?>"><button>Voltar</button></a>
    </body>
</html>