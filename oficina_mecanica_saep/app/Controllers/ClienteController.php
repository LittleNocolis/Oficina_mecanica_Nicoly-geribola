<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ClienteModel;

class ClienteController extends BaseController
{
    // Exibe a listagem de cliente
    public function index()
    {
        // Instancia o Model responsável pela tabela CLIENTE
        $model = new ClienteModel();

        // Verifica se o formulário de pesquisa foi enviado
        if ($this->request->getPost('botao_pesquisar')) {

            // Recupera o texto digitado no campo de pesquisa
            $pesquisar = $this->request->getPost('pesquisar');

            // Busca clientes que possuem o termo informado
            // no nome ou data de nascimento
            $dados['cliente'] = $model
                ->like('CLI_NOME', $pesquisar)
                ->orLike('CLI_DATA_NASCIMENTO', $pesquisar)
                ->orLike('CLI_TELEFONE', $pesquisar)
                ->findAll();
        }
        else {

            // Caso nenhuma pesquisa tenha sido realizada,
            // busca todos os clientes cadastrados
            $dados['cliente'] = $model->findAll();
        }

        // Carrega a View de listagem e envia os clientes encontrados
        return view('sistema/cliente/index', $dados);
    }


    // Exibe o formulário para cadastrar um novo cliente
    public function novo()
    {
        // Apenas carrega a View com o formulário
        return view('sistema/cliente/novo_cliente');
    }


    // Insere um novo cliente no banco de dados
    public function inserir()
    {
        // Instancia o Model
        $model = new ClienteModel();

        // Recupera os valores enviados pelo formulário
        $dados = [
            'CLI_NOME' => $this->request->getPost('nome'),
            'CLI_DATA_NASCIMENTO' => $this->request->getPost('data_nascimento'),
            'CLI_TELEFONE' => $this->request->getPost('telefone')
        ];

        // Insere o novo cliente no banco
        $model->insert($dados);

        // Redireciona para a listagem de cliente
        return redirect()
            ->to(base_url('cliente'))
            ->with('success', 'Cliente cadastrado com sucesso!');
    }


    // Exibe o formulário para editar um cliente
    public function editar($id)
    {
        // Instancia o Model
        $model = new ClienteModel();

        // Busca o cliente pelo ID recebido na URL
        $dados['cliente'] = $model->find($id);

        // Carrega a View de edição enviando os dados do cliente
        return view('sistema/cliente/editar_cliente', $dados);
    }


    // Atualiza os dados de um cliente
    public function atualizar($id)
    {
        // Instancia o Model
        $model = new ClienteModel();

        // Recupera os novos valores enviados pelo formulário
        $dados = [
            'CLI_NOME' => $this->request->getPost('nome'),
            'CLI_DATA_NASCIMENTO' => $this->request->getPost('data_nascimento'),
            'CLI_TELEFONE' => $this->request->getPost('telefone')
        ];

        // Atualiza o registro correspondente ao ID
        $model->update($id, $dados);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('cliente'))
            ->with('success', 'Cliente atualizado com sucesso!');
    }


    // Exclui um cliente
    public function excluir($id)
    {
        // Instancia o Model
        $model = new ClienteModel();

        // Exclui o registro correspondente ao ID
        $model->delete($id);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('cliente'))
            ->with('success', 'Cliente excluído com sucesso!');
    }
}