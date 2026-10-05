<?php
namespace App\Models;
use CodeIgniter\Model;

// Model = representa a tabela no banco
class ClienteModel extends Model
{
    protected $table = 'CLIENTE'; // nome da tabela
    protected $primaryKey = 'CLI_ID'; // chave primária

    // Campos permitidos para INSERT/UPDATE
    protected $allowedFields = [
        // colunas na tabela CLIENTE do banco
        'CLI_NOME',
        'CLI_DATA_NASCIMENTO',
        'CLI_TELEFONE'
    ];
}