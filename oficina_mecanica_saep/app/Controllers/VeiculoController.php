<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ClienteModel;
use App\Models\VeiculoModel;

// Vincula o Veiculo com seu respectivo Cliente (FK_CLI_ID)
class VeiculoController extends BaseController
{
    // Exibe a listagem de Veiculo
    public function index()
{
    $model = new VeiculoModel();

    if ($this->request->getPost('botao_pesquisar')) {

        $pesquisar = $this->request->getPost('pesquisar');

        $dados['veiculo'] = $model
            ->select('VEICULO.*, CLIENTE.CLI_NOME')
            ->join(
                'CLIENTE',
                'CLIENTE.CLI_ID = VEICULO.FK_CLI_ID',
                'left'
            )
            ->groupStart()
                ->like('VEI_MODELO', $pesquisar)
                ->orLike('VEI_ANO', $pesquisar)
                ->orLike('VEI_PLACA', $pesquisar)
                ->orLike('CLIENTE.CLI_NOME', $pesquisar)
            ->groupEnd()
            ->findAll();

    } else {

        $dados['veiculo'] = $model
            ->select('VEICULO.*, CLIENTE.CLI_NOME')
            ->join(
                'CLIENTE',
                'CLIENTE.CLI_ID = VEICULO.FK_CLI_ID',
                'left'
            )
            ->findAll();
    }

    return view('sistema/veiculo/index', $dados);
}


    // Exibe o formulário para cadastrar um novo Veiculo
    public function novo()
    {
        // Instancia o Model de cliente
        $clienteModel = new ClienteModel();

        // Busca todos os cliente cadastrados
        // Esses dados serão utilizados em um campo SELECT
        $dados['cliente'] = $clienteModel->findAll();

        // Carrega o formulário de cadastro do veículo
        return view('sistema/veiculo/novo_veiculo', $dados);
    }


    // Insere um novo veículo
    public function inserir()
    {
        // Instancia o Model de veículo
        $model = new VeiculoModel();

        // Recupera os dados enviados pelo formulário
        $dados = [
            'VEI_MODELO' => $this->request->getPost('modelo'),
            'VEI_ANO' => $this->request->getPost('ano'),
            'VEI_MARCA' => $this->request->getPost('marca'),
            'VEI_PLACA' => $this->request->getPost('placa'),

            // Guarda o ID do cliente escolhido no formulário
            // como chave estrangeira do veículo
            'FK_CLI_ID' => $this->request->getPost('cliente')
        ];

        // Insere o veículo no banco
        $model->insert($dados);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculo'))
            ->with('success', 'Veículo cadastrado com sucesso!');
    }


    // Exibe o formulário de edição
    public function editar($id)
    {
        // Instancia o Model de Veiculo
        $veiculoModel = new VeiculoModel();

        // Instancia o Model de cliente
        $clienteModel = new ClienteModel();

        // Busca o veículo que será editado
        $dados['veiculo'] = $veiculoModel->find($id);

        // Busca todos os clientes para preencher o SELECT
        $dados['cliente'] = $clienteModel->findAll();

        // Carrega a View de edição
        return view('sistema/veiculo/editar_veiculo', $dados);
    }


    // Atualiza um veículo
    public function atualizar($id)
    {
        // Instancia o Model
        $model = new VeiculoModel();

        // Recupera os novos dados do formulário
        $dados = [
            'VEI_MODELO' => $this->request->getPost('modelo'),
            'VEI_ANO' => $this->request->getPost('ano'),
            'VEI_MARCA' => $this->request->getPost('marca'),
            'VEI_PLACA' => $this->request->getPost('placa'),

            // Guarda o ID do cliente escolhido no formulário
            // como chave estrangeira do veículo
            'FK_CLI_ID' => $this->request->getPost('cliente')
        ];

        // Atualiza o veículo pelo ID
        $model->update($id, $dados);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculo'))
            ->with('success', 'Veículo atualizado com sucesso!');
    }


    // Exclui um veículo
    public function excluir($id)
    {
        // Instancia o Model
        $model = new VeiculoModel();

        // Exclui o veículo pelo ID
        $model->delete($id);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculo'))
            ->with('success', 'Veículo excluído com sucesso!');
    }
}