<?php
//Rotas Públicas
// Rotas Login
$routes->get('/', 'LoginController::index');
$routes->get('login', 'LoginController::index');
$routes->post('login/autenticar', 'LoginController::autenticar');
$routes->get('logout', 'LoginController::logout');

//Rotas Protegidas
$routes->group('', ['filter' => 'auth'], function($routes){
    // Rota Inicio
    $routes->get('inicio', 'InicioController::index');

    // Rotas cliente
    $routes->match(['get', 'post'], 'cliente',  'ClienteController::index');
    $routes->get('cliente/novo',                'ClienteController::novo');
    $routes->post('cliente/inserir',            'ClienteController::inserir');
    $routes->get('cliente/editar/(:num)',       'ClienteController::editar/$1');
    $routes->post('cliente/atualizar/(:num)',   'ClienteController::atualizar/$1');
    $routes->get('cliente/excluir/(:num)',      'ClienteController::excluir/$1');

    // Rotas veiculo
    $routes->match(['get', 'post'], 'veiculo',  'VeiculoController::index');
    $routes->get('veiculo/novo',                'VeiculoController::novo');
    $routes->post('veiculo/inserir',            'VeiculoController::inserir');
    $routes->get('veiculo/editar/(:num)',       'VeiculoController::editar/$1');
    $routes->post('veiculo/atualizar/(:num)',   'VeiculoController::atualizar/$1');
    $routes->get('veiculo/excluir/(:num)',      'VeiculoController::excluir/$1');

    // Rotas Agendamento
    $routes->match(['get', 'post'], 'agendamento',     'AgendamentoController::index');
    $routes->get('agendamento/novo',                   'AgendamentoController::novo');
    $routes->post('agendamento/inserir',               'AgendamentoController::inserir');
    $routes->get('agendamento/editar/(:num)',          'AgendamentoController::editar/$1');
    $routes->post('agendamento/atualizar/(:num)',      'AgendamentoController::atualizar/$1');
    $routes->get('agendamento/excluir/(:num)',         'AgendamentoController::excluir/$1');
});